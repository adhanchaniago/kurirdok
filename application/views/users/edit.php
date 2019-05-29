<div class="card">
    <form action="<?= base_url($level . '/update') ?>" method="post">
        <div class="card-header d-flex">
            <h3 class="text-title">Edit <?= ucfirst($level) ?></h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" value="<?= $user->nama ?>" class="form-control" placeholder="Masukan Nama Lengkap">
                <input type="hidden" name="user_id" value="<?= $user->user_id ?>">
                <input type="hidden" name="level" value="<?= $user->level ?>">
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12 form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?= $user->username ?>" class="form-control" placeholder="Masukan Username">
                </div>
                <div class="col-md-6 col-sm-12 form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password">
                </div>
            </div>
        </div>
        <div class="card-footer"><input type="submit" value="Simpan" class="btn btn-primary"></div>
    </form>
</div>