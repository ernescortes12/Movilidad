<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = array(
            array('email' => 'coord@gmail.com', 'password' => '$2a$12$Tjgzzj.yfPHFMW5HkqyrTu/qy28fbhIF3mkTzoIRETkvd2k9glBSi', 'rol_id' => '1'),
            array('email' => 'ori@gmail.com', 'password' => '$2a$12$bjrk3E/Q9rFOMVfq5sH4cO5U8DH977yMogs7rBN15IJp92Xwat2Km', 'rol_id' => '2'),
            array('email' => 'die@gmail.com', 'password' => '$2a$12$GVis/Z6q2Cu8Mz9tF7vZPeb8gtLiyvFaomLonun./f27BRgP9389a', 'rol_id' => '3'),
            array('email' => 'other@gmail.com', 'password' => '$2a$12$kqYJKE6CP4LypgemqwFMmOhTbpdDWRhslclON4fkwQrOa.Nd704ay', 'rol_id' => '4'),

        );

        // 1. 1234
        // 2. 5678
        // 3. 9012
        // 4. 3456

        DB::table('users')->insert($array);
    }
}
