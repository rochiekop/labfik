<main class="akun-container">
    <div class="fik-section-title2">
        <span class="fas fa-door-open zzzz"></span>
        <h5>Permintaan Listing Karya</h5>
    </div>
    <div class="input-group">
        <div class="input-group-append">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius:5px 0 0 5px">Prodi</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">DKV</a>
                <a class="dropdown-item" href="#">DI</a>
            </div>
        </div>
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
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"></th>
                    <th scope="col">Judul</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0;
                foreach ($tampilan as $l) : ?>
                    <tr>
                        <th scope="row"><?= ++$no ?></th>
                        <td style="width:90px">
                            <a class="img-wrapper" type="button" data-toggle="modal" data-target="#exampleModal<?= $l->id_tampilan ?>">
                                <?php if ($l->type == 'Foto') : ?>
                                    <img src="<?= base_url("assets/upload/images/" . $l->gambar) ?>" alt="<?= $l->judul ?>">
                                <?php else : ?>
                                    <video src="<?= base_url('assets/upload/images/' . $l->gambar) ?>" width="80"></video>
                                <?php endif; ?>
                            </a>
                        </td>
                        <td><?= $l->judul ?></td>
                        <td><?= $l->nama ?></td>
                        <td><?= $l->nama_kategori ?></td>
                        <td><?= $l->status ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
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
                    <?php else : ?>
                        <video controls style="margin:auto!important;background-color:#000;width:100%;max-height:624px;">
                            <source src="<?= base_url('assets/upload/images/' . $data->gambar) ?>" type="video/mp4">
                        </video>
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