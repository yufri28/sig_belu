<style>
#map {
    height: 400px;
    margin-bottom: 20px;
    border-radius: 10px;
}
</style>

<div class="row">
    <div class="col-lg-12">
        <h1>Sistem Informasi Geografis Pariwisata Kabupaten Belu</h1>
        <p>Sebuah sistem yang menyediakan informasi mengenai tempat wisata yang ada di kabupaten Belu.</p>
    </div>
    <div class="col-lg-12">
        <div id="map" style="height: 450px;" class="mb-4"></div>
        <!-- Leaflet Map -->
        <!-- <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d504162.8022579064!2d124.66280925898103!3d-9.17503805346371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2cff0a519b0da6d5%3A0xedb02b9463fda618!2sKabupaten%20Belu%2C%20Nusa%20Tenggara%20Tim.!5e0!3m2!1sid!2sid!4v1731460992877!5m2!1sid!2sid"
            width="600" height="450" style="border:0; width: 100%" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe> -->
    </div>
</div>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
<script>
var map = L.map('map').setView([-9.1750381, 124.6628093], 10); // Set lokasi peta ke Belu

// Gunakan tile layer dari Esri untuk tampilan satelit
L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
    attribution: 'Tiles © Esri — Source: Esri, DeLorme, NAVTEQ',
}).addTo(map);

// Tambahkan marker di peta
<?php foreach ($wisata_list as $key => $wisata) : ?>
var marker = L.marker([<?=$wisata['latitude'];?>, <?=$wisata['longitude'];?>]).addTo(map)
    .bindPopup(
        '<div style="text-align: center;">' +
        '<img src="<?=base_url('uploads/wisata/'.$wisata['foto']);?>" alt="<?=$wisata['nama_wisata'];?>" style="width: 100%; height: auto; max-width: 300px;"><br>' +
        '</div>' +
        '<b><?=$wisata['nama_wisata'];?></b><br>').openPopup();
<?php endforeach; ?>

// Tambahkan poligon untuk area Kabupaten Belu
var beluPolygon = L.polygon([
    [-9.106, 124.526], // Koordinat contoh 1
    [-9.121, 124.552], // Koordinat contoh 2
    [-9.157, 124.601], // Koordinat contoh 3
    [-9.178, 124.605], // Koordinat contoh 4
    [-9.213, 124.642], // Koordinat contoh 5
    [-9.244, 124.607], // Koordinat contoh 6
    [-9.280, 124.567], // Koordinat contoh 7
    [-9.294, 124.531], // Koordinat contoh 8
    [-9.265, 124.487], // Koordinat contoh 9
    [-9.232, 124.456], // Koordinat contoh 10
    [-9.200, 124.441], // Koordinat contoh 11
    [-9.160, 124.451], // Koordinat contoh 12
    [-9.127, 124.476], // Koordinat contoh 13
    [-9.112, 124.510], // Koordinat contoh 14
    [-9.106, 124.526]
    // Tambahkan koordinat lain sesuai kebutuhan
], {
    color: 'blue', // Warna garis poligon
    fillColor: 'rgba(0, 0, 255, 0.2)', // Warna isi dengan transparansi
    fillOpacity: 0.5, // Transparansi isi poligon
}).addTo(map);

// Bind popup untuk menampilkan nama area
beluPolygon.bindPopup("Area Kabupaten Belu");
</script>