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
                                    <h2>Total Payment (<?php echo $payment_list->num_rows();?>)</h2>
                                    <h2 style="float:right"><a href="<?php echo base_url('index/payment_registration');?>" class="btn btn-primary">New Payment</a></h2>
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
                                         <th>Contact</th>
                                        <th>Payable Amount</th>
                                         <th>Paid Amount</th>
                                          <th>Due Amount</th>
                                          <th>Last Pay Date</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php
									$i=0;
                                    foreach($payment_list->result() as $paymentData):
									$inst_id=$paymentData->inst_id;
									$patient_id=$paymentData->patient_id;
									$amount=$paymentData->amount;
									$pay_id=$paymentData->pay_id;
									$paid_date=$paymentData->paid_date;
									$i++;
									
									$que_std=$this->db->query("select * from registration where patient_id='".$patient_id."'");
									foreach($que_std->result() as $stdrow);
									$patient_name=$stdrow->patient_name;
									$patient_id=$stdrow->patient_id;
									$contact=$stdrow->phone;
									
									$querypay=$this->db->query("select * from payment where patient_id='".$patient_id."'");
									if($querypay->num_rows() > 0){
										foreach($querypay->result() as $payrow);
										$totalPaidamount=$payrow->paid_amount;
										$payable_amount=$payrow->payable_amount;
									}
									else{
										$totalPaidamount='';
										$payable_amount='';
									}
									
									
									$totalpayableamount=$payable_amount;
									$totalDueamount=$totalpayableamount-$totalPaidamount;

									?>
                                      <tr>
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $patient_id; ?></td>
                                        <td><?php echo $patient_name; ?></td>
                                        <td><?php echo $contact; ?></td>
                                        <td><?php echo $totalpayableamount; ?></td>
                                        <td><?php echo $totalPaidamount; ?></td>
                                        <td><?php echo $totalDueamount; ?></td>
                                        <td><?php echo $paid_date; ?></td>
                                         <td> 
                                         	<a href="<?php echo base_url('index/payment_registration/'.$inst_id);?>" class="btn btn-default btn-sm">
          										<span class="glyphicon glyphicon-edit"></span> Edit
                                            </a> 
                                            <a href="javascript:void();" onclick="openPage1('<?php echo $pay_id;?>','installment','inst_id');" class="btn btn-default btn-sm">
          										<span class="glyphicon glyphicon-remove-circle"></span> Remove
                                            </a>
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
               