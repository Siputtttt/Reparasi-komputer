<?php

namespace App\Controllers;

// class Home extends BaseController
// {
//     public function index()
//     {
//         return view('asu');
//     }
// }

class Home extends BaseController
{
    public function index()
    {
        echo "AKU PINGIN TERBANG";
    }
    function About()
    {
        $x = "Jawa";
        $he = array("pulau" => $x);
        return view('about_message', $he);
    }
    function Asli()
    {
        echo "MABAR BANGGGG";
    }
    // function cetak($nilai)
    // {
    //     $data = ['nilai' => $nilai];
    //     echo view('cetak', $data);
    // }
    function cetak($nilai1, $nilai2)
    {
        $kali = $nilai1 * $nilai2;
        $data = [
            'nilai1' => $nilai1,
            'nilai2' => $nilai2,
            'kali' => $kali
        ];
        echo view('cetak', $data);
    }
    function faktur()
    {
        return view('order/faktur');
    }
}
