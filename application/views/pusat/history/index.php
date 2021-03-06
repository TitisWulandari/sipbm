<!-- <div class="row">
    <div class="col-sm-1">
        <div class="form-group">
            <select class="form-control" id="tanggal">
                <option>Tanggal</option>
                <?php for ($tanggal = 1; $tanggal <= 31; $tanggal++) : ?>
                    <option value="<?= $tanggal; ?>"><?= $tanggal; ?></option>
                <?php endfor; ?>
            </select>
        </div>
    </div>
    <div class="col-sm-1">
        <div class="form-group">
            <select class="form-control" id="bulan">
                <option>Bulan</option>
                <?php for ($bulan = 1; $bulan <= 12; $bulan++) : ?>
                    <option value="<?= $bulan; ?>"><?= $bulan; ?></option>
                <?php endfor; ?>
            </select>
        </div>
    </div>

    <div class="col-sm-2">
        <div class="form-group">
            <select class="form-control" id="tahun">
                <option>Tahun</option>
                <?php for ($tahun = 1950; $tahun <= date('Y'); $tahun++) : ?>
                    <option value="<?= $tahun; ?>"><?= $tahun; ?></option>
                <?php endfor; ?>
            </select>
        </div>
    </div>

    <div class="col-sm-1">
        <label for=""></label>
        <button type="submit" class="btn btn-primary">Cari</button>
    </div>
</div> -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Data History Perawatan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama petugas</th>
                        <th>Nama koleksi</th>
                        <th>Tanggal Perawatan</th>
                        <th>Kegiatan</th>
                        <th>Penanggung jawab</th>
                        
                    </tr>
                </thead>
                
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($historyperawatan as $history) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $history["name"] ?></td>
                            <td><?= $history["nama_koleksi"]; ?></td>
                            <td><?= $history["time_perawatan"]; ?></td>
                            <td><?= $history["kegiatan_perawatan"]; ?></td>
                            <td><?= $history["penanggung_perawatan"]; ?></td>
                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>