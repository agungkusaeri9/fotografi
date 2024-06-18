<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_booking', 'booking');
		$this->load->model('M_transaksi', 'transaksi');
		$this->load->model('PaketModel', 'paket');
	}
	public function index()
	{
		$data = [
			'content' => 'frontend/pages/booking/index',
			'data_booking' => $this->booking->getByUser()
		];
		$this->load->view('frontend/app', $data);
	}

	public function detail($kode_booking)
	{
		$booking = $this->booking->findKode($kode_booking);
		$data = [
			'content' => 'frontend/pages/booking/detail',
			'booking' => $booking,
			'data_transaksi' => $this->transaksi->get($booking->id_booking)
		];
		$this->load->view('frontend/app', $data);
	}

	public function proses_booking()
	{
		$input = $this->input->post();
		$paket = $this->paket->find($input['id_packet']);
		$total_bayar = $paket->packet_price;
		$data = [
			'id_user' => $this->session->userdata('id'),
			'id_packet' => $input['id_packet'],
			'alamat' => $input['alamat'],
			'jumlah_pembayaran' => $input['jumlah_pembayaran'],
			'tanggal' => $input['tanggal'],
			'total_bayar' => $total_bayar,
			'kode_booking' => date('Ymdhis') . rand(10, 99)
		];

		$this->booking->create($data);
		redirect('/customer/booking');
	}
}
