<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;
use Illuminate\Support\Str;

class TrainsTableSeederCsv extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = fopen(__DIR__  . '/trains.csv', 'r');
        $i = 0;


        while(($row = fgetcsv($data) )!= false){
            if ($i > 0) {
                $new_train = new Train();
                $new_train->agency = $row[0];
                $new_train->departure_station = $row[1];
                $new_train->arrival_station = $row[2];
                $new_train->departure_time = $row[3];
                $new_train->arrival_time = $row[4];
                $new_train->train_number = $row[5];
                $new_train->number_of_carriages = $row[6];
                $new_train->in_time = $row[7];
                $new_train->deleted = $row[8];
                $new_train->slug = $this->generateSlug($new_train->agency);

                $new_train->save();

            }
            $i++;
        }
        fclose($data);
    }
    private function generateSlug($string){

        $slug = Str::slug($string, '-');

        $original = $slug;
        $exist = Train::where('slug', $slug)->first();
        $i = 1;

        while ($exist) {
            $slug = $original . '-' . $i;
            $exist = Train::where('slug', $slug)->first();
            $i++;

        }

        return $slug;
    }
}
