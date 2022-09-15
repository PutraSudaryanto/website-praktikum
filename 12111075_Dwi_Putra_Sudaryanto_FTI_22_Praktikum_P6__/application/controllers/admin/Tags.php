<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tags extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('TagsModel');
	}
	
	function _template($view, $data=null)
	{
		$data['content'] = $this->load->view($view, $data, true);
		$data['content'] = $this->load->view('layouts/admin_main', $data, true);
		$this->load->view('layouts/admin_default', $data);
	}

	public function Index()
	{
		redirect('admin/tags/manage');
	}

	public function Manage()
	{
		$config['base_url'] = site_url('admin/tags/manage');
		$config['total_rows'] = $this->TagsModel->count_all();
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
			'content' => $this->TagsModel->findAll(null, $config['per_page'], $offset),
			'paging' => $this->pagination->create_links(),
		);
		$data['total_rows'] = $config['total_rows'];
		$data['per_page'] = $config['per_page'];
		$data['offset'] = $offset;
		
		$data['contentMenu'] = array(
			'Add Tags' => site_url('admin/tags/add'),
		);
		
		/* contoh find all condition
		$data['content'] = $this->TagsModel->findAll(array(
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
		
		$data['pageTitle'] = 'Tags Manage';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/admin/tags/admin_manage', $data);
	}

	public function Add()
	{		
		$data['form_action'] = 'admin/tags/add';
		if(isset($_POST['Model'])) {
			if($this->TagsModel->insertData()) {				
				$this->session->set_flashdata('message', 'News Category success created.');
				redirect('admin/tags/manage');				
			}
		}
		$data['dialogDetail'] = true;
		$data['dialogGroundUrl'] = site_url('admin/tags/manage');
		$data['dialogWidth'] = 550;
		
		$data['pageTitle'] = 'Create Tag';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/admin/tags/admin_add', $data);		
	}

	public function Edit($id)
	{
		if(!empty($id)) {		
			$data['form_action'] = 'admin/tags/edit/'.$id;
			$data['form_data'] = $this->TagsModel->findByPk($id);
			
			if(isset($_POST['Model'])) {
				if($this->TagsModel->updateByPk($id)) {
					$this->session->set_flashdata('message', 'News Category success updated.');
					redirect('admin/tags/manage');				
				}
			}
			$data['dialogDetail'] = true;
			$data['dialogGroundUrl'] = site_url('admin/tags/manage');
			$data['dialogWidth'] = 550;
			
			$data['pageTitle'] = 'Update Tag';
			$data['pageDescription'] = '';
			$data['pageMeta'] = '';
			$this->_template('/admin/tags/admin_edit', $data);
			
		} else {
			redirect('admin/tags/manage');
		}
	}

	public function Delete($id)
	{
		if(!empty($id)) {
			$data['form_action'] = 'admin/tags/delete/'.$id;
			$data['form_data'] = $this->TagsModel->findByPk($id);
			
			if(isset($_POST['Model'])) {
				if($this->TagsModel->deleteByPk($id)) {				
					$this->session->set_flashdata('message', 'News Category success deleted.');
					redirect('admin/tags/manage');					
				}
			}
			
			$data['dialogDetail'] = true;
			$data['dialogGroundUrl'] = site_url('admin/tags/manage');
			$data['dialogWidth'] = 350;
			
			$data['pageTitle'] = 'Delete Tag';
			$data['pageDescription'] = '';
			$data['pageMeta'] = '';
			$this->_template('/admin/tags/admin_delete', $data);
			
		} else {
			redirect('admin/tags/manage');
		}		
	}
}