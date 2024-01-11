<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';
?>

    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h1>Tambah Akun</h1>
            <a href="./index.php" class="btn btn-light">Kembali</a>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- // Form -->
                        <form action="./store.php" method="POST">
                            <table cellpadding="8" class="w-100">
                                <tr>
                                    <td>Nama</td>
                                    <td><input class="form-control" type="text" name="nama"></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td><input class="form-control" type="text" name="username" required></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><input class="form-control" type="text" name="email"></td>
                                </tr>
                                <tr>
                                    <td>Nomor Telepon</td>
                                    <td><input class="form-control" type="number" name="nomorhp"></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><input class="form-control" type="text" name="alamat"></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><input class="form-control" type="password" name="password" required></td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td>
                                        <select class="form-control" name="role" id="role" required>
                                            <option value="">--Pilih Role--</option>
                                            <option value="1">Admin</option>
                                            <option value="2">User</option>
                                        </select>
                                    </td>
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