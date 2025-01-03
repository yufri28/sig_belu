<div class="container">
    <div class="page-inner">
        <h3 class="fw-bold mb-3">Admin</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                data-bs-target="#addRowModal">
                                <i class="fa fa-plus"></i> Tambah Pengelola
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal: Tambah Pengelola -->
                        <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="post" action="<?= base_url('users/tambah_user') ?>">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                Tambah Pengelola
                                            </h5>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Username</label>
                                                        <input name="username" type="text" class="form-control"
                                                            placeholder="Username" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Password</label>
                                                        <input name="password" type="password" class="form-control"
                                                            placeholder="Password" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Role</label>
                                                        <input type="text" class="form-control" value="pengelola"
                                                            readonly />
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

                        <!-- Tabel User -->
                        <div class="table-responsive">
                            <table id="userTable" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $key => $user): ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $user['username'] ?></td>
                                        <td><?= $user['role'] ?></td>
                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" class="btn btn-link btn-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editModal<?= $user['id_admin'] ?>">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <?php if($user['role'] != 'admin'):?>
                                                <button type="button" class="btn btn-link btn-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal<?= $user['id_admin'] ?>">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                                <?php endif;?>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Modal: Edit User -->
                                    <div class="modal fade" id="editModal<?= $user['id_admin'] ?>" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header border-0">
                                                    <h5 class="modal-title">Edit User</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post"
                                                        action="<?= base_url('users/edit_user/'.$user['id_admin']) ?>">
                                                        <div class="form-group form-group-default">
                                                            <label>Username</label>
                                                            <input name="username" type="text" class="form-control"
                                                                value="<?= $user['username'] ?>" required />
                                                        </div>
                                                        <div class="form-group form-group-default">
                                                            <label>Password</label>
                                                            <input name="password" type="password" class="form-control"
                                                                placeholder="Enter new password if you want to change it" />
                                                        </div>
                                                        <div class="form-group form-group-default">
                                                            <label>Role</label>
                                                            <input type="text" class="form-control"
                                                                value="<?= $user['role'] ?>" readonly />
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

                                    <!-- Modal: Hapus User -->
                                    <div class="modal fade" id="deleteModal<?= $user['id_admin'] ?>" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header border-0">
                                                    <h5 class="modal-title">Hapus User</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah Anda yakin ingin menghapus user ini?</p>
                                                </div>
                                                <div class="modal-footer border-0">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <a href="<?= base_url('users/hapus_user/'.$user['id_admin']) ?>"
                                                        class="btn btn-danger">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>