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
      <h5>List Semua Informasi</h5>
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
      <a class="btn btn-primary" href="<?= base_url('admin/add_dtinfo') ?>" style="margin-left: 20px;"><span class="fas fa-fw fa-plus"></span> Informasi </a>
    </div>
    <div class="table-responsive admin-list">
      <table class="table">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" style="width:48px">No</th>
              <th scope="col" style="width:90px">&nbsp;</th>
              <th scope="col">Judul</th>
              <th scope="col">Deskripsi</th>
              <th scope="col">Upload</th>
              <th scope="col">Tanggal Upload</th>
              <th scope="col" class="action">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($dt_info)) : ?>
              <td colspan="6" style="background-color: whitesmoke;text-align:center">List Tempat kosong</td>
            <?php else : ?>
              <?php $no = 0;
              foreach ($dt_info as $t) : ?>
                <tr>
                  <td scope="row" style="width:60px"><?= ++$no ?></td>
                  <td style="width:90px">
                    <div class="img-wrapper">
                      <img src="<?= base_url('assets/img/informasi/thumbs/') . $t['images']; ?>" alt="">
                    </div>
                  </td>
                  <td><?= $t['title'] ?></td>
                  <td class="desc"><?= $t['body'] ?></td>
                  <td><?= $t['uploadby'] ?></td>
                  <td><?= $t['date'] ?></td>
                  <td class="action">
                    <a data-toggle="modal" data-target="#deletemodal<?= encrypt_url($t['id']); ?>"><span class="fas fa-trash"></span></a>
                    <a href="<?= base_url('admin/edit_dtinfo/') . encrypt_url($t['id']) ?>"><span class="fas fa-edit"></span></a>
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
  <?php foreach ($dt_info as $t) : ?>
    <div class="modal fade bd-example-modal-sm" id="deletemodal<?= encrypt_url($t['id']) ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-body">
            <!-- <input type="text" name="delete_id" id="delete_id" value="<?= encrypt_url($t['id']); ?>"> -->
            Hapus Info <?= $t['title']; ?> ?
          </div>
          <form action="deleteinfo" method="post" enctype="multipart/form-data">
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

  <style>
    .desc {
      white-space: nowrap;
      max-width: 0;
      overflow: hidden;
      text-overflow: ellipsis;
    }
  </style>

  <!-- Delete Data -->

  <script>
    $(document).ready(function() {
      $('.delete-btn').on('click', function() {
        var user_id = $(this).attr('id');
        alert(user_id)
      });
    });
  </script>