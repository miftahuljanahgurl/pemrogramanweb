<?php 
include 'dbkonek.php';
session_start();
if (isset($_SESSION['nama'])) {
    header('location:tampil.php');
} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="email" placeholder="masukkan email"> <br>
        <input type="password" name="password" placeholder="masukkan pass"> <br>
        <input type="sumbit" name="masuk" value="celup"> <br>
        <?php
        if (isset($_POST['masuk'])) {
            $ceking = mysqli_query($konek, "SELECT * FROM tb_sesi WHERE email= '".$_POST['password']."'");
            $login = mysqli_fetch_array($ceking);
            $ygmasuk = mysqli_num_rows($ceking);
            if ($ygmasuk > 0) {
                $pelaku = $login ['nama'];
                session_start();
                $_SESSION['nama'] = $pelaku;
                header('location:lannding.php');
            } else{
                echo  "email atau pass salah";
            }
        }
        ?>
    </form>
</body>
</html>

<?php
}
?>