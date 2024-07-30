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
		$this->db->where($where);
		switch ($table) {
			case 'master_barcode':
				$this->db->order_by('product_name', 'asc');
				break;
			default:
				break;
		}
		$res = $this->db->get($table);
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
	public function get_table($table, $id = null)
	{
		if ($id != null) {
			switch ($table) {
				case 'log_inventory_stock':
					$this->db->where('id_barang', $id);
					$this->db->order_by('id', 'DESC');
					break;
				case 'detail_bpp_project':
					$this->db->where('id_bpp', $id);
					$this->db->order_by('detail_bpp_project.id', 'DESC');
					$this->db->join('barang', 'barang.id_barang = detail_bpp_project.id_barang');
					break;
				default:
					break;
			}
		} else {
			switch ($table) {
				case 'barang':
					$this->db->select('barang.*, category.name as category_name');
					$this->db->join('category', 'category.id_category = ' . $table . '.category');
					break;
				case 'inventory_stock':
					$this->db->select('barang.*');
					$this->db->join('barang', 'barang.id_barang = ' . $table . '.id_barang');
					$this->db->group_by('barang.id_barang');
					break;
				case 'bppproject':
					$this->db->order_by('duedate', 'ASC');
					break;
				default:
					break;
			}
		}
		$res = $this->db->get($table);
		return $res ? $res->result_array() : false;
	}
	public function checkpermit($param = null)
	{
		if ($this->session->userdata('user') == '') {
			redirect('main/login', 'refresh');
		}

		switch ($param) {
			case 10:
			case 'spv':
				if ($this->session->userdata('level') < 10) redirect('main/show403', 'refresh');
				break;
			case 20:
			case 'manager':
				if ($this->session->userdata('level') < 20) redirect('main/show403', 'refresh');
				break;
			case 99:
			case 'admin';
				if ($this->session->userdata('level') < 99) redirect('main/show403', 'refresh');
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
