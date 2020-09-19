<!-- Main Container -->
<main class="akun-container">

    <div class="fik-section-title2">
        <h4>
            <?= $title ?>
        </h4>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <table>
        <thead>
            <th style="width: 60px;"></th>
            <th style="width: 10px;"></th>
            <th></th>
        </thead>
        <tbody>
            <tr>
                <td style="width: 20px;">Judul 1</td>
                <td>:</td>
                <td><?= $mhs['judul_1'] ?></td>
            </tr>
            <?php if ($mhs['judul_2'] != '') : ?>
                <tr>
                    <td style="width: 20px;">Judul 2</td>
                    <td>:</td>
                    <td><?= $mhs['judul_2'] ?></td>
                </tr>
            <?php elseif ($mhs['judul_3'] != '') : ?>
                <tr>
                    <td style="width: 20px;">Judul 3</td>
                    <td>:</td>
                    <td><?= $mhs['judul_3'] ?></td>
                </tr>
            <?php endif; ?>
            <tr>
                <td style="width: 20px;">Nama</td>
                <td>:</td>
                <td><?= $mhs['name'] ?></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td><?= $mhs['nim'] ?></td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td>:</td>
                <td><?= $mhs['prodi'] ?></td>
            </tr>
            <tr>
                <td>Kosentrasi</td>
                <td>:</td>
                <td><?= $mhs['peminatan'] ?></td>
            </tr>
            <tr>
                <td>No.Telp</td>
                <td>:</td>
                <td><?= $mhs['no_telp'] ?></td>
            </tr>
        </tbody>
    </table>
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
            <tbody id="showdata">
                <?php if (empty($pta)) : ?>
                    <td colspan="7" style="background-color: whitesmoke;text-align:center">Daftar permintaan TA</td>
                <?php else : ?>
                    <?php $no = 0;
                    foreach ($pta as $t) : ?>
                        <tr>
                            <th scope="row"><?= ++$no ?></th>
                            <td></td>
                            <td><?= $t['nama'] ?></td>
                            <td> <a href="<?= base_url('assets/upload/thesis/') . $t['username'] . '/' . $t['file'] ?>" download title="Download File"><?= $t['file'] ?></a></td>
                            <td><a data-toggle="modal" data-target="#pdf<?= encrypt_url($t['id']); ?>" id="view" class="btn badge badge-secondary" style="color: white;">Lihat</a></td>
                            <?php if ($t['status_doswal'] == "Dikirim" or $t['status_doswal'] == "Update") : ?>
                                <?php if ($t['view_doswal'] == "Belum Dilihat" or $t['view_doswal'] == "Dilihat Koorkk") :  ?>
                                    <td></td>
                                <?php else : ?>
                                    <td> <a href="<?= base_url('users/accta/') . encrypt_url($t['id']) ?>" class="btn badge badge-success">Acc</a>
                                        <a data-toggle="modal" data-target="#<?= encrypt_url($t['id']); ?>" class="btn badge badge-danger" style="color: white;">Tolak</a>
                                    </td>
                                <?php endif; ?>
                                <?php if ($t['status_doswal'] == "Update") : ?>
                                    <td><b>File Baru</b></td>
                                <?php else : ?>
                                    <td></td>
                                <?php endif; ?>
                                <td></td>
                            <?php elseif ($t['status_doswal'] == "Disetujui wali") : ?>
                                <td></td>
                                <td><b>Acc</b></td>
                                <td></td>
                            <?php elseif ($t['status_doswal'] == "Ditolak wali") : ?>
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

<?php foreach ($pta as $t) : ?>
    <?php if ($t['view_doswal'] == "Belum Dilihat") : ?>
        <div class="modal fade" id="pdf<?= encrypt_url($t['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
        <?php elseif ($t['view_doswal'] == "Dilihat") : ?>
            <div class="modal fade" id="pdf<?= encrypt_url($t['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <?php endif; ?>
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel"><?= $t['nama'] ?></h6>
                        <?php if ($t['view_doswal'] == "Belum Dilihat") : ?>
                            <a href="<?= base_url('users/displayaction/') . $t['id'] ?>" class="close" aria-label="Close"> <span aria-hidden="true">&times;</span></a>
                        <?php elseif ($t['view_doswal'] == "Dilihat") : ?>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        <?php endif; ?>
                    </div>
                    <div class="modal-body">
                        <embed src="<?= base_url('assets/upload/thesis/') . $t['username'] . "/" . $t['file'] ?>" width="100%" height="650px" />
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
            </div>
            <div class="modal fade" id="komen<?= encrypt_url($t['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="<?= base_url('users/tambah_aksi/') . encrypt_url($t['id']); ?>" method="post">
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
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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
                            Tolak <?= $t['nama'] ?> ?
                        </div>
                        <form action="<?= base_url('users/tolakpermintaanta/') . encrypt_url($t['id']); ?>" method="post" enctype="multipart/form-data">
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
        <!-- <script>
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
</script> -->

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