@extends('layouts.template')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Matakuliah</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Matakuliah</a></li>
              <li class="breadcrumb-item active">Daftar Matakuliah</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar Matakuliah</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Mahasiswa</th>
                <th>Kelas</th>
                <th>Matakuliah</th>
            </tr>
            </thead>
        <tbody>

        @foreach ($mtk as $kode => $m)
            <tr>
                <td>{{$kode}}</td>
                <td>{{$m->nama_mahasiswa}}</td>
                <td>{{$m->kelas}}</td>
                <td>{{$m->matakuliah}}</td>
            </tr>
        @endforeach
    </tbody>
    </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          -copyright@WidyaIn-
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  @endsection

  @push('custom_js')
    <script>
        alert("Selamat Datang")
    </script>
  @endpush
