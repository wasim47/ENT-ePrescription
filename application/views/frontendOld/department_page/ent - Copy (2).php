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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Family history : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <textarea name="past_claim" class="form-control"></textarea>
                            </div>
                            </div>
                 <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Drug history : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <textarea name="past_claim" class="form-control"></textarea>
                            </div>
                            </div>
                 <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">General Examination : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <textarea name="past_claim" class="form-control"></textarea>
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
                                        <input type="radio" name="advice_admission" id="radio2" value="Prescription" onclick="advforfollowup();">
                                        <label for="radio2">Prescription</label>
                                    </div>
                                     <div class="radio radio-danger" style="width:25%; float:left">
                                        <input type="radio" name="advice_admission" id="radio2" value="Operation" onclick="advforfollowup();">
                                        <label for="radio2">Operation</label>
                                    </div>
                                    <div class="radio radio-danger" style="width:25%; float:left">
                                       <input type="radio" name="advice_admission" id="radio2" value="No Action" checked="checked" onclick="advforfollowup();">
                                        <label for="radio2">No Action</label>
                                    </div>
                                </div>
                                </div>
                                <div id="adviceforfollowup" style="display:none">
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
</div>
