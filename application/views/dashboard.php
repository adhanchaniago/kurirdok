<?php if (@$pesanan): ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Pesanan</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <?php foreach ($pesanan as $p): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-dark p-10 text-white text-center">
                            <i class="fa fa-file m-b-5 font-16"></i>
                            <h5 class="m-b-0 m-t-5"><?= $p->filename ?></h5>
                            <?php if ($p->status !== 'Tunggu' && $this->session->level == 'Pegawai'): ?>
                                <small class="font-light"><?= $p->kurir ?></small>
                            <?php elseif ($p->status == 'Tunggu' && $this->session->level == 'Pegawai'): ?>
                                <span class="badge badge-warning mt-2">Menunggu Kurir</span>
                            <?php elseif ($this->session->level !== 'Pegawai'): ?>
                                <small class="font-light"><?= $p->pengirim ?></small>
                            <?php endif; ?>
                            <?php if ($this->session->level == 'Kurir'): ?>
                                <button class="btn btn-primary btn-block btn-xs mt-2 accept" data-pesanan="<?= $p->pengiriman_id ?>" data-file="<?= $p->file_path ?>" data-note="<?= $p->note ?>" data-toggle="modal" data-target="#accept">
                                    <i class="fas fa-check"></i>
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="modal fade" id="accept" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Dokumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true ">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Catatan :</h4>
                <p id="note"></p>
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
