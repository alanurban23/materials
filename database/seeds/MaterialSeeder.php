<?php

use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materials = array(
            [
                'code' => '44111100-2',
                'name' => 'Cegły',
                'measures_id' => 5,
                'material_groups_id' => 1,
            ],
            [
                'code' => '44111200-3',
                'name' => 'Cement',
                'measures_id' => 5,
                'material_groups_id' => 1,
            ],
            [
                'code' => '44111300-4',
                'name' => 'Ceramika',
                'measures_id' => 5,
                'material_groups_id' => 1,
            ],
            [
                'code' => '44111400-5',
                'name' => 'Farby i okładziny ścienne',
                'measures_id' => 3,
                'material_groups_id' => 2,
            ],
        );

        //// Uncomment the below to run the seeder
        DB::table('materials')->insert($materials);
    }
}
