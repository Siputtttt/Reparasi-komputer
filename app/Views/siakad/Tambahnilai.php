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
    <?php

    helper('form');

    ?>
    <div class="container mt-5">
        <h1 class="mb-5"><b>FORM ENTRY DATA MAHASISWA BARU</b></h1>
        <form action="<?= base_url('/tambah_nilai') ?>" method="post">
            <div class="row">
                <label class="col-sm-2 col-form-label">Tahun Akademin</label>
                <div class="col-sm-2">
                    <?php
                    $kode = "";
                    $js = 'class="form-select form-select-sm"';
                    echo form_dropdown('ta', $cmbta, $kode, $js);
                    ?>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Semester</label>
                <div class="col-sm-2">
                    <?php
                    $kode = "";
                    $js = 'class="form-select form-select-sm"';
                    echo form_dropdown('smtr', $cmbsmtr, $kode, $js);
                    ?>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Mata Kuliah</label>
                <div class="col-sm-4">
                    <?php
                    $kode = "";
                    $js = 'class="form-select form-select-sm"';
                    echo form_dropdown('kodemtk', $cmbmtk, $kode, $js);
                    ?>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Dosen</label>
                <div class="col-sm-4">
                    <?php
                    $kode = "";
                    $js = 'class="form-select form-select-sm"';
                    echo form_dropdown('dosenid', $cmbdosen, $kode, $js);
                    ?>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-primary mt-5"><i class="fa-solid fa-floppydisk"></i> Simpan</button>
        </form>
    </div>
</body>

</html>