<?php
include "koneksi.php";

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    $sqlDelete = "DELETE FROM mahasiswa WHERE nim = ?";
    $stmt = mysqli_prepare($koneksi, $sqlDelete);
    mysqli_stmt_bind_param($stmt, 's', $nim);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: tabelmhs.php");
    exit;
}

$sql = "SELECT * FROM mahasiswa ORDER BY nim DESC";
$hasil = mysqli_query($koneksi, $sql);
$jumlah = mysqli_num_rows($hasil);
?>


<?php
if (isset($_POST['nim']) && isset($_POST['nama']) && isset($_POST['jurusan'])) {

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];

    $sql = "UPDATE mahasiswa SET 
                nama = '$nama', 
                jurusan = '$jurusan'
                WHERE nim = '$nim'";
    if (mysqli_query($koneksi, $sql)) {
        echo "<script> 
            alert('Berhasil mengupload form!');
            document.location.href ='tabelmhs.php';
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
                <th>Nim Mahasiswa</th>
                <th>Nama Mahasiswa</th>
                <th>Jurusan</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
            <?php
            while ($data = mysqli_fetch_array($hasil)) {
            ?>
                <tr>
                    <td><?php echo $data['nim']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['jurusan']; ?></td>
                    <td><a href="tabelmhs.php?nim=<?php echo $data['nim']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Ingin Benar-Benar Menghapus ?')">Hapus</a></td>
                    </td>
                    <td><a href="editmhs.php?nim=<?php echo $data['nim']; ?>" class="btn btn-primary">Edit</a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>