<?php
include "koneksi.php";

$koderuangan = $_POST['koderuangan'];
$namaruangan = $_POST['namaruangan'];
$nim = $_POST['nim'];
$kode = $_POST['kode'];

$sql = "INSERT INTO lab VALUES ('$koderuangan','$namaruangan','$nim','$kode')";

if (mysqli_query($koneksi, $sql)) {
    echo "<script>alert('Data Berhasil di Simpan'); document.location.href='tabellab.php';</script>";
?>
<?php
} else {
    echo "Eror: " . $sql . "" . mysqli_error($koneksi);
}
