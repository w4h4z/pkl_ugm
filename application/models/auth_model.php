<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function simpan($identitas)
	{
		$data1 = array('USERNAME' 		=> $this->input->post('username'),
					   'PASSWORD' 		=> $this->input->post('password'),
					   'ACCOUNT_EMAIL'	=> $this->input->post('email'),
					   'ROLE'			=> 'Siswa',
					   'STATUS'			=> 'unverified'
						);

		$this->db->insert('tb_akun', $data1);
		$id_akun = $this->db->insert_id();

		$data = array('SISWA_ID' 			=> NULL,
					  'ACCOUNT_ID'			=> $id_akun,
					  'NIS'					=> $this->input->post('nis'),
					  'NAMA_SISWA'			=> $this->input->post('nama'),
					  'JENKEL_SISWA'		=> $this->input->post('jenkel'),
					  'TEMPATLAHIR_SISWA '  => $this->input->post('tempatlahir'), 
					  'TANGGALLAHIR_SISWA'	=> $this->input->post('tgl_lhr'),
					  'AGAMA_SISWA'			=> $this->input->post('agama'),
					  'ALAMAT_SISWA'		=> $this->input->post('alamatsiswa'),
					  'NOHP_SISWA'			=> $this->input->post('nohp'),
					  'ASAL_SMK'			=> $this->input->post('asal'),
					  'JURUSAN'				=> $this->input->post('jurusan'),
					  'NOTELP_SMK'			=> $this->input->post('notelp'),
					  'ALAMAT_SMK'			=> $this->input->post('alamatsekolah'),
					  'TGL_MULAI'			=> $this->input->post('tgl_mulai'),
					  'TGL_SELESAI'			=> $this->input->post('tgl_selesai'),
					  'FOTODIRI_SISWA'		=> NULL,
					  'FOTOIDENTITAS_SISWA'	=> $identitas['file_name']
					  );
	
		$this->db->insert('tb_siswa', $data);
		$id_siswa = $this->db->insert_id();

		$data2 = array('SISWA_ID' => $id_siswa);
		$this->db->where('ACCOUNT_ID', $id_akun)->update('tb_akun', $data2);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

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
}
	