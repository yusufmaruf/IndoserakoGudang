<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Minventaris extends CI_Model
{
	public function getdata()
	{
		$this->db->select('
		p.id_barang as idProduk,
		p.brand as brand,
		p.satuan as satuan,
		p.name as namaProduk,
		k.name as kategori,
		SUM( CASE WHEN i.jenis = 1 THEN i.qty ELSE 0 END) - SUM(CASE WHEN i.jenis = 2 THEN i.qty ELSE 0 END) AS totalQty,
		MAX(i.tanggal) AS lastDate
		');
		$this->db->from('inventory_stock i');
		$this->db->join('barang p', 'i.id_barang = p.id_barang');
		$this->db->join('category k', 'p.category = k.id_category');
		$this->db->group_by(['p.id_barang', 'p.brand', 'p.satuan', 'p.name', 'k.name']);
		$this->db->order_by('MAX(i.tanggal)', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getDataReceive($id = null, $jenis = null)
	{
		if ($id != null) {
			$this->db->select('i.*, p.name as namaProduk, p.satuan as satuan, k.name as kategori');
			$this->db->from('inventory_stock i');
			$this->db->where('jenis', $jenis);
			$this->db->where('p.id_barang' . ' = ' . $id);
			$this->db->join('barang p', 'i.id_barang = p.id_barang');
			$this->db->join('category k', 'p.category = k.id_category');
			$this->db->order_by('i.id_inventory_stock', 'DESC');
			$query = $this->db->get();
		} else {
			$this->db->select('i.*, p.name as namaProduk, k.name as kategori');
			$this->db->from('inventory_stock i');
			$this->db->where('jenis', $jenis);
			// $this->db->where('p.id_barang' . ' = ' . $id);
			$this->db->join('barang p', 'i.id_barang = p.id_barang');
			$this->db->join('category k', 'p.category = k.id_category');
			$this->db->order_by('id_inventory_stock', 'DESC');
			$query = $this->db->get();
		}

		return $query->result_array();
	}
}

/* End of file Mdummy.php */
/* Location: ./application/models/Mdummy.php */
