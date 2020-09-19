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
            <h1><?= $s['title']; ?></h1>
            <p style="max-width:480px;margin:20px auto 0">
              <?= $s['body']; ?>
              <br>
              <button type="button" class="btn btn-primary btn-pill" style="margin-top:20px">Download</button>
            </p>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>

<div class="fik-about-overview">
  <div class="container">
    <?php if (empty($dt_panel)) : ?>
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
        <video poster="<?= base_url('assets/img/panel/video_placeholder.png'); ?>">
          <source>
          Ooops, your browser is not supported this feature
        </video>
      </div>
    <?php else : ?>
      <div class="card">
        <div class="content-left">
          <h6>HI THERE, WELCOME TO</h6>
          <h4 class="color-primary"><?= $dt_panel['title']; ?></h4>
          <p>
            <?= $dt_panel['body']; ?>
          </p>
          <a href="<?= base_url('lab/profile/') . $dt_panel['slug']; ?>" class="btn btn-primary btn-pill btn-icon-right">READ MORE <span class="fa fa-chevron-right"></span></a>
        </div>
        <?php if ($dt_panel['video'] != "video_placeholder.png") : ?>
          <video controls="" poster="<?= base_url('assets/img/panel/') . $dt_panel['thumb'] ?>" preload="none">
            <source src="<?= base_url('assets/img/panel/') . $dt_panel['video']; ?>" type="video/mp4">
            Ooops, your browser is not supported this feature
          </video>
        <?php else : ?>
          <img src="<?= base_url('assets/img/panel/video_placeholder.png'); ?>" class="video-placeholder" alt="Placeholder Video Profile">
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
</div>

<div class="fik-tour margin-t50">
  <div class="container">
    <div class="fik-tour-item">
      <img src="<?= base_url('assets/img/tour.png') ?>" alt="">
      <div class="fik-tour-text">
        <h5>FIK TOUR</h5>
        <p>Tour FIK ini merupakan sarana tour ke Fakultas Industri Kreatif menggunakan animasi 3D</p>
        <a href="#" target="_blank" class="btn btn-">START TOUR</a>
      </div>
    </div>
    <div class="fik-tour-item">
      <img src="<?= base_url('assets/img/12.jpg') ?>" alt="">
      <div class="fik-tour-text">
        <h5>MEET 360</h5>
        <p>Tour FIK ini merupakan sarana tour ke Fakultas Industri Kreatif menggunakan animasi 3D menggunakan kamera 360</p>
        <a href="#" target="_blank" class="btn btn-">MORE</a>
      </div>
    </div>
  </div>
</div>

<div class="fik-jadwal-ruangan margin-t50">
  <div class="container">
    <div class="fik-section-title text-center">
      <h3>INFORMASI RUANGAN</h3>
      <p>Informasi terbaru mengenai ruangan yang terisi maupun yang masih available</p>
    </div>
    <div class="owl-carousel owl-theme fik-carousel-schedule">
      <?php $start = 0; ?>
      <?php $xIteration = ceil(count($dt_schedule) / 5);
      $iteration = 0;
      while ($iteration < $xIteration) : ?>
        <div class="item">
          <div class="fik-custom-table">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Ruangan</th>
                  <th scope="col">Waktu</th>
                  <th scope="col">Peminjam</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col">
                    <div style="margin-left: 110px;">Status</div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0;
                $display = 5; ?>
                <?php foreach (array_slice($dt_schedule, $start, $display) as $d) : ?>
                  <tr>
                    <?php if ($d['status'] == 'Diterima' or $d['status'] == 'Menunggu Acc') : ?>
                      <td><b><?= $d['ruangan'] ?></b></td>
                      <td><?= substr($d['time'], 0, 8) ?><?= substr($d['time'], -5) ?></td>
                      <td><?= $d['name'] ?></td>
                      <td><?= $d['keterangan'] ?></td>
                      <td class="status">
                        <div class="badge badge-danger badge-pill">Tidak Tersedia</div>
                      </td>
                    <?php elseif ($d['status'] == 'Ditolak') : ?>
                      <td><b><?= $d['ruangan'] ?></b></td>
                      <td><?= substr($d['time'], 0, 8) ?><?= substr($d['time'], -5) ?></td>
                      <td></td>
                      <td></td>
                      <td class="status">
                        <div class="badge badge-success badge-pill">Tersedia</div>
                      </td>
                    <?php endif; ?>
                    <?php $temp = $no++;
                    if ($temp == $display - 1) {
                      $start += $temp + 1;
                    }
                    ?>
                  </tr>
                <?php
                endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
        <?php $iteration++ ?>
      <?php endwhile; ?>
    </div>
    <div class="text-center">
      <a href="<?= base_url('main/schedule') ?>" target="_blank">
        <div class="btn btn-primary btn-pill btn-icon btn-icon-left btn-icon-right fik-show-more-btn"><b>Tampilkan Layar Penuh</b><span class="fas fa-external-link-alt"></span></div>
      </a>
    </div>
  </div>
