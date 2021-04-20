<?php

/**
 * Developer : @didintri196
 * Github	 : https://github.com/didintri196
 * Contact	 : didintri196@gmail.com
 * Create At : 04-04-2021
 */

defined('BASEPATH') or exit('No direct script access allowed');
class C_pangkat extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App');
    }

    public function index()
    {
        $view['_title'] = "Data Pangkat &mdash; E-izin Kejari Kota Kediri";
        $view['listdata'] = $this->App->get_all_orderby('pangkat', "id", "DESC");
        $this->template->display_theme('pages/V_pangkat', $view);
    }

    public function ack_add()
    {
        $data['id'] = $this->App->GenerateId('pangkat', 'K');
        $data['nama'] = $this->input->post('nama');
        $insert = $this->App->insert('pangkat', $data);
        if ($insert) {
            $this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil membuat data pangkat.');
            redirect(base_url('/admin/pangkat'));
        } else {
            $this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal membuat data pangkat.');
            redirect(base_url('/admin/pangkat'));
        }
    }

    public function ack_view($id)
    {
        $where['id'] = $id;
        $data = $this->App->get_where('pangkat', $where);
        echo json_encode($data->row());
    }

    public function ack_update()
    {
        $where['id'] = $this->input->post('id');
        $data['nama'] = $this->input->post('nama');
        $update = $this->App->update('pangkat', $data, $where);
        if ($update) {
            $this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil mengubah data pangkat.');
            redirect(base_url('/admin/pangkat'));
        } else {
            $this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal mengubah data pangkat.');
            redirect(base_url('/admin/pangkat'));
        }
    }

    public function ack_delete()
    {
        $where['id'] = $this->input->post('id');
        $delete = $this->App->delete('pangkat', $where);
        if ($delete) {
            $this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil hapus data pangkat.');
            redirect(base_url('/admin/pangkat'));
        } else {
            $this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal hapus data pangkat.');
            redirect(base_url('/admin/pangkat'));
        }
    }
}
