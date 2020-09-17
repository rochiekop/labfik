<!-- Main Container -->
<main class="akun-container">
  <div class="fik-section-title2">
    <h4>Bimbingan</h4>
  </div>
  <?= $this->session->flashdata('message'); ?>
  <p>Pembimbing 1 : <?= $dosbing1['name'] ?></p>
  <p>Pembimbing 2 : <?= $dosbing2['name'] ?></p>
  <br>
  <ul class="nav nav-pills" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link <?php echo ($step->status_preview == 'preview1') ? 'btn-secondary active' : 'disabled'; ?>" id="satu-tab" data-toggle="tab" href="#satu" role="tab" aria-selected="<?php echo ($step->status_preview == 'preview1') ? 'true' : 'false'; ?>">Preview 1</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?php echo ($step->status_preview == 'preview2') ? 'btn-secondary active' : 'disabled'; ?>" id="dua-tab" data-toggle="tab" href="#dua" role="tab" aria-selected="<?php echo ($step->status_preview == 'preview2') ? 'true' : 'false'; ?>">Preview 2</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?php echo ($step->status_preview == 'preview3') ? 'btn-secondary active' : 'disabled'; ?>" id="tiga-tab" data-toggle="tab" href="#tiga" role="tab" aria-selected="<?php echo ($step->status_preview == 'preview3') ? 'true' : 'false'; ?>">Preview 3</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?php echo ($step->status_preview == 'sidang') ? 'btn-secondary active' : 'disabled'; ?>" id="pat-tab" data-toggle="tab" href="#pat" role="tab" aria-selected="<?php echo ($step->status_preview == 'sidang') ? 'true' : 'false'; ?>">Sidang Akhir</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?php echo ($step->status_preview == 'lulus') ? 'btn-secondary active' : 'disabled'; ?>" id="ma-tab" data-toggle="tab" href="#ma" role="tab" aria-selected="<?php echo ($step->status_preview == 'lulus') ? 'true' : 'false'; ?>">Lulus</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent" style="padding-top:20px;">

    <div class="tab-pane fade <?php echo ($step->status_preview == 'preview1') ? 'show active' : ''; ?>" id="satu" role="tabpanel" aria-labelledby="satu-tab">
      <div class="alert alert-warning">
        Preview 1. Tahap awal bimbingan tugas akhir.
      </div>
      <div class="dropdown">
        <?php if (count($buttonaddbimbingan) == count($buttonaddbimbingan2) or empty($buttonaddbimbingan2)) : ?>
          <a data-toggle="modal" data-target="#exampleModal2" class="btn btn-sm btn-primary" style="color:#fff">Tambah Bimbingan</a>
        <?php else : ?>
          <button class="btn btn-sm btn-secondary" disabled style="color:#fff">Tambah Bimbingan</button>
        <?php endif; ?>
      </div>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <!-- <th scope="col">Dosen</th> -->
              <th scope="col">Keterangan</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Dokumen</th>
              <th scope="col">Proyek</th>
              <th scope="col">Status</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody id="bimbingan">
            <?php if (empty($allhistory)) : ?>
              <td colspan="7" style="background-color: whitesmoke;text-align:center">List Bimbingan kosong</td>
            <?php else : ?>
              <?php $no = 0;
              foreach ($allhistory as $t) : ?>
                <tr>
                  <td scope="row"><?= ++$no ?></td>
                  <td><?= $t['keterangan'] ?></td>
                  <td><?= $t['date'] ?></td>
                  <td>

                    <?php $file = explode(",", $t['pdf_file']); ?>
                    <?php foreach ($file as $f) : ?>
                      <a href="<?= base_url('thesis/openFile/' . $t['id'] . '/' . $f) ?>"><?= $f ?></a><br>
                    <?php endforeach; ?>
                  </td>
                  <td>
                    <?php $file = explode(",", $t['link_project']); ?>
                    <?php foreach ($file as $f) : ?>
                      <a href="<?= $f ?>" class="badge badge-info" style="margin:5px" target="_blank">Link Proyek</a><br>
                    <?php endforeach; ?>
                  </td>
                  <?php if ($t['status'] == "Dikirim") : ?>
                    <td><b>Dikirim</b></td>
                  <?php elseif ($t['status'] == "Sesuai" or $t['status'] == "Preview 1" or $t['status'] == "Preview 2" or $t['status'] == "Preview 3" or $t['status'] == "Preview 4") : ?>
                    <td><span class="badge badge-success"><?= $t['status'] ?></span></td>
                  <?php elseif ($t['status'] == "Revisi") : ?>
                    <td><span class="badge badge-danger">Revisi</span></td>
                  <?php endif; ?>
                  <?php if ($t['status'] == "Dikirim") : ?>
                    <td><a data-toggle="modal" data-target="#Jkdbs<?= encrypt_url($t['id']); ?>" class="badge badge-danger" style="color:white">Batalkan</a></td>
                  <?php else : ?>
                    <td>
                      <center>~</center>
                    </td>
                  <?php endif; ?>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
    
        <div>
          <button class="btn btn-primary" data-toggle="modal" data-target="#all_correction" style="color:white; padding:5px; margin:2px"><span class="fas fa-tasks"></span> Semua Koreksi</button>
        </div>
      </div>
    </div>

    <div class="tab-pane fade <?php echo ($step->status_preview == 'preview2') ? 'show active' : ''; ?>" id="dua" role="tabpanel" aria-labelledby="dua-tab">
      <div class="alert alert-warning">
        Preview 2. Tahap audiensi/presentasi.
      </div>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
          <tr>
            <th scope="col">Dosen Pembimbing</th>
            <th scope="col">Dosen Penguji</th>
            <th scope="col">Tanggal Audiensi</th>
            <th scope="col">Waktu Audiensi</th>
            <th scope="col">Ruangan Audiensi</th>
            <!-- <th scope="col">Nilai</th> -->
          </tr>
          </thead>
          <tbody>
            <tr>
            <td>
              <p style="padding:10px"><?= $nama_pembimbing1 ?></p> <p style="padding:10px"><?= $nama_pembimbing2 ?></p>
            </td>
            <td>
              <p style="padding:10px"><?= $nama_penguji1 ?></p> <p style="padding:10px"><?= $nama_penguji2 ?></p>
            </td>
            <td> <p style="padding:10px"><?= $informasi_presentasi->tanggal_presentasi ?></p> </td>
            <td> <p style="padding:10px"><?= $informasi_presentasi->waktu_presentasi ?></p> </td>
            <td><a href="<?= $informasi_presentasi->link_presentasi ?>" target="_blank" class="badge badge-info" style="padding:5px; margin:5px">Link Ruang Audiensi Daring</a></td>
          </tbody>
        </table>
        <div>
          <button class="btn btn-primary" data-toggle="modal" data-target="#grading" style="color:white; padding:5px; margin:2px"><span class="fas fa-star-half-alt"></span> Lihat Penilaian</button>
          <button class="btn btn-primary" data-toggle="modal" data-target="#checklist" style="color:white; padding:5px; margin:2px"><span class="fas fa-check-square"></span> Checklist</button>
        </div>
      </div>
    </div>

    <div class="tab-pane fade <?php echo ($step->status_preview == 'preview3') ? 'show active' : ''; ?>" id="tiga" role="tabpanel" aria-labelledby="tiga-tab">
      <div class="alert alert-warning">
        Preview 3. Tahap Bimbingan Lanjut
      </div>
      <div class="dropdown">
        <?php if (count($buttonaddbimbingan) == count($buttonaddbimbingan2) or empty($buttonaddbimbingan2)) : ?>
          <a data-toggle="modal" data-target="#exampleModal3" class="btn btn-sm btn-primary" style="color:#fff">Tambah Bimbingan</a>
        <?php else : ?>
          <button class="btn btn-sm btn-secondary" disabled style="color:#fff">Tambah Bimbingan</button>
        <?php endif; ?>
      </div>
      
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <!-- <th scope="col">Dosen</th> -->
              <th scope="col">Keterangan</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Dokumen</th>
              <th scope="col">Proyek</th>
              <th scope="col">Status</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody id="bimbingan">
            <?php if (empty($allhistory2)) : ?>
              <td colspan="7" style="background-color: whitesmoke;text-align:center">List Bimbingan kosong</td>
            <?php else : ?>
              <?php $no = 0;
              foreach ($allhistory2 as $t) : ?>
                <tr>
                  <td scope="row"><?= ++$no ?></td>
                  <td><?= $t['keterangan'] ?></td>
                  <td><?= $t['date'] ?></td>
                  <td>

                    <?php $file = explode(",", $t['pdf_file']); ?>
                    <?php foreach ($file as $f) : ?>
                      <a href="<?= base_url('thesis/openFile/' . $t['id'] . '/' . $f) ?>"><?= $f ?></a><br>
                    <?php endforeach; ?>
                  </td>
                  <td>
                    <?php $file = explode(",", $t['link_project']); ?>
                    <?php foreach ($file as $f) : ?>
                      <a href="<?= $f ?>" class="badge badge-info" style="margin:5px" target="_blank">Link Proyek</a><br>
                    <?php endforeach; ?>
                  </td>
                  <?php if ($t['status'] == "Dikirim") : ?>
                    <td><b>Dikirim</b></td>
                  <?php elseif ($t['status'] == "Sesuai" or $t['status'] == "Preview 1" or $t['status'] == "Preview 2" or $t['status'] == "Preview 3" or $t['status'] == "Preview 4") : ?>
                    <td><span class="badge badge-success"><?= $t['status'] ?></span></td>
                  <?php elseif ($t['status'] == "Revisi") : ?>
                    <td><span class="badge badge-danger">Revisi</span></td>
                  <?php endif; ?>
                  <?php if ($t['status'] == "Dikirim") : ?>
                    <td><a data-toggle="modal" data-target="#Jkdbs<?= encrypt_url($t['id']); ?>" class="badge badge-danger" style="color:white">Batalkan</a></td>
                  <?php else : ?>
                    <td>
                      <center>~</center>
                    </td>
                  <?php endif; ?>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>

          <br>
          <div>
            <button class="btn btn-primary" data-toggle="modal" data-target="#all_correction2" style="color:white; padding:5px; margin:2px"><span class="fas fa-tasks"></span> Semua Koreksi</button>
            <button class="btn btn-primary" data-toggle="modal" data-target="#checklist2" style="color:white; padding:5px; margin:2px"><span class="fas fa-check-square"></span> Checklist</button>
          </div>
      
      </div>
    </div>

    <div class="tab-pane fade <?php echo ($step->status_preview == 'sidang') ? 'show active' : ''; ?>" id="pat" role="tabpanel" aria-labelledby="pat-tab">
      <!-- <a data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-primary" style="color:#fff">Ajukan Siap Sidang</a> -->
      <div class="alert alert-warning">
        Preview 4. Tahap sidang
      </div>
      
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <!-- <th scope="col">#</th> -->
              <th scope="col">Dosen Pembimbing</th>
              <th scope="col">Dosen Penguji</th>
              <th scope="col">Tanggal Sidang</th>
              <th scope="col">Waktu Sidang</th>
              <?php if ($informasi_sidang->ruang_sidang != "") : ?>
                <th scope="col">Ruangan Sidang</th>
              <?php endif; ?>
              <?php if ($informasi_sidang->link_sidang != "") : ?>
                <th scope="col">Link Sidang</th>
              <?php endif; ?>
            </tr>
          </thead>
          <tbody>
            <tr>
              <!-- <th scope="row">1</th> -->
              <td>
                <p style="padding:10px"><?= $nama_pembimbing1 ?></p> <p style="padding:10px"><?= $nama_pembimbing2 ?></p>
              </td>
              <td>
                <p style="padding:10px"><?= $nama_penguji1 ?></p> <p style="padding:10px"><?= $nama_penguji2 ?></p>
              </td>
              <td> <p style="padding:10px"><?= $informasi_sidang->tanggal_sidang ?></p> </td>
              <td> <p style="padding:10px"><?= $informasi_sidang->waktu_sidang ?></p> </td>
              <?php if ($informasi_sidang->ruang_sidang != "") : ?>
                <td><p style="padding:10px"><?= $informasi_sidang->ruang_sidang ?></p></td>
              <?php endif; ?>
              <?php if ($informasi_sidang->link_sidang != "") : ?>
                <td><a href="<?= $informasi_sidang->link_sidang ?>" target="_blank" class="badge badge-info" style="padding:5px; margin:5px">Link Ruang Sidang Daring</a></td>
              <?php endif; ?>
            </tr>
          </tbody>
        </table>
    
        <br>
        <button class="btn btn-primary" data-toggle="modal" data-target="#grading_sidang" style="color:white; padding:5px; margin:2px"><span class="fas fa-star-half-alt"></span> Lihat Penilaian</button>

      </div>
    </div>

    <div class="tab-pane fade <?php echo ($step->status_preview == 'lulus') ? 'show active' : ''; ?>" id="ma" role="tabpanel" aria-labelledby="pat-tab">
      <!-- <a data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-primary" style="color:#fff">Ajukan Siap Sidang</a> -->
      <div class="alert alert-success">
        Anda sudah lulus sidang
      </div>
      
    </div>

  </div>

