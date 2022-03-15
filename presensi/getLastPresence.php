<?php

  include '../config.php';

  $id_user = $_POST['id_user'];

  $query = mysqli_query($koneksi, "SELECT * FROM presensi WHERE id_user = '$id_user' AND DATE(datetime_in) = CURDATE() ORDER BY id_presensi DESC");
  
  $array = array();
  $total_minutes = 0;
  $i = 0;
  $count = $query == null ? 0 : mysqli_num_rows($query);
  if ($count > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
      // Status 1 -> Belum presensi masuk | Status 2 -> Belum presensi keluar
      if ($i == 0) {
        if ($row['datetime_out']) {
          $array["status"] = 1;
          $array["message"] = "Hari ini Anda sudah melakukan presensi";
        } else {
          $array["status"] = 2;
          $array["message"] = "Hari ini Anda sudah melakukan presensi";
        }
      }
      if ($row['datetime_out']) {
        $time_in = date('H:i:s', strtotime($row['datetime_in']));
        $time_out = date('H:i:s', strtotime($row['datetime_out']));
        $total_minutes += strtotime($time_out) - strtotime($time_in);
      }
      $i++;
    }
  } else {
    $array["status"] = 1;
    $array["message"] = "Hari ini Anda belum melakukan presensi";
  }
  $array["date"] = hari_ini().", ".tgl_indo(date('Y-m-d'));
  $array["total"] = sprintf('%02d Jam %02d Menit', ($total_minutes/ 3600),($total_minutes/ 60 % 60));

  echo json_encode($array);
	mysqli_close($koneksi);

  function tgl_indo($tanggal){

    $bulan = array (
      1 => 'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    
    $pecahkan = explode('-', $tanggal);
    
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
  }

  function hari_ini(){
    $hari = date ("D");
   
    switch ($hari) {
      case 'Sun':
        $hari_ini = "Minggu";
        break;
      case 'Mon':			
        $hari_ini = "Senin";
        break;
      case 'Tue':
        $hari_ini = "Selasa";
        break;
      case 'Wed':
        $hari_ini = "Rabu";
        break;
      case 'Thu':
        $hari_ini = "Kamis";
        break;
      case 'Fri':
        $hari_ini = "Jumat";
        break;
      case 'Sat':
        $hari_ini = "Sabtu";
        break;
      default:
        $hari_ini = "Tidak diketahui";		
        break;
    }
    return $hari_ini;
  }
?>