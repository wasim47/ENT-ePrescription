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
		$bed_no=$patDetails->bed_no;
		$patientName=$patDetails->patient_name;
		$phone=$patDetails->phone;
		$email=$patDetails->email;
		$alt_phone=$patDetails->alt_phone;
		$address=$patDetails->address;
		$age=$patDetails->age;
		$dob=$patDetails->dob;
		$gender=$patDetails->gender;
		$relision=$patDetails->relision;
		$expenditure=$patDetails->expenditure;
		$father_name=$patDetails->father_name;
		$father_ocu=$patDetails->father_ocu;
		$mother_ocu=$patDetails->mother_ocu;
		$family_income=$patDetails->family_income;
		$housing=$patDetails->housing;
		$sanatation=$patDetails->sanatation;
		$water_supplly=$patDetails->water_supplly;
		$sym_id=$patDetails->symptom;
		$images=$patDetails->images;
		
		$queryData = $this->db->query("
								(select table_name from abdominalpain where patient_id='".$patient_id."')
								UNION
								(select table_name from acutedairrhea where patient_id='".$patient_id."')
								UNION
								(select table_name from acutejandus where patient_id='".$patient_id."')
								UNION
								(select table_name from chronicdiarrhea where patient_id='".$patient_id."')
								UNION
								(select table_name from chronicjaundice where patient_id='".$patient_id."')
								UNION
								(select table_name from liverbiopsy where patient_id='".$patient_id."')
								UNION
								(select table_name from lowerbleeding where patient_id='".$patient_id."')
								UNION
								(select table_name from neonatalcholestasis where patient_id='".$patient_id."')
								UNION
								(select table_name from pem where patient_id='".$patient_id."')
								UNION
								(select table_name from spaceoccupyinglesion where patient_id='".$patient_id."')
								UNION
								(select table_name from storagedisease where patient_id='".$patient_id."')");
								foreach($queryData->result() as $row);
								$table_name=$row->table_name;
								
								$diagonosissymptom = $this->Index_model->getAllItemTable('symptom','sym_id',$sym_id,'','','sym_id','desc');
								if($diagonosissymptom->num_rows() > 0){
								foreach($diagonosissymptom->result() as $symp);
								$sympName = $symp->symptom;
								}
								else{
									$sympName='';
								}
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
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><h4 class="panel-title">
                                                   Registration Information </h4></a>
                                            </div>
                                            
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                        			    <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Hospital Registration Number<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <?php echo $hos_reg_number;?>
                                            </div>
                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Patient ID No<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <?php echo $patient_id;?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bed Number<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <?php echo $bed_no;?>
                                            </div>
                                        </div>
                                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Date of Registration</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <?php echo $date_reg;?>
                                            </div>
                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><h4 class="panel-title">
                                                Personal Information</h4></a>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Name of Patient<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <?php echo $patientName;?>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone No.</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                               <?php echo $phone;?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Alternative Phone no</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                               <?php echo $alt_phone;?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $email;?></div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <?php echo date('l F , d Y',strtotime($dob)).'&nbsp;&nbsp;&nbsp; Total Age: '.$age.' Years Old';?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $gender;?></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                                            Religion</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $relision;?></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $address;?></div>
                                                        </div>
                                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Patient Photo</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $email;?></div>
                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                <h4 class="panel-title"> Parents Information </h4></a>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                        <div class="form-group">
                                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Father's Name</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $father_name;?></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Father's Occupation</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $father_ocu;?></div>
                                                        </div>
                                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Monthly expenditure in TK</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $expenditure;?></div>
                                        </div>
                                                        <div class="form-group">
                                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Monthly family income in TK</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $family_income;?></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Housing</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $housing;?></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                                            Sanitation</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $sanatation;?></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                                            Water supply</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $water_supplly;?></div>
                                                        </div>
                                                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   </div> 
                                   <div id="registration_form1" style="display:none">	
                                  	  <div class="panel-group">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><h4 class="panel-title">
                                                   Symptom Information </h4></a>
                                            </div>
                                            
                                            <div id="collapseFour" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                        			<div class="form-group">
                                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                                            Symptom</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12"><h2><?php echo $sympName;?></h2></div>
                                                        </div>
                                                </div>
                                                <input type="hidden" id="symptomTable" value="<?php echo $table_name;?>" />
                                                <input type="hidden" id="patientId" value="<?php echo $patient_id;?>" />
                                                <div class="panel-body"><div id="symptomDetails"></div></div>
                                            </div>
                                            
                                            
                                        	</div>
                                    </div>
                                   </div>
                                   <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="button" class="btn btn-primary" id="prevFirst" style="float:left" value="&laquo; Previous">
                                            <input type="button" name="registration" id="nextFirst" class="btn btn-success" value="Next &raquo;" style="float:right">
                                        </div>
                                    </div>
                                    
                                    
                                    
                                   
                               <?php echo form_close();?>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                </div>
               