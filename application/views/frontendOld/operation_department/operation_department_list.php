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

                    <div class="page-title">
                            
                            <div class="col-md-12 col-sm-12 col-lg-12" style="margin:0; padding:0; margin-top:5px;">
                                
                                <div class="col-sm-12 col-md-3 col-lg-4" style="float:left; margin:0; padding:0;">
								<?php echo form_open('','style="float:left; width:100%"');?>
                                       <select name="department_name" class="form-control" style="width:81%; float:left">
                                    	<option value="">Department Name</option>
                                        <?php
										$patientTable = $this->Index_model->getAllItemTable('symptom','','','','','sym_id','desc');
										foreach($patientTable->result() as $pat){
										$department = $pat->symptom;
										?>
                                        <option value="<?php echo $pat->sym_id;?>"><?php echo $department;?></option>
                                        <?php
                                        }
										?>
                                    </select>
                                         <input class="btn btn-default" value="Go"  type="submit">
								<?php echo form_close();?>
                               </div>
                               <div class="col-sm-12 col-md-3 col-lg-4" style="float:left; margin:0; padding:0;">
								<?php echo form_open('','style="float:left; width:100%"');?>
                                       <input type="text" name="keyword" class="form-control" />
                                         <input class="btn btn-default" value="Go"  type="submit">
								<?php echo form_close();?>
                               </div>
                               <?php /*?><div class="col-sm-12 col-md-3 col-lg-4" style="float:left; margin:0; padding:0;">
								<?php echo form_open('','style="float:left; width:100%"');?>
                                        
                                       <input type="hidden" name="reganddate" value="1" />
                                         <input type="text" class="form-control date-picker" name="from_date" placeholder="From Date" 
                                         style="width:41%; float:left">
                                         <input type="text" class="form-control date-picker" name="to_date" placeholder="To Date" 
                                         style="width:40%; float:left">
                                         <input class="btn btn-default" value="Go"  type="submit">
								<?php echo form_close();?>
                               </div><?php */?>
                             
                               
                             
                            </div>
                            
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">




    





                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_content">
                                 <div class="x_title">
                                	<div style="width:100%; text-align:right">
										<?php echo form_open('index/summery');?>
                                        	<?php 
											if(isset($_REQUEST['reg_no'])){?>
                                            	<input type="hidden" name="keyword" value="<?php echo $_REQUEST['reg_no'];?>" />.
                                            <?php
											}
											elseif(isset($_REQUEST['symptom'])){?>
                                            	<input type="hidden" name="keyword" value="<?php echo $_REQUEST['symptom'];?>" />.
                                            <?php
											}
											elseif(isset($_REQUEST['patient_name'])){?>
                                            	<input type="hidden" name="keyword" value="<?php echo $_REQUEST['patient_name'];?>" />.
                                            <?php
											}
											elseif(isset($_REQUEST['patient_id'])){?>
                                            	<input type="hidden" name="keyword" value="<?php echo $_REQUEST['patient_id'];?>" />.
                                            <?php
											}
											?>
                                        	<!--<input type="submit" name="summery" value="Get Summery" class="btn btn-primary" />-->
                                        <?php echo form_close();?>
                                    </div>
                                </div>
                                <div class="container">
                                  <table class="table table-striped" width="100%">
                                    <thead>
                                      <tr>
                                        <th width="2%">SI</th>
                                        <th width="25%">Doctor Name</th>
                                        <th width="12%">Mobile</th>
                                       <!-- <th width="11%">Department</th>
                                        <th width="12%">Specialty</th>
                                        <th width="15%">Designation</th>
                                        <th width="7%">BMDC</th>-->
                                        <th width="16%">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                <?php
									$i=0;
                                    foreach($operation_department_list->result() as $doctorinfo):
									$doc_id=$doctorinfo->doc_id;
									$doc_name=$doctorinfo->doc_name;
									$mobile=$doctorinfo->mobile;
									//$department=$doctorinfo->department;
									//$specialty=$doctorinfo->specialty;
									//$designation=$doctorinfo->designation;
									//$bmdc=$doctorinfo->bmdc;
									$i++;
									?>
                                      <tr>
                                        <td><?php echo $i;?></td>
                                        <td><?php echo ucfirst($doc_name); ?></td>
                                        <td><?php echo $mobile; ?></td>
                                       <?php /*?> <td><?php echo $department; ?></td>
                                        <td><?php echo $specialty; ?></td>
                                        <td><?php echo $designation; ?></td>
                                        <td><?php echo $bmdc; ?></td><?php */?>
                                         <td> 
                                         <a href="<?php echo base_url('index/operation_department_registration/'.$doc_id);?>" class="btn btn-default btn-sm">
          									<span class="glyphicon glyphicon-edit"></span> Edit</a> 
                                            
                                           <a href="javascript:void();" onclick="openPage1('<?php echo $doc_id;?>','registration','id');" 
                                           class="btn btn-default btn-sm"><span class="glyphicon glyphicon-remove-circle"></span> Remove </a>
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