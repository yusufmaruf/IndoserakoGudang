<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pbb extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mglobal');

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
}
