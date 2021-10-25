<!--<script>
window.onload=window.print();
</script>-->
<?php
$patient_id=$this->session->userdata('patient_id');
$query=$this->db->query("select * from registration where patient_id='".$patient_id."'");
foreach($query->result() as $stdinfo);
?>
<link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">
   <div style="width:650px; height:auto; margin:0 auto;">
                                <div class="x_content" style="margin-bottom:0; float:left;">
                                 
                                   <div style="width:100%; float:left">	
                                   <h5 style="width:45%; float:left; font-size:11px; padding:0; margin:0">Patient Copy</h5>
                                  	  		<div style="text-align:left; padding:0">
                                        	
                                            <img src="<?php echo base_url('asset/images/logo.png')?>" style="width:60px; height:auto; margin-bottom:10px;" />
                                            <address style="font-size:11px; text-align:center">
                                                <strong>Bangladesh ENT Hospital Limited</strong><br />
                                            Navana Newbury place(3rd floor) Opposite to Rapa Plaza,                                            
                                            Near 27 No. Bus Stand,                                            
                                            41/A Sobahanbag Mirpur Road, Dhaka 1207                                            
                                            Hot line: 09 666 710 710                                            
                                            Mobile: 01717 250667                                            
                                            Phone: +8802 9137324, +8802 9137325, +8802 9137526 +8802 8142959                                             
                                            Email: info@benth.com.bd, bangladeshenthospital@gmail.com                                            
                                            Web: www.benth.com.bd
                                            </address>
                                            </div>
                                   </div>
                                   <div style="width:100%;  float:left">	
                                   <div style="width:100%; float:left; font-size:11px;">
                                   	Memo No :  <strong style="text-transform:capitalize; margin-left:10px;"><?php echo $serial_no;?></strong>
                                   </div>
                                  	  	<div style="text-align:left; padding:5px 0; width:35%; float:left; font-weight:bold; font-size:12px">
                                        Patient: <?php echo $stdinfo->patient_name;?></div>
                                       
                                        <div style="text-align:right; padding:5px 0;width:35%; float:right; font-weight:bold; font-size:12px">Patient ID: <?php echo $stdinfo->patient_id;?></div>
                                   </div>
                                   <div style="width:100%; float:left; ">	
                                  	<div style="border:1px solid #ccc; border-right:none; width:32%; float:left; text-align:center"><h5>Particulars</h5></div>
                                    <div style="border:1px solid #ccc; border-right:none; width:17%; float:left; text-align:center"><h5>Total Amount</h5></div>
                                    <div style="border:1px solid #ccc; border-right:none; width:17%; float:left; text-align:center"><h5>Paid Amount</h5></div>
                                    <div style="border:1px solid #ccc; border-right:none; width:17%; float:left; text-align:center"><h5>Due Amount</h5></div>
                                    <div style="border:1px solid #ccc; width:17%; float:left; text-align:center"><h5>Current Pay</h5></div>
                                   </div>
                                   <div style="width:100%; float:left;">
                                  <div style="border:1px solid #ccc;min-height:60px; font-size:12px; width:32%; padding:5px; float:left"><?php echo $particular;?></div>
                          <div style="border:1px solid #ccc; border-left:none;min-height:60px; font-size:12px; padding:5px; width:17%; float:left; text-align:center"><?php echo $total_amount.' TK';?></div>
                          <div style="border:1px solid #ccc; border-left:none;min-height:60px;font-size:12px; padding:5px; width:17%; float:left; text-align:center"><?php echo $paid_amount.' TK';?></div>
                           <div style="border:1px solid #ccc; border-left:none;min-height:60px;font-size:12px; padding:5px; width:17%; float:left; text-align:center"><?php echo $due_amount.' TK';?></div>
                          <div style="border:1px solid #ccc; border-left:none;min-height:60px;font-size:12px; padding:5px;	width:17%; float:left; text-align:center"><?php echo $pay_amount.' TK';?></div>
                          <div style="width:100%; float:left; border:1px solid #ccc; padding:10px; border-top:none">
                                   	Amount in Word :  <strong style="text-transform:capitalize; margin-left:10px;"><?php echo $amount_in_word.' Taka Only';?></strong>
                                   </div>
                                   </div> 
                                   
                                </div>
                               
                               <div style="width:100%; float:left; margin-top:50px;">	
                                  	  	<div style="border-top:1px solid #ccc; border-right:none; width:35%; float:left; text-align:left">
                                        <h5 style="font-size:11px; padding:3px; margin:0">Depositor's Signature<br /><br />Date : <strong><?php echo date('l, d F, Y',strtotime($pay_date));?></strong></h5>
                                        </div>
                                        <div style="border-top:1px solid #ccc; width:35%; float:right; text-align:left">
                                        <h5 style="font-size:11px; padding:3px; margin:0">Recipient Signature<br /><br />Date : <strong><?php echo date('l, d F, Y',strtotime($pay_date));?></strong></h5></div>
                                   </div>
                               <div style="border-bottom:1px dashed #999; width:100%; float:left; height:20px; margin-bottom:20px;">&nbsp;</div>
                                
                                
                                
                                
                                
                               <div class="x_content" style="margin-bottom:0; float:left;">
                                 
                                   <div style="width:100%; float:left">	
                                   <h5 style="width:45%; float:left; font-size:11px; padding:0; margin:0">Hospital Copy</h5>
                                  	  		<div style="text-align:left; padding:0">
                                        	
                                            <img src="<?php echo base_url('asset/images/logo.png')?>" style="width:60px; height:auto; margin-bottom:10px;" />
                                            <address style="font-size:11px; text-align:center">
                                                <strong>Bangladesh ENT Hospital Limited</strong><br />
                                            Navana Newbury place(3rd floor) Opposite to Rapa Plaza,                                            
                                            Near 27 No. Bus Stand,                                            
                                            41/A Sobahanbag Mirpur Road, Dhaka 1207                                            
                                            Hot line: 09 666 710 710                                            
                                            Mobile: 01717 250667                                            
                                            Phone: +8802 9137324, +8802 9137325, +8802 9137526 +8802 8142959                                             
                                            Email: info@benth.com.bd, bangladeshenthospital@gmail.com                                            
                                            Web: www.benth.com.bd
                                            </address>
                                            </div>
                                   </div>
                                   <div style="width:100%;  float:left">	
                                   <div style="width:100%; float:left; font-size:11px;">
                                   	Memo No :  <strong style="text-transform:capitalize; margin-left:10px;"><?php echo $serial_no;?></strong>
                                   </div>
                                  	  	<div style="text-align:left; padding:5px 0; width:35%; float:left; font-weight:bold; font-size:12px">
                                        Patient: <?php echo $stdinfo->patient_name;?></div>
                                       
                                        <div style="text-align:right; padding:5px 0;width:35%; float:right; font-weight:bold; font-size:12px">Patient ID: <?php echo $stdinfo->patient_id;?></div>
                                   </div>
                                   <div style="width:100%; float:left; ">	
                                  	  	<div style="border:1px solid #ccc; border-right:none; width:30%; float:left; text-align:center"><h5>Particulars</h5></div>
                                        <div style="border:1px solid #ccc; border-right:none; width:30%; float:left; text-align:center"><h5>Total Payable Amount</h5>
                                     </div>
                                        <div style="border:1px solid #ccc; border-right:none; width:20%; float:left; text-align:center"><h5>Due Amount</h5></div>
                                        <div style="border:1px solid #ccc; width:20%; float:left; text-align:center">
                                          <h5>Pay Amount</h5></div>
                                   </div>
                                   <div style="width:100%; float:left;">
                                  	  	<div style="border:1px solid #ccc;min-height:60px; font-size:12px; width:30%; float:left">
                                        	<ul style="padding:5px 10px 0 30px;">
                                        	<?php echo $particular;?>
                                            </ul>
                                        </div>
                          <div style="border:1px solid #ccc; border-left:none;min-height:60px; font-size:12px; padding:5px; width:30%; float:left; text-align:center"><?php echo $total_amount.' TK';?></div>
                          <div style="border:1px solid #ccc; border-left:none;min-height:60px;font-size:12px; padding:5px; width:20%; float:left; text-align:center"><?php echo $due_amount.' TK';?></div>
                          <div style="border:1px solid #ccc; border-left:none;min-height:60px;font-size:12px; padding:5px;	width:20%; float:left; text-align:center"><?php echo $pay_amount.' TK';?></div>
                          <div style="width:100%; float:left; border:1px solid #ccc; padding:10px; border-top:none">
                                   	Amount in Word :  <strong style="text-transform:capitalize; margin-left:10px;"><?php echo $amount_in_word.' Taka Only';?></strong>
                                   </div>
                                   </div> 
                                   
                                </div>
                               
                               <div style="width:100%; float:left; margin-top:50px;">	
                                  	  	<div style="border-top:1px solid #ccc; border-right:none; width:35%; float:left; text-align:left">
                                        <h5 style="font-size:11px; padding:3px; margin:0">Depositor's Signature<br /><br />Date : <strong><?php echo date('l, d F, Y',strtotime($pay_date));?></strong></h5>
                                        </div>
                                        <div style="border-top:1px solid #ccc; width:35%; float:right; text-align:left">
                                        <h5 style="font-size:11px; padding:3px; margin:0">Recipient Signature<br /><br />Date : <strong><?php echo date('l, d F, Y',strtotime($pay_date));?></strong></h5></div>
                                   </div>
                        </div>
