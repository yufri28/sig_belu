<style>
<style>.contact-card {
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
</style>
<!-- Judul dan Deskripsi -->
<div class="container mt-5 pt-4">
    <h1 class="text-start">Dinas Pariwisata Kabupaten Belu</h1>
    <p class="text-start description">Dinas Pariwisata Kabupaten Belu bertujuan untuk mempromosikan keindahan alam,
        budaya, dan destinasi wisata unggulan di wilayah Belu. Kami berkomitmen untuk mengembangkan pariwisata yang
        berkelanjutan dan memberikan manfaat kepada masyarakat setempat.</p>

    <!-- Display Flex Gambar -->
    <div class="gallery">
        <img src="<?=base_url()?>assets/img/blogpost.jpg" alt="Wisata 1">
        <img src="<?=base_url()?>assets/img/blogpost.jpg" alt="Wisata 2">
        <img src="<?=base_url()?>assets/img/blogpost.jpg" alt="Wisata 3">
        <img src="<?=base_url()?>assets/img/blogpost.jpg" alt="Wisata 4">
    </div>
</div>
<div class="row">
    <!-- Hubungi Kami -->
    <div class="col-lg-6">
        <div class="card shadow">
            <div class="card-header text-center">
                Hubungi Kami
            </div>
            <div class="card-body">
                <ul class="text-center">
                    <li><strong>Email:</strong>
                        <span id="emailText"><?= $contact['email']??'-'; ?></span>
                    </li>
                    <li><strong>Telepon:</strong>
                        <span id="teleponText"><?= $contact['telepon']??'-'; ?></span>
                    </li>
                    <li><strong>Alamat:</strong>
                        <span id="alamatText"><?= $contact['alamat']??'-'; ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <!-- Peta -->
    <div class="col-lg-6">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3939.5239676229503!2d124.89173117417877!3d-9.107054894150881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2cffbe65baa3bf49%3A0xfade05ed1ffd4a90!2sDinas%20Pariwisata%20Kabupaten%20Belu!5e0!3m2!1sid!2sid!4v1731460915767!5m2!1sid!2sid"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>

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

    // Nonaktifkan contenteditable dan ganti tombol kembali
    textElement.contentEditable = false;
    editBtn.classList.remove("d-none"); // Tampilkan tombol edit
    saveBtn.classList.add("d-none"); // Sembunyikan tombol simpan

    // Simpan perubahan (contoh dengan alert, implementasi sebenarnya gunakan AJAX)
    alert(type.charAt(0).toUpperCase() + type.slice(1) + " berhasil diperbarui menjadi: " + textElement.innerText);
}

function capitalize(word) {
    return word.charAt(0).toUpperCase() + word.slice(1);
}
</script>