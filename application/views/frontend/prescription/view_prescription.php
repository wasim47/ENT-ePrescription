<script>
window.print();
</script>
 <link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/fonts/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
        <div class="col-md-12 col-sm-12 col-lg-12" style="margin:0; padding:0">
        	<div class="col-md-12 col-sm-12 col-lg-12" style="height:150px;">
            	<div class="col-sm-2 col-sm-offset-3"><img src="<?php echo base_url();?>asset/images/logo.png" style="width:100%; height:auto"></div>
              	<div class="col-sm-4"><h2 style="padding:0; margin:0; margin-top:65px;">ENT Hospital</h2></div>
            </div>
            
            <div class="tab-content clearfix">
                <div class="tab-pane active" id="1b">
                          	<div class="col-sm-12" style="border-bottom:1px solid #ccc; margin-bottom:20px;">
                                <div class="col-sm-3"><h5>Patient Name: <?php echo $pinfo['patient_name'];?></h5></div>
                                <div class="col-sm-2"><h5>Patient ID: <?php echo $pinfo['patient_id'];?></h5></div>
                                <div class="col-sm-2"><h5>Patient Age : <?php echo $pinfo['age'];?></h5></div>
                                <div class="col-sm-2"><h5>Sex: <?php echo $pinfo['gender'];?></h5></div>
                                <div class="col-sm-3"><h5>Contact: <?php echo $pinfo['phone'];?></h5></div>
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
								$pr_id = $prescription_entry['pr_id'];
								$sql = "SELECT * FROM prescription WHERE pr_id='".$pr_id."'";
								$rec = $this->db->query($sql);
								foreach($rec->result() as $row ){
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
