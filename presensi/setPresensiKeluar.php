<?php

  include '../config.php';

  $id_user = $_POST['id_user'];
  $location_out = $_POST['location_out'];

  $queryGetLastPresence = mysqli_query($koneksi, "SELECT * FROM presensi WHERE id_user = '$id_user' ORDER BY id_presensi DESC LIMIT 1");

  $lastPresence = mysqli_fetch_assoc($queryGetLastPresence);
  $id_presensi = $lastPresence["id_presensi"];

  $query = mysqli_query($koneksi, "UPDATE presensi SET datetime_out = NOW(), location_out = '$location_out' WHERE id_presensi = '$id_presensi'");

  echo json_encode($query);
	mysqli_close($koneksi);
?>