</main>
<!-- End Main Container -->

<!-- Modal tambah bimbingan preview 1 -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Tambah Bimbingan</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('users/addbimbingan/preview1') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" id="id_guidance" value="<?= $guide['id'] ?>" name="id_guidance">
          <div class="form-group">
            <input type="hidden" class="form-control" value="Semua" id="exampleFormControlFile1" name="fordosen" style="padding:13px 16px">
          </div>
          <div class="row">
            <div class="col-lg-11" id="dynamic">
              <div class="form-group">
                <label for="exampleFormControlFile1">Kirim Dokumen</label>
                <input type="file" class="form-control" name="fileta[]" required style="padding:13px 16px">
              </div>
            </div>
            <div class="col-lg" style="margin-top: 40px;margin-left:-10px" id="icon">
              <a id="tambah"> <span class="fas fa-plus"></span></a>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-11" id="dynamic2">
              <div class="form-group">
                <label for="exampleFormControlFile1">Link Project</label>
                <input type="text" class="form-control" name="link_project[]" style="padding:13px 16px">
              </div>
            </div>
            <div class="col-lg" style="margin-top: 40px;margin-left:-10px" id="icon2">
              <a id="tambah2"> <span class="fas fa-plus"></span></a>
            </div>
          </div>
          <div class="form-group" style="margin-bottom:0;">
            <label for="ketbim">Keterangan</label>
            <textarea class="form-control" style="padding:12px" rows="5" required id="ketbim" name="keterangan" aria-describedby="keterangan" placeholder="Masukan keterangan... (cth. Bab II)" maxlength="320"></textarea>
            <div class="invalid-feedback">
              Please provide a valid city.
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal tambah bimbingan preview 3-->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Tambah Bimbingan</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('users/addbimbingan/preview3') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" id="id_guidance" value="<?= $guide['id'] ?>" name="id_guidance">
          <div class="form-group">
            <input type="hidden" class="form-control" value="Semua" id="exampleFormControlFile1" name="fordosen" style="padding:13px 16px">
          </div>
          <div class="row">
            <div class="col-lg-11" id="dynamic">
              <div class="form-group">
                <label for="exampleFormControlFile1">Kirim Dokumen</label>
                <input type="file" class="form-control" name="fileta[]" required style="padding:13px 16px">
              </div>
            </div>
            <div class="col-lg" style="margin-top: 40px;margin-left:-10px" id="icon">
              <a id="tambah"> <span class="fas fa-plus"></span></a>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-11" id="dynamic2">
              <div class="form-group">
                <label for="exampleFormControlFile1">Link Project</label>
                <input type="text" class="form-control" name="link_project[]" style="padding:13px 16px">
              </div>
            </div>
            <div class="col-lg" style="margin-top: 40px;margin-left:-10px" id="icon2">
              <a id="tambah2"> <span class="fas fa-plus"></span></a>
            </div>
          </div>
          <div class="form-group" style="margin-bottom:0;">
            <label for="ketbim">Keterangan</label>
            <textarea class="form-control" style="padding:12px" rows="5" required id="ketbim" name="keterangan" aria-describedby="keterangan" placeholder="Masukan keterangan... (cth. Bab II)" maxlength="320"></textarea>
            <div class="invalid-feedback">
              Please provide a valid city.
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal for checklist 2 -->
<div class="modal fade" id="checklist2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Checklist Kelayakan</h5>
      </div>

      <form action="<?= base_url('thesis/saveKelayakan2/' . encrypt_url($guidance_id)) ?>" method="POST">
        <div class="modal-body">
          <div class="custom-form">

            <?php $check2 = explode(",", $layak->kelayakan2); ?>

            <div style="padding:10px">
              <center><strong>Bab 1</strong></center>
              <input type="checkbox" id="fenomena" name="kelayakan2[]" value="fenomena" <?php echo (in_array('fenomena', $check2)) ? 'checked' : ''; ?> disabled>
              <label for="fenomena"> Fenomena Permasalahan</label><br>
              <input type="checkbox" id="identifikasi" name="kelayakan2[]" value="identifikasi" <?php echo (in_array('identifikasi', $check2)) ? 'checked' : ''; ?> disabled>
              <label for="identifikasi"> Identifikasi dan rumusan masalah</label><br>
              <input type="checkbox" id="kerangka" name="kelayakan2[]" value="kerangka" <?php echo (in_array('kerangka', $check2)) ? 'checked' : ''; ?> disabled>
              <label for="kerangka"> Kerangka pemikiran</label><br><br>
            </div>

            <div style="padding:10px">
              <center><strong>Bab 2</strong></center>
              <input type="checkbox" id="landasan" name="kelayakan2[]" value="landasan" <?php echo (in_array('landasan', $check2)) ? 'checked' : ''; ?> disabled>
              <label for="landasan"> Landasan teori</label><br>
            </div>

            <div style="padding:10px">
              <center><strong>Bab 3</strong></center>
              <input type="checkbox" id="data" name="kelayakan2[]" value="data" <?php echo (in_array('data', $check2)) ? 'checked' : ''; ?> disabled>
              <label for="data"> Data Primer dan sekunder</label><br>
              <input type="checkbox" id="hasil" name="kelayakan2[]" value="hasil" <?php echo (in_array('hasil', $check2)) ? 'checked' : ''; ?> disabled>
              <label for="hasil"> Hasil analisis</label><br>
            </div>

            <div style="padding:10px">
              <center><strong>Bab 3</strong></center>
              <input type="checkbox" id="konsep" name="kelayakan2[]" value="konsep" <?php echo (in_array('konsep', $check2)) ? 'checked' : ''; ?> disabled>
              <label for="konsep"> Konsep perancangan</label><br>
              <input type="checkbox" id="karya" name="kelayakan2[]" value="karya" <?php echo (in_array('karya', $check2)) ? 'checked' : ''; ?> disabled>
              <label for="karya"> Karya visual</label><br>
            </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal for all correction 2 -->
