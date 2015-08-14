<?php
class transport extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	function get_waste() {
		$data = array();

		$qt_id = $this->input->get("qt_id");
		$msg_id = $this->input->get("msg_id");
		$this->load->model("saleservice_model");
		$this->load->model("workflow_model");
		$this->load->model("transport_model");

		$data["msg"] = $this->workflow_model->getitem_msg($msg_id);
		$data["quotation"] = $this->saleservice_model->getitem_quotation($qt_id);
		$data["quotationdesc"] = $this->saleservice_model->getitem_quotationdesc($qt_id);
		$data["msgall"] = $this->workflow_model->get_msg($qt_id);

		$data["qtitem"] = $this->transport_model->get_qtitem($qt_id);
		$data["qt"] = $this->transport_model->get_qt($qt_id);
		$data["transitems"] = $this->transport_model->get_transitems($qt_id);		

		$this->load->view("main/header");
		$this->load->view("transport/get_waste",$data);
		$this->load->view("main/footer");
	}
	function add_trans(){
		$msg_id = $this->input->post("msg_id");
		$qt_id		= 		$this->input->post("qt_id");
		$trans_ID		= 		$this->input->post("trans_ID");
		$cpName		= 		$this->input->post("cpName");
		$cpAddress		= 		$this->input->post("cpAddress");
		$wastegen_id		= 		$this->input->post("wastegen_id");
		$wastetrans_id		= 		$this->input->post("wastetrans_id");
		$qtdesc_id1		= 		$this->input->post("qtdesc_id1");
		$qtdesc1		= 		$this->input->post("qtdesc1");
		$waste_id1		= 		$this->input->post("waste_id1");
		$qty1		= 		$this->input->post("qty1");
		$qty_stock1		= 		$this->input->post("qty_stock1");
		$qtdesc_id2		= 		$this->input->post("qtdesc_id2");
		$qtdesc2		= 		$this->input->post("qtdesc2");
		$waste_id2		= 		$this->input->post("waste_id2");
		$qty2		= 		$this->input->post("qty2");
		$qty_stock2		= 		$this->input->post("qty_stock2");
		$cptr_id		= 		$this->input->post("cptr_id");
		$cptr_name		= 		$this->input->post("cptr_name");
		$cptr_address		= 		$this->input->post("cptr_address");
		$cptr_sign		= 		$this->input->post("cptr_sign");

		$this->load->model("transport_model");
		$data=array(
			"qt_id"		=>		$qt_id,
			"trans_ID"		=>		$trans_ID,
			"cpName"		=>		$cpName,
			"cpAddress"		=>		$cpAddress,
			"wastegen_id"		=>		$wastegen_id,
			"wastetrans_id"		=>		$wastetrans_id,
			"qtdesc_id1"		=>		$qtdesc_id1,
			"qtdesc1"		=>		$qtdesc1,
			"waste_id1"		=>		$waste_id1,
			"qty1"		=>		$qty1,
			"qty_stock1"		=>		$qty_stock1,
			"qtdesc_id2"		=>		$qtdesc_id2,
			"qtdesc2"		=>		$qtdesc2,
			"waste_id2"		=>		$waste_id2,
			"qty2"		=>		$qty2,
			"qty_stock2"		=>		$qty_stock2,
			"cptr_id"		=>		$cptr_id,
			"cptr_name"		=>		$cptr_name,
			"cptr_address"		=>		$cptr_address,
			"cptr_sign"		=>		$cptr_sign,
		);
		$this->transport_model->new_transport($data);
		//echo $qt_id;
		//echo $msg_id;
		redirect("../transport/get_waste?qt_id=$qt_id&msg_id=$msg_id",'refresh');


	}
}












