<?php
if($paymentUpdate->num_rows()>0){
	foreach($paymentUpdate->result() as $paymentData);
			$inst_id=$paymentData->inst_id;
			$patient_id=$paymentData->patient_id;
			$amount=$paymentData->amount;
			$amount_in_word=$paymentData->amount_in_word;
			$pay_id=$paymentData->pay_id;
			$paid_date=$paymentData->paid_date;
			
			$queryStd=$this->db->query("select * from registration where patient_id='".$patient_id."'");
			foreach($queryStd->result() as $rowSt);
			$patname=$rowSt->patient_name;
}
else{
			$inst_id='';
			$patient_id='';
			$amount='';
			$amount_in_word='';
			$total_amount='';
			$pay_id='';
			$paid_date='';
			$patname='';
	}
?>
<script>
function paidValidation(){
	var totalamount = document.getElementById("total_amount").value;		
	var payamount = document.getElementById("investamount").value;
	var due_amount = document.getElementById("due_amount").value;	
	
	if(due_amount!="" || due_amount!=0){
		if(parseInt(payamount) > parseInt(due_amount)){
			
			document.getElementById("investamount").value='';
			document.getElementById("investamount").style.border='1px solid #f00';
			document.getElementById("investamount").focus();	
			alert("Sorry You can't cross your Due Amount");
		}
		else{
			document.getElementById("investamount").style.border='';
		}
	}
	else{
		if(parseInt(payamount) > parseInt(totalamount)){
			document.getElementById("investamount").value='';
			document.getElementById("investamount").style.border='1px solid #f00';
			document.getElementById("investamount").focus();
			alert("Sorry You can't cross your Total Amount");	
		}
		else{
			document.getElementById("investamount").style.border='';
		}
	}
}
	
	/*$(document).ready(function(){
		$("#patient_id").change(function(){
			var pid = $("#patient_id").val();
			//alert(pid);
			$.ajax({
				dataType:'json',
				url:"<?php echo base_url('index/ajaxDataPayment');?>",
				type: "POST",				
				data:{patient_id:pid},
				success: function(data){
					//alert(data.leftd);
					//alert(data.rightd);	
					$("#citydiv").html(data.leftd);		
					if(data.rightd > 0){
						$("#total_amount").val(data.rightd);
						$("#due_amount").val(data.dueamount);	
						$("#total_amount").attr('readonly', true);
					}
					else{
						$("#total_amount").val('');	
						$("#due_amount").val('');	
						$("#total_amount").removeAttr('readonly', true);
					}
				}			
			});	
		});
	});*/
	
</script>
<script type="text/javascript">
	function totalprice(){
		//alert("In");
		var amount = document.getElementById('investamount').value;
		if(amount!=""){
		document.getElementById('number').value=amount;
		}
		else{
			amount=0;	
		}
		
		var bigNumArry = new Array('', ' thousand', ' million', ' billion', ' trillion', ' quadrillion', ' quintillion');

    var output = '';
    var numString =   document.getElementById('number').value;
    var finlOutPut = new Array();

    if (numString == '0') {
        document.getElementById('container').value = 'Zero';
        return;
    }

    if (numString == 0) {
        document.getElementById('container').value = 'messeg tell to enter numbers';
        return;
    }

    var i = numString.length;
    i = i - 1;

    //cut the number to grups of three digits and add them to the Arry
    while (numString.length > 3) {
        var triDig = new Array(3);
        triDig[2] = numString.charAt(numString.length - 1);
        triDig[1] = numString.charAt(numString.length - 2);
        triDig[0] = numString.charAt(numString.length - 3);

        var varToAdd = triDig[0] + triDig[1] + triDig[2];
        finlOutPut.push(varToAdd);
        i--;
        numString = numString.substring(0, numString.length - 3);
    }
    finlOutPut.push(numString);
    finlOutPut.reverse();
    for (j = 0; j < finlOutPut.length; j++) {
        finlOutPut[j] = triConvert(parseInt(finlOutPut[j]));
    }

    var bigScalCntr = 0; //this int mark the million billion trillion... Arry

    for (b = finlOutPut.length - 1; b >= 0; b--) {
        if (finlOutPut[b] != "dontAddBigSufix") {
            finlOutPut[b] = finlOutPut[b] + bigNumArry[bigScalCntr] + ' ';
            bigScalCntr++;
        }
        else {
            //replace the string at finlOP[b] from "dontAddBigSufix" to empty String.
            finlOutPut[b] = ' ';
            bigScalCntr++; //advance the counter  
        }
    }
        for(n = 0; n<finlOutPut.length; n++){
            output +=finlOutPut[n];
        }
    document.getElementById('container').value = output;//print the output
	}
	
</script>

