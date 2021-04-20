<?php

/**
 * Developer : @didintri196
 * Github	 : https://github.com/didintri196
 * Contact	 : didintri196@gmail.com
 * Create At : 04-04-2021
 */

defined('BASEPATH') or exit('No direct script access allowed');
class C_golongan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App');
    }

    public function index()
    {
        $view['_title'] = "Data Golongan &mdash; E-izin Kejari Kota Kediri";
        $view['listdata'] = $this->App->get_all_orderby('golongan', "id", "DESC");
        $this->template->display_theme('pages/V_golongan', $view);
    }

    public function ack_add()
    {
        $data['id'] = $this->App->GenerateId('golongan', 'K');
        $data['nama'] = $this->input->post('nama');
        $insert = $this->App->insert('golongan', $data);
        if ($insert) {
            $this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil membuat data golongan.');
            redirect(base_url('/admin/golongan'));
        } else {
            $this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal membuat data golongan.');
            redirect(base_url('/admin/golongan'));
        }
    }

    public function ack_view($id)
    {
        $where['id'] = $id;
        $data = $this->App->get_where('golongan', $where);
        echo json_encode($data->row());
    }

    public function ack_update()
    {
        $where['id'] = $this->input->post('id');
        $data['nama'] = $this->input->post('nama');
        $update = $this->App->update('golongan', $data, $where);
        if ($update) {
            $this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil mengubah data golongan.');
            redirect(base_url('/admin/golongan'));
        } else {
            $this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal mengubah data golongan.');
            redirect(base_url('/admin/golongan'));
        }
    }

    public function ack_delete()
    {
        $where['id'] = $this->input->post('id');
        $delete = $this->App->delete('golongan', $where);
        if ($delete) {
            $this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil hapus data golongan.');
            redirect(base_url('/admin/golongan'));
        } else {
            $this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal hapus data golongan.');
            redirect(base_url('/admin/golongan'));
        }
    }
}
