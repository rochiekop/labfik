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
        <a href="<?= base_url('adminlaa') ?>" class="btn"><span class="fas fa-align-left"></span> Pendaftaran</a>
      </div>
      <div class="card">
        <a href="<?= base_url('listmhs') ?>" class="btn"><span class="fas fa-users"></span> List Mahasiswa</a>
      </div>
      <div class="card">
        <a href="#" class="btn" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2"><span class="fas fa-door-open"></span> Progress Bimbingan</a>
        <div id="collapse2" class="collapse" data-parent="#accordion">
          <ul>
            <li><a href="<?= base_url('#') ?>">Preview 1</a></li>
            <li><a href="<?= base_url('#') ?>">Preview 2</a></li>
            <li><a href="<?= base_url('#') ?>">Preview 3</a></li>
          </ul>
        </div>
      </div>
      <div class="divider"></div>
      <div class="card">
        <a href="#" class="btn"><span class="fas fa-life-ring"></span> Helpdesk</a>
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