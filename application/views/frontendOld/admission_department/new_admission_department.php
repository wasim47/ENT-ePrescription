<?php
if($admission_departmentUpdate->num_rows()>0){
	foreach($admission_departmentUpdate->result() as $doctorinfo);
		$doc_id=$doctorinfo->doc_id;
		$doc_name=$doctorinfo->doc_name;
		$mobile=$doctorinfo->mobile;
		$email=$doctorinfo->email;
		$password=$doctorinfo->password;
}
else{
	$doc_id='';
	$doc_name=set_value('username');
	$email=set_value('email');
	$password=set_value('password');
	$mobile=set_value('mobile');
}
?>

<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Department Admin Registration Details</h3>
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
								echo form_open_multipart('index/admission_department_registration',$attr);?>
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
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Department Admin Name
                                            <span style="color:#f00">*</span>                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="doc_name" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Doctor Name' value="<?php echo set_value('doc_name'); ?>"  onFocus="this.placeholder=''" onBlur="this.placeholder='Doctor Name'">
                                             <?php echo form_error('doc_name', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Mobile No<span style="color:#f00">*</span></label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                             <input type="text" name="mobile" id="mobile" required class="form-control col-md-7 col-xs-12"
                                                                placeholder='Mobile No' onFocus="this.placeholder=''" value="<?php echo set_value('mobile'); ?>" onBlur="this.placeholder='Mobile No'">
                                                                 <?php echo form_error('mobile', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                            </div>
                                                        </div>
                                                        
                                          				<?php /*?><div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Photo</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                             <input type="file" name="docphoto" id="docphoto" class="form-control col-md-7 col-xs-12">
                                                               
                                                            </div>
                                                        </div><?php */?>
                                                       
                                                        
                                          
                                                       <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email<span style="color:#f00">*</span></label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input class="form-control col-md-7 col-xs-12" type="email" name="email"
                                                                placeholder='Email' onFocus="this.placeholder=''" onBlur="this.placeholder='Email'"
                                                                 value="<?php echo set_value('email'); ?>">
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
               