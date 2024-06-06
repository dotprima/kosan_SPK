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

        for ($i = 0; $i < 50; $i++) {
            // Randomly assign values based on the defined scales for each criterion
            $C1 = $faker->randomElement([1, 2, 3, 4]); // Distance to campus in km, predefined scale
            $C2 = $faker->randomElement([1, 2, 3, 4]); // Cost of housing, predefined scale
            $C3 = $faker->randomElement([1, 2, 3, 4]); // Facilities, on a scale from 1 to 4
            $C4 = $faker->randomElement([1, 2, 3, 4]); // Supporting location quality, predefined scale
            $C5 = $faker->randomElement([1, 2, 3, 4]); // Security level, predefined scale
            $C6 = $faker->randomElement([1, 2, 3, 4]); // Room size in square meters, predefined scale
            $C7 = $faker->randomElement([1, 2, 3, 4]); // Curfew hour, predefined scale
            $C8 = $faker->randomElement(['prepaid', 'postpaid']); // Type of electricity
            $C9 = $faker->randomElement([2, 3, 5]); // Cleanliness, predefined scale

            Alternatif::create([
                'nama' => $faker->company,
                'C1'   => $C1,
                'C2'   => $C2,
                'C3'   => $C3,
                'C4'   => $C4,
                'C5'   => $C5,
                'C6'   => $C6,
                'C7'   => $C7,
                'C8'   => $C8,
                'C9'   => $C9,
            ]);
        }
    }
}
