<?php
if($admissionUpdate->num_rows()>0){
  foreach($admissionUpdate->result() as $doctorinfo);
	  $admit_id=$doctorinfo->admit_id;
	  $profname=$doctorinfo->underProf;
	  $patient_id=$doctorinfo->patientId;
	  $admit_date=$doctorinfo->admit_date;
	  $admission_time=$doctorinfo->admit_time;
	  $deasises=$doctorinfo->deasises;
	  $general_query=$doctorinfo->general_query;
	  $bed_no=$doctorinfo->bed_no;
}
else{
	$admit_id='';
	$patient_id=set_value('patient_id');
	$profname=set_value('profname');
	$admit_date=set_value('admit_date');
	$admission_time=set_value('admission_time');
	$deasises=set_value('deasises');
	$general_query=set_value('general_query');
	$bed_no=set_value('bed_no');
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
								echo form_open_multipart('index/admission_registration',$attr);?>
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
                                                <input type="text" name="patient_id" class="form-control col-md-7 col-xs-12" readonly="readonly" 
                                                placeholder='Patient ID' value="<?php echo $patient_id; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Patient ID'">
                                            </div>
                                        </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Doctor Name</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                             <input type="text" name="profname" id="profname" readonly="readonly" class="form-control col-md-7 col-xs-12"
                                                                placeholder='Doctor Name' onFocus="this.placeholder=''" 
                                                                value="<?php echo $profname; ?>" onBlur="this.placeholder='Doctor Name'">
                                                            </div>
                                                        </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Admission Date</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input class="form-control col-md-7 col-xs-12" type="text" name="admit_date"
                                                                placeholder='Admission Date' onFocus="this.placeholder=''" 
                                                                onBlur="this.placeholder='Admission Date'" value="<?php echo $admit_date; ?>">
                                                                <?php echo form_error('admit_date', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                            </div>
                                                        </div>    
                                          			<div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Admission Time</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                              <input class="form-control col-md-7 col-xs-12" type="text" name="admission_time"
                                                                placeholder='Operation Time' onFocus="this.placeholder=''" 
                                                                onBlur="this.placeholder='Operation Time'" value="<?php echo $admission_time; ?>">
                                                                <?php echo form_error('admission_time', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                            </div>
                                                        </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Diseases</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                              <input class="form-control col-md-7 col-xs-12" type="text" name="diseases"
                                                                placeholder='Diseases' onFocus="this.placeholder=''" 
                                                                onBlur="this.placeholder='Diseases'" value="<?php echo $deasises; ?>">
                                                                <?php echo form_error('diseases', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                            </div>
                                                        </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">General Query</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                              <textarea class="form-control col-md-7 col-xs-12" type="text" name="general_query"
                                                                placeholder='General Query' onFocus="this.placeholder=''" 
                                                                onBlur="this.placeholder='General Query'"><?php echo $general_query;?></textarea>
                                                            </div>
                                                        </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Bed Type</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                               <select name="bed_type" class="form-control">
                                                               		<option value="Delux">Delux</option>
                                                                    <option value="Shar Kebin">Shar Kebin</option>
                                                                    <option value="Single Bed">Single Bed</option>
                                                               </select>
                                                                <?php echo form_error('bed_type', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Bed No</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                              <input class="form-control col-md-7 col-xs-12" type="text" name="bed_no"
                                                                placeholder='Bed No' onFocus="this.placeholder=''" 
                                                                onBlur="this.placeholder='Bed No'" value="<?php echo $bed_no; ?>">
                                                                <?php echo form_error('bed_no', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
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
                                        	<input type="hidden" name="admit_id" value="<?php echo $admit_id; ?>">
                                             <input type="submit" name="registration" class="btn btn-success" value="Submit" style="font-size:18px">
                                        </div>
                                    </div>
                                    
                                    
                                    
                                   
                               <?php echo form_close();?>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
               