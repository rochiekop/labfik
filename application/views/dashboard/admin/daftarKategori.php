  <!-- Main Container -->
  <main class="akun-container">
    <?= $this->session->flashdata('message'); ?>
    <div class="fik-section-title2">
      <span class="fas fa-door-open zzzz"></span>
      <h5>Kategori Ruangan</h5>
    </div>
    <div class="input-group">
      <div class="input-group-append">
        <button class="btn btn-primary dropdown-toggle" id="filter" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-left:1px solid rgba(0,0,0,.1);">Filter</button>
        <div class="dropdown-menu">
          <a class="dropdown-item">Semua</a>
          <a class="dropdown-item">Lab</a>
          <a class="dropdown-item">Kelas</a>
          <a class="dropdown-item">Studio</a>
        </div>
      </div>
      <input type="text" class="form-control" id="keyword" aria-label="Text input with dropdown button" placeholder="Pencarian">
      <a class="btn btn-primary" data-toggle="modal" data-target="#addkategori" style="margin-left: 20px;color:white"><span class="fas fa-fw fa-plus"></span> Kategori</a>
    </div>
    <div id="#">
      <div class="table-responsive admin-list">
        <table class="table">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" style="width:48px">No</th>
                <th scope="col" style="width:90px">&nbsp;</th>
                <th scope="col">Kategori</th>
                <th scope="col">Waktu Input</th>
                <th scope="col" class="action">Aksi</th>
              </tr>
            </thead>
            <tbody id="container">
              <?php $no = 0;
              foreach ($kategori as $k) : ?>
                <tr>
                  <td scope="row" style="width:60px"><?= ++$no ?></td>
                  <td style="width:80px">
                  </td>
                  <td><?= $k['kategori'] ?></td>
                  <td><?= $k['date_created'] ?></td>
                  <td class="action">
                    <a data-toggle="modal" data-target="#deletemodal<?= encrypt_url($k['id']); ?>"><span class="fas fa-trash"></span></a>
                    <a data-toggle="modal" data-target="#editmodal<?= encrypt_url($k['id']); ?>"><span class="fas fa-edit"></span></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </table>
      </div>
    </div>
  </main>
  <!-- End Main Container -->

  <script>
    $(document).ready(function() {
      var keyword = document.getElementById('keyword');
      var container = document.getElementById('container');
      $(".dropdown-item").click(function() {
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
          url: '<?= base_url('search/fetchdatakategori') ?>',
          method: "POST",
          data: {
            filter: filter,
            keyword: keyword,
          },
          success: function(data) {
            $('#container').html(data);
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

  <!-- Modal for add kategori -->
  <div class="modal fade" id="addkategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
        </div>
        <form action="<?= base_url('admin/addkategori') ?>" method="POST" enctype="multipart/form-data" id="formAdd">
          <div class="modal-body">
            <div class="custom-form">
              <div class="form-group" style="margin-bottom:12px">
                <input type="text" name="kategori" id="kategori" value="<?= set_value('kategori'); ?>" class="form-control" placeholder="" required="required" autocomplete="off" />
                <label>Kategori Ruangan</label>
                <?php echo form_error('kategori', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <!-- Modal for Delete -->

  <?php foreach ($kategori as $t) : ?>
    <div class="modal fade bd-example-modal-sm" id="deletemodal<?= encrypt_url($t['id']) ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-body">
            Hapus Kategori <?= $t['kategori']; ?> ?
          </div>
          <form action="deletekategori" method="post" enctype="multipart/form-data">
            <div class="modal-footer">
              <input type="hidden" id="id" name="id" value="<?= $t['id']; ?>">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
              <button type="submit" name="deletedata" class="btn btn-danger btn-sm">Hapus</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

  <!-- Modal for Edit -->

  <?php foreach ($kategori as $t) : ?>
    <div class="modal fade" id="editmodal<?= encrypt_url($t['id']) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
          </div>
          <form action="<?= base_url('admin/editkategori') ?>" method="POST" enctype="multipart/form-data" id="formAdd">
            <div class="modal-body">
              <div class="custom-form">
                <div class="form-group" style="margin-bottom:12px">
                  <input type="hidden" name="id" value="<?= $t['id']; ?>">
                  <input type="text" name="kategori" id="kategori" value="<?= $t['kategori']; ?>" class="form-control" placeholder="" required="required" autocomplete="off" />
                  <label>Kategori Ruangan</label>
                  <?php echo form_error('kategori', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>