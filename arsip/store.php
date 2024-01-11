<?php
session_start();
require_once '../helper/connection.php';

$kode_pelaksana = $_POST['kode_pelaksana'];
$kode_klasifikasi = $_POST['kode_klasifikasi'];
$nomor_surat = $_POST['nomor_surat'];
$tanggal_surat = $_POST['tanggal_surat'];
$kepada = $_POST['kepada'];
$uraian_informasi = $_POST['uraian_informasi'];
$jumlah_arsip = $_POST['jumlah_arsip'];
$nomor_box = $_POST['nomor_box'];
$nomor_berkas = $_POST['nomor_berkas'];

// Handle file upload
$upload_dir = '../uploads/';
$upload_file = $upload_dir . time() . '_' . basename($_FILES['upload_berkas']['name']);

if (move_uploaded_file($_FILES['upload_berkas']['tmp_name'], $upload_file)) {
  // File upload successful, continue with database insertion
  $query = mysqli_query($connection,
    "INSERT INTO arsip (kode_pelaksana, kode_klasifikasi, nomor_surat, tanggal_surat, kepada, uraian_informasi, jumlah_arsip, nomor_box, nomor_berkas, upload_berkas) 
        VALUES ('$kode_pelaksana', '$kode_klasifikasi', '$nomor_surat', '$tanggal_surat', '$kepada', '$uraian_informasi', '$jumlah_arsip', '$nomor_box','$nomor_berkas', '$upload_file')
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
} else {
  // File upload failed
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => 'File upload failed'
  ];
  header('Location: ./index.php');
}
