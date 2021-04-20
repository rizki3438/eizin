<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pegawai extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_all_pegawai()
    {
        $sql = "SELECT pegawai.id, pegawai.nama, pegawai.nip, pegawai.nrp, pegawai.id_pangkat, pegawai.id_bidang, pegawai.id_jabatan, pegawai.id_golongan, pegawai.no_telp, pangkat.nama AS pangkat_nama, jabatan.nama AS jabatan_nama, bidang.nama AS bidang_nama, golongan.nama AS golongan_nama FROM pegawai , pangkat , jabatan , bidang , golongan WHERE pegawai.id_pangkat = pangkat.id AND pegawai.id_bidang = bidang.id AND pegawai.id_jabatan = jabatan.id AND pegawai.id_golongan = golongan.id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_one_pegawai_id($id)
    {
        $sql = "SELECT pegawai.id, pegawai.nama, pegawai.nip, pegawai.nrp, pegawai.id_pangkat, pegawai.id_bidang, pegawai.id_jabatan, pegawai.id_golongan, pegawai.no_telp, pangkat.nama AS pangkat_nama, jabatan.nama AS jabatan_nama, bidang.nama AS bidang_nama, golongan.nama AS golongan_nama FROM pegawai , pangkat , jabatan , bidang , golongan WHERE pegawai.id = $id AND pegawai.id_pangkat = pangkat.id AND pegawai.id_bidang = bidang.id AND pegawai.id_jabatan = jabatan.id AND pegawai.id_golongan = golongan.id";
        $query = $this->db->query($sql);
        return $query;
    }
    public function get_one_pegawai_nrp($nrp)
    {
        $sql = "SELECT pegawai.id, pegawai.nama, pegawai.nip, pegawai.nrp, pegawai.id_pangkat, pegawai.id_bidang, pegawai.id_jabatan, pegawai.id_golongan, pegawai.no_telp, pangkat.nama AS pangkat_nama, jabatan.nama AS jabatan_nama, bidang.nama AS bidang_nama, golongan.nama AS golongan_nama FROM pegawai , pangkat , jabatan , bidang , golongan WHERE pegawai.nrp = $nrp AND pegawai.id_pangkat = pangkat.id AND pegawai.id_bidang = bidang.id AND pegawai.id_jabatan = jabatan.id AND pegawai.id_golongan = golongan.id";
        $query = $this->db->query($sql);
        return $query;
    }
}
