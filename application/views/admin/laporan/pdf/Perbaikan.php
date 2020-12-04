<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
}
th {
  text-align: left;
}
</style>
</head><body>
    <h1 style="text-align: center;"><?= $logo; ?> SISTEM INFORMASI PERAWATAN BENDA MUSEUM</h1>
    <h4 style="background-color: #6c5ce7; color: white; padding: 1px; width: 190px; border: 1px solid #6c5ce7; margin-left: 420px; text-align: center;">LAPORAN PERBAIKAN</h4>
    <p style="text-align: center;"><span>Range Date </span></span>: <?= $awal; ?> - <?= $akhir; ?></p>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th style="">No</th>
                <th>Nama Koleksi</th>
                <th>Nama ruang koleksi</th>
                <th>Bahan</th>
                <th>Keadaan koleksi</th>
                <th>No. vitrin</th>
                <th>Tanggal Perbaikan</th>
                <th>Foto kerusakan</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($improvements as $improvement) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $improvement->nama_koleksi; ?></td>
                    <td><?= $improvement->nama_ruang_koleksi; ?></td>
                    <td><?= $improvement->bahan_permintaan_perbaikan; ?></td>
                    <td><?= $improvement->keadaan_koleksi_permintaan_perbaikan; ?></td>
                    <td><?= $improvement->no_vitrin_permintaan_perbaikan; ?></td>
                    <td><?= $improvement->time_permintaan_perbaikan; ?></td>
                    <td class="text-center"><img src="<?= $gambar; ?>/<?=  $improvement->gambar_kerusakan_permintaan_perbaikan ?>" width="70" class="img-thumbnail">
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body></html>