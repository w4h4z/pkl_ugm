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