<!-- Main Container -->
<main class="akun-container">
  <div class="row akun-overview">
    <div class="col-md-4">
      <div class="overview-one alert-warning">
        <b>Peminjaman Berlangsung</b>
        <ul>
          <li><a href="#"><span class="fas fa-door-open"></span> IK.04.04 | 06:30 - 09:30 <i>Menunggu Verifikasi</i></a></li>
        </ul>
      </div>
    </div>
    <div class="col-md-4">
      <div class="overview-two alert-info">
        <b>Peminjaman Terakhir</b>
        <ul>
          <li><a href="#"><span class="fas fa-door-open"></span> IK.04.04 | 06:30 - 09:30 <i>Jumat, 12 Oktober 2019</i></a></li>
          <li><a href="#"><span class="fas fa-box-open"></span> Canon EOS 5D Mark II <i>Jumat, 18 Oktober 2019</i></a></li>
        </ul>
      </div>
    </div>
    <div class="col-md-4">
      <div class="overview-three alert-success">
        <b>Jumlah Peminjaman</b>
        <ul>
          <li><a href="#"><span class="fas fa-door-open"></span> 8 Tempat Dipinjam</a></li>
          <li><a href="#"><span class="fas fa-box-open"></span> 2 Barang Dipinjam</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="fik-rekomen">
    <div class="fik-section-title2">
      <span class="fas fa-door-open zzzz"></span>
      <h5>List Tempat</h5>
    </div>
    <div class="row grid-bartemp">
      <!-- <div class="col-md-2">
        <a href="akun-tempat-view.html" class="trigger2"></a>
        <div class="img-wrapper">
          <img src="<?= base_url('assets/img/6.jpg') ?>" alt="">
        </div>
        <div class="info">
          <b>IK.04.04</b> <br> Lab
        </div>
      </div>
      <div class="col-md-2">
        <a href="akun-tempat-view.html" class="trigger2"></a>
        <div class="img-wrapper">
          <img src="<?= base_url('assets/img/6.jpg') ?>" alt="">
        </div>
        <div class="info">
          <b>IK.04.04</b> <br> Lab
        </div>
      </div> -->
      <?php foreach ($dt_tempat as $t) : ?>
        <div class="col-md-2">
          <a href="<?= base_url('users/pinjamt/') . encrypt_url($t['id']); ?>" class="trigger2"></a>
          <div class="img-wrapper">
            <img src="<?= base_url('assets/img/ruangan/') . $t['images']; ?>" alt="">
          </div>
          <div class="info">
            <b><?= $t['ruangan'] ?></b> <br> <?= $t['kategori'] ?>
          </div>
          <input type="hidden" name="tipepinjam" value="tempat" class="form-control" placeholder="" required="required" autocomplete="off" />
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="fik-rekomen">
    <div class="fik-section-title2">
      <span class="fas fa-box-open zzzz"></span>
      <h5>List Barang</h5>
    </div>
    <div class="row grid-bartemp">
      <div class="col-md-2">
        <a href="#" class="trigger2"></a>
        <div class="img-wrapper">
          <img src="<?= base_url('assets/img/2.jpg') ?>" alt="">
        </div>
        <div class="info">
          <b>Canon EOS</b> <br> Tersedia
        </div>
      </div>
    </div>
  </div>
</main>
<!-- End Main Container -->
<!-- <?php var_dump($dt_tempat) ?> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog wide" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Buat Peminjaman</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#">
          <div class="custom-form">
            <div class="form-group" style="margin-bottom:12px">
              <input type="text" name="" class="form-control" placeholder="" required="required" autocomplete="off" />
              <label>Nama Lengkap</label>
            </div>
            <div class="form-group">
              <select class="form-control" id="exampleFormControlSelect1">
                <option disabled selected>Kategori Ruangan</option>
                <option>Lab Cintiq</option>
                <option>Studio Fotografi</option>
              </select>
            </div>
            <div class="form-group">
              <select class="form-control" id="exampleFormControlSelect1">
                <option disabled selected>Pilih Ruangan</option>
                <option>IK.04.04</option>
                <option>IK.04.05</option>
                <option>IK.04.05</option>
              </select>
            </div>
            <div class="form-group">
              <textarea name="" class="form-control" placeholder="" required="required" autocomplete="off"></textarea>
              <label>Keterangan</label>
            </div>
            <div class="form-group">
              <input type="text" name="" class="form-control" placeholder="" required="required" autocomplete="off" />
              <label>Tanggal Peminjaman</label>
            </div>
            <div class="form-group" style="margin-bottom:0">
              <div class="form-control waktu">Waktu</div>
            </div>
          </div>
        </form>
        <form action="https://demo.classroombookings.com/bookings/action" name="bookings" method="post" class="jadwal-ruangan" accept-charset="utf-8">
          <input type="hidden" name="room_id" value="781">
          <table border="0" class="table bookings">
            <tbody>
              <tr>
                <td class="free" align="center" valign="middle" width="13%" style="overflow:hidden">
                  <div width="100%" style="overflow:hidden">
                    <a href="https://demo.classroombookings.com/bookings/book?period=637&amp;room=781&amp;day_num=5&amp;week=1&amp;date=2020-07-10">
                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1"><img src="https://demo.classroombookings.com/assets/images/ui/accept.png" width="16" height="16" alt="Book" title="Book" hspace="4" align="absmiddle">06:30 - 07:30</a>
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
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-pill btn-sm">Kirim Permintaan</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->