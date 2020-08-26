  <!-- Main Container -->
  <main class="akun-container">

    <div class="fik-section-title2">
      <h4>Pendaftaran Tugas Akhir</h4>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <?php if (empty($title)) : ?>
      <a data-toggle="modal" data-target="#judul" class="btn btn-sm btn-primary" style="color:#fff">Daftar Tugas Akhir</a>
    <?php else : ?>
      <a data-toggle="modal" data-target="#viewjudul" class="btn btn-sm btn-primary" style="color:#fff">Edit</a>
      <!-- <?php if (count($cdosbing) < 2) : ?>
        <a data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-secondary" style="color:#fff">Pilih Dosen Pembimbing</a>
      <?php endif; ?> -->
    <?php endif; ?>
    <br>
    <!-- <?php var_dump($cdosbing) ?> -->
    <br>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Dosen Pembimbing</th>
            <th scope="col">Tanggal Pengajuan</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($title)) : ?>
            <td colspan="5" style="background-color: whitesmoke;text-align:center">Kamu belum mengajukan pendaftaran tugas akhir</td>
          <?php elseif ($title['status'] == 'Dikirim') : ?>
            <td colspan="5" style="background-color: whitesmoke;text-align:center">Permintaan anda sedang diproses....</td>
          <?php else : ?>
            <?php $no = 0;
            foreach ($dosbing as $t) : ?>
              <tr>
                <th scope="row"><?= ++$no ?></th>
                <td><?= $t['nama_dosen'] ?></td>
                <td><?= format_indo($t['date'], date('d-m-Y')); ?></td>
                <td><?= $t['status'] ?></td>
                <?php if ($t['status'] != "Ditolak") : ?>
                  <td><a data-toggle="modal" data-target="#<?= encrypt_url($t['id_dosbing']); ?>" class="badge badge-danger" style="color:white">Batalkan</a></td>
                <?php else : ?>
                  <td><a data-toggle="modal" data-target="#<?= encrypt_url($t['id_dosbing']); ?>" class="badge badge-danger" style="color:white">Hapus</a></td>
                <?php endif; ?>
                <td></td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
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
            <div class="row">
              <div class="col-lg-11" id="dynamic">
                <div class="form-group">
                  <label for="exampleFormControlFile1" id="judul">Judul 1</label>
                  <textarea name="title[]" class="form-control" required rows="2"><?= set_value('title'); ?></textarea>
                  <?php echo form_error('title', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
              <div class="col-lg" style="margin-top: 45px;margin-left:-10px" id="icon">
                <a id="tambah"> <span class="fas fa-plus"></span></a>
              </div>
            </div>
            <div class="form-group">
              <label for="kosentrasi">Kosentrasi</label>
              <input type="text" name="peminatan" value="<?= set_value('peminatan'); ?>" class="form-control" placeholder="" required="required" autocomplete="off" />
              <?php echo form_error('peminatan', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">Formulir Pendaftaran</label>
              <input type="file" class="form-control" name="filependaftaran" required style="padding:13px 16px">
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
  <!-- Modal Edit judul -->
  <div class="modal fade" id="viewjudul" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Edit Judul TA</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('users/editjudulta') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" id="id" name="id" value="<?= $title['id'] ?>">
            <div class="form-group">
              <label for="dosenwali">Judul</label>
              <input type="text" name="title" value="<?= $title['judul'] ?>" class="form-control" placeholder="Judul" required="required" autocomplete="off" />
              <?php echo form_error('title', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="dosenwali">Kosentrasi</label>
              <input type="text" name="peminatan" value="<?= $title['peminatan'] ?>" class="form-control" placeholder="peminatan" required="required" autocomplete="off" />
              <?php echo form_error('peminatan', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="dosenwali">Dosen Wali</label>
              <input type="text" name="dosenwali" value="<?= $title['dosen_wali'] ?>" class="form-control" placeholder="" required="required" autocomplete="off" />
              <?php echo form_error('dosenwali', '<small class="text-danger">', '</small>'); ?>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batalkan</button>
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Delete Pengajuan -->
  <?php foreach ($dosbing as $t) : ?>
    <div class="modal fade bd-example-modal-sm" id="<?= encrypt_url($t['id_dosbing']) ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-body">
            <?php if ($t['status'] == 'Menunggu Persetujuan') : ?>
              Batalkan Pengajuan ?
            <?php elseif ($t['status'] == 'Disetujui') : ?>
              Batalkan Sebagai Dosen Pembimbing Kamu?
            <?php endif; ?>
          </div>
          <form action="deletepengajuandosbing" method="post" enctype="multipart/form-data">
            <div class="modal-footer">
              <input type="hidden" id="id" name="id" value="<?= $t['id_dosbing']; ?>">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
              <button type="submit" name="deletedata" class="btn btn-danger btn-sm">Batalkan</button>
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
          $('#dynamic').append('<div id="row' + no + '"><label for="exampleFormControlFile1" id="judul">Judul ' + no + '</label><div style="margin-top:0px;margin-bottom:10px;"><textarea name="title[]" class="form-control" required rows="2"></textarea></div></div>');
          $('#icon').append('<div id="row' + no + '" style="margin-top:75px"><a id="' + no + '" class="btn_remove"> <span class="fas fa-minus"></span></a><div>')
        } else {
          no = 1;
        }
        alert(no)
      });
      $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
        $('#row' + button_id + '').remove();
        no = no - 1;
        alert(no)
      });
    });
  </script>