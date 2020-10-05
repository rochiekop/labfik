<!-- Main Container -->
<main class="akun-container">
  <div class="fik-section-title2">
    <h4>Bimbingan</h4>
  </div>
  <?= $this->session->flashdata('message'); ?>
  <?php echo ($nama_pembimbing1 != '') ? '<p>Pembimbing 1: '.$nama_pembimbing1.' </p>' : ''; ?>
  <?php echo ($nama_pembimbing2 != '') ? '<p>Pembimbing 2: '.$nama_pembimbing1.' </p>' : ''; ?>
  <?php echo ($nama_penguji1 != '') ? '<p>Penguji 1: '.$nama_penguji1.' </p>' : ''; ?>
  <?php echo ($nama_penguji2 != '') ? '<p>Penguji 2: '.$nama_penguji2.' </p>' : ''; ?>
  <?php echo ($nama_penguji3 != '') ? '<p>Penguji 3: '.$nama_penguji3.' </p>' : ''; ?>
  <br>
  <ul class="nav nav-pills" id="myTab" role="tablist">
    <li class="nav-item">
      <!-- <a class="nav-link <?php echo ($step->status_preview == 'preview1') ? 'btn-secondary active' : ''; ?>" id="satu-tab" data-toggle="tab" href="#satu" role="tab" aria-selected="<?php echo ($step->status_preview == 'preview1') ? 'true' : 'false'; ?>">Preview 1</a> -->
      <?php if ($step->status_preview == 'preview1') : ?>
        <a class="nav-link btn-secondary active" id="satu-tab" data-toggle="tab" href="#satu" role="tab" aria-selected="false">Preview 1</a>
      <?php elseif ($step->status_preview == 'preview2' or $step->status_preview == 'preview3' or $step->status_preview == 'sidang' or $step->status_preview == 'lulus') : ?>
        <a class="nav-link" id="satu-tab" data-toggle="tab" href="#satu" role="tab" aria-selected="false">Preview 1</a>
      <?php else : ?>
        <a class="nav-link disabled" id="satu-tab" data-toggle="tab" href="#satu" role="tab" aria-selected="false">Preview 1</a>
      <?php endif; ?>
    </li>
    <li class="nav-item">
      <!-- <a class="nav-link <?php echo ($step->status_preview == 'preview2') ? 'btn-secondary active' : 'disabled'; ?>" id="dua-tab" data-toggle="tab" href="#dua" role="tab" aria-selected="<?php echo ($step->status_preview == 'preview2') ? 'true' : 'false'; ?>">Preview 2</a> -->
      <?php if ($step->status_preview == 'preview2') : ?>
        <a class="nav-link btn-secondary active" id="dua-tab" data-toggle="tab" href="#dua" role="tab" aria-selected="false">Preview 2</a>
      <?php elseif ($step->status_preview == 'preview3' or $step->status_preview == 'sidang' or $step->status_preview == 'lulus') : ?>
        <a class="nav-link" id="dua-tab" data-toggle="tab" href="#dua" role="tab" aria-selected="false">Preview 2</a>
      <?php else : ?>
        <a class="nav-link disabled" id="dua-tab" data-toggle="tab" href="#dua" role="tab" aria-selected="false">Preview 2</a>  
      <?php endif; ?>
    </li>
    <li class="nav-item">
      <!-- <a class="nav-link <?php echo ($step->status_preview == 'preview3') ? 'btn-secondary active' : 'disabled'; ?>" id="tiga-tab" data-toggle="tab" href="#tiga" role="tab" aria-selected="<?php echo ($step->status_preview == 'preview3') ? 'true' : 'false'; ?>">Preview 3</a> -->
      <?php if ($step->status_preview == 'preview3') : ?>
        <a class="nav-link btn-secondary active" id="tiga-tab" data-toggle="tab" href="#tiga" role="tab" aria-selected="false">Preview 3</a>
      <?php elseif ($step->status_preview == 'sidang' or $step->status_preview == 'lulus') : ?>
        <a class="nav-link" id="tiga-tab" data-toggle="tab" href="#tiga" role="tab" aria-selected="false">Preview 3</a>
      <?php else : ?>
        <a class="nav-link disabled" id="tiga-tab" data-toggle="tab" href="#tiga" role="tab" aria-selected="false">Preview 3</a>
      <?php endif; ?>
    </li>
    <li class="nav-item">
      <!-- <a class="nav-link <?php echo ($step->status_preview == 'sidang') ? 'btn-secondary active' : 'disabled'; ?>" id="pat-tab" data-toggle="tab" href="#pat" role="tab" aria-selected="<?php echo ($step->status_preview == 'sidang') ? 'true' : 'false'; ?>">Sidang Akhir</a> -->
      <?php if ($step->status_preview == 'sidang') : ?>
        <a class="nav-link btn-secondary active" id="pat-tab" data-toggle="tab" href="#pat" role="tab" aria-selected="false">Sidang Akhir</a>
      <?php elseif ($step->status_preview == 'lulus') : ?>
        <a class="nav-link" id="pat-tab" data-toggle="tab" href="#pat" role="tab" aria-selected="false">Sidang Akhir</a>
      <?php else : ?>
        <a class="nav-link disabled" id="pat-tab" data-toggle="tab" href="#pat" role="tab" aria-selected="false">Sidang Akhir</a>
      <?php endif; ?>
    </li>
    <li class="nav-item">
      <!-- <a class="nav-link <?php echo ($step->status_preview == 'lulus') ? 'btn-secondary active' : 'disabled'; ?>" id="ma-tab" data-toggle="tab" href="#ma" role="tab" aria-selected="<?php echo ($step->status_preview == 'lulus') ? 'true' : 'false'; ?>">Lulus</a> -->
      <?php if ($step->status_preview == 'lulus') : ?>
        <a class="nav-link btn-secondary active" id="ma-tab" data-toggle="tab" href="#ma" role="tab" aria-selected="false">Lulus</a>
      <?php else : ?>
        <a class="nav-link disabled" id="ma-tab" data-toggle="tab" href="#ma" role="tab" aria-selected="false">Lulus</a>
      <?php endif; ?>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent" style="padding-top:20px;">

    <div class="tab-pane fade <?php echo ($step->status_preview == 'preview1') ? 'show active' : ''; ?>" id="satu" role="tabpanel" aria-labelledby="satu-tab">
      <div class="alert alert-warning">
        Preview 1. Tahap awal bimbingan tugas akhir.
      </div>
      <div class="dropdown">
        <?php if ((count($buttonaddbimbingan) == count($buttonaddbimbingan2) or empty($buttonaddbimbingan2)) and ($step->status_preview == 'preview1')) : ?>
          <a data-toggle="modal" data-target="#tambah_bimbingan_preview1" class="btn btn-sm btn-primary" style="color:#fff"><span class="fas fa-plus"></span> Tambah Bimbingan</a>
        <?php else : ?>
          <button class="btn btn-sm btn-primary" disabled style="color:#fff"><span class="fas fa-plus"></span> Tambah Bimbingan</button>
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
          <button class="btn btn-primary" data-toggle="modal" data-target="#checklist" style="color:white; padding:5px; margin:2px"><span class="fas fa-check-square"></span> Checklist</button>
        </div>
      </div>
    </div>

    <div class="tab-pane fade <?php echo ($step->status_preview == 'preview2') ? 'show active' : ''; ?>" id="dua" role="tabpanel" aria-labelledby="dua-tab">
      <div class="alert alert-warning">
        Preview 2. Tahap audiensi/presentasi.
      </div>
      <div class="dropdown">
        <?php if ((count($buttonaddbimbingan) == count($buttonaddbimbingan2) or empty($buttonaddbimbingan2)) and ($step->status_preview == 'preview2')) : ?>
          <a data-toggle="modal" data-target="#tambah_bimbingan_preview2" class="btn btn-sm btn-primary" style="color:#fff"><span class="fas fa-plus"></span> Tambah Bimbingan</a>
        <?php else : ?>
          <button class="btn btn-sm btn-primary" disabled style="color:#fff"><span class="fas fa-plus"></span> Tambah Bimbingan</button>
        <?php endif; ?>
      </div>
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
            <?php if (empty($allhistory2)) : ?>
              <td colspan="6" style="background-color: whitesmoke;text-align:center">tidak ada bimbingan</td>
            <?php else : ?>
              <?php $no = 0;
              foreach ($allhistory2 as $f) : ?>
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
                      <a href="<?= base_url('thesis/setSesuai/' . $f['id'] . '/' . $guidance_id) ?>" class="btn badge badge-success" <?php echo ($lecturers->dosen_pembimbing1 == $this->session->userdata('id') and $step->status_preview == 'preview1') ? '' : 'hidden'; ?> >Sesuai</a>
                      <a href="<?= base_url('thesis/setRevisi/' . $f['id'] . '/' . $guidance_id) ?>" class="btn badge badge-danger" <?php echo ($lecturers->dosen_pembimbing1 == $this->session->userdata('id') and $step->status_preview == 'preview1') ? '' : 'hidden'; ?> >Revisi</a>
                    <?php elseif ($f['status'] == 'Sesuai') : ?>
                      Sesuai <a href="<?= base_url('thesis/resetBimbingan/' . $f['id'] . '/' . $guidance_id) ?>" class="btn badge badge-danger" style="margin-left:2px" <?php echo ($lecturers->dosen_pembimbing1 == $this->session->userdata('id') and $step->status_preview == 'preview1') ? '' : 'hidden'; ?> >Reset</a>
                    <?php elseif ($f['status'] == 'Revisi') : ?>
                      Revisi <a href="<?= base_url('thesis/resetBimbingan/' . $f['id'] . '/' . $guidance_id) ?>" class="btn badge badge-danger" style="margin-left:2px" <?php echo ($lecturers->dosen_pembimbing1 == $this->session->userdata('id') and $step->status_preview == 'preview1') ? '' : 'hidden'; ?> >Reset</a>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
        <div>
          <table>
            <td>
              <table>
                <thead>
                  <th style="width: 150px;"></th>
                  <th style="width: 10px;"></th>
                </thead>
                <tbody>
                  <?php if ($informasi_presentasi->tanggal_presentasi != "0000-00-00") : ?>
                  <tr>
                    <td>Tanggal Audiensi</td>
                    <td>:</td>
                    <td><?= $informasi_presentasi->tanggal_presentasi ?></td>
                  </tr>
                  <?php endif; ?>
                  <?php if ($informasi_presentasi->waktu_presentasi != "00:00:00") : ?>
                  <tr>
                    <td>Waktu Audiensi</td>
                    <td>:</td>
                    <td><?= $informasi_presentasi->waktu_presentasi ?></td>
                  </tr>
                  <?php endif; ?>
                  <?php if ($informasi_presentasi->link_presentasi != "") : ?>
                  <tr>
                    <td>Link Audiensi</td>
                    <td>:</td>
                    <td><a href="<?= $informasi_presentasi->link_presentasi ?>" target="_blank" class="badge badge-info" style="padding:5px; margin:5px">Link Ruang Audiensi Daring</a></td>
                  </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </td>
            <td>
              <br>
              <table>
                <thead>
                  <th style="width: 150px;"></th>
                  <th style="width: 10px;"></th>
                </thead>
                <tbody>
                  <?php if ($nama_pembimbing1 != "") : ?>
                  <tr>
                    <td>Nilai Pembimbing 1</td>
                    <td>:</td>
                    <td><?= array_sum(explode(",", $penilaian->nilai_pembimbing1)) ?></td>
                  </tr>
                  <?php endif; ?>
                  <?php if ($nama_pembimbing2 != "") : ?>
                  <tr>
                    <td>Nilai Pembimbing 2</td>
                    <td>:</td>
                    <td><?= array_sum(explode(",", $penilaian->nilai_pembimbing2)) ?></td>
                  </tr>
                  <?php endif; ?>
                  <?php if ($nama_penguji1 != "") : ?>
                  <tr>
                    <td>Nilai Penguji 1</td>
                    <td>:</td>
                    <td><?= array_sum(explode(",", $penilaian->nilai_penguji1)) ?></td>
                  </tr>
                  <?php endif; ?>
                  <?php if ($nama_penguji2 != "") : ?>
                  <tr>
                    <td>Nilai Penguji 2</td>
                    <td>:</td>
                    <td><?= array_sum(explode(",", $penilaian->nilai_penguji2)) ?></td>
                  </tr>
                  <?php endif; ?>
                  <?php if ($nama_penguji3 != "") : ?>
                  <tr>
                    <td>Nilai Penguji 3</td>
                    <td>:</td>
                    <td><?= array_sum(explode(",", $penilaian->nilai_penguji3)) ?></td>
                  </tr>
                  <?php endif; ?>

                  <?php if ($penilaian->nilai_pembimbing1 != ',,,,,,,') : ?>
                  <?php $pembagi = 1 ?>
                  <tr>
                    <th>Rata-rata</th>
                    <th>:</th>
                    <?php if ($penilaian->nilai_pembimbing2 != ',,,,,,,') $pembagi = $pembagi+1 ; if ($penilaian->nilai_penguji1 != ',,,,,,,') $pembagi = $pembagi+1 ; if ($penilaian->nilai_penguji2 != ',,,,,,,') $pembagi = $pembagi+1 ; if ($penilaian->nilai_penguji3 != ',,,,,,,') $pembagi = $pembagi+1 ; ?>
                    <th><?= ( array_sum(explode(",", $penilaian->nilai_pembimbing1)) + array_sum(explode(",", $penilaian->nilai_pembimbing2)) + array_sum(explode(",", $penilaian->nilai_penguji1)) + array_sum(explode(",", $penilaian->nilai_penguji2)) + array_sum(explode(",", $penilaian->nilai_penguji3)) ) / $pembagi ?></th>
                  </tr>
                  <?php endif; ?>

                  <tr>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-primary" data-toggle="modal" data-target="#grade_detail" style="color:white; padding:5px; margin:2px"></span> Detail</button></td>
                  </tr>
                </tbody>
              </table>
            </td>
          </table>
        </div>
      </div>
    </div>

    <div class="tab-pane fade <?php echo ($step->status_preview == 'preview3') ? 'show active' : ''; ?>" id="tiga" role="tabpanel" aria-labelledby="tiga-tab">
      <div class="alert alert-warning">
        Preview 3. Tahap Bimbingan Lanjut
      </div>
      <div class="dropdown">
        <?php if ((count($buttonaddbimbingan) == count($buttonaddbimbingan2) or empty($buttonaddbimbingan2)) and ($step->status_preview == 'preview3')) : ?>
          <a data-toggle="modal" data-target="#tambah_bimbingan_preview3" class="btn btn-sm btn-primary" style="color:#fff">Tambah Bimbingan</a>
        <?php else : ?>
          <button class="btn btn-sm btn-primary" disabled style="color:#fff">Tambah Bimbingan</button>
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
            <?php if (empty($allhistory3)) : ?>
              <td colspan="7" style="background-color: whitesmoke;text-align:center">List Bimbingan kosong</td>
            <?php else : ?>
              <?php $no = 0;
              foreach ($allhistory3 as $t) : ?>
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
        Tahap sidang: silahkan unggah file pelengkap untuk mengikuti sidang
      </div>
      <div class="dropdown">
        <button data-toggle="modal" data-target="#register_tak" class="btn btn-primary" style="color:#fff"> <span class="fas fa-file-upload"></span> Unggah TAK</button>
        <button data-toggle="modal" data-target="#register_eprt" class="btn btn-primary" style="color:#fff"> <span class="fas fa-file-upload"></span> Unggah EPRT</button>
      </div>

      
      <div class="table-responsive">
        <table class="table table-hover">
        <div>
          <table>
            <td>
              <table>
                <thead>
                  <th style="width: 150px;"></th>
                  <th style="width: 10px;"></th>
                </thead>
                <tbody>
                  <?php if ($informasi_sidang->tanggal_sidang != "0000-00-00") : ?>
                  <tr>
                    <td>Tanggal Sidang</td>
                    <td>:</td>
                    <td><?= $informasi_sidang->tanggal_sidang ?></td>
                  </tr>
                  <?php endif; ?>
                  <?php if ($informasi_sidang->waktu_sidang != "00:00:00") : ?>
                  <tr>
                    <td>Waktu Sidang</td>
                    <td>:</td>
                    <td><?= $informasi_sidang->waktu_sidang ?></td>
                  </tr>
                  <?php endif; ?>
                  <?php if ($informasi_sidang->link_sidang != "") : ?>
                  <tr>
                    <td>Link Sidang</td>
                    <td>:</td>
                    <td><a href="<?= $informasi_sidang->link_sidang ?>" target="_blank" class="badge badge-info" style="padding:5px; margin:5px">Link Sidang Daring</a></td>
                  </tr>
                  <?php endif; ?>
                  <?php if ($informasi_sidang->ruang_sidang != "") : ?>
                  <tr>
                    <td>Ruang Sidang</td>
                    <td>:</td>
                    <td><p><?= $informasi_presentasi->ruang_sidang ?></p></td>
                  </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </td>
            <td>
              <br>
              <table>
                <thead>
                  <th style="width: 150px;"></th>
                  <th style="width: 10px;"></th>
                </thead>
                <tbody>
                  <?php if ($nama_pembimbing1 != "") : ?>
                  <tr>
                    <td>Nilai Pembimbing 1</td>
                    <td>:</td>
                    <td><?= array_sum(explode(",", $penilaian->poin_pembimbing1)) ?></td>
                  </tr>
                  <?php endif; ?>
                  <?php if ($nama_pembimbing2 != "") : ?>
                  <tr>
                    <td>Nilai Pembimbing 2</td>
                    <td>:</td>
                    <td><?= array_sum(explode(",", $penilaian->poin_pembimbing2)) ?></td>
                  </tr>
                  <?php endif; ?>
                  <?php if ($nama_penguji1 != "") : ?>
                  <tr>
                    <td>Nilai Penguji 1</td>
                    <td>:</td>
                    <td><?= array_sum(explode(",", $penilaian->poin_penguji1)) ?></td>
                  </tr>
                  <?php endif; ?>
                  <?php if ($nama_penguji2 != "") : ?>
                  <tr>
                    <td>Nilai Penguji 2</td>
                    <td>:</td>
                    <td><?= array_sum(explode(",", $penilaian->poin_penguji2)) ?></td>
                  </tr>
                  <?php endif; ?>
                  <?php if ($nama_penguji3 != "") : ?>
                  <tr>
                    <td>Nilai Penguji 3</td>
                    <td>:</td>
                    <td><?= array_sum(explode(",", $penilaian->poin_penguji3)) ?></td>
                  </tr>
                  <?php endif; ?>

                  <?php if ($penilaian->poin_pembimbing1 != ',,,,,,,,') : ?>
                  <?php $pembagi = 1 ?>
                  <tr>
                    <th>Rata-rata</th>
                    <th>:</th>
                    <?php if ($penilaian->poin_pembimbing2 != ',,,,,,,,') $pembagi = $pembagi+1 ; if ($penilaian->poin_penguji1 != ',,,,,,,,') $pembagi = $pembagi+1 ; if ($penilaian->poin_penguji2 != ',,,,,,,,') $pembagi = $pembagi+1 ; if ($penilaian->poin_penguji3 != ',,,,,,,,') $pembagi = $pembagi+1 ; ?>
                    <th><?= ( array_sum(explode(",", $penilaian->poin_pembimbing1)) + array_sum(explode(",", $penilaian->poin_pembimbing2)) + array_sum(explode(",", $penilaian->poin_penguji1)) + array_sum(explode(",", $penilaian->poin_penguji2)) + array_sum(explode(",", $penilaian->poin_penguji3)) ) / $pembagi ?></th>
                  </tr>
                  <?php endif; ?>

                  <tr>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-primary" data-toggle="modal" data-target="#grade_sidang_detail" style="color:white; padding:5px; margin:2px"></span> Detail</button></td>
                  </tr>
                </tbody>
              </table>
            </td>
          </table>
        </div>

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
<div class="modal fade" id="tambah_bimbingan_preview1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
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

