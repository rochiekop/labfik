  <!-- Main Container -->
  <main class="akun-container">
    <div class="fik-section-title2">
      <h4>Bimbingan</h4>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <p>Pembimbing 1 : <?= $dosbing1['name'] ?></p>
    <p>Pembimbing 2 : <?= $dosbing2['name'] ?></p>
    <br>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="satu-tab" data-toggle="tab" href="#satu" role="tab" aria-selected="true">Preview 1</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="dua-tab" data-toggle="tab" href="#dua" role="tab" aria-selected="true">Preview 2</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="tiga-tab" data-toggle="tab" href="#tiga" role="tab" aria-selected="false">Preview 3</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" id="pat-tab" data-toggle="tab" href="#pat" role="tab" aria-selected="false">Sidang Akhir</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent" style="padding-top:20px;">

      <div class="tab-pane fade show active" id="satu" role="tabpanel" aria-labelledby="satu-tab">
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
                <th scope="col" style="width:30%">Keterangan</th>
                <th scope="col">Tanggal</th>
                <th scope="col">View Dokumen</th>
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
                    <!-- <td><?= $t['dosen_name'] ?></td> -->
                    <td><?= $t['keterangan'] ?></td>
                    <td><?= $t['date'] ?></td>
                    <td>
                    </td>
                    <?php if ($t['status'] == "Dikirim") : ?>
                      <td><b>Dikirim</b></td>
                    <?php elseif ($t['status'] == "Selesai" or $t['status'] == "Preview 1" or $t['status'] == "Preview 2" or $t['status'] == "Preview 3" or $t['status'] == "Preview 4") : ?>
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
        </div>
      </div>

      <div class="tab-pane fade" id="dua" role="tabpanel" aria-labelledby="dua-tab">
        <div class="alert alert-warning">
          Preview 2. Tahap audiensi/presentasi.
        </div>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Dosen Pembimbing</th>
                <th scope="col">Dosen Penguji</th>
                <th scope="col">Tgl. Sidang</th>
                <th scope="col">Waktu</th>
                <th scope="col">Aksi</th>
                <th scope="col">Nilai</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>
                  Mark Hoover <br>
                  Momo Delia
                </td>
                <td>
                  David Hans <br>
                  Hassle Amelia
                </td>
                <td>12 April 2020</td>
                <td>13:30</td>
                <td><a href="#" class="badge badge-success">Zoom</a></td>
                <td><a href="#" class="badge badge-secondary">Lihat Nilai</a></td>
              </tr>
              <tr>
                <th scope="row">1</th>
                <td>
                  Mark Hoover <br>
                  Momo Delia
                </td>
                <td>
                  David Hans <br>
                  Hassle Amelia
                </td>
                <td>12 April 2020</td>
                <td>13:30</td>
                <td><a href="#" class="badge badge-success">Zoom</a></td>
                <td>-</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="tab-pane fade" id="tiga" role="tabpanel" aria-labelledby="tiga-tab">
        <div class="alert alert-warning">
          Preview 3. Tahap Persetujuan
        </div>
      </div>

      <div class="tab-pane fade" id="pat" role="tabpanel" aria-labelledby="pat-tab">
        ...
      </div>

    </div>

  </main>
  <!-- End Main Container -->

  <!-- Modal tambah sidang -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Tambah Bimbingan</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('users/addbimbingan') ?>" method="post" enctype="multipart/form-data">
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