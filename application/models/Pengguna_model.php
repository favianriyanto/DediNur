<?php
class Pengguna_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function get($where = NULL){
		$this->db->select('*');
		$this->db->from('pengguna');
        $this->db->join('user_login', 'pengguna.user_login_id = user_login.id');
		if($where != NULL){
			$this->db->where($where);
		}
		$this->db->order_by('id_pengguna','ASC');
		return $this->db->get();
    }
    function isPasswordAdmin($pass, $id){
        $this->db->where(array('password = '=> $pass,'role = '=> 1));
        $result = $this->db->get('user_login')->row_array();
        return $result;
    }
	function add($data){
		$query = $this->db->insert('pengguna', $data);
		return $query;
	}
    function changePass($where, $data) {
        $this->db->where($where);
        return $this->db->update('user_login', $data);
    }
	function update($id, $data) {
        $this->db->where('id_pengguna',$id);
        return $this->db->update('pengguna', $data);
    }
	function delete($id_pengguna){
		$this->db->where('user_login_id', $id_pengguna);
		$this->db->delete('pengguna');
		$this->db->where('id', $id_pengguna);
		return $this->db->delete('user_login');
	}
}