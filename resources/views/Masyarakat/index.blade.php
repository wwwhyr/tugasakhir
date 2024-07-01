@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h5 class="card-title mb-0 flex-grow-1">Data Masyarakat</h5>
                            <a href="{{ route('masyarakat.updateStatus') }}" class="btn btn-primary btn-sm" style="margin-right: 10px;">Update Status</a>
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalgrid" onclick="openAddModal()">
                                Tambah Data
                            </button>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('masyarakat.import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="file">Upload File Excel:</label>
                                    <div class=" col-lg-4 d-flex align-items-center">
                                        <input type="file" name="file" class="form-control form-control-sm me-2" required>
                                        <button type="submit" class="btn btn-primary btn-sm">Import</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalgridLabel">Tambah/Edit Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
        <form id="masyarakat-form" action="{{ route('masyarakat.store') }}" method="POST">
            @csrf
            <input type="hidden" id="method" name="_method" value="POST">
            <input type="hidden" id="id" name="id" value="">
            <div class="mb-3">
                <label for="kecamatan" class="form-label">Kecamatan</label>
                <select class="form-control" id="kecamatan" name="kecamatan" required>
                    <option value="">Pilih Kecamatan</option>
                    @foreach($kecamatans as $kecamatan)
                    <option value="{{ $kecamatan }}">{{ $kecamatan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="desa" class="form-label">Desa</label>
                <select class="form-control" id="desa" name="desa" required>
                    <option value="">Pilih Desa</option>
                </select>
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
                                <table id="buttons-datatables" class="display table table-bordered table-nowrap dataTable no-footer" style="width: 100%;" aria-describedby="buttons-datatables_info">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kecamatan</th>
                                            <th>Desa</th>
                                            <th>Nama</th>
                                            <th>Usia</th>
                                            <th>Tinggi Badan</th>
                                            <th>Berat Badan</th>
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
                                                <button class="btn btn-secondary btn-sm" data-id="{{ $masyarakat->id }}" data-kecamatan="{{ $masyarakat->kecamatan }}" data-desa="{{ $masyarakat->desa }}" data-nama="{{ $masyarakat->nama }}" data-usia="{{ $masyarakat->usia }}" data-tinggi="{{ $masyarakat->tinggi_badan }}" data-berat="{{ $masyarakat->berat_badan }}" data-bs-toggle="modal" data-bs-target="#exampleModalgrid" onclick="openEditModal(this)"><i class="ri-pencil-fill"></i></button>
                                                <button class="btn btn-danger btn-sm" onclick="konfirmasiHapus(event, '{{ $masyarakat->id }}')"><i class="ri-delete-bin-5-line"></i></button>
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
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end page-content -->
</div>
@endsection

<script>
    function openAddModal() {
        document.getElementById('masyarakat-form').reset();
        document.getElementById('method').value = 'POST';
        document.getElementById('masyarakat-form').action = '{{ route("masyarakat.store") }}';
    }

    function openEditModal(button) {
        var id = button.getAttribute('data-id');
        var kecamatan = button.getAttribute('data-kecamatan');
        var desa = button.getAttribute('data-desa');
        var nama = button.getAttribute('data-nama');
        var usia = button.getAttribute('data-usia');
        var tinggi = button.getAttribute('data-tinggi');
        var berat = button.getAttribute('data-berat');

        document.getElementById('id').value = id;
        document.getElementById('kecamatan').value = kecamatan;
        document.getElementById('desa').value = desa;
        document.getElementById('nama').value = nama;
        document.getElementById('usia').value = usia;
        document.getElementById('tinggi_badan').value = tinggi;
        document.getElementById('berat_badan').value = berat;
        document.getElementById('method').value = 'PUT';
        document.getElementById('masyarakat-form').action = '/masyarakat/' + id;

        // Fetch desa options based on selected kecamatan
        fetch('/daerahs/desa/' + kecamatan)
            .then(response => response.json())
            .then(data => {
                var desaSelect = document.getElementById('desa');
                desaSelect.innerHTML = '<option value="">Pilih Desa</option>';
                for (var id in data) {
                    var option = document.createElement('option');
                    option.value = data[id];
                    option.textContent = data[id];
                    desaSelect.appendChild(option);
                }
                desaSelect.value = desa;
            });
    }

    document.addEventListener('DOMContentLoaded', function() {
        var kecamatanSelect = document.getElementById('kecamatan');
        var desaSelect = document.getElementById('desa');

        kecamatanSelect.addEventListener('change', function() {
            var kecamatan = this.value;

            // Clear the desa options
            desaSelect.innerHTML = '<option value="">Pilih Desa</option>';

            if (kecamatan) {
                fetch('/daerahs/desa/' + kecamatan)
                    .then(response => response.json())
                    .then(data => {
                        for (var id in data) {
                            var option = document.createElement('option');
                            option.value = data[id];
                            option.textContent = data[id];
                            desaSelect.appendChild(option);
                        }
                    });
            }
        });
    });
</script>
<script>
    function konfirmasiHapus(event, id) {
        event.preventDefault();
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Data ini akan dihapus secara permanen!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Use AJAX to submit the form
                var xhr = new XMLHttpRequest();
                var form = document.getElementById('form-hapus-' + id);
                var formData = new FormData(form);

                xhr.open("POST", form.action, true);
                xhr.setRequestHeader("X-CSRF-TOKEN", '{{ csrf_token() }}');

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Remove the deleted row from the table
                        form.closest('tr').remove();

                        // Show success message after successful deletion
                        Swal.fire({
                            title: 'Dihapus!',
                            text: 'Data berhasil dihapus.',
                            icon: 'success',
                             // optional, to auto-close after 2 seconds
                            showConfirmButton: true
                        });
                    }
                };

                xhr.send(formData);
            }
        });
    }
    </script>
<!-- Tambahkan script ini ke bagian bawah template Blade Anda -->
<script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
                Swal.fire({
                    title: 'Berhasil!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            @endif

            @if($errors->any())
                Swal.fire({
                    title: 'Gagal!',
                    text: "{{ $errors->first() }}",
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            @endif
        });
    </script>
