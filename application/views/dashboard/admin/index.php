<!-- Main Container -->
<main class="akun-container">
  <div class="row akun-overview">
    <div class="col-md-4">
      <div class="overview-one alert-warning">
        <b>Tempat</b>
        <ul>
          <li><a>Jumlah Tempat : <b>80</b></a></li>
          <li><a>Akses Dosen : <b>80</b></a></li>
          <li><a>Akses Mahasiswa : <b>20</b></a></li>
        </ul>
      </div>
    </div>
    <div class="col-md-4">
      <div class="overview-two alert-info">
        <b>Barang</b>
        <ul>
          <li><a>Jumlah Barang : <b>60</b></a></li>
          <li><a>Barang Tersedia : <b>30</b></a></li>
          <li><a>Barang Sedang Dipinjam : <b>30</b></a></li>
        </ul>
      </div>
    </div>
    <div class="col-md-4">
      <div class="overview-three alert-success">
        <b>Galeri Karya</b>
        <ul>
          <li><a>Jumlah Karya : <b>180</b></a></li>
          <li><a>Karya Ditampilkan : <b>160</b></a></li>
        </ul>
      </div>
    </div>
  </div>
  <br>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="tabtempat" data-toggle="tab" href="#tempat" role="tab" aria-controls="home" aria-selected="true">Tempat</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="tabbarang" data-toggle="tab" href="#barang" role="tab" aria-controls="profile" aria-selected="false">Barang</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="tabkarya" data-toggle="tab" href="#karya" role="tab" aria-controls="contact" aria-selected="false">Karya</a>
    </li>
  </ul>
  <br>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="tempat" role="tabpanel" aria-labelledby="tabtempat">
      <div class="alert alert-warning" role="alert">
        Menampilkan <b>10</b> dari <b>80</b> tempat. <a href="#"><u>Tampilkan Semua</u></a>
      </div>
      <div class="table-responsive admin-list">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" style="width:48px">No</th>
              <th scope="col" style="width:90px">&nbsp;</th>
              <th scope="col">Ruangan</th>
              <th scope="col">Kategori</th>
              <th scope="col">Akses</th>
              <th scope="col" class="action">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="row" style="width:60px">1</td>
              <td style="width:90px">
                <div class="img-wrapper">
                  <img src="_assets/img/6.jpg" alt="">
                </div>
              </td>
              <td>IK.04.04</td>
              <td>Lab Cintiq</td>
              <td>Dosen, Mahasiswa</td>
              <td class="action">
                <a data-toggle="modal" data-target=".bd-example-modal-sm"><span class="fas fa-trash"></span></a>
                <a href="akun-admin-tempat-edit.html"><span class="fas fa-edit"></span></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="tab-pane fade" id="barang" role="tabpanel" aria-labelledby="tabbarang">
      <div class="alert alert-warning" role="alert">
        Menampilkan <b>10</b> dari <b>60</b> barang. <a href="#"><u>Tampilkan Semua</u></a>
      </div>
      <div class="table-responsive admin-list">
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
      </div>
    </div>
    <div class="tab-pane fade" id="karya" role="tabpanel" aria-labelledby="tabkarya">
      <div class="alert alert-warning" role="alert">
        Menampilkan <b>10</b> dari <b>180</b> tempat. <a href="#"><u>Tampilkan Semua</u></a>
      </div>
      <div class="table-responsive admin-list">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" style="width:48px">No</th>
              <th scope="col" style="width:90px">&nbsp;</th>
              <th scope="col">Judul</th>
              <th scope="col">Nama</th>
              <th scope="col">Prodi</th>
              <th scope="col" class="action">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="row" style="width:60px">1</td>
              <td style="width:90px">
                <div class="img-wrapper">
                  <img src="_assets/img/6.jpg" alt="">
                </div>
              </td>
              <td>Lorem Ipsum</td>
              <td>Fulan</td>
              <td>DKV</td>
              <td class="action">
                <a data-toggle="modal" data-target=".bd-example-modal-sm"><span class="fas fa-trash"></span></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
<!-- End Main Container -->