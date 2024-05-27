<!DOCTYPE html>

<head>
    <title>Document</title>
</head>

<body>
    <table align="center" style="border: 2px solid; border-collapse: collapse; width: 480x; margin: auto;">
        <tr>
            <td bgcolor="Blue" colspan="2" align="center" style="color: white; padding: 5px; border: 2px solid black;">
                INPUTKAN DATA MAHASISWA</td>
        </tr>
        <form action="insertmhs.php" method="POST" enctype="multipart/form-data">
            <tr>
                <input type="hidden" name="id" value="">
                <td style="padding-top: 15px; padding-left: 10px;">Nim</td>
                <td style="padding-top: 15px; padding-left: 10px;"><input type="text" name="nim"></td>
            </tr>
            <tr>
                <td style="padding-top: 20px; padding-left: 10px;">Nama</td>
                <td style="padding-top: 20px; padding-left: 10px;"><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td style="padding-top: 20px; padding-left: 10px;">Jurusan</td>
                <td style="padding-top: 20px; padding-left: 10px;"><input type="text" name="jurusan"></td>
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