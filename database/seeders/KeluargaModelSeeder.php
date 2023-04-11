<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeluargaModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keluarga')->insert([
            [
                'nik'=>'2221720067',
                'nama'=>'Samulin',
                'kota_kelahiran'=>'Malang',
                'status'=>'Kepala Keluarga'
            ],
            [
                'nik'=>'2221720059',
                'nama'=>'Muji Tri',
                'kota_kelahiran'=>'Malang',
                'status'=>'Istri'
            ],
            [
                'nik'=>'2221720012',
                'nama'=>'Dessy Lutfiani',
                'kota_kelahiran'=>'Prabumulih',
                'status'=>'Anak'
            ],
            [
                'nik'=>'2221720044',
                'nama'=>'Widya Indah Puspita Sari',
                'kota_kelahiran'=>'Prabumulih',
                'status'=>'Anak'
            ]
            ]);

    }
}
