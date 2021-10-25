
<div class="form-group">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

<div style="width:420px; background:#FFFBFF; height:200px; padding:5px; background:#eaeaea">
  <div style="width:410px; background:#FFFBFF; height:190px; border:1px solid #ccc; border-radius:25px;">
     <div style="width:410px; height:150px;">
          <div style="width:100px; height:100px; margin:18px 15px; float:left;">
              <img src="<?php echo base_url('asset/images/defaultimg.jpg');?>" style="width:100%; height:110px" />
          </div>
          <div style="width:260px; height:100px; margin:20px 0 0 10px;; float:left;">
              <table width="100%" align="left">
                  <tr>
                      <td>Name</td>
                      <td><?php echo $patient_details['patient_name'];?></td>
                  </tr>
                  <tr>
                      <td>Patient ID</td>
                      <td><?php echo $patient_details['patient_id'];?></td>
                  </tr>
                   <tr>
                      <td>Mobile</td>
                      <td><?php echo $patient_details['phone'];?></td>
                  </tr>
                   <tr>
                      <td>Age</td>
                      <td><?php echo $patient_details['age'];?> Years Old</td>
                  </tr>
                  <tr>
                      <td>Sex</td>
                      <td><?php echo $patient_details['gender'];?></td>
                  </tr>
                  <tr>
                      <td>Blood Group</td>
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
              <a href="www.benth.com.bd">www.benth.com.bd</a></div>
          </div>
          
          
          <div style="width:150px; height:auto; float:right;">
              <div style="width:100%; height:10px; padding-top:2px; float:left; font-size:10px;">
                  Hotline: +8809666710710
              <div>
              <div style="width:100%; height:10px;padding-top:2px; float:left; font-size:10px;">
              <a href="www.benth.com.bd">Email: info@benth.com.bd</a></div>
          </div>
      </div>
     
     </div>
  </div>	
</div>
  
</div>
</div>

<div class="form-group" style="margin-top:30px;">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
  
  <input type="submit" name="printidcard" class="btn btn-success" value="Create" style="font-size:18px; text-align:center">
</div>
</div>
<?php echo form_close();?>
</div>
</div>