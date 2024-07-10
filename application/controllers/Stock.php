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
	public function inventarisCompany()
	{
		$header['title'] = 'Inventaris Company Report';
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('admin/stock_gudang/vstockcompany_gudang');
		$this->load->view('vfooter');
	}
	public function safetyStock()
	{
		$header['title'] = 'Safety Stock Report';
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('admin/stock_gudang/vsafety_stock');
		$this->load->view('vfooter');
	}
}
