<style>
#map {
    height: 400px;
    margin-bottom: 20px;
    border-radius: 10px;
}
</style>
<div class="container">
    <div class="page-inner">
        <h3 class="fw-bold mb-3">Destinasi Wisata</h3>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Grafik Kunjungan Wisatawan
                            <select id="tahunSelect" class="form-select" onchange="filterByYear()">
                                <option value="">Pilih Tahun</option>
                                <?php foreach($tahun_list as $tahun): ?>
                                <option <?=$tahun['tahun'] == $this->uri->segment('3') ?'selected':'';?>
                                    value="<?=$tahun['tahun']?>">
                                    <?=$tahun['tahun']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="multipleLineChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div class="card-title">Daftar Jumlah Kunjungan Destinasi Wisata</div>
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                data-bs-target="#addKunjungan">
                                <i class="fa fa-plus"></i>
                                Tambah Kunjungan
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="d-flex justify-content-center">
                                <div class="col-md-4">
                                    <label for="startDate">Start Date:</label>
                                    <input type="text" id="startDate" class="form-control datepicker">
                                </div>
                                <div class="col-md-4">
                                    <label for="endDate">End Date:</label>
                                    <input type="text" id="endDate" class="form-control datepicker">
                                </div>
                                <div class="col-md-4">
                                    <button id="filterDateBtn" class="btn btn-primary mt-4">Filter</button>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="addKunjungan" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <form method="post" action="<?=base_url('kunjungan/add');?>">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold"> Tambah Jumlah</span>
                                                <span class="fw-light"> Kunjungan </span>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Wisata
                                                            <small><i class="text-danger">*</i></small>
                                                        </label>
                                                        <select id="id_wisata" required name="id_wisata"
                                                            class="form-control">
                                                            <option value="">-- Pilih Wisata --</option>
                                                            <?php foreach ($wisata_list as $wisata): ?>
                                                            <option value="<?= $wisata['id_wisata']; ?>">
                                                                <?= $wisata['nama_wisata']; ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <small><i>Jika daftar pilihan wisata kosong maka semua wisata
                                                                sudah memiliki data kunjungan. Silahkan cek kembali pada
                                                                daftar kunjungan destinasi wisata!</i></small>
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Tanggal
                                                            <small><i class="text-danger">*</i></small>
                                                        </label>
                                                        <input id="tanggal" required name="tanggal" type="date"
                                                            class="form-control" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Jumlah
                                                            <small><i class="text-danger">*</i></small>
                                                        </label>
                                                        <input id="jumlah" required name="jumlah" type="number"
                                                            class="form-control" placeholder="Jumlah Kunjungan" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">
                                                Simpan
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Edit Kunjungan -->
                        <div class="modal fade" id="editKunjunganBtn" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <form method="post" action="<?=base_url('kunjungan/edit');?>">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold"> Edit Jumlah</span>
                                                <span class="fw-light"> Kunjungan </span>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <input type="hidden" id="edit_id_kunjungan" name="id_kunjungan">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Wisata
                                                            <small><i class="text-danger">*</i></small>
                                                        </label>
                                                        <select readonly id="edit_id_wisata" required name="id_wisata"
                                                            class="form-control">
                                                            <option value="">-- Pilih Wisata --</option>
                                                            <?php foreach ($wisata_list as $wisata): ?>
                                                            <option value="<?= $wisata['id_wisata']; ?>">
                                                                <?= $wisata['nama_wisata']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Tanggal
                                                            <small><i class="text-danger">*</i></small>
                                                        </label>
                                                        <input id="edit_tanggal" required name="tanggal" type="date"
                                                            class="form-control" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Jumlah
                                                            <small><i class="text-danger">*</i></small>
                                                        </label>
                                                        <input id="edit_jumlah" required name="jumlah" type="number"
                                                            class="form-control" placeholder="Jumlah Kunjungan" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Hapus Kunjungan -->
                        <div class="modal fade" id="deleteKunjunganBtn" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="post" action="<?=base_url('kunjungan/delete');?>"
                                        id="deleteKunjunganForm">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold"> Hapus </span>
                                                <span class="fw-light"> kunjungan </span>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah Anda yakin ingin menghapus data kunjungan <strong
                                                    id="nama_kunjungan"></strong>?</p>
                                            <input type="hidden" id="delete_kunjungan_id" name="id" />
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="add-row-kunjungan" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Wisata</th>
                                        <th>Foto</th>
                                        <th>Tanggal</th>
                                        <th>Jumlah</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;?>
                                    <?php foreach ($kunjungan_list as $key => $kunjungan) :?>
                                    <tr>
                                        <td><?=$i++?>.</td>
                                        <td><?=$kunjungan['nama_wisata']?></td>
                                        <td>
                                            <?php 
                                                $file_upload = $kunjungan['foto'];
                                                if($file_upload != null){
                                                    // Coba decode JSON
                                                    $files = json_decode($file_upload, true);

                                                    // Jika gagal decode, anggap file dipisahkan dengan koma
                                                    if ($files === null) {
                                                        $files = explode(',', $file_upload);
                                                    }
                                                } else {
                                                    $files = null;
                                                }
                                            ?>
                                            <div class="d-flex">
                                                <?php if($files): ?>
                                                <?php foreach ($files as $key => $file): ?>
                                                <?php $file = trim($file); ?>
                                                <a href="<?=base_url('uploads/wisata/'.$file)?>"
                                                    data-lightbox="wisata-<?=$kunjungan['id_wisata'];?>"
                                                    data-title="Foto <?=$kunjungan['nama_wisata']?>">
                                                    <img style="width: 50px; height:50px; object-fit: cover; margin-right: 5px;"
                                                        src="<?=base_url('uploads/wisata/'.$file)?>"
                                                        alt="Foto <?=$kunjungan['nama_wisata']?>">
                                                </a>
                                                <?php endforeach; ?>
                                                <?php else: ?>
                                                <p>No images available</p>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <td><?=$kunjungan['tanggal']; ?></td>
                                        <td><?=$kunjungan['jumlah']?></td>
                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" data-bs-target="#editKunjunganBtn"
                                                    data-bs-toggle="modal" title="Edit Kunjungan"
                                                    class="btn btn-link btn-primary btn-lg"
                                                    data-original-title="Edit Task"
                                                    data-id_kunjungan="<?=$kunjungan['id']?>"
                                                    data-id_wisata="<?=$kunjungan['id_wisata']?>"
                                                    data-tanggal="<?=$kunjungan['tanggal']?>"
                                                    data-jumlah="<?=$kunjungan['jumlah']?>">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#deleteKunjunganBtn" title="Delete Wisata"
                                                    data-id_kunjungan="<?=$kunjungan['id']?>"
                                                    class="btn btn-link btn-danger" data-original-title="Remove">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function filterByYear() {
    var selectedYear = document.getElementById('tahunSelect').value;
    window.location.href = '<?=base_url('kunjungan/filter')?>/' + selectedYear;
}
document.addEventListener("DOMContentLoaded", function() {



    const editKunjunganButtons = document.querySelectorAll('[data-bs-target="#editKunjunganBtn"]');
    const deleteButtons = document.querySelector('#deleteKunjunganBtn');

    editKunjunganButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            const modal = document.querySelector('#editKunjunganBtn');

            // Get data attributes from the clicked button
            const idKunjungan = button.getAttribute('data-id_kunjungan');
            const idWisata = button.getAttribute('data-id_wisata');
            const tanggal = button.getAttribute('data-tanggal');
            const jumlah = button.getAttribute('data-jumlah');

            // Set values to the modal fields
            modal.querySelector('#edit_id_kunjungan').value = idKunjungan;
            modal.querySelector('#edit_id_wisata').value = idWisata;
            modal.querySelector('#edit_tanggal').value = tanggal;
            modal.querySelector('#edit_jumlah').value = jumlah;
        });
    });

    deleteButtons.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;

        // Get data attributes from the clicked button
        const kunjunganId = button.getAttribute('data-id_kunjungan');

        // Set values to the modal fields
        deleteButtons.querySelector('#delete_kunjungan_id').value = kunjunganId;
    });
});
</script>