<script type="text/javascript">
function triConvert(num){
    var ones = new Array('', ' one', ' two', ' three', ' four', ' five', ' six', ' seven', ' eight', ' nine', ' ten', ' eleven', ' twelve', ' thirteen', ' fourteen', ' fifteen', ' sixteen', ' seventeen', ' eighteen', ' nineteen');
    var tens = new Array('', '', ' twenty', ' thirty', ' forty', ' fifty', ' sixty', ' seventy', ' eighty', ' ninety');
    var hundred = ' hundred';
    var output = '';
    var numString = num.toString();

    if (num == 0) {
        return 'dontAddBigSufix';
    }
    //the case of 10, 11, 12 ,13, .... 19 
    if (num < 20) {
        output = ones[num];
        return output;
    }

    //100 and more
    if (numString.length == 3) {
        output = ones[parseInt(numString.charAt(0))] + hundred;
        output += tens[parseInt(numString.charAt(1))];
        output += ones[parseInt(numString.charAt(2))];
        return output;
    }

    output += tens[parseInt(numString.charAt(0))];
    output += ones[parseInt(numString.charAt(1))];

    return output;
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
	
			var pid = $("#patient_id").val();
			$.ajax({
				dataType:'json',
				url:"<?php echo base_url('index/ajaxDataPayment');?>",
				type: "POST",				
				data:{patient_id:pid},
				success: function(data){
					//alert(data.leftd);
					//alert(data.rightd);	
					$("#citydiv").html(data.leftd);		
					if(data.rightd > 0){
						$("#total_amount").val(data.rightd);
						$("#due_amount").val(data.dueamount);	
						$("#total_amount").attr('readonly', true);
					}
					else{
						$("#total_amount").val('');	
						$("#due_amount").val('');	
						$("#total_amount").removeAttr('readonly', true);
					}
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

<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Payment Details</h3>
                        </div>
                        
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">




    





                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                              <div class="x_content">
                                <?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');?>
                              <div id="registration_form">	
                                  	  <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                 <h4 class="panel-title">
                                                  Payment Information </h4>
                                                 </a>
                                            </div>
                                            
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                
                                       <div class="col-sm-8">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4">Patient ID<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-lg-8">
                                              <input type="text" name="patient_id" id="patient_id" class="form-control search_keyword" 
                                              autocomplete="off" placeholder="Patient ID" onchange="totalprice();paidValidation();" />
                                              <div id="result"></div>
                                                    <?php echo form_error('patient_id', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4">Payment Purpose<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-lg-8">
                                               <select class="form-control" name="pay_purpose" id="pay_purpose" required 
                                               onchange="document.getElementById('investamount').value=this.value; totalprice();paidValidation();">
                                                    <option value="<?php echo $patient_id;?>"><?php echo $patname;?></option>
                                                    <?php
                                                    	$queryS=$this->db->query("select * from payment_purpose");
														foreach($queryS->result() as $rowS){
														$rate=$rowS->rate;
														$purpose=$rowS->purpose;
														?>
               										 <option value="<?php echo $rate;?>"><?php echo $purpose;?></option>
                                                    <?php
                                                    }
													?>
                                                    </select>
                                                   <?php echo form_error('patient_id', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Total Amount<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-lg-8">
                                                <input type="text" name="total_amount"  id="total_amount" required class="form-control col-md-7 col-xs-12"  
                                                placeholder='Total Amount' onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Total Amount'">
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Pay Amount<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-lg-8">
                                            	<input type="hidden" id="due_amount" />
                                                <input type="text" name="pay_amount"  id="investamount" required class="form-control col-md-7 col-xs-12"  onchange="totalprice();paidValidation()" onkeyup="totalprice();paidValidation()" onselect="totalprice();paidValidation()" placeholder='Pay Amount' value="<?php echo $total_amount; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Pay Amount'">
                                             <?php echo form_error('amount', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Amount In Word</label>
                                      <div class="col-md-6 col-sm-6 col-lg-8 col-xs-12">
                                      	<input type="hidden"
										id="number"
										size="15"
										onkeyup="totalprice();"
										onkeydown="return (event.ctrlKey || event.altKey 
														|| (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
														|| (95<event.keyCode && event.keyCode<106)
														|| (event.keyCode==8) || (event.keyCode==9) 
														|| (event.keyCode>34 && event.keyCode<40) 
														|| (event.keyCode==46) )"/>
                                                <input type="text" name="amount_in_word" class="form-control col-md-8 col-xs-12" id="container" style="text-transform:capitalize">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Payment Date<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-lg-8">
                                                <input type="text" name="pay_date" required class="form-control col-md-7 col-xs-12 date-picker" 
                                                placeholder='Payment Date' value="<?php echo $paid_date; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Payment Date'">
                                                <?php echo form_error('pay_date', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>  
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Remarks <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-lg-8">
                                                <textarea name="particular"  id="particular" required class="form-control col-md-7 col-xs-12"  
                                                placeholder='Pyment Perpose'  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Pyment Perpose'"></textarea>
                                            </div>
                                        </div>        
                                      </div> 
                                      <div class="col-sm-4">
                                       <div id="citydiv"></div>
                                      </div>                  
                                                </div>
                                            </div>
                                        </div>
                                        
                               	     </div>
                                   </div> 
                                    
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-lg-8 col-md-offset-3">
                                           <input type="hidden" name="inst_id" value="<?php echo $inst_id; ?>">
                                            <input type="reset" class="btn btn-primary" value="Reset">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                               <?php echo form_close();?>
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
                    
                    
                    
<!--<div id="historyModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>-->