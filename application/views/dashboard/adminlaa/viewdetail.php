  <!-- Main Container -->
  <main class="akun-container">
    <?= $this->session->flashdata('message'); ?>
    <div class="fik-section-title2">
      <h4>File Pendaftaran</h4>
    </div>
    <br>
    Nama &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?= $mhs['name'] ?> <br>
    NIM &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?= $mhs['nim'] ?> <br>
    Prodi &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?= $mhs['prodi'] ?><br>
    Kosentrasi &nbsp&nbsp: <?= $mhs['peminatan'] ?> <br>
    Tahun &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?= $mhs['tahun'] ?>
    <br>
    <br>
    <div id="container">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col" style="width:30px"></th>
              <th scope="col">Nama File</th>
              <th scope="col">File</th>
              <th scope="col">Lihat</th>
              <th scope="col">Action</th>
              <th scope="col">Status</th>
              <th scope="col">Alasan</th>
            </tr>
          </thead>
          <tbody id="showaction">
            <?php if (empty($file)) : ?>
              <td colspan="7" style="background-color: whitesmoke;text-align:center">List Bimbingan kosong</td>
            <?php else : ?>
              <?php $no = 0;
              foreach ($file as $f) : ?>
                <input type="hidden" id="id_mhs" value="<?= $f['id_mhs'] ?>">
                <tr>
                  <td><?= ++$no ?></td>
                  <td> <input type="text" id="id" value="<?= $f['id'] ?>"></td>
                  <td><?= $f['nama'] ?></td>
                  <td> <a href="<?= base_url('assets/upload/thesis/') . $f['username'] . '/' . $f['file'] ?>" download title="Download File"><?= $f['file'] ?></a></td>
                  <td> <a data-toggle="modal" data-target="#exampleModal<?= $f['id'] ?>" id="view" class="btn badge badge-secondary" style="color: white;">Lihat</a></td>
                  <!-- Action -->
                  <?php if ($f['status_adminlaa'] == "Dikirim" or $f['status_adminlaa'] == "Update") : ?>
                    <?php if ($f['view_adminlaa'] != "Belum Dilihat") : ?>
                      <td> <a href="<?= base_url('adminlaa/accfilependaftaran/') . encrypt_url($f['id']); ?>" class="btn badge badge-success">Acc</a>
                        <a data-toggle="modal" data-target="#tolak<?= $f['id'] ?>" class="btn badge badge-danger" style="color: white;">Tolak</a>
                      </td>
                      <td><b>Dilihat</b></td>
                      <td></td>
                    <?php else : ?>
                      <td></td>
                      <td><b>Belum Dilihat</b></td>
                      <td></td>
                    <?php endif; ?>
                  <?php elseif ($f['status_adminlaa'] == "Disetujui") : ?>
                    <td></td>
                    <td><b><?= $f['status_adminlaa'] ?></b></td>
                    <td></td>
                  <?php elseif ($f['status_adminlaa'] == "Ditolak") : ?>
                    <td><a data-toggle="modal" data-target="#komen<?= encrypt_url($f['id']); ?>" class="badge badge-warning" style="color:white">Beri Tanggapan</a></td>
                    <td><b><?= $f['status_adminlaa'] ?></b></td>
                    <td><?= $f['komentar'] ?></td>
                  <?php endif; ?>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <script>
    $(document).ready(function() {
      tampil_data_barang(); //pemanggilan fungsi tampil barang.
      //fungsi tampil barang
      function tampil_data_barang() {
        $.ajax({
          type: 'GET',
          url: '<?php echo base_url() ?>index.php/barang/data_barang',
          async: true,
          dataType: 'json',
          success: function(data) {
            var html = '';
            var i;
            for (i = 0; i < data.length; i++) {
              html += '<tr>' +
                '<td>' + data[i].barang_kode + '</td>' +
                '<td>' + data[i].barang_nama + '</td>' +
                '<td>' + data[i].barang_harga + '</td>' +
                '<td style="text-align:right;">' +
                '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="' + data[i].barang_kode + '">Edit</a>' + ' ' +
                '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="' + data[i].barang_kode + '">Hapus</a>' +
                '</td>' +
                '</tr>';
            }
            $('#show_data').html(html);
          }

        });
      };

      $("#view").click(function() {
        var id = $('#id').val()
        alert(id)
        var id_mhs = $('#id_mhs').val()
        if (id != "") {
          $.ajax({
            url: '<?= base_url('adminlaa/updateviewadminlaa') ?>',
            method: "POST",
            data: {
              id: id,
              id_mhs: id_mhs,
            },
            success: function(data) {
              $('#showaction').html(data);
            }
          });
        } else {
          alert('Data Tidak Ada')
        }
      });
    });
  </script>
  <!-- End Main Container -->

  <?php foreach ($file as $m) : ?>
    <div class="modal fade bd-example-modal-lg" id="exampleModal<?= $m['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel"><?= $m['nama'] ?></h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <embed src="<?= base_url('assets/upload/thesis/') . $m['username'] . '/' . $m['file'] ?>" width="100%" height="650px" />
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

  <?php foreach ($file as $f) : ?>
    <div class="modal fade" id="komen<?= encrypt_url($f['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="<?= base_url('adminlaa/berikomentar/') . encrypt_url($f['id']); ?>" method="post">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Beri Komentar disini</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <textarea name="komentar" id="komentar" cols="46" rows="5"></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  <?php foreach ($file as $f) : ?>
    <!-- Declined -->
    <div class="modal fade bd-example-modal-sm" id="tolak<?= $f['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <p class="modal-title" id="exampleModalLabel"> Tolak Dokumen <?= $f['nama'] ?> ?</p>
          </div>
          <form action="<?= base_url('adminlaa/tolakfilependaftaran') ?>" method="post" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $f['id'] ?>">

            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batalkan</button>
              <button type="submit" class="btn btn-sm btn-danger">Kirim</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

  <script src="https://cdn.tiny.cloud/1/q9tneu2aax9fp91cvqlh7mqvx44p6ph4jb63xq6lax2ybita/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: 'textarea',
      toolbar: 'save restoredraft',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      // he
    });
  </script>