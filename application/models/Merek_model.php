<?php
class Merek_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function get($where = NULL){
		$this->db->select('*');
		$this->db->from('merek');
		if($where != NULL){
			$this->db->where($where);
		}
		$this->db->order_by('id_merek','ASC');
		return $this->db->get();
	}
	
	function add($data){
		$query = $this->db->insert('merek', $data);
		return $query;
	}
	
	function update($id, $data) {
        $this->db->where('id_merek',$id);
        return $this->db->update('merek', $data);
    }
	
	function delete($id_merek){
		$this->db->where('id_merek', $id_merek);
		return $this->db->delete('merek');
	}
}