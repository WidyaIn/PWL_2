<?php

namespace Database\Seeders;

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
                'nim'=>'2141720087',
                'nama_mahasiswa'=>'Widya Indah Puspita Sari',
                'kelas'=>'TI-2A',
                'matakuliah'=>'Proyek 1, Manajemen proyek,
                               Jaringan Komputer, Pemograman Web Lanjut'
            ],
            [
                'nim'=>'2141720096',
                'nama_mahasiswa'=>'Serli Putri Maharani',
                'kelas'=>'TI-2H',
                'matakuliah'=>'Proyek 1, Manajemen proyek,
                               Jaringan Komputer, Pemograman Web Lanjut'
            ],
            [
                'nim'=>'2141720054',
                'nama_mahasiswa'=>'Chikal Nazmi',
                'kelas'=>'SIB-2E',
                'matakuliah'=>'Dasar Pemograman, Praktikum Dasar Pemograman
                               Agama Islam, Jaringan Kmputer'
            ],
            [
                'nim'=>'2141720032',
                'nama_mahasiswa'=>'Shobri',
                'kelas'=>'SIB-2E',
                'matakuliah'=>'Dasar Pemograman, Praktikum Dasar Pemograman
                               Agama Islam, Jaringan Kmputer'
            ]
            ]);
    }
}
