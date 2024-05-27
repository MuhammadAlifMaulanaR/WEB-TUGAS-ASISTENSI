<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "13020220223_";

$koneksi = mysqli_connect(
    $host,
    $user,
    $password,
    $dbname
);

if ($koneksi) {
    echo "";
} else {
    echo "Gagal";
}
