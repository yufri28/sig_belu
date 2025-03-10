<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Geografis Pariwisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="<?=base_url('assets/css/style.css');?>"> -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md fixed-top navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Pariwisata</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?=$menu == 'beranda'?'active':''?>"
                            href="<?=base_url('pages')?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=$menu == 'tempat_wisata'?'active':''?>"
                            href="<?=base_url('pages/tempat_wisata')?>">Tempat Wisata</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=$menu == 'kontak'?'active':''?>"
                            href="<?=base_url('pages/kontak')?>">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url('auth/login')?>">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <hr>
    <!-- Main Content -->
    <div class="container mt-5">