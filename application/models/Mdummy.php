<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mdummy extends CI_Model
{
	public function productDummy()
	{

		$data = array(
			[
				'id' => 1,
				'name' => 'Dummy Product',
				'brand' => 'dummy brand',
				'category' => 1,
				'type' => 'dummy type',
				'satuan' => 'pcs',
			],
			[
				'id' => 2,
				'name' => 'Dummy Product 2',
				'brand' => 'dummy brand 2',
				'category' => '2',
				'type' => 'dummy type 2',
				'satuan' => 'Box',
			]
		);
		return $data;
	}
}

/* End of file Mdummy.php */
/* Location: ./application/models/Mdummy.php */
