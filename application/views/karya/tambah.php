<main class="akun-container">
    <?php

    if (isset($error)) {
        echo '<p class="alert alert-warning">';
        echo $error;
        echo '</p>';
    }

    echo validation_errors('<div class="alert alert-warning">', '</div>');

    echo form_open_multipart(base_url('karya/tambah'), 'class="form-horizontal"');
    ?>

    <div class="form-group">
        <label class="col-md-2" control-label>Nim</label>
        <div class="col-md-10">
            <input type="nim" name="nim" class="form-control" placeholder="Nim" value="<?= set_value('nim') ?>" required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2" control-label>Judul</label>
        <div class="col-md-10">
            <input type="judul" name="judul" class="form-control" placeholder="Judul Karya" value="<?= set_value('judul') ?>" required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2" control-label>Deskripsi</label>
        <div class="col-md-10">
            <textarea type="deskripsi" rows="5" name="deskripsi" class="form-control" value="<?= set_value('deskripsi') ?>" required></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2" control-label>Keywords</label>
        <div class="col-md-10">
            <input type="keywords" name="keywords" class="form-control" placeholder="Keywords" value="<?= set_value('keywords') ?>" required></input>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2" control-label>Kode Tampilan</label>
        <div class="col-md-10">
            <input type="text" name="kode_tampilan" class="form-control" placeholder="kode tampilan" value="<?= set_value('kode_tampilan') ?>" required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2" control-label>Upload Gambar</label>
        <div class="col-md-10">
            <input type="file" name="gambar" required="required">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2" control-label>Prodi</label>
        <div class="col-md-10">
            <select name="id_kategori" class="form-control" id="prodi">
                <option value="">Select Prodi</option>
                <?php foreach ($kategori as $kategori) { ?>
                    <option value="<?= $kategori->id_kategori ?>">
                        <?= $kategori->nama_kategori ?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2" control-label>Kategori</label>
        <div class="col-md-10">
            <select name="id_ck" class="form-control" id="kategori">
                <option value="Select Mata Kuliah">Select Mata Kuliah</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2" control-label>Kode Tampilan</label>
        <div class="col-md-10">
            <button class="btn btn-success btn-lg" name="submit" type="submit">
                <i class="fa fa-save"></i> Simpan
            </button>
            <button class="btn btn-info btn-lg" name="reset" type="reset">
                <i class="fa fa-times"></i> reset
            </button>
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