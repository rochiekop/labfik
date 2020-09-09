<!-- Main Container -->
<main class="akun-container">

  <div class="fik-section-title2">
    <h4>Bimbingan Tugas Akhir</h4>
  </div>

  <table>
    <thead>
      <th style="width: 60px;"></th>
      <th style="width: 10px;"></th>
      <th></th>
    </thead>
    <tbody>
      <tr>
        <td style="width: 20px;">Nama</td>
        <td>:</td>
        <td><?= $mhsbyid['name'] ?></td>
      </tr>
      <tr>
        <td>NIM</td>
        <td>:</td>
        <td><?= $mhsbyid['nim'] ?></td>
      </tr>
      <tr>
        <td>Prodi</td>
        <td>:</td>
        <td><?= $mhsbyid['prodi'] ?></td>
      </tr>
      <tr>
        <td>Kosentrasi</td>
        <td>:</td>
        <td><?= $mhsbyid['peminatan'] ?></td>
      </tr>
      <tr>
        <td>No.Telp</td>
        <td>:</td>
        <td><?= $mhsbyid['no_telp'] ?></td>
      </tr>
    </tbody>
  </table>
  <br>
  <?php if ($this->session->userdata('id') == $mhsbyid['dosen_pembimbing1']) { ?>
    <td> Status Anda : Pembimbing 1</b></td>
  <?php } else { ?>
    <td> Status Anda : Pembimbing 2</td>
  <?php } ?>
  <br>
  <br>
  <input type="hidden" value="siap_sidang" />
  <!-- <?php
        for ($x = 1; $x <= 3; $x++) {
          if ($x - 1 == count($preview)) {
            echo '<button class="btn btn-sm btn-primary" style="color:#fff;margin-right:5px;" data-toggle="modal" title="Berikan Preview ' . $x . '" data-target="#previewmodal">Preview ' . $x . '</button>';
          } else {
            echo '<button class="btn btn-sm btn-secondary" disabled style="color:#fff;margin-right:5px;">Preview ' . $x . '</button>';
          }
        }
        if (count($preview) == 3) {
          echo '<button type="submit" class="btn btn-sm btn-primary" style="color:#fff">Berikan Siap Sidang</button>';
        } else {
          echo '<button type="submit" class="btn btn-sm btn-secondary" disabled style="color:#fff">Berikan Siap Sidang</button>';
        }
        ?> -->

  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="satu-tab" data-toggle="tab" href="#satu" role="tab" aria-selected="true">Preview 1</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="dua-tab" data-toggle="tab" href="#dua" role="tab" aria-selected="false">Preview 2</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="tiga-tab" data-toggle="tab" href="#tiga" role="tab" aria-selected="false">Preview 3</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pat-tab" data-toggle="tab" href="#pat" role="tab" aria-selected="false">Sidang Akhir</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent" style="padding-top:20px;">

    <div class="tab-pane fade show active" id="satu" role="tabpanel" aria-labelledby="satu-tab">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col" style="width:30%;">Keterangan</th>
              <th scope="col" style="width:30%;">Dokumen</th>
              <th scope="col">Project</th>
              <th scope="col" style="width:30%;">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($filebimbingan)) : ?>
              <td colspan="6" style="background-color: whitesmoke;text-align:center">Daftar permintaan bimbingan kosong</td>
            <?php else : ?>
              <?php $no = 0;
              foreach ($filebimbingan as $f) : ?>
                <tr>
                  <th scope="row"><?= ++$no ?></th>
                  <td>
                    <?= $f['keterangan'] ?>
                  </td>
                  <td>
                    <?php $file = explode(",", $f['pdf_file']); ?>
                    <?php foreach ($file as $t) : ?>
                      <a href="<?= base_url('thesis/openFile/' . $f['id'] . '/' . $t) ?>"><?= $t ?></a><br>
                    <?php endforeach; ?>
                  </td>
                  <td>
                    <?php $file = explode(",", $f['link_project']); ?>
                    <?php foreach ($file as $t) : ?>
                      <a href="<?= $t ?>" target="_blank"><?= $t ?></a><br>
                    <?php endforeach; ?>
                  </td>
                  <td>
                    <?php if ($f['status'] == 'Dikirim') : ?>
                      <a href="<?= base_url('thesis/setSesuai/'.$f['id'].'/'.$guidance_id) ?>" class="btn badge badge-success">Sesuai</a>
                      <a href="<?= base_url('thesis/setRevisi/'.$f['id'].'/'.$guidance_id) ?>" class="btn badge badge-danger">Revisi</a>
                    <?php elseif ($f['status'] == 'Sesuai') : ?>
                      <p>Sesuai</p>
                    <?php elseif ($f['status'] == 'Revisi') : ?>
                      <p>Revisi</p>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
        <div>
          <br>
          <a class="btn btn-primary" data-toggle="modal" data-target="#all_correction" style="color:white; padding:10px; margin:2px"><span class="fas fa-tasks"></span> Semua Koreksi</a>
          <a class="btn btn-primary" data-toggle="modal" data-target="#checklist" style="color:white; padding:10px; margin:2px"><span class="fas fa-check-square"></span> Checklist untuk Lanjut</a>
          <a class="btn btn-success" data-toggle="modal" data-target="#lanjut" style="color:white; float:right; padding:10px; margin-left:10px"><span class="fas fa-check"></span> Lanjut</a>
          <a class="btn btn-danger" data-toggle="modal" data-target="#ulangi" style="color:white; float:right; padding:10px; margin-left:10px"><span class="fas fa-times"></span> Ulangi</a>
        </div>
      </div>
    </div>

    <div class="tab-pane fade" id="dua" role="tabpanel" aria-labelledby="dua-tab">
      <div class="alert alert-warning">
        Preview 2. Tahap audiensi/presentasi.
      </div>
      <!-- <a data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-primary" style="color:#fff">Ajukan Siap Sidang Preview 2</a> -->
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Dosen Pembimbing</th>
              <th scope="col">Dosen Penguji</th>
              <th scope="col">Tgl. Sidang</th>
              <th scope="col">Aksi</th>
              <th scope="col">Nilai</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>
                <b>Mark Hoover</b> <br>
                Momo Delia
              </td>
              <td>
                David Hans <br>
                -
              </td>
              <td>Selasa, 12 April 2020 <br> 13:30</td>
              <td><a href="#" class="badge badge-success">Zoom</a></td>
              <td><a href="#" class="badge badge-secondary">Berikan Nilai</a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="tab-pane fade" id="tiga" role="tabpanel" aria-labelledby="tiga-tab">
      <div class="alert alert-warning">
        Preview 3. Tahap Persetujuan
      </div>
      <a data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-primary" style="color:#fff">Ajukan Siap Sidang Preview 2</a>
    </div>

    <div class="tab-pane fade" id="pat" role="tabpanel" aria-labelledby="pat-tab">
      <a data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-primary" style="color:#fff">Ajukan Siap Sidang</a>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Dosen Pembimbing</th>
              <th scope="col">Dosen Penguji</th>
              <th scope="col">Tgl. Sidang</th>
              <th scope="col">Aksi</th>
              <th scope="col">Nilai</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>
                <b>Mark Hoover</b> <br>
                Momo Delia
              </td>
              <td>
                <<<<<<< HEAD David Hans <br>
                  Momoka
                  =======
                  <?php $file = explode(",", $f['link_project']); ?>
                  <?php foreach ($file as $t) : ?>
                    <a href="<?= $t ?>" target="_blank"><?= $t ?></a><br>
                  <?php endforeach; ?>
              </td>
              <td>
                <a href="#" class="btn badge badge-success">Selesai</a>
                <a href="#" class="btn badge badge-danger">Revisi</a>
                >>>>>>> 9ac5c91dc593973a0c4a53ec886cd36c4b0dec6f
              </td>
              <td>Selasa, 12 April 2020 <br> 13:30</td>
              <td><a href="#" class="badge badge-info">Zoom</a></td>
              <td><a href="#" class="badge badge-secondary">Berikan Nilai</a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>

