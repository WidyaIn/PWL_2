<?php

namespace App\Http\Controllers;

use App\Models\KeluargaModel;
use Illuminate\Http\Request;

class KeluargaModelController extends Controller
{
    public function index(){
        $keluarga = KeluargaModel::all();
        return view('keluarga.keluarga')
                    ->with('klg',$keluarga);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keluarga.create_keluarga')
            ->with('url_form', url('/keluarga'));
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
            'nik' => 'required|string|max:10|unique:keluarga,nik',
            'nama' => 'required|string|max:50',
            'kota_kelahiran' => 'required|string|max:25',
            'status' => 'required|string|max:25',
        ]);

        $data =KeluargaModel::create($request->except(['_token']));
        return redirect('keluarga')
            ->with('success', 'Keluarga Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function show(KeluargaModel $keluarga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $keluarga = KeluargaModel::find($id);
        return view('keluarga.create_keluarga')
            ->with('klg', $keluarga)
            ->with('url_form', url('/keluarga/'. $id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required|string|max:10|unique:keluarga,nik,'.$id,
            'nama' => 'required|string|max:50',
            'kota_kelahiran' => 'required|string|max:25',
            'status' => 'required|string|max:25',
        ]);

        $data =KeluargaModel::where('id', '=', $id)->update($request->except(['_token', '_method']));
        return redirect('keluarga')
            ->with('success', 'keluarga Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KeluargaModel::where('id', '=', $id)->delete();
        return redirect('keluarga')
        ->with('success', 'keluarga berhasil Dihapus');
    }
}
