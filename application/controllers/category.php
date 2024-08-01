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
		$res = $this->mglobal->get_table('category', 'name', 'DESC');
		$data['category'] = $res;
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('admin/category/vcategory', $data);
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
		$this->mglobal->load_toast();
		$data = [];
		$this->form_validation->set_rules('name', 'Name', 'required');
		if ($this->form_validation->run() == false) {
			$this->mglobal->pre($this->form_validation->error_array());
		} else {
			$data = $this->input->post();
			$this->mglobal->insert_data('category', $data);
			$this->session->set_flashdata('global', 'ins_success');
			redirect('category');
		}
	}
	public function update($id = null)
	{
		$this->mglobal->checkpermit(12);
		$this->form_validation->set_rules('name', 'Name', 'required');
		if ($this->form_validation->run() == false) {
			$this->mglobal->pre($this->form_validation->error_array());
		} else {
			$data = $this->input->post();
			$update_result = $this->mglobal->update_data('category', $data, 'id_category = ' . $data['id_category']);
			if ($update_result) {
				$this->session->set_flashdata('global', 'upd_success');
				redirect('category');
			} else {
				$this->session->set_flashdata('global', 'upd_failed');
				redirect('category');
			}
		}
	}
	public function delete()
	{
		$this->mglobal->checkpermit(12);
		$id = $this->input->post('id_category');
		$this->mglobal->delete_item('category', 'id_category', $id);
		$this->session->set_flashdata('global', 'del_success!');
		redirect('category');
	}




	/* End of file Master.php */
}
