<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiAlternatif;

class SAWController extends Controller
{
    public function index()
    {
        // Ambil data alternatif, kriteria, dan nilai alternatif
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();
        $nilaiAlternatifs = NilaiAlternatif::all();

        // 1. Normalisasi Matrix
        $normalisasi = [];
        foreach ($kriterias as $kriteria) {
            $nilaiMax = $nilaiAlternatifs->where('kriteria_id', $kriteria->id)->max('nilai');
            $nilaiMin = $nilaiAlternatifs->where('kriteria_id', $kriteria->id)->min('nilai');
            
            foreach ($alternatifs as $alt) {
                $nilai = $nilaiAlternatifs->where('alternatif_id', $alt->id)->where('kriteria_id', $kriteria->id)->first();
                if ($nilai) {
                    if ($kriteria->jenis == 'benefit') {
                        $normalisasi[$alt->id][$kriteria->id] = $nilai->nilai / $nilaiMax;
                    } else {
                        $normalisasi[$alt->id][$kriteria->id] = $nilaiMin / $nilai->nilai;
                    }
                }
            }
        }
    
        // 2. Menghitung Bobot Normalisasi
        $hasilSAW = [];
        foreach ($alternatifs as $alt) {
            $total = 0;
            foreach ($kriterias as $kriteria) {
                if (isset($normalisasi[$alt->id][$kriteria->id])) {
                    $total += $normalisasi[$alt->id][$kriteria->id] * $kriteria->bobot;
                }
            }
            $hasilSAW[$alt->id] = $total;
        }

        // 3. Sorting hasil SAW
        arsort($hasilSAW);
        foreach ($alternatifs as $alt) {
            $alt->nilai_saw = $hasilSAW[$alt->id] ?? 0;
        }

        // Passing data ke view
        return view('dashboard', compact('alternatifs'));
    }
}