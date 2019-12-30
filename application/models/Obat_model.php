<?php
class Obat_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function get($where = NULL){
		$this->db->select('obat.*,merek.nama as merek_nama');
		$this->db->from('obat');
		$this->db->join('merek','obat.merek = merek.id_merek');
		if($where != NULL){
			$this->db->where($where);
		}
		$this->db->order_by('id_obat','ASC');
		return $this->db->get();
	}
	
	function add($data){
		$query = $this->db->insert('obat', $data);
		return $query;
	}
	
	function update($id, $data) {
        $this->db->where('id_obat',$id);
        return $this->db->update('obat', $data);
    }
	
	function delete($id_obat){
		$this->db->where('id_obat', $id_obat);
		return $this->db->delete('obat');
	}
}