@extends('layouts.template')
@section('content')
<div class="container mt-5">
<div class="row justify-content-center align-items-center">
<div class="card" style="width: 24rem;">
<div class="card-header">
Detail Mahasiswa
</div>
<div class="card-body">
<ul class="list-group list-group-flush">
<li class="list-group-item"><b>Nim: </b>{{$Mahasiswa->nim}}</li>
<li class="list-group-item"><b>Nama: </b>{{$Mahasiswa->nama}}</li>
<li class="list-group-item"><b>Kelas: </b>{{$Mahasiswa->kelas->nama_kelas}}</li>
<li class="list-group-item"><b>JK: </b>{{$Mahasiswa->jk}}</li>
<li class="list-group-item"><b>Tempat Lahir: </b>{{$Mahasiswa->tempat_lahir}}</li>
<li class="list-group-item"><b>Tanggal Lahir: </b>{{$Mahasiswa->tanggal_lahir}}</li>
<li class="list-group-item"><b>HP: </b>{{$Mahasiswa->hp}}</li>

</ul>
</div>
<a class="btn btn-success mt-3" href="{{ route('mahasiswa.index') }}">Kembali</a>
</div>
</div>
</div>
@endsection
