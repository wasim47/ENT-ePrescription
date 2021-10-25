
<style>
select option{
	padding:5px;
	cursor:pointer;
}
</style>

<script type="text/javascript">
function notneededfunc(){
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
}
</script>
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="panel-group" id="accordion">
		 	<div class="panel panel-default">
            <div class="panel-heading">
            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Cheif Complaints : </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <textarea name="cheif_complaints" class="form-control"></textarea>
                        </div>
                        </div>
            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">History of Present Claim : </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <textarea name="present_claim" class="form-control"></textarea>
                        </div>
                        </div>
            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">History of Past Claim : </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <textarea name="past_claim" class="form-control"></textarea>
                        </div>
                        </div>
           </div>
           </div>
                    
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">
                      <h4 class="panel-title">Family history : </h4></a>
                  </div>
                  <div id="collapse8" class="panel-collapse collapse">
                      <div class="panel-body">
    
                            
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Family Members : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" name="family_member" class="form-control" />
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Pt's position and age of children</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" class="form-control" name="family_ageofchildren" />
                            </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Husband's job and health</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" class="form-control" name="family_husjobandhealth" />                             </div>
                            </div>
                           <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Relevent Diseases</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" class="form-control" name="family_otherrelenant_diseases" />                             </div>
                            </div>
                           
                            
                            
                                      
                            </div>
                  </div>
              </div>
              
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse9">
                      <h4 class="panel-title">Drug history : </h4></a>
                  </div>
                  <div id="collapse9" class="panel-collapse collapse">
                      <div class="panel-body">
    
                            
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">On OCP Inj. Depoprovera/Norplant s/c : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" class="form-control" name="drughistory_ocp" style="width:60%; float:left" /> Months/Years.
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Other Drugs</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" class="form-control" name="drughistory_drugs" />
                            </div>
                            </div>
                           
                           
                                         
                            </div>
                  </div>
              </div>
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse10">
                      <h4 class="panel-title">General Examination : </h4></a>
                  </div>
                  <div id="collapse10" class="panel-collapse collapse">
                      <div class="panel-body">
    
                            
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Appearence : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" name="ge_appearence" class="form-control" />
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Pulse</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" class="form-control" name="ge_pulse" style="width:60%; float:left;" /> mim
                            </div>
                            </div>
                            
                           <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Pallor</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" class="form-control" name="ge_pallor" />                             </div>
                            </div>
                           <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Characteristic facies</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" class="form-control" name="ge_characteristic" />                             </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">BP</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" class="form-control" name="ge_bp" style="width:60%; float:left" /> mmHg</div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Jaundice</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" class="form-control" name="ge_jaundice" /> </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Physical built</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" class="form-control" name="ge_physical" />                             </div>
                            </div>
                            
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Resp</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" class="form-control" name="ge_resp"  style="width:60%; float:left" /> mim                             </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Cyanosis</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" class="form-control" name="ge_cyanosis" />                             </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nutritional status</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" class="form-control" name="ge_nutritional" />                             </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Temp</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" class="form-control" name="ge_temp" style="width:60%; float:left;" />  F                            </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nail changes</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" class="form-control" name="ge_nailchanges" /></div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Dehydration</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" class="form-control" name="ge_dehydration" />                             </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Thyroid</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" class="form-control" name="ge_thyroid" />                             </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Height.</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" class="form-control" name="ge_ht"  style="width:60%; float:left;"/>  cm                            </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Weight</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" class="form-control" name="ge_wt"  style="width:60%; float:left;"/>   Kg                           </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">BMI</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" class="form-control" name="ge_bmi" />                             </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Jvp</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" class="form-control" name="ge_jvp" />                             </div>
                            </div>
                            
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Skin rash/pigmentation</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" class="form-control" name="ge_skin" />                             </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Varicose veins</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" class="form-control" name="ge_varicose" />                             </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">L.nodes </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" class="form-control" name="	ge_lnodes" />                             </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Oedema </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" class="form-control" name="ge_oedema" />                             </div>
                            </div>
                            
                            </div>
                  </div>
              </div>   
              <div class="panel panel-default">
                <div class="panel-heading">
                	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Personal Habet/History : </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <textarea name="personal_history" class="form-control"></textarea>
                        </div>
                        </div>
                	<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Local Examination (Ear, Nose, Neak, Throat) : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <textarea name="local_exem" class="form-control"></textarea>
                            </div>
                            </div>
                    
                    <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Neurological Surgery : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <textarea name="neurological_surgery" class="form-control"></textarea>
                            </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Cardiological Surgery: </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <textarea name="cardiological_surgery" class="form-control"></textarea>
                            </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Respritory System : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <textarea name="respritory_system" class="form-control"></textarea>
                            </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Others : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <textarea name="others" class="form-control"></textarea>
                            </div>
                            </div>
                            
                            
                    <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Diagnosis : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input name="diagnosis" class="form-control" type="text" />
                            </div>
                            </div>
                    <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Investigation Suggested : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <textarea name="invest_req" class="form-control"></textarea>
                            </div>
                            </div>
                    <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Preliminary treatment : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <textarea name="prelim_treat" class="form-control"></textarea>
                            </div>
                            </div>
                    <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Advice for admission : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="radio radio-danger" style="width:25%; float:left">
                                    <input type="radio" name="advice_admission" id="radio2" value="Ordinary">
                                    <label for="radio2">Ordinary</label>
                                </div>
                               <div class="radio radio-danger" style="width:25%; float:left">
                                    <input type="radio" name="advice_admission" id="radio2" value="Urgent">
                                    <label for="radio2">Urgent</label>
                                </div>
                               
                                <div class="radio radio-danger" style="width:25%; float:left">
                                    <input type="radio" name="advice_admission" id="radio2" value="Emergency">
                                    <label for="radio2">Emergency</label>
                                </div>
                                 <div class="radio radio-danger" style="width:25%; float:left">
                                    <input type="radio" name="advice_admission" id="radio2" value="Admission">
                                    <label for="radio2">Admission</label>
                                </div>
                            </div>
                            </div>
                    <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Next follow up after : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            	<div style="width:75%; float:left">
                               <label class="control-label" style="float:left">Investigation: </label>
                               
                               <input type="text" name="next_followup_day" id="next_followup_day" class="form-control" 
                               style="width:20%; float:left; margin-left:3px;" /> <span style="float:left; margin:5px;">Days,</span>
                               
                               <input type="text" name="next_followup_weeks" id="next_followup_weeks" class="form-control" style="width:20%; float:left" /> <span style="float:left; margin:5px;">Weeks,</span>
                               </div>
                               <div class="checkbox checkbox-danger" style="width:25%; float:left">
                     <input name="next_followup_noneeded" id="notneeded" type="checkbox" class="styled" onclick="notneededfunc();">
                     <label>Not Needed</label></div>
                     
                              
                            </div>
                            </div>
               </div>
               </div> 
    </div>
</div>
