<?php
/**
 * Developer : @didintri196
 * Github	 : https://github.com/didintri196
 * Contact	 : didintri196@gmail.com
 * Create At : 04-04-2021
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('auth') == false) {
			redirect(base_url('auth/login'));
		}
	}
	public function index()
	{
		$view['_title']="Dashboard &mdash; E-izin Kejari Kota Kediri";
		$this->template->display_theme('pages/V_body',$view);
	}
	public function redirect(){
		redirect(base_url('admin/dashboard'));
	}
}
