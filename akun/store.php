<?php
session_start();
require_once '../helper/connection.php';

$nama = $_POST['nama'];
$username = $_POST['username'];
$email = $_POST['email'];
$nomorhp = $_POST['nomorhp'];
$alamat = $_POST['alamat'];
$password = $_POST['password'];
$role = $_POST['role'];

// Hash the password using the password_hash function
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sks = $_POST['sks'];
$query = mysqli_query($connection,
  "INSERT INTO login (username, nama, email, telepon, alamat, password, role) 
    VALUES ('$username', '$nama', '$email', '$nomorhp', '$alamat', '$hashedPassword', '$role')
    ");

if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menambah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}