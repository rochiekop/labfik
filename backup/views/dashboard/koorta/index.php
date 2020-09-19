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
            <a class="dropdown-item item">Peminatan</a>
            <a class="dropdown-item item">Keahlian</a>
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
              <th scope="col"></th>
              <th scope="col">Nama</th>
              <th scope="col">NIM</th>
              <th scope="col">Prodi</th>
              <th scope="col">Peminatan</th>
              <th scope="col">Keahlian</th>
              <th scope="col">Pembimbing 1</th>
              <th scope="col">Pembimbing 2</th>
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
                  <?php if ($t['aksi'] != 0) : ?>
                    <td><a data-toggle="modal" data-target="#details<?= $t['id'] ?>" class="btn badge badge-secondary" style=" color:#fff;margin-top:6px">Details</a></td>
                  <?php else : ?>
                    <td></td>
                  <?php endif; ?>
                  <td><?= $t['name'] ?></td>
                  <td><?= $t['nim'] ?></td>
                  <td><?= $t['prodi'] ?></td>
                  <td><?= $t['peminatan'] ?></td>
                  <?php if (substr($t['data']['kelompok_keahlian'], 0, 5) == "Ketua") : ?>
                    <td><?= substr($t['data']['kelompok_keahlian'], 6) ?></td>
                  <?php else : ?>
                    <td><?= $t['data']['kelompok_keahlian'] ?></td>
                  <?php endif; ?>
                  <?php if ($t['dosbing1'] != "") : ?>
                    <td><?= $t['dosbing1'] ?></td>
                    <td><?= $t['dosbing2'] ?></td>
                    <td><b>Ditambahkan</b></td>
                  <?php else : ?>
                    <td></td>
                    <td></td>
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
      <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel">Details</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table>
              <thead>
                <th style="width: 200px;"></th>
                <th style="width: 10px;"></th>
                <th></th>
              </thead>
              <tbody>
                <tr>
                  <td style="width: 20px;">Judul 1</td>
                  <td>:</td>
                  <td><?= $m['judul1'] ?></td>
                </tr>
                <?php if ($m['judul2'] != '') : ?>
                  <tr>
                    <td style="width: 20px;">Judul 2</td>
                    <td>:</td>
                    <td><?= $m['judul2'] ?></td>
                  </tr>
                <?php elseif ($m['judul3'] != '') : ?>
                  <tr>
                    <td style="width: 20px;">Judul 3</td>
                    <td>:</td>
                    <td><?= $m['judul3'] ?></td>
                  </tr>
                <?php endif; ?>
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