<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaModel;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Mahasiswa_Matakuliah;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Storage;
use PDF;

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
        return view('mahasiswa.create_mahasiswa', ['kelas' => $kelas, 'url_form' => route('mahasiswa.store') /*redirect()->url('')*/]);

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
            'kelas' => 'required',
            'jk' => 'required|in:l,p',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|digits_between:6,15',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $foto_name = null;
        if ($request->file('image')) {
            $foto = $request->file('image');
            $foto_name = time() . '_' . $foto->getClientOriginalName();
            $foto_name = $request->file('image')->store('images', 'public');
        }

        $mahasiswa = new MahasiswaModel;
        $mahasiswa->nim = $request->get('nim');
        $mahasiswa->nama = $request->get('nama');
        $mahasiswa->jk = $request->get('jk');
        $mahasiswa->tempat_lahir = $request->get('tempat_lahir');
        $mahasiswa->tanggal_lahir = $request->get('tanggal_lahir');
        $mahasiswa->hp = $request->get('hp');
        $mahasiswa->alamat = $request->get('alamat');
        $mahasiswa->foto = $foto_name;
        $mahasiswa->save();

        $kelas = Kelas::find($request->get('kelas'));

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

        return view('mahasiswa.detail')->with('mahasiswa', $mahasiswa);
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
        $mhs = MahasiswaModel::with('kelas')->where('id', $id)->first();
        $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
        $url_form = route('mahasiswa.update', $id);
        return view('mahasiswa.create_mahasiswa', compact('mhs', 'kelas', 'url_form'));


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
        $mahasiswa = MahasiswaModel::where("id", "=", $id)->first();

        $request->validate([
            'nim' => 'required|string|max:10|unique:mahasiswa,nim,' . $id,
            'nama' => 'required|string|max:50',
            'jk' => 'required|in:l,p',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|digits_between:6,15',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $mahasiswa = MahasiswaModel::with('kelas')->where('id', $id)->first();
        $mahasiswa->nim = $request->get('nim');
        $mahasiswa->nama = $request->get('nama');
        $mahasiswa->foto = $request->get('foto');
        $mahasiswa->jk = $request->get('jk');
        $mahasiswa->tempat_lahir = $request->get('tempat_lahir');
        $mahasiswa->tanggal_lahir = $request->get('tanggal_lahir');
        $mahasiswa->hp = $request->get('hp');
        $mahasiswa->alamat = $request->get('alamat');

        $foto_name = null;
        if ($mahasiswa->foto && file_exists(storage_path('app/public/' . $mahasiswa->foto))) {
            Storage::delete(['public/' . $mahasiswa->foto]);;
        }

        $foto_name = $request->file('image')->store('images', 'public');
        $mahasiswa->foto = $foto_name;

        $mahasiswa->save();

        // $kelas = new Kelas;
        // $kelas->id = $request->get('Kelas');
        $kelas = Kelas::find($request->get('kelas'));

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

    public function nilai($id)
    {
        // Join relasi ke mahasiswa dan mata kuliah
        $mhs = MahasiswaModel::with('kelas', 'matakuliah')->where('id', $id)->first();
        $matkul = Mahasiswa_Matakuliah::with('matakuliah', 'mahasiswa')->where('mahasiswa_id', $id)->get();
        //dd($mhs[0]);
        // Menampilkan nilai
        return view('mahasiswa.nilai', compact('mhs', 'matkul'));
    }

    public function cetak_pdf($id)
    {
        $mhs = MahasiswaModel::find($id);
        $mahasiswamatakuliah = Mahasiswa_Matakuliah::with('mahasiswa', 'matakuliah')->where('mahasiswa_id',  $id)->get();

        $pdf = PDF::loadview('mahasiswa.nilai_pdf', ['mhs' => $mhs, 'mm' => $mahasiswamatakuliah]);
        return $pdf->stream();
    }
}
