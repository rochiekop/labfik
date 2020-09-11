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
            <a class="dropdown-item item">Semua</a>
            <a class="dropdown-item item">Nama</a>
            <a class="dropdown-item item">NIM</a>
            <a class="dropdown-item item">Prodi</a>
            <a class="dropdown-item item">Kosentrasi</a>
            <a class="dropdown-item item">Dosen Wali</a>
            <a class="dropdown-item item">Tahun</a>
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
              <th scope="col" style="width:48px">No</th>
              <th scope="col">Nama</th>
              <th scope="col">NIM</th>
              <th scope="col">Prodi</th>
              <th scope="col">Kosentrasi</th>
              <th scope="col">Kel. Keahlian</th>
              <th scope="col">Dosen Wali</th>
              <th scope="col">Tahun</th>
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
                  <?php if (substr($t['kelompok_keahlian'], 0, 5) == "Ketua") : ?>
                    <td><?= substr($t['kelompok_keahlian'], 6) ?></td>
                  <?php else : ?>
                    <td><?= $t['kelompok_keahlian'] ?></td>
                  <?php endif; ?>
                  <td><?= $t['dosen_wali'] ?></td>
                  <td><?= $t['tahun'] ?></td>
                  <?php if ($t['aksi'] != 0) : ?>
                    <td><b>Ditambahkan</b></td>
                  <?php else : ?>
                    <td>
                      <a data-toggle="modal" data-target="#exampleModal<?= $t['id'] ?>" class="badge badge-primary" style="color:#fff;margin-top:6px">+ Pembimbing</a>
                    </td>
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
                    <option value="<?= $q['id'] ?>"><?= $q['name'] ?></option>
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
  <?php endforeach; ?>

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

      function load_data(filter, keyword) {
        $.ajax({
          url: '<?= base_url('search/fetchdatapendaftarankoorta') ?>',
          method: "POST",
          data: {
            filter: filter,
            keyword: keyword,
          },
          success: function(data) {
            $('#pengajuan').html(data);
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