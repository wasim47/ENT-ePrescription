 <link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">
<?php
if($queryReports->num_rows()>0){
foreach($queryReports->result() as $pres);
	$patient_id=$pres->patient_id;
	
	$queryPatient=$this->db->query("select * from registration where patient_id='".$patient_id."'");
	foreach($queryPatient->result() as $payrow);
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
}

?>
<div class="row">
   <div class="col-sm-8 col-sm-offset-2">
    <div style="text-align:center; padding:10px 0"><img src="<?php echo base_url('asset/images/logo.png')?>" style="width:7%; height:auto" /></div>
    <div class="row">
                <div class="col-sm-12 col-lg-12"> 
                     <table width="100%">
       					<tr style="border-bottom:1px solid #ddd;">
                                            <td width="22%" height="32" valign="top" style="font-size:13px;padding:5px; font-weight:bold"><label class="control-label">Patient name</label></td>
                                            <td width="2%" valign="top" style="font-size:13px;padding:5px; font-weight:bold">&nbsp;</td>
              								<td width="76%" valign="top" style="font-size:13px;padding:5px; font-weight:bold"><?php echo $patient_name; ?></td>
                      					  </tr>
                                         
                                             <tr style="border-bottom:1px solid #ddd;">
                                                <td width="22%" height="32" valign="top" style="font-size:13px;padding:5px; font-weight:bold"><label class="control-label">Father's Name</label></td>
                                                <td width="2%" height="32" valign="top" style="font-size:13px;padding:5px; font-weight:bold">&nbsp;</td>
                                              <td width="76%" valign="top" style="font-size:13px;padding:5px; font-weight:bold"><?php echo $father_name; ?></td>
                       						 </tr>
                                             <tr style="border-bottom:1px solid #ddd;">
                                                <td width="22%" height="32" valign="top" style="font-size:13px;padding:5px; font-weight:bold"><label class="control-label">Patient ID</label></td>
                                                <td width="2%" height="32" valign="top" style="font-size:13px;padding:5px; font-weight:bold">&nbsp;</td>
                                              <td width="76%" valign="top" style="font-size:13px;padding:5px; font-weight:bold"><?php echo $patient_id; ?></td>
                        					</tr>
                                            
                                             <tr style="border-bottom:1px solid #ddd;">
                                                <td width="22%" height="32" valign="top" style="font-size:13px;padding:5px; font-weight:bold"><label class="control-label">Mobile</label></td>
                                                <td width="2%" height="32" valign="top" style="font-size:13px;padding:5px; font-weight:bold">&nbsp;</td>
                                              <td width="76%" valign="top" style="font-size:13px;padding:5px; font-weight:bold"><?php echo $phone; ?></td>
                        					</tr>
                                             <tr style="border-bottom:1px solid #ddd;">
                                                <td width="22%" height="32" valign="top" style="font-size:13px;padding:5px; font-weight:bold"><label class="control-label">Email</label></td>
                                                <td width="2%" height="32" valign="top" style="font-size:13px;padding:5px; font-weight:bold">&nbsp;</td>
                                              <td width="76%" valign="top" style="font-size:13px;padding:5px; font-weight:bold"><?php echo $email; ?></td>
                      					  </tr>
                                             <tr style="border-bottom:1px solid #ddd;">
                                                <td width="22%"height="32"  valign="top" style="font-size:13px;padding:5px; font-weight:bold"><label class="control-label">Date of Birth</label></td>
                                                <td width="2%"height="32"  valign="top" style="font-size:13px;padding:5px; font-weight:bold">&nbsp;</td>
                                              <td width="76%" valign="top" style="font-size:13px;padding:5px; font-weight:bold"><?php echo $dob; ?></td>
                        					</tr>
                                             <tr style="border-bottom:1px solid #ddd;">
                                                <td height="32" valign="top" style="font-size:13px;padding:5px; font-weight:bold"><label class="control-label">Age</label></td>
                                                <td height="32" valign="top" style="font-size:13px;padding:5px; font-weight:bold">&nbsp;</td>
                                              <td width="76%" valign="top" style="font-size:13px;padding:5px; font-weight:bold"><?php echo $age; ?></td>
                      					  </tr>
                                             <tr style="border-bottom:1px solid #ddd;">
                                                <td height="32" valign="top" style="font-size:13px;padding:5px; font-weight:bold"><label class="control-label">Address</label></td>
                                                <td height="32" valign="top" style="font-size:13px;padding:5px; font-weight:bold">&nbsp;</td>
                                              <td width="76%" valign="top" style="font-size:13px;padding:5px; font-weight:bold"><?php echo $address; ?></td>
                        </tr>
                                   </table>
                      </div>   
                
                <div class="col-sm-12">
                <div style="margin-bottom:5px;">
               
                <div style="border:1px solid #ccc; overflow:auto; overflow-x:hidden; margin-bottom:5px;"> 
                  
                 <div class="form-group" style="float:left; margin-top:10px; width:100%;"><h4 style="background:#2A3F54; margin:0; padding:5px; color:#fff; text-align:center">Prescription</h4></div>
                  <div style="padding:5px; width:100%; float:left">
                                        <table border="0" cellspacing="0" width="100%" align="center">
                                          <tbody>
                                            <tr style="border-bottom:1px solid #ddd;">
                <td colspan="3" style="padding-left:15px;" valign="top">
                <!-- dummy work -->
                <table border="0" cellspacing="0" width="100%" 
                style="text-align:left; font:10pt Arial, Helvetica, sans-serif; border-bottom:1px solid #CCCCCC">
                <?php
                foreach($queryReports->result() as $row){								
                    $cat = $row->cat;
                    $drug = $row->drug;
                    $dose = $row->dose;
                    $gap = $row->gap;
                    $meal = $row->meal;
                    $duration = $row->duration;
					if($drug!=""){
                    ?>							
                
                  
                    
       			<tr style="border-bottom:1px solid #ddd;">
                      <td width="395" class="dose" style="padding:5px 0">
                      <strong><?php echo $cat.'&nbsp;:&nbsp;&nbsp;&nbsp;<span style="color:green">'.$drug.'</span>'; ?></strong></td>
                      <td width="178" class="dose" style="padding:5px 0"><strong><?php echo $dose; ?></strong></td>
                      <td width="183" class="gap"><strong><?php echo $gap; ?></strong></td>
                      <td width="189" class="meal"><strong><?php echo $meal; ?></strong></td>
                      <td width="179" class="duration"><strong><?php echo $duration; ?></strong></td>
               </tr>
               
                <?php
					}
                }
                ?>
		 </table>
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