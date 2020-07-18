  <!-- Main Container -->
  <main class="akun-container">
    <div class="fik-section-title2">
      <span class="fas fa-door-open zzzz"></span>
      <h5>Edit Barang</h5>
    </div>
    <div class="row">
      <div class="col-md-4">
        <!-- <span class="fas fa-image placeholder-img"></span> -->
        <img src="<?= base_url('uploads/item/'.$item->image) ?>" alt="">
      </div>
      <div class="col-md-8">
        <div class="card">
          <form action="<?php base_url('item/edit') ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <div class="custom-form">
                <div class="form-group">
                  <input type="hidden" name="id" value="<?= $item->id ?>" class="form-control" placeholder="" required="required" autocomplete="off" />
                </div>
                <div class="form-group">
                  <input type="text" name="name" value="<?= $item->name ?>" class="form-control" placeholder="" required="required" autocomplete="off" />
                  <label>Nama Barang</label>
                </div>
                <div class="form-group">
                  <input type="number" name="quantity" value="<?= $item->quantity ?>" class="form-control" placeholder="" required="required" autocomplete="off" />
                  <label>Kuantitas Barang</label>
                </div>
                <div class="lab-category" style="margin-bottom:16px;">
                    <b>Akses</b>
                  <!-- <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="checkbox11" value="option3">
                    <label class="form-check-label" for="checkbox11">Dosen</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="checkbox12" value="option3">
                    <label class="form-check-label" for="checkbox12">Mahasiswa</label>
                  </div> -->
                    <select class="form-control" name="access" placeholder="" value="<?= $item->access ?>">
                    <option>Semua</option>
                    <option>Dosen</option>
                    <option>Mahasiswa</option>
                    </select>
                </div>
                <div class="form-group">
                  <input type="text" name="description" value="<?= $item->description ?>" class="form-control" placeholder="" autocomplete="off" />
                  <label>Deskripsi</label>
                </div>
              </div>
              <div class="form-group" style="margin-bottom:0;">
                <label for="exampleFormControlFile1"><b>Tambahkan Gambar</b></label>
                <input type="file" name="image" class="form-control" id="exampleFormControlFile1" style="padding:13px 16px">
                <input type="hidden" name="old_image" value="<?= $item->image ?>" />
              </div>
            </div>
            <div class="card-footer">
              <button class="btn btn-primary">Edit</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </main>
  <!-- End Main Container -->