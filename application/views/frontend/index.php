<?php $this->load->view('includes/header.php');?>
<div class="main_container" style="background:#CCCCCC">
<div class="col-md-10 col-sm-10 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1" style="margin-top:5%;">

</div>
             <div class="col-md-4 col-sm-6 col-xs-12 col-lg-offset-4 col-md-offset-4 col-sm-offset-4">
             <div style="border: 0; width:35%; text-align:center; margin:auto; margin-bottom:20px;">
                        <a href="#"><img src="<?php echo base_url();?>asset/images/logo.png"  style="width:80%"></a>
                    </div>

<h1 style="font-size:28px; text-align:center; text-shadow:#333 1px 1px; color:#fff">Bangladesh ENT Hospital </h1>
	<div class="panel panel-primary">

	
	     <?php echo form_open('index/userLogin', array('class'=>'form-horizontal', 'style'=>'margin-bottom: 0px !important;')); ?>

	
		<div class="panel-body">
			<h4 class="text-center" style="margin-bottom: 25px;">Log in to get started</h4>
						<?php echo $this->session->flashdata('msg');?>
                
						<div class="form-group">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="email" name="username" value="<?php echo set_value('username'); ?>" class="form-control" id="username" placeholder="Email Address" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
								</div>
							</div>
						</div>				
					
		</div>
		<div class="panel-footer">
			<div class="pull-right">
				
               <?php echo form_reset('', 'Reset',"class='btn btn-default'"); ?>
               <?php echo form_submit('submit', 'Log In',"class='btn btn-primary'"); ?>
			</div>
            
		</div>
		
		<?php echo form_close();?>
		
		
	</div>
    <div class="">
                        <p class="pull-left">Design & Developed by <a href="http://esoft.com.bd/"  target="_blank" style="font-size:16px">
                        <strong>e-<span style="color:red; font-style:italic">S</span>oft</strong></a> And Maintained by&nbsp;<a href="http://doctorsbd.com/" style="font-size:16px" target="_blank"><strong>doctorsbd.com</strong></a>
                        </p>
                    </div>
 </div>
</div>
</html>