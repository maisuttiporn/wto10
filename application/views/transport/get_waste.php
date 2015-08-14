	<div class="row">
	<div class="span16">
		<div class="span16">
			<h3>Transport</h3>
			<hr>
		</div>
		<div class="span16">
			<h5>DOC ID. : <?= $quotation->DOC_ID?></h5>
			<h5>QT No. : <?= $quotation->qt_id?></h5>
			<h5>บริษัท : <span><?= $quotation->qt_compname?></span> </h5> 
			<h5>ผู้เสนอราคา : <span><?= $quotation->qt_createby?></span> </h5> 
		</div>
		<div class="span16">

			<table class="table">
				<thead>
					<th>#</th>
					<th width="60%">รายการสินค้าและบริการ</th>
					<th>จำนวณ</th>
					<th>หน่วย</th>
					<th>กำลังไปรับ</th>
					<th>รับแล้ว</th>	
					<th>คงเหลือ</th>	
					<th>#</th>		
				</thead>
				<?php $i=0; foreach($quotationdesc as $row) : $i++;?>
				<tr>
					<td><?=$i?></td>
					<td><?=$row->qt_desc?></td>
					<td><?=$row->qt_qty?></td>
					<td><?=$row->qt_unit?></td>
					<td>**.**</td>
					<td>**.**</td>
					<td>**.**</td>
					<td></td>
				</tr>
				<?php endforeach;?>
			</table>
		</div>
		<div class="span16" style="text-align:center;">
		<form id="xx" action="../transport/add_trans" method="post">
			<h4>การขนส่งรับของเสีย</h4>

			<?php $i=0; foreach($transitems as $row) : $i++;?>
			
			
			<table class="table">
				<thead>
					<td colspan="7">
						<strong><?=$row->trans_ID?></strong>						
						<strong><?=$row->DATETIME?></strong>
						<strong>
							<a href="../transport/trans_pdf" target="_blank" class="btn btn-success btn-mini">Print PDF</a>
						</strong>
					</td>
				</thead>
				<thead>
					<th><?=$i?># </th>
					
					<th>รหัสของเสีย</th>
					<th>ของเสีย</th>
					<th>จำนวณ</th>
					<th>รับแล้ว</th>						
					<th>#</th>		
				</thead>	
				<?php if($row->qtdesc_id1!="0") :?>			
				<tr>
					<td></td>
				
					<td><?=$row->waste_id1?></td>
					<td><?=$row->qtdesc1?></td>
					<td><?=$row->qty1?></td>
					<td></td>						
					<td></td>
				</tr>	
				<?php endif; ?>	
				<?php if($row->qtdesc_id2!="0") :?>
				<tr>
					<td></td>
				
					<td><?=$row->waste_id2?></td>
					<td><?=$row->qtdesc2?></td>
					<td><?=$row->qty2?></td>			
					<td></td>					
					<td></td>
				</tr>	
				<?php endif; ?>		
			</table>
			<?php endforeach;?>


			<div class="form-group" style="text-align:center;">
				<input type="text" class="form-control span3" 
				name="trans_ID"
				placeholder="เลขที่ใบขนย้าย">
				&nbsp;&nbsp;
				<input type="text" class="form-control span10" 
				value="<?=$qt->qt_compname?>"
				name="cpName"
				placeholder="ชื่อบริษัท">
							
			</div>
			<div class="form-group" style="text-align:center;">
				<input type="text" class="form-control span13" 
				name="cpAddress"
				value="<?=$qt->qt_compaddr?>" 
				placeholder="สถานที่เกิดของเสีย">		
			</div>
			<div class="form-group" style="text-align:center;">
				<input type="text" class="form-control" 
				name="wastegen_id"
				placeholder="เลขประจำตัวผู้กำเนินของเสีย">	
				<input type="text" class="form-control" 
				name="wastetrans_id"
				placeholder="เลขประจำตัวผู้ขนส่งของเสีย">				
			</div>	
			<div class="form-group" style="text-align:center;">
				<h5>ของเสีย 1</h5>
				<select name="qtdesc_id1" id="qtdesc_id1" class="form-control span7">
					<option value="0">เลือกของเสีย</option>
					<!-- loop for waste in qt-->
					<?php foreach($qtitem as $row) :?>
					<option value="<?=$row->ID?>"><?=$row->qt_desc?></option>
					<?php endforeach;?>
				</select>
				<input type="hidden" id="qtdesc1" name="qtdesc1">
				<input type="text" class="form-control" 
				name="waste_id1"
				placeholder="รหัสของเสีย">
				<input type="text" class="form-control" 
				name="qty1"
				placeholder="จำนวน">
			</div>
			
			<div class="form-group" style="text-align:center;">
				<h5>ของเสีย 2</h5>
				<select name="qtdesc_id2" id="qtdesc_id2" class="form-control span7">
					<option value="0">เลือกของเสีย</option>

					<!-- loop for waste in qt-->
					<?php foreach($qtitem as $row) :?>
					<option value="<?=$row->ID?>"><?=$row->qt_desc?></option>
					<?php endforeach;?>

				</select>
				<input type="hidden" id="qtdesc2" name="qtdesc2">
				<input type="text" class="form-control" 
				name="waste_id2"
				placeholder="รหัสของเสีย">
				<input type="text" class="form-control" 
				name="qty2"
				placeholder="จำนวน">
			</div>
			<div class="form-group">
				<h5>ผู้กำจัดของเสีย</h5>
				<input type="text" class="form-control span3" 
				name="cptr_id"
				value="D1W D 130900051"
				placeholder="เลขผู้กำจัดของเสีย">
				&nbsp;&nbsp;
				<input type="text" class="form-control span10" 
				name="cptr_name"
				value="บริษัท ไทย โอนลี่วัน แมเนจ แอนด์ เซอร์วิส จำกัด"
				placeholder="ชื่อบริษัทกำจัดของเสีย">
							
			</div>
			<div class="form-group">
				<input type="text" class="form-control span13" 
				name="cptr_address"
				value="หมู่ที่ 2 ตำบล เขาคันทรง อำเภอ ศรีราชา ชลบุรี 20110"
				placeholder="สถานที่กำจัดของเสีย">	
				<input type="text" class="form-control span13" 
				name="cptr_sign"
				value=""
				placeholder="ชื่อผู้รับกำจัด">	
			</div>

			<div class="form-group" style="text-align:center;">
				<input type="hidden" name="qt_id" value="<?=$_GET['qt_id']?>">
				<input type="hidden" name="msg_id" value="<?=$_GET['msg_id']?>">

				<button type="submit" name="submin" value="submit" style="width:150px;"   
	       		 class="btn btn-primary" value="CONFIRM"> เพิ่ม </button>
			</div>
			<hr>
		</div>
		<div class="span16" style="text-align:center;" >
			<div class="container">				
				<div class="form-group">
					
				</div>			
			</div>	
			<br>			
			
			<input  type="hidden" name="envAnalysis" value="">
		</div>
		<div class="span16" style="text-align:center;">
		<footer id="submit-actions" class="form-actions">
		
		<div class="form-group">
			<input type="hidden" name="userfrom_email" value="<?= $msg->userfrom_email?>">
			<input type="hidden" name="userfrom_name" value="<?= $msg->userfrom_name?>">
			<input type="hidden" name="userfrom_id" value="<?= $msg->userfrom_id?>">
			<input type="hidden" name="userfrom_usergroup_ID" value="<?= $msg->userfrom_usergroup_ID?>">
			<input type="hidden" name="qt_id" value="<?= $quotation->qt_id?>">
			<input type="hidden" name="DOC_ID" value="<?= $quotation->DOC_ID?>">
			<input type="hidden" name="qt_compname" value="<?= $quotation->qt_compname?>">
					
		</div>
	        <a href="../taskprocess" style="width:150px;"   
	        class="btn btn-danger btn-large" value="CONFIRM"> Back </a>
	    </form>
	    </footer>
		</div>
	</div>
	</div>
	
	<script type="text/javascript">
		$('#btnAdd').click(function(event) {
				var desAnalysis = $('#desAnalysis').val();
				var priceAnalysis = $('#priceAnalysis').val();
				var numrow = $('#tbChemicle tr').length;
				if(desAnalysis!="" && numrow <12 && priceAnalysis!="") {
					var tr = '<tr>';		
					tr+= '<td>'+desAnalysis +'</td>';
					tr+= '<td>'+priceAnalysis+'</td>';
					tr+= '<td><button onclick="return delTR(this)"';
					tr+= 'class="btn btn-danger btn-small">ลบ</button></td>';
					tr+= '</tr>';
					$('#tbChemicle').append(tr);		
				}
				$('#desAnalysis').val('');
				$('#priceAnalysis').val('');
			// 
			var env_obj =[];
			$('#tbChemicle tbody tr').each(function(i){
			 obj = {
				desc:$(this).find('td:eq(0)').html(),
				price:$(this).find('td:eq(1)').html()			
			};
			env_obj.push(obj);
			});	
			
			// Add to Session 
			$.ajax({
		 	method:'GET',
		 	data:{
		 		envAnalysis:1,
		 		env_obj: env_obj
		 		},
		 	url:'../envflow/sess_envAnalysis'
			}).done(function(data) {
			//console.log(data);
			});
		}); // btnAdd end
		$('#techreview_form').submit(function(event) {
			/*
			var app1 = $('#app1').attr("checked");
			var app2 = $('#app2').attr("checked");
			if(app1=='checked' || app2=='checked' ) {
				return true;
			} else {
				return false;
			} */
		}); 
		/* Number allow only*/
		$('#priceAnalysis').keypress(function(e) {
			//alert(e.which);
			 if( e.which!=8 && e.which!=46 && e.which!=0 && (e.which<48 || e.which>57)){
		    	return false;
		     }
		});
		function delTR(e){
			 $(e).parent().parent().remove();
			return false;
		}
		/*$('#btnSave').click(function(event) {
			
			$.get('../envflow/envreview_save',{
				cpName:'cpName',
				msg_body:'yyy'
			}).done(function(data) {
				alert(data);
			});
		});*/
		$('#qtdesc_id1').change(function(event) {
			var qtdesc = $('option:selected', this).text();
			$('#qtdesc1').val(qtdesc);
		});
		$('#qtdesc_id2').change(function(event) {
			var qtdesc = $('option:selected', this).text();
			$('#qtdesc2').val(qtdesc);
		});
	</script>










