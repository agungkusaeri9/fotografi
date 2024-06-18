<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_kategori', 'kategori');
		$this->load->helper('upload');
		// $this->load->library('pagination');
	}

	public function index()
	{
		$this->session->set_userdata(['menu_active' => 'kategori', 'sub_menu_active' => '']);
		$menu = $this->MenusModel->getMenu();

		$data = [
			'content' => 'components/kategori/index',
			// 'plugin' => 'plugins/users',
			'css' => 'css/users',
			'menus' => fetch_menu($menu),
			'data_kategori' => $this->kategori->get()->result()
		];


		$this->load->view('layouts/app', $data);
	}

	public function tambah()
	{
		$this->session->set_userdata(['menu_active' => 'kategori', 'sub_menu_active' => '']);
		$menu = $this->MenusModel->getMenu();
		$data = [
			'content' => 'components/kategori/tambah',
			// 'plugin' => 'plugins/users',
			'css' => 'css/users',
			'menus' => fetch_menu($menu)
		];

		$this->load->view('layouts/app', $data);
	}

	public function proses_tambah()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		if ($this->form_validation->run() == FALSE) {
			$menu = $this->MenusModel->getMenu();
			$data = [
				'content' => 'components/kategori/tambah',
				'plugin' => 'plugins/users',
				'css' => 'css/users',
				'menus' => fetch_menu($menu)
			];

			$this->load->view('layouts/app', $data);
		} else {
			$data = $this->input->post();
			$this->kategori->create($data);
			$this->session->set_flashdata('success', 'Data Kategori berhasil ditambahkan!');
			redirect('admin/kategori');
		}
	}

	public function edit($id)
	{
		$this->session->set_userdata(['menu_active' => 'kategori', 'sub_menu_active' => '']);
		$menu = $this->MenusModel->getMenu();
		$data = [
			'content' => 'components/kategori/edit',
			// 'plugin' => 'plugins/users',
			'css' => 'css/users',
			'menus' => fetch_menu($menu),
			'kategori' => $this->kategori->find($id)
		];

		$this->load->view('layouts/app', $data);
	}

	public function proses_update($id)
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		if ($this->form_validation->run() == FALSE) {
			$menu = $this->MenusModel->getMenu();
			$data = [
				'content' => 'components/kategori/edit',
				// 'plugin' => 'plugins/users',
				'css' => 'css/users',
				'menus' => fetch_menu($menu),
				'kategori' => $this->kategori->find($id)
			];

			$this->load->view('layouts/app', $data);
		} else {
			$data = $this->input->post();
			$this->kategori->update($id, $data);
			$this->session->set_flashdata('success', 'Data Kategori berhasil diupdate!');
			redirect('admin/kategori');
		}
	}

	public function hapus($id)
	{
		$this->kategori->hapus($id);
		$this->session->set_flashdata('success', 'Data Kategori berhasil dihapus!');
		redirect('admin/kategori');
	}
}
