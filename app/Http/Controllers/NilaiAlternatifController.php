<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiAlternatif;

class NilaiAlternatifController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();
        $nilaiAlternatifs = NilaiAlternatif::all();

        return view('nilai_alternatif.index', compact('alternatifs', 'kriterias', 'nilaiAlternatifs'));
    }

    public function create()
    {
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();
        return view('nilai_alternatif.create', compact('alternatifs', 'kriterias'));
    }

    public function store(Request $request)
    {
        foreach ($request->nilai as $alternatif_id => $kriteria_nilai) {
            foreach ($kriteria_nilai as $kriteria_id => $nilai) {
                NilaiAlternatif::updateOrCreate(
                    [
                        'alternatif_id' => $alternatif_id,
                        'kriteria_id' => $kriteria_id
                    ],
                    ['nilai' => $nilai]
                );
            }
        }

        return redirect()->route('nilai_alternatif.index')->with('success', 'Nilai Alternatif berhasil disimpan.');
    }
}