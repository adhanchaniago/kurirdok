<div class="card">
    <div class="card-header d-flex">
        <h4 class="card-title">Daftar Pesanan</h4>
        <div class="ml-auto pull-right text-right">
            <?php if ($this->uri->segment(2) == 'pesananku'): ?>
                <button class="btn btn-primary" data-toggle="modal" data-target="#addOrder">
                    <i class="fa fa-plus"></i> Tambah
                </button>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Tujuan</th>
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
</div>

<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="detailLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailLabel">Detail Pengiriman</h5>
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

<div class="modal fade" id="addOrder" tabindex="-1" role="dialog" aria-labelledby="addOrderLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('pengiriman/store') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="addOrderLabel">Tambah Pesanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control" placeholder="Isi judul pengiriman" required>
                    </div>
                    <div class="form-group">
                        <label for="tujuan">Tujuan</label>
                        <textarea name="tujuan" id="tujuan" cols="30" rows="5" class="form-control" placeholder="Masukan Tujuan" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="note">Keterangan</label>
                        <textarea name="note" id="" cols="30" rows="5" class="form-control" placeholder="Masukan Keterangan"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
