<table class="table table-striped">
    <tr>
        <td>Judul</td>
        <td>:</td>
        <td><?= $pengiriman->judul ?></td>
    </tr>
    <tr>
        <td>Pengirim</td>
        <td>:</td>
        <td>
            <?= $pengiriman->pengirim ?> <br> 
            Divisi: <?= $pengiriman->p_divisi ?> <br>
            Ruangan: <?= $pengiriman->p_ruangan ?>
        </td>
    </tr>
    <tr>
        <td>Tujuan</td>
        <td>:</td>
        <td><?= $pengiriman->tujuan ?></td>
    </tr>
    <?php if(is_level(['Admin', 'Pegawai'])): ?>
        <tr>
            <td>Kurir</td>
            <td>:</td>
            <td><?= $pengiriman->kurir ?></td>
        </tr>
    <?php endif; ?>
    <tr>
        <td>Catatan</td>
        <td>:</td>
        <td><?= $pengiriman->note ?></td>
    </tr>
</table>

<?php if(is_level('Kurir') && $pengiriman->status == 'Tunggu'): ?>
    <a href="<?= base_url('pengiriman/accept/' . $pengiriman->pengiriman_id) ?>" class="btn btn-primary">Kirim Dokumen</a>
<?php else: ?>
    <ul>
        <?php foreach ($log as $l): ?>
            <li>
                <div class="card border-primary rounded">
                    <div class="card-body p-1">
                        <h6><?= date('D-F-Y H:i:s', strtotime($l->time)) ?></h6>
                        <p><?= $l->keterangan ?></p>
                    </div>
                </div>
                <hr>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
