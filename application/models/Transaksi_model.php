<?php
class Transaksi_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function get($where = NULL){
		$this->db->select('transaksi_obat.*,pengguna.nama as pengguna,count(detail_transaksi.id_obat) as jml_obat,group_concat(obat.nama,": ",detail_transaksi.total) as detail_obat');
		$this->db->from('transaksi_obat');
		$this->db->join('pengguna','transaksi_obat.id_pengguna = pengguna.id_pengguna');
		$this->db->join('detail_transaksi','detail_transaksi.id_transaksi = transaksi_obat.id');
		$this->db->join('obat','detail_transaksi.id_obat = obat.id_obat');
		if($where != NULL){
			$this->db->where($where);
		}
		$this->db->group_by('id_transaksi');
		return $this->db->get();
	}
	function getDetail($where = NULL){
		$this->db->select('detail_transaksi.*,obat.nama as obat,obat.harga as harga_obat');
		$this->db->from('detail_transaksi');
		$this->db->join('obat','detail_transaksi.id_obat = obat.id_obat');
		if($where != NULL){
			$this->db->where($where);
		}
		$this->db->order_by('id_transaksi','ASC');
		return $this->db->get();
	}
	
	function add($data){
		$query = $this->db->insert('transaksi_obat', $data);
		return $query;
	}
	function addDetail($data){
		$query = $this->db->insert('detail_transaksi', $data);
		return $query;
	}
	function update($id, $data) {
        $this->db->where('kode_transaksi_obat',$id);
        return $this->db->update('transaksi_obat', $data);
    }
	function delete($id_transaksi_obat){
		$this->db->where('id_transaksi_obat', $id_transaksi_obat);
		return $this->db->delete('transaksi_obat');
	}
}