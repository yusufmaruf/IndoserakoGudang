<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Minventaris extends CI_Model
{
	public function getdata()
	{
		$this->db->select('
		p.idBarang as idProduk,
		p.brand as brand,
		p.satuan as satuan,
		p.name as namaProduk,
		k.name as kategori,
		SUM( i.qty ) - SUM(CASE WHEN i.jenis = 2 THEN i.qty ELSE 0 END) AS totalQty,
		MAX(i.tanggal) AS lastDate
		');
		$this->db->from('inventoryStock i');
		$this->db->join('barang p', 'i.idBarang = p.idBarang');
		$this->db->join('category k', 'p.category = k.idCategory');
		$this->db->group_by(['p.idBarang', 'p.brand', 'p.satuan', 'p.name', 'k.name']);
		$this->db->order_by('MAX(i.tanggal)', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getDataReceive($id = null, $jenis = null)
	{
		if ($id != null) {
			$this->db->select('i.*, p.name as namaProduk, p.satuan as satuan, k.name as kategori');
			$this->db->from('inventoryStock i');
			$this->db->where('jenis', $jenis);
			$this->db->where('p.idBarang' . ' = ' . $id);
			$this->db->join('barang p', 'i.idBarang = p.idBarang');
			$this->db->join('category k', 'p.category = k.idCategory');
			$this->db->order_by('tanggal', 'DESC');
			$query = $this->db->get();
		} else {
			$this->db->select('i.*, p.name as namaProduk, k.name as kategori');
			$this->db->from('inventoryStock i');
			$this->db->where('jenis', $jenis);
			// $this->db->where('p.idBarang' . ' = ' . $id);
			$this->db->join('barang p', 'i.idBarang = p.idBarang');
			$this->db->join('category k', 'p.category = k.idCategory');
			$this->db->order_by('tanggal', 'DESC');
			$query = $this->db->get();
		}

		return $query->result_array();
	}
}

/* End of file Mdummy.php */
/* Location: ./application/models/Mdummy.php */
