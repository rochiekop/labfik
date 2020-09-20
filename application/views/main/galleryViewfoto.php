<div class="fik-content" style="padding-top:20px;">
    <div class="container">

        <div class="pembuat-karya">
            <h6><?= $tampilan->judul ?></h6>
            by <b><?= $tampilan->nama ?></b>
            <div class="stat-vote">
                <a onclick="savelike('<?= $tampilan->id_tampilan; ?>');" title="Upvote"><i class="fas fa-chevron-up"></i>
                    <span id="like_<?php echo $tampilan->id_tampilan; ?>">
                        <?php if ($tampilan->likes > 0) {
                            echo $tampilan->likes;
                        } else {
                            echo 'Upvote';
                        } ?>
                    </span></a>
                <a><i class="fas fa-eye"></i><?= $tampilan->views ?></a>
            </div>
        </div>
        <div class="karya">
            <img src=" <?= base_url("assets/upload/images/" . $tampilan->gambar) ?>" style="margin:auto!important;background-color:#000;width:100%;max-height:624px;" alt="<?= $tampilan->judul ?>">
            <div class="caption">
                <?= $tampilan->deskripsi ?>
            </div>
        </div>
        <h6>Kamu Mungkin Menyukai Ini</h6>
        <br>

        <div class="fik-feed galeri-karya">
            <div class="feed-container">
                <?php foreach ($home as $home) { ?>
                    <div class="feed-item">
                        <div class="card">
                            <div class="gambar">
                                <a href="<?= base_url("galery/detailfoto/" . $home->slug_tampilan) ?>">
                                    <img class="card" src="<?= base_url("assets/upload/images/" . $home->gambar) ?>" alt="<?= $home->judul ?>" />
                                </a>
                            </div>
                            <div class="item-text">
                                <h6><a href="<?= base_url("galery/detail/" . $home->slug_tampilan) ?>"><?= $home->judul ?></a></h6>
                                <span>by <b><?= $home->nama ?></b></span>
                                <div class="vote">
                                    <a title="Upvote"><i class="fas fa-chevron-up"></i> <span><?= $home->likes ?></span></a>
                                    <a><i class="fas fa-eye"></i> <span><?= $home->views ?></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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
<script>
    function savelike(id_tampilan) {
        $.ajax({
            type: "post",
            url: "<?php echo site_url('galery/savelikes'); ?>",
            data: "id_tampilan=" + id_tampilan,
            success: function(response) {
                $("#like_" + id_tampilan).html(response);

            }
        });
    }
</script>