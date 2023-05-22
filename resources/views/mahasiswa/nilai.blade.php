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
                        <b>Nama &nbsp:</b> {{ $mhs->nama }}<br>
                        <b>NIM &nbsp &nbsp : </b>{{ $mhs->nim }}<br>
                        <b>Kelas &nbsp : </b> {{ $mhs->kelas->nama_kelas }}<br>
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
                                <td>{{ $n->nilai }}</td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="4" class="text-center">
                                Data Tidak ada
                            </td>
                        </tr>

                        </tbody>
                    </table>
                    <div class="card-body">
                        <div class="float-right my-2">
                            <a href="{{ route('cetak', $mhs->id) }}" class="btn btn-sm btn-danger my-2">Cetak PDF</a>
                        </div>
                        <div class="float-left my-2">
                            <a class="btn btn-success my-2" href="{{ route('mahasiswa.index') }}">Kembali</a>
                        </div>

                    </div>
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
    <!-- /.content-wrapper -->
@endsection
