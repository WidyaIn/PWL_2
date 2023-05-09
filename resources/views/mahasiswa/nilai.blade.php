@extends('layouts.template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="col-sm-12 text-center">
                    <h3>JURUSAN TEKNOLOGI INFORMASI - POLITEKNIK NEGERI MALANG</h3>
                    <BR>
                    <h2>KARTU HASIL STUDI (KHS)</h2>
                </div>

        <br><br><br>

        <div class="card-header">
            <div class="card-title">
            <b>Nama &nbsp:</b> {{ $mhs->nama}}<br>
            <b>NIM &nbsp &nbsp : </b>{{ $mhs->nim}}<br>
            <b>Kelas &nbsp : </b> {{ $mhs->kelas->nama_kelas}}<br>
        </div>

        <br>
         <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>
<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
            <tr>
            <th>Matakuliah</th>
            <th>SKS</th>
            <th>Semester</th>
            <th>Nilai</th>
            </tr>
        </thead>
            @foreach ($matkul as $n)
            <tr>
            <td>{{ $n->matakuliah->nama_matkul }}</td>
            <td>{{ $n->matakuliah->sks }}</td>
            <td>{{ $n->matakuliah->semester }}</td>
            <td>{{ $n->nilai  }}</td>
            </tr>
            @endforeach
            </table>
    </div>
@endsection
