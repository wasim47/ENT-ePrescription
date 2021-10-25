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
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Patient details</h3>
                      </div>
                      <div class="title_right">
                            <h2 style="text-align:right; float:right"><a href="<?php echo base_url('index/prescription_history/print/'.$presid.'_'.$patient_id);?>" onclick="javascript:void window.open('<?php echo base_url('index/prescription_history/print/'.$presid.'_'.$patient_id);?>','','width=1100,height=400,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=200,top=30');return false;"><i class="fa fa-print"></i> Print</a></h2>
                        </div>
                        
                  </div>
                    <div class="clearfix"></div>
                    <div class="row">




    





                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel"><?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');?>
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
                                   </div> 
                                  
                                    
                                   <div class="ln_solid"></div>
                                    
                                </div>
                                 <?php echo form_close();?>
                            </div>
                      </div>
                    </div>

                    
                </div>
               