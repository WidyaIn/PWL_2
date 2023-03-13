<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatakuliahModel extends Model
{
    use HasFactory;

    protected $table = 'matakuliah';
    protected $primarykey = 'kode';
    protected $keyType = 'string';
}
