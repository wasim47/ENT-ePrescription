<?php

$action = $_POST['action'];
$dat = date("Y-m-d");


if($action=='custom_save') {
	$pid 		= $_POST['pid'];
	$cdetails	= $_POST['cdetails'];

	$dat = date("Y-m-d");
	$sql = "INSERT INTO prescription_custom (patient_id,doctor_id,prescripton_details,date) values('".$pid."','','".$cdetails."','".$dat."')";
	$this->db->query($sql);
	$cpreid = $this->db->insert_id();
	$url = base_url('index/customPrescripPrint').'?id='.$pid.'&presid='.$cpreid.'&dat='.date('Y-m-d');
	echo $url;
}





if($action=='insertprescrip') {
	$pid = $_POST['pid'];
	$followupid = $_POST['followupid'];
	$department = $_POST['department'];
	$date=date('Y-m-d');
	$sql = "INSERT INTO prescription_entry (patient_id,follow_up,department,date) values('".$pid."','".$followupid."','".$department."','".$date."')";
	$this->db->query($sql);
}



if($action=='save') {
	$pid = $_POST['pid'];
	$cat	= $_POST['cat'];
	$drug = $_POST['drug'];
	$dose = $_POST['dose'];
	$meal = $_POST['meal'];
	$gap = $_POST['gap'];
	//$cat = $_POST['cat'];
	$duration = $_POST['duration'];
	
	
	
	$sqld = "SELECT * FROM prescription_entry order by pr_id desc limit 1";
	$result = $this->db->query($sqld);
	foreach($result->result() as $row);
	$presid=$row->pr_id;
	$patient_id=$row->patient_id;
	
	
	$dat = date("Y-m-d");
	//$sql = "INSERT INTO prescription SET patient_id='$pid', drug='$drug', dose='$dose', meal='$meal', gap='$gap', duration='$duration', dat = '$dat', cat = '$cat'";
	$sql = "INSERT INTO prescription (patient_id,pr_id,drug,dose,meal,gap,duration,dat,cat) values('".$pid."','".$presid."','".$drug."','".$dose."','".$meal."','".$gap."','".$duration."','".$dat."','".$cat."')";
	
	$this->db->query($sql);
	
	
	$url = base_url('index/prescripPrint').'?id='.$patient_id.'&presid='.$presid.'&dat='.date('Y-m-d');
	echo $url;
	
}


if($action == 'delete1'){
	$pid = $_POST['pid'];
	$sql = "DELETE FROM prs WHERE pid = '$pid' AND dat = '$dat'";
	$this->db->query($sql);
}

if($action == 'save1'){
	$pid 		= $_POST['pid'];
	$name		= $_POST['name'];
	$phy 		= $_POST['phy'];
	$invst 		= $_POST['invst'];
	$dat 		= date("Y-m-d");
	//$pname 		= "";
	$sex 		= $_POST['sex'];;
	$weight 	= $_POST['weight'];
	//$age		= $_POST['age'];
	$symp		= $_POST['symp'];
	$pic		= $_POST['pic'];
	$one		= $_POST['one'];
	$two 		= $_POST['two'];
	$three		= $_POST['three'];
	$four		= $_POST['four'];
	$five		= $_POST['five'];
	$six		= $_POST['six'];
	$seven		= $_POST['seven'];
	$eight		= $_POST['eight'];
	$nine		= $_POST['nine'];
	$ten 		= $_POST['ten'];
	$eleven		= $_POST['eleven'];
	$twelve		= $_POST['twelve'];
	$thirteen	= $_POST['thirteen'];
	
	echo $sql = "INSERT INTO prs SET pid = '$pid', pname = '$name', sex = '$sex', weight = '$weight', phy_exm = '$phy', age = '$age', investigation = '$invst', dat = '$dat', symp = '$symp', pic = '$pic', one = '$one', two = '$two', three = '$three', four = '$four', five = '$five', six = '$six', seven = '$seven', eight = '$eight', nine = '$nine', ten = '$ten', eleven = '$eleven', twelve = '$twelve', thirteen = '$thirteen'";
	$this->db->query($sql);
	//echo $sql;
	
}

if($action=='counter') {
	echo "done: 5, In Queue: 6";
}

if($action == 'getCata'){
	if(isset($_POST['id'])){
		$cata = $_POST['id'];
	}
		$InvstList_ary = getInvstList($cata);
		 //var_dump($InvstList_ary);
		echo "<select name = \"invst1\" id = \"invst1\" style=\"width:250px; background-color:white; color:black\">";
				echo "<option>-----------Select-----------</option>";
			foreach($InvstList_ary as $key=>$value){
				echo "<option value = '$value'>$value</option>";
			}
		echo "</select>";
		
}

if($action == 'show_invst'){
	if(isset($_POST['id'])){
		$cata = $_POST['id'];
	}	
	
	$InvstList_ary = getInvstList($cata);
		 //var_dump($InvstList_ary);
		echo "<select name = \"invst_id\" id = \"invst_id\" style=\"width:250px; background-color:white; color:black\">";
				echo "<option>---------------Select---------------</option>";
			foreach($InvstList_ary as $key=>$value){
				echo "<option value = '$key'>$value</option>";
			}
		echo "</select>";
}



function getInvstList($cata){
	$sql = "select * from investigation_list where invst_cata_id = '$cata'";
	$rec = mysql_query($sql);
	$InvstList_ary = array();
	$i = 0;
	while($row = mysql_fetch_array($rec)){
		$invstId	= $row['invst_id'];
		$invList	= $row['investigation']; //investigation
		//echo $invList;
		$i++;
		$InvstList_ary[$invstId] = $invList;
	}
	return $InvstList_ary;
}

if($action == 'invst_save'){
	
	$id				= $_POST['id'];
	$invst_cata_id 	= $_POST['invst_cata_id'];
	$invst_id		= $_POST['invst_id'];
	$invst_val		= $_POST['invst_val'];
	$rpt_dat		= $_POST['rpt_dat'];
	$prs_dat		= $_POST['prs_dat'];
	
	$sql = "insert into test_report set pid = '$id', invst_cata_id = '$invst_cata_id', test_id = '$invst_id', test_value = '$invst_val', rpt_date = '$rpt_dat', prs_date = '$prs_dat'";
	mysql_query($sql);
	
	if(mysql_affected_rows() == 1){
		$status = 1;
		echo $status;
	}
	else{
		$status = 0;
		echo $status;
	}
}

if($action == 'drug_data'){
	$catcat		= $_POST['cat'];
	$drug		= $_POST['drug'];
	$meal 		= $_POST['meal'];
	$dose		= $_POST['dose'];
	$gap		= $_POST['gap'];
	$duration	= $_POST['duration'];
	
	if(existDrug($drug) == false){
		$sql = "insert into drug set drug_name = '$drug'";
		$this->db->query($sql);
	}
	
	if(existCata($cat) == false){
		$sql = "insert into drug_cata set cata_name = '$cat'";
		$this->db->query($sql);
	}
	
	if(existMeal($meal) == false){
		$sql = "insert into meal_list set meal = '$meal'";
		$this->db->query($sql);
	}
	
	if(existGap($gap) == false){
		$sql = "insert into day_gap set day_gap = '$gap'";
		$this->db->query($sql);
	}
	
	if(existDuration($duration) == false){
		$sql = "insert into duration set duration = '$duration'";
		$this->db->query($sql);
	}
}

function existDrug($drug){
	$sql = "select * from drug where drug_name = '$drug'";
	$rec = $this->db->query($sql);
	$nuRws = $rec->num_rows();
	
	if($nuRws>0){
		return true;
	}
	else{
		return false;
	}
}

function existCata($cata){
	$sql = "select * from drug_cata where cata_name = '$cata'";
	$rec = $this->db->query($sql);
	$nuRws = $rec->num_rows();
	
	if($nuRws>0){
		return true;
	}
	else{
		return false;
	}
}

function existMeal($meal){
	$sql = "select * from meal_list where meal = '$meal'";
	$rec = $this->db->query($sql);
	$nuRws = $rec->num_rows();
	
	if($nuRws>0){
		return true;
	}
	else{
		return false;
	}
}

function existGap($gap){
	$sql = "select * from day_gap where day_gap = '$gap'";
	$rec = $this->db->query($sql);
	$nuRws = $rec->num_rows();
	
	if($nuRws>0){
		return true;
	}
	else{
		return false;
	}
}

function existDuration($duration){
	$sql = "select * from duration where duration = '$duration'";
	$rec = $this->db->query($sql);
	$nuRws = $rec->num_rows();
	
	if($nuRws>0){
		return true;
	}
	else{
		return false;
	}
}
?>
