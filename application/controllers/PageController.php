<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PageController extends CI_Controller
{
	public function index()
	{
		$data = [
			'content' => 'frontend/pages/home',
		];
		$this->load->view('frontend/app', $data);
	}
}
