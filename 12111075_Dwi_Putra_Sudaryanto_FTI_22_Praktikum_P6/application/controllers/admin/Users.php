<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('UsersModel');
		$this->load->model('UserLevelModel');
	}
	
	function _template($view, $data=null)
	{
		$data['content'] = $this->load->view($view, $data, true);
		$data['content'] = $this->load->view('layouts/admin_main', $data, true);
		$this->load->view('layouts/admin_default', $data);
	}

	public function Index()
	{
		redirect('admin/users/manage');
	}

	public function Manage()
	{
		$config['base_url'] = site_url('admin/users/manage');
		$config['total_rows'] = $this->UsersModel->count_all();
		$config['per_page'] = 10;
		$config['uri_segment'] = 4;
		$config['use_page_numbers'] = TRUE;
		
		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		if($page != 0)
			$offset = $config['per_page']*($page-1);
		else
			$offset = $page;
		
		$data = array(
			'content' => $this->UsersModel->findAll(null, $config['per_page'], $offset),
			'paging' => $this->pagination->create_links(),
		);
		$data['total_rows'] = $config['total_rows'];
		$data['per_page'] = $config['per_page'];
		$data['offset'] = $offset;
		
		/* contoh find all condition
		$data['content'] = $this->UsersModel->findAll(array(
			'select' => 'publish',
			'condition' => array(
				'publish' => 0,
				'parent' => 1,
			),
			'order' => array(
				'cat_id' => 'desc',
			),
		));
		*/
		
		$data['contentMenu'] = array(
			'Add User' => site_url('admin/users/add'),
		);
		
		$data['pageTitle'] = 'User Manage';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/admin/users/admin_manage', $data);
	}

	public function View($id)
	{
		if(!empty($id)) {
			$data['content'] = $this->UsersModel->findByPk($id);
			
			$data['dialogDetail'] = true;
			$data['dialogGroundUrl'] = site_url('admin/users/manage');
			$data['dialogWidth'] = 450;
			
			$data['pageTitle'] = 'Detail User';
			$data['pageDescription'] = '';
			$data['pageMeta'] = '';
			$this->_template('/admin/users/admin_view', $data);
			
		} else {
			redirect('admin/users/manage');
		}
	}

	public function Add()
	{		
		$data['form_action'] = 'admin/users/add';
		$data['form_level'] = $this->UserLevelModel->getLevel();
		if(isset($_POST['Model'])) {
			if($this->UsersModel->insertData()) {				
				$this->session->set_flashdata('message', 'News Category success created.');
				redirect('admin/users/manage');				
			}
		}
		$data['dialogDetail'] = true;
		$data['dialogGroundUrl'] = site_url('admin/users/manage');
		$data['dialogWidth'] = 550;
		
		$data['pageTitle'] = 'Create User';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/admin/users/admin_add', $data);		
	}

	public function Edit($id)
	{
		if(!empty($id)) {		
			$data['form_action'] = 'admin/users/edit/'.$id;
			$data['form_data'] = $this->UsersModel->findByPk($id);
			$data['form_level'] = $this->UserLevelModel->getLevel();
			
			if(isset($_POST['Model'])) {
				if($this->UsersModel->updateByPk($id)) {
					$this->session->set_flashdata('message', 'News Category success updated.');
					redirect('admin/users/manage');				
				}
			}
			$data['dialogDetail'] = true;
			$data['dialogGroundUrl'] = site_url('admin/users/manage');
			$data['dialogWidth'] = 550;
			
			$data['pageTitle'] = 'Update User';
			$data['pageDescription'] = '';
			$data['pageMeta'] = '';
			$this->_template('/admin/users/admin_edit', $data);
			
		} else {
			redirect('admin/users/manage');
		}
	}

	public function Delete($id)
	{
		if(!empty($id)) {
			$data['form_action'] = 'admin/users/delete/'.$id;
			$data['form_data'] = $this->UsersModel->findByPk($id);
			
			if(isset($_POST['Model'])) {
				if($this->UsersModel->deleteByPk($id)) {				
					$this->session->set_flashdata('message', 'News Category success deleted.');
					redirect('admin/users/manage');					
				}
			}
			$data['dialogDetail'] = true;
			$data['dialogGroundUrl'] = site_url('admin/users/manage');
			$data['dialogWidth'] = 350;
			
			$data['pageTitle'] = 'Delete User';
			$data['pageDescription'] = '';
			$data['pageMeta'] = '';
			$this->_template('/admin/users/admin_delete', $data);
			
		} else {
			redirect('admin/users/manage');
		}		
	}
}