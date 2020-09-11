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

  <ul class="nav nav-pills" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link <?php echo ($step->status_preview == 'preview1') ? 'active' : ''; ?>" id="satu-tab" data-toggle="tab" href="#satu" role="tab" aria-selected="<?php echo ($step->status_preview == 'preview1') ? 'true' : 'false'; ?>">Preview 1</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?php echo ($step->status_preview == 'preview2') ? 'active' : ''; ?>" id="dua-tab" data-toggle="tab" href="#dua" role="tab" aria-selected="<?php echo ($step->status_preview == 'preview2') ? 'true' : 'false'; ?>">Preview 2</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?php echo ($step->status_preview == 'preview3') ? 'active' : ''; ?>" id="tiga-tab" data-toggle="tab" href="#tiga" role="tab" aria-selected="<?php echo ($step->status_preview == 'preview3') ? 'true' : 'false'; ?>">Preview 3</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?php echo ($step->status_preview == 'sidang') ? 'active' : ''; ?>" id="pat-tab" data-toggle="tab" href="#pat" role="tab" aria-selected="<?php echo ($step->status_preview == 'sidang') ? 'true' : 'false'; ?>">Sidang Akhir</a>
    </li>
  </ul>

  <div class="tab-content" id="myTabContent" style="padding-top:20px;">

    <div class="tab-pane fade <?php echo ($step->status_preview == 'preview1') ? 'show active' : ''; ?>" id="satu" role="tabpanel" aria-labelledby="satu-tab">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col" style="width:30%;">Keterangan</th>
              <th scope="col" style="width:30%;">Dokumen</th>
              <th scope="col">Proyek</th>
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
                      <a href="<?= $t ?>" class="badge badge-info" style="margin:5px" target="_blank">Link Proyek</a>
                    <?php endforeach; ?>
                  </td>
                  <td>
                    <?php if ($f['status'] == 'Dikirim') : ?>
                      <a href="<?= base_url('thesis/setSesuai/' . $f['id'] . '/' . $guidance_id) ?>" class="btn badge badge-success">Sesuai</a>
                      <a href="<?= base_url('thesis/setRevisi/' . $f['id'] . '/' . $guidance_id) ?>" class="btn badge badge-danger">Revisi</a>
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
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#all_correction" style="color:white; padding:10px; margin:2px"><span class="fas fa-tasks"></span> Semua Koreksi</button>
          <button class="btn btn-primary" data-toggle="modal" data-target="#checklist" style="color:white; padding:10px; margin:2px"><span class="fas fa-check-square"></span> Checklist untuk Lanjut</button>
          <?php $kelayakan = explode(",", $layak->kelayakan); ?>
          <button class="btn btn-success" data-toggle="modal" data-target="#lanjut" <?php echo (count($kelayakan) == 3) ? '' : 'disabled'; ?> style="color:white; float:right; padding:10px; margin-left:10px"><span class="fas fa-check"></span> Lanjut</button>
          <button class="btn btn-danger" data-toggle="modal" data-target="#ulangi" style="color:white; float:right; padding:10px; margin-left:10px"><span class="fas fa-times"></span> Ulangi</button>
        </div>
      </div>
    </div>
    
    <div class="tab-pane fade <?php echo ($step->status_preview == 'preview2') ? 'show active' : ''; ?>" id="dua" role="tabpanel" aria-labelledby="dua-tab">
      <div class="alert alert-warning">
        Preview 2. Tahap audiensi/presentasi.
      </div>
      <!-- <a data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-primary" style="color:#fff">Ajukan Siap Sidang Preview 2</a> -->
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Dosen Pembimbing</th>
              <th scope="col">Dosen Penguji</th>
              <th scope="col">Tgl. Sidang</th>
              <th scope="col">Aksi</th>
              <!-- <th scope="col">Nilai</th> -->
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <p style="padding:10px;"><?= $nama_pembimbing1 ?></p> <p style="padding:10px"><?= $nama_pembimbing2 ?></p>
              </td>
              <td>
                <p style="padding:10px;"><?= $nama_penguji1 ?></p> <p style="padding:10px"><?= $nama_penguji2 ?></p>
              </td>
              <td>Selasa, 12 April 2020 <br> 13:30</td>
              <td><a href="#" class="badge badge-info" style="padding:5px">Link Ruang Rapat Daring</a></td>
              
            </tr>
          </tbody>
        </table>
        <div>
          <br>
          <td><a class="btn btn-primary" data-toggle="modal" data-target="#grading" style="color:white; padding:5px; margin:2px"><span class="fas fa-star-half-alt"></span> Berikan Penilaian</a></td>
          <?php $nilai1 = explode(",", $penilaian->nilai_pembimbing1); $nilai2 = explode(",", $penilaian->nilai_pembimbing2); $nilai3 = explode(",", $penilaian->nilai_penguji1); $nilai4 = explode(",", $penilaian->nilai_penguji2); ?>
          <button class="btn btn-success" data-toggle="modal" data-target="#lanjut2" <?php echo (count($nilai1) != 8 or count($nilai2) != 8 or count($nilai3) != 8 or count($nilai4) != 8) ? 'disabled' : ''; ?> style="color:white; float:right; padding:10px; margin-left:10px"><span class="fas fa-check"></span> Lanjut</button>
        </div>
      </div>
    </div>

    <div class="tab-pane fade <?php echo ($step->status_preview == 'preview3') ? 'show active' : ''; ?>" id="tiga" role="tabpanel" aria-labelledby="tiga-tab">
      <div class="alert alert-warning">
        Preview 3. Tahap Persetujuan
      </div>
      <a data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-primary" style="color:#fff">Ajukan Siap Sidang Preview 2</a>
    </div>

    <div class="tab-pane fade <?php echo ($step->status_preview == 'sidang') ? 'show active' : ''; ?>" id="pat" role="tabpanel" aria-labelledby="pat-tab">
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

              <?php $check = explode(",", $layak->kelayakan); ?>
              
              <input type="checkbox" id="kesesuaian" name="kelayakan[]" value="kesesuaian" <?php echo (in_array('kesesuaian', $check)) ? 'checked' : ''; ?>> 
              <label for="kesesuaian"> Kesesuaian fenomeda dan permasalahan yang diangkat</label><br>
              <input type="checkbox" id="ketepatan" name="kelayakan[]" value="ketepatan" <?php echo (in_array('ketepatan', $check)) ? 'checked' : ''; ?>> 
              <label for="ketepatan"> Ketepatan penyusunan hipotesa</label><br>
              <input type="checkbox" id="kaidah" name="kelayakan[]" value="kaidah" <?php echo (in_array('kaidah', $check)) ? 'checked' : ''; ?>> 
              <label for="kaidah"> Kaidah tata tulis karya ilmiah</label><br><br>
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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

      <form action="<?= base_url('thesis/setLanjutKePreview2/' . encrypt_url($guidance_id)) ?>" method="POST">
        <div class="modal-body">
          <div class="custom-form">
            <p>Lanjutkan mahasiswa/mahasiswi ini ke preview 2?</p>
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

