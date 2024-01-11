<?php
session_start();
require_once '../helper/connection.php';

$jenis = $_POST['jenis'];
$jeniskode = $_POST['jeniskode'];
// $hakguna = $_POST['hakguna'];

$sks = $_POST['sks'];
$query = mysqli_query($connection,
  "INSERT INTO jenis_arsip (jenis, jeniskode)
    VALUES ('$jenis', '$jeniskode')
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