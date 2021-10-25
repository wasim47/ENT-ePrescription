<script type="text/javascript">
function gerUrl(){	
		  var pathname = window.location.pathname; // Returns path only
		  var url      = window.location.href; 
}
//window.load=gerUrl();
</script>

<script type="text/javascript">
function notneededfunc(){
	var notneed=document.getElementById('notneeded');
	
	if(notneed.checked){
		document.getElementById("next_followup_day").disabled = true; 
		document.getElementById("next_followup_weeks").disabled = true; 
	}
	else{
		document.getElementById("next_followup_day").disabled = false; 
		document.getElementById("next_followup_weeks").disabled = false;
	}
}


$(document).ready(function(){
	$("#newfollow").click(function() {
		$("#newfollowup").show(500);
		$("#prevfollow").show(500);
		$("#followlist").slideUp(500);
		$("#newfollow").hide(500);
		$("#no_of_follow").show(500);
		$("#total_follow").hide(500);
	});
	
	
	$("#prevfollow").click(function() {
		var patientid = $("#patient_id").val();
		if(patientid==""){
			alert('Please FIrst Select Patient ID');
		}
		else{
			$("#newfollowup").slideUp(500);
			$("#followlist").show(500);
			$("#newfollow").show(500);
			$("#prevfollow").hide(500);
			$("#total_follow").show(500);
			$("#no_of_follow").hide(500);
		}
	});

	$("#patient_id").change(function() {
	var patientid = $(this).val();
	$.ajax({
	   dataType: 'json',
	   type: "POST",
	   url: "<?php echo base_url('index/followup_ajax');?>",
	   data: {pid:patientid},
	   success: function(data) {
	   	//alert(data.res);
		$("#followUpCount").html(data.result1);
		$("#followUplist").html(data.result2);
		$("#total_follow").html(data.nofollow);
	   }
	 });
	});
	
});
</script>
  <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $("#skills").autocomplete({
      source: '<?php echo base_url('index/searchajax');?>'
    });
  });
  
  </script>-->
  
<div class="right_col" role="main">
                <div class="">

                    
                    <div class="clearfix"></div>
                    <div class="row">



                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h1 style="width:80%; float:left; padding:0; margin:0" id="no_of_follow"> Follow Up <span id="followUpCount"></span></h1>
                                    <h1 style="width:80%; float:left; padding:0; margin:0; display:none" id="total_follow"></h1>
                                    <h2 style="width:20%; float:right; text-align:right">
                                    <a href="javascript:void();" id="prevfollow" class="btn btn-primary" style="font-size:18px">Previous Follow Up &raquo;</a>
                                    <a href="javascript:void();" id="newfollow" class="btn btn-success" style="font-size:18px; display:none">&laquo; New Follow Up</a>
                                    </h2>
                                  <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div id="newfollowup">
									<?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');?>
                                       <div id="registration_form">	
                                                 <div class="form-group">
                                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Patient ID No</label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="patient_id" id="patient_id" class="form-control col-md-3 col-sm-3 col-xs-12">
                                                	<option value="">Select First Patient Id</option>
                                                    <?php foreach($patient_info->result() as $patInfo){  ?>
                                                    <option value="<?php echo $patInfo->patient_id;?>"><?php echo $patInfo->patient_id;?></option>
														<?php }?>
                                                </select>
                                                                </div>
                                                            </div>
                                                 
                                           		 <div class="form-group">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">New Complaints :                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <textarea name="new_complaints" class="form-control" placeholder="New Complaints"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                                Diagnosis</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <textarea name="diagnosis" class="form-control" placeholder="Diagnosis"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                                Investigation</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <textarea name="investigatoin" class="form-control" placeholder="Laboratory"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                                Treatement Advised :</label>
                                                
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <textarea name="treatement" class="form-control" placeholder="Treatement Advised"></textarea>
                                                </div>
                                            </div>
                                             <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Advice for admission : </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="radio radio-danger" style="width:15%; float:left">
                                                    <input type="radio" name="advice_admission" value="Yes">
                                                    <label for="radio2">Yes</label>
                                                </div>
                                               <div class="radio radio-danger" style="width:15%; float:left">
                                                    <input type="radio" name="advice_admission" value="No">
                                                    <label for="radio2">No</label>
                                                </div>
                                            </div>
                                            </div>
                  							 <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Next follow up after : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            	<div style="width:75%; float:left">
                               <label class="control-label" style="float:left">Investigation: </label>
                               <input type="text" name="next_followup_day" id="next_followup_day" class="form-control" style="width:20%; float:left; margin-left:3px;" /> <span style="float:left; margin:5px;">Days,</span>
                               <input type="text" name="next_followup_weeks" id="next_followup_weeks" class="form-control" style="width:20%; float:left" /> <span style="float:left; margin:5px;">Weeks,</span>
                               </div>
                               <div class="checkbox checkbox-danger" style="width:25%; float:left">
                     <input name="next_followup_noneeded" id="notneeded" value="Not Needed" type="checkbox" class="styled" onclick="notneededfunc();">
                     <label>Not Needed</label></div>
                     
                              
                            </div>
                            </div>
                                            <!--<div class="form-group">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                                Date</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="regis_date" class="form-control date-picker" placeholder="Date"></textarea>
                                                </div>
                                            </div>-->
                                            <div class="form-group">
                                            <div class="col-md-12 col-sm-2 col-xs-12 col-sm-offset-8">
                                                <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                            </div>
                                        </div>
                                          
                                       </div> 
                                   <?php echo form_close();?>
                               </div>
                                    <div class="followup_list" id="followlist" style="display:none">
                                  		<div id="followUplist"></div>
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
               