<?php
include 'dbkonek.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td> Masukkan Nama</td>
                <td> : </td>
                <td> <input type="text" name="nama"></td>
            </tr>

            <tr>
                <td> Unggah Citra</td>
                <td> : </td>
                <td> <input type="file" name="gambar"></td>
            </tr>

            <tr>
                <td> Masukkan Alamat</td>
                <td> : </td>
                <td> <input type="text" name="alamat"></td>
            </tr>

            <tr>
                <td> </td>
                <td> </td>
                <td> <input type="submit" name="kirim" value="kirim"></td>
                <?php
                if(isset($_POST['kirim'])) {
                    $nama = $_POST['nama'];
                    $nama_file = $_FILES ['gambar'] ['name'];
                    $sumber = $_FILES ['gambar'] ['tmp_name'];
                    $folder = './img/';
                    $alamat = $_POST['alamat'];
                    move_uploaded_file($sumber, $folder.$nama_file);
                    $insert = mysqli_query( $konek, "INSERT INTO tbb VALUES (NULL, '$nama', '$nama_file', '$alamat')");

                    if($insert){
                        echo "Data berhasil ditambah";
                    }
                    else{
                        echo"Ada yang salah cek code query";
                    }
                }
                ?>
            
        </table>
    </form>
    
</body>
</html>