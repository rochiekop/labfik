<div class="fik-content">

  <div class="the-title" style="margin-bottom:-88px;">
    <img src="<?= base_url('assets/img/14.jpg') ?>" alt="" style="opacity:.25">
    <div class="container">
      <h1>Unit Lab</h1>
      <div class="post-info">
        <span class="author-info">
          ada lebih dari 10 lab tersedia!
        </span>
        <div class="clear"></div>
      </div>
    </div>
  </div>

  <div class="container">

    <div class="fik-feed lab text-center" style="padding-top:20px;">
      <div class="feed-container">
        <?php if (empty($dt_lab)) : ?>
          <h4>Data Laboratorium Kosong</h4>
        <?php else : ?>
          <?php foreach ($dt_lab as $l) : ?>
            <div class="feed-item feed-itemlab">
              <div class="card">
                <div class="gambar">
                  <img src="<?= base_url('assets/img/laboratorium/thumbs/') . $l['images'] ?>" alt="<?= $l['title'] ?>" />
                </div>
                <div class="item-text">
                  <h6><?= $l['title'] ?></h6>
                  <p><?= substr_replace($l['body'], "...", 100); ?></p>
                  <a href="<?= base_url('lab/details/') . $l['slug']; ?>" class="btn btn-primary btn-icon btn-icon-right btn-sm btn-pill"><b>READ MORE</b></a>
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
</div>
<script src="<?= base_url('assets/js/lab.js'); ?>"></script>
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