<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mglobal');

		$this->load->library('form_validation');
	}
	public function inventarisProject()
	{
		$header['title'] = 'Inventaris Project Report';
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('admin/stock_gudang/vstock_gudang');
		$this->load->view('vfooter');
	}
	public function create()
	{
		$header['title'] = 'Report';
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('admin/pbb/vadd');
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
		$this->load->view('admin/pbb/vdetail');
		$this->load->view('vfooter');
	}
}
