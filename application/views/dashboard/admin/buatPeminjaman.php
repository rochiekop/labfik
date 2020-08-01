<!-- Main Container -->
<main class="akun-container">
  <?= $this->session->flashdata('message'); ?>
  <div class="fik-section-title2">
    <span class="fas fa-door-open zzzz"></span>
    <h5>Pinjam Tempat</h5>
  </div>
  <div class="row">
    <div class="col-md-4">
      <img src="<?= base_url('assets/img/6.jpg'); ?>" alt="">
    </div>
    <div class="col-md-8">
      <div class="card">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="card-body">
            <div class="custom-form">
              <div class="form-group" style="margin-bottom:12px">
                <input type="text" name="name" id="name" class="form-control" placeholder="" value="<?= set_value('name'); ?>" required="required" autocomplete="off" />
                <label>Nama Lengkap</label>
                <small class="form-text text-danger" style="margin-bottom: -15px;margin-left:15px"><?= form_error('name') ?>.</small>
              </div>
              <div class="lab-category" style="margin-bottom:16px;">
                <?php $no = 0;
                foreach ($kategori as $k) : ?>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="kategoriruangan" id=<?= "inlineRadio" . $k['id'] ?> value="<?= $k['id'] ?>">
                    <label class="form-check-label" for=<?= "inlineRadio" . $k['id'] ?>><?= $k['kategori'] ?></label>
                  </div>
                <?php endforeach; ?>
              </div>
              <div class="form-group">
                <select class="form-control" id="ruangan" name="id_ruangan" onchange="disable()" title="Silakan pilih kategori ruangan" disabled>
                  <option disabled selected>Pilih Ruangan</option>
                </select>
              </div>
              <div class="form-group">
                <input type="date" name="datebooking" id="datebooking" onchange="bookingByAdmin()" class="form-control" placeholder="" required="required" autocomplete="off" disabled />
                <label>Tanggal Peminjaman</label>
              </div>
              <div class="form-group">
                <div class="form-control waktu">Waktu</div>
              </div>
              <div class="jadwal-ruangan" id="schedule">
                <table border="0" class="table bookings">
                  <tbody>
                    <tr class="displaydate">
                    <tr>
                  </tbody>
                </table>
              </div>
              <div class="form-group" style="margin-bottom:0;">
                <textarea name="keterangan" class="form-control" placeholder="" required="required" autocomplete="off"></textarea>
                <label>Keterangan</label>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-primary" type="submit" id="createbookingbyadmin">Buat Peminjaman</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
<!-- End Main Container -->
<script>
  $(document).ready(function() {
    $("input[name='kategoriruangan']").click(function() {
      document.getElementById("ruangan").disabled = false;
      // document.getElementById("datebooking").disabled = false;
      var id_kategori = $("input[name='kategoriruangan']:checked").val();
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