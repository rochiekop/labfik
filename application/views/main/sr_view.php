<div class="fik-content">

    <div class="owl-carousel owl-theme fik-carousel-karya">
        <?php $codeview = 0 ?>
        <?php foreach ($tampilan as $tampilan) { ?>
            <?php $codeview++; ?>
            <?php if ($codeview == 1) { ?>
                <div class="item">
                    <img src="<?= base_url('assets/upload/images/' . $tampilan->gambar) ?>" alt="" />
                    <p><?= $tampilan->name ?></p>
                </div>
            <?php } else { ?>
                <div class="item">
                    <img src="<?= base_url('assets/upload/images/' . $tampilan->gambar) ?>" alt="" />
                    <p><?= $tampilan->name ?></p>
                </div>
        <?php }
        } ?>
    </div>

    <div class="container">

        <ul class="prodi-cat">
            <li><a href="<?= base_url('galery/kategori1') ?>" class="btn btn-block dkv-color"><b>Desain Komunikasi Visual</b> <span>Desain
                        Komunikasi Visual</span></a></li>
            <li><a href="<?= base_url('galery/kategori2') ?>" class="btn btn-block dp-color"><b>Desain Produk</b> <span>Desain Produk</span></a></li>
            <li><a href="<?= base_url('galery/kategori3') ?>" class="btn btn-block di-color"><b>Desain Interior</b> <span>Desain Interior</span></a></li>
            <li><a href="<?= base_url('galery/kategori4') ?>" class="btn btn-block ktm-color"><b>Kriya Tekstil Mode</b> <span>Kriya Tekstil Mode</span></a>
            </li>
            <li><a href="<?= base_url('galery/kategori5') ?>" class="btn btn-block sr-color"><b>Seni Rupa Intermedia</b> <span>Seni Rupa Intermedia</span></a>
        </ul>

        <div class="fik-section-title text-center">
            <h3>Seni Rupa Gallery</h3>
            <p>karya mahasiswa seni rupa</p>
        </div>

        <div class="fik-feed galeri-karya">
            <div class="feed-container" id="load_data">
            </div>
        </div>

        <div id="load_data_message"></div>
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
    $(document).ready(function() {

        var limit = 4;
        var start = 0;
        var action = 'inactive';

        function lazzy_loader(limit) {
            var output = '';
            for (var count = 3; count < limit; count++) {
                output += '<div class="text-center" style="margin-top:14px">';
                output += '<div class="btn btn-primary btn-pill btn-icon btn-icon-left fik-show-more-btn"><span class="fas fa-spinner fa-spin"></span> <b>Loading ....</b></div>';
                output += '</div>';
            }
            $('#load_data_message').html(output);
        }

        lazzy_loader(limit);

        function load_data(limit, start) {
            $.ajax({
                url: "<?php echo base_url(); ?>galery/fetch5",
                method: "POST",
                data: {
                    limit: limit,
                    start: start
                },
                cache: false,
                success: function(data) {
                    if (data == '') {
                        $("#load_data_message").fadeOut(1000);
                        action = 'active';
                    } else {
                        $('#load_data').append(data);
                        $('#load_data_message').html("");
                        action = 'inactive';
                    }
                }
            })
        }

        if (action == 'inactive') {
            action = 'active';
            load_data(limit, start);
        }

        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive') {
                lazzy_loader(limit);
                action = 'active';
                start = start + limit;
                setTimeout(function() {
                    load_data(limit, start);
                }, 1000);
            }
        });

    });
</script>