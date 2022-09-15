<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('NewsModel');
		$this->load->model('NewsCategoryModel');
	}
	
	function _template($view, $data=null)
	{
		$data['content'] = $this->load->view($view, $data, true);
		$data['content'] = $this->load->view('layouts/admin_main', $data, true);
		$this->load->view('layouts/admin_default', $data);
	}

	public function Index()
	{
		redirect('admin/news/manage');
	}

	public function Manage()
	{
		$config['base_url'] = site_url('admin/news/manage');
		$config['total_rows'] = $this->NewsModel->count_all();
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
			'content' => $this->NewsModel->findAll(null, $config['per_page'], $offset),
			'paging' => $this->pagination->create_links(),
		);
		$data['total_rows'] = $config['total_rows'];
		$data['per_page'] = $config['per_page'];
		$data['offset'] = $offset;
		
		/* contoh find all condition
		$data['content'] = $this->NewsModel->findAll(array(
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
			'Add News' => site_url('admin/news/add'),
		);
		
		$data['pageTitle'] = 'News Manage';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/admin/news/admin_manage', $data);
	}

	public function View($id)
	{
		$data['contentMenu'] = array(
			'Add News' => site_url('admin/news/add'),
			'Edit News' => site_url('admin/news/edit/'.$id),
			'Back to Manage' => site_url('admin/news/manage'),
		);
		
		if(!empty($id)) {
			$data['content'] = $this->NewsModel->findByPk($id);
			
			$data['pageTitle'] = 'Detail News';
			$data['pageDescription'] = '';
			$data['pageMeta'] = '';
			$this->_template('/admin/news/admin_view', $data);
			
		} else {
			redirect('admin/news/manage');
		}
	}

	public function Add()
	{		
		$data['form_action'] = 'admin/news/add';
		$data['form_category'] = $this->NewsCategoryModel->getCategory();
		if(isset($_POST['Model'])) {
			if($this->NewsModel->insertData()) {				
				$this->session->set_flashdata('message', 'News Category success created.');
				redirect('admin/news/manage');				
			}
		}
		
		$data['contentMenu'] = array(
			'Back to Manage' => site_url('admin/news/manage'),
		);
		
		$data['pageTitle'] = 'Create News';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/admin/news/admin_add', $data);		
	}

	public function Edit($id)
	{
		$data['contentMenu'] = array(
			'Add News' => site_url('admin/news/add'),
			'View News' => site_url('admin/news/view/'.$id),
			'Back to Manage' => site_url('admin/news/manage'),
		);
		
		if(!empty($id)) {		
			$data['form_action'] = 'admin/news/edit/'.$id;
			$data['form_data'] = $this->NewsModel->findByPk($id);
			$data['form_category'] = $this->NewsCategoryModel->getCategory();
			
			if(isset($_POST['Model'])) {
				if($this->NewsModel->updateByPk($id)) {
					$this->session->set_flashdata('message', 'News Category success updated.');
					redirect('admin/news/manage');				
				}
			}
			
			$data['pageTitle'] = 'Update News';
			$data['pageDescription'] = '';
			$data['pageMeta'] = '';
			$this->_template('/admin/news/admin_edit', $data);
			
		} else {
			redirect('admin/news/manage');
		}
	}

	public function Delete($id)
	{
		if(!empty($id)) {
			$data['form_action'] = 'admin/news/delete/'.$id;
			$data['form_data'] = $this->NewsModel->findByPk($id);
			
			if(isset($_POST['Model'])) {
				if($this->NewsModel->deleteByPk($id)) {				
					$this->session->set_flashdata('message', 'News Category success deleted.');
					redirect('admin/news/manage');					
				}
			}
			
			$data['dialogDetail'] = true;
			$data['dialogGroundUrl'] = site_url('admin/news/manage');
			$data['dialogWidth'] = 350;
			
			$data['pageTitle'] = 'Delete News';
			$data['pageDescription'] = '';
			$data['pageMeta'] = '';
			$this->_template('/admin/news/admin_delete', $data);
			
		} else {
			redirect('admin/news/manage');
		}		
	}
}