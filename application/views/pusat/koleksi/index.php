<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Data Koleksi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Panjang</th>
                        <th>Lebar</th>
                        <th>Berat</th>
                        <th>Tahun</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Panjang</th>
                        <th>Lebar</th>
                        <th>Berat</th>
                        <th>Tahun</th>
                        <th>Foto</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $no = 1;
                    foreach ($koleksi as $data) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data->nama_koleksi; ?></td>
                            <td><?= $data->nama_jenis_koleksi; ?></td>
                            <td><?= $data->panjang_koleksi; ?></td>
                            <td><?= $data->lebar_koleksi; ?></td>
                            <td><?= $data->berat_koleksi; ?></td>
                            <td><?= $data->tahun_koleksi; ?></td>
                            <td>
                                <img height="20" class="img-profile" src="<?= base_url('assets/upload/post/thumbs/' . $data->gambar_koleksi) ?>">
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
                <h5 class="modal-title" id="formDataKoleksiLabel">Form Tambah Data Koleksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('koleksi/koleksi/doTambahBerita') ?>" enctype="multipart/form-data" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_koleksi">Nama Koleksi</label>
                        <input type="text" class="form-control" id="nama_koleksi" name="nama_koleksi" required>
                        <input type="text" hidden value="<?= $users['id_users'] ?>" class="form-control" name="id_users">
                    </div>

                    <div class="form-group">
                        <label for="jenis_koleksi">Jenis Koleksi</label>
                        <select name="id_jenis_koleksi" class="form-control" required>
                            <?php foreach ($jenis as $id_jenis) : ?>
                                <option value="<?= $id_jenis->id_jenis_koleksi ?>"><?= $id_jenis->nama_jenis_koleksi ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="panjang_koleksi">Panjang</label>
                        <input type="text" class="form-control" id="panjang_koleksi" name="panjang_koleksi" required>
                    </div>

                    <div class="form-group">
                        <label for="lebar_koleksi">Lebar</label>
                        <input type="text" class="form-control" id="lebar_koleksi" name="lebar_koleksi" required>
                    </div>

                    <div class="form-group">
                        <label for="berat_koleksi">Berat</label>
                        <input type="text" class="form-control" id="berat_koleksi" name="berat_koleksi" required>
                    </div>

                    <div class="form-group">
                        <label for="koleksi_tahun">Koleksi Tahun</label>
                        <input type="text" class="form-control" id="tahun_koleksi" name="tahun_koleksi" required>
                    </div>

                    <div class="form-group">
                        <label for="gambar_koleksi">Foto Koleksi</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gambar_koleksi" name="gambar_koleksi" required>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
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
<?php foreach ($koleksi as $data) : ?>
    <div class="modal fade" id="ModalDetail<?= $data->id_koleksi; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Koleksi <?= $data->nama_koleksi; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="nama">Nama Koleksi</label>
                            <input disabled type="text" name="nama_koleksi" value="<?= $data->nama_koleksi; ?>" class="form-control" id="nama_koleksi">
                        </div>

                        <div class="form-group">
                            <label for="email">Jenis Koleksi</label>
                            <input disabled type="email" name="id_jenis_koleksi" value="<?= $data->nama_jenis_koleksi; ?>" class="form-control" id="email">
                        </div>

                        <div class="form-group">
                            <label for="password">Panjang</label>
                            <input disabled type="text" name="panjang_koleksi" value="<?= $data->panjang_koleksi; ?>" class="form-control" id="password">
                        </div>
                        <div class="form-group">
                            <label for="password">Lebar</label>
                            <input disabled type="text" name="lebar_koleksi" value="<?= $data->lebar_koleksi; ?>" class="form-control" id="password">
                        </div>
                        <div class="form-group">
                            <label for="password">Berat</label>
                            <input disabled type="text" name="berat_koleksi" value="<?= $data->berat_koleksi; ?>" class="form-control" id="password">
                        </div>
                        <div class="form-group">
                            <label for="password">Tahun</label>
                            <input disabled type="text" name="tahun_koleksi" value="<?= $data->tahun_koleksi; ?>" class="form-control" id="password">
                        </div>

                        <div class="form-group">
                            <label for="password">Waktu Dibuat</label>
                            <input disabled type="text" value="<?= $data->time_create_koleksi; ?>" class="form-control" id="password">
                        </div>

                        <div class="form-group">
                            <label for="password">Terakhir Diubah</label>
                            <input disabled type="text" value="<?= $data->time_update_koleksi; ?>" class="form-control" id="password">
                        </div>

                        <div class="form-group">
                            <label for="password">Dibuat Oleh <b><?= $data->level; ?></b> </label>
                            <input disabled type="text" value="<?= $data->name; ?>" class="form-control" id="password">
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
<?php foreach ($koleksi as $data) : ?>
    <div class="modal fade" id="ModalEdit<?= $data->id_koleksi; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Koleksi <?= $data->nama_koleksi; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('koleksi/Koleksi/updateKoleksi') ?>" method="POST">
                        <div class="form-group">
                            <label for="nama">Nama Koleksi</label>
                            <input type="text" name="nama_koleksi" value="<?= $data->nama_koleksi; ?>" class="form-control" id="nama_koleksi" placeholder="Masukan nama user" required>
                            <input type="text" hidden name="id_koleksi" value="<?= $data->id_koleksi; ?>" class="form-control" id="nama_koleksi" placeholder="Masukan nama user" required>
                            <input type="text" hidden name="id_users" value="<?= $users['id_users']; ?>" class="form-control" id="nama_koleksi" placeholder="Masukan nama user" required>

                        </div>
                        <div class="form-group">
                            <label for="jenis_koleksi">Jenis Koleksi</label>
                            <select name="id_jenis_koleksi" class="form-control" required>
                                <option value="<?= $data->id_jenis_koleksi; ?>"><?= $data->nama_jenis_koleksi; ?></option>
                                <?php foreach ($jenis as $id_jenis) : ?>
                                    <option value="<?= $id_jenis->id_jenis_koleksi ?>"><?= $id_jenis->nama_jenis_koleksi ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="email">Panjang</label>
                            <input type="text" name="panjang_koleksi" value="<?= $data->panjang_koleksi; ?>" class="form-control" id="berat_koleksi" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Lebar</label>
                            <input type="text" name="lebar_koleksi" value="<?= $data->lebar_koleksi; ?>" class="form-control" id="berat_koleksi" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Berat</label>
                            <input type="text" name="berat_koleksi" value="<?= $data->berat_koleksi; ?>" class="form-control" id="berat_koleksi" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Tahun</label>
                            <input type="text" name="tahun_koleksi" value="<?= $data->tahun_koleksi; ?>" class="form-control" id="berat_koleksi" required>
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


<?php foreach ($koleksi as $data) : ?>
    <div class="modal fade" id="ModalHapus<?= $data->id_koleksi; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Koleksi <?= $data->nama_koleksi; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Anda yakin ?</h4>
                        <p>Jika anda menghapus Koleksi <b><?= $data->nama_koleksi; ?></b> maka data dari koleksi tersebut terhapus dari sistem !!. Jika ada kesalahan dan perlu di ubah maka lakukan update data dengan mengklik tombol EDIT yang berwarna hijau !!</p>
                        <hr>
                        <p class="mb-0">Namun jika memang anda sudah yakin maka silahkan klik tombol Yakin !</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                        <a class="btn btn-danger" href="<?= base_url('koleksi/Koleksi/deletekoleksi/' . $data->id_koleksi) ?>">YAKIN !</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>