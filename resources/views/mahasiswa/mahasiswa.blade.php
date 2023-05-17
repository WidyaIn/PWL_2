@extends('layouts.template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Mahasiswa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Mahasiswa</a></li>
                            <li class="breadcrumb-item active">Daftar Mahasiswa</li>
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
                    <h3 class="card-title">data Mahasiswa</h3>

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

                    <a href="{{ url('mahasiswa/create') }}" class="btn btn-sm btn-success my-2">Tambah Data</a>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>JK</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>HP</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($mahasiswa->count() > 0)
                                @foreach ($mahasiswa as $i => $mhs)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $mhs->nim }}</td>
                                        <td>{{ $mhs->nama }}</td>
                                        <td>{{ $mhs->kelas->nama_kelas }}</td>
                                        <td>{{ $mhs->jk }}</td>
                                        <td>{{ $mhs->tempat_lahir }}</td>
                                        <td>{{ $mhs->tanggal_lahir }}</td>
                                        <td>{{ $mhs->alamat }}</td>
                                        <td>{{ $mhs->hp }}</td>
                                        <td>

                                            <!-- Bikin tombol edit dan delete -->
                                            <div class="btn-group">
                                                <a href="{{ route('mahasiswa.edit', [$mhs->id]) }}"
                                                    class="btn btn-sm btn-warning mr-2">edit</a>
                                                <a href="{{ route('mahasiswa.show', [$mhs->nim]) }}"
                                                    class="btn btn-sm btn-primary mr-2">show</a>
                                                <a href="{{ route('nilai', [$mhs->id]) }}"
                                                    class="btn btn-sm btn-success mr-2">nilai</a>
                                                <form method="POST" action="{{ url('/mahasiswa/' . $mhs->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-sm btn-danger mr-2">DELETE</button>
                                                </form>
                                            </div>

                                            {{-- <a href="{{ route('mahasiswa.show', [$mhs->nim]) }}" class="btn btn-sm btn-warning">show</a>
                        <a href="{{ url('/mahasiswa/'. $mhs->id.'/edit') }}" class="btn btn-sm btn-warning">edit</a>
                        <a href="{{ route('nilai', [$mhs->id]) }}" class="btn btn-sm btn-warning">Nilai</a>
                        <form method="POST" action="{{ url('/mahasiswa/'.$mhs->id) }}" >
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger">hapus</button>
                        </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">Data tidak ada</td>
                                </tr>
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
