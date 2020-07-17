<div class="fik-content">

  <div class="owl-carousel owl-theme fik-carousel-karya">
    <div class="item">
      <img src="<?= base_url('assets/img/11.jpg'); ?>" alt="" />
      <p>by Fulan bin Fulan</p>
    </div>
    <div class="item">
      <img src="<?= base_url('assets/img/15.jpg') ?>" alt="" />
      <p>by Mimin Ganteng</p>
    </div>
    <div class="item">
      <img src="<?= base_url('assets/img/16.jpg') ?>" alt="" />
      <p>by Fulan</p>
    </div>
    <div class="item">
      <img src="<?= base_url('assets/img/7.jpg') ?>" alt="" />
      <p>by Fulan bin</p>
    </div>
  </div>

  <div class="container">

    <ul class="prodi-cat">
      <li><a href="galeri-dkv.html" class="btn btn-block dkv-color"><b>Desain Komunikasi Visual</b> <span>Desain Komunikasi Visual</span></a></li>
      <li><a href="#" class="btn btn-block dp-color"><b>Desain Produk</b> <span>Desain Produk</span></a></li>
      <li><a href="#" class="btn btn-block di-color"><b>Desain Interior</b> <span>Desain Interior</span></a></li>
      <li><a href="#" class="btn btn-block ktm-color"><b>Kriya Tekstil Mode</b> <span>Kriya Tekstil Mode</span></a></li>
      <li><a href="#" class="btn btn-block sr-color"><b>Seni Rupa Intermedia</b> <span>Seni Rupa Intermedia</span></a></li>
    </ul>

    <div class="fik-feed galeri-karya">
      <div class="feed-container">
        <div class="feed-item">
          <div class="card">
            <div class="gambar">
              <a href="<?= base_url('main/galleryView') ?>"><img src="<?= base_url('assets/img/1.jpg'); ?>" alt="" /></a>
            </div>
            <div class="item-text">
              <h6><a href="galeri-view.html">Judul Karya Lorem Ipsum Dolor Sit Amet</a></h6>
              <span>by <b>Chisato</b></span>
              <div class="vote">
                <a href="#" title="Upvote"><i class="fas fa-chevron-up"></i> <span>1.2K</span></a>
                <a href="#" title="Downvote"><i class="fas fa-chevron-down"></i> <span>2</span></a>
                <a><i class="fas fa-eye"></i> <span>3.2K</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="feed-item">
          <div class="card">
            <div class="gambar">
              <a href="galeri-view.html"><img src="<?= base_url('assets/img/1.jpg') ?>" alt="" /></a>
            </div>
            <div class="item-text">
              <h6><a href="galeri-view.html">Judul Karya Lorem Ipsum Dolor Sit Amet</a></h6>
              <span>by <b>Chisato</b></span>
              <div class="vote">
                <a href="#" title="Upvote"><i class="fas fa-chevron-up"></i> <span>1.2K</span></a>
                <a href="#" title="Downvote"><i class="fas fa-chevron-down"></i> <span>2</span></a>
                <a><i class="fas fa-eye"></i> <span>3.2K</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="feed-item">
          <div class="card">
            <div class="gambar">
              <a href="galeri-view.html"><img src="<?= base_url('assets/img/1.jpg') ?>" alt="" /></a>
            </div>
            <div class="item-text">
              <h6><a href="galeri-view.html">Judul Karya Lorem Ipsum Dolor Sit Amet</a></h6>
              <span>by <b>Chisato</b></span>
              <div class="vote">
                <a href="#" title="Upvote"><i class="fas fa-chevron-up"></i> <span>1.2K</span></a>
                <a href="#" title="Downvote"><i class="fas fa-chevron-down"></i> <span>2</span></a>
                <a><i class="fas fa-eye"></i> <span>3.2K</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="feed-item">
          <div class="card">
            <div class="gambar">
              <a href="galeri-view.html"><img src="<?= base_url('assets/img/1.jpg') ?>" alt="" /></a>
            </div>
            <div class="item-text">
              <h6><a href="galeri-view.html">Judul Karya Lorem Ipsum Dolor Sit Amet</a></h6>
              <span>by <b>Chisato</b></span>
              <div class="vote">
                <a href="#" title="Upvote"><i class="fas fa-chevron-up"></i> <span>1.2K</span></a>
                <a href="#" title="Downvote"><i class="fas fa-chevron-down"></i> <span>2</span></a>
                <a><i class="fas fa-eye"></i> <span>3.2K</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="text-center" style="margin-top:14px">
      <div class="btn btn-primary btn-pill btn-icon btn-icon-left fik-show-more-btn"><span class="fas fa-spinner fa-spin"></span> <b>Loading ....</b></div>
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