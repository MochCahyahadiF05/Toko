<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;


class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier = Supplier::all();
        return view('supplier.index',compact('supplier'));
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
            'nama_supplier' => 'required|string|max:255'
        ]);

        $supplier = new Supplier();
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->kontak_supplier = $request->kontak_supplier;
        $supplier->alamat = $request->alamat;
        $supplier->save();

        return redirect()->route('supplier.index')->with('success', 'Data berhasil ditambahkan!');
    
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
            'nama_supplier' => 'required|string|max:255'
        ]);
        try {
            $supplier = Supplier::findOrFail($id);
            $supplier->nama_supplier = $request->nama_supplier;
            $supplier->kontak_supplier = $request->kontak_supplier;
            $supplier->alamat = $request->alamat;
            $supplier->save();
    
            return redirect()->route('supplier.index')->with('success', 'Data berhasil diedit!');
        } catch (\Throwable $th) {
            return redirect()->route('your.route')->with('error', 'Terjadi kesalahan saat menambahkan data!');
        }
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('supplier.index')
                        ->with('success', 'Data berhasil dihapus!');
    }
}
