  <!-- Main Container -->
  <main class="akun-container">
    <div class="fik-section-title2">
      <span class="fas fa-door-open zzzz"></span>
      <h5>Pinjam Tempat</h5>
    </div>
    <div class="row">
      <div class="col-md-4">
        <img src="<?= base_url('assets/img/ruangan/') . $tempatbyid['images'] ?>" alt="$tempatbyid['title']">
      </div>
      <div class="col-md-8">
        <div class="card">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <div class="custom-form">
                <div class="form-group" style="margin-bottom:12px">
                  <input type="text" name="name" class="form-control" placeholder="" value="<?= $this->session->userdata('name') ?>" required="required" autocomplete="off" />
                  <label></label>
                </div>
                <div class="lab-category" style="margin-bottom:16px;">
                  <div class="form-check">
                    <?php $no = 0;
                    foreach ($kruangan as $k) : ?>
                      <?php if ($k['id'] == $tempatbyid['id_kategori']) : ?>
                        <input class="form-check-input" type="radio" name="kategori" id="inlineRadio1" value="<?= $k['kategori'] ?>" checked>
                        <label class="form-check-label" for=<?= "inlineRadio" . $k['id'] ?>><?= $k['kategori'] ?></label>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </div>
                </div>
                <div class="form-group" id="tanggalform">
                  <input type="text" name="ruangan" class="form-control" placeholder="" value="<?= $tempatbyid['ruangan'] ?>" required="required" autocomplete="off" disabled />
                  <label></label>
                </div>
                <div class="form-group">
                  <input type="date" name="date" id="date" class="form-control" id="date" placeholder="" required="required" autocomplete="off" />
                  <label>Tanggal Peminjaman</label>
                </div>
                <div class="form-group">
                  <div class="form-control waktu" id="waktu" name="waktu">Waktu</div>
                </div>
                <div class="jadwal-ruangan">
                  <table border="0" class="table bookings" id="booking">
                    <tbody>
                      <tr>

                      </tr>
                      <!-- <td class="free red" align="center" id="btnchange" valign="middle" width="13%" style="overflow:hidden">
                          <div width="100%" style="overflow:hidden">
                            <a><img src="https://demo.classroombookings.com/assets/images/ui/accept.png" width="16" height="16" alt="Book" title="Book" hspace="4" align="absmiddle">06:30 - 07:30</a>
                          </div>
                        </td>
                        <td class="free red" align="center" id="btnchange" valign="middle" width="13%" style="overflow:hidden">
                          <div width="100%" style="overflow:hidden">
                            <a><img src="https://demo.classroombookings.com/assets/images/ui/accept.png" width="16" height="16" alt="Book" title="Book" hspace="4" align="absmiddle">06:30 - 07:30</a>
                          </div>
                        </td> -->

                    </tbody>
                  </table>
                </div>
                <div class="form-group" style="margin-bottom:0;">
                  <textarea name="keterangan" class="form-control" placeholder="" required="required" autocomplete="off"></textarea>
                  <label>Keterangan</label>
                </div>
                <!-- Hidden Input-->
                <input type="hidden" name="id_peminjam" class="form-control" placeholder="" value="<?= $this->session->userdata('id') ?>" required="required" autocomplete="off" />
                <input type="hidden" name="id_ruangan" class="form-control" placeholder="" value="<?= $tempatbyid['id'] ?>" required="required" autocomplete="off" />
              </div>
            </div>
            <div class="card-footer">
              <button class="btn btn-primary" id="tes">Buat Peminjaman</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
  <!-- End Main Container -->
  <style>
    a.active {
      background-color: #479030;
      /* border: 1px solid; */
      color: white !important;
    }

    a.active:hover {
      border-color: #479030 !important;
    }
  </style>
  <script>
    // const cek = document.querySelectorAll(".cek");
    // const btn = document.querySelectorAll('.time')

    // for (let i = 0; i < btn.length; i++) {
    //   btn[i].addEventListener("click", function(e) {

    //     for (let j = 0; j < btn.length; j++) {

    //       // btn[j].removeAttribute("style");
    //       $('#cek' + j).removeAttr('checked');
    //       // $('.cek').removeAttr('checked')

    //     }
    //     // this.style.color = "white";
    //     // this.style.background = "green";
    //     // document.getElementById("waktu").innerHTML = ($(this).text())
    //     // document.getElementById("cek" + i).checked = false;
    //     $(this).toggleClass('active');
    //     $('#cek' + i).attr('checked', 'checked');
    //     // $('#cek' + i).removeAttr('checked')


    //     // document.getElementById("cek" + i).checked = true;
    //   });
    // }



    // $(document).ready(function() {

    //   $(".time").click(function() {

    //     clicked = true;
    //     if (clicked) {
    //       $(this).toggleClass('active');
    //       clicked = false;
    //       $('input:checkbox').attr('checked', 'checked');
    //     } else {
    //       $(this).removeClass('active');
    //       clicked = true;
    //       $('input:checkbox').removeAttr('checked');
    //     }
    //   });
    // });
    $(document).ready(function() {

      $('#date').change(function() {
        var date = $('#date').val();
        var id_ruangan = $("[name= id_ruangan]").val();
        // alert(ruangan)
        if (date != '') {
          $.ajax({
            url: "<?= base_url(); ?>booking/fetchDate",
            type: "POST",
            data: {
              'date': date,
              'id_ruangan': id_ruangan,
            },
            dataType: 'json',
            success: function(data) {
              // console.log(data);
              var arrTime = [
                "06.30 - 07.30", "07.30 - 08.30", '08.30 - 09.30',
                '09.30 - 10.30', '10.30 - 11.30', '11.30 - 12.30',
                '12.30 - 13.30', '13.30 - 14.30', '14.30 - 15.30',
                '15.30 - 16.30', '16.30 - 17.30', '17.30 - 18.30',
                '18.30 - 19.30', '19.30 - 20.30', '20.30 - 21.30',
                '21.30 - 22.30'
              ];

              console.log(data)
              if (!data.time) {
                console.log('Empty');
                var html = '';
                var i = 0;
                for (i in arrTime) {
                  html += '<td class="free" align="center" id="btnchange" valign="middle" width="13%" style="overflow:hidden"><div width="100%" style="overflow:hidden"><a class="time" id="btn"><input type="checkbox" name="time[]" value="' + arrTime[i] + '" class="time" id="time">' + arrTime[i] + '</a></div></td>';
                  $("tbody tr").html(html);
                }
              } else {
                // console.log('Fill');
                var html = '';
                const entries = Object.values(data);
                // console.log(data)
                for (i in entries) {
                  var time = entries[i];
                  var splitTime = time.split(", ");
                }
                console.log(splitTime)
                // Remove same values array
                arrTime = arrTime.filter(function(el) {
                  return splitTime.indexOf(el) < 0;
                });

                for (i in arrTime) {
                  html += '<td class="free" align="center" id="btnchange" valign="middle" width="13%" style="overflow:hidden"><div width="100%" style="overflow:hidden"><a class="time" id="btn"><input type="checkbox" name="time[]" value="' + arrTime[i] + '" class="time" id="time">' + arrTime[i] + '</a></div></td>';
                  $("tbody tr").html(html);
                }
                for (j in splitTime) {
                  // if (arrTime[i] == splitTime[j]) {
                  html += '<td class="free red" align="center" id="btnchange" valign="middle" width="13%" style="overflow:hidden"><div width="100%" style="overflow:hidden"><a class="time" id="btn">' + splitTime[j] + '</a></div></td>';
                  $("tbody tr").html(html);
                  // }
                }
              }
            }
          })
        } else {
          // 
        }
      });
    });
  </script>