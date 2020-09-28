<!-- Main Container -->
<main class="akun-container">

  <div class="fik-section-title2">
    <h4>Bimbingan Tugas Akhir</h4>
    <button class="btn btn-danger" data-toggle="modal" data-target="#ulangi" style="color:white; float:right; padding:10px; margin:10px" <?php echo ($lecturers->dosen_pembimbing1 == $this->session->userdata('id')) ? '' : 'hidden'; ?> ><span class="fas fa-times"></span> Ulangi</button>
  </div>
  <div>
    <table>
      <td>
        <table >
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
      </td>
      <td style="padding-left:50px; float:right">
        <table>
          <thead>
            <th style="width: 150px;"></th>
            <th style="width: 10px;"></th>
          </thead>
          <tbody>
            <?php if ($nama_pembimbing1 != "") : ?>
            <tr>
              <td>Dosen Pembimbing 1</td>
              <td>:</td>
              <td><?= $nama_pembimbing1 ?></td>
            </tr>
            <?php endif; ?>
            <?php if ($nama_pembimbing2 != "") : ?>
            <tr>
              <td>Dosen Pembimbing 2</td>
              <td>:</td>
              <td><?= $nama_pembimbing2 ?></td>
            </tr>
            <?php endif; ?>
            <?php if ($nama_penguji1 != "") : ?>
            <tr>
              <td>Dosen Penguji 1</td>
              <td>:</td>
              <td><?= $nama_penguji1 ?></td>
            </tr>
            <?php endif; ?>
            <?php if ($nama_penguji2 != "") : ?>
            <tr>
              <td>Dosen Penguji 2</td>
              <td>:</td>
              <td><?= $nama_penguji2 ?></td>
            </tr>
            <?php endif; ?>
            <?php if ($nama_penguji3 != "") : ?>
            <tr>
              <td>Dosen Penguji 3</td>
              <td>:</td>
              <td><?= $nama_penguji3 ?></td>
            </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </td>
    </table>
  </div>
  <br>
  <?php if ($this->session->userdata('id') == $mhsbyid['dosen_pembimbing1']) { ?>
    <td> Status Anda : Pembimbing 1</b></td>
  <?php } elseif ($this->session->userdata('id') == $mhsbyid['dosen_pembimbing2']) { ?>
    <td> Status Anda : Pembimbing 2</td>
  <?php } elseif ($this->session->userdata('id') == $mhsbyid['dosen_penguji1']) { ?>
    <td> Status Anda : Penguji 1</td>
  <?php } elseif ($this->session->userdata('id') == $mhsbyid['dosen_penguji2']) { ?>
    <td> Status Anda : Penguji 2</td>
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
        Preview 1. Tahap Bimbingan
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
            <?php if (empty($filebimbingan)) : ?>
              <td colspan="6" style="background-color: whitesmoke;text-align:center">tidak ada bimbingan</td>
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
                      <a href="<?= base_url('thesis/setSesuai/' . $f['id'] . '/' . $guidance_id) ?>" class="btn badge badge-success" <?php echo ($lecturers->dosen_pembimbing1 == $this->session->userdata('id') and $step->status_preview == 'preview1') ? '' : 'hidden'; ?> >Sesuai</a>
                      <a href="<?= base_url('thesis/setRevisi/' . $f['id'] . '/' . $guidance_id) ?>" class="btn badge badge-danger" <?php echo ($lecturers->dosen_pembimbing1 == $this->session->userdata('id') and $step->status_preview == 'preview1') ? '' : 'hidden'; ?> >Revisi</a>
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
          <button class="btn btn-primary" data-toggle="modal" data-target="#checklist" style="color:white; padding:10px; margin:2px" <?php echo ($lecturers->dosen_pembimbing1 == $this->session->userdata('id') ? '' : 'hidden') ?> ><span class="fas fa-check-square"></span> Checklist untuk Lanjut</button>
          <?php $kelayakan = explode(",", $layak->kelayakan); ?>
          <button class="btn btn-success" data-toggle="modal" data-target="#lanjut" <?php echo (count($kelayakan) == 3) ? '' : 'disabled'; ?> style="color:white; float:right; padding:10px; margin-left:10px" <?php echo ($lecturers->dosen_pembimbing1 == $this->session->userdata('id') and $step->status_preview == 'preview1') ? '' : 'hidden'; ?> ><span class="fas fa-check"></span> Lanjut</button>
          <!-- <button class="btn btn-danger" data-toggle="modal" data-target="#ulangi" style="color:white; float:right; padding:10px; margin-left:10px" <?php echo ($lecturers->dosen_pembimbing1 == $this->session->userdata('id') and $step->status_preview == 'preview1') ? '' : 'hidden'; ?> ><span class="fas fa-times"></span> Ulangi</button> -->
        </div>
      </div>
    </div>

    <div class="tab-pane fade <?php echo ($step->status_preview == 'preview2') ? 'show active' : ''; ?>" id="dua" role="tabpanel" aria-labelledby="dua-tab">
      <div class="alert alert-warning">
        Preview 2. Tahap Bimbingan Lanjutan dan Audiensi
      </div>
      
      <?php if ($lecturers->dosen_pembimbing1 == $this->session->userdata('id') and $step->status_preview == 'preview2') : ?>
      <div style="padding-bottom:20px">
        <button class="btn btn-primary" data-toggle="modal" data-target="#presentation_data" style="color:white; padding:5px; margin:2px"><span class="fa fa-plus"></span> Input Jadwal Presentasi</button>
      </div>
      <?php endif; ?>

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
            <?php if (empty($filebimbingan2)) : ?>
              <td colspan="6" style="background-color: whitesmoke;text-align:center">tidak ada bimbingan</td>
            <?php else : ?>
              <?php $no = 0;
              foreach ($filebimbingan2 as $f) : ?>
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
        <div>
          <br>
          <button class="btn btn-primary" data-toggle="modal" data-target="#grading" style="color:white; padding:5px; margin:2px" <?php echo ($step->status_preview == 'preview2') ? '' : 'hidden'; ?> ><span class="fas fa-star-half-alt"></span> Berikan Penilaian</button>
          <!-- </?php $nilai1 = explode(",", $penilaian->nilai_pembimbing1); $nilai2 = explode(",", $penilaian->nilai_pembimbing2); $nilai3 = explode(",", $penilaian->nilai_penguji1); $nilai4 = explode(",", $penilaian->nilai_penguji2); ?>
          <button class="btn btn-success" data-toggle="modal" data-target="#lanjut2" </?php echo (array_sum($nilai1) <= 60 or array_sum($nilai2) <= 60 or array_sum($nilai3) <= 60 or array_sum($nilai4) <= 60) ? 'disabled' : ''; ?> style="color:white; float:right; padding:10px; margin-left:10px"><span class="fas fa-check"></span> Lanjut</button> -->
          <button class="btn btn-success" data-toggle="modal" data-target="#lanjut2" style="color:white; float:right; padding:10px; margin-left:10px" <?php echo ($lecturers->dosen_penguji1 == $this->session->userdata('id') and $step->status_preview == 'preview2') ? '' : 'hidden'; ?> ><span class="fas fa-check"></span> Lanjut</button>
          <button class="btn btn-primary" data-toggle="modal" data-target="#kembali1" style="color:white; float:right; padding:10px; margin-left:10px" <?php echo ($lecturers->dosen_penguji1 == $this->session->userdata('id') and $step->status_preview == 'preview2') ? '' : 'hidden'; ?> ><span class="fas fa-undo"></span> Kembali</button>
          <!-- <button class="btn btn-danger" data-toggle="modal" data-target="#ulangi" style="color:white; float:right; padding:10px; margin-left:10px" <?php echo ($lecturers->dosen_pembimbing1 == $this->session->userdata('id') and $step->status_preview == 'preview2') ? '' : 'hidden'; ?> ><span class="fas fa-times"></span> Ulangi</button> -->
        </div>
      </div>
    </div>

    <div class="tab-pane fade <?php echo ($step->status_preview == 'preview3') ? 'show active' : ''; ?>" id="tiga" role="tabpanel" aria-labelledby="tiga-tab">
      <div class="alert alert-warning">
        Preview 3. Tahap Bimbingan Lanjut
      </div>
      
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <!-- <th scope="col">#</th> -->
              <th scope="col" style="width:30%;">Keterangan</th>
              <th scope="col" style="width:30%;">Dokumen</th>
              <th scope="col">Proyek</th>
              <th scope="col" style="width:30%;">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($filebimbingan3)) : ?>
              <td colspan="6" style="background-color: whitesmoke;text-align:center">tidak ada bimbingan</td>
            <?php else : ?>
              <?php $no = 0;
              foreach ($filebimbingan3 as $f) : ?>
                <tr>
                  <!-- <th scope="row"><?= ++$no ?></th> -->
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
                      <button href="<?= base_url('thesis/setSesuai/' . $f['id'] . '/' . $guidance_id) ?>" <?php echo ($lecturers->dosen_pembimbing1 == $this->session->userdata('id') and $step->status_preview == 'preview3') ? '' : 'hidden'; ?> class="btn badge badge-success">Sesuai</button>
                      <button href="<?= base_url('thesis/setRevisi/' . $f['id'] . '/' . $guidance_id) ?>" <?php echo ($lecturers->dosen_pembimbing1 == $this->session->userdata('id') and $step->status_preview == 'preview3') ? '' : 'hidden'; ?> class="btn badge badge-danger">Revisi</button>
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

          <button class="btn btn-primary" data-toggle="modal" data-target="#all_correction2" style="color:white; padding:10px; margin:2px"><span class="fas fa-tasks"></span> Semua Koreksi</button>
          <button class="btn btn-primary" data-toggle="modal" data-target="#checklist2" style="color:white; padding:10px; margin:2px" <?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'hidden' : ''; ?> ><span class="fas fa-check-square"></span> Checklist untuk Lanjut</button>
          <?php $kelayakan2 = explode(",", $layak->kelayakan2); ?>
          <button class="btn btn-success" data-toggle="modal" data-target="#lanjut3" <?php echo (count($kelayakan2) == 8) ? '' : 'disabled'; ?> style="color:white; float:right; padding:10px; margin-left:10px" <?php echo ($lecturers->dosen_pembimbing1 == $this->session->userdata('id') and $step->status_preview == 'preview3') ? '' : 'hidden'; ?> ><span class="fas fa-check"></span> Lanjut</button>
          <button class="btn btn-primary" data-toggle="modal" data-target="#kembali2" style="color:white; float:right; padding:10px; margin-left:10px" <?php echo ($lecturers->dosen_pembimbing1 == $this->session->userdata('id') and $step->status_preview == 'preview3') ? '' : 'hidden'; ?> ><span class="fas fa-undo"></span> Kembali</button>
          <!-- <button class="btn btn-danger" data-toggle="modal" data-target="#ulangi" style="color:white; float:right; padding:10px; margin-left:10px" <?php echo ($lecturers->dosen_pembimbing1 == $this->session->userdata('id') and $step->status_preview == 'preview3') ? '' : 'hidden'; ?> ><span class="fas fa-times"></span> Ulangi</button> -->
        </div>
      </div>

    </div>

    <div class="tab-pane fade <?php echo ($step->status_preview == 'sidang') ? 'show active' : ''; ?>" id="pat" role="tabpanel" aria-labelledby="pat-tab">
      <!-- <a data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-primary" style="color:#fff">Ajukan Siap Sidang</a> -->
      <div class="alert alert-warning">
        Tahap sidang
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
        <button class="btn btn-primary" data-toggle="modal" data-target="#grading_sidang" style="color:white; padding:5px; margin:2px"><span class="fas fa-star-half-alt"></span> Berikan Penilaian</button>
        <!-- </?php $kelayakan2 = explode(",", $layak->kelayakan2); ?>
        <button class="btn btn-success" data-toggle="modal" data-target="#lulus" </?php echo (count($kelayakan2) == 8) ? '' : 'disabled'; ?> style="color:white; float:right; padding:10px; margin-left:10px"><span class="fas fa-check"></span> Lanjut</button> -->
        <button class="btn btn-success" data-toggle="modal" data-target="#lulus" style="color:white; float:right; padding:10px; margin-left:10px" <?php echo ($lecturers->dosen_penguji1 == $this->session->userdata('id') and $step->status_preview == 'sidang') ? '' : 'hidden'; ?> ><span class="fas fa-check"></span> Lanjut</button>
        <button class="btn btn-primary" data-toggle="modal" data-target="#kembali3" style="color:white; float:right; padding:10px; margin-left:10px" <?php echo ($lecturers->dosen_penguji1 == $this->session->userdata('id') and $step->status_preview == 'sidang') ? '' : 'hidden'; ?> ><span class="fas fa-undo"></span> Kembali</button>
        <!-- <button class="btn btn-danger" data-toggle="modal" data-target="#ulangi" style="color:white; float:right; padding:10px; margin-left:10px" <?php echo ($lecturers->dosen_pembimbing1 == $this->session->userdata('id') and $step->status_preview == 'sidang') ? '' : 'hidden'; ?> ><span class="fas fa-times"></span> Ulangi</button> -->
        
      </div>
    </div>

    <div class="tab-pane fade <?php echo ($step->status_preview == 'lulus') ? 'show active' : ''; ?>" id="ma" role="tabpanel" aria-labelledby="pat-tab">
      <!-- <a data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-primary" style="color:#fff">Ajukan Siap Sidang</a> -->
      <div class="alert alert-success">
        Mahasiswa sudah lulus
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

      <form action="<?= base_url('thesis/saveKelayakan/' . encrypt_url($guidance_id)) ?>" method="POST">
        <div class="modal-body">
          <div class="custom-form">

            <?php $check = explode(",", $layak->kelayakan); ?>

            <input type="checkbox" id="kesesuaian" name="kelayakan[]" value="kesesuaian" <?php echo (in_array('kesesuaian', $check)) ? 'checked' : ''; ?>>
            <label for="kesesuaian"> Kesesuaian fenomeda dan permasalahan yang diangkat</label><br>
            <input type="checkbox" id="ketepatan" name="kelayakan[]" value="ketepatan" <?php echo (in_array('ketepatan', $check)) ? 'checked' : ''; ?>>
            <label for="ketepatan"> Ketepatan penyusunan hipotesa</label><br>
            <input type="checkbox" id="kaidah" name="kelayakan[]" value="kaidah" <?php echo (in_array('kaidah', $check)) ? 'checked' : ''; ?>>
            <label for="kaidah"> Kaidah tata tulis karya ilmiah</label><br><br>
            <textarea name="komentar_kelayakan" id="editable" class="editable" cols="30" rows="10"><?= $layak->komentar_kelayakan ?></textarea>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Kirim</button>
          </div>
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
        <h5 class="modal-title" id="exampleModalLabel">Checklist Kelayakan untuk Lanjut</h5>
      </div>

      <form action="<?= base_url('thesis/saveKelayakan2/' . encrypt_url($guidance_id)) ?>" method="POST">
        <div class="modal-body">
          <div class="custom-form">

            <?php $check2 = explode(",", $layak->kelayakan2); ?>

            <div style="padding:10px">
              <center><strong>Bab 1</strong></center>
              <input type="checkbox" id="fenomena" name="kelayakan2[]" value="fenomena" <?php echo (in_array('fenomena', $check2)) ? 'checked' : ''; ?>>
              <label for="fenomena"> Fenomena Permasalahan</label><br>
              <input type="checkbox" id="identifikasi" name="kelayakan2[]" value="identifikasi" <?php echo (in_array('identifikasi', $check2)) ? 'checked' : ''; ?>>
              <label for="identifikasi"> Identifikasi dan rumusan masalah</label><br>
              <input type="checkbox" id="kerangka" name="kelayakan2[]" value="kerangka" <?php echo (in_array('kerangka', $check2)) ? 'checked' : ''; ?>>
              <label for="kerangka"> Kerangka pemikiran</label><br><br>
            </div>

            <div style="padding:10px">
              <center><strong>Bab 2</strong></center>
              <input type="checkbox" id="landasan" name="kelayakan2[]" value="landasan" <?php echo (in_array('landasan', $check2)) ? 'checked' : ''; ?>>
              <label for="landasan"> Landasan teori</label><br>
            </div>

            <div style="padding:10px">
              <center><strong>Bab 3</strong></center>
              <input type="checkbox" id="data" name="kelayakan2[]" value="data" <?php echo (in_array('data', $check2)) ? 'checked' : ''; ?>>
              <label for="data"> Data Primer dan sekunder</label><br>
              <input type="checkbox" id="hasil" name="kelayakan2[]" value="hasil" <?php echo (in_array('hasil', $check2)) ? 'checked' : ''; ?>>
              <label for="hasil"> Hasil analisis</label><br>
            </div>

            <div style="padding:10px">
              <center><strong>Bab 4</strong></center>
              <input type="checkbox" id="konsep" name="kelayakan2[]" value="konsep" <?php echo (in_array('konsep', $check2)) ? 'checked' : ''; ?>>
              <label for="konsep"> Konsep perancangan</label><br>
              <input type="checkbox" id="karya" name="kelayakan2[]" value="karya" <?php echo (in_array('karya', $check2)) ? 'checked' : ''; ?>>
              <label for="karya"> Karya visual</label><br>
            </div>

            <textarea name="komentar_kelayakan2" id="editable" class="editable" cols="30" rows="10"><?= $layak->komentar_kelayakan2 ?></textarea>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Kirim</button>
          </div>
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

      <form action="<?= base_url('thesis/setLanjutKePreview3/' . encrypt_url($guidance_id)) ?>" method="POST">
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

