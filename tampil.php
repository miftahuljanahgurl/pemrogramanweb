<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
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
                <td><?php echo $baris['idb'] ?></td>
                <td><?php echo $baris['nama'] ?></td>
                <td><img src="img/<?php echo $baris['gambar'] ?>" height="100" width="100"></td>
                <td><?php echo $baris['alamat'] ?></td>
                <td><a href="sunting.php?id=<?php echo $baris['idb'] ?>"> sunting </a><br>
                    <a href="hapus.php?id=<?php echo $baris['idb'] ?>" onclick="return confirm('yakin ?')"> hapus </a><br>
                </td>

            </tr>

        <?php
        }
        ?>

    </table>
</body>

</html>