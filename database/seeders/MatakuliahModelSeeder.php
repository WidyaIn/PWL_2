<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatakuliahModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matakuliah')->insert([
            [
                'kode'=>'M1',
                'nama_mahasiswa'=>'Widya Indah Puspita Sari',
                'kelas'=>'TI-2A',
                'matakuliah'=>'Proyek 1, Manajemen proyek,
                               Jaringan Komputer, Pemograman Web Lanjut'
            ],
            [
                'kode'=>'M2',
                'nama_mahasiswa'=>'Serli Putri Maharani',
                'kelas'=>'TI-2H',
                'matakuliah'=>'Proyek 1, Manajemen proyek,
                               Jaringan Komputer, Pemograman Web Lanjut'
            ],
            [
                'kode'=>'M3',
                'nama_mahasiswa'=>'Chikal Nazmi',
                'kelas'=>'SIB-2E',
                'matakuliah'=>'Dasar Pemograman, Praktikum Dasar Pemograman
                               Agama Islam, Jaringan Kmputer'
            ],
            [
                'kode'=>'M4',
                'nama_mahasiswa'=>'Shobri',
                'kelas'=>'SIB-2E',
                'matakuliah'=>'Dasar Pemograman, Praktikum Dasar Pemograman
                               Agama Islam, Jaringan Kmputer'
            ]
            ]);
    }
}
