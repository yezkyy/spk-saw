<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    // Menampilkan daftar kriteria
    public function index()
    {
        $kriterias = Kriteria::all(); // Mengambil seluruh data kriteria
        return view('kriteria.index', compact('kriterias')); // Mengirim data kriteria ke view
    }

    // Menampilkan form untuk menambah kriteria
    public function create()
    {
        return view('kriteria.create'); // Menampilkan form tambah kriteria
    }

    // Menyimpan data kriteria baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'bobot' => 'required|numeric|min:0|max:1',
            'jenis' => 'required|in:benefit,cost', // validasi jenis
        ]);

        // Simpan data kriteria
        Kriteria::create([
            'nama' => $request->nama,
            'bobot' => $request->bobot,
            'jenis' => $request->jenis,
        ]);

        // Redirect setelah menyimpan data
        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit kriteria
    public function edit(Kriteria $kriteria)
    {
        return view('kriteria.edit', compact('kriteria')); // Menampilkan form edit dengan data kriteria
    }

    // Memperbarui data kriteria
    public function update(Request $request, Kriteria $kriteria)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'bobot' => 'required|numeric|min:0|max:1',
            'jenis' => 'required|in:benefit,cost', // validasi jenis
        ]);

        // Update data kriteria
        $kriteria->update($request->only(['nama', 'bobot', 'jenis']));

        // Redirect setelah memperbarui data
        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil diperbarui.');
    }

    // Menghapus data kriteria
    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete(); // Hapus data kriteria
        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil dihapus.');
    }
}