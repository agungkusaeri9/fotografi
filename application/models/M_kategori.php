<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kategori extends CI_Model
{

	function get($where = null)
	{
		$this->db->select('*');
		$this->db->from('kategori');
		if ($where != null) {
			$this->db->where($where);
		}
		return $this->db->get();
	}

	public function create($data)
	{
		$this->db->insert('kategori', $data);
	}

	public function find($id_kategori)
	{
		$this->db->where('id_kategori', $id_kategori);
		return $this->db->get('kategori')->row();
	}

	public function update($id_kategori, $data)
	{
		$this->db->where('id_kategori', $id_kategori);
		$this->db->update('kategori', $data);
	}

	public function hapus($id_kategori)
	{
		$this->db->where('id_kategori', $id_kategori);
		$this->db->delete('kategori');
	}
}
