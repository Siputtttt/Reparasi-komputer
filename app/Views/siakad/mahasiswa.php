<?php

// include('../include/navbar.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>aku ganteng</title>

    <link href="<?= base_url('Asset/favicon/favicon.ico') ?>" type="image/x-icon" rel="shortcut icon">
    <link href="<?= base_url('Asset/fontawesome/css/all.css') ?>" rel="stylesheet">

    <?php

    echo view('include/navbar');
    echo view('include/myfooter');

    ?>
</head>

<body>
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->

    <div class="container">
        <h1 class="text-center mt-5">Data Mahasiswa, <br> Tahun Ajaran 2023</h1>
        <a href="<?= base_url('siakad/add_mahasiswa') ?>" class="btn btn-outline-primary justify-content-end mb-5">Tambah Mahasiswa</a>
        <table class="table">
            <thead class="table-success">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Tempat Lahir</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($mhs as $p) : ?>
                    <tr>
                        <th scope="row"><?php echo $i++ ?></th>
                        <td><?php echo $p->nim; ?></td>
                        <td><?php echo $p->nama; ?></td>
                        <td><?php echo $p->alamat; ?></td>
                        <td><?php echo $p->lahirdi; ?></td>
                        <td><?php echo $p->lahirtgl; ?></td>
                        <td><?php echo $p->prodi; ?></td>
                        <td>
                            <a href="<?= base_url('siakad/edit_mahasiswa') . "/" . $p->nim ?>" class="btn btn-outline-primary">Edit</a>
                            <a href="<?= base_url('/del') . "/" . $p->nim ?>" onclick="return confirm('Benar Data Mau dihapus ?')" class="btn btn-outline-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <a href="<?= base_url('/su') ?>" class="btn btn-outline-primary">suuuu</a>
    </div>
</body>

</html>