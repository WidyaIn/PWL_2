<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa_Matakuliah;

class Matakuliah extends Model
{
    use HasFactory;
    protected $table = 'matakuliah';
    protected $guarded = ['id'];
    protected $fillable =[
        'nama_matkul',
        'sks',
        'jam',
        'semester'
    ];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa_Matakuliah::class,'matakuliah_id', 'id');
    }
}
