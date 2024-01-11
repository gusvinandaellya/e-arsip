<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$result = mysqli_query($connection, "SELECT * FROM login");
?>

<section class="section">
    <div class="section-header d-flex justify-content-between">
        <h1>List Akun</h1>
        <a href="./create.php" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped w-100" id="table-1">
                            <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
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
                                    <td><?= $data['username'] ?></td>
                                    <td><?= $data['email'] ?></td>
                                    <td><?= ($data['role'] == 1) ? 'admin' : 'user' ?></td>
                                    <td>
                                        <a style="color: white" class="btn btn-sm btn-primary mb-md-0 mb-1"
                                           onclick="showDetail(<?= $data['id'] ?>)">
                                            <i class="fas fa-eye fa-fw"></i>
                                        </a>
                                        <a class="btn btn-sm btn-danger mb-md-0 mb-1"
                                           href="delete.php?id=<?= $data['id'] ?>">
                                            <i class="fas fa-trash fa-fw"></i>
                                        </a>
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