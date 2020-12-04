<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Beranda</li>
    </ol>
</nav>


<div class="card">
    <?php foreach ($abouts as $about) : ?>
    <h3 class="text-center mb-4 mt-3"><?= $about["nama_museum"] ?></h3>
    <div class="row justify-content-center">
        <div class="col-sm-3">
            <img src="<?= base_url('assets/img/abouts/' . $about["gambar_museum"]); ?>" alt="" class="img-thumbnail">
        </div>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-sm-11">
            
            <p class="mt-5 mb-5"><?= $about["deskripsi_museum"]; ?></p>
        </div>
        <a href="<?= base_url('admin/update_about/' . $about["id_about_museum"]); ?>" class="btn btn-primary mb-4" style="width: 200px;">Update About</a>
    </div>
    <?php endforeach; ?>
</div>