<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$result = mysqli_query($connection, "SELECT * FROM arsip LEFT JOIN jenis_arsip ON arsip.kode_klasifikasi = jenis_arsip.id");
?>

<section class="section">
    <div class="section-header d-flex justify-content-between">
        <h1>Temu Kembali</h1>
        <a href="../arsip/create.php" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped w-100" id="temukembali">
                            <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Kode Pelaksana</th>
                                <th>Kode Klasifikasi</th>
                                <th>Nomor Surat</th>
                                <th>Tanggal Surat</th>
                                <th>Kepada</th>
                                <th>Uraian Informasi</th>
                                <th>Jumlah Arsip</th>
                                <th>Nomor Box</th>
                                <th>Berkas</th>
                            </tr>
                            <tr class="text-center">
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            while ($data = mysqli_fetch_array($result)) :
                              ?>

                                <tr class="text-center">
                                    <td><?= $no ?></td>
                                    <td><?= $data['kode_pelaksana'] ?></td>
                                    <td><?= $data['jenis'] ?></td>
                                    <td><?= $data['nomor_surat'] ?></td>
                                    <td><?= $data['tanggal_surat'] ?></td>
                                    <td><?= $data['kepada'] ?></td>
                                    <td><?= $data['uraian_informasi'] ?></td>
                                    <td><?= $data['jumlah_arsip'] ?></td>
                                    <td><?= $data['nomor_box'] ?></td>
                                    <td><a href="<?= $data['upload_berkas'] ?>"><?= str_replace('../uploads/', '', $data['upload_berkas']) ?></a></td>
                                </tr>

                              <?php
                              $no++;
                            endwhile;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>
<!-- Page Specific JS File -->
<?php
if (isset($_SESSION['info'])) :
  if ($_SESSION['info']['status'] == 'success') {
    ?>
      <script>
          iziToast.success({
              title: 'Sukses',
              message: `<?= $_SESSION['info']['message'] ?>`,
              position: 'topCenter',
              timeout: 5000
          });
      </script>
    <?php
  } else {
    ?>
      <script>
          iziToast.error({
              title: 'Gagal',
              message: `<?= $_SESSION['info']['message'] ?>`,
              timeout: 5000,
              position: 'topCenter'
          });
      </script>
    <?php
  }

  unset($_SESSION['info']);
  $_SESSION['info'] = null;
endif;
?>
<script src="../assets/js/page/modules-datatables.js"></script>

