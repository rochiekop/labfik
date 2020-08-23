<!-- Main Container -->
<main class="akun-container">
  <div class="row akun-overview">
    <div class="col-md-4">
      <div class="overview-one alert-warning">
        <b>Tempat</b>
        <ul>
          <li><a>Jumlah Tempat : <b><?= $alltempat ?></b></a></li>
          <li><a>Akses Dosen : <b><?= $aksesdosen ?></b></a></li>
          <li><a>Akses Mahasiswa : <b><?= $aksesmhs ?></b></a></li>
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
          <li><a>Jumlah Karya : <b><?= $total_asset ?></b></a></li>
          <li><a>Karya Ditampilkan : <b><?= $total_acc ?></b></a></li>
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
        Menampilkan <b><?= count($dtempat) ?></b> dari <b><?= $alltempat ?></b> tempat. <a href="<?= base_url('admin/daftartempat') ?>"><u>Tampilkan Semua</u></a>
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
              <th scope="col">Kapasitas</th>
              <th scope="col" class="action">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($dtempat)) : ?>
              <td colspan="6" style="background-color: whitesmoke;text-align:center">List Tempat kosong</td>
            <?php else : ?>
              <?php $no = 0;
              foreach ($dtempat as $t) : ?>
                <tr>
                  <td scope="row" style="width:60px"><?= ++$no ?></td>
                  <td style="width:90px">
                    <div class="img-wrapper">
                      <img src="<?= base_url('assets/img/ruangan/') . $t['images']; ?>" alt="">
                    </div>
                  </td>
                  <td><?= $t['ruangan'] ?></td>
                  <td><?= $t['kategori'] ?></td>
                  <td><?= $t['akses'] ?></td>
                  <td><?= $t['kapasitas'] ?></td>
                  <td class="action">
                    <a data-toggle="modal" data-target="#<?= encrypt_url($t['id']) ?>"><span class="fas fa-trash"></span></a>
                    <a href="<?= base_url('admin/edittempat/') . encrypt_url($t['id']) ?>?>"><span class="fas fa-edit"></span></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
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
        Menampilkan <b>10</b> dari <b><?= $total_asset ?></b> tempat. <a href="<?= base_url('Admin_karya'); ?>"><u>Tampilkan Semua</u></a>
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
            <?php if (empty($tampilan)) : ?>
              <td colspan="8" style="background-color: whitesmoke;text-align:center">List Karya Kosong</td>
            <?php else : ?>
              <?php $no = 1;
              foreach ($tampilan as $data) { ?>
                <tr>
                  <td scope="row" style="width:60px"><?= $no ?></td>
                  <td style="width:90px">
                    <a class="img-wrapper" type="button" data-toggle="modal" data-target="#exampleModal<?= $data->id_tampilan ?>">
                      <?php if ($data->type == 'Foto') : ?>
                        <img src="<?= base_url('assets/upload/images/' . $data->gambar) ?>">
                      <?php elseif ($data->type == 'Video') : ?>
                        <video src="<?= base_url('assets/upload/images/' . $data->gambar) ?>" width="80"></video>
                      <?php else : ?>
                        <span class="fas fa-file-pdf fa-4x"></span>
                      <?php endif; ?>
                    </a>
                  </td>
                  <td><?= $data->judul ?></td>
                  <td><?= $data->nama ?></td>
                  <td><?= $data->nama_kategori ?></td>
                  <td class="action">
                    <a data-toggle="modal" data-target="#delete-<?php echo $data->id_tampilan ?>"><span class="fas fa-trash"></span></a>
                  </td>
                </tr>
              <?php $no++;
              } ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
<!-- End Main Container -->

<!-- Modal Delete -->
<?php foreach ($dtempat as $t) : ?>
  <div class="modal fade bd-example-modal-sm" id="<?= encrypt_url($t['id']) ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          Hapus Ruangan <?= $t['ruangan']; ?> ?
        </div>
        <form action="deleteruangan" method="post" enctype="multipart/form-data">
          <div class="modal-footer">
            <input type="hidden" id="id" name="id" value="<?= $t['id']; ?>">
            <input type="hidden" id="image" name="image" value="<?= $t['images']; ?>">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" name="deletedata" class="btn btn-danger btn-sm">Hapus</button>
          </div>
        </form>
<?php foreach ($tampilan as $data) : ?>
  <div class="modal fade" id="delete-<?php echo $data->id_tampilan ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="callout callout-warning">
            <h4>Peringatan!</h4>
            <br>
            Data yang terhapus tidak dapat dikembalikan. Yakin ingin menghapus?
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
          <a href="<?= base_url('admin_karya/delete') . $data->id_tampilan ?>" type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i>Ya, Hapus</a>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModal<?= $data->id_tampilan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Judul <?= $data->judul ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php if ($data->type == 'Foto') : ?>
            <img src="<?= base_url('assets/upload/images/' . $data->gambar) ?>" style="margin:auto!important;background-color:#000;width:100%;max-height:624px;">
          <?php elseif ($data->type == 'Video') : ?>
            <video controls style="margin:auto!important;background-color:#000;width:100%;max-height:624px;">
              <source src="<?= base_url('assets/upload/images/' . $data->gambar) ?>" type="video/mp4">
            </video>
          <?php else : ?>
            <embed src="<?= base_url('assets/upload/images/' . $data->gambar) ?>" type="application/pdf" width="100%" height="600px" />
          <?php endif; ?>
          <div class="item-text">
            <span>Di Buat Oleh: <b><?= $data->nama ?></b></span>
          </div>
          <div class="item-text">
            <span>Di Posting Oleh: <b><?= $data->role ?>, <?= $data->name ?></b></span>
          </div>
          <div class="item-text">
            <span>Deskripsi: <b><?= $data->deskripsi ?></b></span>
          </div>
          <div class="item-text">
            <span>No. Handphone: <b><?= $data->No_hp ?></b></span>
          </div>
          <div class="item-text">
            <span>No. Whatsapp: <b><?= $data->No_wa ?></b></span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>