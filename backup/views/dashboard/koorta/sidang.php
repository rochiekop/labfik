  <!-- Main Container -->
  <main class="akun-container">

    <div class="fik-section-title2">
      <h4>Pengajuan Sidang</h4>
    </div>
    <form action="#$">
      <div class="input-group">
        <div class="input-group-prepend">
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Urutkan</button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Nama A-Z</a>
            <a class="dropdown-item" href="#">Terbaru</a>
            <a class="dropdown-item" href="#">Belum Ada Jadwal</a>
            <a class="dropdown-item" href="#">Edit Jadwal</a>
          </div>
        </div>
        <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Cari nama mahasiswa/NIM/Dosen Wali">
      </div>
    </form>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col" style="width:120px"># Tgl.</th>
            <th scope="col">Nama</th>
            <th scope="col">Dosen</th>
            <th scope="col" style="width:160px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">#1 <br> 10/02/2020</th>
            <td>
              Near Sakarin <br>
              1601235629 <br>
              Desain Komunikasi Visual / Advertising <br>
              2020 <br>
              No. HP : 09124612783 <br>
              Dosen Wali : Fulan, S.Pd.
            </td>
            <td>
              Nama Dosen Pembimbing 1 <br>
              Nama Dosen Pembimbing 2 <br>
              Nama Dosen Penguji 1 <br>
              Nama Dosen Penguji 2
            </td>
            <td>
              <a data-toggle="modal" data-target="#exampleModal4" class="badge badge-primary" style="color:#fff">Buat Jadwal</a>
            </td>
          </tr>
          <tr>
            <th scope="row">#1 <br> 10/02/2020</th>
            <td>
              Near Sakarin <br>
              1601235629 <br>
              Desain Komunikasi Visual / Advertising <br>
              2020 <br>
              No. HP : 09124612783 <br>
              Dosen Wali : Fulan, S.Pd.
            </td>
            <td>
              Nama Dosen Pembimbing 1 <br>
              Nama Dosen Pembimbing 2 <br>
              Nama Dosen Penguji 1 <br>
              Nama Dosen Penguji 2
            </td>
            <td>
              <a data-toggle="modal" data-target="#exampleModal4" class="badge badge-secondary" style="color:#fff">Edit Jadwal</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>


  </main>
  <!-- End Main Container -->

  <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Buat Aksi</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="#">
          <div class="modal-body">
            <div class="alert alert-warning">
              Tentukan jadwal sidang akhir
            </div>
            <div class="form-group">
              <label>Tanggal</label>
              <input type="date" name="" class="form-control" placeholder="" required="required" autocomplete="off" />
            </div>
            <div class="form-group">
              <label>Waktu</label>
              <input type="time" name="" class="form-control" placeholder="" required="required" autocomplete="off" />
            </div>
            <div class="form-group" style="margin-bottom:0">
              <label>Tempat / Link Presentasi</label>
              <input type="text" class="form-control" placeholder="Contoh: IK.04.04 / zoom.com/lorem">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batalkan</button>
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>