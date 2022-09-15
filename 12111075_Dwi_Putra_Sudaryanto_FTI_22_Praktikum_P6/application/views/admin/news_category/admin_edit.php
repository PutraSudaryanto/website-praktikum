<?php 
	$data = array(
		$data['form_action'] = $form_action,
		$data['form_data'] = $form_data,
		$data['form_category'] = $form_category,
	);
	$this->load->view('/admin/news_category/_form', $data);
?>