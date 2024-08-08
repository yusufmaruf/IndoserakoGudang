<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MmemoDelivery extends CI_Model
{
	public function get_data()
	{
		$this->db->select('delivery_memo.id AS memo_id, 
                   delivery_memo.print_date, 
                   delivery_memo.no_memo, 
                   delivery_memo.desc, 
                   delivery_memo.status, 
                   COUNT(delivery_memo_detail.id) AS total_detail_count');
		$this->db->from('delivery_memo');
		// Join with delivery_memo_detail
		$this->db->join('delivery_memo_detail', 'delivery_memo.id = delivery_memo_detail.id_memo', 'left');

		// Group by the columns from delivery_memo
		$this->db->group_by('delivery_memo.id');
		$this->db->group_by('delivery_memo.print_date');
		$this->db->group_by('delivery_memo.no_memo');
		$this->db->group_by('delivery_memo.desc');
		$this->db->group_by('delivery_memo.status');

		// Order by the columns from delivery_memo
		$this->db->order_by('memo_id', 'DESC');

		// Execute the query
		$query = $this->db->get();

		// Retrieve the results
		$result = $query->result_array();

		return $result;
	}
}

/* End of file Mdummy.php */
/* Location: ./application/models/Mdummy.php */
