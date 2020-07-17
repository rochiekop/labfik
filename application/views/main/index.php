<div class="fik-carousel">
  <div class="owl-carousel owl-theme fik-carousel-info">
    <?php if (empty($dt_slider)) : ?>
      <div class="item">
        <img src="<?= base_url('assets/img/slider/empty.jpg'); ?>" alt="empty 1" />
        <div class="item-text text-center">
          <h1>Deskripsi info 1</h1>
        </div>
      </div>
      <div class="item">
        <img src="<?= base_url('assets/img/slider/empty.jpg'); ?>" alt="empty 2" />
        <div class="item-text text-center">
          <h1>Deskripsi info 2</h1>
        </div>
      </div>
      <div class="item">
        <img src="<?= base_url('assets/img/slider/empty.jpg'); ?>" alt="empty 3" />
        <div class="item-text text-center">
          <h1>Deskripsi info 3</h1>
        </div>
      </div>
    <?php else : ?>
      <?php foreach ($dt_slider as $s) : ?>
        <div class="item">
          <img src="<?= base_url('assets/img/slider/') . $s['images']; ?>" alt="" />
          <div class="item-text text-center">
            <h1><?= $s['body']; ?></h1>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>

<div class="fik-about-overview">
  <div class="container">
    <div class="card">
      <div class="content-left">
        <h6>HI THERE, WELCOME TO</h6>
        <h4 class="color-primary">Laboratorium, Studio &amp; Bengkel Fakultas Industri Kreatif</h4>
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid cum error quo eligendi doloremque
          molestias placeat animi a harum, optio fugit blanditiis! Incidunt sequi velit harum sapiente sed nemo ipsa.
        </p>
        <a href="#" class="btn btn-primary btn-pill btn-icon-right">READ MORE <span class="fa fa-chevron-right"></span></a>
      </div>
      <video controls="">
        <source src="<?= base_url('assets/img/livetune.mp4'); ?>" type="video/mp4">
        Ooops, your browser is not supported this feature
      </video>
    </div>
  </div>
</div>

<div class="fik-jadwal-ruangan margin-t50">
  <div class="container fik-custom-table">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Ruangan</th>
          <th scope="col">Waktu</th>
          <th scope="col">Peminjam</th>
          <th scope="col">Keterangan</th>
          <th class="status" scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><b>IK.04.04</b></td>
          <td>19:00 - 22:00</td>
          <td>Fulan</td>
          <td>Meeting BEM</td>
          <td class="status">
            <div class="badge badge-danger badge-pill">Tidak Tersedia</div>
          </td>
        </tr>
        <tr>
          <td><b>IK.05.05</b></td>
          <td>19:00 - 22:00</td>
          <td></td>
          <td></td>
          <td class="status">
            <div class="badge badge-success badge-pill">Tersedia</div>
          </td>
        </tr>
        <tr>
          <td><b>IK.04.04</b></td>
          <td>19:00 - 22:00</td>
          <td>Fulan</td>
          <td>Meeting BEM</td>
          <td class="status">
            <div class="badge badge-danger badge-pill">Tidak Tersedia</div>
          </td>
        </tr>
        <tr>
          <td><b>IK.04.04</b></td>
          <td>19:00 - 22:00</td>
          <td>Fulan</td>
          <td>Meeting BEM</td>
          <td class="status">
            <div class="badge badge-danger badge-pill">Tidak Tersedia</div>
          </td>
        </tr>
        <tr>
          <td><b>IK.05.05</b></td>
          <td>19:00 - 22:00</td>
          <td></td>
          <td></td>
          <td class="status">
            <div class="badge badge-success badge-pill">Tersedia</div>
          </td>
        </tr>
        <tr>
          <td><b>IK.05.05</b></td>
          <td>19:00 - 22:00</td>
          <td></td>
          <td></td>
          <td class="status">
            <div class="badge badge-success badge-pill">Tersedia</div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<div class="fik-lab-div margin-t50">
  <div class="container">
    <div class="lab-content">
      <div class="owl-carousel owl-theme fik-lab-div-list">
        <?php if (!empty($dt_lab)) : ?>
          <?php foreach ($dt_lab as $l) : ?>
            <div class="item">
              <div class="gambar">
                <img src="<?= base_url('assets/img/laboratorium/') . $l['images']; ?>" alt="<?= $l['title'] ?>" />
              </div>
              <div class="item-text">
                <h6><?= $l['title']; ?></h6>
                <p><?= $l['body']; ?></p>
                <a href="#" class="btn btn-primary btn-icon btn-icon-right btn-sm btn-pill"><b>APPLY NOW</b> <span class="fas fa-arrow-right"></span></a>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else : ?>
          <div class="item">
            <div class="gambar">
              <img src="<?= base_url('assets/img/7.jpg'); ?>" alt="" />
            </div>
            <div class="item-text">
              <h6>Lab Cintiq</h6>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur eveniet...</p>
              <a href="#" class="btn btn-primary btn-icon btn-icon-right btn-sm btn-pill"><b>APPLY NOW</b> <span class="fas fa-arrow-right"></span></a>
            </div>
          </div>
          <div class="item">
            <div class="gambar">
              <img src="<?= base_url('assets/img/3.jpg'); ?>" alt="" />
            </div>
            <div class="item-text">
              <h6>Lab Mac</h6>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur eveniet...</p>
              <a href="#" class="btn btn-primary btn-icon btn-icon-right btn-sm btn-pill"><b>APPLY NOW</b> <span class="fas fa-arrow-right"></span></a>
            </div>
          </div>
        <?php endif; ?>
        <!-- <div class="item">
          <div class="gambar">
            <img src="_assets/img/2.jpg" alt="" />
          </div>
          <div class="item-text">
            <h6>Lab Bengkel</h6>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur eveniet...</p>
            <a href="#" class="btn btn-primary btn-icon btn-icon-right btn-sm btn-pill"><b>APPLY NOW</b> <span class="fas fa-arrow-right"></span></a>
          </div>
        </div>
        <div class="item">
          <div class="gambar">
            <img src="_assets/img/1.jpg" alt="" />
          </div>
          <div class="item-text">
            <h6>Studio Green Screen</h6>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur eveniet...</p>
            <a href="#" class="btn btn-primary btn-icon btn-icon-right btn-sm btn-pill"><b>APPLY NOW</b> <span class="fas fa-arrow-right"></span></a>
          </div>
        </div>
        <div class="item">
          <div class="gambar">
            <img src="_assets/img/12.jpg" alt="" />
          </div>
          <div class="item-text">
            <h6>Studio Green Screen</h6>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur eveniet...</p>
            <a href="#" class="btn btn-primary btn-icon btn-icon-right btn-sm btn-pill"><b>APPLY NOW</b> <span class="fas fa-arrow-right"></span></a>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</div>

