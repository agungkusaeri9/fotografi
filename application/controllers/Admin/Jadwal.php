<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_booking', 'booking');
		$this->load->helper('upload');
		// $this->load->library('pagination');
	}

	public function index()
	{
		$data = [
			'content' => 'components/jadwal/index',
			// 'plugin' => 'plugins/users',
			'css' => 'css/users',
			'data_jadwal' => $this->booking->getKonfirmasi()
		];
		$this->load->view('layouts/app', $data);
	}
}
