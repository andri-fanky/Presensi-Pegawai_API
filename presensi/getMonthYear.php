<?php

  header('Content-Type: application/json');

  $month = array(
    1 => "Januari",
    "Februari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Agustus",
    "September",
    "Oktober",
    "November",
    "Desember"
  );

  $year = array(
    "2022",
    "2023"
  );

  echo json_encode(["month" => $month, "year" => $year]);
?>