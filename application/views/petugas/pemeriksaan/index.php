<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Data Pemeriksaan</li>
    </ol>
</nav>

<!-- DataTales Example -->

<button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#formDataKoleksi">

    <i class="fas fa-plus"></i>

    Pemeriksaan

</button>

<p><?php echo $this->session->flashdata('success'); ?></p>

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Data Pemeriksaan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama petugas</th>
                        
                        <th>Nama koleksi</th>
						<th>Kondisi Kerusakan</th>
						<th>Bukti Kerusakan</th>
                        <th>Status</th>
						<!--<th>Aksi</th> -->
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; ?>

                    <?php foreach ($pemeriksaan as $per) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $per->nama_koleksi ?></td>
                        
                            <td><?= $per->nama_koleksi; ?></td>
							 <td><?= $per->kondisi_kerusakan; ?></td>
							 <td>

                                <img height="20" class="img-profile" src="<?= base_url('assets/upload/pemeriksaan/thumbs/' . $per->gambar_kerusakan) ?>">

                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <?php if ($per->status_pemeriksaan == "1") { ?>
                                        <a style="color: white;" class="badge badge-danger ">
                                            Sudah dilaporkan
                                        </a>
                                    <?php } elseif ($per->status_pemeriksaan == "2") { ?>
                                        <a style="color: white;" class="badge badge-success">
                                            Valid
                                        </a>
                                    <?php } ?>
                                </div>
                            </td>
							<!--
							<td>

                                <a href="" data-toggle="modal" data-target="#ModalEdit<?= $per->id_pemeriksaan; ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>

                                <a href="" data-toggle="modal" data-target="#ModalDetail<?= $per->id_pemeriksaan; ?>" class="btn btn-info btn-sm"><i class="fas fa-info-circle"></i></a>

                                <a href="" data-toggle="modal" data-target="#ModalUpdateImg<?= $per->id_pemeriksaan; ?>" class="btn btn-warning btn-sm"><i class="fas fa-camera"></i></a>

                                <a href="" data-toggle="modal" data-target="#ModalHapus<?= $per->id_pemeriksaan; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>

                            </td>
							-->

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="formDataPemeriksaan" tabindex="-1" aria-labelledby="formDataPemeriksaanLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="formDataKoleksiLabel">Form Pemeriksaan Kerusakan</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <form action="<?= base_url('petugas/pemeriksaan/Pemeriksaan/doTambahBerita') ?>" enctype="multipart/form-data" method="POST">

                <div class="modal-body">

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

                        <label for="koleksi_tahun">Kondisi Kerusakan</label>

                        <textarea class="form-control" name="kondisi_kerusakan" id="kondisi_kerusakan" rows="3" required></textarea>

                    </div>



                    <div class="form-group">

                        <label for="gambar_kerusakan">Bukti Kerusakan</label>

                        <div class="custom-file">

                            <input type="file" class="custom-file-input" id="gambar_kerusakan" name="gambar_kerusakan" required>

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

</div>

<!-- Modal Detail koleksi -->

<?php foreach ($pemeriksaan as $per) : ?>

    <div class="modal fade" id="ModalDetail<?= $per->id_pemeriksaan; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Detail Pemeriksaan </h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <form action="" method="POST">

                        <div class="form-group">

                            <label for="nama">Nama Koleksi</label>

                            <input disabled type="text" name="id_koleksi" value="<?= $per->nama_koleksi; ?>" class="form-control" id="nama_koleksi">

                        </div>



                        <div class="form-group">

                            <label for="password">Kondisi kerusakan</label>

                            <input disabled type="text" name="kondisi_kerusakan" value="<?= $per->kondisi_kerusakan; ?>" class="form-control" id="password">

                        </div>


                        <div class="form-group">

                            <label for="password">Dibuat Oleh <b><?= $per->level; ?></b> </label>

                            <input disabled type="text" value="<?= $per->name; ?>" class="form-control" id="password">

                        </div>



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

<!-- end Modal Detail Pemeriksaan -->

<!-- Modal Edit Pemeriksaan -->

<?php foreach ($pemeriksaan as $per) : ?>

    <div class="modal fade" id="ModalEdit<?= $per->id_pemeriksaan; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Update Pemeriksaan</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <form action="<?= base_url('petugas/pemeriksaan/Pemeriksaan/updatePemeriksaan') ?>" method="POST">

                        <div class="form-group">

                            <label for="nama">Nama Koleksi</label>

                            <input type="text" name="id_koleksi" value="<?= $per->nama_koleksi; ?>" class="form-control" id="id_koleksi" placeholder="Masukan nama user" required>

                            <input type="text" hidden name="id_pemeriksaan" value="<?= $per->id_pemeriksaan; ?>" class="form-control" id="nama_koleksi" placeholder="Masukan nama user" required>

                            <input type="text" hidden name="id_users" value="<?= $users['id_users']; ?>" class="form-control" id="nama_koleksi" placeholder="Masukan nama user" required>



                        </div>

						

                        <div class="form-group">

                            <label for="email">Kondisi Kerusakan</label>

                            <input type="text" name="kondisi_kerusakan" value="<?= $per->kondisi_kerusakan; ?>" class="form-control" id="berat_koleksi" required>

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

    </div>

<?php endforeach ?>

<!-- end Modal Edit pemeriksaan -->



<!-- Modal Update gambar pemeriksaan -->

<?php foreach ($pemeriksaan as $per) : ?>

    <div class="modal fade" id="ModalUpdateImg<?= $per->id_pemeriksaan; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Update Gambar</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <form action="<?= base_url('petugas/pemeriksaan/Pemeriksaan/UpdateGambarPemeriksaan') ?>" enctype="multipart/form-data" method="POST">



                        <div class="form-group">

                            <input type="text" hidden name="id_pemeriksaan" value="<?= $per->id_pemeriksaan; ?>" class="form-control" id="id_users" placeholder="Masukan nama user">

                            <input type="text" hidden name="id_users" value="<?= $users['id_users']; ?>" class="form-control" id="nama_koleksi" placeholder="Masukan nama user" required>

                        </div>



                        <div class="form-group">

                            <img height="20" class="img-thumbnail" src="<?= base_url('assets/upload/post/thumbs/' . $data->gambar_kerusakan) ?>">

                        </div>



                        <div class="form-group">

                            <label for="gambar_koleksi">Bukti Kerusakan Kerusakan</label>

                            <div class="custom-file">

                                <input type="file" class="custom-file-input" id="gambar_kerusakan" name="gambar_kerusakan" required>

                                <label class="custom-file-label" for="customFile">Choose file</label>

                            </div>

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

<!-- end Modal Update Gambar Pemeriksaan -->



<?php foreach ($pemeriksaan as $per) : ?>

    <div class="modal fade" id="ModalHapus<?= $per->id_pemeriksaan; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Hapus Pemeriksaan</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <div class="alert alert-danger" role="alert">

                        <h4 class="alert-heading">Anda yakin ?</h4>

                        <p>Jika anda menghapus Pemeriksaan maka data dari koleksi tersebut terhapus dari sistem !!. Jika ada kesalahan dan perlu di ubah maka lakukan update data dengan mengklik tombol EDIT yang berwarna hijau !!</p>

                        <hr>

                        <p class="mb-0">Namun jika memang anda sudah yakin maka silahkan klik tombol Yakin !</p>

                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>

                        <a class="btn btn-danger" href="<?= base_url('Admin/deletePemeriksaan/' . $per->id_pemeriksaan) ?>">YAKIN !</a>

                    </div>

                </div>

            </div>

        </div>

    </div>

<?php endforeach ?>