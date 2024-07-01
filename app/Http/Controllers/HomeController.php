<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kosan;
use App\Models\Kriteria;
use App\Models\Alternatif;

class HomeController extends Controller
{

    public function index()
    {
        $kosan = Kosan::limit(6)->get();
        return view('home', compact('kosan'));
    }

    public function kosan(Request $request)
    {
        $query = Kosan::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('nama', 'like', "%{$search}%")
                ->orWhere('alamat', 'like', "%{$search}%")
                ->orWhere('lokasi', 'like', "%{$search}%");
        }

        $kosan = $query->paginate(8);
        return view('kosan', compact('kosan'));
    }

    public function rekomendasi(Request $request)
    {
        // Mengambil semua kriteria dan menghitung total bobot
        $criteria = Kriteria::all();
        $totalWeight = $criteria->sum('bobot');
    
        // Mengambil semua alternatif
        $alternatives = Alternatif::with('kosan')->get();
    
        // Mempersiapkan variabel untuk diteruskan ke view
        $widgets = [];
        $criteriaValues = [];
    
        // Melakukan iterasi pada setiap kriteria
        foreach ($criteria as $criterion) {
            if ($criterion->kode !== 'C8') {  // Melewati 'C8' untuk sementara
                $min = Alternatif::min($criterion->kode); // Mengambil nilai minimum dari kriteria
                $max = Alternatif::max($criterion->kode); // Mengambil nilai maksimum dari kriteria
    
                if ($min == $max) {
                    $min -= 0.01;  // Menyesuaikan nilai untuk memungkinkan normalisasi
                }
    
                $criteriaValues[$criterion->kode] = [
                    'min' => $min,
                    'max' => $max
                ];
            }
    
            // Menghitung bobot masing-masing kriteria
            $widgets[$criterion->kode] = $criterion->bobot / $totalWeight;
        }
    
        // Menghitung skor SAW untuk setiap alternatif
        $results = [];
        $normalizedData = [];
    
        foreach ($alternatives as $alternative) {
            $score = 0;
            foreach ($criteria as $criterion) {
                if ($criterion->kode == 'C8') {
                    // Penanganan khusus untuk 'C8' karena bersifat kategorikal
                    $value = $alternative->{$criterion->kode} == 'prepaid' ? 2 : 1;
                } else {
                    $value = $alternative->{$criterion->kode};
                }
    
                if ($criterion->kode == 'C8') {
                    // Langsung menggunakan nilai untuk perhitungan skor karena 'C8' tidak berada dalam rentang normal
                    $normalized = $value;
                } else {
                    $normalized = $criterion->atribut == 'benefit' ?
                        ($value - $criteriaValues[$criterion->kode]['min']) / ($criteriaValues[$criterion->kode]['max'] - $criteriaValues[$criterion->kode]['min']) : ($criteriaValues[$criterion->kode]['max'] - $value) / ($criteriaValues[$criterion->kode]['max'] - $criteriaValues[$criterion->kode]['min']);
                }
    
                $normalizedData[$alternative->nama][$criterion->kode] = $normalized;
                $score += $normalized * $widgets[$criterion->kode];
            }
            $results[$alternative->kosan->nama] = $score;
        }
    
        // Mengurutkan hasil berdasarkan skor secara menurun
        arsort($results);
    
        $recommendedKosan = Kosan::whereIn('nama', array_keys($results))->get();
    
        // Meneruskan data yang diperlukan ke view
        return view('rekomendasi', [
            'results' => $results,
            'criteria' => $criteria,
            'criteriaValues' => $criteriaValues,
            'widgets' => $widgets,
            'data' => $alternatives,
            'normalizedData' => $normalizedData,
            'recommendedKosan' => $recommendedKosan
        ]);
    }
    
}
