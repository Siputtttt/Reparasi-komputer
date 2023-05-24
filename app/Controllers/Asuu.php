<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use \Mpdf\Mpdf;


class Asuu extends BaseController
{
    public function kepdf(){
        
        $mpdf = new mPDF();
        $x = "<p>TEST CONVERT HTML TO PDF</p>";
        $mpdf->WriteHTML($x);
        return redirect()->to($mpdf->Output('tes.pdf','I'));
    }
}