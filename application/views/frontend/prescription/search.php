<ul id="resultdata">
<?php
if(isset($_POST['search_keyword']))
{
	$search_keyword = $_POST['search_keyword'];
	
	$sqlCountries="SELECT d_id,drug_name FROM drug WHERE drug_name LIKE '%$search_keyword%'";
    $resCountries=$this->db->query($sqlCountries);
	$bold_search_keyword = '<strong>'.$search_keyword.'</strong>';
	if($resCountries->num_rows() > 0){
		$i=0;
		foreach($resCountries->result() as $rowRes){
			$i++;
			echo '<li onclick="getresultdata('.$i.');" id="listitem'.$i.'">'.$rowRes->drug_name.'</li>';
			//echo $rowRes->drug_name;
			/*echo '<div class="show" align="left"><div class="country_name">'.
			str_replace($search_keyword,$bold_search_keyword,$rowRes->drug_name).'</div></div>'; */	
		}
	}else{
		echo '<div class="show" align="left">No matching records.</div>'; 	
	}
}	
elseif(isset($_POST['search_patientid']))
{
	$search_keyword = $_POST['search_patientid'];
	
	$sqlCountries="SELECT patient_id FROM registration WHERE patient_id LIKE '%$search_keyword%'";
    $resCountries=$this->db->query($sqlCountries);
	$bold_search_keyword = '<strong>'.$search_keyword.'</strong>';
	if($resCountries->num_rows() > 0){
		$i=0;
		foreach($resCountries->result() as $rowRes){
			$i++;
			echo '<li onclick="getresultdata('.$i.');" id="listitem'.$i.'">'.$rowRes->patient_id.'</li>';
			//echo $rowRes->drug_name;
			/*echo '<div class="show" align="left"><div class="country_name">'.
			str_replace($search_keyword,$bold_search_keyword,$rowRes->drug_name).'</div></div>'; */	
		}
	}
	
	else{
		echo '<div class="show" align="left">No matching records.</div>'; 	
	}
	
}	

elseif(isset($_POST['search_mobile']))
{
	$search_keyword = $_POST['search_mobile'];
	
	$sqlCountries="SELECT phone FROM registration WHERE phone LIKE '%$search_keyword%'";
    $resCountries=$this->db->query($sqlCountries);
	$bold_search_keyword = '<strong>'.$search_keyword.'</strong>';
	if($resCountries->num_rows() > 0){
		$i=0;
		foreach($resCountries->result() as $rowRes){
			$i++;
			echo '<li onclick="getresultdata('.$i.');" id="listitem'.$i.'">'.$rowRes->phone.'</li>';
		}
	}
	
	else{
		echo '<div class="show" align="left">No matching records.</div>'; 	
	}
	
}	

?>
</ul>