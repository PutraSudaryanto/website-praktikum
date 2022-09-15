<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userlevel extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
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
		redirect('admin/userlevel/manage');
	}

	public function Manage()
	{
		$config['base_url'] = site_url('admin/userlevel/manage');
		$config['total_rows'] = $this->UserLevelModel->count_all();
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
			'content' => $this->UserLevelModel->findAll(null, $config['per_page'], $offset),
			'paging' => $this->pagination->create_links(),
		);
		$data['total_rows'] = $config['total_rows'];
		$data['per_page'] = $config['per_page'];
		$data['offset'] = $offset;
		
		/* contoh find all condition
		$data['content'] = $this->UserLevelModel->findAll(array(
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
			'Add User Level' => site_url('admin/userlevel/add'),
		);
		
		$data['pageTitle'] = 'User Level Manage';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/admin/user_level/admin_manage', $data);
	}

	public function Add()
	{		
		$data['form_action'] = 'admin/userlevel/add';
		if(isset($_POST['Model'])) {
			if($this->UserLevelModel->insertData()) {				
				$this->session->set_flashdata('message', 'News Category success created.');
				redirect('admin/userlevel/manage');				
			}
		}
		$data['dialogDetail'] = true;
		$data['dialogGroundUrl'] = site_url('admin/userlevel/manage');
		$data['dialogWidth'] = 550;
		
		$data['pageTitle'] = 'Create User Level';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/admin/user_level/admin_add', $data);		
	}

	public function Edit($id)
	{
		if(!empty($id)) {		
			$data['form_action'] = 'admin/userlevel/edit/'.$id;
			$data['form_data'] = $this->UserLevelModel->findByPk($id);
			
			if(isset($_POST['Model'])) {
				if($this->UserLevelModel->updateByPk($id)) {
					$this->session->set_flashdata('message', 'News Category success updated.');
					redirect('admin/userlevel/manage');				
				}
			}
			$data['dialogDetail'] = true;
			$data['dialogGroundUrl'] = site_url('admin/userlevel/manage');
			$data['dialogWidth'] = 550;
			
			$data['pageTitle'] = 'Update User Level';
			$data['pageDescription'] = '';
			$data['pageMeta'] = '';
			$this->_template('/admin/user_level/admin_edit', $data);
			
		} else {
			redirect('admin/userlevel/manage');
		}
	}

	public function Delete($id)
	{
		if(!empty($id)) {
			$data['form_action'] = 'admin/userlevel/delete/'.$id;
			$data['form_data'] = $this->UserLevelModel->findByPk($id);
			
			if(isset($_POST['Model'])) {
				if($this->UserLevelModel->deleteByPk($id)) {				
					$this->session->set_flashdata('message', 'News Category success deleted.');
					redirect('admin/userlevel/manage');					
				}
			}
			$data['dialogDetail'] = true;
			$data['dialogGroundUrl'] = site_url('admin/userlevel/manage');
			$data['dialogWidth'] = 350;
			
			$data['pageTitle'] = 'Delete User Level';
			$data['pageDescription'] = '';
			$data['pageMeta'] = '';
			$this->_template('/admin/user_level/admin_delete', $data);
			
		} else {
			redirect('admin/userlevel/manage');
		}		
	}
}