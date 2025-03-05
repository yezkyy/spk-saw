<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::all();
        return view('alternatif.index', compact('alternatifs'));
    }

    public function create()
    {
        return view('alternatif.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            // tambahkan validasi lain jika perlu
        ]);

        // Simpan data alternatif
        Alternatif::create([
            'nama' => $request->nama,
            // tambahkan data lain yang diperlukan
        ]);

        return redirect()->route('alternatif.index')->with('success', 'Alternatif berhasil ditambahkan.');
    }

    public function edit(Alternatif $alternatif)
    {
        return view('alternatif.edit', compact('alternatif'));
    }

    public function update(Request $request, Alternatif $alternatif)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            // tambahkan validasi lain jika perlu
        ]);

        // Update data alternatif
        $alternatif->update([
            'nama' => $request->nama,
            // tambahkan data lain yang diperlukan
        ]);

        return redirect()->route('alternatif.index')->with('success', 'Alternatif berhasil diperbarui.');
    }

    public function destroy(Alternatif $alternatif)
    {
        // Hapus data alternatif
        $alternatif->delete();

        return redirect()->route('alternatif.index')->with('success', 'Alternatif berhasil dihapus.');
    }
}