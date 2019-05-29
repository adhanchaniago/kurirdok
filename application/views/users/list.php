<div class="card">
    <div class="card-header d-flex">
        <h3 class="card-title">Daftar <?= ucfirst($level) ?></h3>
        <div class="ml-auto text-right">
            <a href="<?= base_url($level . '/add') ?>" class="btn btn-info btn-sm">Tambah</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Foto</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php if (!$users): ?>
                    <td colspan="5">No data</td>
                <?php else: ?>
                    <?php foreach ($users as $i => $user): ?>
                        <tr>
                            <td><?= ($i+1) ?></td>
                            <td><?= $user->nama ?></td>
                            <td><?= $user->username ?></td>
                            <td><img src="<?= base_url('uploads/foto/' . $user->foto) ?>" alt="<?= $user->foto ?>" width="100px"></td>
                            <td>
                                <a href="<?= base_url($level . '/edit/' . $user->user_id) ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="Edit">
                                    <i class="mdi mdi-pencil"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>