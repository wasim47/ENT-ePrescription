<script type="text/JavaScript">
function reportsAjax(keyword,keyval)
{
		$.ajax({
			   type: "GET",
			   url: '<?php echo base_url('index/prescription_history_ajax')?>',
			   data: {key:keyword,dval:keyval},
			   success: function(data) {
				 $("#reportsdisplay").html(data);
				},
				error: function() {
				  alert("There was an error. Try again please!");
				}
		 });
}
function reportsDate()
{
		var fromdate=document.getElementById('from_date').value;
		var todate=document.getElementById('to_date').value;

		$.ajax({
			   type: "GET",
			   url: '<?php echo base_url('index/prescription_history_ajax')?>',
			   data: {fdate:fromdate,tdate:todate},
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
	var dataString = 'search_mobile='+ search_keyword_value;
	
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
	document.getElementById('mobileno').value = listval;
	document.getElementById('result').style.display = 'none';
	
	$.ajax({
			   type: "GET",
			   url: '<?php echo base_url('index/prescription_history_ajax')?>',
			   data: {key:'mobileno',dval:listval},
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
                            <h3>Prescription Reports</h3>
                        </div>
                        <div class="title_right">
                            <h2 style="text-align:right; float:right"><a href="<?php echo base_url('index/patient_history/print');?>" onclick="javascript:void window.open('<?php echo base_url('index/patient_history/print');?>','','width=1100,height=400,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=200,top=30');return false;"><i class="fa fa-print"></i> Print</a></h2>
</div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title col-lg-12">
                                	<div class="col-lg-4">
                                    	<table width="100%" border="0" cellspacing="5" cellpadding="0" align="center">
                                    <tr>
                                      <td width="30%"><input name="from_date" class="form-control date-picker"  type="text" id="from_date" placeholder="From Date"/></td>
                                      <td width="4%">&nbsp;</td>
                                      <td width="26%"><input name="to_date" class="form-control date-picker" type="text" id="to_date"  placeholder="To Date"></td>
                                      <td width="9%"><input type="button" name="button" id="datewisesearch" value="Go" class="btn btn-success" onclick="reportsDate();" style="margin-top:3px;" /></td>
                                    </tr>
                                  </table>
                                    </div>
                                    
                                    <div class="col-lg-3">
                                    	<table width="100%" border="0" cellspacing="5" cellpadding="0" align="center">
                                    <tr>
                                      <td width="26%">
                                      	<select name="patient_id" id="patient_id" class="form-control" onchange="reportsAjax('patient_id',this.value);">
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
													echo '<option value="'.$symp->patient_id.'" style="padding:5px; color:'.$c.'; background-color:'.$bc.'; cursor:pointer; font-weight:bold; font-size:12px;">'.$symp->patient_id.'</option>';
													endforeach;
												?>
                                        </select>
                                      </td>
                                    </tr>
                                  </table>
                                    </div>
                                    <div class="col-lg-3">
                                    	<table width="100%" border="0" cellspacing="5" cellpadding="0" align="center">
                                    <tr>
                                      <td width="26%">
                                      	<input type="text" name="mobileno" id="mobileno"  class="form-control search_keyword" 
                                        autocomplete="off" placeholder="Mobile No." />
                                        <div id="result"></div>
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
               