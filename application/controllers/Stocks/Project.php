<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('mglobal');
		$this->load->model('mdummy');
		$this->load->model('minventaris');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$header['title'] = 'Inventaris Project Report';
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('admin/stock_gudang/vstock_gudang');
		$this->load->view('vfooter');
	}
}
