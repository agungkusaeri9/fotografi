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
			'judul' => 'Home'
		];
		$this->load->view('frontend/app', $data);
	}

	public function paket()
	{
		$data = [
			'content' => 'frontend/pages/paket',
			'data_paket' => $this->paket->get(),
			'judul' => 'Daftar Paket'
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
			'paket' => $paket,
			'judul' => $paket->packet_name
		];
		$this->load->view('frontend/app', $data);
	}

	public function about()
	{
		$data = [
			'content' => 'frontend/pages/about',
			'judul' => 'Tentang'
		];
		$this->load->view('frontend/app', $data);
	}

	public function contact()
	{
		$data = [
			'content' => 'frontend/pages/contact',
			'judul' => 'Kontak'
		];
		$this->load->view('frontend/app', $data);
	}

	public function portfolio()
	{
		$data = [
			'content' => 'frontend/pages/portfolio',
			'judul' => 'Portfolio'
		];
		$this->load->view('frontend/app', $data);
	}
}
