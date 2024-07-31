<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
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
		$header['title'] = 'Category';
		$data = [];
		// $res = $this->mglobal->get_table('category');
		// $data['category'] = $res;
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('admin/category/vcategory', $data);
		// $this->load->view('modal/reset_password');
		$this->load->view('vfooter');
	}
	public function edit($id = null)
	{
		$data = $this->mglobal->get_item('category', 'id_category', $id);
		header('Content-Type: application/json');
		if ($data) {
			echo json_encode($data);
		} else {
			echo json_encode(['error' => 'No data found']);
		}
	}

	public function save()
	{
		$this->mglobal->checkpermit(12);
		$data = [];
		$this->form_validation->set_rules('name', 'Name', 'required');
		if ($this->form_validation->run() == false) {
			$this->mglobal->pre($this->form_validation->error_array());
		} else {
			$data = $this->input->post();
			$this->mglobal->insert_data('category', $data);
			$this->session->set_flashdata('ins_success', 'Insert data success!');
			redirect('category');
		}
	}
	public function update($id = null)
	{
		$this->mglobal->checkpermit(12);

		// Enable error reporting for debugging
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);

		$this->form_validation->set_rules('name', 'Name', 'required');

		if ($this->form_validation->run() == false) {
			// Display validation errors
			$this->mglobal->pre($this->form_validation->error_array());
		} else {
			$data = $this->input->post();


			// // Update the data
			$update_result = $this->mglobal->update_data('category', $data, 'id_category = ' . $data['id_category']);
			// $this->mglobal->pre($update_result);

			if ($update_result) {
				$this->session->set_flashdata('ins_success', 'Update data success!');
				redirect('category');
			} else {
				$this->session->set_flashdata('ins_failed', 'Update data failed!');
			}

			// redirect('barang');
		}
	}
	public function delete()
	{
		$this->mglobal->checkpermit(12);
		$id = $this->input->post('id_category');
		$this->mglobal->delete_item('category', 'id_category', $id);
		$this->session->set_flashdata('del_success', 'Delete data success!');
		redirect('category');
	}




	/* End of file Master.php */
}
