<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_booking extends CI_Model
{

	public function create($data)
	{
		$this->db->insert('booking', $data);
		$id_booking = $this->db->insert_id();
		$jumlah_pembayaran = $data['jumlah_pembayaran'];
		if ($jumlah_pembayaran == 1) {
			$total_harga = $data['total_bayar'];
		} else {
			$total_harga = $data['total_bayar'] / 2;
		}
		for ($i = 1; $i <= $jumlah_pembayaran; $i++) {
			$this->db->insert('transaction', [
				'id_booking' => $id_booking,
				'total_harga' => $total_harga,
				'status' => 'Menunggu Pembayaran',
				'data' => NULL
			]);
		}
	}
}
