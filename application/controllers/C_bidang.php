<?php

/**
 * Developer : @didintri196
 * Github	 : https://github.com/didintri196
 * Contact	 : didintri196@gmail.com
 * Create At : 04-04-2021
 */

defined('BASEPATH') or exit('No direct script access allowed');
class C_bidang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App');
        $this->load->model('M_bidang');
    }

    public function index()
    {
        $view['_title'] = "Data Bidang &mdash; E-izin Kejari Kota Kediri";
        $view['listdata'] = $this->M_bidang->get_bidang_all();
        $view['listpegawai'] = $this->App->get_all_orderby('pegawai', "id", "DESC");
        $this->template->display_theme('pages/V_bidang', $view);
    }

    public function ack_add()
    {
        $data['id'] = $this->App->GenerateId('bidang', 'K');
        $data['nama'] = $this->input->post('nama');
        $data['id_kasi'] = $this->input->post('id_kasi');
        $insert = $this->App->insert('bidang', $data);
        if ($insert) {
            $this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil membuat data bidang.');
            redirect(base_url('/admin/bidang'));
        } else {
            $this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal membuat data bidang.');
            redirect(base_url('/admin/bidang'));
        }
    }

    public function ack_view($id)
    {
        $where['id'] = $id;
        $data = $this->App->get_where('bidang', $where);
        echo json_encode($data->row());
    }

    public function ack_update()
    {
        $where['id'] = $this->input->post('id');
        $data['nama'] = $this->input->post('nama');
        $data['id_kasi'] = $this->input->post('id_kasi');
        $update = $this->App->update('bidang', $data, $where);
        if ($update) {
            $this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil mengubah data bidang.');
            redirect(base_url('/admin/bidang'));
        } else {
            $this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal mengubah data bidang.');
            redirect(base_url('/admin/bidang'));
        }
    }

    public function ack_delete()
    {
        $where['id'] = $this->input->post('id');
        $delete = $this->App->delete('bidang', $where);
        if ($delete) {
            $this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil hapus data bidang.');
            redirect(base_url('/admin/bidang'));
        } else {
            $this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal hapus data bidang.');
            redirect(base_url('/admin/bidang'));
        }
    }
}
