<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Payment Details</h3>
                        </div>
                        
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">


                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Payment  Form</h2>
                                    <h2 style="text-align:right; float:right"><a href="<?php echo base_url('index/payment_print/print');?>" onclick="javascript:void window.open('<?php echo base_url('index/payment_print/print');?>','','width=1200,height=900,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=200,top=30');return false;"><i class="fa fa-print"></i> Print</a></h2>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                <?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');?>
                                   <div class="col-sm-12">	
                                  	  	<div class="col-sm-4" style="border:1px solid #ccc; border-right:none;"><h4>Particulars</h4></div>
                                        <div class="col-sm-2" style="border:1px solid #ccc; border-right:none;"><h4>Total Amount</h4></div>
                                        <div class="col-sm-2" style="border:1px solid #ccc; border-right:none;"><h4>Paid Amount</h4></div>
                                        <div class="col-sm-2" style="border:1px solid #ccc; border-right:none;"><h4>Due Amount</h4></div>
                                        <div class="col-sm-2" style="border:1px solid #ccc;"><h4>Current Pay</h4></div>
                                   </div>
                                   <div class="col-sm-12" style="min-height:200px">	
                        <div class="col-sm-4" style="border:1px solid #ccc;min-height:200px"><?php echo $doctorid;?></div>
                        <div class="col-sm-2" style="border:1px solid #ccc; border-left:none;min-height:200px"><h4><?php echo $total_amount.' TK';?></h4></div>
                        <div class="col-sm-2" style="border:1px solid #ccc; border-left:none;min-height:200px"><h4><?php echo $paid_amount.' TK';?></h4></div>
                        <div class="col-sm-2" style="border:1px solid #ccc; border-left:none;min-height:200px"><h4><?php echo $due_amount.' TK';?></h4></div>
                        <div class="col-sm-2" style="border:1px solid #ccc; border-left:none;min-height:200px"><h4><?php echo $pay_amount.' TK';?></h4></div>
                                   </div> 
                               <?php echo form_close();?>
                                </div>
                            </div>
                        </div>
                    </div>

                   
                </div>
               