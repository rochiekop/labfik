  <!-- Main Container -->
  <main class="akun-container">
    <?= $this->session->flashdata('message'); ?>
    <div class="fik-section-title2">
      <h4>Pengajuan Tugas Akhir</h4>
    </div>
    <form action="#$">
      <div class="input-group">
        <div class="input-group-prepend">
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter</button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">A-Z</a>
            <a class="dropdown-item" href="#">Terbaru</a>
            <a class="dropdown-item" href="#">Belum Ada Aksi</a>
            <a class="dropdown-item" href="#">Diterima</a>
            <a class="dropdown-item" href="#">Ditolak</a>
            <a class="dropdown-item" href="#">Dokumen Belum Lengkap</a>
          </div>
        </div>
        <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Cari nama mahasiswa/NIM/Dosen Wali">
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
              <th scope="col">No. Hp</th>
              <th scope="col">Dosen Wali</th>
              <th scope="col">Tahun</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody id="laboratorium">
            <?php if (empty($mahasiswa)) : ?>
              <td colspan="9" style="background-color: whitesmoke;text-align:center">List Pendaftaran kosong</td>
            <?php else : ?>
              <?php $no = 0;
              foreach ($mahasiswa as $t) : ?>
                <tr>
                  <td><b><?= ++$no ?></b></td>
                  <td><?= $t['name'] ?></td>
                  <td><?= $t['nim'] ?></td>
                  <td><?= $t['prodi'] ?></td>
                  <td><?= $t['peminatan'] ?></td>
                  <td><?= $t['no_telp'] ?></td>
                  <td><?= $t['dosen_wali'] ?></td>
                  <td><?= $t['tahun'] ?></td>
                  <?php if ($t['aksi'] != 0) : ?>
                    <td><b>Lihat Dosen</b></td>
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
                <input type="hidden" name="id_guidance" id="id_guidance" value="<?= $m['id'] ?>" placeholder="">
              </div>
              <div class="form-group">
                <label for="dospeng">Masukkan Dosen Pembimbing 1</label>
                <select class="form-control" required name="dosbing1">
                  <option value="">Dosen Pembimbing 1</option>
                  <?php foreach ($dosen as $q) : ?>
                    <?php if ($m['prodi'] == $q['prodi'] and $q['kuota_bimbingan'] > $q['count_bimbingan']) : ?>
                      <option value="<?= $q['id'] ?>"><?= $q['name'] ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="dospeng2">Masukkan Dosen Pembimbing 2</label>
                <select class="form-control" required name="dosbing2">
                  <option value="">Dosen Pembimbing 2</option>
                  <?php foreach ($dosen as $q) : ?>
                    <?php if ($m['prodi'] == $q['prodi'] and $q['kuota_bimbingan'] > $q['count_bimbingan']) : ?>
                      <option value="<?= $q['id'] ?>"><?= $q['name'] ?></option>
                    <?php endif; ?>
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