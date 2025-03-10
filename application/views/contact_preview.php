<style>
.contact-card {
    margin-top: 50px;
}

.card-header {
    font-size: 1.25rem;
}

.card-body ul {
    list-style-type: none;
    padding-left: 0;
}

.card-body ul li {
    margin-bottom: 10px;
}

.gallery {
    display: flex;
    justify-content: space-between;
    margin-top: 30px;
}

.gallery img {
    width: 23%;
    height: auto;
}

.row {
    margin-top: 50px;
}

iframe {
    width: 100%;
    height: 300px;
    border: 0;
}

.description {
    margin-top: 30px;
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
                                <ul class="text-center">
                                    <li><strong>Email:</strong>
                                        <span id="emailText"><?= $contact['email']??'-' ?></span>
                                        <?php if ($this->session->userdata('role') == 'admin'): ?>
                                        <button class="btn btn-link" id="editEmailBtn" onclick="toggleEdit('email')">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-link d-none" id="saveEmailBtn"
                                            onclick="saveChanges('email')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                                                <path d="M11 2H9v3h2z" />
                                                <path
                                                    d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z" />
                                            </svg>
                                        </button>
                                        <?php endif; ?>
                                    </li>
                                    <li><strong>Telepon:</strong>
                                        <span id="teleponText"><?= $contact['telepon']??'-'; ?></span>
                                        <?php if ($this->session->userdata('role') == 'admin'): ?>
                                        <button class="btn btn-link" id="editTeleponBtn"
                                            onclick="toggleEdit('telepon')">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-link d-none" id="saveTeleponBtn"
                                            onclick="saveChanges('telepon')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                                                <path d="M11 2H9v3h2z" />
                                                <path
                                                    d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z" />
                                            </svg>
                                        </button>
                                        <?php endif; ?>
                                    </li>
                                    <li><strong>Alamat:</strong>
                                        <span id="alamatText"><?= $contact['alamat']??'-' ?></span>
                                        <?php if ($this->session->userdata('role') == 'admin'): ?>
                                        <button class="btn btn-link" id="editAlamatBtn" onclick="toggleEdit('alamat')">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-link d-none" id="saveAlamatBtn"
                                            onclick="saveChanges('alamat')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                                                <path d="M11 2H9v3h2z" />
                                                <path
                                                    d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z" />
                                            </svg>
                                        </button>
                                        <?php endif; ?>
                                    </li>
                                </ul>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
function toggleEdit(type) {
    var textElement = document.getElementById(type + "Text");
    var editBtn = document.getElementById("edit" + capitalize(type) + "Btn");
    var saveBtn = document.getElementById("save" + capitalize(type) + "Btn");

    // Aktifkan contenteditable dan ganti tombol
    textElement.contentEditable = true;
    textElement.focus(); // Fokuskan pada elemen yang diedit
    editBtn.classList.add("d-none"); // Sembunyikan tombol edit
    saveBtn.classList.remove("d-none"); // Tampilkan tombol simpan
}


function saveChanges(type) {
    var textElement = document.getElementById(type + "Text");
    var editBtn = document.getElementById("edit" + capitalize(type) + "Btn");
    var saveBtn = document.getElementById("save" + capitalize(type) + "Btn");

    // Simpan perubahan melalui AJAX
    $.ajax({
        url: '<?= base_url('kontak/update') ?>',
        type: 'POST',
        data: {
            [type]: textElement.innerText
        },
        success: function(response) {
            var result = JSON.parse(response);
            if (result.status === 'success') {
                alert(result.message);
            } else {
                alert(result.message);
            }
        },
        error: function() {
            alert("Terjadi kesalahan, silakan coba lagi.");
        }
    });

    // Nonaktifkan contenteditable dan ganti tombol kembali
    textElement.contentEditable = false;
    editBtn.classList.remove("d-none"); // Tampilkan tombol edit
    saveBtn.classList.add("d-none"); // Sembunyikan tombol simpan
}

function capitalize(word) {
    return word.charAt(0).toUpperCase() + word.slice(1);
}
</script>