<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Data Perawatan</li>
    </ol>
</nav>

<?= $this->session->flashdata('message'); ?>

<div class="card">
    <div class="card-header">
        Detail Kegiatan Perawatan
    </div>
    <div class="card-body">
        <table cellpadding="15">
            <tr>
                <td><b>Nama Petugas</b></td>
                <td>:</td>
                <td><?= $perawatan["name"] ?></td>
            </tr>
            <tr>
                <td><b>Nama Koleksi</b></td>
                <td>:</td>
                <td><?= $perawatan["nama_koleksi"] ?></td>
            </tr>
            <tr>
                <td><b>Keadaan Koleksi</b></td>
                <td>:</td>
                <td><?= $perawatan["keadaan_koleksi_perawatan"] ?></td>
            </tr>
            <tr>
                <td><b>No. vitrin</b></td>
                <td>:</td>
                <td><?= $perawatan["no_vitrin_koleksi_perawatan"] ?></td>
            </tr>
            <tr>
                <td><b>Tangal Perawatan</b></td>
                <td>:</td>
                <td><?= $perawatan["time_perawatan"] ?></td>
            </tr>
            <tr>
                <td><b>Kegiatan</b></td>
                <td>:</td>
                <td><?= $perawatan["kegiatan_perawatan"] ?></td>
            </tr>
            <tr>
                <td><b>Bahan yang digunakan</b></td>
                <td>:</td>
                <td><?= $perawatan["bahan_perawatan"] ?></td>
            </tr>
            <tr>
                <td><b>Tambahan</b></td>
                <td>:</td>
                <td><?= $perawatan["tambahan_perawatan"] ?></td>
            </tr>
        </table>

        <div class="row justify-content-center mt-4 mb-4">
            <div class="col-sm-1">
                <form action="<?= base_url('admin/validasiPerawatan/' . $perawatan["id_perawatan"]) ?>" method="POST" class="float-left">
                    <input type="hidden" name="id_perawatan" value="<?= $perawatan["id_perawatan"] ?>">
                    <button type="submit" class="btn btn-warning">Validasi</button>
                </form>
            </div>
            <div class="col-sm-1">
                <a href="<?= base_url('admin/perawatan'); ?>" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </div>
</div>