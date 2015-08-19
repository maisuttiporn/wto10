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
	function testarr() {
		$thai_month_arr=array(  
		"0"=>"",  
		"1"=>"มกราคม",  
		"2"=>"กุมภาพันธ์",  
		"3"=>"มีนาคม",  
		"4"=>"เมษายน",  
		"5"=>"พฤษภาคม",  
		"6"=>"มิถุนายน",   
		"7"=>"กรกฎาคม",  
		"8"=>"สิงหาคม",  
		"9"=>"กันยายน",  
		"10"=>"ตุลาคม",  
		"11"=>"พฤศจิกายน",  
		"12"=>"ธันวาคม"                    
		); 
		$i=2;
		echo $thai_month_arr[$i];
	}
}