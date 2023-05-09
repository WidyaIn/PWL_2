@extends('layouts.template')
@section('content')
<div class="container mt-5">
<div class="row justify-content-center align-items-center">
<div class="card" style="width: 24rem;">
<div class="card-header">
Detail Mata Kuliah
</div>
<div class="card-body">
    <ul class="list-group list-group-flush">
        <li class="list-group-item"></b>Id : </b> {{$matakuliah->id}}</li>
        <li class="list-group-item"></b>Nama MataKuliah : </b> {{$matakuliah->nama_matkul}}</li>
        <li class="list-group-item"></b>SKS : </b> {{$matakuliah->sks}}</li>
        <li class="list-group-item"></b>Jam : </b> {{$matakuliah->jam}}</li>
        <li class="list-group-item"></b>Semester : </b> {{$matakuliah->semester}}</li>

    </ul>
</div>
<a class="btn btn-success mt-3" href="{{ route('matakuliah.index') }}">Kembali</a>
</div>
</div>
</div>
@endsection
