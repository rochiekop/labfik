<main class="akun-container">
    <?php

    echo validation_errors('<div class="alert alert-warning">', '</div>');

    echo form_open(base_url('sub_kategori/tambah'), 'class="form-horizontal"');
    ?>
    <div class="form-group">
        <label class="col-md-2" control-label>Kategori</label>
        <div class="col-md-5">
            <select name="id_kategori" class="form-control">
                <?php foreach ($kategori as $kategori) { ?>
                    <option value="<?= $kategori->id_kategori ?>">
                        <?= $kategori->nama_kategori ?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2" control-label>Nama</label>
        <div class="col-md-5">
            <input type="nama" name="nama_child" class="form-control" placeholder="Nama kategori" value="<?= set_value('nama_child') ?>" required>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-5">
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