<div class="fik-content" style="padding-top:20px;">
  <div class="container">

    <div class="pembuat-karya">
      <h6>Judul Lorem Ipsum Lorem</h6>
      by <b>Chisato</b>
      <div class="stat-vote">
        <a href="#" title="Upvote"><i class="fas fa-chevron-up"></i> 1.2K</a>
        <a href="#" title="Downvote"><i class="fas fa-chevron-down"></i> 2</a>
        <a><i class="fas fa-eye"></i> 3.1K</a>
      </div>
    </div>
    <div class="karya">
      <img src="<?= base_url('assets/img/7.jpg'); ?>" alt="">
      <div class="caption">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid, quaerat ut ab atque quae sunt quidem aspernatur beatae provident explicabo odio harum nisi laudantium sequi amet! Ipsa amet alias explicabo!
      </div>
    </div>
    <h6>You Might Also Like Theese</h6>
    <br>

    <div class="fik-feed galeri-karya">
      <div class="feed-container">
        <div class="feed-item">
          <div class="card">
            <div class="gambar">
              <a href="galeri-view.html"><img src="_assets/img/1.jpg" alt="" /></a>
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
              <a href="galeri-view.html"><img src="_assets/img/1.jpg" alt="" /></a>
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
              <a href="galeri-view.html"><img src="_assets/img/1.jpg" alt="" /></a>
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
              <a href="galeri-view.html"><img src="_assets/img/1.jpg" alt="" /></a>
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