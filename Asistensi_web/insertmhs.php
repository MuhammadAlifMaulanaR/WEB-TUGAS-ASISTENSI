<?php
include "koneksi.php";

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];

$sql = "INSERT INTO mahasiswa  VALUES ('$nim','$nama','$jurusan')";

if (mysqli_query($koneksi, $sql)) {
    echo "<script>alert('Data Berhasil di Simpan'); document.location.href='tabelmhs.php';</script>";
?>
<?php
} else {
    echo "Eror: " . $sql . "" . mysqli_error($koneksi);
}
