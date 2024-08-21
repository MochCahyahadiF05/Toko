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
            'nama_barang' => 'required',
            'jenis_satuan' => 'required',
            'stok' => 'required',
            'harga_jual' => 'required',
            'harga_beli' => 'required'
        ]);

        $produk = new Product();
        $produk->nama_barang = $request->nama_barang; 
        $produk->jenis_satuan = $request->jenis_satuan; 
        $produk->stok = $request->stok; 
        $produk->harga_jual = $request->harga_jual; 
        $produk->harga_beli = $request->harga_beli; 
        $produk->save();

        return redirect()->route('product.index');
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
            'nama_barang' => 'required',
            'jenis_satuan' => 'required',
            'stok' => 'required',
            'harga_jual' => 'required',
            'harga_beli' => 'required'
        ]);

        $produk = Product::findOrFail($id);
        $produk->nama_barang = $request->nama_barang; 
        $produk->jenis_satuan = $request->jenis_satuan; 
        $produk->stok = $request->stok; 
        $produk->harga_jual = $request->harga_jual; 
        $produk->harga_beli = $request->harga_beli; 
        $produk->save();

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Product::findOrFail($id);
        $produk->delete();
        return redirect()->route('product.index');
    }
}
