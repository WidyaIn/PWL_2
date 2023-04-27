<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtikelModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artikel')->insert([
            [
                'id' => 'P1',
                'judul' => 'Pemograman Web',
                'penulis' => 'Universitas Pasundan',
                'tanggal_publis' => '2019-07-04'
            ],
            [
                'id' => 'P2',
                'judul' => 'Apa itu Java?',
                'penulis' => 'niagahoster.co.id',
                'tanggal_publis' => '2021-08-26'
            ],
            [
                'id' => 'P3',
                'judul' => 'Pengenalan Bahasa java',
                'penulis' => 'qubisa.com',
                'tanggal_publis' => '2021-03-22'
            ]
        ]);
    }
}
