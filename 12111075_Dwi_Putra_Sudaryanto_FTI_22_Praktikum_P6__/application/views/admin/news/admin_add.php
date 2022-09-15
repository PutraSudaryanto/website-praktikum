<?php 
	$data = array(
		$data['form_action'] = $form_action,
		$data['form_category'] = $form_category,
	);
	$this->load->view('/admin/news/_form', $data);
?>