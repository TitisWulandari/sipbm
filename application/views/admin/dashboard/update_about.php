<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Data About</li>
    </ol>
</nav>

<div class="card mt-4">
    <div class="card-header">
        Data About
    </div>
    <div class="card-body">
        <form action="<?= base_url('admin/update_about/' . $about["id_about_museum"]); ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_about_museum" value="<?= $about["id_about_museum"]; ?>">
            <div class="form-group">
                <label for="nama_museum">Nama Museum</label>
                <input type="text" id="nama_museum" name="nama_museum" class="form-control" value="<?= $about["nama_museum"]; ?>">
                <?= form_error('nama_museum', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="deskripsi_museum">Deskripsi Museum</label>
                <textarea type="text" id="deskripsi_museum" name="deskripsi_museum" class="form-control"><?= $about["deskripsi_museum"]; ?></textarea>
                <?= form_error('deskripsi_museum', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <img class="img-thumbnail" src="<?= base_url('assets/img/abouts/' . $about["gambar_museum"]) ?>" alt="">
                </div>
                <div class="col-sm-9">
                    <label for="gambar_museum"></label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="gambar_museum" name="gambar_museum">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
			<br>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>