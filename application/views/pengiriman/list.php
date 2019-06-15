<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <th>No</th>
                <th>Pengirim</th>
                <th>Judul</th>
                <th>Tujuan</th>
                <th>Kurir</th>
                <th>Waktu</th>
                <th>Status</th>
            </thead>
            <tbody>
                <?php if (!$pengiriman): ?>
                    <td colspan="8">No data</td>
                <?php else: ?>
                    <?php foreach ($pengiriman as $i => $p): ?>
                        <tr>
                            <td><?= ($i+1) ?></td>
                            <td><?= $pegawai[$p->pengirim] ?></td>
                            <td><?= $p->judul ?></td>
                            <td><?= $p->tujuan ?></td>
                            <td><?= @$p->kurir ? $p->kurir : '-' ?></td>
                            <td><?= $p->created_at ?></td>
                            <td>
                                <?php if ($p->status == 'Tunggu'): ?>
                                    <span class="badge badge-warning">Menunggu Kurir</span>
                                <?php elseif ($p->status == 'Kirim'): ?>
                                    <span class="badge badge-info">Sedang Dikirim ...</span>
                                <?php elseif ($p->status == 'Selesai'): ?>
                                    <span class="badge badge-success">Selesai</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>