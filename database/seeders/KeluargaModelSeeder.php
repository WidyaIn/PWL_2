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
                'kode'=>'K1',
                'nama'=>'Samulin',
                'kota_kelahiran'=>'Malang',
                'status'=>'Kepala Keluarga'
            ],
            [
                'kode'=>'K2',
                'nama'=>'Muji Tri',
                'kota_kelahiran'=>'Malang',
                'status'=>'Istri'
            ],
            [
                'kode'=>'K3',
                'nama'=>'Dessy Lutfiani',
                'kota_kelahiran'=>'Prabumulih',
                'status'=>'Anak'
            ],
            [
                'kode'=>'K4',
                'nama'=>'Widya Indah Puspita Sari',
                'kota_kelahiran'=>'Prabumulih',
                'status'=>'Anak'
            ]
            ]);

    }
}
