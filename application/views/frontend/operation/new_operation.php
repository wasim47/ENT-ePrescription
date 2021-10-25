<?php
if($operationUpdate->num_rows()>0){
  foreach($operationUpdate->result() as $doctorinfo);
	  $appointment_id=$doctorinfo->appointment_id;
	  $patient_id=$doctorinfo->patient_id;
	  $doc_id=$doctorinfo->doc_id;
	  $operaton_date=$doctorinfo->operaton_date;
	  $operation_time=$doctorinfo->operation_time;
	  $status=$doctorinfo->status;
	  
	  $query = $this->db->query("SELECT * FROM doctors_list WHERE doc_id='".$doc_id."'");
	  $drow = $query->row_array();
	  $doctorname = $drow['doc_name'];
}
else{
	$appointment_id='';
	$patient_id=set_value('patient_id');
	$doc_id=set_value('doc_id');
	$operaton_date=set_value('operaton_date');
	$operation_time=set_value('operation_time');
	$status=set_value('status');
	$doctorname='';
}
?>

<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Operation Details</h3>
                        </div>
                        
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                              <div class="x_content">
                                <?php echo $this->session->flashdata('successMsg');?>
                                <?php 
								$attr=array(
									"class"=>'form-horizontal form-label-left',
									"name"=>'valform'
								);
								echo form_open_multipart('index/operation_registration',$attr);?>
                                   <div id="registration_form">	
                                  	  <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><h4 class="panel-title">
                                                   Operation Information </h4></a>
                                            </div>
                                            
                                           
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                       				<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Patient ID
                                            <span style="color:#f00">*</span>                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="patient_id" class="form-control col-md-7 col-xs-12"  readonly="readonly"
                                                placeholder='Patient ID' value="<?php echo $patient_id; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Patient ID'">
                                            </div>
                                        </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Doctor Name</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                               <input type="text" name="doc_name" id="doc_name" class="form-control col-md-7 col-xs-12"
                                                               readonly="readonly" value="<?php echo $doctorname; ?>" >
                                                                
                                                                <input type="hidden" name="doc_id" readonly="readonly" value="<?php echo $doc_id; ?>" >
                                                            </div>
                                                        </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Operation Date</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input class="form-control col-md-7 date-picker" type="text" name="operaton_date"
                                                                placeholder='Operation Date' onFocus="this.placeholder=''" 
                                                                onBlur="this.placeholder='Operation Date'" value="<?php echo $operaton_date; ?>">
                                                                <?php echo form_error('operaton_date', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                            </div>
                                                        </div>    
                                          			<div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Operation Time</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input class="form-control col-md-7 col-xs-12" type="text" name="operation_time"
                                                                placeholder='HH:MM' onFocus="this.placeholder=''" 
                                                                onBlur="this.placeholder='HH:MM'" value="<?php echo $operation_time; ?>">
                                                                <?php echo form_error('operation_time', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                            </div>
                                                        </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Operation Status</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                               <select name="status" class="form-control">
                                                               		<option value="<?php echo $status;?>"><?php echo $status;?></option>
                                                                    <option value="Pending">Pending</option>
                                                                    <option value="Proccessing">Proccessing</option>
                                                                    <option value="Operation Confirm">Operation Confirm</option>
                                                                    <option value="Operation Complete">Operation Complete</option>
                                                               </select>
                                                                <?php echo form_error('status', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                            </div>
                                                        </div>
                                                       
                                                        
                                                        
                                                
                                                
                                                
                                                
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                   </div> 
                                  
                                   <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-sm-offset-5">
                                        	<input type="hidden" name="operation_id" value="<?php echo $appointment_id;?>" />
                                             <input type="submit" name="registration" class="btn btn-success" value="Submit" style="font-size:18px">
                                        </div>
                                    </div>
                                    
                                    
                                    
                                   
                               <?php echo form_close();?>
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
               