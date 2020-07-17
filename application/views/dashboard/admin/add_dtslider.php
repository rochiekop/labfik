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
    <h5>Tambah Info Slider</h5>
  </div>
  <div class="row">

    <div class="col-md-4" id="imagePreview">
      <img src="" alt="" class="fas fa-image placeholder-img">
      <span class="placeholder-img1"></span>
    </div>
    <div class="col-md-8">
      <div class="card">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="custom-form">
              <div class="form-group">
                <input type="text" name="title" value="<?= set_value('title'); ?>" class="form-control" placeholder="" required="required" autocomplete="off" />
                <label>Judul</label>
                <small class="form-text text-danger"><?= form_error('title') ?>.</small>
              </div>
              <div class="form-group" style="margin-bottom:5px;">
                <textarea name="body" class="form-control" placeholder="" required="required" autocomplete="off"><?= set_value('body'); ?></textarea>
                <small class="form-text text-danger"><?= form_error('body') ?>.</small>
                <label>Deskripsi</label>
              </div>
            </div>
            <div class="form-group" style="margin-bottom:0;">
              <label for="exampleFormControlFile1"><b>Tambahkan Gambar</b></label>
              <input type="file" class="form-control" name="image" id="exampleFormControlFile1" style="padding:13px 16px">
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-primary" type="submit" name="submit">Tambah</button>
          </div>
        </form>
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