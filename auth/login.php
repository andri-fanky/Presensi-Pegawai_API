<?php

  include '../config.php';

  $email = $_POST['email'];
	$password = $_POST['password'];

  $query = mysqli_query($koneksi, "SELECT usr.id_user, usr.nama, usr.email, uk.nama_unit_kerja ".
  "FROM users AS usr JOIN unit_kerja AS uk ON uk.id_unit_kerja = usr.id_unit_kerja ".
  "WHERE usr.email = '$email' AND usr.password = '$password' LIMIT 1");

  $count = mysqli_num_rows($query);

  if ($count > 0) {
    $array["status"] = true;
    $array["message"] = "Login berhasil";
    $array["data"] = mysqli_fetch_assoc($query);
  } else {
    $array["status"] = false;
    $array["message"] = "Login gagal";
    $array["data"] = null;
  }
  echo json_encode($array);
	mysqli_close($koneksi);
?>