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
      <h4>Daftar Mahasiswa Preview 2</h4>
    </div>
    <div class="input-group">
      <div class="input-group-append">
        <button class="btn btn-primary dropdown-toggle" id="filter" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-left:1px solid rgba(0,0,0,.1);">Filter</button>
        <div class="dropdown-menu">
          <a class="dropdown-item item" id="item">Semua</a>
          <a class="dropdown-item item" id="item">Nama</a>
          <a class="dropdown-item item" id="item">NIM</a>
          <a class="dropdown-item item" id="item">Nilai Pemb.1</a>
          <a class="dropdown-item item" id="item">Nilai Pemb.2</a>
          <a class="dropdown-item item" id="item">Nilai Peng.1</a>
          <a class="dropdown-item item" id="item">Nilai Peng.2</a>
          <a class="dropdown-item item" id="item">Nilai Peng.3</a>
        </div>
      </div>
      <input type="text" class="form-control" id="keyword" aria-label="Text input with dropdown button" placeholder="Pencarian">
    </div>
    <div class="table-responsive admin-list">
      <table class="table">
        <table class="table" id="myTable" width='100%'>
          <thead>
            <tr>
              <th scope="col" style="width:48px">No</th>
              <th scope="col">Nama</th>
              <th scope="col">NIM</th>
              <th scope="col">Nilai Pemb.1</th>
              <th scope="col">Nilai Pemb.2</th>
              <th scope="col">Nilai Peng.1</th>
              <th scope="col">Nilai Peng.2</th>
              <th scope="col">Nilai Peng.3</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody id="pendaftaranta">
            <?php if (empty($mahasiswa)) : ?>
              <td colspan="9" style="background-color: whitesmoke;text-align:center">List Mahasiswa kosong</td>
            <?php else : ?>
              <?php $no = 0;
              foreach ($mahasiswa as $t) : ?>
                <tr style="background-color: #ebecf1;color:black">
                <tr>
                  <td><?= ++$no ?></td>
                  <td><?= $t['name'] ?></td>
                  <td><?= $t['nim'] ?></td>
                  <td><?= array_sum(explode(",",  $t['nilai_pembimbing1'])) ?></td>
                  <td><?= array_sum(explode(",",  $t['nilai_pembimbing2'])) ?></td>
                  <td><?= array_sum(explode(",",  $t['nilai_penguji1'])) ?></td>
                  <td><?= array_sum(explode(",",  $t['nilai_penguji2'])) ?></td>
                  <td><?= array_sum(explode(",",  $t['nilai_penguji3'])) ?></td>
                  <?php if ($t['status_preview'] == 'preview2') : ?>
                    <td>On Progress</td>
                  <?php else : ?>
                  <?php endif; ?>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </table>
    </div>
  </main>

  <script>
    $(document).ready(function() {
      $(".item").click(function() {
        var text = $(this).text();
        $("#filter").text(text)
      });
      $('#keyword').keyup(function() {
        var filter = $('#filter').text()
        var search = $(this).val();
        // alert(search)
        if (filter == "Nama") {
          $('table tbody tr').hide();
          var len = $('table tbody tr:not(.notfound) td:nth-child(2):contains("' + search + '")').length;
          if (len > 0) {
            $('table tbody tr:not(.notfound) td:contains("' + search + '")').each(function() {
              $(this).closest('tr').show();
            });
          } else {
            $('.notfound').show();
          }
        } else if (filter == "NIM") {
          $('table tbody tr').hide();
          var len = $('table tbody tr:not(.notfound) td:nth-child(3):contains("' + search + '")').length;
          if (len > 0) {
            $('table tbody tr:not(.notfound) td:contains("' + search + '")').each(function() {
              $(this).closest('tr').show();
            });
          } else {
            $('.notfound').show();
          }
        } else if (filter == "Pembimbing 1") {
          $('table tbody tr').hide();
          var len = $('table tbody tr:not(.notfound) td:nth-child(4):contains("' + search + '")').length;
          if (len > 0) {
            $('table tbody tr:not(.notfound) td:contains("' + search + '")').each(function() {
              $(this).closest('tr').show();
            });
          } else {
            $('.notfound').show();
          }
        } else if (filter == "Pembimbing 2") {
          $('table tbody tr').hide();
          var len = $('table tbody tr:not(.notfound) td:nth-child(5):contains("' + search + '")').length;
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