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
                    <td><a type="button" data-toggle="modal" data-target="#exampleModal"><img src="<?= base_url('assets/upload/images/' . $data->gambar) ?>" class="img img-responsive img-thumbnail" width="60"></a></td>
                    <td><?= $data->nama_child ?></td>
                    <td><?= $data->tanggal_post ?></td>
                    <td><?= $data->views ?></td>
                    <td>
                        <a href="<?= base_url('karya/edit/' . $data->id_tampilan) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>
                        <a href="<?= base_url('karya/delete/' . $data->id_tampilan); ?>" class="btn btn-danger btn-xs" onclick="return confirm('yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i>hapus</a>
                    </td>
                </tr>
            <?php $no++;
            } ?>
        </tbody>
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
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>