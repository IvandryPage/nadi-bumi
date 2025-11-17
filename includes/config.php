<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("DB_HOST", "localhost");
define("DB_NAMA", "nadi_bumi_db");
define("DB_USER", "root");
define("DB_PASS", "root");

$koneksi = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAMA);

if (!$koneksi) {
  die("Koneksi. Gagal : " . mysqli_connect_error());
}
