<?php

use Illuminate\Database\Seeder;

class MeasuresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $measures = array(
            [
                'id' => 1,
                'name' => 'centymetr',
                'short_name' => 'cm',
            ],[
                'id' => 2,
                'name' => 'gram',
                'short_name' => 'g',
            ],[
                'id' => 3,
                'name' => 'centymetr kwadratowy',
                'short_name' => 'cm2',
            ],[
                'id' => 4,
                'name' => 'centymetr sześcienny',
                'short_name' => 'mm',
            ],[
                'id' => 5,
                'name' => 'metry sześcienne',
                'short_name' => 'm3',
            ],

        );

        //// Uncomment the below to run the seeder
        DB::table('measures')->insert($measures);
    }
}
