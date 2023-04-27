<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasModel extends Model
{
    use HasFactory;
    protected $table = 'fasilitas';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'kode_gedung',
        'nama_gedung',
        'kapasitas',
        'lokasi',
        'kondisi'
    ];
}