</div>

<div class="fik-lab-div margin-t50">
  <div class="container">
    <div class="fik-section-title text-center">
      <h3>LABORATORIUM FAKULTAS</h3>
      <p>Fasilitas laboratorium di fakultas industri kreatif</p>
    </div>
    <div class="lab-content">
      <div class="owl-carousel owl-theme fik-lab-div-list">
        <?php if (!empty($dt_lab)) : ?>
          <?php foreach ($dt_lab as $l) : ?>
            <div class="item">
              <div class="gambar">
                <img src="<?= base_url('assets/img/laboratorium/thumbs/') . $l['images']; ?>" alt="<?= $l['title'] ?>" />
              </div>
              <div class="item-text">
                <h6><?= $l['title']; ?></h6>
                <p><?= $l['body']; ?></p>
                <a href="<?= base_url('lab/details/') . $l['slug']; ?>" class="btn btn-primary btn-icon btn-icon-right btn-sm btn-pill"><b>READ MORE</b> <span class="fas fa-arrow-right"></span></a>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else : ?>
          <div class="item">
            <div class="gambar">
              <img src="<?= base_url('assets/img/7.jpg'); ?>" alt="" />
            </div>
            <div class="item-text">
              <h6>Nama Lab</h6>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur eveniet...</p>
              <a href="#" class="btn btn-primary btn-icon btn-icon-right btn-sm btn-pill"><b>READ MORE</b> <span class="fas fa-arrow-right"></span></a>
            </div>
          </div>
          <div class="item">
            <div class="gambar">
              <img src="<?= base_url('assets/img/3.jpg'); ?>" alt="" />
            </div>
            <div class="item-text">
              <h6>Nama Lab</h6>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur eveniet...</p>
              <a href="#" class="btn btn-primary btn-icon btn-icon-right btn-sm btn-pill"><b>READ MORE</b> <span class="fas fa-arrow-right"></span></a>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<div class="fik-feed fik-feed-50 margin-t50">
  <div class="container text-center">
    <div class="fik-section-title text-center">
      <h3>Unit</h3>
      <p>Unit jasa resmi dari lab fik</p>
    </div>
    <div class="feed-container">
      <div class="feed-item">
        <div class="card">
          <div class="gambar">
            <img src="<?= base_url('assets/img/10.jpg') ?>" alt="" />
          </div>
          <div class="item-text">
            <h6><a href="<?= base_url('unit/bisnis') ?>">Unit Bisnis</a></h6>
            <p>Kami siap memberikan yang terbaik.</p>
            <a href="<?= base_url('unit/bisnis') ?>" class="btn btn-primary btn-icon btn-icon-right btn-sm btn-pill"><b>READ MORE</b></a>
          </div>
        </div>
      </div>
      <div class="feed-item">
        <div class="card">
          <div class="gambar">
            <img src="<?= base_url('assets/img/11.jpg') ?>" alt="" />
          </div>
          <div class="item-text">
            <h6><a href="<?= base_url('unit/partnership') ?>">Partnership</a></h6>
            <p>Butuh media partner? Kesini aja!!</p>
            <a href="<?= base_url('unit/bisnis') ?>" class="btn btn-primary btn-icon btn-icon-right btn-sm btn-pill"><b>READ MORE</b></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="fik-feed margin-t50">
  <div class="container text-center">
    <div class="fik-section-title">
      <h3>NEWS & EVENT</h3>
      <p>Informasi terbaru mengenai lab diupdate disini</p>
    </div>
    <div class="feed-container">
      <?php if (empty($dt_info)) : ?>
      <?php else : ?>
        <?php foreach ($dt_info as $i) : ?>
          <div class="feed-item feed-iteminfo">
            <div class="card">
              <div class="gambar">
                <img src="<?= base_url('assets/img/informasi/thumbs/') . $i['images']; ?>" alt="<?= $i['title'] ?>" />
              </div>
              <div class="item-text">
                <h6><a href="<?= base_url('news/details/') . $i['slug']; ?>"><?= $i['title'] ?></a></h6>
                <p>Posted <?= (new DateTime($i['date']))->format('M j, Y'); ?> by <?= $i['uploadby']; ?></p>
                <a href="<?= base_url('news/details/') . ($i['slug']); ?>" class="btn btn-primary btn-icon btn-icon-right btn-sm btn-pill"><b>READ MORE</b></a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
    <div style="margin-top:10px">
      <div class="btn btn-primary btn-pill btn-icon btn-icon-left btn-icon-right fik-show-more-btn" id="loadMore"><span class="fas fa-chevron-down"></span><b>SHOW MORE</b><span class="fas fa-chevron-down"></span></div>
    </div>
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
    loop: true,
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
  $('.fik-carousel-schedule').owlCarousel({
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    margin: 0,
    margin: 0,
    loop: true,
    autoplay: true,
    autoplayTimeout: 15000,
    items: 1,
    dots: false,
  });
</script>