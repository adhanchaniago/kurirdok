<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <th>No</th>
                <th>Pengirim</th>
                <th>Judul</th>
                <th>Tujuan</th>
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
                            <td><?= $p->judul ?></td>
                            <td><?= $p->tujuan ?></td>
                            <td>
                                <?php if ($p->status == 'Selesai'): ?>
                                    <span class="badge badge-success">Pengiriman Selesai</span>
                                <?php elseif ($p->status == 'Kirim'): ?>
                                    <span class="badge badge-info">Sedang Dikirim ...</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($p->status == 'Kirim'): ?>
                                    <button class="btn btn-info btn-sm upload-struk" data-toggle="modal" data-target="#uploadStruk" data-id="<?= $p->pengiriman_id ?>">
                                        <i class="fa fa-upload" data-toggle="tooltip" data-placement="top" title="Upload Struk"></i>
                                    </button>
                                    <button class="btn btn-success btn-sm upload-bukti" data-toggle="modal" data-target="#uploadBukti" data-id="<?= $p->pengiriman_id ?>">
                                        <i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Tandai Selesai"></i>
                                    </button>
                                    <!-- <a href="<?= base_url('pengiriman/finish/' . $p->pengiriman_id) ?>" class="btn btn-success btn-sm">
                                        <i class="fas fa-check"></i>
                                    </a> -->
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="uploadStruk" tabindex="-1" role="dialog" aria-labelledby="uploadStrukLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('pengiriman/uploadStruk') ?>" enctype="multipart/form-data" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadStrukLabel">Upload Struk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul">Masukan File</label>
                        <input type="hidden" name="pengiriman_id" class="upload-id-pengiriman">
                        <input type="file" name="struk[]" class="form-control" accept="image/*" multiple required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="uploadBukti" tabindex="-1" role="dialog" aria-labelledby="uploadBuktiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('pengiriman/finish') ?>" enctype="multipart/form-data" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadBuktiLabel">Upload Bukti</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul">Masukan File</label>
                        <input type="hidden" name="pengiriman_id" class="upload-id-pengiriman">
                        <input type="file" name="bukti" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Selesai</button>
                </div>
            </form>
        </div>
    </div>
</div>
