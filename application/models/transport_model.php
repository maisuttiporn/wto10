<?php
class transport_model extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	
	function get_qtitem($qt_id){
		$this->db->select("*");
		$this->db->from("saleservice_quotationdesc");		
		$this->db->where("qt_id",$qt_id);
		return $query = $this->db->get()->result();
	}
	function get_qt($qt_id){
		$this->db->select("*");
		$this->db->from("saleservice_quotation");		
		$this->db->where("qt_id",$qt_id);
		return $query = $this->db->get()->row();
	}
	function new_transport($data){
		$this->db->insert('transport',$data);
		return;
    }
    function get_transitems($qt_id){
		$this->db->select("*");
		$this->db->from("transport");	
		$this->db->where("qt_id",$qt_id);
		return $query = $this->db->get()->result();
	}
}