<div class="fik-feed margin-t50">
  <div class="container text-center">
    <div class="fik-section-title">
      <h3>News</h3>
      <p>informasi terbaru mengenai lab diupdate disini</p>
    </div>
    <div class="feed-container">
      <?php if (empty($dt_info)) : ?>
      <?php else : ?>
        <?php foreach ($dt_info as $i) : ?>
          <div class="feed-item feed-iteminfo">
            <div class="card">
              <div class="gambar">
                <img src="<?= base_url('assets/img/informasi/') . $i['images']; ?>" alt="<?= $i['title'] ?>" />
              </div>
              <div class="item-text">
                <h6><?= $i['title'] ?></h6>
                <p>Posted <?= (new DateTime($i['date']))->format('j M, Y'); ?> by <?= $i['uploadby']; ?></p>
                <a href="#" class="btn btn-primary btn-icon btn-icon-right btn-sm btn-pill"><b>READ MORE</b></a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
      <!-- <div class="feed-item">
        <div class="card">
          <div class="gambar">
            <img src="_assets/img/8.jpg" alt="" />
          </div>
          <div class="item-text">
            <h6>Charlotte</h6>
            <p>Posted Jun 15, 2020 by Admin</p>
            <a href="#" class="btn btn-primary btn-icon btn-icon-right btn-sm btn-pill"><b>READ MORE</b></a>
          </div>
        </div>
      </div>
      <div class="feed-item">
        <div class="card">
          <div class="gambar">
            <img src="_assets/img/3.jpg" alt="" />
          </div>
          <div class="item-text">
            <h6>Date A Live</h6>
            <p>Posted Jun 15, 2020 by Admin</p>
            <a href="#" class="btn btn-primary btn-icon btn-icon-right btn-sm btn-pill"><b>READ MORE</b></a>
          </div>
        </div>
      </div> -->
    </div>
    <div class="btn btn-primary btn-pill btn-icon btn-icon-left btn-icon-right fik-show-more-btn" id="loadMore"><span class="fas fa-chevron-down"></span><b>SHOW MORE</b><span class="fas fa-chevron-down"></span></div>
  </div>
</div>

<script src="<?= base_url('assets/js/loadMore.js'); ?>"></script>
<script src="<?= base_url('assets/js/tambahan.js'); ?>"></script>
<script>
  $('.fik-carousel-info').owlCarousel({
    margin: 0,
    margin: 0,
    loop: true,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    items: 1,
  });
  $('.fik-lab-div-list').owlCarousel({
    margin: 0,
    loop: false,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    nav: true,
    navText: ["<span class='fas fa-arrow-left'>", "<span class='fas fa-arrow-right'>"],
    dots: false,
    responsive: {
      0: {
        items: 1,
        autoplay: false
      },
      480: {
        items: 2
      },
      720: {
        items: 4
      }
    }
  });
</script>