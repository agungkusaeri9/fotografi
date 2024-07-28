<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Rating extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_rating', 'rating');
	}

	public function store()
	{
		$data = [
			'id_booking' => $this->input->post('id'),
			'nilai' => $this->input->post('nilai'),
			'keterangan' => $this->input->post('keterangan'),
			'id_user' => $this->session->userdata('id')
		];

		$this->rating->create($data);
		redirect('customer/booking');
	}
}
