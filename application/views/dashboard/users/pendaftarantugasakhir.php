  <!-- Main Container -->
  <main class="akun-container">

    <div class="fik-section-title2">
      <h4>Pendaftaran Tugas Akhir</h4>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <?php if (empty($title)) : ?>
      <a data-toggle="modal" data-target="#judul" class="btn btn-sm btn-primary" style="color:#fff">Daftar Tugas Akhir</a>
    <?php else : ?>
      <button data-toggle="modal" data-target="#judul" class="btn btn-sm btn-primary" style="color:#fff" disabled="disabled">Daftar Tugas Akhir</button>
    <?php endif; ?>
    <br>
    <br>
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
              <th scope="col" style="width:120px">Aksi</th>
              <th scope="col" style="width:35%;">Keterangan & Status</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 0;
            foreach ($file as $k) : ?>
              <tr>
                <td><?= $k['nama'] ?></td>
                <?php if ($k['status'] == 'Ditolak') : ?>
                  <td></td>
                <?php else : ?>
                  <td><?= $k['status'] ?></td>
                <?php endif; ?>
                <?php if ($k['status'] == 'Ditolak Admin LAA' or $k['status'] == 'Ditolak Dosen Wali') : ?>
                  <td><a data-toggle="modal" data-target="#upload<?= $k['id'] ?>" class="badge badge-secondary" style="color:#fff">Upload</a></td>
                <?php else : ?>
                  <td></td>
                <?php endif ?>
                <?php if ($k['status'] != 'Tolak') : ?>
                  <td></td>
                <?php else : ?>
                  <td><?= $k['komentar'] ?></td>
                <?php endif; ?>
              </tr>
            <?php endforeach; ?>
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
                <input type="text" name="oldfile" value="<?= $f['file'] ?>">
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