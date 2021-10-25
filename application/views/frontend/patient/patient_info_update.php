<script type="text/javascript">
$(document).ready(function(){
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
<script type="text/javascript" >
    function checkvalidationdata(id,caption)
    {
		
      $('#user_error_'+id).html('');    
	  var name        = $.trim($("#"+id).val());
	 // alert(id);
	  $.ajax({
		  type  :   'POST',
		  data  :  {columval:name,columname:id},//$('#form-register').serialize(),
		  url   : '<?php echo base_url('index/checkvalidation');?>',
		  cache : false,    
		  success: function(data){
				if(data=='invalid')
				{
					$('#user_error_'+id).html('This '+caption+' is already in use try new one!');
					$('#user_error_'+id).css('color','red');
					$.trim($("#"+id).val(''));
					return false;   
				}
				else 
				{                   
					$('#user_error_'+id).html(caption+ ' is Valid');
					$('#user_error_'+id).css('color','green');
				}
			  }
	  });
	  return false;
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
                <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Patient Information Update</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                <?php echo $this->session->flashdata('successMsg');?>
                                <?php 
								$attr=array(
									"class"=>'form-horizontal form-label-left',
									"name"=>'valform'
								);
								echo form_open_multipart('index/update_pat_info',$attr);?>
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
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Date of Registration</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input  class="date-picker form-control col-md-7 col-xs-12" type="text" 
                                                value="<?php echo $patientUpdate['date_reg']; ?>" name="regis_date" id="regis_date"
                                                placeholder='Date of Registration' onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Date of Registration'">
                                            </div>
                                        </div>
                                        
                                        
                                                     <div class="form-group">
                                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Name of Patient<span style="color:#f00">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" name="patient_name" id="patient_name" required 
                                                                class="form-control col-md-7 col-xs-12" placeholder='Name of Patient' 
                                                                onFocus="this.placeholder=''" value="<?php echo $patientUpdate['patient_name']; ?>" 
                                                                onBlur="this.placeholder='Name of Patient'">
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone No.<span style="color:#f00">*</span></label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input class="form-control col-md-7 col-xs-12" type="text" name="mobile" id="mobile" required
                                                                placeholder='Phone' onFocus="this.placeholder=''" onBlur="this.placeholder='Phone'" value="<?php echo $patientUpdate['phone']; ?>">
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span style="color:#f00">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input class="date-picker form-control col-md-7 col-xs-12" name="dob" id="dob" type="text"
                                                                placeholder='Date Of Birth' required onFocus="this.placeholder=''" 
                                                                onBlur="this.placeholder='Date Of Birth'" value="<?php echo $patientUpdate['dob']; ?>" > 
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Blood Group</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                               <select name="blood_group" style="cursor:pointer;" class="form-control col-md-7 col-xs-12">
                                                                  <option value="<?php echo $patientUpdate['bloodgroup']; ?>">
																  <?php echo $patientUpdate['bloodgroup']; ?></option>
                                                                   <option value="A+">A+</option>
                                                                   <option value="A-">A-</option>
                                                                   <option value="B+">B+</option>
                                                                   <option value="B-">B-</option>
                                                                   <option value="O+">O+</option>
                                                                   <option value="O-">O-</option>
                                                                   <option value="AB+">AB+</option>
                                                                   <option value="AB-">AB-</option>
                                                              </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender<span style="color:#f00">*</span></label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <div id="gender" class="btn-group">
                                                       <label class="btn btn-success" data-toggle-class="btn btn-success" data-toggle-passive-class="btn btn-success">
                                                       <input type="radio" name="gender" value="male" 
													   <?php if($patientUpdate['gender']=='male'){?> checked="checked" <?php } ?>> &nbsp; Male &nbsp;
                                                                    </label>
                                                                    <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default"> <input type="radio" name="gender" value="female" <?php if($patientUpdate['gender']=='female'){?> checked="checked" <?php } ?>> Female
                                                                    </label>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <textarea name="address" class="form-control col-md-7 col-xs-12"><?php echo $patientUpdate['address']; ?></textarea>
                                                            </div>
                                                        </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                   </div> 
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        	<input type="hidden" name="patient_id" value="<?php echo $patientUpdate['patient_id']; ?>" />
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit" style="font-size:18px">
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