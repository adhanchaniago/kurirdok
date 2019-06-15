<div class="card">
    <form action="<?= base_url($level . '/store') ?>" method="post">
        <div class="card-header d-flex">
            <h3 class="text-title">Tambah <?= ucfirst($level) ?></h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Lengkap" required>
                <input type="hidden" name="level" value="<?= $level ?>">
            </div>
            <?php if ($this->uri->segment(1) == 'pegawai'): ?>
            <div class="row">
                <div class="col-md-6 col-sm-12 form-group">
                    <label for="divisi">Divisi</label>
                    <input type="text" name="divisi" id="divisi" class="form-control" placeholder="Masukan Divisi">
                </div>
                <div class="col-md-6 col-sm-12 form-group">
                    <label for="ruangan">Ruangan</label>
                    <input type="text" name="ruangan" id="ruangan" class="form-control" placeholder="Masukan Ruangan">
                </div>
            </div>
            <?php elseif ($this->uri->segment(1) == 'kurir'): ?>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <label for="telp">Telp</label>
                    <input type="text" name="telp" id="telp" class="form-control" placeholder="Masukan telp">
                </div>
            </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-6 col-sm-12 form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Masukan Username" required>
                </div>
                <div class="col-md-6 col-sm-12 form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password" required>
                </div>
            </div>
        </div>
        <div class="card-footer"><input type="submit" value="Simpan" class="btn btn-primary"></div>
    </form>
</div>