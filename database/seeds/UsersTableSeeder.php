<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'nama' => 'Ahmad Albab',
          'email' => 'ahmad@albab.com',
          'password' => bcrypt('ahmad'),
          'ic' => '808080808080',
          'jantina' => 'lelaki',
          'telefon'=> '0123456789',
          'alamat' => 'No.123 Taman Berjaya',
          'role' => 'admin',
          'status' => 'active'
        ]);

        DB::table('users')->insert([
          'nama' => 'Upin Ipin',
          'email' => 'upin@ipin.com',
          'password' => bcrypt('upinipin'),
          'ic' => '808080808080',
          'jantina' => 'lelaki',
          'telefon'=> '0123456789',
          'alamat' => 'No.123 Taman Berjaya',
          'role' => 'user',
          'status' => 'active'
        ]);
    }
}
