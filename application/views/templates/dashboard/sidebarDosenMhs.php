  <!-- Side Menu -->
  <div class="fik-db-side-menu">
    <div id="accordion">
      <div class="card show-mobile profil">
        <div class="img-wrapper">
          <img src="<?= base_url('assets/img/7.jpg'); ?>">
        </div>
        <b><?= $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row()->name; ?></b>
        <span><?= $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row()->role; ?></span>
      </div>
      <div class="divider show-mobile" style="margin-top:20px"></div>
      <div class="card">
        <a href="<?= base_url('users/main') ?>" class="btn"><span class="fas fa-th-large"></span> Dashboard</a>
      </div>
      <div class="divider"></div>
      <div class="card">
        <a href="#" class="btn" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2"><span class="fas fa-door-open"></span> Peminjaman Tempat</a>
        <div id="collapse2" class="collapse" data-parent="#accordion">
          <ul>
            <li><a data-toggle="modal" data-target="#makebooking">Buat Peminjaman</a></li>
            <li><a href="<?= base_url('users/daftarsemuatempat') ?>">Daftar Semua Tempat</a></li>
            <li><a href="<?= base_url('users/riwayat') ?>">Riwayat</a></li>
          </ul>
        </div>
      </div>
      <div class="card">
        <a href="#" class="btn" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1"><span class="fas fa-box"></span> Peminjaman Barang</a>
        <div id="collapse1" class="collapse" data-parent="#accordion">
          <ul>
            <li><a href="#">Buat Peminjaman</a></li>
            <li><a href="<?= base_url('item/listDosenMhs') ?>">Daftar Semua Barang</a></li>
            <li><a href="<?= base_url('borrowing/listAllById/' . $this->session->userdata('id')) ?>">Riwayat</a></li>
          </ul>
        </div>
      </div>
      <div class="card">
        <a href="#" class="btn" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3"><span class="fas fa-upload"></span> Listing Karya</a>
        <div id="collapse3" class="collapse" data-parent="#accordion">
          <ul>
            <li><a href="<?= base_url('karya') ?>">Karya Saya</a></li>
            <li><a href="<?= base_url('karya/tambah') ?>">Upload</a></li>
          </ul>
        </div>
      </div>
      <div class="divider"></div>
      <div class="card">
        <a href="#" class="btn"><span class="fas fa-align-left"></span> PDF Editor</a>
      </div>
      <div class="divider show-mobile"></div>
      <div class="card">
        <a href="<?= base_url('main/helpdesk') ?>" class="btn show-mobile"><span class="fas fa-life-ring"></span> Helpdesk</a>
      </div>
      <div class="card logout">
        <button class="btn" onclick="location.href='<?= base_url('auth/logout'); ?>';"><span class="fas fa-sign-out-alt"></span> Logout</button>
      </div>
    </div>
  </div>

  <?php
  // $kruangan = $this->db->get('kategoriruangan')->result_array();
  $query = "SELECT *
  FROM `kategoriruangan`
  ORDER BY `kategori` ASC";
  $kruangan = $this->db->query($query)->result_array();

  ?>
  <!-- <?php var_dump($kruangan) ?> -->
  <!-- End Side Menu -->
  <div class="modal fade" id="makebooking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog wide" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Buat Peminjaman</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('booking/bookingplace') ?>" method="POST" enctype="multipart/form-data">
            <div class="custom-form">
              <div class="form-group" style="margin-bottom:12px">
                <input type="text" name="name" class="form-control" placeholder="" required="required" value="<?= $this->session->userdata('name'); ?>" autocomplete="off" />
                <label>Nama Lengkap</label>
              </div>
              <div class="form-group">
                <select class="form-control" name="id_kategori" id="kategoriruangan" required>
                  <option disabled selected>Kategori Ruangan</option>
                  <?php foreach ($kruangan as $k) { ?>
                    <option value="<?= $k['id'] ?>">
                      <?= $k['kategori'] ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" name="id_ruangan" id="ruangan" onchange="disablemodals()" disabled required>
                  <option disabled selected>Pilih Ruangan</option>
                </select>
              </div>
              <div class="form-group">
                <textarea name="keterangan" class="form-control" placeholder="" required="required" autocomplete="off"></textarea>
                <label>Keterangan</label>
              </div>
              <div class="form-group">
                <input type="date" name="tanggal" id="tanggal" onchange="Bookingmodals()" class="form-control" disabled placeholder="" required="required" autocomplete="off" />
                <label>Tanggal Peminjaman</label>
              </div>
              <div class="form-group" style="margin-bottom:0">
                <div class="form-control waktu">Waktu</div>
              </div>
            </div><br>
            <div class="jadwal-ruangan" id="jadwal">
              <table border="0" class="table bookings" id="booking">
                <tbody>
                  <tr class="display">
                  </tr>
                </tbody>
              </table>
            </div>
            <input type="hidden" name="id_peminjam" class="form-control" placeholder="" value="<?= $this->session->userdata('id') ?>" required="required" autocomplete="off" />
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-pill btn-sm" id="createbookingmodals">Kirim Permintaan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('#kategoriruangan').change(function() {
        document.getElementById("ruangan").disabled = false;
        var id_kategori = $('#kategoriruangan').val();

        if (id_kategori != '') {
          $.ajax({
            url: "<?= base_url(); ?>booking/fetchRuangan",
            method: "POST",
            data: {
              id_kategori: id_kategori
            },
            success: function(data) {
              $('#ruangan').html(data);
            }
          })
        }
      });
    });
  </script>