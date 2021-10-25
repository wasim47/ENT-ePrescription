<script type="text/JavaScript">
function openPage1(pid,tablename,colid)
{
	var b = window.confirm('Are you sure, you want to Delete This ?');
	if(b==true){
		$.ajax({
			   type: "GET",
			   url: '<?php echo base_url()?>index/deleteData/'+tablename+'/'+colid,
			   data: "deleteId="+pid,
			   success: function() {
				  alert("Successfully saved");
				  window.location.reload(true);
				},
				error: function() {
				  alert("There was an error. Try again please!");
				}
		 });
	}
	else{
	 return;
	}
	 
}
</script>
<div class="right_col" role="main">
<div class="">
                    <div class="row">




    





                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_content">
                                 <div class="x_title" style="width:100%;float:right; text-align:right">
                                	<a href="<?php echo base_url('index/set_appointment/');?>" class="btn btn-success" style="font-size:18px">
          									<span class="glyphicon glyphicon-edit" style="color:#fff"></span> View All Booking in Calender</a> 
                                </div>
                                <div class="container">
                                  <table class="table table-striped" width="100%">
                                    <thead>
                                      <tr>
                                        <th width="2%" height="28">SI</th>
                                        <th width="26%">Patient Name</th>
                                        <th width="11%">Patient ID</th>
                                         <th width="9%">Age</th>
                                        <th width="10%">App Time</th>
                                        <th width="11%">App Date</th>
                                        <th width="11%">Status</th>                                       
                                        <th width="20%">Action</th>
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
									$patient_id=$patient->patient_id;
									$age=$patient->age;
									
									$app_time=$patient->app_time;
									$app_date=$patient->app_date;
									$app_status=$patient->app_status;
									
									if($app_status=="Pending"){
										$fcol = 'btn btn-danger';
									}
									elseif($app_status=="Paid"){
										
										$fcol = 'btn btn-success';
									}
									else{
										$fcol = '';
									}

									?>
                                      <tr>
                                        <td><?php echo $pageSl;?></td>
                                        <td><?php echo $patient_name; ?></td>
                                        <td><?php echo $patient_id; ?></td>
                                        <td><?php echo $age; ?></td>
                                        <td><?php echo $app_time; ?></td>
                                        <td><?php echo $app_date; ?></td>
                                        <td><a href="javascript:void()" class="<?php echo $fcol;?>" title="<?php echo $app_status;?>">
										<?php echo $app_status; ?></a></td>
                                        
                                         <td> 
                                            <a href="<?php echo base_url('index/set_appointment/'.$patient_id);?>" 
                                         class="btn btn-warning btn-lg" style="padding:5px 7px;" title="View Calender">
          									<span class="glyphicon glyphicon-calendar"></span> </a> 
                                            <a href="<?php echo base_url('index/patient_details/'.$patient_id);?>" 
                                            class="btn btn-info btn-lg" style="padding:5px 7px;" title="View Details">
          									<span class="glyphicon glyphicon-list-alt"></span> </a> 
                                            <a href="<?php echo base_url('index/update_pat_info/'.$patient_id);?>" 
                                            class="btn btn-success btn-lg" style="padding:5px 7px;" title="Edit Record">
          									<span class="glyphicon glyphicon-edit"></span> </a>
                                            <a href="javascript:void();" onclick="openPage1('<?php echo $id;?>','registration','id');" 
                                           class="btn btn-danger btn-lg" style="padding:5px 7px;" title="Delete Record"><span class="glyphicon glyphicon-trash"></span> </a>
                                            </td>
                                      </tr>
                                    <?php
                                    endforeach;
									?>  
                                      <tr>
                                      	<td colspan="12"><div id="paginationData" class="tsc_pagination" style="margin:auto; width:100%">
                                                  <ul><?php echo "<li>". $pagination."</li>"; ?></ul>
                                           </div>
                                        </td>
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