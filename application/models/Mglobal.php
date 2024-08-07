<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mglobal extends CI_Model
{
	function format_dateIndo($date)
	{
		// Buat array untuk bulan dalam bahasa Indonesia
		$bulan = array(
			1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
			5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
			9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
		);

		// Konversi string tanggal menjadi objek DateTime
		$dateObj = new DateTime($date);

		// Ambil tanggal, bulan, dan tahun dari objek DateTime
		$day = $dateObj->format('d');
		$month = $dateObj->format('n'); // Bulan tanpa leading zero
		$year = $dateObj->format('Y');

		// Format tanggal ke format yang diinginkan
		return $day . ' ' . $bulan[$month] . ' ' . $year;
	}
	public function insert_data($table, $object)
	{
		$res = $this->db->insert($table, $object);
		$insert_id = $this->db->insert_id();
		return $res ? $insert_id : false;
	}

	public function update_data($table, $data, $where)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
		return $this->db->affected_rows();
	}

	public function delete_data($table, $where)
	{
		$this->db->where($where);
		$this->db->delete($table);
		return $this->db->affected_rows(); // Mengembalikan jumlah baris yang terpengaruh
	}

	public function crud($table, $data, $crud_type)
	{
		$this->db->trans_start();
		$this->db->trans_strict(false);

		if ($crud_type == 1) {
			//edit mode
			$this->db->where('id', $data['id']);
			$this->db->update($table, $data);
		} else if ($crud_type == 2) {
			//add mode
			$this->db->insert($table, $data);
		} else {
			//delete mode
			$this->db->where('id', $data);
			$this->db->delete($table);
		}

		$this->db->trans_complete();

		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			return false;
		} else {
			return true;
		}
	}

	public function load_modal()
	{
		//-- popup modal based on flashdata
		//-- to be called after loading vheader

		$temp = $this->session->flashdata('global');
		switch ($temp) {
			case 'ins_success':
				$this->load->view('modal/vinsert_success');
				break;
			case 'ins_failed':
				$this->load->view('modal/vinsert_failed');
				break;
			case 'upd_success':
				$this->load->view('modal/vupdate_success');
				break;
			case 'upd_failed':
				$this->load->view('modal/vupdate_failed');
				break;
			case 'del_success':
				$this->load->view('modal/vdelete_success');
				break;
			case 'del_failed':
				$this->load->view('modal/vdelete_failed');
				break;
			case 'lost_connection':
				$this->load->view('modal/vlost_connection');
				break;
			case 'unknown':
				$this->load->view('modal/vunknown');
				break;
			default:
				break;
		}
	}

	public function load_toast()
	{
		//-- popup toast based on flashdata
		//-- using plugin toastr.js
		//-- to be called after loading vheader

		$temp = $this->session->flashdata('global');
		$data['msg'] = '';
		/* flag
		|  0 = danger
		|  1 = warning
		|  2 = success
		*/
		$data['flag'] = 0;
		switch ($temp) {
			case 'ins_success':
				$data['flag'] = 2;
				$data['msg'] = 'Insert data success!';
				$this->load->view('page/vtoast', $data);
				break;
			case 'ins_failed':
				$data['msg'] = 'Insert data failed!';
				$this->load->view('page/vtoast', $data);
				break;
			case 'upd_success':
				$data['flag'] = 2;
				$data['msg'] = 'Update data success!';
				$this->load->view('page/vtoast', $data);
				break;
			case 'upd_failed':
				$data['msg'] = 'Update data failed!';
				$this->load->view('page/vtoast', $data);
				break;
			case 'del_success':
				$data['flag'] = 2;
				$data['msg'] = 'Delete data success!';
				$this->load->view('page/vtoast', $data);
				break;
			case 'del_failed':
				$data['msg'] = 'Delete data failed!';
				$this->load->view('page/vtoast', $data);
				break;
			case 'change_success':
				$data['flag'] = 2;
				$data['msg'] = 'Change active product success!';
				$this->load->view('page/vtoast', $data);
				break;
			case 'reset_success':
				$data['flag'] = 2;
				$data['msg'] = 'Reset password success!';
				$this->load->view('page/vtoast', $data);
				break;
			case 'date_limit':
				$data['msg'] = 'Maximum period in 3 days!';
				$this->load->view('page/vtoast', $data);
				break;
			case 'invalid_date':
				$data['msg'] = 'Invalid date! Date start must be smaller than date end';
				$this->load->view('page/vtoast', $data);
				break;
			case 'excel_error':
				$data['msg'] = 'Excel Error!';
				$this->load->view('page/vtoast', $data);
				break;
			case 'required_productnumber':
				$data['msg'] = 'Data not Found! Please select productnumber!';
				$this->load->view('page/vtoast', $data);
				break;
			default:
				break;
		}
	}

	public function lost_connection()
	{
		$this->load->view('vheader');
		$this->load->view('page/vlost_connection');
		$this->load->view('vfooter');
	}

	public function internal_error()
	{
		$this->load->view('vheader');
		$this->load->view('page/vinternal_error');
		$this->load->view('vfooter');
	}

	public function error_custom($data)
	{
		$this->load->view('vheader');
		$this->load->view('page/verror_custom', $data);
		$this->load->view('vfooter');
	}



	public function php_login($post)
	{
		$this->db->where('username', strtolower($post['username']));
		$res = $this->db->get('users');

		return $res ? $res->row_array() : false;
	}



	public function get_item($table, $where, $id)
	{
		$this->db->where($where, $id);
		$res = $this->db->get($table);
		return $res ? $res->row_array() : false;
	}

	public function get_items($table, $where)
	{
		if ($where) {
			$this->db->where($where);
		}
		$res = $this->db->get($table);
		return $res ? $res->result_array() : false;
	}
	public function get_customs($table, $column, $id)
	{

		if ($table == 'po_list_detail') {
			$this->db->select('po_list_detail.*, po_list.nama_brand as brand_name');
			// Join condition
			$this->db->join('po_list', 'po_list.id = po_list_detail.id_po_list');
		}
		if ($table == 'delivery_detail') {
			$this->db->select('delivery_detail.* po_list_detail.description as desc');
			$this->db->join('po_list_detail', 'po_list_detail.id = delivery_detail.id_po_list_detail');
		}
		if ($table == 'po_list') {
			$this->db->where('year', date('Y'));
		}
		$this->db->from($table);
		$this->db->where($column, $id);



		$res = $this->db->get();
		return $res ? $res->result_array() : false;
	}
	public function delete_item($table, $field, $value)
	{
		$this->db->where($field, $value);
		return $this->db->delete($table);
	}




	public function change_password($data, $reset = null)
	{
		if ($reset) {
			$this->db->set('password', sha1('123'));
			$this->db->where('id', $data);
			$this->db->update('users');
		} else {
			$this->db->select('password')->from('users')->where('id', $data['id']);
			$res = $this->db->get();
			$oldpass = $res->row_array();

			if ($oldpass['password'] != $data['old_password']) {
				return false;
			} else {
				$this->db->set('password', $data['new_password']);
				$this->db->where('id', $data['id']);
				$this->db->update('users');
			}
		}
		return true;
	}
	public function get_table($table, $order, $by, $where = null)
	{
		$this->db->order_by($order, $by);
		if ($table == 'delivery') {
			$this->db->select('po_list_detail.description as desc, delivery_detail.qty_delivery, delivery.id as id, delivery.nomor_sj as nomor_sj, delivery.nomor_po as nomor_po');
			$this->db->join('delivery_detail', 'delivery_detail.id_delivery = delivery.id');
			$this->db->join('po_list_detail', 'po_list_detail.id = delivery_detail.id_po_list_detail');
		}
		if ($table == 'delivery_log') {
			$this->db->select('delivery_log.*,delivery.nomor_po as nomor_po, delivery.nomor_sj as nomor_sj, delivery.id as id_delivery');
			$this->db->join('delivery', 'delivery.id = delivery_log.id_delivery');
		}
		if ($where) {
			$this->db->where($where);
		}

		$res = $this->db->get($table);
		return $res ? $res->result_array() : false;
	}
	public function get_customtable($table, $order, $by, $where = null)
	{
		switch ($table) {
			case 'delivery':
				$this->db->select('delivery.*, customer.nama as customer_name');
				$this->db->join('customer', 'customer.id = delivery.id_customer');
				break;
			case 'po_list':
				$this->db->select(
					'po_list.year as year,
					po_list.nama_customer as customer,
					po_list.due_date as due_date,
				po_list.month as month, 
				po_list.nomor_po as nomor_po, 
				po_list_detail.description as desc, 
				brand.nama as brand_name, 
				po_list_detail.qty as qty_item,
				po_list_detail.id as id_po_list_detail
				'
				);
				$this->db->join('po_list_detail', 'po_list_detail.id_po_list = po_list.id');
				$this->db->join('brand', 'brand.id = po_list_detail.id_brand');
				$this->db->where('po_list.id_brand != ', 23);
				$this->db->where('po_list.id_brand != ', 26);

				// $this->db->join('delivery_detail', 'delivery_detail.id_po_list_detail = po_list_detail.id');
				// $this->db->join('delivery', 'delivery.id = delivery_detail.id_delivery');
				// $this->db->where('delivery.sender', '<>', null);
				break;
			case 'delivery_detail':
				$this->db->select('delivery_detail.*');
				$this->db->join('delivery', 'delivery.id = delivery_detail.id_delivery');
				$this->db->where('delivery.sender != ', '');
				break;
			case 'log':
				$this->db->select('delivery_detail.*');
				$this->db->join('delivery', 'delivery.id = delivery_detail.id_delivery');
				$this->db->order_by($order, $by);
				$res = $this->db->get('delivery_detail');
				return $res ? $res->result_array() : false;
				break;
			default:
				break;
		}

		if ($where) {
			$this->db->where($where);
		}
		$this->db->order_by($order, $by);
		$res = $this->db->get($table);
		return $res ? $res->result_array() : false;
	}
	public function get_customtableid($table,  $id)
	{
		switch ($table) {
			case 'delivery':
				$this->db->where('delivery.id', $id);
				$this->db->select('delivery.*, customer.nama as customer_name');
				$this->db->join('customer', 'customer.id = delivery.id_customer');
				break;
			case 'delivery_detail':
				$this->db->where('delivery_detail.id_delivery', $id);
				$this->db->select('delivery_detail.*, po_list_detail.description as desc, brand.nama as brand_name');
				$this->db->join('po_list_detail', 'po_list_detail.id = delivery_detail.id_po_list_detail');
				$this->db->join('brand', 'brand.id = po_list_detail.id_brand');
				$res = $this->db->get($table);
				return $res ? $res->result_array() : false;
			default:
				break;
		}
		$res = $this->db->get($table);
		return $res ? $res->row_array() : false;
	}
	public function gettablelimit($table, $limit, $order, $by, $where)
	{
		if ($table == 'delivery') {
			$this->db->select('log.message');
			// $this->db->join('del')
		}
		$this->db->where($where);
		$this->db->limit($limit);
		$this->db->order_by($order, $by);
		$res = $this->db->get($table);
		return $res ? $res->result_array() : false;
	}
	public function checkpermit($param = null)
	{
		if ($this->session->userdata('user') == '') {
			redirect('main/login', 'refresh');
		}
		switch ($param) {
			case 2:
			case 'Admin Sales':
			case 4:
			case 'PE':
				if ($this->session->userdata('level') < 4) redirect('main/show403', 'refresh');
				break;
			case 9:
			case 'Product Manager':
			case 10:
			case 'Sales Manager':
				if ($this->session->userdata('level') < 9) redirect('main/show403', 'refresh');
				break;
			case 11:
			case 'director':
			case 12:
			case 'admin';
				if ($this->session->userdata('level') < 11) redirect('main/show403', 'refresh');
				break;
			default:
				return true;
				break;
		}
	}
	public function parse_postdata()
	{
		$post = $this->input->post(NULL, TRUE); // Get all POST data with XSS filtering
		$filtered_data = [];

		foreach ($post as $key => $value) {
			if (strpos($key, 'i_') === 0) { // Check if key starts with 'i_'
				$filtered_data[substr($key, 2)] = $value; // Remove 'i_' prefix
			}
		}

		return $filtered_data;
	}


	public function pre($data)
	{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}
}

/* End of file Mglobal.php */
/* Location: ./application/models/Mglobal.php */
