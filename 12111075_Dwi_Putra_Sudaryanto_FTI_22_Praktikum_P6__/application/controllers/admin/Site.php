<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller
{	
	function __construct() 
	{
		parent::__construct();
		$this->load->model('UsersModel');
	}
	
	function _template($view, $data = NULL)
	{
		$data['content'] = $this->load->view($view, $data, true);
		$data['content'] = $this->load->view('layouts/admin_main', $data, true);
		$this->load->view('layouts/admin_default', $data);
	}

	public function index()
	{
		$data['pageTitle'] = 'Welcome, '.$this->session->userdata('logged_in')['displayname'].'!';
		$data['pageDescription'] = 'Welcome to your social network control panel. Here you can manage and modify every aspect of your social network. Directly below, you will find a quick snapshot of your social network including some useful statistics.';
		$data['pageMeta'] = '';
		$this->_template('/admin/site/admin_index', $data);
	}

	public function login()
	{
		if(isset($_POST['LoginFormAdmin'])) {
			//print_r($_POST['LoginFormAdmin']);
			$email = $_POST['LoginFormAdmin']['email'];
			$password = $_POST['LoginFormAdmin']['password'];
			
			$result = $this->UsersModel->login($email, $password);
			//print_r($result);
			//exit();
			if($result) {
				$sess_array = array();
				foreach($result as $key => $row) {
					$sess_array[$key] = $row;
				}
				//print_r($sess_array);
				$this->session->set_userdata('logged_in', $sess_array);
				$this->UsersModel->updateByPk($result->user_id, array('lastlogin_date'=>date('Y-m-d H:i:s')));
				redirect('admin/site/index');
			} else {
				redirect('admin/site/login');
			}
			
		}
		$data['dialogDetail'] = true;
		$data['dialogWidth'] = 600;
		
		$data['pageTitle'] = 'Login';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/admin/site/admin_login', $data);
	}

	public function logout()
	{
		//remove all session data
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('admin/site/login');
	}
}