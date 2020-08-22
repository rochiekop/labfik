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
    </div>
    <div class="table-responsive admin-list">
        <table class="table">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" style="width:48px">NO</th>
                        <th scope="col" style="width:90px">&nbsp;</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Tanggal Post</th>
                        <th scope="col">Views</th>
                        <th scope="col">status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($tampilan)) : ?>
                        <td colspan="8" style="background-color: whitesmoke;text-align:center">List Karya Kosong</td>
                    <?php else : ?>
                        <?php $no = 1;
                        foreach ($tampilan as $data) { ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td>
                                    <a class="img-wrapper" type="button" data-toggle="modal" data-target="#exampleModal<?= $data->id_tampilan ?>">
                                        <?php if ($data->type == 'Foto') : ?>
                                            <img src="<?= base_url('assets/upload/images/' . $data->gambar) ?>">
                                        <?php elseif ($data->type == 'Video') : ?>
                                            <video src="<?= base_url('assets/upload/images/' . $data->gambar) ?>" width="80"></video>
                                        <?php else : ?>
                                            <span class="fas fa-file-pdf fa-4x"></span>
                                        <?php endif; ?>
                                    </a>
                                </td>
                                <td><?= $data->nama ?></td>
                                <td><?= $data->nama_kategori ?></td>
                                <td><?= $data->tanggal_post ?></td>
                                <td><?= $data->views ?></td>
                                <td><?= $data->status ?></td>
                                <td>
                                    <a href="<?= base_url('karya/edit/' . $data->id_tampilan) ?>"><span class="fas fa-edit"></span></a>
                                    <a href="<?= base_url('karya/deletebydsn/' . $data->id_tampilan); ?>" onclick="return confirm('yakin ingin menghapus data ini?')"><span class="fas fa-trash"></span></a>
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
</main>
<?php foreach ($tampilan as $data) : ?>
    <div class="modal fade" id="exampleModal<?= $data->id_tampilan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Judul <?= $data->judul ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php if ($data->type == 'Foto') : ?>
                        <img src="<?= base_url('assets/upload/images/' . $data->gambar) ?>" style="margin:auto!important;background-color:#000;width:100%;max-height:624px;">
                    <?php elseif ($data->type == 'Video') : ?>
                        <video controls style="margin:auto!important;background-color:#000;width:100%;max-height:624px;">
                            <source src="<?= base_url('assets/upload/images/' . $data->gambar) ?>" type="video/mp4">
                        </video>
                    <?php else : ?>
                        <embed src="<?= base_url('assets/upload/images/' . $data->gambar) ?>" type="application/pdf" width="100%" height="600px" />
                    <?php endif; ?>
                    <div class="item-text">
                        <span>Di Buat Oleh: <b><?= $data->nama ?></b></span>
                    </div>
                    <div class="item-text">
                        <span>Di Posting Oleh: <b><?= $data->name ?></b></span>
                    </div>
                    <div class="item-text">
                        <span>Deskripsi: <b><?= $data->deskripsi ?></b></span>
                    </div>
                    <div class="item-text">
                        <span>No. Handphone: <b><?= $data->No_hp ?></b></span>
                    </div>
                    <div class="item-text">
                        <span>No. Whatsapp: <b><?= $data->No_wa ?></b></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>