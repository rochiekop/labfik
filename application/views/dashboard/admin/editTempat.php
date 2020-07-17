<!-- Main Container -->
<main class="akun-container">
  <div class="fik-section-title2">
    <span class="fas fa-door-open zzzz"></span>
    <h5>Edit Tempat</h5>
  </div>
  <div class="row">
    <div class="col-md-4" id="imagePreview">
      <?php if ($tempatbyid['images'] != "default.jpg") : ?>
        <img src="<?= base_url('assets/img/ruangan/') . $tempatbyid['images'] ?>" alt="<?= $tempatbyid['ruangan'] ?>" class="placeholder-img">
      <?php else : ?>
        <img src="<?= base_url('assets/img/ruangan/default.jpg'); ?>" alt="<?= $tempatbyid['ruangan'] ?>" class="placeholder-img">
      <?php endif; ?>
      <span class="placeholder-img1"></span>
    </div>
    <div class="col-md-8">
      <div class="card">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="custom-form">
              <div class="form-group" style="margin-bottom:12px">
                <input type="text" name="ruangan" value="<?= $tempatbyid['ruangan']; ?>" class="form-control" placeholder="" required="required" autocomplete="off" />
                <label>Ruangan</label>
                <?php echo form_error('ruangan', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="lab-category" style="margin-bottom:16px;">
                <b>Kategori</b>
                <?php $no = 0;
                foreach ($kruangan as $k) : ?>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="kategori" id=<?= "inlineRadio" . $k['id'] ?> value="<?= $k['id'] ?>" <?php if ($tempatbyid['id_kategori'] == $k['id']) {
                                                                                                                                              echo ('checked="checked"');
                                                                                                                                            } ?>>
                    <label class="form-check-label" for=<?= "inlineRadio" . $k['id'] ?>><?= $k['kategori'] ?></label>
                  </div>
                <?php endforeach; ?>
              </div>
              <div class="lab-category" id="sectionForm" style="margin-bottom:16px;">
                <b>Akses</b>
                <div class="form-check options">
                  <input class="form-check-input" type="checkbox" name="akses[]" id="checkbox11" value="Dosen" <?php if ($tempatbyid['akses'] == 'Dosen' or $tempatbyid['akses'] == 'Dosen,Mahasiswa') {
                                                                                                                  echo ('checked="checked"');
                                                                                                                } ?>>
                  <label class="form-check-label" for="checkbox11">Dosen</label>
                </div>
                <div class="form-check options" id="cek">
                  <input class="form-check-input" type="checkbox" name="akses[]" id="checkbox12" value="Mahasiswa" <?php if ($tempatbyid['akses'] == 'Mahasiswa' or $tempatbyid['akses'] == 'Dosen,Mahasiswa') {
                                                                                                                      echo ('checked="checked"');
                                                                                                                    } ?>>
                  <label class="form-check-label" for="checkbox12">Mahasiswa</label>
                </div>
              </div>
            </div>
            <input type="hidden" value="<?= $tempatbyid['images'] ?>" class="form-control" name="image!updated">
            <div class="form-group" style="margin-bottom:0;">
              <label for="exampleFormControlFile1"><b>Ganti Gambar</b></label>
              <input type="file" class="form-control" name="image" id="exampleFormControlFile1" style="padding:13px 16px">
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-primary" id="add">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
<!-- End Main Container -->

<!-- <script src="<?= base_url('assets/js/checkbox.js'); ?>"></script> -->

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