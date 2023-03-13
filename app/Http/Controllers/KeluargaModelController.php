<?php

namespace App\Http\Controllers;

use App\Models\KeluargaModel;

class KeluargaModelController extends Controller
{
    public function index(){
        $keluarga = KeluargaModel::all();
        return view('keluarga')
                    ->with('klg',$keluarga);
    }
}
