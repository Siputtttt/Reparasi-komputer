<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Politeknik LP3i | SIAKAD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <?php
    echo view('include/myasset.php');
    helper('form');
    ?>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header"><b>Pesan</b></div>
            <div class="card-body">
                <p><?= $pesan ?></p>
                <a class="btn btn-success btn-sm" href="<?= base_url('siakad/add_mahasiswa') ?>">Kembali</a>

            </div>
        </div>
    </div>
</body>

</html>