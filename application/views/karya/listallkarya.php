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
                    <th scope="col" style="width:110px;text-align:center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0;
                foreach ($tampilan as $l) : ?>
                    <tr>
                        <th scope="row"><?= ++$no ?></th>
                        <td style="width:90px">
                            <div class="img-wrapper">
                                <a href="<?= base_url("assets/upload/images/" . $l->gambar) ?>" data-toggle="lightbox">
                                    <img src="<?= base_url("assets/upload/images/" . $l->gambar) ?>" alt="<?= $l->judul ?>">
                                </a>
                            </div>
                        </td>
                        <td><?= $l->judul ?></td>
                        <td><?= $l->name ?></td>
                        <td><?= $l->nama_kategori ?></td>
                        <td><?= $l->status ?></td>
                        <?php if ($l->status == 'Menunggu Acc') : ?>
                            <td class="action" style="width:130px;text-align:center;">
                                <a href="<?= base_url('kaur_karya/accepted/') . $l->id_tampilan; ?>" class="btn badge badge-success">Acc</a>
                                <a href="<?= base_url('kaur_karya/Declined/') . $l->id_tampilan; ?>" class="btn badge badge-danger" onclick="return confirm('yakin ingin menolak data ini?')">Tolak</a>
                            </td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

<script>
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
            alwaysShowClose: true,
        });
    });
</script>