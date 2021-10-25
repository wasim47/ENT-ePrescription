<script type="text/JavaScript">
function openPage1(pid,tablename,colid)
{
	var b = window.confirm('Are you sure, you want to Delete This ?');
	if(b==true){
		$.ajax({
			   type: "GET",
			   url: '<?php echo base_url()?>index/deleteData/'+tablename+'/'+colid,
			   data: "deleteId="+pid,
			   success: function() {
				  alert("Successfully saved");
				  window.location.reload(true);
				},
				error: function() {
				  alert("There was an error. Try again please!");
				}
		 });
	}
	else{
	 return;
	}
	 
}
</script>
<div class="right_col" role="main">
                <div class="">
                <div class="clearfix"></div>
                    <div class="row">




    





                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Total Record (<?php echo $payment_purpose_list->num_rows();?>)</h2>
                                    <h2 style="float:right"><a href="<?php echo base_url('index/payment_purpose_registration');?>" class="btn btn-primary">
                                    New Purpose</a></h2>
                                  <div class="clearfix"></div>
                                   
                                </div>
                              <div class="x_content">
                                <div style="width:100%"><?php echo $this->session->flashdata('successMsg');?></div>
                                <div class="container">
                                  <table class="table table-striped" width="100%">
                                    <thead>
                                      <tr>
                                        <th width="9%">SI</th>
                                        <th width="39%">Purpose Title</th>
                                        <th width="36%">Rate</th>
                                        <th width="16%">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php
									$i=0;
                                    foreach($payment_purpose_list->result() as $payment_purposeData):
									$id=$payment_purposeData->id;
									$purpose_title=$payment_purposeData->purpose;
									$rate=$payment_purposeData->rate;
									$i++;
									?>
                                      <tr>
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $purpose_title; ?></td>
                                       <td><?php echo $rate; ?></td>
                                         <td> 
                                         	<a href="<?php echo base_url('index/payment_purpose_registration/'.$id);?>" class="btn btn-info btn-sm">
          										<span class="glyphicon glyphicon-edit"></span></a> 
                                            <a href="javascript:void();" onclick="openPage1('<?php echo $id;?>','payment_purpose','id');" 
                                            class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove-circle"></span></a>
                                            </td>
                                      </tr>
                                    <?php
                                    endforeach;
									?>  
                                      
                                    </tbody>
                                  </table>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
               