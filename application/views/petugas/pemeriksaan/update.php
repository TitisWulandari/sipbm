<div class="card">
    <div class="card-header">
        Edit Data Pemeriksaan
    </div>
    <div class="card-body">
        <form action="" method="POST">
            <div class="form-group">
                <label for="nama_koleksi">Nama Koleksi</label>
                <input type="text" class="form-control" id="nama_koleksi" name="nama_koleksi">
            </div>

         

            <div class="form-group">
                <label for="panjang_koleksi">Kondisi Kerusakan</label>
                <input type="text" class="form-control" id="panjang_koleksi" name="panjang_koleksi">
            </div>

            <div class="form-group">
                <label for="gambar_koleksi">Bukti Kerusakan</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="gambar_kerusakan" name="gambar_kerusakan">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>