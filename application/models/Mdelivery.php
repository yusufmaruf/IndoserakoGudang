<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mdelivery extends CI_Model
{
	public function group_delivery_logs($nomor_po)
	{
		// Define the SQL query
		$sql = "
        SELECT 
            d.id AS id_delivery, 
            dl.id AS id_dlog, 
            pld.id_po_list, 
            d.nomor_sj,  
            dl.date, 
            dl.message, 
			dd.qty_delivery,
            dl.created_by, 
            dd.id_po_list_detail, 
            pld.description,  
            d.nomor_po
        FROM 
            delivery_log dl
        JOIN 
            delivery d ON dl.id_delivery = d.id
        JOIN 
            delivery_detail dd ON d.id = dd.id_delivery
        JOIN 
            po_list_detail pld ON dd.id_po_list_detail = pld.id
        WHERE 
            d.nomor_po = ?
        ORDER BY 
            dl.id DESC
    ";

		// Execute the query with the provided parameter
		$query = $this->db->query($sql, array($nomor_po));

		// Initialize the result array
		$result = array();

		// Check if any results were returned
		if ($query->num_rows() > 0) {
			// Fetch all rows
			$rows = $query->result_array();

			// Temporary storage to group logs by id_dlog
			$grouped_logs = array();

			// Loop through the rows to group by id_dlog
			foreach ($rows as $row) {
				$id_dlog = $row['id_dlog'];

				// Format date to "06 Agustus 2024"
				$formatted_date = $this->mglobal->format_dateIndo($row['date']);

				// If id_dlog not yet in grouped_logs, initialize it
				if (!isset($grouped_logs[$id_dlog])) {
					$grouped_logs[$id_dlog] = array(
						'id' => $row['id_dlog'],
						'date' => $formatted_date,
						'message' => $row['message'],
						'id_delivery' => $row['id_delivery'],
						'created_by' => $row['created_by'],
						'nomor_po' => $row['nomor_po'],
						'nomor_sj' => $row['nomor_sj'],
						'detail' => array()
					);
				}

				// Add the detail description
				$grouped_logs[$id_dlog]['detail'][] = $row['description'] . ' (' . $row['qty_delivery'] . ' ea )';
			}

			// Convert grouped_logs to result array
			foreach ($grouped_logs as $grouped_log) {
				$result[] = $grouped_log;
			}
		}

		// Return the result array
		return $result;
	}
	public function getmemo()
	{
		$this->db->select('delivery_memo.no_memo, delivery_memo.id, delivery_memo.print_date, delivery_memo.desc, customer.nama, delivery.nomor_sj');
		$this->db->from('delivery_memo');
		$this->db->join('delivery_memo_detail', 'delivery_memo.id = delivery_memo_detail.id_memo');
		$this->db->join('delivery', 'delivery.id = delivery_memo_detail.id_delivery');
		$this->db->join('customer', 'delivery.id_customer = customer.id');
		$this->db->where('delivery_memo.status', 1);
		$query = $this->db->get();

		$result = $query->result_array();
		$grouped_result = [
			'no_memo' => '',
			'id' => '',
			'print_date' => '',
			'desc' => '',
			'detail' => []
		];

		foreach ($result as $row) {
			if (empty($grouped_result['no_memo'])) {
				$grouped_result['no_memo'] = $row['no_memo'];
				$grouped_result['id'] = $row['id'];
				$grouped_result['print_date'] = $row['print_date'];
				$grouped_result['desc'] = $row['desc'];
			}
			$grouped_result['detail'][] = [
				'nama' => $row['nama'],
				'nomor_sj' => $row['nomor_sj']
			];
		}

		return $grouped_result;
	}
}

/* End of file Mdummy.php */
/* Location: ./application/models/Mdummy.php */
