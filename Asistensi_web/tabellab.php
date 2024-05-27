<?php
include "koneksi.php";

if (isset($_GET['koderuangan'])) {
    $koderuangan = $_GET['koderuangan'];
    $sqlDelete = "DELETE FROM lab WHERE koderuangan = ?";
    $stmt = mysqli_prepare($koneksi, $sqlDelete);
    mysqli_stmt_bind_param($stmt, 's', $koderuangan);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: tabellab.php");
    exit;
}
$sql = " SELECT lab.koderuangan, lab.namaruangan, mahasiswa.nim, mahasiswa.nama, mahasiswa.jurusan, 
           asisten.kode, asisten.namaasisten, asisten.matakuliah FROM lab JOIN mahasiswa ON lab.nim = mahasiswa.nim JOIN asisten ON lab.kode = asisten.kode";
$hasil = mysqli_query($koneksi, $sql);
if (!$hasil) {
    die("Query error: " . mysqli_error($koneksi));
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
                <th>Kode Ruangan</th>
                <th>Nama Ruangan</th>
                <th>Nim</th>
                <th>Nama Mahasiswa</th>
                <th>Jurusan</th>
                <th>Kode Asisten</th>
                <th>Nama Asisten</th>
                <th>Matakuliah</th>
                <th colspan="1">Aksi</th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
            <?php
            while ($data = mysqli_fetch_array($hasil)) {
            ?>
                <tr>
                    <td><?php echo $data['koderuangan']; ?></td>
                    <td><?php echo $data['namaruangan']; ?></td>
                    <td><?php echo $data['nim']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['jurusan']; ?></td>
                    <td><?php echo $data['kode']; ?></td>
                    <td><?php echo $data['namaasisten']; ?></td>
                    <td><?php echo $data['matakuliah']; ?></td>

                    <td><a href="tabellab.php?koderuangan=<?php echo $data['koderuangan']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Ingin Benar-Benar Menghapus ?')">Hapus</a></td>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>