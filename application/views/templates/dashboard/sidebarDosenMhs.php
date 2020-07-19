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
            <li><a href="#">Riwayat</a></li>
          </ul>
        </div>
      </div>
      <div class="card">
        <a href="#" class="btn" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1"><span class="fas fa-box"></span> Peminjaman Barang</a>
        <div id="collapse1" class="collapse" data-parent="#accordion">
          <ul>
            <li><a href="#">Buat Peminjaman</a></li>
            <li><a href="<?= base_url('item/listDosenMhs') ?>">Daftar Semua Barang</a></li>
            <li><a href="#">Riwayat</a></li>
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