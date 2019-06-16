<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th>No</th>
                    <th>Pengirim</th>
                    <th>Judul</th>
                    <th>Tujuan</th>
                    <th>Kurir</th>
                    <th>Waktu</th>
                    <th>Status</th>
                    <th>Aksi</th>
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
                                <td>
                                    <button class="btn btn-primary btn-sm accept" data-pesanan="<?= $p->pengiriman_id ?>" data-toggle="modal" data-target="#detail">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" role="document ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Dokumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true ">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="detail-pesanan"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
