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
					$this->session->set_flashdata('notif1', 'Pendaftaran Berhasil, Silahkan Log In');
		            redirect('auth');
				} else {
					$this->session->set_flashdata('notif', 'Pendaftaran Gagal');
		            redirect('auth/register');
				}
			} else {
				$this->session->set_flashdata('notif', $this->upload->display_errors());
		        redirect('auth/register');
			}
        }else{
            $this->session->set_flashdata('notif', 'Captcha code was not match, please try again');
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
				$this->session->set_flashdata('notif', 'Login Gagal, Username/Password Salah');
	            redirect('auth');
			}
        } else {
        	$this->session->set_flashdata('notif', 'Captcha code was not match, please try again');
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
            'img_width'     => '150',
            'img_height'    => '50',
            'word_length'   => '8',
            'font_size'     => '16'
        );
        $captcha = create_captcha($config);
        
        // Unset previous captcha and store new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode',$captcha['word']);
        
        // Display captcha image
        echo $captcha['image'];

        redirect(base_url('index.php/auth/register'));
    }

    public function refresh_login(){
        // Captcha configuration
        $config = array(
            'img_path'      => 'captcha_images/',
            'img_url'       => base_url().'captcha_images/',
            'img_width'     => '150',
            'img_height'    => '50',
            'word_length'   => '8',
            'font_size'     => '16'
        );
        $captcha = create_captcha($config);
        
        // Unset previous captcha and store new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode',$captcha['word']);
        
        // Display captcha image
        echo $captcha['image'];

        redirect(base_url('index.php/auth'));
    }

    public function verifikasi()
	{
		$id = $this->session->userdata('SISWA_ID');
		$data['profil'] = $this->siswa_model->profil($id);
		$this->load->view('verifikasi_view', $data);
	}

	/*public function dashboard()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('ROLE') == 'Admin'){
				$data['siswa'] = $this->auth_model->get_data_siswa();
				$data['total'] = $this->auth_model->total_records();
				$data['total_v'] = $this->auth_model->total_verified();
				$data['total_u'] = $this->auth_model->total_unverified();
				$data['main_view'] = 'dashboard_view';
				$this->load->view('template', $data);
			} else {
				redirect('auth/profile');
			}
		} else {
			$this->load->view('login_view');
		}
	}*/

	/*public function data_siswa()
	{
		$data['siswa'] = $this->auth_model->get_data_siswa();
		$data['main_view'] = 'table_siswa_view';
		$this->load->view('template', $data);
	}*/

	/*public function profile()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$id = $this->session->userdata('SISWA_ID');
			$data['profil'] = $this->auth_model->profil($id);
			$data['kegiatan'] = $this->auth_model->get_kegiatan($id);
			$this->load->view('profile_view', $data);
		} else {
			$this->load->view('login_view');
		}	
	}*/

	/*public function verified($id)
	{
		if($this->auth_model->verified($id) == TRUE){
			$this->session->set_flashdata('notif1', 'Approval Success');
			redirect('admin/dashboard');
		} else {
			$this->session->set_flashdata('notif', 'Approval Failed');
            redirect('admin/dashboard');
		}
	}

	public function unverified($id)
	{
		if($this->auth_model->unverified($id) == TRUE){
			$this->session->set_flashdata('notif1', 'Delete Success');
			redirect('admin/dashboard');
		} else {
			$this->session->set_flashdata('notif', 'Delete Failed');
			redirect('admin/dashboard');
		}
	}*/

	/*public function kegiatan()
	{
		$id = $this->session->userdata('SISWA_ID');
		if($this->auth_model->kegiatan($id) == TRUE){
			$this->session->set_flashdata('notif1', 'Berhasil Menulis Kegiatan');
			redirect('auth/profile');
		} else {
			$this->session->set_flashdata('notif', 'Gagal Menulis Kegiatan');
			redirect('auth/profile');
		}
	}

	public function del_kegiatan($id)
	{
		if($this->auth_model->del_kegiatan($id) == TRUE){
			$this->session->set_flashdata('notif1', 'Kegiatan Berhasil Dihapus');
			redirect('auth/profile');
		} else {
			$this->session->set_flashdata('notif', 'Kegiatan Gagal Dihapus');
			redirect('auth/profile');
		}
	}*/

	/*public function del_kegiatan_dashboard($id)
	{
		if($this->auth_model->del_kegiatan($id) == TRUE){
			$this->session->set_flashdata('notif1', 'Kegiatan Berhasil Dihapus');
			redirect('admin/data_kegiatan');
		} else {
			$this->session->set_flashdata('notif', 'Kegiatan Gagal Dihapus');
			redirect('admin/data_kegiatan');
		}
	}*/

	/*public function data_kegiatan()
	{
		$data['kegiatan'] = $this->auth_model->all_kegiatan();
		$data['main_view'] = 'kegiatan_view';
		$this->load->view('template', $data);
	}*/

	/*public function edit_siswa($id)
	{
		$data['siswa'] = $this->auth_model->get_detail_siswa($id);
		$data['main_view'] = 'edit_siswa_view';
		$this->load->view('template', $data);
	}

	public function del_siswa($id)
	{
		if($this->auth_model->del_siswa($id) == TRUE){
			$this->session->set_flashdata('notif1', 'Siswa Berhasil Dihapus');
			redirect('auth/data_siswa');
		} else {
			$this->session->set_flashdata('notif', 'Siswa Gagal Dihapus');
			redirect('auth/data_siswa');
		}
	}

	public function edit_siswa_submit($id)
	{
		if($this->auth_model->edit_siswa($id) == TRUE){
			$this->session->set_flashdata('notif1', 'Edit data berhasil');
			redirect('auth/data_siswa');
		} else {
			$this->session->set_flashdata('notif', 'Edit data gagal');
            redirect('auth/data_siswa');
		}
	}

	public function data_admin()
	{
		$data['admin'] = $this->auth_model->get_data_admin();
		$data['main_view'] = 'table_admin_view';
		$this->load->view('template', $data);
	}*/

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */