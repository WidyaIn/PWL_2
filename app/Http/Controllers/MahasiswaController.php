<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaModel;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Mahasiswa_Matakuliah;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PDF;
use Yajra\DataTables\DataTables;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('mahasiswa.mahasiswa');
        // //yang semula Mahasiswa::all, diubah menjadi with() yang menyatakan relasi
        // $mahasiswa = MahasiswaModel::with('kelas')->get();
        // $paginate = MahasiswaModel::orderBy('id', 'asc')->paginate(3);
        // // dd($paginate);
        // return view('mahasiswa.mahasiswa', ['mahasiswa' => $mahasiswa, 'paginate' => $paginate]);

        // $mahasiswa = MahasiswaModel::all();
        // return view('mahasiswa.mahasiswa')
        //             ->with('mhs',$mahasiswa);
    }

    public function data()
    {
        $data = MahasiswaModel::selectRaw('id, nim, nama, foto, jk, tempat_lahir, tanggal_lahir, alamat, hp, kelas_id');

        return DataTables::of($data)
            ->addIndexColumn()
            ->make(true);
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
        $rule = [
            'nim' => 'required|string|max:10|unique:mahasiswa,nim',
            'nama' => 'required|string|max:50',
            // 'kelas' => 'required',
            'jk' => 'required|in:l,p',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|digits_between:6,15',
            // 'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $validator = Validator::make($request->all(), $rule);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'modal_close' => false,
                'message' => 'Data gagal ditambahkan. ' . $validator->errors()->first(),
                'data' => $validator->errors()
            ]);
        }

        $mhs = MahasiswaModel::create($request->all());
        return response()->json([
            'status' => ($mhs),
            'modal_close' => false,
            'message' => ($mhs) ? 'Data berhasil ditambahkan' : 'Data gagal ditambahkan',
            'data' => null
        ]);
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
        $rule = [
            // 'nim' => 'required|string|max:10|unique:mahasiswa,nim,' . $id,
            'nim' => ['required', 'string', 'max:10', \Illuminate\Validation\Rule::unique('mahasiswa', 'nim')->ignore($id, 'id')],
            'nama' => 'required|string|max:50',
            'jk' => 'required|in:l,p',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|digits_between:6,15',
            // 'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $validator = Validator::make($request->all(), $rule);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'modal_close' => false,
                'message' => 'Data gagal diedit. ' . $validator->errors()->first(),
                'data' => $validator->errors()
            ]);
        }

        $mhs = MahasiswaModel::where('id', $id)->update($request->except('_token', '_method'));

        return response()->json([
            'status' => ($mhs),
            'modal_close' => $mhs,
            'message' => ($mhs) ? 'Data berhasil diedit' : 'Data gagal diedit',
            'data' => null
        ]);
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
