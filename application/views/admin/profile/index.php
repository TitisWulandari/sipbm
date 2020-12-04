<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
    </ol>
</nav>

<div class="row">
    <div class="col-sm-7">
        <?= $this->session->flashdata('message'); ?>
        <div class="card">
            <div class="card-header">
                Form Edit Profile
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/profile') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $users["name"]; ?>">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= $users["email"]; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="telepon_users">Telepon Users</label>
                        <input type="text" class="form-control" id="telepon_users" name="telepon_users" value="<?= $users["telepon_users"]; ?>">
                        <?= form_error('telepon_users', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="alamat_users">Alamat</label>
                        <textarea type="text" class="form-control" id="alamat_users" name="alamat_users"><?= $users["alamat_users"]; ?></textarea>
                        <?= form_error('alamat_users', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/img/users/' . $users["gambar_users"]); ?>" alt="" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <label for="gambar_users">Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="gambar_users" name="gambar_users">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>