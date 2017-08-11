<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('auth_model');
		$this->load->model('siswa_model');
		$this->load->helper('captcha');
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){
			redirect(base_url('index.php/admin/dashboard'));
		} else {
			// Captcha configuration
	        $config = array(
	            'img_path'      => 'captcha_images/',
	            'img_url'       => base_url().'captcha_images/',
	            'img_width'     => '100',
	            'img_height'    => '30',
	            'word_length'   => '4',
	            'font_size'     => '16'
	        );
	        $captcha = create_captcha($config);
	        
	        // Unset previous captcha and store new captcha word
	        $this->session->unset_userdata('captchaCode');
	        $this->session->set_userdata('captchaCode',$captcha['word']);
	        
	        // Send captcha image to view
	        $data['captchaImg'] = $captcha['image'];
			$this->load->view('login_view', $data);
		}
	}

	public function home()
	{
		$this->load->view('home_view');
	}

	public function daftar()
	{	
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '2000';
		$this->load->library('upload', $config);

		$inputCaptcha = $this->input->post('captcha');
        $sessCaptcha = $this->session->userdata('captchaCode');

        if($inputCaptcha === $sessCaptcha){
            if($this->upload->do_upload('identitas')){
				if($this->auth_model->simpan($this->upload->data()) == TRUE){
					$this->session->set_flashdata('success', 'Pendaftaran Berhasil, Silahkan Log In');
		            redirect('auth');
				} else {
					$this->session->set_flashdata('failed', 'Pendaftaran Gagal');
		            redirect('auth/register');
				}
			} else {
				$this->session->set_flashdata('failed', $this->upload->display_errors());
		        redirect('auth/register');
			}
        }else{
            $this->session->set_flashdata('failed', 'Captcha code was not match, please try again');
		    redirect('auth/register');
        }
	}

	public function login()
	{
		$inputCaptcha = $this->input->post('captcha');
        $sessCaptcha = $this->session->userdata('captchaCode');

        if($inputCaptcha === $sessCaptcha){
			if($this->auth_model->login() == TRUE){
				if($this->session->userdata('ROLE') == 'Admin'){
					redirect('admin/dashboard');
				} else {
					if($this->session->userdata('STATUS') == 'verified'){
						redirect('siswa/profile');
					} else {
						redirect('auth/verifikasi');
					}
				}
			} else {
				$this->session->set_flashdata('failed', 'Login Gagal, Username/Password Salah');
	            redirect('auth');
			}
        } else {
        	$this->session->set_flashdata('failed', 'Captcha code was not match, please try again');
	           redirect('auth');
        }
	}

	public function logout()
	{
		$data = array('USERNAME' => '', 'logged_in' => FALSE);

		$this->session->sess_destroy();
		redirect('auth');
	}

	public function register()
	{
		// Captcha configuration
        $config = array(
            'img_path'      => 'captcha_images/',
            'img_url'       => base_url().'captcha_images/',
            'img_width'     => '100',
            'img_height'    => '30',
            'word_length'   => '4',
            'font_size'     => '16'
        );
        $captcha = create_captcha($config);
        
        // Unset previous captcha and store new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode',$captcha['word']);
        
        // Send captcha image to view
        $data['captchaImg'] = $captcha['image'];

		$this->load->view('register_view', $data);
	}

	public function refresh(){
        // Captcha configuration
        $config = array(
            'img_path'      => 'captcha_images/',
            'img_url'       => base_url().'captcha_images/',
            'img_width'     => '100',
            'img_height'    => '30',
            'word_length'   => '4',
            'font_size'     => '16'
        );
        $captcha = create_captcha($config);
        
        // Unset previous captcha and store new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode',$captcha['word']);
        
        // Display captcha image
        echo $captcha['image'];
    }

    public function refresh_login(){
        // Captcha configuration
        $config = array(
            'img_path'      => 'captcha_images/',
            'img_url'       => base_url().'captcha_images/',
            'img_width'     => '100',
            'img_height'    => '30',
            'word_length'   => '4',
            'font_size'     => '16'
        );
        $captcha = create_captcha($config);
        
        // Unset previous captcha and store new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode',$captcha['word']);
        
        // Display captcha image
        echo $captcha['image'];
    }

    public function verifikasi()
	{
		$id = $this->session->userdata('SISWA_ID');
		$data['profil'] = $this->siswa_model->profil($id);
		$this->load->view('verifikasi_view', $data);
	}

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */