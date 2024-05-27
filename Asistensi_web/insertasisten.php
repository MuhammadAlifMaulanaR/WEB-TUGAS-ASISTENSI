<?php
include "koneksi.php";

$kode = $_POST['kode'];
$namaasisten = $_POST['namaasisten'];
$matakuliah = $_POST['matakuliah'];

$sql = "INSERT INTO asisten VALUES ('$kode','$namaasisten','$matakuliah')";

if (mysqli_query($koneksi, $sql)) {
    echo "<script>alert('Data Berhasil di Simpan'); document.location.href='tabelasisten.php';</script>";
?>
<?php
} else {
    echo "Eror: " . $sql . "" . mysqli_error($koneksi);
}