<!-- Modal for Lanjut 2 -->
<div class="modal fade" id="lanjut2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lanjut ke Preview 3</h5>
      </div>

      <form action="<?= base_url('thesis/setLanjutKePreview2/' . encrypt_url($guidance_id)) ?>" method="POST">
        <div class="modal-body">
          <div class="custom-form">
            <p>Lanjutkan mahasiswa/mahasiswi ini ke preview 3?</p>
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

      <form action="<?= base_url('thesis/setUlangiBimbingan/' . encrypt_url($guidance_id)) ?>" method="POST">
        <div class="modal-body">
          <div class="custom-form">
            <p>Ulangi bimbingan untuk mahasiswa/mahasiswi ini?</p>
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
  tinymce.init({
    selector: '.editable',
    // plugins: 'save preview paste a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
    plugins: 'save autosave preview autolink lists media table',
    toolbar: '',
    toolbar_mode: 'floating',
    tinycomments_mode: 'embedded',
    height: '350',
    width: '370',
    readonly: 1
  });
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

<!-- Modal for all grading -->
<div class="modal fade" id="grading" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Penilaian</h5>
      </div>
      <form action="<?= base_url('thesis/savePenilaianPembimbing/' . encrypt_url($guidance_id)) ?>" method="POST">
        <div class="modal-body">
          <div class="custom-form">
            <table>
              <tr>
                <h5 style="padding:10px">Pembimbing 1: <?= $nama_pembimbing1->name ?></h5>
                <?php $file = explode(",", $penilaian->nilai_pembimbing1); ?>
                <center><h6>Bab 1</h6></center>
                <div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="10" name="nilai1[]" value="<?= $file[0] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Ketepatan menjelaskan fenomena permasalahan</label>
                  </div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="10" name="nilai1[]" value="<?= $file[1] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Ketepatan mengidentifikasi dan merumuskan permasalahan</label>
                  </div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="10" name="nilai1[]" value="<?= $file[2] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Kesesuaian kerangka pemikiran dengan tujuan penelitian/perancangan</label>
                  </div>
                </div>
                <center><h6>Bab 2</h6></center>
                <div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="10" name="nilai1[]" value="<?= $file[3] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Relevansi pemilihan teori dengan lingkup penelitian/perancangan</label>
                  </div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="10" name="nilai1[]" value="<?= $file[4] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Kemutakhiran teori yang digunakan (merujuk artikel/publikasi dosen)</label>
                  </div>
                </div>
                <center><h6>Bab 3</h6></center>
                <div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="20" name="nilai1[]" value="<?= $file[5] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Kelengkapan dan kesesuaian data yang diperoleh</label>
                  </div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="20" name="nilai1[]" value="<?= $file[6] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Ketetapan pengolahan (klasifikasi, kategorisasi), ketajaman analisis, dan simpulan</label>
                  </div>
                </div>
                <center><h6>Sistematika Penulisan</h6></center>
                <div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="10" name="nilai1[]" value="<?= $file[7] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Kaidah tata tulis ilmiah</label>
                  </div>
                </div>
                <div>
                  <textarea name="penilaian1" id="<?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'readonly' : 'editable'; ?>" class="form-control" cols="30" rows="10"><?= $penilaian->penilaian_pembimbing1 ?></textarea>
                </div>
              </tr>

              <tr>
                <h5 style="padding:10px">Pembimbing 2: <?= $nama_pembimbing2->name ?></h5>
                <?php $file2 = explode(",", $penilaian->nilai_pembimbing2); ?>
                <center><h6>Bab 1</h6></center>
                <div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="10" name="nilai2[]" value="<?= $file2[0] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Ketepatan menjelaskan fenomena permasalahan</label>
                  </div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="10" name="nilai2[]" value="<?= $file2[1] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Ketepatan mengidentifikasi dan merumuskan permasalahan</label>
                  </div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="10" name="nilai2[]" value="<?= $file2[2] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Kesesuaian kerangka pemikiran dengan tujuan penelitian/perancangan</label>
                  </div>
                </div>
                <center><h6>Bab 2</h6></center>
                <div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="10" name="nilai2[]" value="<?= $file2[3] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Relevansi pemilihan teori dengan lingkup penelitian/perancangan</label>
                  </div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="10" name="nilai2[]" value="<?= $file2[4] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Kemutakhiran teori yang digunakan (merujuk artikel/publikasi dosen)</label>
                  </div>
                </div>
                <center><h6>Bab 3</h6></center>
                <div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="20" name="nilai2[]" value="<?= $file2[5] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Kelengkapan dan kesesuaian data yang diperoleh</label>
                  </div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="20" name="nilai2[]" value="<?= $file2[6] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Ketetapan pengolahan (klasifikasi, kategorisasi), ketajaman analisis, dan simpulan</label>
                  </div>
                </div>
                <center><h6>Sistematika Penulisan</h6></center>
                <div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="10" name="nilai2[]" value="<?= $file2[7] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Kaidah tata tulis ilmiah</label>
                  </div>
                </div>
                <div>
                  <textarea name="penilaian2" id="<?php echo ($lecturers->dosen_pembimbing2 != $this->session->userdata('id')) ? 'readonly' : 'editable'; ?>" class="form-control" cols="30" rows="10"><?= $penilaian->penilaian_pembimbing2 ?></textarea>
                </div>
              </tr>

              <tr>
                <h5 style="padding:10px">Penguji 1: <?= $nama_penguji1->name ?></h5>
                <?php $file3 = explode(",", $penilaian->nilai_penguji1); ?>
                <center><h6>Bab 1</h6></center>
                <div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="10" name="nilai3[]" value="<?= $file3[0] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Ketepatan menjelaskan fenomena permasalahan</label>
                  </div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="10" name="nilai3[]" value="<?= $file3[1] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Ketepatan mengidentifikasi dan merumuskan permasalahan</label>
                  </div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="10" name="nilai3[]" value="<?= $file3[2] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Kesesuaian kerangka pemikiran dengan tujuan penelitian/perancangan</label>
                  </div>
                </div>
                <center><h6>Bab 2</h6></center>
                <div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="10" name="nilai3[]" value="<?= $file3[3] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Relevansi pemilihan teori dengan lingkup penelitian/perancangan</label>
                  </div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="10" name="nilai3[]" value="<?= $file3[4] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Kemutakhiran teori yang digunakan (merujuk artikel/publikasi dosen)</label>
                  </div>
                </div>
                <center><h6>Bab 3</h6></center>
                <div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="20" name="nilai3[]" value="<?= $file3[5] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Kelengkapan dan kesesuaian data yang diperoleh</label>
                  </div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="20" name="nilai3[]" value="<?= $file3[6] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Ketetapan pengolahan (klasifikasi, kategorisasi), ketajaman analisis, dan simpulan</label>
                  </div>
                </div>
                <center><h6>Sistematika Penulisan</h6></center>
                <div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="10" name="nilai3[]" value="<?= $file3[7] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Kaidah tata tulis ilmiah</label>
                  </div>
                </div>
                <div>
                  <textarea name="penilaian3" id="<?php echo ($lecturers->dosen_penguji1 != $this->session->userdata('id')) ? 'readonly' : 'editable'; ?>" class="form-control" cols="30" rows="10"><?= $penilaian->penilaian_penguji1 ?></textarea>
                </div>
              </tr>
              <tr>
                <h5 style="padding:10px">Penguji 2: <?= $nama_penguji2->name ?></h5>
                <?php $file4 = explode(",", $penilaian->nilai_penguji2); ?>
                <center><h6>Bab 1</h6></center>
                <div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="10" name="nilai4[]" value="<?= $file4[0] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Ketepatan menjelaskan fenomena permasalahan</label>
                  </div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="10" name="nilai4[]" value="<?= $file4[1] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Ketepatan mengidentifikasi dan merumuskan permasalahan</label>
                  </div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="10" name="nilai4[]" value="<?= $file4[2] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Kesesuaian kerangka pemikiran dengan tujuan penelitian/perancangan</label>
                  </div>
                </div>
                <center><h6>Bab 2</h6></center>
                <div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="10" name="nilai4[]" value="<?= $file4[3] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Relevansi pemilihan teori dengan lingkup penelitian/perancangan</label>
                  </div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="10" name="nilai4[]" value="<?= $file4[4] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Kemutakhiran teori yang digunakan (merujuk artikel/publikasi dosen)</label>
                  </div>
                </div>
                <center><h6>Bab 3</h6></center>
                <div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="20" name="nilai4[]" value="<?= $file4[5] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Kelengkapan dan kesesuaian data yang diperoleh</label>
                  </div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="20" name="nilai4[]" value="<?= $file4[6] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Ketetapan pengolahan (klasifikasi, kategorisasi), ketajaman analisis, dan simpulan</label>
                  </div>
                </div>
                <center><h6>Sistematika Penulisan</h6></center>
                <div>
                  <div class="form-group" style="padding-left:10px">
                    <input type="number" min="0" max="10" name="nilai4[]" value="<?= $file4[7] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                    <label>Kaidah tata tulis ilmiah</label>
                  </div>
                </div>
                <div>
                  <textarea name="penilaian4" id="<?php echo ($lecturers->dosen_penguji2 != $this->session->userdata('id')) ? 'readonly' : 'editable'; ?>" class="form-control" cols="30" rows="10"><?= $penilaian->penilaian_penguji2 ?></textarea>
                </div>
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