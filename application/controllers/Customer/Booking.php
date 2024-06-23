<?php

use Midtrans\Config;
use Midtrans\Notification;
use Midtrans\Snap;

defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_booking', 'booking');
		$this->load->model('M_transaksi', 'transaksi');
		$this->load->model('PaketModel', 'paket');
		$this->load->config('midtrans');
	}
	public function index()
	{
		$data = [
			'content' => 'frontend/pages/booking/index',
			'data_booking' => $this->booking->getByUser(),
			'judul' => 'Riwayat Booking'
		];
		$this->load->view('frontend/app', $data);
	}

	public function detail($kode_booking)
	{
		$booking = $this->booking->findKode($kode_booking);
		$data = [
			'content' => 'frontend/pages/booking/detail',
			'booking' => $booking,
			'data_transaksi' => $this->transaksi->get($booking->id_booking),
			'judul' => 'Detail Booking'
		];
		$this->load->view('frontend/app', $data);
	}

	public function proses_booking()
	{
		$input = $this->input->post();
		$paket = $this->paket->find($input['id_packet']);
		$total_bayar = $paket->packet_price;

		// cek booking
		$cek_booking = $this->booking->cek($input['tanggal']);

		if ($cek_booking > 0) {
			$this->session->set_flashdata('error', 'Tanggal tersebut sudah ada yang booking.');
			redirect('paket/' . $input['id_packet']);
		}
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

	public function token()
	{
		\Midtrans\Config::$serverKey = $this->config->item('midtrans_server_key');
		\Midtrans\Config::$isProduction = $this->config->item('midtrans_is_production');
		\Midtrans\Config::$isSanitized = true;
		\Midtrans\Config::$is3ds = true;
		$id = $this->input->post('id');
		$transaksi = $this->transaksi->find($id);
		$transaction_details = array(
			'order_id' => $transaksi->kode,
			'gross_amount' => $transaksi->total_harga, // no decimal allowed for creditcard
		);

		$item_details = array(
			array(
				'id' => 'a1',
				'price' => $transaksi->total_harga,
				'quantity' => 1,
				'name' => "Apple"
			)
		);

		$customer_details = array(
			'first_name'    => "Andri",
			'last_name'     => "Setiawan",
			'email'         => "andrisetiawan@midtrans.com",
			'phone'         => "081322311801"
		);

		$transaction = array(
			'transaction_details' => $transaction_details,
			'item_details'       => $item_details,
			'customer_details'   => $customer_details
		);

		$snapToken = Snap::getSnapToken($transaction);

		$this->transaksi->update($id, [
			'snap_token' => $snapToken
		]);

		echo json_encode([
			'status' => 'success',
			'snaptoken' => $snapToken
		]);
	}

	public function notification()
	{
		Config::$serverKey = $this->config->item('midtrans_server_key');
		Config::$isProduction = $this->config->item('midtrans_is_production');
		Config::$isSanitized = true;
		Config::$is3ds = true;

		$notif = new Notification();

		$transaction = $notif->transaction_status;
		$type = $notif->payment_type;
		$order_id = $notif->order_id;
		$fraud = $notif->fraud_status;

		$transaksi = $this->transaksi->findKode($order_id);
		// echo json_encode($order_id);

		$this->transaksi->update($transaksi->id_transaction, [
			'status_transaksi' => $transaction,
			'tanggal' => date('Y-m-d')
		]);
	}
}
