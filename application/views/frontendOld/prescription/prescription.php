<script type="text/javascript">
$(document).ready(function(){
	$(".search_keyword").keyup(function() 
	{ 
		var search_keyword_value = $(this).val();
		var dataString = 'search_keyword='+ search_keyword_value;
		
		if(search_keyword_value!='')
		{
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('index/autocomplete');?>",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$("#result").html(html).show();
				}
			});
		}
		return false;    
	});
});



$(document).ready(function(){
	$("#prescription").click(function(){
		$("#prescriptionData").css('display','inline');
		$("#customPresData").css('display','none');
		$("#patient_historyData").css('display','none');
		$("#treatment_historyData").css('display','none');
		$(this).addClass("active");
		$("#patient_history" ).removeClass("active");
		$("#treatment_history" ).removeClass("active");
	});
	$("#patient_history").click(function(){
		$("#prescriptionData").css('display','none');
		$("#customPresData").css('display','none');
		$("#patient_historyData").css('display','inline');
		$("#treatment_historyData").css('display','none');

		$(this).addClass("active");
		$("#prescription" ).removeClass("active");
		$("#treatment_history" ).removeClass("active");
	});
	$("#treatment_history").click(function(){
		$("#prescriptionData").css('display','none');
		$("#customPresData").css('display','none');
		$("#patient_historyData").css('display','none');
		$("#treatment_historyData").css('display','inline');
		$(this).addClass("active");
		$("#patient_history" ).removeClass("active");
		$("#prescription" ).removeClass("active");
	});
	$("#customPres").click(function(){
		$("#customPresData").css('display','inline');
		$("#prescriptionData").css('display','none');
		$("#patient_historyData").css('display','none');
		$("#treatment_historyData").css('display','none');
		//$(this).addClass("active");
		$("#patient_history" ).removeClass("active");
		$("#prescription" ).removeClass("active");
		$("#treatment_history" ).removeClass("active");
	});
});



function getresultdata(id){
	var listval = document.getElementById('listitem'+id).innerHTML;
	document.getElementById('drug').value = listval;
	document.getElementById('result').style.display = 'none';
}
</script>

<style>
#prescripttionTab .nav-pills > li > a {
  border-radius: 4px 4px 0 0 ;
   font-size:16px;
}

#prescripttionTab .tab-content {
  background-color: #fff;
  padding : 5px 15px;
}






</style>

