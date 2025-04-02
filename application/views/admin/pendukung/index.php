<div class="container">
    <div class="page-inner">
        <h3 class="fw-bold mb-3">Fasilitas</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                data-bs-target="#addFasilitas">
                                <i class="fa fa-plus"></i>
                                Tambah Data
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <div class="modal fade" id="addFasilitas" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <form method="post" action="<?=base_url('fasilitaspendukung/add');?>"
                                        enctype="multipart/form-data">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold"> Fasilitas wisata</span>
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
                                                        <select class="form-control" name="f_id_wisata"
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
                                                        <label>Nama Fasilitas Wisata
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <input id="nama_fasilitas" required name="nama_fasilitas"
                                                            type="text" class="form-control"
                                                            placeholder="Nama Fasilitas Wisata" />
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

                                                    <div class="form-group form-group-default">
                                                        <label>Tarif
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <textarea rows="5" required name="tarif" id="tarif"
                                                            class="form-control"></textarea>
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
                        <!-- Modal Edit Fasilitas Wisata -->
                        <div class="modal fade" id="editFasilitasBtn" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <form method="post" action="<?=base_url('fasilitaspendukung/edit');?>"
                                        enctype="multipart/form-data" id="editFasilitasForm">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold"> Edit </span>
                                                <span class="fw-light"> fasilitas wisata </span>
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
                                                        <select class="form-control" name="f_id_wisata"
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
                                                        <label>Nama Fasilitas Wisata
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <input id="nama_fasilitas" required name="nama_fasilitas"
                                                            type="text" class="form-control"
                                                            placeholder="Nama Fasilitas Wisata" />
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

                                                    <div class="form-group form-group-default">
                                                        <label>Tarif
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <textarea rows="5" required name="tarif" id="tarif"
                                                            class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <input type="hidden" name="id_fasilitas_wisata" id="id_fasilitas_wisata">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Hapus Fasilitas Wisata -->
                        <div class="modal fade" id="deleteFasilitasBtn" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="post" action="<?=base_url('fasilitaspendukung/delete');?>"
                                        id="deleteWisataForm">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold"> Hapus </span>
                                                <span class="fw-light"> fasilitas wisata </span>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah Anda yakin ingin menghapus fasilitas wisata <strong
                                                    id="nama_fasilitas"></strong>?</p>
                                            <input type="hidden" id="delete_fasilitas_id" name="id_fasilitas_wisata" />
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
                                        <th>Nama Fasilitas</th>
                                        <th>Foto</th>
                                        <th>Keterangan</th>
                                        <th>Tarif</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;?>
                                    <?php foreach ($fasilitas_list as $key => $fasilitas):?>
                                    <tr>
                                        <td><?=$i++?>.</td>
                                        <td><?=$fasilitas['nama_wisata'];?></td>
                                        <td><?=$fasilitas['nama_fasilitas'];?></td>
                                        <td>
                                            <a href="<?=base_url('uploads/fasilitas/'.$fasilitas['foto'])?>"
                                                data-lightbox="fasilitas-<?=$fasilitas['id_fasilitas_wisata'];?>"
                                                data-title="Foto <?=$fasilitas['nama_fasilitas']?>">
                                                <img style="width: 50px; height:50px; object-fit: cover;"
                                                    src="<?=base_url('uploads/fasilitas/'.$fasilitas['foto'])?>"
                                                    alt="Foto <?=$fasilitas['nama_fasilitas']?>">
                                            </a>
                                        </td>
                                        <td><?= substr($fasilitas['keterangan'], 0, 10) ?>...</td>
                                        <td><?=$fasilitas['tarif'];?></td>
                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#editFasilitasBtn"
                                                    data-id_fasilitas_wisata="<?=$fasilitas['id_fasilitas_wisata'];?>"
                                                    data-f_id_wisata="<?=$fasilitas['f_id_wisata'];?>"
                                                    data-nama_fasilitas="<?=$fasilitas['nama_fasilitas'];?>"
                                                    data-latitude="<?=$fasilitas['latitude'];?>"
                                                    data-longitude="<?=$fasilitas['longitude'];?>"
                                                    data-keterangan="<?=$fasilitas['keterangan'];?>"
                                                    data-tarif="<?=$fasilitas['tarif'];?>" title="Edit Fasilitas Wisata"
                                                    class="btn btn-link btn-primary btn-lg">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" data-bs-toggle="modal"
                                                    title="Hapus Fasilitas Wisata" data-bs-target="#deleteFasilitasBtn"
                                                    data-id_fasilitas_wisata="<?=$fasilitas['id_fasilitas_wisata'];?>"
                                                    data-nama_fasilitas="<?=$fasilitas['nama_fasilitas'];?>"
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
    const editButtons = document.querySelector('#editFasilitasBtn');
    const deleteButtons = document.querySelector('#deleteFasilitasBtn');
    // Button that triggered the modal
    editButtons.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;

        // Get data attributes from the clicked button
        const fasilitasId = button.getAttribute('data-id_fasilitas_wisata');
        const idWisata = button.getAttribute('data-f_id_wisata');
        const namaFasilitas = button.getAttribute('data-nama_fasilitas');
        const latitude = button.getAttribute('data-latitude');
        const longitude = button.getAttribute('data-longitude');
        const keterangan = button.getAttribute('data-keterangan');
        const tarif = button.getAttribute('data-tarif');

        // Set values to the modal fields
        editButtons.querySelector('#id_fasilitas_wisata').value = fasilitasId;
        editButtons.querySelector('#f_id_wisata').value = idWisata;
        editButtons.querySelector('#nama_fasilitas').value = namaFasilitas;
        editButtons.querySelector('#latitude').value = latitude;
        editButtons.querySelector('#longitude').value = longitude;
        editButtons.querySelector('#keterangan').value = keterangan;
        editButtons.querySelector('#tarif').value = tarif;
    });

    deleteButtons.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;

        // Get data attributes from the clicked button
        const fasilitasId = button.getAttribute('data-id_fasilitas_wisata');
        const namaFasilitas = button.getAttribute('data-nama_fasilitas');

        // Set values to the modal fields
        deleteButtons.querySelector('#delete_fasilitas_id').value = fasilitasId;
        deleteButtons.querySelector('#nama_fasilitas').textContent = namaFasilitas;
    });

});
</script>