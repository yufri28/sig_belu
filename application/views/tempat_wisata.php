<section class="hero-section" id="section_2">
    <div class="section-overlay"></div>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row">

            <div class="col-12 mt-auto mb-5 text-center">
                <p><small> <i>---------------- Top Destination</i></small></p>
                <h3 class="text-white fs-1 d-block d-lg-none">Yuk Jelajahi destinasi impianmu disini!</h3>
                <h1 class="text-white d-none d-lg-block">Yuk Jelajahi destinasi impianmu disini!
                </h1>
                <p><small>Daftar daya tarik wisata Kabupaten Belu yang terbagi dalam 5 kategori wisata.</small>
                </p>
            </div>


            <div class="col-lg-12 col-12 mt-auto d-flex flex-column flex-lg-row text-center">
                <div class="location-wrap me-sm-auto py-3 py-lg-0">
                    <h5 class="text-white">
                        <i class="custom-icon bi-geo-alt me-2"></i>
                        Kabupaten Belu, NTT
                    </h5>
                </div>

                <div class="social-share">
                    <ul class="social-icon d-flex align-items-center justify-content-center">
                        <span class="text-white me-3">Share:</span>

                        <li class="social-icon-item">
                            <a href="https://www.facebook.com/profile.php?id=100014992931309" class="social-icon-link">
                                <span class="bi-facebook"></span>
                            </a>
                        </li>

                        <li class="social-icon-item">
                            <a href="https://www.youtube.com/@belupariwisata3484" class="social-icon-link">
                                <span class="bi-youtube"></span>
                            </a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link">
                                <span class="bi-instagram"></span>
                            </a>
                        </li>
                        <li class="social-icon-item">
                            <a href="https://www.tiktok.com/@belu_pariwisata?_t=ZS-8uJoENY8gad&_r=1"
                                class="social-icon-link">
                                <span class="bi-tiktok"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="video-wrap">
        <video autoplay="" loop="" muted="" class="custom-video" poster="">
            <source src="<?=base_url('assets/');?>video/videoplayback.mp4" type="video/mp4">

            Your browser does not support the video tag.
        </video>
    </div>
