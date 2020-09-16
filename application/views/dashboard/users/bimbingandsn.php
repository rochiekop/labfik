<!-- Main Container -->
<main class="akun-container">
  <div class="fik-section-title2">
    <h4>Bimbingan</h4>
  </div>
  <div class="input-group">
    <div class="input-group-append">
      <button class="btn btn-primary dropdown-toggle" id="filter" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-left:1px solid rgba(0,0,0,.1);">Filter</button>
      <div class="dropdown-menu">
        <a class="dropdown-item item">Semua</a>
        <a class="dropdown-item item">Nama</a>
        <a class="dropdown-item item">NIM</a>
        <a class="dropdown-item item">Prodi</a>
        <a class="dropdown-item item">Kosentrasi</a>
        <a class="dropdown-item item">Tahun</a>
      </div>
    </div>
    <input type="text" class="form-control" id="keyword" aria-label="Text input with dropdown button" placeholder="Pencarian">
  </div><br>
  <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col" style="width:60px">#</th>
          <th scope="col" style="width:160px">Aksi</th>
          <th scope="col">Mahasiswa</th>
          <th scope="col">NIM</th>
          <th scope="col">Prodi</th>
          <th scope="col">Kosentrasi</th>
          <th scope="col">Tahun</th>
          <th scope="col">Status Anda</th>
          <th scope="col">Status Bimbingan</th>
        </tr>
      </thead>
      <tbody id="bimbingandosen">
        <?php if (empty($bimbingan)) : ?>
          <td colspan="8" style="background-color: whitesmoke;text-align:center">Daftar bimbingan kosong</td>
        <?php else : ?>
          <?php $no = 0;
          foreach ($bimbingan as $t) : ?>
            <tr>
              <th scope="row" style="width:60px"><?= ++$no ?></th>
              <?php if ($t['file_bimbingan'] != 0) : ?>
                <td class="action" style="width:160px">
                  <a href="<?= base_url('users/progressbimbingan/') . encrypt_url($t['id_guidance']); ?>" class="btn badge badge-primary">Lihat Progres</a>
                </td>
              <?php else : ?>
                <td><b>Belum Melakukan Bimbingan</b></td>
              <?php endif; ?>
              <td><?= $t['name'] ?></td>
              <td><?= $t['nim'] ?></td>
              <td><?= $t['prodi'] ?></td>
              <td><?= $t['peminatan'] ?></td>
              <td><?= $t['tahun'] ?></td>
              <?php if ($this->session->userdata('id') == $t['dosen_pemb1']) { ?>
                <td>Pembimbing 1</td>
              <?php } else { ?>
                <td>Pembimbing 2</td>
              <?php } ?>
              <td><?= $t['status_bimbingan'] ?></td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
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
      $("#filter").text(text)
      if ((text != 'Semua')) {
        load_data(text);
      } else {
        load_data()
      }
    });

    function load_data(filter, keyword) {
      $.ajax({
        url: '<?= base_url('search/fetchdatabimbingandosen') ?>',
        method: "POST",
        data: {
          filter: filter,
          keyword: keyword,
        },
        success: function(data) {
          $('#bimbingandosen').html(data);
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