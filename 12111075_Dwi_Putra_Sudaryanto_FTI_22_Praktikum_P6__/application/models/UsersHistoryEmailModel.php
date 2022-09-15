<?php
class UsersHistoryEmailModel extends CI_Model 
{
	var $_table;
        
	function __construct()
	{
		parent::__construct();
		$this->_table = '12111075_user_history_email';
	}
	
	function findAll($condition=null, $limit=null, $offset=null)
	{
		if($condition == null) {
			//primary key
			$this->db->order_by('id', 'desc');
			
		} else {
			if(!empty($condition['select']))
				$this->db->select($condition['select']);
			if(!empty($condition['condition']))
				$this->db->where($condition['condition']);
			//primary key
			if(empty($condition['order']))
				$this->db->order_by('id', 'desc'); 
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
			$this->db->order_by('id', 'desc'); 
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
		$this->db->where('id', $id);
		$model = $this->db->get($this->_table);
		return $model->row();
	}
	
	function count_all()
	{
		$model = $this->db->count_all($this->_table);
		return $model;
	}
	
}
?>