<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('auth_model');
		$this->load->model('siswa_model');
	}

	public function index()
	{
		$id = $this->session->userdata('SISWA_ID');
		$data['profil'] = $this->siswa_model->profil($id);
		$data['kegiatan'] = $this->siswa_model->get_kegiatan($id);
		$this->load->view('profile_view', $data);
	}

	public function profile()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$id = $this->session->userdata('SISWA_ID');
			$data['profil'] = $this->siswa_model->profil($id);
			$data['kegiatan'] = $this->siswa_model->get_kegiatan($id);
			$this->load->view('profile_view', $data);
		} else {
			redirect('auth');
		}	
	}

	public function kegiatan()
	{
		$id = $this->session->userdata('SISWA_ID');
		if($this->siswa_model->kegiatan($id) == TRUE){
			$this->session->set_flashdata('success', 'Berhasil Menulis Kegiatan');
			redirect('siswa/profile');
		} else {
			$this->session->set_flashdata('failed', 'Gagal Menulis Kegiatan');
			redirect('siswa/profile');
		}
	}

	public function del_kegiatan($id)
	{
		if($this->siswa_model->del_kegiatan($id) == TRUE){
			$this->session->set_flashdata('success', 'Kegiatan Berhasil Dihapus');
			redirect('siswa/profile');
		} else {
			$this->session->set_flashdata('failed', 'Kegiatan Gagal Dihapus');
			redirect('siswa/profile');
		}
	}

}

/* End of file siswa.php */
/* Location: ./application/controllers/siswa.php */