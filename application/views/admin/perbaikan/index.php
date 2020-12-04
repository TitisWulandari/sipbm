<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Data Perbaikan</li>
    </ol>
</nav>

<!-- DataTales Example -->
<button type="button" class="btn btn-primary mb-4 mt-2" data-toggle="modal" data-target="#formDataPerbaikan">
    <i class="fas fa-plus"></i>
    Tambah Data Perbaikan
</button>
<?= $this->session->flashdata('message'); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Data Perbaikan</h6>
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
                        <th>Tanggal Perbaikan</th>
                        <th>Foto kerusakan</th>
                        <th>Status</th>
                        <th>Aksi</th>
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
                        <th>Tanggal Perbaikan</th>
                        <th>Foto kerusakan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($improvements as $improvement) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $improvement["nama_koleksi"]; ?></td>
                            <td><?= $improvement["nama_ruang_koleksi"]; ?></td>
                            <td><?= $improvement["bahan_permintaan_perbaikan"]; ?></td>
                            <td><?= $improvement["keadaan_koleksi_permintaan_perbaikan"]; ?></td>
                            <td><?= $improvement["no_vitrin_permintaan_perbaikan"]; ?></td>
                            <td><?= $improvement["time_permintaan_perbaikan"]; ?></td>
                            <td class="text-center"><img src="<?= base_url('assets/img/perbaikan/' . $improvement["gambar_kerusakan_permintaan_perbaikan"]); ?>" width="70" class="img-thumbnail" alt=""></td>
                            <td>
                                <?php if ($improvement['status_permintaan_perbaikan'] == "closed") { ?>
                                    <a style="color: whitesmoke;" class="badge badge-secondary"> Closed</a>
                                <?php } elseif ($improvement['status_permintaan_perbaikan'] == "waiting") { ?>
                                    <a style="color: whitesmoke;" class="badge badge-warning"> waiting</a>
                                <?php } elseif ($improvement['status_permintaan_perbaikan'] == "finish") { ?>
                                    <a style="color: whitesmoke;" class="badge badge-danger"> Open</a>
                                <?php } ?>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/update_perbaikan/' . $improvement["id_permintaan_perbaikan"]); ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                <a onclick="return confirm('Data perbaikan akan terhapus')" href="<?= base_url('admin/deletePerbaikan/' . $improvement["id_permintaan_perbaikan"]); ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="formDataPerbaikan" tabindex="-1" aria-labelledby="formDataPerbaikanLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formDataPerbaikanLabel">Form Tambah Data Perbaikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/perbaikan'); ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_koleksi">Nama koleksi</label>
                        <select class="form-control" id="id_koleksi" name="id_koleksi" required>
                            <option disabled>-- pilih koleksi --</option>
                            <?php foreach ($collections as $collection) : ?>
                                <option value="<?= $collection["id_koleksi"]; ?>"><?= $collection["nama_koleksi"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_ruang_koleksi">Nama ruang koleksi</label>
                        <select class="form-control" id="id_ruang_koleksi" name="id_ruang_koleksi" required>
                            <option disabled>-- pilih koleksi --</option>
                            <?php foreach ($collection_rooms as $collection_room) : ?>
                                <option value="<?= $collection_room["id_ruang_koleksi"] ?>"><?= $collection_room["nama_ruang_koleksi"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="bahan_permintaan_perbaikan">Bahan</label>
                        <input type="text" class="form-control" id="bahan_permintaan_perbaikan" name="bahan_permintaan_perbaikan" required>
                        <?= form_error('bahan_permintaan_perbaikan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="keadaan_koleksi_permintaan_perbaikan">Keadaan Koleksi</label>
                        <textarea type="text" class="form-control" id="keadaan_koleksi_permintaan_perbaikan" name="keadaan_koleksi_permintaan_perbaikan" required></textarea>
                        <?= form_error('keadaan_koleksi_permintaan_perbaikan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="no_vitrin_permintaan_perbaikan">No. Vitrin</label>
                        <input type="text" class="form-control" id="no_vitrin_permintaan_perbaikan" name="no_vitrin_permintaan_perbaikan" required>
                        <?= form_error('no_vitrin_permintaan_perbaikan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="time_permintaan_perbaikan">Tanggal Perbaikan</label>
                        <input type="datetime-local" class="form-control" id="time_permintaan_perbaikan" name="time_permintaan_perbaikan" required>
                        <?= form_error('time_permintaan_perbaikan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="gambar_kerusakan_permintaan_perbaikan">Foto Kerusakan</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gambar_kerusakan_permintaan_perbaikan" name="gambar_kerusakan_permintaan_perbaikan" required>
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