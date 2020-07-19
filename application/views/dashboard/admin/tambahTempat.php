<!-- Main Container -->
<main class="akun-container">
  <div class="fik-section-title2">
    <span class="fas fa-door-open zzzz"></span>
    <h5>Tambah Tempat</h5>
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
              <div class="form-group" style="margin-bottom:12px">
                <input type="text" name="ruangan" value="<?= set_value('ruangan'); ?>" class="form-control" placeholder="" required="required" autocomplete="off" />
                <label>Ruangan</label>
                <?php echo form_error('ruangan', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="lab-category" style="margin-bottom:16px;">
                <b>Kategori</b>
                <?php $no = 0;
                foreach ($kruangan as $k) : ?>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" checked="checked" name="kategori" id=<?= "inlineRadio" . $k['id'] ?> value="<?= $k['id'] ?>">
                    <label class="form-check-label" for=<?= "inlineRadio" . $k['id'] ?>><?= $k['kategori'] ?></label>
                  </div>
                <?php endforeach; ?>
              </div>
              <div class="form-group" style="margin-bottom:16px">
                <input type="text" name="kapasitas" value="<?= set_value('kapasitas'); ?>" class="form-control" placeholder="" required="required" autocomplete="off" />
                <label>Kapasitas</label>
                <?php echo form_error('kapasitas', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="lab-category" id="sectionForm" style="margin-bottom:16px;">
                <b>Akses</b>
                <div class="form-check options">
                  <input class="form-check-input" type="checkbox" name="akses[]" id="checkbox11" value="Dosen">
                  <label class="form-check-label" for="checkbox11">Dosen</label>
                </div>
                <div class="form-check options" id="cek">
                  <input class="form-check-input" type="checkbox" name="akses[]" id="checkbox12" value="Mahasiswa" checked="checked">
                  <label class="form-check-label" for="checkbox12">Mahasiswa</label>
                </div>
              </div>
            </div>
            <div class="form-group" style="margin-bottom:0;">
              <label for="exampleFormControlFile1"><b>Tambahkan Gambar</b></label>
              <input type="file" class="form-control" name="image" id="exampleFormControlFile1" style="padding:13px 16px">
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-primary" id="add">Tambah</button>
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
  $('input[name="kategori"]').first().prop('checked', true)

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

  // $(document).ready(function() {
  //   $('#add').click(function() {
  //     checked = $("input[type=checkbox]:checked").length;

  //     if (!checked) {
  //       alert("You must check at least one checkbox.");
  //       return false;
  //     }

  //   });
  // });
</script>