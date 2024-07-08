<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mglobal');

		$this->load->library('form_validation');
	}
	public function index()
	{
		$items = [];
		$data = [];
		$header['title'] = 'Report';

		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('vblank');
		$this->load->view('vfooter');
	}
}
