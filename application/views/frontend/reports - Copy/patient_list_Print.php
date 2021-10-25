<?php
if($keyword!=""){
	if($keyword=='department'){
		$queryReports=$this->db->query("select * from registration where symptom ='$dataval'");
	}
	if($keyword=='patient_id'){
		$queryReports=$this->db->query("select * from registration where id ='$dataval'");
	}
}
elseif($todate!=''){
	$queryReports=$this->db->query("select * from registration where date_reg between '$fromdate' and '$todate'");
}
?>
<div class="right_col" role="main">
                <div class="">

                    <div style="width:100%; float:left">	
                                  	  		<div style="text-align:center; padding:5px 0">
                                            <img src="<?php echo base_url('asset/images/logo.png')?>" style="width:10%; height:auto" />
                                            
                                            </div>
                                   </div>
                    <div class="clearfix"></div>
                    <div class="row">
                             <div class="container">
  <table class="table table-striped" width="100%">
 <tr bgcolor="#ccc">
         <th width="2%" height="33" align="center">SI</th>
         <th width="13%" align="center">Patient Name</th>
         <th width="13%" align="center">Mobile</th>
         <th width="13%" align="center">Email</th>
         <th width="7%" align="center">Age</th>
         <th width="13%" align="center">Reg. Date</th>
         <th width="21%" align="center">Father's Name</th>
        </tr>
    <?php
    $i=0;
    
    foreach($queryReports->result() as $payrow){
    $patient_name=$payrow->patient_name;
    $date_reg=$payrow->date_reg;	
    $patient_id=$payrow->patient_id;
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
    
    ?>
    
    
    <tr bgcolor="<?php echo $clr;?>">
        <td height="34" align="left"><?php echo $i;?></td>
      <td align="left"><?php echo $patient_name; ?></td>
      <td align="left"><?php echo $phone; ?></td>
      <td align="left"><?php echo $email; ?></td>
      <td align="left"><?php echo $age; ?></td>
      <td align="left"><?php echo $date_reg; ?></td>
      <td align="left"><?php echo $father_name; ?></td>
  </tr>
    <?php
    }	
    ?>
    </table>
</div>
                    </div>
					<div class="row" style="border-top:1px solid #ccc; bottom:0; position:fixed; padding:10px; background:#f5f5f5">
                    	<address style="font-size:13px; text-align:left">
                                               Bangladesh ENT Hospital Limited<br />
                                        Navana Newbury place(3rd floor) Opposite to Rapa Plaza,
                                        Near 27 No. Bus Stand, 41/A Sobahanbag Mirpur Road, Dhaka 1207
                                        Hot line: 09 666 710 710
                                        Mobile: 01717 250667
                                        Phone: +8802 9137324, +8802 9137325, +8802 9137526 +8802 8142959
                                        Email: info@benth.com.bd,bangladeshenthospital@gmail.com
                                        Web: www.benth.com.bd
                                            </address>
                    </div>

                </div>
               