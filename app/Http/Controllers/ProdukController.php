<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all(); // ambil semua data produk dari database
        return view('admin.index', compact('produk'));
    }

    public function create()
    {
        // dd(Auth::user()->role);

        $produk = new Produk(); // biar gak error undefined variable di view
        return view('admin.produk.create', compact('produk'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_buku' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'jumlah' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'kategori' => 'nullable|string',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('produk-images', 'public');
            $validatedData['gambar'] = $path;
        }

        Produk::create($validatedData);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.produk.edit', compact('produk'));
    }

    public function update(Request $request, string $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama_buku' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'jumlah' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'kategori' => 'nullable|string',
        ]);

        // update data basic
        $produk->nama_buku = $request->nama_buku;
        $produk->jumlah = $request->jumlah;
        $produk->kategori = $request->kategori;
        $produk->deskripsi = $request->deskripsi;

        // kalau upload gambar baru
        if ($request->hasFile('gambar')) {
            if ($produk->gambar && file_exists(storage_path('app/public/' . $produk->gambar))) {
                unlink(storage_path('app/public/' . $produk->gambar));
            }

            $path = $request->file('gambar')->store('produk-images', 'public');
            $produk->gambar = $path;
        }

        $produk->save();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->gambar && file_exists(storage_path('app/public/' . $produk->gambar))) {
            unlink(storage_path('app/public/' . $produk->gambar));
        }

        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }

    public function pinjam(Request $request, $id)
{
    $produk = Produk::findOrFail($id);

    // Validasi input jumlah
    $request->validate([
        'jumlah_pinjam' => 'required|integer|min:1',
    ]);

    $jumlahPinjam = $request->jumlah_pinjam;

    // Cek stok
    if ($jumlahPinjam > $produk->jumlah) {
        return back()->with('error', '❌ Jumlah pinjaman melebihi stok tersedia!');
    }

    // Simpan data peminjaman ke tabel "peminjamen"
    Peminjaman::create([
        'siswa_id' => Auth::id(), // tambahin ini bro
        'user_id' => Auth::id(), // user yang login
        'produk_id' => $produk->id,
        'jumlah' => $jumlahPinjam, // simpan jumlah pinjaman
        'status' => 'dipinjam',
        'tanggal_pinjam' => now(),
    ]);

    // Kurangi stok produk
    $produk->decrement('jumlah', $jumlahPinjam);

    return redirect()->route('dashboard')->with('success', '✅ Buku berhasil dipinjam!');
}


    public function show($id)
    {
        $produk = Produk::findOrFail($id); // ambil produk sesuai id
        return view('admin.produk.show', compact('produk')); // kirim ke view
    }
}
