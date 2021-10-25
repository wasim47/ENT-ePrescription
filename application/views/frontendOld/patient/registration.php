<style>
 label {
  position: relative;
  margin:0 30px;
}
span::before,
span::after {
  content: '';
  position: absolute;
  top: 0;
  bottom: 0;
  margin: auto;
}
span.radio::after {
  left: -49px;
  width: 17px;
  height: 17px;
  border-radius: 10px;
  background-color: #fff;
  transition: left .25s, background-color .25s;
  
}
span.radio:hover {
  cursor: pointer;
}
span.radio::before {
  left: -50px;
  width: 40px;
  height: 25px;
  background-color: #ccc;
  border-radius: 50px;
}
 span.radio::after {
  left: -49px;
  width: 17px;
  height: 17px;
  background-color: #999;
  transition: left .25s, background-color .25s;
}
input[type="radio"]:checked + label span.radio::after {
  left: -27px;
  background-color: #993333;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$("#prevFirst").click(function(){
		$("#registration_form1").slideUp(500);
		$("#registration_form").show(500);
		$("#prevFirst").hide(500);
		$("#nextFirst").show(500);
	});
	
	
	$("#admission").click(function(){
		$("#admissionpart").show(500);
	});
	
	$("#appointment").click(function(){
		$("#admissionpart").hide(500);
	});
});


