@auth
    @if(Auth::User()->level == '2')
        @php
        $pegawai= DB::table('pegawai')->where('id_user',Auth::User()->id)->first();
      @endphp
      @if($pegawai->status_aktif == "Tidak Aktif")
      <script>
          window.location.href = "/keluar";
      </script>
      @endif
  @endif
  <?php
    $pegawai= DB::table('pegawai')->where('id_user',Auth::User()->id)->first();
    if (!$pegawai) {
      $jabatan = ''; // Set default value if no record is found
    } else {
      $jabatan= DB::table('jabatan')->where('id',$pegawai->id_jabatan)->first();
    }
    $users= DB::table('users')->find(Auth::User()->id);
  ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('assets-admin')}}/assets/images/favicon.png">
    <title>Admin | E-Surat</title>
    <!-- Custom CSS -->
    <link href="{{url('assets-admin')}}/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="{{url('assets-admin')}}/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="{{url('assets-admin')}}/assets/libs/morris.js/morris.css" rel="stylesheet">
    <link href="{{url('assets-admin')}}/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{url('assets-admin')}}/dist/css/style.min.css" rel="stylesheet">
    <style>
      /* Hide spinner in WebKit browsers (Chrome, Safari, etc.) */
      input[type=number]::-webkit-outer-spin-button,
      input[type=number]::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
      }

      /* Hide spinner in Firefox */
      input[type=number] {
          -moz-appearance: textfield;
      }

      /* Prevent scrolling up/down with mouse wheel */
      input[type=number] {
          /* Ensure overflow is hidden */
          overflow: hidden;
      }
    </style>
    <style>
        /* Optional custom styles */
        .select2-container--default .select2-selection--single {
            height: 38px;
        }
    </style>
    <style>
      .align-middle-custom {
          vertical-align: middle !important;
      }
    </style>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="/admin/home">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{{url('assets-admin')}}/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="{{url('assets-admin')}}/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="{{url('assets-admin')}}/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="{{url('assets-admin')}}/assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                                <i class="sl-icon-menu font-20"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                        @if($pegawai != "")
                                        <img src="{{url('public/profil')}}/{{$pegawai->foto}}" alt="user" width="31" class="rounded-circle" />
                                        @else
                                        <img src="{{url('assets-admin')}}/assets/images/user.png" alt="user" width="31" class="rounded-circle" />
                                        @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class="">
                                        @if($pegawai != "")
                                        <img src="{{url('public/profil')}}/{{$pegawai->foto}}" alt="user" width="60" class="rounded-circle" />
                                        @else
                                        <img src="{{url('assets-admin')}}/assets/images/user.png" alt="user" width="60" class="rounded-circle" />
                                        @endif
                                    </div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0">{{Auth::User()->name}}</h4>
                                        <p class=" m-b-0">{{$jabatan ? $jabatan->nama:'Super Admin'}}</p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="/admin/change">
                                    <i class="ti-settings m-r-5 m-l-5"></i> Change Password</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            </div>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                        </form>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav mt-3">
            <ul id="sidebarnav">

                    <!-- Admin Sidebar -->
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/home" aria-expanded="false">
                            <i class="icon-Car-Wheel"></i>
                            <span class="hide-menu">Dashboards</span>
                        </a>
                    </li>
                    @if(Auth::user()->level == 1)
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="icon-Receipt-4"></i>
                            <span class="hide-menu">Data Master</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="/admin/jabatan" class="sidebar-link">
                                    <i class="icon-Record"></i>
                                    <span class="hide-menu @if ($activePage == 'jabatan') text-info @endif"> Data Jabatan</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/admin/bidang" class="sidebar-link">
                                    <i class="icon-Record"></i>
                                    <span class="hide-menu @if ($activePage == 'bidang') text-info @endif"> Data Bidang</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/admin/ruangan" class="sidebar-link">
                                    <i class="icon-Record"></i>
                                    <span class="hide-menu @if ($activePage == 'ruangan') text-info @endif"> Data Ruangan</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/pegawai" aria-expanded="false">
                            <i class="ti-user"></i>
                            <span class="hide-menu">Pegawai</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/rab" aria-expanded="false">
                            <i class="ti-agenda"></i>
                            <span class="hide-menu">RAB</span>
                        </a>
                    </li>
                @endif

                <!-- Shared by Admin & User -->
                @if(Auth::user()->level == 1 || Auth::user()->level == 2)
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/permintaan" aria-expanded="false">
                            <i class="icon-Receipt"></i>
                            <span class="hide-menu">TS Permintaan</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/anggaran" aria-expanded="false">
                            <i class="icon-Receipt-2"></i>
                            <span class="hide-menu">TS Anggaran</span>
                        </a>
                    </li>
                @endif

                <!-- User-Only Sidebar -->
                @if(Auth::user()->level == 1)
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/belanja" aria-expanded="false">
                            <i class="icon-Receipt-3"></i>
                            <span class="hide-menu">TS Belanja</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>

        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            @yield('content')
            <footer class="footer text-center">
                All Rights Reserved by E-Surat. Designed and Developed by
                <a href="https://rsud.padangpanjang.go.id">RSUD Padang Panjang</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->
    <aside class="customizer">
        <a href="javascript:void(0)" class="service-panel-toggle">
            <i class="fa fa-spin fa-cog"></i>
        </a>
        <div class="customizer-body">
               <!-- Tab 1 -->
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="p-15 border-bottom">
                        <!-- Sidebar -->
                        <h5 class="font-medium m-b-10 m-t-10">Layout Settings</h5>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="theme-view" id="theme-view">
                            <label class="custom-control-label" for="theme-view">Dark Theme</label>
                        </div>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input sidebartoggler" name="collapssidebar
                                   " id="collapssidebar">
                            <label class="custom-control-label" for="collapssidebar">Collapse Sidebar</label>
                        </div>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="sidebar-position" id="sidebar-position">
                            <label class="custom-control-label" for="sidebar-position">Fixed Sidebar</label>
                        </div>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="header-position" id="header-position">
                            <label class="custom-control-label" for="header-position">Fixed Header</label>
                        </div>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="boxed-layout" id="boxed-layout">
                            <label class="custom-control-label" for="boxed-layout">Boxed Layout</label>
                        </div>
                    </div>
                    <div class="p-15 border-bottom">
                        <!-- Logo BG -->
                        <h5 class="font-medium m-b-10 m-t-10">Logo Backgrounds</h5>
                        <ul class="theme-color">
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-logobg="skin1"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-logobg="skin2"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-logobg="skin3"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-logobg="skin4"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-logobg="skin5"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-logobg="skin6"></a>
                            </li>
                        </ul>
                        <!-- Logo BG -->
                    </div>
                    <div class="p-15 border-bottom">
                        <!-- Navbar BG -->
                        <h5 class="font-medium m-b-10 m-t-10">Navbar Backgrounds</h5>
                        <ul class="theme-color">
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-navbarbg="skin1"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-navbarbg="skin2"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-navbarbg="skin3"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-navbarbg="skin4"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-navbarbg="skin5"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-navbarbg="skin6"></a>
                            </li>
                        </ul>
                        <!-- Navbar BG -->
                    </div>
                    <div class="p-15 border-bottom">
                        <!-- Logo BG -->
                        <h5 class="font-medium m-b-10 m-t-10">Sidebar Backgrounds</h5>
                        <ul class="theme-color">
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin1"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin2"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin3"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin4"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin5"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin6"></a>
                            </li>
                        </ul>
                        <!-- Logo BG -->
                    </div>
                </div>
                <!-- End Tab 1 -->
        </div>
    </aside>
    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{url('assets-admin')}}/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{url('assets-admin')}}/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="{{url('assets-admin')}}/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="{{url('assets-admin')}}/dist/js/app.min.js"></script>
    <script src="{{url('assets-admin')}}/dist/js/app.init.light-sidebar.js"></script>
    <script src="{{url('assets-admin')}}/dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{url('assets-admin')}}/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="{{url('assets-admin')}}/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="{{url('assets-admin')}}/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="{{url('assets-admin')}}/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="{{url('assets-admin')}}/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="{{url('assets-admin')}}/assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="{{url('assets-admin')}}/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 charts -->
    <script src="{{url('assets-admin')}}/assets/extra-libs/c3/d3.min.js"></script>
    <script src="{{url('assets-admin')}}/assets/extra-libs/c3/c3.min.js"></script>
    <!--chartjs -->
    <script src="{{url('assets-admin')}}/assets/libs/raphael/raphael.min.js"></script>
    <script src="{{url('assets-admin')}}/assets/libs/morris.js/morris.min.js"></script>

    <script src="{{url('assets-admin')}}/dist/js/pages/dashboards/dashboard1.js"></script>
    <script src="{{url('assets-admin')}}/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{url('assets-admin')}}/dist/js/pages/datatable/datatable-basic.init.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize Select2
            $('.select2').select2({
                width: '100%', // Adjust the width as needed
                allowClear: false // Optionally allow clearing the selection
            });
        });
    </script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 3000);
    </script>
</body>

</html>
@endauth
@guest
  <script>window.location = "/login";</script>
@endguest