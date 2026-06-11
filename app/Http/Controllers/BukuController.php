<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $data_buku = Buku::all();
        return view('buku.index', compact('data_buku'));
    }

    public function create()
    {
        $pilihan_kategori = Kategori::all();
        return view('buku.create', compact('pilihan_kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'jenis_koleksi' => 'required|string',
            'media' => 'required|string',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun' => 'required|integer|min:1900|max:2030',
            'status' => 'required|string',
        ]);

        Buku::create([
            'judul' => $request->judul,
            'jenis_koleksi' => $request->jenis_koleksi,
            'media' => $request->media,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun' => $request->tahun,
            'status' => $request->status,
        ]);

        return redirect()->route('buku.index')->with('success', 'Buku baru berhasil ditambahkan!');
    }
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus!');
    }
}