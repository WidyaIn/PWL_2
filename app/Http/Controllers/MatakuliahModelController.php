<?php

namespace App\Http\Controllers;

use App\Models\MatakuliahModel;


class MatakuliahModelController extends Controller
{
    public function index(){
        $matakuliah = MatakuliahModel::all();
        return view('matakuliah')
                    ->with('mtk',$matakuliah);
    }
}
