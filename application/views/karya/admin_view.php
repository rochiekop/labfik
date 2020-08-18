<!-- Begin Page Content -->
<main class="akun-container">
    <!-- Page Heading -->
    <div class="fik-section-title2">
        <span class="fas fa-door-open zzzz"></span>
        <h5><?= $title ?></h5>
    </div>
    <div class="input-group">
        <div class="input-group-append">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-left:1px solid rgba(0,0,0,.1);">Urutkan</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">A-Z</a>
                <a class="dropdown-item" href="#">Terbaru</a>
            </div>
        </div>
        <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Pencarian">
        <a class="btn btn-primary" href="<?= base_url('admin_karya/tambah'); ?>" style="margin-left: 20px;"><span class="fas fa-fw fa-plus"></span> karya </a>
    </div>
    <div class="table-responsive admin-list">
        <table class="table">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" style="width:48px">NO</th>
                        <th scope="col" style="width:90px">&nbsp;</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Role</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Tanggal Post</th>
                        <th scope="col">Views</th>
                        <th scope="col">status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($tampilan)) : ?>
                        <td colspan="6" style="background-color: whitesmoke;text-align:center">List Karya Kosong</td>
                    <?php else : ?>
                        <?php $no = 1;
                        foreach ($tampilan as $data) { ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td>
                                    <a type="button" data-toggle="modal" data-target="#exampleModal">
                                        <?php if ($data->type == 'Foto') : ?>
                                            <img src="<?= base_url('assets/upload/images/' . $data->gambar) ?>" class="img img-responsive img-thumbnail" width="60">
                                        <?php else : ?>
                                            <video src="<?= base_url('assets/upload/images/' . $data->gambar) ?>" class="img img-responsive img-thumbnail" width="60">
                                            </video>
                                        <?php endif; ?>
                                    </a>
                                </td>
                                <td><?= $data->nama ?></td>
                                <td><?= $data->role ?></td>
                                <td><?= $data->nama_kategori ?></td>
                                <td><?= $data->tanggal_post ?></td>
                                <td><?= $data->views ?></td>
                                <td><?= $data->status ?></td>
                                <td>
                                    <a href="<?= base_url('admin_karya/edit/' . $data->id_tampilan) ?>"><span class="fas fa-edit"></span></a>
                                    <a href="<?= base_url('admin_karya/delete/' . $data->id_tampilan); ?>" onclick="return confirm('yakin ingin menghapus data ini?')"><span class="fas fa-trash"></span></a>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </table>
    </div>
    <!-- End of Content Wrapper -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</main>