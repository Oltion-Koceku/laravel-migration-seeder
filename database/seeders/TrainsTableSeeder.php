<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i < 100; $i++) {
            $new_train = new Train();
            $new_train->agency = $faker->name();
            $new_train->slug = $this->generateSlug($new_train->agency);
            $new_train->departure_station = $faker->word(2, true);
            $new_train->arrival_station = $faker->word(2, true);
            $new_train->departure_time = $faker->time();
            $new_train->arrival_time = $faker->time();
            $new_train->train_number = $faker->numberBetween(20);
            $new_train->number_of_carriages = $faker->numberBetween(2, 20);
            dump($new_train);

        }
    }

    private function generateSlug($string){
        return Str::slug($string);
    }
}



