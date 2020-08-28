<main class="akun-container">
    <?php

    if (isset($error)) {
        echo '<p class="alert alert-warning">';
        echo $error;
        echo '</p>';
    }

    echo validation_errors('<div class="alert alert-warning">', '</div>');

    echo form_open_multipart(base_url('auth/editprofilemhs'), 'class="form-horizontal"');
    ?>
    <?= $this->session->flashdata('message'); ?>
    <div class="fik-section-title2">
        <span class="fas fa-door-open zzzz"></span>
        <h5><?= $title ?></h5>
    </div>
    <div class="row">
        <div class="col-md-4" id="imagePreview">
            <img src="<?= base_url('assets/img/profile/' . $user['images']) ?>" alt="" class="fas fa-image placeholder-img">
            <span class="placeholder-img1"></span>
        </div>
        <div class="col-md-8">
            <div class="card">
                <form action="#">
                    <div class="card-body">
                        <div class="custom-form">
                            <div class="form-group">
                                <input type="text" name="name" value="<?= $user['name'] ?>" class="form-control" placeholder="Name" required="required" autocomplete="off" />
                                <label>Nama</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nim" placeholder="Nim" value="<?= $user['nim'] ?>" class="form-control" required="required" autocomplete="off" />
                                <label>Nim</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" value="<?= $user['email'] ?>" class="form-control" autocomplete="off" readonly />
                                <label>Email</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="prodi" value="<?= $user['prodi'] ?>" class="form-control" placeholder="Prodi" required="required" autocomplete="off" />
                                <label>Prodi</label>
                            </div>
                            <select name="dosenwali" required class="form-control" style="margin-bottom: 15px;">
                                <option value="">Pilih Dosen Wali</option>
                                <?php foreach ($dosen as $doswal) { ?>
                                    <?php if ($user['dosen_wali'] == $doswal['id']) : ?>
                                        <option value="<?= $doswal['id'] ?>" selected>
                                            <?= $doswal['kode_dosen'] . ' - ' . $doswal['name'] ?>
                                        </option>
                                    <?php else : ?>
                                        <option value="<?= $doswal['id'] ?>">
                                            <?= $doswal['kode_dosen'] . ' - ' . $doswal['name'] ?>
                                        </option>
                                    <?php endif; ?>
                                <?php } ?>
                            </select>
                            <div class="form-group">
                                <input type="text" name="alamat" value="<?= $user['alamat'] ?>" class="form-control" placeholder="Prodi" required="required" autocomplete="off" />
                                <label>Alamat</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nohp" value="<?= $user['no_telp'] ?>" class="form-control" placeholder="" required="required" autocomplete="off" />
                                <label>No. Hp</label>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom:0;">
                            <label for="exampleFormControlFile1"><b>Pilih Gambar</b></label>
                            <input type="file" name="images" class="form-control" id="exampleFormControlFile1" style="padding:13px 16px">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?= form_close(); ?>
</main>
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