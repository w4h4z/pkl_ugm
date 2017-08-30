<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('auth_model');
		$this->load->model('siswa_model');
	}

	public function index()
	{
		redirect('admin/dashboard');
	}

	public function dashboard()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('ROLE') != 'Siswa'){
				$id = $this->session->userdata('PEMBIMBING_ID');
				$data['siswa'] = $this->admin_model->get_data_siswa();
				$data['siswa1'] = $this->admin_model->get_siswa();
				$data['total'] = $this->admin_model->total_records();
				$data['total_v'] = $this->admin_model->total_verified();
				$data['total_u'] = $this->admin_model->total_unverified();
				$data['total_a'] = $this->admin_model->total_admin();
				$data['total_o'] = $this->admin_model->total_operator();
				$data['petugas'] = $this->admin_model->get_pembimbing($id);
				$data['pembimbing'] = $this->admin_model->get_all_pembimbing();	
				$data['profil'] = $this->admin_model->get_profil_operator($id);
				$data['main_view'] = 'dashboard_view';
				$this->load->view('template', $data);
			} else {
				redirect('siswa');
			}
		} else {
			redirect('auth');
		}
	}

	public function data_siswa()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('ROLE') != 'Siswa'){
				$id = $this->session->userdata('PEMBIMBING_ID');
				$data['petugas'] = $this->admin_model->get_pembimbing($id);	
				$data['siswa'] = $this->admin_model->get_data_siswa();
				$data['profil'] = $this->admin_model->get_profil_operator($id);
				$data['pembimbing'] = $this->admin_model->get_all_pembimbing();	
				$data['main_view'] = 'table_siswa_view';
				$this->load->view('template', $data);
			} else {
				redirect('siswa');
			}
		} else {
			redirect('auth');
		}
	}

	public function verified($id)
	{
		if($this->admin_model->add_pembimbing($id) == TRUE){
			if($this->admin_model->verified($id) == TRUE){
				$this->session->set_flashdata('success', 'Approval Success');
				redirect('admin/dashboard');
			} else {
				$this->session->set_flashdata('failed', 'Approval Failed');
	            redirect('admin/dashboard');
			}
		} else {
			$this->session->set_flashdata('failed', 'Approval Failed');
	        redirect('admin/dashboard');
		}
	}

	public function unverified($id)
	{
		if($this->admin_model->unverified($id) == TRUE){
			$this->session->set_flashdata('success', 'Delete Success');
			redirect('admin/dashboard');
		} else {
			$this->session->set_flashdata('failed', 'Delete Failed');
			redirect('admin/dashboard');
		}
	}

	public function del_kegiatan_dashboard($id)
	{
		if($this->siswa_model->del_kegiatan($id) == TRUE){
			$this->session->set_flashdata('success', 'Kegiatan Berhasil Dihapus');
			redirect('admin/data_kegiatan');
		} else {
			$this->session->set_flashdata('failed', 'Kegiatan Gagal Dihapus');
			redirect('admin/data_kegiatan');
		}
	}

	public function data_kegiatan()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('ROLE') != 'Siswa'){
				$id = $this->session->userdata('PEMBIMBING_ID');
				$data['petugas'] = $this->admin_model->get_pembimbing($id);	
				$data['kegiatan'] = $this->admin_model->all_kegiatan();
				$data['main_view'] = 'kegiatan_view';
				$data['profil'] = $this->admin_model->get_profil_operator($id);
				$this->load->view('template', $data);
			} else {
				redirect('siswa');
			}
		} else {
			redirect('auth');
		}
		
	}

	public function add_siswa()
	{	
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '2000';
		$this->load->library('upload', $config);

            if($this->upload->do_upload('identitas')){
				if($this->admin_model->add_siswa($this->upload->data()) == TRUE){
					$this->session->set_flashdata('success', 'Pendaftaran Berhasil');
		            redirect('admin/data_siswa');
				} else {
					$this->session->set_flashdata('failed', 'Pendaftaran Gagal');
		            redirect('admin/data_siswa');
				}
			} else {
				$this->session->set_flashdata('failed', $this->upload->display_errors());
		        redirect('admin/data_siswa');
			}
	}

	public function edit_siswa($id)
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('ROLE') != 'Siswa'){
				$id_p = $this->session->userdata('PEMBIMBING_ID');
				$data['petugas'] = $this->admin_model->get_pembimbing($id_p);	
				$data['siswa'] = $this->admin_model->get_detail_siswa($id);
				$data['profil'] = $this->admin_model->get_profil_operator($id);
				$data['main_view'] = 'edit_siswa_view';
				$this->load->view('template', $data);
			} else {
				redirect('siswa');
			}
		} else {
			redirect('auth');
		}
		
	}

	public function del_siswa($id)
	{
		if($this->admin_model->del_siswa($id) == TRUE){
			$this->session->set_flashdata('success', 'Siswa Berhasil Dihapus');
			redirect('admin/data_siswa');
		} else {
			$this->session->set_flashdata('failed', 'Siswa Gagal Dihapus');
			redirect('admin/data_siswa');
		}
	}

	public function edit_siswa_submit($id)
	{
		if(!isset($_FILES['identitas']) || $_FILES['identitas']['error'] == UPLOAD_ERR_NO_FILE) {
		    if($this->admin_model->edit_siswa($id) == TRUE){
				$this->session->set_flashdata('success', 'Edit data berhasil');
				redirect('admin/data_siswa');
			} else {
				$this->session->set_flashdata('success', 'Edit data berhasil');
			    redirect('admin/data_siswa');
			}
		} else {
		    $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2000';
			$this->load->library('upload', $config);

			if($this->upload->do_upload('identitas')){
				if($this->admin_model->edit_siswa_upload($id, $this->upload->data()) == TRUE){
					$this->session->set_flashdata('success', 'Edit data berhasil');
					redirect('admin/data_siswa');
				} else {
					$this->session->set_flashdata('success', 'Edit data berhasil');
		            redirect('admin/data_siswa');
				}
			} else {
				$this->session->set_flashdata('failed', $this->upload->display_errors());
		        redirect('admin/data_siswa');
			}
		}
	}

	public function data_operator()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('ROLE') != 'Siswa'){
				$id = $this->session->userdata('PEMBIMBING_ID');
				$data['petugas'] = $this->admin_model->get_pembimbing($id);	
				$data['admin'] = $this->admin_model->get_data_operator();
				$data['profil'] = $this->admin_model->get_profil_operator($id);
				$data['main_view'] = 'table_operator_view';
				$this->load->view('template', $data);
			} else {
				redirect('siswa');
			}
		} else {
			redirect('auth');
		}
		
	}

	public function add_operator()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '2000';
		$this->load->library('upload', $config);

        if($this->upload->do_upload('identitas')){
			if($this->admin_model->tambah_operator($this->upload->data()) == TRUE){
				$this->session->set_flashdata('success', 'Tambah Operator Berhasil');
				redirect('admin/data_operator');
			} else {
				$this->session->set_flashdata('failed', 'Tambah Operator Gagal');
				redirect('admin/data_operator');
			}
		} else {
			$this->session->set_flashdata('failed', $this->upload->display_errors());
	        redirect('admin/data_operator');
		}
	}

	public function add_admin()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '2000';
		$this->load->library('upload', $config);

        if($this->upload->do_upload('identitas')){
			if($this->admin_model->tambah_admin($this->upload->data()) == TRUE){
				$this->session->set_flashdata('success', 'Tambah admin berhasil');
				redirect('admin/data_admin');
			} else {
				$this->session->set_flashdata('failed', 'Tambah admin gagal');
				redirect('admin/data_admin');
			}
		} else {
			$this->session->set_flashdata('failed', $this->upload->display_errors());
	        redirect('admin/data_admin');
		}
	}

	public function edit_operator($id)
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('ROLE') != 'Siswa'){
				$id_p = $this->session->userdata('PEMBIMBING_ID');
				$data['petugas'] = $this->admin_model->get_pembimbing($id_p);	
				$data['petugas1'] = $this->admin_model->get_detail_petugas($id);
				$data['profil'] = $this->admin_model->get_profil_operator($id);
				$data['main_view'] = 'edit_operator_view';
				$this->load->view('template', $data);
			} else {
				redirect('siswa');
			}
		} else {
			redirect('auth');
		}
		
	}

	public function edit_admin($id)
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('ROLE') != 'Siswa'){
				$id_p = $this->session->userdata('PEMBIMBING_ID');
				$data['petugas'] = $this->admin_model->get_pembimbing($id_p);	
				$data['petugas1'] = $this->admin_model->get_detail_petugas($id);
				$data['profil'] = $this->admin_model->get_profil_operator($id);
				$data['main_view'] = 'edit_admin_view';
				$this->load->view('template', $data);
			} else {
				redirect('siswa');
			}
		} else {
			redirect('auth');
		}
	}

	public function edit_operator_submit($id)
	{
		if(!isset($_FILES['identitas']) || $_FILES['identitas']['error'] == UPLOAD_ERR_NO_FILE) {
			if($this->admin_model->edit_petugas($id) == TRUE){
				$this->session->set_flashdata('success', 'Edit data berhasil');
				redirect('admin/data_operator');
			} else {
				$this->session->set_flashdata('success', 'Edit data berhasil');
			    redirect('admin/data_operator');
			}
		} else {
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2000';
			$this->load->library('upload', $config);

	        if($this->upload->do_upload('identitas')){
				if($this->admin_model->edit_petugas_upload($id, $this->upload->data()) == TRUE){
					$this->session->set_flashdata('success', 'Edit data berhasil');
					redirect('admin/data_operator');
				} else {
					$this->session->set_flashdata('success', 'Edit data berhasil');
			        redirect('admin/data_operator');
				}
			} else {
				$this->session->set_flashdata('failed', $this->upload->display_errors());
		        redirect('admin/data_operator');
			}   
		}
	}

	public function edit_admin_submit($id)
	{
		if(!isset($_FILES['identitas']) || $_FILES['identitas']['error'] == UPLOAD_ERR_NO_FILE) {
			if($this->admin_model->edit_petugas($id) == TRUE){
				$this->session->set_flashdata('success', 'Edit data berhasil');
				redirect('admin/data_admin');
			} else {
				$this->session->set_flashdata('success', 'Edit data berhasil');
			    redirect('admin/data_admin');
			}
		} else {
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2000';
			$this->load->library('upload', $config);

	        if($this->upload->do_upload('identitas')){
				if($this->admin_model->edit_petugas_upload($id, $this->upload->data()) == TRUE){
					$this->session->set_flashdata('success', 'Edit data berhasil');
					redirect('admin/data_admin');
				} else {
					$this->session->set_flashdata('success', 'Edit data berhasil');
			        redirect('admin/data_admin');
				}
			} else {
				$this->session->set_flashdata('failed', $this->upload->display_errors());
		        redirect('admin/data_admin');
			}   
		}
	}

	public function del_operator($id)
	{
		if($this->admin_model->del_petugas($id) == TRUE){
			$this->session->set_flashdata('success', 'Operator Berhasil Dihapus');
			redirect('admin/data_operator');
		} else {
			$this->session->set_flashdata('failed', 'Operator Gagal Dihapus');
			redirect('admin/data_operator');
		}
	}

	public function del_admin($id)
	{
		if($this->admin_model->del_petugas($id) == TRUE){
			$this->session->set_flashdata('success', 'Admin Berhasil Dihapus');
			redirect('admin/data_admin');
		} else {
			$this->session->set_flashdata('failed', 'Admin Gagal Dihapus');
			redirect('admin/data_admin');
		}
	}

	public function data_admin()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('ROLE') != 'Siswa'){
				if($this->session->userdata('ROLE') == 'Admin'){
					$id = $this->session->userdata('PEMBIMBING_ID');
					$data['petugas'] = $this->admin_model->get_pembimbing($id);	
					$data['admin'] = $this->admin_model->get_data_admin();
					$data['profil'] = $this->admin_model->get_profil_operator($id);
					$data['total_a'] = $this->admin_model->total_admin();
					$data['main_view'] = 'table_admin_view';
					$this->load->view('template', $data);
				} else {
					redirect('admin');
				}
			} else {
				redirect('siswa');
			}
		} else {
			redirect('auth');
		}
	}

	public function role_operator($id)
	{
		if($this->admin_model->update_role($id) == TRUE){
			$this->session->set_flashdata('success', 'Role berhasil di update');
			redirect('admin/data_operator');
		} else {
			$this->session->set_flashdata('failed', 'Pastikan Role yang akan anda ganti benar');
			redirect('admin/data_operator');
		}
	}

	public function role_admin($id)
	{
		if($this->admin_model->update_role($id) == TRUE){
			$this->session->set_flashdata('success', 'Role berhasil di update');
			redirect('admin/data_admin');
		} else {
			$this->session->set_flashdata('failed', 'Pastikan Role yang akan anda ganti benar');
			redirect('admin/data_admin');
		}
	}

	public function foto_profil()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '2000';
		$this->load->library('upload', $config);

		if($this->upload->do_upload('foto')){
			if($this->admin_model->update_foto($this->upload->data()) == TRUE){
				$this->session->set_flashdata('success', 'Update foto berhasil');
		        redirect('admin/dashboard');
			} else {
				$this->session->set_flashdata('failed', 'Update foto gagal');
		        redirect('admin/dashboard');
			}
		} else {
			$this->session->set_flashdata('failed', $this->upload->display_errors());
		    redirect('admin/dashboard');
		}
	}

	public function edit_profil_operator()
	{
		$id = $this->session->userdata('PEMBIMBING_ID');
		if(!isset($_FILES['identitas']) || $_FILES['identitas']['error'] == UPLOAD_ERR_NO_FILE) {
			if($this->admin_model->edit_petugas($id) == TRUE){
				$this->session->set_flashdata('success', 'Edit data berhasil');
				redirect('admin/data_operator');
			} else {
				$this->session->set_flashdata('success', 'Edit data berhasil');
			    redirect('admin/data_operator');
			}
		} else {
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2000';
			$this->load->library('upload', $config);

	        if($this->upload->do_upload('identitas')){
				if($this->admin_model->edit_petugas_upload($id, $this->upload->data()) == TRUE){
					$this->session->set_flashdata('success', 'Edit data berhasil');
					redirect('admin/data_operator');
				} else {
					$this->session->set_flashdata('success', 'Edit data berhasil');
			        redirect('admin/data_operator');
				}
			} else {
				$this->session->set_flashdata('failed', $this->upload->display_errors());
		        redirect('admin/data_operator');
			}   
		}
	}

	public function user_manual_operator()
	{
		$data['main_view'] = 'um_operator_view';
		$data['menu'] = 'um_menu_operator';
		$this->load->view('template_user_manual', $data);
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */