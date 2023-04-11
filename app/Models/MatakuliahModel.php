<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatakuliahModel extends Model
{
    use HasFactory;

    protected $table = 'matakuliah';
    public $timestamps = false;
    protected $primarykey = 'id';
    protected $keyType = 'string';

    protected $fillable =[
        'nim',
        'nama_mahasiswa',
        'kelas',
        'matakuliah'
    ];
}
