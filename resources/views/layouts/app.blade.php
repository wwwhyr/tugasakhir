<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title> {{ env('APP_NAME') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{ env('APP_NAME') }}" name="description" />
    <meta content="{{ env('APP_AUTHOR') }}" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('img/fav.png') }}">

    <!-- plugin css -->
    <link href="{{ asset('invoika') }}/assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet"
        type="text/css" />

    
<!-- Sweet Alert css-->
<link href="{{ asset('invoika') }}/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <!-- Layout config Js -->
    <script src="{{ asset('invoika') }}/assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('invoika') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('invoika') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('invoika') }}/assets/css/app.min.css" rel="stylesheet" type="text/css" />

    <link href="{{ asset('invoika') }}/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('invoika/assets/libs/select2/select2.min.css') }}">

    <!-- glightbox css -->
    <link rel="stylesheet" href="{{ asset('invoika') }}/assets/libs/glightbox/css/glightbox.min.css">

    
        <!--datatable css-->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
        <!--datatable responsive css-->
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
   

    <style>
        @media print {

            .no-print,
            .no-print * {
                display: none !important;
            }
        }

        .circle {
            width: 20px;
            height: 20px;
            border-radius: 50%;
        }

        .select2-container--default .select2-selection--single {
            height: 37px !important;
            padding: 6px 8px;
            font-size: 13px;
            line-height: 1.33;
            border-radius: 6px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            top: 85% !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 26px !important;
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid #CCC !important;
            box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset;
            transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
        }

        /* Speech to Text CSS */
        .button {
            background: -webkit-linear-gradient(top, #008dfd 0, #0370ea 100%);
            border: 1px solid #076bd2;
            border-radius: 3px;
            color: #fff;
            display: none;
            font-size: 13px;
            font-weight: bold;
            line-height: 1.3;
            padding: 8px 25px;
            text-align: center;
            text-shadow: 1px 1px 1px #076bd2;
            letter-spacing: normal;
        }

        .center {
            padding: 10px;
            text-align: center;
        }

        .final {
            color: black;
            padding-right: 3px;
        }

        .interim {
            color: gray;
        }

        .info {
            font-size: 14px;
            text-align: center;
            color: #777;
            display: none;
        }
    </style>

    @stack('css')

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('img/logologin.png') }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('img/logologin.png') }}" alt="" height="21">
                                </span>
                            </a>

                            <a href="" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('img/logologin.png') }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('img/logologin.png') }}" alt="" height="21">
                                </span>
                            </a>
                        </div>

                        <button type="button"
                            class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>

                        <!-- Search -->
                        <form class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="" disabled readonly>
                            </div>
                        </form>

                    </div>

                    <div class="d-flex align-items-center">

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-primary rounded-circle"
                                data-toggle="fullscreen">
                                <i class='las la-expand fs-24'></i>
                            </button>
                        </div>

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button"
                                class="btn btn-icon btn-topbar btn-ghost-primary rounded-circle light-dark-mode">
                                <i class='las la-moon fs-24'></i>
                            </button>
                        </div>
                        <div class="pt-2">
                            <div data-simplebar style="max-height: 300px;" class="pe-2">
                            </div>
                        </div>

                        <div class="dropdown header-item">
                            <button type="button" class="btn" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">

                                    @if (empty(Auth::user()->photo))
                                    <img class="rounded-circle header-profile-user"
                                    src="{{ asset('img/fav.png') }}"
                                    alt="Header Avatar">
                                    @else
                                    <img class="rounded-circle header-profile-user"
                                    src="{{url(Storage::url(Auth::user()->photo))}}" alt="Header Avatar">
                                    @endif

                                    <span class="text-start ms-xl-2">
                                        <span
                                            class="d-none d-xl-inline-block fw-medium user-name-text fs-16">{{ Auth::user()->name }}
                                            <i class="las la-angle-down fs-12 ms-1"></i></span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="{{ route('profile.index') }}"><i
                                        class="bx bx-user fs-15 align-middle me-1"></i> <span
                                        key="t-profile">Profile</span></a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                this.closest('form').submit();"><i
                                            class="mdi mdi-logout font-size-16 text-danger align-middle me-1"></i>
                                        Logout</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- removeNotificationModal -->
        <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="NotificationModalbtn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                colors="primary:#f7b84b,secondary:#f06548"
                                style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete
                                It!</button>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('img/logologin.png') }}" alt="" height="40">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('img/logologin.png') }}" alt="" height="40">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('img/logologin.png') }}" alt="" height="40">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('img/logologin.png') }}" alt="" height="40">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Utama</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('dashboard.index') }}">
                                <i class="las la-house-damage"></i> <span data-key="t-dashboard">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <hr>
                        </li>

                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">

                            <li class="nav-item">
                                <a class="nav-link menu-link" href="{{ route('masyarakat.index') }}">
                                    <i class="bx bxs-user"></i> <span data-key="t-bootstrap-ui">Data Balita</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="{{ route('petugas.index') }}">
                                    <i class="bx bxs-user"></i> <span data-key="t-bootstrap-ui">Data Petugas</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="{{ route('grafik.status_gizi') }}">
                                    <i class="bi bi-bar-chart-fill"></i> <span data-key="t-bootstrap-ui">Grafik Status Stunting</span>
                                </a>
                            </li>

                        <li class="menu-title"><span data-key="t-menu">Pengaturan</span></li>
                        

                            <li class="nav-item">
                                <a class="nav-link menu-link" href="{{ route('profile.index') }}">
                                    <i class=" bx bx-user-circle"></i> <span data-key="t-bootstrap-ui">Profil</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="{{ route('daerahs.index') }}">
                                    <i class=" bx bx-map-alt"></i> <span data-key="t-bootstrap-ui">Daerah</span>
                                </a>
                            </li>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        @yield('content')
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <script src="{{ asset('invoika') }}/assets/libs/jquery/jquery.min.js"></script>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('invoika') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('invoika') }}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('invoika') }}/assets/libs/node-waves/waves.min.js"></script>
    <script src="{{ asset('invoika') }}/assets/libs/feather-icons/feather.min.js"></script>
    <script src="{{ asset('invoika') }}/assets/js/plugins.js"></script>
    
    <!-- Sweet Alerts js -->
    <script src="{{ asset('invoika') }}/assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- Sweet alert init js-->
    <script src="{{ asset('invoika') }}/assets/js/pages/sweetalerts.init.js"></script>

    <!-- apexcharts -->
    <script src="{{ asset('invoika') }}/assets/libs/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('invoika') }}/assets/js/pages/apexcharts-bar.init.js"></script>
    <!-- Vector map-->
    <script src="{{ asset('invoika') }}/assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="{{ asset('invoika') }}/assets/libs/jsvectormap/maps/world-merc.js"></script>

    <script src="{{ asset('invoika') }}/assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <script src="{{ asset('invoika/assets/libs/select2/select2.min.js') }}"></script>

    <!-- glightbox js -->
    <script src="{{ asset('invoika') }}/assets/libs/glightbox/js/glightbox.min.js"></script>

    <!-- lightbox init -->
    <script src="{{ asset('invoika') }}/assets/js/pages/lightbox.init.js"></script>

    <!-- Dashboard init -->
    <script src="{{ asset('invoika') }}/assets/js/pages/dashboard.init.js"></script>

    <script src="{{ asset('invoika/assets/libs/select2/select2.min.js') }}"></script>

        <!--datatable js-->
    <script src="{{ asset('invoika') }}/assets/js/pages/datatables.init.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>


    <!-- App js -->
    <script src="{{ asset('invoika') }}/assets/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('js')
</body>

</html>
