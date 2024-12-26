<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staify - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href=" {{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> --}}

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.min.css') }}">
    <link href="{{ asset('vendor/icon/font/bootstrap-icons.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> --}}


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
                <img class="img-fluid p-3" src=" {{ asset('img/logo-putih.svg') }}" alt="">
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0 mb-4">

            @if (Auth::user()->role == 'mahasiswa')
                <!-- Nav Item - Dashboard -->
                <li class="nav-item {{ Request::is('dashboard*', 'kegiatan*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('prestasi*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('prestasi') }}">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Prestasi</span>
                    </a>
                </li>
            @endif


            @if (Auth::user()->role == 'kemahasiswaan')
                <!-- Nav Item - Dashboard -->
                <li class="nav-item {{ Request::is('dashboard*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class=" fas fa-fw fa-tachometer-alt"></i>
                        <span class="">Dashboard</span></a>
                </li>

                <!-- Nav Item - Charts -->
                <li class="nav-item {{ Request::is('pengajuan*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('pengajuan') }}">
                        <i class="fas fa-fw fa-barcode"></i>
                        <span>Pendanaan</span></a>
                </li>

                <!-- Nav Item - Charts -->
                <li class="nav-item {{ Request::is('kegiatan*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('kegiatan') }}">
                        <i class="fas fa-fw fa-archive"></i>
                        <span>Kegiatan</span></a>
                </li>

                <li class="nav-item {{ Request::is('prestasi*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('prestasi') }}">
                        <i class="fas fa-fw fa-book"></i>
                        <span>Prestasi</span></a>
                </li>

                <li class="nav-item {{ Request::is('akun*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('akun') }}">
                        <i class="fas fa-fw bi bi-person-circle"></i>
                        <span>Akun</span></a>
                </li>
            @endif

            @if (Auth::user()->role == 'ormawa')
                <!-- Nav Item - Dashboard -->
                <li class="nav-item {{ Request::is('dashboard*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class=" fas fa-fw fa-tachometer-alt"></i>
                        <span class="">Dashboard</span></a>
                </li>

                <!-- Nav Item - Charts -->
                <li class="nav-item {{ Request::is('pengajuan*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('pengajuan') }}">
                        <i class="fas fa-fw fa-barcode"></i>
                        <span>Pengajuan</span></a>
                </li>

                <!-- Nav Item - Charts -->
                <li class="nav-item {{ Request::is('kegiatan*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('kegiatan') }}">
                        <i class="fas fa-fw fa-archive"></i>
                        <span>Kegiatan</span></a>
                </li>
            @endif

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

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profileModal">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                {{ $slot }}

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Staify 2024</span>
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

    <!-- Profile Modal-->
    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Profile</h5>
                </div>
                <div class="modal-body card-block text-center text-white">
                    <img class="img-fluid" style="width: 30%;" src="{{ asset('img/undraw_profile.svg') }} "
                        alt="...">
                </div>
                @if (Auth::user()->role == 'mahasiswa')
                    <h5 class="text-center text-dark font-weight-bold mb-3">Nama Lengkap : {{ Auth::user()->name }}</h5>
                    <p class="text-center">Email :{{ Auth::user()->email }}</p>
                    <p class="text-center">NIM : {{ Auth::user()->nim }}</p>
                    <p class="text-center">Jurusan : {{ Auth::user()->jurusan }}</p>
                    <p class="text-center">Angkatan : {{ Auth::user()->angkatan }}</p>
                    <p class="text-center">Tipe : {{ Auth::user()->role }}</p>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="button" data-target="#editProfileModal"
                            data-toggle="modal">Edit</button>
                    </div>
                @endif
                @if (Auth::user()->role == 'kemahasiswaan')
                    <h5 class="text-center text-dark font-weight-bold">{{ Auth::user()->name }}</h5>
                    <p class="text-center">Tipe : {{ Auth::user()->role }}</p>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="button" data-target="#editProfileModal"
                            data-toggle="modal">Edit</button>
                    </div>
                @endif
                @if (Auth::user()->role == 'ormawa')
                    <h5 class="text-center text-dark font-weight-bold mb-3">Nama Ormawa : {{ Auth::user()->name }}</h5>
                    <p class="text-center">Email : {{ Auth::user()->email }}</p>
                    <p class="text-center">Tipe : {{ Auth::user()->role }}</p>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="button" data-target="#editProfileModal"
                            data-toggle="modal">Edit</button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Profile</h5>
                </div>
                <div class="modal-body">
                    @if (Auth::user()->role == 'mahasiswa')
                        <form action="/editprofile" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="role"
                                    value="{{ Auth::user()->role }}">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" name="namalengkap"
                                    value="{{ Auth::user()->name }}">
                                <label for="NIM">NIM</label>
                                <input disabled type="number" class="form-control" id="nim"
                                    value="{{ Auth::user()->nim }}">
                                <label for="NIM">Jurusan</label>
                                <input type="text" class="form-control" id="jurusan" name="jurusan"
                                    value="{{ Auth::user()->jurusan }}">
                                <label for="Angkatan">Angkatan</label>
                                <input type="number" class="form-control" id="angkatan" name="angkatan"
                                    value="{{ Auth::user()->angkatan }}">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ Auth::user()->email }}">
                                <label for="Password">Password</label>
                                <input type="password" class="form-control" id="Password" name="password">
                                <label for="confirmPassword">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword"
                                    name="confirmPassword">
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit"
                                    data-target="#editProfile">Simpan</button>
                            </div>
                        </form>
                    @endif
                    @if (Auth::user()->role == 'kemahasiswaan')
                        <form action="/editprofile" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input readonly type="text" class="form-control" id="name"
                                    name="namalengkap" value="{{ Auth::user()->name }}">
                                <label for="role">Tipe</label>
                                <input readonly type="text" class="form-control" id="role"
                                    value="{{ Auth::user()->role }}">
                                <input type="hidden" class="form-control" id="nim"
                                    value="{{ Auth::user()->nim }}">
                                <input type="hidden" class="form-control" id="jurusan" name="jurusan"
                                    value="{{ Auth::user()->jurusan }}">
                                <input type="hidden" class="form-control" id="angkatan" name="angkatan"
                                    value="{{ Auth::user()->angkatan }}">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ Auth::user()->email }}">
                                <label for="Password">Password</label>
                                <input type="password" class="form-control" id="Password" name="password">
                                <label for="confirmPassword">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword"
                                    name="confirmPassword">
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit"
                                    data-target="#editProfile">Simpan</button>
                            </div>
                        </form>
                    @endif
                    @if (Auth::user()->role == 'ormawa')
                        <form action="/editprofile" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama Ormawa</label>
                                <input type="text" class="form-control" id="name"
                                    name="namalengkap" value="{{ Auth::user()->name }}">
                                <input disabled type="hidden" class="form-control" id="nim"
                                    value="{{ Auth::user()->nim }}">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ Auth::user()->email }}">
                                <input type="hidden" class="form-control" id="jurusan" name="jurusan"
                                    value="{{ Auth::user()->jurusan }}">
                                <input type="hidden" class="form-control" id="angkatan" name="angkatan"
                                    value="{{ Auth::user()->angkatan }}">
                                <label for="role">Tipe</label>
                                <input disabled type="text" class="form-control" id="role"
                                    value="{{ Auth::user()->role }}">
                                <label for="Password">Password</label>
                                <input type="password" class="form-control" id="Password" name="password">
                                <label for="confirmPassword">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword"
                                    name="confirmPassword">
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit"
                                    data-target="#editProfile">Simpan</button>
                            </div>
                        </form>
                    @endif
                </div>

            </div>
        </div>
    </div>




    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda yakin untuk logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src=" {{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src=" {{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src=" {{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src=" {{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src=" {{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>

</body>

</html>
