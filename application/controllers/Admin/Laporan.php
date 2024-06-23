<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_transaksi', 'transaksi');
		$this->load->helper('upload');
		// $this->load->library('pagination');
	}

	public function transaksi_index()
	{
		$this->session->set_userdata(['menu_active' => 'laporan', 'sub_menu_active' => '']);

		$data = [
			'content' => 'components/laporan/transaksi_index'
		];
		$this->load->view('layouts/app', $data);
	}

	public function transaksi_print()
	{
		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');

		$data['data_transaksi'] = $this->transaksi->cetak($tanggal_awal, $tanggal_akhir);
		$this->load->view('components/laporan/transaksi_cetak', $data);
	}
}
