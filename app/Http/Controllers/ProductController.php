<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('produk.index', compact('product'));
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
        
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jenis_satuan' => 'required',
            'stok' => 'required|numeric|min:1',
            'harga_jual' => 'required|numeric|min:1',
            'harga_beli' => 'required|numeric|min:1'
        ]);
        try {
            $produk = new Product();
            $produk->nama_barang = $request->nama_barang; 
            $produk->jenis_satuan = $request->jenis_satuan; 
            $produk->stok = $request->stok; 
            $produk->harga_jual = $request->harga_jual; 
            $produk->harga_beli = $request->harga_beli; 
            $produk->save();
            return redirect()->route('product.index')->with('success', 'Data berhasil ditambahkan!');
        } catch (\Throwable $th) {
            return redirect()->route('product.index')->with('error', 'Terjadi kesalahan saat Menambah data!');

        }

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
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jenis_satuan' => 'required',
            'stok' => 'required|numeric|min:1',
            'harga_jual' => 'required|numeric|min:1',
            'harga_beli' => 'required|numeric|min:1'
        ]);
        try {
            $produk = Product::findOrFail($id);
            $produk->nama_barang = $request->nama_barang; 
            $produk->jenis_satuan = $request->jenis_satuan; 
            $produk->stok = $request->stok; 
            $produk->harga_jual = $request->harga_jual; 
            $produk->harga_beli = $request->harga_beli; 
            $produk->save();
    
            return redirect()->route('product.index')->with('success', 'Data berhasil diedit!');
        } catch (\Throwable $th) {
            return redirect()->route('product.index')->with('error', 'Terjadi kesalahan saat Mengedit data!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Product::findOrFail($id);
        $produk->delete();
        return redirect()->route('product.index')
                        ->with('success', 'Data berhasil dihapus!');
    }

    public function showByJenisSatuan($jenis_satuan)
    {
        $product = Product::where('jenis_satuan', $jenis_satuan)->get();

        return view('produk.index', compact('product', 'jenis_satuan'));
    }
}
