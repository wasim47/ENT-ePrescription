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


/*$(document).ready(function(){
	$("#patient_name").keyup(function(){
		var pname = $("#patient_name").val();	
		$.ajaxSetup({
			cache: false
		});
		$.ajax({
			   type: "GET",
			    url: "<?php echo base_url('index/GetCountryName');?>?keyword="+pname,
			    data: {},
				dataType: "json",
				success: function (data) {
					alert(data);
				},
				error: function() {
				  alert("There was an error. Try again please!");
				}
		 });
	});
});*/
</script>
<div class="right_col" role="main">
<div class="">

                    <div class="page-title">
                            <div class="col-md-12 col-sm-12 col-lg-12" style="margin:0; padding:0">
                               <div class="col-sm-12 col-md-3 col-lg-4" style="float:left; margin:0; padding:0;">
								<?php echo form_open('','style="float:left; width:100%"');?>
                                        <select name="reg_no" class="form-control" style="width:81%; float:left">
                                    	<option value="">Hospital Registration No.</option>
                                        <?php
										$patientTable = $this->Index_model->getAllItemTable('registration','','','','','id','desc');
										foreach($patientTable->result() as $pat){
										$hos_reg_number = $pat->hos_reg_number;
										?>
                                        <option value="<?php echo $pat->hos_reg_number;?>"><?php echo $hos_reg_number;?></option>
                                        <?php
                                        }
										?>
                                    </select>
                                         <input class="btn btn-default" value="Go"  type="submit">
								<?php echo form_close();?>
                               </div>
                               <div class="col-sm-12 col-md-3 col-lg-4" style="float:left; margin:0; padding:0;">
								<?php echo form_open('','style="float:left; width:100%"');?>
                                	
                                    <select name="symptom" class="form-control" style="width:81%; float:left">
                                    	<option value="">Symptom</option>
                                        <?php
										$diagonosissymptom = $this->Index_model->getAllItemTable('symptom','','','','','sym_id','desc');
										foreach($diagonosissymptom->result() as $symp){
										$sympName = $symp->symptom;
										?>
                                        <option value="<?php echo $symp->sym_id;?>"><?php echo $sympName;?></option>
                                        <?php
                                        }
										?>
                                    </select>
                                         <input class="btn btn-default" value="Go"  type="submit">
								<?php echo form_close();?>
                               </div>
                               
                               
                               
                               
                             
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12" style="margin:0; padding:0; margin-top:5px;">
                                
                                <div class="col-sm-12 col-md-3 col-lg-4" style="float:left; margin:0; padding:0;">
								<?php echo form_open('','style="float:left; width:100%"');?>
                                       <select name="patient_name" class="form-control" style="width:81%; float:left">
                                    	<option value="">Patient Name</option>
                                        <?php
										$patientTable = $this->Index_model->getAllItemTable('registration','','','','','id','desc');
										foreach($patientTable->result() as $pat){
										$patient_name = $pat->patient_name;
										?>
                                        <option value="<?php echo $pat->id;?>"><?php echo $patient_name;?></option>
                                        <?php
                                        }
										?>
                                    </select>
                                         <input class="btn btn-default" value="Go"  type="submit">
								<?php echo form_close();?>
                               </div>
                               <div class="col-sm-12 col-md-3 col-lg-4" style="float:left; margin:0; padding:0;">
								<?php echo form_open('','style="float:left; width:100%"');?>
                                        <select name="patient_id" class="form-control" style="width:81%; float:left">
                                    	<option value="">Patient Id</option>
                                        <?php
										$patientTable = $this->Index_model->getAllItemTable('registration','','','','','id','desc');
										foreach($patientTable->result() as $pat){
										$patient_id = $pat->patient_id;
										?>
                                        <option value="<?php echo $pat->patient_id;?>"><?php echo $patient_id;?></option>
                                        <?php
                                        }
										?>
                                    </select>
                                         <input class="btn btn-default" value="Go"  type="submit">
								<?php echo form_close();?>
                               </div>
                               <div class="col-sm-12 col-md-3 col-lg-4" style="float:left; margin:0; padding:0;">
								<?php echo form_open('','style="float:left; width:100%"');?>
                                        
                                       <input type="hidden" name="reganddate" value="1" />
                                         <input type="text" class="form-control date-picker" name="from_date" placeholder="From Date" 
                                         style="width:41%; float:left">
                                         <input type="text" class="form-control date-picker" name="to_date" placeholder="To Date" 
                                         style="width:40%; float:left">
                                         <input class="btn btn-default" value="Go"  type="submit">
								<?php echo form_close();?>
                               </div>
                             
                               
                             
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
                                        <th width="12%">Diagonosis</th>
                                        <th width="4%">Age</th>
                                        <th width="8%">Gender</th>
                                        <th width="17%">Age at presentation</th>
                                        <th width="18%">Symptom</th>
                                        <th width="14%">Presenting Sign</th>
                                        <th width="14%">Treatment</th>
                                        <th width="11%">Action</th>
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
									$gender=$patient->gender;
									$age=$patient->age;
									$queryData = $this->db->query("select diagnosis from medicine_card where patient_id='".$patient_id."'");
								
								/*
								$queryData = $this->db->query("
								(select diagonosis,	treatment from abdominalpain where patient_id='".$patient_id."')
								UNION
								(select diagonosis,	treatment from acutedairrhea where patient_id='".$patient_id."')
								UNION
								(select diagonosis,	treatment from acutejandus where patient_id='".$patient_id."')
								UNION
								(select diagonosis,	treatment from chronicdiarrhea where patient_id='".$patient_id."')
								UNION
								(select diagonosis,	treatment from chronicjaundice where patient_id='".$patient_id."')
								UNION
								(select diagonosis,	treatment from liverbiopsy where patient_id='".$patient_id."')
								UNION
								(select diagonosis,	treatment from lowerbleeding where patient_id='".$patient_id."')
								UNION
								(select diagonosis,	treatment from neonatalcholestasis where patient_id='".$patient_id."')
								UNION
								(select diagonosis,	treatment from pem where patient_id='".$patient_id."')
								UNION
								(select diagonosis,	treatment from spaceoccupyinglesion where patient_id='".$patient_id."')
								UNION
								(select diagonosis,	treatment from storagedisease where patient_id='".$patient_id."')");*/
								foreach($queryData->result() as $row);
								$diagonosisId=$row->diagonosis;
								
									$diagonosissymptom = $this->Index_model->getAllItemTable('symptom','sym_id',$sym_id,'','','sym_id','desc');
									if($diagonosissymptom->num_rows() > 0){
									foreach($diagonosissymptom->result() as $symp);
									$sympName = $symp->symptom;
									}
									else{
										$sympName='';
									}
									?>
                                      <tr>
                                        <td><?php echo $pageSl;?></td>
                                        <td><?php echo $age; ?></td>
                                        <td><?php echo ucfirst($gender); ?></td>
                                        <td><?php echo $patient_name; ?></td>
                                        <td><?php echo $sympName; ?></td>
                                        <td><?php echo $sympName; ?></td>
                                        <td><?php echo $treatment; ?></td>
                                         <td> 
                                         <a href="<?php echo base_url('index/patient_details/'.$id);?>" class="btn btn-default btn-sm">
          									<span class="glyphicon glyphicon-edit"></span> Details</a> 
                                           <a href="javascript:void();" onclick="openPage1('<?php echo $id;?>','registration','id');" 
                                           class="btn btn-default btn-sm"><span class="glyphicon glyphicon-remove-circle"></span> Remove </a>
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