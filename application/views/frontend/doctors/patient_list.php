<div class="right_col" role="main">
<div class="">
                    <div class="row">




    





                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_content">
                                 <div class="x_title">
                                	
                                </div>
                                <div class="container">
                                  <table class="table table-striped" width="100%">
                                    <thead>
                                      <tr>
                                        <th width="2%">SI</th>
                                        <th width="12%">Patient Name</th>
                                        <th width="4%">Patient ID</th>
                                        <th width="8%">Gender</th>
                                        <th width="17%">Age</th>
                                        <th width="11%">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                <?php
                                    foreach($patientList->result() as $patient):
									$pageSl++;
									$id=$patient->id;
									$patient_id=$patient->patient_id;
									$sym_id=$patient->symptom;
									$patient_name=$patient->patient_name;
									$patient_id=$patient->patient_id;
									$gender=$patient->gender;
									$age=$patient->age;

									?>
                                      <tr>
                                        <td><?php echo $pageSl;?></td>
                                         <td><?php echo $patient_name; ?></td>
                                        <td><?php echo $patient_id; ?></td>
                                        <td><?php echo ucfirst($gender); ?></td>
                                        <td><?php echo $age; ?></td>
                                        
                                         <td> 
                                         <a href="<?php echo base_url('index/patient_details/'.$id);?>" class="btn btn-default btn-sm">
          									<span class="glyphicon glyphicon-edit"></span> Details</a> 
                                           <a href="javascript:void();" onclick="openPage1('<?php echo $id;?>','registration','id');" 
                                           class="btn btn-default btn-sm"><span class="glyphicon glyphicon-remove-circle"></span> Remove </a>
                                            </td>
                                      </tr>
                                    <?php
                                    endforeach;
									?>  
                                      <tr>
                                      	<td colspan="12"><div id="paginationData" class="tsc_pagination" style="margin:auto; width:100%">
                                                  <ul><?php echo "<li>". $pagination."</li>"; ?></ul>
                                           </div>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
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