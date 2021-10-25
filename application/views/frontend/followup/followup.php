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

	
	
});
</script>

<script type="text/javascript">
$(document).ready(function(){
$(".search_keyword").keyup(function() 
{ 
	var search_keyword_value = $(this).val();
	var dataString = 'search_patientid='+ search_keyword_value;
	
	if(search_keyword_value!='')
	{
		
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('index/autocomplete');?>",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#result").html(html).show();
			}
		});
	}
	return false;    
});
});

function getresultdata(id){
	var listval = document.getElementById('listitem'+id).innerHTML;
	document.getElementById('patient_id').value = listval;
	document.getElementById('result').style.display = 'none';
	
	
	//$("#patient_id").change(function() {
	var patientid = $("#patient_id").val();
	
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
		$("#prihistory").html(data.phistory);
		//alert(data.phistory);
	   }
	 });
	//});
}
</script>


<style type="text/css">
	#result
	{
		position:absolute;
		width:300px;
		display:none;
		margin-top:-1px;
		border-top:0px;
		overflow:hidden;
		border:1px #CDCDCD solid;
		background-color: white;
		z-index:1000000;
	}
	#result ul
	{
		display:block;
		padding:0;
		margin:0;
	}
	#result li
	{
		display:block;
		padding:5px;
		cursor:pointer;
		font-family:tahoma;
		padding:10px; 
		border-bottom:1px #CDCDCD dashed;
		font-size:15px; 
		margin:2px 0;
	}
	#result li:hover
	{
		background:#364956;
		color:#FFF;
	}
	.show
	{
		font-family:tahoma;
		padding:10px; 
		border-bottom:1px #CDCDCD dashed;
		font-size:15px; 
	}
	.show:hover
	{
		background:#364956;
		color:#FFF;
		cursor:pointer;
	}
</style>


  
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
                                    <a href="javascript:void();" id="newfollow" class="btn btn-success" style="font-size:18px; display:none">
                                    &laquo; New Follow Up</a>
                                    </h2>
                                  <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div id="newfollowup">
									<?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');?>
                                       <div id="registration_form">	
                                            <div class="col-md-9 col-sm-9 col-xs-10">  
                                                 <div class="form-group">
                                               		<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Patient ID No</label>
                                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                                            <input type="text" name="patient_id" id="patient_id" 
                                                            class="form-control search_keyword" autocomplete="off" />
                                                            <div id="result"></div>
                                                         </div>
                                                     </div>
                                           		 <div class="form-group">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Follow UP History :                                                </label>
                                                <div class="col-md-7 col-sm-7 col-xs-12">
                                                    <textarea name="followhistory" class="form-control" rows="5" placeholder="History"></textarea>
                                                </div>
                                            </div>
                                                 <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Advice for admission : </label>
                                            <div class="col-md-7 col-sm-7 col-xs-12">
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
                            <div class="col-md-7 col-sm-7 col-xs-12">
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
                                      			 <div class="form-group">
                                                    <div class="col-md-12 col-sm-2 col-xs-12 col-sm-offset-8">
                                                        <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                                    </div>
                                                </div>
                                             </div>
                                             <div class="col-md-3 col-sm-3 col-xs-3">                                                
                                               <button type="button" class="btn btn-warning btn-lg" style="margin-top:50%;" data-toggle="modal" data-target="#myModal">
                                               View Primary History</button>
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
                </div>
                
                
    
    

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="border-radius:0; background:#DF8813; color:#fff">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Patient Primary History</h4>
      </div>
      <div class="modal-body"><div id="prihistory"> <h2 style="text-align:center">Please Enter Patient ID</h2></div></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
            

               