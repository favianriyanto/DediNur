<?php
class User_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function auth($username, $password, $where = NULL) {
		$this->db->select('*');
		$this->db->from('user_login');
		$this->db->where(array(
			'username' => $username,
			'password' => md5($password)
		));
		if($where != NULL){
			$this->db->where($where);
		}
		return $this->db->get()->row_array();
	}
	function addUserLogin($data){
		$query = $this->db->insert('user_login', $data);
		return $this->db->insert_id();
	}
	function updateUserLogin($id, $data) {
        $this->db->where('id',$id);
        return $this->db->update('user_login', $data);
    }
}