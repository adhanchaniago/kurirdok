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
                <?php if (!$pesanan): ?>
                    <td colspan="6">No data</td>
                <?php else: ?>
                    <?php foreach ($pesanan as $i => $p): ?>
                        <tr>
                            <td><?= ($i+1) ?></td>
                            <td><?= @$p->pengirim ?></td>
                            <td><?= $p->filename ?></td>
                            <td><?= $p->note ?></td>
                            <td>
                                <?php if ($p->status == 'Tunggu'): ?>
                                    <span class="badge badge-warning">Menunggu Kurir</span>
                                <?php elseif ($p->status == 'Kirim'): ?>
                                    <span class="badge badge-info">Sedang Dikirim ...</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($p->status == 'Tunggu'): ?>
                                    <a href="javascript:void(0)" class="btn btn-success btn-sm accept" data-pesanan="<?= $p->pengiriman_id ?>" data-file="<?= $p->file_path ?>" data-toggle="modal" data-target="#accept">
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

<div class="modal fade" id="accept" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Download dan Kirim Dokumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true ">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Download Dokumen : </h4>
                <a href="" class="btn btn-success" id="file-download" target="__blank" download>Download</a> <br><br>
                <h4>Kirim Dokumen : </h4>
                <a href="" class="btn btn-primary" id="sending">Kirim Dokumen</a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
