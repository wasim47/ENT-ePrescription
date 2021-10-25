<?php 
$fromdate=$this->session->userdata('toDate');
$todate=$this->session->userdata('fromDate');
?>
<div class="right_col" role="main">
                <div class="">

                    <div style="width:100%; float:left">	
                                  	  		<div style="text-align:center; padding:5px 0">
                                        	
                                            <img src="<?php echo base_url('asset/images/logo.png')?>" style="width:7%; height:auto" />
                                            <address style="font-size:13px; text-align:center">
                                                B-34/Ka (1st Floor), Shop No. 28  Khilkhet Super Market, Khilkhet, Dhaka-1229<br />
                                                Cell: +8801673628242, +8801941709999<br />
                                                E-mail: halim.helal@gmail.com, mhistudybd@gmail.com<br />
                                                Web: www.mhinternationalstudy.com
                                            </address>
                                            </div>
                                   </div>
                    <div class="clearfix"></div>
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                
                                <div class="x_content">
                                <div style="width:100%"><?php echo $this->session->flashdata('successMsg');?></div>
                                        <div class="container">
                  <table align="center" width="50%" border="0">
                        <tr>
                                <td height="44" colspan="3" align="center"><h4><?php echo 'Today '.date('Y-m-d'); ?> </h4> </td>
                            </tr>
                            <tr>
                            <td width="57%" height="30" align="right"><h5>Total Received from Patient </h5></td>
                            <td width="3%" align="center">:</td>
                          <td width="40%" align="left">
                                <h5><strong><?php
                                if($todayReportsSummery->num_rows() > 0)
                                {
                                foreach($todayReportsSummery->result() as $row1);												
                                $t_r_amount=$row1->amount;
                                echo 'TK '.number_format($t_r_amount,2,'.',',').' /=';
                                }
                                ?></strong>   </h5>                                                     
                            </td>
                        </tr>
                            
                        </table>
                                        </div>
                                        <div class="container">
  <div style="font-size:18px; border-bottom:1px solid #ccc; float:left; width:100%; margin-bottom:5px;">Payment Details</div>
  
    <?php
    $i=0;
    $costCount = 0;

  foreach($queryDetailsCost->result() as $payrow);
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
$i++;

	$que_docinfo=$this->db->query("select * from doctors_list where doc_id='".$doctorid."'");
	foreach($que_docinfo->result() as $sinfrow);
	$doc_name=$sinfrow->doc_name;
	
    
    ?>
    
    
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
                                        
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
               