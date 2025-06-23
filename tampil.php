<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <table class="table table-dark table-hover">
        
        <tr>
            <td> NO </td>
            <td> NAMA </td>
            <td> GAMBAR </td>
            <td> ALAMAT </td>
            <td> AKSI </td>
        </tr>

<?php
include 'dbkonek.php';
$query = mysqli_query($konek, "SELECT * FROM tbb");
while ($baris = mysqli_fetch_array($query)) {
?>
        
        <tr>
            <td><?php echo $baris['idb']?></td>
            <td><?php echo $baris['nama']?></td>
            <td><img src="img/<?php echo $baris['gambar']?>" height="100" width="100"></td>
            <td><?php echo $baris['alamat']?></td>
            <td><a href="sunting.php?id=<?php echo $baris['idb']?>"> sunting </a><br>
                <a href="hapus.php?id=<?php echo $baris['idb']?>" onclick="return confirm('yakin ?')"> hapus </a><br>
            </td>
        
        </tr>

        <?php
}
        ?>

    </table>
</body>
</html>