</main>
<!-- End Main Container -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Anda Yakin?</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batalkan</button></a>
        <a href="#" class="btn btn-sm btn-primary">Ya, Lanjutkan!</a>
      </div>
    </div>
  </div>
</div>

</main>
<!-- End Main Container -->

<!-- Modal Preview-->
<?php foreach ($preview as $t) : ?>
  <div class="modal fade bd-example-modal-sm" id="previewmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          Kirim <?= $t['status'] ?> ?
        </div>
        <form action="deletelab" method="post" enctype="multipart/form-data">
          <div class="modal-footer">
            <!-- <input type="hidden" id="id" name="id" value="<?= $t['id']; ?>"> -->
            <!-- <input type="hidden" id="image" name="image" value="<?= $t['images']; ?>"> -->
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
            <button type="submit" name="preview" class="btn btn-primary btn-sm">Kirim</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- Modal for checklist -->
<div class="modal fade" id="checklist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Checklist Kelayakan untuk Lanjut</h5>
      </div>

      <form action="<?= base_url('thesis/saveKelayakan/'.encrypt_url($guidance_id)) ?>" method="POST">
      <div class="modal-body">
        <div class="custom-form">
          
          
              <!-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="materialUnchecked">
                <label class="form-check-label" for="kesesuaian">Kesesuaian fenomeda dan permasalahan yang diangkat</label>
              </div><br>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="materialUnchecked">
                <label class="form-check-label" for="ketepatan">Ketepatan penyusunan hipotesa</label>
              </div><br>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="materialUnchecked">
                <label class="form-check-label" for="kaidah">kaidah tata tulis karya ilmiah</label>
              </div><br> -->

              <?php $check = explode(",", $layak->kelayakan); ?>
            
              <input type="checkbox" id="kesesuaian" name="kelayakan[]" value="1" <?php echo ($check[0] == '1') ? 'checked' : ''; ?>>
              <label for="kesesuaian"> Kesesuaian fenomeda dan permasalahan yang diangkat</label><br>
              <input type="checkbox" id="ketepatan" name="kelayakan[]" value="1" <?php echo ($check[1] == '1') ? 'checked' : ''; ?>>
              <label for="ketepatan"> Ketepatan penyusunan hipotesa</label><br>
              <input type="checkbox" id="kaidah" name="kelayakan[]" value="1" <?php echo ($check[2] == '1') ? 'checked' : ''; ?>>
              <label for="kaidah"> Kaidah tata tulis karya ilmiah</label><br><br>
              
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Sampaikan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal for Lanjut -->
<div class="modal fade" id="lanjut" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lanjut ke Preview 2</h5>
      </div>

      <form action="<?= base_url('thesis/setLanjutKePreview2/'.encrypt_url($guidance_id)) ?>" method="POST">
      <div class="modal-body">
        <div class="custom-form">

          <strong>Lanjutkan mahasiswa/mahasiswi ini ke preview 2?</strong>
              
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Ya, Lanjutkan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal for Ulangi -->
<div class="modal fade" id="ulangi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ulangi Bimbingan</h5>
      </div>

      <form action="<?= base_url('thesis/setUlangiBimbingan/'.encrypt_url($guidance_id)) ?>" method="POST">
      <div class="modal-body">
        <div class="custom-form">

          <strong>Ulangi bimbingan untuk mahasiswa/mahasiswi ini?</strong>
              
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Ya, Ulangi Bimbingan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- TinyMCE -->
<script src="https://cdn.tiny.cloud/1/q9tneu2aax9fp91cvqlh7mqvx44p6ph4jb63xq6lax2ybita/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<input type="text" id="user_id" value="<?= $this->session->userdata('id') ?>" hidden>
<input type="text" id="dosen_pembimbing1" value="<?= $lecturers->dosen_pembimbing1 ?>" hidden>
<input type="text" id="dosen_pembimbing2" value="<?= $lecturers->dosen_pembimbing2 ?>" hidden>
<input type="text" id="dosen_penguji1" value="<?= $lecturers->dosen_penguji1 ?>" hidden>
<input type="text" id="dosen_penguji2" value="<?= $lecturers->dosen_penguji2 ?>" hidden>
<script>
  tinymce.init({
    selector: '.readonly',
    // plugins: 'save preview paste a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
    plugins: 'save autosave preview autolink lists media table',
    toolbar: '',
    toolbar_mode: 'floating',
    tinycomments_mode: 'embedded',
    height: '350',
    width: '370',
    readonly: 1
  });

  var user_id = document.getElementById("user_id").value;
  var dosen_pembimbing1 = document.getElementById("dosen_pembimbing1").value;
  var dosen_pembimbing2 = document.getElementById("dosen_pembimbing2").value;
  var dosen_penguji1 = document.getElementById("dosen_penguji1").value;
  var dosen_penguji2 = document.getElementById("dosen_penguji2").value;

  if (user_id == dosen_pembimbing1) {
    tinymce.init({
      selector: '#penilaian_pembimbing1',
      // plugins: 'save preview paste a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      plugins: 'save autosave preview autolink lists media table',
      toolbar: 'restoredraft',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      // height: '460',
      height: '230',
      // readonly : 1
    });
  } else if (user_id != dosen_pembimbing1) {
    tinymce.init({
      selector: '#penilaian_pembimbing1',
      // plugins: 'save preview paste a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      plugins: 'save autosave preview autolink lists media table',
      toolbar: 'restoredraft',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      // height: '460',
      height: '230',
      readonly: 1
    });
  }

  if (user_id == dosen_pembimbing2) {
    tinymce.init({
      selector: '#penilaian_pembimbing2',
      // plugins: 'save preview paste a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      plugins: 'save autosave preview autolink lists media table',
      toolbar: 'restoredraft',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      // height: '460',
      height: '230',
      // readonly : 1
    });
  } else if (user_id != dosen_pembimbing2) {
    tinymce.init({
      selector: '#penilaian_pembimbing2',
      // plugins: 'save preview paste a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      plugins: 'save autosave preview autolink lists media table',
      toolbar: 'restoredraft',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      // height: '460',
      height: '230',
      readonly: 1
    });
  }

  if (user_id == dosen_penguji1) {
    tinymce.init({
      selector: '#penilaian_penguji1',
      // plugins: 'save preview paste a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      plugins: 'save autosave preview autolink lists media table',
      toolbar: 'restoredraft',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      // height: '460',
      height: '230',
      // readonly : 1
    });
  } else if (user_id != dosen_penguji1) {
    tinymce.init({
      selector: '#penilaian_penguji1',
      // plugins: 'save preview paste a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      plugins: 'save autosave preview autolink lists media table',
      toolbar: 'restoredraft',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      // height: '460',
      height: '230',
      readonly: 1
    });
  }

  if (user_id == dosen_penguji2) {
    tinymce.init({
      selector: '#penilaian_penguji2',
      // plugins: 'save preview paste a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      plugins: 'save autosave preview autolink lists media table',
      toolbar: 'restoredraft',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      // height: '460',
      height: '230',
      // readonly : 1
    });
  } else if (user_id != dosen_penguji2) {
    tinymce.init({
      selector: '#penilaian_penguji2',
      // plugins: 'save preview paste a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      plugins: 'save autosave preview autolink lists media table',
      toolbar: 'restoredraft',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      // height: '460',
      height: '230',
      readonly: 1
    });
  }
