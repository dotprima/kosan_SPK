<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kosan;
use App\Models\Kriteria;
use App\Models\Alternatif;

class HomeController extends Controller
{
    // Define the mapping of criteria values to their numeric equivalents
    function getCriteriaMapping()
    {
        return [
            'C3' => [
                '1' => 1,
                '2a' => 2,
                '2b' => 2,
                '3a' => 3,
                '6' => 6,
                '3b' => 3,
            ],
            'C4' => [
                '1' => 1,
                '2a' => 2,
                '2b' => 2,
                '2c' => 2,
                '4' => 4,
                '3' => 3,
            ],
            'C5' => [
                '1a' => 1,
                '1b' => 1,
                '1c' => 1,
                '2a' => 2,
                '2b' => 2,
                '3' => 3,
            ],
            // Add mappings for other criteria with letter suffixes if needed
        ];
    }

    // Function to get the numeric value of a criterion
    function getNumericValue($criterionCode, $value, $criteriaMapping)
    {
        return isset($criteriaMapping[$criterionCode][$value]) ? $criteriaMapping[$criterionCode][$value] : $value;
    }
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

            $min = floatval(Alternatif::min($criterion->kode)); // Mengambil nilai minimum dari kriteria
            $max = floatval(Alternatif::max($criterion->kode)); // Mengambil nilai maksimum dari kriteria

            if ($min == $max) {
                $min -= 0.01;  // Menyesuaikan nilai untuk memungkinkan normalisasi
            }

            $criteriaValues[$criterion->kode] = [
                'min' => $min,
                'max' => $max
            ];


            // Menghitung bobot masing-masing kriteria
            $widgets[$criterion->kode] = $criterion->bobot / $totalWeight;
        }

        // Menghitung skor SAW untuk setiap alternatif
        $results = [];
        $normalizedData = [];

        foreach ($alternatives as $alternative) {
            $score = 0;
            foreach ($criteria as $criterion) {
                $value = $alternative->{$criterion->kode};

                // Get the criteria mapping
                $criteriaMapping = $this->getCriteriaMapping();

                // Get the numeric value of the criterion using the mapping
                $numericValue = $this->getNumericValue($criterion->kode, $value, $criteriaMapping);

                // Perform normalization
                $normalized =  $criterion->atribut == 'benefit' ?
                    ($numericValue - $criteriaValues[$criterion->kode]['min']) / ($criteriaValues[$criterion->kode]['max'] - $criteriaValues[$criterion->kode]['min']) : ($criteriaValues[$criterion->kode]['max'] - $numericValue) / ($criteriaValues[$criterion->kode]['max'] - $criteriaValues[$criterion->kode]['min']);

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
