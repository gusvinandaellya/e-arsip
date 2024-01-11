<?php

session_start();
require_once '../helper/connection.php';

function getDetailsById($connection, $id)
{
  $getDataById = mysqli_query($connection, "SELECT * FROM login WHERE id = $id");

  if ($getDataById) {
    $data = mysqli_fetch_assoc($getDataById);

    echo '<table class="table table-striped">';
    echo '<tr><th style="width: 40%">Nama</th><td>' . $data['nama'] . '</td></tr>';
    echo '<tr><th>Username</th><td>' . $data['username'] . '</td></tr>';
    echo '<tr><th>Email</th><td>' . $data['email'] . '</td></tr>';
    echo '<tr><th>Telepon</th><td>' . $data['telepon'] . '</td></tr>';
    echo '<tr><th>Alamat</th><td>' . $data['alamat'] . '</td></tr>';
    echo '</table>';
  } else {
    echo '<p>Error fetching details</p>';
  }
}

if (isset($_POST['id'])) {
  getDetailsById($connection, $_POST['id']);
}
