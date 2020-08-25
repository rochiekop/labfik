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
                <th scope="col">Formulir</th>
                <th scope="col">View file</th>
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
                    <td><?= $k['form_pendaftaran'] ?></td>
                    <td>
                      <a data-toggle="modal" data-target="#view<?= encrypt_url($k['id']); ?>">view</a>
                    </td>
                    <td class="action">
                      <a data-toggle="modal" data-target="#deletemodal<?= encrypt_url($k['id']); ?>"><span class="fas fa-times" title="Tolak"></span></a>
                      <a href="<?= base_url('adminlaa/terimapendaftaran/') . encrypt_url($k['id']); ?>"><span class="fas fa-check" title="Terima"></span></a>
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
            Tolak Pendaftar ?
          </div>
          <form action="deletependaftarta" method="post" enctype="multipart/form-data">
            <div class="modal-footer">
              <input type="hidden" id="id" name="id" value="<?= $t['id']; ?>">
              <input type="hidden" id="id" name="username" value="<?= $t['username']; ?>">
              <input type="hidden" id="id" name="file" value="<?= $t['form_pendaftaran']; ?>">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
              <button type="submit" name="deletedata" class="btn btn-danger btn-sm">Tolak</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

  <?php foreach ($mhs as $t) : ?>
    <div class="modal fade" id="view<?= encrypt_url($k['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
      <div class="modal-dialog wide" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel">Form Pendaftaran</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php if (substr($t['form_pendaftaran'], -3) == 'pdf') : ?>
              <embed type="application/pdf" src="<?= base_url('assets/upload/thesis/') . $t['username'] . '/' . $t['form_pendaftaran'] ?>" width="100%" height="600px" />
            <?php elseif (substr($t['form_pendaftaran'], -3) == 'docx') : ?>
              <embed type="application/docx" src="<?= base_url('assets/upload/thesis/') . $t['username'] . '/' . $t['form_pendaftaran'] ?>" width="100%" height="600px" />
            <?php else : ?>
              <img src="<?= base_url('assets/upload/thesis/') . $t['username'] . '/' . $t['form_pendaftaran'] ?>" alt="" width="100%">
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>