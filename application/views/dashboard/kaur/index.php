  <!-- Main Container -->
  <main class="akun-container">
    <div class="alert alert-info" role="alert">
      Kamu masuk sebagai Kepala Urusan! Ada <b>3 permintaan peminjaman tempat</b>, <b>4 permintaan peminjaman barang</b> dan <b>8 permintaan upload karya</b>
    </div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="tabtempat" data-toggle="tab" href="#tempat" role="tab" aria-controls="home" aria-selected="true">Tempat (3)</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="tabbarang" data-toggle="tab" href="#barang" role="tab" aria-controls="profile" aria-selected="false">Barang (4)</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="tabkarya" data-toggle="tab" href="#karya" role="tab" aria-controls="contact" aria-selected="false">Karya (8)</a>
      </li>
    </ul>
    <br>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="tempat" role="tabpanel" aria-labelledby="tabtempat">
        <div class="table-responsive admin-list">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col" style="width:20%;">Nama</th>
                <th scope="col">Ruangan</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Waktu</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Status</th>
                <th scope="col" style="width:130px;text-align:center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Dosen. Mark</td>
                <td>Lab Cintiq - IK.03.04</td>
                <td>10 April 2020</td>
                <td>13:30 - 14:30</td>
                <td>Kelas Pengganti</td>
                <td>Menunggu Acc</td>
                <td class="action" style="width:110px;text-align:center;">
                  <a href="#" class="btn badge badge-success">Acc</a>
                  <a href="#" class="btn badge badge-danger">Tolak</a>
                </td>
              </tr>
              <tr>
                <th scope="row">1</th>
                <td>Dosen. Mark</td>
                <td>Lab Cintiq - IK.03.04</td>
                <td>10 April 2020</td>
                <td>13:30 - 14:30</td>
                <td>Kelas Pengganti</td>
                <td>Menunggu Acc</td>
                <td class="action" style="width:110px;text-align:center;">
                  <a href="#" class="btn badge badge-success">Acc</a>
                  <a href="#" class="btn badge badge-danger">Tolak</a>
                </td>
              </tr>
              <tr>
                <th scope="row">1</th>
                <td>Dosen. Mark</td>
                <td>Lab Cintiq - IK.03.04</td>
                <td>10 April 2020</td>
                <td>13:30 - 14:30</td>
                <td>Kelas Pengganti</td>
                <td>Menunggu Acc</td>
                <td class="action" style="width:110px;text-align:center;">
                  <a href="#" class="btn badge badge-success">Acc</a>
                  <a href="#" class="btn badge badge-danger">Tolak</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="tab-pane fade" id="barang" role="tabpanel" aria-labelledby="tabbarang">
        <div class="table-responsive admin-list">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col" style="width:18%;">Nama</th>
                <th scope="col">Barang</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Durasi</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Status</th>
                <th scope="col" style="width:130px;text-align:center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Dosen. Mark</td>
                <td>Canon EOS 5D</td>
                <td>1</td>
                <td>20 April 2020</td>
                <td>2 Hari</td>
                <td>Keperluan event gemastik</td>
                <td>Menunggu Acc</td>
                <td class="action" style="width:110px;text-align:center;">
                  <a href="#" class="btn badge badge-success">Acc</a>
                  <a href="#" class="btn badge badge-danger">Tolak</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="tab-pane fade" id="karya" role="tabpanel" aria-labelledby="tabkarya">
        <div class="table-responsive admin-list">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col"></th>
                <th scope="col">Judul</th>
                <th scope="col">Nama</th>
                <th scope="col">Prodi</th>
                <th scope="col" style="width:110px;text-align:center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row" style="width:60px">1</td>
                <td style="width:90px">
                  <div class="img-wrapper">
                    <a href="_assets/img/2.jpg" data-toggle="lightbox">
                      <img src="_assets/img/2.jpg" alt="">
                    </a>
                  </div>
                </td>
                <td>Lorem Ipsum</td>
                <td>Fulan</td>
                <td>DKV</td>
                <td class="action" style="width:130px;text-align:center;">
                  <a href="#" class="btn badge badge-success">Acc</a>
                  <a href="#" class="btn badge badge-danger">Tolak</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
  <!-- End Main Container -->