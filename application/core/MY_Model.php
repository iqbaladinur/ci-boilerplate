<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * codeigniter base model 
 */
class MY_Model extends CI_Model{
	protected $_table;
	protected $_primaryKey;
	public function __construct($table, $primaryKey){
		parent::__construct();
		$this->load->database();
		$this->setProperty($table, $primaryKey);
	}

	private function setProperty($table, $primaryKey){
		$this->_table = $table;
		$this->_primaryKey = $primaryKey;
	}
	
	public function getAllData(){
		return $this->db->get($this->_table)->result(); 	
	}
	/**
	 *@param ($sort) array('attr', 'ASC') 
	 */
	public function getAllDataPaged($limit, $offset, $sortBy = array()){
		if(!empty($sortBy))
			$this->db->order_by($sortBy[0], $sortBy[1]);
		$this->db->get($this->_table, $limit, $offset);
		return $this->db->result();
	}

	public function getByPrimaryKey($primaryKey = null){
		return $this->db->get_where($this->_table, array($this->_primaryKey => $primaryKey))->result();	
	}

	public function getBy($attr, $value){
		return  $this->db->get_where($this->_table, array($attr => $value))->result();
	}

	/**
	 * @param $matchValue = array('title'=>'match', 'title'=>'match')  
	 */
	public function find($matchValue = array()){
		return $this->db->get($this->_table)->like($matchValue)->result();
	}

	public function insertData($data = array()){
		$this->db->insert($this->_table, $data);
		return ($this->db->affected_rows() > 0) ? true : false;
	}

	public function updateData($primaryKeyValue, $data = array()){
		$this->db->where($this->_primaryKey, $primaryKeyValue);
		$this->db->update($this->_table, $data);
		return ($this->db->affected_rows() > 0) ? true : false;
	}

	public function deleteData($primaryKey, $chainTables = null){
		$this->db->delete(is_null($chainTables)?$this->_table:$chainTables, array($this->_primaryKey => $primaryKey)); 
	}
}
