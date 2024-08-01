<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->model('mglobal');
		$this->load->model('mdummy');
		$this->load->library('form_validation');
		$this->load->model('mmaster');
	}

	public function index()
	{
	}
	public function getsatuan($id = null)
	{
		$data = $this->mglobal->get_item('barang', 'id_barang', $id);
		$satuan = $data['satuan'];
		echo json_encode(['satuan' => $satuan]);
	}

	public function getcustom()
	{
		// Ambil data dari POST
		$table = $this->input->post('table');
		$column = $this->input->post('field');
		$id = $this->input->post('nomor_po');
		if ($table && $column && $id) {
			$data = $this->mglobal->get_customs($table, $column, $id);
			echo json_encode($data);
		} else {
			echo json_encode([]); // Return empty array if parameters are not valid
		}
	}

	function upload_files($field, $type_name, $resize = false)
	{
		// $prefix = strtok($field, '_'); // get string before '_' 
		// if($prefix == 'photo' || $prefix == 'std'){
		// 	$path = "./uploads/".$prefix;
		// } else {
		// 	$path = "./uploads";
		// }
		$path = "./uploads/equipment";

		//Configure upload.
		$this->upload->initialize(array(
			"upload_path"   => $path,
			"allowed_types" => "jpg|jpeg|png",
			"file_name"     => $type_name
		));

		//Perform upload.
		if ($this->upload->do_upload($field)) {

			$fileData = $this->upload->data();

			if ($resize == true) {
				$width = $fileData['image_width'];
				$height = $fileData['image_height'];
			}

			$img_cfg_thumb['image_library'] = 'gd2';
			$img_cfg_thumb['source_image'] = "../uploads/" . $fileData['raw_name'] . $fileData['file_ext'];
			$img_cfg_thumb['maintain_ratio'] = FALSE;
			$img_cfg_thumb['new_image'] = "../uploads/" . $fileData['raw_name'] . $fileData['file_ext'];
			$img_cfg_thumb['width'] = $width;
			$img_cfg_thumb['height'] = $height;
			$img_cfg_thumb['quality'] = 80;
			$this->load->library('image_lib');
			$this->image_lib->initialize($img_cfg_thumb);
			$this->image_lib->resize();

			return $fileData['raw_name'] . $fileData['file_ext'];
		} else {
			return $this->upload->display_errors(); //check jika ada error pada upload file
			//return "upload failed";
		}
	}

	public function user()
	{
		$this->mglobal->checkpermit(12);
		$header['title'] = 'User';
		$data = [];
		$res = $this->mglobal->get_table('users');
		$data['row'] = $res;
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('user/vmaster_user', $data);
		$this->load->view('modal/reset_password');
		$this->load->view('vfooter');
	}

	public function user_add()
	{
		$this->mglobal->checkpermit();
		$header['title'] = 'Add User';
		$data = [];

		$this->form_validation->set_rules('i_username', 'username', 'trim|required');
		$this->form_validation->set_rules('i_name', 'name', 'trim|required');
		$this->form_validation->set_rules('i_password', 'password', 'trim|required');
		$this->form_validation->set_rules('i_c_password', 'confirm password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['user_list'] = $this->mglobal->get_table('users');
			$this->load->view('vheader', $header);
			$this->load->view('user/vmaster_user_add', $data);
			$this->load->view('vfooter');
		} else {
			$post = $this->mglobal->parse_postdata();
			$post['password'] = sha1($post['password']);
			unset($post['c_password']);

			$insert = $this->mmaster->crud('users', $post, 2);

			if ($insert) {
				$this->session->set_flashdata('global', 'ins_success');
				redirect('master/user');
			} else {
				$data = $post;
				$this->session->set_flashdata('global', 'ins_failed');
				$this->load->view('vheader', $header);
				$this->load->view('user/vmaster_user_add', $data);
				$this->load->view('vfooter');
			}
		}
	}

	public function user_edit($id)
	{
		$this->mglobal->checkpermit(12);
		$header['title'] = 'Edit User';
		$data = [];

		$data['del_title'] = "user";
		$data['url_delete'] = "master/user_delete/";


		$data['edit'] = $this->mglobal->get_table('users', $id);

		$this->form_validation->set_rules('i_name', 'name', 'trim|required');
		// $this->form_validation->set_rules('i_password', 'password', 'trim|required');
		// $this->form_validation->set_rules('i_c_password', 'confirm password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('vheader', $header);
			$this->load->view('user/vmaster_user_edit', $data);
			$this->load->view('modal/delete_message', $data);
			$this->load->view('vfooter');
		} else {
			$post = $this->mglobal->parse_postdata();
			//$post['password'] = sha1($post['password']);
			//unset($post['c_password']);
			unset($post['id_company']);

			$update = $this->mmaster->crud('users', $post, 1);

			if ($update) {
				$this->session->set_flashdata('global', 'upd_success');
				redirect('master/user');
			} else {
				$data = $post;
				$this->session->set_flashdata('global', 'upd_failed');
				$this->load->view('vheader', $header);
				$this->load->view('company/vmaster_user_edit', $data);
				$this->load->view('vfooter');
			}
		}
	}

	public function user_delete($id)
	{
		$this->mglobal->checkpermit(12);
		$header['title'] = 'Delete User';

		$delete = $this->mmaster->crud('users', $id, 3);

		if ($delete) $this->session->set_flashdata('global', 'del_success');
		else $this->session->set_flashdata('global', 'del_failed');

		redirect('master/user');
	}

	public function user_reset($id)
	{
		$this->mglobal->checkpermit(12);
		$header['title'] = 'Reset Password User';

		$reset = $this->mglobal->change_password($id, true);

		if ($reset) $this->session->set_flashdata('global', 'reset_success');

		redirect('master/user');
	}


	// gudang 
	public function gudang()
	{
		$this->mglobal->checkpermit(12);
		$header['title'] = 'Gudang';
		$data = [];
		$res = $this->mglobal->get_table('gudang');
		$data['row'] = $res;
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('admin/Gudang/vgudang', $data);
		// $this->load->view('modal/reset_password');
		$this->load->view('vfooter');
	}
	// end gudang

	//suplier
	public function supplier()
	{
		$this->mglobal->checkpermit(12);
		$header['title'] = 'Supplier';
		$data = [];
		$res = $this->mglobal->get_table('suppliers');
		$data['row'] = $res;
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('admin/supplier/vsupplier', $data);
		// $this->load->view('modal/reset_password');
		$this->load->view('vfooter');
	}
	//end suplier

	//barang
	public function barang()
	{
		$this->mglobal->checkpermit(12);
		$header['title'] = 'Barang';
		$data = [];
		// $res = $this->mglobal->get_table('barang');
		// $data['row'] = $res;
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('admin/barang/vbarang', $data);
		// $this->load->view('modal/reset_password');
		$this->load->view('vfooter');
	}
	//end barang

	//category
	public function category()
	{
		$this->mglobal->checkpermit(12);
		$header['title'] = 'Category';
		$data = [];
		// $res = $this->mglobal->get_table('category');
		// $data['row'] = $res;
		$this->load->view('vheader', $header);
		$this->mglobal->load_toast();
		$this->load->view('admin/category/vcategory', $data);
		// $this->load->view('modal/reset_password');
		$this->load->view('vfooter');
	}
	//end category

	//stock gudang 
	public function stockGudang()
	{
		$this->mglobal->checkpermit(12);
		$header['title'] = 'Stock Gudang';
		$data = [];
		// $res = $this->mglobal->get_table('stock_gudang');
		// $data['row'] = $res;
		$this->load->view('vheader', $header);
		// $this->mglobal->load_toast();
		$this->load->view('admin/stock_gudang/vstock_gudang', $data);
		// $this->load->view('modal/reset_password');
		$this->load->view('vfooter');
	}

	public function receiveStockCompany()
	{
		$this->mglobal->checkpermit(12);
		$header['title'] = 'Receive Stock Company';
		$data = [];
		$data['barang'] =  $this->mdummy->productDummy();
		// $res = $this->mglobal->get_table('stock_gudang');
		// $data['row'] = $res;
		$this->load->view('vheader', $header);
		// $this->mglobal->load_toast();
		$this->load->view('admin/stock_gudang/vadd_stockCompany', $data);
		// $this->load->view('modal/reset_password');
		$this->load->view('vfooter');
	}

	public function receiveSafetyStock()
	{

		$this->mglobal->checkpermit(12);
		$header['title'] = 'Receive Safety Stock';
		$data = [];
		$data['barang'] =  $this->mdummy->productDummy();
		// $res = $this->mglobal->get_table('stock_gudang');
		// $data['row'] = $res;
		$this->load->view('vheader', $header);
		// $this->mglobal->load_toast();
		$this->load->view('admin/stock_gudang/vaddSafety_stock', $data);
	}
	public function subtractSafetyStock()
	{

		$this->mglobal->checkpermit(12);
		$header['title'] = 'Subtract Safety Stock';
		$data = [];
		$data['barang'] =  $this->mdummy->productDummy();

		// $res = $this->mglobal->get_table('stock_gudang');
		// $data['row'] = $res;
		$this->load->view('vheader', $header);
		// $this->mglobal->load_toast();
		$this->load->view('admin/stock_gudang/vsubtractSafety_stock', $data);
	}

	//end stock gudang

	//master consumer
	public function consumer()
	{
		$this->mglobal->checkpermit(12);
		$header['title'] = 'Master Consumer';
		$data = [];
		// $res = $this->mglobal->get_table('stock_gudang');
		// $data['row'] = $res;
		$this->load->view('vheader', $header);
		// $this->mglobal->load_toast();
		$this->load->view('admin/master_consumer/vmaster_consumer', $data);
		// $this->load->view('modal/reset_password');
		$this->load->view('vfooter');
	}
	//end master consumer


}

/* End of file Master.php */
