<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <th>No</th>
                <th>Pengirim</th>
                <th>File</th>
                <th>Catatan</th>
                <th>Status</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php if (!$pengiriman): ?>
                    <td colspan="6">No data</td>
                <?php else: ?>
                    <?php foreach ($pengiriman as $i => $p): ?>
                        <tr>
                            <td><?= ($i+1) ?></td>
                            <td><?= @$p->pengirim ?></td>
                            <td><?= $p->filename ?></td>
                            <td><?= $p->note ?></td>
                            <td>
                                <?php if ($p->status == 'Selesai'): ?>
                                    <span class="badge badge-success">Pengiriman Selesai</span>
                                <?php elseif ($p->status == 'Kirim'): ?>
                                    <span class="badge badge-info">Sedang Dikirim ...</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($p->status == 'Kirim'): ?>
                                    <a href="<?= base_url('pengiriman/finish/' . $p->pengiriman_id) ?>" class="btn btn-success btn-sm">
                                        <i class="fas fa-check"></i>
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>