<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Delivery extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->model('mglobal');
		$this->load->library('form_validation');
		$this->load->model('mmaster');
		$this->load->model('mdelivery');
	}

	public function index()
	{
		$this->mglobal->checkpermit(12);
		$header['title'] = 'Delivery Barang';
		$data = [];
		$data['delivery'] = $this->mglobal->get_customtable('delivery', 'id', 'DESC');
		foreach ($data['delivery'] as $key => $value) {
			$data['delivery'][$key]['created_at'] = $this->mglobal->format_dateIndo($value['created_at']);

			$message = $this->mglobal->gettablelimit('delivery_log', 1, 'id', 'DESC', ['id_delivery' => $value['id']]);
			$data['delivery'][$key]['delivery_message'] = $message[0]['message'];
		}
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('admin/delivery/index', $data);
		$this->load->view('vfooter');
	}
	public function outstanding()
	{
		$this->mglobal->checkpermit(12);
		$header['title'] = 'Outstanding Delivery';
		$data = [];
		$data['list_po'] = $this->mglobal->get_customtable('po_list', 'due_date', 'ASC', ['year' => '2024']);
		$data['qtydelivered'] = $this->mglobal->get_customtable('delivery_detail', 'id', 'DESC');
		$data['get_log'] = $this->mglobal->get_customtable('log', 'id', 'ASC');
		foreach ($data['list_po'] as $key5 => $value5) {
			$data['list_po'][$key5]['totalOutstanding'] = $value5['qty_item'];
			$data['list_po'][$key5]['log_message'] = '';
			$data['list_po'][$key5]['id_delivery'] = 0;
			$data['list_po'][$key5]['due_date'] = $this->mglobal->format_dateIndo(date('Y-m-d', strtotime($value5['due_date'])));
		}
		foreach ($data['qtydelivered'] as $key => $value) {
			foreach ($data['list_po'] as $key2 => $value2) {
				if ($value['id_po_list_detail'] == $value2['id_po_list_detail']) {
					$data['list_po'][$key2]['totalOutstanding'] = $value2['totalOutstanding'] - $value['qty_delivery'];
				}
			}
		}

		foreach ($data['get_log'] as $key3 => $value3) {
			foreach ($data['list_po'] as $key4 => $value4) {
				if ($value3['id_po_list_detail'] == $value4['id_po_list_detail']) {
					$data['list_po'][$key4]['log_message'] = $value3['log_delivery_item'];
					$data['list_po'][$key4]['id_delivery'] = $value3['id_delivery'];
				}
			}
		}

		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('admin/delivery/outstanding', $data);
		$this->load->view('vfooter');
	}
	public function create()
	{
		$this->mglobal->checkpermit(12);
		$header['title'] = 'Create Delivery';
		$data = [];
		$data['customer'] = $this->mglobal->get_table('customer', 'nama', 'ASC');
		$this->load->view('vheader', $header);
		$this->load->view('admin/delivery/create', $data);
		$this->load->view('vfooter');
	}
	public function detail($id = null)
	{
		$this->mglobal->checkpermit(12); // Check permission with code 12

		$header['title'] = 'Create Delivery';
		$data['delivery'] = $this->mglobal->get_customtableid('delivery', $id); // Get delivery by ID

		if (!$data['delivery']) {
			show_404(); // Show 404 error if delivery is not found
			return;
		}
		$data['log'] = $this->mdelivery->group_delivery_logs($data['delivery']['nomor_po']);
		// $this->mglobal->pre($data['delivery']);

		// $data['all_delivery'] = $this->mglobal->get_table('delivery', 'id', 'DESC', ['delivery.nomor_po' => $data['delivery']['nomor_po']]);

		// $this->mglobal->pre($data['all_delivery']);

		// $data['log'] = [];
		// $data['log_detail'] = [];

		// foreach ($data['all_delivery'] as $value_all_delivery) {
		// 	$logs = $this->mglobal->get_table('delivery_log', 'delivery_log.id', 'DESC', ['delivery_log.id_delivery' => $value_all_delivery['id']]);
		// 	foreach ($logs as $log) {
		// 		$log['date'] = $this->mglobal->format_dateIndo($log['date']);
		// 		$log['nomor_po'] = $value_all_delivery['nomor_po'];
		// 		$data['log'][] = $log;
		// 	}

		// 	$log_details = $this->mglobal->get_table('delivery', 'delivery.id', 'DESC', ['delivery.id' => $value_all_delivery['id']]);
		// 	foreach ($log_details as $log_detail) {
		// 		$data['log_detail'][] = $log_detail;
		// 	}
		// }

		// foreach ($data['log'] as $key => $log_entry) {
		// 	foreach ($data['log_detail'] as $log_detail_entry) {
		// 		if ($log_entry['id_delivery'] == $log_detail_entry['id']) {
		// 			$data['log'][$key]['detail'][] = $log_detail_entry['desc'] . ' (' . $log_detail_entry['qty_delivery'] . ' ea)';
		// 		}
		// 	}
		// }
		// $this->mglobal->pre($data['log']);
		$data['user'] = $this->session->userdata('name');
		$data['idDelivery'] = $id;
		$data['delivery_detail'] = $this->mglobal->get_customtableid('delivery_detail', $id);
		$this->load->view('vheader', $header);
		$this->load->view('admin/delivery/detail', $data);
		$this->load->view('vfooter');
	}

	public function terimaBarang($id = null)
	{
		$this->mglobal->checkpermit(12);
		$this->form_validation->set_rules('receive_date', 'Receive Date', 'required');
		$this->form_validation->set_rules('recipient', 'recipient', 'required');
		if ($this->form_validation->run() == false) {
			$this->mglobal->pre($this->form_validation->error_array());
		} else {
			$post = $this->input->post();
			$post['receive_date'] = date('Y-m-d H:i:s', strtotime($post['receive_date']));
			$post['updated_by'] = $this->session->userdata('name');
			$post['updated_at'] = date('Y-m-d H:i:s');
			$this->mglobal->update_data('delivery', $post, ['id' => $id]);
			$this->mglobal->insert_data('delivery_log', [
				'id_delivery' => $id,
				'date' => date('Y-m-d H:i:s'),
				'message' => 'Item Received ',
				'created_by' => $this->session->userdata('name')  // Fixed this line
			]);
			$data = [
				'log_delivery_item' => 'Item Received by ' . $this->session->userdata('name'),
			];
			$this->mglobal->update_data('delivery_detail', $data, ['id_delivery' => $id]);
			redirect('delivery/delivery/detail/' . $id, 'refresh');
		}
	}
	public function kirimBarang($id = null)
	{
		$this->mglobal->checkpermit(12);
		$this->form_validation->set_rules('delivery_date', 'Delivery Date', 'required');
		$this->form_validation->set_rules('sender', 'sender', 'required');
		if ($this->form_validation->run() == false) {
			$this->mglobal->pre($this->form_validation->error_array());
		} else {
			$post = $this->input->post();
			$post['delivery_date'] = date('Y-m-d H:i:s', strtotime($post['delivery_date']));
			$post['updated_by'] = $this->session->userdata('name');
			$post['updated_at'] = date('Y-m-d H:i:s');
			$this->mglobal->update_data('delivery', $post, ['id' => $id]);
			$data = [
				'log_delivery_item' => 'Item Delivered by ' . $post['sender'],
			];
			$this->mglobal->update_data('delivery_detail', $data, ['id_delivery' => $id]);

			$this->mglobal->insert_data('delivery_log', [
				'id_delivery' => $id,
				'date' => date('Y-m-d H:i:s'),
				'message' => 'Item Delivered by ' . $post['sender'],
				'created_by' => $this->session->userdata('name')  // Fixed this line
			]);
			redirect('delivery/delivery/detail/' . $id, 'refresh');
		}
	}

	public function addNotes($id = null)
	{
		$this->mglobal->checkpermit(12);
		$this->form_validation->set_rules('message', 'Message', 'required');
		if ($this->form_validation->run() == false) {
			$this->mglobal->pre($this->form_validation->error_array());
		} else {
			$post = $this->input->post();
			$post['created_at'] = date('Y-m-d H:i:s');
			$post['created_by'] = $this->session->userdata('name');
			$this->mglobal->insert_data('delivery_log', [
				'id_delivery' => $id,
				'date' => date('Y-m-d H:i:s'),
				'message' => 'Notes : ' . $post['message'],
				'created_by' => $this->session->userdata('name')  // Fixed this line
			]);
			$data = [
				'log_delivery_item' => 'Notes : ' . $post['message'],
			];
			$this->mglobal->update_data('delivery_detail', $data, ['id_delivery' => $id]);
			redirect('delivery/delivery/detail/' . $id, 'refresh');
		}
	}
	public function store()
	{
		$this->mglobal->checkpermit(12);
		$this->form_validation->set_rules('id_customer', 'Customer', 'required');
		$this->form_validation->set_rules('nomor_po', 'Nomor PO', 'required');
		$this->form_validation->set_rules('nomor_sj', 'Nomor SJ', 'required');
		$this->form_validation->set_rules('id_po_list_detail[]', 'Produk', 'required');
		$this->form_validation->set_rules('qty_delivery[]', 'Qty', 'required');
		if ($this->form_validation->run() == false) {
			$this->mglobal->pre($this->form_validation->error_array());
		} else {
			$post = $this->input->post();
			$post['created_at'] = date('Y-m-d H:i:s');
			$post['updated_at'] = date('Y-m-d H:i:s');
			$post['updated_by'] = $this->session->userdata('name');
			// $this->mglobal->pre($post);
			$data = [
				'id_customer' => $post['id_customer'],
				'nomor_po' => $post['nomor_po'],
				'nomor_sj' => $post['nomor_sj'],
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_by' => $this->session->userdata('name'),
			];
			$insert_data = $this->mglobal->insert_data('delivery', $data);
			foreach ($post['id_po_list_detail'] as $key => $value) {
				$detail[$key] = [
					'id_delivery' => $insert_data,
					'id_po_list_detail' => $value,
					'qty_delivery' => $post['qty_delivery'][$key],
					'log_delivery_item'	=> 'Form Delivery Created ',
				];
				$this->mglobal->insert_data('delivery_detail', $detail[$key]);
			}
			$log = [
				'created_by' => $this->session->userdata('name'),
				'date' => date('Y-m-d H:i:s'),
				'message' => 'Form Delivery Created ',
				'id_delivery' => $insert_data
			];
			$this->mglobal->insert_data('delivery_log', $log);
			redirect('delivery/delivery');
		}
	}
}

	/* End of file Master.php */
