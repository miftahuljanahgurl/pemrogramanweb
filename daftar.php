<?php
include 'dbkonek.php';
session_start();

if (isset($_SESSION['nama'])) {
    header('location:landing.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Daftar</title>
</head>

<body>
    <h1> Syarat daftar</h1>
    <ul>
        <li>Minimal 8 karakter</li>
        <li>Harus ada 1 angka</li>
        <li>Minimal 1 huruf kapital</li>
    </ul>

    <form action="" method="POST">
        <input type="text" name="nama" placeholder="Masukkan nama" require>
        <input type="text" name="email" placeholder="Masukkan email" require>
        <input type="password" name="password" placeholder="Masukkan password" require>
        <input type="password" name="konfirmasi" placeholder="Konfirmasi password" require>
        <input type="submit" name="daftar" placeholder="Daftar sekarang!" require>

        <?php
        if (isset($_POST['daftar'])) {
            $nama = trim($_POST['nama']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $konfirmasi = trim($_POST['konfirmasi']);

            $errors = array();

            if (empty($nama) || empty($email) || empty($password) || empty($konfirmasi)) {
                $errors[] = "Tidak boleh kosong";
            }

            if ($password !== $konfirmasi) {
                $errors[] = "Kata sandi anda tidak sama";
            }

            if (strlen($password) < 8) {
                $errors[] = "Password harus 8 karakter!";
            }

            if (!preg_match('/^(?=.*[A-Z])(?=.*\d).{8,}$/', $password)) {
                $errors[] = "Harus mengikuti aturan";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Format email salah";
            }

            if (empty($errors)) {
                $cekemail = mysqli_query($konek, "SELECT email FROM tb_sesi WHERE email = '$email'");
                if (mysqli_num_rows($cekemail)) {
                    $errors[] = "Email sudah ada";
                }
            }

            if (empty($errors)) {
                $masukkan = mysqli_query($konek, "INSERT INTO tb_sesi (nama, email, password) VALUES ('$nama', '$email', '$password')");
                if ($masukkan) {
                    echo "Pendaftaran baerhasil 🎉, silahkan ke halaman login";
                } else {
                    echo "Ada kesalahan, silahkan cek kode";
                }
            }
        }
        ?>
    </form>
</body>

</html>