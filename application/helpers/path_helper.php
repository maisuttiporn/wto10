<?php 
function theme_url(){
   return base_url().'theme/';
}
function master_url(){
   return base_url().'master/';
}
function main_url(){
   return base_url().'main/';
}
function adminsetting_url(){
   return base_url().'adminsetting/';
}
function saleservice_url(){
   return base_url().'saleservice/';
}


function thai_date($time){  
$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");  

$thai_month_arr=array(        
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
	
    //global $thai_day_arr,$thai_month_arr;  
    $thai_date_return="วัน".$thai_day_arr[date("w",$time)];  
    $thai_date_return.= "ที่ ".date("j",$time);
    $i = date("n",$time);
    $thai_date_return.=" เดือน". $thai_month_arr[$i];    
    $thai_date_return.= " พ.ศ.".(date("Yํ",$time)+543);  
    //$thai_date_return.= "  ".date("H:i",$time)." น.";  
    return $thai_date_return;  
} 

function numformat($value) {
	return number_format($value, 0, '.', ',');
}





