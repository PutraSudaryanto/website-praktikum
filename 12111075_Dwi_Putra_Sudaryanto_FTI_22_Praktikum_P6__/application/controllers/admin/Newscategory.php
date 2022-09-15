<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newscategory extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('NewsCategoryModel');
	}
	
	function _template($view, $data=null)
	{
		$data['content'] = $this->load->view($view, $data, true);
		$this->load->view('layouts/admin_default', $data);
	}

	public function Index()
	{
		redirect('admin/newscategory/manage');
	}

	public function Manage()
	{
		$config['base_url'] = site_url('admin/newscategory/manage');
		$config['total_rows'] = $this->NewsCategoryModel->count_all();
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
			'content' => $this->NewsCategoryModel->findAll(null, $config['per_page'], $offset),
			'paging' => $this->pagination->create_links(),
		);
		$data['total_rows'] = $config['total_rows'];
		$data['per_page'] = $config['per_page'];
		$data['offset'] = $offset;
		
		/* contoh find all condition
		$data['content'] = $this->NewsCategoryModel->findAll(array(
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
			'Add Category' => site_url('admin/newscategory/add'),
		);
		
		$data['pageTitle'] = 'News Category Manage';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/admin/news_category/admin_manage', $data);
	}

	public function Add()
	{		
		$data['form_action'] = 'admin/newscategory/add';
		$data['form_category'] = $this->NewsCategoryModel->getCategory();
		if(isset($_POST['Model'])) {
			if($this->NewsCategoryModel->insertData()) {				
				$this->session->set_flashdata('message', 'News Category success created.');
				redirect('admin/newscategory/manage');				
			}
		}
		$data['dialogDetail'] = true;
		$data['dialogGroundUrl'] = site_url('admin/newscategory/manage');
		$data['dialogWidth'] = 550;
		
		$data['pageTitle'] = 'Create News Category';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/admin/news_category/admin_add', $data);		
	}

	public function Edit($id)
	{
		if(!empty($id)) {		
			$data['form_action'] = 'admin/newscategory/edit/'.$id;
			$data['form_data'] = $this->NewsCategoryModel->findByPk($id);
			$data['form_category'] = $this->NewsCategoryModel->getCategory();
			
			if(isset($_POST['Model'])) {
				if($this->NewsCategoryModel->updateByPk($id)) {
					$this->session->set_flashdata('message', 'News Category success updated.');
					redirect('admin/newscategory/manage');				
				}
			}
			
			$data['dialogDetail'] = true;
			$data['dialogGroundUrl'] = site_url('admin/newscategory/manage');
			$data['dialogWidth'] = 550;
			
			$data['pageTitle'] = 'Update News Category';
			$data['pageDescription'] = '';
			$data['pageMeta'] = '';
			$this->_template('/admin/news_category/admin_edit', $data);
			
		} else {
			redirect('admin/newscategory/manage');
		}
	}

	public function Delete($id)
	{
		if(!empty($id)) {
			$data['form_action'] = 'admin/newscategory/delete/'.$id;
			$data['form_data'] = $this->NewsCategoryModel->findByPk($id);
			
			if(isset($_POST['Model'])) {
				if($this->NewsCategoryModel->deleteByPk($id)) {				
					$this->session->set_flashdata('message', 'News Category success deleted.');
					redirect('admin/newscategory/manage');					
				}
			}
			
			$data['dialogDetail'] = true;
			$data['dialogGroundUrl'] = site_url('admin/newscategory/manage');
			$data['dialogWidth'] = 350;
			
			$data['pageTitle'] = 'Delete News Category';
			$data['pageDescription'] = '';
			$data['pageMeta'] = '';
			$this->_template('/admin/news_category/admin_delete', $data);
			
		} else {
			redirect('admin/newscategory/manage');
		}		
	}
}