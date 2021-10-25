<script type="text/javascript">
$(document).ready(function(){
	$("#nextFirst").click(function(){
		$("#registration_form").hide();
		$("#registration_form1").slideDown(500);
		$("#nextFirst").css('display','none');
		$("#prevFirst").css('display','inline');
	});
	$("#prevFirst").click(function(){
		$("#registration_form1").slideUp(500);
		$("#registration_form").show(500);
		$("#nextFirst").css('display','inline');
		$("#prevFirst").css('display','none');
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
if($queryReports->num_rows()>0){
foreach($queryReports->result() as $payrow);
    $patid=$payrow->id;
	$patient_name=$payrow->patient_name;
    $date_reg=$payrow->date_reg;
	$age=$payrow->age;
	$dob=$payrow->dob;
	$date_reg=$payrow->date_reg;	
    $patient_id=$payrow->patient_id;
    $address=$payrow->address;
    $email=$payrow->email;
	$phone=$payrow->phone;
    $father_name=$payrow->father_name;
	
	$queryData = $this->db->query("select * from ent where patient_id='".$patient_id."'");
	if($queryData->num_rows() > 0){
		foreach($queryData->result() as $row);
		$table_name=$row->table_name;	
	}
	else{
		$table_name='';
	}
}

?>
<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Patient details</h3>
                      </div>
                      <div class="title_right">
                            <h2 style="text-align:right; float:right"><a href="<?php echo base_url('index/patient_history/details_print/'.$patient_id);?>" onclick="javascript:void window.open('<?php echo base_url('index/patient_history/details_print/'.$patient_id);?>','','width=1100,height=400,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=200,top=30');return false;"><i class="fa fa-print"></i> Print</a></h2>
                        </div>  
                  </div>
                    <div class="clearfix"></div>
                    <div class="row">




    





                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Patient details</h2>
                                    <div class="clearfix"></div>
                                </div>
                                 <?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');?>
                              	  <div class="x_content">

                                   <div id="registration_form">	
                                  	  <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><h4 class="panel-title">
                                                   Patient details</h4></a>                                            </div>
                                            
                                      <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                      			
                                                
                                                
                                                <div class="col-sm-12 col-lg-12"> 
                                                    <table class="table table-striped" width="100%">
                                                            <tr>
                                                            <td width="28%" valign="top"><label class="control-label">Patient name</label></td>
                                                            <td width="72%" valign="top"><?php echo $patient_name; ?></td>
                                                        </tr>
                                                         
                                                            <tr>
                                                                <td width="28%" valign="top"><label class="control-label">Father's Name</label></td>
                                                                <td width="72%" valign="top"><?php echo $father_name; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="28%" valign="top"><label class="control-label">Patient ID</label></td>
                                                                <td width="72%" valign="top"><?php echo $patient_id; ?></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td width="28%" valign="top"><label class="control-label">Mobile</label></td>
                                                                <td width="72%" valign="top"><?php echo $phone; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="28%" valign="top"><label class="control-label">Email</label></td>
                                                                <td width="72%" valign="top"><?php echo $email; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="28%" valign="top"><label class="control-label">Date of Birth</label></td>
                                                                <td width="72%" valign="top"><?php echo $dob; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="28%" valign="top"><label class="control-label">Age</label></td>
                                                                <td width="72%" valign="top"><?php echo $age; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="28%" valign="top"><label class="control-label">Address</label></td>
                                                                <td width="72%" valign="top"><?php echo $address; ?></td>
                                                            </tr>
                                                            
                                                           
                                                   </table>
                                                </div>   
                                                <?php /*?><div class="col-sm-12 col-lg-6"> 
	<table class="table table-striped" width="100%">
            
            <tr>
                <td width="38%" height="29" valign="top"><label class="control-label">Course</label></td>
                <td width="62%" valign="top"><?php echo $course; ?></td>
            </tr>
            <tr>
                <td width="38%" valign="top"><label class="control-label">Passport</label></td>
                <td width="62%" valign="top"><?php echo $passport; ?></td>
            </tr>
            <tr>
                <td width="38%" valign="top"><label class="control-label">Reference</label></td>
                <td width="62%" valign="top"><?php echo $reference; ?></td>
            </tr>
            <tr>
                <td width="38%" valign="top"><label class="control-label">Application status</label></td>
                <td width="62%" valign="top"><?php echo $application_status; ?></td>
            </tr>
            <tr>
                <td width="38%" valign="top"><label class="control-label"><span class="form-group">Document status </label></td>
                <td width="62%" valign="top"><?php echo $document_status; ?></td>
            </tr>
            <tr>
                <td width="38%" valign="top"><label class="control-label">Admission status</label></td>
                <td width="62%" valign="top"><?php echo $admission_status; ?></td>
            </tr>
            <tr>
                <td width="38%" valign="top"><label class="control-label">Currency</label></td>
                <td width="62%" valign="top"><?php echo $currency_name; ?></td>
            </tr>
            <tr>
                <td width="38%" valign="top"><label class="control-label"><span class="form-group">Academic fee</label></td>
                <td width="62%" valign="top"><?php echo $academic_fee; ?></td>
            </tr>
            <tr>
                <td width="38%" valign="top"><label class="control-label">Hostel charge</label></td>
                <td width="62%" valign="top"><?php echo $hostel_charge; ?></td>
            </tr>
            <tr>
                <td width="38%" valign="top"><label class="control-label">Tution fee</label></td>
                <td width="62%" valign="top"><span class="col-md-8 col-sm-8 col-xs-12"><?php echo $tution_fee; ?></td>
            </tr>
           
   </table>
</div><?php */?>      
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
                                                   Department Information </h4></a>
                                            </div>
                                            
                                            <div id="collapseFour" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                        			<div class="form-group">
                                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                                            Department</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12"><h2><?php echo ucfirst($table_name);?></h2></div>
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
                                            <input type="button" class="btn btn-primary" id="prevFirst" style="float:left;display:none" value="&laquo; Previous">
                                            <input type="button" name="registration" id="nextFirst" class="btn btn-success" value="Next &raquo;" style="float:right">
                                        </div>
                                    </div>
                                </div>
                                 <?php echo form_close();?>
                            </div>
                        </div>
                    </div>

                    
                </div>
               