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
                                <td height="44" colspan="3" align="center"><h4><?php echo 'Report Summary for <strong>'.$fromdate.' To '.$todate.'</strong>'; ?> </h4> </td>
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
  <div style="font-size:18px; border-bottom:1px solid #ccc; float:left; width:100%; margin-bottom:5px;">Total Received Amount for Consultancy</div>
  <table width="100%">
    <tr bgcolor="#ccc">
         <th width="2%" height="32" align="center">SI</th>
         <th width="10%" align="center">Patient ID</th>
         <th width="11%" align="center">Total Amount</th>
         <th width="8%" align="center">Discount</th>
         <th width="11%" align="center">Disc. Amount</th>
         <th width="12%" align="center">Paid Amount</th>
         <th width="9%" align="center">Status</th>
         <th width="7%" align="center">Voucher</th>
         <th width="20%" align="center">Remarks</th>
         <th width="10%" align="center">Paid Date</th>
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
	$i++;
    
    ?>
    
    
    <tr bgcolor="#f5f5f5">
        <td height="34" align="center"><?php echo $i;?></td>
        <td align="center"><?php echo $patient_id; ?></td>
        <td align="center"><?php echo $payable_amount; ?></td>
        <td align="center"><?php echo $discount; ?></td>
        <td align="center"><?php echo $discount_amount; ?></td>
        <td align="center"><?php echo $paid_amount; ?></td>
        <td align="center"><?php echo $pstatus; ?></td>
        <td align="center"><?php echo $voucherno; ?></td>
        <td align="center"><?php echo $remarks; ?></td>
        <td align="center"><?php echo $payment_date; ?></td>
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
               