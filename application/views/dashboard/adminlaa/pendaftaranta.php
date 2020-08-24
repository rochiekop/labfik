  <!-- Main Container -->
  <main class="akun-container">
    <?= $this->session->flashdata('message'); ?>
    <div class="fik-section-title2">
      <span class="fas fa-door-open zzzz"></span>
      <h5>Pendaftar Tugas Akhir</h5>
    </div>
    <div class="input-group">
      <div class="input-group-append">
        <button class="btn btn-primary dropdown-toggle" id="filter" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-left:1px solid rgba(0,0,0,.1);">Filter</button>
        <div class="dropdown-menu">
          <a class="dropdown-item item">Semua</a>
          <a class="dropdown-item item">Lab</a>
          <a class="dropdown-item item">Kelas</a>
          <a class="dropdown-item item">Studio</a>
        </div>
      </div>
      <input type="text" class="form-control" id="keyword" aria-label="Text input with dropdown button" placeholder="Pencarian">
    </div>
    <div id="#">
      <div class="table-responsive admin-list">
        <table class="table">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" style="width:60px">#</th>
                <th scope="col">Nama</th>
                <th scope="col">NIM</th>
                <th scope="col">Prodi</th>
                <th scope="col">Kosentrasi</th>
                <th scope="col">Dosen wali</th>
                <th scope="col">Status</th>
                <th scope="col" class="action">Aksi</th>
              </tr>
            </thead>
            <tbody id="container">
              <?php if (empty($mhs)) : ?>
                <td colspan="8" style="background-color: whitesmoke;text-align:center">Pendaftar tugas akhir kosong</td>
              <?php else : ?>
                <?php $no = 0;
                foreach ($mhs as $k) : ?>
                  <tr>
                    <td scope="row" style="width:60px"><b><?= ++$no ?></b></td>
                    <td><?= $k['name'] ?></td>
                    <td><?= $k['nim'] ?></td>
                    <td><?= $k['prodi'] ?></td>
                    <td><?= $k['peminatan'] ?></td>
                    <td><?= $k['dosen_wali'] ?></td>
                    <td><?= $k['status'] ?></td>
                    <td class="action">
                      <a data-toggle="modal" data-target="#deletemodal<?= encrypt_url($k['id']); ?>"><span class="fas fa-trash" title="Hapus"></span></a>
                      <a data-toggle="modal" data-target="#addmodal<?= encrypt_url($k['id']); ?>"><span class="fas fa-plus" title="Tambah Pembimbing"></span></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </table>
      </div>
    </div>
  </main>
  <!-- End Main Container -->

  <?php foreach ($mhs as $t) : ?>
    <div class="modal fade bd-example-modal-sm" id="deletemodal<?= encrypt_url($t['id']) ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-body">
            Hapus Info Pendaftar ?
          </div>
          <form action="deletependaftarta" method="post" enctype="multipart/form-data">
            <div class="modal-footer">
              <input type="hidden" id="id" name="id" value="<?= $t['id']; ?>">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
              <button type="submit" name="deletedata" class="btn btn-danger btn-sm">Hapus</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

  <?php foreach ($mhs as $t) : ?>
    <div class="modal fade" id="addmodal<?= encrypt_url($t['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel">Dosen Pembimbing</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url('adminlaa/pengajuandosbing') ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <!-- <input type="hidden" name="id_guidance" value="<?= $t['id'] ?>"> -->
              <input type="hidden" id="id_guidance" name="id_guidance" value="<?= $t['id'] ?>">
              <label for="">Pembimbing 1</label>
              <div class="form-group">
                <select class="form-control" id="dosbing" name="dosbing" title="Pilih Dosen Pembimbing" required>
                  <option value="">Pilih Dosen Pembimbing 1</option>
                  <?php foreach ($dosen as $d) : ?>
                    <?php if ($d['prodi'] == $t['prodi']) : ?>
                      <option value="<?= $d['id'] ?>"><?= $d['name'] ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
              <label for="">Pembimbing 2</label>
              <div class="form-group">
                <select class="form-control" id="dosbing" name="dosbing" title="Pilih Dosen Pembimbing" required>
                  <option value="">Pilih Dosen Pembimbing 2</option>
                  <?php foreach ($dosen as $d) : ?>
                    <?php if ($d['prodi'] == $t['prodi']) : ?>
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
  <?php endforeach; ?>