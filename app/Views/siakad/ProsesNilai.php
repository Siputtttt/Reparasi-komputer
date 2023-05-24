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
        <form action="<?= base_url('/simpan_nilai') ?>" method="post">
            <div class="row">
                <label class="col-sm-2 col-form-label">Tahun Akademin</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" placeholder="Masukan nim" name="ta" readonly value="<?= $ta ?>">
                    <div id=" pesan_salah">
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Semester</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" placeholder="Masukan nim" name="smtr" readonly value="<?= $smtr ?>">
                    <div id="pesan_salah"></div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Mata Kuliah</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" placeholder="Masukan nim" name="kodemtk" readonly value="<?= $info_mtk->matakuliah ?>">
                    <div id="pesan_salah"></div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Dosen</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" placeholder="Masukan nim" name="dosenid" readonly value="<?= $info_dsn->dosen_nama ?>">
                    <div id="pesan_salah"></div>
                </div>
            </div>
            <div class="card shadow m-5">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Hadir</th>
                                    <th>Tugas</th>
                                    <th>Formatif</th>
                                    <th>UTS</th>
                                    <th>UAS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $n = 1;
                                foreach ($krs as $k) {
                                ?>
                                    <tr>
                                        <td><?= $n++ ?></td>
                                        <td><?= $k->nim ?><input type="hidden" name="nim[]" value="<?= $k->nim ?>"></td>
                                        <td><?= $k->nama ?></td>
                                        <td width="90"><input type="text" name="hadir[]" value="<?= $k->hadir ?>" class="form-control form-control-sm"></td>
                                        <td width="90"><input type="text" name="tugas[]" value="<?= $k->tugas ?>" class="form-control form-control-sm"></td>
                                        <td width="90"><input type="text" name="formatif[]" value="<?= $k->formatif ?>" class="form-control form-control-sm"></td>
                                        <td width="90"><input type="text" name="uts[]" value="<?= $k->uts ?>" class="form-control form-control-sm"></td>
                                        <td width="90"><input type="text" name="uas[]" value="<?= $k->uas ?>" class="form-control form-control-sm"></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-primary mt-5"><i class="fa-solid fa-floppydisk"></i> hehe</button>
        </form>
    </div>
</body>

</html>