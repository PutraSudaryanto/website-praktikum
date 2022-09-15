<?php 
	$data = array(
		$data['form_action'] = $form_action,
		$data['form_level'] = $form_level,
	);
	$this->load->view('/admin/users/_form', $data);
?>