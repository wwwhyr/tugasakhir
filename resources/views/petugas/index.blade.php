@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h5 class="card-title mb-0 flex-grow-1">Data Petugas</h5>
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">
                                Tambah Data
                            </button>
                        </div>

                        <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalgridLabel">Tambah Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('petugas.store') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="nama" name="nama" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="username" name="username" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="daerah" class="form-label">Daerah</label>
                                                <input type="text" class="form-control" id="daerah" name="daerah" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div id="buttons-datatables_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                                <table id="buttons-datatables" class="display table table-bordered table-nowrap dataTable no-footer" style="width: 100%;" aria-describedby="buttons-datatables_info">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Username</th>
                                                            <th>Password</th>
                                                            <th>Daerah</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($petugass as $index => $petugas)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $petugas->nama }}</td>
                                                            <td>{{ $petugas->username }}</td>
                                                            <td>{{ $petugas->password }}</td>
                                                            <td>{{ $petugas->daerah }}</td>
                                                            <td>
                                                                <a href="{{ route('petugas.edit', $petugas->id) }}" class="btn btn-secondary btn-sm"><i class="ri-pencil-fill"></i></a>
                                                                <button class="btn btn-danger btn-sm" onclick="konfirmasiHapus(event, '{{ $petugas->id }}')"><i class="ri-delete-bin-5-line"></i></button>
                                                                <form id="form-hapus-{{ $petugas->id }}" action="{{ route('petugas.destroy', $petugas->id) }}" method="POST" style="display: none;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end row-->
                        </div>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end page-content -->
    @endsection