<!-- Modal tambah bimbingan preview 2-->
<div class="modal fade" id="tambah_bimbingan_preview2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Tambah Bimbingan</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('users/addbimbingan/preview2') ?>" method="post" enctype="multipart/form-data">
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
<div class="modal fade" id="tambah_bimbingan_preview3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
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
              <center><strong>Bab 4</strong></center>
              <input type="checkbox" id="konsep" name="kelayakan2[]" value="konsep" <?php echo (in_array('konsep', $check2)) ? 'checked' : ''; ?> disabled>
              <label for="konsep"> Konsep perancangan</label><br>
              <input type="checkbox" id="karya" name="kelayakan2[]" value="karya" <?php echo (in_array('karya', $check2)) ? 'checked' : ''; ?> disabled>
              <label for="karya"> Karya visual</label><br>
            </div>

            <textarea name="komentar_kelayakan" id="readonly" class="readonly" cols="30" rows="10"><?= $layak->komentar_kelayakan ?></textarea>

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
            <textarea name="komentar_kelayakan" id="readonly" class="readonly" cols="30" rows="10"><?= $layak->komentar_kelayakan ?></textarea>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal for grading detail -->
<div class="modal fade" id="grade_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Nilai</h5>
      </div>
        <div class="modal-body">
          <div class="custom-form">

            <?php $nilai1 = explode(",", $penilaian->nilai_pembimbing1); ?>
            <?php $nilai2 = explode(",", $penilaian->nilai_pembimbing2); ?>
            <?php $nilai3 = explode(",", $penilaian->nilai_penguji1); ?>
            <?php $nilai4 = explode(",", $penilaian->nilai_penguji2); ?>
            <?php $nilai5 = explode(",", $penilaian->nilai_penguji3); ?>
            
            <table style="border-collapse: separate; border-spacing: 10px;">
              <thead>
                <th style="width:60px"></th>
                <th style="width:600px"> Aspek </th>
                <?php echo ($nama_pembimbing1 != "") ? '<th>Pembimbing 1</th>' : ''; ?>
                <?php echo ($nama_pembimbing2 != "") ? '<th>Pembimbing 2</th>' : ''; ?>
                <?php echo ($nama_penguji1 != "") ? '<th>Penguji 1</th>' : ''; ?>
                <?php echo ($nama_penguji2 != "") ? '<th>Penguji 2</th>' : ''; ?>
                <?php echo ($nama_penguji3 != "") ? '<th>Penguji 3</th>' : ''; ?>
                <br>
              </thead>
              <tbody>
                <tr>
                  <th rowspan="3">Bab1</th>
                  <td>Ketetapan menjelaskan fenomena permasalahan</td>
                  <?php echo ($nama_pembimbing1 != "") ? '<td>'.$nilai1[0].'</td>' : ''; ?>
                  <?php echo ($nama_pembimbing2 != "") ? '<td>'.$nilai2[0].'</td>' : ''; ?>
                  <?php echo ($nama_penguji1 != "") ? '<td>'.$nilai3[0].'</td>' : ''; ?>
                  <?php echo ($nama_penguji2 != "") ? '<td>'.$nilai4[0].'</td>' : ''; ?>
                  <?php echo ($nama_penguji3 != "") ? '<td>'.$nilai5[0].'</td>' : ''; ?>
                </tr>
                <tr>
                  <td>Ketetapan mengidentifikasi dan merumuskan permasalahan</td>
                  <?php echo ($nama_pembimbing1 != "") ? '<td>'.$nilai1[1].'</td>' : ''; ?>
                  <?php echo ($nama_pembimbing2 != "") ? '<td>'.$nilai2[1].'</td>' : ''; ?>
                  <?php echo ($nama_penguji1 != "") ? '<td>'.$nilai3[1].'</td>' : ''; ?>
                  <?php echo ($nama_penguji2 != "") ? '<td>'.$nilai4[1].'</td>' : ''; ?>
                  <?php echo ($nama_penguji3 != "") ? '<td>'.$nilai5[1].'</td>' : ''; ?>
                </tr>
                <tr>
                  <td>Kesesuaian kerangka pemikiran lingkum penelitian/perancangan</td>
                  <?php echo ($nama_pembimbing1 != "") ? '<td>'.$nilai1[2].'</td>' : ''; ?>
                  <?php echo ($nama_pembimbing2 != "") ? '<td>'.$nilai2[2].'</td>' : ''; ?>
                  <?php echo ($nama_penguji1 != "") ? '<td>'.$nilai3[2].'</td>' : ''; ?>
                  <?php echo ($nama_penguji2 != "") ? '<td>'.$nilai4[2].'</td>' : ''; ?>
                  <?php echo ($nama_penguji3 != "") ? '<td>'.$nilai5[2].'</td>' : ''; ?>
                </tr>
                <tr>
                  <th rowspan="2">Bab 2</th>
                  <td>Relevansi pemilihan teori dengan lingkup penelitian/perancangan</td>
                  <?php echo ($nama_pembimbing1 != "") ? '<td>'.$nilai1[3].'</td>' : ''; ?>
                  <?php echo ($nama_pembimbing2 != "") ? '<td>'.$nilai2[3].'</td>' : ''; ?>
                  <?php echo ($nama_penguji1 != "") ? '<td>'.$nilai3[3].'</td>' : ''; ?>
                  <?php echo ($nama_penguji2 != "") ? '<td>'.$nilai4[3].'</td>' : ''; ?>
                  <?php echo ($nama_penguji3 != "") ? '<td>'.$nilai5[3].'</td>' : ''; ?>
                </tr>
                <tr>
                  <td>Kemutakhiran teori yang digunakan (merujuk artikel/publikasi dosen)</td>
                  <?php echo ($nama_pembimbing1 != "") ? '<td>'.$nilai1[4].'</td>' : ''; ?>
                  <?php echo ($nama_pembimbing2 != "") ? '<td>'.$nilai2[4].'</td>' : ''; ?>
                  <?php echo ($nama_penguji1 != "") ? '<td>'.$nilai3[4].'</td>' : ''; ?>
                  <?php echo ($nama_penguji2 != "") ? '<td>'.$nilai4[4].'</td>' : ''; ?>
                  <?php echo ($nama_penguji3 != "") ? '<td>'.$nilai5[4].'</td>' : ''; ?>
                </tr>
                <tr>
                  <th rowspan="2">Bab 3</th>
                  <td>Kelengkapan dan kesesuaian data yang diperoleh</td>
                  <?php echo ($nama_pembimbing1 != "") ? '<td>'.$nilai1[5].'</td>' : ''; ?>
                  <?php echo ($nama_pembimbing2 != "") ? '<td>'.$nilai2[5].'</td>' : ''; ?>
                  <?php echo ($nama_penguji1 != "") ? '<td>'.$nilai3[5].'</td>' : ''; ?>
                  <?php echo ($nama_penguji2 != "") ? '<td>'.$nilai4[5].'</td>' : ''; ?>
                  <?php echo ($nama_penguji3 != "") ? '<td>'.$nilai5[5].'</td>' : ''; ?>
                </tr>
                <tr>
                  <td>Ketetapan pengolahan (klasifikasi, kategorisasi), ketajaman analisis, dan simpulan</td>
                  <?php echo ($nama_pembimbing1 != "") ? '<td>'.$nilai1[6].'</td>' : ''; ?>
                  <?php echo ($nama_pembimbing2 != "") ? '<td>'.$nilai2[6].'</td>' : ''; ?>
                  <?php echo ($nama_penguji1 != "") ? '<td>'.$nilai3[6].'</td>' : ''; ?>
                  <?php echo ($nama_penguji2 != "") ? '<td>'.$nilai4[6].'</td>' : ''; ?>
                  <?php echo ($nama_penguji3 != "") ? '<td>'.$nilai5[6].'</td>' : ''; ?>
                </tr>
                <tr>
                  <th rowspan="2"></th>
                  <td>Kaidah tata tulis karya ilmiah</td>
                  <?php echo ($nama_pembimbing1 != "") ? '<td>'.$nilai1[7].'</td>' : ''; ?>
                  <?php echo ($nama_pembimbing2 != "") ? '<td>'.$nilai2[7].'</td>' : ''; ?>
                  <?php echo ($nama_penguji1 != "") ? '<td>'.$nilai3[7].'</td>' : ''; ?>
                  <?php echo ($nama_penguji2 != "") ? '<td>'.$nilai4[7].'</td>' : ''; ?>
                  <?php echo ($nama_penguji3 != "") ? '<td>'.$nilai5[7].'</td>' : ''; ?>
                </tr>
              </tbody>
            </table>
            <br>
            <table style="border-collapse: separate; border-spacing: 10px;">
              <thead>
                <th style="width: 180px;"></th>
                <th style="width: 10px;"></th>
              </thead>
              <tbody>
                <?php if ($nama_pembimbing1 != "") : ?>
                <tr>
                  <td>Evaluasi Pembimbing 1</td>
                  <td>:</td>
                  <td><?= $penilaian->penilaian_pembimbing1 ?></td>
                </tr>
                <?php endif; ?>
                <?php if ($nama_pembimbing2 != "") : ?>
                <tr>
                  <td>Evaluasi Pembimbing 2</td>
                  <td>:</td>
                  <td><?= $penilaian->penilaian_pembimbing2 ?></td>
                </tr>
                <?php endif; ?>
                <?php if ($nama_penguji1 != "") : ?>
                <tr>
                  <td>Evaluasi Penguji 1</td>
                  <td>:</td>
                  <td><?= $penilaian->penilaian_penguji1 ?></td>
                </tr>
                <?php endif; ?>
                <?php if ($nama_penguji2 != "") : ?>
                <tr>
                  <td>Evaluasi Penguji 2</td>
                  <td>:</td>
                  <td><?= $penilaian->penilaian_penguji2 ?></td>
                </tr>
                <?php endif; ?>
                <?php if ($nama_penguji3 != "") : ?>
                <tr>
                  <td>Evaluasi Penguji 3</td>
                  <td>:</td>
                  <td><?= $penilaian->penilaian_penguji3 ?></td>
                </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
    </div>
  </div>
