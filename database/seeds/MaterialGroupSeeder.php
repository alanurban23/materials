<?php

use Illuminate\Database\Seeder;

class MaterialGroupSeeder extends Seeder
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
                'name' => 'materiały budowlane',
                'id_head_group' => 1
            ],
            [
                'id' => 2,
                'name' => 'tworzywo sztuczne',
                'id_head_group' => 2
            ],
            [
                'id' => 3,
                'name' => 'poliester',
                'id_head_group' => 6
            ],
            [
                'id' => 4,
                'name' => 'wełna',
                'id_head_group' => 6
            ],
            [
                'id' => 5,
                'name' => 'bawełna',
                'id_head_group' => 6
            ],
            [
                'id' => 6,
                'name' => 'materiały włókiennicze',
                'id_head_group' => 6
            ],
            [
                'id' => 7,
                'name' => 'tkaniny',
                'id_head_group' => 6
            ],
            [
                'id' => 8,
                'name' => 'stal',
                'id_head_group' => 8
            ],
            [
                'id' => 9,
                'name' => 'żelazo',
                'id_head_group' => 8
            ],
            [
                'id' => 10,
                'name' => 'miedź',
                'id_head_group' => 8
            ],
            [
                'id' => 11,
                'name' => 'ocynk',
                'id_head_group' => 9
            ],
        );

        //// Uncomment the below to run the seeder
        DB::table('material_groups')->insert($measures);
    }
}
