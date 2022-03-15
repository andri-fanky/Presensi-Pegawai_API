<?php

  include '../config.php';

  $id_user = $_POST['id_user'];
  $location_in = $_POST['location_in'];

  $query = mysqli_query($koneksi, "INSERT INTO presensi (id_user, datetime_in, location_in) VALUES ('$id_user',NOW(),'$location_in')");

  echo json_encode($query);
	mysqli_close($koneksi);

  // $query = mysqli_query($koneksi, "SELECT * FROM presensi WHERE id_user = '$id_user' ORDER BY id_presensi DESC LIMIT 1");

  // $count = mysqli_num_rows($query);

  // if ($count > 0) {
  //   $array["status"] = true;
  //   $array["message"] = "Login berhasil";
  //   $array["data"] = mysqli_fetch_assoc($query);
  // } else {
  //   $array["status"] = false;
  //   $array["message"] = "Login gagal";
  //   $array["data"] = null;
  // }
  // $array = array();
  // while ($row = mysqli_fetch_assoc($query)) {
  //   $array[] = $row;
  // }
  // echo json_encode($array);
	// mysqli_close($koneksi);
?>