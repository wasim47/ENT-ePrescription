<script type="text/javascript">
$(document).ready(function(){
	/*$("#nextFirst").click(function(){
		$("#registration_form").hide();
		$("#registration_form1").slideDown(500);
	});
	$("#prevFirst").click(function(){
		$("#registration_form1").slideUp(500);
		$("#registration_form").show(500);
	});*/
	$("#prevFirst").click(function(){
		$("#registration_form1").slideUp(500);
		$("#registration_form").show(500);
		$("#prevFirst").hide(500);
		//$("#submitbtn").hide(500);
		$("#nextFirst").show(500);
	});
});


function userinfovalidation(){
	var reg = document.getElementById('hospital_number').value;
	var patid = document.getElementById('patient_id').value;
	var regis_date = document.getElementById('regis_date').value;
	var patient_name = document.getElementById('patient_name').value;
	var mobile = document.getElementById('mobile').value;
	var dob = document.getElementById('dob').value;
	var gender = document.valform.gender.value;
	
	//alert('dfdf');
	if(reg==""){
		alert("Registration Number is required");
		document.getElementById('hospital_number').focus();
	}
	else if(patid==""){
		alert("\tPatient Id is required.\n Please input a Valid Patient Id.");
		document.getElementById('patient_id').focus();
	}
	else if(regis_date==""){
		alert("Registration Date is required");
		document.getElementById('regis_date').focus();
	}
	else if(patient_name==""){
		alert("Patient Name is required");
		document.getElementById('patient_name').focus();
	}
	else if(mobile==""){
		alert("Mobile Number is required");
		document.getElementById('mobile').focus();
	}
	else if(dob==""){
		alert("Date of Birth is required");
		document.getElementById('dob').focus();
	}
	else if(gender==""){
		alert("Gender is required");
		document.valform.gender.focus();
	}
	else{
		$("#registration_form").hide();
		$("#registration_form1").slideDown(500);
		$("#prevFirst").show(500);
		$("#nextFirst").hide(500);
		//$("#submitbtn").show(500);
	}
}
</script>
<script type="text/javascript">
function changedoctortype(symptom){	
		  //alert(symptom);
		  $.ajax({
			   type: "GET",
			   url: '<?php echo base_url()?>index/symptom_details',
			   data: "selectedSymptom="+symptom,
			   success: function(data){
					$('#symptomDetails').html(data);
			   }
		 });
}
</script>
<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Patient Registration Details</h3>
                        </div>
                        
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">




    





                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Patient Registraion Form</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                <?php echo $this->session->flashdata('successMsg');?>
                                <?php 
								$attr=array(
									"class"=>'form-horizontal form-label-left',
									"name"=>'valform'
								);
								echo form_open_multipart('index/registration',$attr);?>
                                   <div id="registration_form">	
                                  	  <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><h4 class="panel-title">
                                                   Registration Information </h4></a>
                                            </div>
                                            
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                        			    <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Registration Number
                                            <span style="color:#f00">*</span>                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="hospital_number" id="hospital_number" required class="form-control col-md-7 col-xs-12"  placeholder='Registration Number' value="<?php echo set_value('hospital_number'); ?>"  onFocus="this.placeholder=''" onBlur="this.placeholder='Registration Number'">
                                             <?php echo form_error('hospital_number', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Patient ID No<span style="color:#f00">*</span></label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                             <input type="text" name="patient_id" id="patient_id" required class="form-control col-md-7 col-xs-12"
                                                                placeholder='Patient ID No' onFocus="this.placeholder=''" value="<?php echo set_value('patient_id'); ?>" onBlur="this.placeholder='Patient ID No'">
                                                                 <?php echo form_error('patient_id', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Date of Registration</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input  class="date-picker form-control col-md-7 col-xs-12" type="text" value="<?php echo set_value('regis_date'); ?>" name="regis_date" id="regis_date"
                                                placeholder='Date of Registration' onFocus="this.placeholder=''" onBlur="this.placeholder='Date of Registration'">
                                                <?php echo form_error('regis_date', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                        
                                        
                                                     <div class="form-group">
                                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Name of Patient<span style="color:#f00">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" name="patient_name" id="patient_name" required class="form-control col-md-7 col-xs-12"
                                                                placeholder='Name of Patient' onFocus="this.placeholder=''" value="<?php echo set_value('patient_name'); ?>" onBlur="this.placeholder='Name of Patient'">
                                                  <?php echo form_error('patient_name', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                            </div>
                                                        </div>
                                                        <!--<div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Husband's/Mother's Name
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" name="fname_hname" class="form-control col-md-7 col-xs-12"
                                                                placeholder='Husband/Mother Name' onFocus="this.placeholder=''" value="<?php echo set_value('patient_name'); ?>" onBlur="this.placeholder='Husband/Mother Name'">
                                                 
                                                            </div>
                                                        </div>-->
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone No.<span style="color:#f00">*</span></label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input class="form-control col-md-7 col-xs-12" type="text" name="mobile" id="mobile" required
                                                                placeholder='Phone' onFocus="this.placeholder=''" onBlur="this.placeholder='Phone'">
                                                            </div>
                                                        </div>
                                                        <!--<div class="form-group">
                                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Alternative Phone no</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input class="form-control col-md-7 col-xs-12" type="text" name="alt_phone"
                                                                placeholder='Alternative Phone no' onFocus="this.placeholder=''" onBlur="this.placeholder='Alternative Phone no'">
                                                            </div>
                                                        </div>-->
                                                        <!--<div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input class="form-control col-md-7 col-xs-12" type="email" name="email"
                                                                placeholder='Email' onFocus="this.placeholder=''" onBlur="this.placeholder='Email'">
                                                            </div>
                                                        </div>-->
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span style="color:#f00">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input class="date-picker form-control col-md-7 col-xs-12" name="dob" id="dob" type="text"
                                                                placeholder='Date Of Birth' required onFocus="this.placeholder=''" onBlur="this.placeholder='Date Of Birth'"  value="<?php echo set_value('dob'); ?>" > 
																<?php echo form_error('dob', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender<span style="color:#f00">*</span></label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <div id="gender" class="btn-group">
                                                                
                                                                    <label class="btn btn-success" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                        <input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
                                                                    </label>
                                                                    <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                        <input type="radio" name="gender" value="female"> Female
                                                                    </label>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <!--<div class="form-group">
                                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Religion</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input class="form-control col-md-7 col-xs-12" type="text" name="religion"
                                                                placeholder='Religion' onFocus="this.placeholder=''" onBlur="this.placeholder='Religion'">
                                                            </div>
                                                        </div>-->
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <textarea name="address" class="form-control col-md-7 col-xs-12"></textarea>
                                                            </div>
                                                        </div>
                                                
                                                
                                                
                                                
                                                
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                   </div> 
                                  
                                   <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="button" class="btn btn-primary" id="prevFirst" style="float:left" value="&laquo; Previous">
                                            <input type="button" name="registration" id="nextFirst" class="btn btn-success" value="Next &raquo;" style="float:right" onclick="userinfovalidation();">
                                        </div>
                                    </div>
                                    
                                    
                                   <div id="registration_form1" style="display:none">	
                                  	  <div class="panel-group">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><h4 class="panel-title">
                                                   Department Information </h4></a>
                                            </div>
                                            
                                            <div id="collapseFour" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                        			<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Department
                                            <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="selected_symptom" id="selected_symptom" class="form-control col-md-7 col-xs-12 symptom" 
                                                onchange="changedoctortype(this.value);">
                                            	<option value="">Select Department</option>
                                                <?php 
													$i=0;
													foreach($symptom->result() as $symp):
													$i++;
													if($i%2!=0){
														$bc='#fff';
														$c='#333';
													}
													else{
														$bc='#eaeaea';	
														$c='#1A82C3';
													}
													echo '<option value="'.$symp->pagename.'" style="padding:5px; color:'.$c.'; background-color:'.$bc.'; cursor:pointer; font-weight:bold; font-size:12px;">'.$symp->symptom.'</option>';
													endforeach;
												?>
                                                
                                            </select>
                                             <?php echo form_error('selected_symptom', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                                </div>
                                            </div>
                                            <div class="panel-body"><div id="symptomDetails"></div></div>
                                            
                                        </div>
                                        
                                         <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <input type="submit" name="registration" class="btn btn-success" value="Go to Treatment" style="font-size:18px">
                                        </div>
                                    </div>
                                    </div>
                                   </div> 
                                   
                               <?php echo form_close();?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('.date-picker').daterangepicker({
                                singleDatePicker: true,
                                calender_style: "picker_4"
                            }, function (start, end, label) {
                                console.log(start.toISOString(), end.toISOString(), label);
                            });
                        });
                    </script>

                </div>
               