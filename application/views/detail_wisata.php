<section class="detail-wisata pb-4">
    <div class="section-overlay"></div>
</section>
<section class="section-padding">
    <div class="container">
        <style>
        #map {
            z-index: 1;
            height: 650px;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .img-fluid {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .img-fluid:hover {
            transform: scale(1.05);
        }

        .list-group-item {
            background-color: #f8f9fa;
            border: none;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .list-group-item:not(:last-child) {
            margin-bottom: 10px;
        }
        </style>


        <!-- Leaflet Map -->
        <div id="map"></div>
        <h2>Detail Tempat <?=$wisata['nama_wisata'];?></h2>
        <p><?=$wisata['deskripsi'];?></p>
        <!-- Gambar Wisata -->
        <!-- <img src="<?=base_url('uploads/wisata/'.$wisata['foto'])?>" class="img-fluid mt-3"
            alt="<?=$wisata['nama_wisata'];?>"> -->
        <?php
            $last_foto = '';
            // Decode JSON foto
            $fotos = json_decode($wisata['foto'], true);

            // Periksa apakah ada foto yang bisa ditampilkan
            if (!empty($fotos)) {
                foreach ($fotos as $index => $foto) {
                    $last_foto = $foto;
                    // Tampilkan setiap foto dengan lightbox
                    ?>
        <a href="<?=base_url('uploads/wisata/') . $foto;?>" data-lightbox="wisata-<?=$wisata['id_wisata'];?>"
            data-title="Foto <?=$wisata['nama_wisata'];?>">
            <img src="<?=base_url('uploads/wisata/') . $foto;?>" class="img-fluid mt-3"
                style="width: 150px; height: 150px; object-fit: cover;" alt="Foto <?=$wisata['nama_wisata'];?>">
        </a>
        <?php
                }
            } else {
                // Tampilkan fallback jika tidak ada foto
                echo '<p>Tidak ada foto untuk ditampilkan.</p>';
            }
            ?>
        <!-- Form Komentar -->
        <form class="mt-4" method="post" action="<?= base_url('ulasan/submit_comment'); ?>">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="namaemail@gmail.com" name="email" id="email"
                    required>
            </div>
            <div class="mb-3">
                <label for="komentar" class="form-label">Tambahkan Komentar</label>
                <textarea class="form-control" id="komentar" name="komentar" rows="3"
                    placeholder="Tuliskan komentar Anda di sini" required></textarea>
            </div>
            <input type="hidden" name="f_id_wisata" value="<?=$this->uri->segment(3)?>">
            <!-- ID wisata, bisa dinamis -->
            <input type="hidden" name="ulasan_id" value="0"> <!-- 0 karena ini komentar utama -->
            <button type="submit" class="btn btn-primary">Kirim Komentar</button>
        </form>

        <h4 class="mt-5">Komentar Pengunjung</h4>
        <ul class="list-group" id="commentList">
            <?php foreach ($ulasan as $index => $comment): ?>
            <!-- Komentar Utama -->
            <li class="list-group-item comment-item <?= $index >= 3 ? 'd-none' : ''; ?>"
                id="comment-<?= $comment['id_ulasan']; ?>">
                <small><i class="bi bi-patch-check-fill"></i> <?= $comment['email']; ?></small>

                <?php
                
        // Convert 'created_at' to timestamp and calculate the difference
        $createdAt = strtotime($comment['created_at']);
        $timeAgo = time() - $createdAt;
        
        // Calculate time difference in human-readable format
        if ($timeAgo < 1) {
            $timeText = "baru saja"; // If less than 1 second
        } elseif ($timeAgo < 60) {
            $timeText = $timeAgo . " detik yang lalu";
        } elseif ($timeAgo < 3600) {
            $minutes = floor($timeAgo / 60);
            $timeText = $minutes . " menit yang lalu";
        } elseif ($timeAgo < 86400) {
            $hours = floor($timeAgo / 3600);
            $timeText = $hours . " jam yang lalu";
        } elseif ($timeAgo < 2592000) {
            $days = floor($timeAgo / 86400);
            $timeText = $days . " hari yang lalu";
        } else {
            $timeText = date("d M Y", $createdAt); // For more than a month ago, show the date
        }
        ?>

                <small class="text-secondary"><?= $timeText; ?></small><br>
                <?= $comment['komentar']; ?>
                <button class="btn btn-sm btn-link"
                    onclick="showReplyForm(<?= $comment['id_ulasan']; ?>)">Balas</button>

                <!-- Tombol Hapus dengan Ikon Trash -->
                <?php if ($this->session->userdata('role') == 'admin'): ?>
                <button class="btn btn-sm btn-link text-dark" onclick="deleteComment(<?= $comment['id_ulasan']; ?>)">
                    <i class="bi bi-trash"></i>
                </button>
                <?php endif; ?>

                <!-- Balasan Komentar -->
                <?php if (!empty($comment['replies'])): ?>
                <ul class="list-group mt-2 reply-list" style="margin-left: 20px;">
                    <?php foreach ($comment['replies'] as $replyIndex => $reply): ?>
                    <li class="list-group-item reply-item <?= $replyIndex >= 2 ? 'd-none' : ''; ?>"
                        id="reply-<?= $reply['id_ulasan']; ?>">
                        <small><i class="bi bi-reply-fill"></i> <?= $reply['email']; ?></small>

                        <?php
                // Repeat the same time formatting for replies
                $createdAtReply = strtotime($reply['created_at']);
                $timeAgoReply = time() - $createdAtReply;
                
                if ($timeAgoReply < 1) {
                    $timeTextReply = "baru saja"; // If less than 1 second
                } elseif ($timeAgoReply < 60) {
                    $timeTextReply = $timeAgoReply . " detik yang lalu";
                } elseif ($timeAgoReply < 3600) {
                    $minutesReply = floor($timeAgoReply / 60);
                    $timeTextReply = $minutesReply . " menit yang lalu";
                } elseif ($timeAgoReply < 86400) {
                    $hoursReply = floor($timeAgoReply / 3600);
                    $timeTextReply = $hoursReply . " jam yang lalu";
                } elseif ($timeAgoReply < 2592000) {
                    $daysReply = floor($timeAgoReply / 86400);
                    $timeTextReply = $daysReply . " hari yang lalu";
                } else {
                    $timeTextReply = date("d M Y", $createdAtReply); // For more than a month ago, show the date
                }
                ?>

                        <small class="text-secondary"><?= $timeTextReply; ?></small><br>
                        <?= $reply['komentar']; ?>

                        <!-- Tombol Hapus Balasan dengan Ikon Trash -->
                        <?php if ($this->session->userdata('role') == 'admin'): ?>
                        <button class="btn btn-sm btn-link text-dark"
                            onclick="deleteReply(<?= $reply['id_ulasan']; ?>)">
                            <i class="bi bi-trash"></i>
                        </button>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; ?>
                    <?php if (count($comment['replies']) > 2): ?>
                    <li class="list-group-item">
                        <button class="btn btn-link btn-sm" onclick="toggleReplies(this)">Lihat lebih banyak
                            balasan</button>
                    </li>
                    <?php endif; ?>
                </ul>
                <?php endif; ?>
            </li>
            <?php endforeach; ?>
        </ul>


        <?php if (count($ulasan) > 3): ?>
        <button class="btn btn-link btn-sm" id="loadMoreBtn" onclick="toggleComments()">Lihat lebih banyak
            komentar</button>
        <?php endif; ?>

        <!-- Form Balasan Komentar -->
        <div id="replyFormContainer" style="display: none;">
            <h5 class="mt-5">Balas Komentar</h5>
            <form method="post" id="replyForm" action="<?= base_url('ulasan/submit_comment'); ?>">
                <div class="mb-3">
                    <label for="replyEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Masukkan email Anda" id="replyEmail"
                        name="email" required>
                </div>
                <div class="mb-3">
                    <label for="replyContent" class="form-label">Isi Balasan</label>
                    <textarea id="replyContent" class="form-control" name="komentar" rows="3"
                        placeholder="Tulis balasan Anda..." required></textarea>
                </div>
                <input type="hidden" name="ulasan_id" id="parentCommentId">
                <input type="hidden" name="f_id_wisata" value="<?=$this->uri->segment(3)?>">
                <!-- ID wisata bisa dinamis -->
                <button type="submit" class="btn btn-primary">Kirim Balasan</button>
                <button type="button" class="btn btn-secondary" onclick="hideReplyForm()">Batal</button>
            </form>
        </div>
        <script>
        function deleteComment(commentId) {
            if (confirm('Apakah Anda yakin ingin menghapus komentar ini?')) {
                // Kirim permintaan AJAX ke server untuk menghapus komentar
                $.ajax({
                    url: '<?= base_url("ulasan/delete"); ?>', // Sesuaikan dengan URL endpoint backend
                    method: 'POST',
                    data: {
                        id_ulasan: commentId
                    },
                    success: function(response) {
                        if (response) {
                            // Hapus elemen komentar dari halaman tanpa refresh
                            $('#comment-' + commentId).remove();
                            alert('Berhasil menghapus komentar.');
                        } else {
                            alert('Gagal menghapus komentar.');
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat menghapus komentar.');
                    }
                });
            }
        }

        function deleteReply(replyId) {
            if (confirm('Apakah Anda yakin ingin menghapus balasan ini?')) {
                $.ajax({
                    url: '<?= base_url("ulasan/delete"); ?>', // Sesuaikan dengan URL endpoint backend
                    method: 'POST',
                    data: {
                        id_ulasan: replyId
                    },
                    success: function(response) {
                        if (response) {
                            // Hapus elemen balasan dari halaman tanpa refresh
                            $('#reply-' + replyId).remove();
                            alert('Berhasil menghapus balasan.');
                        } else {
                            alert('Gagal menghapus balasan.');
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat menghapus balasan.');
                    }
                });
            }
        }


        function toggleComments() {
            const commentItems = document.querySelectorAll('.comment-item');
            const loadMoreBtn = document.getElementById('loadMoreBtn');

            // Check if currently showing more or fewer comments
            const isShowingMore = loadMoreBtn.textContent.includes('lebih sedikit');

            commentItems.forEach((item, index) => {
                // Show first 3 items if hiding, otherwise show all
                if (index >= 3) {
                    item.classList.toggle('d-none', !isShowingMore);
                }
            });

            // Toggle button text
            loadMoreBtn.textContent = isShowingMore ? 'Lihat lebih banyak komentar' : 'Lihat lebih sedikit komentar';
        }

        function toggleReplies(button) {
            const replyItems = button.closest('ul').querySelectorAll('.reply-item');

            // Check if currently showing more or fewer replies
            const isShowingMore = button.textContent.includes('lebih sedikit');

            replyItems.forEach((item, index) => {
                // Show first 2 items if hiding, otherwise show all
                if (index >= 2) {
                    item.classList.toggle('d-none', !isShowingMore);
                }
            });

            // Toggle button text
            button.textContent = isShowingMore ? 'Lihat lebih banyak balasan' : 'Lihat lebih sedikit balasan';
        }

        function showReplyForm(commentId) {
            var replyFormContainer = document.getElementById("replyFormContainer");
            var parentCommentIdInput = document.getElementById("parentCommentId");

            replyFormContainer.style.display = "block";
            parentCommentIdInput.value = commentId; // Set parent ID

            replyFormContainer.scrollIntoView({
                behavior: 'smooth'
            });
        }

        function hideReplyForm() {
            document.getElementById("replyFormContainer").style.display = "none";
        }
        </script>
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
        <style>
        .legend {
            background-color: white;
            /* Tambahkan background warna putih */
            padding: 10px;
            /* Tambahkan padding */
            border-radius: 5px;
            /* Tambahkan border radius agar sudut membulat */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            /* Tambahkan bayangan */
            line-height: 1.5;
            /* Tinggi baris agar jarak lebih rapi */
        }

        .legend i {
            display: inline-block;
            width: 20px;
            height: 20px;
            margin-right: 8px;
            /* Tambahkan jarak antara ikon dan teks */
            vertical-align: middle;
            /* Vertikal rata tengah */
        }

        .legend img {
            width: 20px;
            /* Ukuran gambar ikon */
            height: 20px;
            display: inline-block;
            vertical-align: middle;
        }
        </style>
        <script>
        var map = L.map('map').setView([<?=$wisata['latitude'];?>, <?=$wisata['longitude'];?>], 16);

        L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles © Esri — Source: Esri, DeLorme, NAVTEQ',
        }).addTo(map);

        // Marker untuk wisata
        var marker = L.marker([<?=$wisata['latitude'];?>, <?=$wisata['longitude'];?>]).addTo(map)
            .bindPopup('<div style="text-align: center;">' +
                '<img src="<?=base_url('uploads/wisata/'.$last_foto);?>" alt="<?=$wisata['nama_wisata'];?>" style="width: 100%; height: auto; max-width: 300px; border-radius: 8px; margin-bottom: 5px;"><br>' +
                '</div>' +
                '<b><?=$wisata['nama_wisata'];?></b><br>' +
                'Kontak: <?=$wisata['kontak'];?><br>' +
                'Jam Kunjung: <?=$wisata['jam_kunjung'];?><br>' +
                'Jam Tutup: <?=$wisata['jam_tutup'];?><br>' +
                'Kecamatan: <?=$wisata['nama_kecamatan'];?><br>' +
                'Kategori: <?=$wisata['nama_kategori'];?>').openPopup();


        // Polygon untuk wilayah wisata
        var polygonCoords = [<?=$wisata['geojson']; ?>];
        var convertedCoords = polygonCoords.map(function(coord) {
            return [coord[1], coord[0]];
        });

        if (Array.isArray(convertedCoords) && convertedCoords.length > 0) {
            L.polygon(convertedCoords, {
                color: 'blue',
                weight: 3,
                fillColor: 'lightblue',
                fillOpacity: 0.5
            }).addTo(map);
        } else {
            console.error('Invalid GeoJSON data');
        }

        // Icon untuk Fasilitas
        var greenIcon = L.icon({
            iconUrl: '<?=base_url('assets/img/fasilitas.png');?>',
            iconSize: [35, 35],
            iconAnchor: [22, 94],
            popupAnchor: [-3, -76]
        });

        // List Fasilitas
        <?php foreach ($fasilitas_list as $key => $fasilitas) : ?>
        L.marker([<?=$fasilitas['latitude'];?>, <?=$fasilitas['longitude'];?>], {
                icon: greenIcon
            })
            .addTo(map)
            .bindPopup(
                '<div style="text-align: center;">' +
                '<img src="<?=base_url('uploads/fasilitas/'.$fasilitas['foto']);?>" alt="<?=$fasilitas['nama_fasilitas'];?>" style="width: 100%; height: auto; max-width: 300px;"><br>' +
                '</div>' +
                '<b><?=$fasilitas['nama_fasilitas'];?></b><br>' +
                'Keterangan: <?=$fasilitas['keterangan'];?><br>' +
                'Tarif: <?=$fasilitas['tarif'];?>'
            );
        <?php endforeach; ?>

        // Icon untuk Larangan
        var redIcon = L.icon({
            iconUrl: '<?=base_url('assets/img/warning.png');?>',
            iconSize: [32, 32],
            iconAnchor: [22, 94],
            popupAnchor: [-3, -76]
        });

        // List Larangan
        <?php foreach ($larangan_list as $key => $larangan) : ?>
        L.marker([<?=$larangan['latitude'];?>, <?=$larangan['longitude'];?>], {
                icon: redIcon
            })
            .addTo(map)
            .bindPopup(
                '<div style="text-align: center;">' +
                '<img src="<?=base_url('uploads/larangan/'.$larangan['foto']);?>" alt="<?=$larangan['nama_larangan'];?>" style="width: 100%; height: auto; max-width: 300px;"><br>' +
                '</div>' +
                '<b><?=$larangan['nama_larangan'];?></b><br>' +
                'Keterangan: <?=$larangan['keterangan'];?>'
            );
        <?php endforeach; ?>

        // Menambahkan legenda
        var legend = L.control({
            position: 'bottomright'
        });

        legend.onAdd = function(map) {
            var div = L.DomUtil.create('div', 'legend');
            div.innerHTML +=
                '<img src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon.png" alt="Wisata"> Wisata<br>'; // Ikon default Leaflet untuk wisata
            div.innerHTML += '<img src="<?=base_url('assets/img/fasilitas.png');?>" alt="Fasilitas"> Fasilitas<br>';
            div.innerHTML +=
                '<img src="<?=base_url('assets/img/warning.png');?>" alt="Tanda Larangan"> Tanda Larangan<br>';
            return div;
        };

        legend.addTo(map);
        </script>
    </div>
</section>