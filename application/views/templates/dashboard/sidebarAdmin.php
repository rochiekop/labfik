  <!-- Side Menu -->
  <div class="fik-db-side-menu">
    <div id="accordion">
      <div class="card show-mobile profil">
        <div class="img-wrapper">
          <img src="<?= base_url('assets/img/profile/') . $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row()->images; ?>">
        </div>
        <b><?= $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row()->name; ?></b>
        <span><?= $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row()->role; ?></span>
      </div>
      <div class="divider show-mobile" style="margin-top:20px"></div>
      <div class="card">
        <a href="<?= base_url('admin') ?>" class="btn"><span class="fas fa-th-large"></span> Dashboard</a>
      </div>
      <div class="divider"></div>
      <div class="card">
        <a href="#" class="btn" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4"><span class="fas fa-bookmark"></span>Management Info</a>
        <div id="collapse4" class="collapse" data-parent="#accordion">
          <ul>
            <li <?= $this->uri->segment(2) == 'dt_slider' ? 'class="active"' : '' ?>><a href="<?= base_url('admin/dt_slider'); ?>">Slider</a></li>
            <li><a href="<?= base_url('admin/dt_info'); ?>">Informasi</a></li>
            <li><a href="<?= base_url('admin/dt_lab'); ?>">Laboratorium</a></li>
            <li><a href="<?= base_url('admin/dt_panel'); ?>">Info Panel</a></li>
          </ul>
        </div>
      </div>
      <div class="divider"></div>
      <div class="card">
        <a href="#" class="btn" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2"><span class="fas fa-door-open"></span>Listing Tempat</a>
        <div id="collapse2" class="collapse" data-parent="#accordion">
          <ul>
            <li><a href="<?= base_url('admin/tambahtempat') ?>">Tambah Tempat</a></li>
            <li><a href="<?= base_url('admin/daftarkategori') ?>">Daftar Semua Kategori</a></li>
            <li><a href="<?= base_url('admin/daftartempat') ?>">Daftar Semua Tempat</a></li>
            <li><a href="<?= base_url('booking/bookingByAdmin') ?>">Buat Peminjaman</a></li>
            <li><a href="<?= base_url('admin/riwayat') ?>">Riwayat</a></li>
          </ul>
        </div>
      </div>
      <div class="card">
        <a href="#" class="btn" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1"><span class="fas fa-box"></span>Listing Barang</a>
        <div id="collapse1" class="collapse" data-parent="#accordion">
          <ul>
            <!-- <li><a href="</?= base_url('admin/tambahbarang') ?>">Tambah Barang</a></li> -->
            <li><a href="<?= base_url('item/add') ?>">Tambah Barang</a></li>
            <li><a href="<?= base_url('item/listAdmin') ?>">Daftar Semua Barang</a></li>
            <li><a href="#">Peminjaman</a></li>
            <li><a href="#">Buat Peminjaman</a></li>
            <li><a href="<?= base_url('borrowing/listAllById/' . $this->session->userdata('id')) ?>">Riwayat</a></li>
          </ul>
        </div>
      </div>
      <div class="divider"></div>
      <div class="card">
        <a href="#" class="btn" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3"><span class="fas fa-upload"></span>Listing Karya</a>
        <div id="collapse3" class="collapse" data-parent="#accordion">
          <ul>
            <li><a href="<?= base_url('Admin_karya'); ?>">Semua Karya</a></li>
          </ul>
        </div>
      </div>
      <div class="card">
        <a href="#" class="btn" data-toggle="collapse" data-target="#collapse5" aria-expanded="true" aria-controls="collapse5"><span class="fa fa-th"></span>Kategori</a>
        <div id="collapse5" class="collapse" data-parent="#accordion">
          <ul>
            <li><a href="<?= base_url('sub_kategori'); ?>">Sub kategori</a></li>
          </ul>
        </div>
      </div>
      <div class="divider"></div>
      <div class="card">
        <a href="#" class="btn"><span class="fas fa-align-left"></span> Bimbingan TA</a>
        <a href="#" class="btn"><span class="fas fa-graduation-cap"></span> Sidang</a>
      </div>
      <div class="divider"></div>
      <div class="card">
        <a href="<?= base_url('admin/activationrequest') ?>" class="btn"><span class="fas fa-user-plus"></span> Request Token</a>
        <a href="<?= base_url('main/helpdesk') ?>" class="btn"><span class="fas fa-life-ring"></span> Helpdesk</a>
      </div>
      <div class="card logout">
        <button class="btn" data-toggle="modal" data-target="#logout"><span class="fas fa-sign-out-alt"></span> Logout</button>
      </div>
    </div>
  </div>
  <!-- End Side Menu -->
  <!-- Modal -->

  <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Logout</h5>
        </div>
        <div class="modal-body">
          Anda yakin akan keluar?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="button" onclick="location.href='<?= base_url('auth/logout'); ?>';" class="btn btn-primary">Keluar</button>
        </div>
      </div>
    </div>
  </div>