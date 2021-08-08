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
        ]);

        DB::table('utenti')->insert([
            'nome' => 'Andrea',
            'cognome' =>  'Rossi',
            'username' => 'staffstaff',
            'data_nascita' => '1998-09-03',
            'email' => 'andrearossi@staff.electrohm.it',
            'telefono' => '3200404040',
            'password' => Hash::make('ijADPwLb'),
            'role' => 'staff',
            'centroID' => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('utenti')->insert([
            'nome' => 'Alessandro',
            'cognome' =>  'Bianchi',
            'username' => 'alex_staff',
            'data_nascita' => '1996-11-27',
            'email' => 'alexbianchii@staff.electrohm.it',
            'telefono' => '3200505050',
            'password' => Hash::make('ijADPwLb'),
            'role' => 'staff',
            'centroID' => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
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
            'centroID' => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('utenti')->insert([
            'nome' => 'Francesco',
            'cognome' =>  'Neri',
            'username' => 'francesco_tecn',
            'data_nascita' => '1990-01-29',
            'email' => 'francesconeri@tech.electrohm.it',
            'telefono' => '3290303030',
            'password' => Hash::make('ijADPwLb'),
            'role' => 'tecnico',
            'centroID' => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
