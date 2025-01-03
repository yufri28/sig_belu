<div class="container">
    <div class="page-inner">
        <h3 class="fw-bold mb-3">Pengaturan</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                data-bs-target="#addKecamatan">
                                <i class="fa fa-plus"></i>
                                Tambah Kecamatan
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <div class="modal fade" id="addKecamatan" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="post" action="<?=base_url('setings/addKecamatan');?>">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold"> Kecamatan</span>
                                                <span class="fw-light"> Baru </span>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama Kecamatan</label>
                                                        <input id="kecamatan" name="kecamatan" type="text"
                                                            class="form-control" placeholder="Nama Kecamatan" />
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
                        <!-- Modal Edit Kecamatan -->
                        <div class="modal fade" id="editKecamatanBtn" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="post" action="<?=base_url('setings/editKecamatan');?>"
                                        id="editKecamatanForm">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold"> Edit </span>
                                                <span class="fw-light"> Kecamatan </span>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama Kecamatan</label>
                                                        <input id="edit_kecamatan" name="kecamatan" type="text"
                                                            class="form-control" placeholder="Nama Kecamatan" />
                                                        <input type="hidden" id="edit_kecamatan_id" name="id" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Hapus Kecamatan -->
                        <div class="modal fade" id="deleteKecamatanBtn" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="post" action="<?=base_url('setings/deleteKecamatan');?>"
                                        id="deleteKecamatanForm">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold"> Hapus </span>
                                                <span class="fw-light"> Kecamatan </span>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah Anda yakin ingin menghapus kecamatan ini?</p>
                                            <input type="hidden" id="delete_kecamatan_id" name="id" />
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
                            <table id="tb-kecamatan" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kecamatan</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;?>
                                    <?php foreach ($kecamatan as $key => $value) :?>
                                    <tr>
                                        <td><?=$i++?>. </td>
                                        <td><?=$value['nama_kecamatan'];?></td>
                                        <td>
                                            <div class="form-button-action">
                                                <button class="btn btn-link btn-primary editKecamatanBtn"
                                                    data-bs-toggle="modal" data-bs-target="#editKecamatanBtn"
                                                    data-id_kecamatan="<?= $value['id_kecamatan'] ?>"
                                                    data-nama="<?= $value['nama_kecamatan'] ?>"
                                                    data-original-title="Edit Kecamatan">
                                                    <i class="fa fa-edit"></i></button>
                                                <button class="btn btn-link btn-danger deleteKecamatanBtn"
                                                    data-bs-toggle="modal" data-bs-target="#deleteKecamatanBtn"
                                                    data-id_kecamatan="<?= $value['id_kecamatan'] ?>"
                                                    data-original-title="Remove">
                                                    <i class="fa fa-times"></i></button>
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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                data-bs-target="#addKategori">
                                <i class="fa fa-plus"></i>
                                Tambah Kategori
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <div class="modal fade" id="addKategori" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="post" action="<?=base_url('setings/addKategori');?>">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold"> New</span>
                                                <span class="fw-light"> Row </span>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama Kategori</label>
                                                        <input name="kategori" id="kategori" type="text"
                                                            class="form-control" placeholder="Nama Kategori" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                Add
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Edit Kategori -->
                        <div class="modal fade" id="editKategoriBtn" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="post" action="<?=base_url('setings/editKategori');?>"
                                        id="editKategoriForm">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold"> Edit </span>
                                                <span class="fw-light"> Kategori </span>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama Kategori</label>
                                                        <input id="edit_kategori" name="kategori" type="text"
                                                            class="form-control" placeholder="Nama Kategori" />
                                                        <input type="hidden" id="edit_kategori_id" name="id" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Hapus Kategori -->
                        <div class="modal fade" id="deleteKategoriBtn" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="post" action="<?=base_url('setings/deleteKategori');?>"
                                        id="deleteKategoriForm">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold"> Hapus </span>
                                                <span class="fw-light"> Kategori </span>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah Anda yakin ingin menghapus kategori ini?</p>
                                            <input type="hidden" id="delete_kategori_id" name="id" />
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
                            <table id="tb-kategori" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $j = 1;?>
                                    <?php foreach ($kategori as $key => $value) :?>
                                    <tr>
                                        <td><?=$j++?>. </td>
                                        <td><?=$value['nama_kategori'];?></td>
                                        <td>
                                            <div class="form-button-action">
                                                <button class="btn btn-link btn-primary editKategoriBtn"
                                                    data-bs-toggle="modal" data-bs-target="#editKategoriBtn"
                                                    data-id_kategori="<?= $value['id_kategori'] ?>"
                                                    data-nama="<?= $value['nama_kategori'] ?>"
                                                    data-original-title="Edit Kategori">
                                                    <i class="fa fa-edit"></i></button>
                                                <button class="btn btn-link btn-danger deleteKategoriBtn"
                                                    data-bs-toggle="modal" data-bs-target="#deleteKategoriBtn"
                                                    data-id_kategori="<?= $value['id_kategori'] ?>"
                                                    data-original-title="Remove">
                                                    <i class="fa fa-times"></i></button>
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