</script>

<!-- Modal for all correction -->
<div class="modal fade" id="all_correction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Semua Koreksi</h5>
      </div>
      <div class="modal-body">
        <div class="custom-form">
          <table>
            <td style="padding-left:10px">
              <h6 style="padding-bottom:10px">Pembimbing 1</h6>
              <textarea name="correction1" id="readonly" class="readonly" cols="30" rows="10">
                <?php foreach ($allcorrection as $a) : ?>
                  <?= $a->correction1 ?>
                <?php endforeach; ?>
              </textarea>
            </td>
            <td style="padding-left:10px">
              <h6 style="padding-bottom:10px">Pembimbing 2</h6>
              <textarea name="correction2" id="readonly" class="readonly" cols="30" rows="10">
                <?php foreach ($allcorrection as $a) : ?>
                  <?= $a->correction2 ?>
                <?php endforeach; ?>
              </textarea>
            </td>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal for grading -->
<div class="modal fade" id="grading" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Penilaian</h5>
      </div>
      <form action="<?= base_url('thesis/savePenilaianPembimbing/' . encrypt_url($guidance_id)) ?>" method="POST">
        <div class="modal-body">
          <div class="custom-form">
            <table>
              <tr>
                <td>
                  <h6 style="padding:10px">Pembimbing 1</h6>
                  <?php $condition = ''; ?> 
                  <?php if ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) {
                    $condition = 'readonly';  }
                  ?> 
                  <?php $file = explode(",", $penilaian->nilai_pembimbing1); ?>
                  <?php var_dump($file); ?>
                  <table>
                    <td>
                      <div>
                        <div class="form-group" style="padding-left:10px">
                          <input type="number" name="nilai1[]" value="<?= $file[0] ?>" class="form-control" placeholder="" autocomplete="off" <?= $condition ?> />
                          <label>Penilaian 1</label>
                        </div>
                        <div class="form-group" style="padding-left:10px">
                          <input type="number" name="nilai1[]" value="<?= $file[1] ?>" class="form-control" placeholder="" autocomplete="off" <?= $condition ?> />
                          <label>Penilaian 2</label>
                        </div>
                        <div class="form-group" style="padding-left:10px">
                          <input type="number" name="nilai1[]" value="<?= $file[2] ?>" class="form-control" placeholder="" autocomplete="off" <?= $condition ?> />
                          <label>Penilaian 3</label>
                        </div>
                        <div class="form-group" style="padding-left:10px">
                          <input type="number" name="nilai1[]" value="<?= $file[3] ?>" class="form-control" placeholder="" autocomplete="off" <?= $condition ?> />
                          <label>Penilaian 4</label>
                        </div>
                        
                      </div>
                    </td>
                    <td>
                      <div>
                        <div class="form-group" style="padding-left:10px">
                          <input type="number" name="nilai1[]" value="<?= $file[4] ?>" class="form-control" placeholder="" autocomplete="off" <?= $condition ?> />
                          <label>Penilaian 5</label>
                        </div>
                        <div class="form-group" style="padding-left:10px">
                          <input type="number" name="nilai1[]" value="<?= $file[5] ?>" class="form-control" placeholder="" autocomplete="off" <?= $condition ?> />
                          <label>Penilaian 6</label>
                        </div>
                        <div class="form-group" style="padding-left:10px">
                          <input type="number" name="nilai1[]" value="<?= $file[6] ?>" class="form-control" placeholder="" autocomplete="off" <?= $condition ?> />
                          <label>Penilaian 7</label>
                        </div>
                        <div class="form-group" style="padding-left:10px">
                          <input type="number" name="nilai1[]" value="<?= $file[7] ?>" class="form-control" placeholder="" autocomplete="off" <?= $condition ?> />
                          <label>Penilaian 8</label>
                        </div>
                      </div>
                    </td>
                  </table>
                </td>

                <td>
                  <h6 style="padding:10px">Pembimbing 2</h6>
                  <?php $condition2 = ''; ?>
                  <?php if ($lecturers->dosen_pembimbing2 != $this->session->userdata('id')) {
                    $condition2 = 'readonly'; }
                  ?>
                  <!-- </?php var_dump($penilaian->nilai_pembimbing1); die; ?> -->
                  <?php $file2 = explode(",", $penilaian->nilai_pembimbing2); ?>
                  <!-- </?php var_dump($file); die; ?> -->
                  
                  <table>
                    <td>
                      <div>
                        <div class="form-group" style="padding-left:10px">
                          <input type="number" name="nilai2[]" value="<?= $file2[0] ?>" class="form-control" placeholder="" autocomplete="off" <?= $condition2 ?> />
                          <label>Penilaian 1</label>
                        </div>
                        <div class="form-group" style="padding-left:10px">
                          <input type="number" name="nilai2[]" value="<?= $file2[1] ?>" class="form-control" placeholder="" autocomplete="off" <?= $condition2 ?> />
                          <label>Penilaian 2</label>
                        </div>
                        <div class="form-group" style="padding-left:10px">
                          <input type="number" name="nilai2[]" value="<?= $file2[2] ?>" class="form-control" placeholder="" autocomplete="off" <?= $condition2 ?> />
                          <label>Penilaian 3</label>
                        </div>
                        <div class="form-group" style="padding-left:10px">
                          <input type="number" name="nilai2[]" value="<?= $file2[3] ?>" class="form-control" placeholder="" autocomplete="off" <?= $condition2 ?> />
                          <label>Penilaian 4</label>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div>
                        <div class="form-group" style="padding-left:10px">
                          <input type="number" name="nilai2[]" value="<?= $file2[4] ?>" class="form-control" placeholder="" autocomplete="off" <?= $condition2 ?> />
                          <label>Penilaian 5</label>
                        </div>
                        <div class="form-group" style="padding-left:10px">
                          <input type="number" name="nilai2[]" value="<?= $file2[5] ?>" class="form-control" placeholder="" autocomplete="off" <?= $condition2 ?> />
                          <label>Penilaian 6</label>
                        </div>
                        <div class="form-group" style="padding-left:10px">
                          <input type="number" name="nilai2[]" value="<?= $file2[6] ?>" class="form-control" placeholder="" autocomplete="off" <?= $condition2 ?> />
                          <label>Penilaian 7</label>
                        </div>
                        <div class="form-group" style="padding-left:10px">
                          <input type="number" name="nilai2[]" value="<?= $file2[7] ?>" class="form-control" placeholder="" autocomplete="off" <?= $condition2 ?> />
                          <label>Penilaian 8</label>
                        </div>
                      </div>
                    </td>
                  </table>
                </td>
              </tr>
              <tr>
                <td style="padding-left:10px"><textarea name="penilaian1" id="penilaian_pembimbing1" class="form-control" cols="30" rows="10"><?= $penilaian->penilaian_pembimbing1 ?></textarea></td>
                <td style="padding-left:10px"><textarea name="penilaian2" id="penilaian_pembimbing2" class="form-control" cols="30" rows="10"><?= $penilaian->penilaian_pembimbing2 ?></textarea></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Sampaikan</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>