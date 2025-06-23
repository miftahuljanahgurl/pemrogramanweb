<?php
include 'dbkonek.php';

if(isset($_GET['id'])) {
    $id = ($_GET['id']);

    $hapus = mysqli_query($konek, "DELETE FROM tbb WHERE idb = '$id'");
    if($hapus) {
        header('location:tampil.php');
    }
    else {
        echo "ada yang salah, silahkan cek kode";
    }
}
?>