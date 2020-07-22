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
        <a href="<?= base_url('users') ?>" class="btn"><span class="fas fa-th-large"></span> Dashboard</a>
      </div>
      <div class="divider"></div>
      <div class="card">
        <a href="#" class="btn" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2"><span class="fas fa-door-open"></span> Peminjaman Tempat</a>
        <div id="collapse2" class="collapse" data-parent="#accordion">
          <ul>
            <li><a data-toggle="modal" data-target="#exampleModal2">Buat Peminjaman</a></li>
            <li><a href="<?= base_url('users/daftarsemuatempat') ?>">Daftar Semua Tempat</a></li>
            <li><a href="<?= base_url('booking/riwayat') ?>">Riwayat</a></li>
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
  <!-- End Side Menu -->

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