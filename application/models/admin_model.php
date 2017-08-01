<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$query = $this->db->where('USERNAME',$username)
						  ->where('PASSWORD',$password)
						  ->get('tb_akun');

		if($query->num_rows() > 0){
			$siswa = array_shift($query->result_array());

			$data = array('USERNAME' 	=> $username, 
						  'logged_in' 	=> TRUE, 
						  'SISWA_ID' 	=> $siswa['SISWA_ID'], 
						  'ROLE' 		=> $siswa['ROLE'],
						  'STATUS'		=> $siswa['STATUS']
						);

			$this->session->set_userdata($data);

			return TRUE;
		} else {
			return FALSE;
		}
	}

	/*public function get_detail_siswa()
	{
		$id = $this->session->userdata('SISWA_ID');
		return $this->db->get_where('tb_siswa',array('SISWA_ID'-> $id));
	}*/

}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */