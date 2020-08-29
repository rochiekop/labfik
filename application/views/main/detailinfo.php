<div class="fik-content">

  <div class="the-title" style="margin-bottom:-48px;">
    <img src="<?= base_url('assets/img/14.jpg') ?>" alt="">
    <div class="container">
      <?php if (empty($detailinfo)) : ?>
        <h1>Info Tidak Ada!</h1>
      <?php else : ?>
        <h1><?= $detailinfo['title'] ?></h1>
        <div class="post-info">
          <span class="author-info">
            <a href="<?= base_url() ?>">beranda</a> / <a href="<?= base_url() ?>">news</a> / <?= $detailinfo['title'] ?>
            <br>
            <div style="margin-top:6px;">Diposting pada <?= format_indo($detailinfo['date'], date('d-m-Y')); ?> oleh <?= $detailinfo['uploadby'] ?></div>
          </span>
          <div class="clear"></div>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <div class="container">

    <div class="post-container karya card card-body" style="border-bottom:0">
      <img src="<?= base_url('assets/img/informasi/') . $detailinfo['images'] ?>" alt="">
      <div class="post-content caption">
        <?= $detailinfo['body'] ?>
      </div>
      <div class="share-item">
        <ul>
          <li class="facebook">
            <a href="http://www.facebook.com/sharer.php?'<?= current_url() ?>'" rel="nofollow" target="_blank" title="Share: Facebook">
              <svg viewBox="0 0 24 24">
                <path d="M17,2V2H17V6H15C14.31,6 14,6.81 14,7.5V10H14L17,10V14H14V22H10V14H7V10H10V6A4,4 0 0,1 14,2H17Z"></path>
              </svg>
            </a>
          </li>
          <li class="twitter">
            <a href="http://twitter.com/share?url=<?= current_url() ?>" rel="nofollow" target="_blank" title="Share: Twitter">
              <svg viewBox="0 0 24 24">
                <path d="M22.46,6C21.69,6.35 20.86,6.58 20,6.69C20.88,6.16 21.56,5.32 21.88,4.31C21.05,4.81 20.13,5.16 19.16,5.36C18.37,4.5 17.26,4 16,4C13.65,4 11.73,5.92 11.73,8.29C11.73,8.63 11.77,8.96 11.84,9.27C8.28,9.09 5.11,7.38 3,4.79C2.63,5.42 2.42,6.16 2.42,6.94C2.42,8.43 3.17,9.75 4.33,10.5C3.62,10.5 2.96,10.3 2.38,10C2.38,10 2.38,10 2.38,10.03C2.38,12.11 3.86,13.85 5.82,14.24C5.46,14.34 5.08,14.39 4.69,14.39C4.42,14.39 4.15,14.36 3.89,14.31C4.43,16 6,17.26 7.89,17.29C6.43,18.45 4.58,19.13 2.56,19.13C2.22,19.13 1.88,19.11 1.54,19.07C3.44,20.29 5.7,21 8.12,21C16,21 20.33,14.46 20.33,8.79C20.33,8.6 20.33,8.42 20.32,8.23C21.16,7.63 21.88,6.87 22.46,6Z"></path>
              </svg>
            </a>
          </li>
          <li class="whatsapp">
            <a data-action="share/whatsapp/share" href="whatsapp://send?text=<?= current_url() ?>" target=" _blank" title="Share: WhatsApp">
              <svg viewBox="0 0 24 24">
                <path d="M16.75,13.96C17,14.09 17.16,14.16 17.21,14.26C17.27,14.37 17.25,14.87 17,15.44C16.8,16 15.76,16.54 15.3,16.56C14.84,16.58 14.83,16.92 12.34,15.83C9.85,14.74 8.35,12.08 8.23,11.91C8.11,11.74 7.27,10.53 7.31,9.3C7.36,8.08 8,7.5 8.26,7.26C8.5,7 8.77,6.97 8.94,7H9.41C9.56,7 9.77,6.94 9.96,7.45L10.65,9.32C10.71,9.45 10.75,9.6 10.66,9.76L10.39,10.17L10,10.59C9.88,10.71 9.74,10.84 9.88,11.09C10,11.35 10.5,12.18 11.2,12.87C12.11,13.75 12.91,14.04 13.15,14.17C13.39,14.31 13.54,14.29 13.69,14.13L14.5,13.19C14.69,12.94 14.85,13 15.08,13.08L16.75,13.96M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C10.03,22 8.2,21.43 6.65,20.45L2,22L3.55,17.35C2.57,15.8 2,13.97 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12C4,13.72 4.54,15.31 5.46,16.61L4.5,19.5L7.39,18.54C8.69,19.46 10.28,20 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4Z"></path>
              </svg>
            </a>
          </li>
          <li class="telegram">
            <a href="https://telegram.me/share/url?url=<?= current_url() ?>" target=" _blank" title="Share: Telegram">
              <svg viewBox="0 0 24 24">
                <path d="M9.78,18.65L10.06,14.42L17.74,7.5C18.08,7.19 17.67,7.04 17.22,7.31L7.74,13.3L3.64,12C2.76,11.75 2.75,11.14 3.84,10.7L19.81,4.54C20.54,4.21 21.24,4.72 20.96,5.84L18.24,18.65C18.05,19.56 17.5,19.78 16.74,19.36L12.6,16.3L10.61,18.23C10.38,18.46 10.19,18.65 9.78,18.65Z"></path>
              </svg>
            </a>
          </li>
          <li class="copyurl">
            <a onclick="copyclipboard()" title="Share: Copy Link">
              <svg viewBox="0 0 24 24">
                <path d="M19,21H8V7H19M19,5H8A2,2 0 0,0 6,7V21A2,2 0 0,0 8,23H19A2,2 0 0,0 21,21V7A2,2 0 0,0 19,5M16,1H4A2,2 0 0,0 2,3V17H4V3H16V1Z"></path>
              </svg>
            </a>
            <input class="dnone" id="copyLink" readonly="readonly" type="text" value="<?= current_url() ?>">
          </li>
        </ul>
      </div>
    </div>

    <div class="related-post fik-feed">
      <h6 style="margin-bottom:12px">Related News</h6>
      <div class="feed-container">
        <?php foreach ($relatedinfo as $i) : ?>
          <div class="feed-item">
            <div class="card">
              <div class="gambar">
                <a href="<?= base_url('news/details/') . $i->slug; ?>"><img src="<?= base_url('assets/img/informasi/thumbs/') . $i->images ?>" alt="<?= $i->title ?>" /></a>
              </div>
              <div class="item-text">
                <h6><a href="<?= base_url('news/details/') . encrypt_url($i->id); ?>"><?= $i->title ?></a></h6>
                <p>Posted <?= (new DateTime($i->date))->format('M j, Y'); ?> by <?= $i->uploadby; ?></p>
                <a href="<?= base_url('news/details/') . $i->slug; ?>" class="btn btn-primary btn-icon btn-icon-right btn-sm btn-pill"><b>READ MORE</b></a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</div>


<script src="<?= base_url('assets/js/tambahan.js'); ?>"></script>
<script>
  function copyclipboard() {
    var copyText = document.getElementById("copyLink");
    copyText.select();
    document.execCommand("copy");
    alert("Link copied to clipboard");
  }
</script>