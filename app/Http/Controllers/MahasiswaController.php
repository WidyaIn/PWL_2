<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\MahasiswaModel;
use Illuminate\Http\Request;
use App\Models\Kelas;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //yang semula Mahasiswa::all, diubah menjadi with() yang menyatakan relasi
        $mahasiswa = MahasiswaModel::with('kelas')->get();
        $paginate = MahasiswaModel::orderBy('id', 'asc')->paginate(3);
        // dd($paginate);
        return view('mahasiswa.mahasiswa', ['mahasiswa' => $mahasiswa, 'paginate' => $paginate]);

        // $mahasiswa = MahasiswaModel::all();
        // return view('mahasiswa.mahasiswa')
        //             ->with('mhs',$mahasiswa);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
        return view('mahasiswa.create_mahasiswa',['kelas' => $kelas, 'url_form' => route('mahasiswa.store') /*redirect()->url('')*/ ]);

        // return view('mahasiswa.create_mahasiswa')
        //     ->with('url_form', url('/mahasiswa'));
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
            'nim' => 'required|string|max:10|unique:mahasiswa,nim',
            'nama' => 'required|string|max:50',
            'Kelas' => 'required',
            'jk' => 'required|in:l,p',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|digits_between:6,15',
        ]);

        $mahasiswa = new MahasiswaModel;
        $mahasiswa->nim = $request->get('nim');
        $mahasiswa->nama = $request->get('nama');
        $mahasiswa->kelas_id = $request->get('Kelas');
        $mahasiswa->jk = $request->get('jk');
        $mahasiswa->tempat_lahir = $request->get('tempat_lahir');
        $mahasiswa->tanggal_lahir = $request->get('tanggal_lahir');
        $mahasiswa->hp = $request->get('hp');

        $kelas = new Kelas;
        $kelas->id = $request->get('Kelas');

        //fungsi eloquent untuk menambah data dengan relasi belongsTo
        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();

        // $data =MahasiswaModel::create($request->except(['_token']));

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($nim)
    {
        //menampilkan detail data berdasarkan Nim Mahasiswa
        //code sebelum dibuat relasi --> $mahasiswa = Mahasiswa::find($Nim)
        $mahasiswa = MahasiswaModel::with('kelas')->where('nim', $nim)->first();

        return view('mahasiswa.detail', ['Mahasiswa' => $mahasiswa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menampilkan detail data dengan menemukan berdasarkan id Mahasiswa untuk diedit
        $mahasiswa = MahasiswaModel::with('kelas')->where('id', $id)->first();
        $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
        $url_form = route('mahasiswa.store');
        return view('mahasiswa.create_mahasiswa', compact('mahasiswa', 'kelas', 'url_form'));


        // $mahasiswa = MahasiswaModel::find($id);
        // return view('mahasiswa.create_mahasiswa')
        //     ->with('mhs', $mahasiswa)
        //     ->with('url_form', url('/mahasiswa/'. $id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|string|max:10|unique:mahasiswa,nim,'.$id,
            'nama' => 'required|string|max:50',
            'Kelas' => 'required',
            'jk' => 'required|in:l,p',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|digits_between:6,15',
        ]);

        $mahasiswa = MahasiswaModel::with('kelas')->where('id', $id)->first;
        $mahasiswa->nim = $request->get('nim');
        $mahasiswa->nama = $request->get('nama');
        $mahasiswa->kelas_id = $request->get('Kelas');
        $mahasiswa->jk = $request->get('jk');
        $mahasiswa->tempat_lahir = $request->get('tempat_lahir');
        $mahasiswa->tanggal_lahir = $request->get('tanggal_lahir');
        $mahasiswa->hp = $request->get('hp');
        $mahasiswa->save();

        $kelas = new Kelas;
        $kelas->id = $request->get('Kelas');

        //fungsi eloquent untuk mengupdate data dengan relasi belongsTo
        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Diupdate');

        // $data =MahasiswaModel::where('id', '=', $id)->update($request->except(['_token', '_method']));
        // return redirect('mahasiswa')
        //     ->with('success', 'Mahasiswa Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MahasiswaModel::where('id', '=', $id)->delete();
        return redirect('mahasiswa')
        ->with('success', 'Mahasiswa berhasil Dihapus');
    }
}
