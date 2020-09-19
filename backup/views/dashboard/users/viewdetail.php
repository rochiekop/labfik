<!-- Main Container -->
<main class="akun-container">

    <div class="fik-section-title2">
        <h4>
            Detail Tugas Akhir Mahasiswa
        </h4>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <br>
    <table>
        <thead>
            <th style="width: 120px;"></th>
            <th style="width: 10px;"></th>
            <th></th>
        </thead>
        <tbody>
            <tr>
                <td style="width: 20px;">Judul 1</td>
                <td>:</td>
                <td><?= $mhs['judul_1'] ?></td>
            </tr>
            <?php if ($mhs['judul_2'] != '') : ?>
                <tr>
                    <td style="width: 20px;">Judul 2</td>
                    <td>:</td>
                    <td><?= $mhs['judul_2'] ?></td>
                </tr>
            <?php elseif ($mhs['judul_3'] != '') : ?>
                <tr>
                    <td style="width: 20px;">Judul 3</td>
                    <td>:</td>
                    <td><?= $mhs['judul_3'] ?></td>
                </tr>
            <?php endif; ?>
            <tr>
                <td>Dosen Pembimbing 1</td>
                <td>:</td>
                <td><?= $dosbing1 ?></td>
            </tr>
            <tr>
                <td>Dosen Pembimbing 2</td>
                <td>:</td>
                <td><?= $dosbing2 ?></td>
            </tr>
        </tbody>
    </table>
    <br>
</main>
<!-- End Main Container -->