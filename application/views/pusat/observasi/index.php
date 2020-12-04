<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Data Observasi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Koleksi</th>
                        <th>Nama ruang koleksi</th>
                        <th>Bahan</th>
                        <th>Keadaan koleksi</th>
                        <th>No. vitrin</th>
                        <!-- <th>Tanggal observasi</th> -->
                        <th>Rekomendasi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Koleksi</th>
                        <th>Nama ruang koleksi</th>
                        <th>Bahan</th>
                        <th>Keadaan koleksi</th>
                        <th>No. vitrin</th>
                        <!-- <th>Tanggal observasi</th> -->
                        <th>Rekomendasi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $no = 1;
                    foreach ($observasi as $data) : ?>
                        <tr>
                            <td><?= $no++  ?></td>
                            <td><?= $data->nama_koleksi; ?></td>
                            <td><?= $data->nama_ruang_koleksi; ?></td>
                            <td><?= $data->bahan_observasi_koleksi; ?></td>
                            <td><?= $data->keadaan_observasi_koleksi; ?></td>
                            <td><?= $data->no_vitrin_observasi_koleksi; ?></td>
                            <!-- <td><?= $data->time_observasi; ?></td> -->
                            <td><?= $data->rekomendasi_observasi_koleksi; ?></td>

                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="formDataObservasi" tabindex="-1" aria-labelledby="formDataObservasiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formDataObservasiLabel">Form Tambah Data Observasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('observasi/Observasi/postObservasi') ?>" method="POST">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_koleksi">Nama koleksi</label>
                        <select class="form-control" id="id_koleksi" name="id_koleksi">
                            <?php foreach ($koleksi as $data) : ?>
                                <option value="<?= $data->id_koleksi; ?>"><?= $data->nama_koleksi; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_ruang_koleksi">Nama ruang koleksi</label>
                        <select class="form-control" id="id_ruang_koleksi" name="id_ruang_koleksi">
                            <?php foreach ($ruang as $dataruang) : ?>
                                <option value="<?= $dataruang->id_ruang_koleksi; ?>"><?= $dataruang->nama_ruang_koleksi; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="bahan_observasi_koleksi">Bahan</label>
                        <input type="text" class="form-control" name="bahan_observasi_koleksi">
                        <input type="text" hidden class="form-control" name="id_users" value="<?= $users['id_users'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="keadaan_observasi_koleksi">Keadaan Koleksi</label>
                        <input type="text" class="form-control" name="keadaan_observasi_koleksi">
                    </div>

                    <div class="form-group">
                        <label for="no_vitrin_observasi_koleksi">No. Vitrin</label>
                        <input type="text" class="form-control" name="no_vitrin_observasi_koleksi">
                    </div>

                    <div class="form-group">
                        <label for="jumlah_koleksi">Jumlah Koleksi</label>
                        <input type="text" class="form-control" name="jumlah_koleksi">
                    </div>

                    <div class="form-group">
                        <label for="time_create_observasi">Tanggal Observasi</label>
                        <input type="date" class="form-control" name="time_observasi">
                    </div>

                    <div class="form-group">
                        <label for="level">Rekomendasi</label>
                        <select name="rekomendasi_observasi_koleksi" class="form-control">
                            <option value="perawatan">Perawatan</option>
                            <option value="belum_rekomendasi">Belum Rekomendasi</option>
                            <option value="perbaikan">Perbaikan</option>
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



