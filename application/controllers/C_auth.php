<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        /*if ($this->session->userdata('auth') == true) {
            redirect(base_url('dashboard'));
        }*/

        $this->load->model('m_auth');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        $this->form_validation->set_message('required', 'harap masukkan %s');

        if ($this->form_validation->run() == false) {
            $data['_title'] = "Halaman Login E-izin Kejaksaan Negeri Kota Kediri";
            $this->load->view('pages/V_login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $where = array(
            'username' => htmlspecialchars($username),
            'password' => md5($password),
        );

        $check = $this->m_auth->login_check($where);

        if ($check) {
                $data = array(
                    'auth' => true,
                    'id' => $check['id']
                );
                $this->session->set_userdata($data);
                redirect(base_url('admin'));
        } else {
            $this->session->set_flashdata('login_message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            Username atau password salah!
            </div>');
            redirect(base_url('auth/login'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();

        redirect(base_url('auth/login'));
    }

}
