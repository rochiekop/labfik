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
      <h4>Pengajuan Tugas Akhir</h4>
    </div>
    <div class="input-group">
      <div class="input-group-append">
        <button class="btn btn-primary dropdown-toggle" id="filter" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-left:1px solid rgba(0,0,0,.1);">Filter</button>
        <div class="dropdown-menu">
          <a class="dropdown-item item" id="item">Semua</a>
          <a class="dropdown-item item" id="item">NIM</a>
          <a class="dropdown-item item" id="item">Nama</a>
          <a class="dropdown-item item" id="item">Prodi</a>
          <a class="dropdown-item item" id="item">Kosentrasi</a>
          <a class="dropdown-item item" id="item">Dosen Wali</a>
          <a class="dropdown-item item" id="item">Tanggal</a>
          <a class="dropdown-item item" id="item">Status</a>
        </div>
      </div>
      <input type="text" class="form-control" id="keyword" aria-label="Text input with dropdown button" placeholder="Pencarian">
    </div>
    <div class="table-responsive admin-list">
      <table class="table">
        <table class="table" id="myTable" width='100%'>
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">NIM</th>
              <th scope="col">Nama</th>
              <th scope="col">Prodi</th>
              <th scope="col">Kosentrasi</th>
              <th scope="col">Dosen Wali</th>
              <th scope="col">Tanggal Approve</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody id="pendaftaranta">
            <?php if (empty($mahasiswa)) : ?>
              <td colspan="9" style="background-color: whitesmoke;text-align:center">List Pendaftaran kosong</td>
            <?php else : ?>
              <?php $no = 0;
              foreach ($mahasiswa as $t) : ?>
                <tr>
                  <td><?= ++$no ?></td>
                  <td><?= $t['nim'] ?></td>
                  <td><?= $t['name'] ?></td>
                  <td><?= $t['prodi'] ?></td>
                  <td><?= $t['peminatan'] ?></td>
                  <td><?= $t['kodedsn']['kode_dosen'] ?> - <?= $t['dosen_wali'] ?></td>
                  <td><?= $t['date'] ?></td>
                  <?php if ($t['status_file'] == "Dikirim") : ?>
                    <td>Dikirim ke Dosen Wali</td>
                  <?php else : ?>
                    <td><?= $t['status_file'] ?></td>
                  <?php endif; ?>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
            <tr class="notfound">
              <td colspan="9"></td>
            </tr>
          </tbody>
        </table>
      </table>
    </div>
  </main>

  <style>
    .notfound {
      display: none;
      background-color: whitesmoke;
      text-align: center;
    }
  </style>
  <!-- End Main Container -->
  <script>
    $(document).ready(function() {
      $(".item").click(function() {
        var text = $(this).text();
        $("#filter").text(text)
      });
      $('#keyword').keyup(function() {
        var filter = $('#filter').text()
        var search = $(this).val();
        if (filter == "Nama") {
          $('table tbody tr').hide();
          var len = $('table tbody tr:not(.notfound) td:nth-child(3):contains("' + search + '")').length;
          if (len > 0) {
            $('table tbody tr:not(.notfound) td:contains("' + search + '")').each(function() {
              $(this).closest('tr').show();
            });
          } else {
            $('.notfound').show();
          }
        } else if (filter == "NIM") {
          $('table tbody tr').hide();
          var len = $('table tbody tr:not(.notfound) td:nth-child(2):contains("' + search + '")').length;
          if (len > 0) {
            $('table tbody tr:not(.notfound) td:contains("' + search + '")').each(function() {
              $(this).closest('tr').show();
            });
          } else {
            $('.notfound').show();
          }
        } else if (filter == "Prodi") {
          $('table tbody tr').hide();
          var len = $('table tbody tr:not(.notfound) td:nth-child(4):contains("' + search + '")').length;
          if (len > 0) {
            $('table tbody tr:not(.notfound) td:contains("' + search + '")').each(function() {
              $(this).closest('tr').show();
            });
          } else {
            $('.notfound').show();
          }
        } else if (filter == "Kosentrasi") {
          $('table tbody tr').hide();
          var len = $('table tbody tr:not(.notfound) td:nth-child(5):contains("' + search + '")').length;
          if (len > 0) {
            $('table tbody tr:not(.notfound) td:contains("' + search + '")').each(function() {
              $(this).closest('tr').show();
            });
          } else {
            $('.notfound').show();
          }
        } else if (filter == "Dosen Wali") {
          $('table tbody tr').hide();
          var len = $('table tbody tr:not(.notfound) td:nth-child(6):contains("' + search + '")').length;
          if (len > 0) {
            $('table tbody tr:not(.notfound) td:contains("' + search + '")').each(function() {
              $(this).closest('tr').show();
            });
          } else {
            $('.notfound').show();
          }
        } else if (filter == "Tanggal") {
          $('table tbody tr').hide();
          var len = $('table tbody tr:not(.notfound) td:nth-child(7):contains("' + search + '")').length;
          if (len > 0) {
            $('table tbody tr:not(.notfound) td:contains("' + search + '")').each(function() {
              $(this).closest('tr').show();
            });
          } else {
            $('.notfound').show();
          }
        } else if (filter == "Status") {
          $('table tbody tr').hide();
          var len = $('table tbody tr:not(.notfound) td:nth-child(8):contains("' + search + '")').length;
          if (len > 0) {
            $('table tbody tr:not(.notfound) td:contains("' + search + '")').each(function() {
              $(this).closest('tr').show();
            });
          } else {
            $('.notfound').show();
          }
        } else if (filter == "Semua" || filter == "Filter") {
          $('table tbody tr').hide();
          var len = $('table tbody tr:not(.notfound) td:contains("' + search + '")').length;
          if (len > 0) {
            $('table tbody tr:not(.notfound) td:contains("' + search + '")').each(function() {
              $(this).closest('tr').show();
            });
          } else {
            $('.notfound').show();
          }
        }

      });
      $.expr[":"].contains = $.expr.createPseudo(function(arg) {
        return function(elem) {
          return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
        };
      });
    });
  </script>