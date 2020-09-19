  <!-- Main Container -->
  <main class="akun-container">
    <?= $this->session->flashdata('message'); ?>
    <div class="fik-section-title2">
      <h4>Details Mahasiswa</h4>
    </div>
    <table>
      <thead>
        <th style="width: 200px;"></th>
        <th style="width: 10px;"></th>
        <th></th>
      </thead>
      <tbody>
        <tr>
          <td style="width: 20px;">Judul 1</td>
          <td>:</td>
          <td><?= $details['judul_1'] ?></td>
        </tr>
        <?php if ($details['judul_2'] != '') : ?>
          <tr>
            <td style="width: 20px;">Judul 2</td>
            <td>:</td>
            <td><?= $details['judul_2'] ?></td>
          </tr>
        <?php elseif ($details['judul_3'] != '') : ?>
          <tr>
            <td style="width: 20px;">Judul 3</td>
            <td>:</td>
            <td><?= $details['judul_3'] ?></td>
          </tr>
        <?php endif; ?>
        <tr>
          <td style="width: 20px;">Dosen Wali</td>
          <td>:</td>
          <td><?= $doswal['name'] ?></td>
        </tr>
        <tr>
          <td style="width: 20px;">Kosentrasi</td>
          <td>:</td>
          <td><?= $details['peminatan'] ?></td>
        </tr>
        <tr>
          <td>Tahun</td>
          <td>:</td>
          <td><?= $details['tahun'] ?></td>
        </tr>
      </tbody>
    </table>
  </main>
  <!-- End Main Container -->