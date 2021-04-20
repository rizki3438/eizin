<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_bidang extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_bidang_all()
    {
        $sql = "SELECT bidang.id, bidang.nama, bidang.id_kasi, pegawai.nama AS pegawai_nama, pegawai.nip, pegawai.nrp, pegawai.no_telp, pegawai.tipe FROM bidang , pegawai WHERE bidang.id_kasi = pegawai.id";
        $query = $this->db->query($sql);
        return $query;
    }
    
}
