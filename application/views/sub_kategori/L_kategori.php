<!-- Begin Page Content -->
<main class="akun-container">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        </div>

        <p>
            <a href="<?= base_url('sub_kategori/tambah') ?>" class="btn btn-success btn-lg">
                <i class="fa fa-plus"></i> Tambah Baru
            </a>
        </p>

        <table class="table table-striped">
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
                            <a href="<?= base_url('sub_kategori/edit/' . $data->id_ck); ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>
                            <a href="<?= base_url('sub_kategori/delete/' . $data->id_ck); ?>" class="btn btn-danger btn-xs" onclick="return confirm('yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i>hapus</a>
                        </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>

    </div>
</main>
<!-- End of Content Wrapper -->