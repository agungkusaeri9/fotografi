<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_paket_image extends CI_Model
{

	function get($id_packet)
	{
		$this->db->select('*');
		$this->db->from('packet_images');
		$this->db->where('packet_id', $id_packet);
		return $this->db->get()->result();
	}

	public function create($data)
	{
		$this->db->insert('packet_images', $data);
	}

	public function find($id_packet_images)
	{
		$this->db->where('id_packet_images', $id_packet_images);
		return $this->db->get('packet_images')->row();
	}


	public function hapus($id_packet_images)
	{
		$this->db->where('id_packet_images', $id_packet_images);
		$this->db->delete('packet_images');
	}
}
