<?php
  /**
   * File ini digunakan untuk config database dan default timezone.
   */
  header('Content-Type: application/json');
  date_default_timezone_set('Asia/Jakarta');
  
  $koneksi = mysqli_connect("localhost","root","","presensi_pegawai");

  if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
  }

?>