<div class="modal fade" id="all_correction2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
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
                <?php foreach ($allcorrection2 as $a) : ?>
                  <?= $a->correction1 ?>
                <?php endforeach; ?>
              </textarea>
            </td>
            <td style="padding-left:10px">
              <h6 style="padding-bottom:10px">Pembimbing 2</h6>
              <textarea name="correction2" id="readonly" class="readonly" cols="30" rows="10">
                <?php foreach ($allcorrection2 as $a) : ?>
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

<!-- Modal Delete Pengajuan -->
<?php foreach ($allhistory as $t) : ?>
  <div class="modal fade bd-example-modal-sm" id="Jkdbs<?= encrypt_url($t['id']) ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          Batalkan pengiriman?
        </div>
        <form action="deletefileta" method="post" enctype="multipart/form-data">
          <div class="modal-footer">
            <input type="hidden" id="id" name="id" value="<?= $t['id']; ?>">
            <input type="hidden" id="file" name="fileta" value="<?= $t['pdf_file']; ?>">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" name="deletedata" class="btn btn-danger btn-sm">Batalkan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<script>
  $(document).ready(function() {
    var no = 1;
    $('#tambah').click(function() {
      no++;
      $('#dynamic').append('<div id="row' + no + '"><div style="margin-top:30px;margin-bottom:10px;"><input type="file" name="fileta[]"  required style="margin-top:-13px;padding:13px 16px" class="form-control" /></div></div>');
      $('#icon').append('<div id="row' + no + '" style="margin-top:42px"><a id="' + no + '" class="btn_remove"> <span class="fas fa-minus"></span></a><div>')
    });
    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
      $('#row' + button_id + '').remove();
    });
  });
