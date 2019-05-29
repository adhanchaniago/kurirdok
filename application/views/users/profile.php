<div class="row">
    <div class="col-md-3 col-sm-12">
        <div class="card">
            <form action="<?= base_url('users/upload_foto') ?>" method="post" enctype="multipart/form-data">
                <div class="card-header">
                    <h3 class="card-title">Foto Profile</h3>
                </div>
                <div class="card-body">
                    <div class="w-75 mx-auto">
                        <img src="<?= base_url('uploads/foto/' . $this->session->foto) ?>" alt="">
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
    <div class="col-md-9 col-sm-12">
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