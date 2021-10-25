<?php
if($patid!=""){
	$queryPatient=$this->db->query("select * from registration where patient_id ='".$patid."'");
	foreach($queryPatient->result() as $payrow);
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
	
	$departdata = $this->db->query("SELECT * FROM ent WHERE patient_id='".$patid."'");
	foreach($departdata->result() as $depart);
	
	$totalfollow = $this->db->query("SELECT * FROM followup WHERE patient_id='".$patid."'");
	
	$queryPrescription=$this->db->query("SELECT * FROM prescription_entry WHERE patient_id='".$patid."'");
}
?>

<div id="registration_form">	
                                  	  <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                               <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                               <h4 class="panel-title">Personal Information </h4></a>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
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
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                               <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                               <h4 class="panel-title">General History </h4></a>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                   <table width="100%">
                                                  <tr style="border-bottom:1px solid #ddd;">
                                                  <td width="28%" height="27" valign="top" style="font-size:13px; padding:5px; font-weight:bold">Cheif Complaints </td>
                                                  <td width="72%" valign="top" style="font-size:13px;padding:5px; font-weight:bold"><span style="margin-top:10px;"><?php echo $depart->cheif_complaints;?></span></td>
                                              </tr>
                                               
                                                  <tr style="border-bottom:1px solid #ddd;">
                                                      <td width="28%" height="26" valign="top" style="font-size:13px;padding:5px; font-weight:bold">History</td>
                                                      <td width="72%" valign="top" style="font-size:13px; padding:5px;font-weight:bold"><span style="margin-top:10px;"><?php echo $depart->history;?></span></td>
                                                  </tr>
                                                  <tr style="border-bottom:1px solid #ddd; padding:5px">
                                                      <td width="28%" height="27" valign="top" style="font-size:13px; padding:5px;font-weight:bold">Examination findings</td>
                                                      <td width="72%" valign="top" style="font-size:13px; padding:5px;font-weight:bold"><span style="margin-top:10px;"><?php echo $depart->exam_finding;?></span></td>
                                                  </tr>
                                                  
                                                  <tr style="border-bottom:1px solid #ddd; padding:5px">
                                                      <td width="28%" height="27" valign="top" style="font-size:13px; padding:5px;font-weight:bold">Clinical diagnosis</td>
                                                      <td width="72%" valign="top" style="font-size:13px; padding:5px;font-weight:bold"><span style="margin-top:10px;"><?php echo $depart->diagnosis;?></span></td>
                                                  </tr>
                                                  <tr style="border-bottom:1px solid #ddd; padding:5px">
                                                      <td width="28%" height="26" valign="top" style="font-size:13px;padding:5px; font-weight:bold">Investigation Suggested</td>
                                                      <td width="72%" valign="top" style="font-size:13px;padding:5px; font-weight:bold"><span style="margin-top:10px;"><?php echo $depart->invest_req;?></span></td>
                                                  </tr>
                                                  
                                                 
                                         </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                               <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                               <h4 class="panel-title">Follow Up History </h4></a>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                   <table class="table table-striped">
                                                    <thead>
                                                      <tr>
                                                        <th>SI</th>
                                                        <th>Patient ID</th>
                                                        <th>Patient Name</th>
                                                        <th>Advice Admission</th>
                                                        <th>Follow Up Date</th>
                                                        <th>Next follow up</th>
                                                        <th>Action</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
														$i=0;
                                                    foreach($totalfollow->result() as $followdata):
															$id=$followdata->id;
															$patient_id=$followdata->patient_id;
															$advice_admission=$followdata->advice_admission;
															$next_followup_date=$followdata->next_followup_date;
															$date=$followdata->date;
															$i++;
															echo '	
																<tr>
																<td>'.$i.'</td>
																<td>'.$patient_id.'</td>
																<td>'.$patient_name.'</td>
																<td>'.$advice_admission.'</td>
																<td>'.date('d F Y',strtotime($date)).'</td>
																<td> After '.$next_followup_date.'</td>
																 <td> 
																	<a href="'.base_url('index/followup_details/'.$id).'" class="btn btn-primary">
																		<span class="glyphicon glyphicon-edit"></span> View Details
																	</a> 
																	</td>
															  </tr>';
														   endforeach;	
													?>
                                                    </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                               <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                               <h4 class="panel-title">Prescription History </h4></a>
                                            </div>
                                            <div id="collapseFour" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                   <table class="table table-striped" width="100%">
                                                     <tr bgcolor="#666">
                                                             <th width="2%" align="center">SI</th>
                                                             <th width="13%" align="center">Patient Name</th>
                                                             <th width="13%" align="center">Mobile</th>
                                                             <th width="13%" align="center">Email</th>
                                                             <th width="7%" align="center">Age</th>
                                                             <th width="13%" align="center">Reg. Date</th>
                                                             <th width="21%" align="center">Father's Name</th>
                                                             <th width="18%" align="center">Action</th>
                                                        </tr>
                                                        <?php
                                                        $i=0;
                                                       
                                                        foreach($queryPrescription->result() as $pres){
                                                        $patient_id=$pres->patient_id;
                                                        $pr_id=$pres->pr_id;
                                                        
                                                        $queryPatient=$this->db->query("select * from registration where patient_id='".$patient_id."'");
                                                        foreach($queryPatient->result() as $payrow);
                                                        $patid=$payrow->id;
                                                        $patient_name=$payrow->patient_name;
                                                        $date_reg=$payrow->date_reg;	
                                                        $age=$payrow->age;
                                                        $email=$payrow->email;
                                                        $phone=$payrow->phone;
                                                        $father_name=$payrow->father_name;
                                                                                      
                                                        if($i%2==0){
                                                            $clr='#fff';
                                                        }
                                                        else{
                                                            $clr='#eaeaea';
                                                        }
                                                        $i++;
                                                        
                                                        $url = base_url('index/prescripPrint').'?id='.$patient_id.'&presid='.$pr_id.'&dat='.date('Y-m-d');
                                                        ?>
                                                        
                                                        
                                                        <tr bgcolor="<?php echo $clr;?>">
                                                            <td align="left"><?php echo $i;?></td>
                                                          <td align="left"><?php echo $patient_name; ?></td>
                                                          <td align="left"><?php echo $phone; ?></td>
                                                          <td align="left"><?php echo $email; ?></td>
                                                          <td align="left"><?php echo $age; ?></td>
                                                          <td align="left"><?php echo $date_reg; ?></td>
                                                          <td align="left"><?php echo $father_name; ?></td>
                                                          <td align="left">
                                                                <a href="<?php echo base_url('index/prescription_history/details/'.$pr_id.'_'.$patient_id);?>" class="btn btn-primary" style="padding:5px"><i class="fa fa-edit"></i> Details</a>
                                                                <a href='javascript:void();' onclick="window.open('<?php echo $url;?>','','height=900,width=1200,scrollbars=yes')" class="btn btn-primary" style="padding:5px">
                                                                <i class="fa fa-print"></i> Print</a>
                                                                    
                                                          </td>
                                                        </tr>
                                                        <?php
                                                        }	
                                                        ?>
                                                        
                                                        
                                                        </table>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                   </div>