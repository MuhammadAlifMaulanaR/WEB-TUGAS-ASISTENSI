<?php
include "koneksi.php";

if (isset($_GET['kode'])) {
    $kode = $_GET['kode'];
    $sqlDelete = "DELETE FROM asisten WHERE kode = ?";
    $stmt = mysqli_prepare($koneksi, $sqlDelete);
    mysqli_stmt_bind_param($stmt, 's', $kode);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: tabelasisten.php");
    exit;
}

$sql = "SELECT * FROM asisten ORDER BY kode DESC";
$hasil = mysqli_query($koneksi, $sql);
$jumlah = mysqli_num_rows($hasil);
?>


<?php
if (isset($_POST['kode']) && isset($_POST['namaasisten']) && isset($_POST['matakuliah'])) {

    $kode = $_POST['kode'];
    $namaasisten = $_POST['namaasisten'];
    $matakuliah = $_POST['matakuliah'];

    $sql = "UPDATE asisten SET 
                namaasisten = '$namaasisten', 
                matakuliah = '$matakuliah'
                WHERE kode = '$kode'";
    if (mysqli_query($koneksi, $sql)) {
        echo "<script> 
            alert('Berhasil mengupload form!');
            document.location.href ='tabelasisten.php';
          </script>";
    } else {
        echo "<script> alert('Database query Gagal!'); </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <a href="lab.php">Tambah data Lab</a>
    <a href="mahasiswa.php">Tambah data mahasiswa</a>
    <a href="asisten.php">Tambah data asisten</a>
    <table border="2" cellspacing="0">
        <thead class="thead-default bg-dark text-white">
            <tr>
                <th>Kode Asisten</th>
                <th>Nama Asisten</th>
                <th>Matakuliah</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
            <?php
            while ($data = mysqli_fetch_array($hasil)) {
            ?>
                <tr>
                    <td><?php echo $data['kode']; ?></td>
                    <td><?php echo $data['namaasisten']; ?></td>
                    <td><?php echo $data['matakuliah']; ?></td>
                    <td><a href="tabelasisten.php?kode=<?php echo $data['kode']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Ingin Benar-Benar Menghapus ?')">Hapus</a></td>
                    </td>
                    <td><a href="editasisten.php?kode=<?php echo $data['kode']; ?>" class="btn btn-primary">Edit</a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>