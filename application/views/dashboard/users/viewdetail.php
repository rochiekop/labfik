<!-- Main Container -->
<main class="akun-container">

    <div class="fik-section-title2">
        <h4>
            <?= $title ?>
        </h4>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <br>
    Nama &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?= $mhs['name'] ?> <br>
    NIM &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?= $mhs['nim'] ?> <br>
    Prodi &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?= $mhs['prodi'] ?><br>
    Kosentrasi &nbsp&nbsp: <?= $mhs['peminatan'] ?> <br>
    Tahun &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?= $mhs['tahun'] ?>
    <br>
    <br>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" style="width:30px"></th>
                    <th scope="col">Nama File</th>
                    <th scope="col">File</th>
                    <th scope="col">Lihat</th>
                    <th scope="col">Action</th>
                    <th scope="col">Status</th>
                    <th scope="col">Alasan</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($pta)) : ?>
                    <td colspan="7" style="background-color: whitesmoke;text-align:center">Daftar permintaan TA</td>
                <?php else : ?>
                    <?php $no = 0;
                    foreach ($pta as $t) : ?>
                        <input type="hidden" id="id" value="<?= $t['id'] ?>">
                        <tr>
                            <th scope="row"><?= ++$no ?></th>
                            <td></td>
                            <td><?= $t['nama'] ?></td>
                            <td> <a href="<?= base_url('assets/upload/thesis/') . $t['username'] . '/' . $t['file'] ?>" download title="Download File"><?= $t['file'] ?></a></td>
                            <td><a data-toggle="modal" data-target="#pdf<?= encrypt_url($t['id']); ?>" class="btn badge badge-secondary" id="view" style="color: white;">Lihat</a></td>
                            <?php if ($t['status_doswal'] == "Dikirim" or $t['status_doswal'] == "Update") : ?>
                                <?php if ($t['view_doswal'] != "Belum Dilihat") : ?>
                                    <td id="action"> <a href="<?= base_url('users/acckoorta/') . encrypt_url($t['id']) ?>" class="btn badge badge-success">Acc</a>
                                        <a data-toggle="modal" data-target="#<?= encrypt_url($t['id']); ?>" class="btn badge badge-danger" style="color: white;">Tolak</a>
                                    </td>
                                    <td><b>Dilihat</b></td>
                                    <td></td>
                                <?php else : ?>
                                    <td></td>
                                    <td><b>Belum Dilihat</b></td>
                                    <td></td>
                                <?php endif; ?>
                            <?php elseif ($t['status_doswal'] == "Disetujui koor" or $t['status_doswal'] == "Ditolak wali" or $t['status_doswal'] == "Disetujui wali") :  ?>
                                <td></td>
                                <td><b>Acc</b></td>
                                <td></td>
                            <?php elseif ($t['status_doswal'] == "Ditolak koor") : ?>
                                <td><a data-toggle="modal" data-target="#komen<?= encrypt_url($t['id']); ?>" class="badge badge-warning" style="color:white">Beri Tanggapan</a></td>
                                <td><b>Tolak</b></td>
                                <td><?= $t['komentar'] ?></td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>
<!-- End Main Container -->
<script>
    $("#view").click(function() {
        var id = $('#id').val()
        if (id != "") {
            $.ajax({
                url: '<?= base_url('users/updateviewdoswal') ?>',
                method: "POST",
                data: {
                    id: id,
                },
                success: function(data) {}
            });
        } else {
            alert('Data Tidak Ada')
        }
    });
    onclick = "javascript:window.location.reload()"
    // $('.testing').on('hidden.bs.modal', function() {
    //     location.reload();
    // })
</script>
<!-- Modal Tolak Permintaan -->
<?php foreach ($pta as $t) : ?>

    <div class="modal fade" id="pdf<?= encrypt_url($t['id']); ?>" class="testing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= $t['nama'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="javascript:window.location.reload()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <embed src="<?= base_url('assets/upload/thesis/') . $t['username'] . "/" . $t['file'] ?>" type="application/pdf" width="100%" height="650px" />
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="komen<?= encrypt_url($t['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?= base_url('users/komentarta/') . encrypt_url($t['id']); ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Beri Komentar disini</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <textarea name="komentar" id="komentar" cols="46" rows="5"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-sm" id="<?= encrypt_url($t['id']) ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    Tolak Surat Pernyataan TA ?
                </div>
                <form action="<?= base_url('users/tolakpermintaankoor/') . encrypt_url($t['id']); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-footer">
                        <input type="hidden" id="id" name="id" value="<?= $t['id']; ?>">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" name="deletedata" class="btn btn-danger btn-sm">Tolak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script src="https://cdn.tiny.cloud/1/q9tneu2aax9fp91cvqlh7mqvx44p6ph4jb63xq6lax2ybita/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        toolbar: 'save restoredraft',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        // he
    });
</script>