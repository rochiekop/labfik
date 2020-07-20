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
                <div class="form-group" id="check">
                  <input type="date" name="date" class="form-control" id="date" placeholder="" required="required" autocomplete="off" />
                  <label>Tanggal Peminjaman</label>
                </div>
                <div class="form-group">
                  <div class="form-control waktu" id="waktu" name="waktu">Waktu</div>
                </div>
                <div class="jadwal-ruangan">
                  <table border="0" class="table bookings">
                    <tbody>
                      <tr>
                        <td class="free" align="center" id="btnchange" valign="middle" width="13%" style="overflow:hidden">
                          <div width="100%" style="overflow:hidden">
                            <a value="06:30 - 10:30" class="time" id="btn">06:30 - 07:30</a>
                          </div>
                        </td>
                        <td class="free" align="center" id="btnchange" valign="middle" width="13%" style="overflow:hidden">
                          <div width="100%" style="overflow:hidden">
                            <a value="06:30 - 10:30" class="time" id="btn">07:30 - 08:30</a>
                          </div>
                        </td>
                        <td class="free" align="center" id="btnchange" valign="middle" width="13%" style="overflow:hidden">
                          <div width="100%" style="overflow:hidden">
                            <a value="06:30 - 10:30" class="time" id="btn">08:30 - 09:30</a>
                          </div>
                        </td>
                        <td class="free" align="center" id="btnchange" valign="middle" width="13%" style="overflow:hidden">
                          <div width="100%" style="overflow:hidden">
                            <a value="06:30 - 10:30" class="time" id="btn">09:30 - 10:30</a>
                          </div>
                        </td>
                        <td class="free" align="center" id="btnchange" valign="middle" width="13%" style="overflow:hidden">
                          <div width="100%" style="overflow:hidden">
                            <a value="06:30 - 10:30" class="time" id="btn">10:30 - 11:30</a>
                          </div>
                        </td>
                        <td class="free" align="center" id="btnchange" valign="middle" width="13%" style="overflow:hidden">
                          <div width="100%" style="overflow:hidden">
                            <a value="06:30 - 10:30" class="time" id="btn">11:30 - 12:30</a>
                          </div>
                        </td>
                        <td class="free" align="center" id="btnchange" valign="middle" width="13%" style="overflow:hidden">
                          <div width="100%" style="overflow:hidden">
                            <a value="06:30 - 10:30" class="time" id="btn">12:30 - 13:30</a>
                          </div>
                        </td>
                        <td class="free" align="center" id="btnchange" valign="middle" width="13%" style="overflow:hidden">
                          <div width="100%" style="overflow:hidden">
                            <a value="06:30 - 10:30" class="time" id="btn">13:30 - 14:30</a>
                          </div>
                        </td>
                        <td class="free" align="center" id="btnchange" valign="middle" width="13%" style="overflow:hidden">
                          <div width="100%" style="overflow:hidden">
                            <a value="06:30 - 10:30" class="time" id="btn">14:30 - 15:30</a>
                          </div>
                        </td>
                        <td class="free" align="center" id="btnchange" valign="middle" width="13%" style="overflow:hidden">
                          <div width="100%" style="overflow:hidden">
                            <a value="06:30 - 10:30" class="time" id="btn">15:30 - 16:30</a>
                          </div>
                        </td>
                        <td class="free" align="center" id="btnchange" valign="middle" width="13%" style="overflow:hidden">
                          <div width="100%" style="overflow:hidden">
                            <a value="06:30 - 10:30" class="time" id="btn">16:30 - 17:30</a>
                          </div>
                        </td>
                        <td class="free" align="center" id="btnchange" valign="middle" width="13%" style="overflow:hidden">
                          <div width="100%" style="overflow:hidden">
                            <a value="06:30 - 10:30" class="time" id="btn">17:30 - 18:30</a>
                          </div>
                        </td>
                        <td class="free" align="center" id="btnchange" valign="middle" width="13%" style="overflow:hidden">
                          <div width="100%" style="overflow:hidden">
                            <a value="06:30 - 10:30" class="time" id="btn">19:30 - 20:30</a>
                          </div>
                        </td>
                        <td class="free" align="center" id="btnchange" valign="middle" width="13%" style="overflow:hidden">
                          <div width="100%" style="overflow:hidden">
                            <a value="06:30 - 10:30" class="time" id="btn">20:30 - 21:30</a>
                          </div>
                        </td>
                        <td class="free" align="center" id="btnchange" valign="middle" width="13%" style="overflow:hidden">
                          <div width="100%" style="overflow:hidden">
                            <a value="06:30 - 10:30" class="time" id="btn">21:30 - 22:30</a>
                          </div>
                        </td>
                        <!-- <td class="free red" align="center" id="btnchange" valign="middle" width="13%" style="overflow:hidden">
                          <div width="100%" style="overflow:hidden">
                            <a><img src="https://demo.classroombookings.com/assets/images/ui/accept.png" width="16" height="16" alt="Book" title="Book" hspace="4" align="absmiddle">06:30 - 07:30</a>
                          </div>
                        </td>
                        <td class="free red" align="center" id="btnchange" valign="middle" width="13%" style="overflow:hidden">
                          <div width="100%" style="overflow:hidden">
                            <a><img src="https://demo.classroombookings.com/assets/images/ui/accept.png" width="16" height="16" alt="Book" title="Book" hspace="4" align="absmiddle">06:30 - 07:30</a>
                          </div>
                        </td>
                        <td class="free red" align="center" id="btnchange" valign="middle" width="13%" style="overflow:hidden">
                          <div width="100%" style="overflow:hidden">
                            <a><img src="https://demo.classroombookings.com/assets/images/ui/accept.png" width="16" height="16" alt="Book" title="Book" hspace="4" align="absmiddle">06:30 - 07:30</a>
                          </div>
                        </td> -->
                      <tr>
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
              <button class="btn btn-primary" id="tes">Buat Peminjaman</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
  <!-- End Main Container -->

  <script>
    $(document).ready(function() {


      const btn = document.querySelectorAll(".time");

      for (let i = 0; i < btn.length; i++) {
        btn[i].addEventListener("click", function() {

          for (let j = 0; j < btn.length; j++) {
            // btn[j].addEventListener("click", function() {
            //   btn[j].removeAttribute("style");
            // })
            btn[j].removeAttribute("style");
          }
          this.style.background = "green";
          this.style.color = "white";
          document.getElementById("waktu").innerHTML = ($(this).text());

        })
      }
    });
  </script>