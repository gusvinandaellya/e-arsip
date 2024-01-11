<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$id = $_GET['id'];
$query = mysqli_query($connection, "SELECT * FROM jenis_arsip WHERE id='$id'");
?>

    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h1>Ubah Data Akun</h1>
            <a href="./index.php" class="btn btn-light">Kembali</a>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- // Form -->
                        <form action="./update.php" method="post">
                          <?php
                          while ($row = mysqli_fetch_array($query)) {
                            ?>
                              <input type="hidden" name="id" value="<?= $row['id'] ?>">
                              <table cellpadding="8" class="w-100">
                                  <tr>
                                      <td>Kode</td>
                                      <td><input class="form-control" type="text" name="jeniskode" value="<?= $row['jeniskode'] ?>"></td>
                                  </tr>
                                  <tr>
                                      <td>Masalah</td>
                                      <td><input class="form-control" type="text" name="jenis" value="<?= $row['jenis'] ?>"></td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <input class="btn btn-primary d-inline" type="submit" name="proses"
                                                 value="Ubah">
                                          <a href="./index.php" class="btn btn-danger ml-1">Batal</a>
                                      <td>
                                  </tr>
                              </table>

                          <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
    </section>

<?php
require_once '../layout/_bottom.php';
?>