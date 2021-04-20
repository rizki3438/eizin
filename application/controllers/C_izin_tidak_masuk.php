<?php

/**
 * Developer : @didintri196
 * Github	 : https://github.com/didintri196
 * Contact	 : didintri196@gmail.com
 * Create At : 04-04-2021
 */

defined('BASEPATH') or exit('No direct script access allowed');

class C_izin_tidak_masuk extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App');
        $this->load->model('M_pegawai');
        $this->load->model('M_izin_tidak_masuk');
        $this->load->library('pdf');
		$this->load->library('Uploader');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $view['_title'] = "Izin Tidak Masuk &mdash; E-izin Kejari Kota Kediri";
        if ($this->input->post()) {
            $this->add();
        } else {
            $this->template->display_ui('ui/V_tidak_masuk', $view);
        }
    }

    public function test()
    {
        $resp = $this->kirimnotif_user(6289672845350, "\nSurat izin tidak masuk dengan code *AAA*, *DISETUJUI* oleh pimpinan.");
        echo $resp;
        // $data['nama']="DIDIN TRI ANGGORO";
        // $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // $pdf->setPrintFooter(false);
        // $pdf->setPrintHeader(false);
        // $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
        // $pdf->AddPage('');
        // $pdf->Write(0, 'Simpan ke PDF - Jaranguda.com', '', 0, 'L', true, 0, false, false, 0);
        // $pdf->SetFont('');

        //    echo $this->load->view('pdf/surat_izin_tidak_masuk', $data, true);
        // $pdf->writeHTML($tabel);
        // $pdf->Output('file-pdf-codeigniter.pdf', 'I');
    }

    public function add($url = "")
    {
        $id_pimpinan = "";
        $nomor_pimpinan = "";

        $id_pegawai = $this->input->post('id');
        $data_pegawai = $this->M_pegawai->get_one_pegawai_id($id_pegawai)->row();
        $id_golongan = $data_pegawai->id_golongan;
        $id_bidang = $data_pegawai->id_bidang;
        if ($id_golongan >= 12) {
            $where['id_jabatan'] = 1;
            $data_kejari = $this->App->get_where('pegawai', $where)->row();
            $id_pimpinan = $data_kejari->id;
            $nomor_pimpinan = $data_kejari->no_telp;
        } else {
            //CARI KASI BIDANG
            $where_bidang['id'] = $id_bidang;
            $data_bidang = $this->App->get_where('bidang', $where_bidang)->row();
            //CARI PEGAWAI
            $where['id'] = $data_bidang->id_kasi;
            $data_kasi = $this->App->get_where('pegawai', $where)->row();
            $id_pimpinan = $data_kasi->id;
            $nomor_pimpinan = $data_kasi->no_telp;
        }
        $code = $this->generateRandomString();
        $no_telp = $this->input->post('no_telp');
        $keterangan = $this->input->post('keterangan');
        $data['code'] = $code;
        $data['id_pegawai'] = $id_pegawai;
        $data['createAt'] = time();
        $data['start'] = strtotime($this->input->post('start'));
        $data['end'] = strtotime($this->input->post('end'));
        $data['kategori'] = $this->input->post('kategori');
        $data['keterangan'] = $keterangan;
        $data['status'] = "PENGAJUAN";
        $data['id_pimpinan'] = $id_pimpinan;
        $data['alasan_ditolak'] = "-";
		
		$upload = $this->uploader->image();
		
		if($upload['status']=="success"){
            $nama_file=$upload['data']['file_name'];
            $data['bukti'] = $nama_file;
	
            $insert = $this->App->insert('pengajuan_izin', $data);
            if ($insert) {
                $diff  = $data['end'] - $data['start'];
                $hari = floor($diff / (60 * 60 * 24));
                $resp = $this->kirimnotif_pimpinan($nomor_pimpinan, $code, $data_pegawai->nama, $data_pegawai->jabatan_nama, $data_pegawai->golongan_nama, $hari, $keterangan, $this->input->post('start'), $this->input->post('end'));
                $resp = $this->kirimnotif_user($no_telp, "Surat izin tidak masuk anda sudah kami ajukan ke pimpinan anda dengan code *$code*, Silahkan tunggu notifikasi whatsapp bahwa surat izin anda diterima atau tidak.");
                $this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil mengajukan surat izin. ');
                redirect(base_url($url));
            } else {
                $this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal mengajukan surat izin.');
                redirect(base_url($url));
            }
		}
        else{
            $this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal mengupload gambar.');
            redirect(base_url($url));
        }
    }

    public function generateRandomString($length = 8)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function kirimnotif_pimpinan($nomor, $code, $nama, $pangkat, $golongan, $hari, $keterangan, $start, $end)
    {
        //ubah timezone menjadi jakarta
        date_default_timezone_set("Asia/Jakarta");

        //ambil jam dan menit
        $jam = date('H:i');

        //atur salam menggunakan IF
        if ($jam > '00:00' && $jam < '10:00') {
            $salam = 'Pagi';
        } elseif ($jam >= '10:00' && $jam < '15:00') {
            $salam = 'Siang';
        } elseif ($jam < '18:00') {
            $salam = 'Sore';
        } else {
            $salam = 'Malam';
        }

        //tampilkan pesan
        // echo 'Selamat ' . $salam;
        $diterima = base_url() . "tidak-masuk/approve/" . $code;
        $ditolak = base_url() . "tidak-masuk/decline/" . $code;
        $message = "*Selamat " . $salam . "*, Sistem E-IZIN menginfokan ada pegawai izin $hari hari dengan keterangan :\n*Nama*: $nama\n*Jabatan/Gol* : $pangkat ($golongan)\n*Tanggal*: $start s/d $end\n*Keterangan*: $keterangan\n*Jika Diterima* silahkan klik link dibawah :\n$diterima\n*Jika Ditolak* silahkan klik link dibawah :\n$ditolak";
        // $curl = curl_init();
        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => "https://app.pingnotif.com/api-whatsapp",
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => "",
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => "POST",
        //     CURLOPT_POSTFIELDS => "number_phone=$nomor&message=$message",
        //     CURLOPT_HTTPHEADER => array(
        //         "key: daa634d31bca36194cd5841631d5e639" . $this->config->item('api-key-wa'),
        //         "Content-Type: application/x-www-form-urlencoded"
        //     ),
        // ));
        // $response = curl_exec($curl);
        // curl_close($curl);
        $curl = curl_init();
        $token = $this->config->item('api-key-wa');
        $data['phone']=$nomor;
		$data['message']=$message;
		$data['secret']=false;
		$data['priority']=false;

        curl_setopt(
            $curl,
            CURLOPT_HTTPHEADER,
            array(
                "Authorization: $token",
            )
        );
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_URL, "https://us.wablas.com/api/send-message");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }

    public function kirimnotif_user($nomor, $pesan)
    {
        //ubah timezone menjadi jakarta
        date_default_timezone_set("Asia/Jakarta");

        //ambil jam dan menit
        $jam = date('H:i');

        //atur salam menggunakan IF
        if ($jam > '00:00' && $jam < '10:00') {
            $salam = 'Pagi';
        } elseif ($jam >= '10:00' && $jam < '15:00') {
            $salam = 'Siang';
        } elseif ($jam < '18:00') {
            $salam = 'Sore';
        } else {
            $salam = 'Malam';
        }

        $message = "*Selamat " . $salam . "*,$pesan";
        // $curl = curl_init();
        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => "https://app.pingnotif.com/api-whatsapp",
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => "",
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => "POST",
        //     CURLOPT_POSTFIELDS => "number_phone=$nomor&message=$message",
        //     CURLOPT_HTTPHEADER => array(
        //         "key: daa634d31bca36194cd5841631d5e639" . $this->config->item('api-key-wa'),
        //         "Content-Type: application/x-www-form-urlencoded"
        //     ),
        // ));
        // $response = curl_exec($curl);
        // curl_close($curl);
        $curl = curl_init();
        $token = $this->config->item('api-key-wa');
        $data['phone']=$nomor;
		$data['message']=$message;
		$data['secret']=false;
		$data['priority']=false;

        curl_setopt(
            $curl,
            CURLOPT_HTTPHEADER,
            array(
                "Authorization: $token",
            )
        );
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_URL, "https://us.wablas.com/api/send-message");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    //ADMIN
    public function index_admin()
    {
        $view['_title'] = "Data Izin Tidak Masuk &mdash; E-izin Kejari Kota Kediri";
        $view['listdata'] = $this->M_izin_tidak_masuk->get_izin_tdk_msk_all();
        $view['listpegawai'] = $this->App->get_all_orderby('pegawai', "id", "DESC");
        $this->template->display_theme('pages/V_izin_tidak_masuk', $view);
    }

    public function ack_add()
    {
        $this->add("/admin/izin-tidak-masuk");
    }

    public function ack_view($id)
    {
        $where['id'] = $id;
        $data = $this->App->get_where('pengajuan_izin', $where);
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
        $data['id_pegawai'] = $id_pegawai;
        $data['start'] = strtotime($this->input->post('start'));
        $data['end'] = strtotime($this->input->post('end'));
        $data['kategori'] = $this->input->post('kategori');
        $data['keterangan'] = $keterangan;
        $update = $this->App->update('pengajuan_izin', $data, $where);
        if ($update) {
            $this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil mengubah data izin tidak masuk pegawai.');
            redirect(base_url('/admin/izin-tidak-masuk'));
        } else {
            $this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal mengubah data izin tidak masuk pegawai.');
            redirect(base_url('/admin/izin-tidak-masuk'));
        }
    }

    public function ack_delete()
    {
        $where['id'] = $this->input->post('id');
        $delete = $this->App->delete('pengajuan_izin', $where);
        if ($delete) {
            $this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil hapus data izin tidak masuk pegawai.');
            redirect(base_url('/admin/izin-tidak-masuk'));
        } else {
            $this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal hapus data izin tidak masuk pegawai.');
            redirect(base_url('/admin/izin-tidak-masuk'));
        }
    }

    public function approve($code)
    {
        $view['_title'] = "Izin Tidak Masuk &mdash; E-izin Kejari Kota Kediri";
        $where['code'] = $code;
        $data['status'] = "DISETUJUI";
        $view['code'] = $code;
		$print = base_url() . "tidak-masuk/print/" . $code;
        $update = $this->App->update('pengajuan_izin', $data, $where);
        $data_izin = $this->App->get_where('pengajuan_izin', $where)->row();
        $data_pegawai = $this->M_pegawai->get_one_pegawai_id($data_izin->id_pegawai)->row();
        $resp = $this->kirimnotif_user($data_pegawai->no_telp, "\nSurat izin tidak masuk dengan code *$code*, *DISETUJUI* oleh pimpinan. Silahkan cetak surat anda dengan klik link di bawah ini : \n$print");
        $this->template->display_ui('ui/V_izin_diterima', $view);
    }

    public function decline($code)
    {
        $where['code'] = $code;
        if ($this->input->post()) {
            $data['status'] = "DITOLAK";
            $data['alasan_ditolak'] = $this->input->post("alasan_ditolak");
            $update = $this->App->update('pengajuan_izin', $data, $where);
            if ($update) {
                $data_izin = $this->App->get_where('pengajuan_izin', $where)->row();
                $data_pegawai = $this->M_pegawai->get_one_pegawai_id($data_izin->id_pegawai)->row();
                $resp = $this->kirimnotif_user($data_pegawai->no_telp, "\nSurat izin tidak masuk dengan code *$code* *DITOLAK* oleh pimpinan dengan keterangan " . $this->input->post("alasan_ditolak"));
                $this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil menolak izin pegawai.');
            } else {
                $this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal menolak izin pegawai.');
            }
        }
        $view['_title'] = "Izin Tidak Masuk &mdash; E-izin Kejari Kota Kediri";
        $this->template->display_ui('ui/V_alasan_ditolak', $view);
    }

    public function printdata($code)
    {
        $view['pimpinan'] = $this->M_izin_tidak_masuk->get_pimpinan_id($code)->row();
        $view['rowdata'] = $this->M_izin_tidak_masuk->get_izin_tdk_msk_code($code)->row();
        $view['nrp'] = $this->M_izin_tidak_masuk->get_nrp($code)->row();
        $view['_title'] = "SURAT IZIN TIDAK MASUK - ".$view['rowdata']->nama;

        $this->pdf->setFileName('SURAT IZIN TIDAK MASUK - '.$view['rowdata']->nama);
        $this->pdf->setPaper('A4', 'Potrait');
        $this->pdf->loadView('pdf/surat_izin_tidak_masuk', $view);
    }
}
