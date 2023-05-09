<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index(){
        $matakuliah = Matakuliah::all();
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
            'nama_matkul' => 'required|string|max:30|unique:matakuliah,id,',
            'sks' => 'required|integer',
            'jam' => 'required|integer',
            'semester' => 'required|string|max:12',
        ]);

        $data =Matakuliah::create($request->except(['_token']));
        return redirect('matakuliah')
            ->with('success', 'Matakuliah Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matakuliah = Matakuliah::find($id);
        return view('matakuliah.detail', compact('matakuliah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matakuliah = Matakuliah::find($id);
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
                'nama_matkul' => 'required|string|max:30|unique:matakuliah,id,'.$id,
                'sks' => 'required|integer',
                'jam' => 'required|integer',
                'semester' => 'required|string|max:12',
        ]);

        $data =Matakuliah::where('id', '=', $id)->update($request->except(['_token', '_method']));
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
        Matakuliah::where('id', '=', $id)->delete();
        return redirect('matakuliah')
        ->with('success', 'matakuliah berhasil Dihapus');
    }
}
