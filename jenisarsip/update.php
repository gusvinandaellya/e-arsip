<?php
session_start();
require_once '../helper/connection.php';

$id = $_POST['id'];
$jenis = $_POST['jenis'];
$jeniskode = $_POST['jeniskode'];

// Hash the password using the password_hash function
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$query = mysqli_query($connection,
  "UPDATE jenis_arsip SET jenis = '$jenis' ,
                          jeniskode = '$jeniskode'
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