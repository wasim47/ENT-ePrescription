<?php 
foreach($departdata->result() as $depart);
?>
<style>
select option{
	padding:5px;
	cursor:pointer;
}
</style>

<div class="col-md-12 col-sm-12 col-xs-12">
<div class="panel-group" id="accordion">
		 	<div class="panel panel-default">
            <div class="panel-heading">
            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Cheif Complaints : </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <?php echo $depart->cheif_complaints;?>
                        </div>
                        </div>
            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">History of Present Claim : </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <?php echo $depart->present_claim;?>
                        </div>
                        </div>
            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">History of Past Claim : </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <?php echo $depart->past_claim;?>
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
                             <?php echo $depart->family_member;?>
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Pt's position and age of children</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <?php echo $depart->family_ageofchildren;?>
                            </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Husband's job and health</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             	<?php echo $depart->family_husjobandhealth;?>
                             </div>
                            </div>
                           <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Relevent Diseases</label>
                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $depart->family_otherrelenant_diseases;?></div>
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
                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $depart->drughistory_ocp;?>
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Other Drugs</label>
                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $depart->drughistory_drugs;?></div>
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
                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $depart->ge_appearence;?></div>
                            </div>
                            
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Pulse</label>
                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $depart->ge_pulse;?></div>
                            </div>
                            
                           <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Pallor</label>
                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $depart->ge_pallor;?></div>
                        </div>
                           <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Characteristic facies</label>
                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $depart->ge_characteristic;?></div>
                        </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">BP</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <?php echo $depart->ge_bp;?> mmHg</div>
                        </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Jaundice</label>
                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $depart->ge_jaundice;?></div>
                        </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Physical built</label>
                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $depart->ge_physical;?></div>
                        </div>
                            
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Resp</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <?php echo $depart->ge_resp;?> mim                             </div>
                        </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Cyanosis</label>
                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $depart->ge_cyanosis;?></div>
                        </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nutritional status</label>
                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $depart->ge_nutritional;?></div>
                        </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Temp</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <?php echo $depart->ge_temp;?>  F                            </div>
                        </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nail changes</label>
                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $depart->ge_nailchanges;?></div>
                        </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Dehydration</label>
                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $depart->ge_dehydration;?></div>
                        </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Thyroid</label>
                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $depart->ge_thyroid;?></div>
                        </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Height.</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <?php echo $depart->ge_ht;?>  cm                            </div>
                        </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Weight</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <?php echo $depart->ge_wt;?>   Kg                           </div>
                        </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">BMI</label>
                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $depart->ge_bmi;?></div>
                        </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Jvp</label>
                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $depart->ge_jvp;?></div>
                        </div>
                            
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Skin rash/pigmentation</label>
                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $depart->ge_skin;?></div>
                        </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Varicose veins</label>
                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $depart->ge_varicose;?></div>
                        </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">L.nodes </label>
                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $depart->ge_lnodes;?></div>
                        </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Oedema </label>
                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $depart->ge_oedema;?></div>
                        </div>
                            
                            </div>
                  </div>
              </div>   
              <div class="panel panel-default">
                <div class="panel-heading">
                	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Personal Habet/History : </label>
                        <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $depart->personal_history;?></div>
                  </div>
                	<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Local Examination (Ear, Nose, Neak, Throat) : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $depart->local_exem;?></div>
                  </div>
                    
                    <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Neurological Surgery : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $depart->neurological_surgery;?></div>
                  </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Cardiological Surgery: </label>
                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $depart->cardiological_surgery;?></div>
                  </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Respritory System : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $depart->respritory_system;?></div>
                  </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Others : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $depart->others;?></div>
                  </div>
                            
                            
                    <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Diagnosis : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $depart->diagnosis;?></div>
                  </div>
                    <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Investigation Suggested : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $depart->invest_req;?></div>
                  </div>
                    <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Preliminary treatment : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12"><?php echo $depart->prelim_treat;?></div>
                  </div>
                    <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Advice for admission : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               
                                 <div class="radio radio-danger" style="width:25%; float:left">
                                    <input type="radio" name="advice_admission" checked="checked">
                                    <label for="radio2"><?php echo $depart->advice_admission;?></label>
                                </div>
                            </div>
                            </div>
                    <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Next follow up after : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            	
                               <div class="checkbox checkbox-danger" style="width:25%; float:left">
                     			<?php echo $depart->next_followup_date;?></div>
                     
                              
                            </div>
                            </div>
               </div>
               </div> 
    </div>
</div>
