<style>
  .image-preview__image {
    display: none;
    width: 100%;
    /* height: 60%; */
    border-radius: 8px;
  }
</style>
<!-- Main Container -->
<main class="akun-container">
  <div class="fik-section-title2">
    <span class="fas fa-door-open zzzz"></span>
    <h5>Data Info Panel</h5>
  </div>
  <?php if (validation_errors()) : ?>
    <div class="alert alert-danger" role="alert">
      <?= validation_errors(); ?>
    </div>
  <?php endif; ?>
  <?= $this->session->flashdata('message'); ?>
  <?php if (empty($dt_panel)) : ?>
    <a href="<?= base_url('admin/add_dtpanel') ?>" class="btn btn-primary" style="margin-top: -10px; margin-bottom:10px"><span class="fas fa-fw fa-plus"></span> Info Panel </a>
    <div class="row">
      <div class="col-md-5" id="imagePreview">
        <img src="" alt="" class="fas fa-play-circle placeholder-img">
        <span class="placeholder-img1"></span>
      </div>
      <div class="col-md-7">
        <div class="card">
          <div class="card-body">
            <div class="custom-form">
              <div class="form-group">
                <input type="text" name="title" value="<?= set_value('title'); ?>" class="form-control" placeholder="" required="required" autocomplete="off" disabled="disabled" />
                <label>Judul</label>
                <small class="form-text text-danger"><?= form_error('title') ?>.</small>
              </div>
              <div class="form-group" style="margin-bottom:5px;">
                <textarea name="body" class="form-control" placeholder="" required="required" autocomplete="off" disabled="true"></textarea>
                <label>Deskripsi</label>
                <small class="form-text text-danger"><?= form_error('body') ?>.</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php else : ?>
    <div class="row">
      <div class="col-md-5" id="imagePreview">
        <video width="445px" controls class="" style="border-radius: 10px;">
          <source src="<?= base_url('assets/img/panel/') . $dt_panel['video']; ?>" type="video/mp4">
        </video>
        <span class="placeholder-img1"></span>
      </div>
      <div class="col-md-7">
        <div class="card">
          <div class="card-body">
            <div class="custom-form">
              <div class="form-group">
                <input type="text" name="title" value="<?= $dt_panel['title'] ?>" disabled class="form-control" />
              </div>
              <div class="form-group" style="margin-bottom:5px;">
                <textarea name="body" class="form-control" placeholder="" required="required" autocomplete="off" disabled="true"><?= $dt_panel['body']; ?></textarea>
                <label>Deskripsi</label>
              </div>
            </div>
            <div class="manage" style="font-size: 15px;margin-top:10px;float:right">
              <a href="<?= base_url('admin/editpanel/') . encrypt_url($dt_panel['id']) ?>"><span class="fas fa-edit"></span></a>
              <a data-toggle="modal" data-target="#deletemodal<?= encrypt_url($dt_panel['id']) ?>"><span class="fas fa-trash" style="padding-left: 10px;"></span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <!-- <?php var_dump($dt_panel) ?> -->
</main>
<!-- End Main Container -->

<!-- Modal -->
<div class="modal fade bd-example-modal-sm" id="deletemodal<?= encrypt_url($dt_panel['id']) ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body">
        Hapus Panel <?= $dt_panel['title']; ?> ?
      </div>
      <form action="deletepanel" method="post" enctype="multipart/form-data">
        <div class="modal-footer">
          <input type="hidden" id="id" name="id" value="<?= $dt_panel['id']; ?>">
          <input type="hidden" id="image" name="image" value="<?= $dt_panel['thumb']; ?>">
          <input type="hidden" id="video" name="video" value="<?= $dt_panel['video']; ?>">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
          <button type="submit" name="deletedata" class="btn btn-danger btn-sm">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script>
  const image = document.getElementById('exampleFormControlFile1');
  const previewContainer = document.getElementById('imagePreview');
  const previewImage = previewContainer.querySelector(".placeholder-img")
  const previewDefaultText = previewContainer.querySelector(".placeholder-img1")

  image.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      previewDefaultText.style.display = 'none';
      previewImage.style.display = "block";

      reader.addEventListener('load', function() {
        previewImage.setAttribute('src', this.result);
      });

      reader.readAsDataURL(file);
    } else {
      previewDefaultText.style.display = null;
      previewImage.style.display = null;
      previewImage.setAttribute('src', "");
    }

  });
</script>