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
      <h4>Daftar Mahasiswa Preview 1</h4>
    </div>
    <div class="input-group">
      <div class="input-group-append">
        <button class="btn btn-primary dropdown-toggle" id="filter" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-left:1px solid rgba(0,0,0,.1);">Filter</button>
        <div class="dropdown-menu">
          <a class="dropdown-item item" id="item">Semua</a>
          <a class="dropdown-item item" id="item">Nama</a>
          <a class="dropdown-item item" id="item">NIM</a>
          <a class="dropdown-item item" id="item">Prodi</a>
          <a class="dropdown-item item" id="item">Pembimbing 1</a>
          <a class="dropdown-item item" id="item">Pembimbing 2</a>
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
              <th scope="col">Prodi</th>
              <th scope="col">Pembimbing 1</th>
              <th scope="col">Pembimbing 2</th>
              <th scope="col">Kelayakan</th>
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
                  <td><?= $t['prodi'] ?></td>
                  <td><?= $t['dosbing1'] ?></td>
                  <td><?= $t['dosbing2'] ?></td>
                  <td> <a data-toggle="modal" data-target="#exampleModal<?= $t['guidance_id'] ?>" id="view" class="btn badge badge-secondary" style="color: white;">Lihat</a></td>
                  <?php if ($t['status_preview'] == "preview1") : ?>
                    <td><b>On Progress</b></td>
                  <?php else : ?>
                    <td><b>Lulus</b></td>
                  <?php endif; ?>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </table>
    </div>
  </main>

  <?php foreach ($mahasiswa as $m) : ?>
    <!-- Modal for checklist -->
    <div class="modal fade" id="exampleModal<?= $m['guidance_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Checklist Kelayakan Preview 1</h5>
          </div>
          <div class="modal-body">
            <div class="custom-form">
              <?php $check = explode(",", $m['kelayakan']) ?>
              <input type="checkbox" id="kesesuaian" value="kesesuaian" <?php echo (in_array('kesesuaian', $check)) ? 'checked' : ''; ?> disabled>
              <label for="kesesuaian"> Kesesuaian fenomeda dan permasalahan yang diangkat</label><br>
              <input type="checkbox" id="ketepatan" value="ketepatan" <?php echo (in_array('ketepatan', $check)) ? 'checked' : ''; ?> disabled>
              <label for="ketepatan"> Ketepatan penyusunan hipotesa</label><br>
              <input type="checkbox" id="kaidah" value="kaidah" <?php echo (in_array('kaidah', $check)) ? 'checked' : ''; ?> disabled>
              <label for="kaidah"> Kaidah tata tulis karya ilmiah</label><br><br>
              <textarea name="komentar_kelayakan" id="editable" class="editable" cols="30" rows="10"><?= $m['komentar_kelayakan'] ?></textarea>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>
    </div>
  <?php endforeach; ?>
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
  <!-- TinyMCE -->
  <script src="https://cdn.tiny.cloud/1/q9tneu2aax9fp91cvqlh7mqvx44p6ph4jb63xq6lax2ybita/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: '.editable',
      // plugins: 'save preview paste a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      plugins: 'save autosave preview autolink lists media table',
      toolbar: '',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      height: '200',
      width: '470',
      readonly: 1
    });
  </script>