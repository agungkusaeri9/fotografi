<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{

	function get($where = null)
	{
		$this->db->select('*');
		$this->db->from('users');
		if ($where != null) {
			$this->db->where($where);
		}
		return $this->db->get();
	}

	public function create($data)
	{
		$this->db->insert('users', $data);
	}

	public function find($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('users')->row();
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('users', $data);
	}

	public function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('users');
	}
}
