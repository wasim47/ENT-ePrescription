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
                    <table width="100%">
                                                  <tr style="border-bottom:1px solid #ddd;">
                                                  <td width="28%" height="27" valign="top" style="font-size:13px; padding:5px; font-weight:bold">Cheif Complaints </td>
                                                  <td width="72%" valign="top" style="font-size:13px;padding:5px; font-weight:bold"><span style="margin-top:10px;"><?php echo $depart->cheif_complaints;?></span></td>
                                              </tr>
                                               
                                                  <tr style="border-bottom:1px solid #ddd;">
                                                      <td width="28%" height="26" valign="top" style="font-size:13px;padding:5px; font-weight:bold">History</td>
                                                      <td width="72%" valign="top" style="font-size:13px; padding:5px;font-weight:bold"><span style="margin-top:10px;"><?php echo $depart->history;?></span></td>
                                                  </tr>
                                                  <tr style="border-bottom:1px solid #ddd; padding:5px">
                                                      <td width="28%" height="27" valign="top" style="font-size:13px; padding:5px;font-weight:bold">Examination findings</td>
                                                      <td width="72%" valign="top" style="font-size:13px; padding:5px;font-weight:bold"><span style="margin-top:10px;"><?php echo $depart->exam_finding;?></span></td>
                                                  </tr>
                                                  
                                                  <tr style="border-bottom:1px solid #ddd; padding:5px">
                                                      <td width="28%" height="27" valign="top" style="font-size:13px; padding:5px;font-weight:bold">Clinical diagnosis</td>
                                                      <td width="72%" valign="top" style="font-size:13px; padding:5px;font-weight:bold"><span style="margin-top:10px;"><?php echo $depart->diagnosis;?></span></td>
                                                  </tr>
                                                  <tr style="border-bottom:1px solid #ddd; padding:5px">
                                                      <td width="28%" height="26" valign="top" style="font-size:13px;padding:5px; font-weight:bold">Investigation Suggested</td>
                                                      <td width="72%" valign="top" style="font-size:13px;padding:5px; font-weight:bold"><span style="margin-top:10px;"><?php echo $depart->invest_req;?></span></td>
                                                  </tr>
                                                  
                                                 
                                         </table>
               </div>
                        
                  
                  
                  
                     
                  
        </div>
</div>
