<?php
session_start();
require_once '../helper/connection.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$email = $_POST['email'];
$nomorhp = $_POST['nomorhp'];
$alamat = $_POST['alamat'];
$password = $_POST['password'];
$role = $_POST['role'];

// Hash the password using the password_hash function
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$query = mysqli_query($connection,
  "UPDATE login SET username = '$username', 
                      nama = '$nama',
                      email = '$email',
                      telepon = '$nomorhp',
                      alamat = '$alamat',
                      password = '$hashedPassword',
                      role = '$role'
                  WHERE id = '$id'
                  ");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil mengubah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}