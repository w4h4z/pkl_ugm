<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('register_model');
		$this->load->helper('captcha');
	}

	public function index()
	{
		redirect('auth/register');
	}

	public function simpan()
	{	
		/*if ($this->input->post('submit')) {
			$this->form_validation->set_rules('NIS', 'NIS', 'trim|required');
			$this->form_validation->set_rules('nama', 'Nama Siswa', 'trim|required');
			$this->form_validation->set_rules('jenkel', 'Jenis Kelamin', 'trim|required');
			$this->form_validation->set_rules('tempatlahir', 'Tempat Lahir', 'trim|required');
			$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
			$this->form_validation->set_rules('alamatsiswa', 'Alamat Siswa', 'trim|required');
			$this->form_validation->set_rules('nohp', 'Nomor HP', 'trim|required');
			$this->form_validation->set_rules('asal', 'Asal SMK', 'trim|required');
			$this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required');
			$this->form_validation->set_rules('notelp', 'Nomor Telp Sekolah', 'trim|required');
			$this->form_validation->set_rules('alamatsekolah', 'Alamat Sekolah', 'trim|required');
			$this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'trim|required');
			$this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->register_model->simpan() == TRUE){
					$this->session->set_flashdata('notif', 'Pendaftaran Berhasil, Silahkan Log In');
		            redirect('register');
				} else {
					$this->session->set_flashdata('notif', 'Pendaftaran Gagal');
		            redirect('register');
				}
			}  else {
				echo "GAGAL";
			}
		} else {
                $data['notif'] = validation_errors();
                $this->load->view('register_view',$data);
		}*/

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '2000';
		$this->load->library('upload', $config);

		$inputCaptcha = $this->input->post('captcha');
        $sessCaptcha = $this->session->userdata('captchaCode');

        if($inputCaptcha === $sessCaptcha){
            if($this->upload->do_upload('identitas')){
				if($this->register_model->simpan($this->upload->data()) == TRUE){
					$this->session->set_flashdata('notif1', 'Pendaftaran Berhasil, Silahkan Log In');
		            redirect('auth');
				} else {
					$this->session->set_flashdata('notif', 'Pendaftaran Gagal');
		            redirect('register');
				}
			} else {
				$this->session->set_flashdata('notif', $this->upload->display_errors());
		        redirect('register');
			}
        }else{
            $this->session->set_flashdata('notif', 'Captcha code was not match, please try again');
		    redirect('register');
        }
	}

}

/* End of file register.php */
/* Location: ./application/controllers/register.php */