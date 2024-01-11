<?php
session_start();
require_once '../helper/connection.php';

$id = $_POST['id'];
$kode_pelaksana = $_POST['kode_pelaksana'];
$kode_klasifikasi = $_POST['kode_klasifikasi'];
$nomor_surat = $_POST['nomor_surat'];
$tanggal_surat = $_POST['tanggal_surat'];
$kepada = $_POST['kepada'];
$uraian_informasi = $_POST['uraian_informasi'];
$jumlah_arsip = $_POST['jumlah_arsip'];
$nomor_box = $_POST['nomor_box'];
$nomor_berkas = $_POST['nomor_berkas'];

// Check if a new file is uploaded
if (!empty($_FILES['upload_berkas']['name'])) {
  // Get the old file path
  $old_file_query = mysqli_query($connection, "SELECT upload_berkas FROM arsip WHERE id = '$id'");
  $old_file_row = mysqli_fetch_assoc($old_file_query);
  $old_file_path = $old_file_row['upload_berkas'];

  // Delete the old file
  if ($old_file_path && file_exists($old_file_path)) {
    unlink($old_file_path);
  }

  // Handle file upload for the new file
  $upload_dir = '../uploads/';
  $upload_file = $upload_dir . time() . '_' . basename($_FILES['upload_berkas']['name']);

  if (move_uploaded_file($_FILES['upload_berkas']['tmp_name'], $upload_file)) {
    // File upload successful, continue with database update including the new file
    $query = mysqli_query($connection,
      "UPDATE arsip SET
        kode_pelaksana = '$kode_pelaksana',
        kode_klasifikasi = '$kode_klasifikasi',
        nomor_surat = '$nomor_surat',
        tanggal_surat = '$tanggal_surat',
        kepada = '$kepada',
        uraian_informasi = '$uraian_informasi',
        jumlah_arsip = '$jumlah_arsip',
        nomor_box = '$nomor_box',
        nomor_berkas = '$nomor_berkas',
        upload_berkas = '$upload_file'
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
  } else {
    // File upload failed
    $_SESSION['info'] = [
      'status' => 'failed',
      'message' => 'File upload failed'
    ];
    header('Location: ./index.php');
  }
} else {
  // No new file uploaded, update other information only
  $query = mysqli_query($connection,
    "UPDATE arsip SET
      kode_pelaksana = '$kode_pelaksana',
      kode_klasifikasi = '$kode_klasifikasi',
      nomor_surat = '$nomor_surat',
      tanggal_surat = '$tanggal_surat',
      kepada = '$kepada',
      uraian_informasi = '$uraian_informasi',
      jumlah_arsip = '$jumlah_arsip',
      nomor_box = '$nomor_box',
      nomor_berkas = '$nomor_berkas'
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
}