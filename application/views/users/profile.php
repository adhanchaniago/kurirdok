<div class="row">
    <div class="col-md-4 col-sm-12">
        <div class="card">
            <form action="<?= base_url('users/upload_foto') ?>" method="post" enctype="multipart/form-data">
                <div class="card-header">
                    <h3 class="card-title">Foto Profile</h3>
                </div>
                <div class="card-body">
                    <div class="w-75 mx-auto">
                        <img src="<?= base_url('uploads/foto/' . $this->session->foto) ?>" alt="" class="w-100">
                    </div>
                    <div class="form-group">
                        <label for="foto">Ganti Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control" placeholder="Pilih File" required>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <input type="submit" value="Simpan" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-8 col-sm-12">
        <div class="card">
            <form action="<?= base_url('users/update') ?>" method="post">
                <div class="card-header">
                    <h3 class="card-title">Profile</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" value="<?= $user->nama ?>" id="nama" class="form-control" placeholder="Masukan Nama Lengkap" required>
                    </div>
                    <?php if (is_level('Pegawai')): ?>
                        <div class="form-group">
                            <label for="divisi">Divisi Pegawai</label>
                            <input type="text" name="divisi" value="<?= @$user->divisi ?>" id="divisi" class="form-control" placeholder="Masukan Divisi Pegawai" required>
                        </div>
                        <div class="form-group">
                            <label for="ruangan">Ruangan Pegawai</label>
                            <input type="text" name="ruangan" value="<?= @$user->ruangan ?>" id="ruangan" class="form-control" placeholder="Masukan Ruangan Pegawai" required>
                        </div>
                    <?php elseif (is_level('Kurir')): ?>
                        <div class="form-group">
                            <label for="telp">Telp Kurir</label>
                            <input type="text" name="telp" value="<?= @$user->telp ?>" id="telp" class="form-control" placeholder="Masukan Telp Kurir" required>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" value="<?= $user->username ?>" id="username" class="form-control" placeholder="Masukan Username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="************">
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="Simpan" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>