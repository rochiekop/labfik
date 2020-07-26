<main class="akun-container">
    <?php

    if (isset($error)) {
        echo '<p class="alert alert-warning">';
        echo $error;
        echo '</p>';
    }

    echo validation_errors('<div class="alert alert-warning">', '</div>');

    echo form_open_multipart(base_url('karya/edit/' . $tampilan->id_tampilan), 'class="form-horizontal"');
    ?>

    <div class="fik-section-title2">
        <span class="fas fa-door-open zzzz"></span>
        <h5><?= $title ?></h5>
    </div>
    <div class="row">
        <div class="col-md-4" id="imagePreview">
            <img src="" alt="" class="fas fa-image placeholder-img">
            <span class="placeholder-img1"></span>
        </div>
        <div class="col-md-8">
            <div class="card">
                <form action="#">
                    <div class="card-body">
                        <div class="custom-form">
                            <div class="form-group">
                                <input type="text" name="judul" value="<?= $tampilan->judul ?>" class="form-control" placeholder="Judul Karya" required="required" autocomplete="off" />
                                <label>Judul</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nim" placeholder="Nim" value="<?= $tampilan->nim ?>" class="form-control" required="required" autocomplete="off" />
                                <label>Nim</label>
                            </div>
                            <div class="form-group">
                                <textarea type="deskripsi" rows="5" name="deskripsi" class="form-control" value="<?= $tampilan->deskripsi ?>" required="required" autocomplete="off"></textarea>
                                <label>Deskripsi</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="keywords" class="form-control" placeholder="Keywords" value="<?= $tampilan->keywords ?>" required="required" autocomplete="off" />
                                <label>Keywords</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="kode_tampilan" class="form-control" placeholder="kode tampilan" value="<?= $tampilan->kode_tampilan ?>" required="required" autocomplete="off" />
                                <label>Kode Tampilan</label>
                            </div>
                            <div class="lab-category" style="margin-bottom:16px;">
                                <b>Prodi</b>
                                <select name="id_kategori" class="form-control" id="prodi">
                                    <option value="">Select Prodi</option>
                                    <?php foreach ($kategori as $kategori) { ?>
                                        <option value="<?= $kategori->id_kategori ?>">
                                            <?= $kategori->nama_kategori ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="lab-category" style="margin-bottom:16px;">
                                <b>Kategori</b>
                                <select name="id_ck" class="form-control" id="kategori">
                                    <option value="Select Mata Kuliah">Select Mata Kuliah</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom:0;">
                            <label for="exampleFormControlFile1"><b>Pilih Gambar</b></label>
                            <input type="file" name="gambar" required="required" class="form-control" id="exampleFormControlFile1" style="padding:13px 16px">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" name="submit" type="submit">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <?= form_close(); ?>
</main>
<script>
    $(document).ready(function() {

        $('#prodi').change(function() {
            var id_kategori = $('#prodi').val();
            if (id_kategori != '') {
                $.ajax({
                    url: "<?= base_url(); ?>karya/fetch",
                    method: "POST",
                    data: {
                        id_kategori: id_kategori
                    },
                    success: function(data) {
                        $('#kategori').html(data);
                    }
                })
            }
        });
    });
</script>
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