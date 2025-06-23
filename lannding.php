<?php
ob_start();
include 'dbkonek.php';
session_start();
if (!isset($_SESSION['nama'])) {
    header('location:login.php');
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>welcome page</title>
    </head>

    <body>
        <a href="logout.php"> pesu </a>
        <h1>selamat datang pangeran / inces <?php echo $_SESSION["nama"] ?> di web kami</h1>
    </body>

    </html>

<?php } ?>