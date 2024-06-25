<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_transaksi', 'transaksi');
		$this->load->model('M_booking', 'booking');
		$this->load->helper('upload');
		// $this->load->library('pagination');
	}

	public function transaksi_index()
	{
		$this->session->set_userdata(['menu_active' => 'Laporan Transaksi', 'sub_menu_active' => '']);

		$data = [
			'content' => 'components/laporan/transaksi_index'
		];
		$this->load->view('layouts/app', $data);
	}

	public function transaksi_print()
	{
		$tanggal_awal = $this->input->get('tanggal_awal');
		$tanggal_akhir = $this->input->get('tanggal_akhir');

		$data['data_transaksi'] = $this->transaksi->cetak($tanggal_awal, $tanggal_akhir);
		$this->load->view('components/laporan/transaksi_cetak', $data);
	}

	public function booking_index()
	{
		$this->session->set_userdata(['menu_active' => 'Laporan Booking', 'sub_menu_active' => '']);

		$data = [
			'content' => 'components/laporan/booking_index'
		];
		$this->load->view('layouts/app', $data);
	}

	public function booking_print()
	{
		$tanggal_awal = $this->input->get('tanggal_awal');
		$tanggal_akhir = $this->input->get('tanggal_akhir');

		$data['data_booking'] = $this->booking->cetak($tanggal_awal, $tanggal_akhir);
		$this->load->view('components/laporan/booking_cetak', $data);
	}
}
