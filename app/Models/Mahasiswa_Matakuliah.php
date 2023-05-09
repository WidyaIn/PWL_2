<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Models\MahasiswaModel;
use App\Models\Matakuliah;

class Mahasiswa_Matakuliah extends Model
{
    use HasFactory;
    protected $table='mahasiswa_matakuliah'; //mendefinisikan bahwa model ini terkait dengan tabel kelas
    protected $fillable =[
        'mahasiswa_id',
        'matakuliah_id',
        'nilai',
    ];

    public function mahasiswa(){
        return $this->belongsTo(MahasiswaModel::class, 'mahasiswa_id', 'id');
    }

    public function matakuliah(){
        return $this->belongsTo(Matakuliah::class, 'matakuliah_id', 'id');
    }


}
