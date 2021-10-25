<script type="text/javascript">
$(document).ready(function(){
	//alert('dfdfdfdkjhfdkjuj');
	$("#patient_id").change(function() {
		  var patientid = $(this).val();
		  //alert(patientid);
		  $.ajax({
			// dataType: 'json',
			 type: "POST",
			 url: "<?php echo base_url('index/idcardajax');?>",
			 data: {pid:patientid},
			 success: function(data) {
			 // alert(data);
			  $("#idcarddisplay").html(data);
			 }
		   });
	});
});
</script>
<div class="right_col" role="main">
                <div class="">
                <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Patient ID Card</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                <?php echo $this->session->flashdata('successMsg');?>
                                <?php 
								$attr=array(
									"class"=>'form-horizontal form-label-left',
									"name"=>'valform'
								);
								echo form_open_multipart('',$attr);?>
                            
                            
                                <div class="form-group" style="margin-top:30px;">
                            			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                                        	
                                          <select name="patient_id" id="patient_id" class="form-control" required>
                                                <option value="">Select Patient ID</option>
                                                <?php
                                                    foreach($patientList->result() as $pat){
                                                ?>
                                                <option value="<?php echo $pat->patient_id;?>"><?php echo $pat->patient_id;?></option>
                                                <?php } ?>
                                          </select>
                  
                                        </div>
                                    </div>
                                    
                                    
                                <div id="idcarddisplay"></div>
                        </div>
                    </div>
                </div>              