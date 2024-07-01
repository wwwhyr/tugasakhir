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
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">
                                Tambah Data
                            </button>
                        </div>

                        <!-- Modal for Adding/Editing Data -->
                        <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalgridLabel">Tambah/Edit Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="petugas-form" action="{{ route('petugas.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" id="method" name="_method" value="POST">
                                            <input type="hidden" id="id" name="id" value="">
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="nama" name="nama" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="username" name="username" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="daerah" class="form-label">Daerah</label>
                                                <input type="text" class="form-control" id="daerah" name="daerah" required>
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
                                                    <button class="btn btn-secondary btn-sm" data-id="{{ $petugas->id }}" data-nama="{{ $petugas->nama }}" data-username="{{ $petugas->username }}" data-password="{{ $petugas->password }}" data-daerah="{{ $petugas->daerah }}" data-bs-toggle="modal" data-bs-target="#exampleModalgrid" onclick="openEditModal(this)">
                                                        <i class="ri-pencil-fill"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm" onclick="konfirmasiHapus(event, '{{ $petugas->id }}')">
                                                        <i class="ri-delete-bin-5-line"></i>
                                                    </button>
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
                </div><!-- end row -->
            </div>
        </div>
    </div><!-- end col -->
</div><!-- end row -->
</div><!-- end container-fluid -->
</div><!-- end page-content -->
@endsection
<script>
    function openEditModal(button) {
        var id = button.getAttribute('data-id');
        var nama = button.getAttribute('data-nama');
        var username = button.getAttribute('data-username');
        var password = button.getAttribute('data-password');
        var daerah = button.getAttribute('data-daerah');

        document.getElementById('id').value = id;
        document.getElementById('nama').value = nama;
        document.getElementById('username').value = username;
        document.getElementById('password').value = password;
        document.getElementById('daerah').value = daerah;
        
        // Set the form action to update if editing
        var form = document.getElementById('petugas-form');
        if (id) {
            form.action = '{{ route("petugas.update", "") }}/' + id;
            document.getElementById('method').value = 'PUT';
        } else {
            form.action = '{{ route("petugas.store") }}';
            document.getElementById('method').value = 'POST';
        }
    }
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
                            icon: 'success', // optional, to auto-close after 2 seconds
                            showConfirmButton: true
                        });
                    }
                };

                xhr.send(formData);
            }
        });
    }
</script>
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