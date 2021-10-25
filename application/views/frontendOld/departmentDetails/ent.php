<?php 
foreach($departdata->result() as $depart);
?>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                <div class="panel-heading">
                <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Cheif Complaints : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <textarea class="form-control" disabled="disabled" readonly="readonly"><?php echo $depart->cheif_complaints;?></textarea>
                            </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">History : </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                 <textarea class="form-control" disabled="disabled" readonly="readonly"><?php echo $depart->history;?></textarea>
                                </div>
                            </div>
                            
               			 <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Examination findings : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <textarea class="form-control" disabled="disabled" readonly="readonly"><?php echo $depart->exam_finding;?></textarea>
                            </div>
                         </div>
                        
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Clinical diagnosis : </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                 <textarea class="form-control" disabled="disabled" readonly="readonly"><?php echo $depart->diagnosis;?></textarea>
                                </div>
                                </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Investigation Suggested : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <textarea class="form-control" disabled="disabled" readonly="readonly"><?php echo $depart->invest_req;?></textarea>
                            </div>
                            </div>
               
               </div>
               </div>
                        
                  
                  
                  
                     
                  
        </div>
</div>