<?php

namespace App\Http\Controllers;

use App\Models\MatakuliahModel;
use Illuminate\Http\Request;

class MatakuliahModelController extends Controller
{
    public function index(){
        $matakuliah = MatakuliahModel::all();
        return view('matakuliah.matakuliah')
                    ->with('mtk',$matakuliah);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matakuliah.create_matakuliah')
            ->with('url_form', url('/matakuliah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //validasi
         $request->validate([
            'nim' => 'required|string|max:10|unique:matakuliah,nim',
            'nama_mahasiswa' => 'required|string|max:50',
            'kelas' => 'required|string|max:6',
            'matakuliah' => 'required|string|max:200',
        ]);

        $data =MatakuliahModel::create($request->except(['_token']));
        return redirect('matakuliah')
            ->with('success', 'Matakuliah Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function show(MatakuliahModel $matakuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matakuliah = MatakuliahModel::find($id);
        return view('matakuliah.create_matakuliah')
            ->with('mtk', $matakuliah)
            ->with('url_form', url('/matakuliah/'. $id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|string|max:10|unique:matakuliah,nim,'.$id,
            'nama_mahasiswa' => 'required|string|max:50',
            'kelas' => 'required|string|max:6',
            'matakuliah' => 'required|string|max:200',
        ]);

        $data =MatakuliahModel::where('id', '=', $id)->update($request->except(['_token', '_method']));
        return redirect('matakuliah')
            ->with('success', 'matakuliah Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MatakuliahModel::where('id', '=', $id)->delete();
        return redirect('matakuliah')
        ->with('success', 'matakuliah berhasil Dihapus');
    }
}
