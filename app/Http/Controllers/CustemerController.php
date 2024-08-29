<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Custemer;


class CustemerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $custemer = Custemer::all();
        return view('custemer.index', compact('custemer'));
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
            'nama_customer' => 'required|string|max:255'
        ]);

        $custemer = new Custemer();
        $custemer->nama_customer = $request->nama_customer;
        $custemer->no_telp = $request->no_telp;
        $custemer->alamat = $request->alamat;
        $custemer->save();

        return redirect()->route('custemer.index')->with('success', 'Data berhasil ditambahkan!');
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
            'nama_customer' => 'required|string|max:255'
        ]);

        $custemer = Custemer::findOrFail($id);
        $custemer->nama_customer = $request->nama_customer;
        $custemer->no_telp = $request->no_telp;
        $custemer->alamat = $request->alamat;
        $custemer->save();

        return redirect()->route('custemer.index')->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $custemer = Custemer::findOrFail($id);
        $custemer->delete();
        return redirect()->route('custemer.index')
                        ->with('success', 'Data berhasil dihapus!');
    }
}
