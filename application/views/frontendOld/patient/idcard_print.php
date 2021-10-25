<script>
window.print();
</script>
<link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>asset/fonts/css/font-awesome.min.css" rel="stylesheet">

<div style="width:420px; background:#FFFBFF; height:200px; padding:5px; background:#eaeaea;margin:10% auto;">
  <div style="width:410px; background:#FFFBFF; height:190px; border:1px solid #ccc; border-radius:25px;">
     <div style="width:410px; height:150px;">
          <div style="width:100px; height:100px; margin:18px 15px; float:left;">
              <img src="<?php echo base_url('asset/images/defaultimg.jpg');?>" style="width:100%; height:110px" />
          </div>
          <div style="width:260px; height:100px; margin:20px 0 0 10px;; float:left;">
              <table width="100%" align="left" style="color:#333;  font-size:13px;">
                  <tr>
                      <td height="20">Name</td>
                      <td><?php echo $patient_details['patient_name'];?></td>
                  </tr>
                  <tr>
                      <td height="22">Patient ID</td>
                      <td><?php echo $patient_details['patient_id'];?></td>
                  </tr>
                   <tr>
                      <td height="21">Mobile</td>
                      <td><?php echo $patient_details['phone'];?></td>
                  </tr>
                   <tr>
                      <td height="20">Age</td>
                      <td><?php echo $patient_details['age'];?> Years Old</td>
                  </tr>
                  <tr>
                      <td height="20">Sex</td>
                      <td><?php echo $patient_details['gender'];?></td>
                  </tr>
                  <tr>
                      <td height="20">Blood Group</td>
                      <td><?php echo $patient_details['bloodgroup'];?></td>
                  </tr>
              </table>
          </div>
     </div>
     <div style="width:380px; margin:auto; height:35px; border-top:1px solid #ccc">
      <div style="widows:100%;">
          <div style="width:35px; height:auto; float:left; margin-left:5px;">
               <img src="<?php echo base_url('asset/images/logo.png');?>" 
               style="width:30px; height:auto; padding:5px" />
          </div>
          <div style="width:150px; height:auto; float:left;">
              <div style="width:100%; height:10px; padding-top:2px; float:left; font-size:10px;">
              Bangladesh ENT Hospital Ltd.</div>
              <div style="width:100%; height:10px;padding-top:7px; float:left; font-size:10px;">
              <a href="www.benth.com.bd" style="color:#333; text-decoration:none">www.benth.com.bd</a></div>
          </div>
          
          
          <div style="width:150px; height:auto; float:right;">
              <div style="width:100%; height:10px; padding-top:2px; float:left; font-size:10px;">
                  Hotline: +8809666710710
              <div>
              <div style="width:100%; height:10px;padding-top:2px; float:left; font-size:10px;">
              <a href="www.benth.com.bd" style="color:#333; text-decoration:none">Email: info@benth.com.bd</a></div>
          </div>
      </div>
     
     </div>
  </div>	
</div>
  
</div>
</div>
