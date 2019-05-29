<table class="table table-striped">
    <tr>
        <td>File</td>
        <td>:</td>
        <td><?= $pengiriman->filename ?></td>
    </tr>
    <tr>
        <td>Kurir</td>
        <td>:</td>
        <td><?= $pengiriman->nama ?></td>
    </tr>
    <tr>
        <td>Catatan</td>
        <td>:</td>
        <td><?= $pengiriman->note ?></td>
    </tr>
</table>

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