</section>
<section class="mt-5">
    <h3 class="text-center mb-5">Wisata Alam</h3>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <?php
            $wisata_alam_ada = false; // Variabel indikator

            foreach ($wisata_list as $key => $value) :
                if ($value['nama_kategori'] == 'Alam') :
                    $wisata_alam_ada = true; // Jika ada wisata dalam kategori Religi, ubah indikator menjadi true
            ?>
            <div class="card col-4 text-center bg-transparent border-0" style="width: 25rem;">
                <?php
                // Decode JSON foto
                $fotos = json_decode($value['foto'], true);
                // Ambil 1 gambar pertama dari array JSON
                $foto_ditampilkan = !empty($fotos) ? $fotos[0] : 'default.jpg'; // Fallback ke 'default.jpg' jika tidak ada foto
                ?>
                <div class="card-img-top img-fluid rounded-4">
                    <a href="<?=base_url('uploads/wisata/') . $foto_ditampilkan;?>"
                        data-lightbox="wisata-<?=$value['id_wisata'];?>" data-title="Foto <?=$value['nama_wisata'];?>">
                        <img src="<?=base_url('uploads/wisata/') . $foto_ditampilkan;?>" class="img-fluid rounded-4"
                            alt="Foto <?=$value['nama_wisata'];?>">
                    </a>
                </div>

                <div class="card-body text-center">
                    <div class="card-title">
                        <?=$value['nama_wisata'];?>
                    </div>
                    <a href="<?= base_url('pages/detail_wisata/'.$value['id_wisata']); ?>" class="btn btn-light">Lihat
                        selengkapnya</a>
                    <a target="_blank"
                        href="https://www.google.com/maps/dir/?api=1&destination=<?= $value['latitude']; ?>,<?= $value['longitude']; ?>"
                        class="btn btn-light">Google Maps</a>
                </div>
            </div>
            <?php
                endif;
            endforeach;

            // Jika tidak ada wisata dalam kategori Religi, tampilkan pesan
            if (!$wisata_alam_ada) :
            ?>
            <div class="col-12 text-center">
                <p>Belum ada wisata.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<section class="mt-5">
    <h3 class="text-center mb-5">Wisata Religi</h3>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <?php
            $wisata_religi_ada = false; // Variabel indikator

            foreach ($wisata_list as $key => $value) :
                if ($value['nama_kategori'] == 'Religi') :
                    $wisata_religi_ada = true; // Jika ada wisata dalam kategori Religi, ubah indikator menjadi true
            ?>
            <div class="card col-4 bg-transparent text-center border-0" style="width: 25rem;">
                <?php
                // Decode JSON foto
                $fotos = json_decode($value['foto'], true);
                // Ambil 1 gambar pertama dari array JSON
                $foto_ditampilkan = !empty($fotos) ? $fotos[0] : 'default.jpg'; // Fallback ke 'default.jpg' jika tidak ada foto
                ?>
                <div class="card-img-top img-fluid rounded-4">
                    <a href="<?=base_url('uploads/wisata/') . $foto_ditampilkan;?>"
                        data-lightbox="wisata-<?=$value['id_wisata'];?>" data-title="Foto <?=$value['nama_wisata'];?>">
                        <img src="<?=base_url('uploads/wisata/') . $foto_ditampilkan;?>" class="img-fluid rounded-4"
                            alt="Foto <?=$value['nama_wisata'];?>">
                    </a>
                </div>
                <div class="card-body text-center">
                    <div class="card-title">
                        <?=$value['nama_wisata'];?>
                    </div>
                    <a href="<?= base_url('pages/detail_wisata/'.$value['id_wisata']); ?>" class="btn btn-light">Lihat
                        selengkapnya</a>
                    <a target="_blank"
                        href="https://www.google.com/maps/dir/?api=1&destination=<?= $value['latitude']; ?>,<?= $value['longitude']; ?>"
                        class="btn btn-light">Google Maps</a>
                </div>
            </div>
            <?php
                endif;
            endforeach;

            // Jika tidak ada wisata dalam kategori Religi, tampilkan pesan
            if (!$wisata_religi_ada) :
            ?>
            <div class="col-12 text-center">
                <p>Belum ada wisata.</p>
            </div>
            <?php endif; ?>
        </div>

    </div>
