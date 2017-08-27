<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function get_data_siswa()
	{
		$this->db->select('*');
		$this->db->from('tb_siswa');
		$this->db->join('tb_akun', 'tb_akun.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->join('tb_detail', 'tb_detail.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->join('tb_pembimbing', 'tb_pembimbing.PEMBIMBING_ID = tb_detail.PEMBIMBING_ID');
		$this->db->order_by('tb_siswa.SISWA_ID', 'ASC');

		return $this->db->get()->result();
	}

	public function get_siswa()
	{
		$this->db->select('*');
		$this->db->from('tb_siswa');
		$this->db->join('tb_akun', 'tb_akun.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->order_by('tb_siswa.SISWA_ID', 'ASC');

		return $this->db->get()->result();
	}

	public function get_all_pembimbing()
	{
		$this->db->select('*');
		$this->db->from('tb_pembimbing');
		$this->db->order_by('tb_pembimbing.NAMA_PEMBIMBING', 'ASC');

		return $this->db->get()->result();
	}

	public function get_pembimbing($id)
	{
		return $this->db->where('PEMBIMBING_ID', $id)->get('tb_pembimbing')->row();
	}

	public function get_detail_siswa($id)
	{
		$this->db->where('tb_siswa.SISWA_ID', $id);
		$this->db->from('tb_siswa');
		$this->db->join('tb_akun', 'tb_akun.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->order_by('tb_siswa.SISWA_ID', 'ASC');

		return $this->db->get()->row();
	}

	public function get_data_operator()
	{
		$role = 'Operator';
		$this->db->where('ROLE', $role);
		$this->db->from('tb_pembimbing');
		$this->db->join('tb_akun_admin', 'tb_akun_admin.PEMBIMBING_ID = tb_pembimbing.PEMBIMBING_ID');
		$this->db->order_by('tb_pembimbing.PEMBIMBING_ID', 'ASC');

		return $this->db->get()->result();
	}

	public function get_data_admin()
	{
		$role = 'Admin';
		$this->db->where('ROLE', $role);
		$this->db->from('tb_pembimbing');
		$this->db->join('tb_akun_admin', 'tb_akun_admin.PEMBIMBING_ID = tb_pembimbing.PEMBIMBING_ID');
		$this->db->order_by('tb_pembimbing.PEMBIMBING_ID', 'ASC');

		return $this->db->get()->result();
	}

	public function get_detail_petugas($id)
	{
		$this->db->where('tb_pembimbing.PEMBIMBING_ID', $id);
		$this->db->from('tb_pembimbing');
		$this->db->join('tb_akun_admin', 'tb_akun_admin.PEMBIMBING_ID = tb_pembimbing.PEMBIMBING_ID');
		$this->db->order_by('tb_pembimbing.PEMBIMBING_ID', 'ASC');

		return $this->db->get()->row();
	}

	public function get_profil_operator($id)
	{
		$this->db->select('*');
		$this->db->where('tb_pembimbing.PEMBIMBING_ID', $id);
		$this->db->from('tb_pembimbing');
		$this->db->join('tb_akun_admin', 'tb_akun_admin.PEMBIMBING_ID = tb_pembimbing.PEMBIMBING_ID');

		return $this->db->get()->row();
	}

	public function total_records()
	{
		return $this->db->from('tb_siswa')->count_all_results();
	}

	public function total_verified()
	{
		$status = 'verified';
		$role = 'Siswa';
		return $this->db->from('tb_akun')->where('STATUS', $status)
										 ->where('ROLE', $role)
										 ->count_all_results();
	}

	public function total_unverified()
	{
		$status = 'unverified';
		return $this->db->from('tb_akun')->where('STATUS', $status)->count_all_results();
	}

	public function total_admin()
	{
		$role = 'Admin';
		return $this->db->from('tb_akun_admin')->where('ROLE', $role)->count_all_results();
	}

	public function total_operator()
	{
		$role = 'Operator';
		return $this->db->from('tb_akun_admin')->where('ROLE', $role)->count_all_results();
	}

	public function verified($id)
	{
		$data = array('STATUS' => 'verified');

		$this->db->where('SISWA_ID',$id)->update('tb_akun',$data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function unverified($id)
	{
		$this->db->where('SISWA_ID', $id)
				 ->delete('tb_akun');
		$this->db->where('SISWA_ID', $id)
				 ->delete('tb_siswa');

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function add_pembimbing($id)
	{
		$data = array('SISWA_ID'	 		=> $id,
					  'PEMBIMBING_ID' 		=> $this->input->post('pembimbing')
					);

		$this->db->insert('tb_detail', $data);
		$id_detail = $this->db->insert_id();

		$data1 = array('DETAIL_ID' => $id_detail );
		$this->db->where('SISWA_ID', $id)->update('tb_siswa', $data1);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function del_siswa($id)
	{
		$this->db->where('SISWA_ID', $id)->delete('tb_siswa');
		$this->db->where('SISWA_ID', $id)->delete('tb_akun');

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function all_kegiatan()
	{
		$this->db->select('*');
		$this->db->from('tb_siswa');
		$this->db->join('tb_akun', 'tb_akun.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->join('tb_kegiatansiswa', 'tb_kegiatansiswa.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->order_by('tb_kegiatansiswa.ID_KEGSIS', 'DESC');

		return $this->db->get()->result();
	}

	public function add_siswa($identitas)
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
					  'FOTODIRI_SISWA'		=> 'blank.png',
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

	public function edit_siswa($id)
	{
		$data1 = array('USERNAME' 		=> $this->input->post('username'),
					   'PASSWORD' 		=> $this->input->post('password'),
					   'ACCOUNT_EMAIL'	=> $this->input->post('email'),
						);

		$this->db->where('SISWA_ID', $id)->update('tb_akun', $data1);

		$data = array('NIS'					=> $this->input->post('nis'),
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
					  'TGL_SELESAI'			=> $this->input->post('tgl_selesai')
					  );
	
		$this->db->where('SISWA_ID', $id)->update('tb_siswa', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function edit_siswa_upload($id, $identitas)
	{
		$data1 = array('USERNAME' 		=> $this->input->post('username'),
					   'PASSWORD' 		=> $this->input->post('password'),
					   'ACCOUNT_EMAIL'	=> $this->input->post('email'),
						);

		$this->db->where('SISWA_ID', $id)->update('tb_akun', $data1);

		$data = array('NIS'					=> $this->input->post('nis'),
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
					  'FOTOIDENTITAS_SISWA'	=> $identitas['file_name']
					  );
	
		$this->db->where('SISWA_ID', $id)->update('tb_siswa', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function tambah_admin($identitas)
	{
		$data1 = array('USERNAME' 		=> $this->input->post('username'),
					   'PASSWORD' 		=> $this->input->post('password'),
					   'ACCOUNT_EMAIL'	=> $this->input->post('email'),
					   'ROLE'			=> 'Admin',
						);

		$this->db->insert('tb_akun_admin', $data1);
		$id_akun = $this->db->insert_id();

		$data = array('NIP' 						=> $this->input->post('nip'),
					  'ACCOUNT_ID'					=> $id_akun,
					  'NAMA_PEMBIMBING'				=> $this->input->post('nama'),
					  'JENKEL_PEMBIMBING'			=> $this->input->post('jenkel'),
					  'NOHP_PEMBIMBING'				=> $this->input->post('no_hp'),
					  'ALAMAT_PEMBIMBING'			=> $this->input->post('alamat'),
					  'FOTODIRI_PEMBIMBING'			=> 'blank.png',
					  'FOTOIDENTITAS_PEMBIMBING'	=> $identitas['file_name']
					  );
	
		$this->db->insert('tb_pembimbing', $data);
		$id_pembimbing = $this->db->insert_id();

		$data2 = array('PEMBIMBING_ID' => $id_pembimbing);
		$this->db->where('ACCOUNT_ADMIN_ID', $id_akun)->update('tb_akun_admin', $data2);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function tambah_operator($identitas)
	{
		$data1 = array('USERNAME' 		=> $this->input->post('username'),
					   'PASSWORD' 		=> $this->input->post('password'),
					   'ACCOUNT_EMAIL'	=> $this->input->post('email'),
					   'ROLE'			=> 'Operator',
						);

		$this->db->insert('tb_akun_admin', $data1);
		$id_akun = $this->db->insert_id();

		$data = array('NIP' 						=> $this->input->post('nip'),
					  'ACCOUNT_ID'					=> $id_akun,
					  'NAMA_PEMBIMBING'				=> $this->input->post('nama'),
					  'JENKEL_PEMBIMBING'			=> $this->input->post('jenkel'),
					  'NOHP_PEMBIMBING'				=> $this->input->post('no_hp'),
					  'ALAMAT_PEMBIMBING'			=> $this->input->post('alamat'),
					  'FOTODIRI_PEMBIMBING'			=> 'blank.png',
					  'FOTOIDENTITAS_PEMBIMBING'	=> $identitas['file_name']
					  );
	
		$this->db->insert('tb_pembimbing', $data);
		$id_pembimbing = $this->db->insert_id();

		$data2 = array('PEMBIMBING_ID' => $id_pembimbing);
		$this->db->where('ACCOUNT_ADMIN_ID', $id_akun)->update('tb_akun_admin', $data2);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function edit_petugas($id)
	{
		$data1 = array('USERNAME' 		=> $this->input->post('username'),
					   'PASSWORD' 		=> $this->input->post('password'),
					   'ACCOUNT_EMAIL'	=> $this->input->post('email')
						);

		$this->db->where('PEMBIMBING_ID', $id)->update('tb_akun_admin', $data1);

		$data = array('NIP'							=> $this->input->post('nip'),
					  'NAMA_PEMBIMBING'				=> $this->input->post('nama'),
					  'JENKEL_PEMBIMBING'			=> $this->input->post('jenkel'),
					  'NOHP_PEMBIMBING'				=> $this->input->post('no_hp'),
					  'ALAMAT_PEMBIMBING'			=> $this->input->post('alamat')
					  );
	
		$this->db->where('PEMBIMBING_ID', $id)->update('tb_pembimbing', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function edit_petugas_upload($id, $identitas)
	{
		$data1 = array('USERNAME' 		=> $this->input->post('username'),
					   'PASSWORD' 		=> $this->input->post('password'),
					   'ACCOUNT_EMAIL'	=> $this->input->post('email')
						);

		$this->db->where('PEMBIMBING_ID', $id)->update('tb_akun_admin', $data1);

		$data = array('NIP'							=> $this->input->post('nip'),
					  'NAMA_PEMBIMBING'				=> $this->input->post('nama'),
					  'JENKEL_PEMBIMBING'			=> $this->input->post('jenkel'),
					  'NOHP_PEMBIMBING'				=> $this->input->post('no_hp'),
					  'ALAMAT_PEMBIMBING'			=> $this->input->post('alamat'),
					  'FOTOIDENTITAS_PEMBIMBING'	=> $identitas['file_name']
					  );
	
		$this->db->where('PEMBIMBING_ID', $id)->update('tb_pembimbing', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}


	public function del_petugas($id)
	{
		$this->db->where('PEMBIMBING_ID', $id)->delete('tb_pembimbing');
		$this->db->where('PEMBIMBING_ID', $id)->delete('tb_akun_admin');

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function update_role($id)
	{
		$data = array('ROLE' => $this->input->post('role'));

		$this->db->where('PEMBIMBING_ID', $id)->update('tb_akun_admin', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function update_foto($foto)
	{
		$id = $this->session->userdata('PEMBIMBING_ID');

		$data = array('FOTODIRI_PEMBIMBING' => $foto['file_name'] );

		$this->db->where('PEMBIMBING_ID', $id)->update('tb_pembimbing', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */