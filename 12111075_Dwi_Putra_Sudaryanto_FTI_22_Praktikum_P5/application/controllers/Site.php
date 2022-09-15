<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	function _template($view, $data=null)
	{
		$data['content'] = $this->load->view($view, $data, true);
		$this->load->view('layouts/front_default', $data);
	}

	//Home
	public function index()
	{
		$data['pageTitle'] = 'Home';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/site/front_index', $data);
	}

	//Contact
	public function contact()
	{
		$data['pageTitle'] = 'Contact';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/site/front_contact', $data);
	}

	//About
	public function about()
	{
		$data['pageTitle'] = 'About';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/site/front_about', $data);
	}
}
