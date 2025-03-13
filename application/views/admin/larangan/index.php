<div class="container">
    <div class="page-inner">
        <h3 class="fw-bold mb-3">Tanda Larangan</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                data-bs-target="#addTandaLarangan">
                                <i class="fa fa-plus"></i>
                                Tambah Data
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <div class="modal fade" id="addTandaLarangan" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <form method="post" action="<?=base_url('tandalarangan/add');?>"
                                        enctype="multipart/form-data">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold"> Tanda Larangan</span>
                                                <span class="fw-light"> baru </span>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Wisata
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <select required class="form-control" name="f_id_wisata"
                                                            id="f_id_wisata">
                                                            <option value="">-- Pilih --</option>
                                                            <?php foreach ($wisata_list as $key => $wisata):?>
                                                            <option value="<?=$wisata['id_wisata'];?>">
                                                                <?=$wisata['nama_wisata'];?>
                                                            </option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Nama Tanda Larangan
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <input id="nama_larangan" required name="nama_larangan"
                                                            type="text" class="form-control"
                                                            placeholder="Nama Tanda Larangan" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Latitude
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small></label>
                                                        <input id="latitude" required name="latitude" type="text"
                                                            class="form-control" placeholder="Latitude" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Longitude
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <input id="longitude" required name="longitude" type="text"
                                                            class="form-control" placeholder="Longitude" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Keterangan
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <textarea rows="5" required name="keterangan" id="keterangan"
                                                            class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Foto
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <input id="foto" required name="foto" type="file"
                                                            accept=".jpg, .jpeg, .png" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">
                                                Add
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Edit Tanda Larangan -->
                        <div class="modal fade" id="editLaranganBtn" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <form method="post" action="<?=base_url('tandalarangan/edit');?>"
                                        enctype="multipart/form-data" id="editLaranganForm">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold"> Edit </span>
                                                <span class="fw-light"> Tanda Larangan </span>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Wisata
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <select required class="form-control" name="f_id_wisata"
                                                            id="f_id_wisata">
                                                            <option value="">-- Pilih --</option>
                                                            <?php foreach ($wisata_list as $key => $wisata):?>
                                                            <option value="<?=$wisata['id_wisata'];?>">
                                                                <?=$wisata['nama_wisata'];?>
                                                            </option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Nama Tanda Larangan
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <input id="nama_larangan" required name="nama_larangan"
                                                            type="text" class="form-control"
                                                            placeholder="Nama Tanda Larangan" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Latitude
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small></label>
                                                        <input id="latitude" required name="latitude" type="text"
                                                            class="form-control" placeholder="Latitude" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Longitude
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <input id="longitude" required name="longitude" type="text"
                                                            class="form-control" placeholder="Longitude" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Keterangan
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <textarea rows="5" required name="keterangan" id="keterangan"
                                                            class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Foto</label>
                                                        <input id="foto" name="foto" type="file"
                                                            accept=".jpg, .jpeg, .png" class="form-control" />
                                                        <small><i>Boleh dikosongkan jika tidak ingin mengubah
                                                                foto</i></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <input type="hidden" name="id_larangan" id="id_larangan">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Hapus Tanda Larangan -->
                        <div class="modal fade" id="deleteLaranganBtn" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="post" action="<?=base_url('tandalarangan/delete');?>"
                                        id="deleteWisataForm">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold"> Hapus </span>
                                                <span class="fw-light"> Tanda Larangan </span>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah Anda yakin ingin menghapus Tanda Larangan <strong
                                                    id="nama_larangan"></strong>?</p>
                                            <input type="hidden" id="delete_larangan_id" name="id_larangan" />
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Wisata</th>
                                        <th>Nama Larangan</th>
                                        <th>Foto</th>
                                        <th>Keterangan</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;?>
                                    <?php foreach ($larangan_list as $key => $larangan):?>
                                    <tr>
                                        <td><?=$i++?>.</td>
                                        <td><?=$larangan['nama_wisata'];?></td>
                                        <td><?=$larangan['nama_larangan'];?></td>
                                        <td>
                                            <a href="<?=base_url('uploads/larangan/'.$larangan['foto'])?>"
                                                data-lightbox="larangan-<?=$larangan['id_larangan'];?>"
                                                data-title="Foto <?=$larangan['nama_larangan']?>">
                                                <img style="width: 50px; height:50px; object-fit: cover;"
                                                    src="<?=base_url('uploads/larangan/'.$larangan['foto'])?>"
                                                    alt="Foto <?=$larangan['nama_larangan']?>">
                                            </a>
                                        </td>
                                        <td><?= substr($larangan['keterangan'], 0, 10) ?>...</td>
                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#editLaranganBtn"
                                                    data-id_larangan="<?=$larangan['id_larangan'];?>"
                                                    data-f_id_wisata="<?=$larangan['f_id_wisata'];?>"
                                                    data-nama_larangan="<?=$larangan['nama_larangan'];?>"
                                                    data-latitude="<?=$larangan['latitude'];?>"
                                                    data-longitude="<?=$larangan['longitude'];?>"
                                                    data-keterangan="<?=$larangan['keterangan'];?>"
                                                    title="Edit Tanda Larangan" class="btn btn-link btn-primary btn-lg">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" data-bs-toggle="modal"
                                                    title="Hapus Tanda Larangan" data-bs-target="#deleteLaranganBtn"
                                                    data-id_larangan="<?=$larangan['id_larangan'];?>"
                                                    data-nama_larangan="<?=$larangan['nama_larangan'];?>"
                                                    class="btn btn-link btn-danger">
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
document.addEventListener("DOMContentLoaded", function() {
    // Event listener for the edit button
    const editButtons = document.querySelector('#editLaranganBtn');
    const deleteButtons = document.querySelector('#deleteLaranganBtn');
    // Button that triggered the modal
    editButtons.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;

        // Get data attributes from the clicked button
        const laranganId = button.getAttribute('data-id_larangan');
        const idWisata = button.getAttribute('data-f_id_wisata');
        const namaLarangan = button.getAttribute('data-nama_larangan');
        const latitude = button.getAttribute('data-latitude');
        const longitude = button.getAttribute('data-longitude');
        const keterangan = button.getAttribute('data-keterangan');

        // Set values to the modal fields
        editButtons.querySelector('#id_larangan').value = laranganId;
        editButtons.querySelector('#f_id_wisata').value = idWisata;
        editButtons.querySelector('#nama_larangan').value = namaLarangan;
        editButtons.querySelector('#latitude').value = latitude;
        editButtons.querySelector('#longitude').value = longitude;
        editButtons.querySelector('#keterangan').value = keterangan;
    });

    deleteButtons.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;

        // Get data attributes from the clicked button
        const laranganId = button.getAttribute('data-id_larangan');
        const namaLarangan = button.getAttribute('data-nama_larangan');

        // Set values to the modal fields
        deleteButtons.querySelector('#delete_larangan_id').value = laranganId;
        deleteButtons.querySelector('#nama_larangan').textContent = namaLarangan;
    });

});
</script>