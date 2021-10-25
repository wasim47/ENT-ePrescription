<script type="text/JavaScript">
function openPage1(pid,tablename,colid)
{
	var b = window.confirm('Are you sure, you want to Delete This ?');
	if(b==true){
		$.ajax({
			   type: "GET",
			   url: '<?php echo base_url()?>index/deleteData/'+tablename+'/'+colid,
			   data: "deleteId="+pid,
			   success: function() {
				  alert("Successfully saved");
				  window.location.reload(true);
				},
				error: function() {
				  alert("There was an error. Try again please!");
				}
		 });
	}
	else{
	 return;
	}
	 
}
</script>

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
                                    <h2>Total User Payment (<?php echo $consultancy_payment_list->num_rows();?>)</h2>
                                    <h2 style="float:right"><a href="<?php echo base_url('index/consultancy_payment_registration');?>" class="btn btn-primary">New Payment</a></h2>
                                    <div class="clearfix"></div>
                                   
                                </div>
                                <div class="x_content">
                                <div style="width:100%"><?php echo $this->session->flashdata('successMsg');?></div>
                                <div class="container">
                                  <table class="table table-striped" width="100%">
                                    <thead>
                                      <tr>
                                         <th>SI</th>
                                         <th>Patient ID</th>
                                         <th>Patient Name</th>
                                         <th>Payable Amount</th>
                                         <th>Paid Amount</th>
                                         <th>Due Amount</th>
                                         <th>Last Pay Date</th>
                                         <th>Status</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php
									$i=0;
                                    foreach($consultancy_payment_list->result() as $conp):
										$tpaidam = $conp->paid_amount;
										$payable_amount = $conp->payable_amount;
										$patient_id = $conp->patient_id;
										$doctorid = $conp->doctorid;
										$pstatus = $conp->pstatus;
										$amount_in_word = $conp->amount_in_word;
										$payment_date = $conp->payment_date;
										$remarks = $conp->remarks;
										$return_amount = $conp->return_amount;
										$return_remarks = $conp->return_remarks;
										$return_date = $conp->return_date;
										
										$pay_id = $conp->pay_id;
										$discount_amount = $conp->discount_amount;
										$discount = $conp->discount;
										
										$tpym=$payable_amount;
										$totalDueamount=$tpym-$tpaidam;
									$i++;
									
									$que_docinfo=$this->db->query("select * from doctors_list where doc_id='".$doctorid."'");
										foreach($que_docinfo->result() as $sinfrow);
										$doc_name=$sinfrow->doc_name;
										
									$que_std=$this->db->query("select * from registration where patient_id='".$patient_id."'");
										foreach($que_std->result() as $stdrow);
										$patient_name=$stdrow->patient_name;
										$contact=$stdrow->phone;
									
									$querypay=$this->db->query("select * from installment where pay_id='".$pay_id."' order by paid_date desc");
										if($querypay->num_rows() > 0){
											foreach($querypay->result() as $payrow);
											$amount=$payrow->amount;
											$paid_date=$payrow->paid_date;
										}
										else{
											$amount='';
											$paid_date='';	
										}
									
									
									/* if($tpym == $tpaidam){
										 	$status = "Full Paid";
											$col= 'green';
									  }
									  else{
										    $status = "Partial Paid";
											$col= 'red';
										 }*/
										
									 if($pstatus == "Full Paid"){
											$col= 'green';
									  }
									  else if($pstatus == "Partial Paid"){
											$col= 'red';
										 }
									?>
                                      <tr>
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $patient_id; ?></td>
                                        <td><a href="<?php echo base_url('index/patient_details/'.$patient_id);?>" target="_blank" style="color:#6C7117; font-weight:bold">
										<?php echo $patient_name; ?></a></td>
                                        <td><?php echo $tpym; ?></td>
                                        <td><?php echo $tpaidam; ?></td>
                                        <td><?php echo $totalDueamount; ?></td>
                                        <td><?php echo $paid_date; ?></td>
                                        <td><strong style="color:<?php echo $col;?>"><?php echo $pstatus; ?></strong></td>
                                         <td> 
                                         	<a href="javascript:void();" class="btn btn-info btn-xs" data-target="#mymodal1<?php echo $pay_id;?>" data-toggle="modal">
          										<span class="glyphicon glyphicon-file"></span> Details
                                            </a> 
                                            <div id="mymodal1<?php echo $pay_id;?>" class="modal fade" role="dialog">
												<?php echo form_open('index/update_inventory');?>
                                                	<div class="modal-dialog">
                                                    	<div class="modal-content">
                                                    	  <div class="modal-header">
                                                        	<button type="button" class="btn btn-danger pull-right" title="Close" data-dismiss="modal"> &times; </button>
        													<h4 class="modal-title">Details</h4>
                                                        </div>
                                                    	  <div class="modal-body">
                                                           <table width="100%" border="0" cellspacing="2" cellpadding="3" align="center">
                                                          
                                                          <tr>
                                                            <td width="29%" height="42" align="right" valign="top"><strong>Patient ID</strong></td>
                                                            <td width="10%" valign="top"><strong>: </strong></td>
                                                            <td width="50%" valign="top"><?php echo $patient_id;?></td>
                                                          </tr>
                                                          <tr>
                                                            <td width="29%" height="42" align="right" valign="top"><strong>Doctor Name</strong></td>
                                                            <td width="10%" valign="top"><strong>: </strong></td>
                                                            <td width="50%" valign="top"><?php echo $doc_name;?></td>
                                                          </tr>
                                                          <tr>
                                                            <td width="29%" height="42" align="right" valign="top"><strong>Consultancy Fee</strong></td>
                                                            <td width="10%" valign="top"><strong>: </strong></td>
                                                            <td width="50%" valign="top"><?php echo $payable_amount;?></td>
                                                          </tr>
                                                          <tr>
                                                            <td width="29%" height="42" align="right" valign="top"><strong>Discount</strong></td>
                                                            <td width="10%" valign="top"><strong>: </strong></td>
                                                            <td width="50%" valign="top"><?php echo $discount;?></td>
                                                          </tr>
                                                          <tr>
                                                            <td width="29%" height="42" align="right" valign="top"><strong>Discount Amount</strong></td>
                                                            <td width="10%" valign="top"><strong>: </strong></td>
                                                            <td width="50%" valign="top"><?php echo $discount_amount;?></td>
                                                          </tr>
                                                          <tr>
                                                            <td width="29%" height="42" align="right" valign="top"><strong>Status</strong></td>
                                                            <td width="10%" valign="top"><strong>: </strong></td>
                                                            <td width="50%" valign="top"><?php echo $pstatus;?></td>
                                                          </tr>
                                                          <tr>
                                                            <td width="29%" height="42" align="right" valign="top"><strong>Amount In Word</strong></td>
                                                            <td width="10%" valign="top"><strong>: </strong></td>
                                                            <td width="50%" valign="top"><?php echo $amount_in_word;?></td>
                                                          </tr>
                                                          <tr>
                                                            <td width="29%" height="42" align="right" valign="top"><strong>Payment Date</strong></td>
                                                            <td width="10%" valign="top"><strong>: </strong></td>
                                                            <td width="50%" valign="top"><?php echo $payment_date;?></td>
                                                          </tr>
                                                          <tr>
                                                            <td width="29%" height="42" align="right" valign="top"><strong>Remarks</strong></td>
                                                            <td width="10%" valign="top"><strong>: </strong></td>
                                                            <td width="50%" valign="top"><?php echo $remarks;?></td>
                                                          </tr>
                                                          <tr>
                                                            <td width="29%" height="42" align="right" valign="top"><strong>Return Amount</strong></td>
                                                            <td width="10%" valign="top"><strong>: </strong></td>
                                                            <td width="50%" valign="top"><?php echo $return_amount;?></td>
                                                          </tr>
                                                          <tr>
                                                            <td width="29%" height="42" align="right" valign="top"><strong>Return Date</strong></td>
                                                            <td width="10%" valign="top"><strong>: </strong></td>
                                                            <td width="50%" valign="top"><?php echo $return_date;?></td>
                                                          </tr>
                                                          
                                                          <tr>
                                                            <td width="29%" height="42" align="right" valign="top"><strong>Return Remarks</strong></td>
                                                            <td width="10%" valign="top"><strong>: </strong></td>
                                                            <td width="50%" valign="top"><?php echo $return_remarks;?></td>
                                                          </tr>
                                                        </table>
                                                          </div>
                                                          <div class="modal-footer">
                                                            <a href ="javascript:void(0)" title="Close" class="btn btn-danger" data-dismiss="modal">
                                                                <i class="fa fa-close"></i></a>
                                                          </div>
                                                     	  
                                                        </div>
                                                    </div>
                                                <?php echo form_close();?>
                                            </div>
                                            
                                            <a href="javascript:void();" class="btn btn-warning btn-xs" data-target="#mymodal<?php echo $pay_id;?>" data-toggle="modal">
          										<span class="glyphicon glyphicon-arrow-left"></span> Return
                                            </a>                                            
                                            <div id="mymodal<?php echo $pay_id;?>" class="modal fade" role="dialog">
												<?php echo form_open('index/update_inventory');?>
                                                	<div class="modal-dialog">
                                                    	<div class="modal-content">
                                                    	  <div class="modal-header">
                                                        	<button type="button" class="btn btn-danger pull-right" title="Close" data-dismiss="modal">&times; </button>
        													<h4 class="modal-title">Return</h4>
                                                        </div>
                                                    	  <div class="modal-body">
                                                           <table width="100%" border="0" cellspacing="2" cellpadding="3" align="center">
                                                          
                                                          <tr>
                                                            <td width="29%" height="42" align="right" valign="top"><strong>Return Amount</strong></td>
                                                            <td width="2%"> </td>
                                                            <td width="69%">
                                                            <input type="hidden" name="pay_id" value="<?php echo $pay_id;?>">
                                                            <input type="text" name="return_amount" required placeholder="Amount" class="form-control" style="width:60%" 
                                                            onFocus="this.placeholder=''" onBlur="this.placeholder='Amount'"/>&nbsp; &nbsp;</td>
                                                            </tr>
                                                          <tr>
                                                            <td width="29%" height="42" align="right" valign="top"><strong>Return Date</strong></td>
                                                            <td width="2%"> </td>
                                                            <td width="69%">
                                                            <input type="text" name="return_date" required placeholder="YYYY-MM-DD" class="form-control date-picker" 
                                                            style="width:60%" 
                                                            onFocus="this.placeholder=''" onBlur="this.placeholder='YYYY-MM-DD'"/>&nbsp; &nbsp;</td>
                                                          </tr>
                                                           <tr>
                                                            <td height="99" align="right" valign="top"><strong>Remarks</strong></td>
                                                            <td>&nbsp;</td>
                                                            <td width="69%">
                                                            <textarea rows="3" cols="40" name="return_notes" class="form-control"></textarea>
                                                            
                                                            </td>
                      </tr>
                                                          <tr>
                                                            <td colspan="3"  height="5"></td>
                                                          </tr>
                                                          <tr>
                                                            <td height="45" colspan="2">&nbsp;</td>
                                                            <td valign="top">
                                                            <input type="hidden" name="product_id" id="returnProduct" />
                                                            <input type="submit" value="Submit" name="return"  class="btn btn-primary"/>
                                                            &nbsp; &nbsp; &nbsp; &nbsp;</td>
                                                          </tr>
                                                        </table>
                                                          </div>
                                                          <div class="modal-footer">
                                                            <a href ="javascript:void(0)" title="Close" class="btn btn-danger" data-dismiss="modal">
                                                                <i class="fa fa-close"></i></a>
                                                          </div>
                                                     	  
                                                        </div>
                                                    </div>
                                                <?php echo form_close();?>
                                            </div>
                                            
                                            </td>
                                      </tr>
                                    <?php
                                    endforeach;
									?>  
                                      
                                    </tbody>
                                  </table>
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
               