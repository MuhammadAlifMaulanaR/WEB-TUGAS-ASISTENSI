<?php
include "koneksi.php";

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    $result = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim = '$nim'");
    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        echo "Data not found.";
        exit;
    }
} else {
    echo "ID is missing.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Data Mahasiswa</title>
</head>

<body>
    <table align="center" style="border: 2px solid; border-collapse: collapse; width: 480x; margin: auto;">
        <tr>
            <td bgcolor="Blue" colspan="2" align="center" style="color: white; padding: 5px; border: 2px solid black;">
                INPUTKAN DATA MAHASISWA</td>
        </tr>
        <form action="tabelmhs.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="nim" value="<?php echo $data['nim']; ?>">
            <tr>
                <input type="hidden" name="nim" value="">
                <td style="padding-top: 15px; padding-left: 10px;">Nim</td>
                <td style="padding-top: 15px; padding-left: 10px;"><input type="text" name="nim" value="<?php echo $data['nim']; ?>" readonly></td>
            </tr>
            <tr>
                <td style="padding-top: 20px; padding-left: 10px;">Nama</td>
                <td style="padding-top: 20px; padding-left: 10px;"><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
            </tr>
            <tr>
                <td style="padding-top: 20px; padding-left: 10px;">Kelas</td>
                <td style="padding-top: 20px; padding-left: 10px;"><input type="text" name="jurusan" value="<?php echo $data['jurusan']; ?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="center" style="padding-top: 20px; padding-left: 10px;">
                    <input type="submit" value="Daftar">
                    <input type="reset" value="reset">
                </td>
            </tr>
        </form>
    </table>
</body>

</html>