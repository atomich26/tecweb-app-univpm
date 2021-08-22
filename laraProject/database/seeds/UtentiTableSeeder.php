<?php

use Illuminate\Database\Seeder;

class UtentiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('utenti')->insert([
            'nome' => null,
            'cognome' =>  null,
            'username' => 'adminadmin',
            'data_nascita' => null,
            'email' => 'admin@electrohm.it',
            'telefono' => null,
            'password' => Hash::make('ijADPwLb'),
            'role' => 'admin',
            'centroID' => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'last_login' => null,
        ]);

        DB::table('utenti')->insert([
            'nome' => 'Andrea',
            'cognome' =>  'Bianchi',
            'username' => 'staffstaff',
            'data_nascita' => '1998-09-03',
            'email' => 'andreabianchi@staff.electrohm.it',
            'telefono' => '3200404040',
            'password' => Hash::make('ijADPwLb'),
            'role' => 'staff',
            'centroID' => null,
            'file_img' => 'male1.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'last_login' => null,
        ]);

        DB::table('utenti')->insert([
            'nome' => 'Alessandra',
            'cognome' =>  'Alighieri',
            'username' => 'alessandra_staff',
            'data_nascita' => '1996-11-27',
            'email' => 'alessandrabianchi@staff.electrohm.it',
            'telefono' => '3200505050',
            'password' => Hash::make('ijADPwLb'),
            'role' => 'staff',
            'centroID' => null,
            'file_img' => 'female2.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'last_login' => null,
        ]);

        DB::table('utenti')->insert([
            'nome' => 'Luca',
            'cognome' =>  'Verdi',
            'username' => 'tecntecn',
            'data_nascita' => '1993-05-12',
            'email' => 'lucaverdi@tech.electrohm.it',
            'telefono' => '3290909090',
            'password' => Hash::make('ijADPwLb'),
            'role' => 'tecnico',
            'centroID' => 1,
            'file_img' => 'male2.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'last_login' => null,
        ]);

        DB::table('utenti')->insert([
            'nome' => 'Francesca',
            'cognome' =>  'Rossi',
            'username' => 'francesca_tecn',
            'data_nascita' => '1990-01-29',
            'email' => 'francescarossi@tech.electrohm.it',
            'telefono' => '3290303030',
            'password' => Hash::make('ijADPwLb'),
            'role' => 'tecnico',
            'centroID' => 2,
            'file_img' => 'female1.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'last_login' => null,
        ]);
    }
}
