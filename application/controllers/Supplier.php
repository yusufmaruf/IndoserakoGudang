<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->model('mglobal');
		$this->load->model('mdummy');
		$this->load->library('form_validation');
		$this->load->model('mmaster');
	}

	public function index()
	{
		$this->mglobal->checkpermit(12);
		$header['title'] = 'Supplier';
		$data = [];
		$res = $this->mglobal->get_table('suppliers');
		$data['suppliers'] = $res;
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('admin/supplier/vsupplier', $data);
		// $this->load->view('modal/reset_password');
		$this->load->view('vfooter');
	}
	public function save()
	{
		$this->mglobal->checkpermit(12);
		$data = [];
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('cp', 'CP', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		// $this->form_validation->set_rules('link', 'Link', 'required');
		if ($this->form_validation->run() == false) {
			$this->mglobal->pre($this->form_validation->error_array());
		} else {
			$data = $this->input->post();
			$this->mglobal->insert_data('suppliers', $data);
			$this->session->set_flashdata('ins_success', 'Insert data success!');
			redirect('supplier');
		}
	}

	public function edit($id = null)
	{
		$data = $this->mglobal->get_item('suppliers', 'id', $id);
		header('Content-Type: application/json');
		if ($data) {
			echo json_encode($data);
		} else {
			echo json_encode(['error' => 'No data found']);
		}
	}
	public function delete()
	{
		$this->mglobal->checkpermit(12);
		$id = $this->input->post('id');
		$this->mglobal->pre($id);
		$this->mglobal->delete_item('suppliers', 'id', $id);
		$this->session->set_flashdata('del_success', 'Delete data success!');
		redirect('supplier');
	}




	/* End of file Master.php */
}
