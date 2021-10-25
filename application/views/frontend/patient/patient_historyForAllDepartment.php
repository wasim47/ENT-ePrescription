<script type="text/javascript">
function changedoctortype(symptom){	
		  //alert(symptom);
		  $.ajax({
			   type: "GET",
			   url: '<?php echo base_url()?>index/symptom_details',
			   data: "selectedSymptom="+symptom,
			   success: function(data){
					$('#symptomDetails').html(data);
			   }
		 });
}
</script>
<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Patient Registration Details</h3>
                        </div>
                        
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">




    





                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Patient Registraion Form</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                <?php echo $this->session->flashdata('successMsg');?>
                                <?php 
								$attr=array(
									"class"=>'form-horizontal form-label-left',
									"name"=>'valform'
								);
								echo form_open_multipart('index/registration',$attr);?>
                                   <div id="registration_form1">	
                                  	  <div class="panel-group">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><h4 class="panel-title">
                                                   Department Information </h4></a>
                                            </div>
                                            
                                            <div id="collapseFour" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                        			<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Department
                                            <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="selected_symptom" id="selected_symptom" class="form-control col-md-7 col-xs-12 symptom" 
                                                onchange="changedoctortype(this.value);">
                                            	<option value="">Select Department</option>
                                                <?php 
													$i=0;
													foreach($symptom->result() as $symp):
													$i++;
													if($i%2!=0){
														$bc='#fff';
														$c='#333';
													}
													else{
														$bc='#eaeaea';	
														$c='#1A82C3';
													}
													echo '<option value="'.$symp->pagename.'" style="padding:5px; color:'.$c.'; background-color:'.$bc.'; cursor:pointer; font-weight:bold; font-size:12px;">'.$symp->symptom.'</option>';
													endforeach;
												?>
                                                
                                            </select>
                                             <?php echo form_error('selected_symptom', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                                </div>
                                            </div>
                                            <div class="panel-body"><div id="symptomDetails"></div></div>
                                            
                                        </div>
                                        
                                         <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <input type="submit" name="registration" class="btn btn-success" value="Go to Treatment" style="font-size:18px">
                                        </div>
                                    </div>
                                    </div>
                                   </div> 
                               <?php echo form_close();?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>