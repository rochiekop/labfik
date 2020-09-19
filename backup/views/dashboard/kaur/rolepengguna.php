<!-- Main Container -->
<main class="akun-container">
  <div class="fik-section-title2">
    <h5>Pengaturan Role Pengguna</h5>
  </div>
  <div class="input-group">
    <div class="input-group-append">
      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-left:1px solid rgba(0,0,0,.1);">Urutkan</button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Semua</a>
        <a class="dropdown-item" href="#">Nama</a>
        <a class="dropdown-item" href="#">Email</a>
        <a class="dropdown-item" href="#">Akses</a>
      </div>
    </div>
    <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Pencarian">
  </div> <br>
  <div class="table-responsive admin-list">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col" style="width:30%;">Nama Dosen</th>
          <th scope="col">Email</th>
          <th scope="col">Role</th>
          <th scope="col">Akses</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($dosen)) : ?>
          <td colspan="6" style="background-color: whitesmoke;text-align:center">List dosen kosong</td>
        <?php else : ?>
          <?php $no = 0;
          foreach ($dosen as $t) : ?>
            <tr>
              <td scope="row"><b><?= ++$no ?></b></td>
              <td><?= $t['name'] ?></td>
              <td><?= $t['email'] ?></td>
              <td><?= $t['role'] ?></td>
              <td>
                <div class="form-group" style="margin-bottom:0;">
                  <select class="form-control" style="height:32px;display:inline-block;font-size:11px">
                    <option>Pengguna Biasa</option>
                    <option>Administrator</option>
                  </select>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</main>
<!-- End Main Container -->