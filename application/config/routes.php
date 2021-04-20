<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Developer : @didintri196
 * Github	 : https://github.com/didintri196
 * Contact	 : didintri196@gmail.com
 * Create At : 04-04-2021
 */

//PAGE
$route['default_controller'] = 'C_izin_tidak_masuk';
$route['admin'] = 'C_dashboard/redirect';
$route['admin/dashboard'] = 'C_dashboard';

//login
$route['auth/login'] = 'C_auth';
$route['auth/logout'] = 'C_auth/logout';

$route['admin/jabatan'] = 'C_jabatan';
$route['admin/jabatan/add'] = 'C_jabatan/ack_add';
$route['admin/jabatan/view/(.*)'] = 'C_jabatan/ack_view/$1';
$route['admin/jabatan/update'] = 'C_jabatan/ack_update';
$route['admin/jabatan/delete'] = 'C_jabatan/ack_delete';

$route['admin/pangkat'] = 'C_pangkat';
$route['admin/pangkat/add'] = 'C_pangkat/ack_add';
$route['admin/pangkat/view/(.*)'] = 'C_pangkat/ack_view/$1';
$route['admin/pangkat/update'] = 'C_pangkat/ack_update';
$route['admin/pangkat/delete'] = 'C_pangkat/ack_delete';

$route['admin/bidang'] = 'C_bidang';
$route['admin/bidang/add'] = 'C_bidang/ack_add';
$route['admin/bidang/view/(.*)'] = 'C_bidang/ack_view/$1';
$route['admin/bidang/update'] = 'C_bidang/ack_update';
$route['admin/bidang/delete'] = 'C_bidang/ack_delete';

$route['admin/pegawai'] = 'C_pegawai';
$route['admin/pegawai/add'] = 'C_pegawai/ack_add';
$route['admin/pegawai/view/(.*)'] = 'C_pegawai/ack_view/$1';
$route['admin/pegawai/update'] = 'C_pegawai/ack_update';
$route['admin/pegawai/delete'] = 'C_pegawai/ack_delete';

$route['admin/golongan'] = 'C_golongan';
$route['admin/golongan/add'] = 'C_golongan/ack_add';
$route['admin/golongan/view/(.*)'] = 'C_golongan/ack_view/$1';
$route['admin/golongan/update'] = 'C_golongan/ack_update';
$route['admin/golongan/delete'] = 'C_golongan/ack_delete';

$route['admin/izin-tidak-masuk'] = 'C_izin_tidak_masuk/index_admin';
$route['admin/izin-tidak-masuk/add'] = 'C_izin_tidak_masuk/ack_add';
$route['admin/izin-tidak-masuk/view/(.*)'] = 'C_izin_tidak_masuk/ack_view/$1';
$route['admin/izin-tidak-masuk/update'] = 'C_izin_tidak_masuk/ack_update';
$route['admin/izin-tidak-masuk/delete'] = 'C_izin_tidak_masuk/ack_delete';

$route['tidak-masuk'] = 'C_izin_tidak_masuk';
$route['tidak-masuk/print/(.*)'] = 'C_izin_tidak_masuk/printdata/$1';
$route['tidak-masuk/approve/(.*)'] = 'C_izin_tidak_masuk/approve/$1';
$route['tidak-masuk/decline/(.*)'] = 'C_izin_tidak_masuk/decline/$1';

$route['test'] = 'C_izin_tidak_masuk/test';
$route['cari-nrp/(.*)'] = 'C_pegawai/viewnrp/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
