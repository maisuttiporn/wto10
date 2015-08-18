<?php
class test extends CI_Controller{
	function test1(){
		$this->load->model("workflow_model");

		$rows = $this->workflow_model->getenv();
		foreach($rows as $row) :
			echo $row->user_EMAIL;
		endforeach;
		
	}
	function testpdf() {

	}
	function testview() {
		$this->load->view("saleservice/quo_pdf");
	}
}