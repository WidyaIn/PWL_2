@extends('layouts.template')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Artikel</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Artikel</a></li>
              <li class="breadcrumb-item active">List Artikel</li>
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
          <h3 class="card-title">Daftar Artikel</h3>

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
                <th>Id</th>
                <th>judul</th>
                <th>penulis</th>
                <th>tanggal publis</th>
            </tr>
            </thead>
        <tbody>

        @foreach ($art as $id => $k)
            <tr>
                <td>{{$id}}</td>
                <td>{{$k->judul}}</td>
                <td>{{$k->penulis}}</td>
                <td>{{$k->tanggal_publis}}</td>
            </tr>
        @endforeach
    </tbody>
    </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          -@copyrightWidyaIn-
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
