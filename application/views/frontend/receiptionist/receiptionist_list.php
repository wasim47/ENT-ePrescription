<script type="text/javascript" src="<?php echo base_url('asset/js/jquery.min.js');?>"></script>
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
                                <div class="x_content">
                                 <div class="x_title">
                                	<h1>Receiptionist List</h1>
                                </div>
                                <div class="container">
                                  <table class="table table-striped" width="100%">
                                    <thead>
                                      <tr>
                                        <th width="2%">SI</th>
                                        <th width="25%">Receiptionist Name</th>
                                        <th width="12%">Mobile</th>
                                        <th width="16%">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                <?php
									$i=0;
                                    foreach($receiptionist_list->result() as $doctorinfo):
									$i++;
									$doc_id=$doctorinfo->doc_id;
									$doc_name=$doctorinfo->doc_name;
									$mobile=$doctorinfo->mobile;
									$department=$doctorinfo->department;
									$specialty=$doctorinfo->specialty;
									$designation=$doctorinfo->designation;
									$bmdc=$doctorinfo->bmdc;
									
									?>
                                      <tr>
                                        <td><?php echo $i;?></td>
                                        <td><?php echo ucfirst($doc_name); ?></td>
                                        <td><?php echo $mobile; ?></td>
                                        <td> 
                                         <a href="<?php echo base_url('index/receiptionist_registration/'.$doc_id);?>" class="btn btn-default btn-sm">
       									   <span class="glyphicon glyphicon-edit"></span> Edit</a> 
                                            
                                          <a href="javascript:void();" onclick="openPage1('<?php echo $doc_id;?>','registration','id');" 
                                           class="btn btn-default btn-sm"><span class="glyphicon glyphicon-remove-circle"></span> Remove </a>
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