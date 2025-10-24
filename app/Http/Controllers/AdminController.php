<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all(); // ambil semua data produk
        return view('admin.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_buku' => 'required',
            'jumlah' => 'required|integer',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required',
            'kategori' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
    $image = $request->file('gambar');
    $filename = time() . '_' . $image->getClientOriginalName();
    $image->move(public_path('gambar'), $filename);
    $validatedData['gambar'] = $filename;
}

        Produk::create([
            'nama_buku' => $request->nama_buku,
            'kategori' => $request->kategori,
            'stok' => $request->stok,
            'gambar' => $validatedData['gambar'],
            'deskripsi' => $request->deskripsi,
        ]);
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
