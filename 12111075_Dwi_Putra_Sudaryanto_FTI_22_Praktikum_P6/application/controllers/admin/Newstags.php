<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newstags extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('NewsTagsModel');
		$this->load->model('NewsModel');
		$this->load->model('NewsCategoryModel');
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
		redirect('admin/newstags/manage');
	}

	public function Manage()
	{
		$config['base_url'] = site_url('admin/newstags/manage');
		$config['total_rows'] = $this->NewsTagsModel->count_all();
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
			'content' => $this->NewsTagsModel->findAll(null, $config['per_page'], $offset),
			'paging' => $this->pagination->create_links(),
		);
		$data['total_rows'] = $config['total_rows'];
		$data['per_page'] = $config['per_page'];
		$data['offset'] = $offset;
		
		/* contoh find all condition
		$data['content'] = $this->NewsTagsModel->findAll(array(
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
		
		$data['pageTitle'] = 'News Tags';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/admin/news_tags/admin_manage', $data);
	}
}