  <!-- Main Container -->
  <main class="akun-container">

    <div class="fik-section-title2">
      <h4>Penguji</h4>
    </div>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="satu-tab" data-toggle="tab" href="#satu" role="tab" aria-selected="true">Preview 2</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="dua-tab" data-toggle="tab" href="#dua" role="tab" aria-selected="false">Sidang Akhir</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent" style="padding-top:20px;">

      <div class="tab-pane fade show active" id="satu" role="tabpanel" aria-labelledby="satu-tab">
        <div class="alert alert-warning">
          Pelaksanaan Audiensi Preview 2
        </div>
        <form action="#$">
          <div class="input-group">
            <div class="input-group-prepend">
              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tampilkan</button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Selesai</a>
                <a class="dropdown-item" href="#">Belum Selesai</a>
                <a class="dropdown-item" href="#">Semua</a>
              </div>
            </div>
            <div class="input-group-prepend">
              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-left:1px solid rgba(0,0,0,.1);">Urutkan</button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Nama A-Z</a>
                <a class="dropdown-item" href="#">Belum Dinilai</a>
              </div>
            </div>
            <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Cari nama mahasiswa/NIM">
          </div>
        </form>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Dosen Pembimbing</th>
                <th scope="col">Dosen Penguji</th>
                <th scope="col">Tgl. Sidang</th>
                <th scope="col">Aksi</th>
                <th scope="col">Nilai</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>
                  Near Sakarin <br>
                  0123456789 <br>
                  Desain Komunikasi Visual / Advertising
                </td>
                <td>
                  Mark Hoover <br>
                  Momo Delia
                </td>
                <td>
                  <b>David Hans</b> <br>
                  Momoka
                </td>
                <td>Selasa, 12 April 2020 <br> 13:30</td>
                <td><a href="#" class="badge badge-info">Zoom</a></td>
                <td><a href="#" class="badge badge-secondary">Berikan Nilai</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="tab-pane fade" id="dua" role="tabpanel" aria-labelledby="dua-tab">
        <div class="alert alert-warning">
          Pelaksanaan Sidang Akhir
        </div>
        <form action="#$">
          <div class="input-group">
            <div class="input-group-prepend">
              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tampilkan</button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Selesai</a>
                <a class="dropdown-item" href="#">Belum Selesai</a>
                <a class="dropdown-item" href="#">Semua</a>
              </div>
            </div>
            <div class="input-group-prepend">
              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-left:1px solid rgba(0,0,0,.1);">Urutkan</button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Nama A-Z</a>
                <a class="dropdown-item" href="#">Belum Dinilai</a>
              </div>
            </div>
            <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Cari nama mahasiswa/NIM">
          </div>
        </form>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Dosen Pembimbing</th>
                <th scope="col">Dosen Penguji</th>
                <th scope="col">Tgl. Sidang</th>
                <th scope="col">Aksi</th>
                <th scope="col">Nilai</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>
                  Near Sakarin <br>
                  0123456789 <br>
                  Desain Komunikasi Visual / Advertising
                </td>
                <td>
                  Mark Hoover <br>
                  Momo Delia
                </td>
                <td>
                  <b>David Hans</b> <br>
                  Momoka
                </td>
                <td>Selasa, 12 April 2020 <br> 13:30</td>
                <td><a href="#" class="badge badge-info">Zoom</a></td>
                <td><a href="#" class="badge badge-secondary">Berikan Nilai</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </div>

  </main>
  <!-- End Main Container -->

  <!-- Modal Bimbingan - Dosen -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Upload Feedback untuk Mahasiswa</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="#">
          <div class="modal-body">
            <input type="hidden" id="nama_mahasiswa" value="Fulan Bin Fulan">
            <input type="hidden" id="nim_mahasiswa" value="0123456789">
            <div class="form-group">
              <label for="exampleFormControlFile1">Pilih Dokumen</label>
              <input type="file" class="form-control" id="exampleFormControlFile1" style="padding:13px 16px">
            </div>
            <div class="form-group" style="margin-bottom:0;">
              <label for="ketbim">Pesan Singkat</label>
              <textarea class="form-control" style="padding:12px" rows="5" id="ketbim" aria-describedby="keterangan" placeholder="Pesan ..." maxlength="160"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batalkan</button>
            <button type="submit" class="btn btn-sm btn-primary">Kirim</button>
          </div>
        </form>
      </div>
    </div>
  </div>