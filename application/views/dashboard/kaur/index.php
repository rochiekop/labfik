  <!-- Main Container -->
  <main class="akun-container">
    <div class="alert alert-info" role="alert">
      Kamu masuk sebagai Kepala Urusan! Ada <b><?= empty($listbooking) ? 0 : count($listbooking); ?> permintaan peminjaman tempat</b>, <b>4 permintaan peminjaman barang</b> dan <b><?= $hitung ?> permintaan upload karya</b>
    </div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="tabtempat" data-toggle="tab" href="#tempat" role="tab" aria-controls="home" aria-selected="true">Tempat (<?= empty($listbooking) ? 0 : count($listbooking); ?>)</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="tabbarang" data-toggle="tab" href="#barang" role="tab" aria-controls="profile" aria-selected="false">Barang (4)</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="tabkarya" data-toggle="tab" href="#karya" role="tab" aria-controls="contact" aria-selected="false">Karya (<?= $hitung ?>)</a>
      </li>
    </ul>
    <br>
    <div class="tab-content" id="myTabContent">
      <?= $this->session->flashdata('message'); ?>
      <div class="tab-pane fade show active" id="tempat" role="tabpanel" aria-labelledby="tabtempat">
        <div class="table-responsive admin-list">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col" style="width:20%;">Nama</th>
                <th scope="col">Ruangan</th>
                <th scope="col">Tanggal</th>
                <th scope="col">
                  <center>Waktu <center>
                </th>
                <th scope="col">Keterangan</th>
                <th scope="col" style="width:130px;text-align:center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($listbooking)) : ?>
                <td colspan="8" style="background-color: whitesmoke;text-align:center">List Peminjaman Tempat kosong</td>
              <?php else : ?>
                <?php $no = 0;
                foreach ($listbooking as $l) : ?>
                  <tr>
                    <th scope="row"><?= ++$no ?></th>
                    <td><?= $l['role'] . ', ' . $l['name'] ?></td>
                    <td><?= $l['kategori'] . ' - ' . $l['ruangan'] ?></td>
                    <td><?= format_indo($l['date'], date('d-m-Y')); ?></td>
                    <td>
                      <center>
                        <?php
                        $time = explode(',', $l['time']);
                        foreach ($time as $t) {
                          echo "$t <br>";
                        }
                        ?>
                      </center>
                    </td>
                    <td><?= $l['keterangan'] ?></td>
                    <td class="action" style="width:110px;text-align:center;">
                      <a href="<?= base_url('kaur/acceptedindex/') . encrypt_url($l['id']); ?>" class="btn badge badge-success">Acc</a>
                      <a data-toggle="modal" data-target="#declinedmodal<?= encrypt_url($l['id']); ?>" class="btn badge badge-danger" style="color: white;">Tolak</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
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
              <?php if (empty($tampilan)) : ?>
                <td colspan="6" style="background-color: whitesmoke;text-align:center">List Permintaan Kosong</td>
              <?php else : ?>
                <?php $no = 0;
                foreach ($tampilan as $l) : ?>
                  <tr>
                    <td scope="row" style="width:60px"><?= ++$no ?></td>
                    <td style="width:90px">
                      <a class="img-wrapper" type="button" data-toggle="modal" data-target="#exampleModal<?= $l->id_tampilan ?>">
                        <?php if ($l->type == 'Foto') : ?>
                          <img src="<?= base_url('assets/upload/images/' . $l->gambar) ?>">
                        <?php elseif ($l->type == 'Video') : ?>
                          <video src="<?= base_url('assets/upload/images/' . $l->gambar) ?>" width="80"></video>
                        <?php else : ?>
                          <span class="fas fa-file-pdf fa-4x"></span>
                        <?php endif; ?>
                      </a>
                    </td>
                    <td><?= $l->judul ?></td>
                    <td><?= $l->nama ?></td>
                    <td><?= $l->nama_kategori ?></td>
                    <?php if ($l->status == 'Menunggu Acc') : ?>
                      <td class="action" style="width:130px;text-align:center;">
                        <a href="<?= base_url('kaur_karya/accepted/') . $l->id_tampilan; ?>" class="btn badge badge-success">Acc</a>
                        <a data-toggle="modal" data-target="#declinedmodal<?= $l->id; ?>" class="btn badge badge-danger" style="color: white;">Tolak</a>
                      </td>
                    <?php else : ?>
                      <td></td>
                    <?php endif; ?>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
  <!-- End Main Container -->
  <?php foreach ($tampilan as $data) : ?>
    <div class="modal fade bd-example-modal-sm" id="declinedmodal<?= $data->id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-body">
            Tolak permintaan posting ?
          </div>
          <form action="<?= base_url('kaur_karya/Declined/') . $data->id_tampilan; ?>" method="post" enctype="multipart/form-data">
            <div class="modal-footer">
              <input type="hidden" id="id" name="id" value="<?= $data->id; ?>">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
              <button type="submit" name="declinedpeminjaman" class="btn btn-danger btn-sm">Tolak</button>
            </div>
          </form>
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
              <span>Di Posting Oleh: <b><?= $data->name ?></b></span>
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

  <?php foreach ($listbooking as $t) : ?>
    <div class="modal fade bd-example-modal-sm" id="declinedmodal<?= encrypt_url($t['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-body">
            Tolak Peminjaman Tempat ?
          </div>
          <form action="<?= base_url('kaur/changedeclinedindex') ?>" method="post" enctype="multipart/form-data">
            <div class="modal-footer">
              <input type="hidden" id="id" name="id" value="<?= $t['id']; ?>">
              <input type="hidden" id="date" name="date" value="<?= $t['date']; ?>">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
              <button type="submit" name="declinedpeminjaman" class="btn btn-danger btn-sm">Tolak</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>