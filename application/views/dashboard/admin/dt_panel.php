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
</main>
<!-- End Main Container -->
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