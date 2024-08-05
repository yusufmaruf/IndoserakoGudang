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


		// Inisialisasi totalOutstanding di dalam list_po terlebih dahulu
		foreach ($data['list_po'] as $key2 => $value2) {
			$data['list_po'][$key2]['totalOutstanding'] = $value2['qty_item'];
		}

		// Menghitung totalOutstanding berdasarkan qtydelivered
		foreach ($data['qtydelivered'] as $key => $value) {
			foreach ($data['list_po'] as $key2 => $value2) {
				$data['list_po'][$key2]['due_date'] = $this->mglobal->format_dateIndo(date('Y-m-d', strtotime($value2['due_date'])));
				$message = $this->mglobal->gettablelimit('delivery_log', 1, 'id', 'DESC', ['id_delivery' => $value['id']]);

				if ($value['id_po_list_detail'] == $value2['id_po_list_detail']) {
					// Mengurangi qty_delivery dari qty_item untuk mendapatkan totalOutstanding
					$data['list_po'][$key2]['totalOutstanding'] = $value2['qty_item'] - $value['qty_delivery'];
				}
			}
		}
		// $this->mglobal->pre($data['qtydelivered']);
		// $this->mglobal->pre($data['list_po']);
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
		$this->mglobal->checkpermit(12);
		$header['title'] = 'Create Delivery';
		$data['delivery'] = $this->mglobal->get_customtableid('delivery', $id);
		$data['log'] = $this->mglobal->get_table('delivery_log', 'id', 'DESC', ['id_delivery' => $id]);
		foreach ($data['log'] as $key => $value) {
			$data['log'][$key]['date'] = $this->mglobal->format_dateIndo($data['log'][$key]['date']);
		}
		$data['user'] = $this->session->userdata('name');
		$data['idDelivery'] = $id;
		$data['delivery_detail'] = $this->mglobal->get_customtableid('delivery_detail', $id);
		// $this->mglobal->pre($data['detail_delivery']);
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
