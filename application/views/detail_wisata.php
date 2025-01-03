<style>
#map {
    height: 800px;
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

<h2>Detail Tempat <?=$wisata['nama_wisata'];?></h2>
<!-- Leaflet Map -->
<div id="map"></div>
<p><?=$wisata['deskripsi'];?></p>
<!-- Gambar Wisata -->
<img src="<?=base_url('uploads/wisata/'.$wisata['foto'])?>" class="img-fluid mt-3" alt="<?=$wisata['nama_wisata'];?>">

<!-- Form Komentar -->
<form class="mt-4" method="post" action="<?= base_url('ulasan/submit_comment'); ?>">
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" placeholder="namaemail@gmail.com" name="email" id="email" required>
    </div>
    <div class="mb-3">
        <label for="komentar" class="form-label">Tambahkan Komentar</label>
        <textarea class="form-control" id="komentar" name="komentar" rows="3"
            placeholder="Tuliskan komentar Anda di sini" required></textarea>
    </div>
    <input type="hidden" name="f_id_wisata" value="<?=$this->uri->segment(3)?>"> <!-- ID wisata, bisa dinamis -->
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
        <button class="btn btn-sm btn-link" onclick="showReplyForm(<?= $comment['id_ulasan']; ?>)">Balas</button>

        <!-- Balasan Komentar -->
        <?php if (!empty($comment['replies'])): ?>
        <ul class="list-group mt-2 reply-list" style="margin-left: 20px;">
            <?php foreach ($comment['replies'] as $replyIndex => $reply): ?>
            <li class="list-group-item reply-item <?= $replyIndex >= 2 ? 'd-none' : ''; ?>">
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
            </li>
            <?php endforeach; ?>
            <?php if (count($comment['replies']) > 2): ?>
            <li class="list-group-item">
                <button class="btn btn-link btn-sm" onclick="toggleReplies(this)">Lihat lebih banyak balasan</button>
            </li>
            <?php endif; ?>
        </ul>
        <?php endif; ?>
    </li>
    <?php endforeach; ?>
</ul>


<?php if (count($ulasan) > 3): ?>
<button class="btn btn-link btn-sm" id="loadMoreBtn" onclick="toggleComments()">Lihat lebih banyak komentar</button>
<?php endif; ?>

<!-- Form Balasan Komentar -->
<div id="replyFormContainer" style="display: none;">
    <h5 class="mt-5">Balas Komentar</h5>
    <form method="post" id="replyForm" action="<?= base_url('ulasan/submit_comment'); ?>">
        <div class="mb-3">
            <label for="replyEmail" class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="Masukkan email Anda" id="replyEmail" name="email"
                required>
        </div>
        <div class="mb-3">
            <label for="replyContent" class="form-label">Isi Balasan</label>
            <textarea id="replyContent" class="form-control" name="komentar" rows="3"
                placeholder="Tulis balasan Anda..." required></textarea>
        </div>
        <input type="hidden" name="ulasan_id" id="parentCommentId">
        <input type="hidden" name="f_id_wisata" value="<?=$this->uri->segment(3)?>"> <!-- ID wisata bisa dinamis -->
        <button type="submit" class="btn btn-primary">Kirim Balasan</button>
        <button type="button" class="btn btn-secondary" onclick="hideReplyForm()">Batal</button>
    </form>
</div>
<script>
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
<script>
var map = L.map('map').setView([-9.1750381, 124.6628093], 10); // Set lokasi peta ke Belu
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(map);

// Tambahkan marker di peta
var marker = L.marker([<?=$wisata['latitude'];?>, <?=$wisata['longitude'];?>]).addTo(map)
    .bindPopup('<b><?=$wisata['nama_wisata'];?></b><br>').openPopup();
// Mengonversi string geojson ke array
var polygonCoords = [<?=$wisata['geojson']; ?>];

// Konversi koordinat menjadi format yang diinginkan
var convertedCoords = polygonCoords.map(function(coord) {
    return [coord[1], coord[0]]; // Tukar urutan: [lat, lon]
});

// Memastikan bahwa polygonCoords adalah array koordinat yang valid
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

// List Fasilitas
<?php foreach ($fasilitas_list as $key => $fasilitas) : ?>
var marker = L.marker([<?=$fasilitas['latitude'];?>, <?=$fasilitas['longitude'];?>]).addTo(map)
    .bindPopup(
        '<div style="text-align: center;">' +
        '<img src="<?=base_url('uploads/fasilitas/'.$fasilitas['foto']);?>" alt="<?=$fasilitas['nama_fasilitas'];?>" style="width: 100%; height: auto; max-width: 300px;"><br>' +
        '</div>' +
        '<b><?=$fasilitas['nama_fasilitas'];?></b><br>' +
        'Keterangan: <?=$fasilitas['keterangan'];?><br>' +
        'Tarif: Rp. <?=number_format($fasilitas['tarif'], 0, ",", ".");?>'
    ).openPopup();
<?php endforeach; ?>


// Define the polygon coordinates
</script>