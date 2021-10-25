<?php
$std_name=$patient_info['patient_name'];
$student_id=$patient_info['patient_id'];

$paid_amount=$payment_list['paid_amount'];	
$payable_amount=$payment_list['payable_amount'];			
$totalDueamount=$payable_amount-$paid_amount;	
?>
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
                                    <h3 style="padding:5px 0 0 0; text-align:left; float:left; width:50%">Patient Name : <?php echo $std_name;?></h3>
                                    <h3 style="padding:5px 10px 0 0; text-align:right; float:left; width:50%"> Patient ID : <?php echo $student_id;?></h3>
                                    <div class="clearfix"></div>
                                   
                                </div>
                                <div class="x_content">
                                <div style="width:100%"><?php echo $this->session->flashdata('successMsg');?></div>
                                <div class="container">
                                 	
                                    <table class="table table-striped" width="100%">
                                    
                                    
                                      <tr>
                                         <th>SI</th>
                                         <th>Paid Amount</th>
                                         <th>Amount in Word</th>
                                         <th>Serial Number</th>
                                         <th>Payment Date</th>
                                      </tr>
                                    <?php
                                    $i=0;
                                    foreach($installment_list->result() as $currow){
                                    $pay_id=$currow->pay_id;
                                    $amount=$currow->amount;
								    $amount_in_word=ucfirst($currow->amount_in_word);
									$serial_no=$currow->serial_no;
                                    $paid_date=$currow->paid_date;
                                    if($i%2==0){
                                        $clr='#ccc';
                                    }
                                    else{
                                        $clr='#eaeaea';
                                    }
                                    $i++;
                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $amount.' TK'; ?></td>
                                        <td><?php echo $amount_in_word; ?></td>
                                        <td><?php echo $serial_no; ?></td>
                                        <td><?php echo $paid_date; ?></td>
                                    </tr>
                                    
                                    <?php
                                    }	
                                    ?>
                                    </table>
                                    <table class="table table-striped" width="100%" cellpadding="0" cellspacing="0">
                                        <tr bgcolor="#f5f5f5">
                                         <th width="1%" align="center">&nbsp;</th>
                                         <th width="23%" align="left"><h3 style="padding:5px 0 0 0; color:#990">
                                         Payable Amount : <?php echo $payable_amount.' TK';?></h3></th>
                                         <th width="19%" align="left"><h3 style="padding:5px 0 0 0; color:#063">
                                         Paid Amount : <?php echo $paid_amount.' TK';?></h3></th>
                                         <th width="19%" align="left"><h3 style="padding:5px 0 0 0; color:#f00">
                                         Due Amount : <?php echo $totalDueamount.' TK';?></h3></th>
                                      </tr>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 