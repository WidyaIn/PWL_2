@extends('layouts.template')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>matakuliah</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">matakuliah</li>
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
          <h3 class="card-title">kelas : TI-2A</h3>

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
            <form method="POST" action="{{ $url_form}}">
                @csrf
                {!! (isset($mtk))? method_field('PUT'): ''!!}
                <div class="form-group">
                    <label>NIM</label>
                    <input class="form-control @error('nim') is-invalid @enderror" value="{{ isset($mtk)? $mtk->nim :old('nim') }}" name="nim" type="text"/>
                    @error('nim')
                        <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>NAMA MAHASISWA</label>
                    <input class="form-control @error('nama_mahasiswa') is-invalid @enderror" value="{{ isset($mtk)? $mtk->nama_mahasiswa :old('nama_mahasiswa') }}" name="nama_mahasiswa" type="text"/>
                    @error('nama_mahasiswa')
                        <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>KELAS</label>
                    <input class="form-control @error('kelas') is-invalid @enderror" value="{{ isset($mtk)? $mtk->kelas :old('kelas') }}" name="kelas" type="text"/>
                    @error('kelas')
                        <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>MATAKULIAH</label>
                    <input class="form-control @error('matakuliah') is-invalid @enderror" value="{{ isset($mtk)? $mtk->matakuliah :old('matakuliah') }}" name="matakuliah" type="text"/>
                    @error('matakuliah')
                        <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
          </div>
          <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  @endsection
