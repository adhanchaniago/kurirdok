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
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <title>KurirDok - <?= $page_title ?></title>
    <!-- Custom CSS -->
    <!-- <link href="../../assets/libs/flot/css/float-chart.css" rel="stylesheet"> -->
    <link href="<?= base_url('assets/css/style.min.css') ?>" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
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
        <header class="topbar" <?= is_level('Kurir') ? 'style="background-color: #2b76ad"' : 'data-navbarbg="skin5"' ?>>
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" <?= is_level('Kurir') ? 'style="background-color: #2b76ad"' : 'data-navbarbg="skin5"' ?>>
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="../../assets/images/logo-icon.png" alt="homepage" class="light-logo" /> -->
                           
                        </b>
                        <!--End Logo icon -->
                         <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            Kurir<b>Dok</b>
                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                            
                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" <?= is_level('Kurir') ? 'style="background-color: #2b76ad !important"' : 'data-navbarbg="skin5"' ?>>
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <span class="d-none d-md-block">Create New <i class="fa fa-angle-down"></i></span>
                             <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>   
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li> -->
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li> -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?= base_url('uploads/foto/' . $this->session->foto) ?>" alt="user" class="rounded-circle" width="31">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="<?= base_url('users/profile') ?>"><i class="fas fa-user-circle m-r-5 m-l-5"></i> Profile</a>
                                <div class="dropdown-divider"></div>
                                <div class="p-l-30 p-10"><a href="<?= base_url('auth/logout') ?>" class="btn btn-sm btn-success btn-rounded">Logout</a></div>
                            </div>
                        </li> -->
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
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item bg-secondary">
                            <div class="p-2">
                                <div class="row text-white">
                                    <div class="col-4">
                                        <img src="<?= base_url('uploads/foto/' . $this->session->userdata('foto')) ?>" alt="" class="img-circle w-100 rounded-circle">
                                    </div>
                                    <div class="col-8">
                                        <h5 class="mb-0"><?= $this->session->userdata('nama') ?></h5>
                                        <p class="mb-0"><?= $this->session->userdata('level') ?></p>
                                        <a class="btn btn-primary btn-sm rounded-pill btn-block" href="<?= base_url('users/profile') ?>">Edit Profile</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('dashboard') ?>" aria-expanded="false">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <?php if (is_level('Admin')): ?>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                    <i class="fas fa-users"></i>
                                    <span class="hide-menu">User </span>
                                </a>
                                <ul aria-expanded="false" class="collapse  first-level">
                                    <li class="sidebar-item">
                                        <a href="<?= base_url('pegawai/index') ?>" class="sidebar-link <?= @$pegawai_active ?>">
                                            <i class="fas fa-user-secret"></i>
                                            <span class="hide-menu"> Pegawai </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="<?= base_url('kurir/index') ?>" class="sidebar-link <?= @$kurir_active ?>">
                                            <i class="fas fa-user"></i>
                                            <span class="hide-menu"> Kurir </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <?php if (is_level('Admin')): ?>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link <?= @$pengiriman_active ?>" href="<?= base_url('pengiriman/') ?>" aria-expanded="false">
                                    <i class="mdi mdi-format-list-bulleted"></i>
                                    <span class="hide-menu">Pengiriman</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (is_level('Pegawai')): ?>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link <?= @$pesananku_active ?>" href="<?= base_url('pengiriman/pesananku') ?>" aria-expanded="false">
                                    <i class="mdi mdi-format-list-bulleted"></i>
                                    <span class="hide-menu">Pesananku</span>
                                </a>
                            </li>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link <?= @$riwayat_active ?>" href="<?= base_url('pengiriman/history') ?>" aria-expanded="false">
                                    <i class="fas fa-tasks"></i>
                                    <span class="hide-menu">Riwayat</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (is_level('Kurir')): ?>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link <?= @$pesanan_active ?>" href="<?= base_url('pengiriman/pesanan') ?>" aria-expanded="false">
                                    <i class="mdi mdi-inbox"></i>
                                    <span class="hide-menu">Pesanan</span>
                                </a>
                            </li>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link <?= @$pengirimanku_active ?>" href="<?= base_url('pengiriman/pengirimanku') ?>" aria-expanded="false">
                                    <i class="fas fa-tasks"></i>
                                    <span class="hide-menu">Pengirimanku</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="sidebar-item">
                            <a href="<?= base_url('auth/logout') ?>" class="sidebar-link waves-effect waves-dark sidebar-link" onclick="return confirm('Yakin keluar aplikasi?')">
                                <i class="fas fa-share"></i> Logout
                            </a>
                        </li>
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
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title"><?= $page_title ?></h4>
                    </div>
                </div>
                <?php if (@$this->session->flashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('success') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php elseif (@$this->session->flashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('error') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <?= $content ?>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Adi Priyono. Designed and Developed by Adi Priyono.
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
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url('assets/libs/popper.js/dist/umd/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?= base_url('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/sparkline/sparkline.js') ?>"></script>
    <!--Wave Effects -->
    <script src="<?= base_url('assets/js/waves.js') ?>"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url('assets/js/sidebarmenu.js') ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url('assets/js/custom.min.js') ?>"></script>

    <script>
        $(document).ready(function () {
            $('.accept').click(function () {
                let pesananId = $(this).attr('data-pesanan');

                $.ajax({
                    url: '<?= base_url('pengiriman/detail/') ?>' + pesananId,
                    method: 'GET',
                    success: function (ret) {
                        console.log(ret);
                        console.log(pesananId);
                        $('#detail-pesanan').html(ret);
                    }
                });
            });

            $('.upload-struk, .upload-bukti').click(function () {
                let pesananId = $(this).attr('data-id');
                $('.upload-id-pengiriman').val(pesananId);
            })

            $('.detail-pesanan').click(function () {
                let pemesananId = $(this).attr('data-pemesanan');
                $.ajax({
                    url: '<?= base_url('pengiriman/detail/') ?>' + pemesananId,
                    method: 'GET',
                    success: function (ret) {
                        $('#detail-pemesanan').html(ret);
                    }
                });
            });

            $('.cancel').click(function () {
                let idPengiriman = $(this).attr('data-id');
                $('#batal-id-pengiriman').val(idPengiriman);
            });
        });
    </script>
</body>

</html>