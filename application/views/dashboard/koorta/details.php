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
          <td style="width: 20px;">Dosen Pembimbing 1</td>
          <td>:</td>
          <td><?= $dosbing1 ?></td>
        </tr>
        <tr>
          <td style="width: 20px;">Dosen Pembimbing 2</td>
          <td>:</td>
          <td><?= $dosbing2 ?></td>
        </tr>
        <tr>
          <td style="width: 20px;">Kel. Keahlian</td>
          <td>:</td>
          <?php if ($data['kelompok_keahlian'] == "") : ?>
            <td></td>
          <?php elseif ($data['kelompok_keahlian'] !== "") : ?>
            <?php if (substr($data['kelompok_keahlian'], 0, 5) == "Ketua") : ?>
              <td><?= substr($data['kelompok_keahlian'], 6) ?></td>
            <?php else : ?>
              <td><?= $data['kelompok_keahlian'] ?></td>
            <?php endif; ?>
          <?php endif; ?>
        </tr>
        <tr>
          <td style="width: 20px;">Dosen Wali</td>
          <td>:</td>
          <td><?= $doswal ?></td>
        </tr>
        <tr>
          <td>Tahun</td>
          <td>:</td>
          <td><?= $tahun ?></td>
        </tr>
      </tbody>
    </table>
  </main>
  <!-- End Main Container -->