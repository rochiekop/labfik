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
        <a href="<?= base_url('adminlaa') ?>" class="btn"><span class="fas fa-th-large"></span> Dashboard</a>
      </div>
      <div class="divider"></div>
      <div class="card">
        <a href="#" class="btn" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse3"><span class="fas fa-list"></span> TA Online</a>
        <div id="collapse4" class="collapse" data-parent="#accordion">
          <ul>
            <li><a href="<?= base_url('adminlaa/pendaftaranta') ?>">Pendaftaran</a></li>
            <li><a href="<?= base_url('adminlaa/bimbingandsn') ?>">Bimbingan</a></li>
            <li><a href="<?= base_url('adminlaa/penguji') ?>">Penguji</a></li>
          </ul>
        </div>
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