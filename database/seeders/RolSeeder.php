<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = array(
            array('rol_name' => 'Coordinacion'),
            array('rol_name' => 'ORI'),
            array('rol_name' => 'DIE'),
            array('rol_name' => 'Decanatura'),
            array('rol_name' => 'Otra dependencia'),
        );

        DB::table('roles')->insert($array);
    }
}
