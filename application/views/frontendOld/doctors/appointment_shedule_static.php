
<div class="right_col" role="main">
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Appointment Schedule</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <?php echo $this->session->flashdata('successMsg');?>
                                <div class="x_content">
                                <img src="http://localhost/wasim/ent/asset/images/appst.png" border="0" usemap="#Map" style="width:100%" />
                                <map name="Map" id="Map">
                                 <area shape="rect" coords="223,161,350,197" href="<?php echo base_url('index/patient_historydisplay/0011');?>" />
                                 <area shape="rect" coords="353,312,481,346"  href="#" onclick="alert('Sorry Appointment Status is pending');"/>
                                 <area shape="rect" coords="607,157,737,193"  href="#" onclick="alert('Sorry Appointment Status is pending');" />
                                <area shape="rect" coords="860,238,987,272" href="<?php echo base_url('index/patient_historydisplay/9133901');?>"/>
                                  <area shape="rect" coords="729,384,863,426" href="#"  onclick="alert('Sorry Appointment Status is pending');" />
                                 <area shape="rect" coords="479,385,607,424" href="<?php echo base_url('index/patient_historydisplay/4658');?>" />
                                 <area shape="rect" coords="476,540,607,572" href="<?php echo base_url('index/patient_historydisplay/78600');?>" />
                                <area shape="rect" coords="212,535,345,573" href="<?php echo base_url('index/patient_historydisplay/534343');?>" />
                                </map>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               