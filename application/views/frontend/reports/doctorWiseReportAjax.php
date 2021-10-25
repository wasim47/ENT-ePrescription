<div class="container">
  <div style="font-size:18px; border-bottom:1px solid #ccc; float:left; width:100%; margin-bottom:5px;">Total Received Amount for Consultancy</div>
  <table class="table table-striped" width="100%">
    <tr bgcolor="#666">
         <th width="2%" align="center">SI</th>
         <th width="10%" align="center">Patient ID</th>
         <th width="11%" align="center">Total Amount</th>
         <th width="8%" align="center">Discount</th>
         <th width="11%" align="center">Disc. Amount</th>
         <th width="12%" align="center">Paid Amount</th>
         <th width="9%" align="center">Status</th>
         <th width="7%" align="center">Voucher</th>
         <th width="20%" align="center">Remarks</th>
         <th width="10%" align="center">Paid Date</th>
         <th width="10%" align="center">View Details</th>
      </tr>
    <?php
    $i=0;
    $costCount = 0;

   foreach($queryCost->result() as $payrow){
	$patient_id=$payrow->patient_id;
	$paid_amount=$payrow->paid_amount;
	$payable_amount=$payrow->payable_amount;
	$discount=$payrow->discount;
	$discount_amount=$payrow->discount_amount;
	$pstatus=$payrow->pstatus;		
	$voucherno=$payrow->serial_no;
	$remarks=$payrow->remarks;
	$payment_date=$payrow->payment_date;
	$tpaidam = $payrow->paid_amount;
	$doctorid = $payrow->doctorid;
	$amount_in_word = $payrow->amount_in_word;
	$return_amount = $payrow->return_amount;
	$return_remarks = $payrow->return_remarks;
	$return_date = $payrow->return_date;
	$pay_id = $payrow->pay_id;
	
	$tpym=$payable_amount;
	$totalDueamount=$tpym-$tpaidam;

$que_docinfo=$this->db->query("select * from doctors_list where doc_id='".$doctorid."'");
	foreach($que_docinfo->result() as $sinfrow);
	$doc_name=$sinfrow->doc_name;
								  
	if($i%2==0){
		$clr='#fff';
	}
	else{
		$clr='#eaeaea';
	}
	$i++;
    
    ?>
    
    
    <tr bgcolor="<?php echo $clr;?>">
        <td align="center"><?php echo $i;?></td>
        <td align="center"><?php echo $patient_id; ?></td>
        <td align="center"><?php echo $payable_amount; ?></td>
        <td align="center"><?php echo $discount; ?></td>
        <td align="center"><?php echo $discount_amount; ?></td>
        <td align="center"><?php echo $paid_amount; ?></td>
        <td align="center"><?php echo $pstatus; ?></td>
        <td align="center"><?php echo $voucherno; ?></td>
        <td align="center"><?php echo $remarks; ?></td>
        <td align="center"><?php echo $payment_date; ?></td>
        <td align="center">
			<a href="javascript:void();" class="btn btn-info btn-xs" data-target="#mymodal1<?php echo $pay_id;?>" data-toggle="modal">
                <span class="glyphicon glyphicon-file"></span> Details
            </a> 
            <div id="mymodal1<?php echo $pay_id;?>" class="modal fade" role="dialog">
                 <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <!--<button type="button" class="btn btn-success btn-xs pull-right" title="Print"> <i class="fa fa-print"></i> Print </button>-->
                            <a href="<?php echo base_url('index/datewise_reports/details_print?payReportID='.$pay_id);?>"  class="btn btn-success btn-xs pull-right" title="Print"
                            onclick="javascript:void window.open('<?php echo base_url('index/datewise_reports/details_print?payReportID='.$pay_id);?>','','width=1100,height=400,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=200,top=30');return false;">
                            <i class="fa fa-print"></i> Print</a>
                            
                            
                            <h4 class="modal-title pull-left">Details</h4>
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
            </div>
        </td>
    </tr>
    
    <?php
    $costCount = $costCount + $paid_amount;
    }	
    
    ?>
    
     <tr>
         <th align="center" colspan="5">&nbsp;</th>
         <th align="right" colspan="5" style="font-size:16px; text-align:right">
         Total Amount = <?php echo 'TK '.number_format($costCount,2,'.',',').' /=';?></th>
      </tr>
    </table>
</div>