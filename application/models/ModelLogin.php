<?php 
class ModelLogin extends CI_model
{
	
	function tambah_data($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function cek_login($table,$where)
	{
		return $this->db->get_where($table,$where);
	}
}
?>