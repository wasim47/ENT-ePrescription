<?php include('header.php');?>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div style="width:100%">

                    <div style="border: 0; padding:3% 25% 8% 25%;  background:#FFF; width:100%; text-align:center">
                        <a href="#"><img src="<?php echo base_url();?>asset/images/logo.png"  style="width:70%"></a>
                    </div>
                    <div class="clearfix"></div>


                    <div class="profile" style="width:100%;">
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?php echo $this->session->userdata('userAccessName');?></h2>
                        </div>
                    </div>

                    <br /><br /><br />

                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu" style="width:100%; float:left">

                        <div class="menu_section">
                            <ul class="nav side-menu">
                                <li><a style="cursor:pointer"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url('index/dashboard');?>">Dashboard</a></li>
                                        
                                    </ul>
                                </li>
                                <?php 
								if($this->session->userdata('userType')=='Admin'){
								?>
                               
                                
                                 <li><a style="cursor:pointer"><i class="fa fa-user-md" aria-hidden="true"></i>Doctors Manage
                                 <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                	    <li><a href="<?php echo base_url('index/doctors_list');?>">Doctors List</a></li>
                                        <li><a href="<?php echo base_url('index/doctors_registration');?>">New Doctors Registration</a></li>
                                    </ul>
                                </li>
                                 <li><a style="cursor:pointer"><i class="fa fa-wrench" aria-hidden="true"></i> Operation Department<span class="fa fa-chevron-down">
                                 </span></a>
                                   <ul class="nav child_menu" style="display: none">
                                	 <li><a href="<?php echo base_url('index/operation_department_list');?>">Operation Department List</a></li>
                                     <li><a href="<?php echo base_url('index/operation_department_registration');?>">New Entry</a>
                                     </li>
                                   </ul>
                                </li>
                                 <li><a style="cursor:pointer"><i class="fa fa-user" aria-hidden="true"></i>
 Admission Department<span class="fa fa-chevron-down">
                                 </span></a>
                                   <ul class="nav child_menu" style="display: none">
                                	 <li><a href="<?php echo base_url('index/admission_department_list');?>">Admission Department List</a></li>
                                     <li><a href="<?php echo base_url('index/admission_department_registration');?>">New Entry</a>
                                     </li>
                                   </ul>
                                </li>
                                <li><a style="cursor:pointer"><i class="fa fa-user" aria-hidden="true"></i> Receiptionist Manage<span class="fa fa-chevron-down">
                                 </span></a>
                                   <ul class="nav child_menu" style="display: none">
                                	 <li><a href="<?php echo base_url('index/receiptionist_list');?>">Receiptionist List</a></li>
                                     <li><a href="<?php echo base_url('index/receiptionist_registration');?>">New Receiptionist Registration</a>
                                     </li>
                                   </ul>
                                </li>
                                <li><a style="cursor:pointer"><i class="fa fa-user" aria-hidden="true"></i> Accounts Manage<span class="fa fa-chevron-down">
                                 </span></a>
                                   <ul class="nav child_menu" style="display: none">
                                	 <li><a href="<?php echo base_url('index/accounts_list');?>">Accounts List</a></li>
                                     <li><a href="<?php echo base_url('index/accounts_registration');?>">New Accounts</a>
                                     </li>
                                   </ul>
                                </li>
                                 <li><a style="cursor:pointer"><i class="fa fa-paypal"></i>Payment Purpose Manage<span class="fa fa-chevron-down">
                                 </span></a>
                                   <ul class="nav child_menu" style="display: none">
                                	 <li><a href="<?php echo base_url('index/payment_purpose_list');?>">Purpose List</a></li>
                                     <li><a href="<?php echo base_url('index/payment_purpose_registration');?>">New Purpose</a>
                                     </li>
                                   </ul>
                                </li>
                                 <li><a style="cursor:pointer"><i class="fa fa-money"></i>Payment Manage<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                       <!--<li><a href="<?php echo base_url('index/payment_list');?>">Payment List</a></li>
                                        <li><a href="<?php echo base_url('index/payment_registration');?>">New Payment</a></li>-->
                                        <li><a href="<?php echo base_url('index/consultancy_payment_list');?>">Consultancy Payment List</a></li>
                                        <li><a href="<?php echo base_url('index/consultancy_payment_registration');?>">New Consultancy Payment</a></li>
                                    </ul>
                                </li>



                                <li><a href="<?php echo base_url('index/pat_reg');?>"><i class="fa fa-hospital-o" aria-hidden="true"></i>
 Patient Registration Form</a></li>
                                <li><a href="<?php echo base_url('index/patient_list');?>"><i class="fa fa-hospital-o" aria-hidden="true"></i>
 Patient List</a></li>
                                <li><a href="<?php echo base_url('index/pat_idcard');?>"><i class="fa fa-bar-chart-o"></i> Create Patient ID</a></li>
                                <li><a href="<?php echo base_url('index/followup');?>"><i class="fa fa-bar-chart-o"></i> Follow Up</a></li>
                                <li><a href="<?php echo base_url('index/operation_list');?>"><i class="fa fa-bar-chart-o"></i> Operation List</a></li>
                                <li><a href="<?php echo base_url('index/admission_list');?>"><i class="fa fa-bar-chart-o"></i> Admission List</a></li>
                                
								<?php
                                }
								?>   
                                <?php 
								if($this->session->userdata('userType')=='Receiptionist'){
								?>                            
                                <li><a href="<?php echo base_url('index/pat_reg');?>"><i class="fa fa-bar-chart-o"></i> Patient Registration Form</a></li>
                                <li><a href="<?php echo base_url('index/patient_list');?>"><i class="fa fa-bar-chart-o"></i> Patient List</a></li>
                                <li><a href="<?php echo base_url('index/pat_idcard');?>"><i class="fa fa-bar-chart-o"></i> Create Patient ID</a></li>
                                <li><a style="cursor:pointer"><i class="fa fa-money"></i>Payment Manage<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                       <!--<li><a href="<?php echo base_url('index/payment_list');?>">Payment List</a></li>
                                        <li><a href="<?php echo base_url('index/payment_registration');?>">New Payment</a></li>-->
                                        <li><a href="<?php echo base_url('index/consultancy_payment_list');?>">Consultancy Payment List</a></li>
                                        <li><a href="<?php echo base_url('index/consultancy_payment_registration');?>">New Consultancy Payment</a></li>
                                    </ul>
                                </li>
                                <li><a style="cursor:pointer"><i class="fa fa-search-plus"></i> Reports<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                	    <li><a href="<?php echo base_url('index/patient_history');?>">General History</a></li>
                                        <li><a href="<?php echo base_url('index/prescription_history');?>">Prescription Reports</a></li>
                                        <li><a href="<?php echo base_url('index/treatment_history');?>">Treatment History</a></li>
                                        <li><a href="<?php echo base_url('index/today_reports');?>">Daily Payment Report</a></li>
                                        <li><a href="<?php echo base_url('index/datewise_reports');?>">Datewise Payment Report</a></li>
                                    </ul>
                                </li>
                                 <?php
                                }
								?> 
                               
                               <?php 
								if($this->session->userdata('userType')=='Doctor'){
								?>                            
                                <li><a href="<?php echo base_url('index/patient_list');?>"><i class="fa fa-bar-chart-o"></i> Patient List</a></li>
                                <li><a href="<?php echo base_url('index/set_appointment');?>"><i class="fa fa-bar-chart-o"></i> 
                               	Appointment Schedule</a></li>
                                <li><a href="<?php echo base_url('index/followup');?>"><i class="fa fa-bar-chart-o"></i> Follow Up</a></li>
                                <li><a style="cursor:pointer"><i class="fa fa-search-plus"></i> Reports<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                	    <li><a href="<?php echo base_url('index/patient_history');?>">General History</a></li>
                                        <li><a href="<?php echo base_url('index/prescription_history');?>">Prescription Reports</a></li>
                                        <li><a href="<?php echo base_url('index/treatment_history');?>">Treatment History</a></li>
                                        <li><a href="<?php echo base_url('index/today_reports');?>">Daily Payment Report</a></li>
                                        <li><a href="<?php echo base_url('index/datewise_reports');?>">Datewise Payment Report</a></li>
                                    </ul>
                                </li>
                                 <?php
                                }
								?> 
                                
                                
                                
                                <?php 
								if($this->session->userdata('userType')=='Accounts Department'){
								?>                            

                                <li><a style="cursor:pointer"><i class="fa fa-money"></i>Payment Manage<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url('index/consultancy_payment_list');?>">Consultancy Payment List</a></li>
                                        <li><a href="<?php echo base_url('index/consultancy_payment_registration');?>">New Consultancy Payment</a></li>
                                    </ul>
                                </li>
                                <li><a style="cursor:pointer"><i class="fa fa-search-plus"></i> Reports<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url('index/today_reports');?>">Daily Payment Report</a></li>
                                        <li><a href="<?php echo base_url('index/datewise_reports');?>">Datewise Payment Report</a></li>
                                        <li><a href="<?php echo base_url('index/doctorswise_reports');?>">Doctors Wise Report</a></li>
                                    </ul>
                                </li>
                                 <?php
                                }
								?> 
                                
                                
                                 <?php 
								if($this->session->userdata('userType')=='Admission Department'){
								?>                            
                                	<li><a href="<?php echo base_url('index/admission_list');?>"><i class="fa fa-bar-chart-o"></i> Admission List</a></li>
                                 <?php
                                }
								?> 
                                
                                
                                <?php 
								if($this->session->userdata('userType')=='Operation Department'){
								?>                            
                                	<li><a href="<?php echo base_url('index/operation_list');?>"><i class="fa fa-bar-chart-o"></i> Operation List</a></li>
                                 <?php
                                }
								?> 
                                
                                <?php 
								if($this->session->userdata('userType')=='Admin'){
								?>
                                
                                <li>
                                <a style="cursor:pointer"><i class="fa fa-desktop"></i>Clinical feature<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                	    <li><a href="<?php echo base_url('index/department_list');?>">Department List</a></li>
                                        <li><a href="<?php echo base_url('index/department_registration');?>">New Department</a></li>
                                        <li><a href="<?php echo base_url('index/drug_category_list');?>">Drug Category List</a></li>
                                        <li><a href="<?php echo base_url('index/drug_category_registration');?>">New Entry Drug Category</a></li>
                                	    <li><a href="<?php echo base_url('index/drug_list');?>">Drug List</a></li>
                                        <li><a href="<?php echo base_url('index/drug_registration');?>">New Drug Entry</a></li>
                                    </ul>
                                </li>
                                <?php
                                }
								?>
                               
                                <?php 
								if($this->session->userdata('userType')=='Admin'){
								?>
                                <li><a style="cursor:pointer"><i class="fa fa-desktop"></i>Administration<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                	    <li><a href="<?php echo base_url('index/admin_list');?>">Admin List</a></li>
                                        <li><a href="<?php echo base_url('index/admin_registration');?>">New Admin Registration</a></li>
                                    </ul>
                                </li>
                                <?php /*?><li><a><i class="fa fa-bars"></i> Asset & Investment<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="<?php echo base_url('index/asset_investment_list');?>">Asset List</a></li>
                                    <li><a href="<?php echo base_url('index/asset_investment_registration');?>">New Asset</a>
                                    </li>
                                </ul>
                            </li>
                          		<li><a><i class="fa fa-bars"></i> Internal Cost<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                	    <li><a href="<?php echo base_url('index/internal_cost_list');?>">Cost List</a></li>
                                        <li><a href="<?php echo base_url('index/internal_cost_registration');?>">New Cost</a>
                                        </li>
                                    </ul>
                                </li><?php */?>
                                <li><a style="cursor:pointer"><i class="fa fa-search-plus"></i> Reports<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                	    <li><a href="<?php echo base_url('index/patient_history');?>">General History</a></li>
                                        <li><a href="<?php echo base_url('index/prescription_history');?>">Prescription Reports</a></li>
                                        <li><a href="<?php echo base_url('index/treatment_history');?>">Treatment History</a></li>
                                        <li><a href="<?php echo base_url('index/today_reports');?>">Daily Payment Report</a></li>
                                        <li><a href="<?php echo base_url('index/datewise_reports');?>">Datewise Payment Report</a></li>
                                    </ul>
                                </li>
                                <?php
                                }
								?>
                            </ul>
                        </div>
                        

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">&nbsp; </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url('index/logout');?>">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">&nbsp;</a>
                        
                        <a data-toggle="tooltip" data-placement="top" title="Lock">&nbsp;</a>
                        
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <?php echo $this->session->userdata('userAccessName');?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="<?php echo base_url('index/logout');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>

                            

                        </ul>
                    </nav>
                </div>

            </div>