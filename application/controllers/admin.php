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
		$data['siswa'] = $this->admin_model->get_data_siswa();
		$data['total'] = $this->admin_model->total_records();
		$data['total_v'] = $this->admin_model->total_verified();
		$data['total_u'] = $this->admin_model->total_unverified();
		$data['main_view'] = 'dashboard_view';
		$this->load->view('template', $data);
	}

	public function dashboard()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('ROLE') == 'Admin'){
				$data['siswa'] = $this->admin_model->get_data_siswa();
				$data['total'] = $this->admin_model->total_records();
				$data['total_v'] = $this->admin_model->total_verified();
				$data['total_u'] = $this->admin_model->total_unverified();
				$data['main_view'] = 'dashboard_view';
				$this->load->view('template', $data);
			} else {
				redirect('siswa/profile');
			}
		} else {
			redirect('auth');
		}
	}

	public function data_siswa()
	{
		$data['siswa'] = $this->admin_model->get_data_siswa();
		$data['main_view'] = 'table_siswa_view';
		$this->load->view('template', $data);
	}

	public function verified($id)
	{
		if($this->admin_model->verified($id) == TRUE){
			$this->session->set_flashdata('success', 'Approval Success');
			redirect('admin/dashboard');
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
		$data['kegiatan'] = $this->admin_model->all_kegiatan();
		$data['main_view'] = 'kegiatan_view';
		$this->load->view('template', $data);
	}

	public function edit_siswa($id)
	{
		$data['siswa'] = $this->admin_model->get_detail_siswa($id);
		$data['main_view'] = 'edit_siswa_view';
		$this->load->view('template', $data);
	}

	public function del_siswa($id)
	{
		if($this->admin_model->del_siswa($id) == TRUE){
			$this->session->set_flashdata('success', 'Siswa Berhasil Dihapus');
			redirect('auth/data_siswa');
		} else {
			$this->session->set_flashdata('failed', 'Siswa Gagal Dihapus');
			redirect('auth/data_siswa');
		}
	}

	public function edit_siswa_submit($id)
	{
		if($this->admin_model->edit_siswa($id) == TRUE){
			$this->session->set_flashdata('success', 'Edit data berhasil');
			redirect('auth/data_siswa');
		} else {
			$this->session->set_flashdata('failed', 'Edit data gagal');
            redirect('auth/data_siswa');
		}
	}

	public function data_admin()
	{
		$data['admin'] = $this->admin_model->get_data_admin();
		$data['main_view'] = 'table_admin_view';
		$this->load->view('template', $data);
	}

	public function add_admin()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '2000';
		$this->load->library('upload', $config);

        if($this->upload->do_upload('identitas')){
			if($this->admin_model->tambah_petugas($this->upload->data()) == TRUE){
				$this->session->set_flashdata('success', 'Tambah admin berhasil');
				redirect('admin/data_admin');
			} else {
				$this->session->set_flashdata('failed', 'Tambah admin Gagal');
				redirect('admin/data_admin');
			}
		} else {
			$this->session->set_flashdata('failed', $this->upload->display_errors());
	        redirect('admin/data_admin');
		}
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */