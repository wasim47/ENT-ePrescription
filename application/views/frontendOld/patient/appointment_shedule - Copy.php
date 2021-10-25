<style>
#cellTitle{
	width:100px; 
	height:auto;
	text-align:center;
	float:left;	
	color:#666; 
	font-family:Verdana, Geneva, sans-serif; 
	font-size:11px;
	background:#fff;
}

.cellAdRemClass{
	border:1px solid #eaeaea;
	width:100px; 
	height:30px;
	float:left;	
	border-collapse:collapse;
	background:#fff; 
	padding:2px; 
	color:#999;
	background:#090;
	opacity:0.5;
}

.cell{
	border:1px solid #eaeaea;
	width:100px; 
	height:30px;
	float:left;	
	background:#fff;
	border-collapse:collapse;
	background:#fff; 
	padding:2px; 
	color:#999;
}


.cellSelectedPending{
	border:1px solid #eaeaea;
	width:100px; 
	height:30px;
	float:left;	
	background:#BFBF00;
	padding-top:3px;
	border-collapse:collapse;
	text-align:center;
	font-size:16px;
	text-transform:uppercase;
	color:#f5f5f5;
}

.cellSelected{
	border:1px solid #eaeaea;
	width:100px; 
	height:30px;
	float:left;	
	background:#060;
	padding-top:3px;
	border-collapse:collapse;
	text-align:center;
	font-size:16px;
	text-transform:uppercase;
	color:#f5f5f5;
}
.black_overlay{
        display: none;
        position: fixed;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        background-color: black;
        z-index:1001;
        -moz-opacity: 0.8;
        opacity:.80;
        filter: alpha(opacity=80);
    }
    .white_content {
        display: none;
        position: fixed;
        top: 20%;
        left: 25%;
        width: 50%;
        height: 60%;
        padding: 16px;
         border-radius:0 0 5px 5px;
		-moz-border-radius:0 0 5px 5px;
		-webkit-border-radius: 0 0 5px 5px; 
		box-shadow:0 0 5px #ccc;
		-moz-box-shadow:0 0 5px #ccc;
		-webkit-box-shadow:0 0 5px #ccc;
        background-color: white;
        z-index:1002;
        overflow: auto;
    }
	
	
	.white_content1 {
        display: none;
        position: fixed;
        top: 20%;
        left: 20%;
        width: 60%;
        height: 60%;
        padding: 16px;
         border-radius:0 0 5px 5px;
		-moz-border-radius:0 0 5px 5px;
		-webkit-border-radius: 0 0 5px 5px; 
		box-shadow:0 0 5px #ccc;
		-moz-box-shadow:0 0 5px #ccc;
		-webkit-box-shadow:0 0 5px #ccc;
        background-color: white;
        z-index:1002;
        overflow: auto;
    }    
    
   </style>

<script type="text/javascript">
function evenCalender(position,timeval,dateval){
	//alert(position+timeval);	
	var sel = document.getElementById("doctor_id"); 
	var i = sel.selectedIndex; 
	var selected_text = sel.options[i].text; 
	document.getElementById("docid").value=selected_text;
	
	document.getElementById("closeval").value=position+timeval;
	var doctorid = document.getElementById("doctor_id").value;
	
	document.getElementById("lightbox").style.display='inline';
	document.getElementById("fade").style.display='block';
	document.getElementById("apptime").value=timeval;
	document.getElementById("appdate").value=dateval;
	document.getElementById("doctorid").value=doctorid;
	document.getElementById("cell"+position+timeval).className = 'cellAdRemClass';
	
}
function evenClose(){
	document.getElementById("lightbox").style.display='none';
	document.getElementById("fade").style.display='none';
	
	var clsval = document.getElementById("closeval").value;
	document.getElementById("cell"+clsval).style.backgroundColor='#fff';
	document.getElementById("cell"+position+timeval).className = 'cell';
}


</script>


<script type="text/javascript">
function eventBooked(position,appid,status,patid,timeval,dateval,docname,doctid){
	//alert(docname);
	document.getElementById("lightbox1").style.display='inline';
	document.getElementById("fade").style.display='block';
	document.getElementById("apptimeDis").innerHTML=timeval;
	document.getElementById("appdateDis").innerHTML=dateval;
	document.getElementById("docnameDis").innerHTML=docname;
	document.getElementById("patidDis").innerHTML=patid;
	document.getElementById("appstatusDis").innerHTML=status;
	
	var sel = document.getElementById("doctor_idEdit"); 
	var i = sel.selectedIndex; 
	sel.options[i].text =docname; 
	
	document.getElementById("doctor_idEdit").value=doctid;
	document.getElementById("patient_idEdit").value=patid;
	document.getElementById("app_idEdit").value=appid;
	document.getElementById("app_statusEdit").value=status;
	
	if(status=="Paid"){
		var fcolor='#006600';
	}
	else if(status=="Pending"){
		var fcolor='#BFBF00';
	}
	document.getElementById("appstatusDis").style.color=fcolor;
	
}
function eventBookedClose(){
	document.getElementById("lightbox1").style.display='none';
	document.getElementById("fade").style.display='none';
	var clsval = document.getElementById("closeval").value;
}
</script>
<script type="text/javascript">

$(document).ready(function(){
	$("#editbtn").click(function(){
		$("#appdetailsview").hide();
		$("#appedit").show(200);
	});
	$("#undobtn").click(function(){
		$("#appedit").hide();
		$("#appdetailsview").show(200);
	});
});
</script>
<?php
function hour ( $a, $b )
{
	$timestamp = strtotime(''.$a.':'.$b.':00');
	$aa = idate('H', $timestamp);
	$bb = idate('i', $timestamp);
	if($bb=="0") { 
		$cc = ""; 
		$dd = $aa;
	} 
	else { 
		$cc = $bb; 
		$dd = $aa.":".$cc;
	}
	
	
	return($dd);
}

function schedLoop($apptime,$date,$paid){
	$mydays = array( 1 => 'Sun','Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
	$totalDay = count($mydays);
	$var = '';
	$var1 ='';
	
    list($day, $month, $year) = explode("-", $date);
    $wkday = date('l',mktime('0','0','0', $month, $day, $year));
    switch($wkday) {
       	case 'Sunday': $numDaysToMon = 1; break;  
	    case 'Monday': $numDaysToMon = 2; break;
        case 'Tuesday': $numDaysToMon = 3; break;
        case 'Wednesday': $numDaysToMon = 4; break;
        case 'Thursday': $numDaysToMon = 5; break;
        case 'Friday': $numDaysToMon = 6; break;
        case 'Saturday': $numDaysToMon = 7; break;
        
    }
    $monday = mktime('0','0','0', $month, $day-$numDaysToMon, $year);
    $seconds_in_a_day = 86400;
    for($i=1; $i<=7; $i++)
    {
        $dates[$i] = date('m/d',$monday+($seconds_in_a_day*$i));
		$dates1[$i] = date('Y-m-d',$monday+($seconds_in_a_day*$i));
    }
   
	mysql_connect("localhost","root","");
	$con = mysql_select_db('enthospital');
	
	/*while($row=mysql_fetch_array($querydoctor)){
	    $arr[]=$row['app_time'].$row['app_date'];
	    $arrStatus[]=$row['app_status'];
		//$appid[] = $row['app_id'];
   }*/
	//print_r($appid);
	//print_r($arrStatus);
	
	$putVal="'".$apptime."'";
	for($j=1; $j<=$totalDay; $j++){
		$var1 .= '<div id="cellTitle">'.$mydays[$j].' '.$dates[$j].'</div>';
		$idval = $j.$apptime;
		$dateval = "'".$dates1[$j]."'";
		$dateandtime = $apptime.date('Y-m-d',strtotime($dates1[$j]));	
		$datesearch = date('Y-m-d',strtotime($dates1[$j]));
		
		
		if($_SESSION['userType']=='Doctor'){
			$doctorsid = $_SESSION['userAccessId'];
			if($paid!=""){
				$queryappo = mysql_query("select * from appointment where app_time='".$apptime."' and app_date='".$datesearch."' 
				and patient_id='".$paid."' and doctor_id='".$doctorsid."' order by app_id desc");
			}
			else{
				$queryappo = mysql_query("select * from appointment where app_time='".$apptime."' and app_date='".$datesearch."' 
				 and doctor_id='".$doctorsid."' order by app_id desc");	
			}
		}
		else{
			if($paid!=""){
				$queryappo = mysql_query("select * from appointment where app_time='".$apptime."' and app_date='".$datesearch."' 
				and patient_id='".$paid."' order by app_id desc");
			}
			else{
				$queryappo = mysql_query("select * from appointment where app_time='".$apptime."' and app_date='".$datesearch."' order by app_id desc");	
			}	
		}
		if(mysql_num_rows($queryappo) > 0){
			while($row=mysql_fetch_array($queryappo)){
				$appId=$row['app_id'];
				$arrStatus=$row['app_status'];
				$did=$row['doctor_id'];
				$patientid=$row['patient_id'];
				$app_time=$row['app_time'];
				$app_date=$row['app_date'];
				
				$aid="'".$appId."'";
				$st="'".$arrStatus."'";
				$pi="'".$patientid."'";
				$at="'".$app_time."'";
				$ad="'".$app_date."'";
				$doid="'".$did."'";
				
				$querydoctor = mysql_query("select * from doctors_list where doc_id='".$did."' order by doc_id desc");
				$rowd=mysql_fetch_array($querydoctor);
				$doctorName=$rowd['doc_name'];
				$dn="'".$doctorName."'";
				$tootltiptitle='';				
				$tootltiptitle .='App Time: '.$app_time;
				$tootltiptitle .='<br/>';
				$tootltiptitle .='App Date: '.date('F d Y',strtotime($app_date));
				$tootltiptitle .='<br/>';
				$tootltiptitle .='Patient ID: '.$patientid;
				$tootltiptitle .='<br/>';
				$tootltiptitle .='Doctor: '.$doctorName;
				$tootltiptitle .='<br/>';
				$tootltiptitle .='Status: '.$arrStatus;
				
				if($arrStatus=='Pending'){
					$var .= '<div id="cell'.$idval.'" class="cellSelectedPending" style="cursor:pointer" data-html="true" data-toggle="tooltip" title="'.$tootltiptitle.'" onclick="eventBooked('.$j.','.$aid.','.$st.','.$pi.','.$at.','.$ad.','.$dn.','.$doid.');">Booked</div>';
				}
				elseif($arrStatus=='Paid'){
					$var .= '<div id="cell'.$idval.'" class="cellSelected"  style="cursor:pointer" data-html="true" data-toggle="tooltip" title="'.$tootltiptitle.'" onclick="eventBooked('.$j.','.$aid.','.$st.','.$pi.','.$at.','.$ad.','.$dn.','.$doid.');">Booked</div>';
				}
			}
		}
		else{
			$var .= '<div id="cell'.$idval.'" class="cell" onclick="evenCalender('.$j.','.$putVal.','.$dateval.');"></div>';
		}
	   
		/*if (!in_array($dateandtime, $arr, true)){						
			$var .= '<div id="cell'.$idval.'" class="cell" onclick="evenCalender('.$j.','.$putVal.','.$dateval.');"></div>';
		}		
		else{			
			$var .= '<div id="cell'.$idval.'" class="cellSelectedPending" onclick="eventBooked('.$j.','.$putVal.','.$dateval.');">booked</div>';
		}*/
	}
	
	
	return array('var' => $var,
                 'var1' => $var1
                );   
}	


$mstime = "01:00 am";
$metime = "12:00 pm";

list($stime,$smedium)=explode(' ',$mstime);
list($sh,$sm)=explode(':',$stime);

list($etime,$emedium)=explode(' ',$metime);
list($eh,$em)=explode(':',$etime);
$today = date('d-m-Y');


if($this->session->userdata('userType')=='Doctor'){
	$width = '100%';	
}
else{
$width = '80%';	
}
?>

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
                                	<div style="width:<?php echo $width;?>; float:left; max-height:500px; overflow:scroll; overflow-x:hidden;">
                                        <table width="100%" align="center" bgcolor="#fff" cellpadding="0" cellspacing="0">
                                             <tr>
                                                  <td style="padding:2px;"></td>
                                                  <td style="padding:2px;">
                                                    <?php //echo schedLoop($displayAppTime);
                                                      $t = schedLoop('',$today,$patient_id); 
                                                      echo $t['var1'];
                                                      //echo week_from_monday($today);
                                                      ?>
                                                  </td>
                                             </tr>
                                                <?php
                                                for($i=$sh;$i<=$eh;$i++)
                                                    {
                                                      for($mi=0;$mi<=1;$mi++)
                                                      {
                                                          $finalI = $mi * 30;
                                                          $hour = hour($i, $finalI);
                                                          if($hour<12){
                                                              $med=$smedium;
                                                          }
                                                          else{
                                                              $med=$emedium;	
                                                          }
                                                          $displayAppTime=$hour.$med;
                                              ?>
                                                 <tr>
                                           <td width="5%" style="padding:2px;color:#666; font-family:Verdana, Geneva, sans-serif; font-size:11px">
                                                  <div style="margin-right:5px; text-align:right;"><?php echo $displayAppTime;?></div></td>
                                                    
                                                  <td width="91%" align="left">
                                                  <?php //echo schedLoop($displayAppTime);
                                                  $t = schedLoop($displayAppTime,$today,$patient_id); 
                                                  echo $t['var'];
                                                  ?>
                                                  </td>
                                                  
                                                   </tr>
                                                  <?php
                                                    }
                                                    }
                                                  ?>
                                                  
                                                  
                                             
                                        </table>
                                    </div> 
                                    
									
									
									
									
									
									
									
									
									
									
	<!-- ------------------------------ Submit Part ------------------------------------------>								
									
									
									
<?php 
	$attr=array(
		"class"=>'form-horizontal form-label-left',
		"name"=>'valform'
	);
	echo form_open_multipart('',$attr);?>
     <?php
		  if($this->session->userdata('userType')!='Doctor'){
	  ?>
	<div style="width:19%;float:right; min-height:500px; overflow:scroll;
	 border:1px solid #ccc; overflow-x:hidden;">
	<select name="doctor_id" id="doctor_id" class="form-control" required>
		<option value="">Select Doctor</option>
		<?php
			foreach($doctors_list->result() as $doc){
		?>
		<option value="<?php echo $doc->doc_id;?>"><?php echo $doc->doc_name;?></option>
		<?php } ?>
	</select>
	 <?php echo form_error('doctor_id', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
	</div>
    <?php
		  }
	?>
	<div id="lightbox" class="white_content">
		<div id="close" style="float:right">
			<a href="#" onclick="evenClose();">Close</a>
			<input type="hidden" id="closeval" />
		</div>
	
		<h1>Appointment Schedule</h1>
		
		 <table width="100%">
				<tr>
					<td>Appointment Time</td><td>
					<input type="text" name="app_time" id="apptime" class="form-control" readonly="readonly" style="margin-bottom:5px" /></td>
				</tr>
				<tr>
					<td>Appointment Date</td><td><input type="text" name="app_date" id="appdate" class="form-control" readonly="readonly" style="margin-bottom:5px"/></td>
				</tr>
				<tr>
				   <td>Doctor Id</td><td>
				   <input type="text" name="docid" id="docid" class="form-control" readonly="readonly"  
				   style="margin-bottom:5px"/>
				   <input type="hidden" name="doctorid" id="doctorid" class="form-control" />
				   </td>
				</tr> 
				<tr>
				   <td>Patient ID</td><td>
				   <input type="text" name="patientid" id="patname" class="form-control" readonly="readonly" 
				   style="margin-bottom:5px" value="<?php echo $patient_id;?>"/></td>
				</tr> 
				<tr>
				 <td colspan="2"><input type="submit" name="appoint_submit" value="Submit" class="btn btn-success pull-right" /></td>
				</tr> 
			</table>
	   
	</div>
 <?php echo form_close();?>   



<?php 
	$attr=array(
		"class"=>'form-horizontal form-label-left',
		"name"=>'valform'
	);
	echo form_open_multipart('index/update_appointment',$attr);?>
	<div id="lightbox1" class="white_content1">
		<div id="close" style="float:right">
			<a href="#" onclick="eventBookedClose();">Close</a>
		</div>
	
		<h3>Appointment Details</h3>
		
			<table width="100%" id="appdetailsview">
				<tr style="background:#CCC">
					<td width="18%" height="40" align="center" bgcolor="#666666"><strong style="color:#fff">Appointment Time</strong></td>
                  <td width="19%" align="center" bgcolor="#666666"><strong style="color:#fff">Appointment Date</strong></td>
				  <td width="12%" align="center" bgcolor="#666666"><strong style="color:#fff">Patient ID</strong></td>
				  <td width="36%" align="center" bgcolor="#666666"><strong style="color:#fff">Doctor Name</strong></td>
					<td width="15%" align="center" bgcolor="#666666"><strong style="color:#fff">Payment Status</strong></td>
  </tr>
				<tr bgcolor="#eaeaea">
					<td width="18%" height="51" align="center"><strong><div id="apptimeDis"></div></strong></td>
                <td width="19%" align="center"><strong><div id="appdateDis"></div></strong></td>
			    <td width="12%" align="center"><strong><div id="patidDis"></div></strong></td>
			    <td width="36%" align="center"><strong><div id="docnameDis"></div></strong></td>
				  <td width="15%" align="center"><strong><div id="appstatusDis"></div></strong></td>
				</tr> 
				
                <tr><td colspan="5" align="right"><a href="javascript:void();" id="editbtn" class="btn btn-primary" style="margin-top:10px;">Edit</a></td></tr>
			</table>
            
            
            <table width="100%" id="appedit" style="display:none">
            <?php
            	if($this->session->userdata('userType')=='Doctor'){
					$doctorid = $this->session->userdata('userAccessId');
					?>
                    <input type="hidden" name="doctor_id" value="<?php echo $doctorid;?>" />
                    <?php
				}
				else{
					?>
                    <tr>
				   <td>Doctor Id</td><td>
				   <select name="doctor_id" id="doctor_idEdit" class="form-control" required>
                        <option value="">Select Doctor</option>
                        <?php
                            foreach($doctors_list->result() as $doc){
                        ?>
                        <option value="<?php echo $doc->doc_id;?>"><?php echo $doc->doc_name;?></option>
                        <?php } ?>
                  </select>
				   </td>
				</tr>
                    <?php
				}
			?>
				 
                <tr><td colspan="2">&nbsp;</td></tr>
				<tr>
				   <td>Patient ID</td><td>
				   <select name="patient_id" id="patient_idEdit" class="form-control" required>
                        <option value="">Select Patient ID</option>
                        <?php
                            foreach($patients_list->result() as $pat){
                        ?>
                        <option value="<?php echo $pat->patient_id;?>"><?php echo $pat->patient_id;?></option>
                        <?php } ?>
                  </select>
                  </td>
				</tr> 
                <tr><td colspan="2">&nbsp;</td></tr>
				<tr>
				   <td>Status</td><td>
				   <select name="app_status" id="app_statusEdit" class="form-control" required>
                       <option value="Pending">Pending</option>    
                       <option value="Paid">Paid</option>                        
                  </select>
                  </td>
				</tr> 
                <tr><td colspan="2">&nbsp;</td></tr>
				<tr>
				 <td colspan="2">
                 <a href="javascript:void();" id="undobtn" class="btn btn-primary">Undo</a>
                 <input type="hidden" name="app_id" id="app_idEdit" />
                 <input type="submit" name="appoint_submit" value="Submit" class="btn btn-success pull-right" /></td>
				</tr> 
			</table>
	   
	</div>
 <?php echo form_close();?>  
<div id="fade" class="black_overlay"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               