<!-- Modal Detail users -->
<?php foreach ($observasi as $data) : ?>
    <div class="modal fade" id="ModalDetail<?= $data->id_observasi; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Observasi <?= $data->nama_koleksi; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="name" value="<?= $data->nama_koleksi; ?>" class="form-control" id="nama" placeholder="Masukan nama user">
                        </div>

                        <div class="form-group">
                            <label for="email">Nama ruang koleksi</label>
                            <input type="email" name="email" value="<?= $data->nama_ruang_koleksi; ?>" class="form-control" id="email" placeholder="Masukan email user">
                        </div>

                        <div class="form-group">
                            <label for="password">Bahan</label>
                            <input type="text" name="bahan_observasi_koleksi" value="<?= $data->bahan_observasi_koleksi; ?>" class="form-control" id="password" placeholder="Masukan password user">
                        </div>
                        <div class="form-group">
                            <label for="password">Keadaan</label>
                            <input type="text" name="keadaan_observasi_koleksi" value="<?= $data->keadaan_observasi_koleksi; ?>" class="form-control" id="password" placeholder="Masukan password user">
                        </div>
                        <div class="form-group">
                            <label for="password">No vitrin</label>
                            <input type="text" name="no_vitrin_observasi_koleksi" value="<?= $data->no_vitrin_observasi_koleksi; ?>" class="form-control" id="password" placeholder="Masukan password user">
                        </div>

                        <div class="form-group">
                            <label for="password">Waktu Observasi</label>
                            <input type="text" value="<?= $data->time_observasi; ?>" class="form-control" id="password" placeholder="Masukan password user">
                        </div>

                        <div class="form-group">
                            <label for="password">Dibuat oleh <?= $data->level; ?></label>
                            <input type="text" value="<?= $data->name; ?>" class="form-control" id="password" placeholder="Masukan password user">
                        </div>

                        <div class="form-group">
                            <label for="password">Terakhir diubah</label>
                            <input type="text" value="<?= $data->time_update_observasi; ?>" class="form-control">
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
<?php foreach ($observasi as $dataob) : ?>
    <div class="modal fade" id="ModalEdit<?= $dataob->id_observasi; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Observasi <?= $dataob->nama_koleksi; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('observasi/Observasi/updateObservasi') ?>" method="POST">

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="id_koleksi">Nama koleksi</label>
                                <select class="form-control" id="id_koleksi" name="id_koleksi">
                                    <option value="<?= $data->id_koleksi; ?>"><?= $dataob->nama_koleksi; ?></option>
                                    <?php foreach ($koleksi as $data) : ?>
                                        <option value="<?= $data->id_koleksi; ?>"><?= $data->nama_koleksi; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id_ruang_koleksi">Nama ruang koleksi</label>
                                <select class="form-control" id="id_ruang_koleksi" name="id_ruang_koleksi">
                                    <option value="<?= $dataob->id_ruang_koleksi; ?>"><?= $dataob->nama_ruang_koleksi; ?></option>
                                    <?php foreach ($ruang as $dataruang) : ?>
                                        <option value="<?= $dataruang->id_ruang_koleksi; ?>"><?= $dataruang->nama_ruang_koleksi; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="bahan_observasi_koleksi">Bahan</label>
                                <input type="text" class="form-control" value="<?= $dataob->bahan_observasi_koleksi; ?>" name="bahan_observasi_koleksi">
                                <input type="text" hidden class="form-control" name="id_users" value="<?= $users['id_users'] ?>">
                                <input type="text" hidden class="form-control" name="id_observasi" value="<?= $dataob->id_observasi ?>">
                            </div>

                            <div class="form-group">
                                <label for="keadaan_observasi_koleksi">Keadaan Koleksi</label>
                                <input type="text" class="form-control" value="<?= $dataob->keadaan_observasi_koleksi; ?>" name="keadaan_observasi_koleksi">
                            </div>

                            <div class="form-group">
                                <label for="no_vitrin_observasi_koleksi">No. Vitrin</label>
                                <input type="text" class="form-control" value="<?= $dataob->no_vitrin_observasi_koleksi; ?>" name="no_vitrin_observasi_koleksi">
                            </div>

                            <div class="form-group">
                                <label for="jumlah_koleksi">Jumlah Koleksi</label>
                                <input type="text" class="form-control" value="<?= $dataob->jumlah_koleksi; ?>" name="jumlah_koleksi">
                            </div>

                            <div class="form-group">
                                <label for="time_create_observasi">Tanggal Observasi : <?= $dataob->time_observasi; ?></label>
                                <input type="date" class="form-control" value="<?= $dataob->time_observasi; ?>" name="time_observasi">
                            </div>

                            <div class="form-group">
                                <label for="level">Rekomendasi</label>
                                <select name="rekomendasi_observasi_koleksi" class="form-control">
                                    <option value="<?= $dataob->rekomendasi_observasi_koleksi ?>"><?= $dataob->rekomendasi_observasi_koleksi ?></option>
                                    <option value="perawatan">Perawatan</option>
                                    <option value="belum_rekomendasi">Belum Rekomendasi</option>
                                    <option value="perbaikan">Perbaikan</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
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



<?php foreach ($observasi as $datadel) : ?>
    <div class="modal fade" id="ModalHapus<?= $datadel->id_observasi; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Observasi <?= $datadel->nama_koleksi; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Anda yakin ?</h4>
                        <p>Jika anda menghapus Observasi <b><?= $datadel->nama_koleksi; ?></b> maka data dari Observasi tersebut terhapus dari sistem !!. Jika ada kesalahan dan perlu di ubah maka lakukan update data dengan mengklik tombol EDIT yang berwarna hijau !!</p>
                        <hr>
                        <p class="mb-0">Namun jika memang anda sudah yakin maka silahkan klik tombol Yakin !</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                        <a class="btn btn-danger" href="<?= base_url('observasi/Observasi/deleteObservasi/' . $datadel->id_observasi) ?>">YAKIN !</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>