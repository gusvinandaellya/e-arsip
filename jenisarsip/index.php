<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

// Query untuk mendapatkan data jenis arsip beserta jumlah arsip untuk setiap jenis
$result = mysqli_query($connection, "SELECT jenis_arsip.id, jenis_arsip.jenis, jenis_arsip.jeniskode, jenis_arsip.hakguna, COUNT(arsip.id) * MAX(arsip.jumlah_arsip) as jumlah
FROM jenis_arsip
LEFT JOIN arsip ON jenis_arsip.id = arsip.kode_klasifikasi
GROUP BY jenis_arsip.id, jenis_arsip.jenis;
");

?>

<section class="section">
    <div class="section-header d-flex justify-content-between">
        <h1>Klasifikasi Arsip</h1>
        <a href="./create.php" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped w-100" id="klasifikasi-arsip">
                            <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Kode Klasifikasi</th>
                                <th>Masalah</th>
                                <!-- <th>Jumlah</th> -->
                                <!-- <th>Hak Guna</th> -->
                                <th style="width: 150">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            while ($data = mysqli_fetch_array($result)) :
                              ?>
                                <tr class="text-center">
                                    <td><?= $no ?></td>
                                    <td><?= $data['jeniskode'] ?></td>
                                    <td><?= $data['jenis'] ?></td>
                                    <!-- <td><?= !empty($data['jumlah']) ? $data['jumlah'] : 0 ?></td> -->
                                    <!-- <td><span class="badge badge-primary"><?= $data['hakguna'] ?></span></td> -->
                                    <td>
                                      <?php if ($_SESSION['login']['role'] == 1): ?>
                                          <a class="btn btn-sm btn-danger mb-md-0 mb-1"
                                             href="delete.php?id=<?= $data['id'] ?>">
                                              <i class="fas fa-trash fa-fw"></i>
                                          </a>
                                      <?php endif; ?>
                                        <a class="btn btn-sm btn-info" href="edit.php?id=<?= $data['id'] ?>">
                                            <i class="fas fa-edit fa-fw"></i>
                                        </a>
                                    </td>
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
