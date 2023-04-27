@extends('layouts.template')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fasilitas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Fasilitas</a></li>
              <li class="breadcrumb-item active">Daftar Fasilitas</li>
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
          <h3 class="card-title">data Fasilitas</h3>

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

            <a href="{{url('fasilitas/create')}}" class="btn btn-sm btn-success my-2">Tambah Data</a>

            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>KODE GEDUNG</th>
                  <th>NAMA GEDUNG</th>
                  <th>KAPASITAS</th>
                  <th>LOKASI</th>
                  <th>KONDISI</th>
                </tr>
              </thead>
              <tbody>
                @if($fs->count() > 0)
                  @foreach($fs as $i => $f)
                    <tr>
                      <td>{{++$i}}</td>
                      <td>{{$f->kode_gedung}}</td>
                      <td>{{$f->nama_gedung}}</td>
                      <td>{{$f->kapasitas}}</td>
                      <td>{{$f->lokasi}}</td>
                      <td>{{$f->kondisi}}</td>
                      <td>
                        <!-- Bikin tombol edit dan delete -->
                        <a href="{{ url('/fasilitas/'. $f->id.'/edit') }}" class="btn btn-sm btn-warning">edit</a>

                        <form method="POST" action="{{ url('/fasilitas/'.$f->id) }}" >
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger">hapus</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                @else
                  <tr><td colspan="6" class="text-center">Data tidak ada</td></tr>
                @endif
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
