  <!-- Main Container -->
  <main class="akun-container">
    <?= $this->session->flashdata('message'); ?>
    <div class="fik-section-title2">
      <span class="fas fa-door-open zzzz"></span>
      <h5>Riwayat Peminjaman Tempat</h5>
    </div>
    <div class="input-group">
      <div class="input-group-append">
        <button class="btn btn-primary dropdown-toggle" id="filter" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-left:1px solid rgba(0,0,0,.1);">Filter</button>
        <div class="dropdown-menu">
          <a class="dropdown-item item">Semua</a>
          <a class="dropdown-item item">Ruangan</a>
          <a class="dropdown-item item">Tanggal</a>
          <a class="dropdown-item item">Waktu</a>
          <a class="dropdown-item item">Keterangan</a>
          <a class="dropdown-item item">Status</a>
        </div>
      </div>
      <input type="text" class="form-control" id="keyword" aria-label="Text input with dropdown button" placeholder="Pencarian">
    </div>
    <div class="table-responsive admin-list">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col" style="width:20%;">Nama</th>
            <th scope="col">Ruangan</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Waktu</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody id="peminjamantempat">
          <?php $no = 0;
          foreach ($mybooking as $l) : ?>
            <tr>
              <th scope="row"><?= ++$no ?></th>
              <td><?= $l['name'] ?></td>
              <td><?= $l['kategori'] . ' - ' . $l['ruangan'] ?></td>
              <td><?= $l['date'] ?></td>
              <td><?= substr($l['time'], 0, 8) ?><?= substr($l['time'], -5) ?></td>
              <td><?= $l['keterangan'] ?></td>
              <td><b><?= $l['status'] ?></b></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="form-group">
      <input type="hidden" name="title" id="id" value="<?= $this->session->userdata('id') ?>" class="form-control" placeholder="" required="required" autocomplete="off" />
    </div>
  </main>
  <!-- End Main Container -->



  <script>
    $(document).ready(function() {
      var keyword = document.getElementById('keyword');
      var container = document.getElementById('container');
      $(".item").click(function() {
        var text = $(this).text();
        // alert(id)
        $("#filter").text(text)
        if (text != '') {
          load_data(keyword = null, text);
        } else {
          load_data();
        }
      });

      function load_data(keyword, filter) {
        $.ajax({
          url: '<?= base_url('search/fetchdatapeminjamantmpt') ?>',
          method: "POST",
          data: {
            keyword: keyword,
            filter: filter,
          },
          success: function(data) {
            $('#peminjamantempat').html(data);
            // console.log(data)
          }
        });
      }
      keyword.addEventListener('keyup', function() {
        var keyword = $(this).val();
        var filter = $('#filter').text()
        // alert(filter)
        if (keyword != '') {
          load_data(keyword, filter);
        } else {
          load_data();
        }
      })
    });
  </script>