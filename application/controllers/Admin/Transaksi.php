<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_transaksi', 'transaksi');
		$this->load->helper('upload');
		// $this->load->library('pagination');
	}

	public function index()
	{
		$this->session->set_userdata(['menu_active' => 'Transaksi', 'sub_menu_active' => '']);
		$data = [
			'content' => 'components/transaksi/index',
			// 'plugin' => 'plugins/users',
			'css' => 'css/users',
			'data_transaksi' => $this->transaksi->getAll()
		];
		$this->load->view('layouts/app', $data);
	}
}
