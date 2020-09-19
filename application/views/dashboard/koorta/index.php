  <!-- Main Container -->
  <main class="akun-container">
    <?= $this->session->flashdata('message'); ?>
    <div class="fik-section-title2">
      <h4>Pengajuan Tugas Akhir</h4>
    </div>
    <form action="#$">
      <div class="input-group">
        <div class="input-group-prepend">
          <button class="btn btn-primary dropdown-toggle" id="filter" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter</button>
          <div class="dropdown-menu">
            <a class="dropdown-item item" id="item">Semua</a>
            <a class="dropdown-item item" id="item">Nama</a>
            <a class="dropdown-item item" id="item">NIM</a>
            <a class="dropdown-item item" id="item">Prodi</a>
            <a class="dropdown-item item" id="item">Peminatan</a>
            <a class="dropdown-item item" id="item">Judul 1</a>
            <a class="dropdown-item item" id="item">Judul 2</a>
            <a class="dropdown-item item" id="item">Judul 3</a>
          </div>
        </div>
        <input type="text" class="form-control" id="keyword" aria-label="Text input with dropdown button" placeholder="Pencarian">
      </div>
    </form>

    <div class="table-responsive admin-list">
      <table class="table">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" style="width:40px">No</th>
              <th scope="col">Nama</th>
              <th scope="col">NIM</th>
              <th scope="col">Prodi</th>
              <th scope="col">Peminatan</th>
              <th scope="col">Judul 1</th>
              <th scope="col">Judul 2</th>
              <th scope="col">Judul 3</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody id="pengajuan">
            <?php if (empty($mahasiswa)) : ?>
              <td colspan="9" style="background-color: whitesmoke;text-align:center">List Pendaftaran kosong</td>
            <?php else : ?>
              <?php $no = 0;
              foreach ($mahasiswa as $t) : ?>
                <?php if ($t['aksi'] == 0) : ?>
                  <tr style="background-color: #ebecf1;color:black">
                  <?php else : ?>
                  <tr>
                  <?php endif; ?>
                  <td><b><?= ++$no ?></b></td>
                  <td><?= $t['name'] ?></td>
                  <td><?= $t['nim'] ?></td>
                  <td><?= $t['prodi'] ?></td>
                  <td><?= $t['peminatan'] ?></td>
                  <td><?= $t['judul1'] ?></td>
                  <td><?= $t['judul2'] ?></td>
                  <td><?= $t['judul3'] ?></td>
                  <?php if ($t['aksi'] == 0) : ?>
                    <td>
                      <a data-toggle="modal" data-target="#exampleModal<?= $t['id'] ?>" class="badge badge-primary" style="color:#fff;margin-top:6px">+ Pembimbing</a>
                    </td>
                  <?php else : ?>
                    <td><a href="<?= base_url('koordinator_ta/viewdetail/') . encrypt_url($t['id_guidance']); ?>" class="btn badge badge-secondary">Details</a></td>
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
  <!-- End Main Container -->
  <?php foreach ($mahasiswa as $m) : ?>
    <div class="modal fade" id="exampleModal<?= $m['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel">Dosen Pembimbing</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url('koordinator_ta/adddosenpembimbing') ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
                <input type="hidden" name="id_guidance" id="id_guidance" value="<?= $m['id_guidance'] ?>" placeholder="">
              </div>
              <div class="form-group">
                <label for="dospeng">Masukkan Dosen Pembimbing 1</label>
                <select class="form-control" required name="dosbing1">
                  <option value="">Dosen Pembimbing 1</option>
                  <?php foreach ($dosen as $q) : ?>
                    <option value="<?= $q['id'] ?>,<?= $q['koordinator'] ?>"><?= $q['name'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="dospeng2">Masukkan Dosen Pembimbing 2</label>
                <select class="form-control" required name="dosbing2">
                  <option value="">Dosen Pembimbing 2</option>
                  <?php foreach ($dosen as $q) : ?>
                    <option value="<?= $q['id'] ?>"><?= $q['name'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <a href="<?= base_url('koordinator_ta/kuotadosen'); ?>" class="btn btn-sm btn-secondary">Buat Kuota Dosen</a>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batalkan</button>
              <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="modal fade" id="details<?= $m['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel">Mahasiswa : <?= $m['name'] ?></h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table>
              <thead>
                <th style="width: 160px;"></th>
                <th style="width: 10px;"></th>
                <th></th>
              </thead>
              <tbody>
                <tr>
                  <td style="width: 20px;">Dosen Pembimbing 1</td>
                  <td>:</td>
                  <td><?= $m['dosenwali'] ?></td>
                </tr>
                <tr>
                  <td style="width: 20px;">Dosen Pembimbing 2</td>
                  <td>:</td>
                  <td><?= $m['dosenwali'] ?></td>
                </tr>
                <tr>
                  <td style="width: 20px;">Peminatan</td>
                  <td>:</td>
                  <?php if ($m['data']['kelompok_keahlian'] == "") : ?>
                    <td></td>
                  <?php elseif ($m['data']['kelompok_keahlian'] !== "") : ?>
                    <?php if (substr($m['data']['kelompok_keahlian'], 0, 5) == "Ketua") : ?>
                      <td><?= substr($m['data']['kelompok_keahlian'], 6) ?></td>
                    <?php else : ?>
                      <td><?= $m['data']['kelompok_keahlian'] ?></td>
                    <?php endif; ?>
                  <?php endif; ?>
                </tr>
                <tr>
                  <td style="width: 20px;">Dosen Wali</td>
                  <td>:</td>
                  <td><?= $m['dosenwali'] ?></td>
                </tr>
                <tr>
                  <td style="width: 20px;">Kosentrasi</td>
                  <td>:</td>
                  <td><?= $m['peminatan'] ?></td>
                </tr>
                <tr>
                  <td>Tahun</td>
                  <td>:</td>
                  <td><?= $m['tahun'] ?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  <style>
    .notfound {
      display: none;
      background-color: whitesmoke;
      text-align: center;
    }
  </style>
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
        } else if (filter == "Peminatan") {
          $('table tbody tr').hide();
          var len = $('table tbody tr:not(.notfound) td:nth-child(5):contains("' + search + '")').length;
          if (len > 0) {
            $('table tbody tr:not(.notfound) td:contains("' + search + '")').each(function() {
              $(this).closest('tr').show();
            });
          } else {
            $('.notfound').show();
          }
        } else if (filter == "Judul 1") {
          $('table tbody tr').hide();
          var len = $('table tbody tr:not(.notfound) td:nth-child(6):contains("' + search + '")').length;
          if (len > 0) {
            $('table tbody tr:not(.notfound) td:contains("' + search + '")').each(function() {
              $(this).closest('tr').show();
            });
          } else {
            $('.notfound').show();
          }
        } else if (filter == "Judul 2") {
          $('table tbody tr').hide();
          var len = $('table tbody tr:not(.notfound) td:nth-child(7):contains("' + search + '")').length;
          if (len > 0) {
            $('table tbody tr:not(.notfound) td:contains("' + search + '")').each(function() {
              $(this).closest('tr').show();
            });
          } else {
            $('.notfound').show();
          }
        } else if (filter == "Judul 3") {
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