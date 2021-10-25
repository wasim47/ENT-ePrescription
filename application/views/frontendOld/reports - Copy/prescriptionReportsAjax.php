<?php
if($keyword!=""){
	if($keyword=='department'){
		$queryReports=$this->db->query("select * from registration where symptom ='$dataval'");
	}
	if($keyword=='patient_id'){
		$queryReports=$this->db->query("select * from prescription_entry where patient_id ='$dataval'");		
	}
}
elseif($todate!=''){
	$queryReports=$this->db->query("select * from registration where date_reg between '$fromdate' and '$todate'");
}
?>

<div class="container">
  <table class="table table-striped" width="100%">
 <tr bgcolor="#666">
         <th width="2%" align="center">SI</th>
         <th width="13%" align="center">Patient Name</th>
         <th width="13%" align="center">Mobile</th>
         <th width="13%" align="center">Email</th>
         <th width="7%" align="center">Age</th>
         <th width="13%" align="center">Reg. Date</th>
         <th width="21%" align="center">Father's Name</th>
         <th width="18%" align="center">Action</th>
    </tr>
    <?php
    $i=0;
    
	/*foreach($queryPres->result() as $preRow){
			$patid[] = $preRow->patient_id;
			//echo $preRow->patient_id;
		}
		$arrayval = join(',',$patid);
		$queryReports=$this->db->query("select * from registration where patient_id IN($arrayval)");*/
		
    foreach($queryReports->result() as $pres){
	$patient_id=$pres->patient_id;
	$pr_id=$pres->pr_id;
	
	$queryPatient=$this->db->query("select * from registration where patient_id='".$patient_id."'");
	foreach($queryPatient->result() as $payrow);
    $patid=$payrow->id;
	$patient_name=$payrow->patient_name;
    $date_reg=$payrow->date_reg;	
    $age=$payrow->age;
    $email=$payrow->email;
	$phone=$payrow->phone;
    $father_name=$payrow->father_name;
                                  
    if($i%2==0){
        $clr='#fff';
    }
    else{
        $clr='#eaeaea';
    }
    $i++;
    
	$url = base_url('index/prescripPrint').'?id='.$patient_id.'&presid='.$pr_id.'&dat='.date('Y-m-d');
    ?>
    
    
    <tr bgcolor="<?php echo $clr;?>">
        <td align="left"><?php echo $i;?></td>
      <td align="left"><?php echo $patient_name; ?></td>
      <td align="left"><?php echo $phone; ?></td>
      <td align="left"><?php echo $email; ?></td>
      <td align="left"><?php echo $age; ?></td>
      <td align="left"><?php echo $date_reg; ?></td>
      <td align="left"><?php echo $father_name; ?></td>
  	  <td align="left">
			<a href="<?php echo base_url('index/prescription_history/details/'.$pr_id.'_'.$patient_id);?>" class="btn btn-primary" style="padding:5px"><i class="fa fa-edit"></i> Details</a>
            <a href='javascript:void();' onclick="window.open('<?php echo $url;?>','','height=900,width=1200,scrollbars=yes')" class="btn btn-primary" style="padding:5px">
            <i class="fa fa-print"></i> Print</a>
                
      </td>
    </tr>
    <?php
    }	
    ?>
    
    
    </table>
</div>

