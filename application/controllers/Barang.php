<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
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
		$this->mglobal->checkpermit(99);
		$header['title'] = 'Barang';
		$data = [];
		$res = $this->mglobal->get_table('barang');
		$data['barang'] = $res;
		// $this->mglobal->pre($data['barang']);
		$res = $this->mglobal->get_table('category');
		$data['category'] = $res;
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('admin/barang/vbarang', $data);
		// // $this->load->view('modal/reset_password');
		// $this->load->view('vfooter');
	}

	function upload_files($field, $type_name, $resize = false)
	{
		// $prefix = strtok($field, '_'); // get string before '_' 
		// if($prefix == 'photo' || $prefix == 'std'){
		// 	$path = "./uploads/".$prefix;
		// } else {
		// 	$path = "./uploads";
		// }
		$path = "./uploads/equipment";

		//Configure upload.
		$this->upload->initialize(array(
			"upload_path"   => $path,
			"allowed_types" => "jpg|jpeg|png",
			"file_name"     => $type_name . date('YmdHis'),
		));

		//Perform upload.
		if ($this->upload->do_upload($field)) {

			$fileData = $this->upload->data();

			if ($resize == true) {
				$width = $fileData['image_width'];
				$height = $fileData['image_height'];
			}

			$img_cfg_thumb['image_library'] = 'gd2';
			$img_cfg_thumb['source_image'] = "../uploads/" . $fileData['raw_name'] . $fileData['file_ext'];
			$img_cfg_thumb['maintain_ratio'] = FALSE;
			$img_cfg_thumb['new_image'] = "../uploads/" . $fileData['raw_name'] . $fileData['file_ext'];
			$img_cfg_thumb['width'] = $width;
			$img_cfg_thumb['height'] = $height;
			$img_cfg_thumb['quality'] = 80;
			$this->load->library('image_lib');
			$this->image_lib->initialize($img_cfg_thumb);
			$this->image_lib->resize();

			return $fileData['raw_name'] . $fileData['file_ext'];
		} else {
			return $this->upload->display_errors(); //check jika ada error pada upload file
			//return "upload failed";
		}
	}


	public function save()
	{
		$this->mglobal->checkpermit(99);
		$data = [];
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('brand', 'brand', 'required');
		$this->form_validation->set_rules('type', 'type', 'required');
		$this->form_validation->set_rules('satuan', 'satuan', 'required');
		$this->form_validation->set_rules('category', 'category', 'required');
		// $this->form_validation->set_rules('foto', 'foto', 'required');
		if ($this->form_validation->run() == false) {
			$this->mglobal->pre($this->form_validation->error_array());
		} else {

			$data = $this->input->post();
			// $this->mglobal->pre($data);
			$data['foto'] = $this->upload_files('foto', 'foto');
			$this->mglobal->insert_data('barang', $data,);
			$this->session->set_flashdata('ins_success', 'Insert data success!');
			redirect('barang');
		}
	}
	public function edit($id = null)
	{
		$data = $this->mglobal->get_item('barang', 'id_barang', $id);
		header('Content-Type: application/json');
		if ($data) {
			echo json_encode($data);
		} else {
			echo json_encode(['error' => 'No data found']);
		}
	}

	public function update($id = null)
	{
		$this->mglobal->checkpermit(99);

		// Enable error reporting for debugging
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('brand', 'Brand', 'required');
		$this->form_validation->set_rules('type', 'Type', 'required');
		$this->form_validation->set_rules('satuan', 'Satuan', 'required');
		$this->form_validation->set_rules('category', 'Category', 'required');

		if ($this->form_validation->run() == false) {
			// Display validation errors
			$this->mglobal->pre($this->form_validation->error_array());
		} else {
			$data = $this->input->post();
			$item = $this->mglobal->get_item('barang', 'id_barang', $data['id_barang']);

			// Jika ada file gambar yang diunggah, lakukan proses upload baru
			if (!empty($_FILES['foto']['name'])) {
				// Hapus gambar lama
				$old_image_path = "./uploads/equipment/" . $item['foto'];
				if (file_exists($old_image_path)) {
					unlink($old_image_path);
				}

				// Upload gambar baru
				$data['foto'] = $this->upload_files('foto', 'foto');
			}

			// Lakukan update data barang
			$update_result = $this->mglobal->update_data('barang', $data, 'id_barang = ' . $data['id_barang']);

			if ($update_result) {
				$this->session->set_flashdata('ins_success', 'Update data success!');
			} else {
				$this->session->set_flashdata('ins_failed', 'Update data failed!');
			}

			redirect('barang');
		}
	}

	public function delete($id = null)
	{
		$this->mglobal->checkpermit(99);
		$data = $this->input->post();
		$this->mglobal->pre($data['id_barang']);
		$item = $this->mglobal->get_item('barang', 'id_barang', $data['id_barang']);
		$old_image_path = "./uploads/equipment/" . $item['foto'];
		unlink($old_image_path);
		$where = array('id_barang' => $data['id_barang']);
		$delete_result = $this->mglobal->delete_data('barang', $where);
		if ($delete_result > 0) {
			$this->session->set_flashdata('del_success', 'Delete data success!');
		} else {
			$this->session->set_flashdata('del_failed', 'Delete data failed!');
		}
		redirect('barang');
	}
}

	/* End of file Master.php */
