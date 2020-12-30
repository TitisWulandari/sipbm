<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Data Pemeriksaan</li>
    </ol>
</nav>

<!-- DataTales Example -->

<button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#formDataKoleksi">

    <i class="fas fa-plus"></i>

    Pemeriksaan

</button>

<p><?php echo $this->session->flashdata('success'); ?></p>

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Data Pemeriksaan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama petugas</th>
                        <th>Nama koleksi</th>
                        <th>Keadaan koleksi</th>
                        <th>No. vitrin</th>
                        <th>Tanggal perawatan</th>
                        <th>Kegiatan</th>
                        <th>Bahan yang digunakan</th>
                        <th>Tambahan</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; ?>

                    <?php foreach ($perawatan as $per) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $users["name"] ?></td>
                            <td><?= $per["nama_koleksi"]; ?></td>
                            <td><?= $per["keadaan_koleksi_perawatan"]; ?></td>
                            <td><?= $per["no_vitrin_koleksi_perawatan"]; ?></td>
                            <td><?= $per["time_perawatan"]; ?></td>
                            <td><?= $per["kegiatan_perawatan"]; ?></td>
                            <td><?= $per["bahan_perawatan"]; ?></td>
                            <td><?= $per["tambahan_perawatan"]; ?></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <?php if ($per['validasi_perawatan'] == "belum") { ?>
                                        <a style="color: white;" class="badge badge-danger " href="<?php echo site_url('petugas/petugas_perawatan/perawatan/updateStatusW/' . $per['id_perawatan']) ?>">
                                            Open
                                        </a>
                                    <?php } elseif ($per['validasi_perawatan'] == "waiting") { ?>
                                        <a style="color: white;" class="badge badge-warning">
                                            Waiting Approve
                                        </a>
                                    <?php } elseif ($per['validasi_perawatan'] == "sudah") { ?>
                                        <a style="color: white;" class="badge badge-secondary">
                                            Done
                                        </a>
                                    <?php } ?>
                                </div>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

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
                        <label for="id_koleksi">Nama koleksi</label>
                        <select class="form-control" id="id_koleksi" name="id_koleksi" required>
                            <option disabled>-- pilih koleksi --</option>
                            <?php foreach ($collections as $collection) : ?>
                                <option value="<?= $collection["id_koleksi"] ?>"><?= $collection["nama_koleksi"] ?></option>
                            <?php endforeach; ?>
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