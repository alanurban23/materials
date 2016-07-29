<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Model::unguard();

        $this->call(MaterialGroupSeeder::class);
        $this->call(MeasuresSeeder::class);
        $this->call(MaterialSeeder::class);

        Model::reguard();

    }
}
