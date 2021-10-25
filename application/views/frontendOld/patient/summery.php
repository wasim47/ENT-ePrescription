<div class="right_col" role="main">
                <div class="">

                    
                    <div class="clearfix"></div>
                    <div class="row">




    





                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_content">
                                <div style="width:100%"><?php echo $this->session->flashdata('successMsg');?></div>
                                <div class="container col-sm-12">
                                 <div class="col-sm-12 col-md-6 col-lg-6">
                                  <table width="100%" style="font-size:18px;" cellpadding="5" cellspacing="5">
                                  <?php
								  
                                  $query=$this->db->query("select * from registration where hos_reg_number='".$keyword."'");
								  foreach($query->result() as $que){
									  $id[]=$que->id;
								  }
								   $array=join(',',$id);
                                   $querys=$this->db->query("select * from registration where id IN($array) group by symptom");
								   foreach($querys->result() as $ques){
								 	$id1[]=$ques->symptom;
								   }
								 // $totalSym=$ques->totalsymptom;
								  ?>
                                    <tr>
                                    	<td height="44">Total Patient</td>
                                        <td><?php echo count($id);?></td>
                                    </tr>
                                    <tr>
                                    	<td height="44">Total Department</td>
                                        <td><?php echo count($id1);?></td>
                                    </tr>
                                    <tr>
                                    	<td height="40">Total Diagonosis</td>
                                        <td>75</td>
                                    </tr>
                                  </table>
                                  </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                </div>
               