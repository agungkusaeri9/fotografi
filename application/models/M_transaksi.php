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

	function find($id_transaction)
	{
		$this->db->select('transaction.*, users.name as user_name, users.email as user_email');
		$this->db->from('transaction');
		$this->db->where('id_transaction', $id_transaction);
		$this->db->join('booking', 'booking.id_booking=transaction.id_booking');
		$this->db->join('users', 'users.id=booking.id_user');
		return $this->db->get()->row();
	}


	function findKode($kode)
	{
		$this->db->select('transaction.*, users.name as user_name, users.email as user_email');
		$this->db->from('transaction');
		$this->db->where('kode', $kode);
		$this->db->join('booking', 'booking.id_booking=transaction.id_booking');
		$this->db->join('users', 'users.id=booking.id_user');
		return $this->db->get()->row();
	}


	public function update($id_transaction, $data)
	{
		$this->db->where('id_transaction', $id_transaction);
		$this->db->update('transaction', $data);
	}
	public function cetak($tanggal_awal, $tanggal_akhir)
	{
		$this->db->select('*');
		$this->db->from('transaction');
		$this->db->join('booking', 'booking.id_booking = transaction.id_booking', 'inner');
		if ($tanggal_awal && $tanggal_akhir) {
			$this->db->where('transaction.tanggal >=', $tanggal_awal);
			$this->db->where('transaction.tanggal <=', $tanggal_akhir);
		} elseif ($tanggal_awal && !$tanggal_akhir) {
			$this->db->where('DATE(tanggal)', $tanggal_awal);
		}
		$this->db->order_by('transaction.id_transaction', 'DESC');
		return $this->db->get()->result();
	}
}
