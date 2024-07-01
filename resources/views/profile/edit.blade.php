@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h5>Edit Profile</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profile.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3 align-items-center">
                                    <label class="col-sm-2 col-form-label">Username:</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="username" class="form-control" value="{{ $user->username }}">
                                    </div>
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <label class="col-sm-2 col-form-label">Nama:</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <label class="col-sm-2 col-form-label">Email:</label>
                                    <div class="col-sm-3">
                                        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <label class="col-sm-2 col-form-label">Password Lama:</label>
                                    <div class="col-sm-3">
                                        <input type="password" name="current_password" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <label class="col-sm-2 col-form-label">Password Baru:</label>
                                    <div class="col-sm-3">
                                        <input type="password" name="new_password" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <label class="col-sm-2 col-form-label">Konfirmasi Password Baru:</label>
                                    <div class="col-sm-3">
                                        <input type="password" name="new_password_confirmation" class="form-control">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
