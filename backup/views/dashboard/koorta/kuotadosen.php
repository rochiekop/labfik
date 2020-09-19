  <!-- Main Container -->
  <main class="akun-container">
    <?= $this->session->flashdata('message'); ?>
    <div class="fik-section-title2">
      <h4>Kuota Dosen</h4>
    </div>
    <form action="#$">
      <div class="input-group">
        <div class="input-group-prepend">
          <button class="btn btn-primary dropdown-toggle" id="filter" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter</button>
          <div class="dropdown-menu">
            <a class="dropdown-item item">Nama</a>
          </div>
        </div>
        <input type="text" id="keyword" class="form-control" aria-label="Text input with dropdown button" placeholder="Pencarian">
      </div>
    </form>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col" style="width:100px">#</th>
            <th scope="col" style="width:35%;">Nama</th>
            <th scope="col">Kuota Bimbingan</th>
            <th scope="col">Kuota Penguji</th>
          </tr>
        </thead>
        <tbody id="kuotadosen">
          <?php $no = 0;
          foreach ($dosen as $d) : ?>
            <tr>
              <th scope="row"><?= ++$no ?></th>
              <td><?= $d['name'] ?></td>
              <td>
                <form action="<?= base_url('koordinator_ta/insertkuotapembimbing') ?>" method="POST">
                  <input type="hidden" value="<?= $d['id'] ?>" name="id_dosen">
                  <div class="form-group" style="margin-bottom:0;">
                    <select id="kbimbingan" name="kbimbingan" class="form-control" style="width:160px;height:28px;float:left;">
                      <?php
                      $x = 1;
                      $max = 15;
                      while ($x <= $max) {
                        if ($d['kuota_bimbingan'] == $x) {
                          echo '<option value="' . $x . '" selected>' . $x . '</option>';
                        } else {
                          echo '<option value="' . $x . '">' . $x . '</option>';
                        }
                        $x++;
                      }
                      ?>
                    </select>&nbsp;
                    <button type="submit" class=" badge badge-success" style="color:#fff;height:28px;line-height:26px;">Simpan</button> &nbsp; <?= $d['count_bimbingan'] ?>/<?= $d['kuota_bimbingan'] ?>
                    <div class="clearfix"></div>
                  </div>
                </form>
              </td>
              <td>
                <form action="<?= base_url('koordinator_ta/insertkuotapenguji') ?>" method="POST">
                  <input type="hidden" value="<?= $d['id'] ?>" name="id_dosen">
                  <div class="form-group" style="margin-bottom:0;">
                    <select id="kpenguji" name="kpenguji" class="form-control" style="width:160px;height:28px;float:left;">
                      <?php
                      $x = 1;
                      $max = 15;
                      while ($x <= $max) {
                        if ($d['kuota_penguji'] == $x) {
                          echo '<option value="' . $x . '" selected>' . $x . '</option>';
                        } else {
                          echo '<option value="' . $x . '">' . $x . '</option>';
                        }
                        $x++;
                      }
                      ?>
                    </select>&nbsp;
                    <button type="submit" class=" badge badge-success" style="color:#fff;height:28px;line-height:26px;">Simpan</button> &nbsp; <?= $d['count_penguji'] ?>/<?= $d['kuota_penguji'] ?>
                    <div class="clearfix"></div>
                  </div>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </main>
  <!-- End Main Container -->

  <script>
    $(document).ready(function() {
      var keyword = document.getElementById('keyword');
      var container = document.getElementById('container');
      $(".item").click(function() {
        var text = $(this).text();
        // alert(text)
        $("#filter").text(text)
        if ((text != 'Semua')) {
          load_data(text);
        } else {
          load_data()
        }
      });

      function load_data(filter, keyword) {
        $.ajax({
          url: '<?= base_url('search/fetchdatakuotadosen') ?>',
          method: "POST",
          data: {
            filter: filter,
            keyword: keyword,
          },
          success: function(data) {
            $('#kuotadosen').html(data);
            // console.log(data)
          }
        });
      }
      keyword.addEventListener('keyup', function() {
        var keyword = $(this).val();
        var filter = $('#filter').text()
        if (keyword != '') {
          load_data(filter, keyword);
        } else if (filter != "Semua" && filter != "Filter") {
          load_data(filter);
        } else {
          load_data();
        }
      })
    });
  </script>