<?php

/**
 * Developer : @didintri196
 * Github	 : https://github.com/didintri196
 * Contact	 : didintri196@gmail.com
 * Create At : 04-04-2021
 */

defined('BASEPATH') or exit('No direct script access allowed');
class C_pegawai extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App');
        $this->load->model('M_pegawai');
    }

    public function index()
    {
        $view['_title'] = "Data Pegawai &mdash; E-izin Kejari Kota Kediri";
        $view['listdata'] = $this->M_pegawai->get_all_pegawai();
        $view['listpangkat'] = $this->App->get_all_orderby('pangkat', "id", "DESC");
        $view['listbidang'] = $this->App->get_all_orderby('bidang', "id", "DESC");
        $view['listjabatan'] = $this->App->get_all_orderby('jabatan', "id", "DESC");
        $view['listgolongan'] = $this->App->get_all_orderby('golongan', "id", "DESC");
        $this->template->display_theme('pages/V_pegawai', $view);
    }

    public function ack_add()
    {
        $data['nama'] = $this->input->post('nama');
        $data['nip'] = $this->input->post('nip');
        $data['nrp'] = $this->input->post('nrp');
        $data['id_pangkat'] = $this->input->post('id_pangkat');
        $data['id_bidang'] = $this->input->post('id_bidang');
        $data['id_jabatan'] = $this->input->post('id_jabatan');
        $data['id_golongan'] = $this->input->post('id_golongan');
        $data['no_telp'] = $this->input->post('no_telp');
        $data['tipe'] = $this->input->post('tipe');
        $insert = $this->App->insert('pegawai', $data);
        if ($insert) {
            $this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil membuat data pegawai.');
            redirect(base_url('/admin/pegawai'));
        } else {
            $this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal membuat data pegawai.');
            redirect(base_url('/admin/pegawai'));
        }
    }

    public function ack_view($id)
    {
        $where['id'] = $id;
        $data = $this->App->get_where('pegawai', $where);
        echo json_encode($data->row());
    }

    public function viewnrp($nrp)
    {
        $data = $this->M_pegawai->get_one_pegawai_nrp($nrp);
        echo json_encode($data->row());
    }

    public function ack_update()
    {
        $where['id'] = $this->input->post('id');
        $data['nama'] = $this->input->post('nama');
        $data['nip'] = $this->input->post('nip');
        $data['nrp'] = $this->input->post('nrp');
        $data['id_pangkat'] = $this->input->post('id_pangkat');
        $data['id_bidang'] = $this->input->post('id_bidang');
        $data['id_jabatan'] = $this->input->post('id_jabatan');
        $data['id_golongan'] = $this->input->post('id_golongan');
        $data['no_telp'] = $this->input->post('no_telp');
        $data['tipe'] = $this->input->post('tipe');
        $update = $this->App->update('pegawai', $data, $where);
        if ($update) {
            $this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil mengubah data pegawai.');
            redirect(base_url('/admin/pegawai'));
        } else {
            $this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal mengubah data pegawai.');
            redirect(base_url('/admin/pegawai'));
        }
    }

    public function ack_delete()
    {
        $where['id'] = $this->input->post('id');
        $delete = $this->App->delete('pegawai', $where);
        if ($delete) {
            $this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil hapus data pegawai.');
            redirect(base_url('/admin/pegawai'));
        } else {
            $this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal hapus data pegawai.');
            redirect(base_url('/admin/pegawai'));
        }
    }
}
