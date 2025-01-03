<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>SIG WISATA BELU</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <!-- Fonts and icons -->
    <script src="<?=base_url()?>assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
    WebFont.load({
        google: {
            families: ["Public Sans:300,400,500,600,700"]
        },
        custom: {
            families: [
                "Font Awesome 5 Solid",
                "Font Awesome 5 Regular",
                "Font Awesome 5 Brands",
                "simple-line-icons",
            ],
            urls: ["<?=base_url()?>assets/css/fonts.min.css"],
        },
        active: function() {
            sessionStorage.fonts = true;
        },
    });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>assets/css/plugins.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/demo.css" />

    <!-- begin::Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- end::Sweetalert -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="indeks.html" class="logo">
                        <h5 class="navbar-brand text-white">SIG WISATA BELU</h5>
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item <?=$menu == 'dashboard'?'active':'';?>">
                            <a href="<?=base_url('dashboard');?>">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item <?=$menu == 'wisata'?'active':'';?>">
                            <a href="<?=base_url('wisata');?>">
                                <i class="fas fa-table"></i>
                                <p>Wisata</p>
                            </a>
                        </li>
                        <li class="nav-item <?=$menu == 'peta'?'active':'';?>">
                            <a href="<?=base_url('peta');?>">
                                <i class="fas fa-map-marker-alt"></i>
                                <p>Peta</p>
                            </a>
                        </li>
                        <li class="nav-item <?=$menu == 'pendukung'?'active':'';?>">
                            <a href="<?=base_url('fasilitaspendukung');?>">
                                <i class="fas fa-layer-group"></i>
                                <p>Fasilitas Pendukung</p>
                            </a>
                        </li>
                        <?php if($this->session->userdata("role") == 'admin'):?>
                        <li class="nav-item">
                            <a href="<?=base_url('kontak');?>">
                                <i class="fas fa-phone"></i>
                                <p>Kontak</p>
                            </a>
                        </li>
                        <li class="nav-item <?=$menu == 'users'?'active':'';?>">
                            <a href="<?=base_url('users');?>">
                                <i class="fas fa-users"></i>
                                <p>Admin</p>
                            </a>
                        </li>
                        <?php endif;?>
                        <li class="nav-item <?=$menu == 'setings'?'active':'';?>">
                            <a href="<?=base_url('setings');?>">
                                <i class="fas fa-cog"></i>
                                <p>Pengaturan</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="indeks.html" class="logo">
                            <img src="<?=base_url()?>assets/img/kaiadmin/logo_light.svg" alt="navbar brand"
                                class="navbar-brand" height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">
                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                                    aria-expanded="false">
                                    <div class="avatar-sm">
                                        <img src="<?=base_url()?>assets/img/profile.jpg" alt="..."
                                            class="avatar-img rounded-circle" />
                                    </div>
                                    <span class="profile-username">
                                        <span class="op-7">Hi,</span>
                                        <span class="fw-bold"><?=$this->session->userdata("username");?></span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <div class="user-box">
                                                <div class="avatar-lg">
                                                    <img src="<?=base_url()?>assets/img/profile.jpg" alt="image profile"
                                                        class="avatar-img rounded" />
                                                </div>
                                                <div class="u-text">
                                                    <h4><?=$this->session->userdata("username");?></h4>
                                                    <h4>Role : <?=$this->session->userdata("role");?></h4>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="<?=base_url('auth/logout');?>">Logout</a>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>