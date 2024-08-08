<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->model('mglobal');
		$this->load->library('form_validation');
		$this->load->model('mmaster');
		$this->load->model('mdelivery');
		$this->load->model('mmemoDelivery');
	}

	public function index()
	{
		$this->mglobal->checkpermit(12);
		$header['title'] = 'Dashboard Delivery';
		$data = [];
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('admin/delivery/dashboard', $data);
		$this->load->view('vfooter');
	}
}

	/* End of file Master.php */
