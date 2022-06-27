<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Si se desea agregar más usuarios, usar bcrypt en las contraseñas
        $array = array(
            array('first_name' => 'Abigail', 'second_name' => 'Otro nombre', 'last_name' => 'Tello', 'email' => 'sistemas@correo.uts.edu.co', 'password' => Hash::make('SistemasUts2022*'), 'rol_id' => '6'),
            // array('first_name' => 'Abigail', 'second_name' => 'Otro nombre', 'last_name' => 'Tello', 'email' => 'coord@gmail.com', 'password' => encrypt('SistemasUts2022*'), 'rol_id' => '1'),
            // array('first_name' => 'Abigail', 'second_name' => 'Otro nombre', 'last_name' => 'Tello', 'email' => 'ori@gmail.com', 'password' => encrypt('SistemasUts2022*'), 'rol_id' => '2'),
            // array('email' => 'die@gmail.com', 'password' => '$2a$12$GVis/Z6q2Cu8Mz9tF7vZPeb8gtLiyvFaomLonun./f27BRgP9389a', 'rol_id' => '3'),
            // array('email' => 'decano@gmail.com', 'password' => '$2a$12$7QDOBQEfkbUdMcCD4r5liuJSACnRJ9ryPxQz96LZZfZ33fDHW3n8C', 'rol_id' => '4'),
            // array('email' => 'other@gmail.com', 'password' => '$2a$12$kqYJKE6CP4LypgemqwFMmOhTbpdDWRhslclON4fkwQrOa.Nd704ay', 'rol_id' => '5'),
        );

        // 1. 1234
        // 2. 5678
        // 3. 9012
        // 4. 7890
        // 5. 3456

        DB::table('users')->insert($array);
    }
}
