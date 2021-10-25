<script type="text/javascript">
$(document).ready(function(){
	$("#nextFirst").click(function(){
		$("#registration_form").hide();
		$("#registration_form1").slideDown(500);
	});
	$("#prevFirst").click(function(){
		$("#registration_form1").slideUp(500);
		$("#registration_form").show(500);
	});
});

function changedoctortype(symptom){	
	  $.ajax({
		   type: "GET",
		   url: '<?php echo base_url()?>index/symptom_details',
		   data: "selectedSymptom="+symptom,
		   success: function(data){
				$('#symptomDetails').html(data);
		   }
	 });
}

function bloodshow(){	
	var bloodforyes = document.getElementById('bloodforyes');
	if(bloodforyes.checked){
		document.getElementById('bloodforctext').style.display='inline';
	}
	else{
		document.getElementById('bloodforctext').style.display='none';	
	}
	
	var urineforno = document.getElementById('urineforno');
	if(urineforno.checked){
		document.getElementById('uninefortext').style.display='inline';
	}
	else{
		document.getElementById('uninefortext').style.display='none';	
	}
}
</script>
<div class="right_col" role="main">
<div class="">

<div class="page-title">
                        <div class="title_left">
                            <h3>Patient Investigation Details</h3>
                        </div>
                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">



                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Patient Investigation Form</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                <?php echo $this->session->flashdata('successMsg');?>
                                <?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');?>
                                   <div id="registration_form">	
		                                     <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Patient ID No<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <!--<input type="text" name="patient_id" required class="form-control col-md-7 col-xs-12"
                                                                placeholder='Patient ID No' onFocus="this.placeholder=''" value="<?php echo set_value('patient_id'); ?>" onBlur="this.placeholder='Patient ID No'">-->
                                                                <select name="patient_id" class="form-control col-md-3 col-sm-3 col-xs-12">
																	<?php foreach($patient_info->result() as $patInfo){
																		?>
												<option value="<?php echo $patInfo->patient_id;?>"><?php echo $patInfo->patient_id;?></option>
                                                                        <?php
																		}?>
                                                                	
                                                                </select>
                                                                 <?php echo form_error('patient_id', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                            </div>
                                                        </div>
                                             <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Date of Registration</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input  class="date-picker form-control col-md-7 col-xs-12" type="text" value="<?php echo set_value('regis_date'); ?>" name="regis_date"
                                                placeholder='Date of Registration' onFocus="this.placeholder=''" onBlur="this.placeholder='Date of Registration'">
                                                <?php echo form_error('regis_date', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                  	  <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><h4 class="panel-title">
                                                  General test</h4></a>
                                            </div>
                                            
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                      <div class="col-md-6 col-sm-6 col-xs-6">
                                                      
                                                      
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">CBC</label>
                                                        <div class="col-sm-8">
                                                        <div class="col-sm-12"><span style="float:left; margin-right:10px; padding-top:5px;">HB% </span> 
                                                        <input class="form-control" type="text" style="width:60%; float:left; margin-bottom:5px" name="hb"> 
                                                        <span style="padding-top:5px; float:left; margin-left:5px">mg/dl</span></div>
                                                        <div class="col-sm-12"><span style="float:left; margin-right:10px; padding-top:5px;">WBC </span> 
                                                        <input class="form-control" type="text" style="width:60%; float:left; margin-bottom:5px" name="wbc"> 
                                                        <span style="padding-top:5px; float:left; margin-left:5px">%</span></div>
                                                        
                                                        <div class="col-sm-12">
                                                        <span style="float:left; padding-top:5px;">DC</span> 
                                                        	<div class="col-sm-10 col-sm-offset-1">
                                                               <div class="col-sm-12">
                                                                <span style="float:left; margin-right:10px; padding-top:5px;">N </span> 
                                                                <input class="form-control" type="text" style="width:60%; float:left; margin-bottom:5px" name="dc_N"> 
                                                                <span style="padding-top:5px; float:left; margin-left:5px">%</span>
                                                        	</div>
                                                               <div class="col-sm-12">
                                                                <span style="float:left; margin-right:10px; padding-top:5px;">L </span> 
                                                                <input class="form-control" type="text" style="width:60%; float:left; margin-bottom:5px" name="dc_L"> 
                                                                <span style="padding-top:5px; float:left; margin-left:5px">%</span>
                                                        	</div>
                                                               <div class="col-sm-12">
                                                                    <span style="float:left; margin-right:10px; padding-top:5px;">E </span> 
                                                                    <input class="form-control" type="text" style="width:60%; float:left; margin-bottom:5px" name="dc_E"> 
                                                                    <span style="padding-top:5px; float:left; margin-left:5px">%</span>
                                                                </div>
                                                               <div class="col-sm-12">
                                                                    <span style="float:left; margin-right:10px; padding-top:5px;">M </span> 
                                                                    <input class="form-control" type="text" style="width:60%; float:left; margin-bottom:5px" name="dc_M"> 
                                                                    <span style="padding-top:5px; float:left; margin-left:5px">%</span>
                                                                </div>
                                                          </div>  
                                                        </div>
                                                      
                                                      
                                                        <div class="col-sm-12"><span style="float:left; margin-right:10px; padding-top:5px;">PLT </span> 
                                                        <input class="form-control" type="text" style="width:60%; float:left; margin-bottom:5px" name="plt"> 
                                                        <span style="padding-top:5px; float:left; margin-left:5px">/cmm</span></div>
                                                        <div class="col-sm-12"><span style="float:left; margin-right:10px; padding-top:5px;">ESR </span> 
                                                        <input class="form-control" type="text" style="width:60%; float:left; margin-bottom:5px" name="esr"> 
                                                        <span style="padding-top:5px; float:left; margin-left:5px">in 1st hour</span></div>
                                                        
                                                        <div class="col-sm-12"><span style="float:left; margin-right:10px; padding-top:5px;">PBF </span> 
                                                       <textarea class="form-control" name="pbf"></textarea></div>
                                                        </div>
                                                      </div>
                                                      
                                                      
                                                      
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">Haematocrit</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="haematocrit"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">C-reactive protein(CRP)</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" style="width:80%;" type="text" name="creactive">
                                                        <span style="padding-top:5px; float:left; margin-left:5px">/mo/di</span>
                                                        </div>
                                                      </div>
                                                     
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">Blood for C/S</label>
                                                        <div class="col-sm-8">
                                                        <div class="col-sm-12"><span style="float:left; margin-right:10px; padding-top:5px;">
                                                        <input type="radio" value="Yes" name="bloodforcs" id="bloodforyes" onclick="bloodshow();" />  Yes
                                                        <input type="radio" value="No" name="bloodforcs" id="bloodforno" onclick="bloodshow();"/>  No
                                                         </span>
                                                         </div>
                                                        
                                                        <div class="col-sm-12" id="bloodforctext" style="display:none">
                                                        <span style="float:left; margin-right:10px; padding-top:5px;">
                                                        If Positive, than organism </span> 
                                                        <textarea name="bloodfortext" class="form-control"></textarea>
                                                        
                                                        </div>
                                                        
                                                        
                                                        
                                                        </div>
                                                      </div>
                                                      <!--<div class="form-group">
                                                        <label class="control-label col-sm-4">Urine for R/M/E</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="urineforrme"></div>
                                                      </div>-->
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">Urine for R/M/E</label>
                                                        <div class="col-sm-8">
                                                            <div class="col-sm-12">
                                                                        <span style="float:left; margin-right:10px; padding-top:5px;">Allounuin</span> 
                                                                        <input class="form-control" type="text" style="width:60%; float:left; margin-bottom:5px" name="urine_allounuin"> 
                                                                        
                                                                    </div>
                                                            <div class="col-sm-12">
                                                                        <span style="float:left; margin-right:10px; padding-top:5px;">pus Cell </span> 
                                                                        <input class="form-control" type="text" style="width:60%; float:left; margin-bottom:5px" name="urine_puscell"> 
                                                                        <span style="padding-top:5px; float:left; margin-left:5px">/HPF</span>
                                                                    </div>
                                                            <div class="col-sm-12">
                                                                        <span style="float:left; margin-right:10px; padding-top:5px;">RBC</span> 
                                                                        <input class="form-control" type="text" style="width:60%; float:left; margin-bottom:5px" name="rbc"> 
                                                                        <span style="padding-top:5px; float:left; margin-left:5px">/HPF</span>
                                                                    </div>
                                                            <div class="col-sm-12">
                                                                        <span style="float:left; margin-right:10px; padding-top:5px;">CAST</span> 
                                                                        <input class="form-control" type="text" style="width:60%; float:left; margin-bottom:5px" name="urine_rbc"> 
                                                                       
                                                                    </div>
                                                        <div class="col-sm-12" id="bloodforctext" style="display:none">
                                                        <span style="float:left; margin-right:10px; padding-top:5px;">
                                                        If Positive, than organism </span> 
                                                        <textarea name="bloodfortext" class="form-control"></textarea>
                                                        
                                                        </div>
                                                        
                                                        
                                                        
                                                        </div>
                                                      </div>
                                                      <!--<div class="form-group">
                                                        <label class="control-label col-sm-4">Urine for C/S</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-7 col-xs-12" type="text" name="urineforcs"></div>
                                       			  </div>-->
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">Urine for C/S</label>
                                                        <div class="col-sm-8">
                                                        <div class="col-sm-12"><span style="float:left; margin-right:10px; padding-top:5px;">
                                                        <input type="radio" value="Yes" name="urineforcs" id="urineforno"  onclick="bloodshow();" />  Yes
                                                        <input type="radio" value="No" name="urineforcs" onclick="bloodshow();"/>  No
                                                         </span>
                                                         </div>
                                                        
                                                        <div class="col-sm-12" id="uninefortext" style="display:none">
                                                        <span style="float:left; margin-right:10px; padding-top:5px;">
                                                        If Positive, than organism </span> 
                                                        <textarea name="uninefortext" class="form-control"></textarea>
                                                        
                                                        </div>
                                                        
                                                        
                                                        
                                                        </div>
                                                      </div>
                                                     	  <div class="form-group">
                                                        <label class="control-label col-sm-4">Stool R/M/E, pH, reducing substance</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="stoolrmeph"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">Stool OBT</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-7 col-xs-12" type="text" name="stoolobt"></div>
                                       			  </div>
                                                 	  <div class="form-group">
                                                        <label class="control-label col-sm-4">Stool for C/S</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="stoolforcs"></div>
                                                      </div>
                                                      
                                                 	
                                        		</div>
                                              		  <div class="col-md-6 col-sm-6 col-xs-6">
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">S. Creatinine</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-7 col-xs-12" type="text" name="creatinine"></div>
                                       			  </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">BUN</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="bun"></div>
                                                      </div>
                                                      
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">S. Electrolyte</label>
                                                        <div class="col-sm-8">
                                                        <div class="col-sm-12"><span style="float:left; margin-right:10px; padding-top:5px;">Nat </span> 
                                                <input class="form-control" type="text" style="width:60%; float:left; margin-bottom:5px" name="nat"> 
                                                        <span style="padding-top:5px; float:left; margin-left:5px">mmol/2</span></div>
                                                        <div class="col-sm-12"><span style="float:left; margin-right:10px; padding-top:5px;">KT </span> 
                                                        <input class="form-control" type="text" style="width:60%; float:left; margin-bottom:5px" name="kt"> 
                                                        <span style="padding-top:5px; float:left; margin-left:5px">mmol/2</span></div>
                                                        <div class="col-sm-12"><span style="float:left; margin-right:10px; padding-top:5px;">CL </span> 
                                                        <input class="form-control" type="text" style="width:60%; float:left; margin-bottom:5px" name="cl"> 
                                                        <span style="padding-top:5px; float:left; margin-left:5px">mmol/2</span></div>
                                                        <div class="col-sm-12"><span style="float:left; margin-right:10px; padding-top:5px;">HCO3 </span> 
                                                        <input class="form-control" type="text" style="width:60%; float:left; margin-bottom:5px" name="hoc3"> 
                                                        <span style="padding-top:5px; float:left; margin-left:5px">mmol/2</span></div>
                                                        
                                                        
                                                      
                                                      
                                                        
                                                        
                                                        
                                                        
                                                        </div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">Stool Electrolyte & osmolarity</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="stoolelectrolyte"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">Stool for foecal fat</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="stoolforfoecal"
                                                                    placeholder='Hb%' onFocus="this.placeholder=''" onBlur="this.placeholder='Hb%'"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">LDH</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-7 col-xs-12" type="text" name="ldh"></div>
                                       			  </div>
                                                  	  <div class="form-group">
                                                        <label class="control-label col-sm-4">RBS</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="rbs"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">S. Calcium</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-7 col-xs-12" type="text" name="scalcium"></div>
                                       			  </div>
                                                 	  <div class="form-group">
                                                        <label class="control-label col-sm-4">Fasting lipid profile</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="fastinglipid"></div>
                                                      </div>
                                        		</div>
	                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                <h4 class="panel-title">
                                                Liver function test</h4></a>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                      <div class="col-md-6 col-sm-6 col-xs-6">
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-6">S. bilirubin- Total</label>
                                                        <div class="col-sm-6" style="margin-top:5px">
                                                       		Direct 	 <input type="radio" name="sbilirubintotal" value="Direct" />
                                                            Indirect <input type="radio" name="sbilirubintotal" value="Indirect" />
                                                        </div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-6">S. ALT</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-7 col-xs-12" type="text" name="salt"></div>
                                       			  </div>
                                                  	  <div class="form-group">
                                                        <label class="control-label col-sm-6">Prothrombin Time(PT)</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="prothrombintime"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-6">Activated partial thromboplastin time(APTT)</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-7 col-xs-12" type="text" name="activatedpartial"></div>
                                       			  </div>
                                                 	  
                                                      
                                                 	
                                        		</div>
                                                      <div class="col-md-6 col-sm-6 col-xs-6">
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-6">S. Albumin</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="salbumin"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-6">Serum alkaline phosphates (ALP)</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-7 col-xs-12" type="text" name="serumalkaline"></div>
                                       			  </div>
                                                  	  <div class="form-group">
                                                        <label class="control-label col-sm-6">Gamma-glutamyltranspeptidase (GGT).</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="gammaglutamyltramy"></div>
                                                      </div>
                                                 	  
                                                      
                                                 	
                                        		</div>   
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                <h4 class="panel-title">Renal function test</h4></a>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                      <div class="col-md-6 col-sm-6 col-xs-6">
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-6">Urine Protein creatinine ratio</label>
                                                        <div class="col-sm-6">
                                             <input class="form-control col-md-7 col-xs-12" type="text" name="urineproteincreatinine"></div>
                                       			  </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-6">Urinary calcium & creatinine ratio</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-7 col-xs-12" type="text" name="urinarycalcium"></div>
                                       			  </div>
                                                  	  <div class="form-group">
                                                        <label class="control-label col-sm-6">Urine uric acid</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="urineuricacid"></div>
                                                      </div>
                                                     
                                                      
                                                      
                                                 	
                                        		</div>
                                                      <div class="col-md-6 col-sm-6 col-xs-6">
                                                     <div class="form-group">
                                                        <label class="control-label col-sm-6">C3</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="c3"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-6">C4</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="c4"></div>
                                                      </div>
                                                 	  
                                                      
                                                 	
                                        		</div>   
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><h4 class="panel-title">
                                                Radiology</h4></a>
                                            </div>
                                            <div id="collapseFour" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                      <div class="col-md-6 col-sm-6 col-xs-6">
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-6">CXR  P/A view</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-7 col-xs-12" type="text" name="cxrpaview"></div>
                                       			  </div>
                                                  	  <div class="form-group">
                                                        <label class="control-label col-sm-6">Plain X-ray abdomen in erect posture</label>
                                                        <div class="col-sm-6">
                                                       <input class="form-control col-md-12 col-lg-12" type="text" name="plainxrayabdomen"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-6">USG of HBS system </label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-7 col-xs-12" type="text" name="usgofhbs"></div>
                                       			  </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-6">Barium study</label>
                                                        <div class="col-sm-6" style="margin-top:5px">
                                                       		<input type="radio" name="bariumstudy" value="Barium Swallow" /> Barium Swallow 	 
                                                            <input type="radio" name="bariumstudy" value="Barium Meal" /> Barium Meal 
                                                            <input type="radio" name="bariumstudy" value="Barium follow through" /> Barium follow through 	 
                                                            <input type="radio" name="bariumstudy" value="Indirect" /> Barium Enema 
                                                        </div>
                                                      </div>
                                                      
                                                 	  
                                                      
                                                 	
                                        		</div>
                                                      <div class="col-md-6 col-sm-6 col-xs-6">
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-6">CT  scan of abdomen</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="ctscanofabdomen"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-6">MRCP</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-7 col-xs-12" type="text" name="mrcp"></div>
                                       			  </div>
                                                  	  <div class="form-group">
                                                        <label class="control-label col-sm-6">ERCP</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="ercp"></div>
                                                      </div>
                                                 	  
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-6">Dropler study of Portal vein </label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="droplerstudy"></div>
                                                      </div>
                                                 	
                                        		</div>   
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><h4 class="panel-title">
                                                Viral markers</h4></a>
                                            </div>
                                            <div id="collapseFive" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                      <div class="col-md-6 col-sm-6 col-xs-6">
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-6">Anti HAV IgM</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-7 col-xs-12" type="text" name="antihavlgm"></div>
                                       			  </div>
                                                  	  <div class="form-group">
                                                        <label class="control-label col-sm-6">Anti HEV IgM</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="antihevlgm"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-6">HBsAg </label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-7 col-xs-12" type="text" name="hbsag"></div>
                                       			  </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-6">Anti HBc IgM </label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-7 col-xs-12" type="text" name="antihbclgm"></div>
                                       			  </div>
                                                      
                                                 	 <div class="form-group">
                                                        <label class="control-label col-sm-6">HBeAg</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="hbeag2"></div>
                                                      </div> 
                                                      
                                                 	
                                        		</div>
                                                      <div class="col-md-6 col-sm-6 col-xs-6">
                                                      
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-6">HBV DNA </label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-7 col-xs-12" type="text" name="hbvdna"></div>
                                       			  </div>
                                                  	  <div class="form-group">
                                                        <label class="control-label col-sm-6">Anti HBs</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="abtihbs"></div>
                                                      </div>
                                                 	  
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-6">Anti HBe </label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="antihbe2"></div>
                                                      </div>
                                                 	<div class="form-group">
                                                        <label class="control-label col-sm-6">Anti HCV</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="antihcv2"></div>
                                                      </div>
                                        		</div>   
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix"><h4 class="panel-title">
                                                Wilson disease</h4></a>
                                            </div>
                                            <div id="collapseSix" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                      
                                                      <div class="col-md-6 col-sm-6 col-xs-6">
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-6">S. Ceruloplasmin</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="ceruloplasmin"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-6">Urinary copper</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-7 col-xs-12" type="text" name="urinarycopper"></div>
                                       			  </div>
                                                  	  <div class="form-group">
                                                        <label class="control-label col-sm-6">S. copper</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="copper"></div>
                                                      </div>
                                                 	  
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-6">Penicillamine challenge test</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="penicillamine"></div>
                                                      </div>
                                                 	
                                        		</div>   
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix"><h4 class="panel-title">
                                                Auto-immune disease</h4></a>
                                            </div>
                                            <div id="collapseSix" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                      
                                                      <div class="col-md-6 col-sm-6 col-xs-6">
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-6">ANA</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="ana"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-6">Total IgG</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-7 col-xs-12" type="text" name="totallgg"></div>
                                       			  </div>
                                                  	  <div class="form-group">
                                                        <label class="control-label col-sm-6">LKM1</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="lkm1"></div>
                                                      </div>
                                                 	  <div class="form-group">
                                                        <label class="control-label col-sm-6">Anti SmA</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="antisma"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-6">Coomb's test</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="coombstest"></div>
                                                      </div>
                                                 	
                                        		</div>   
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven"><h4 class="panel-title">
                                                Hormone study</h4></a>
                                            </div>
                                            <div id="collapseSeven" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                      
                                                      <div class="col-md-6 col-sm-6 col-xs-6">
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-6">FT4</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="ft4"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-6">TSH</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-7 col-xs-12" type="text" name="tsh"></div>
                                       			  </div>
                                                  	  <div class="form-group">
                                                        <label class="control-label col-sm-6">Growth hormone</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="growthhoromne"></div>
                                                      </div>
                                                 	  <div class="form-group">
                                                        <label class="control-label col-sm-6">S. cortisol</label>
                                                        <div class="col-sm-6">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="cortisal"></div>
                                                      </div>
                                                      
                                                 	
                                        		</div>   
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight"><h4 class="panel-title">
                                                Pancreatic function test</h4></a>
                                            </div>
                                            <div id="collapseEight" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                      
                                                      <div class="col-md-6 col-sm-6 col-xs-6">
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">S.Lipase</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="lipase"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">S.Amylase</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-7 col-xs-12" type="text" name="amylase"></div>
                                       			  </div>
                                                  	  <div class="form-group">
                                                        <label class="control-label col-sm-4">IgG 4</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="lgg4"></div>
                                                      </div>
                                                 	  <div class="form-group">
                                                        <label class="control-label col-sm-4">Ascitic fluid study</label>
                                                        <div class="col-sm-8">
                                                        <input type="radio" name="asciticfluid" value="Cytology"> Cytology
                                                        <input type="radio" name="asciticfluid" value="Biochemistry"> Biochemistry>
                                                        <div style="margin-left:70px;">
                                                        	<input type="checkbox" name="biochemistry" value="Albumin"> Albumin<br />
                                                            <input type="checkbox" name="biochemistry" value="Amylase"> Amylase<br />
                                                            <input type="checkbox" name="biochemistry" value="TG"> TG<br />
                                                        </div>
                                                        <input type="radio" name="asciticfluid" value="ADA"> ADA
                                                        <input type="radio" name="asciticfluid" value="Gene xpert study"> Gene xpert study
                                                        <input type="radio" name="asciticfluid" value="Cytospin"> Cytospin
                                                        </div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">S. IgA</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-7 col-xs-12" type="text" name="siga2"></div>
                                       			  </div>
                                                      <div class="form-group">
                                                            <label class="control-label col-sm-4">Reticulocyte count</label>
                                                            <div class="col-sm-8">
                                                            <input class="form-control col-md-7 col-xs-12" type="text" name="reticulocytecount"></div>
                                                      </div>
                                                      
                                                      
                                                 	
                                        		</div>   
                                                	  <div class="col-md-6 col-sm-6 col-xs-6">
                                                      <div class="form-group">
                                                            <label class="control-label col-sm-4">Osmotic fragility test</label>
                                                            <div class="col-sm-8">
                                                            <input class="form-control col-md-7 col-xs-12" type="text" name="osmoticfragility"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">Hepatobiliary scintigraphy</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="hepatobiliary"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">TORCH screen</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-7 col-xs-12" type="text" name="torchscreen"></div>
                                       			  </div>
                                                  	  <div class="form-group">
                                                        <label class="control-label col-sm-4">VDRL</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="vdrl"></div>
                                                      </div>
                                                 	  <div class="form-group">
                                                        <label class="control-label col-sm-4">Serum lactate level</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="serumlactate"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">S. Blood pH</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-7 col-xs-12" type="text" name="bloodph2"></div>
                                       			  </div>
                                                      <div class="form-group">
                                                            <label class="control-label col-sm-4">Serum uric acid level</label>
                                                            <div class="col-sm-8">
                                                            <input class="form-control col-md-7 col-xs-12" type="text" name="serumuricacidlevel2"></div>
                                                      </div>
                                                      
                                                      
                                                 	
                                        		</div>
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseNine"><h4 class="panel-title">
                                                Special test</h4></a>
                                            </div>
                                            <div id="collapseNine" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                      
                                                      <div class="col-md-6 col-sm-6 col-xs-6">
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">Liver biopsy</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="liverbiopsy"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">Endoscopy and biopsy from duodenum</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-7 col-xs-12" type="text" name="endoscopyandbiopsy">
                                                        </div>
                                       			  </div>
                                                  	  <div class="form-group">
                                                        <label class="control-label col-sm-4">Colonoscopy & biopsy</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="colonoscopybiopsy"></div>
                                                      </div>
                                                 	  <div class="form-group">
                                                        <label class="control-label col-sm-4">Alpha-1 antitrypsin</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="alphaantitrypsin"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">RBC scan</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-7 col-xs-12" type="text" name="rbcscan"></div>
                                       			  </div>
                                                      <div class="form-group">
                                                            <label class="control-label col-sm-4">Meckel's scan</label>
                                                            <div class="col-sm-8">
                                                            <input class="form-control col-md-7 col-xs-12" type="text" name="meckelscan"></div>
                                                      </div>
                                                      
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">tTG IgA</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="ttgiga"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">Sweat chloride test</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="sweatchloride"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">Anti endomysial antibody</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="antiendomysial"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">G6PD</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="g6pd"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">Factor assay : Factor VIII,IX,VWF</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="factorassay"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">Foecal Elastage</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="foecalelastage"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">Foecal calprotectin</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="foecalcalprotectin"></div>
                                                      </div>
                                                 	
                                        		</div>   
                                                	  <div class="col-md-6 col-sm-6 col-xs-6">
                                                      
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">pANCA</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="panca"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">cASCA</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-7 col-xs-12" type="text" name="casca">
                                                        </div>
                                       			  </div>
                                                  	  <div class="form-group">
                                                        <label class="control-label col-sm-4">Anti mitochondrial antibody</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="antimitochondrial"></div>
                                                      </div>
                                                 	  <div class="form-group">
                                                        <label class="control-label col-sm-4">Immuno Reactive Trypsonogen(IRT)</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="immunoreactive">
                                                        </div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">Protein C</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-7 col-xs-12" type="text" name="proteinc"></div>
                                       			  </div>
                                                      <div class="form-group">
                                                            <label class="control-label col-sm-4">Protein S</label>
                                                            <div class="col-sm-8">
                                                            <input class="form-control col-md-7 col-xs-12" type="text" name="proteins"></div>
                                                      </div>
                                                      
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">Anti thrombin III</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="antithrombin111"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">Clostridium deficile toxin and antigen</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="clostridium"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">Clostridium deficile toxin and antigen</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="clostridium"></div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="control-label col-sm-4">Urinary succino succinyl acetone</label>
                                                        <div class="col-sm-8">
                                                        <input class="form-control col-md-12 col-lg-12" type="text" name="urinarysuccino"></div>
                                                      </div>
                                                      
                                                      
                                                      
                                                 	
                                        		</div>
                                                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   </div> 
                                  
                                   <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-2 col-xs-12">
                                            <button type="reset" class="btn btn-primary">Reset</button>
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                                    
                                   
                               <?php echo form_close();?>
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
               