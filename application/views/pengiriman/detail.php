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
    <tr>
        <td>Status</td>
        <td>:</td>
        <td><?= $pengiriman->status ?></td>
    </tr>
    <?php if ($pengiriman->status == 'Selesai'): ?>
    <tr>
        <td>Struk</td>
        <td>:</td>
        <td>
            <?php if ($pengiriman->upload_struk == ''): ?>
                Tidak Ada Struk
            <?php else: ?>
                <?php
                    $arr_struk = json_decode($pengiriman->upload_struk);
                    for ($i=0; $i < count($arr_struk); $i++) { 
                        echo '<img src="' . base_url('uploads/struk/' . $arr_struk[$i]) . '" alt="" class="float-left m-2" style="width: 150px">';
                    }
                ?>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td>Bukti Terima</td>
        <td>:</td>
        <td>
            <img src="<?= base_url('uploads/struk/' . $pengiriman->upload_bukti) ?>" alt="" style="width: 500px">
        </td>
    </tr>
    <?php elseif ($pengiriman->status == 'Batal'): ?>
    <tr>
        <td>Keterangan</td>
        <td>:</td>
        <td>
            <?= $pengiriman->berita ?>
        </td>
    </tr>
    <?php endif; ?>
</table>

<?php if(is_level('Kurir') && $pengiriman->status == 'Tunggu'): ?>
    <a href="<?= base_url('pengiriman/accept/' . $pengiriman->pengiriman_id) ?>" class="btn btn-primary">Ambil Dokumen</a>
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
