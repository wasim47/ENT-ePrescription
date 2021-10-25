<script type="text/javascript">
$(document).ready(function(){
	$("#nextFirst").click(function(){
		$("#registration_form").hide();
		$("#registration_form1").slideDown(500);
	});
	$("#prevFirst").click(function(){
		$("#registration_form1").slideUp(500);
		$("#registration_form").show(500);
	});
});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		var symptom = $("#symptomTable").val();
		var patient_id = $("#patientId").val();
		//alert(patient_id);
		  $.ajax({
			   type: "GET",
			   url: '<?php echo base_url()?>index/patientsymptom_details',
			   data: "selectedSymptom="+symptom+"&patient_id="+patient_id,
			   success: function(data){
					$('#symptomDetails').html(data);
			   }
		 });
	});
</script>
<?php
foreach($patient_info->result() as $patDetails);
		$hos_reg_number=$patDetails->hos_reg_number;
		$patient_id=$patDetails->patient_id;
		$date_reg=$patDetails->date_reg;
		$patientName=$patDetails->patient_name;
		$phone=$patDetails->phone;
		$address=$patDetails->address;
		$age=$patDetails->age;
		$dob=$patDetails->dob;
		$gender=$patDetails->gender;
		
		
?>
<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Patient Details</h3>
                        </div>
                        
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">




    





                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Patient Details</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                <?php echo $this->session->flashdata('successMsg');?>
                                <?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');?>
                                   <div id="registration_form">	
                                  	  <div class="panel-group" id="accordion">
                                  	    <div class="panel panel-default">
                                          <div class="panel-heading">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><h4 class="panel-title">
                                                Personal Information</h4></a>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                            Patient ID<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:7px; font-size:16px;">
                                                                <?php echo $patient_id;?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                                            Date of Registration</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:7px; font-size:16px;">
															<?php echo $date_reg;?></div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                            Name of Patient<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:7px; font-size:16px;">
                                                                <?php echo $patientName;?>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone No.</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:8px; font-size:16px;">
                                                               <?php echo $phone;?>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:7px; font-size:16px;">
                                                                <?php echo date('l F , d Y',strtotime($dob)).'&nbsp;&nbsp;&nbsp; Total Age: '.$age.' Years Old';?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:7px; font-size:16px;">
															<?php echo $gender;?></div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:7px; font-size:16px;">
															<?php echo $address;?></div>
                                                        </div>
                                                        
                                                </div>
                                            </div>
                                        </div>
                               	     </div>
                                   </div> 
                                   
                                   
                                  
                                    
                                    
                                   
                               <?php echo form_close();?>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                </div>
               