	<div class="row">
	<div class="span16">
		<div class="span16">
			<h3>ENV Review</h3>
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
					<th>ราคา</th>
					<th>รวม</th>			
				</thead>
				<?php $i=0; foreach($quotationdesc as $row) : $i++;?>
				<tr>
					<td><?=$i?></td>
					<td><?=$row->qt_desc?></td>
					<td><?=$row->qt_qty?></td>
					<td><?=$row->qt_unit?></td>
					<td>**.**</td>
					<td>**.**</td>
				</tr>
				<?php endforeach;?>
			</table>
		</div>
		<div class="span16" >
		<form id="techreview_form" action="../envflow/envreview_save" method="post">
			<h4>การส่งวิเคราะห์</h4>
			<div class="form-group">
				<strong>ชื่อบริษัทผู้วิเคราะห์ของเสีย: </strong> <span><?=$envAnalysis->cpName?></span>
				<strong>ผู้ติดต่อ: </strong> <span>คุณ<?=$envAnalysis->cpContact?></span>
			</div>
			<div class="form-group">
				<strong>ที่อยู่: </strong> <span><?=$envAnalysis->cpAddress?></span>			
			</div>			
			<div class="form-group">
				<strong>โทร: </strong> <span><?=$envAnalysis->cpTel?></span>	
				<strong>อีเมล์: </strong> <span><?=$envAnalysis->cpEmail?></span>		
			</div>
			<hr>
		</div>
		<div class="span16" style="text-align:center;" >
			<div class="container">				
				<div class="form-group">
					
				</div>			
			</div>	
			<br>			
			<table align="center" class="table " id="tbChemicle" style="width:700px;">
				<thead>					
					<th>รายละอียด</th>
					<th>ราคา</th>
					<th width="20px"></th>
				</thead>
				<?php $total=0; foreach($envAnalysis_des as $row) : ?>
				<tr>
					<td><?=$row->desc?></td>
					<td><?=number_format($row->price, 2, '.', ',');?></td>
				</tr>
				<?php $total+=$row->price; endforeach;?>
				<tr>
					<td><h5>รวม</h5></td>
					<td><h5><?=number_format($total, 2, '.', ',')?></h5></td>
				</tr>
			</table>
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
	</script>










