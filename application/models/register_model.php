<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {

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
					  'PEMBIMBING_ID' 		=> NULL,
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

	public function get_data_siswa()
	{
		$this->db->select('*');
		$this->db->from('tb_siswa');
		$this->db->join('tb_akun', 'tb_akun.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->order_by('tb_siswa.SISWA_ID', 'ASC');

		return $this->db->get()->result();
	}

	public function get_detail_siswa($id)
	{
		$this->db->where('tb_siswa.SISWA_ID', $id);
		$this->db->from('tb_siswa');
		$this->db->join('tb_akun', 'tb_akun.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->order_by('tb_siswa.SISWA_ID', 'ASC');

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
		$this->db->where('SISWA_ID',$id)
				 ->delete('tb_akun');

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function profil($id)
	{
		return $this->db->where('SISWA_ID', $id)->get('tb_siswa')->row();
	}

	public function kegiatan($id)
	{
		$data = array('TGL_KEGSIS'		=> date('Y-m-d'),
					  'ISI_KEGSIS'		=> $this->input->post('kegiatan'),
					  'SISWA_ID'		=> $id
					 );

		$this->db->insert('tb_kegiatansiswa', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_kegiatan($id)
	{
		$this->db->where('tb_siswa.SISWA_ID', $id);
		$this->db->from('tb_siswa');
		$this->db->join('tb_akun', 'tb_akun.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->join('tb_kegiatansiswa', 'tb_kegiatansiswa.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->order_by('tb_kegiatansiswa.ID_KEGSIS', 'DESC');

		return $this->db->get()->result();
		//return $this->db->where('SISWA_ID', $id)->get('tb_kegiatansiswa')->result();
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

	public function del_kegiatan($id)
	{
		$this->db->where('ID_KEGSIS', $id)->delete('tb_kegiatansiswa');

		if($this->db->affected_rows() > 0){
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
					  'TGL_SELESAI'			=> $this->input->post('tgl_selesai'),
					  );
	
		$this->db->where('SISWA_ID', $id)->update('tb_siswa', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

}

/* End of file register_model.php */
/* Location: ./application/models/register_model.php */