<!-- Modal for Lanjut 3 -->
<div class="modal fade" id="lanjut3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lanjut ke Preview 4</h5>
      </div>

      <form action="<?= base_url('thesis/setLanjutKeSidang/' . encrypt_url($guidance_id)) ?>" method="POST">
        <div class="modal-body">
          <div class="custom-form">
            <p>Lanjutkan mahasiswa/mahasiswi ini ke preview 4?</p>
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

<!-- Modal for Lulus -->
<div class="modal fade" id="lulus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Luluskan Sidang</h5>
      </div>

      <form action="<?= base_url('thesis/setLulus/' . encrypt_url($guidance_id)) ?>" method="POST">
        <div class="modal-body">
          <div class="custom-form">
            <p>Luluskan sidang mahasiswa/mahasiswi ini?</p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Ya, Luluskan</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Ulangi Bimbingan?</h5>
      </div>

      <form action="<?= base_url('thesis/setUlangiBimbingan/' . encrypt_url($guidance_id)) ?>" method="POST">
        <div class="modal-body">
          <div class="custom-form">
            <p>Jika anda melanjutkan aksi ini, maka data bimbingan mahasiswa ini akan dihapus dan mahasiswa ini harus mengulang bimbingan dari awal</p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger">Ya, Ulangi Bimbingan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal for kembali 1 -->