<div class="row">
    <div class="right_col" role="main">
    <div class="">
    
    <div class="page-title">
    
    <div class="col-md-12 col-sm-12 col-lg-12" style="margin:0; padding:0; margin-top:5px;">
    
    
   <?php /*?> <div class="col-sm-12 col-md-3 col-lg-4 col-lg-offset-4">
    <?php echo form_open('','style="float:left; width:100%"');?>
        <select name="patient_id" class="form-control" style="width:81%; float:left">
        <option value="">Patient Id</option>
        <?php
        $patientTable = $this->Index_model->getAllItemTable('registration','','','','','id','desc');
        foreach($patientTable->result() as $pat){
        $patient_id = $pat->patient_id;
        ?>
        <option value="<?php echo $pat->patient_id;?>"><?php echo $patient_id;?></option>
        <?php
        }
        ?>
    </select>
         <input class="btn btn-primary" value="Go"  type="submit">
    <?php echo form_close();?>
    </div>
    <?php */?>
    
    <div class="col-sm-12 col-md-3 col-lg-1 col-lg-offset-2 pull-right">
    
         <input class="btn btn-primary" value="Print"  type="button" id="save">
    </div>
    
    </div>
    
    </div>
    <div class="clearfix"></div>
    <div class="row">
    
    <div class="x_panel">
    <div class="x_content">
    <div class="container">
        <div class="col-md-12 col-sm-12 col-lg-12" style="margin:0; padding:0">
            <div id="prescripttionTab" class="container">	
            		<ul  class="nav nav-pills" style="border-bottom:5px solid #1A82C3">
                        <li class="active" id="prescription"><a  href="javascript:void();">Prescription</a></li>
                        <li id="patient_history"><a href="javascript:void();" >Patient History</a></li>
                        <li id="treatment_history"><a href="javascript:void();">Treatment History</a></li>
                         <li id="customPres" style="float:right; text-align:right; background:#F0AD4E;">
                        <a href="javascript:void();" style="color:#fff">Custom Prescription</a></li>
                    </ul>
            
                        <div class="tab-content clearfix">
                           			 <div id="prescriptionData">
                          	<div class="col-sm-12" style="border-bottom:1px solid #ccc; margin-bottom:20px;">
                                <div class="col-sm-3"><h4>Patient Name: <?php echo $pinfo['patient_name'];?></h4></div>
                                <div class="col-sm-2"><h4>Patient ID: <?php echo $pinfo['patient_id'];?></h4></div>
                                <div class="col-sm-2"><h4>Patient Age : <?php echo $pinfo['age'];?></h4></div>
                                <div class="col-sm-2"><h4>Sex: <?php echo $pinfo['gender'];?></h4></div>
                                <div class="col-sm-3"><h4>Contact: <?php echo $pinfo['phone'];?></h4></div>
                            </div>
      					    <div class="col-sm-12">
                                <div style="min-height:500px; overflow:auto; overflow-x:hidden; margin-bottom:5px;">
                                <div style="border:1px solid #ccc; min-height:150px; margin-bottom:5px;">
                                  <h4 style="background:#2A3F54; margin:0; padding:5px; color:#fff; text-align:center">Prescription</h4>
                                   <div class="col-sm-12 col-md-3 col-lg-4">
                                   <!-- <select name="medicine_cat" id="medicine_cat" class="form-control" style="margin:5px">
                                        <option value="">--- Drug Category ---</option>
                                        <option value="Tablate">Tablate</option>
                                        <option value="Syrup">Syrup</option>
                                    </select>-->
                                    
                                    
                                   <select name="medicine_cat" id="cat" class="form-control" style="margin:5px">
										<?php
											//$cat_selector = "";
											foreach($drug_cate->result() as $val){
												echo $cat_selector = "<option value ='".$val->cata_name."'>".$val->cata_name."</option>";	
											}
										?>
									</select>
									<!--<script>
										var cat_selector = '<?php //echo $cat_selector; ?>';
									</script>-->
                                    
                                   </div>
                                   <div class="col-sm-12 col-md-3 col-lg-4">
                                     <input type="text" name="drug" id="drug" class="form-control search_keyword" style="margin:5px"/>
                                    <div id="result"></div>
                                                                    
                                   </div>
                                  
                                   <div class="col-sm-12 col-md-3 col-lg-3">
                                   
                                    
                                    <select name="medicine" id="meal" class="form-control" style="margin:5px">
										<?php
                                        $meal_selector = "";
                                        $meal_selector .= '<option value="">----Meal----</option>';
                                        $meal_selector .= '<option value="Before Meal">Before Meal</option>';
                                        $meal_selector .= '<option value="After Meal">After Meal</option>';
										echo $meal_selector;
                                    ?>
								</select>
								<!--<script>
								var meal_selector = '<?php //echo $meal_selector; ?>';
								</script>-->
                                   </div>
                                   <div class="col-sm-12 col-md-3 col-lg-4">
                                  
                                    
                                <select name="dose" id="dose" class="form-control" style="margin:5px">
								<?php
									$dose_selector = "";
									$dose_selector .= '<option value="">----Dose----</option>';
									$dose_selector .= '<option value="1+1+1">1+1+1</option>';
									$dose_selector .= '<option value="1+1+0">1+1+0</option>';
									$dose_selector .= '<option value="1+0+1">1+0+1</option>';
									$dose_selector .= '<option value="0+1+1">0+1+1</option>';
									$dose_selector .= '<option value="1+0+1">1+0+1</option>';
									$dose_selector .= '<option value="0+1+0">0+1+0</option>';
									$dose_selector .= '<option value="0+0+1">0+0+1</option>';
									$dose_selector .= '<option value="1+0+0">1+0+0</option>';
									
									$dose_selector .= '<option value="&frac12;+0+&frac12;">0+0+&frac12;</option>';
									$dose_selector .= '<option value="&frac12;+0+&frac12;">&frac12;+0+0</option>';
									$dose_selector .= '<option value="&frac12;+0+&frac12;">0+&frac12;+0</option>';
									$dose_selector .= '<option value="&frac12;+0+&frac12;">&frac12;+&frac12;+0</option>';
									$dose_selector .= '<option value="&frac12;+0+&frac12;">&frac12;+0+&frac12;</option>';
									$dose_selector .= '<option value="0+&frac12;+&frac12;">0+&frac12;+&frac12;</option>';
									$dose_selector .= '<option value="&frac12;+0+0">&frac12;+0+0</option>';
									$dose_selector .= '<option value="&frac12;+&frac12;+&frac12;">&frac12;+&frac12;+&frac12;</option>';
								
									echo $dose_selector;
								
								?>
								</select>
								<!--<script>
								var dose_selector = '<?php //echo "$dose_selector"; ?>';
								</script>-->
                                   </div>
                                   <div class="col-sm-12 col-md-3 col-lg-4">
                                    
                                     <select name="gap" id="gap" class="form-control" style="margin:5px">
										<?php
											//$gap_selector = "";
											foreach($gap_list->result() as $val){
												echo $gap_selector = "<option value ='".$val->day_gap."'>".$val->day_gap."</option>";	
											}
										?>
									</select>
									<!--<script>
										var gap_selector = '<?php e//cho $gap_selector; ?>';
									</script>-->
                                   </div>
                                   <div class="col-sm-12 col-md-3 col-lg-3">
                                                                       
                                     <select name="duration" id="duration" class="form-control" style="margin:5px">
										<?php
											//$duration_selector = "";
											foreach($duration_list->result() as $val){
												echo $duration_selector = "<option value ='".$val->duration."'>".$val->duration."</option>";	
											}
										?>
									</select>
									<!--<script>
										var duration_selector = '<?php e//cho $duration_selector; ?>';
									</script>-->
                                   </div>
                                   <div class="col-lg-1">
                                   <input type="button" id="enter" name="enter" onclick="sendMsg()" value="Enter"  class="btn btn-primary" style="margin-top:6px;"/></div>
                                </div>
                                <div style="border:1px solid #ccc; min-height:500px; overflow:auto; overflow-x:hidden; margin-bottom:5px;">  
                                  <h4 style="background:#2A3F54; margin:0; padding:5px; color:#fff; text-align:center">Drug Details</h4>
                                  <div style="padding:5px; width:100%; float:left">
                                                        <table border="0" cellspacing="0" width="100%">
                                                          <tbody>
                                                           <tr>
								<td colspan="3" style="padding-left:35px;" valign="top" id='mainContainer'>
								<!-- dummy work -->
								<?php
								/*$sql = "SELECT * FROM prescription WHERE patient_id='".$pinfo['patient_id']."'";
								$rec = $this->db->query($sql);
								foreach($rec->result() as $row ){
								
									$cat = $row->cat;
									$drug = $row->drug;
									$dose = $row->dose;
									$gap = $row->gap;
									$meal = $row->meal;
									$duration = $row->duration;*/
									?>							
								<div class="row_count" style="display:none">
								<div class="item">
                                <table border="0" cellspacing="0" width="100%" style="text-align:left; font:10pt Arial, Helvetica, sans-serif;">
									<!--<tr>
										<td colspan="4" class="cat"><?php //echo $cat; ?></td>
									</tr>
									<tr>
										<td colspan="4" class="drug"><?php //echo $drug; ?></td>
									</tr>-->
									<tr>
                                    	<td class="cat"><?php //echo $cat; ?></td>
                                        <td class="drug"><?php //echo $drug; ?></td>
										<td class="dose"><?php //echo $dose; ?></td>
										<td class="gap"><?php //echo $gap; ?></td>
										<td class="meal"><?php //echo $meal; ?></td>
										<td class="duration"><?php //echo $duration; ?></td>
									<td width="30"><a href="javascript://" class="close btn btn-default"  style="background:#CC0000; color:#FFFFFF; font-size:13px; opacity:1">
                                    Remove</a></td></tr>
								</table>
								</div>
								<div style="display:none">
									<table border="0" cellspacing="0" width="500" style="text-align:left; font:10pt Arial, Helvetica, sans-serif;">
										<tr>
											<td colspan="4"><select class="sel_cat"><?php //echo $cat_selector; ?></select></td>
										</tr>
										<tr>
											<td colspan="4"><select class="sel_drug"><?php //echo $drug_selector; ?></select></td>
										</tr>
										<tr>
											<td width="40"></td>
											<td><select class="sel_dose"><?php //echo $dose_selector; ?></select></td>
											<td><select class="sel_gap"><?php //echo $gap_selector; ?></select></td>
											<td><select class="sel_meal"><?php //echo $meal_selector; ?></select></td>
											<td><select class="sel_duration"><?php //echo $duration_selector; ?></select></td>
										<td width="30"><a href="javascript://" class="ok">OK</a></td></tr>
									</table>
									<!--<script>
										$(".sel_cat").val('<?php echo $cat; ?>');
										$(".sel_drug").val('<?php echo $drug; ?>');
										$(".sel_dose").val('<?php echo $dose; ?>');
										$(".sel_gap").val('<?php echo $gap; ?>');
										$(".sel_meal").val('<?php echo $meal; ?>');
										$(".sel_duration").val('<?php echo $duration; ?>');
									</script>-->
								</div><br>
								</div>	
								<?php
								//}
								?>
	
								<!-- dummy work -->
								</td>
							</tr>
                                                        </tbody>
                                                      </table>
                                                        
                                                        
                                                        
                                                        
                            
                                          </div>
                                  </div>    
                                    
                            </div>
                            </div>
                          
                          </div>
                            <div id="patient_historyData" style="display:none">
                      			<div class="col-sm-12">
                                
                                <div class="col-sm-6">
                                	<div style="border:1px solid #ccc; min-height:150px; overflow:auto; overflow-x:hidden; margin-bottom:5px;">
                                    <h4 style="background:#2A3F54; margin:0; padding:5px; color:#fff; text-align:center">Cheif Complaints</h4>
                                    <div style="padding:5px;">
                                       <?php echo $departinfo['cheif_complaints'];?>
                                    </div>
                                    </div>
                                </div>
            					<div class="col-sm-6">
                                	<div style="border:1px solid #ccc; min-height:150px; overflow:auto; overflow-x:hidden; margin-bottom:5px;" >
                <h4 style="background:#2A3F54; margin:0; padding:5px; color:#fff; text-align:center">History </h4>
                 <div style="padding:5px;">
                   <?php if($departinfo['history']!="") echo $departinfo['history'];?><br />
                </div>
                </div>
                                </div>
                				<div class="col-sm-6">
                                	<div style="border:1px solid #ccc; min-height:150px; overflow:auto; overflow-x:hidden; margin-bottom:5px;">
               <h4 style="background:#2A3F54; margin:0; padding:5px; color:#fff; text-align:center">Examination findings</h4>
               <div style="padding:5px;">
                       <?php if($departinfo['exam_finding']!="") echo $departinfo['exam_finding'];?><br />
                       
                </div>
               
               </div>
                                </div>
                                
                                <div class="col-sm-6">
                                	<div style="border:1px solid #ccc; min-height:150px; overflow:auto; overflow-x:hidden; margin-bottom:5px;">
                <h4 style="background:#2A3F54; margin:0; padding:5px; color:#fff; text-align:center">Clinical diagnosis</h4>
                    <div style="padding:5px;">
                       <?php if($departinfo['diagnosis']!="") echo $departinfo['diagnosis'];?><br />
                      
                </div>
                </div>
                                </div>
                                
                                <div class="col-sm-12">
                                	<div style="border:1px solid #ccc; min-height:150px; overflow:auto; overflow-x:hidden; margin-bottom:5px;">
                                        <h4 style="background:#2A3F54; margin:0; padding:5px; color:#fff; text-align:center">Investigation Suggested</h4>
                                            <div style="padding:5px;">
                                             
                                               <?php if($departinfo['invest_req']!="") echo $departinfo['invest_req'];?><br />
                                        </div>
                                        </div>
                                </div>
            			</div>
                            </div>
                            <div id="treatment_historyData" style="display:none">
                              <h3>Treatment History is Under Construction...</h3>
                            </div>
                            <div id="customPresData" style="display:none">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="col-sm-1" style="margin:0;  padding:0"><label class="control-label">Prescription</label></div>
                                            <div class="col-sm-11">
                                                <textarea class="form-control" name="pres_cudtom" rows="10" cols="60" id="pres_cudtom"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-10">
                                                <input type="button" name="submit" value="Submit" class="btn btn-success" 
                                                style="margin-top:10px;" onclick="customMsg();" />
                                            </div>
                                        </div>
                                    </div>
                           </div>
                      
                        </div>
              </div>
        
        </div>
        
    </div>
    </div>
    </div>
    
    </div>
