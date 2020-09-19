  <!-- Main Container -->
  <main class="akun-container">
    <div class="fik-section-title2">
      <span class="fas fa-door-open zzzz"></span>
      <h5>List Semua Barang</h5>
    </div>
    <div class="input-group">
      <div class="input-group-append">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-left:1px solid rgba(0,0,0,.1);">Urutkan</button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">A-Z</a>
          <a class="dropdown-item" href="#">Terbaru</a>
          <a class="dropdown-item" href="#">Dosen</a>
          <a class="dropdown-item" href="#">Mahasiswa</a>
        </div>
      </div>
      <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Pencarian">
    </div>
    <div class="table-responsive admin-list">
      <table class="table">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" style="width:48px">No</th>
              <th scope="col" style="width:90px">&nbsp;</th>
              <th scope="col">Barang</th>
              <th scope="col">Kuantitas</th>
              <th scope="col">Akses</th>
              <th scope="col">Status</th>
              <th scope="col" class="action">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="row" style="width:60px">1</td>
              <td style="width:90px">
                <div class="img-wrapper">
                  <img src="_assets/img/2.jpg" alt="">
                </div>
              </td>
              <td>Canon EOS</td>
              <td>2</td>
              <td>Dosen, Mahasiswa</td>
              <td>
                <div class="badge badge-success">Tersedia (2)</div>
              </td>
              <td class="action">
                <a data-toggle="modal" data-target=".bd-example-modal-sm"><span class="fas fa-trash"></span></a>
                <a href="akun-admin-barang-edit.html"><span class="fas fa-edit"></span></a>
              </td>
            </tr>
          </tbody>
        </table>
      </table>
    </div>
  </main>
  <!-- End Main Container -->

  <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          Hapus IK.04.04?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger btn-sm">Hapus</button>
        </div>
      </div>
    </div>
  </div>