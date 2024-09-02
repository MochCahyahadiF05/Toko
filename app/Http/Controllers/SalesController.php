<?php

namespace App\Http\Controllers;

use App\Models\Custemer;
use App\Models\Product;
use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productKg = Product::where('jenis_satuan', 'Kg')->get();
        $productTabung = Product::where('jenis_satuan', 'Tabung')->get();
        $customers = Custemer::all();
        return view('sales.testing', compact('productKg', 'productTabung', 'customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'product_kg_id.*' => 'nullable|exists:products,id',
            'qty_kg.*' => 'nullable|min:1',
            'product_tabung_id.*' => 'nullable|exists:products,id',
            'qty_tabung.*' => 'nullable|integer|min:1',
            'sale_date' => 'required|date',
            'status_payment' => 'required|in:Lunas,Belum Lunas',
            'cust_nama' => 'required_if:customer_type,new_customer',
            'cust_id' => 'required_if:customer_type,existing_customer|nullable|exists:custemers,id',
        ]);

        // dd($request);
        // Menangani penyimpanan untuk customer baru atau yang sudah ada
        $customer = null;
        if ($request->customer_type == 'new_customer') {
            $customer = Custemer::create(['nama_customer' => $request->cust_nama]);
            // dd($customer);
        } elseif ($request->customer_type == 'existing_customer') {
            $customer = Custemer::find($request->cust_id);
            // dd($customer);
        }

        // Jika customer tidak ditemukan, berikan handling yang tepat
        if (!$customer && $request->customer_type == 'existing_customer') {
            return redirect()->back()->withErrors(['cust_id' => 'Customer lama tidak ditemukan.']);
        }

        // Menyimpan transaksi produk per kg
        if ($request->has('product_kg_id')) {
            foreach ($request->product_kg_id as $index => $productKgId) {
                if ($productKgId && $request->qty_kg[$index]) {
                    $product = Product::find($productKgId);
                    $qty = $request->qty_kg[$index];
                    $totalPrice = $product->harga_jual * $qty;

                    Sales::create([
                        'product_id' => $productKgId,
                        // 'cust_id' => $customer ? $customer->id : null, // Menggunakan null jika tidak ada customer
                        'cust_id' => $customer->id, // Menggunakan null jika tidak ada customer
                        'qty' => $qty,
                        'total_price' => $totalPrice,
                        'sale_date' => $request->sale_date,
                        'cust_nama' => $customer ? $customer->nama_customer : $request->cust_nama,
                        'status_payment' => $request->status_payment,
                    ]);
                }
            }
        }

        // Menyimpan transaksi produk per tabung
        if ($request->has('product_tabung_id')) {
            foreach ($request->product_tabung_id as $index => $productTabungId) {
                if ($productTabungId && $request->qty_tabung[$index]) {
                    $product = Product::find($productTabungId);
                    $qty = $request->qty_tabung[$index];
                    $totalPrice = $product->harga_jual * $qty;

                    Sales::create([
                        'product_id' => $productTabungId,
                        // 'cust_id' => $customer ? $customer->id : null, // Menggunakan null jika tidak ada customer
                        'cust_id' => $customer->id, // Menggunakan null jika tidak ada customer
                        'qty' => $qty,
                        'total_price' => $totalPrice,
                        'sale_date' => $request->sale_date,
                        'cust_nama' => $customer ? $customer->nama_customer : $request->cust_nama,
                        'status_payment' => $request->status_payment,
                    ]);
                }
            }
        }

        $invoices = Sales::where('cust_id', $customer->id)->where('sale_date', $request->sale_date)->get();
        // return redirect()->route('sales.index')->with('success', 'Transaksi berhasil disimpan.');
        return redirect()->back()->with('success', 'Transaksi berhasil disimpan.')->with('invoices', $invoices);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
