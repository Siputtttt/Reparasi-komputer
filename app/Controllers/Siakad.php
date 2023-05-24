<?php

namespace App\Controllers;

use App\Models\Model_siakad;
use \Mpdf\Mpdf;
use CodeIgniter\Controller;

class Siakad extends Controller
{
    public $model;
    public function __construct()
    {
        $this->model = new Model_siakad();
    }
    function index()
    {
        $mhs = $this->model->mahasiswa();
        $data = ['mhs' => $mhs];
        return view('siakad/mahasiswa', $data);
    }

    function add_mahasiswa()
    {
        $prodi = $this->model->combo_prod();
        $data = ['kdprodi' => $prodi];
        // return view('siakad/tambah_mahasiswa', $data);
        return view('siakad/tambah_mahasiswa', $data);
    }

    function edit_mahasiswa($nim)
    {
        $prodi = $this->model->combo_prod();
        $mhs = $this->model->info_mhs($nim);
        $data = ['kdprodi' => $prodi, 'ifmhs' => $mhs];
        return view('siakad/edit_mahasiswa', $data);
    }
    function delete_mahasiswa($nim)
    {
        $prodi = $this->model->combo_prod();
        $mhs = $this->model->info_mhs($nim);
        $data = ['kdprodi' => $prodi, 'ifmhs' => $mhs];
        return view('siakad/edit_mahasiswa', $data);
    }

    function mhs_add()
    {
        $cmb = $this->model->combo_prodi();
        $data = array('cmb_prodi' => $cmb);
        echo view('siakad/edit_mahasiswa', $data);
    }

    function mhs_simpan()
    {
        extract($_POST);
        $namafile = $_FILES['file']['name'];
        $ukuran = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];

        if ($ukuran >= 5000) {
            $data = ['pesan' => "Ukuran terlallu besar bung"];
            echo view('siakad/pesan', $data);
            exit;
        }
        move_uploaded_file($file_tmp, 'Asset/' . $namafile);

        if ($filelama != "" and $namafile == "") {
            $namafile = $filelama;
        }
        if ($filelama != "" and $namafile != "") {
            unlink('Asset/' . $filelama);
        }

        if ($nim == "") {
            // $data = array("pesan" => "NIM Kosong silah kan isi data!");
            return   view('siakad/add_mahasiswa');
        } else {
            $cek = $this->model->info_mhs($nim);
            if (!isset($cek)) {
                $data = array('nim' => $nim, 'nama' => $nama, 'lahirdi' => $lahirdi, 'lahirtgl' => $lahirtgl, 'alamat' => $alamat, 'kode' => $kode);
                $this->model->insertTotable('mahasiswa', $data);
                $this->index();
                return redirect('/');
            } else {
                $data = array("pesan" => "NIM sudah ada, ulangi !");
                echo view('siakad/pesan', $data);
            }
        }
    }

    function mhs_update()
    {
        extract($_POST);
        $namafile = $_FILES['file']['name'];
        $ukuran = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];

        if ($ukuran >= 50000) {
            $data = ['pesan' => "Ukuran terlallu besar bung"];
            echo view('siakad/pesan', $data);
            exit;
        }
        move_uploaded_file($file_tmp, 'Asset/' . $namafile);

        if ($filelama != "" and $namafile == "") {
            $namafile = $filelama;
        }
        if ($filelama != "" and $namafile != "") {
            unlink('Asset/' . $filelama);
        }

        $table = 'mahasiswa';
        $data = array('nama' => $nama, 'lahirdi' => $lahirdi, 'lahirtgl' => $lahirtgl, 'alamat' => $alamat, 'kode' => $kode, 'foto' => $namafile);
        $kriteria = ['nim' => $nim];
        $this->model->updateTotable($table, $data, $kriteria);
        return redirect('/');
    }
    function mhs_delete($nim)
    {
        extract($_POST);
        $table = 'mahasiswa';
        $kriteria = ['nim' => $nim];
        $this->model->deleteFromtable($table, $kriteria);
        return redirect('/index');
    }


    function nilai()
    {
        $cmbdosen = $this->model->combo_dosen();
        $cmbmtk = $this->model->combo_mtk();
        $thn = date('Y');
        for ($i = 1; $i <= 4; $i++) {
            $awal = $thn - 1;
            $ta = "$awal/$thn";
            $cmbta[$ta] = $ta;
            $thn--;
        }
        for ($i = 1; $i <= 6; $i++) {
            $cmbsmtr[$i] = $i;
        }
        //$cmbta=['2022/2023','2021/2022'];
        $data = ['cmbdosen' => $cmbdosen, 'cmbta' => $cmbta, 'cmbsmtr' => $cmbsmtr, 'cmbmtk' => $cmbmtk];
        echo view('siakad/Tambahnilai', $data);
    }
    function entri_nilai()
    {
        extract($_POST);
        $info_dsn = $this->model->info_dsn($dosenid);
        $info_mtk = $this->model->info_mtk($kodemtk);
        $krs = $this->model->krs($dosenid, $ta, $smtr, $kodemtk);
        $data = ['ta' => $ta, 'smtr' => $smtr, 'info_dsn' => $info_dsn, 'krs' => $krs, 'info_mtk' => $info_mtk];
        echo view('siakad/ProsesNilai', $data);
    }
    function simpannilai()
    {
        extract($_POST);
        $indek = 0;
        foreach ($nim as $n) {
            $data = [
                'hadir' => $hadir[$indek],
                'tugas' => $tugas[$indek],
                'formatif' => $formatif[$indek],
                'uts' => $uts[$indek],
                'uas' => $uas[$indek]
            ];

            $syarat = [
                'nim' => $nim[$indek],
                'krs.dosenid' => $dosenid,
                'krs.tahun_akademik' => $ta,
                'krs.semester' => $smtr,
                'kodemtk' => $kodemtk
            ];
            $this->model->updateTotable("krs", $data, $syarat);
            $indek++;
        }
        $x = '<script type="text/javascript">alert("Data Nilai Sudah di Simpan");</script>';
        echo $x;
        $this->nilai();
        // $link=base_url('dialog');
        // return redirect()->to($link);
    }

    // mpdf
    // function kepdf()
    // {
    //     $mpdf = new \Mpdf\Mpdf();
    //     $html = $html . "<p><b style='color:tomato'>JUDUL</b><br>SS JDMBZNBZCBZBZNXCBXZNCBXZNC 
    //     XNB ZXNCBXZNCB XZNC BXZNCB XZN CBZX CZXN asghjg dhas dag dghsadgsah g gshg sagdhag gsa
    //     hdgsadg hja sahdghasgh asdghasg ashg dsahg hgsahhsagdhasgasj hdg sahg ashg gsahdg ashs
    //     hd gashdgsagsahdg sahdgasdhsa ashg sahdgashdg sahgd ashgsah dgashd gas ashgdashdggash</p>";
    //     $mpdf->WriteHTML($html);
    //     return redirect()->to($mpdf->Output('tes.pdf', 'I'));
    // }
}
