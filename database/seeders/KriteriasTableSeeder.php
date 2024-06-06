<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kriteria;

class KriteriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kriteria = [
            ['kode' => 'C1', 'nama' => 'Jarak ke Kampus', 'bobot' => 20, 'atribut' => 'cost'],
            ['kode' => 'C2', 'nama' => 'Biaya Kos', 'bobot' => 25, 'atribut' => 'cost'],
            ['kode' => 'C3', 'nama' => 'Fasilitas', 'bobot' => 15, 'atribut' => 'benefit'],
            ['kode' => 'C4', 'nama' => 'Lokasi Pendukung', 'bobot' => 10, 'atribut' => 'benefit'],
            ['kode' => 'C5', 'nama' => 'Keamanan', 'bobot' => 10, 'atribut' => 'benefit'],
            ['kode' => 'C6', 'nama' => 'Ukuran Ruangan', 'bobot' => 5, 'atribut' => 'benefit'],
            ['kode' => 'C7', 'nama' => 'Batas Jam Malam', 'bobot' => 5, 'atribut' => 'cost'],
            ['kode' => 'C8', 'nama' => 'Jenis Listrik', 'bobot' => 10, 'atribut' => 'benefit'],
            ['kode' => 'C9', 'nama' => 'Kebersihan', 'bobot' => 10, 'atribut' => 'cost']
        ];

        foreach ($kriteria as $item) {
            Kriteria::create($item);
        }
    }
}
