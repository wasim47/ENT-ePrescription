<?php
$sid=$this->input->get('patient_id');
			
$queryS=$this->db->query("select * from registration where patient_id='".$sid."'");
foreach($queryS->result() as $rowS);
$std_name=$rowS->patient_name;
$student_id=$rowS->patient_id;

$querypay=$this->db->query("select * from payment where patient_id='".$sid."'");
foreach($querypay->result() as $payrow);
$paid_amount=$payrow->paid_amount;	
$payable_amount=$payrow->payable_amount;			
$totalDueamount=$payable_amount-$paid_amount;	

?>

<table class="table table-striped" width="100%" cellpadding="0" cellspacing="0">
	<tr><th align="center" colspan="6"><h1>Payment History</h1></th></tr>
    <tr bgcolor="#f5f5f5">
     <th width="1%" align="center">&nbsp;</th>
     <th width="26%" align="left"><h3 style="padding:5px 0 0 0; text-align:left">Patient Name : <?php echo $std_name;?></h3></th>
     <th width="12%" align="left"><h3 style="padding:5px 10px 0 0; text-align:right"> Patient ID : <?php echo $student_id;?></h3></th>
  </tr>
</table>
<table class="table table-striped" width="100%">


  <tr bgcolor="#666" style="color:#fff">
     <th align="center" style="padding:10px">SI</th>
     <th align="center">Total Amount</th>
     <th align="center">Payment Date</th>
  </tr>
<?php
$i=0;
$querycur=$this->db->query("select * from installment where patient_id='".$sid."'");
foreach($querycur->result() as $currow){
$pay_id=$currow->pay_id;
$amount=$currow->amount;
$paid_date=$currow->paid_date;
if($i%2==0){
	$clr='#ccc';
}
else{
	$clr='#eaeaea';
}
$i++;
?>


<tr bgcolor="<?php echo $clr;?>">
    <td align="center" style="padding:10px"><?php echo $i;?></td>
    <td align="center"><?php echo $amount; ?></td>
    <td align="center"><?php echo $paid_date; ?></td>
</tr>

<?php
}	
?>
</table>
<table class="table table-striped" width="100%" cellpadding="0" cellspacing="0">
    <tr bgcolor="#f5f5f5">
     <th width="1%" align="center">&nbsp;</th>
     <th width="23%" align="left"><h3 style="padding:5px 0 0 0; color:#990">Payable Amount : <?php echo $payable_amount;?></h3></th>
     <th width="19%" align="left"><h3 style="padding:5px 0 0 0; color:#063">Paid Amount : <?php echo $paid_amount;?></h3></th>
     <th width="19%" align="left"><h3 style="padding:5px 0 0 0; color:#f00">Due Amount : <?php echo $totalDueamount;?></h3></th>
  </tr>
</table>