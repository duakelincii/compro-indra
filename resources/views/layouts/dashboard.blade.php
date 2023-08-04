<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <link href="{{ asset('images/apotik.png') }}" rel="icon">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <!-- HighChart-->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.home') }}">
                <div class="sidebar-brand-icon rotate-n">
                    {{-- <i class="fas fa-paw"></i> --}}
                    <img src="{{ asset('assets/img/logo.png') }}" alt="" width="50%">
                </div>
                {{-- <div class="sidebar-brand-text mx-3"><font size="2">PT SINAR JERNIH CEMERLANG</font></div> --}}
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>


            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.about.index') }}">
                    <i class="fas fa-file"></i>
                    <span>About</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.blog.index') }}">
                    <i class="fas fa-newspaper"></i>
                    <span>Articel Blog</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.banner.index') }}">
                    <i class="fas fa-images"></i>
                    <span>Banner</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.service.index') }}">
                    <i class="fas fa-paw"></i>
                    <span>Service</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.faq.index') }}">
                    <i class="fas fa-question"></i>
                    <span>Faq</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.testimonial.index') }}">
                    <i class="fas fa-question"></i>
                    <span>Testimonial</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.testing.index') }}">
                    <i class="fas fa-question"></i>
                    <span>Testing</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.gallery.index') }}">
                    <i class="fas fa-images"></i>
                    <span>Gallery</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.product.index') }}">
                    <i class="fas fa-cart-plus"></i>
                    <span>Product</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.url.index') }}">
                    <i class="fas fa-globe"></i>
                    <span>URL</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.tiktok.index') }}">
                    <i class="fas fa-video"></i>
                    <span>Tiktok Video</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.embed.index') }}">
                    <i class="fas fa-code"></i>
                    <span>Embed</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.message') }}">
                    <i class="fas fa-envelope"></i>
                    <span>Message</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.setting.index') }}">
                    <i class="fas fa-cog"></i>
                    <span>Setting Website</span></a>
            </li>



            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                        </li>

                        {{-- <div class="mt-3">
                            <span class="badge badge-primary">Role :
                                @if (Auth::user()->role == 'superadmin')
                                    KEPALA UNIT
                                @else
                                    {{ strtoupper(Auth::user()->role) }}
                                @endif
                            </span>
                        </div> --}}

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ URL::asset('assets/img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                {{-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a> --}}
                                {{-- <div class="dropdown-divider"></div> --}}
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="page" class="p-2"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="transaksimodal" tabindex="-1" aria-labelledby="transaksimodalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="transaksimodalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="page2" class="p-2"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Modal Konfirmasi Delete-->
                <div id="DeleteModal" class="modal fade text-danger" role="dialog">
                    <div class="modal-dialog modal-dialog modal-dialog-centered ">
                        <!-- Modal content-->
                        <form action="" id="deleteForm" method="post">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <h4 class="modal-title text-center text-white">Konfirmasi Penghapusan</h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <p class="text-center">Apakah anda yakin untuk menghapus ? Data yang sudah
                                        dihapus tidak bisa kembali</p>
                                </div>
                                <div class="modal-footer">
                                    <center>
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Tidak,
                                            Batal</button>
                                        <button type="button" name="" class="btn btn-danger"
                                            data-dismiss="modal" onclick="formSubmit()">Ya, Hapus</button>
                                    </center>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--End Modal-->

                @include('sweetalert::alert')
                <!-- Errors -->

                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <p class="mb-0">
                                {{ $error }}
                            </p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endforeach
                @endif
                <!-- End of Errors -->

                <!-- Pesan Berhasil -->
                @if (session()->has('pesan'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p class="mb-0">
                            {{ session()->get('pesan') }}
                        </p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <p class="mb-0">
                            {{ session()->get('error') }}
                        </p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <!-- End of Pesan Berhasil-->
                <!-- Pesan Warning -->
                {{-- @if (Route::is('dashboard'))
                    @if (count($warning) > 0)
                        @foreach ($warning as $id => $pesan)
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <p class="mb-0"><a href="{{ route('obat.edit', $id) }}"
                                        class="text-decoration-none text-dark">
                                        {{ $pesan }}
                                    </a>

                                </p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endforeach
                    @endif
                @endif --}}

                <!-- Begin Page Content -->
                <div class="container-fluid">



                    <h4>@yield('heading')</h4>
                    <p>@yield('sub-heading')</p>

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" Jika Ingin Mengakhiri Sesi.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/js/demo/datatables-demo.js') }}"></script>

    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <script async src="https://www.tiktok.com/embed.js"></script>
    @yield('script')

</body>

</html>
