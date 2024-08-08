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
		$this->load->model('mmemoDelivery');
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
		if ($this->form_validation->run() == false) {
			$this->mglobal->pre($this->form_validation->error_array());
		} else {
			$post = $this->input->post();
			$post['receive_date'] = date('Y-m-d H:i:s', strtotime($post['receive_date']));
			$post['updated_by'] = $this->session->userdata('name');
			$post['updated_at'] = date('Y-m-d H:i:s');
			$post['recipient'] = $this->session->userdata('name');
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
	function upload_files($field, $type_name)
	{
		$path = "./uploads/surat_jalan";
		//Configure upload.
		$this->upload->initialize(array(
			"upload_path"   => $path,
			"allowed_types" => "jpg|jpeg|png",
			"file_name"     => $type_name . date('YmdHis'),
		));
		//Perform upload.
		if ($this->upload->do_upload($field)) {
			$fileData = $this->upload->data();
			return $fileData['raw_name'] . $fileData['file_ext'];
		} else {
			return $this->upload->display_errors();
		}
	}
	public function kirimJkt($id = null)
	{
		$this->mglobal->checkpermit(12);
		$data = $this->input->post();
		$data['updated_at'] = date('Y-m-d H:i:s');
		$data['updated_by'] = $this->session->userdata('name');
		$data['image_sj'] = $this->upload_files('image_sj', 'image_sj');
		$this->mglobal->update_data('delivery', $data, ['id' => $id]);
		$data = [
			'log_delivery_item' => 'Item Reported to Jakarta ',
		];
		$this->mglobal->update_data('delivery_detail', $data, ['id_delivery' => $id]);
		$this->mglobal->insert_data('delivery_log', [
			'id_delivery' => $id,
			'date' => date('Y-m-d H:i:s'),
			'message' => 'Item Reported to Jakarta ',
			'created_by' => $this->session->userdata('name')  // Fixed this line
		]);
		$checktablememo = $this->mglobal->get_table('delivery_memo', 'id', 'desc', []);
		if ($checktablememo) {
			$check_memo1 = $this->mglobal->gettablelimit('delivery_memo', 1, 'id', 'desc', ['status' => 1]);
			if ($check_memo1) {
				$detail_memo = [
					'id_memo' => $check_memo1[0]['id'],
					'id_delivery' => $id,
				];
				$this->mglobal->insert_data('delivery_memo_detail', $detail_memo);
			} else {
				$check_memo2 = $this->mglobal->gettablelimit('delivery_memo', 1, 'id', 'desc', ['status' => 2]);
				$no_memo = $check_memo2[0]['no_memo'] + 1;
				$new_memo = $this->mglobal->insert_data('delivery_memo', ['status' => 1, 'no_memo' => $no_memo]);
				$detail_memo = [
					'id_memo' => $new_memo,
					'id_delivery' => $id,
				];
				$this->mglobal->insert_data('delivery_memo_detail', $detail_memo);
			}
		} else {
			$new_memo = $this->mglobal->insert_data('delivery_memo', ['status' => 1, 'no_memo' => 1]);
			$detail_memo = [
				'id_memo' => $new_memo,
				'id_delivery' => $id,
			];
			$this->mglobal->insert_data('delivery_memo_detail', $detail_memo);
		}
		redirect('delivery/delivery/detail/' . $id, 'refresh');
	}
	public function memoDelivery()
	{
		$this->mglobal->checkpermit(12);
		$header['title'] = 'Memo Delivery';
		$data = [];
		$data['list_memo'] = $this->mdelivery->getmemo();
		// $this->mglobal->pre($data['list_memo']);
		$this->mglobal->load_toast();
		$this->load->view('vheader', $header);
		$this->load->view('admin/delivery/memonow', $data);
		$this->load->view('vfooter');
	}
	public function memodetail($id = null)
	{
		$this->mglobal->checkpermit(12);
		$header['title'] = 'Memo Detail';
		$data = [];
		$data['no_memo'] = 'A2123';
		$data['list_memo'] = $this->mdelivery->getmemodetail($id);

		$this->load->view('vheader', $header);
		$this->load->view('admin/delivery/memo_detail', $data);
		$this->load->view('vfooter');
	}
	public function addNote($id = null)
	{
		$this->mglobal->checkpermit(12);
		$data = $this->input->post();
		$this->mglobal->update_data('delivery_memo', $data, ['id' => $id]);
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function printMemo($id = null)
	{
		$this->mglobal->checkpermit(12);
		$data = [
			'print_date' => date('Y-m-d H:i:s'),
			'status' => 2
		];
		$response = $this->mglobal->update_data('delivery_memo', $data, ['id' => $id]);
		// $this->mglobal->pre($id);
	}

	public function historyMemo()
	{
		$this->mglobal->checkpermit(12);
		$header['title'] = 'History Memo';
		$data = [];
		$data['list_memo'] = $this->mdelivery->list_memo();
		foreach ($data['list_memo'] as $key => $value) {
			$data['list_memo'][$key]['print_date'] = $this->mglobal->format_dateIndo($value['print_date']);
		}
		$this->mglobal->load_toast();
		$this->load->view('vheader', $header);
		$this->load->view('admin/delivery/memo', $data);
		$this->load->view('vfooter');
	}
}

	/* End of file Master.php */
