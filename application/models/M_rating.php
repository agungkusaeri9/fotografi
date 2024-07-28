<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_rating extends CI_Model
{
	public function create($data)
	{
		$this->db->insert('rating', $data);
	}

	public function status($id_booking)
	{
		$this->db->select('COUNT(*) as count');
		$this->db->where('id_booking', $id_booking);
		$this->db->where('id_user', $this->session->userdata('id'));
		$this->db->from('rating');
		$query = $this->db->get();
		return $query->row()->count;
	}

	public function getByPaketId($id_packet)
	{
		$this->db->select('*');
		$this->db->from('rating');
		$this->db->join('booking', 'booking.id_booking = rating.id_booking', 'inner');
		$this->db->join('packets', 'packets.id_packet = booking.id_packet', 'inner');
		$this->db->join('users', 'users.id = booking.id_user', 'inner');
		$this->db->where('packets.id_packet', $id_packet);
		$this->db->order_by('rating.tanggal_rating', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}
}
