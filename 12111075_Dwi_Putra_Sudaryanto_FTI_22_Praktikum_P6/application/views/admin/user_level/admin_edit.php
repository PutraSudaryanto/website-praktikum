<?php 
	$data = array(
		$data['form_action'] = $form_action,
		$data['form_data'] = $form_data,
	);
	$this->load->view('/admin/user_level/_form', $data);
?>