<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_booking extends CI_Model
{

	public function get()
	{
		$this->db->select('*');
		$this->db->from('booking');
		$this->db->join('users', 'users.id = booking.id_user', 'inner');
		$this->db->join('packets', 'packets.id_packet = booking.id_packet', 'inner');
		$this->db->order_by('tanggal_booking', 'DESC');

		$query = $this->db->get();
		return $query->result();
	}

	public function getByUser()
	{
		$this->db->select('*');
		$this->db->from('booking');
		$this->db->join('users', 'users.id = booking.id_user', 'inner');
		$this->db->join('packets', 'packets.id_packet = booking.id_packet', 'inner');
		$this->db->where('users.id', $this->session->userdata('id'));
		$this->db->order_by('tanggal_booking', 'DESC');

		$query = $this->db->get();
		return $query->result();
	}

	public function create($data)
	{
		$this->db->insert('booking', $data);
		$id_booking = $this->db->insert_id();
		$jumlah_pembayaran = $data['jumlah_pembayaran'];
		if ($jumlah_pembayaran == 1) {
			$total_harga = $data['total_bayar'];
			$this->db->insert('transaction', [
				'id_booking' => $id_booking,
				'total_harga' => $total_harga,
				'status_transaksi' => 'Menunggu Pembayaran',
				'data' => NULL,
				'keterangan' => 'Pelunasan'
			]);
		} else {
			$total_harga = $data['total_bayar'] / 2;
			$this->db->insert('transaction', [
				'id_booking' => $id_booking,
				'total_harga' => $total_harga,
				'status_transaksi' => 'Menunggu Pembayaran',
				'data' => NULL,
				'keterangan' => 'Down Payment'
			]);

			$this->db->insert('transaction', [
				'id_booking' => $id_booking,
				'total_harga' => $total_harga,
				'status_transaksi' => 'Menunggu Pembayaran',
				'data' => NULL,
				'keterangan' => 'Pelunasan'
			]);
		}
	}

	public function find($id_booking)
	{
		$this->db->select('*');
		$this->db->from('booking');
		$this->db->join('users', 'users.id = booking.id_user', 'inner');
		$this->db->join('packets', 'packets.id_packet = booking.id_packet', 'inner');
		$this->db->where('id_booking', $id_booking);

		$query = $this->db->get();
		return $query->row();
	}

	public function findKode($id_booking)
	{
		$this->db->select('*');
		$this->db->from('booking');
		$this->db->join('users', 'users.id = booking.id_user', 'inner');
		$this->db->join('packets', 'packets.id_packet = booking.id_packet', 'inner');
		$this->db->where('id_booking', $id_booking);

		$query = $this->db->get();
		return $query->row();
	}
}
