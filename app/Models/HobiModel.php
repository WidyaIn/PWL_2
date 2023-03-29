<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HobiModel extends Model
{
    use HasFactory;

    protected $table = 'hobi';
    protected $primarykey = 'kode';
    protected $keyType = 'string';

    // protected $table = '';
    // protected $primarykey = '';
    // protected $keyType = '';
}
