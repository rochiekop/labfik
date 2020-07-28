<div class="fik-content">

  <div class="the-title" style="margin-bottom:-48px;">
    <img src="<?= base_url('assets/img/14.jpg') ?>" alt="">
    <div class="container">
      <h1><?= $labview['title'] ?></h1>
      <div class="post-info">
        <span class="author-info">
        </span>
        <div class="clear"></div>
      </div>
    </div>
  </div>

  <div class="container">

    <div class="post-container karya card card-body" style="border-bottom:0">
      <img src="<?= base_url('assets/img/laboratorium/') . $labview['images'] ?>" alt="<?= $labview['title'] ?>">
      <div class="caption">
        <?= $labview['body'] ?>
      </div>
    </div>

  </div>
</div>