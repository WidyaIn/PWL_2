<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HobiModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hobi')->insert([
            [
                'kode'=>'H1',
                'nama'=>'Widya Indah Puspita Sari',
                'hobi'=>'Menonton film dan drama korea, mendengarkan lagu,
                         bermain basket dan berorganisasi'
            ],
            [
                'kode'=>'H2',
                'nama'=>'Dhayu Intan',
                'hobi'=>'Bermain piano, bernyanyi dan membuat puzzle'
            ],
            [
                'kode'=>'H3',
                'nama'=>'Afifa Dwi',
                'hobi'=>'Mendengarkan musik, menonton film dan bernyanyi'
            ]
            ]);
    }
}
