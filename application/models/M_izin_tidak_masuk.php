<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_izin_tidak_masuk extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_izin_tdk_msk_all()
    {
        $sql = "SELECT pegawai.nama, pegawai.nip, pegawai.nrp, pegawai.id_pangkat, pegawai.id_bidang, pegawai.id_jabatan, pegawai.id_golongan, pegawai.no_telp, pangkat.nama AS pangkat_nama, jabatan.nama AS jabatan_nama, bidang.nama AS bidang_nama, golongan.nama AS golongan_nama, pengajuan_izin.id, pengajuan_izin.`code`, pengajuan_izin.id_pegawai, pengajuan_izin.createAt, pengajuan_izin.`start`, pengajuan_izin.`end`, pengajuan_izin.kategori, pengajuan_izin.keterangan, pengajuan_izin.`status`, pengajuan_izin.bukti, pengajuan_izin.id_pimpinan, pengajuan_izin.alasan_ditolak FROM pegawai , pangkat , jabatan , bidang , golongan , pengajuan_izin WHERE pegawai.id_pangkat = pangkat.id AND pegawai.id_bidang = bidang.id AND pegawai.id_jabatan = jabatan.id AND pegawai.id_golongan = golongan.id AND pegawai.id = pengajuan_izin.id_pegawai";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_izin_tdk_msk_code($code)
    {
        $sql = "SELECT pegawai.nama, pegawai.nip, pegawai.nrp, pegawai.id_pangkat, pegawai.id_bidang, pegawai.id_jabatan, pegawai.id_golongan, pegawai.no_telp, pangkat.nama AS pangkat_nama, jabatan.nama AS jabatan_nama, bidang.nama AS bidang_nama, golongan.nama AS golongan_nama, pengajuan_izin.id, pengajuan_izin.`code`, pengajuan_izin.id_pegawai, pengajuan_izin.createAt, pengajuan_izin.`start`, pengajuan_izin.`end`, pengajuan_izin.kategori, pengajuan_izin.keterangan, pengajuan_izin.`status`, pengajuan_izin.id_pimpinan, pengajuan_izin.alasan_ditolak FROM pegawai , pangkat , jabatan , bidang , golongan , pengajuan_izin WHERE pengajuan_izin.code='$code' AND pegawai.id_pangkat = pangkat.id AND pegawai.id_bidang = bidang.id AND pegawai.id_jabatan = jabatan.id AND pegawai.id_golongan = golongan.id AND pegawai.id = pengajuan_izin.id_pegawai";
        $query = $this->db->query($sql);
        return $query;
    }
	
	public function get_pimpinan_id($code)
    {
        $sql = "SELECT p.id, p.nama, p.nip, p.nrp FROM pegawai p , pengajuan_izin pi WHERE pi.code = '$code' AND p.id=pi.id_pimpinan";
        $query = $this->db->query($sql);
        return $query;
    }
    
    public function get_nrp($code)
    {
        $sql = "SELECT p.id, p.nrp FROM pegawai p , pengajuan_izin pi WHERE pi.code = '$code' AND p.id=pi.id_pimpinan";
        $query = $this->db->query($sql);
        return $query;
    }
    
}
