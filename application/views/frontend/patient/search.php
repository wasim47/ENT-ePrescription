<?php
$searchTerm = $_GET['term'];
$query = $this->db->query("SELECT * FROM drug WHERE drug_name LIKE '%".$searchTerm."%' ORDER BY drug_name ASC");
foreach($query->result() as $row){
    $data[] = $row->drug_name;
}
echo json_encode($data);
?>