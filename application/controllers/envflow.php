<?php
class envflow extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	function envreview() {
	$data = array();

		$qt_id = $this->input->get("qt_id");
		$msg_id = $this->input->get("msg_id");
		$this->load->model("saleservice_model");
		$this->load->model("workflow_model");

		$data["msg"] = $this->workflow_model->getitem_msg($msg_id);
		$data["quotation"] = $this->saleservice_model->getitem_quotation($qt_id);
		$data["quotationdesc"] = $this->saleservice_model->getitem_quotationdesc($qt_id);
		$data["msgall"] = $this->workflow_model->get_msg($qt_id);
		

		$this->load->view("main/header");
		$this->load->view("envflow/envreview",$data);
		$this->load->view("main/footer");
	}
	function envread(){
		$read = $this->input->get("read");
		$ID = $this->input->get("ID");
		if(!empty($read)) {
			$this->load->model("envflow_model");
			$this->envflow_model->envread($ID);
		}
		redirect('taskprocess','refresh');
	}
	function envreview_save() {
		$data = array();
		if(!empty($_POST["submit"])) {
		$this->load->model("envflow_model"); // load model
		$this->load->model("sendmail_model");

		$mysess = $this->session->userdata('loggin_success');
		$user_FULLNAME = $mysess["user_FULLNAME"];	
		$user_EMAIL = $mysess["user_EMAIL"];		
		$user_ID = $mysess["user_ID"];
		$usergroup_ID = $mysess["usergroup_ID"];			
		
		$msg_body = $this->input->post("msg_body");
		$qt_id = $this->input->post("qt_id");
		$DOC_ID = $this->input->post("DOC_ID");
		$qt_compname = $this->input->post("qt_compname");
		
		$userto_email = $this->input->post("userfrom_email");
		$userto_name =  $this->input->post("userfrom_name");
		$userto_id =  $this->input->post("userfrom_id");		
		$userto_usergroup_ID =  $this->input->post("userfrom_usergroup_ID");	

		// ส่งให้ Sale และ MD
			$query = $this->envflow_model->envto_sale($qt_id);
			foreach($query as $row) {
				$data = array(
					"msg_body"		=>	$msg_body,
					"msg_type"		=>	"envanalysis",

					"userfrom_id"		=>	$user_ID,
					"userfrom_email"	=>	$user_EMAIL,
					"userfrom_name"	=>	$user_FULLNAME,
					"userfrom_usergroup_ID"	=>	$usergroup_ID,

					"userto_id"		=>	$row->userto_id,
					"userto_email"		=>	$row->userto_email,
					"userto_name"		=>	$row->userto_name,
					"userto_usergroup_ID"	=>	$row->userto_usergroup_ID,

					"REF1"			=> 	$qt_id,
					"REF2"			=>	$qt_compname
				);
			//echo $row->userto_email;
			$this->envflow_model->new_workflow($data);
			$this->sendmail_model->techreviewapp_mail($row->userto_email,
			$qt_id,$DOC_ID,$qt_compname,$user_FULLNAME);
			$this->sendmail_model->clearALLto();
			} // end foreach
			
			$data = array(
					"msg_body"		=>	$msg_body,
					"msg_type"		=>	"envanalysis",

					"userfrom_id"		=>	$user_ID,
					"userfrom_email"	=>	$user_EMAIL,
					"userfrom_name"	=>	$user_FULLNAME,
					"userfrom_usergroup_ID"	=>	$usergroup_ID,

					"userto_id"		=>	$userto_id,
					"userto_email"		=>	$userto_email,
					"userto_name"		=>	$userto_name,
					"userto_usergroup_ID"	=>	$userto_usergroup_ID,

					"REF1"			=> 	$qt_id,
					"REF2"			=>	$qt_compname
			);		
			//echo 	$userto_email;
			$this->envflow_model->new_workflow($data);
			$this->load->model("sendmail_model");
			$this->sendmail_model->techreviewapp_mail($userto_email,
			$qt_id,$DOC_ID,$qt_compname,$user_FULLNAME);	
			$this->sendmail_model->clearALLto();	
			
			// Analysis Submit
			$cpName = $this->input->post("cpName");	
			$cpContact = $this->input->post("cpContact");	
			$cpAddress = $this->input->post("cpAddress");	
			$cpTel = $this->input->post("cpTel");	
			$cpEmail = $this->input->post("cpEmail");
			
			$data = array(
				"qt_id" => $qt_id,
				"cpName" => $cpName,
				"cpContact" => $cpContact,
				"cpAddress" => $cpAddress,
				"cpTel" => $cpTel,
				"cpEmail" => $cpEmail,
				"createby"	=> $user_FULLNAME
			);
			$this->envflow_model->new_envAnalysis($data);			

			$sess_envAnalysis = $this->session->userdata("envAnalysis");
			if(!empty($sess_envAnalysis)) :		
			foreach($sess_envAnalysis as $sess_row) :
			$data = array(
				"qt_id" => $qt_id,
				"desc"	=>	$sess_row["desc"],
				"price"	=>	$sess_row["price"],				
				"createby"	=> $user_FULLNAME
			);
			$this->envflow_model->new_envAnalysis_des($data);
			endforeach;
			endif;		

			$data = array("msg_status"=>"done");
			$this->db->where("msg_type","envreview");
			$this->db->where("REF1",$qt_id);
			$this->db->update("workflow",$data);



			/* examle session  
			$sess_wastecomponent = $this->session->userdata("wastecomponent");
			if(!empty($sess_wastecomponent)) :		
			foreach($sess_wastecomponent as $row) : */
			$this->session->unset_userdata("envAnalysis");
			redirect('../taskprocess','refresh');
		} // if POST
	}
	function sess_envAnalysis() {
		if(isset($_GET["envAnalysis"])) :
			//echo json_encode($_GET["Objcomp"]);
			$sess_wastecomponent = $_GET["env_obj"];
			$this->session->set_userdata("envAnalysis",$sess_wastecomponent);
		endif;
	}
	function envprice() {
		$data = array();
		$qt_id = $this->input->get("qt_id");
		$msg_id = $this->input->get("msg_id");
		$this->load->model("saleservice_model");
		$this->load->model("workflow_model");
		$this->load->model("envflow_model");

		$data["msg"] = $this->workflow_model->getitem_msg($msg_id);
		$data["quotation"] = $this->saleservice_model->getitem_quotation($qt_id);
		$data["quotationdesc"] = $this->saleservice_model->getitem_quotationdesc($qt_id);
		$data["msgall"] = $this->workflow_model->get_msg($qt_id);
		$data["envAnalysis"] = $this->envflow_model->get_envAnalysis($qt_id);
		$data["envAnalysis_des"] = $this->envflow_model->get_envAnalysis_des($qt_id);

		$this->load->view("main/header");
		$this->load->view("envflow/envprice",$data);
		$this->load->view("main/footer");
	}


}


























