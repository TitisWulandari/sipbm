<div class="card">
    <div class="card-header">
        Edit Data User
    </div>
    <div class="card-body">
        <form action="" method="POST">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" placeholder="Masukan nama user">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Masukan email user">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Masukan password user">
            </div>

            <div class="form-group">
                <label for="level">Level</label>
                <select class="form-control" id="level">
                    <option value="admin">Admin</option>
                    <option value="pihak_pusat">Pihak Pusat</option>
                    <option value="pengelola">Pengelola</option>
                    <option value="petugas_perawatan">Petugas Perawatan</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>