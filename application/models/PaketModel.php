<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PaketModel extends CI_Model
{
	var $table = 'packets';
	var $table_images = 'packet_images';

	public function get()
	{
		$this->db->select('packets.*, kategori.nama as kategori_nama, 
                       (SELECT packet_images.image_name 
                        FROM packet_images 
                        WHERE packet_images.packet_id = packets.id_packet 
                        ORDER BY packet_images.id_packet_images ASC 
                        LIMIT 1) as first_image');
		$this->db->from($this->table);
		$this->db->join('kategori', 'kategori.id_kategori = packets.id_kategori', 'left');
		$query = $this->db->get();

		if ($query === false) {
			// Output error message
			$error = $this->db->error();
			echo "Query Error: " . $error['message'];
			return false;
		}

		return $query->result();
	}


	public function create($data)
	{
		$this->db->insert($this->table, $data);
	}

	// public function find($id_packet)
	// {
	// 	$this->db->where('id_packet', $id_packet);
	// 	return $this->db->get($this->table)->row();
	// }

	public function find($id_packet)
	{
		$this->db->select('packets.*, kategori.nama as kategori_nama, 
                       (SELECT packet_images.image_name 
                        FROM packet_images 
                        WHERE packet_images.packet_id = packets.id_packet 
                        ORDER BY packet_images.id_packet_images ASC 
                        LIMIT 1) as first_image');
		$this->db->from($this->table);
		$this->db->join('kategori', 'kategori.id_kategori = packets.id_kategori', 'left');
		$this->db->where('packets.id_packet', $id_packet);
		$query = $this->db->get();

		if ($query === false) {
			// Output error message
			$error = $this->db->error();
			echo "Query Error: " . $error['message'];
			return false;
		}

		return $query->row();
	}

	public function update($id_packet, $data)
	{
		$this->db->where('id_packet', $id_packet);
		$this->db->update($this->table, $data);
	}

	function hapus($id)
	{
		return $this->db->delete($this->table, ['id_packet' => $id]);
	}

	function GetPacketImages($id_packet)
	{
		return $this->db->where('packet_id', $id_packet)->get($this->table_images);
	}

	function GetPaketById($id)
	{
		$this->db->where('id_packet', $id);
		$this->db->from($this->table);
		return $this->db->get();
	}


	function add($data, $image = NULL)
	{
		$this->db->trans_start();
		$this->db->insert($this->table, $data);
		$packet_id = $this->db->insert_id();

		$result = array();

		if ($image) {
			foreach ($image as $i => $value) {
				$result[] = array(
					'packet_id' => $packet_id,
					'image_name' => $value['image_name'],
				);
			}
		}

		$this->db->insert_batch($this->table_images, $result);
		$this->db->trans_complete();

		return true;
	}

	// function update($data, $id)
	// {
	// 	return $this->db->update($this->table, $data, ['id_packet' => $id]);
	// }

	function delete($id)
	{
		return $this->db->delete($this->table, ['id_packet' => $id]);
	}

	function addImage($data)
	{
		return $this->db->insert($this->table_images, $data);
	}
}
	
	/* End of file AuthModel.php */
	/* Location: ./application/models/AuthModel.php */
