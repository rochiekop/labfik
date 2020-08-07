  <!-- Main Container -->
  <main class="akun-container">

    <div class="fik-section-title2">
      <h4>Judul Tugas Akhir : <?= $title['judul'] ?></h4>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <?php if (empty($title)) : ?>
      <a data-toggle="modal" data-target="#judul" class="btn btn-sm btn-primary" style="color:#fff">Input Judul</a>
    <?php else : ?>
      <a data-toggle="modal" data-target="#viewjudul" class="btn btn-sm btn-primary" style="color:#fff">Edit</a>
      <?php if (count($cdosbing) < 2) : ?>
        <a data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-secondary" style="color:#fff">Pilih Dosen Pembimbing</a>
      <?php endif; ?>
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
          <?php if (empty($dosbing)) : ?>
            <td colspan="5" style="background-color: whitesmoke;text-align:center">Daftar dosen pembimbing kosong</td>
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

    <!-- <?php var_dump($cdosbing) ?> -->

  </main>
  <!-- End Main Container -->

  <!-- Modal judul -->
  <div class="modal fade" id="judul" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Input Judul TA</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('users/inputjudulta') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" id="id_mhs" name="id_mhs" value="<?= $mhs['id'] ?>">
            <div class="form-group">
              <input type="text" name="title" value="<?= set_value('title'); ?>" class="form-control" placeholder="Judul" required="required" autocomplete="off" />
              <?php echo form_error('title', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <input type="text" name="prodi" value="<?= $mhs['prodi']; ?>" class="form-control" placeholder="" required="required" autocomplete="off" disabled />
            </div>
            <div class="form-group">
              <input type="text" name="peminatan" value="<?= set_value('peminatan'); ?>" class="form-control" placeholder="Peminatan" required="required" autocomplete="off" />
              <?php echo form_error('peminatan', '<small class="text-danger">', '</small>'); ?>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batalkan</button>
            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- <?php var_dump($dosbing) ?> -->


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
              <input type="text" name="title" value="<?= $title['judul'] ?>" class="form-control" placeholder="Judul" required="required" autocomplete="off" />
              <?php echo form_error('title', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <input type="text" name="peminatan" value="<?= $title['peminatan'] ?>" class="form-control" placeholder="peminatan" required="required" autocomplete="off" />
              <?php echo form_error('peminatan', '<small class="text-danger">', '</small>'); ?>
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
  <!-- Modal Pengajuan -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Buat Pengajuan Dosen Pembimbing</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('users/pengajuandosbing') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="id_mhs" value="<?= $mhs['id'] ?>">
            <input type="hidden" id="id_guidance" name="id_guidance" value="<?= $title['id'] ?>">
            <div class="form-group">
              <select class="form-control" id="dosbing" name="dosbing" title="Pilih Dosen Pembimbing" required>
                <option value="">Pilih Dosen Pembimbing</option>
                <?php foreach ($dosen as $d) : ?>
                  <?php if ($d['prodi'] == $mhs['prodi']) : ?>
                    <option value="<?= $d['id'] ?>"><?= $d['name'] ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
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

  <!-- Modal Delete Pengajuan -->
  <?php foreach ($dosbing as $t) : ?>
    <div class="modal fade bd-example-modal-sm" id="<?= encrypt_url($t['id_dosbing']) ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-body">
            <?php if ($t['status'] == 'Menunggu Persetujuan') : ?>
              Batalkan Pengajuan ?
            <?php elseif ($t['status'] == 'Sudah Disetujui') : ?>
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