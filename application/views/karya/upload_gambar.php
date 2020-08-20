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
        <a class="btn btn-primary" href="<?= base_url('karya/tambahbymhs') ?>" style="margin-left: 20px;"><span class="fas fa-fw fa-plus"></span> karya </a>
    </div>
    <div class="table-responsive admin-list">
        <table class="table">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" style="width:48px">NO</th>
                        <th scope="col" style="width:90px">&nbsp;</th>
                        <th scope="col">Nim</th>
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
                                    <a type="button" href="<?= base_url("assets/upload/images/" . $data->gambar) ?>" data-toggle="lightbox">
                                        <?php if ($data->type == 'Foto') : ?>
                                            <img src="<?= base_url('assets/upload/images/' . $data->gambar) ?>" class="img img-responsive img-thumbnail" width="60">
                                        <?php else : ?>
                                            <video src="<?= base_url('assets/upload/images/' . $data->gambar) ?>" class="img img-responsive img-thumbnail" width="60">
                                            <?php endif; ?>
                                    </a>
                                </td>
                                <td><?= $data->nim ?></td>
                                <td><?= $data->nama_kategori ?></td>
                                <td><?= $data->tanggal_post ?></td>
                                <td><?= $data->views ?></td>
                                <td><?= $data->status ?></td>
                                <td>
                                    <a href="<?= base_url('karya/deletebymhs/' . $data->id_tampilan); ?>" onclick="return confirm('yakin ingin menghapus data ini?')"><span class="fas fa-trash"></span></a>
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
<script>
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
            alwaysShowClose: true,
        });
    });
</script>