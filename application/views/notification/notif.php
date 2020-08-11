<!-- Main Container -->
<main class="akun-container">
<div class="fik-section-title2">
    <h5>Notifikasi</h5>
</div>
<div class="card">
    <div class="card-header">
    <div class="dropdown">
        <a href="#" class="btn btn-sm btn-success">Tandai Semua Sudah Dibaca</a>
        <a href="#" class="btn btn-sm btn-danger">Hapus Semua Notifikasi</a>
        &nbsp;
        &nbsp;
        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Filter
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#">Tampilkan Sudah dibaca</a>
        <a class="dropdown-item" href="#">Tampilkan Belum dibaca</a>
        </div>
    </div>
    </div>
    <div class="card-body">
    <div class="list-group">

        <?php if (empty($notification)) { ?>
            <span>Tidak ada notifikasi</span>
        <?php } ?>
        <?php else { ?>
            <?php foreach ($notification as $n) { ?>
                <a href="<?= site_url('notification/changeStatusRead/'.$n->subject.'/'.$n->id) ?>" class="list-group-item">
                    <?php if ($n->status == 'unread') { ?>
                        <span class="fas fa-bell"></span> &nbsp;
                    <?php } ?>
                    <?php elseif ($n->status == 'read') { ?>
                        <span class="far fa-bell"></span> &nbsp;
                    <?php } ?>
                    <b><?= $n->subject ?></b> <br>

                    <?php if ($n->subject == 'Peminjaman Barang') { ?>
                        <?php if ($n->description == 'waiting') { ?>
                            <?= $n->user_name ?> ingin meminjam <?= $n->quantity ?> <?= $n->item_name ?>
                            <?= $n->date ?> 
                        <?php } ?>
                        <?php elseif ($n->description == 'approved') { ?>
                            Kepala Urusan memberikan anda izin untuk meminjam <?= $n->quantity ?> <?= $n->item_name ?>
                            <?= $n->date ?>
                        <?php } ?>
                        <?php elseif ($n->description == 'declined') { ?>
                            Kepala Urusan tidak memberikan anda izin untuk meminjam <?= $n->quantity ?> <?= $n->item_name ?>
                            <?= $n->date ?>
                        <?php } ?>
                    <?php } ?>
                    <?php elseif ($n->subject == 'Peminjaman Tempat') { ?>
                        <?php if ($n->description == 'waiting') { ?>
                            <?= $n->user_name ?> ingin meminjam <?= $n->room_name ?>
                            <?= $n->date ?>
                        <?php } ?>
                        <?php elseif ($n->description == 'approved') { ?>
                            Kepala Urusan memberikan anda izin untuk meminjam <?= $n->room_name ?>
                            <?= $n->date ?>
                        <?= } ?>
                        <?php elseif ($n->description == 'declined') { ?>
                            Kepala Urusan tidak memberikan anda izin untuk meminjam <?= $n->room_name ?>
                            <?= $n->date ?>
                        <?php } ?>
                    <?php } ?>
                    <?php elseif ($n->subject == 'Unggah Karya') { ?>
                        <?php if ($n->description == 'waiting') { ?>
                            <?= $n->user_name ?> ingin mengunggah karyanya berjudul <?= $n->creation_name ?>
                            <?= $n->date ?>
                        <?php } ?>
                        <?php elseif ($n->description == 'approved') { ?>
                            Karya anda telah terpajang di halaman lab karya
                        <?php } ?>
                        <?php elseif ($n->description == 'declined') { ?>
                            Kepala Urusan tidak mengizinkan karya anda untuk dipajang di halaman lab karya. Silahkan kontak admin jika menurut anda ini merupakan kesalahan.
                        <?php } ?>
                    <?php } ?>
                    <?php elseif ($n->subject == 'Informasi') { ?>
                        Informasi baru mengenai <?= $n->title ?>
                        <?php $n->date ?>
                    <?php } ?>
                    <?php elseif ($n->subject == 'Helpdesk') { ?>
                        Anda dihubungi oleh <?= $n->sender_name ?>, lihat dan tanggapi
                        <?php $n->date ?>
                    <?php } ?>
                    <?php elseif ($n->subject == 'Tugas Akhir') { ?>
                        <?php if ($n->description == 'waiting') { ?>
                            <?= $n->mhs_name ?> meminta bimbingan untuk Tugas Akhirnya
                        <?php } ?>
                        <?php if ($n->description == 'correction') { ?>
                            Tugas Akhir anda dikoreksi oleh dosen pembimbing, lihat dan tanggapi
                        <?php } ?>
                        <?php elseif ($n->description == 'ready') { ?>
                            Anda telah dinyatakan siap sidang. lihat selengkapnya
                        <?php } ?>
                    <?php } ?>
                </a>
            <?php } ?>
        <?php } ?>

        <!-- <a class="list-group-item">
        <span class="fas fa-bell"></span> &nbsp;
        <b>Helpdesk</b> <br>
        Fulan mengirimkan pesan di helpdesk, lihat dan tanggapi.
        </a>
        <a class="list-group-item">
        <span class="far fa-bell"></span> &nbsp;
        <b>Karya</b> <br>
        Nama Kepala Urusan sudah meng-acc karya anda dan sudah bisa dilihat di halaman karya Lab!
        </a>
        <a class="list-group-item">
        <span class="far fa-bell"></span> &nbsp;
        <b>Peminjaman Tempat</b> <br>
        Nama Kepala Urusan menolak permintaan peminjaman IK.04.04 anda. Coba lagi
        </a> -->

        <div></div>
    </div>
    </div>
    <div class="card-footer">
    <div class="btn-group mr-2" role="group" aria-label="First group">
        <button type="button" class="btn btn-secondary active">1</button>
        <button type="button" class="btn btn-secondary">2</button>
        <button type="button" class="btn btn-secondary">3</button>
        <button type="button" class="btn btn-secondary">4</button>
    </div>
    </div>
</div>
</main>
<!-- End Main Container -->