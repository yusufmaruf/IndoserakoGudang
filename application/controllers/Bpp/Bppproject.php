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
		$this->load->model('minventaris');
		$this->load->library('form_validation');
		$this->load->model('mmaster');
	}
	function upload_files($field, $type_name)
	{
		$path = "./uploads/bppproject";
		$loc = "uploads/bppproject/";
		//Configure upload.
		$this->upload->initialize(array(
			"upload_path"   => $path,
			"allowed_types" => "jpg|jpeg|png",
			"file_name"     => $type_name . date('YmdHis'),
		));
		//Perform upload.
		if ($this->upload->do_upload($field)) {
			$fileData = $this->upload->data();
			return $loc . $fileData['raw_name'] . $fileData['file_ext'];
		} else {
			return $this->upload->display_errors(); //check jika ada error pada upload file
		}
	}
	public function index()
	{
		$header['title'] = 'Report';
		$this->mglobal->load_toast();
		$data = [];
		$data['bpp'] = $this->mglobal->get_table('bppproject');
		foreach ($data['bpp'] as $key => $value) {
			$data['bpp'][$key]['duedate'] = $this->mglobal->format_dateIndo($value['duedate']);
		}
		$this->load->view('vheader', $header);
		$this->load->view('admin/pbb/project/vpbb', $data);
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
		$data = [];
		$data['bpp'] = $this->mglobal->get_item('bppproject', 'id', $id);
		$data['detailbpp'] = $this->mglobal->get_table('detail_bpp_project', $data['bpp']['id']);
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('admin/pbb/project/vview', $data);
		$this->load->view('vfooter');
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
		$this->mglobal->checkpermit(12);
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
			$this->mglobal->pre($data);
			$data['ttd'] = $this->upload_files('ttd', 'ttd');
			$this->mglobal->pre($data);
			$insert_data = $this->mglobal->insert_data('bppproject', [
				'noform' => $data['noform'],
				'noso' => $data['noso'],
				'customers' => $data['customers'],
				'nopo' => $data['nopo'],
				'nameproject' => $data['nameproject'],
				'duedate' => $data['duedate'],
				'imagepath' => $data['ttd'],
				'status' => $data['status']
			]);
			foreach ($data['id_barang'] as $item => $value) {
				$itemdetail[$item] = [
					'id_bpp' => $insert_data,
					'id_barang' => $value,
					'qty' => $data['qty'][$item],
					'pic' => $data['iduser'][$item],
					'status' => $data['status']
				];
				$this->mglobal->insert_data('detail_bpp_project', $itemdetail[$item]);
			}
			$this->session->set_flashdata('global', 'ins_success');
			redirect('bpp/bppproject');
		}
	}
	public function show($id = null)
	{
		$data = $this->mglobal->get_item('bppproject', 'id', $id);
		header('Content-Type: application/json');
		if ($data) {
			echo json_encode($data);
		} else {
			echo json_encode(['error' => 'No data found']);
		}
	}
}