<div class="modal fade" id="kembali1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kembali ke preview 1?</h5>
      </div>

      <form action="<?= base_url('thesis/setKembali1/' . encrypt_url($guidance_id)) ?>" method="POST">
        <div class="modal-body">
          <div class="custom-form">
          <p>Jika anda melanjutkan aksi ini, maka progres mahasiswa akan kembali ke preview 1</p>
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

<!-- Modal for kembali 2 -->
<div class="modal fade" id="kembali2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kembali ke preview 2?</h5>
      </div>

      <form action="<?= base_url('thesis/setKembali2/' . encrypt_url($guidance_id)) ?>" method="POST">
        <div class="modal-body">
          <div class="custom-form">
            <p>Jika anda melanjutkan aksi ini, maka progres mahasiswa akan kembali ke preview 2</p>
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

<!-- Modal for kembali 3 -->
<div class="modal fade" id="kembali3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kembali ke preview 3?</h5>
      </div>

      <form action="<?= base_url('thesis/setKembali3/' . encrypt_url($guidance_id)) ?>" method="POST">
        <div class="modal-body">
          <div class="custom-form">
          <p>Jika anda melanjutkan aksi ini, maka progres mahasiswa akan kembali ke preview 3</p>
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

<!-- Modal for all presentation data -->
<div class="modal fade" id="presentation_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informasi Presentasi</h5>
      </div>
      <form action="<?= base_url('thesis/saveInformasiPresentasi/'. encrypt_url($guidance_id)) ?>" method="POST">
        <div class="modal-body">
          <div class="custom-form">
            <div class="form-group" style="padding-left:10px">
              <input type="date" name="tanggal_presentasi" value="<?= $informasi_presentasi->tanggal_presentasi ?>" class="form-control" placeholder="" autocomplete="off" />
              <label>Tanggal</label>
            </div>
            <div class="form-group" style="padding-left:10px">
              <input type="time" name="waktu_presentasi" value="<?= $informasi_presentasi->waktu_presentasi ?>" class="form-control" placeholder="" autocomplete="off" />
              <label>Waktu</label>
            </div>
            <div class="form-group" style="padding-left:10px">
              <input type="text" name="link_presentasi" value="<?= $informasi_presentasi->link_presentasi ?>" class="form-control" placeholder="" autocomplete="off" />
              <label>Link Presentasi</label>
            </div>
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
    width: '470',
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
    width: '470',
  });
