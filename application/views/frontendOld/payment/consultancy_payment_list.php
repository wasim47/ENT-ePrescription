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
                                        <!--<th>Action</th>-->
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php
									$i=0;
                                    foreach($consultancy_payment_list->result() as $consultancy_paymentData):
										$totalPaidamount=$consultancy_paymentData->paid_amount;
										$payable_amount=$consultancy_paymentData->payable_amount;
										$patient_id=$consultancy_paymentData->patient_id;
										$pay_id=$consultancy_paymentData->pay_id;
										$totalpayableamount=$payable_amount;
										$totalDueamount=$totalpayableamount-$totalPaidamount;
									$i++;
									
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
									
									
									 if($totalpayableamount == $totalPaidamount){
										 	$status = "Full Paid";
											$col= 'green';
									  }
									  else{
										    $status = "Partial Paid";
											$col= 'red';
										 }
										

									?>
                                      <tr>
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $patient_id; ?></td>
                                        <td><a href="<?php echo base_url('index/patient_details/'.$patient_id);?>" target="_blank" style="color:#6C7117; font-weight:bold">
										<?php echo $patient_name; ?></a></td>
                                        <td><?php echo $totalpayableamount; ?></td>
                                        <td><?php echo $totalPaidamount; ?></td>
                                        <td><?php echo $totalDueamount; ?></td>
                                        <td><?php echo $paid_date; ?></td>
                                         <td><strong style="color:<?php echo $col;?>"><?php echo $status; ?></strong></td>
                                         <?php /*?><td> 
                                         	<a href="<?php echo base_url('index/userconsultancy_payment_details/'.$pay_id);?>" class="btn btn-default btn-sm">
          										<span class="glyphicon glyphicon-file"></span> Details
                                            </a> 
                                            <a href="javascript:void();" onclick="openPage1('<?php echo $pay_id;?>','installment','inst_id');" class="btn btn-default btn-sm">
          										<span class="glyphicon glyphicon-remove-circle"></span> Remove
                                            </a>
                                            </td><?php */?>
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
               