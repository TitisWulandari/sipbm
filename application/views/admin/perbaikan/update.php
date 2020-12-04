<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Data Perbaikan</li>
    </ol>
</nav>

<div class="card mt-4">
    <div class="card-header">
        Edit Data Perbaikan
    </div>
    <div class="card-body">
        <form action="<?= base_url('admin/update_perbaikan/' . $improvement["id_permintaan_perbaikan"]) ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_permintaan_perbaikan" value="<?= $improvement["id_permintaan_perbaikan"] ?>">
            <div class="form-group">
                <label for="id_koleksi">Nama koleksi</label>
                <select class="form-control" id="id_koleksi" name="id_koleksi">
                    <option disabled>-- pilih koleksi --</option>
                    <?php foreach ($collections as $collection) : ?>
                        <option value="<?= $collection["id_koleksi"]; ?>"><?= $collection["nama_koleksi"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="id_ruang_koleksi">Nama ruang koleksi</label>
                <select class="form-control" id="id_ruang_koleksi" name="id_ruang_koleksi">
                    <option disabled>-- pilih koleksi --</option>
                    <?php foreach ($collection_rooms as $collection_room) : ?>
                        <option value="<?= $collection_room["id_ruang_koleksi"] ?>"><?= $collection_room["nama_ruang_koleksi"] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="bahan_permintaan_perbaikan">Bahan</label>
                <input type="text" class="form-control" id="bahan_permintaan_perbaikan" name="bahan_permintaan_perbaikan" value="<?= $improvement["bahan_permintaan_perbaikan"] ?>">
                <?= form_error('bahan_permintaan_perbaikan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="keadaan_koleksi_permintaan_perbaikan">Keadaan Koleksi</label>
                <textarea type="text" class="form-control" id="keadaan_koleksi_permintaan_perbaikan" name="keadaan_koleksi_permintaan_perbaikan"><?= $improvement["keadaan_koleksi_permintaan_perbaikan"] ?></textarea>
                <?= form_error('keadaan_koleksi_permintaan_perbaikan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="no_vitrin_permintaan_perbaikan">No. Vitrin</label>
                <input type="text" class="form-control" id="no_vitrin_permintaan_perbaikan" name="no_vitrin_permintaan_perbaikan" value="<?= $improvement["no_vitrin_permintaan_perbaikan"] ?>">
                <?= form_error('no_vitrin_permintaan_perbaikan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="time_permintaan_perbaikan">Tanggal Perbaikan</label>
                <input type="datetime-local" class="form-control" id="time_permintaan_perbaikan" name="time_permintaan_perbaikan" value="<?= $improvement["time_permintaan_perbaikan"] ?>">
                <?= form_error('time_permintaan_perbaikan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="gambar_kerusakan_permintaan_perbaikan">Foto Kerusakan</label>
                <div class="row">
                    <div class="col-sm-2">
                        <img src="<?= base_url('assets/img/perbaikan/' . $improvement["gambar_kerusakan_permintaan_perbaikan"]); ?>" class="img-thumbnail" alt="">
                    </div>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gambar_kerusakan_permintaan_perbaikan" name="gambar_kerusakan_permintaan_perbaikan">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= base_url('Admin/perbaikan') ?>" class="btn btn-danger">BATALKAN</a>

            </div>
        </form>
    </div>
</div>