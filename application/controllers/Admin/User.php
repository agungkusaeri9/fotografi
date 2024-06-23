<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_user', 'user');
		$this->load->helper('upload');
		// $this->load->library('pagination');
	}

	public function index()
	{
		$this->session->set_userdata(['menu_active' => 'user', 'sub_menu_active' => '']);
		$menu = $this->MenusModel->getMenu();

		$data = [
			'content' => 'components/user/index',
			// 'plugin' => 'plugins/users',
			'css' => 'css/users',
			'menus' => fetch_menu($menu),
			'data_user' => $this->user->get()->result()
		];


		$this->load->view('layouts/app', $data);
	}

	public function tambah()
	{
		$this->session->set_userdata(['menu_active' => 'user', 'sub_menu_active' => '']);
		$menu = $this->MenusModel->getMenu();
		$data = [
			'content' => 'components/user/tambah',
			// 'plugin' => 'plugins/users',
			'css' => 'css/users',
			'menus' => fetch_menu($menu)
		];

		$this->load->view('layouts/app', $data);
	}

	public function proses_tambah()
	{
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('hp', 'Np. HP', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('role_id', 'Role', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_userdata(['menu_active' => 'user', 'sub_menu_active' => '']);
			$menu = $this->MenusModel->getMenu();
			$data = [
				'content' => 'components/user/tambah',
				// 'plugin' => 'plugins/users',
				'css' => 'css/users',
				'menus' => fetch_menu($menu)
			];

			$this->load->view('layouts/app', $data);
		} else {
			$data = $this->input->post();
			$data['status'] = 1;
			$data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
			$this->user->create($data);
			$this->session->set_flashdata('success', 'Data user berhasil ditambahkan!');
			redirect('admin/user');
		}
	}

	public function edit($id)
	{
		$this->session->set_userdata(['menu_active' => 'user', 'sub_menu_active' => '']);
		$menu = $this->MenusModel->getMenu();
		$data = [
			'content' => 'components/user/edit',
			// 'plugin' => 'plugins/users',
			'css' => 'css/users',
			'menus' => fetch_menu($menu),
			'user' => $this->user->find($id)
		];

		$this->load->view('layouts/app', $data);
	}

	public function proses_update($id)
	{
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('hp', 'Np. HP', 'required');
		$this->form_validation->set_rules('role_id', 'Role', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_userdata(['menu_active' => 'user', 'sub_menu_active' => '']);
			$menu = $this->MenusModel->getMenu();
			$data = [
				'content' => 'components/user/edit',
				// 'plugin' => 'plugins/users',
				'css' => 'css/users',
				'menus' => fetch_menu($menu),
				'user' => $this->user->find($id)
			];
			$this->load->view('layouts/app', $data);
		} else {
			$data = [
				'name' => $this->input->post('name'),
				'hp' => $this->input->post('hp'),
				'role_id' => $this->input->post('role_id'),
			];
			if ($this->input->post('password')) {
				$data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
			}
			$this->user->update($id, $data);
			$this->session->set_flashdata('success', 'Data user berhasil diupdate!');
			redirect('admin/user');
		}
	}

	public function hapus($id)
	{
		$this->user->hapus($id);
		$this->session->set_flashdata('success', 'Data user berhasil dihapus!');
		redirect('admin/user');
	}
}
