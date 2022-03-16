<?php
  /**
   * File ini digunakan untuk mendapatkan history presensi user.
   */
  include '../config.php';

  $id_user = $_POST['id_user'];
  $month = isset($_POST['month']) != null ? $_POST['month'] : null;
  $year = isset($_POST['year']) != null ? $_POST['year'] : null;

  $monthNumeric = get_month($month);

  $query = mysqli_query($koneksi, "SELECT * FROM presensi WHERE id_user = '$id_user' AND YEAR(datetime_in) = '$year' AND MONTH(datetime_in) = '$monthNumeric' ORDER BY id_presensi DESC");

  $array = array();
  $data = [];
  $total_minutes = 0;
  $i = 0;
  if ($query != null) {
	while ($row = mysqli_fetch_assoc($query)) {
		$data[$i]["id_presensi"] = $row['id_presensi'];
    $data[$i]["id_user"] = $row['id_user'];
    $data[$i]["datetime"] = date('d.m.Y', strtotime($row['datetime_in']));
    $data[$i]["time_in"] = date('H:i:s', strtotime($row['datetime_in']));
    $data[$i]["time_out"] = $row['datetime_out'] ? date('H:i:s', strtotime($row['datetime_out'])) : '-';
    $data[$i]["location_in"] = $row['location_in'];
    $data[$i]["location_out"] = $row['location_out'];
    if ($row['datetime_out']) {
      $time_in = date('H:i:s', strtotime($row['datetime_in']));
      $time_out = date('H:i:s', strtotime($row['datetime_out']));
      $total_minutes += strtotime($time_out) - strtotime($time_in);
    }
    $i++;
	}
}
  $array["data"] = $data;
  $array["total"] = sprintf('%02d Jam %02d Menit', ($total_minutes/ 3600),($total_minutes/ 60 % 60));
  // $array["total"] = sprintf('%02d:%02d:%02d', ($total_minutes/ 3600),($total_minutes/ 60 % 60), $total_minutes% 60);

  echo json_encode($array);
	mysqli_close($koneksi);

  function get_month($param){

    $bulan = array (
      'Januari' => 1,
      'Februari' => 2,
      'Maret' => 3,
      'April' => 4,
      'Mei' => 5,
      'Juni' => 6,
      'Juli' => 7,
      'Agustus' => 8,
      'September' => 9,
      'Oktober' => 10,
      'November' => 11,
      'Desember' => 12
    );

    return $bulan[$param];
  }
?>