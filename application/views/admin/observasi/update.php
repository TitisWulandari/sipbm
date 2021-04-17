<div class="card">
    <div class="card-header">
        Edit Data Observasi
    </div>
    <div class="card-body">
        <form action="" method="POST">
            <div class="form-group">
                <label for="id_koleksi">Nama koleksi</label>
                <select class="form-control" id="id_koleksi" name="id_koleksi">
                    <option disabled>-- pilih koleksi --</option>
                    <option value="admin">Foto</option>
                    <option value="pihak_pusat">Minatur Pesawat</option>
                </select>
            </div>

            <div class="form-group">
                <label for="keadaan_observasi_koleksi">Keadaan Koleksi</label>
                <input type="text" class="form-control" id="keadaan_observasi_koleksi" name="keadaan_observasi_koleksi">
            </div>

            <div class="form-group">
                <label for="time_create_observasi">Tanggal Observasi</label>
                <input type="date" class="form-control" id="time_create_observasi" name="time_create_observasi">
            </div>

            <div class="form-group">
                <label for="level">Rekomendasi</label>
                <select class="form-control" id="level">
                    <option disabled>-- pilih koleksi --</option>
                    <option value="admin">Perawatan</option>
                    <option value="pihak_pusat">Belum Rekomendasi</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>