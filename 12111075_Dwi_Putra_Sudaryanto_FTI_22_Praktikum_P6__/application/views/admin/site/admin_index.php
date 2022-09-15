<?php 
$session_data = $this->session->userdata('logged_in');
$username = $session_data['username'];
echo $username;
?>