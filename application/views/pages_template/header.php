<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Informasi Geografis Pariwisata</title>
    <link rel="icon" href="<?=base_url('assets/');?>/img/logo-32x32.png" sizes="32x32" />
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">

    <link href="<?=base_url('assets/');?>css/bootstrap.min.css" rel="stylesheet">

    <link href="<?=base_url('assets/');?>css/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link href="<?=base_url('assets/');?>css/templatemo-festava-live.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <!-- Tambahkan CSS Lightbox -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    <!--

TemplateMo 583 Festava Live

https://templatemo.com/tm-583-festava-live

-->
</head>

<body>

    <main>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="<?=base_url('pages')?>">
                    <img src="<?=base_url('assets/img/logo.png');?>" alt="logo dinas pariwisata belu">
                </a>

                <a href="<?=base_url('pages')?>" class="btn custom-btn d-lg-none ms-auto me-4"><svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                    </svg></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                        <li class="nav-item">
                            <a class="nav-link <?=$menu == 'beranda'?'active':''?>"
                                href="<?=base_url('pages')?>">Beranda</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?=$menu == 'tempat_wisata'?'active':''?>"
                                href="<?=base_url('pages/tempat_wisata')?>">Wisata</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?=$menu == 'kontak'?'active':''?>"
                                href="<?=base_url('pages/kontak')?>">Kontak</a>
                        </li>
                    </ul>

                    <a href="<?=base_url('auth/login')?>" class="btn custom-btn d-lg-block d-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                    </a>
                </div>
            </div>
        </nav>