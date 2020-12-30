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
                <label for="time_perawatan">Tanggal Perawatan</label>
                <input type="datetime-local" class="form-control" id="time_perawatan" name="time_perawatan" value="<?= $perawatan["time_perawatan"] ?>" required>

            </div>

            <div class="form-group">
                <label for="kegiatan_perawatan">Kegiatan</label>
                <textarea id="kegiatan_perawatan" class="form-control" name="kegiatan_perawatan"><?= $perawatan["kegiatan_perawatan"] ?></textarea>
                <?= form_error('kegiatan_perawatan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="penanggung_perawatan">Penanggung jawab</label>
                <textarea id="penanggung_perawatan" class="form-control" name="penanggung_perawatan"><?= $perawatan["penanggung_perawatan"] ?></textarea>
                <?= form_error('penanggung_perawatan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= base_url('Admin/perawatan') ?>" class="btn btn-danger">BATALKAN</a>
            </div>
        </form>
    </div>
</div>