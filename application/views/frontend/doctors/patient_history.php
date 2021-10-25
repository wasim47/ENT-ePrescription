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
                    <div class="row">


                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Patient History</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                <?php echo $this->session->flashdata('successMsg');?>
                               <?php 
							  $attr=array(
								  "class"=>'form-horizontal',
								  "name"=>'valform'
							  );
							  echo form_open_multipart('index/ent/'.$patient_id,$attr);?>
                                  
                                  	  <div class="panel-group">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><h4 class="panel-title">
                                                   Department Information </h4></a>
                                            </div>
                                            
                                            <div id="collapseFour" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                        			<?php  $this->load->view('frontend/department_page/ent');?>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                        
                                         <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <input type="submit" name="registration" class="btn btn-success" value="Go to Treatment" style="font-size:18px">
                                        </div>
                                    </div>
                                    </div>
                               <?php echo form_close();?>
                                </div>
                            </div>
                        </div>
                    </div>


</div>
               