  <!-- Main Container -->
  <main class="akun-container">

    <div class="fik-section-title2">
      <h4><?= $title ?></h4>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <form action="#$">
      <div class="input-group">
        <div class="input-group-prepend">
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Urutkan</button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Nama A-Z</a>
            <a class="dropdown-item" href="#">Terbaru</a>
            <a class="dropdown-item" href="#">Belum Ada Aksi</a>
            <a class="dropdown-item" href="#">Edit Aksi</a>
          </div>
        </div>
        <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Cari nama mahasiswa/NIM/Dosen Wali">
      </div>
    </form>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col" style="width:120px"># Tgl.</th>
            <th scope="col">Nama</th>
            <th scope="col">Dosen</th>
            <th scope="col" style="width:160px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($preview2)) : ?>
            <td colspan="3" style="background-color: whitesmoke;text-align:center">List Preview Kosong</td>
          <?php else : ?>
            <?php $no = 1;
            foreach ($preview2 as $t) { ?>
              <tr>
                <th scope="row">#<?= $no ?> <br> <?= $t['date'] ?></th>
                <td>
                  <?= $t['name'] ?> <br>
                  <?= $t['nim'] ?> <br>
                  <?= $t['prodi'] ?> / <?= $t['peminatan'] ?> <br>
                  <?= $t['tahun'] ?> <br>
                  No. HP : <?= $t['no_telp'] ?> <br>
                  Dosen Wali : <?= $t['dosen_wali'] ?>
                </td>
                <td>
                  <?= $t['dosbing1'] ?> <br>
                  <?= $t['dosbing2'] ?>
                </td>
                <?php if ($t['status'] == '') : ?>
                  <td>
                    <a data-toggle="modal" data-target="#online<?= $t['id'] ?>" class="badge badge-primary" style="color:#fff;margin-top:6px">Buat Jadwal</a>
                  </td>
                <?php elseif ($t['status'] == 'jadwal ta') : ?>
                  <td>
                    <a data-toggle="modal" data-target="#online<?= $t['id'] ?>" class="badge badge-primary" style="color:#fff;margin-top:6px">Edit Jadwal</a>
                  </td>
                <?php endif; ?>
              </tr>
            <?php $no++;
            } ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>


  </main>
  <!-- End Main Container -->

  <?php foreach ($preview2 as $m) : ?>
    <div class="modal fade" id="online<?= $m['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel">Jadwal online <?= $m['name'] ?></h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="<?= base_url('Koordinator_ta/placeonline') ?>">
            <div class="modal-body">
              <div class="alert alert-warning">
                Tentukan jadwal preview 2 dan dosen penguji
              </div>
              <div class="form-group">
                <label for="dospeng">Masukkan Dosen Penguji</label>
                <select class="form-control" required name="dosbing1">
                  <option value="">Dosen Penguji 1</option>
                  <?php foreach ($dosen as $q) : ?>
                    <option value="<?= $q['id'] ?>"><?= $q['name'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" required name="dosbing2">
                  <option value="">Dosen Penguji 2</option>
                  <?php foreach ($dosen as $q) : ?>
                    <option value="<?= $q['id'] ?>"><?= $q['name'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <label>Tempat</label>
              <div class="form-group">
                <input type="text" name="ruangan" value="" class="form-control" id="cek" placeholder="Contoh: zoom.com/lorem" required>
              </div>
              <div class="form-group">
                <input type="date" name="tanggal" id="tanggalonline" onchange="Bookingmodalsonline()" class="form-control" placeholder="" required="required" autocomplete="off" />
              </div>
              <div class="form-group" style="margin-bottom:0">
                <div class="form-control waktu">Waktu</div>
              </div><br>
              <div class="jadwal-ruangan" id="jadwalonline">
                <table border="0" class="table bookings" id="booking">
                  <tbody>
                    <tr class="displayonline" style="background:transparent">
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <input type="hidden" name="id_mhs" class="form-control" placeholder="" value="<?= $m['id_mhs'] ?>" required="required" autocomplete="off" />
            <input type="hidden" name="id_guidance" class="form-control" placeholder="" value="<?= $m['id_guidance'] ?>" required="required" autocomplete="off" />
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batalkan</button>
              <button type="submit" class="btn btn-sm btn-primary" id="createbookingmodals">Simpan & Setujui</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

  <!-- <script>
    function myFunction(val) {
      if (val == 'online') {
        document.getElementById("cek").disabled = false;
        document.getElementById("kategoriruangandsn").disabled = true;
      } else if (val == 'offline') {
        document.getElementById("kategoriruangandsn").disabled = false;
        document.getElementById("cek").disabled = true;
      } else if (val == '') {
        document.getElementById("kategoriruangandsn").disabled = true;
        document.getElementById("cek").disabled = true;
      }
    }
  </script> -->