<div class="fik-content">
  <div class="container">

    <div class="fik-feed lab text-center" style="padding-top:20px;">
      <div class="fik-section-title">
        <h3>Lab</h3>
      </div>
      <div class="feed-container">
        <?php if (empty($dt_lab)) : ?>
          <h4>Data Laboratorium Kosong</h4>
        <?php else : ?>
          <?php foreach ($dt_lab as $l) : ?>
            <div class="feed-item">
              <div class="card">
                <div class="gambar">
                  <img src="<?= base_url('assets/img/laboratorium/thumbs/') . $l['images'] ?>" alt="<?= $l['title'] ?>" />
                </div>
                <div class="item-text">
                  <h6><?= $l['title'] ?></h6>
                  <p><?= $l['body'] ?></p>
                  <a href="<?= base_url('main/labView/') . encrypt_url($l['id']); ?>" class="btn btn-primary btn-icon btn-icon-right btn-sm btn-pill"><b>READ MORE</b></a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<script src="<?= base_url('assets/js/tambahan.js'); ?>"></script>
<script>
  $('.fik-carousel-karya').owlCarousel({
    margin: 0,
    loop: true,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    items: 1
  });
</script>