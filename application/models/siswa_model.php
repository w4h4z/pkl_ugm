<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {

	public function profil($id)
	{
		$this->db->select('*');
		$this->db->where('tb_akun.SISWA_ID', $id);
		$this->db->from('tb_siswa');
		$this->db->join('tb_akun', 'tb_akun.SISWA_ID = tb_siswa.SISWA_ID');

		return $this->db->get()->row();
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

	public function update_foto($foto)
	{
		$id = $this->session->userdata('SISWA_ID');

		$data = array('FOTODIRI_SISWA' => $foto['file_name'] );

		$this->db->where('SISWA_ID', $id)->update('tb_siswa', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

}

/* End of file siswa.php */
/* Location: ./application/models/siswa.php */