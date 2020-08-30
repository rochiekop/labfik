  <!-- Main Container -->
  <main class="akun-container">
    <?php if (validation_errors()) : ?>
      <div class="alert alert-danger" role="alert">
        <?= validation_errors(); ?>
      </div>
    <?php endif; ?>
    <?= $this->session->flashdata('message'); ?>

    <div class="fik-section-title2">
      <span class="fas fa-door-open zzzz"></span>
      <h5>List Pendaftaran Tugas Akhir</h5>
    </div>
    <div class="input-group">
      <div class="input-group-append">
        <button class="btn btn-primary dropdown-toggle" id="filter" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-left:1px solid rgba(0,0,0,.1);">Filter</button>
        <div class="dropdown-menu">
          <a class="dropdown-item item">Nama</a>
          <a class="dropdown-item item">NIM</a>
          <a class="dropdown-item item">Prodi</a>
          <a class="dropdown-item item">Peminatan</a>
          <a class="dropdown-item item">Tahun</a>
        </div>
      </div>
      <input type="text" class="form-control" id="keyword" aria-label="Text input with dropdown button" placeholder="Pencarian">
    </div>
    <div class="table-responsive admin-list">
      <table class="table">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" style="width:48px">No</th>
              <th scope="col" style="width:90px">&nbsp;</th>
              <th scope="col">Nama</th>
              <th scope="col">NIM</th>
              <th scope="col">Prodi</th>
              <th scope="col">Peminatan</th>
              <th scope="col">Tahun</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody id="laboratorium">
            <?php if (empty($mahasiswa)) : ?>
              <td colspan="8" style="background-color: whitesmoke;text-align:center">List Pendaftaran kosong</td>
            <?php else : ?>
              <?php $no = 0;
              foreach ($mahasiswa as $t) : ?>
                <tr>
                  <td><?= ++$no ?></td>
                  <td> <a href="<?= base_url('adminlaa/viewdetail/') . encrypt_url($t['id']); ?>" class="btn badge badge-secondary">Details</a></td>
                  <td><?= $t['name'] ?></td>
                  <td><?= $t['nim'] ?></td>
                  <td><?= $t['prodi'] ?></td>
                  <td><?= $t['peminatan'] ?></td>
                  <td><?= $t['tahun'] ?></td>
                  <?php if ($t['status_file'] == "Disetujui wali" and $t['diterima'] == "0" and $t['ditolak'] == "0" and $t['updated'] == "0") : ?>
                    <td><b>Menunggu Persetujuan</b></td>
                  <?php elseif ($t['diterima'] != 5 and $t['updated'] == "0") : ?>
                    <td><b><?= $t['diterima'] ?> Diterima, <?= $t['ditolak'] ?> Ditolak</b></td>
                  <?php elseif ($t['updated'] != "0") : ?>
                    <td><b><?= $t['updated'] ?> File baru</b></td>
                  <?php else : ?>
                    <td><b>Disetujui</b></td>
                  <?php endif; ?>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
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
        // alert(text)
        $("#filter").text(text)
        if ((text != 'Semua')) {
          load_data(text);
        } else {
          load_data()
        }
      });

      // function load_data(filter, keyword) {
      //   $.ajax({
      //     url: '<?= base_url('search/fetchdatakategori') ?>',
      //     method: "POST",
      //     data: {
      //       filter: filter,
      //       keyword: keyword,
      //     },
      //     success: function(data) {
      //       $('#container').html(data);
      //       // console.log(data)
      //     }
      //   });
      // }
      // keyword.addEventListener('keyup', function() {
      //   var keyword = $(this).val();
      //   var filter = $('#filter').text()
      //   if (keyword != '') {
      //     load_data(filter, keyword);
      //   } else if (filter != "Semua" && filter != "Filter") {
      //     load_data(filter);
      //   } else {
      //     load_data();
      //   }
      // })
    });
  </script>