</div>

<!-- Modal for register TAK -->
<div class="modal fade" id="register_tak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Form Pendaftaran Sidang</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('thesis/daftarSidangTak') ?>" id="upload_form" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleFormControlFile1" id="tak">Nilai TAK</label>
            <input name="tak" min="0" type="text" class="form-control" required value="<?= $poin_tak ?>">
            <!-- </?= var_dump($poin_tak); die; ?> -->
            <?php echo form_error('judul', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="exampleFormControlFile1">Unggah dokumen TAK</label>
            <input type="file" class="form-control" name="filependaftaran" id="file_tak" required style="padding:13px 16px" value="<?= $file_tak ?>">
            <span id="chk-error2"></span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-sm btn-primary" name="daftar" id="btn_daftar" value="Daftar">Daftar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal for register EPRT -->
<div class="modal fade" id="register_eprt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Form Pendaftaran Sidang</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('thesis/daftarSidangEprt') ?>" id="upload_form" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleFormControlFile1" id="tak">Nilai EPRT</label>
            <input name="eprt" min="0" type="number" class="form-control" required value="<?= $poin_eprt ?>">
            <?php echo form_error('judul', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="exampleFormControlFile1">Unggah dokumen EPRT</label>
            <input type="file" class="form-control" name="filependaftaran" id="file_eprt" required style="padding:13px 16px" value="<?= $file_eprt ?>">
            <span id="chk-error2"></span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-sm btn-primary" name="daftar" id="btn_daftar" value="Daftar">Daftar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal for grading sidang detail -->
<div class="modal fade" id="grade_sidang_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Nilai</h5>
      </div>
        <div class="modal-body">
          <div class="custom-form">

            <?php $nilai1 = explode(",", $penilaian->poin_pembimbing1); ?>
            <?php $nilai2 = explode(",", $penilaian->poin_pembimbing2); ?>
            <?php $nilai3 = explode(",", $penilaian->poin_penguji1); ?>
            <?php $nilai4 = explode(",", $penilaian->poin_penguji2); ?>
            <?php $nilai5 = explode(",", $penilaian->poin_penguji3); ?>
            
            <!-- <style>.bottom {border-bottom: 1px solid #ddd;}</style> -->
            <table style="border-collapse: separate; border-spacing: 10px;">
              <thead>
                <th style="width:60px"></th>
                <th style="width:600px"> Aspek </th>
                <?php echo ($nama_pembimbing1 != "") ? '<th>Pembimbing 1</th>' : ''; ?>
                <?php echo ($nama_pembimbing2 != "") ? '<th>Pembimbing 2</th>' : ''; ?>
                <?php echo ($nama_penguji1 != "") ? '<th>Penguji 1</th>' : ''; ?>
                <?php echo ($nama_penguji2 != "") ? '<th>Penguji 2</th>' : ''; ?>
                <?php echo ($nama_penguji3 != "") ? '<th>Penguji 3</th>' : ''; ?>
                <br>
              </thead>
              <tbody>
                <tr>
                  <th>Bab 1</th>
                  <td>Ketepatan menjelaskan fenomena, serta merumuskan permasalahan</td>
                  <?php echo ($nama_pembimbing1 != "") ? '<td>'.$nilai1[0].'</td>' : ''; ?>
                  <?php echo ($nama_pembimbing2 != "") ? '<td>'.$nilai2[0].'</td>' : ''; ?>
                  <?php echo ($nama_penguji1 != "") ? '<td>'.$nilai3[0].'</td>' : ''; ?>
                  <?php echo ($nama_penguji2 != "") ? '<td>'.$nilai4[0].'</td>' : ''; ?>
                  <?php echo ($nama_penguji3 != "") ? '<td>'.$nilai5[0].'</td>' : ''; ?>
                </tr>
                <tr>
                  <th>Bab 2</th>
                  <td>Relevansi dan kemutakhiran teori yang digunakan lingkup penelitian/perancangan</td>
                  <?php echo ($nama_pembimbing1 != "") ? '<td>'.$nilai1[1].'</td>' : ''; ?>
                  <?php echo ($nama_pembimbing2 != "") ? '<td>'.$nilai2[1].'</td>' : ''; ?>
                  <?php echo ($nama_penguji1 != "") ? '<td>'.$nilai3[1].'</td>' : ''; ?>
                  <?php echo ($nama_penguji2 != "") ? '<td>'.$nilai4[1].'</td>' : ''; ?>
                  <?php echo ($nama_penguji3 != "") ? '<td>'.$nilai5[1].'</td>' : ''; ?>
                </tr>
                <tr>
                  <th rowspan="2">Bab 3</th>
                  <td>Kelengkapan dan kesesuaian data yang diperoleh</td>
                  <?php echo ($nama_pembimbing1 != "") ? '<td>'.$nilai1[2].'</td>' : ''; ?>
                  <?php echo ($nama_pembimbing2 != "") ? '<td>'.$nilai2[2].'</td>' : ''; ?>
                  <?php echo ($nama_penguji1 != "") ? '<td>'.$nilai3[2].'</td>' : ''; ?>
                  <?php echo ($nama_penguji2 != "") ? '<td>'.$nilai4[2].'</td>' : ''; ?>
                  <?php echo ($nama_penguji3 != "") ? '<td>'.$nilai5[2].'</td>' : ''; ?>
                </tr>
                <tr>
                  <td>Ketetapan pengolahan (klasifikasi, kategorisasi), ketajaman analisis, dan simpulan</td>
                  <?php echo ($nama_pembimbing1 != "") ? '<td>'.$nilai1[2].'</td>' : ''; ?>
                  <?php echo ($nama_pembimbing2 != "") ? '<td>'.$nilai2[2].'</td>' : ''; ?>
                  <?php echo ($nama_penguji1 != "") ? '<td>'.$nilai3[2].'</td>' : ''; ?>
                  <?php echo ($nama_penguji2 != "") ? '<td>'.$nilai4[2].'</td>' : ''; ?>
                  <?php echo ($nama_penguji3 != "") ? '<td>'.$nilai5[2].'</td>' : ''; ?>
                </tr>
                <tr>
                  <th rowspan="2">Bab 4</th>
                  <td>Ketepatan dalam merumuskan konsep perancangan</td>
                  <?php echo ($nama_pembimbing1 != "") ? '<td>'.$nilai1[3].'</td>' : ''; ?>
                  <?php echo ($nama_pembimbing2 != "") ? '<td>'.$nilai2[3].'</td>' : ''; ?>
                  <?php echo ($nama_penguji1 != "") ? '<td>'.$nilai3[3].'</td>' : ''; ?>
                  <?php echo ($nama_penguji2 != "") ? '<td>'.$nilai4[3].'</td>' : ''; ?>
                  <?php echo ($nama_penguji3 != "") ? '<td>'.$nilai5[3].'</td>' : ''; ?>
                </tr>
                <tr>
                  <td>Penyajian karya visual sesuai kaidah estetik</td>
                  <?php echo ($nama_pembimbing1 != "") ? '<td>'.$nilai1[4].'</td>' : ''; ?>
                  <?php echo ($nama_pembimbing2 != "") ? '<td>'.$nilai2[4].'</td>' : ''; ?>
                  <?php echo ($nama_penguji1 != "") ? '<td>'.$nilai3[4].'</td>' : ''; ?>
                  <?php echo ($nama_penguji2 != "") ? '<td>'.$nilai4[4].'</td>' : ''; ?>
                  <?php echo ($nama_penguji3 != "") ? '<td>'.$nilai5[4].'</td>' : ''; ?>
                </tr>
                <tr>
                  <th>Bab 5</th>
                  <td>Ketepatan dalam merumuskan kesimpulan dan saran</td>
                  <?php echo ($nama_pembimbing1 != "") ? '<td>'.$nilai1[5].'</td>' : ''; ?>
                  <?php echo ($nama_pembimbing2 != "") ? '<td>'.$nilai2[5].'</td>' : ''; ?>
                  <?php echo ($nama_penguji1 != "") ? '<td>'.$nilai3[5].'</td>' : ''; ?>
                  <?php echo ($nama_penguji2 != "") ? '<td>'.$nilai4[5].'</td>' : ''; ?>
                  <?php echo ($nama_penguji3 != "") ? '<td>'.$nilai5[5].'</td>' : ''; ?>
                </tr>
                <tr>
                  <th rowspan="2"></th>
                  <td>Kaidah tata tulis karya ilmiah</td>
                  <?php echo ($nama_pembimbing1 != "") ? '<td>'.$nilai1[7].'</td>' : ''; ?>
                  <?php echo ($nama_pembimbing2 != "") ? '<td>'.$nilai2[7].'</td>' : ''; ?>
                  <?php echo ($nama_penguji1 != "") ? '<td>'.$nilai3[7].'</td>' : ''; ?>
                  <?php echo ($nama_penguji2 != "") ? '<td>'.$nilai4[7].'</td>' : ''; ?>
                  <?php echo ($nama_penguji3 != "") ? '<td>'.$nilai5[7].'</td>' : ''; ?>
                </tr>
                <tr>
                  <td>Presentasi</td>
                  <?php echo ($nama_pembimbing1 != "") ? '<td>'.$nilai1[7].'</td>' : ''; ?>
                  <?php echo ($nama_pembimbing2 != "") ? '<td>'.$nilai2[7].'</td>' : ''; ?>
                  <?php echo ($nama_penguji1 != "") ? '<td>'.$nilai3[7].'</td>' : ''; ?>
                  <?php echo ($nama_penguji2 != "") ? '<td>'.$nilai4[7].'</td>' : ''; ?>
                  <?php echo ($nama_penguji3 != "") ? '<td>'.$nilai5[7].'</td>' : ''; ?>
                </tr>
              </tbody>
            </table>
            <br>
            <table style="border-collapse: separate; border-spacing: 10px;">
              <thead>
                <th style="width: 180px;"></th>
                <th style="width: 10px;"></th>
              </thead>
              <tbody>
                <?php if ($nama_pembimbing1 != "") : ?>
                <tr>
                  <td>Evaluasi Pembimbing 1</td>
                  <td>:</td>
                  <td><?= $penilaian->evaluasi_pembimbing1 ?></td>
                </tr>
                <?php endif; ?>
                <?php if ($nama_pembimbing2 != "") : ?>
                <tr>
                  <td>Evaluasi Pembimbing 2</td>
                  <td>:</td>
                  <td><?= $penilaian->evaluasi_pembimbing2 ?></td>
                </tr>
                <?php endif; ?>
                <?php if ($nama_penguji1 != "") : ?>
                <tr>
                  <td>Evaluasi Penguji 1</td>
                  <td>:</td>
                  <td><?= $penilaian->evaluasi_penguji1 ?></td>
                </tr>
                <?php endif; ?>
                <?php if ($nama_penguji2 != "") : ?>
                <tr>
                  <td>Evaluasi Penguji 2</td>
                  <td>:</td>
                  <td><?= $penilaian->evaluasi_penguji2 ?></td>
                </tr>
                <?php endif; ?>
                <?php if ($nama_penguji3 != "") : ?>
                <tr>
                  <td>Evaluasi Penguji 3</td>
                  <td>:</td>
                  <td><?= $penilaian->evaluasi_penguji3 ?></td>
                </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
    </div>
  </div>
</div>