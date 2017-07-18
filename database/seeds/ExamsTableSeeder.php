<?php

use Illuminate\Database\Seeder;

class ExamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exams')->insert([
          'nama' => 'Exam 1',
          'tarikh_mula' => '2017-07-29',
          'tarikh_tamat' => '2017-07-30',
          'kuota' => 30,
          'status' => 'open'
        ]);

        DB::table('exams')->insert([
          'nama' => 'Exam 2',
          'tarikh_mula' => '2017-07-29',
          'tarikh_tamat' => '2017-07-30',
          'kuota' => 30,
          'status' => 'open'
        ]);
    }
}
