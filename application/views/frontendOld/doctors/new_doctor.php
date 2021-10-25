<?php
if($doctorsUpdate->num_rows()>0){
	foreach($doctorsUpdate->result() as $doctorinfo);
		$doc_id=$doctorinfo->doc_id;
		$doc_name=$doctorinfo->doc_name;
		$mobile=$doctorinfo->mobile;
		$department=$doctorinfo->department;
		$specialty=$doctorinfo->specialty;
		$designation=$doctorinfo->designation;
		$degree=$doctorinfo->degree;
		$bmdc=$doctorinfo->bmdc;
		$hospital=$doctorinfo->hospital;
		$specialty=$doctorinfo->specialty;
		$working_history=$doctorinfo->working_history;
		$educational_history=$doctorinfo->educational_history;
		$email=$doctorinfo->email;
		$password=$doctorinfo->password;
		$old_patient=$doctorinfo->old_patient;
		$new_patient=$doctorinfo->new_patient;
}
else{
	$doc_id='';
	$doc_name=set_value('username');
	$email=set_value('email');
	$password=set_value('password');
	$specialty=set_value('specialty');
	$designation=set_value('designation');
	$degree=set_value('degree');
	$bmdc=set_value('bmdc');
	$hospital=set_value('hospital');
	$mobile=set_value('mobile');
	$department=set_value('department');
	$working_history=set_value('working_history');
	$educational_history=set_value('educational_history');
	$new_patient=set_value('new_patient');
	$old_patient=set_value('old_patient');
}
?>

<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Doctor Registration Details</h3>
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
								echo form_open_multipart('index/doctors_registration',$attr);?>
                                   <div id="registration_form">	
                                  	  <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><h4 class="panel-title">
                                                   Registration Information </h4></a>
                                            </div>
                                            
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                        			    <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Doctor Name
                                            <span style="color:#f00">*</span>                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="doc_name" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Doctor Name' value="<?php echo $doc_name; ?>"  onFocus="this.placeholder=''" onBlur="this.placeholder='Doctor Name'">
                                             <?php echo form_error('doc_name', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Mobile No<span style="color:#f00">*</span></label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                             <input type="text" name="mobile" id="mobile" required class="form-control col-md-7 col-xs-12"
                                                                placeholder='Mobile No' onFocus="this.placeholder=''" value="<?php echo $mobile; ?>" onBlur="this.placeholder='Mobile No'">
                                                                 <?php echo form_error('mobile', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">BMDC No.</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                             <input type="text" name="bmdc" id="bmdc" class="form-control col-md-7 col-xs-12"
                                                                placeholder='BMDC No' onFocus="this.placeholder=''" value="<?php echo $bmdc; ?>" onBlur="this.placeholder='BMDC No'">
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Photo</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                             <input type="file" name="docphoto" id="docphoto" class="form-control col-md-7 col-xs-12">
                                                               
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Department<span style="color:#f00">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="department" class="form-control">
                                                	<option value="">Department</option>
                                                    <?php 
													$querydepart = $this->db->query("select * from symptom order by symptom asc");
													foreach($querydepart->result() as $depart){
														$departmentName=$depart->symptom;
														$departmentId=$depart->sym_id;
														echo '<option value="'.$departmentId.'">'.$departmentName.'</option>';
													}
													?>
                                                </select>
                                                
                                                
                                                <?php echo form_error('department', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                        
                                        
                                                     <div class="form-group">
                                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Designation                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" name="designation" id="designation" class="form-control col-md-7 col-xs-12"
                                                                placeholder='Designation' onFocus="this.placeholder=''" value="<?php echo $designation; ?>" 
                                                                onBlur="this.placeholder='Designation'">
                                                  
                                                            </div>
                                                        </div>
                                                       
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Specialty.<span style="color:#f00">*</span></label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input class="form-control col-md-7 col-xs-12" type="text" name="specialty" id="specialty" required
                                                                placeholder='Specialty' onFocus="this.placeholder=''"  value="<?php echo $specialty; ?>"  
                                                                onBlur="this.placeholder='Specialty'">
                                                                <?php echo form_error('specialty', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Degree<span style="color:#f00">*</span></label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input class="form-control col-md-7 col-xs-12" type="text" name="degree" required
                                                                placeholder='Degree' onFocus="this.placeholder=''" onBlur="this.placeholder='Degree'" 
                                                                value="<?php echo$degree; ?>">
                                                                <?php echo form_error('degree', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Hospital 
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input class="date-picker form-control col-md-7 col-xs-12" name="hospital" id="hospital" type="text"
                                                                placeholder='Hospital' onFocus="this.placeholder=''" onBlur="this.placeholder='Hospital'"  
                                                                value="<?php echo $hospital; ?>" > 
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender<span style="color:#f00">*</span></label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <div id="gender" class="btn-group">
                                                                
                                                                    <label class="btn btn-success" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                        <input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
                                                                    </label>
                                                                    <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                        <input type="radio" name="gender" value="female"> Female
                                                                    </label>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Working Details</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <textarea name="working_history" class="form-control col-md-7 col-xs-12" placeholder='Working Details'><?php echo $working_history; ?></textarea>
                                                            </div>
                                                        </div>
                                                
                                                     <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Educational Details</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <textarea name="educational_history" class="form-control col-md-7 col-xs-12" placeholder='Educational Details'><?php echo $educational_history; ?></textarea>
                                                            </div>
                                                        </div>
                                                
                                                
                                                
                                                
                                                
                                                
                                                <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Consultancy Fee</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                        	<div class="col-md-12 col-sm-12 col-xs-12">
                                                            <input name="new_patient" class="form-control col-md-7" style="margin-bottom:5px;" 
                                                            placeholder='New Patient Fee' value="<?php echo $new_patient; ?>">
                                                            </div>
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <input name="old_patient" class="form-control col-md-7" 
                                                            placeholder='Old Patient Fee' value="<?php echo $old_patient; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                       <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email<span style="color:#f00">*</span></label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input class="form-control col-md-7 col-xs-12" type="email" name="email"
                                                                placeholder='Email' onFocus="this.placeholder=''" onBlur="this.placeholder='Email'"
                                                                 value="<?php echo $email; ?>">
                                                                <?php echo form_error('email', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                            </div>
                                                        </div>
                                                         <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Password<span style="color:#f00">*</span></label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input class="form-control col-md-7 col-xs-12" type="password" name="password" 
                                                                value="<?php echo set_value('password'); ?>">
                                                                <?php echo form_error('password', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
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
                                             <input type="submit" name="registration" class="btn btn-success" value="Submit" style="font-size:18px">
                                        </div>
                                    </div>
                                    
                                    
                                    
                                   
                               <?php echo form_close();?>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
               