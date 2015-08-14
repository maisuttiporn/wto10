<?php
class envflow_model extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	function envread($ID) {
		$data = array(
			'REF3' => 'read'
		);
		$this->db->where('ID',$ID);	
    		$this->db->update('workflow',$data);
	}
	function new_workflow($data){
		$this->db->insert('workflow',$data);
		return;
    }
    function envto_sale($qt_id){
    	$this->db->select("*");
		$this->db->from("workflow");		
		$this->db->where("REF1",$qt_id);
		$this->db->where("msg_type","mdprove");
		$this->db->where("msg_approve","yes");
		return $query = $this->db->get()->result();
    }
    function get_envanAlysis($qt_id){
    	$this->db->select("*");
		$this->db->from("envAnalysis");		
		$this->db->where("qt_id",$qt_id);
		return $query = $this->db->get()->row();
    }
    function get_envanAlysis_des($qt_id){
    	$this->db->select("*");
		$this->db->from("envAnalysis_des");		
		$this->db->where("qt_id",$qt_id);
		return $query = $this->db->get()->result();
    }
    function new_envAnalysis($data){
		$this->db->insert('envAnalysis',$data);
		return;
    }
    function new_envAnalysis_des($data){
		$this->db->insert('envAnalysis_des',$data);
		return;
    }
}


    