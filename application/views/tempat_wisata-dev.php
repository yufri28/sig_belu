<h2 class="mb-4 text-start">Daftar Tempat Wisata</h2>
<div class="row justify-content-center">
    <!-- Card Wisata -->
    <?php foreach ($wisata_list as $key => $wisata) :?>
    <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
            <img src="<?= base_url('uploads/wisata/'.$wisata['foto']) ?>" class="card-img-top"
                alt="<?= $wisata['nama_wisata'] ?>">
            <div class="card-body">
                <h5 class="card-title"><?= $wisata['nama_wisata'] ?></h5>
                <p class="card-text"><?= substr($wisata['deskripsi'], 0, 100) ?>...</p>

                <!-- Display the number of comments for this wisata -->
                <?php 
                $commentCount = $this->db->where('f_id_wisata', $wisata['id_wisata'])->count_all_results('ulasan');
            ?>
                <p class="text-muted"><?= $commentCount ?> Komentar</p>

                <a href="<?= base_url('pages/detail_wisata/'.$wisata['id_wisata']); ?>"
                    class="btn btn-primary">Detail</a>
                <a target="_blank"
                    href="https://www.google.com/maps/dir/?api=1&destination=<?= $wisata['latitude']; ?>,<?= $wisata['longitude']; ?>"
                    class="btn btn-secondary">Lokasi</a>
            </div>
        </div>
    </div>

    <?php endforeach;?>
    <!-- Tambahkan lebih banyak card di sini -->
</div>