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
		$data ="";
	$this->load->library('mypdf');

	$tcpdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
	$tcpdf->SetFont('freeserif', '', 14, '', true);
	$tcpdf->AddPage();
//$html = "<h1>Test Page พีดีเอฟ</h1>";
	$html = $this->load->view("transport/trans_pdf",$data,true);
$tcpdf->writeHTML($html, true, false, true, false, '');
$tcpdf->Output('example_001.pdf', 'I');
	}
}