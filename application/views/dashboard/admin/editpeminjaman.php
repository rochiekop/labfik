  <!-- Main Container -->
  <main class="akun-container">
    <div class="fik-section-title2">
      <span class="fas fa-door-open zzzz"></span>
      <h5>Edit Peminjaman Tempat</h5>
    </div>
    <div class="row">
      <div class="col-md-4">
        <img src="<?= base_url('assets/img/6.jpg') ?>" alt="">
      </div>
      <div class="col-md-8">
        <div class="card">
          <form action="<?= base_url('admin/updatepeminjaman') ?>" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <div class="custom-form">
                <div class="form-group" style="margin-bottom:12px">
                  <input type="text" name="name" class="form-control" placeholder="" required="required" autocomplete="off" disabled />
                  <label>Nama Lengkap</label>
                </div>
                <div class="form-group">
                  <select class="form-control" id="kategori" name="kategori">
                    <option disabled>--Pilih Kategori--</option>
                    <?php foreach ($kategori as $row) : ?>
                      <option value="<?php echo $row['id']; ?>"><?= $row['kategori']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <select class="form-control" id="ruangan" name="ruangan">
                    <option disabled selected>Pilih Ruangan</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="date" name="date" class="form-control" id="date" placeholder="" required="required" autocomplete="off" />
                  <label>Tanggal Peminjaman</label>
                </div>
                <?php if ($booking['status'] == "Ditolak") : ?>
                  <div class="form-group" style="margin-bottom:12px">
                    <input type="text" name="jam" class="form-control" placeholder="" value="<?= $booking['time'] ?>" required="required" disabled autocomplete="off" />
                    <label>Waktu Peminjaman</label>
                  </div>
                <?php endif; ?>
                <div class="form-group">
                  <div class="form-control waktu">Waktu</div>
                </div>
                <div class="jadwal-ruangan" id="jadwal" name="jadwal">
                  <table border="0" class="table bookings" id="booking">
                    <tbody>
                      <tr class="displayedit" style="background: transparent;">
                      </tr>
                    </tbody>
                  </table>
                </div>
                <input type="hidden" name="id_booking" value="<?php echo $id_booking ?>" required>
                <div class="form-group" style="margin-bottom:0;">
                  <textarea name="keterangan" id="keterangan" class="form-control" placeholder="" required="required" autocomplete="off"></textarea>
                  <label>Keterangan</label>
                </div>
                <div class="lab-category" style="margin-top:16px">
                  <?php if ($status == "Diterima") : ?>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="status" id="diterima" value="<?= $status ?>" checked>
                      <label class="form-check-label" for="diterima">Diterima</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="status" id="ditolak" value="Ditolak">
                      <label class="form-check-label" for="ditolak">Ditolak</label>
                    </div>
                  <?php else : ?>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="status" id="diterima" value="Diterima">
                      <label class="form-check-label" for="diterima">Diterima</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="status" id="ditolak" value="<?= $status ?>" checked>
                      <label class="form-check-label" for="ditolak">Ditolak</label>
                    </div>
                  <?php endif; ?>
                </div>
                <input type="hidden" name="id_booking" value="<?= $id_booking ?>" required>
                <input type="hidden" name="user_id" value="<?= $booking['user_id'] ?>" required>
              </div>
            </div>
            <!-- <?php var_dump($booking) ?> -->
            <div class="card-footer">
              <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
  <!-- End Main Container -->

  <style>
    .jadwal-ruangan .table tr td.yellow a {
      background-color: #FB8C00;
      color: #fff;
      border: 0
    }
  </style>
  <script>
    $(document).ready(function() {
      get_data_edit();
      $('#kategori').change(function() {
        var id = $(this).val();
        var subcategory_id = "<?php echo $sub_category_id; ?>";
        // alert(subcategory_id);
        // alert(id)
        $.ajax({
          url: "<?php echo base_url('booking/getRuangan'); ?>",
          method: "POST",
          data: {
            id: id
          },
          async: true,
          dataType: 'json',
          success: function(data) {

            $('select[name="ruangan"]').empty();

            $.each(data, function(key, value) {
              if (subcategory_id == value.id) {
                $('select[name="ruangan"]').append('<option value="' + value.id + '" selected>' + value.ruangan + '</option>').trigger('change');
              } else {
                $('select[name="ruangan"]').append('<option value="' + value.id + '">' + value.ruangan + '</option>');
              }
            });

          }
        });
        return false;
      });

      function get_data_edit() {
        var id_booking = $('[name="id_booking"]').val();
        $.ajax({
          url: "<?php echo base_url('admin/geteditpeminjaman'); ?>",
          method: "POST",
          data: {
            id_booking: id_booking
          },
          async: true,
          dataType: 'json',
          success: function(data) {
            $.each(data, function(i, item) {
              $('[name="name"]').val(data[i].name);
              $('[name="kategori"]').val(data[i].id_kategori).trigger('change');
              $('[name="ruangan"]').val(data[i].id_ruangan).trigger('change');
              $('[name="date"]').val(data[i].date).trigger('change');
              $('[name="keterangan"]').val(data[i].keterangan);
            });
          }

        });
      }

      $('#ruangan,#date').change(function() {
        var date = $('#date').val();
        var id_ruangan = $('select[name=ruangan] option').filter(':selected').val();
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();
        currentDate = yyyy + '-' + mm + '-' + dd;
        if (date != '') {
          if (date >= currentDate) {
            // document.getElementById('createbookingbyadmin').disabled = false;
            $.ajax({
              url: '../../booking/fetchDate',
              type: "POST",
              data: {
                'date': date,
                'id_ruangan': id_ruangan,
              },
              dataType: 'json',
              success: function(data) {
                var arrTime = [
                  "06.30 - 07.30", "07.30 - 08.30", '08.30 - 09.30',
                  '09.30 - 10.30', '10.30 - 11.30', '11.30 - 12.30',
                  '12.30 - 13.30', '13.30 - 14.30', '14.30 - 15.30',
                  '15.30 - 16.30', '16.30 - 17.30', '17.30 - 18.30',
                  '18.30 - 19.30', '19.30 - 20.30', '20.30 - 21.30',
                  '21.30 - 22.30'
                ];
                if (!data.time) {
                  var html = '';
                  for (i in arrTime) {
                    html += '<td class="free" align="center" id="btnchange" valign="middle" width="13%" style="overflow:hidden"><div width="100%" style="overflow:hidden"><a class="time" id="btn"><input type="checkbox" name="time[]" value="' + arrTime[i] + '" class="time" id="time' + arrTime[i] + '">' + arrTime[i] + '</a></div></td>';
                    $("tbody .displayedit").html(html);
                  }
                } else {
                  var html = '';
                  for (i in data) {
                    var time = data[i];
                    var splitTime = time.split(", ");
                  }
                  for (i = 0; i < arrTime.length; i++) {
                    if (splitTime.includes(arrTime[i])) {
                      html += '<td class="free yellow" align="center" id="btnchange" valign="middle" width="13%" style="overflow:hidden"><div width="100%" style="overflow:hidden"><a class="time" id="btn"><input type="checkbox" name="time[]" value="' + arrTime[i] + '" class="time" id="time" checked="true">' + arrTime[i] + '</a></div></td>';
                      $("tbody .displayedit").html(html);
                    } else {
                      html += '<td class="free" align="center" id="btnchange" valign="middle" width="13%" style="overflow:hidden"><div width="100%" style="overflow:hidden"><a class="time" id="btn"><input type="checkbox" name="time[]" value="' + arrTime[i] + '" class="time" id="time">' + arrTime[i] + '</a></div></td>';
                      $("tbody .displayedit").html(html);
                    }
                  }
                }
              }
            });
            $("#jadwal").slideDown();
          } else {
            // document.getElementById('createbookingbyadmin').disabled = true;
            $.ajax({
              url: '../../booking/fetchDate',
              type: "POST",
              data: {
                'date': date,
                'id_ruangan': id_ruangan,
              },
              dataType: 'json',
              success: function(data) {
                var arrTime = [
                  "06.30 - 07.30", "07.30 - 08.30", '08.30 - 09.30',
                  '09.30 - 10.30', '10.30 - 11.30', '11.30 - 12.30',
                  '12.30 - 13.30', '13.30 - 14.30', '14.30 - 15.30',
                  '15.30 - 16.30', '16.30 - 17.30', '17.30 - 18.30',
                  '18.30 - 19.30', '19.30 - 20.30', '20.30 - 21.30',
                  '21.30 - 22.30'
                ];
                if (!data.time) {
                  var html = '';
                  for (i in arrTime) {
                    html += '<td class="free empty" align="center" id="btnchange" valign="middle" width="13%" style="overflow:hidden"><div width="100%" style="overflow:hidden"><a class="time" id="btn">' + arrTime[i] + '</a></div></td>';
                    $("tbody .displayedit").html(html);
                  }
                } else {
                  var html = '';
                  for (i in data) {
                    var time = data[i];
                    var splitTime = time.split(", ");
                  }
                  for (i = 0; i < arrTime.length; i++) {
                    if (splitTime.includes(arrTime[i])) {
                      html += '<td class="free red" align="center" id="btnchange" valign="middle" width="13%" style="overflow:hidden"><div width="100%" style="overflow:hidden"><a class="time" id="btn">' + arrTime[i] + '</a></div></td>';
                      $("tbody .displayedit").html(html);
                    } else {
                      html += '<td class="free empty" align="center" id="btnchange" valign="middle" width="13%" style="overflow:hidden"><div width="100%" style="overflow:hidden"><a class="time" id="btn">' + arrTime[i] + ' disabled</a></div></td>';
                      $("tbody .displayedit").html(html);
                    }
                  }
                }
              }

            });
          }
          $("#jadwal").slideDown();
        } else {
          // 
        }
      });


    });
  </script>