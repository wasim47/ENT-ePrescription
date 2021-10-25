<script type="text/javascript" src="<?php echo base_url('asset/js/jquery.min.js');?>"></script>
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
<div class="clearfix"></div>
                    <div class="row">




    





                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_content">
                                  <div class="container">
                                  <table class="table table-striped" width="100%">
                                    <thead>
                                      <tr>
                                        <th width="2%">SI</th>
                                        <th width="18%">Patient ID</th>
                                        <th width="18%">Doctor Name</th>
                                        <th width="14%">Operation Date</th>
                                        <th width="13%">Operation Time</th>
                                        <th width="18%">Operation Status</th>
                                        <th width="17%">Actione</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                <?php
									$i=0;
                                    foreach($operation_list->result() as $doctorinfo):
									$i++;
									$appointment_id=$doctorinfo->appointment_id;
									$doc_id=$doctorinfo->doc_id;
									$patient_id=$doctorinfo->patient_id;
									$operaton_date=$doctorinfo->operaton_date;
									$operation_time	=$doctorinfo->operation_time	;
									$status=$doctorinfo->status;
									
									$query = $this->db->query("SELECT * FROM doctors_list WHERE doc_id='".$doc_id."'");
									$drow = $query->row_array();
									?>
                                      <tr>
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $patient_id;?></td>
                                        <td><?php echo ucfirst($drow['doc_name']); ?></td>
                                        <td><?php echo $operaton_date; ?></td>
                                        <td><?php echo $operation_time;?></td>
                                        <td><?php echo $status;?></td>
                                         <td> 
                                         <a href="<?php echo base_url('index/operation_registration/'.$appointment_id);?>" class="btn btn-info btn-sm">
          									<span class="glyphicon glyphicon-edit"></span></a> 
                                            
                                           <a href="javascript:void();" onclick="openPage1('<?php echo $appointment_id;?>','operation','appointment_id');" 
                                           class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove-circle"></span> </a>
                                            </td>
                                      </tr>
                                    <?php
                                    endforeach;
									?>  
                                      
                                    </tbody>
                                  </table>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>