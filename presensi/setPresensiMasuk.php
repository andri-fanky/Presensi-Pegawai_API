<?php
  /**
   * File ini digunakan untuk melakukan proses presensi masuk.
   */
  include '../config.php';

  $id_user = $_POST['id_user'];
  $location_in = $_POST['location_in'];

  $query = mysqli_query($koneksi, "INSERT INTO presensi (id_user, datetime_in, location_in) VALUES ('$id_user',NOW(),'$location_in')");

  echo json_encode($query);
	mysqli_close($koneksi);
?>