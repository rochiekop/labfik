  <!-- Main Container -->
  <main class="akun-container">
    <?= $this->session->flashdata('message'); ?>
    <div class="fik-section-title2">
      <h4>Bimbingan</h4>
    </div>
    <div class="dropdown">
      <?php if (count($buttonaddbimbingan) == count($buttonaddbimbingan2) or empty($buttonaddbimbingan2)) : ?>
        <a data-toggle="modal" data-target="#exampleModal2" class="btn btn-sm btn-primary" style="color:#fff">Tambah Bimbingan</a>
      <?php else : ?>
        <button class="btn btn-sm btn-secondary" disabled style="color:#fff">Tambah Bimbingan</button>
      <?php endif; ?>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <?php foreach ($dosbing as $d) : ?>
          <a class="dropdown-item" href="#"><?= $d['nama_dosen'] ?></a>
        <?php endforeach; ?>
      </div>
    </div>
    <br>
    <div class="input-group">
      <div class="input-group-append">
        <button class="btn btn-primary dropdown-toggle filter" id="filter" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-left:1px solid rgba(0,0,0,.1);">Filter</button>
        <div class="dropdown-menu" id="dropdown">
          <a class="dropdown-item item">Dosen</a>
          <a class="dropdown-item item">Status</a>
          <a class="dropdown-item item">Tanggal</a>
          <a class="dropdown-item item">Keterangan</a>
        </div>
      </div>
      <input type="text" class="form-control" id="keyword" aria-label="Text input with dropdown button" placeholder="Pencarian">
    </div>
    <br>
    <div id="container">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Dosen</th>
              <th scope="col" style="width:30%">Keterangan</th>
              <th scope="col">Tanggal</th>
              <th scope="col">View Dokumen</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
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
                  <td><?= $t['dosen_name'] ?></td>
                  <td><?= $t['keterangan'] ?></td>
                  <td><?= $t['date'] ?></td>
                  <td>
                    <a href="<?= base_url('users/viewfilepdf/') . encrypt_url($t['id']); ?>">view </a>
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
              </select>
            </div>
            <div class="row">
              <div class="col-lg-11" id="dynamic">
                <div class="form-group">
                  <label for="exampleFormControlFile1">Pilih Dokumen</label>
                  <input type="file" class="form-control" name="fileta[]" required style="padding:13px 16px">
                </div>
              </div>
              <div class="col-lg" style="margin-top: 40px;margin-left:-10px" id="icon">
                <a id="tambah"> <span class="fas fa-plus"></span></a>
              </div>
            </div>
            <div class="form-group" style="margin-bottom:0;">
              <label for="ketbim">Keterangan</label>
              <textarea class="form-control" style="padding:12px" rows="5" required id="ketbim" name="keterangan" aria-describedby="keterangan" placeholder="Masukan keterangan... (cth. Bab II)" maxlength="320"></textarea>
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
      var keyword = document.getElementById('keyword');
      var container = document.getElementById('container');
      $(".item").click(function() {
        var text = $(this).text();
        // alert(id)
        $("#filter").text(text)
        if (text != '') {
          load_data(keyword = null, text);
        } else {
          load_data();
        }
      });

      function load_data(keyword, filter) {
        $.ajax({
          url: '<?= base_url('search/fetchdatabimbingan') ?>',
          method: "POST",
          data: {
            keyword: keyword,
            filter: filter,
          },
          success: function(data) {
            $('#bimbingan').html(data);
            // console.log(data)
          }
        });
      }
      keyword.addEventListener('keyup', function() {
        var keyword = $(this).val();
        var filter = $('#filter').text()
        if (keyword != '') {
          load_data(keyword, filter);
        } else {
          load_data();
        }
      })
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