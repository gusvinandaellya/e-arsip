<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';
$jenisarsip = mysqli_query($connection, "SELECT id, jenis FROM jenis_arsip");

$id = $_GET['id'];
$query = mysqli_query($connection, "SELECT * FROM arsip WHERE id='$id'");
?>

<section class="section">
    <div class="section-header d-flex justify-content-between">
        <h1>Ubah Data Arsip</h1>
        <a href="./index.php" class="btn btn-light">Kembali</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Form -->
                    <form action="./update.php" method="POST" enctype="multipart/form-data">
                      <?php
                      while ($row = mysqli_fetch_array($query)) {
                        ?>
                          <input type="hidden" name="id" value="<?= $row['id'] ?>">
                          <table cellpadding="8" class="w-100">
                              <tr>
                                  <td>Kode Pelaksana</td>
                                  <td><input class="form-control" type="text" name="kode_pelaksana" value="<?= $row['kode_pelaksana'] ?>"></td>
                              </tr>
                              <tr>
                                  <td>Kode Klasifikasi</td>
                                  <td>
                                      <select class="form-control" name="kode_klasifikasi" required>
                                          <option value="">--Pilih Jenis--</option>
                                        <?php
                                        while ($r = mysqli_fetch_array($jenisarsip)) :
                                          $selected = ($row['kode_klasifikasi'] == $r['id']) ? 'selected' : '';
                                          ?>
                                            <option value="<?= $r['id'] ?>" <?= $selected ?>><?= $r['jenis'] ?></option>
                                        <?php
                                        endwhile;
                                        ?>
                                      </select>
                                  </td>
                              </tr>
                              <tr>
                                  <td>Nomor Surat</td>
                                  <td><input class="form-control" type="text" name="nomor_surat" value="<?= $row['nomor_surat'] ?>"></td>
                              </tr>
                              <tr>
                                  <td>Tanggal Surat</td>
                                  <td><input class="form-control" type="date" name="tanggal_surat" value="<?= $row['tanggal_surat'] ?>"></td>
                              </tr>
                              <tr>
                                  <td>Kepada</td>
                                  <td><input class="form-control" type="text" name="kepada" value="<?= $row['kepada'] ?>"></td>
                              </tr>
                              <tr>
                                  <td>Uraian Informasi</td>
                                  <td><textarea class="form-control" name="uraian_informasi"><?= $row['uraian_informasi'] ?></textarea></td>
                              </tr>
                              <tr>
                                  <td>Jumlah Arsip</td>
                                  <td><input class="form-control" type="number" name="jumlah_arsip" value="<?= $row['jumlah_arsip'] ?>"></td>
                              </tr>
                              <tr>
                                  <td>Nomor Box</td>
                                  <td><input class="form-control" type="text" name="nomor_box" value="<?= $row['nomor_box'] ?>"></td>
                              </tr>
                              <tr>
                                  <td>Nomor Box</td>
                                  <td><input class="form-control" type="text" name="nomor_berkas" value="<?= $row['nomor_berkas'] ?>"></td>
                              </tr>
                              <tr>
                                  <td>Upload Berkas</td>
                                  <td>
                                      <input class="form-control" type="file" name="upload_berkas">
                                      <small class="text-muted">Leave it blank if you don't want to update the file.</small>
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      <input class="btn btn-primary" type="submit" name="proses" value="Ubah">
                                      <input class="btn btn-danger" type="reset" name="batal" value="Bersihkan">
                                  </td>
                              </tr>
                          </table>
                      <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>
