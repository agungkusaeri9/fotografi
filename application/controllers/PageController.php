<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PageController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PaketModel', 'paket');
		$this->load->model('M_booking', 'booking');
	}
	public function index()
	{
		$data = [
			'content' => 'frontend/pages/home',
		];
		$this->load->view('frontend/app', $data);
	}

	public function paket()
	{
		$data = [
			'content' => 'frontend/pages/paket',
			'data_paket' => $this->paket->get()
		];
		$this->load->view('frontend/app', $data);
	}

	public function detail_paket($id = NULL)
	{
		$paket = $this->paket->find($id);
		if (!$paket) {
			return redirect('/');
		}
		$data = [
			'content' => 'frontend/pages/detail_paket',
			'paket' => $paket
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
		redirect('/');
	}
}
