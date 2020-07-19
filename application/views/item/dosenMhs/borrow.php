  <!-- Main Container -->
  <main class="akun-container">
    <div class="fik-section-title2">
      <span class="fas fa-door-open zzzz"></span>
      <h5>Pinjam Barang</h5>
    </div>
    <div class="row">
      <div class="col-md-4">
        <!-- <span class="fas fa-image placeholder-img"></span> -->
        <img src="<?= base_url('uploads/item/'.$item->image) ?>" alt="">
      </div>
      <div class="col-md-8">
        <div class="card">
          <form action="<?= base_url('borrowing/addBorrowingDosenMhs') ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <div class="custom-form">
                <div class="form-group">
                  <input type="hidden" name="user_id" value="<?= $this->session->userdata('id'); ?>" class="form-control" placeholder="" required="required" autocomplete="off" />
                </div>
                <div class="form-group">
                  <input type="hidden" name="item_id" value="<?= $item->id ?>" class="form-control" placeholder="" required="required" autocomplete="off" />
                </div>
                <div class="form-group">
                  <input type="text" name="name" value="<?= $item->name ?>" class="form-control" placeholder="" required="required" autocomplete="off" disabled />
                  <label>Nama Barang</label>
                </div>
                <div class="form-group">
                  <input type="number" name="quantity" value="1" class="form-control" placeholder="" required="required" autocomplete="off" />
                  <label>Kuantitas Barang</label>
                </div>
                <div class="form-group">
                  <input type="datetime-local" name="start" value="" class="form-control" placeholder="" required="required" autocomplete="off" />
                  <label>Awal Waktu Peminjaman</label>
                </div>
                <div class="form-group">
                  <input type="datetime-local" name="end" value="" class="form-control" placeholder="" required="required" autocomplete="off" />
                  <label>Akhir Waktu Peminjaman</label>
                </div>
                <div class="form-group">
                  <input type="text" name="reason" value="" class="form-control" placeholder="" autocomplete="off" />
                  <label>Alasan Peminjaman</label>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button class="btn btn-primary">Pinjam Barang</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </main>
  <!-- End Main Container -->