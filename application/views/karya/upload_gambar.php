<!-- Begin Page Content -->
<main class="akun-container">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">Nim</th>
                <th scope="col">Karya</th>
                <th scope="col">Kategori</th>
                <th scope="col">Tanggal Post</th>
                <th scope="col">Views</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($tampilan as $data) { ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $data->nim ?></td>
                    <td><a type="button" href="<?= base_url("assets/upload/images/" . $data->gambar) ?>" data-toggle="lightbox"><img src="<?= base_url('assets/upload/images/' . $data->gambar) ?>" class="img img-responsive img-thumbnail" width="60"></a></td>
                    <td><?= $data->nama_child ?></td>
                    <td><?= $data->tanggal_post ?></td>
                    <td><?= $data->views ?></td>
                    <td>
                        <a href="<?= base_url('karya/delete/' . $data->id_tampilan); ?>" class="btn btn-danger btn-xs" onclick="return confirm('yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i>hapus</a>
                    </td>
                </tr>
            <?php $no++;
            } ?>
        </tbody>
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