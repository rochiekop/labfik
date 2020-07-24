  <!-- Main Container -->
  <main class="akun-container">
    <div class="fik-section-title2">
      <span class="fas fa-door-open zzzz"></span>
      <h5>Pinjam Tempat</h5>
    </div>
    <div class="row">
      <div class="col-md-4">
        <img src="<?= base_url('assets/img/ruangan/') . $tempatbyid['images'] ?>" alt="$tempatbyid['title']">
      </div>
      <div class="col-md-8">
        <div class="card">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <div class="custom-form">
                <div class="form-group" style="margin-bottom:12px">
                  <input type="text" name="name" class="form-control" placeholder="" value="<?= $this->session->userdata('name') ?>" required="required" autocomplete="off" />
                  <label></label>
                </div>
                <div class="lab-category" style="margin-bottom:16px;">
                  <div class="form-check">
                    <?php $no = 0;
                    foreach ($kruangan as $k) : ?>
                      <?php if ($k['id'] == $tempatbyid['id_kategori']) : ?>
                        <input class="form-check-input" type="radio" name="kategori" id="inlineRadio1" value="<?= $k['kategori'] ?>" checked>
                        <label class="form-check-label" for=<?= "inlineRadio" . $k['id'] ?>><?= $k['kategori'] ?></label>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </div>
                </div>
                <div class="form-group" id="tanggalform">
                  <input type="text" name="ruangan" class="form-control" placeholder="" value="<?= $tempatbyid['ruangan'] ?>" required="required" autocomplete="off" disabled />
                  <label></label>
                </div>
                <div class="form-group">
                  <input type="date" name="date" id="date" class="form-control" onchange="Booking()" placeholder="" required="required" autocomplete="off" />
                  <label>Tanggal Peminjaman</label>
                </div>
                <div class="form-group">
                  <div class="form-control waktu" id="waktu" name="waktu">Waktu</div>
                </div>
                <div class="jadwal-ruangan">
                  <table border="0" class="table bookings" id="booking">
                    <tbody>
                      <tr>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="form-group" style="margin-bottom:0;">
                  <textarea name="keterangan" class="form-control" placeholder="" required="required" autocomplete="off"></textarea>
                  <label>Keterangan</label>
                </div>
                <!-- Hidden Input-->
                <input type="hidden" name="id_peminjam" class="form-control" placeholder="" value="<?= $this->session->userdata('id') ?>" required="required" autocomplete="off" />
                <input type="hidden" name="id_ruangan" class="form-control" placeholder="" value="<?= $tempatbyid['id'] ?>" required="required" autocomplete="off" />
              </div>
            </div>
            <div class="card-footer">
              <button class="btn btn-primary">Buat Peminjaman</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
  <!-- End Main Container -->