</script>

<!-- Modal for all correction -->
<div class="modal fade" id="all_correction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<!-- Modal for single grading -->
<div class="modal fade" id="grading" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Penilaian</h5>
      </div>
      <?php if ($this->session->userdata('id') == $lecturers->dosen_pembimbing1) $peran = 'pembimbing1'; elseif ($this->session->userdata('id') == $lecturers->dosen_pembimbing2) $peran = 'pembimbing2'; elseif ($this->session->userdata('id') == $lecturers->dosen_penguji1) $peran = 'penguji1'; elseif ($this->session->userdata('id') == $lecturers->dosen_penguji2) $peran = 'penguji2'; elseif ($this->session->userdata('id') == $lecturers->dosen_penguji3) $peran = 'penguji3'; ?>
      <form action="<?= base_url('thesis/savePenilaian/' . encrypt_url($guidance_id) . '/' . $peran) ?>" method="POST">
        <div class="modal-body">
          <div class="custom-form">
            <?php if ($this->session->userdata('id') == $lecturers->dosen_pembimbing1) $file = explode(",", $penilaian->nilai_pembimbing1); elseif ($this->session->userdata('id') == $lecturers->dosen_pembimbing2) $file = explode(",", $penilaian->nilai_pembimbing2); elseif ($this->session->userdata('id') == $lecturers->dosen_penguji1) $file = explode(",", $penilaian->nilai_penguji1); elseif ($this->session->userdata('id') == $lecturers->dosen_penguji2) $file = explode(",", $penilaian->nilai_penguji2); elseif ($this->session->userdata('id') == $lecturers->dosen_penguji3) $file = explode(",", $penilaian->nilai_penguji3) ?>
            <center><strong>Bab 1</strong></center>
            <div style="padding:10px">
              <div class="form-group">
                <input type="number" min="0" max="10" name="nilai[]" value="<?= $file[0] ?>" class="form-control" placeholder="" autocomplete="off"/>
                <label>Ketepatan menjelaskan fenomena permasalahan *10</label>
              </div>
              <div class="form-group">
                <input type="number" min="0" max="10" name="nilai[]" value="<?= $file[1] ?>" class="form-control" placeholder="" autocomplete="off"/>
                <label>Ketepatan mengidentifikasi dan merumuskan permasalahan *10</label>
              </div>
              <div class="form-group">
                <input type="number" min="0" max="10" name="nilai[]" value="<?= $file[2] ?>" class="form-control" placeholder="" autocomplete="off"/>
                <label>Kesesuaian kerangka pemikiran dengan tujuan penelitian/perancangan *10</label>
              </div>
            </div>
            <center><strong>Bab 2</strong></center>
            <div style="padding:10px">
              <div class="form-group">
                <input type="number" min="0" max="10" name="nilai[]" value="<?= $file[3] ?>" class="form-control" placeholder="" autocomplete="off"/>
                <label>Relevansi pemilihan teori dengan lingkup penelitian/perancangan *10</label>
              </div>
              <div class="form-group">
                <input type="number" min="0" max="10" name="nilai[]" value="<?= $file[4] ?>" class="form-control" placeholder="" autocomplete="off"/>
                <label>Kemutakhiran teori yang digunakan (merujuk artikel/publikasi dosen) *10</label>
              </div>
            </div>
            <center><strong>Bab 3</strong></center>
            <div style="padding:10px">
              <div class="form-group">
                <input type="number" min="0" max="20" name="nilai[]" value="<?= $file[5] ?>" class="form-control" placeholder="" autocomplete="off"/>
                <label>Kelengkapan dan kesesuaian data yang diperoleh *20</label>
              </div>
              <div class="form-group">
                <input type="number" min="0" max="20" name="nilai[]" value="<?= $file[6] ?>" class="form-control" placeholder="" autocomplete="off"/>
                <label>Ketetapan pengolahan (klasifikasi, kategorisasi), ketajaman analisis, dan simpulan *20</label>
              </div>
            </div>
            <center><strong>Sistematika Penulisan</strong></center>
            <div style="padding:10px">
              <div class="form-group">
                <input type="number" min="0" max="10" name="nilai[]" value="<?= $file[7] ?>" class="form-control" placeholder="" autocomplete="off"/>
                <label>Kaidah tata tulis ilmiah *10</label>
              </div>
            </div>
            <center><strong>Total</strong></center>
            <?php  $nilai = explode(",", $penilaian->nilai_pembimbing1); ?>
            <div style="padding:10px">
              <div class="form-group">
              <input type="number" name="" value="<?= array_sum($nilai) ?>" class="form-control" placeholder="" autocomplete="off" disabled />
                <label>Total nilai</label>
              </div>
            </div>
            <div>
              <textarea name="penilaian" class="<?php echo ($lecturers->dosen_pembimbing1 != $this->session->userdata('id')) ? 'readonly' : 'editable'; ?>" cols="30" rows="10"><?= $penilaian->penilaian_pembimbing1 ?></textarea>
            </div>
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

