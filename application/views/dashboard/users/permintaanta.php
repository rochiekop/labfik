<!-- Main Container -->
<main class="akun-container">

    <div class="fik-section-title2">
        <h4>
            List Pendaftar Tugas Akhir Mahasiswa Wali
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
                <a class="dropdown-item item">Kosentrasi</a>
                <a class="dropdown-item item">Tahun</a>
                <a class="dropdown-item item">Status</a>
            </div>
        </div>
        <input type="text" class="form-control" id="keyword" aria-label="Text input with dropdown button" placeholder="Pencarian">
    </div><br>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" style="width:48px">#</th>
                    <th scope="col" style="width:90px">&nbsp;</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">Kosentrasi</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody id="permintaantadosenwali">
                <?php if (empty($pta)) : ?>
                    <td colspan="8" style="background-color: whitesmoke;text-align:center">Daftar permintaan TA</td>
                <?php else : ?>
                    <?php $no = 0;
                    foreach ($pta as $t) : ?>
                        <?php if ($t['status_file'] != "Disetujui wali") : ?>
                            <tr style="background-color: #ebecf1;color:black">
                            <?php else : ?>
                            <tr>
                            <?php endif; ?>
                            <th scope="row"><?= ++$no ?></th>
                            <td><a href="<?= base_url('users/daftarfile/') . $t['id']; ?>" class="btn badge badge-secondary">Detail</a></td>
                            <td><?= $t['name'] ?></td>
                            <td><?= $t['nim'] ?></td>
                            <td><?= $t['prodi'] ?></td>
                            <td><?= $t['peminatan'] ?></td>
                            <td><?= $t['tahun'] ?></td>
                            <?php if ($t['status_file'] == "Disetujui koor" and $t['diterima'] == "0" and $t['ditolak'] == "0" and $t['updated'] == "0") : ?>
                                <td><b>Menunggu Persetujuan</b></td>
                            <?php elseif ($t['diterima'] != 5 and $t['updated'] == "0" and $t['updated'] != "5") : ?>
                                <td><?= $t['diterima'] ?>&nbsp; Disetujui wali, <?= $t['ditolak'] ?> Ditolak, <?= $t['dikirim'] ?> Menunggu</td>
                            <?php elseif ($t['updated'] != "0") : ?>
                                <td><b><?= $t['updated'] ?>&nbsp; File baru</b></td>
                            <?php else : ?>
                                <td><b>Disetujui</b></td>
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
    $(document).ready(function() {
        var keyword = document.getElementById('keyword');
        var container = document.getElementById('container');
        $(".item").click(function() {
            var text = $(this).text();
            $("#filter").text(text)
            if ((text != 'Semua')) {
                load_data(text);
            } else {
                load_data()
            }
        });

        function load_data(filter, keyword) {
            $.ajax({
                url: '<?= base_url('search/fetchdatapermintaantadosenwali') ?>',
                method: "POST",
                data: {
                    filter: filter,
                    keyword: keyword,
                },
                success: function(data) {
                    $('#permintaantadosenwali').html(data);
                    // console.log(data)
                }
            });
        }
        keyword.addEventListener('keyup', function() {
            var keyword = $(this).val();
            var filter = $('#filter').text()
            if (keyword != '') {
                load_data(filter, keyword);
            } else if (filter != "Semua" && filter != "Filter") {
                load_data(filter);
            } else {
                load_data();
            }
        })
    });
</script>