</section>
<section class="mt-5">
    <h3 class="text-center mb-5">Wisata Budaya</h3>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <?php
            $wisata_budaya_ada = false; // Variabel indikator

            foreach ($wisata_list as $key => $value) :
                if ($value['nama_kategori'] == 'Budaya') :
                    $wisata_budaya_ada = true; // Jika ada wisata dalam kategori Religi, ubah indikator menjadi true
            ?>
            <div class="card col-4 bg-transparent text-center border-0" style="width: 25rem;">
                <?php
                // Decode JSON foto
                $fotos = json_decode($value['foto'], true);
                // Ambil 1 gambar pertama dari array JSON
                $foto_ditampilkan = !empty($fotos) ? $fotos[0] : 'default.jpg'; // Fallback ke 'default.jpg' jika tidak ada foto
                ?>
                <div class="card-img-top img-fluid rounded-4">
                    <a href="<?=base_url('uploads/wisata/') . $foto_ditampilkan;?>"
                        data-lightbox="wisata-<?=$value['id_wisata'];?>" data-title="Foto <?=$value['nama_wisata'];?>">
                        <img src="<?=base_url('uploads/wisata/') . $foto_ditampilkan;?>" class="img-fluid rounded-4"
                            alt="Foto <?=$value['nama_wisata'];?>">
                    </a>
                </div>
                <div class="card-body text-center">
                    <div class="card-title">
                        <?=$value['nama_wisata'];?>
                    </div>
                    <a href="<?= base_url('pages/detail_wisata/'.$value['id_wisata']); ?>" class="btn btn-light">Lihat
                        selengkapnya</a>
                    <a target="_blank"
                        href="https://www.google.com/maps/dir/?api=1&destination=<?= $value['latitude']; ?>,<?= $value['longitude']; ?>"
                        class="btn btn-light">Google Maps</a>
                </div>
            </div>
            <?php
                endif;
            endforeach;

            // Jika tidak ada wisata dalam kategori Religi, tampilkan pesan
            if (!$wisata_budaya_ada) :
            ?>
            <div class="col-12 text-center">
                <p>Belum ada wisata.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<section class="mt-5">
    <h3 class="text-center mb-5">Wisata Buatan</h3>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <?php
            $wisata_buatan_ada = false; // Variabel indikator

            foreach ($wisata_list as $key => $value) :
                if ($value['nama_kategori'] == 'Buatan') :
                    $wisata_buatan_ada = true; // Jika ada wisata dalam kategori Religi, ubah indikator menjadi true
            ?>
            <div class="card col-4 bg-transparent text-center border-0" style="width: 25rem;">
                <?php
                // Decode JSON foto
                $fotos = json_decode($value['foto'], true);
                // Ambil 1 gambar pertama dari array JSON
                $foto_ditampilkan = !empty($fotos) ? $fotos[0] : 'default.jpg'; // Fallback ke 'default.jpg' jika tidak ada foto
                ?>
                <div class="card-img-top img-fluid rounded-4">
                    <a href="<?=base_url('uploads/wisata/') . $foto_ditampilkan;?>"
                        data-lightbox="wisata-<?=$value['id_wisata'];?>" data-title="Foto <?=$value['nama_wisata'];?>">
                        <img src="<?=base_url('uploads/wisata/') . $foto_ditampilkan;?>" class="img-fluid rounded-4"
                            alt="Foto <?=$value['nama_wisata'];?>">
                    </a>
                </div>
                <div class="card-body text-center">
                    <div class="card-title">
                        <?=$value['nama_wisata'];?>
                    </div>
                    <a href="<?= base_url('pages/detail_wisata/'.$value['id_wisata']); ?>" class="btn btn-light">Lihat
                        selengkapnya</a>
                    <a target="_blank"
                        href="https://www.google.com/maps/dir/?api=1&destination=<?= $value['latitude']; ?>,<?= $value['longitude']; ?>"
                        class="btn btn-light">Google Maps</a>
                </div>
            </div>
            <?php
                endif;
            endforeach;

            // Jika tidak ada wisata dalam kategori Religi, tampilkan pesan
            if (!$wisata_buatan_ada) :
            ?>
            <div class="col-12 text-center">
                <p>Belum ada wisata.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<section class="mt-5">
    <h3 class="text-center mb-5">Wisata Kuliner</h3>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <?php
            $wisata_kuliner_ada = false; // Variabel indikator

            foreach ($wisata_list as $key => $value) :
                if ($value['nama_kategori'] == 'Kuliner') :
                    $wisata_kuliner_ada = true; // Jika ada wisata dalam kategori Religi, ubah indikator menjadi true
            ?>
            <div class="card col-4 bg-transparent text-center border-0" style="width: 25rem;">
                <?php
                // Decode JSON foto
                $fotos = json_decode($value['foto'], true);
                // Ambil 1 gambar pertama dari array JSON
                $foto_ditampilkan = !empty($fotos) ? $fotos[0] : 'default.jpg'; // Fallback ke 'default.jpg' jika tidak ada foto
                ?>
                <div class="card-img-top img-fluid rounded-4">
                    <a href="<?=base_url('uploads/wisata/') . $foto_ditampilkan;?>"
                        data-lightbox="wisata-<?=$value['id_wisata'];?>" data-title="Foto <?=$value['nama_wisata'];?>">
                        <img src="<?=base_url('uploads/wisata/') . $foto_ditampilkan;?>" class="img-fluid rounded-4"
                            alt="Foto <?=$value['nama_wisata'];?>">
                    </a>
                </div>
                <div class="card-body text-center">
                    <div class="card-title">
                        <?=$value['nama_wisata'];?>
                    </div>
                    <a href="<?= base_url('pages/detail_wisata/'.$value['id_wisata']); ?>" class="btn btn-light">Lihat
                        selengkapnya</a>
                    <a target="_blank"
                        href="https://www.google.com/maps/dir/?api=1&destination=<?= $value['latitude']; ?>,<?= $value['longitude']; ?>"
                        class="btn btn-light">Google Maps</a>
                </div>
            </div>
            <?php
                endif;
            endforeach;

            // Jika tidak ada wisata dalam kategori Religi, tampilkan pesan
            if (!$wisata_kuliner_ada) :
            ?>
            <div class="col-12 text-center">
                <p>Belum ada wisata.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>