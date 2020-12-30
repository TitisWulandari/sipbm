<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Data Perawatan</li>
    </ol>
</nav>

<!-- DataTales Example -->

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Data Perawatan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama petugas</th>
                        <th>Nama koleksi</th>
                        <th>Tanggal perawatan</th>
                        <th>Kegiatan</th>
                        <th>Penanggung jawab</th>
                        
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
                            <td><?= $per["time_perawatan"]; ?></td>
                            <td><?= $per["kegiatan_perawatan"]; ?></td>
                            <td><?= $per["penanggung_perawatan"]; ?></td>
                          
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

<!-- modal -->
<div class="modal fade" id="formDataPerbaikan" tabindex="-1" aria-labelledby="formDataPerbaikanLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formDataPerbaikanLabel">Form Tambah Data Perawatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/perawatan'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_users">Nama Petugas</label>
                        <select class="form-control" id="id_users" name="id_users" required>
                            <option disabled>-- pilih petugas --</option>
                            <?php foreach ($petugas as $pet) : ?>
                                <option value="<?= $pet["id_users"] ?>"><?= $pet["name"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

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
                        <label for="time_perawatan">Tanggal Perawatan</label>
                        <input type="datetime-local" class="form-control" id="time_perawatan" name="time_perawatan" required>

                    </div>

                    <div class="form-group">
                        <label for="kegiatan_perawatan">Kegiatan</label>
                        <textarea id="kegiatan_perawatan" class="form-control" name="kegiatan_perawatan" required></textarea>

                    </div>

                    <div class="form-group">
                        <label for="penanggung_perawatan">Penanggung jawab</label>
                        <textarea id="penanggung_perawatan" class="form-control" name="penanggung_perawatan" required></textarea>

                    </div>

                    <div class="form-group">
                        <label for="tambahan_perawatan">Tambahan</label>
                        <input type="text" class="form-control" id="tambahan_perawatan" name="tambahan_perawatan" required>

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