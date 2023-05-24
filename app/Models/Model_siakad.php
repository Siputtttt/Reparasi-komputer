<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_siakad extends Model
{
    public $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    //------------- keperluan CRUD ------------------
    public function insertTotable($table, $data)
    {
        $res = $this->db->table($table)->insert($data);
        return $res;
    }
    public function deleteFromtable($table, $kriteria)
    {
        $query = $this->db->table($table)->delete($kriteria);
        return $query;
    }
    public function updateTotable($table, $data, $kriteria)
    {
        $query = $this->db->table($table)->update($data, $kriteria);
        return $query;
    }
    function sql_query($sql)
    {
        $this->db->query($sql);
    }
    //-----------------batas-----------------------------

    function mahasiswa()
    {
        // $sql = "SELECT * FROM mahasiswa";
        // $hsl = $this->db->query($sql)->getResult();
        // return $hsl;

        //untuk mengambil data dari tabel
        // $dapatkan = $this->db->table('mahasiswa')->get();
        // $hsl = $dapatkan->getResult();
        // return $hsl;

        //inner join SQL
        // $sql = "SELECT mahasiswa. *, prodi.prodi FROM mahasiswa INNER JOIN prodi ON mahasiswa.kode = prodi.kode";
        // $hsl = $this->db->query($sql)->getResult();
        // return $hsl;

        //Inner join codeingnater
        $builder = $this->db->table('mahasiswa');
        $builder->select('*');
        $builder->join('prodi', 'prodi.kode = mahasiswa.kode');
        $query = $builder->get();
        return $query->getResult();
    }

    function combo_prod()
    {
        $sql = "SELECT * FROM prodi";
        $hsl = $this->db->query($sql)->getResult();
        foreach ($hsl as $r) {
            $cprodi[$r->kode] = $r->prodi;
        }
        return $cprodi;
    }

    function save_prodi()
    {
        $sql = "INSERT * FROM prodi";
        $hsl = $this->db->query($sql)->getResult();
        foreach ($hsl as $r) {
            $cprodi[$r->kode] = $r->prodi;
        }
        return $cprodi;
    }

    function info_mhs($nim)
    {
        $sql = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
        $hsl = $this->db->query($sql)->getRow();
        return $hsl;
    }


    function combo_dosen()
    {
        $sql = "SELECT * FROM dosen ";
        $hsl = $this->db->query($sql)->getResult();
        foreach ($hsl as $r) {
            $cprodi[$r->dosenid] = $r->dosen_nama;
        }
        return $cprodi;
    }
    function combo_mtk()
    {
        $sql = "SELECT * FROM matakuliah ";
        $hsl = $this->db->query($sql)->getResult();
        foreach ($hsl as $r) {
            $cprodi[$r->kodemtk] = $r->matakuliah;
        }
        return $cprodi;
    }
    function info_dsn($dosenid)
    {
        $builder = $this->db->table('dosen');
        $builder->select('*');
        $builder->where('dosenid', $dosenid);
        $hsl = $builder->get()->getRow();
        return $hsl;
    }
    function info_mtk($kodemtk)
    {
        $builder = $this->db->table('matakuliah');
        $builder->select('*');
        $builder->where('kodemtk', $kodemtk);
        $hsl = $builder->get()->getRow();
        return $hsl;
    }
    function krs($dosenid, $ta, $smtr, $kodemtk)
    {
        $syarat = ['krs.dosenid' => $dosenid, 'krs.tahun_akademik' => $ta, 'krs.semester' => $smtr, 'kodemtk' => $kodemtk];
        $builder = $this->db->table('mahasiswa');
        $builder->select('*');
        $builder->join('krs', 'mahasiswa.nim = krs.nim');
        $builder->where($syarat);
        $query = $builder->get();
        return $query->getResult();
        $sql = "SELECT mahasiswa.nama,krs.* FROM mahasiswa INNER JOIN krs ON mahasiswa.nim=krs.nim WHERE krs.dosenid=$dosenid and semester=$smtr and tahun_akademik='$ta'";
        echo $sql;
        $hsl = $this->db->query($sql)->getRow();
        return $hsl;
    }
}
