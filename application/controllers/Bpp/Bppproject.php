<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bppproject extends CI_Controller
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
			}



			return $fileData['raw_name'] . $fileData['file_ext'];
		} else {
			return $this->upload->display_errors(); //check jika ada error pada upload file
			//return "upload failed";
		}
	}
	public function index()
	{
		$header['title'] = 'Report';
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('admin/pbb/project/vpbb');
		$this->load->view('vfooter');
	}
	public function create()
	{
		$header['title'] = 'Report';
		$data['barang'] = $this->mglobal->get_table('barang');
		$this->load->view('vheader', $header);
		$this->load->view('admin/pbb/project/vadd', $data);
		$this->load->view('vfooter');
	}
	public function view($id = null)
	{
		$header['title'] = 'Report View';
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('admin/pbb/project/vview');
		$this->load->view('vfooter');
	}
	public function getsatuan($id = null)
	{
		$data = $this->mglobal->get_item('barang', 'id_barang', $id);
		$satuan = $data['satuan'];


		// Return satuan in a format that can be used by JavaScript
		echo json_encode(['satuan' => $satuan]);
	}
	public function kirim($id = null)
	{
		$header['title'] = 'Kirim Barang';
		$data['barang'] = $this->mdummy->productDummy();
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('admin/pbb/project/vkirim', $data);
		$this->load->view('vfooter');
	}
	public function terima($id = null)
	{
		$header['title'] = 'Terima Barang';
		$data['barang'] = $this->mdummy->productDummy();
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('admin/pbb/project/vterima', $data);
		$this->load->view('vfooter');
	}
	public function detail($id = null)
	{
		$header['title'] = 'Report Detail';
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('admin/pbb/project/vdetailnew');
		$this->load->view('vfooter');
	}
	public function savepbb()
	{
		$this->mglobal->checkpermit(99);
		$data = [];
		$this->form_validation->set_rules('noform', 'No PBB', 'required');
		$this->form_validation->set_rules('noso', 'No SO', 'required');
		$this->form_validation->set_rules('customers', 'Customers', 'required');
		$this->form_validation->set_rules('nameproject', 'Name Project', 'required');
		$this->form_validation->set_rules('nopo', 'No PO', 'required');
		$this->form_validation->set_rules('duedate', 'Due Date', 'required');
		$this->form_validation->set_rules('id_barang[]', 'Id Barang', 'required');
		$this->form_validation->set_rules('qty[]', 'Qty', 'required');
		$this->form_validation->set_rules('iduser[]', 'Id User', 'required');
		// $this->form_validation->set_rules('ttd', 'Tanda Tangan', 'required');
		if ($this->form_validation->run() == false) {
			$this->mglobal->pre($this->form_validation->error_array());
		} else {
			$data = $this->input->post();
			$data['ttd'] = $this->upload_files('ttd', 'ttd');
			$data->mglobal->pre($data);
		}
	}
}
