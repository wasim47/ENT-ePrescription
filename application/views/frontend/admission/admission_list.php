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
                                 <div class="x_title">
                                	
                                </div>
                                <div class="container">
                                  <table class="table table-striped" width="100%">
                                    <thead>
                                      <tr>
                                        <th width="2%">SI</th>
                                        <th width="11%">Patient ID</th>
                                        <th width="19%">Doctor Name</th>
                                        <th width="13%">Admission Date</th>
                                        <th width="14%">Admission Time</th>
                                        <th width="21%">General Query</th>
                                         <th width="11%">Deasises</th>
                                        <th width="9%">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                <?php
									$i = 0;
                                    foreach($admission_list->result() as $doctorinfo):
									$i++;
									$admit_id=$doctorinfo->admit_id;
									$profname=$doctorinfo->underProf;
									$patient_id=$doctorinfo->patientId;
									$operaton_date=$doctorinfo->admit_date;
									$admission_time	=$doctorinfo->admit_time;
									$deasises=$doctorinfo->deasises;
									$general_query=$doctorinfo->general_query;
									?>
                                      <tr>
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $patient_id;?></td>
                                        <td><?php echo $profname; ?></td>
                                        <td><?php echo $operaton_date; ?></td>
                                        <td><?php echo $admission_time;?></td>
                                        <td><?php echo $general_query;?></td>
                                        <td><?php echo $deasises;?></td>
                                         <td> 
                                         <a href="<?php echo base_url('index/admission_registration/'.$admit_id);?>" class="btn btn-info btn-xs">
          									<span class="glyphicon glyphicon-edit"></span></a> 
                                            
                                           <a href="javascript:void();" onclick="openPage1('<?php echo $admit_id;?>','admission','admit_id');" 
                                           class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove-circle"></span> </a>
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