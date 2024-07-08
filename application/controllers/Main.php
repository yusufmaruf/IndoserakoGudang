<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
	public function index()
	{

		redirect('main/login');
	}

	public function login()
	{
		$this->session->userdata('user') != '' ? redirect('report') : false;
		$data = [];
		if (empty($this->input->post('submit'))) {
			$this->load->view('vlogin');
		} else {
			$post['username'] = $this->input->post('username');
			$post['password'] = sha1($this->input->post('password'));

			$res = $this->mglobal->php_login($post);
			if (!empty($res)) {
				if ($res['password'] == $post['password']) {
					$data = $res;
					$this->session->set_userdata('user', $data['username']);
					$this->session->set_userdata('name', $data['name']);
					$this->session->set_userdata('id', $data['id']);
					$this->session->set_userdata('level', $data['level']);
					redirect('report');
				} else {
					$this->session->set_flashdata('login', 'Wrong Password');
					redirect('main/login');
				}
			} else {
				$this->session->set_flashdata('login', 'User not found');
				redirect('main/login');
			}
		}
	}
	public function logout()
	{
		session_destroy();
		redirect('main/login');
	}
	public function changepassword()
	{
		$post = $this->mglobal->parse_postdata();
		foreach ($post as $key => $value) {
			$post[$key] = sha1($value);
		}
		$post['id'] = $this->session->userdata('id');
		$res = $this->mglobal->change_password($post);

		if ($res) $this->session->set_flashdata('password', 'Change password success!');
		echo json_encode($res);
	}
}
