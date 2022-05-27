<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstInt extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = array(
            array('nombre' => 'Universidad de Harvard', 'pais' => 'Estados Unidos', 'ciudad' => 'Massachusetts', 'email' => 'ithelp@harvard.edu', 'user_id' => '3'),
            array('nombre' => 'Universidad de Stanford', 'pais' => 'Estados Unidos', 'ciudad' => 'California', 'email' => 'university@stanford.edu', 'user_id' => '3'),
            array('nombre' => 'Universidad de Barcelona', 'pais' => 'España', 'ciudad' => 'Barcelona', 'email' => 'ubarcelona@ubar.edu', 'user_id' => '3'),
            array('nombre' => 'Universidad de Cambridge', 'pais' => 'Reino Unido', 'ciudad' => 'Cambridge', 'email' => 'university@cam.edu', 'user_id' => '3'),
            array('nombre' => 'Universidad de Chicago', 'pais' => 'Estados Unidos', 'ciudad' => 'Chicago', 'email' => 'university@chi.edu', 'user_id' => '3'),
        );

        DB::table('institucion_entidad_ints')->insert($array);
    }
}
