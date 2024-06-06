@extends('layouts.app')
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Dashboard</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <!-- <div class="row">
                    <div class="col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center gy-4">
                                    <div class="col-sm-8">
                                        <div class="box">
                                            <h5 class="fs-20 text-truncate">Kelola Catatan Rapatmu</h5>
                                            <p class="text-muted fs-15">Sistem kelola kelola catatan rapat memudahkan anda untuk merekap jadwal rapat dan hasil rapat.</p>
                                            <a href="" class="btn btn-primary">Buat Rapat</a>
                                            <div class="mt-4 alert alert-secondary alert-label-icon label-arrow fade show" role="alert">
                                                <i class="ri-user-smile-line label-icon"></i>
                                                Awali Aktifitas dengan membaca Basmalah.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-center px-2">
                                            <img src="{{ asset('invoika') }}/assets/images/invoice-widget.png"
                                                class="img-fluid" style="height: 141px;" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                end row -->


            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        @include('components.footer')
    </div>
@endsection

@push('js')

@endpush
