<?php
class UsersModel extends CI_Model 
{
	var $_table;
        
	function __construct()
	{
		parent::__construct();
		$this->_table = '12111075_users';
	}
	
	function findAll($condition=null, $limit=null, $offset=null)
	{
		if($condition == null) {
			//primary key
			$this->db->order_by('user_id', 'desc');
			
		} else {
			if(!empty($condition['select']))
				$this->db->select($condition['select']);
			if(!empty($condition['condition']))
				$this->db->where($condition['condition']);
			//primary key
			if(empty($condition['order']))
				$this->db->order_by('user_id', 'desc'); 
			else {
				foreach($condition['order'] as $key => $val)
					$this->db->order_by($key, strtolower($val)); 
			}
			if(!empty($condition['like']))
				$this->db->like($condition['like']); 
		}
		if($this->uri->segment(3) == 'manage' && $this->uri->segment(4) == null) {
			$this->db->limit($limit, $offset);
		} else {
			if($limit != null && $offset != null)
				$this->db->limit($limit, $offset);
		}
			
		$model = $this->db->get($this->_table);
		return $model->result();
	}
	
	function find($condition=null)
	{
		if(!empty($condition['select']))
			$this->db->select($condition['select']);
		if(!empty($condition['condition']))
			$this->db->where($condition['condition']);
		//primary key
		if(empty($condition['order']))
			$this->db->order_by('user_id', 'desc'); 
		else {
			foreach($condition['order'] as $key => $val)
				$this->db->order_by($key, strtolower($val)); 
		}
		$this->db->limit(1);
		$model = $this->db->get($this->_table);
		return $model->row();
	}
	
	function findByPk($id, $condition=null)
	{
		if(!empty($condition['select']))
			$this->db->select($condition['select']);
		//primary key
		$this->db->where('user_id', $id);
		$model = $this->db->get($this->_table);
		return $model->row();
	}
	
	function count_all()
	{
		$model = $this->db->count_all($this->_table);
		return $model;
	}
	
	function insertData()
	{
		$data = $_POST['Model'];
		if($_POST['password'] != '') {
			$salt = $data['salt'] = $this->getUniqueCode();
			$data['password'] = $this->hashPassword($salt, $_POST['password']);
		}
		return $this->db->insert($this->_table, $data);
	}
	
	function updateByPk($id, $attr)
	{
		if(!empty($attr)) {
			foreach($attr as $key => $val)
				$data[$key] = $val;
		} else {
			$data = $_POST['Model'];
			if($_POST['password'] != '') {
				$salt = $this->findByPk($id)->salt;
				$data['password'] = $this->hashPassword($salt, $_POST['password']);
			}
		}
		//primary key
		$this->db->where('user_id', $id);
		return $this->db->update($this->_table, $data);
	}
	
	function deleteByPk($id)
	{
		//primary key
		$this->db->where('user_id', $id);
		return $this->db->delete($this->_table);
	}
	
	/* Other Function */
	function getUniqueCode() {
		$chars = "abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		srand((double)microtime()*1000000);
		$i = 0;
		$salt = '' ;

		while ($i <= 15) {
			$num = rand() % 33;
			$tmp = substr($chars, $num, 2);
			$salt = $salt . $tmp; 
			$i++;
		}

		return $salt;
	}
	
	function hashPassword($salt, $password)
	{
		return md5($salt.$password);
	}
	
	function login($email, $password) 
	{
		$user = $this->find(array(
			'select' => 'user_id, email, salt',
			'condition' => array(
				'email' => $email,
			),
		));
		if($user != null) {
			$model = $this->find(array(
				//'select' => 'publish',
				'condition' => array(
					'email' => $user->email,
					'password' => $this->hashPassword($user->salt.$password),
				),
			));
			if($model != null) {
				return $model;
			} else {
				return false;
			}		
		} else {
			return false;
		}
	}
	
}
?>