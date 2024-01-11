<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';
$jenisarsip = mysqli_query($connection, "SELECT id,jenis FROM jenis_arsip");

?>

    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h1>Tambah Arsip</h1>
            <a href="./index.php" class="btn btn-light">Kembali</a>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- // Form -->
                        <form action="./store.php" method="POST" enctype="multipart/form-data">
                            <table cellpadding="8" class="w-100">
                                <tr>
                                    <td>Kode Pelaksana</td>
                                    <td><input class="form-control" type="text" name="kode_pelaksana"></td>
                                </tr>
                                <tr>
                                    <td>Kode Klasifikasi</td>
                                    <td>
                                        <select class="form-control" name="kode_klasifikasi" id="kode_klasifikasi" required>
                                            <option value="">--Pilih Jenis--</option>
                                          <?php
                                          while ($r = mysqli_fetch_array($jenisarsip)) :
                                            ?>
                                              <option value="<?= $r['id'] ?>"><?= $r['jenis'] ?></option>
                                          <?php
                                          endwhile;
                                          ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nomor Surat</td>
                                    <td><input class="form-control" type="text" name="nomor_surat"></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Surat</td>
                                    <td><input class="form-control" type="date" name="tanggal_surat"></td>
                                </tr>
                                <tr>
                                    <td>Kepada</td>
                                    <td><input class="form-control" type="text" name="kepada"></td>
                                </tr>
                                <tr>
                                    <td>Uraian Informasi</td>
                                    <td><textarea class="form-control" name="uraian_informasi"></textarea></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Arsip</td>
                                    <td><input class="form-control" type="number" name="jumlah_arsip"></td>
                                </tr>
                                <tr>
                                    <td>Nomor Box</td>
                                    <td><input class="form-control" type="text" name="nomor_box"></td>
                                </tr>
                                <tr>
                                    <td>Nomor Berkas</td>
                                    <td><input class="form-control" type="text" name="nomor_berkas"></td>
                                </tr>
                                <tr>
                                    <td>Upload Berkas</td>
                                    <td><input class="form-control" type="file" name="upload_berkas"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="btn btn-primary" type="submit" name="proses" value="Simpan">
                                        <input class="btn btn-danger" type="reset" name="batal" value="Bersihkan">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
    </section>

<?php
require_once '../layout/_bottom.php';
?>