function userinfovalidation(){
	var underprof = document.getElementById('underprof').value;
	var regis_date = document.getElementById('regis_date').value;
	var patient_name = document.getElementById('patient_name').value;
	var mobile = document.getElementById('mobile').value;
	var dob = document.getElementById('dob').value;
	var gender = document.valform.gender.value;
	var regtype = document.valform.regtype.value;
	
	var patienttype = document.getElementById('patient_type').value;
	var patid = document.getElementById('patient_id').value;
	
	if(patienttype=="New"){
		if(regtype!=""){
			if(regis_date==""){
				alert("Registration Date is required");
				document.getElementById('regis_date').focus();
				document.getElementById('regis_date').style.border="1px solid #f00";
			}
			else if(patient_name==""){
				alert("Patient Name is required");
				document.getElementById('patient_name').focus();
				document.getElementById('regis_date').style.border="";
				document.getElementById('patient_name').style.border="1px solid #f00";
			}
			else if(mobile==""){
				alert("Mobile Number is required");
				document.getElementById('mobile').focus();
				document.getElementById('patient_name').style.border="";
				document.getElementById('mobile').style.border="1px solid #f00";
			}
			else if(dob==""){
				alert("Date of Birth is required");
				document.getElementById('dob').focus();
				document.getElementById('mobile').style.border="";
				document.getElementById('dob').style.border="1px solid #f00";
			}
			else if(gender==""){
				alert("Gender is required");
				document.getElementById('dob').style.border="";
				document.valform.gender.focus();
			}
			else{
				//alert('Submit Ready');
				//document.valform.action='http://google.com';
				document.valform.submit();
			}
		}
		else{
				alert("Please Select Registration Type");
			}
	}
	else{
		document.valform.submit();
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
	
	
	function patietn_typeVal(pattype){
		//var pattype = document.getElementById("patient_type").value;
		if(pattype=="New"){
			document.getElementById("oldpatientpart").style.display="none";
			document.getElementById("newpatientpart").style.display="inline";
		}
		else if(pattype=="Old"){
			document.getElementById("oldpatientpart").style.display="inline";
			document.getElementById("newpatientpart").style.display="none";
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
<script type="text/JavaScript">
$(document).ready(function(){
$(".search_keyword").keyup(function() 
{ 
	var search_keyword_value = $(this).val();
	var dataString = 'search_patientid='+ search_keyword_value;
	
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

function getresultdata(id){
	var listval = document.getElementById('listitem'+id).innerHTML;
	document.getElementById('patient_id').value = listval;
	document.getElementById('result').style.display = 'none';
}
</script>
<style type="text/css">
	#result
	{
		position:absolute;
		width:288px;
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
<div class="right_col" role="main">
                <div class="">
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
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Patient Type</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div style="margin-left:10px">
                                               <select name="patient_type" id="patient_type" class="form-control" onchange="patietn_typeVal(this.value);">
                                               		<option value="New">New</option>
                                                    <option value="Old">Old</option>
                                               </select>
                                                </div>
                                                <?php echo form_error('regtype', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                        <div id="oldpatientpart" style="display:none">
                                        	 <div class="form-group">
                                             <label class="control-label col-md-3 col-sm-3 col-xs-12">Patient ID</label>
                                             <div class="col-md-6 col-sm-6 col-xs-12">
                                                 <div style="margin-left:10px">
                                                 <input type="text" name="patid" id="patient_id" class="form-control search_keyword" autocomplete="off" 
                                                  placeholder="Patient ID" />
                                                  <div id="result"></div>
                                              	  </div>
                                              </div>
                                             
                                            </div>
                                        </div>
                                        <div id="newpatientpart">              
                                            <div class="form-group">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Registration Purpose</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div style="margin-left:10px">
                                                    <input type="radio" name="regtype" id="appointment" value="Appointment" checked="checked">
                                                    <label for="appointment"><span class="radio">Appointment</span></label>
                                                    
                                                    <input type="radio" name="regtype" id="admission" value="Admission">
                                                    <label for="admission"><span class="radio">Direct Admission</span></label>
                                                    </div>
                                                    <?php echo form_error('regtype', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                </div>
                                            </div>
                                            <div id="admissionpart" style="display:none">
                                                  <div class="form-group">
                                                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Under Proffessor</label>
                                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                                          <input  class="form-control col-md-7 col-xs-12" type="text" style="border:1px solid #D68585" 
                                                          value="<?php echo set_value('underprof'); ?>" name="underprof" id="underprof"
                                                          placeholder='Under Proffessor' onFocus="this.placeholder=''" 
                                                          onBlur="this.placeholder='Under Proffessor'">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Diseases</label>
                                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                                          <input  class="form-control col-md-7 col-xs-12" type="text" style="border:1px solid #D68585" 
                                                          value="<?php echo set_value('diseases'); ?>" name="diseases" id="diseases"
                                                          placeholder='Diseases' onFocus="this.placeholder=''"  onBlur="this.placeholder='Diseases'">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">General Exemination</label>
                                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                                          <textarea  class="form-control col-md-7" style="border:1px solid #D68585" name="geninfo"
                                                          placeholder='General Exemination' onFocus="this.placeholder=''"  
                                                          onBlur="this.placeholder='General Exemination'"><?php echo set_value('diseases'); ?></textarea>
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Time</label>
                                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                                          <input  class="form-control col-md-7 col-xs-12" type="text" style="border:1px solid #D68585" 
                                                          value="<?php echo set_value('admtime'); ?>" name="admtime" id="admtime"
                                                          placeholder='00:00 AM/PM' onFocus="this.placeholder=''"  onBlur="this.placeholder='00:00 AM/PM'">
                                                      </div>
                                                  </div>
                                                  
                                            </div>
                                            <div class="form-group">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Registration/Admission Date</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input  class="date-picker form-control col-md-7 col-xs-12" type="text" 
                                                    value="<?php echo set_value('regis_date'); ?>" name="regis_date" id="regis_date"
                                                    placeholder='Date of Registration' onFocus="this.placeholder=''" 
                                                    onBlur="this.placeholder='Date of Registration'">
                                                    <?php echo form_error('regis_date', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Name of Patient
                                                      <span style="color:#f00">*</span> </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <input type="text" name="patient_name" id="patient_name" required class="form-control col-md-7 col-xs-12"
                                                                    placeholder='Name of Patient' onFocus="this.placeholder=''" value="<?php echo set_value('patient_name'); ?>" onBlur="this.placeholder='Name of Patient'">
                                                      <?php echo form_error('patient_name', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                                </div>
                                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone No.
                                                <span style="color:#f00">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input class="form-control col-md-7 col-xs-12" type="text" name="mobile" id="mobile" required
                                                    placeholder='Phone' onFocus="this.placeholder=''" onBlur="this.placeholder='Phone'">
                                                </div>
                                            </div>
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
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Blood Group</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                   <select name="blood_group" style="cursor:pointer;" class="form-control col-md-7 col-xs-12">
                                                      <option value="">Blood Group</option>
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
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender<span style="color:#f00">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div id="gender" class="btn-group">
                                                    
                                                        <label class="btn btn-primary" data-toggle-class="btn-primary" 
                                                        data-toggle-passive-class="btn-default">
                                                            <input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
                                                        </label>
                                                        <label class="btn btn-primary" data-toggle-class="btn-primary" 
                                                        data-toggle-passive-class="btn-default">
                                                            <input type="radio" name="gender" value="female"> Female
                                                        </label>
                                                    </div>
                                                    
                                                </div>
                                            </div>
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
                                   </div> 
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <!--<input type="submit" name="registration" class="btn btn-success" value="Submit" style="font-size:18px">-->
                                            <input type="button" name="registration" class="btn btn-success" value="Submit" style="font-size:18px" onclick="userinfovalidation();">
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