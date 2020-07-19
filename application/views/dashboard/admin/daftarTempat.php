  <!-- Main Container -->
  <main class="akun-container">
    <?= $this->session->flashdata('message'); ?>
    <div class="fik-section-title2">
      <span class="fas fa-door-open zzzz"></span>
      <h5>List Semua Tempat</h5>
    </div>
    <div class="input-group">
      <div class="input-group-append">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius:5px 0 0 5px">Kategori</button>
        <div class="dropdown-menu">
          <?php if (!empty($kruangan)) : ?>
            <?php foreach ($kruangan as $k) : ?>
              <a class="dropdown-item" href="#"><?= $k['kategori']; ?></a>
            <?php endforeach; ?>
          <?php else : ?>
            <a class="dropdown-item" href="#">Kategori 1</a>
            <a class="dropdown-item" href="#">Kategori 2</a>
            <a class="dropdown-item" href="#">Kategori 3</a>
          <?php endif; ?>
        </div>
      </div>
      <div class="input-group-append">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-left:1px solid rgba(0,0,0,.1);">Urutkan</button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">A-Z</a>
          <a class="dropdown-item" href="#">Terbaru</a>
          <a class="dropdown-item" href="#">Dosen</a>
          <a class="dropdown-item" href="#">Mahasiswa</a>
        </div>
      </div>
      <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Pencarian">
    </div>
    <div class="table-responsive admin-list">
      <table class="table">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" style="width:48px">No</th>
              <th scope="col" style="width:90px">&nbsp;</th>
              <th scope="col">Ruangan</th>
              <th scope="col">Kategori</th>
              <th scope="col">Akses</th>
              <th scope="col">Kapasitas</th>
              <th scope="col" class="action">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($dtempat)) : ?>
              <td colspan="6" style="background-color: whitesmoke;text-align:center">List Tempat kosong</td>
            <?php else : ?>
              <?php $no = 0;
              foreach ($dtempat as $t) : ?>
                <tr>
                  <td scope="row" style="width:60px"><?= ++$no ?></td>
                  <td style="width:90px">
                    <div class="img-wrapper">
                      <img src="<?= base_url('assets/img/ruangan/') . $t['images']; ?>" alt="">
                    </div>
                  </td>
                  <td><?= $t['ruangan'] ?></td>
                  <td><?= $t['kategori'] ?></td>
                  <td><?= $t['akses'] ?></td>
                  <td><?= $t['kapasitas'] ?></td>
                  <td class="action">
                    <a data-toggle="modal" data-target="#<?= encrypt_url($t['id']) ?>"><span class="fas fa-trash"></span></a>
                    <a href="<?= base_url('admin/edittempat/') . encrypt_url($t['id']) ?>?>"><span class="fas fa-edit"></span></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </table>
    </div>
  </main>
  <!-- End Main Container -->

  <!-- Modal Delete -->
  <?php foreach ($dtempat as $t) : ?>
    <div class="modal fade bd-example-modal-sm" id="<?= encrypt_url($t['id']) ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-body">
            Hapus Ruangan <?= $t['ruangan']; ?> ?
          </div>
          <form action="deleteruangan" method="post" enctype="multipart/form-data">
            <div class="modal-footer">
              <input type="hidden" id="id" name="id" value="<?= $t['id']; ?>">
              <input type="hidden" id="image" name="image" value="<?= $t['images']; ?>">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
              <button type="submit" name="deletedata" class="btn btn-danger btn-sm">Hapus</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>