<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <th>No</th>
                <th>File</th>
                <th>Catatan</th>
                <th>Kurir</th>
                <th>Waktu</th>
                <th>Status</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php if (!$pesanan): ?>
                    <td colspan="7">No data</td>
                <?php else: ?>
                    <?php foreach ($pesanan as $i => $p): ?>
                        <tr>
                            <td><?= ($i+1) ?></td>
                            <td><?= $p->filename ?></td>
                            <td><?= $p->note ?></td>
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
                            <td>
                                <?php if ($p->status == 'Tunggu'): ?>
                                    <a href="<?= base_url('pengiriman/hapus_pesanan/' . $p->pengiriman_id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Batalkan pengiriman?')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                <?php elseif ($p->status == 'Selesai'): ?>
                                    <button class="detail-pesanan btn btn-primary btn-sm" data-pemesanan="<?= $p->pengiriman_id ?>" data-toggle="modal" data-target="#detail"><i class="fas fa-search"></i></button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Pengiriman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true ">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="detail-pemesanan"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
