<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pbb extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mglobal');
		$this->load->model('mdummy');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$header['title'] = 'Report';
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('admin/pbb/vpbb');
		$this->load->view('vfooter');
	}
	public function create()
	{
		$header['title'] = 'Report';
		$data['barang'] = $this->mdummy->productDummy();
		// $this->mglobal->pre($data);
		$this->load->view('vheader', $header);
		$this->load->view('admin/pbb/vadd', $data);
		$this->load->view('vfooter');
	}
	public function view($id = null)
	{
		$header['title'] = 'Report View';
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('admin/pbb/vview');
		$this->load->view('vfooter');
	}
	public function getsatuan($id = null)
	{
		$data = $this->mdummy->productDummy();
		$satuan = 'pcs'; // Default satuan

		foreach ($data as $product) {
			if ($product['id'] == $id) {
				$satuan = $product['satuan'];
				break;
			}
		}

		// Return satuan in a format that can be used by JavaScript
		echo json_encode(['satuan' => $satuan]);
	}
	public function kirim($id = null)
	{
		$header['title'] = 'Kirim Barang';
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('admin/pbb/vkirim');
		$this->load->view('vfooter');
	}
	public function terima($id = null)
	{
		$header['title'] = 'Terima Barang';
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('admin/pbb/vterima');
		$this->load->view('vfooter');
	}
	public function detail($id = null)
	{
		$header['title'] = 'Report Detail';
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('admin/pbb/vdetailnew');
		$this->load->view('vfooter');
	}
}
