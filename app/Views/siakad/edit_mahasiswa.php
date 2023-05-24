<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Politeknik LP3i | SIAKAD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <?php
    // echo view('include/myasset.php');
    // helper('form');
    ?>
</head>

<body>
    <?php

    helper('form');

    ?>
    <div class="container mt-5">
        <h1 class="mb-5"><b>FORM ENTRY DATA MAHASISWA BARU</b></h1>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> You should check in on some of those fields below.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="row">
            <div class="col-sm">
                <form action="<?= base_url('siakad/mhs_update') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="row">
                                <label class="col-sm-4 col-form-label">NIM</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control form-control-sm" name="nim" value="<?= $ifmhs->nim ?>" readonly>
                                    <div id="pesan_salah"></div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-form-label">Nama Mahasiswa</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control form-control-sm" placeholder="Masukan nama" name="nama" value="<?= $ifmhs->nama ?>">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control form-control-sm" placeholder="Masukan Tempat lahir" name="lahirdi" value="<?= $ifmhs->lahirdi ?>">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-2">
                                    <input type="date" class="form-control form-control-sm" name="lahirtgl" value="<?= $ifmhs->lahirtgl ?>">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-sm" placeholder="Masukan Alamat Rumah" name="alamat" value="<?= $ifmhs->alamat ?>">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-form-label">Program Studi</label>
                                <div class="col-sm-3">
                                    <?php
                                    $kode = $ifmhs->kode;
                                    $js = 'class="form-select form-select-sm"';
                                    echo form_dropdown('kode', $kdprodi, $kode, $js);
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="">
                                <p>Foto :</p>
                                <?php

                                if ($ifmhs->foto == '') {
                                    $sc = "Asset/nofoto.jpg";
                                } else {
                                    $sc = "Asset/" . $ifmhs->foto;
                                }

                                ?>
                                <img class="rounded embed-responsive embed-responsive-1by1 mb-2 ml-4" id="fotoku" src="<?= base_url($sc) ?>" width="175" height="auto">
                                <div class="mb-2 gambar">
                                    <input type="file" class="form-control" name="file" id="file" accept=".jpg, .jpeg, .png">
                                    <input type="hidden" name="filelama" id="filelama" value="<?= $ifmhs->foto ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary mt-5"><i class="fa-solid fa-floppydisk"></i> Simpan</button>
                    <a href="<?= base_url() ?>" class="btn btn-outline-primary mt-5">Kembali</a>
                </form>
            </div>

        </div>
    </div>

    <?php
    echo view('include/myfooter.php');
    ?>

    <script type="text/javascript">
        $(".gambar").on("change", function() {
            var fileInput = document.getElementById('file');
            var filePath = fileInput.value;
            var fileName = $(this).val().split("\\").pop();
            var xx = $(this).val();

            //------------preview foto-----------
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#fotoku').attr('src', e.target.result);
            }
            reader.readAsDataURL(fileInput.files[0]);
        });
    </script>

</html>