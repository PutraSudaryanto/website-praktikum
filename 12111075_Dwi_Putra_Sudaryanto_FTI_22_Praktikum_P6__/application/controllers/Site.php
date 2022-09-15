<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller
{	
	function __construct() 
	{
		parent::__construct();
		$this->load->model('NewsModel');
		$this->load->model('NewsCategoryModel');
		$this->load->model('ContactModel');
	}
	
	function _template($view, $data = NULL)
	{
		$data['content'] = $this->load->view($view, $data, true);
		$this->load->view('layouts/front_default', $data);
	}

	public function index()
	{
		$data['pageTitle'] = 'Home';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/site/front_index', $data);
	}

	public function view($id)
	{
		$data['content'] = $this->NewsModel->findByPk($id);
		$this->NewsModel->updateByPk($id, array('view'=>$data['content']->view +1));
		
		$data['pageTitle'] = $data['content']->news_title;
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/site/front_view', $data);
	}

	public function search()
	{
		$data['content'] = $this->NewsModel->findAll(array(
			//'select' => 'publish',
			'condition' => array(
				'publish' => 1,
			),
			'like' => array(
				'news_title' => $_GET['q'],
				'news_body' => $_GET['q'],
				//'news_quote' => $_GET['q'],
			),
			'order' => array(
				'news_id' => 'desc',
			),
		), 10, 0);
		
		$data['pageTitle'] = '';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/site/front_search', $data);
	}

	public function category($id)
	{
		$title = $this->NewsCategoryModel->findByPk($id);
		
		$data['content'] = $this->NewsModel->findAll(array(
			//'select' => 'publish',
			'condition' => array(
				'publish' => 1,
				'cat_id' => $id,
			),
			'order' => array(
				'news_id' => 'desc',
			),
		), 10, 0);
		
		$data['pageTitle'] = $title->cat_name.' News.';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/site/front_category', $data);
	}

	public function contact()
	{
		$data['form_action'] = 'site/contact';
		
		if(isset($_POST['Model'])) {
			if($this->ContactModel->insertData()) {				
				$this->session->set_flashdata('message', 'Kontak success created.');
				redirect('site/contact');				
			}
		}
		$data['pageTitle'] = 'Contact';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/site/front_contact', $data);
	}
}