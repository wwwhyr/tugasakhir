@extends('layouts.app')

@section('content')
<div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Tambah Data</h4>

                    <!-- <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                            <li class="breadcrumb-item active">Dashbo</li>
                        </ol>
                    </div> -->

                </div>
            </div>
        </div>
        <!-- end page title -->


<head>
    <title>Tambah Data Petugas</title>
    <!-- Tambahkan link ke CSS framework yang Anda gunakan, jika ada -->
</head>
<body>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('petugas.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="kecamatan" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" placeholder="Masukkan nama lengkap" id="nama" name="nama" required>
                </div>
            </div><!--end col-->
            <div class="col-6">
                <div class="mb-3">
                    <label for="desa" class="form-label">Username</label>
                    <input type="text" class="form-control" placeholder="Masukkan username" id="username" name="username" required>
                </div>
            </div><!--end col-->
            <div class="col-12">
                <div class="mb-3">
                    <label for="nama" class="form-label">Password</label>
                    <input type="text" class="form-control" placeholder="Masukkan password" id="password" name="password" required>
                </div>
            </div><!--end col-->
            <div class="col-6">
                <div class="mb-3">
                    <label for="nik" class="form-label">Daerah</label>
                    <input type="text" class="form-control" placeholder="Masukkan daerah" id="daerah" name="daerah" required>
                </div>
            </div><!--end col-->
            <div class="col-lg-12">
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('petugas.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </form>
</body>
@endsection