</div>


<style type="text/css">
	#result
	{
		position:absolute;
		width:300px;
		display:none;
		margin-top:-1px;
		border-top:0px;
		overflow:hidden;
		border:1px #CDCDCD solid;
		background-color: white;
		z-index:1000000;
	}
	#result ul
	{
		display:block;
		padding:0;
		margin:0;
	}
	#result li
	{
		display:block;
		padding:5px;
		cursor:pointer;
		font-family:tahoma;
		padding:10px; 
		border-bottom:1px #CDCDCD dashed;
		font-size:15px; 
		margin:2px 0;
	}
	#result li:hover
	{
		background:#364956;
		color:#FFF;
	}
	.show
	{
		font-family:tahoma;
		padding:10px; 
		border-bottom:1px #CDCDCD dashed;
		font-size:15px; 
	}
	.show:hover
	{
		background:#364956;
		color:#FFF;
		cursor:pointer;
	}
</style>




<script type="text/javascript">

function customMsg()
{
	var customdetails = document.getElementById('pres_cudtom').value;
	//alert(customdetails);
	$.ajax({
		type: "POST",
		url: "<?php echo base_url('index/prescription_ajax');?>",
		data: {action:'custom_save', cdetails:customdetails,pid:'<?php echo $pinfo['patient_id']; ?>'},
		success: function(mssg){
			window.open(mssg, '_blank', 'height=900,width=1200,scrollbars=yes,toolbar=0,location=0,menubar=0');
		}
	});
	
}
function sendMsg()
{
	var cat = document.getElementById('cat').value;
	//alert(cat);
	var drug = document.getElementById('drug').value;
	var meal = document.getElementById('meal').value;
	var dose = document.getElementById('dose').value;
	var gap = document.getElementById('gap').value;
	var duration = document.getElementById('duration').value;
	
	$.ajax({
		type: "POST",
		url: "<?php echo base_url('index/prescription_ajax');?>",
		data: {action:'drug_data', cat:cat, drug:drug, meal:meal, dose:dose, gap:gap, duration:duration},
		success: function(mssg){
			//alert(mssg);
		}
	});
	 
	var text = "";
	 text += '<div class="row_count">'
	 		+'<div class="item"><table border="0" cellspacing="0" width="100%" style="text-align:left; font:10pt Arial, Helvetica, sans-serif;">'				
				+'<tr>'
					+'<td class="cat">'+cat+'</td>'
					+'<td class="drug">'+drug+'</td>'
					+'<td class="dose">'+ dose +'</td>'
					+'<td class="gap">'+gap+'</td>'
					+'<td class="meal">'+meal+'</td>'
					+'<td class="duration">'+duration+'</td>'
				+'<td width="30"><a href="javascript://" class="close btn btn-default"  style="background:#CC0000; color:#FFFFFF; font-size:13px; opacity:1">Remove</a></td></tr>'
			+'</table></div>'
			+ '<div style="display:none">'+getEditForm(cat, drug, dose, gap, meal, duration)+'</div><br>';
			+'</div>';
			
	  $("#mainContainer").append(text);
	 
	 $(".sel_cat").val(cat);
	 $(".sel_drug").val(drug);
	 $(".sel_dose").val(dose);
	 $(".sel_gap").val(gap);
	 $(".sel_meal").val(meal);
	 $(".sel_duration").val(duration);
	 
	 
	 $(".close").unbind('click').bind('click', function() {
	 	//alert('test');
		if(confirm('Do you want to delete?')) {
			$(this).parents('.row_count').remove();
		}
	});
	
	 $(".edit").unbind('click').bind('click', function() {
	 	//alert('');
		$(this).parents('.row_count').find('div:first').hide();
		$(this).parents('.row_count').find('div:last').show();
	});
	
	$(".ok").unbind('click').bind('click', function() {
		$(this).parents('.row_count').find('div:first').show();
		$(this).parents('.row_count').find('div:last').hide();
		//alert($(this).parents('.row_count').find('.sel_drug').val());
		$(this).parents('.row_count').find('.cat').html($(this).parents('.row_count').find('.sel_cat').val());
		$(this).parents('.row_count').find('.drug').html($(this).parents('.row_count').find('.sel_drug').val());
		$(this).parents('.row_count').find('.dose').html($(this).parents('.row_count').find('.sel_dose').val());
		$(this).parents('.row_count').find('.gap').html($(this).parents('.row_count').find('.sel_gap').val());
		$(this).parents('.row_count').find('.meal').html($(this).parents('.row_count').find('.sel_meal').val());
		$(this).parents('.row_count').find('.duration').html($(this).parents('.row_count').find('.sel_duration').val());
	});
 }
 
 
 $(document).ready(function(){
	 //alert('dfdfd');
	$("#save").click(function() {
		
		if(confirm('Do you want to save?')){
			var totalRow = $(".row_count").length;
			//alert(totalRow);
			var tempRowLength = 0;
			//alert(totalRow);
			$.ajax({
				   type: "POST",
				  url: "<?php echo base_url('index/prescription_ajax');?>",
				  
				   data: {action:'insertprescrip', pid:'<?php echo $pinfo['patient_id']; ?>',followupid:'<?php echo $followId; ?>',department:'<?php echo $depart; ?>',appointid:'<?php echo $appid; ?>'},
				   success: function(msg){
				   //alert(("<?php //echo $pinfo['patient_id']; ?>"));
				   //return;
					 $(".row_count").each(function() {
					 	var cat_val = $(this).find('.cat').html();				 
						var drug_val = $(this).find('.drug').html();
						var dose_val = $(this).find('.dose').html();
						var meal_val = $(this).find('.meal').html();
						var gap_val = $(this).find('.gap').html();
						var duration_val = $(this).find('.duration').html();
						
						$.ajax({
						   type: "POST",
						   url: "<?php echo base_url('index/prescription_ajax');?>",
				data: {action:'save', pid:'<?php echo $pinfo['patient_id']; ?>', drug:drug_val, dose:dose_val, meal:meal_val, gap:gap_val, duration:duration_val, cat:cat_val},
						   success: function(msg){
							 //alert(msg);
							 tempRowLength++;
							 if(tempRowLength == totalRow) {
								//$("#print").trigger('click');
								window.open(msg, '_blank', 'height=900,width=1200,scrollbars=yes,toolbar=0,location=0,menubar=0');
							 }
							 
						   }
						 });
					});
				   }
				});
				
				
		}
		
	});
	
});

