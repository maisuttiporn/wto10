<style type="text/css">
@page{

	margin-top: 0px;
}
.span1 {
border-bottom: 1px dotted black;	
font-weight: bold;
}
.text1 {
	font-size: 15;
	font-weight: bold;
}
.text2 {
	font-size: 15;
}
.text2 p{
	font-size: 15;
}
.texttop{
	font-size: 10;
}
.textbody{
	font-size: 9;
}
.tbmain{
border: 2px solid black;
}
.tbbody{
border-left: 2px solid black;
border-bottom: 2px solid black;
border-right: 2px solid black;
}
.textbox1{
	font-size: 20;
}
</style>
<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td width="25%"><img width="120" src="<?=base_url()?>theme/img/logo-tmos.png" 
		alt="">
		<br>
		<strong>ที่ </strong> <?=$quotation->qt_id?></td>

		<td width="75%">
		<table cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td><h3 style="padding:0px;marsin:0px;font-weight: 900;">
				<strong>บริษัท ไทย โอนลี่ วัน แมนเนจ แอนด์ เซอร์วิส จำกัด</strong></h3></td>				
			</tr>
			<tr>
				<td><h3 style="padding:0px;marsin:0px;font-weight: 900;">
				<strong style="font-weight: 900;">THAI ONLY ONE MANAGE AND SERVICE CO.,LTD.</strong></h3></td>				
			</tr>
			<tr>
				<td><h3 style="padding:0px;marsin:0px;font-weight: 900;">
				<strong style="font-weight: 900;">หมู่ที่ 2 ตำบล เขาคันทรง อำเภอ ศรีราชา ชลบุรี 20110, TEL. 038-100770 FAX. 038-100770 </strong></h3></td>				
			</tr>
			<tr>
				<td align="right"><br><h4 style="padding:0px;marsin:0px;font-weight: 900;">
				<strong style="font-weight: 900;" class="text1"><?=thai_date(strtotime($quotation->DOC_DATETIME))?> </strong></h4></td>				
			</tr>
		</table>		
		</td>
	</tr>
	
	<tr>
		<td colspan="2"><strong class="text1">เรื่อง :</strong> <span class="text2"><?=$quotation->qt_title?></span></td>	
	</tr>
	<tr>
		<td colspan="2"><strong class="text1">เรียน :</strong> <span class="text2">คุณ<?=$quotation->qt_compcontact?></span></td>	
	</tr>
	<tr>
		<td colspan="2"><strong class="text1">บริษัท :</strong> <span class="text2">
		<?=$quotation->qt_compname?>
		</span></td>	
	</tr>
	
	<tr>
		<td colspan="2"><strong class="text1">ที่อยู่ :</strong> <span class="text2">
		<?=$quotation->qt_compaddr?>
		</span></td>	
	</tr>
	<tr>
		<td><strong class="text1">โทร :</strong> <span class="text2">
		<?=$quotation->qt_comptel?>
		</span></td>	
		<td><strong class="text1">โทรสาร :</strong> <span class="text2">
		<?=$quotation->qt_compfax?> <br>
		</span></td>	
	</tr>
	<tr>
		<td colspan="2"   border="0" style="font-size:18px;vertical-align:top;">
		<p align="left" class="text2" >
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			บริษัท ไทย โอนลี่ วัน แมนเนจ แอนด์ เซอร์วิส จำกัด ใคร่ขอนำเสนออัตราค่าบริการบำบัดและกำจัดกากอุตสาหกรรมของบริษัทท่านให้เป็นไปอย่างถูกต้องตามหลักวิชาการและสอดคล้องกับประกาศกระทรวงอุตสาหกรรมออกตามความในพระราชบัญญัติโรงงานพ.ศ.2535&nbsp;เรื่อง&nbsp;การกำจัดสิ่งปฏิกูลหรือวัสดุที่ไม่ใช้แล้ว ดังนี้
		</p>	
		</td>	
	</tr>
</table>
<table cellpadding="0" cellspacing="0" border="0" width="88%">
	<?php foreach ($quotationdesc as $row) :?>
	<tr>			
		<td class="text1" width="40%"><?=$row->qt_desc?></td>
		<td class="text1"></td>
		<td class="text1"></td>
		<td class="text1" align="right"><?=numformat($row->qt_price)?>/<?=$row->qt_unit?></td>
	</tr>
	<?php endforeach; ?>

	
</table>

<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
		<td class="text1" width="15%"><u>หมายเหตุ</u></td>
		<td width="85%">1.อัตราค่าบริการนี้ยังไม่รวมภาษีมูลค่าเพิ่ม <br>
			2.ชำระเงินภายใน 30 วันนับจากวันที่ ที่วางบิล<br>
			3.ชำระผ่านบัญชี บริษัท ไทย โอนลี่ วัน แมนเนจ แอนด์ เซอร์วิส จำกัด หรือ สั่งจ่ายเป็นเช็คเป็นชื่อ บริษัท ไทย โอนลี่ วัน เท่านั้น<br>
			4.ยืนยันอัตรค่าบริการและข้อเสนอ ภายใน 30 วัน<br>
			5.บริษัทฯ ยินดีประสานงานการขออนุญาตินำกากฯ ออกนอกบริเวณโรงงานตามกฎหใายจนแล้วเสร็จ<br>
			6.อัตราค่าบริการในใบเสนอราคานี้ คิดราคาการขนส่งที่น้ำหนัก 10 ตัน<br>
			7.บริษัทฯ ขอสงวนสิทธิ์ในการเปลี่ยนแปลงราคา กรณีน้ำมันดีเซลเกินลิตรละ 33 บาท<br>
			
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			จึงเรียนมาเพื่อโปรดพิจารณา และบริษัทฯ หวังเป็นอย่่างยิ่งว่าจะมีโอกาสให้บริการท่านในการกำจัดกากอุตสาหกรรมดังกล่าวข้างต้น
		</td>
	</tr>
	<tr>
		<td colspan="2">
			 จึงขอบคุณมา ณ โอกาสนี้ด้วย
			 <br>
		</td>
	</tr>
</table>

<table cellpadding="10" cellspacing="0" border="0" width="100%">
	<tr>
		<td class="text1" width="60%" border="1" align="center">
			<h3>บริษัท อาอิชิ อินเตอร์ เนชั่นแนล (ไทยแลนด์) จำกัด <br> 
			ยอมรับค่าบริการและเงื่อนไขดังกล่าวข้างต้น
			</h3>
			................................................................................
			(................................................................................)
			วัน........เดือน.....................พ.ศ..........
		</td>
		<td width="" align="center">
			<table>
				<tr>
					<td>
						<h3>ขอแสดงความนับถือ</h3>
					</td>
				</tr>
				<tr>
					<td>
						<br><br>
					</td>
				</tr>
				<tr>
					<td>
						<h3 style="margin-top:200px;">..................................................</h3>
					</td>
				</tr>
				<tr>
					<td><h3>(นายชัยวัฒน์  ศิริเมืองมูล)</h3></td>
				</tr>
				<tr>
					<td><h3>กรรมการผู้จัดการ</h3></td>
				</tr>
			</table>			
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<h4>ติดต่ออบถามข้อมูลเพิ่มเติม <br>
			ฝ่ายบริหารหารตลาด : คุณอดิศักดิ์ 089-2563512</h4>					
		</td>
	</tr>
</table>

<style>
	#TBInquiry1{
		border: solid 1px;
	}
	#TBInquiry1 td{
	text-align: center;
	padding:10px;
	background-color: #c0c0c0;
	}
	h4{
	
	}

</style>


