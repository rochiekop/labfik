<!-- Main Container -->
<main class="akun-container">

    <div class="fik-section-title2">
        <h4>
            <?= $title ?>
        </h4>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="input-group">
        <div class="input-group-append">
            <button class="btn btn-primary dropdown-toggle" id="filter" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-left:1px solid rgba(0,0,0,.1);">Filter</button>
            <div class="dropdown-menu">
                <a class="dropdown-item item">Semua</a>
                <a class="dropdown-item item">Nama</a>
                <a class="dropdown-item item">NIM</a>
                <a class="dropdown-item item">Prodi</a>
                <a class="dropdown-item item">Tahun</a>
            </div>
        </div>
        <input type="text" class="form-control" id="keyword" aria-label="Text input with dropdown button" placeholder="Pencarian">
    </div><br>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" style="width:48px">No</th>
                    <th scope="col" style="width:20px">&nbsp;</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">Kel. Keahlian</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody id="pta">
                <?php if (empty($pta)) : ?>
                    <td colspan="9" style="background-color: whitesmoke;text-align:center">Daftar permintaan TA kosong</td>
                <?php else : ?>
                    <?php $no = 0;
                    foreach ($pta as $t) : ?>
                        <?php if ($t['status_file'] == "Dikirim") : ?>
                            <tr style="background-color: #ebecf1;color:black">
                            <?php else : ?>
                            <tr>
                            <?php endif; ?>
                            <th scope="row"><?= ++$no ?></th>
                            <td> <a href="<?= base_url('users/viewdetail/') . encrypt_url($t['id']); ?>" class="btn badge badge-secondary">Details</a></td>
                            <td><?= $t['name'] ?></td>
                            <td><?= $t['nim'] ?></td>
                            <td><?= $t['prodi'] ?></td>
                            <td><?= substr($this->session->userdata('koordinator'), 6) ?></td>
                            <td><?= $t['tahun'] ?></td>
                            <?php if ($t['status_file'] == "Disetujui Ketua KK") : ?>
                                <td><b>Disetujui</b></td>
                            <?php else : ?>
                                <td id="action"> <a href="<?= base_url('users/accketuakk/') . encrypt_url($t['id_guidance']) ?>" class="btn badge badge-success">Acc</a>
                                    <a data-toggle="modal" data-target="#<?= encrypt_url($t['id_tr']); ?>" class="btn badge badge-danger" style="color: white;">Tolak</a></td>
                            <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>
<!-- End Main Container -->
<?php foreach ($pta as $t) : ?>
    <div class="modal fade bd-example-modal-sm" id="<?= encrypt_url($t['id_tr']) ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    Tolak Pendaftaran TA ?
                </div>
                <form action="<?= base_url('users/tolakkoordinatorkk'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-footer">
                        <input type="hidden" id="id" name="id" value="<?= $t['id_tr']; ?>">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" name="deletedata" class="btn btn-danger btn-sm">Tolak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<script>
    $(document).ready(function() {
        var keyword = document.getElementById('keyword');
        var container = document.getElementById('container');
        $(".item").click(function() {
            var text = $(this).text();
            $("#filter").text(text)
            if (text != '') {
                load_data(keyword = null, text);
            } else {
                load_data();
            }
        });

        function load_data(keyword, filter) {
            $.ajax({
                url: '<?= base_url('search/fetchdatapendaftarantakoorkk') ?>',
                method: "POST",
                data: {
                    keyword: keyword,
                    filter: filter,
                },
                success: function(data) {
                    $('#pta').html(data);
                    // console.log(data)
                }
            });
        }
        keyword.addEventListener('keyup', function() {
            var keyword = $(this).val();
            var filter = $('#filter').text()
            if (keyword != '') {
                load_data(keyword, filter);
            } else {
                load_data();
            }
        })
    });
</script>