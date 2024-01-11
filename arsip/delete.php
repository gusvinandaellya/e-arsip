<?php
session_start();
require_once '../helper/connection.php';

$id = $_GET['id'];

// Retrieve the file path before deleting the record
$file_query = mysqli_query($connection, "SELECT upload_berkas FROM arsip WHERE id='$id'");
$file_row = mysqli_fetch_assoc($file_query);
$file_path = $file_row['upload_berkas'];

// Delete the record from the database
$result = mysqli_query($connection, "DELETE FROM arsip WHERE id='$id'");

if (mysqli_affected_rows($connection) > 0) {
  // If the record is deleted successfully from the database, then delete the associated file
  if ($file_path && file_exists($file_path)) {
    unlink($file_path);
  }

  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menghapus data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}