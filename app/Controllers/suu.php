<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_siakad;
use \Mpdf\Mpdf;

class suu extends Controller
{
    public $model;
    public function __construct()
    {
        $this->model = new Model_siakad();
    }
    public function kepdf()
    {
        $fpdf = new \Mpdf\Mpdf();
        $mhs = $this->model->mahasiswa();
        $data = array('siswa' => $mhs);
        $html = "<center><h1 class='mt-5'>Daftar Mahasiswa</h1></center>";
        $html = $html . " <table class='table tabled-sm mt-3'>";
        $html = $html . "<tr>
            <td>No</td>
            <td>NIM</td>
            <td>Nama Mahasiswa</td>
            <td>Tempat Lahir</td>
            <td>Tanggal lahir</td>
            <td>Alamat</td>
            <td>Program Studi</td>
            </tr>";
        $n = 0;
        foreach ($mhs as $row) {
            $n++;
            $html = $html . "<tr><td>" . $n . "</td>";
            $html = $html . "<td>" . $row->nim . "</td>";
            $html = $html . "<td>" . $row->nama . "</td>";
            $html = $html . "<td>" . $row->lahirdi . "</td>";
            $html = $html . "<td>" . $row->lahirtgl . "</td>";
            $html = $html . "<td>" . $row->alamat . "</td>";
            $html = $html . "<td>" . $row->prodi . "</td>";
        }
        $html = $html . "</table>";

        $fpdf->WriteHTML($html);
        return redirect()->to($fpdf->Output('tes.pdf', 'I'));
    }
}
