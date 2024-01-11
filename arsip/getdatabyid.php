<?php

session_start();
require_once '../helper/connection.php';

function getDetailsById($connection, $id)
{
  $getDataById = mysqli_query($connection, "SELECT * FROM arsip LEFT JOIN jenis_arsip ON arsip.kode_klasifikasi = jenis_arsip.id WHERE arsip.id = $id");

  if ($getDataById) {
    $data = mysqli_fetch_assoc($getDataById);

    echo '<table class="table table-striped">';
    echo '<tr><th style="width: 40%">Kode Pelaksana</th><td>' . $data['kode_pelaksana'] . '</td></tr>';
    echo '<tr><th>Jenis</th><td>' . $data['jenis'] . '</td></tr>';
    echo '<tr><th>Nomor Surat</th><td>' . $data['nomor_surat'] . '</td></tr>';
    echo '<tr><th>Tanggal Surat</th><td>' . $data['tanggal_surat'] . '</td></tr>';
    echo '<tr><th>Kepada</th><td>' . $data['kepada'] . '</td></tr>';
    echo '<tr><th>Uraian Informasi</th><td>' . $data['uraian_informasi'] . '</td></tr>';
    echo '<tr><th>Jumlah Arsip</th><td>' . $data['jumlah_arsip'] . '</td></tr>';
    echo '<tr><th>Nomor Box</th><td>' . $data['nomor_box'] . '</td></tr>';
    echo '<tr><th>Nomor Box</th><td>' . $data['nomor_berkas'] . '</td></tr>';
    echo '<tr><th>Berkas</th><td><a target="_blank" href="' . $data['upload_berkas'] . '"> ' . $data['upload_berkas'] . '</a></td></tr>';
    echo '</table>';
  } else {
    echo '<p>Error fetching details</p>';
  }
}

if (isset($_POST['id'])) {
  getDetailsById($connection, $_POST['id']);
}
