<?php
class Product_category_model extends CI_Model{
	public $tableName = "Product_categories";
	public function __construct(){
		parent::__construct();
	}
	public function get_all($where = array(),$order = "id ASC"){
		$row= $this->db->where($where)->order_by($order)->get($this->tableName)->result();;
		foreach ($row as $v)
		{
			$v->title=str_replace(" ","&nbsp;",$v->title);
		}
		return $row;
	}
	public function add($data = array()){
		return $this->db->insert($this->tableName,$data);
	}
	public function get($where = array()){
		return $this->db->where($where)->get($this->tableName)->row();
	}


	public function get_sub(){
		return $this->db->where("ust_id >",0)->get($this->tableName)->result();
	}
	public function update($where = array(),$data = array()){
		return $this->db->where($where)->update($this->tableName,$data);
	}
	public function delete($where = array()){
		return $this->db->where($where)->delete($this->tableName);
	}
}