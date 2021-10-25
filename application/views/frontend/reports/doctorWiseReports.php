<script type="text/JavaScript">
function reportsAjax()
{
	var doctor_id = document.getElementById('doctor_id').value;
		//alert(doctor_id);
		$.ajax({
			   type: "GET",
			   url: '<?php echo base_url('index/doctorwise_reports_ajax')?>',
			   data: {doctorsid:doctor_id},
			   success: function(data) {
				  //alert("Successfully saved");
				 $("#reportsdisplay").html(data);
				},
				error: function() {
				  alert("There was an error. Try again please!");
				}
		 });
}
</script>
<?php $today=date('Y-m-d'); ?>
<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Doctor Wise Reports</h3>
                        </div>
                        <div class="title_right">
                            <h2 style="text-align:right; float:right">
                            <a href="<?php echo base_url('index/doctorwise_reports/print');?>" 
                            onclick="javascript:void window.open('<?php echo base_url('index/doctorwise_reports/print');?>','','width=1100,height=400,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=200,top=30');return false;">
                            <i class="fa fa-print"></i> Print</a></h2>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title" style="width:100%; float:left">
                                	<div style="float:left; width:30%; margin-left:40%;">
                                    	<select name="doctor_id" id="doctor_id" class="form-control" required onchange="reportsAjax();">
                                                <option value="">Select Doctor</option>
                                                <?php
                                                    foreach($doctors_list->result() as $doc){
                                                ?>
                                                <option value="<?php echo $doc->doc_id;?>"><?php echo $doc->doc_name;?></option>
                                                <?php } ?>
                                            </select>
                                  </div>
                                  	<div style="float:right; width:8%"><a href="<?php echo base_url('index/cleareCachDate');?>" class="btn btn-danger">Clear Cach</a></div>
                                </div>
                                <div class="x_content">
                                       <div id="reportsdisplay"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                   

                </div>
               