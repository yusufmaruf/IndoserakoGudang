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
		$this->mglobal->pre($data['delivery']);
		$this->load->view('vheader', $header);
		$this->load->view('admin/delivery/detail', $data);
		$this->load->view('vfooter');
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
				'message' => 'Create Delivery '  . ' by ' . $this->session->userdata('name'),
				'id_delivery' => $insert_data
			];
			$this->mglobal->insert_data('delivery_log', $log);
			redirect('delivery/delivery');
		}
	}
}

	/* End of file Master.php */
