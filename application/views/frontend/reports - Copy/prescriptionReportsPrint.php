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
<div class="right_col" role="main">
    <div style="width:100%; float:left">	
      <div style="text-align:center; padding:5px 0"><img src="<?php echo base_url('asset/images/logo.png')?>" style="width:10%; height:auto" /></div>
   </div>
    <div class="clearfix"></div>
    <div class="row">
       <div class="container">
             <div class="panel-heading">
                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><h4 class="panel-title">
                                   Patient details</h4></a>                                            </div>
                            
                <div class="x_content">
                    <div class="panel-body">
                <div class="col-sm-12 col-lg-12"> 
                      <table class="table table-striped" border="1" bordercolor="#003399" width="100%" style="background:#f5f5f5; border-collapse:collapse">
      <tr>
                                            <td width="22%" height="32" valign="middle"><label class="control-label">Patient name</label></td>
                                            <td width="2%" valign="middle" style="border-left:none">&nbsp;</td>
              								<td width="76%" valign="middle" style="border-left:none"><?php echo $patient_name; ?></td>
                      					  </tr>
                                         
                                            <tr>
                                                <td width="22%" height="32" valign="middle"><label class="control-label">Father's Name</label></td>
                                                <td width="2%" height="32" valign="middle" style="border-left:none">&nbsp;</td>
                                              <td width="76%" valign="middle" style="border-left:none"><?php echo $father_name; ?></td>
                       						 </tr>
                                            <tr>
                                                <td width="22%" height="32" valign="middle"><label class="control-label">Patient ID</label></td>
                                                <td width="2%" height="32" valign="middle" style="border-left:none">&nbsp;</td>
                                              <td width="76%" valign="middle" style="border-left:none"><?php echo $patient_id; ?></td>
                        					</tr>
                                            
                                            <tr>
                                                <td width="22%" height="32" valign="middle"><label class="control-label">Mobile</label></td>
                                                <td width="2%" height="32" valign="middle" style="border-left:none">&nbsp;</td>
                                              <td width="76%" valign="middle" style="border-left:none"><?php echo $phone; ?></td>
                        					</tr>
                                            <tr>
                                                <td width="22%" height="32" valign="middle"><label class="control-label">Email</label></td>
                                                <td width="2%" height="32" valign="middle" style="border-left:none">&nbsp;</td>
                                              <td width="76%" valign="middle" style="border-left:none"><?php echo $email; ?></td>
                      					  </tr>
                                            <tr>
                                                <td width="22%"height="32"  valign="middle"><label class="control-label">Date of Birth</label></td>
                                                <td width="2%"height="32"  valign="middle" style="border-left:none">&nbsp;</td>
                                              <td width="76%" valign="middle" style="border-left:none"><?php echo $dob; ?></td>
                        					</tr>
                                            <tr>
                                                <td height="32" valign="middle"><label class="control-label">Age</label></td>
                                                <td height="32" valign="middle" style="border-left:none">&nbsp;</td>
                                              <td width="76%" valign="middle" style="border-left:none"><?php echo $age; ?></td>
                      					  </tr>
                                            <tr>
                                                <td height="32" valign="middle"><label class="control-label">Address</label></td>
                                                <td height="32" valign="middle" style="border-left:none">&nbsp;</td>
                                              <td width="76%" valign="middle" style="border-left:none"><?php echo $address; ?></td>
                        </tr>
                                   </table>
                      </div>   
                <div class="col-sm-12">
                <div style="min-height:500px; margin-bottom:5px;">
               
                <div style="border:1px solid #ccc; min-height:500px; overflow:auto; overflow-x:hidden; margin-bottom:5px;"> 
                 <h4 style="background:#2A3F54; margin:0; padding:5px; color:#fff; text-align:center">Prescription</h4> 
                  <div style="padding:5px; width:100%; float:left">
                                        <table border="0" cellspacing="0" width="100%" align="center">
                                          <tbody>
                                           <tr>
                <td colspan="3" style="padding-left:35px;" valign="top" id='mainContainer'>
                <!-- dummy work -->
                <?php
                foreach($queryReports->result() as $row){								
                    $cat = $row->cat;
                    $drug = $row->drug;
                    $dose = $row->dose;
                    $gap = $row->gap;
                    $meal = $row->meal;
                    $duration = $row->duration;
                    ?>							
                <div class="row_count">
                <div class="item">
                <table border="0" cellspacing="0" width="100%" style="text-align:left; font:10pt Arial, Helvetica, sans-serif; border-bottom:1px solid #CCCCCC">
                    <tr>
                        <td colspan="6" class="cat"><strong><?php echo $cat.'&nbsp;:&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<span style="color:green">'.$drug.'</span>'; ?></strong></td>
                    </tr>
                    
      <tr>
                        <td width="370"></td>
                        <td width="225" class="dose" style="padding:5px 0"><strong><?php echo $dose; ?></strong></td>
                  <td width="227" class="gap"><strong><?php echo $gap; ?></strong></td>
                  <td width="218" class="meal"><strong><?php echo $meal; ?></strong></td>
                  <td width="239" class="duration"><strong><?php echo $duration; ?></strong></td>
                  </tr>
                </table>
                </div>
                <br>
                </div>	
                <?php
                }
                ?>

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
               