  <!-- Main Container -->
  <main class="akun-container">
    <div class="fik-section-title2">
      <h4>Pendaftaran Tugas Akhir</h4>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <!-- <?php if ($statusfile == '') : ?>
    <?php elseif ($statusfile == "Disetujui Adminlaa" and empty($thesis_lecturers)) : ?>
      <div class="alert alert-warning">Selamat! pengajuan TA anda sudah disetujui oleh semua pihak, silakan tunggu <b>2x24 jam</b> untuk Koordinator TA memberikan dosen pembimbing anda, Terima kasih. <br> <a href="<?= base_url('Chat/getAllKoordinatorTA') ?>" class="btn btn-primary btn-sm" style="margin-top:6px;">Hubungi Koordinator TA</a> </div>
    <?php elseif (!empty($thesis_lecturers)) : ?>
      <div class="alert alert-success">Koordinator TA telah menambahkan <?= $dosbing1['name'] ?> dan <?= $dosbing2['name'] ?> sebagai dosen pembimbing tugas akhir anda,<br> <a href="<?= base_url('users/bimbingantugasakhir') ?>" class="btn btn-success btn-sm" style="margin-top:6px;">Mulai Bimbingan</a> </div>
    <?php endif; ?> -->
    <?php if (empty($file)) : ?>
      <button data-toggle="modal" data-target="#judul" class="btn btn-sm btn-primary" style="color:#fff">Daftar Tugas Akhir</button>
    <?php else : ?>
      <!-- <button data-toggle="modal" data-target="#judul" class="btn btn-sm btn-primary" style="color:#fff" disabled="disabled">Daftar Tugas Akhir</button> -->
      <button data-toggle="modal" data-target="#judul2" class="btn btn-sm btn-primary" style="color:#fff">Edit Judul</button>
    <?php endif; ?>
    <br><br>
    <?php echo form_error('filependaftaran', '<p class="help-block">', '</p>'); ?>
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
                  <?php if ($statusfile == "Dikirim") : ?>
                    <?php if ($k['status_doswal'] == 'Ditolak wali') :  ?>
                      <td>Ditolak wali dosen</td>
                      <td><a data-toggle="modal" data-target="#upload<?= $k['id'] ?>" class="badge badge-secondary" style="color:#fff">Upload</a></td>
                      <td><?= $k['komentar'] ?></td>
                    <?php elseif ($k['status_doswal'] == 'Disetujui wali' or $k['status_doswal'] == 'Dikirim') : ?>
                      <td><?= $k['status_doswal'] ?></td>
                      <td></td>
                      <td></td>
                    <?php elseif ($k['status_doswal'] == 'Update') : ?>
                      <td><?= $k['status_doswal'] ?></td>
                      <td></td>
                      <td><?= $k['komentar'] ?></td>
                    <?php elseif ($k['status_doswal'] == 'Update') : ?>
                      <td><?= $k['status_doswal'] ?></td>
                      <td></td>
                      <td><?= $k['komentar'] ?></td>
                    <?php endif; ?>
                    <!-- For Adminlaa -->
                  <?php elseif ($statusfile == "Disetujui wali" or $statusfile == "Disetujui Adminlaa" or $statusfile == "Disetujui Ketua KK") : ?>
                    <?php if ($k['status_adminlaa'] == 'Ditolak') :  ?>
                      <td>Ditolak Admin Laa</td>
                      <td><a data-toggle="modal" data-target="#upload<?= $k['id'] ?>" class="badge badge-secondary" style="color:#fff">Upload</a></td>
                      <td><?= $k['komentar'] ?></td>
                    <?php elseif ($k['status_adminlaa'] == 'Disetujui') : ?>
                      <td><?= $k['status_adminlaa'] ?> Admin Laa</td>
                      <?php if ($statusfile == "Disetujui Adminlaa" or $statusfile == "Disetujui Ketua KK") : ?>
                        <td><a data-toggle="modal" data-target="#view<?= $k['id'] ?>" class="badge badge-secondary" style="color:#fff">Lihat</a></td>
                      <?php endif; ?>
                      <td></td>
                      <td></td>
                    <?php elseif ($k['status_adminlaa'] == 'Dikirim') : ?>
                      <td>Dikirim ke adminlaa</td>
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
        <form action="<?= base_url('users/inputformpendaftaran') ?>" id="upload_form" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" id="id_mhs" name="id_mhs" value="<?= $mhs['id'] ?>">
            <div class="form-group">
              <label for="exampleFormControlFile1" id="judul">Judul 1</label>
              <input name="judul1" type="text" class="form-control" required value="<?= set_value('judul'); ?>">
              <?php echo form_error('judul', '<small class="text-danger">', '</small>'); ?>
              <!-- <div class="invalid-feedback">
                Please choose a username.
              </div> -->
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
            <?php if ($mhs['prodi'] == "Desain Komunikasi Visual") : ?>
              <div class="form-group">
                <label for="kosentrasi">Kosentrasi</label>
                <select name="peminatan" required class="form-control" id="peminatan">
                  <option value="">Pilih Kosentrasi</option>
                  <?php foreach ($kosentrasi as $k) { ?>
                    <option value="<?= $k['nama_child'] ?>">
                      <?= $k['nama_child'] ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
            <?php else : ?>
              <input type="hidden" name="peminatan" class="form-control" value="">
            <?php endif; ?>
            <div class="form-group">
              <label for="exampleFormControlFile1">Kartu Studi Mahasiswa (KSM)</label>
              <input type="file" class="form-control" name="filependaftaran[]" id="files1" required style="padding:13px 16px">
              <span id="chk-error1"></span>
            </div>
            <div class="row">
              <div class="col-lg-11" id="dynamic">
                <div class="form-group">
                  <label for="exampleFormControlFile1">Surat Pernyataan Tugas Akhir</label>
                  <input type="file" class="form-control" name="filependaftaran[]" id="files2" required style="padding:13px 16px">
                  <span id="chk-error2"></span>
                </div>
              </div>
              <div class="col-lg" style="margin-top: 40px;margin-left:-10px" id="icon">
                <a href="<?= base_url('assets/formtemplateta/1A. SURAT PERNYATAAN PENDAFTARAN TA.docx') ?>"> <span class="fas fa-download" title="Download Template"></span></a>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">Pendaftaran Test EPRT</label>
              <input type="file" class="form-control" name="filependaftaran[]" id="files3" required style="padding:13px 16px">
              <span id="chk-error3"></span>
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">Sertifikat TAK</label>
              <input type="file" class="form-control" name="filependaftaran[]" id="files4" required style="padding:13px 16px">
              <span id="chk-error4"></span>
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">Proposal TA</label>
              <input type="file" class="form-control" name="filependaftaran[]" id="files5" required style="padding:13px 16px">
              <span id="chk-error5"></span>
            </div>
            <font color="red">
              *) file harus format pdf <br>
              *) maximal upload kurang dari 10 MB
            </font>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-sm btn-primary" name="daftar" id="btn_daftar" value="Daftar">Daftar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal judul 2 -->
  <div class="modal fade" id="judul2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Form Pendaftaran Tugas Akhir</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('users/inputformpendaftaran') ?>" id="upload_form" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" id="id_mhs" name="id_mhs" value="<?= $mhs['id'] ?>">
            <div class="form-group">
              <label for="exampleFormControlFile1" id="judul">Judul 1</label>
              <input name="judul1" pattern="[^()/<>[\]\\,'|\x22]+" type="text" class="form-control" required value="<?= set_value('judul'); ?>">
              <?php echo form_error('judul', '<small class="text-danger">', '</small>'); ?>
              <!-- <div class="invalid-feedback">
                Please choose a username.
              </div> -->
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1" id="judul">Judul 2</label>
              <input name="judul2" pattern="[^()/<>[\]\\,'|\x22]+" class="form-control" value="<?= set_value('judul'); ?>">
              <?php echo form_error('judul2', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1" id="judul">Judul 3</label>
              <input name="judul3" pattern="[^()/<>[\]\\,'|\x22]+" class="form-control" value="<?= set_value('judul'); ?>">
              <?php echo form_error('judul3', '<small class="text-danger">', '</small>'); ?>
            </div>
            <?php if ($mhs['prodi'] == "Desain Komunikasi Visual") : ?>
              <div class="form-group">
                <label for="kosentrasi">Kosentrasi</label>
                <select name="peminatan" required class="form-control" id="peminatan">
                  <option value="">Pilih Kosentrasi</option>
                  <?php foreach ($kosentrasi as $k) { ?>
                    <option value="<?= $k['nama_child'] ?>">
                      <?= $k['nama_child'] ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
            <?php else : ?>
              <input type="hidden" name="peminatan" class="form-control" value="">
            <?php endif; ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-sm btn-primary" name="daftar" id="btn_daftar" value="Daftar">Simpan</button>
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

    $("#files1").change(function() {
      var allowedTypes = ['application/pdf'];
      var maxsize = 6000000;
      var size = this.files[0].size;
      var fileType = this.files[0].type;
      if (!allowedTypes.includes(fileType)) {
        jQuery("#chk-error1").html('<small class="text-danger">Masukkan file dengan format *pdf</small>');
        $("#files1").val('');
        return false;
      } else {
        jQuery("#chk-error1").html('');
        if (size > maxsize) {
          jQuery("#chk-error1").html('<small class="text-danger">Ukuran file melebihi batas maksimal upload (*6 Mb)</small>');
          $("#files1").val('');
          return false;
        } else {
          jQuery("#chk-error1").html('');
        }
      }
    });
    $("#files2").change(function() {
      var allowedTypes = ['application/pdf'];
      var maxsize = 6000000;
      var size = this.files[0].size;
      var fileType = this.files[0].type;
      if (!allowedTypes.includes(fileType)) {
        jQuery("#chk-error2").html('<small class="text-danger">Masukkan file dengan format *pdf</small>');
        $("#files2").val('');
        return false;
      } else {
        jQuery("#chk-error2").html('');
        if (size > maxsize) {
          jQuery("#chk-error2").html('<small class="text-danger">Ukuran file melebihi batas maksimal upload (*6 Mb)</small>');
          $("#files2").val('');
          return false;
        } else {
          jQuery("#chk-error2").html('');
        }
      }
    });
    $("#files3").change(function() {
      var allowedTypes = ['application/pdf'];
      var maxsize = 6000000;
      var size = this.files[0].size;
      var fileType = this.files[0].type;
      if (!allowedTypes.includes(fileType)) {
        jQuery("#chk-error3").html('<small class="text-danger">Masukkan file dengan format *pdf</small>');
        $("#files3").val('');
        return false;
      } else {
        jQuery("#chk-error3").html('');
        if (size > maxsize) {
          jQuery("#chk-error3").html('<small class="text-danger">Ukuran file melebihi batas maksimal upload (*6 Mb)</small>');
          $("#files3").val('');
          return false;
        } else {
          jQuery("#chk-error3").html('');
        }
      }
    });
    $("#files4").change(function() {
      var allowedTypes = ['application/pdf'];
      var maxsize = 6000000;
      var size = this.files[0].size;
      var fileType = this.files[0].type;
      if (!allowedTypes.includes(fileType)) {
        jQuery("#chk-error4").html('<small class="text-danger">Masukkan file dengan format *pdf</small>');
        $("#files4").val('');
        return false;
      } else {
        jQuery("#chk-error4").html('');
        if (size > maxsize) {
          jQuery("#chk-error4").html('<small class="text-danger">Ukuran file melebihi batas maksimal upload (*6 Mb)</small>');
          $("#files4").val('');
          return false;
        } else {
          jQuery("#chk-error4").html('');
        }
      }
    });
    $("#files5").change(function() {
      var allowedTypes = ['application/pdf'];
      var maxsize = 6000000;
      var size = this.files[0].size;
      var fileType = this.files[0].type;
      if (!allowedTypes.includes(fileType)) {
        jQuery("#chk-error5").html('<small class="text-danger">Masukkan file dengan format *pdf</small>');
        $("#files5").val('');
        return false;
      } else {
        jQuery("#chk-error5").html('');
        if (size > maxsize) {
          jQuery("#chk-error5").html('<small class="text-danger">Ukuran file melebihi batas maksimal upload (*6 Mb)</small>');
          $("#files5").val('');
          return false;
        } else {
          jQuery("#chk-error5").html('');
        }
      }
    });
    $('#upload_form').submit(function(event) {
      var sendbtn = document.getElementById('btn_daftar');
      sendbtn.disabled = true;
    });
  </script>