</script>
<script>
  $(document).ready(function() {
    var no = 1;
    $('#tambah2').click(function() {
      no++;
      $('#dynamic2').append('<div id="row' + no + '"><div style="margin-top:30px;margin-bottom:10px;"><input type="text" name="link_project[]" style="margin-top:-13px;padding:13px 16px" class="form-control" /></div></div>');
      $('#icon2').append('<div id="row' + no + '" style="margin-top:42px"><a id="' + no + '" class="btn_remove"> <span class="fas fa-minus"></span></a><div>')
    });
    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
      $('#row' + button_id + '').remove();
    });
  });
</script>

<!-- Modal for checklist -->
<div class="modal fade" id="checklist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Checklist Kelayakan</h5>
      </div>

      <form action="<?= base_url('thesis/saveKelayakan/' . encrypt_url($guidance_id)) ?>" method="POST">
        <div class="modal-body">
          <div class="custom-form">

            <?php $check = explode(",", $layak->kelayakan); ?>

            <input type="checkbox" id="kesesuaian" name="kelayakan[]" value="kesesuaian" <?php echo (in_array('kesesuaian', $check)) ? 'checked' : ''; ?> disabled>
            <label for="kesesuaian"> Kesesuaian fenomeda dan permasalahan yang diangkat</label><br>
            <input type="checkbox" id="ketepatan" name="kelayakan[]" value="ketepatan" <?php echo (in_array('ketepatan', $check)) ? 'checked' : ''; ?> disabled>
            <label for="ketepatan"> Ketepatan penyusunan hipotesa</label><br>
            <input type="checkbox" id="kaidah" name="kelayakan[]" value="kaidah" <?php echo (in_array('kaidah', $check)) ? 'checked' : ''; ?> disabled>
            <label for="kaidah"> Kaidah tata tulis karya ilmiah</label><br><br>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </form>
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
      <form action="<?= base_url('thesis/savePenilaian/' . encrypt_url($guidance_id)) ?>" method="POST">
        <div class="modal-body">
          <div class="custom-form">
            <table style="width:100%">
              <tr style="padding:10px">
                <td style="padding:10px">
                  <h6 style="padding:10px">Pembimbing 1: <?= $nama_pembimbing1 ?></h6>
                  <?php $file = explode(",", $penilaian->nilai_pembimbing1); ?>
                  <center><strong>Bab 1</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="nilai1[]" value="<?= $file[0] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Ketepatan menjelaskan fenomena permasalahan *10</label>
                    </div>
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="nilai1[]" value="<?= $file[1] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Ketepatan mengidentifikasi dan merumuskan permasalahan *10</label>
                    </div>
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="nilai1[]" value="<?= $file[2] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Kesesuaian kerangka pemikiran dengan tujuan penelitian/perancangan *10</label>
                    </div>
                  </div>
                  <center><strong>Bab 2</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="nilai1[]" value="<?= $file[3] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Relevansi pemilihan teori dengan lingkup penelitian/perancangan *10</label>
                    </div>
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="nilai1[]" value="<?= $file[4] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Kemutakhiran teori yang digunakan (merujuk artikel/publikasi dosen) *10</label>
                    </div>
                  </div>
                  <center><strong>Bab 3</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="20" name="nilai1[]" value="<?= $file[5] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Kelengkapan dan kesesuaian data yang diperoleh *20</label>
                    </div>
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="20" name="nilai1[]" value="<?= $file[6] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Ketetapan pengolahan (klasifikasi, kategorisasi), ketajaman analisis, dan simpulan *20</label>
                    </div>
                  </div>
                  <center><strong>Sistematika Penulisan</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="nilai1[]" value="<?= $file[7] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Kaidah tata tulis ilmiah *10</label>
                    </div>
                  </div>
                  <center><strong>Total</strong></center>
                  <?php  $nilai1 = explode(",", $penilaian->nilai_pembimbing1); ?>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                    <input type="number" name="" value="<?= array_sum($nilai1) ?>" class="form-control" placeholder="" autocomplete="off" disabled />
                      <label>Total nilai penguji 1</label>
                    </div>
                  </div>
                  <div style="padding:10px">
                    <textarea name="penilaian1" class="<?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'readonly' : 'editable'; ?>" cols="30" rows="10"><?= $penilaian->penilaian_pembimbing1 ?></textarea>
                  </div>
                </td>

                <td style="padding:10px">
                  <h6 style="padding:10px">Pembimbing 2: <?= $nama_pembimbing2 ?></h6>
                  <?php $file2 = explode(",", $penilaian->nilai_pembimbing2); ?>
                  <center><strong>Bab 1</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="nilai2[]" value="<?= $file2[0] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Ketepatan menjelaskan fenomena permasalahan *10</label>
                    </div>
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="nilai2[]" value="<?= $file2[1] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Ketepatan mengidentifikasi dan merumuskan permasalahan *10</label>
                    </div>
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="nilai2[]" value="<?= $file2[2] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Kesesuaian kerangka pemikiran dengan tujuan penelitian/perancangan *10</label>
                    </div>
                  </div>
                  <center><strong>Bab 2</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="nilai2[]" value="<?= $file2[3] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Relevansi pemilihan teori dengan lingkup penelitian/perancangan *10</label>
                    </div>
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="nilai2[]" value="<?= $file2[4] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Kemutakhiran teori yang digunakan (merujuk artikel/publikasi dosen) *10</label>
                    </div>
                  </div>
                  <center><strong>Bab 3</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="20" name="nilai2[]" value="<?= $file2[5] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Kelengkapan dan kesesuaian data yang diperoleh *20</label>
                    </div>
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="20" name="nilai2[]" value="<?= $file2[6] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Ketetapan pengolahan (klasifikasi, kategorisasi), ketajaman analisis, dan simpulan *20</label>
                    </div>
                  </div>
                  <center><strong>Sistematika Penulisan</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="nilai2[]" value="<?= $file2[7] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Kaidah tata tulis ilmiah *10</label>
                    </div>
                  </div>
                  <center><strong>Total</strong></center>
                  <?php  $nilai2 = explode(",", $penilaian->nilai_pembimbing2); ?>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                    <input type="number" name="" value="<?= array_sum($nilai2) ?>" class="form-control" placeholder="" autocomplete="off" disabled />
                      <label>Total nilai pembimbing 2</label>
                    </div>
                  </div>
                  <div style="padding:10px">
                    <textarea name="penilaian2" class="<?php echo ($lecturers->dosen_pembimbing2 != $this->session->userdata('id')) ? 'readonly' : 'editable'; ?>" cols="30" rows="10"><?= $penilaian->penilaian_pembimbing2 ?></textarea>
                  </div>
                </td>
              </tr>

              <tr style="padding:10px">
                <td style="padding:10px">
                  <h6 style="padding:10px">Penguji 1: <?= $nama_penguji1 ?></h6>
                  <?php $file3 = explode(",", $penilaian->nilai_penguji1); ?>
                  <center><strong>Bab 1</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="nilai3[]" value="<?= $file3[0] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Ketepatan menjelaskan fenomena permasalahan *10</label>
                    </div>
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="nilai3[]" value="<?= $file3[1] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Ketepatan mengidentifikasi dan merumuskan permasalahan *10</label>
                    </div>
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="nilai3[]" value="<?= $file3[2] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Kesesuaian kerangka pemikiran dengan tujuan penelitian/perancangan *10</label>
                    </div>
                  </div>
                  <center><strong>Bab 2</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="nilai3[]" value="<?= $file3[3] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Relevansi pemilihan teori dengan lingkup penelitian/perancangan *10</label>
                    </div>
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="nilai3[]" value="<?= $file3[4] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Kemutakhiran teori yang digunakan (merujuk artikel/publikasi dosen) *10</label>
                    </div>
                  </div>
                  <center><strong>Bab 3</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="20" name="nilai3[]" value="<?= $file3[5] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Kelengkapan dan kesesuaian data yang diperoleh *20</label>
                    </div>
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="20" name="nilai3[]" value="<?= $file3[6] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Ketetapan pengolahan (klasifikasi, kategorisasi), ketajaman analisis, dan simpulan *20</label>
                    </div>
                  </div>
                  <center><strong>Sistematika Penulisan</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="nilai3[]" value="<?= $file3[7] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Kaidah tata tulis ilmiah *10</label>
                    </div>
                  </div>
                  <center><strong>Total</strong></center>
                  <?php  $nilai3 = explode(",", $penilaian->nilai_penguji1); ?>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                    <input type="number" name="" value="<?= array_sum($nilai3) ?>" class="form-control" placeholder="" autocomplete="off" disabled />
                      <label>Total nilai penguji 1</label>
                    </div>
                  </div>
                  <div style="padding:10px">
                    <textarea name="penilaian3" class="<?php echo ($lecturers->dosen_penguji1 != $this->session->userdata('id')) ? 'readonly' : 'editable'; ?>" cols="30" rows="10"><?= $penilaian->penilaian_penguji1 ?></textarea>
                  </div>
                </td>
                <td style="padding:10px">
                  <h6 style="padding:10px">Penguji 2: <?= $nama_penguji2 ?></h6>
                  <?php $file4 = explode(",", $penilaian->nilai_penguji2); ?>
                  <center><strong>Bab 1</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="nilai4[]" value="<?= $file4[0] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Ketepatan menjelaskan fenomena permasalahan *10</label>
                    </div>
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="nilai4[]" value="<?= $file4[1] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Ketepatan mengidentifikasi dan merumuskan permasalahan *10</label>
                    </div>
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="nilai4[]" value="<?= $file4[2] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Kesesuaian kerangka pemikiran dengan tujuan penelitian/perancangan *10</label>
                    </div>
                  </div>
                  <center><strong>Bab 2</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="nilai4[]" value="<?= $file4[3] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Relevansi pemilihan teori dengan lingkup penelitian/perancangan *10</label>
                    </div>
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="nilai4[]" value="<?= $file4[4] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Kemutakhiran teori yang digunakan (merujuk artikel/publikasi dosen) *10</label>
                    </div>
                  </div>
                  <center><strong>Bab 3</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="20" name="nilai4[]" value="<?= $file4[5] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Kelengkapan dan kesesuaian data yang diperoleh *20</label>
                    </div>
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="20" name="nilai4[]" value="<?= $file4[6] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Ketetapan pengolahan (klasifikasi, kategorisasi), ketajaman analisis, dan simpulan *20</label>
                    </div>
                  </div>
                  <center><strong>Sistematika Penulisan</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="nilai4[]" value="<?= $file4[7] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Kaidah tata tulis ilmiah *10</label>
                    </div>
                  </div>
                  <center><strong>Total</strong></center>
                  <?php  $nilai4 = explode(",", $penilaian->nilai_penguji2); ?>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                    <input type="number" name="" value="<?= array_sum($nilai4) ?>" class="form-control" placeholder="" autocomplete="off" disabled />
                      <label>Total nilai penguji 2</label>
                    </div>
                  </div>
                  <div style="padding:10px">
                    <textarea name="penilaian4" class="<?php echo ($lecturers->dosen_penguji2 != $this->session->userdata('id')) ? 'readonly' : 'editable'; ?>" cols="30" rows="10"><?= $penilaian->penilaian_penguji2 ?></textarea>
                  </div>
                </td>
              </tr>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal for all grading sidang -->
