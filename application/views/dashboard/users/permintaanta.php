<!-- Main Container -->
<main class="akun-container">

    <div class="fik-section-title2">
        <h4>
            <? $title ?>
        </h4>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="input-group">
        <div class="input-group-append">
            <button class="btn btn-primary dropdown-toggle" id="filter" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-left:1px solid rgba(0,0,0,.1);">Filter</button>
            <div class="dropdown-menu">
                <a class="dropdown-item item">Semua</a>
                <a class="dropdown-item item">NIM</a>
                <a class="dropdown-item item">Nama</a>
                <a class="dropdown-item item">Prodi</a>
                <a class="dropdown-item item">Judul</a>
                <a class="dropdown-item item">Status</a>
            </div>
        </div>
        <input type="text" class="form-control" id="keyword" aria-label="Text input with dropdown button" placeholder="Pencarian">
    </div><br>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">Mahasiswa</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">Judul TA</th>
                    <th scope="col">Status</th>
                    <th scope="col" style="width:130px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($pta)) : ?>
                    <td colspan="7" style="background-color: whitesmoke;text-align:center">Daftar permintaan TA</td>
                <?php else : ?>
                    <?php $no = 0;
                    foreach ($pta as $t) : ?>
                        <tr>
                            <th scope="row"><?= ++$no ?></th>
                            <td><a type="button" href="<?= base_url(); ?>"></a>Detail</td>
                            <td><?= $t['name'] ?></td>
                            <td><?= $t['nim'] ?></td>
                            <td><?= $t['prodi'] ?></td>
                            <td><?= $t['judul'] ?></td>
                            <?php if ($t['status'] == 'Menunggu Acc') : ?>
                                <td class="action" style="width:130px;text-align:center;">
                                    <a href="#" class="btn badge badge-success">Acc</a>
                                    <a data-toggle="modal" data-target="#" class="btn badge badge-danger" style="color: white;">Tolak</a>
                                </td>
                            <?php else : ?>
                                <td></td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>
<!-- End Main Container -->

<!-- Modal Tolak Permintaan -->

<script>
    $(document).ready(function() {
        var keyword = document.getElementById('keyword');
        var container = document.getElementById('container');
        $(".item").click(function() {
            var text = $(this).text();
            // alert(text)
            $("#filter").text(text)
            if (text != '') {
                load_data(keyword = null, text);
            } else {
                load_data();
            }
        });

        function load_data(keyword, filter) {
            $.ajax({
                url: '<?= base_url('search/fetchdatapermintaanbimbingan') ?>',
                method: "POST",
                data: {
                    keyword: keyword,
                    filter: filter,
                },
                success: function(data) {
                    $('#pbimbingan').html(data);
                    // console.log(data)
                }
            });
        }
        keyword.addEventListener('keyup', function() {
            var keyword = $(this).val();
            var filter = $('#filter').text()
            // alert(filter)
            if (keyword != '') {
                load_data(keyword, filter);
            } else {
                load_data();
            }
        })
    });
</script>