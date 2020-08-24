<main class="akun-container">
    <div class="fik-section-title2">
        <span class="fas fa-door-open zzzz"></span>
        <h5>Upload Karya</h5>
    </div>
    <div class="row">
        <div class="col-md-5" id="imagePreview">
            <video width="445px" controls class="placeholder-img" style="border-radius: 10px;">
                <source src="" type="video/mp4">
            </video>
            <span class="placeholder-img1"></span>
        </div>
        <div class="col-md-7">
            <div class="card">
                <?php

                if (isset($error)) {
                    echo '<p class="alert alert-warning">';
                    echo $error;
                    echo '</p>';
                }

                echo validation_errors('<div class="alert alert-warning">', '</div>');
                ?>
                <form method="post" id="form-upload" enctype="multipart/form-data" action="<?= base_url('karya/tambahbydsn') ?>">
                    <div class="card-body">
                        <div class="custom-form">
                            <div class="form-group">
                                <input type="text" name="nama" value="<?= set_value('nama') ?>" class="form-control" placeholder="nama" required="required" autocomplete="off" />
                                <label>Nama</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="judul" value="<?= set_value('judul') ?>" class="form-control" placeholder="Judul Karya" required="required" autocomplete="off" />
                                <label>Judul</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nim" value="<?= set_value('nim') ?>" class="form-control" placeholder="Nim" required="required" autocomplete="off" />
                                <label>Nim</label>
                            </div>
                            <div class="form-group">
                                <input type="tel" name="No_wa" value="<?= set_value('No_wa') ?>" class="form-control" placeholder="No_Wa" required="required" autocomplete="off" />
                                <label>No.WA Aktif</label>
                            </div>
                            <div class="form-group">
                                <input type="tel" name="No_hp" value="<?= set_value('No_hp') ?>" class="form-control" placeholder="No_Hp" required="required" autocomplete="off" />
                                <label>No.Hp</label>
                            </div>
                            <div class="form-group">
                                <textarea type="deskripsi" rows="5" name="deskripsi" class="form-control" value="<?= set_value('deskripsi') ?>" autocomplete="off"></textarea>
                                <label>Deskripsi</label>
                            </div>
                            <div class="lab-category" style="margin-bottom:16px;" required>
                                <b>Prodi</b>
                                <select name="id_kategori" required class="form-control" id="prodi">
                                    <option value="">Select Prodi</option>
                                    <?php foreach ($kategori as $kategori) { ?>
                                        <option value="<?= $kategori->id_kategori ?>">
                                            <?= $kategori->nama_kategori ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="lab-category" style="margin-bottom:16px;" disabled>
                                <b>Pilihan Peminatan</b>
                                <select name="id_ck" class="form-control" id="kategori">
                                    <option value="Select Mata Kuliah">Select Peminatan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom:0;">
                            <label for="file-0"><b>Pilih karya</b></label>
                            <input type="file" name="gambar" class="form-control" id="file-0" style="padding:13px 16px" required>
                            <span id="chk-error"></span>
                        </div>
                    </div>
                    <div class="progress" style="display:none;">
                        <div id="progress-bar" class="progress-bar progress-bar-success progress-bar-striped " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                            20%
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" name="submit" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<script>
    const image = document.getElementById('file-0');
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
<script>
    $(function() {
        var inputFile = $('input[name=gambar]');
        var uploadURI = $('#form-upload').attr('action');
        var progressBar = $('#progress-bar');

        $("form#form-upload").submit(function() {
            event.preventDefault();
            var fileToUpload = inputFile[0].files[0];
            if (fileToUpload != 'undefined') {
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url: uploadURI,
                    type: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        window.location.href = "<?= base_url(); ?>karya/listbydsn";
                    },
                    xhr: function() {
                        var xhr = new XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(event) {
                            if (event.lengthComputable) {
                                var percentComplete = Math.round((event.loaded / event.total) * 100);
                                // console.log(percentComplete);

                                $('.progress').show();
                                progressBar.css({
                                    width: percentComplete + "%"
                                });
                                progressBar.text(percentComplete + '%');
                            };
                        }, false);
                        return xhr;
                    }
                });
            }
        });
        $('body').on('change.bs.fileinput', function(e) {
            $('.progress').hide();
            progressBar.text("0%");
            progressBar.css({
                width: "0%"
            });
        });
    });
</script>
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
    $("#file-0").change(function() {
        var allowedTypes = ['video/mov', 'video/mpeg', 'video/mp3', 'video/avi', 'video/mp4'];
        var file = this.files[0];
        var fileType = file.type;
        if (!allowedTypes.includes(fileType)) {
            jQuery("#chk-error").html('<small class="text-danger">Please choose a valid file (MOV/MPEG/MP3/AVI/MP4)</small>');
            $("#file-0").val('');
            return false;
        } else {
            jQuery("#chk-error").html('');
        }
    });
</script>