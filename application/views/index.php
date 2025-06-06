<section class="hero-section" id="section_1">
    <div class="section-overlay"></div>

    <div class="container d-flex justify-content-center align-items-center">
        <div class="row">

            <div class="col-12 mt-auto mb-5 text-center">
                <h4 class="d-block d-lg-none" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
                    <small>Selamat datang di</small>
                </h4>
                <h3 class="text-white fs-1 d-block d-lg-none" data-aos="fade-up"
                    data-aos-anchor-placement="bottom-bottom">Sistem Informasi Geografis Pariwisata Kabupaten
                    Belu</h3>
                <h2 class="d-none d-lg-block" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
                    <small>Selamat datang di</small>
                </h2>
                <h1 class="text-white d-none d-lg-block" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
                    Sistem Informasi Geografis Pariwisata Kabupaten Belu
                </h1>
                <p data-aos="fade-up" data-aos-anchor-placement="bottom-bottom"><small>Sistem Informasi Geografis
                        Pariwisata Kabupaten Belu menyediakan informasi geografis
                        di Kabupaten Belu sebanyak 21 destinasi wisata yang terdiri dari beberapa kategori
                        wisata. Sistem ini dibuat untuk memudahkan wisatawan ketika akan mengunjungi destinasi
                        wisata.</small></p>
                <!-- <a class="btn custom-btn smoothscroll" href="#section_2">Let's begin</a> -->
            </div>


            <div class="col-lg-12 col-12 mt-auto d-flex flex-column flex-lg-row text-center" data-aos="fade-up"
                data-aos-anchor-placement="bottom-bottom">
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

<section class="section-padding" data-aos="fade-up">
    <div class="container">
        <div id="map" style="height: 650px; z-index: 1;" class="rounded-4 mb-4"></div>
    </div>
</section>
<section class="section-padding" style="background-color: #9ccddb;">
    <h3 class="text-center mb-5">5 Destinasi Terpopuler</h3>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <?php foreach($destinasi_terpopuler as $destinasi): ?>
            <?php
                // Decode JSON foto
                $fotos = json_decode($destinasi['foto'], true);
                // Ambil 1 gambar pertama dari array JSON
                $foto_ditampilkan = !empty($fotos) ? $fotos[0] : 'default.jpg'; // Fallback ke 'default.jpg' jika tidak ada foto
            ?>
            <div class="card col-4 bg-transparent text-center border-0" style="width: 25rem;" data-aos="fade-up"
                data-aos-anchor-placement="bottom-bottom">
                <div class="card-img-top img-fluid rounded-4">
                    <a href="<?=base_url('uploads/wisata/') . $foto_ditampilkan;?>"
                        data-lightbox="wisata-<?=$destinasi['id_wisata'];?>"
                        data-title="Foto <?=$destinasi['nama_wisata'];?>">
                        <img src="<?=base_url('uploads/wisata/') . $foto_ditampilkan;?>" class="img-fluid rounded-4"
                            alt="Foto <?=$destinasi['nama_wisata'];?>">
                    </a>
                </div>
                <div class="card-body text-center">
                    <div class="card-title">
                        <?= $destinasi['nama_wisata']; ?>
                    </div>
                    <a href="<?= base_url('pages/detail_wisata/'.$destinasi['id_wisata']); ?>"
                        class="btn btn-light">Lihat
                        selengkapnya</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="about-section section-padding">
    <div class="container">
        <div class="row">
            <h2 class="text-white mb-4">At a Glance</h2>
            <div class="col-lg-6 col-12 mb-4 mb-lg-0 d-flex align-items-center" data-aos="fade-right">
                <div class="services-info">
                    <p class="text-white">Belu adalah kabupaten di Nusa Tenggara Timur yang berbatasan langsung
                        dengan negara Timor Leste. Dengan luas wilayah 1.284,94 km^2 dan terbagi dalam 12
                        kecamatan. Kota 'Belu' menurut penuturan para tetua ada bermakna Persahabatan. Sedangkan
                        Atambua, sebagai ibukotanya, memiliki sejarah tersendiri. Nama tersebut berasal dari
                        kata 'Ata' yang artinya hamba dan 'Buan' yang artinya suanggi. Jadi Atambua artinya
                        tempat hamba-hamba suanggi. Konon di daerah ini dipergunakan oelah para raja sebagai
                        tempat pembuangan para suanggi yang mengganggu masyarakat. Kemudia dalam perkembanganya
                        kota Atabuan mengalami penyisipan fonem "M" menjadi Atambua sebagaimana popular
                        sekarang.</p>
                </div>
            </div>
            <div class="col-lg-6 col-12 mb-4 mb-lg-0 d-flex align-items-center" data-aos="fade-left">
                <div class="services-info">
                    <p class="text-white">Mayoritas penduduk Belu adalah empat etnis: Tetun, Bunak, Kemak,
                        Dawan, dengan bahasanya sendiri. Sebelum Atambua, ibukota Belu adalah Atapupu yang
                        berada dipesisir pantai (1866-1911). Tahun 1945, Presiden Indonesia pertama Ir. Soekarno
                        berkunjung ke Atambua dan sempat menanam beberaoa pohon di tengah kota yang masih hidup
                        hingga kini. Seiring diperhatikannya posisi daerah ini sebagai gerbang Indonesia, maka
                        pembangunan infrastruktur pun digalakan, membuka akses untuk menjangkau wilayah-wilayah
                        yang selama ini tersembunyi. Topografi Belu dimonopoli oleh perbukitan serta lembah,
                        dengan hutan pohon jati, dan kampung-kampung tua. Sekaranglah saat yang tempat untuk
                        menjelajahi kealmiahan Belu.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
