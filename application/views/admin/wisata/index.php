<div class="container">
    <div class="page-inner">
        <h3 class="fw-bold mb-3">Destinasi Wisata</h3>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Grafik Kunjungan Wisatawan <?=date("Y")?></div>
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
                            <div class="card-title">Daftar Destinasi Wisata</div>
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                data-bs-target="#addWisata">
                                <i class="fa fa-plus"></i>
                                Tambah Wisata
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <div class="modal fade" id="addWisata" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <form method="post" action="<?=base_url('wisata/add');?>"
                                        enctype="multipart/form-data">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold"> Destinasi Wisata</span>
                                                <span class="fw-light"> Baru </span>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama Wisata
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <input id="nama_wisata" required name="nama_wisata" type="text"
                                                            class="form-control" placeholder="Nama Wisata" />
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
                                                        <label>Geojson
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <textarea rows="5" required name="geojson" id="geojson"
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
                                                        <label>Deskripsi
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <textarea rows="5" required name="deskripsi" id="deskripsi"
                                                            class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kontak
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <input id="kontak" required name="kontak" type="number"
                                                            class="form-control" placeholder="Kontak" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Jam Kunjung
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <input id="jam_kunjung" required name="jam_kunjung" type="time"
                                                            class="form-control" placeholder="Jam Kunjung" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Jam Tutup
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <input id="jam_tutup" required name="jam_tutup" type="time"
                                                            class="form-control" placeholder="Jam Tutup" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kecamatan
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <select class="form-control" name="f_id_kecamatan"
                                                            id="f_id_kecamatan">
                                                            <option value="">-- Pilih --</option>
                                                            <?php foreach ($kecamatan_list as $key => $kecamatan):?>
                                                            <option value="<?=$kecamatan['id_kecamatan'];?>">
                                                                <?=$kecamatan['nama_kecamatan'];?>
                                                            </option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kategori
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <select class="form-control" name="f_id_kategori"
                                                            id="f_id_kategori">
                                                            <option value="">-- Pilih --</option>
                                                            <?php foreach ($kategori_list as $key => $kategori):?>
                                                            <option value="<?=$kategori['id_kategori'];?>">
                                                                <?=$kategori['nama_kategori'];?>
                                                            </option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                    <?php if($this->session->userdata('role') == 'admin'):?>
                                                    <div class="form-group form-group-default">
                                                        <label>Pengelola
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <select class="form-control" name="f_id_pengelola"
                                                            id="f_id_pengelola">
                                                            <option value="">-- Pilih --</option>
                                                            <?php foreach ($pengelola_list as $key => $pengelola):?>
                                                            <option value="<?=$pengelola['id_admin'];?>">
                                                                <?=$pengelola['username'];?>
                                                            </option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                    <?php endif;?>
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
                        <!-- Modal Edit Wisata -->
                        <div class="modal fade" id="editWisataBtn" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <form method="post" action="<?=base_url('wisata/edit');?>"
                                        enctype="multipart/form-data" id="editWisataForm">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold"> Edit </span>
                                                <span class="fw-light"> Wisata </span>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama Wisata
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <input id="nama_wisata" required name="nama_wisata" type="text"
                                                            class="form-control" placeholder="Nama Wisata" />
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
                                                        <label>Geojson
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <textarea rows="5" required name="geojson" id="geojson"
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
                                                        <label>Deskripsi
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <textarea rows="5" required name="deskripsi" id="deskripsi"
                                                            class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kontak
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <input id="kontak" required name="kontak" type="number"
                                                            class="form-control" placeholder="Kontak" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Jam Kunjung
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <input id="jam_kunjung" required name="jam_kunjung" type="time"
                                                            class="form-control" placeholder="Jam Kunjung" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Jam Tutup
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <input id="jam_tutup" required name="jam_tutup" type="time"
                                                            class="form-control" placeholder="Jam Tutup" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kecamatan
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <select class="form-control" name="f_id_kecamatan"
                                                            id="f_id_kecamatan">
                                                            <option value="">-- Pilih --</option>
                                                            <?php foreach ($kecamatan_list as $key => $kecamatan):?>
                                                            <option value="<?=$kecamatan['id_kecamatan'];?>">
                                                                <?=$kecamatan['nama_kecamatan'];?>
                                                            </option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kategori
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <select class="form-control" name="f_id_kategori"
                                                            id="f_id_kategori">
                                                            <option value="">-- Pilih --</option>
                                                            <?php foreach ($kategori_list as $key => $kategori):?>
                                                            <option value="<?=$kategori['id_kategori'];?>">
                                                                <?=$kategori['nama_kategori'];?>
                                                            </option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group form-group-default"
                                                        <?= $this->session->userdata('role') != 'admin'?'hidden':''?>>
                                                        <label>Pengelola
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <select class="form-control" name="f_id_pengelola"
                                                            id="f_id_pengelola">
                                                            <option value="">-- Pilih --</option>
                                                            <?php foreach ($pengelola_list as $key => $pengelola):?>
                                                            <option value="<?=$pengelola['id_admin'];?>">
                                                                <?=$pengelola['username'];?>
                                                            </option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <input type="hidden" name="id_wisata" id="id_wisata">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Hapus Wisata -->
                        <div class="modal fade" id="deleteWisataBtn" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="post" action="<?=base_url('wisata/delete');?>" id="deleteWisataForm">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold"> Hapus </span>
                                                <span class="fw-light"> wisata </span>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah Anda yakin ingin menghapus wisata <strong
                                                    id="nama_wisata"></strong>?</p>
                                            <input type="hidden" id="delete_wisata_id" name="id_wisata" />
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
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Wisata</th>
                                        <th>Foto</th>
                                        <th>Deskripsi</th>
                                        <th>Kontak</th>
                                        <th>Jam Kunjung</th>
                                        <th>Jam Tutup</th>
                                        <th>Pengelola</th>
                                        <th>Kecamatan</th>
                                        <th>Kategori</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;?>
                                    <?php foreach ($wisata_list as $key => $wisata) :?>
                                    <tr>
                                        <td><?=$i++?>.</td>
                                        <td><?=$wisata['nama_wisata']?></td>
                                        <td><img style="width: 50px; height:50px;"
                                                src="<?=base_url('uploads/wisata/'.$wisata['foto'])?>"
                                                alt="Foto <?=$wisata['nama_wisata']?>"></td>
                                        <td><?= substr($wisata['deskripsi'], 0, 10) ?>...</td>
                                        <td><?=$wisata['kontak']?></td>
                                        <td><?=$wisata['jam_kunjung']?></td>
                                        <td><?=$wisata['jam_tutup']?></td>
                                        <td><?=$wisata['pengelola']?></td>
                                        <td><?=$wisata['nama_kecamatan']?></td>
                                        <td><?=$wisata['nama_kategori']?></td>
                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" data-bs-target="#editWisataBtn"
                                                    data-bs-toggle="modal" title="Edit Wisata"
                                                    class="btn btn-link btn-primary btn-lg"
                                                    data-original-title="Edit Task" data-id="<?=$wisata['id_wisata']?>"
                                                    data-id_pengelola="<?=$wisata['f_id_pengelola']?>"
                                                    data-nama_wisata="<?=$wisata['nama_wisata']?>"
                                                    data-latitude="<?=$wisata['latitude']?>"
                                                    data-longitude="<?=$wisata['longitude']?>"
                                                    data-geojson="<?=$wisata['geojson']?>"
                                                    data-deskripsi="<?=$wisata['deskripsi']?>"
                                                    data-kontak="<?=$wisata['kontak']?>"
                                                    data-jam_kunjung="<?=$wisata['jam_kunjung']?>"
                                                    data-jam_tutup="<?=$wisata['jam_tutup']?>"
                                                    data-id_kecamatan="<?=$wisata['f_id_kecamatan']?>"
                                                    data-id_kategori="<?=$wisata['f_id_kategori']?>">
                                                    <i class="fa fa-edit"></i>
                                                </button>

                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#deleteWisataBtn" title="Delete Wisata"
                                                    data-id_wisata="<?=$wisata['id_wisata']?>"
                                                    data-nama_wisata="<?=$wisata['nama_wisata']?>"
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
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div class="card-title">Daftar Jumlah Kunjungan Destinasi Wisata <?=date("Y")?></div>
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                data-bs-target="#addKunjungan">
                                <i class="fa fa-plus"></i>
                                Tambah Kunjungan
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
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
                                                            <?php foreach ($wisata_isnull_list as $wisata): ?>
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
                                                        <label>Kunjungan Januari
                                                            <small><i class="text-danger">*</i></small>
                                                        </label>
                                                        <input id="januari" required name="Januari" type="number"
                                                            class="form-control"
                                                            placeholder="Jumlah Kunjungan Januari" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kunjungan Februari
                                                            <small><i class="text-danger">*</i></small>
                                                        </label>
                                                        <input id="februari" required name="Februari" type="number"
                                                            class="form-control"
                                                            placeholder="Jumlah Kunjungan Februari" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kunjungan Maret
                                                            <small><i class="text-danger">*</i></small>
                                                        </label>
                                                        <input id="maret" required name="Maret" type="number"
                                                            class="form-control" placeholder="Jumlah Kunjungan Maret" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kunjungan April
                                                            <small><i class="text-danger">*</i></small>
                                                        </label>
                                                        <input id="april" required name="April" type="number"
                                                            class="form-control" placeholder="Jumlah Kunjungan April" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kunjungan Mei
                                                            <small><i class="text-danger">*</i></small>
                                                        </label>
                                                        <input id="mei" required name="Mei" type="number"
                                                            class="form-control" placeholder="Jumlah Kunjungan Mei" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kunjungan Juni
                                                            <small><i class="text-danger">*</i></small>
                                                        </label>
                                                        <input id="juni" required name="Juni" type="number"
                                                            class="form-control" placeholder="Jumlah Kunjungan Juni" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kunjungan Juli
                                                            <small><i class="text-danger">*</i></small>
                                                        </label>
                                                        <input id="juli" required name="Juli" type="number"
                                                            class="form-control" placeholder="Jumlah Kunjungan Juli" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kunjungan Agustus
                                                            <small><i class="text-danger">*</i></small>
                                                        </label>
                                                        <input id="agustus" required name="Agustus" type="number"
                                                            class="form-control"
                                                            placeholder="Jumlah Kunjungan Agustus" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kunjungan September
                                                            <small><i class="text-danger">*</i></small>
                                                        </label>
                                                        <input id="september" required name="September" type="number"
                                                            class="form-control"
                                                            placeholder="Jumlah Kunjungan September" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kunjungan Oktober
                                                            <small><i class="text-danger">*</i></small>
                                                        </label>
                                                        <input id="oktober" required name="Oktober" type="number"
                                                            class="form-control"
                                                            placeholder="Jumlah Kunjungan Oktober" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kunjungan November
                                                            <small><i class="text-danger">*</i></small>
                                                        </label>
                                                        <input id="november" required name="November" type="number"
                                                            class="form-control"
                                                            placeholder="Jumlah Kunjungan November" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kunjungan Desember
                                                            <small><i class="text-danger">*</i></small>
                                                        </label>
                                                        <input id="desember" required name="Desember" type="number"
                                                            class="form-control"
                                                            placeholder="Jumlah Kunjungan Desember" />
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
                                                        <label>Kunjungan Januari <small><i
                                                                    class="text-danger">*</i></small></label>
                                                        <input id="edit_januari" required name="Januari" type="number"
                                                            class="form-control"
                                                            placeholder="Jumlah Kunjungan Januari" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kunjungan Februari <small><i
                                                                    class="text-danger">*</i></small></label>
                                                        <input id="edit_februari" required name="Februari" type="number"
                                                            class="form-control"
                                                            placeholder="Jumlah Kunjungan Februari" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kunjungan Maret <small><i
                                                                    class="text-danger">*</i></small></label>
                                                        <input id="edit_maret" required name="Maret" type="number"
                                                            class="form-control" placeholder="Jumlah Kunjungan Maret" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kunjungan April <small><i
                                                                    class="text-danger">*</i></small></label>
                                                        <input id="edit_april" required name="April" type="number"
                                                            class="form-control" placeholder="Jumlah Kunjungan April" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kunjungan Mei <small><i
                                                                    class="text-danger">*</i></small></label>
                                                        <input id="edit_mei" required name="Mei" type="number"
                                                            class="form-control" placeholder="Jumlah Kunjungan Mei" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kunjungan Juni <small><i
                                                                    class="text-danger">*</i></small></label>
                                                        <input id="edit_juni" required name="Juni" type="number"
                                                            class="form-control" placeholder="Jumlah Kunjungan Juni" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kunjungan Juli <small><i
                                                                    class="text-danger">*</i></small></label>
                                                        <input id="edit_juli" required name="Juli" type="number"
                                                            class="form-control" placeholder="Jumlah Kunjungan Juli" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kunjungan Agustus <small><i
                                                                    class="text-danger">*</i></small></label>
                                                        <input id="edit_agustus" required name="Agustus" type="number"
                                                            class="form-control"
                                                            placeholder="Jumlah Kunjungan Agustus" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kunjungan September <small><i
                                                                    class="text-danger">*</i></small></label>
                                                        <input id="edit_september" required name="September"
                                                            type="number" class="form-control"
                                                            placeholder="Jumlah Kunjungan September" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kunjungan Oktober <small><i
                                                                    class="text-danger">*</i></small></label>
                                                        <input id="edit_oktober" required name="Oktober" type="number"
                                                            class="form-control"
                                                            placeholder="Jumlah Kunjungan Oktober" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kunjungan November <small><i
                                                                    class="text-danger">*</i></small></label>
                                                        <input id="edit_november" required name="November" type="number"
                                                            class="form-control"
                                                            placeholder="Jumlah Kunjungan November" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kunjungan Desember <small><i
                                                                    class="text-danger">*</i></small></label>
                                                        <input id="edit_desember" required name="Desember" type="number"
                                                            class="form-control"
                                                            placeholder="Jumlah Kunjungan Desember" />
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


                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Wisata</th>
                                        <th>Foto</th>
                                        <th>Januari</th>
                                        <th>Februari</th>
                                        <th>Maret</th>
                                        <th>April</th>
                                        <th>Mei</th>
                                        <th>Juni</th>
                                        <th>Juli</th>
                                        <th>Agustus</th>
                                        <th>September</th>
                                        <th>Oktober</th>
                                        <th>November</th>
                                        <th>Desember</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;?>
                                    <?php foreach ($kunjungan_list as $key => $kunjungan) :?>
                                    <tr>
                                        <td><?=$i++?>.</td>
                                        <td><?=$kunjungan['nama_wisata']?></td>
                                        <td><img style="width: 50px; height:50px;"
                                                src="<?=base_url('uploads/wisata/'.$kunjungan['foto'])?>"
                                                alt="Foto <?=$kunjungan['nama_wisata']?>"></td>
                                        <td><?=$kunjungan['Januari']; ?></td>
                                        <td><?=$kunjungan['Februari']?></td>
                                        <td><?=$kunjungan['Maret']?></td>
                                        <td><?=$kunjungan['April']?></td>
                                        <td><?=$kunjungan['Mei']?></td>
                                        <td><?=$kunjungan['Juni']?></td>
                                        <td><?=$kunjungan['Juli']?></td>
                                        <td><?=$kunjungan['Agustus']?></td>
                                        <td><?=$kunjungan['September']?></td>
                                        <td><?=$kunjungan['Oktober']?></td>
                                        <td><?=$kunjungan['November']?></td>
                                        <td><?=$kunjungan['Desember']?></td>
                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" data-bs-target="#editKunjunganBtn"
                                                    data-bs-toggle="modal" title="Edit Kunjungan"
                                                    class="btn btn-link btn-primary btn-lg"
                                                    data-original-title="Edit Task"
                                                    data-id_kunjungan="<?=$kunjungan['id']?>"
                                                    data-id_wisata="<?=$kunjungan['id_wisata']?>"
                                                    data-Januari="<?=$kunjungan['Januari']?>"
                                                    data-Februari="<?=$kunjungan['Februari']?>"
                                                    data-Maret="<?=$kunjungan['Maret']?>"
                                                    data-April="<?=$kunjungan['April']?>"
                                                    data-Mei="<?=$kunjungan['Mei']?>"
                                                    data-Juni="<?=$kunjungan['Juni']?>"
                                                    data-Juli="<?=$kunjungan['Juli']?>"
                                                    data-Agustus="<?=$kunjungan['Agustus']?>"
                                                    data-September="<?=$kunjungan['September']?>"
                                                    data-Oktober="<?=$kunjungan['Oktober']?>"
                                                    data-November="<?=$kunjungan['November']?>"
                                                    data-Desember="<?=$kunjungan['Desember']?>">
                                                    <i class="fa fa-edit"></i>
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
    const editButtons = document.querySelector('#editWisataBtn');
    const deleteButtons = document.querySelector('#deleteWisataBtn');

    // Button that triggered the modal
    editButtons.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;

        // Get data attributes from the clicked button
        const wisataId = button.getAttribute('data-id');
        const pengelolaId = button.getAttribute('data-id_pengelola');
        const namaWisata = button.getAttribute('data-nama_wisata');
        const latitude = button.getAttribute('data-latitude');
        const longitude = button.getAttribute('data-longitude');
        const geojson = button.getAttribute('data-geojson');
        const deskripsi = button.getAttribute('data-deskripsi');
        const kontak = button.getAttribute('data-kontak');
        const jamKunjung = button.getAttribute('data-jam_kunjung');
        const jamTutup = button.getAttribute('data-jam_tutup');
        const idKecamatan = button.getAttribute('data-id_kecamatan');
        const idKategori = button.getAttribute('data-id_kategori');

        // Set values to the modal fields
        editButtons.querySelector('#nama_wisata').value = namaWisata;
        editButtons.querySelector('#f_id_pengelola').value = pengelolaId;
        editButtons.querySelector('#latitude').value = latitude;
        editButtons.querySelector('#longitude').value = longitude;
        editButtons.querySelector('#geojson').value = geojson;
        editButtons.querySelector('#deskripsi').value = deskripsi;
        editButtons.querySelector('#kontak').value = kontak;
        editButtons.querySelector('#jam_kunjung').value = jamKunjung;
        editButtons.querySelector('#jam_tutup').value = jamTutup;
        editButtons.querySelector('#f_id_kecamatan').value = idKecamatan;
        editButtons.querySelector('#f_id_kategori').value = idKategori;
        editButtons.querySelector('#id_wisata').value = wisataId;
    });

    deleteButtons.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;

        // Get data attributes from the clicked button
        const wisataId = button.getAttribute('data-id_wisata');
        const namaWisata = button.getAttribute('data-nama_wisata');

        // Set values to the modal fields
        deleteButtons.querySelector('#delete_wisata_id').value = wisataId;
        deleteButtons.querySelector('#nama_wisata').textContent = namaWisata;
    });



});
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const editKunjunganButtons = document.querySelectorAll('[data-bs-target="#editKunjunganBtn"]');

    editKunjunganButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            const modal = document.querySelector('#editKunjunganBtn');

            // Get data attributes from the clicked button
            const idKunjungan = button.getAttribute('data-id_kunjungan');
            const idWisata = button.getAttribute('data-id_wisata');
            const januari = button.getAttribute('data-Januari');
            const februari = button.getAttribute('data-Februari');
            const maret = button.getAttribute('data-Maret');
            const april = button.getAttribute('data-April');
            const mei = button.getAttribute('data-Mei');
            const juni = button.getAttribute('data-Juni');
            const juli = button.getAttribute('data-Juli');
            const agustus = button.getAttribute('data-Agustus');
            const september = button.getAttribute('data-September');
            const oktober = button.getAttribute('data-Oktober');
            const november = button.getAttribute('data-November');
            const desember = button.getAttribute('data-Desember');

            // Set values to the modal fields
            modal.querySelector('#edit_id_kunjungan').value = idKunjungan;
            modal.querySelector('#edit_id_wisata').value = idWisata;
            modal.querySelector('#edit_januari').value = januari;
            modal.querySelector('#edit_februari').value = februari;
            modal.querySelector('#edit_maret').value = maret;
            modal.querySelector('#edit_april').value = april;
            modal.querySelector('#edit_mei').value = mei;
            modal.querySelector('#edit_juni').value = juni;
            modal.querySelector('#edit_juli').value = juli;
            modal.querySelector('#edit_agustus').value = agustus;
            modal.querySelector('#edit_september').value = september;
            modal.querySelector('#edit_oktober').value = oktober;
            modal.querySelector('#edit_november').value = november;
            modal.querySelector('#edit_desember').value = desember;
        });
    });
});
</script>