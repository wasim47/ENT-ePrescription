
<style>
select option{
	padding:5px;
	cursor:pointer;
}
</style>

<script type="text/javascript">
/*function notneededfunc(){
	var notneed=document.getElementById('notneeded');
	
	if(notneed.checked){
		document.getElementById("next_followup_day").disabled = true; 
		document.getElementById("next_followup_weeks").disabled = true; 
		document.getElementById('notneeded').value='Not Needed';
	}
	else{
		document.getElementById("next_followup_day").disabled = false; 
		document.getElementById("next_followup_weeks").disabled = false;
		document.getElementById('notneeded').value='';
	}
}*/

function advforfollowup(){
	var regtype = document.valform.advice_admission.value;
	
	if(regtype=="Prescription"){
		document.getElementById("adviceforfollowup").style.display = 'inline'; 
	}
	else{
		document.getElementById("adviceforfollowup").style.display = 'none'; 
	}
}
</script>
<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Patient History</h3>
                        </div>
                        
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">




    





                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                
                                <div class="x_content">
                                <?php echo $this->session->flashdata('successMsg');?>
                                <?php 
									$attr=array(
										"class"=>'form-horizontal form-label-left',
										"name"=>'valform'
									);
									echo form_open_multipart('index/historyEntry/'.$submitDetails,$attr);
								?>
                                   <div id="registration_form1">	
                                  	  <div class="panel-group">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><h4 class="panel-title">
                                                   Patient History Information </h4></a>
                                            </div>
                                            
                                            
                                            <div class="panel-body"><?php $this->load->view('frontend/department_page/ent');?></div>
                                            
                                        </div>
                                        
                                         <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit" style="font-size:18px">
                                        </div>
                                    </div>
                                    </div>
                                   </div> 
                               <?php echo form_close();?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>