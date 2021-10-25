<script type="text/JavaScript">
function reportsAjax(keyword,keyval)
{
		$.ajax({
			   type: "GET",
			   url: '<?php echo base_url('index/patient_history_ajax')?>',
			   data: {key:keyword,dval:keyval},
			   success: function(data) {
				 $("#reportsdisplay").html(data);
				},
				error: function() {
				  alert("There was an error. Try again please!");
				}
		 });
}
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
		   type: "GET",
		   url: '<?php echo base_url('index/treatment_history_ajax');?>',
		   data: {patid:patientid},
		   success: function(data) {
			 $("#reportsdisplay").html(data);
			},
			error: function() {
			  alert("There was an error. Try again please!");
			}
	 });
}
</script>
<style type="text/css">
	#result
	{
		position:absolute;
		width:288px;
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

<?php $today=date('Y-m-d'); ?>
<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Treatment History Reports</h3>
                        </div>
                        <div class="title_right">
                            
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title col-lg-12">
                                    
                                    <div class="col-lg-5 col-lg-offset-3">
                                    	<table width="100%" border="0" cellspacing="5" cellpadding="0" align="center">
                                    <tr>
                                      <td width="26%" align="center">
                                      	<?php /*?><select name="patient_id" id="patient_id" class="form-control" onchange="reportsAjax('patient_id',this.value);">
                                        	<option value="">Patient ID</option>
                                            <?php 
													$i=0;
													$queryDepart = $this->db->query("select * from registration order by id desc");
													foreach($queryDepart->result() as $symp):
													$i++;
													if($i%2!=0){
														$bc='#fff';
														$c='#333';
													}
													else{
														$bc='#eaeaea';	
														$c='#1A82C3';
													}
													echo '<option value="'.$symp->id.'" style="padding:5px; color:'.$c.'; background-color:'.$bc.'; cursor:pointer; font-weight:bold; font-size:12px;">'.$symp->patient_id.'</option>';
													endforeach;
												?>
                                        </select><?php */?>
                                        
                                        <div class="col-sm-3"><label class="control-label" style="margin-top:5px;">Patient ID : </label></div>
                                        <div class="col-sm-9">
                                            <input type="text" name="patient_id" id="patient_id" class="form-control search_keyword" autocomplete="off" 
                                            placeholder="Patient ID" />
                                            <div id="result"></div>
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                    </div>
                                  	<div class="col-lg-1 pull-right"><a href="<?php echo base_url('index/cleareCachDate');?>" class="btn btn-danger">Clear Cach</a></div>
                                </div>
                                <div class="x_content">
                                       <div id="reportsdisplay"></div>
                                </div>
                            </div>
                        </div>
                    </div>