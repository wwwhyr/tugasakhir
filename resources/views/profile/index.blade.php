@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h5>Profile</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3 align-items-center">
                                <label class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-3">
                                    <div class="form-control-plaintext" style="padding: 0.375rem 0.75rem; border: 1px solid #ced4da; border-radius: 0.25rem; background-color: #e9ecef;">
                                        {{ $user->username }}
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <label class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-3">
                                    <div class="form-control-plaintext" style="padding: 0.375rem 0.75rem; border: 1px solid #ced4da; border-radius: 0.25rem; background-color: #e9ecef;">
                                        {{ $user->name }}
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-3">
                                    <div class="form-control-plaintext" style="padding: 0.375rem 0.75rem; border: 1px solid #ced4da; border-radius: 0.25rem; background-color: #e9ecef;">
                                        {{ $user->email }}
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
