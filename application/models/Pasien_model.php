<?php
class Pasien_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function get($where = NULL){
		$this->db->select('*');
		$this->db->from('pasien');
		if($where != NULL){
			$this->db->where($where);
		}
		$this->db->order_by('id_pasien','ASC');
		return $this->db->get();
	}
	function add($data){
		$query = $this->db->insert('pasien', $data);
		return $query;
	}
	function update($id, $data) {
        $this->db->where('id_pasien',$id);
        return $this->db->update('pasien', $data);
    }
	
	function delete($id_pasien){
		$this->db->where('id_pasien', $id_pasien);
        return $this->db->delete('pasien');
	}
}