<script>
var map = L.map('map').setView([-9.1710815, 124.9096944], 11); // Set lokasi peta ke Belu

// Gunakan tile layer dari Esri untuk tampilan satelit
L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
    attribution: 'Tiles © Esri — Source: Esri, DeLorme, NAVTEQ',
}).addTo(map);

// Tambahkan marker di peta
<?php foreach ($wisata_list as $key => $wisata) : ?>
// var marker = L.marker([<?=$wisata['latitude'];?>, <?=$wisata['longitude'];?>]).addTo(map)
//     .bindPopup(
//         '<div style="text-align: center;">' +
//         '<img src="<?=base_url('uploads/wisata/'.$wisata['foto']);?>" alt="<?=$wisata['nama_wisata'];?>" style="width: 100%; height: auto; max-width: 300px;"><br>' +
//         '</div>' +
//         '<b><?=$wisata['nama_wisata'];?></b><br>').openPopup();
<?php endforeach; ?>
// Definisikan ikon SVG untuk masing-masing kategori wisata
var icons = {
    'Alam': L.divIcon({
        html: `<div style="color:rgb(12, 240, 65); font-size: 24px;"> <!-- Hijau -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
            </svg>
        </div>`,
        className: '',
        iconSize: [30, 42],
        iconAnchor: [15, 42],
        popupAnchor: [0, -40]
    }),
    'Religi': L.divIcon({
        html: `<div style="color:rgb(151, 99, 248); font-size: 24px;"> <!-- Ungu -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
            </svg>
        </div>`,
        className: '',
        iconSize: [30, 42],
        iconAnchor: [15, 42],
        popupAnchor: [0, -40]
    }),
    'Budaya': L.divIcon({
        html: `<div style="color:rgb(252, 164, 93); font-size: 24px;"> <!-- Oranye -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
            </svg>
        </div>`,
        className: '',
        iconSize: [30, 42],
        iconAnchor: [15, 42],
        popupAnchor: [0, -40]
    }),
    'Buatan': L.divIcon({
        html: `<div style="color:rgb(0, 166, 255); font-size: 24px;"> <!-- Hijau Toska -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
            </svg>
        </div>`,
        className: '',
        iconSize: [30, 42],
        iconAnchor: [15, 42],
        popupAnchor: [0, -40]
    }),
    'Kuliner': L.divIcon({
        html: `<div style="color: #dc3545; font-size: 24px;"> <!-- Merah -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
            </svg>
        </div>`,
        className: '',
        iconSize: [30, 42],
        iconAnchor: [15, 42],
        popupAnchor: [0, -40]
    }),
    'Default': L.divIcon({
        html: `<div style="color:rgb(10, 132, 239); font-size: 24px;"> <!-- Abu-abu -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
            </svg>
        </div>`,
        className: '',
        iconSize: [30, 42],
        iconAnchor: [15, 42],
        popupAnchor: [0, -40]
    })
};

