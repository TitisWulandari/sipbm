<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Data Users</li>
    </ol>
</nav>

<!-- DataTales Example -->
<button type="button" class="btn btn-primary mb-2 mt-2" data-toggle="modal" data-target="#formDataUser">
    <i class="fas fa-plus"></i>
    Tambah Data User
</button>
<p><?php echo $this->session->flashdata('success'); ?></p>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Data User</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id User</th>
                        <th>Nama</th>
                        <!-- <th>Password</th> -->
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php $no = 1;
                    foreach ($allusers as $datausers) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $datausers->id_users; ?></td>
                            <td><?= $datausers->name; ?></td>
                            <!-- <td><?= $datausers->password; ?></td> -->
                            <td><?= $datausers->level; ?></td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#ModalEdit<?= $datausers->id_users; ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="" data-toggle="modal" data-target="#ModalDetail<?= $datausers->id_users; ?>" class="btn btn-info btn-sm"><i class="fas fa-info-circle"></i></a>
                                <a href="" data-toggle="modal" data-target="#ModalUpdatePwd<?= $datausers->id_users; ?>" class="btn btn-warning btn-sm"><i class="fas fa-key"></i></a>
                                <a href="" data-toggle="modal" data-target="#ModalHapus<?= $datausers->id_users; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal tambah users -->
<div class="modal fade" id="formDataUser" tabindex="-1" aria-labelledby="formDataUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formDataUserLabel">Form Tambah Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('users/users/registerFormUsers') ?>" method="POST">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="name" class="form-control" id="nama" placeholder="Masukan nama user" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Masukan email user" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Masukan password user" required>
                        <div style="margin-top:10px"></div> <input name="confrim_password" type="password" id="inputPassword" class="form-control" placeholder="Confrim Password" required>
                    </div>

                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" class="form-control" id="level" required>
                            <option value="admin">Admin</option>
                            <option value="pihak_pusat">Pihak Pusat</option>
                            <option value="pengelola">Pengelola</option>
                            <option value="petugas_perawatan">Petugas Perawatan</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal tambah users -->

<!-- Modal Detail users -->
<?php foreach ($allusers as $datausers) : ?>
    <div class="modal fade" id="ModalDetail<?= $datausers->id_users; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Users <?= $datausers->name; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="name" value="<?= $datausers->name; ?>" class="form-control" id="nama" placeholder="Masukan nama user">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="<?= $datausers->email; ?>" class="form-control" id="email" placeholder="Masukan email user">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" name="password" value="<?= $datausers->password; ?>" class="form-control" id="password" placeholder="Masukan password user">
                        </div>

                        <div class="form-group">
                            <label for="level">Level</label>
                            <select name="level" class="form-control" id="level">
                                <option value="<?= $datausers->level; ?>"><?= $datausers->level; ?></option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="password">Waktu Dibuat</label>
                            <input type="text" value="<?= $datausers->time_create_users; ?>" class="form-control" id="password" placeholder="Masukan password user">
                        </div>

                        <div class="form-group">
                            <label for="password">Terakhir Login</label>
                            <input type="text" value="<?= $datausers->time_login_users; ?>" class="form-control" id="password" placeholder="Masukan password user">
                        </div>

                        <div class="form-group">
                            <label for="password">Terakhir Logout</label>
                            <input type="text" value="<?= $datausers->time_logout_users; ?>" class="form-control" id="password" placeholder="Masukan password user">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
<?php endforeach ?>
<!-- end Modal Detail Users -->

<!-- Modal Edit users -->
<?php foreach ($allusers as $datausers) : ?>
    <div class="modal fade" id="ModalEdit<?= $datausers->id_users; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Users <?= $datausers->name; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('users/users/updateUsers') ?>" method="POST">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="name" value="<?= $datausers->name; ?>" class="form-control" id="nama" placeholder="Masukan nama user">
                            <input type="text" hidden name="id_users" value="<?= $datausers->id_users; ?>" class="form-control" id="nama" placeholder="Masukan nama user">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="<?= $datausers->email; ?>" class="form-control" id="email" placeholder="Masukan email user">
                        </div>

                        <div class="form-group">
                            <label for="level">Level</label>
                            <select name="level" class="form-control" id="level">
                                <option value="<?= $datausers->level ?>"><?= $datausers->level ?></option>
                                <option value="admin">Admin</option>
                                <option value="pihak_pusat">Pihak Pusat</option>
                                <option value="pengelola">Pengelola</option>
                                <option value="petugas_perawatan">Petugas Perawatan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">UPDATE</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">BATALKAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- end Modal Edit Users -->

<!-- Modal Update password users -->
<?php foreach ($allusers as $datausers) : ?>
    <div class="modal fade" id="ModalUpdatePwd<?= $datausers->id_users; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Passowrd <?= $datausers->name; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('users/users/updatePwdUsers') ?>" method="POST">

                        <div class="form-group">
                            <input type="text" hidden name="id_users" value="<?= $datausers->id_users; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukan password user">

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">UPDATE</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">BATALKAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- end Modal Update Password Users -->


<?php foreach ($allusers as $datausers) : ?>
    <div class="modal fade" id="ModalHapus<?= $datausers->id_users; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Users <?= $datausers->name; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Anda yakin ?</h4>
                        <p>Jika anda menghapus users <b><?= $datausers->name; ?></b> maka data dari user tersebut terhapus dari sistem !!. Jika ada kesalahan dan perlu di ubah maka lakukan update data dengan mengklik tombol EDIT yang berwarna hijau !!</p>
                        <hr>
                        <p class="mb-0">Namun jika memang anda sudah yakin maka silahkan klik tombol Yakin !</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                        <a class="btn btn-danger" href="<?= base_url('users/users/deleteusers/' . $datausers->id_users) ?>">YAKIN !</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>