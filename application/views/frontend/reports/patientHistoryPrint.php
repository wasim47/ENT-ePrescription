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
    $patient_id=$payrow->id;
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
	foreach($queryData->result() as $row);
	$table_name=$row->table_name;
}

?>
					<div class="row">
                    	<div class="col-sm-8 col-sm-offset-2">
                           <div style="text-align:center; padding:10px 0"><img src="<?php echo base_url('asset/images/logo.png')?>" style="width:7%; height:auto" /></div>
                           <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                    
                                     <?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');?>
                                                        <div class="col-sm-12 col-lg-12"> 
                                                        <table width="100%">
                                                                <tr style="border-bottom:1px solid #ddd;">
                                                                <td width="28%" height="27" valign="top" style="font-size:13px; padding:5px; font-weight:bold">Patient name</td>
                                                                <td width="72%" valign="top" style="font-size:13px;padding:5px; font-weight:bold"><?php echo $patient_name; ?></td>
                                                            </tr>
                                                             
                                                                <tr style="border-bottom:1px solid #ddd;">
                                                                    <td width="28%" height="26" valign="top" style="font-size:13px;padding:5px; font-weight:bold">Father's Name</td>
                                                                    <td width="72%" valign="top" style="font-size:13px; padding:5px;font-weight:bold"><?php echo $father_name; ?></td>
                                                                </tr>
                                                                <tr style="border-bottom:1px solid #ddd; padding:5px">
                                                                    <td width="28%" height="27" valign="top" style="font-size:13px; padding:5px;font-weight:bold">Patient ID</td>
                                                                    <td width="72%" valign="top" style="font-size:13px; padding:5px;font-weight:bold"><?php echo $patient_id; ?></td>
                                                                </tr>
                                                                
                                                                <tr style="border-bottom:1px solid #ddd; padding:5px">
                                                                    <td width="28%" height="27" valign="top" style="font-size:13px; padding:5px;font-weight:bold">Mobile</td>
                                                                    <td width="72%" valign="top" style="font-size:13px; padding:5px;font-weight:bold"><?php echo $phone; ?></td>
                                                                </tr>
                                                                <tr style="border-bottom:1px solid #ddd; padding:5px">
                                                                    <td width="28%" height="26" valign="top" style="font-size:13px;padding:5px; font-weight:bold">Email</td>
                                                                    <td width="72%" valign="top" style="font-size:13px;padding:5px; font-weight:bold"><?php echo $email; ?></td>
                                                                </tr>
                                                                <tr style="border-bottom:1px solid #ddd; padding:5px">
                                                                    <td width="28%" height="27" valign="top" style="font-size:13px;padding:5px; font-weight:bold">Date of Birth</td>
                                                                    <td width="72%" valign="top" style="font-size:13px;padding:5px; font-weight:bold"><?php echo $dob; ?></td>
                                                                </tr>
                                                                <tr style="border-bottom:1px solid #ddd; padding:5px">
                                                                    <td width="28%" height="27" valign="top" style="font-size:13px; padding:5px;font-weight:bold">Age</td>
                                                                    <td width="72%" valign="top" style="font-size:13px;padding:5px; font-weight:bold"><?php echo $age; ?></td>
                                                                </tr>
                                                                <tr style="border-bottom:1px solid #ddd; padding:5px">
                                                                    <td width="28%" height="28" valign="top" style="font-size:13px;padding:5px; font-weight:bold">Address</td>
                                                                    <td width="72%" valign="top" style="font-size:13px; padding:5px;font-weight:bold"><?php echo $address; ?></td>
                                                                </tr>
                                                                
                                                               
                                                       </table>
                                                    </div>   
                                                        <div class="form-group" style="float:left; margin-top:10px;"><h4 style="margin:10px 0 0 30px; float:left;">Patient History</h4></div>
                                                    <input type="hidden" id="symptomTable" value="<?php echo $table_name;?>" />
                                                    <input type="hidden" id="patientId" value="<?php echo $patient_id;?>" />
                                                    <div id="symptomDetails"></div>
                                                
                                                
                                     <?php echo form_close();?>
                                </div>
                            </div>
                           <div class="row" style="border-top:1px solid #ddd; bottom:0;  padding:5px; background:#f5f5f5">
            				<address style="font-size:11px; text-align:center; padding:5px; margin:0;">
                                   <strong style="float:left;margin-bottom:5px; width:100%; text-align:left; font-size:12px;">
                                    Bangladesh ENT Hospital Limited:</strong><br />
                                    Navana Newbury place(3rd floor) Opposite to Rapa Plaza,
                                    Near 27 No. Bus Stand, 41/A Sobahanbag Mirpur Road, Dhaka 1207
                                    Hot line: 09 666 710 710
                                    Mobile: 01717 250667
                                    Phone: +8802 9137324, +8802 9137325, +8802 9137526 +8802 8142959<br />
                                    Email: info@benth.com.bd,bangladeshenthospital@gmail.com<br />
                                    Web: www.benth.com.bd
                                </address>
        </div>
    					</div>
                    </div>
               