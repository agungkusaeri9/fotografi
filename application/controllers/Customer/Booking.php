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
		$this->load->model('M_user', 'user');
		$this->load->model('M_rating', 'rating');
	}
	public function index()
	{
		isAuth();
		$data = [
			'content' => 'frontend/pages/booking/index',
			'data_booking' => $this->booking->getByUser(),
			'judul' => 'Riwayat Booking'
		];
		$this->load->view('frontend/app', $data);
	}

	public function detail($kode_booking)
	{
		isAuth();
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
		isAuth();
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
		$this->session->set_flashdata('success', 'Anda berhasil memesan paket tersebut. Silahkan lakukan pembayaran.');
		redirect('/customer/booking');
	}

	public function token()
	{
		isAuth();
		\Midtrans\Config::$serverKey = $this->config->item('midtrans_server_key');
		\Midtrans\Config::$isProduction = $this->config->item('midtrans_is_production');
		\Midtrans\Config::$isSanitized = true;
		\Midtrans\Config::$is3ds = true;
		$id = $this->input->post('id');
		$transaksi = $this->transaksi->find($id);
		$booking = $this->booking->find($transaksi->id_booking);
		$paket = $this->paket->find($booking->id_packet);
		$transaction_details = array(
			'order_id' => $transaksi->kode,
			'gross_amount' => $transaksi->total_harga, // no decimal allowed for creditcard
		);

		$item_details = array(
			array(
				'id' => '1',
				'price' => $transaksi->total_harga,
				'quantity' => 1,
				'name' => $paket->packet_name
			)
		);

		$customer_details = array(
			'first_name'    => $transaksi->user_name,
			'last_name'     => "",
			'email'         => $transaksi->user_email,
			'phone'         => $transaksi->user_hp
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
		$order_id = $notif->order_id;
		$transaksi = $this->transaksi->findKode($order_id);

		// cek apakah transaksinya di booking 2 kali bayar
		$booking = $this->booking->findKode($transaksi->id_booking);
		$cekJumlahPembayaran = $booking->jumlah_pembayaran;
		if ($cekJumlahPembayaran == 2) {
			// jika pembayaran nya 2 kali
			// cek juga apakah ada pembayaran lagi selain dari ini yang belum dibayar
			$cekJumlahBayar = $this->transaksi->jumlahBayar($booking->id_booking);
			if ($cekJumlahBayar == 0) {
				// set status booking jadi Menunggu Pelunasan
				$this->booking->update($booking->id_booking, [
					'status_booking' => 4
				]);
			} else if ($cekJumlahBayar == 1) {
				// jika tidak ada, set status booking menjadi selesai
				$this->booking->update($booking->id_booking, [
					'status_booking' => 2
				]);
			}
		} else if ($cekJumlahPembayaran == 1) {
			// jika tidak ada, set status booking menjadi selesai
			$this->booking->update($booking->id_booking, [
				'status_booking' => 2
			]);
		}


		// echo json_encode($order_id);
		$this->transaksi->update($transaksi->id_transaction, [
			'status_transaksi' => $transaction,
			'tanggal' => date('Y-m-d')
		]);
	}

	public function cek()
	{
		$transaksi = $this->transaksi->findKode(2024072948156409);

		// cek apakah transaksinya di booking 2 kali bayar
		$booking = $this->booking->findKode($transaksi->id_booking);
		$cekJumlahPembayaran = $booking->jumlah_pembayaran;
		// var_dump($cekJumlahPembayaran);
		// die;
		if ($cekJumlahPembayaran == 2) {

			// var_dump('21');
			// die;
			// jika pembayaran nya 2 kali
			// cek apakah transaksinya di booking 2 kali bayar
			$booking = $this->booking->findKode($transaksi->id_booking);
			$cekJumlahPembayaran = $booking->jumlah_pembayaran;
			if ($cekJumlahPembayaran == 2) {
				// jika pembayaran nya 2 kali
				// cek juga apakah ada pembayaran lagi selain dari ini yang belum dibayar
				$cekJumlahBayar = $this->transaksi->jumlahBayar($booking->id_booking);
				var_dump($cekJumlahBayar);
				die;
				if ($cekJumlahBayar == 0) {
					// set status booking jadi Menunggu Pelunasan
					$this->booking->update($booking->id_booking, [
						'status_booking' => 4
					]);
				} else if ($cekJumlahBayar == 1) {
					// jika tidak ada, set status booking menjadi selesai
					$this->booking->update($booking->id_booking, [
						'status_booking' => 2
					]);
				}
			} else if ($cekJumlahPembayaran == 1) {
				// jika tidak ada, set status booking menjadi selesai
				$this->booking->update($booking->id_booking, [
					'status_booking' => 2
				]);
			}
		}

		// echo json_encode($order_id);

		// $this->transaksi->update($transaksi->id_transaction, [
		// 	'status_transaksi' => $transaction,
		// 	'tanggal' => date('Y-m-d')
		// ]);
	}
}
