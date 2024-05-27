<?php
include "koneksi.php";

if (isset($_GET['kode'])) {
    $kode = $_GET['kode'];
    $result = mysqli_query($koneksi, "SELECT * FROM asisten WHERE kode = '$kode'");
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
    <title>Edit Data Asisten</title>
</head>

<body>
    <table align="center" style="border: 2px solid; border-collapse: collapse; width: 480x; margin: auto;">
        <tr>
            <td bgcolor="Blue" colspan="2" align="center" style="color: white; padding: 5px; border: 2px solid black;">
                INPUTKAN DATA ASISTEN</td>
        </tr>
        <form action="tabelasisten.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="kode" value="<?php echo $data['kode']; ?>">
            <tr>
                <input type="hidden" name="kode" value="">
                <td style="padding-top: 15px; padding-left: 10px;">kode</td>
                <td style="padding-top: 15px; padding-left: 10px;"><input type="text" name="kode" value="<?php echo $data['kode']; ?>" readonly></td>
            </tr>
            <tr>
                <td style="padding-top: 20px; padding-left: 10px;">Nama Asisten</td>
                <td style="padding-top: 20px; padding-left: 10px;"><input type="text" name="namaasisten" value="<?php echo $data['namaasisten']; ?>"></td>
            </tr>
            <tr>
                <td style="padding-top: 20px; padding-left: 10px;">Matakuliah</td>
                <td style="padding-top: 20px; padding-left: 10px;"><input type="text" name="matakuliah" value="<?php echo $data['matakuliah']; ?>"></td>
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