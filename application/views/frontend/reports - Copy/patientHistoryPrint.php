 <link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">
 <script src="<?php echo base_url();?>asset/js/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var symptom = $("#symptomTable").val();
		var patient_id = $("#patientId").val();
		//alert(patient_id);
		  $.ajax({
			   type: "GET",
			   url: '<?php echo base_url()?>index/deprt_detailsPrint',
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
	
	$queryData = $this->db->query("
	(select table_name from ent where patient_id='".$patient_id."')
	UNION
	(select table_name from cancer where patient_id='".$patient_id."')
	UNION
	(select table_name from dental where patient_id='".$patient_id."')
	UNION
	(select table_name from neuro_surgary where patient_id='".$patient_id."')
	UNION
	(select table_name from anaesthesiclogy where patient_id='".$patient_id."')");
	foreach($queryData->result() as $row);
	$table_name=$row->table_name;	
}

?>
<div class="right_col" role="main">
 <div style="width:100%; float:left">	
      <div style="text-align:center; padding:5px 0"><img src="<?php echo base_url('asset/images/logo.png')?>" style="width:10%; height:auto" /></div>
   </div>
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Patient details</h3>
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
                                               
                                                </div>
                                            </div>
                                        </div>
                                      
                                    </div>
                                   </div> 
                                  
                                  	  <div class="panel-group">
                                        <div class="panel panel-default">
                                                <div class="panel-heading">
                                                     <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><h4 class="panel-title">Department Information </h4></a>
                                                </div>
                                                <div class="panel-body">
                                        			<div class="form-group" style="padding:0; margin:0">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Department</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12"><h2><?php echo ucfirst($table_name);?></h2></div>
                                                    </div>
                                                </div>
                                                <input type="hidden" id="symptomTable" value="<?php echo $table_name;?>" />
                                                <input type="hidden" id="patientId" value="<?php echo $patient_id;?>" />
                                                <div class="panel-body"><div id="symptomDetails"></div></div>
                                            
                                            
                                        	</div>
                                    </div>
                                </div>
                                 <?php echo form_close();?>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="border-top:1px solid #ccc; bottom:0; position:fixed; padding:10px; background:#f5f5f5">
        <address style="font-size:13px; text-align:left">
                               Bangladesh ENT Hospital Limited<br />
                        Navana Newbury place(3rd floor) Opposite to Rapa Plaza,
                        Near 27 No. Bus Stand, 41/A Sobahanbag Mirpur Road, Dhaka 1207
                        Hot line: 09 666 710 710
                        Mobile: 01717 250667
                        Phone: +8802 9137324, +8802 9137325, +8802 9137526 +8802 8142959
                        Email: info@benth.com.bd,bangladeshenthospital@gmail.com
                        Web: www.benth.com.bd
                            </address>
    </div>
                </div>
               