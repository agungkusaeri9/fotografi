<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PaketImage extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_paket_image', 'paket_image');
		$this->load->helper('upload');
		// $this->load->library('pagination');
	}

	public function index()
	{
		$this->session->set_userdata(['menu_active' => 'kategori', 'sub_menu_active' => '']);
		$menu = $this->MenusModel->getMenu();
		$id_packet = $this->input->get('id_packet');
		$data = [
			'content' => 'components/packet-image/index',
			// 'plugin' => 'plugins/users',
			'css' => 'css/users',
			'menus' => fetch_menu($menu),
			'data_packet_images' => $this->paket_image->get($id_packet),
			'id_packet' => $id_packet
		];


		$this->load->view('layouts/app', $data);
	}

	public function tambah()
	{
		$this->session->set_userdata(['menu_active' => 'Gambar', 'sub_menu_active' => '']);
		$menu = $this->MenusModel->getMenu();
		$id_packet = $this->input->get('id_packet');
		if (empty($id_packet)) {
			redirect('paket');
		}
		$data = [
			'content' => 'components/packet-image/tambah',
			// 'plugin' => 'plugins/users',
			'css' => 'css/users',
			'menus' => fetch_menu($menu),
			'id_packet' => $id_packet
		];

		$this->load->view('layouts/app', $data);
	}

	public function proses_tambah()
	{
		$id_packet = $this->input->post('id_packet');
		if (empty($id_packet)) {
			redirect('paket');
		}
		if (!empty($_FILES['image_name']['name'])) {
			$upload = h_upload($_FILES['image_name']['name'], 'assets/img/packets', 'jpg|png|jpeg', '2048', 'image_name');
			if (!empty($upload['success'])) {
				$image_name = $upload['success']['file_name'];
			}
			$data = [
				'image_name' => $image_name,
				'packet_id' => $id_packet
			];
			$insert = $this->paket_image->create($data);
			$this->session->set_flashdata('success', 'Data Gambar berhasil ditambahkan!');
			redirect('paketImage' . '?id_packet=' . $id_packet);
		}
	}

	public function hapus($id)
	{
		$image = $this->paket_image->find($id);
		$id_packet = $image->packet_id;
		unlink('./assets/img/packets/' . $image->image_name);
		$this->paket_image->hapus($id);
		$this->session->set_flashdata('success', 'Data Gambar berhasil dihapus!');
		redirect('paketImage' . '?id_packet=' . $id_packet);
	}
}