<?php foreach ($wisata_list as $key => $wisata) : ?>
<?php
    $fotos = json_decode($wisata['foto'], true);
    $foto_pertama = !empty($fotos) ? $fotos[0] : 'default.jpg';
    $kategori = $wisata['nama_kategori'] ?? 'Default';
?>
var marker = L.marker(
        [<?= $wisata['latitude']; ?>, <?= $wisata['longitude']; ?>], {
            icon: icons['<?= $kategori; ?>'] || icons['Default']
        }
    ).addTo(map)
    .bindPopup(
        '<div style="text-align: center;">' +
        '<a href="<?= base_url('uploads/wisata/' . $foto_pertama); ?>" data-lightbox="wisata-<?= $wisata['id_wisata']; ?>" data-title="<?= $wisata['nama_wisata']; ?>">' +
        '<img src="<?= base_url('uploads/wisata/' . $foto_pertama); ?>" alt="<?= $wisata['nama_wisata']; ?>" style="width: 100%; height: auto; max-width: 300px;"><br>' +
        '</a>' +
        '</div>' +
        '<b><?= $wisata['nama_wisata']; ?></b><br>'
    );
<?php endforeach; ?>

var legend = L.control({
    position: 'bottomright'
});

legend.onAdd = function(map) {
    var div = L.DomUtil.create('div', 'info legend');
    var categories = [{
            name: 'Alam',
            color: 'rgb(12, 240, 65)'
        }, // Hijau
        {
            name: 'Religi',
            color: 'rgb(151, 99, 248)'
        }, // Ungu
        {
            name: 'Budaya',
            color: 'rgb(252, 164, 93)'
        }, // Oranye
        {
            name: 'Buatan',
            color: 'rgb(0, 166, 255)'
        }, // Toska
        {
            name: 'Kuliner',
            color: '#dc3545'
        } // Merah
    ];

    div.style.background = 'white';
    div.style.padding = '10px';
    div.style.border = '1px solid #ccc';
    div.style.borderRadius = '5px';
    div.style.boxShadow = '0 0 10px rgba(0,0,0,0.2)';
    div.style.lineHeight = '24px';
    div.style.fontSize = '14px';

    div.innerHTML += '<strong>Kategori Wisata</strong><br>';
    categories.forEach(function(cat) {
        div.innerHTML +=
            '<i style="background:' + cat.color +
            '; width: 18px; height: 18px; display: inline-block; margin-right:8px; border-radius:50%;"></i> ' +
            cat.name + '<br>';
    });

    return div;
};

legend.addTo(map);


var dataGeojsonUrl = "<?=base_url('assets/geojson/kab_belu.geojson');?>";

fetch(dataGeojsonUrl)
    .then(response => response.json())
    .then(dataGeojson => {
        // Mengakses elemen pertama dari 'features' dan kemudian geometri dari elemen tersebut
        const geometry = dataGeojson['features'][0]['geometry'];

        // Mengambil array koordinat (MultiPolygon)
        const coordinates = geometry['coordinates'];

        // Mengonversi koordinat dari GeoJSON (longitude, latitude) menjadi format Leaflet (latitude, longitude)
        const beluCoordinates = coordinates[0][0].map(coord => [coord[1], coord[
            0]]); // Membalikkan nilai [longitude, latitude] menjadi [latitude, longitude]

        console.log(beluCoordinates); // Tampilkan hasil koordinat dalam format [latitude, longitude]

        // Tambahkan poligon untuk area Kabupaten Belu ke peta menggunakan koordinat dari GeoJSON
        var beluPolygon = L.polygon(beluCoordinates, {
            color: 'blue', // Warna garis poligon
            fillColor: 'rgba(0, 0, 255, 0.2)', // Warna isi dengan transparansi
            fillOpacity: 0.5, // Transparansi isi poligon
        }).addTo(map);
        // Bind popup untuk menampilkan nama area
        beluPolygon.bindPopup("Area Kabupaten Belu");
    })
    .catch(error => {
        console.error('Error fetching GeoJSON:', error);
    });
</script>