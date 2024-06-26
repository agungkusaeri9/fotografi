<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_booking', 'booking');
		$this->load->model('M_transaksi', 'transaksi');
		$this->load->helper('upload');
		// $this->load->library('pagination');
	}

	public function index()
	{
		$this->session->set_userdata(['menu_active' => 'Booking', 'sub_menu_active' => '']);
		$data = [
			'content' => 'components/booking/index',
			// 'plugin' => 'plugins/users',
			'css' => 'css/users',
			'data_booking' => $this->booking->get()
		];
		$this->load->view('layouts/app', $data);
	}

	public function detail($id_booking)
	{
		$this->session->set_userdata(['menu_active' => 'Detail Booking', 'sub_menu_active' => '']);
		$data = [
			'content' => 'components/booking/detail',
			// 'plugin' => 'plugins/users',
			'css' => 'css/users',
			'booking' => $this->booking->find($id_booking),
			'data_transaksi' => $this->transaksi->get($id_booking)
		];
		$this->load->view('layouts/app', $data);
	}

	public function setSelesai($id_booking)
	{
		if (!$id_booking) {
			redirect('admin/booking');
		}
		$this->booking->update($id_booking, [
			'status_booking' => 2
		]);

		redirect('admin/booking');
	}


	public function hapus($id)
	{
		$this->booking->hapus($id);
		$this->session->set_flashdata('success', 'Data Booking berhasil dihapus!');
		redirect('admin/booking');
	}
}
