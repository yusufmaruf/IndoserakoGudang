<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('mglobal');
		$this->load->model('mdummy');
		$this->load->model('minventaris');
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
		$data['inventaris'] = $this->minventaris->getdata();
		$this->load->view('admin/stock_gudang/vstockcompany_gudang', $data);
		$this->load->view('vfooter');
	}
	public function detailInventarisCompany($id = null)
	{
		$header['title'] = 'Inventaris Company Report Detail';
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$data['receive'] = $this->minventaris->getDataReceive($id, 1);
		$data['return'] = $this->minventaris->getDataReceive($id, 2);
		$data['log'] = $this->mglobal->get_table('logInventoryStock', $id);
		$this->load->view('admin/stock_gudang/vstockcompany_gudang_detail', $data);
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
	public function receiveStockCompany()
	{
		$this->mglobal->checkpermit(99);
		$header['title'] = 'Receive Stock Company';
		$data = [];
		$data['barang'] = $this->mglobal->get_table('barang');
		$this->load->view('vheader', $header);
		// $this->mglobal->load_toast();
		$this->load->view('admin/stock_gudang/vadd_stockCompany', $data);
		// $this->load->view('modal/reset_password');
		$this->load->view('vfooter');
	}
	public function receiveStockCompany_add()
	{
		$this->mglobal->checkpermit(99);
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
		$this->form_validation->set_rules('penerima', 'penerima', 'required');
		$this->form_validation->set_rules('reason', 'reason', 'required');
		$this->form_validation->set_rules('idBarang[]', 'idBarang[]', 'required');
		$this->form_validation->set_rules('qty[]', 'qty[]', 'required');
		$this->form_validation->set_rules('supplier[]', 'supplier[]', 'required');
		$this->form_validation->set_rules('totalprice[]', 'totalprice[]', 'required');
		if ($this->form_validation->run() == false) {
			return $this->mglobal->pre($this->form_validation->error_array());
		} else {
			$data = $this->input->post();
			// $this->mglobal->pre($data);
			foreach ($data['idBarang'] as $key => $value) {
				// $this->mglobal->pre($data['idBarang'][$key]);
				// $this->mglobal->pre($data['qty'][$key]);
				// $this->mglobal->pre($data['supplier'][$key]);
				$this->mglobal->pre($value);

				$this->mglobal->insert_data('inventoryStock', [
					'idBarang' => $value,
					'qty' => $data['qty'][$key],
					'supplier' => $data['supplier'][$key],
					'totalprice' => $data['totalprice'][$key],
					'tanggal' => $data['tanggal'],
					'penerima' => $data['penerima'],
					'reason' => $data['reason'],
					'jenis' => 1,
					'timestamp' => date('Y-m-d H:i:s')
				]);
				$this->mglobal->insert_data('logInventoryStock', [
					'idBarang' => $value,
					'messages' => 'Receive ' . $data['qty'][$key] . ' from ' . $data['penerima'],
					'date' => date('Y-m-d'),
					'jenis' => 1
				]);
			}
			$this->session->set_flashdata('ins_success', 'Insert data success!');
			redirect('stock/receiveStockCompany');
		}
	}
	public function subtractStockCompany()
	{

		$this->mglobal->checkpermit(99);
		$header['title'] = 'Subtract Stock Company';
		$data = [];
		$data['barang'] = $this->mglobal->get_table('inventoryStock');
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('admin/stock_gudang/vsubtract_stockCompany', $data);
	}
	public function subtractStockCompany_add()
	{

		$this->mglobal->checkpermit(99);
		$this->form_validation->set_rules('soNumber', 'soNumber', 'required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
		$this->form_validation->set_rules('idBarang[]', 'idBarang[]', 'required');
		$this->form_validation->set_rules('qty[]', 'qty[]', 'required');
		if ($this->form_validation->run() == false) {
			return $this->mglobal->pre($this->form_validation->error_array());
		} else {
			$data = $this->input->post();
			foreach ($data['idBarang'] as $key => $value) {
				// $this->mglobal->pre($data['idBarang'][$key]);
				// $this->mglobal->pre($data['qty'][$key]);
				// $this->mglobal->pre($data['supplier'][$key]);
				$this->mglobal->pre($value);

				$this->mglobal->insert_data('inventoryStock', [
					'idBarang' => $value,
					'qty' => $data['qty'][$key],
					'tanggal' => $data['tanggal'],
					'reason' => $data['reason'],
					'jenis' => 2,
					'soNumber' => $data['soNumber'],
					'timestamp' => date('Y-m-d H:i:s')
				]);
				$this->mglobal->insert_data('logInventoryStock', [
					'idBarang' => $value,
					'messages' => 'Keluar Sejumlah ' . $data['qty'][$key] . ' Karena ' . $data['reason'],
					'date' => date('Y-m-d'),
					'jenis' => 2
				]);
			}
			$this->session->set_flashdata('ins_success', 'Insert data success!');
			redirect('stock/subtractStockCompany');
		}
	}
}