<!-- Modal for grading detail -->
<div class="modal fade" id="grade_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Nilai</h5>
      </div>
        <div class="modal-body">
          <div class="custom-form">
            <ul style="list-style-type:none;">
              <?php $nilai2 = explode(",", $penilaian->nilai_pembimbing2); ?>
              <li><h6>Pembimbing 1 : <?= $nama_pembimbing1 ?></h6></li>
              <br>
              <li><strong>Bab 1</strong></li>
              <li>Ketetapan menjelaskan fenomena permasalahan : <?= $nilai2[0] ?></li>
              <li>Ketetapan mengidentifikasi dan merumuskan permasalahan : <?= $nilai2[1] ?></li>
              <li>Kesesuaian kerangka pemikiran lingkum penelitian/perancangan : <?= $nilai2[2] ?></li>
              <li><strong>Bab 2</strong></li>
              <li>Relevansi pemilihan teori dengan lingkum penelitian/perancangan</li>
              <li></li>
              <li><strong>Bab 3</strong></li>
              <li></li>
              <li></li>
              <li><strong>Bab 4</strong></li>
              <li></li>
            </ul>



            <table>
                <table>
                  <tbody>
                    <strong>Pembimbing 2 : <?= $nama_pembimbing2 ?></strong>
                    <?php $nilai2 = explode(",", $penilaian->nilai_pembimbing2); ?>

                    <tr><h6>Bab 1</h6></tr>
                    <tr>
                      <td>Ketetapan menjelaskan fenomena permasalahan *10</td>
                      <td>:</td>
                      <td><?= $nilai2[0] ?></td>
                    </tr>
                    <tr>
                      <td>Ketetapan mengidentifikasi dan merumuskan permasalahan *10</td>
                      <td>:</td>
                      <td><?= $nilai2[1] ?></td>
                    </tr>
                    <tr>
                      <td>Kesesuaian kerangka pemikiran lingkum penelitian/perancangan *10</td>
                      <td>:</td>
                      <td><?= $nilai2[2] ?></td>
                    </tr>
                    
                    <tr><h6>Bab 2</h6></tr>
                    <tr>
                      <td>Relevansi pemilihan teori dengan lingkum penelitian/perancangan *10</td>
                      <td>:</td>
                      <td><?= $nilai2[3] ?></td>
                    </tr>
                    <tr>
                      <td>Kemutakhiran teori yang digunakan (merujuk artikel/peblikasi dosen) *10</td>
                      <td>:</td>
                      <td><?= $nilai2[4] ?></td>
                    </tr>

                    <tr><h6>Bab 3</h6></tr>
                    <tr>
                      <td>Kelengkapan dan kesesuaian data yang diperoleh *20</td>
                      <td>:</td>
                      <td><?= $nilai2[5] ?></td>
                    </tr>
                    <tr>
                      <td>Ketepatan pengolahan (klasifikasi, kategorisasi), ketajaman analisis, dan simpulan *20</td>
                      <td>:</td>
                      <td><?= $nilai2[6] ?></td>
                    </tr>

                    <tr><h6>Bab 4</h6></tr>
                    <tr>
                      <td>Kaidah tata tulis karya ilmiah *10</td>
                      <td>:</td>
                      <td><?= $nilai2[7] ?></td>
                    </tr>
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

<!-- Modal for single grading sidang -->

<!-- Modal for all grading -->
<!-- <div class="modal fade" id="grading" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
      </form>
    </div>
  </div>
</div> -->

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
