
<div class="right_col" role="main">
<div class="">
                    <div class="row">




    





                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_content">
                                 <div class="x_title" style="width:100%;float:right; text-align:right">
                                	<a href="<?php echo base_url('index/patient_list/?view=today');?>" class="btn btn-warning" style="font-size:18px">
          									<span class="fa fa-eye" style="color:#fff"></span> View Today Booking</a> 
                                            
                                    <a href="<?php echo base_url('index/set_appointment/');?>" class="btn btn-success" style="font-size:18px">
          									<span class="glyphicon glyphicon-edit" style="color:#fff"></span> View All Booking in Calender</a>
                                </div>
                                <div class="container">
                                  <table class="table table-striped" width="100%">
                                    <thead>
                                      <tr>
                                        <th width="2%" height="30">SI</th>
                                        <th width="20%">Patient Name</th>
                                        <th width="9%">Patient ID</th>
                                         <th width="3%">Age</th>
                                        <th width="10%">App Time</th>
                                        <th width="10%">App Date</th>
                                        <th width="15%">Patient Status</th> 
                                        <th width="14%">Status</th>                                       
                                        <th width="17%">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                <?php
                                    foreach($patientList->result() as $patient):
									$pageSl++;
									$id=$patient->id;
									$patient_id=$patient->patient_id;
									$sym_id=$patient->symptom;
									$patient_name=$patient->patient_name;
									$age=$patient->age;
									$date_reg=$patient->date_reg;
									
									
									$da = $date_reg;
									$date = strtotime($da .' +1 months');
									$finaldate=date('Y-m-d', $date);
									$today = date('Y-m-d');
									
									 if($today >= $finaldate){
										 $patstatus =  "New Patient";
									 }
									 else{
										  $patstatus = "Old Patient";
									  }
									
									//echo $finaldate.'<br>';
									
									$app_id=$patient->app_id;
									$app_time=$patient->app_time;
									$app_date=$patient->app_date;
									$app_status=$patient->app_status;
									$doctid=$patient->doctor_id;
									
									if($app_status=="Pending"){
										$fcol = 'btn btn-danger';
										$bg = '#D9534F';
									}
									elseif($app_status=="Paid"){
										
										$fcol = 'btn btn-success btn-sm';
										$bg = '#26B99A';
									}
									elseif($app_status=="Visited by Doctor"){
										
										$fcol = 'btn btn-warning btn-sm';
										$bg = '#F0AD4E';
									}
									else{
										$fcol = '';
										$bg = '';
									}


								$queryDept = $this->db->query("SELECT * FROM ent WHERE patient_id='".$patient_id."'");
									?>
                                      <tr>
                                        <td><?php echo $pageSl;?></td>
                                        <td><?php echo $patient_name; ?></td>
                                        <td><?php echo $patient_id; ?></td>
                                        <td><?php echo $age; ?></td>
                                        <td><?php echo $app_time; ?></td>
                                        <td><?php echo $app_date; ?></td>
                                        <td><?php echo $patstatus; ?></td>
                                        <td><a href="javascript:void()" data-toggle="modal" data-target="#myModal<?php echo $pageSl;?>"
                                         class="<?php echo $fcol;?>" title="<?php echo $app_status;?>">
										<?php echo $app_status; ?></a>
                                        	<?php 
											$attr=array(
												"class"=>'form-horizontal form-label-left',
												"name"=>'valform'
											);
											echo form_open_multipart('index/update_appointment',$attr);?>
                                        	<div id="myModal<?php echo $pageSl;?>" class="modal fade" role="dialog">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content" style="border:none">
                                                      <div class="modal-header" style="border-radius:0; background:<?php echo $bg; ?>; color:#fff">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title" style="border:none">Change Payment Status</h4>
                                                      </div>
                                                      <div class="modal-body col-sm-12" style="border:none; float:left; margin:10px 0;">
                                                      	<div class="form-group">
                                                        	<label class="contorl-label col-sm-4">Change Patient Status</label>
                                                       		<div class="col-sm-6">
                                                        	<input type="hidden" name="patient_id" value="<?php echo $patient_id;?>" />
                                                            <input type="hidden" name="app_id" value="<?php echo $app_id;?>" />
                                                            <input type="hidden" name="doctor_id" value="<?php echo $doctid;?>" />
                                                        	<select name="app_status" id="app_statusEdit" class="form-control" required>
                                                                       <option value="<?php echo $app_status;?>"><?php echo $app_status;?></option>
                                                                       <option value="Pending">Pending</option>    
                                                                       <option value="Paid">Paid</option>                        
                                                            </select>		
                                                        </div>
                                                        </div>
                                                        <div class="form-group">
                                                        	<div class="col-sm-3 col-sm-offset-8">
                                                                <input type="submit" name="submit" class="btn btn-success" value="Submit" />
                                                            </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                      </div>
                                                    </div>
                                                
                                                  </div>
                                                </div>
                                            <?php echo form_close();?>

                                        </td>
                                        
                                         <td> 
                                          <?php if($this->session->userdata('userType')=='Doctor' || $this->session->userdata('userType')=='Admin'){
											  if($queryDept->num_rows() == 0){
											  ?>                                         	
                                            <a href="<?php echo base_url("index/patAppointHistory/".$app_id.'~'.$patient_id);?>" 
                                           class="btn btn-primary btn-sm" style="padding:5px 7px;" title="Get Patient History"><span class="glyphicon glyphicon-hourglass"></span> </a>
                                          <?php 
											  }
										  	}
										 ?> 
                                            <a href="<?php echo base_url('index/set_appointment/'.$patient_id);?>" 
                                         class="btn btn-warning btn-sm" style="padding:5px 7px;" title="View Calender">
          									<span class="glyphicon glyphicon-calendar"></span> </a> 
                                            <a href="<?php echo base_url('index/patient_details/'.$patient_id);?>" 
                                            class="btn btn-info btn-sm" style="padding:5px 7px;" title="View Details">
          									<span class="glyphicon glyphicon-list-alt"></span> </a> 
                                            <a href="<?php echo base_url('index/update_pat_info/'.$patient_id);?>" 
                                            class="btn btn-success btn-sm" style="padding:5px 7px;" title="Edit Record">
          									<span class="glyphicon glyphicon-edit"></span> </a>
                                            <?php /*?><a href="javascript:void();" onclick="openPage1('<?php echo $id;?>','registration','id');" 
                                           class="btn btn-danger btn-sm" style="padding:5px 7px;" title="Delete Record"><span class="glyphicon glyphicon-trash"></span> </a><?php */?>
                                           
                                           
                                           
                                          
                                            </td>
                                      </tr>
                                    <?php
                                    endforeach;
									?>  
                                      	<tr>
                                      		<td colspan="12"><div id="paginationData" class="tsc_pagination" style="margin:auto; width:100%">
                                                  <ul><?php echo "<li>". $pagination."</li>"; ?></ul>
                                           </div></td>
                                        </tr>
                                    </tbody>
                                  </table>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('.date-picker').daterangepicker({
                                singleDatePicker: true,
                                calender_style: "picker_4"
                            }, function (start, end, label) {
                                console.log(start.toISOString(), end.toISOString(), label);
                            });
                        });
                    </script>

                </div>
                
                
                
                
 <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="border-radius:0; background:#DF8813; color:#fff">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Payment Status</h4>
      </div>
      <div class="modal-body">
      	<select name="app_status" id="app_statusEdit" class="form-control" required>
                       <option value="Pending">Pending</option>    
                       <option value="Paid">Paid</option>                        
                  </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>