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
            <th scope="col" style="width:160px">Buat Jadwal</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($preview2)) : ?>
            <td colspan="3" style="background-color: whitesmoke;text-align:center">List Preview Kosong</td>
          <?php else : ?>
            <?php $no = 1;
            foreach ($preview2 as $t) { ?>
              <tr>
                <th scope="row">#<?= $no ?> <br> <?= $t['date'] ?></th>
                <td>
                  <?= $t['name'] ?> <br>
                  <?= $t['nim'] ?> <br>
                  <?= $t['prodi'] ?> / <?= $t['peminatan'] ?> <br>
                  <?= $t['tahun'] ?> <br>
                  No. HP : <?= $t['no_telp'] ?> <br>
                  Dosen Wali : <?= $t['dosen_wali'] ?>
                </td>
                <td>
                  <?= $t['dosbing1'] ?> <br>
                  <?= $t['dosbing2'] ?> <br>
                  <?= $t['dospeng1'] ?> <br>
                  <?= $t['dospeng2'] ?>
                </td>
                <?php if ($t['status'] == 'preview 2') : ?>
                  <td>
                    <a data-toggle="modal" data-target="#offline<?= $t['id'] ?>" class="badge badge-primary" style="color:#fff;margin-top:6px">offline</a>
                    <a data-toggle="modal" data-target="#online<?= $t['id'] ?>" class="badge badge-primary" style="color:#fff;margin-top:6px">online</a>
                  </td>
                <?php elseif ($t['id_offline'] != '') : ?>
                  <td>
                    <a data-toggle="modal" data-target="#declinedmodal<?= encrypt_url($t['id']); ?>" class="badge badge-primary" style="color:#fff;margin-top:6px">Edit Jadwal</a>
                  </td>
                <?php endif; ?>
              </tr>
            <?php $no++;
            } ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

  </main>
  <!-- End Main Container -->

  <?php foreach ($preview2 as $m) : ?>
    <div class="modal fade bd-example-modal-sm" id="declinedmodal<?= encrypt_url($m['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-body">
            Batalkan Jadwal Sidang?
          </div>
          <form action="batal" method="post" enctype="multipart/form-data">
            <div class="modal-footer">
              <input type="hidden" id="id" name="id_offline" value="<?= $m['id_offline']; ?>">
              <input type="hidden" id="id" name="id_guidance" value="<?= $m['id_guidance']; ?>">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
              <button type="submit" name="declinedpeminjaman" class="btn btn-danger btn-sm">Edit</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="online<?= $m['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel">Jadwal online <?= $m['name'] ?></h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="<?= base_url('Koordinator_ta/placeonlinesidang') ?>">
            <div class="modal-body">
              <div class="alert alert-warning">
                Tentukan jadwal sidang
              </div>
              <label>Tempat</label>
              <div class="form-group">
                <input type="text" name="ruangan" value="" class="form-control" id="cek" placeholder="Contoh: zoom.com/lorem" required>
              </div>
              <div class="form-group">
                <input type="date" name="tanggal" id="tanggalonline" onchange="Bookingmodalsonline()" class="form-control" placeholder="" required="required" autocomplete="off" />
              </div>
              <div class="form-group" style="margin-bottom:0">
                <div class="form-control waktu">Waktu</div>
              </div><br>
              <div class="jadwal-ruangan" id="jadwalonline">
                <table border="0" class="table bookings" id="booking">
                  <tbody>
                    <tr class="displayonline" style="background:transparent">
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <input type="hidden" name="id_mhs" class="form-control" placeholder="" value="<?= $m['id_mhs'] ?>" required="required" autocomplete="off" />
            <input type="hidden" name="id_guidance" class="form-control" placeholder="" value="<?= $m['id_guidance'] ?>" required="required" autocomplete="off" />
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batalkan</button>
              <button type="submit" class="btn btn-sm btn-primary" id="createbookingmodals">Simpan & Setujui</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="offline<?= $m['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel">Jadwal Offline <?= $m['name'] ?></h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="<?= base_url('Koordinator_ta/bookingPlaceoffline') ?>">
            <div class="modal-body">
              <div class="alert alert-warning">
                Tentukan jadwal sidang
              </div>
              <label>Tempat</label>
              <!-- <div class="form-group">
                <select class="form-control" onchange="myFunction(this.value)">
                  <option value="">Pilih Kondisi</option>
                  <option value="offline">offline</option>
                  <option value="online">online</option>
                </select>text" name="ruangan" class="form-control" id="cek" placeholder="Contoh: zoom.com/lorem" disabled>
              </div> -->
              <div class="form-group">
                <select class="form-control" name="id_kategori" id="kategoriruangandsn" required>
                  <option selected>Kategori Ruangan</option>
                  <?php foreach ($kruangan as $k) { ?>
                    <option value="<?= $k['id'] ?>">
                      <?= $k['kategori'] ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" name="id_ruangan" id="ruangan" onchange="disablemodals()" disabled required>
                  <option disabled selected>Pilih Ruangan</option>
                </select>
              </div>
              <div class="form-group">
                <input type="date" name="tanggal" id="tanggal" onchange="Bookingmodals()" class="form-control" placeholder="" disabled required="required" autocomplete="off" />
              </div>
              <div class="form-group" style="margin-bottom:0">
                <div class="form-control waktu">Waktu</div>
              </div><br>
              <div class="jadwal-ruangan" id="jadwal">
                <table border="0" class="table bookings" id="booking">
                  <tbody>
                    <tr class="display" style="background:transparent">
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <input type="hidden" name="id_peminjam" class="form-control" placeholder="" value="<?= $m['id_mhs'] ?>" required="required" autocomplete="off" />
            <input type="hidden" name="id_guidance" class="form-control" placeholder="" value="<?= $m['id_guidance'] ?>" required="required" autocomplete="off" />
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batalkan</button>
              <button type="submit" class="btn btn-sm btn-primary" id="createbookingmodals">Simpan & Setujui</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

  <script>
    $(document).ready(function() {
      $('#kategoriruangandsn').change(function() {
        document.getElementById("ruangan").disabled = false;
        var id_kategori = $('#kategoriruangandsn').val();

        if (id_kategori != '') {
          $.ajax({
            url: "<?= base_url(); ?>booking/fetchRuanganDsn",
            method: "POST",
            data: {
              id_kategori: id_kategori
            },
            success: function(data) {
              $('#ruangan').html(data);
            }
          })
        }
      });
    });
  </script>