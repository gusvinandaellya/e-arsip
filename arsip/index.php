<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$result = mysqli_query($connection, "SELECT *, arsip.id as arsip_id FROM arsip LEFT JOIN jenis_arsip ON arsip.kode_klasifikasi = jenis_arsip.id");
?>

<section class="section">
    <div class="section-header d-flex justify-content-between">
        <h1>Arsip</h1>
        <a href="./create.php" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped w-100" id="arsip">
                            <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Kode Pelaksana</th>
                                <th>Kode Klasifikasi</th>
                                <th>Nomor Surat</th>
                                <th>Tanggal Surat</th>
                                <th style="display: none">Kepada</th>
                                <th style="display: none">Uraian Informasi</th>
                                <th style="display: none">Jumlah Arsip</th>
                                <th style="display: none">Nomor Box</th>
                                <th style="display: none">Nomor Berkas</th>
                                <th>Aksi</th>
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
                                    <td style="display: none"><?= $data['kepada']?></td>
                                    <td style="display: none"><?= $data['uraian_informasi']?></td>
                                    <td style="display: none"><?= $data['jumlah_arsip']?></td>
                                    <td style="display: none"><?= $data['nomor_box']?></td>
                                    <td style="display: none"><?= $data['nomor_berkas']?></td>
                                    <td>
                                        <a style="color: white" class="btn btn-sm btn-primary mb-md-0 mb-1"
                                           onclick="showDetail(<?= $data['arsip_id'] ?>)">
                                            <i class="fas fa-eye fa-fw"></i>
                                        </a>
                                      <?php if ($_SESSION['login']['role'] == 1): ?>
                                          <a class="btn btn-sm btn-danger mb-md-0 mb-1"
                                             href="delete.php?id=<?= $data['arsip_id'] ?>">
                                              <i class="fas fa-trash fa-fw"></i>
                                          </a>
                                      <?php endif; ?>
                                        <a class="btn btn-sm btn-info" href="edit.php?id=<?= $data['arsip_id'] ?>">
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

</section>

<!-- Add this modal code somewhere in your HTML, possibly at the end of your body tag -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Content will be dynamically added here using JavaScript -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

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
<script>
    function showDetail(id) {
        console.log(id);
        // Use AJAX to fetch details from the server
        $.ajax({
            url: './getdatabyid.php', // Replace with the correct path to your PHP file
            type: 'POST',
            data: {id: id},
            success: function (response) {
                // Update the modal content with the details received from PHP
                $('#detailModal .modal-body').html(response);

                // Show the modal
                $('#detailModal').modal('show');
            },
            error: function () {
                console.error('Error fetching details');
            }
        });
    }
</script>

<script src="../assets/js/page/modules-datatables.js"></script>

