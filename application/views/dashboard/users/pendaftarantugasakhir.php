  <!-- Main Container -->
  <main class="akun-container">
    <div class="fik-section-title2">
      <h4>Pendaftaran Tugas Akhir</h4>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <?php if ($statusfile == null) : ?>
    <?php elseif ($statusfile == "Disetujui Adminlaa" and empty($thesis_lecturers)) : ?>
      <div class="alert alert-warning">Selamat! pengajuan TA anda sudah disetujui oleh semua pihak, silakan tunggu <b>2x24 jam</b> untuk Koordinator TA memberikan dosen pembimbing anda, Terima kasih. <br> <a href="<?= base_url('Chat/getAllKoordinatorTA') ?>" class="btn btn-primary btn-sm" style="margin-top:6px;">Hubungi Koordinator TA</a> </div>
    <?php elseif (!empty($thesis_lecturers)) : ?>
      <div class="alert alert-success">Koordinator TA telah menambahkan <?= $dosbing1['name'] ?> dan <?= $dosbing2['name'] ?> sebagai dosen pembimbing tugas akhir anda,<br> <a href="<?= base_url('users/bimbingantugasakhir') ?>" class="btn btn-success btn-sm" style="margin-top:6px;">Mulai Bimbingan</a> </div>
    <?php endif; ?>
    <?php if (empty($cek)) : ?>
      <a data-toggle="modal" data-target="#judul" class="btn btn-sm btn-primary" style="color:#fff">Daftar Tugas Akhir</a>
    <?php elseif ($statusfile != "Disetujui Adminlaa") : ?>
      <button data-toggle="modal" data-target="#judul" class="btn btn-sm btn-primary" style="color:#fff" disabled="disabled">Daftar Tugas Akhir</button>
    <?php endif; ?>
    <br><br>
    <?php if (empty($file)) : ?>
      <div class="alert alert-warning" role="alert">
        <center>
          Kamu belum melakukan proses pendaftaran tugas akhir
        </center>
      </div>
    <?php else : ?>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Pendaftaran</th>
              <th scope="col">Status</th>
              <?php if ($statusfile == "Disetujui Adminlaa") : ?>
                <th scope="col" style="width:120px">Lihat</th>
              <?php else : ?>
                <th scope="col" style="width:120px">Aksi</th>
                <th scope="col" style="width:35%;">Komentar</th>
              <?php endif; ?>
            </tr>
          </thead>
          <tbody>
            <?php if ($statusfile == null) : ?>
            <?php else : ?>
              <?php $no = 0;
              foreach ($file as $k) : ?>
                <tr>
                  <!-- For Dosen Wali -->
                  <td><?= $k['nama'] ?></td>
                  <?php if ($statusfile == "Disetujui koor" or $statusfile == "Dikirim") : ?>
                    <?php if ($k['status_doswal'] == 'Ditolak wali') :  ?>
                      <td>Ditolak wali dosen</td>
                      <td><a data-toggle="modal" data-target="#upload<?= $k['id'] ?>" class="badge badge-secondary" style="color:#fff">Upload</a></td>
                      <td><?= $k['komentar'] ?></td>
                    <?php elseif ($k['status_doswal'] == 'Ditolak koor') :  ?>
                      <td>Ditolak Koordinator KK</td>
                      <td><a data-toggle="modal" data-target="#upload<?= $k['id'] ?>" class="badge badge-secondary" style="color:#fff">Upload</a></td>
                      <td><?= $k['komentar'] ?></td>
                    <?php elseif ($k['status_doswal'] == 'Disetujui wali' or $k['status_doswal'] == 'Dikirim' or $k['status_doswal'] == 'Disetujui koor') : ?>
                      <td><?= $k['status_doswal'] ?></td>
                      <td></td>
                      <td></td>
                    <?php elseif ($k['status_doswal'] == 'Update file') : ?>
                      <td><?= $k['status_doswal'] ?></td>
                      <td></td>
                      <td><?= $k['komentar'] ?></td>
                    <?php elseif ($k['status_doswal'] == 'Update') : ?>
                      <td><?= $k['status_doswal'] ?></td>
                      <td></td>
                      <td><?= $k['komentar'] ?></td>
                    <?php else : ?>
                      <td>Dikirim</td>
                      <td></td>
                      <td></td>
                    <?php endif; ?>
                    <!-- For Adminlaa -->
                  <?php elseif ($statusfile == "Disetujui wali" or $statusfile == "Disetujui Adminlaa") : ?>
                    <?php if ($k['status_adminlaa'] == 'Ditolak') :  ?>
                      <td>Ditolak Admin Laa</td>
                      <td><a data-toggle="modal" data-target="#upload<?= $k['id'] ?>" class="badge badge-secondary" style="color:#fff">Upload</a></td>
                      <td><?= $k['komentar'] ?></td>
                    <?php elseif ($k['status_adminlaa'] == 'Disetujui' or $k['status_adminlaa'] == 'Dikirim') : ?>
                      <td><?= $k['status_adminlaa'] ?></td>
                      <?php if ($statusfile == "Disetujui Adminlaa") : ?>
                        <td><a data-toggle="modal" data-target="#view<?= $k['id'] ?>" class="badge badge-secondary" style="color:#fff">Lihat</a></td>
                      <?php endif; ?>
                      <td></td>
                      <td></td>
                    <?php elseif ($k['status_adminlaa'] == 'Update') : ?>
                      <td><?= $k['status_adminlaa'] ?></td>
                      <td></td>
                      <td><?= $k['komentar'] ?></td>
                    <?php endif; ?>
                  <?php endif; ?>
                </tr>
              <?php endforeach; ?>
            <?php endif ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </main>
  <!-- End Main Container -->

  <!-- Modal judul -->
  <div class="modal fade" id="judul" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Form Pendaftaran Tugas Akhir</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('users/inputformpendaftaran') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" id="id_mhs" name="id_mhs" value="<?= $mhs['id'] ?>">
            <div class="form-group">
              <label for="exampleFormControlFile1" id="judul">Judul 1</label>
              <input name="judul1" class="form-control" required value="<?= set_value('judul'); ?>">
              <?php echo form_error('judul', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1" id="judul">Judul 2</label>
              <input name="judul2" class="form-control" value="<?= set_value('judul'); ?>">
              <?php echo form_error('judul2', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1" id="judul">Judul 3</label>
              <input name="judul3" class="form-control" value="<?= set_value('judul'); ?>">
              <?php echo form_error('judul3', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="kosentrasi">Kosentrasi</label>
              <input type="text" name="peminatan" value="<?= set_value('peminatan'); ?>" class="form-control" placeholder="" required="required" autocomplete="off" />
              <?php echo form_error('peminatan', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">Kartu Studi Mahasiswa (KSM)</label>
              <input type="file" class="form-control" name="filependaftaran[]" required style="padding:13px 16px">
            </div>
            <div class="row">
              <div class="col-lg-11" id="dynamic">
                <div class="form-group">
                  <label for="exampleFormControlFile1">Surat Pernyataan Tugas Akhir</label>
                  <input type="file" class="form-control" name="filependaftaran[]" required style="padding:13px 16px">
                </div>
              </div>
              <div class="col-lg" style="margin-top: 40px;margin-left:-10px" id="icon">
                <a href="<?= base_url('assets/formtemplateta/1A. SURAT PERNYATAAN PENDAFTARAN TA.docx') ?>"> <span class="fas fa-download" title="Download Template"></span></a>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">Sertifikat EPRT</label>
              <input type="file" class="form-control" name="filependaftaran[]" required style="padding:13px 16px">
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">Sertifikat TAK</label>
              <input type="file" class="form-control" name="filependaftaran[]" required style="padding:13px 16px">
            </div>
            <div class="row">
              <div class="col-lg-11" id="dynamic">
                <div class="form-group">
                  <label for="exampleFormControlFile1">Persetujuan Daftar TA</label>
                  <input type="file" class="form-control" name="filependaftaran[]" required style="padding:13px 16px">
                </div>
              </div>
              <div class="col-lg" style="margin-top: 40px;margin-left:-10px" id="icon">
                <a href="<?= base_url('assets/formtemplateta/FORMULIR PENDAFTARAN TA UPDATE.doc') ?>"> <span class="fas fa-download" title="Download Template"></span></a>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batalkan</button>
            <button type="submit" class="btn btn-sm btn-primary">Daftar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php foreach ($file as $m) : ?>
    <div class="modal fade bd-example-modal-lg" id="view<?= $m['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel"><?= $m['nama'] ?></h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <embed src="<?= base_url('assets/upload/thesis/') . $m['username'] . '/' . $m['file'] ?>" width="100%" height="650px" type="application/pdf">
            </embed>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>


  <?php foreach ($file as $f) : ?>
    <div class="modal fade" id="upload<?= $f['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel">Upload Ulang <?= $f['nama'] ?></h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url('users/editfilependaftaran') ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group" style="margin-bottom:0">
                <label><?= $f['nama'] ?></label>
                <input type="hidden" name="id" value="<?= $f['id'] ?>">
                <input type="hidden" name="oldfile" value="<?= $f['file'] ?>">
                <input type="hidden" name="nama" value="<?= $f['nama'] ?>">
                <input type="file" class="form-control" id="exampleFormControlFile1" name="files" style="padding:13px 16px">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batalkan</button>
              <button type="submit" class="btn btn-sm btn-primary">Kirim</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  <script>
    $(document).ready(function() {
      var no = 1;
      $('#tambah').click(function() {
        no++;
        if (no <= 3) {
          $('#dynamic').append('<div id="row' + no + '"><label for="exampleFormControlFile1" id="judul">Judul ' + no + '</label><div style="margin-top:0px;margin-bottom:10px;"><input name="judul[]" class="form-control" required rows="2" /></div></div>');
          $('#icon').append('<div id="row' + no + '" style="margin-top:65px"><a id="' + no + '" class="btn_remove"> <span class="fas fa-minus"></span></a><div>')
        }
        alert(no)
      });
      $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        no = 2
        $('#row' + button_id + '').remove();
        $('#row' + button_id + '').remove();
        no = no - 1;
        alert(no)
      });
    });
  </script>