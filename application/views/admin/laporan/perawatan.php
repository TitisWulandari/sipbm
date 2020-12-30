<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Laporan Perawatan</li>
    </ol>
</nav>

<div class="row">
    <div class="col-xl-7">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <form action="<?= base_url('admin/laporan_perawatan_pdf'); ?>" method="POST">
                    <div class="form-group">
                        <label for="dari">Dari</label>
                        <input type="datetime-local" class="form-control" id="dari" name="keyword1">
                    </div>
                    <div class="form-group">
                        <label for="sampai">Sampai</label>
                        <input type="datetime-local" class="form-control" id="sampai" name="keyword2">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-check"></i> Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="card shadow mb-4 mt-4">
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
                            <td><?= $per["name"] ?></td>
                            <td><?= $per["nama_koleksi"]; ?></td>
                            <td><?= $per["time_perawatan"]; ?></td>
                            <td><?= $per["kegiatan_perawatan"]; ?></td>
                            <td><?= $per["penanggung_perawatan"]; ?></td>
                            
                            
							 <td>
                                <?php if ($per['validasi_perawatan'] == "belum") { ?>
                                    <a style="color: whitesmoke;" class="badge badge-secondary">Waiting</a>
                                <?php } elseif ($per['validasi_perawatan'] == "waiting") { ?>
                                    <a style="color: whitesmoke;" class="badge badge-warning">Please Aprove</a>
                                <?php } elseif ($per['validasi_perawatan'] == "sudah") { ?>
                                    <a style="color: whitesmoke;" class="badge badge-success">Finish</a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>