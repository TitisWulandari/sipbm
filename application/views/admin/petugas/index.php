<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Data Petugas</li>
    </ol>
</nav>
<!-- DataTales Example -->
<button type="button" class="btn btn-primary mb-2 mt-2" data-toggle="modal" data-target="#formDataPetugas">
    <i class="fas fa-plus"></i>
    Tambah Data Petugas
</button>
<p><?php echo $this->session->flashdata('success'); ?></p>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Data Petugas</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Petugas</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php $no = 1;
                    foreach ($petugas as $dape) :  ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $dape['id_users']; ?></td>
                            <td><?= $dape['name']; ?></td>
                            <td><?= $dape['alamat_users']; ?></td>
                            <td><?= $dape['telepon_users']; ?></td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#ModalEdit<?= $dape['id_users']; ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
								<a href="" data-toggle="modal" data-target="#ModalDetail<?= $dape['id_users']; ?>" class="btn btn-success btn-sm"><i class="fas fa-info-circle"></i></a>
                                <a href="" data-toggle="modal" data-target="#ModalHapus<?= $dape['id_users']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="formDataPetugas" tabindex="-1" aria-labelledby="formDataPetugasLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formDataPetugasLabel">Form Tambah Data Petugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('petugas/Petugas/registerPetugas') ?>" method="POST">
                    <div class="form-group">
                        <label for="nama_petugas">Nama Petugas</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" name="alamat_users" required>
                    </div>

                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="text" class="form-control" name="telepon_users" required>
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




<!-- Modal Edit users -->
<?php foreach ($petugas as $datausers) : ?>
    <div class="modal fade" id="ModalEdit<?= $datausers['id_users']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Data Petugas <?= $datausers['name']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('petugas/Petugas/updatePetugas') ?>" method="POST">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="name" value="<?= $datausers['name']; ?>" class="form-control" id="name">
                            <input type="text" hidden name="id_users" value="<?= $datausers['id_users']; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Alamat</label>
                            <input type="text" name="alamat_users" value="<?= $datausers['alamat_users']; ?>" class="form-control" id="alamat_users">
                        </div>
                        <div class="form-group">
                            <label for="email">Telepon</label>
                            <input type="text" name="telepon_users" value="<?= $datausers['telepon_users']; ?>" class="form-control" id="telepon_users">
                        </div>



                        <div class="form-group">
                            <button type="submit" class="btn btn-success">UPDATE</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">BATALKAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- end Modal Edit Users -->

<!-- Modal Detail data petugas -->
<?php foreach ($petugas as $datausers) : ?>
    <div class="modal fade" id="ModalDetail<?= $datausers['id_users']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Data Petugas <?= $datausers['name']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="name" value="<?= $datausers['name']; ?>" class="form-control" id="name">
                            <input type="text" hidden name="id_users" value="<?= $datausers['id_users']; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Alamat</label>
                            <input type="text" name="alamat_users" value="<?= $datausers['alamat_users']; ?>" class="form-control" id="alamat_users">
                        </div>
                        <div class="form-group">
                            <label for="email">Telepon</label>
                            <input type="text" name="telepon_users" value="<?= $datausers['telepon_users']; ?>" class="form-control" id="telepon_users">
                        </div>

				<div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- end Modal Detail Users -->

<?php foreach ($petugas as $datausers) : ?>
    <div class="modal fade" id="ModalHapus<?= $datausers['id_users']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Petugas <?= $datausers['name']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        
                        <p>Apakah Anda akan menghapus Petugas <b><?= $datausers['name']; ?></b> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Tidak</button>
                        <a class="btn btn-danger" href="<?= base_url('petugas/Petugas/deletePetugas/' . $datausers['id_users']) ?>">Ya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>