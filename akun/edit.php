<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$id = $_GET['id'];
$query = mysqli_query($connection, "SELECT * FROM login WHERE id='$id'");
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
                                      <td>Nama</td>
                                      <td><input class="form-control" type="text" name="nama" value="<?= $row['nama'] ?>"></td>
                                  </tr>
                                  <tr>
                                      <td>Username</td>
                                      <td><input class="form-control" type="text" name="username" value="<?= $row['username'] ?>" required></td>
                                  </tr>
                                  <tr>
                                      <td>Email</td>
                                      <td><input class="form-control" type="text" name="email" value="<?= $row['email'] ?>"></td>
                                  </tr>
                                  <tr>
                                      <td>Nomor Telepon</td>
                                      <td><input class="form-control" type="number" name="nomorhp" value="<?= $row['telepon'] ?>"></td>
                                  </tr>
                                  <tr>
                                      <td>Alamat</td>
                                      <td><input class="form-control" type="text" name="alamat" value="<?= $row['alamat'] ?>"></td>
                                  </tr>
                                  <tr>
                                      <td>Password</td>
                                      <td><input class="form-control" type="password" name="password" required></td>
                                  </tr>
                                  <tr>
                                      <td>Role</td>
                                      <td>
                                          <select class="form-control" name="role" required>
                                              <option value="">--Pilih Jenis--</option>
                                            <?php
                                            $selectedAdmin = ($row['role'] == 1) ? 'selected' : '';
                                            $selectedUser = ($row['role'] == 2) ? 'selected' : '';
                                            ?>
                                              <option value="1" <?= $selectedAdmin ?>>Admin</option>
                                              <option value="2" <?= $selectedUser ?>>User</option>
                                          </select>
                                      </td>
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