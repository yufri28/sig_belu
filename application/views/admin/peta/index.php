<style>
#map {
    height: 400px;
    margin-bottom: 20px;
    border-radius: 10px;
}
</style>

<div class="container">
    <div class="page-inner">
        <h3 class="fw-bold mb-3">Peta</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <!-- <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63536.63871717301!2d95.32870249999999!3d5.5611019!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3040377ae63dbcdf%3A0x3039d80b220cb90!2sBanda%20Aceh%2C%20Kota%20Banda%20Aceh%2C%20Aceh!5e0!3m2!1sid!2sid!4v1701054428265!5m2!1sid!2sid"
                            width="600" height="450" style="border: 0; width: 100%" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                        <div id="map" style="height: 450px;" class="mb-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
<script>
var map = L.map('map').setView([-9.1750381, 124.6628093], 10); // Set lokasi peta ke Belu

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(map);

// Tambahkan marker di peta
<?php foreach ($wisata_list as $key => $wisata) : ?>
var marker = L.marker([<?=$wisata['latitude'];?>, <?=$wisata['longitude'];?>]).addTo(map)
    .bindPopup('<div style="text-align: center;">' +
        '<img src="<?=base_url('uploads/wisata/'.$wisata['foto']);?>" alt="<?=$wisata['nama_wisata'];?>" style="width: 100%; height: auto; max-width: 300px;"><br>' +
        '</div>' +
        '<b><?=$wisata['nama_wisata'];?></b><br>').openPopup();
<?php endforeach; ?>
</script>