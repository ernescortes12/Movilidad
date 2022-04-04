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
            array('name' => 'Coordinacion'),
            array('name' => 'ORI'),
            array('name' => 'DIE'),
            array('name' => 'Decanatura'),
        );

        DB::table('roles')->insert($array);
    }
}
