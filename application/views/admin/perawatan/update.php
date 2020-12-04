<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Data Perawatan</li>
    </ol>
</nav>

<div class="card">
    <div class="card-header">
        Edit Data Perawatan
    </div>
    <div class="card-body">
        <form action="<?= base_url('admin/update_perawatan/' . $perawatan["id_perawatan"]) ?>" method="POST">

            <input type="hidden" name="id_perawatan" value="<?= $perawatan["id_perawatan"]; ?>">

            <div class="form-group">
                <label for="id_users">Nama Petugas</label>
                <select class="form-control" id="id_users" name="id_users">
                    <option disabled>-- pilih petugas --</option>
                    <?php foreach ($petugas as $pet) : ?>
                        <option value="<?= $pet["id_users"] ?>"><?= $pet["name"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="id_koleksi">Nama koleksi</label>
                <select class="form-control" id="id_koleksi" name="id_koleksi">
                    <option disabled>-- pilih koleksi --</option>
                    <?php foreach ($collections as $collection) : ?>
                        <option value="<?= $collection["id_koleksi"] ?>"><?= $collection["nama_koleksi"] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="keadaan_koleksi_perawatan">Keadaan Koleksi</label>
                <input type="text" class="form-control" id="keadaan_koleksi_perawatan" name="keadaan_koleksi_perawatan" value="<?= $perawatan["keadaan_koleksi_perawatan"] ?>">
                <?= form_error('keadaan_koleksi_perawatan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="no_vitrin_koleksi_perawatan">No. vitrin</label>
                <input type="text" class="form-control" id="no_vitrin_koleksi_perawatan" name="no_vitrin_koleksi_perawatan" value="<?= $perawatan["no_vitrin_koleksi_perawatan"] ?>">
                <?= form_error('no_vitrin_koleksi_perawatan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="time_perawatan">Tanggal Perawatan</label>
                <input type="datetime-local" class="form-control" id="time_perawatan" name="time_perawatan" value="<?= $perawatan["time_perawatan"] ?>" required>

            </div>

            <div class="form-group">
                <label for="kegiatan_perawatan">Kegiatan</label>
                <textarea id="kegiatan_perawatan" class="form-control" name="kegiatan_perawatan"><?= $perawatan["kegiatan_perawatan"] ?></textarea>
                <?= form_error('kegiatan_perawatan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="bahan_perawatan">Bahan yang digunakan</label>
                <textarea id="bahan_perawatan" class="form-control" name="bahan_perawatan"><?= $perawatan["bahan_perawatan"] ?></textarea>
                <?= form_error('bahan_perawatan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="tambahan_perawatan">Tambahan</label>
                <input type="text" class="form-control" id="tambahan_perawatan" name="tambahan_perawatan" value="<?= $perawatan["tambahan_perawatan"] ?>">
                <?= form_error('tambahan_perawatan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= base_url('Admin/perawatan') ?>" class="btn btn-danger">BATALKAN</a>
            </div>
        </form>
    </div>
</div>