<!-- Begin Page Content -->
<main class="akun-container">
    <div class="container-fluid">
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
            <a class="btn btn-primary" href="<?= base_url('sub_kategori/tambah') ?>" style="margin-left: 20px;"><span class="fas fa-fw fa-plus"></span> Kategori </a>
        </div>
        <div class="table-responsive admin-list">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">Nama</th>
                        <th scope="col">prodi</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($kategori as $data) { ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $data->nama_child ?></td>
                            <td><?= $data->nama_kategori ?></td>
                            <td>
                                <a href="<?= base_url('sub_kategori/edit/' . $data->id_ck); ?>"><span class="fa fa-edit"></span></a>
                                <a href="<?= base_url('sub_kategori/delete/' . $data->id_ck); ?>" onclick="return confirm('yakin ingin menghapus data ini?')"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<!-- End of Content Wrapper -->