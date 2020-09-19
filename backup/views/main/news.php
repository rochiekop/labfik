<div class="fik-content">

  <div class="the-title" style="margin-bottom:-88px;">
    <img src="<?= base_url('assets/img/14.jpg') ?>" alt="">
    <div class="container">
      <h1>News</h1>
      <div class="post-info">
        <span class="author-info">
          informasi terbaru mengenai lab diupdate disini
        </span>
        <div class="clear"></div>
      </div>
    </div>
  </div>

  <div class="container">

    <div class="fik-feed margin-t50">
      <div class="container text-center">
        <div class="feed-container">
          <?php if (empty($info)) : ?>
          <?php else : ?>
            <?php foreach ($info as $i) : ?>
              <div class="feed-item news">
                <div class="card">
                  <div class="gambar">
                    <img src="<?= base_url('assets/img/informasi/thumbs/') . $i['images']; ?>" alt="<?= $i['title'] ?>" />
                  </div>
                  <div class="item-text">
                    <h6><a href="<?= base_url('news/details/') . $i['slug']; ?>"><?= $i['title'] ?></a></h6>
                    <p>Posted <?= (new DateTime($i['date']))->format('M j, Y'); ?> by <?= $i['uploadby']; ?></p>
                    <a href="<?= base_url('news/details/') . $i['slug']; ?>" class="btn btn-primary btn-icon btn-icon-right btn-sm btn-pill"><b>READ MORE</b></a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <div style="margin-top:20px">
          <div class="btn btn-primary btn-pill btn-icon btn-icon-left btn-icon-right fik-show-more-btn" id="loadMore"><span class="fas fa-chevron-down"></span><b>SHOW MORE</b><span class="fas fa-chevron-down"></span></div>
        </div>
      </div>
    </div>

  </div>
</div>
<script src="<?= base_url('assets/js/tambahan.js') ?>"></script>
<script>
  $(".news").slice(0, 6).show();
  if ($(".news:hidden").length != 0) {
    $("#loadMore").show();
  } else {
    $("#loadMore").hide();
  }
  $("#loadMore").on('click', function(e) {
    e.preventDefault();
    $(".news:hidden").slice(0, 3).slideDown();
    if ($(".news:hidden").length == 0) {
      $("#loadMore").fadeOut('slow');
    }
  });
  $('.fik-carousel-karya').owlCarousel({
    margin: 0,
    loop: true,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    items: 1
  });
</script>