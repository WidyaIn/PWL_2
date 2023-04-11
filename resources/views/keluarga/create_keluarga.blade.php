@extends('layouts.template')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Keluarga</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Keluarga</a></li>
              <li class="breadcrumb-item active">Daftar Keluarga</li>
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
          <h3 class="card-title">Daftar Keluarga</h3>

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
                {!! (isset($klg))? method_field('PUT'): ''!!}
                <div class="form-group">
                    <label>NIK</label>
                    <input class="form-control @error('nik') is-invalid @enderror" value="{{ isset($klg)? $klg->nik :old('nik') }}" name="nik" type="text"/>
                    @error('nik')
                        <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>NAMA</label>
                    <input class="form-control @error('nama') is-invalid @enderror" value="{{ isset($klg)? $klg->nama :old('nama') }}" name="nama" type="text"/>
                    @error('nama')
                        <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>KOTA KELAHIRAN</label>
                    <input class="form-control @error('kota_kelahiran') is-invalid @enderror" value="{{ isset($klg)? $klg->kota_kelahiran :old('kota_kelahiran') }}" name="kota_kelahiran" type="text"/>
                    @error('kota_kelahiran')
                        <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>STATUS</label>
                    <input class="form-control @error('status') is-invalid @enderror" value="{{ isset($klg)? $klg->status :old('status') }}" name="status" type="text"/>
                    @error('status')
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
