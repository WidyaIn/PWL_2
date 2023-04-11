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
                'nim'=>'2141720034',
                'nama'=>'Widya Indah Puspita Sari',
                'hobi'=>'Menonton film dan drama korea, mendengarkan lagu,
                         bermain basket dan berorganisasi'
            ],
            [
                'nim'=>'2141720035',
                'nama'=>'Dhayu Intan',
                'hobi'=>'Bermain piano, bernyanyi dan membuat puzzle'
            ],
            [
                'nim'=>'2141720036',
                'nama'=>'Afifa Dwi',
                'hobi'=>'Mendengarkan musik, menonton film dan bernyanyi'
            ]
            ]);
    }
}