function doNextAjax() {
	/*var his = document.getElementById('his').checked;
		if(his == true) { var his = document.getElementById('history').value; } else { var his = ''; }

	var phy = document.getElementById('phy').checked;
		if(phy == true) { var phy = document.getElementById('phys').value; } else { var phy = ''; } 
		
	var cls_diag = document.getElementById('cls_diag').checked;
		if(cls_diag == true) { var cls_dia = document.getElementById('cls').value; } else { var cls_dia = ''; }
		
	var dia = document.getElementById('diag_cs_of').checked;
		if(dia == true) { var dia = document.getElementById('diag_cs').value; } else { var dia = ''; }
		
	var symptom	= document.getElementById('symp').checked;
		if(symptom == true){ var symp = document.getElementById('symp1').value; } else { var symp = ''; }
		
	var pic = document.getElementById('pic').checked;
		if(pic == true) { var pic = document.getElementById('pic').value; } else { var pic = ''; }
		
	var invst 		= document.getElementById('invst').value;
	var one			= document.getElementById('one').value;
	var two 		= document.getElementById('two').value;
	var three		= document.getElementById('three').value;
	var four		= document.getElementById('four').value;
	var five		= document.getElementById('five').value;
	var six			= document.getElementById('six').value;
	var seven		= document.getElementById('seven').value;
	var eight		= document.getElementById('eight').value;
	var nine		= document.getElementById('nine').value;
	var ten			= document.getElementById('ten').value;
	var eleven		= document.getElementById('eleven').value;
	var	twelve		= document.getElementById('twelve').value;
	var thirteen	= document.getElementById('thirteen').vlaue; 
	
	$.ajax({
		type: "POST",
		url: "<?php echo base_url('index/prescription_ajax');?>",
		data: {action:'delete1', pid:'<?php echo $pinfo['patient_id']; ?>'},
		success: function(msg){
			//alert(msg);
		}
	});*/
	
	/*$.ajax({
		type:"POST",
		url: "<?php echo base_url('index/prescription_ajax');?>",
		data:{action:'save1', pid:'<?php echo $pinfo['patient_id'] ?>', name:'<?php echo $pname ?>', sex:'<?php echo $sex ?>', weight:'<?php echo $weight ?>', age:'<?php echo $age; ?>', his:his, phy:phy, cls_diag:cls_dia, dia:dia, invst:invst, symp:symp, pic:pic, one:one, two:two, three:three, four:four, five:five, six:six, seven:seven, eight:eight, nine:nine, ten:ten, eleven:eleven, twelve:twelve, thirteen:thirteen },
		success:function(resp){
			//alert(resp);
			$("#print").click();
		}
	});*/
	
}

 
function getEditForm(cat, drug, dose, gap, meal, duration) {
 	/*var str = '<table border="0" cellspacing="0" width="500" style="text-align:left; font:10pt Arial, Helvetica, sans-serif;">'
				+'<tr>'
					+'<td colspan="4"><select class="sel_cat">'+cat_selector+'</select></td>'
				+'</tr>'
				+'<tr>'
					+'<td colspan="4"><select class="sel_drug">'+drug_selector+'</select></td>'
				+'</tr>'
				+'<tr>'
					+'<td width="40"></td>'
					+'<td><select class="sel_dose">'+dose_selector+'</select></td>'
					+'<td><select class="sel_gap">'+gap_selector+'</select></td>'
					+'<td><select class="sel_meal">'+meal_selector+'</select></td>'
					+'<td><select class="sel_duration">'+duration_selector+'</select></td>'
				+'<td width="30"><a href="javascript://" class="ok">OK</td></tr>'
			+'</table>';
			
	return str;*/
}
 

/*$(document).ready(function() {
	$("#drug").UISugestion();
	$("#meal").UISugestion();
	$("#cat").UISugestion();
	$("#gap").UISugestion();
	$("#duration").UISugestion();
});*/
  </script>
  

<?php /*?><a href='javascript:void();' id='print' onclick="window.open('<?php echo base_url('index/prescripPrint');?>?id=<?php echo $pinfo['patient_id'];?>&dat=<?php echo date('Y-m-d');?>','','height=900,width=1200,scrollbars=yes')"></a><?php */?>
