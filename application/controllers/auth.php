<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('register_model');
		$this->load->helper('captcha');
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){
			redirect(base_url('index.php/auth/dashboard'));
		} else {
			$this->load->view('login_view');
		}
		//$this->load->view('login_view');
	}

	public function login()
	{
		if($this->admin_model->login() == TRUE){
			if($this->session->userdata('ROLE') == 'Admin'){
				redirect('auth/dashboard');
			} else {
				if($this->session->userdata('STATUS') == 'verified'){
					redirect('auth/profile');
				} else {
					redirect('auth/verifikasi/');
				}
			}
		} else {
			$this->session->set_flashdata('notif', 'Login Gagal, Username/Password Salah');
            redirect('auth');
		}
	}

	public function logout()
	{
		$data = array('USERNAME' => '', 'logged_in' => FALSE);

		$this->session->sess_destroy();
		$this->load->view('login_view');
	}

	public function register()
	{
		// Captcha configuration
        $config = array(
            'img_path'      => 'captcha_images/',
            'img_url'       => base_url().'captcha_images/',
            'img_width'     => '100',
            'img_height'    => 30,
            'word_length'   => 4,
            'font_size'     => 16
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
            'img_width'     => '150',
            'img_height'    => 50,
            'word_length'   => 8,
            'font_size'     => 16
        );
        $captcha = create_captcha($config);
        
        // Unset previous captcha and store new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode',$captcha['word']);
        
        // Display captcha image
        echo $captcha['image'];

        redirect(base_url('index.php/auth/register'));
    }

	public function dashboard()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('ROLE') == 'Admin'){
				$data['siswa'] = $this->register_model->get_data_siswa();
				$data['total'] = $this->register_model->total_records();
				$data['total_v'] = $this->register_model->total_verified();
				$data['total_u'] = $this->register_model->total_unverified();
				$data['main_view'] = 'dashboard_view';
				$this->load->view('template', $data);
			} else {
				redirect('auth/profile');
			}
		} else {
			$this->load->view('login_view');
		}
	}

	public function data_siswa()
	{
		$data['siswa'] = $this->register_model->get_data_siswa();
		$data['main_view'] = 'table_siswa_view';
		$this->load->view('template', $data);
	}

	public function profile()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$id = $this->session->userdata('SISWA_ID');
			$data['profil'] = $this->register_model->profil($id);
			$data['kegiatan'] = $this->register_model->get_kegiatan($id);
			$this->load->view('profile_view', $data);
		} else {
			$this->load->view('login_view');
		}	
	}

	public function verifikasi()
	{
		$id = $this->session->userdata('SISWA_ID');
		$data['profil'] = $this->register_model->profil($id);
		$this->load->view('verifikasi_view', $data);
	}

	public function verified($id)
	{
		if($this->register_model->verified($id) == TRUE){
			$this->session->set_flashdata('notif1', 'Approval Success');
			redirect('auth/dashboard');
		} else {
			$this->session->set_flashdata('notif', 'Approval Failed');
            redirect('auth/dashboard');
		}
	}

	public function unverified($id)
	{
		if($this->register_model->unverified($id) == TRUE){
			$this->session->set_flashdata('notif1', 'Delete Success');
			redirect('auth/dashboard');
		} else {
			$this->session->set_flashdata('notif', 'Delete Failed');
			redirect('auth/dashboard');
		}
	}

	public function kegiatan()
	{
		$id = $this->session->userdata('SISWA_ID');
		if($this->register_model->kegiatan($id) == TRUE){
			$this->session->set_flashdata('notif1', 'Berhasil Menulis Kegiatan');
			redirect('auth/profile');
		} else {
			$this->session->set_flashdata('notif', 'Gagal Menulis Kegiatan');
			redirect('auth/profile');
		}
	}

	public function del_kegiatan($id)
	{
		if($this->register_model->del_kegiatan($id) == TRUE){
			$this->session->set_flashdata('notif1', 'Kegiatan Berhasil Dihapus');
			redirect('auth/profile');
		} else {
			$this->session->set_flashdata('notif', 'Kegiatan Gagal Dihapus');
			redirect('auth/profile');
		}
	}

	public function data_kegiatan()
	{
		$data['kegiatan'] = $this->register_model->all_kegiatan();
		$data['main_view'] = 'kegiatan_view';
		$this->load->view('template', $data);
	}

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */