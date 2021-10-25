<?php
if($drugUpdate->num_rows()>0){
	foreach($drugUpdate->result() as $drugData);
	$d_id=$drugData->d_id;
	$drugTitle=$drugData->drug_name;
	$details=$drugData->details;
	$genericname=$drugData->genericname;
}
else{
	$d_id='';
	$drugTitle=set_value('drug');
	$details=set_value('details');
	$genericname='';
}
?>
<style>
select option{
	padding:5px;
	cursor:pointer;
}
</style>
<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Drug Details</h3>
                        </div>
                        
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">




    





                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Drug Insertion Form</h2>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                <?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');?>
                                   <div id="registration_form">	
                                  	  <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><h4 class="panel-title">
                                                   Drug Information </h4></a>
                                            </div>
                                            
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                        			    <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Drug<span class="required">*</span>
                                            </label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="text" name="drug" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Drug' value="<?php echo $drugTitle; ?>"  onFocus="this.placeholder=''" onBlur="this.placeholder='Drug'">
                                             <?php echo form_error('drug', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                            	<label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Category</label>
                                                <select name="depert_id" class="form-control" style="width:60%; margin-bottom:5px">
                                                	<option value="">Drug Category</option>
                                                    <?php foreach($category_list->result() as $sympt):
															echo '<option value="'.$sympt->d_id.'">'.$sympt->drug_category_name.'</option>';
														endforeach;
													?>
                                                    
                                                </select>
                                                 <?php echo form_error('depert_id', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Generic Name<span class="required">*</span>
                                            </label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="text" name="genericname" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Generic Name'  onFocus="this.placeholder=''" onBlur="this.placeholder='Generic Name'" value="<?php echo $genericname; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Drug Details<span class="required">*</span>
                                            </label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <textarea type="text" name="details" class="form-control col-md-7 col-xs-12" 
                                                placeholder='drug Details'  onFocus="this.placeholder=''" onBlur="this.placeholder='drug Details'"><?php echo $details; ?></textarea>
                                            </div>
                                        </div>
                                                        
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        
                               	     </div>
                                   </div> 
                                    
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <input type="hidden" name="d_id" value="<?php echo $d_id; ?>">
                                            <input type="reset" class="btn btn-primary" value="Reset">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
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
               