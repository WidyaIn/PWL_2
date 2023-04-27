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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Fasilitas</li>
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
                {!! (isset($fs))? method_field('PUT'): ''!!}
                <div class="form-group">
                    <label>KODE GEDUNG</label>
                    <input class="form-control @error('kode_gedung') is-invalid @enderror" value="{{ isset($fs)? $fs->kode_gedung :old('kode_gedung') }}" name="kode_gedung" type="text"/>
                    @error('kode_gedung')
                        <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>NAMA GEDUNG</label>
                    <input class="form-control @error('nama_gedung') is-invalid @enderror" value="{{ isset($fs)? $fs->nama_gedung :old('nama_gedung') }}" name="nama_gedung" type="text"/>
                    @error('nama_gedung')
                        <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>KAPASITAS</label>
                    <input class="form-control @error('kapasitas') is-invalid @enderror" value="{{ isset($fs)? $fs->kapasitas :old('kapasitas') }}" name="kapasitas" type="text"/>
                    @error('kapasitas')
                        <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>LOKASI</label>
                    <input class="form-control @error('lokasi') is-invalid @enderror" value="{{ isset($fs)? $fs->lokasi :old('lokasi') }}" name="lokasi" type="text"/>
                    @error('lokasi')
                        <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>KONDISI</label>
                    <input class="form-control @error('kondisi') is-invalid @enderror" value="{{ isset($fs)? $fs->kondisi :old('kondisi') }}" name="kondisi" type="text"/>
                    @error('kondisi')
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