<div class="modal fade" id="grading_sidang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Penilaian</h5>
      </div>
      <form action="<?= base_url('thesis/savePoin/' . encrypt_url($guidance_id)) ?>" method="POST">
        <div class="modal-body">
          <div class="custom-form">
            <table style="width:100%">
              <tr style="padding:10px">
                <td style="padding:10px">
                  <h6 style="padding:10px">Pembimbing 1: <?= $nama_pembimbing1 ?></h6>
                  <?php $poin1 = explode(",", $penilaian->poin_pembimbing1); ?>
                  <center><strong>Bab 1</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="poin1[]" value="<?= $poin1[0] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Ketepatan menjelaskan fenomena, serta merumuskan permasalahan *10</label>
                    </div>
                  </div>
                  <center><strong>Bab 2</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="poin1[]" value="<?= $poin1[1] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Relevansi dan kemutakhiran teori yang digunakan lingkup penelitian/perancangan *10</label>
                    </div>
                  </div>
                  <center><strong>Bab 3</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="poin1[]" value="<?= $poin1[2] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Kelengkapan dan kesesuaian data yang diperoleh *10</label>
                    </div>
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="poin1[]" value="<?= $poin1[3] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Ketetapan pengolahan (klasifikasi, kategorisasi), ketajaman analisis, dan simpulan *10</label>
                    </div>
                  </div>
                  <center><strong>Bab 4</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="15" name="poin1[]" value="<?= $poin1[4] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Ketepatan dalam merumuskan konsep perancangan *15</label>
                    </div>
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="25" name="poin1[]" value="<?= $poin1[5] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Penyajian karya visual sesuai kaidah estetik *25</label>
                    </div>
                  </div>
                  <center><strong>Bab 5</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="5" name="poin1[]" value="<?= $poin1[6] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Ketepatan dalam merumuskan kesimpulan dan saran *5</label>
                    </div>
                  </div>
                  <center><strong>Sistematika Penulisan dan Presentasi</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="poin1[]" value="<?= $poin1[7] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Kaidah tata tulis ilmiah *10</label>
                    </div>
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="5" name="poin1[]" value="<?= $poin1[8] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Presentasi *5</label>
                    </div>
                  </div>
                  <center><strong>Total</strong></center>
                  <?php  $poin1 = explode(",", $penilaian->poin_pembimbing1); ?>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                    <input type="number" name="" value="<?= array_sum($poin1) ?>" class="form-control" placeholder="" autocomplete="off" disabled />
                      <label>Total nilai pembimbing 1</label>
                    </div>
                  </div>
                  <div style="padding:10px">
                    <textarea name="evaluasi1" class="<?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'readonly' : 'editable'; ?>" cols="30" rows="10"><?= $penilaian->evaluasi_pembimbing1 ?></textarea>
                  </div>
                </td>

                <td style="padding:10px">
                  <h6 style="padding:10px">Pembimbing 2: <?= $nama_pembimbing2 ?></h6>
                  <?php $poin2 = explode(",", $penilaian->poin_pembimbing2); ?>
                  <center><strong>Bab 1</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="poin2[]" value="<?= $poin2[0] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Ketepatan menjelaskan fenomena, serta merumuskan permasalahan *10</label>
                    </div>
                  </div>
                  <center><strong>Bab 2</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="poin2[]" value="<?= $poin2[1] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Relevansi dan kemutakhiran teori yang digunakan lingkup penelitian/perancangan *10</label>
                    </div>
                  </div>
                  <center><strong>Bab 3</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="poin2[]" value="<?= $poin2[2] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Kelengkapan dan kesesuaian data yang diperoleh *10</label>
                    </div>
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="poin2[]" value="<?= $poin2[3] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Ketetapan pengolahan (klasifikasi, kategorisasi), ketajaman analisis, dan simpulan *10</label>
                    </div>
                  </div>
                  <center><strong>Bab 4</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="15" name="poin2[]" value="<?= $poin2[4] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Ketepatan dalam merumuskan konsep perancangan *15</label>
                    </div>
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="25" name="poin2[]" value="<?= $poin2[5] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Penyajian karya visual sesuai kaidah estetik *25</label>
                    </div>
                  </div>
                  <center><strong>Bab 5</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="5" name="poin2[]" value="<?= $poin2[6] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Ketepatan dalam merumuskan kesimpulan dan saran *5</label>
                    </div>
                  </div>
                  <center><strong>Sistematika Penulisan dan Presentasi</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="poin2[]" value="<?= $poin2[7] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Kaidah tata tulis ilmiah *10</label>
                    </div>
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="5" name="poin2[]" value="<?= $poin2[8] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_pembimbing2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Presentasi *5</label>
                    </div>
                  </div>
                  <center><strong>Total</strong></center>
                  <?php  $poin2 = explode(",", $penilaian->poin_pembimbing2); ?>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                    <input type="number" name="" value="<?= array_sum($poin2) ?>" class="form-control" placeholder="" autocomplete="off" disabled />
                      <label>Total nilai pembimbing 2</label>
                    </div>
                  </div>
                  <div style="padding:10px">
                    <textarea name="evaluasi2" class="<?php echo ($lecturers->dosen_pembimbing2 != $this->session->userdata('id')) ? 'readonly' : 'editable'; ?>" cols="30" rows="10"><?= $penilaian->evaluasi_pembimbing2 ?></textarea>
                  </div>
                </td>
              </tr>

              <tr style="padding:10px">
              <td style="padding:10px">
                  <h6 style="padding:10px">Penguji 2: <?= $nama_penguji1 ?></h6>
                  <?php $poin3 = explode(",", $penilaian->poin_penguji1); ?>
                  <center><strong>Bab 1</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="poin3[]" value="<?= $poin3[0] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Ketepatan menjelaskan fenomena, serta merumuskan permasalahan *10</label>
                    </div>
                  </div>
                  <center><strong>Bab 2</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="poin3[]" value="<?= $poin3[1] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Relevansi dan kemutakhiran teori yang digunakan lingkup penelitian/perancangan *10</label>
                    </div>
                  </div>
                  <center><strong>Bab 3</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="poin3[]" value="<?= $poin3[2] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Kelengkapan dan kesesuaian data yang diperoleh *10</label>
                    </div>
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="poin3[]" value="<?= $poin3[3] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Ketetapan pengolahan (klasifikasi, kategorisasi), ketajaman analisis, dan simpulan *10</label>
                    </div>
                  </div>
                  <center><strong>Bab 4</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="15" name="poin3[]" value="<?= $poin3[4] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Ketepatan dalam merumuskan konsep perancangan *15</label>
                    </div>
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="25" name="poin3[]" value="<?= $poin3[5] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Penyajian karya visual sesuai kaidah estetik *25</label>
                    </div>
                  </div>
                  <center><strong>Bab 5</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="5" name="poin3[]" value="<?= $poin3[6] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Ketepatan dalam merumuskan kesimpulan dan saran *5</label>
                    </div>
                  </div>
                  <center><strong>Sistematika Penulisan dan Presentasi</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="poin3[]" value="<?= $poin3[7] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Kaidah tata tulis ilmiah *10</label>
                    </div>
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="5" name="poin3[]" value="<?= $poin3[8] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji1 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Presentasi *5</label>
                    </div>
                  </div>
                  <center><strong>Total</strong></center>
                  <?php  $poin3 = explode(",", $penilaian->poin_penguji1); ?>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                    <input type="number" name="" value="<?= array_sum($poin3) ?>" class="form-control" placeholder="" autocomplete="off" disabled />
                      <label>Total nilai penguji 1</label>
                    </div>
                  </div>
                  <div style="padding:10px">
                    <textarea name="evaluasi3" class="<?php echo ($lecturers->dosen_penguji1 != $this->session->userdata('id')) ? 'readonly' : 'editable'; ?>" cols="30" rows="10"><?= $penilaian->evaluasi_penguji1 ?></textarea>
                  </div>
                </td>

                <td style="padding:10px">
                  <h6 style="padding:10px">Penguji 2: <?= $nama_penguji2 ?></h6>
                  <?php $poin4 = explode(",", $penilaian->poin_penguji2); ?>
                  <center><strong>Bab 1</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="poin4[]" value="<?= $poin4[0] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Ketepatan menjelaskan fenomena, serta merumuskan permasalahan *10</label>
                    </div>
                  </div>
                  <center><strong>Bab 2</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="poin4[]" value="<?= $poin4[1] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Relevansi dan kemutakhiran teori yang digunakan lingkup penelitian/perancangan *10</label>
                    </div>
                  </div>
                  <center><strong>Bab 3</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="poin4[]" value="<?= $poin4[2] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Kelengkapan dan kesesuaian data yang diperoleh *10</label>
                    </div>
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="poin4[]" value="<?= $poin4[3] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Ketetapan pengolahan (klasifikasi, kategorisasi), ketajaman analisis, dan simpulan *10</label>
                    </div>
                  </div>
                  <center><strong>Bab 4</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="15" name="poin4[]" value="<?= $poin4[4] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Ketepatan dalam merumuskan konsep perancangan *15</label>
                    </div>
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="25" name="poin4[]" value="<?= $poin4[5] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Penyajian karya visual sesuai kaidah estetik *25</label>
                    </div>
                  </div>
                  <center><strong>Bab 5</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="5" name="poin4[]" value="<?= $poin4[6] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Ketepatan dalam merumuskan kesimpulan dan saran *5</label>
                    </div>
                  </div>
                  <center><strong>Sistematika Penulisan dan Presentasi</strong></center>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="10" name="poin4[]" value="<?= $poin4[7] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Kaidah tata tulis ilmiah *10</label>
                    </div>
                    <div class="form-group" style="padding-left:10px">
                      <input type="number" min="0" max="5" name="poin4[]" value="<?= $poin4[8] ?>" class="form-control" placeholder="" autocomplete="off" <?php echo ($lecturers->dosen_penguji2 != $this->session->userdata('id')) ? 'readonly' : ''; ?> />
                      <label>Presentasi *5</label>
                    </div>
                  </div>
                  <center><strong>Total</strong></center>
                  <?php  $poin4 = explode(",", $penilaian->poin_penguji2); ?>
                  <div style="padding:10px">
                    <div class="form-group" style="padding-left:10px">
                    <input type="number" name="" value="<?= array_sum($poin4) ?>" class="form-control" placeholder="" autocomplete="off" disabled />
                      <label>Total nilai penguji 2</label>
                    </div>
                  </div>
                  <div style="padding:10px">
                    <textarea name="evaluasi4" class="<?php echo ($lecturers->dosen_penguji2 != $this->session->userdata('id')) ? 'readonly' : 'editable'; ?>" cols="30" rows="10"><?= $penilaian->evaluasi_penguji2 ?></textarea>
                  </div>
                </td>
                </td>
              </tr>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
      </form>
    </div>
  </div>
</div>