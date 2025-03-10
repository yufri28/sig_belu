<style>
.map-responsive {
    position: relative;
    overflow: hidden;
    padding-bottom: 56.25%;
    /* 16:9 aspect ratio */
    height: 0;
}

.map-responsive iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>


<section class="hero-section" id="section_2">
    <div class="section-overlay"></div>

    <div class="container d-flex justify-content-center align-items-center">
        <div class="row d-flex justify-content-center align-content-center">
            <div class="col-12 mt-auto mb-5 text-center">
                <h1 class="text-white d-none d-lg-block">Kontak Kami
                </h1>
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
                    <a href="https://www.tiktok.com/@belu_pariwisata?_t=ZS-8uJoENY8gad&_r=1" class="social-icon-link">
                        <span class="bi-tiktok"></span>
                    </a>
                </li>
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
<section class="contact-section section-padding" id="section_6">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-12 mx-auto">
                <h2 class="text-center mb-4">Kontak</h2>

                <nav class="d-flex justify-content-center">
                    <div class="nav nav-tabs align-items-baseline justify-content-center" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-ContactForm-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-ContactForm" type="button" role="tab" aria-controls="nav-ContactForm"
                            aria-selected="false">
                            <h5>Daftar Kontak</h5>
                        </button>

                        <button class="nav-link" id="nav-ContactMap-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-ContactMap" type="button" role="tab" aria-controls="nav-ContactMap"
                            aria-selected="false">
                            <h5>Google Maps</h5>
                        </button>
                    </div>
                </nav>

                <div class="tab-content shadow-lg mt-5" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-ContactForm" role="tabpanel"
                        aria-labelledby="nav-ContactForm-tab">
                        <div class="card-header text-center">
                            Hubungi Kami
                        </div>
                        <div class="card-body">
                            <ul class="text-center">
                                <li style="list-style:none;"><strong>Email:</strong>
                                    <span id="emailText"><?= $contact['email']??'-'; ?></span>
                                </li>
                                <li style="list-style:none;"><strong>Telepon:</strong>
                                    <span id="teleponText"><?= $contact['telepon']??'-'; ?></span>
                                </li>
                                <li style="list-style:none;"><strong>Alamat:</strong>
                                    <span id="alamatText"><?= $contact['alamat']??'-'; ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade text-center" id="nav-ContactMap" role="tabpanel"
                        aria-labelledby="nav-ContactMap-tab">
                        <div class="card">
                            <div class="map-responsive">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3939.523909242183!2d124.89173117485959!3d-9.10706019095742!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2cffbe65baa3bf49%3A0xfade05ed1ffd4a90!2sDinas%20Pariwisata%20Kabupaten%20Belu!5e0!3m2!1sid!2sid!4v1740834658179!5m2!1sid!2sid"
                                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
</main>