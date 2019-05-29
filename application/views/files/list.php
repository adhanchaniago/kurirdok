<div class="card">
    <div class="card-header d-flex">
        <h3 class="card-title">
            File <?= is_level('Pegawai') ? $this->session->nama : '' ?>
        </h3>
        <?php if (is_level('Pegawai')): ?>
            <div class="ml-auto text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                    <i class="mdi mdi-plus"></i> Tambah
                </button>
            </div>
        <?php endif; ?>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <th>No</th>
                <th>Nama File</th>
                <?php if (is_level('Admin')): ?>
                    <th>Author</th>
                <?php endif; ?>
                <th>Aksi</th>
            </thead>
            <tbody id="data-file">
                <?php if (!$files): ?>
                    <tr>
                        <td colspan="<?= is_level('admin') ? 4 : 5; ?>">No data</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($files as $i => $file): ?>
                        <tr>
                            <td><?= @$n = ($i+1) ?></td>
                            <td><?= $file->filename ?></td>
                            <?php if (is_level('Admin')): ?>
                                <td><?= $file->author ?></td>
                            <?php endif; ?>
                            <td>
                                <?php if (is_level('Admin')): ?>
                                    <a href="<?= base_url($file->file_path) ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="Download" download>
                                        <i class="mdi mdi-download"></i>
                                    </a>
                                <?php elseif (is_level('Pegawai')): ?>
                                    <button type="button" class="btn btn-success btn-sm margin-5 send-file" data-file="<?= $file->file_id ?>" data-toggle="modal" data-target="#send">
                                        <i class="mdi mdi-share"></i>
                                    </button>
                                    <a href="<?= base_url('file/destroy/' . $file->file_id) ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="Hapus" onclick="return confirm('Hapus File?')">
                                        <i class="fa fa-trash"></i>
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

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document ">
        <div class="modal-content">
            <form id="upload-file" action="<?= base_url('file/store') ?>" method="post" enctype="multipart/form-data" onsubmit="return false">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true ">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="filename">Nama File</label>
                        <input type="text" name="filename" id="filename" class="form-control" placeholder="Masukan Nama File" reqiured>
                    </div>
                    <div class="form-group">
                        <label for="file">File</label>
                        <input type="file" name="file" id="file" class="form-control" placeholder="Pilih File" reqiured>
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

<div class="modal fade" id="send" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document ">
        <div class="modal-content">
            <form action="<?= base_url('pengiriman/store') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kirim File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true ">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="note">Catatan</label>
                        <textarea name="note" id="note" cols="30" rows="10" class="form-control" required></textarea>
                        <input type="hidden" name="file" id="file-send">
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
