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
	public function detail()
	{
		$this->mglobal->checkpermit(12);
		$header['title'] = 'Create Delivery';
		$this->load->view('vheader', $header);
		$this->load->view('admin/delivery/detail');
		$this->load->view('vfooter');
	}
}

	/* End of file Master.php */
