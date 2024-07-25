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
		$data['barang'] = $this->mglobal->get_table('barang');
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
		$this->load->view('admin/pbb/vkirim', $data);
		$this->load->view('vfooter');
	}
	public function terima($id = null)
	{
		$header['title'] = 'Terima Barang';
		$data['barang'] = $this->mdummy->productDummy();
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('admin/pbb/vterima', $data);
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
