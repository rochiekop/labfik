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
          <form action="#">
            <div class="card-body">
              <div class="custom-form">
                <div class="form-group" style="margin-bottom:12px">
                  <input type="text" name="" class="form-control" placeholder="" value="<?= $this->session->userdata('name') ?>" required="required" autocomplete="off" />
                  <label></label>
                </div>
                <div class="lab-category" style="margin-bottom:16px;">
                  <?php $no = 0;
                  foreach ($kruangan as $k) : ?>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="kategori" id=<?= "inlineRadio" . $k['id'] ?> value="<?= $k['id'] ?>" <?php if ($tempatbyid['id_kategori'] == $k['id']) {
                                                                                                                                                echo ('checked="checked"');
                                                                                                                                              } else echo ('disabled'); ?>>
                      <label class="form-check-label" for=<?= "inlineRadio" . $k['id'] ?>><?= $k['kategori'] ?></label>
                    </div>
                  <?php endforeach; ?>
                </div>
                <div class="form-group">
                  <input type="text" name="ruangan" class="form-control" placeholder="" value="<?= $tempatbyid['ruangan'] ?>" required="required" autocomplete="off" disabled />
                  <label></label>
                  <!-- <select class="form-control" id="PilihRuangan" title="Silakan pilih kategori ruangan">
                    <option disabled selected>Pilih Ruangan</option>
                    <?php foreach ($dt_tempat as $t) : ?>
                      <?php if ($t['id_kategori'] == $tempatbyid['id_kategori']) : ?>
                        <option><?= $t['ruangan'] ?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </select> -->
                </div>
                <div class="form-group">
                  <input type="date" name="tanggal" class="form-control" placeholder="" required="required" autocomplete="off" />
                  <label>Tanggal Peminjaman</label>
                </div>
                <div class="form-group">
                  <div class="form-control waktu">Waktu</div>
                </div>
                <div class="jadwal-ruangan">
                  <table border="0" class="table bookings">
                    <tbody>
                      <tr>
                        <td class="free" align="center" valign="middle" width="13%" style="overflow:hidden">
                          <div width="100%" style="overflow:hidden">
                            <a href="https://demo.classroombookings.com/bookings/book?period=637&amp;room=781&amp;day_num=5&amp;week=1&amp;date=2020-07-10"><img src="https://demo.classroombookings.com/assets/images/ui/accept.png" width="16" height="16" alt="Book" title="Book" hspace="4" align="absmiddle">06:30 - 07:30</a>
                          </div>
                        </td>
                        <td class="free" align="center" valign="middle" width="13%" style="overflow:hidden">
                          <div width="100%" style="overflow:hidden">
                            <a href="https://demo.classroombookings.com/bookings/book?period=637&amp;room=781&amp;day_num=5&amp;week=1&amp;date=2020-07-10"><img src="https://demo.classroombookings.com/assets/images/ui/accept.png" width="16" height="16" alt="Book" title="Book" hspace="4" align="absmiddle">06:30 - 07:30</a>
                          </div>
                        </td>
                        <td class="free red" align="center" valign="middle" width="13%" style="overflow:hidden">
                          <div width="100%" style="overflow:hidden">
                            <a href="https://demo.classroombookings.com/bookings/book?period=637&amp;room=781&amp;day_num=5&amp;week=1&amp;date=2020-07-10"><img src="https://demo.classroombookings.com/assets/images/ui/accept.png" width="16" height="16" alt="Book" title="Book" hspace="4" align="absmiddle">06:30 - 07:30</a>
                          </div>
                        </td>
                        <td class="free red" align="center" valign="middle" width="13%" style="overflow:hidden">
                          <div width="100%" style="overflow:hidden">
                            <a href="https://demo.classroombookings.com/bookings/book?period=637&amp;room=781&amp;day_num=5&amp;week=1&amp;date=2020-07-10"><img src="https://demo.classroombookings.com/assets/images/ui/accept.png" width="16" height="16" alt="Book" title="Book" hspace="4" align="absmiddle">06:30 - 07:30</a>
                          </div>
                        </td>
                      <tr>
                    </tbody>
                  </table>
                </div>
                <div class="form-group" style="margin-bottom:0;">
                  <textarea name="" class="form-control" placeholder="" required="required" autocomplete="off"></textarea>
                  <label>Keterangan</label>
                </div>
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