  <!-- Main Container -->
  <main class="akun-container">
    <?php if (validation_errors()) : ?>
      <div class="alert alert-danger" role="alert">
        <?= validation_errors(); ?>
      </div>
    <?php endif; ?>
    <?= $this->session->flashdata('message'); ?>

    <div class="fik-section-title2">
      <span class="fas fa-door-open zzzz"></span>
      <h4>Pengajuan Tugas Akhir</h4>
    </div>
    <div class="alert alert-warning">
      <ul class="list-dot-ul">
        <li><b><?= $info['menunggu'] ?></b> Pengajuan Belum Ada Aksi</li>
        <li><b><?= $info['updated'] ?></b> Pengajuan File Baru</li>
        <li><b><?= $info['ditolak'] ?></b> Pengajuan Ditolak</li>
        <li><b><?= $info['all'] ?></b> Total Pengajuan Sepanjang Waktu</li>
      </ul>
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
      <input type="text" class="form-control" id="keyword" onkeyup="searchpengajuantaadminlaa()" aria-label="Text input with dropdown button" placeholder="Pencarian">
    </div>
    <div class="table-responsive admin-list">
      <table class="table">
        <table class="table" id="myTable">
          <thead>
            <tr>
              <th scope="col" style="width:48px">No</th>
              <th scope="col" style="width:90px">&nbsp;</th>
              <th scope="col">Nama</th>
              <th scope="col">NIM</th>
              <th scope="col">Prodi</th>
              <th scope="col">Kosentrasi</th>
              <th scope="col">Dosen Wali</th>
              <th scope="col">Tahun</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody id="pendaftaranta">
            <?php if (empty($mahasiswa)) : ?>
              <td colspan="9" style="background-color: whitesmoke;text-align:center">List Pendaftaran kosong</td>
            <?php else : ?>
              <?php $no = 0;
              foreach ($mahasiswa as $t) : ?>
                <tr>
                  <td><?= ++$no ?></td>
                  <td> <a href="<?= base_url('adminlaa/viewdetail/') . encrypt_url($t['id']); ?>" class="btn badge badge-secondary">Details</a></td>
                  <td><?= $t['name'] ?></td>
                  <td><?= $t['nim'] ?></td>
                  <td><?= $t['prodi'] ?></td>
                  <td><?= $t['peminatan'] ?></td>
                  <td><?= $t['dosen_wali'] ?></td>
                  <td><?= $t['tahun'] ?></td>
                  <?php if ($t['status_file'] == "Disetujui wali" and $t['diterima'] == "0" and $t['ditolak'] == "0" and $t['updated'] == "0") : ?>
                    <td><b>Menunggu Persetujuan</b></td>
                  <?php elseif ($t['diterima'] != 5 and $t['updated'] == "0") : ?>
                    <td><b><?= $t['diterima'] ?> Diterima, <?= $t['ditolak'] ?> Ditolak</b></td>
                  <?php elseif ($t['updated'] != "0") : ?>
                    <td><b><?= $t['updated'] ?> File baru</b></td>
                  <?php else : ?>
                    <td><b>Disetujui</b></td>
                  <?php endif; ?>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </table>
    </div>
  </main>
  <script type="text/javascript" src="<?= base_url('assets/js/search.js') ?>"></script>
  <!-- End Main Container -->
  <script>
    // $("#keyword").keyup(function() {
    //   // Declare variables
    //   var input, filter, table, tr, td, i, txtValue;
    //   input = document.getElementById("keyword");
    //   filter = input.value.toUpperCase();
    //   table = document.getElementById("myTable");
    //   tr = table.getElementsByTagName("tr");

    //   // Loop through all table rows, and hide those who don't match the search query
    //   for (i = 0; i < tr.length; i++) {
    //     td = tr[i].getElementsByTagName("td")[0];
    //     if (td) {
    //       txtValue = td.textContent || td.innerText;
    //       if (txtValue.toUpperCase().indexOf(filter) > -1) {
    //         tr[i].style.display = "";
    //       } else {
    //         tr[i].style.display = "none";
    //       }
    //     }
    //   }
    //   var value = this.value.toLowerCase().trim();

    //   $("table tr").each(function(index) {
    //     if (!index) return;
    //     $(this).find("td").each(function() {
    //       var id = $(this).text().toLowerCase().trim();
    //       var not_found = (id.indexOf(value) == -1);
    //       $(this).closest('tr').toggle(!not_found);
    //       return not_found;
    //     });
    //   });
    // });
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
          url: '<?= base_url('search/fetchdatapendaftaranadminlaa') ?>',
          method: "POST",
          data: {
            filter: filter,
            keyword: keyword,
          },
          success: function(data) {
            $('#pendaftaranta').html(data);
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