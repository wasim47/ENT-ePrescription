<?php
if($payment_purposeUpdate->num_rows()>0){
	foreach($payment_purposeUpdate->result() as $payment_purposeData);
	$id=$payment_purposeData->id;
	$purpose_title=$payment_purposeData->purpose_title;
	$rate=$payment_purposeData->rate;
}
else{
	$id='';
	$purpose_title=set_value('purpose_title');
	$rate=set_value('rate');
	}
?>
<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Purpose Details</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">




    





                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                              <div class="x_content">
                                <?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');?>
                              <div id="registration_form">	
                                  	  <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><h4 class="panel-title">
                                                   Purpose Information </h4></a>
                                          </div>
                                            
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                         <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Purpose Title
                                                            <span class="required">*</span></label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" name="purpose_title" required class="form-control col-md-7" 
                                                                placeholder='Purpose Title' value="<?php echo $purpose_title; ?>"  onFocus="this.placeholder=''" 
                                                                onBlur="this.placeholder='Purpose Title'">
                                                             <?php echo form_error('purpose_title', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                            </div>
                                                        </div>
                                                         <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Rate<span class="required">*</span></label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" name="rate" required class="form-control col-md-7" placeholder='Rate' 
                                                                value="<?php echo $rate; ?>" onFocus="this.placeholder=''" onBlur="this.placeholder='Rate'">
                                                             <?php echo form_error('rate', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
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
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
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
               