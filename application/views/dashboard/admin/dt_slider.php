  <!-- Main Container -->
  <main class="akun-container">
    <?php if (validation_errors()) : ?>
      <div class="alert alert-danger" role="alert">
        <?= validation_errors(); ?>
      </div>
    <?php endif; ?>
    <?= $this->session->flashdata('message'); ?>

    <div class="fik-section-title2">
      <span class="fas fa-door-open zzzz"></span>
      <h5>List Semua Info Slider</h5>
    </div>
    <div class="input-group">
      <div class="input-group-append">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-left:1px solid rgba(0,0,0,.1);">Urutkan</button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">A-Z</a>
          <a class="dropdown-item" href="#">Terbaru</a>
        </div>
      </div>
      <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Pencarian">
      <a class="btn btn-primary" href="<?= base_url('admin/add_dtslider') ?>" style="margin-left: 20px;"><span class="fas fa-fw fa-plus"></span> Slider Informasi </a>
    </div>
    <div class="table-responsive admin-list">
      <table class="table">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" style="width:48px">No</th>
              <th scope="col" style="width:40px">&nbsp;</th>
              <th scope="col">Judul</th>
              <th scope="col">Deskripsi</th>
              <th scope="col">Gambar</th>
              <th scope="col">Tanggal Upload</th>
              <th scope="col" class="action">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($dt_slider)) : ?>
              <td colspan="6" style="background-color: whitesmoke;text-align:center">List Info Slider kosong</td>
            <?php else : ?>
              <?php $no = 1 ?>
              <?php foreach ($dt_slider as $i) : ?>
                <tr>
                  <td scope="row" style="width:0px"><?= $no++ ?></td>
                  <td style="width:40px">
                  </td>
                  <td><?= $i['title'] ?></td>
                  <td><?= $i['body'] ?></td>
                  <td>
                    <div class="img-wrapper">
                      <img src="<?= base_url('assets/img/slider/') . $i['images']; ?>" alt="">
                    </div>
                  </td>
                  <td><?= $i['date'] ?></td>
                  <td class="action">
                    <a data-toggle="modal" id="<?= $i['date'] ?>" data-target=".bd-example-modal-sm"><span class="fas fa-trash"></span></a>
                    <a href="<?= base_url(); ?>admin/edit_dtslider/<?= $i['id'] ?>"><span class="fas fa-edit"></span></a>
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

  <div class="modal fade bd-example-modal-sm" id=tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          Hapus IK.04.04?
        </div>
        <form action="admin/delete_dtslider" method="post">
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>