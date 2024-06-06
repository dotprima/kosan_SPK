<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alternatif;
use Faker\Factory as Faker;

class AlternatifsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        for ($i = 0; $i < 50; $i++) { // Generate more examples for better variability
            Alternatif::create([
                'nama' => $faker->company,  // Use company name for housing names
                'C1'   => $faker->randomFloat(2, 0.1, 2), // Distance to campus in km, smaller is better
                'C2'   => $faker->numberBetween(500000, 2500000), // Cost of housing
                'C3'   => $faker->numberBetween(1, 10), // Facilities, on a scale from 1 to 10
                'C4'   => $faker->numberBetween(1, 10), // Supporting location quality
                'C5'   => $faker->numberBetween(1, 10), // Security level
                'C6'   => $faker->numberBetween(10, 30), // Room size in square meters
                'C7'   => $faker->numberBetween(18, 24), // Curfew hour, 18 (6 PM) to 24 (midnight)
                'C8'   => $faker->boolean ? 'prepaid' : 'postpaid', // Type of electricity
                'C9'   => $faker->numberBetween(1, 10), // Cleanliness
            ]);
        }
    }
}
