<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{

	function get($id_booking)
	{
		$this->db->select('*');
		$this->db->from('transaction');
		$this->db->where('id_booking', $id_booking);
		return $this->db->get()->result();
	}

	function getAll()
	{
		$this->db->select('*');
		$this->db->from('transaction');
		$this->db->join('booking', 'booking.id_booking=transaction.id_booking', 'inner');
		$this->db->join('users', 'users.id=booking.id_user', 'inner');
		$this->db->join('packets', 'packets.id_packet=booking.id_packet', 'inner');
		$this->db->order_by('id_transaction', 'DESC');
		return $this->db->get()->result();
	}
}
