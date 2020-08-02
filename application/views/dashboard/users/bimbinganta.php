  <!-- Main Container -->
  <main class="akun-container">

    <div class="fik-section-title2">
      <h4>Bimbingan</h4>
    </div>
    <div class="dropdown">
      <a data-toggle="modal" data-target="#exampleModal2" class="btn btn-sm btn-primary" style="color:#fff">Tambah Bimbingan</a>
      <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dospem : Mark Hoover
      </button>
      <a href="#" class="btn btn-sm btn-success" style="margin-left:12px;color:#fff">Sidang</a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#">Mark Hoover</a>
      </div>
    </div>
    <br>
    <br>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Dosen</th>
            <th scope="col" style="width:40%">Keterangan</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark Hoover</td>
            <td>Bab I</td>
            <td>12 April 2020</td>
            <td><span class="badge badge-success">Selesai</span></td>
            <td>
              <a data-toggle="modal" data-target="#exampleModal"><u>Buka Aksi</u></a>
            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Mark Hoover</td>
            <td>Bab II Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt iure qui minus maiores officiis quod velit nam sit repudiandae quos aliquid ea placeat voluptatem ex, atque provident in perferendis exercitationem.</td>
            <td>12 April 2020</td>
            <td><span class="badge badge-danger">Revisi</span></td>
            <td>
              <a data-toggle="modal" data-target="#exampleModal"><u>Buka Aksi</u></a>
            </td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Mark Hoover</td>
            <td>Bab II Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt iure qui minus maiores officiis quod velit nam sit</td>
            <td>12 April 2020</td>
            <td><span class="badge badge-success">Selesai</span></td>
            <td>
              <a data-toggle="modal" data-target="#exampleModal"><u>Buka Aksi</u></a>
            </td>
          </tr>
          <tr>
            <th scope="row">4</th>
            <td>Mark Hoover</td>
            <td>Bab III</td>
            <td>12 April 2020</td>
            <td><span class="badge badge-secondary">Dikirim</span></td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>


  </main>
  <!-- End Main Container -->


  <!-- Modal tambah sidang -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Tambah Bimbingan</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="#">
          <div class="modal-body">
            <input type="hidden" id="nama_mahasiswa" value="Fulan Bin Fulan">
            <input type="hidden" id="nim_mahasiswa" value="0123456789">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Untuk Dosen</label>
              <select class="form-control" id="exampleFormControlSelect1">
                <option>Mark Hoover</option>
                <option>Momo Delia</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">Pilih Dokumen</label>
              <input type="file" class="form-control" id="exampleFormControlFile1" style="padding:13px 16px">
            </div>
            <div class="form-group" style="margin-bottom:0;">
              <label for="ketbim">Keterangan</label>
              <textarea class="form-control" style="padding:12px" rows="5" id="ketbim" aria-describedby="keterangan" placeholder="Masukan keterangan... (cth. Bab II)" maxlength="320"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Aksi</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <b style="display:block;margin-bottom:6px">Pesan Singkat</b>
          Sudah bagus, lanjutkan
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-sm btn-primary">Unduh File Terbaru</a>
        </div>
      </div>
    </div>
  </div>