@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h5 class="card-title mb-0 flex-grow-1">Data Balita</h5>
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
                                        <form action="{{ route('masyarakat.store') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                                <input type="text" class="form-control" id="kecamatan" name="kecamatan" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="desa" class="form-label">Desa</label>
                                                <input type="text" class="form-control" id="desa" name="desa" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="nama" name="nama" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="usia" class="form-label">Usia</label>
                                                <input type="number" class="form-control" id="usia" name="usia" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tinggi_badan" class="form-label">Tinggi Badan (cm)</label>
                                                <input type="number" class="form-control" id="tinggi_badan" name="tinggi_badan" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="berat_badan" class="form-label">Berat Badan (kg)</label>
                                                <input type="number" class="form-control" id="berat_badan" name="berat_badan" required>
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
                                    <!-- <div class="dt-buttons"><button class="dt-button buttons-csv buttons-html5" tabindex="0" aria-controls="buttons-datatables" type="button"><span>CSV</span></button> <button class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="buttons-datatables" type="button"><span>Excel</span></button> <button class="dt-button buttons-print" tabindex="0" aria-controls="buttons-datatables" type="button"><span>Print</span></button> <button class="dt-button buttons-pdf buttons-html5" tabindex="0" aria-controls="buttons-datatables" type="button"><span>PDF</span></button> </div> -->
                                    <table id="buttons-datatables" class="display table table-bordered table-nowrap dataTable no-footer" style="width: 100%;" aria-describedby="buttons-datatables_info">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kecamatan</th>
                                                <th>Desa</th>
                                                <th>Nama</th>
                                                <th>Usia (bulan)</th>
                                                <th>Tinggi Badan (cm)</th>
                                                <th>Berat Badan (kg)</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($masyarakats as $index => $masyarakat)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $masyarakat->kecamatan }}</td>
                                                <td>{{ $masyarakat->desa }}</td>
                                                <td>{{ $masyarakat->nama }}</td>
                                                <td>{{ $masyarakat->usia }}</td>
                                                <td>{{ $masyarakat->tinggi_badan }}</td>
                                                <td>{{ $masyarakat->berat_badan }}</td>
                                                <td>{{ $masyarakat->status }}</td>
                                                <td>
                                                    <a href="{{ route('masyarakat.edit', $masyarakat->id) }}" class="btn btn-secondary btn-sm"><i class="ri-pencil-fill"></i></a>
                                                    <button class="btn btn-danger btn-sm" onclick="konfirmasiHapus(event, '{{ $masyarakat->id }}' )"><i class="ri-delete-bin-5-line"></i></button>
                                                    <form id="form-hapus-{{ $masyarakat->id }}" action="{{ route('masyarakat.destroy', $masyarakat->id) }}" method="POST" style="display: none;">
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