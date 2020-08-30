  <!-- Main Container -->
  <main class="akun-container">

    <div class="fik-section-title2">
      <h4>Pengajuan Tugas Akhir</h4>
    </div>
    <form action="#$">
      <div class="input-group">
        <div class="input-group-prepend">
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Urutkan</button>
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
    <!-- <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col" style="width:120px"># Tgl.</th>
            <th scope="col">Nama</th>
            <th scope="col">Dokumen</th>
            <th scope="col" style="width:160px">Aksi & Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">#1 <br> 10/02/2020</th>
            <td>
              Near Sakarin <br>
              1601235629 <br>
              Desain Komunikasi Visual / Advertising <br>
              2020 <br>
              No. HP : 09124612783 <br>
              Dosen Wali : Fulan, S.Pd.
            </td>
            <td>
              <a data-toggle="modal" data-target="#exampleModal2">KSM</a> <br>
              <a data-toggle="modal" data-target="#exampleModal2">Surat Pernyataan TA</a> <br>
              <a data-toggle="modal" data-target="#exampleModal2">Sertifikat EPRT</a> <br>
              <a data-toggle="modal" data-target="#exampleModal2">Sertifikat TAK</a> <br>
              <a data-toggle="modal" data-target="#exampleModal2">Persetujuan Daftar TA</a>
            </td>
            <td>
              <a href="#" class="badge badge-success" style="color:#fff">Setujui</a>
              <br><a data-toggle="modal" data-target="#exampleModal3" class="badge badge-danger" style="color:#fff;margin-top:6px">Tolak</a>
              <br><a data-toggle="modal" data-target="#exampleModal2" class="badge badge-secondary" style="color:#fff;margin-top:6px;">Lihat Dokumen</a>
            </td>
          </tr>
          <tr>
            <th scope="row">#1 <br> 10/02/2020</th>
            <td>
              Near Sakarin <br>
              1601235629 <br>
              Desain Komunikasi Visual / Advertising <br>
              2020 <br>
              No. HP : 09124612783 <br>
              Dosen Wali : Fulan, S.Pd.
            </td>
            <td>
              <a data-toggle="modal" data-target="#exampleModal2">KSM</a> <br>
              <a data-toggle="modal" data-target="#exampleModal2">Surat Pernyataan TA</a> <br>
              <a data-toggle="modal" data-target="#exampleModal2">Sertifikat EPRT</a> <br>
              <a data-toggle="modal" data-target="#exampleModal2">Sertifikat TAK</a> <br>
              <a data-toggle="modal" data-target="#exampleModal2">Persetujuan Daftar TA</a>
            </td>
            <td>
              <b>Disetujui</b>
              <br><a data-toggle="modal" data-target="#exampleModal4" class="badge badge-primary" style="color:#fff;margin-top:6px">Berikan Dosen Pembimbing</a>
              <br><a data-toggle="modal" data-target="#exampleModal2" class="badge badge-secondary" style="color:#fff;margin-top:6px;">Lihat Dokumen</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div> -->


  </main>
  <!-- End Main Container -->


  <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Tolak Pengajuan?</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="#">
          <div class="modal-body">
            <div class="form-group" style="margin-bottom:0;">
              <label for="exampleFormControlTextarea1"><b>Berikan Feedback</b></label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Contoh: Persetujuan Daftar TA Belum Lengkap" required></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batalkan</button>
            <button type="submit" class="btn btn-sm btn-danger">Ya, Tolak</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Dosen Pembimbing</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="#">
          <div class="modal-body">
            <div class="form-group">
              <label for="dospeng">Masukkan Dosen Pembimbing 1</label>
              <select class="form-control">
                <option>1 (3/5)</option>
                <option>2 (2/5)</option>
                <option disabled>3 (5/5)</option>
                <option>4 (1/5)</option>
                <option>5 (0/5)</option>
              </select>
            </div>
            <div class="form-group">
              <label for="dospeng2">Masukkan Dosen Pembimbing 2</label>
              <select class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
            <a href="<?= base_url('koordinator_ta'); ?>" class="btn btn-sm btn-secondary">Buat Kuota Dosen</a>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batalkan</button>
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade bd-example-modal-lg" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">KSM</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batalkan</button>
        </div>
      </div>
    </div>
  </div>