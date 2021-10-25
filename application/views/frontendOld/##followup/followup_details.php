<div class="right_col" role="main">
                <div class="">

                    
                    <div class="clearfix"></div>
                    <div class="row">



                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2 style="width:80%; float:left; padding:0; margin:0">Follow Up Details</h2>
                                    <h2 style="width:20%; float:right; padding:0; margin:0">
                                    <a href='javascript:void();' id='print' 
               onclick="window.open('<?php echo base_url('index/view_prescription');?>?id=<?php echo $followdetails['id'];?>','','height=900,width=1200,scrollbars=yes')" 
                                    class="btn btn-primary">View Prescriptoin</a>
                                    
                                    </h2>
                                  <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                      <div id="newfollowup">
											<?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');?>
                                               <div id="registration_form">	
                                                         
                                                         
                                                        <div class="form-group">
                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">New Complaints :</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:7px; font-size:16px"><?php echo $followdetails['new_complaints'];?></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        Diagnosis</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:7px; font-size:16px"><?php echo $followdetails['diagnosis'];?></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        Investigation</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:7px; font-size:16px"><?php echo $followdetails['investigatoin'];?></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                                        Treatement Advised :</label>
                                                        
                                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:7px; font-size:16px"><?php echo $followdetails['treatement'];?></div>
                                                    </div>
                                                     <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Advice for admission : </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:7px; font-size:16px"><?php echo $followdetails['advice_admission'];?></div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Next follow up after : </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:7px; font-size:16px">
														<?php echo $followdetails['next_followup_date'];?>
                                                        </div>
                                                        </div>
                                                    
                                                  
                                               </div> 
                                           <?php echo form_close();?>
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
               