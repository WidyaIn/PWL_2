<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaModel extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'nim',
        'nama',
        'foto',
        'jk',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'hp',
        'kelas_id',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    public function matakuliah()
    {
        return $this->hasMany(Mahasiswa_Matakuliah::class,  'mahasiswa_id', 'id');
    }
}
