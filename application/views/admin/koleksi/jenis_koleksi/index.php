<!-- DataTales Example -->
<button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#formDataKoleksi">
    <i class="fas fa-plus"></i>
    Tambah Data Jenis Koleksi
</button>
<p><?php echo $this->session->flashdata('success'); ?></p>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Data Jenis Koleksi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Waktu Dibuat</th>
                        <th>Waktu Diubah</th>
                        <th>Dibuat Oleh</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php $no = 1;
                    foreach ($jenis as $data) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data->nama_jenis_koleksi; ?></td>
                            <td><?= $data->time_create_jenis_koleksi; ?></td>
                            <td><?= $data->time_update_jenis_koleksi; ?></td>
                            <td><?= $data->level; ?> - <?= $data->name; ?></td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#ModalEdit<?= $data->id_jenis_koleksi; ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="" data-toggle="modal" data-target="#ModalDetail<?= $data->id_jenis_koleksi; ?>" class="btn btn-info btn-sm"><i class="fas fa-info-circle"></i></a>
                                <a href="" data-toggle="modal" data-target="#ModalHapus<?= $data->id_jenis_koleksi; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="formDataKoleksi" tabindex="-1" aria-labelledby="formDataKoleksiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formDataKoleksiLabel">Form Tambah Data Jenis Koleksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('koleksi/jenis_koleksi/insert') ?>" enctype="multipart/form-data" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_koleksi">Nama Jenis Koleksi</label>
                        <input type="text" class="form-control" id="nama_jenis_koleksi" name="nama_jenis_koleksi" required>
                        <input type="text" hidden value="<?= $users['id_users'] ?>" class="form-control" name="id_users">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <input type="reset" value="Reset" class="btn btn-danger">
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Detail koleksi -->
<?php foreach ($jenis as $data) : ?>
    <div class="modal fade" id="ModalDetail<?= $data->id_jenis_koleksi; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Jenis Koleksi <?= $data->nama_jenis_koleksi; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="nama">Nama Jenis Koleksi</label>
                            <input disabled type="text" name="nama_jenis_koleksi" value="<?= $data->nama_jenis_koleksi; ?>" class="form-control" id="nama_jenis_koleksi">
                        </div>

                        <div class="form-group">
                            <label for="email">Waktu Dibuat</label>
                            <input disabled type="text" name="time_create_jenis_koleksi" value="<?= $data->time_create_jenis_koleksi; ?>" class="form-control" id="time_create_jenis_koleksi">
                        </div>
                        <div class="form-group">
                            <label for="email">Waktu Diubah</label>
                            <input disabled type="text" name="time_update_jenis_koleksi" value="<?= $data->time_update_jenis_koleksi; ?>" class="form-control" id="time_update_jenis_koleksi">
                        </div>

                        <div class="form-group">
                            <label for="password">Dibuat oleh</label>
                            <input disabled type="text" name="id_users" value="<?= $data->level; ?> - <?= $data->name; ?>" class="form-control" id="id_users">
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
<?php foreach ($jenis as $data) : ?>
    <div class="modal fade" id="ModalEdit<?= $data->id_jenis_koleksi; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Jenis Koleksi <?= $data->nama_jenis_koleksi; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('koleksi/jenis_koleksi/update') ?>" method="POST">
                        <div class="form-group">
                            <label for="nama">Nama Jenis Koleksi</label>
                            <input type="text" name="nama_jenis_koleksi" value="<?= $data->nama_jenis_koleksi; ?>" class="form-control" id="nama_jenis_koleksi">
                            <input type="text" hidden value="<?= $users['id_users'] ?>" class="form-control" name="id_users">
                            <input type="text" hidden value="<?= $data->id_jenis_koleksi ?>" class="form-control" name="id_jenis_koleksi">
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
    </div>
<?php endforeach ?>
<!-- end Modal Edit Users -->

<!-- Modal Update password users -->
<?php foreach ($koleksi as $data) : ?>
    <div class="modal fade" id="ModalUpdateImg<?= $data->id_koleksi; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Gambar <?= $data->nama_koleksi; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Admin/UpdateGambarKoleksi') ?>" enctype="multipart/form-data" method="POST">

                        <div class="form-group">
                            <input type="text" hidden name="id_koleksi" value="<?= $data->id_koleksi; ?>" class="form-control" id="id_users" placeholder="Masukan nama user">
                            <input type="text" hidden name="id_users" value="<?= $users['id_users']; ?>" class="form-control" id="nama_koleksi" placeholder="Masukan nama user" required>
                        </div>

                        <div class="form-group">
                            <img height="20" class="img-thumbnail" src="<?= base_url('assets/upload/post/thumbs/' . $data->gambar_koleksi) ?>">
                        </div>

                        <div class="form-group">
                            <label for="gambar_koleksi">Foto Koleksi</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar_koleksi" name="gambar_koleksi" required>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
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


<?php foreach ($jenis as $data) : ?>
    <div class="modal fade" id="ModalHapus<?= $data->id_jenis_koleksi; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Jenis Koleksi <?= $data->nama_jenis_koleksi; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Anda yakin ?</h4>
                        <p>Jika anda menghapus Jenis Koleksi <b><?= $data->nama_jenis_koleksi; ?></b> maka data dari Jenis koleksi tersebut terhapus dari sistem !!. "DAN AKAN MENGGANGGU DATA DI MENU KOLEKSI KARENA DATA TERSEBUT ADA YANG BERELASI" Jika ada kesalahan dan perlu di ubah maka lakukan update data dengan mengklik tombol EDIT yang berwarna hijau !!</p>
                        <hr>
                        <p class="mb-0">Namun jika memang anda sudah yakin maka silahkan klik tombol Yakin !</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                        <a class="btn btn-danger" href="<?= base_url('koleksi/jenis_koleksi/delete/' . $data->id_jenis_koleksi) ?>">YAKIN !</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>