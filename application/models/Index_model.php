<?php
Class Index_model extends CI_Model
{
		/*function get_userLogin($usr, $pwd)
		 {
			 $reader =    $this->db->get_where('users', array('email'=> $usr, 'password'=>sha1($pwd), 'active'=> 1));
			 return $reader->row_array();
		 }*/
		
		public function doctorPatientList($doctorid,$today,$start,$limit)
        {
            $this->db->select('*');
            $this->db->from('registration a'); 
            $this->db->join('appointment b', 'b.patient_id=a.patient_id', 'left');
			if($doctorid!=""){
            	$this->db->where('b.doctor_id',$doctorid);  
			}
			if($today!=""){
            	$this->db->where('b.app_date',$today);  
			}
			$this->db->order_by('a.id','asc');	
			$this->db->limit($start,$limit);		      
            $query = $this->db->get(); 
            return $query;
        }
		
		
		public function doctorPatientListCount($doctorid,$today)
        {
            $this->db->select('*');
            $this->db->from('registration a'); 
            $this->db->join('appointment b', 'b.patient_id=a.patient_id', 'left');
			if($doctorid!=""){
            	$this->db->where('b.doctor_id',$doctorid);  
			}
			if($today!=""){
            	$this->db->where('b.app_date',$today);  
			}
			$this->db->order_by('a.id','asc');	
            $query = $this->db->get(); 
            return $query;
        }
		
		
		
		 function checkUserTemplate($table,$colum,$data)
	  {
		  $this->db->where($colum, $data);
		  $query = $this->db->get($table);
		  return $query;
	  }
	  
	  
		function get_userLogin($usr, $pwd)
     	{
		     	$admin = $this->db->get_where('users', array('email'=> $usr, 'password'=>sha1($pwd), 'active'=> 1 ));
				$doctor = $this->db->get_where('doctors_list', array('email'=> $usr, 'password'=>sha1($pwd), 'active'=> 1));
				$receiption = $this->db->get_where('receiptionist_list', array('email'=> $usr, 'password'=>sha1($pwd), 'active'=> 1));
				$operation = $this->db->get_where('operation_department', array('email'=> $usr, 'password'=>sha1($pwd), 'active'=> 1));
				$admission = $this->db->get_where('admission_department', array('email'=> $usr, 'password'=>sha1($pwd), 'active'=> 1));
				$accounts = $this->db->get_where('accounts', array('email'=> $usr, 'password'=>sha1($pwd), 'active'=> 1));
				
				if ($admin->num_rows() > 0)
				{
				 	 return array(
						'adminResult' => $admin->row_array(),
						'userType' => 'Admin'
						);
				}
				elseif ($doctor->num_rows() > 0)
				{
				 	 return array(
						'doctorResult' => $doctor->row_array(),
						'userType' => 'Doctor'
						);
				}
				elseif ($receiption->num_rows() > 0)
				{
				 	 return array(
						'receiptionResult' => $receiption->row_array(),
						'userType' => 'Receiptionist'
						);
				}
				elseif ($operation->num_rows() > 0)
				{
				 	 return array(
						'operationResult' => $operation->row_array(),
						'userType' => 'Operation Department'
						);
				}
				elseif ($admission->num_rows() > 0)
				{
				 	 return array(
						'admissionResult' => $admission->row_array(),
						'userType' => 'Admission Department'
						);
				}
				elseif ($accounts->num_rows() > 0)
				{
				 	 return array(
						'accountsResult' => $accounts->row_array(),
						'userType' => 'Accounts Department'
						);
				}
				
     }
	 
	 
function getSearch0Data($table,$colId,$id,$colId2,$id2,$colId3,$id3,$orderId,$order,$limit) 
	{
	  		 $this->db->where($colId, $id);
			 if($colId2!=""){
				$this->db->where($colId2, $id2);
				}
				 if($colId3!=""){
				$this->db->where($colId3, $id3);
				}
	   		 $this->db->order_by($orderId, $order);
	   		 $result=$this->db->get($table);
		    return $result;
	}
	
	
	function getArticleDataById($table,$colId,$id,$colId2,$id2,$orderId,$order,$limit) 
	{
				if($colId!=""){
				$this->db->where($colId, $id);
				}
			 if($colId2!=""){
				$this->db->where($colId2, $id2);
				}
	   		 $this->db->order_by($orderId, $order);
	   		 $result=$this->db->get($table);
		    return $result;
	}
	
	
	
	function getDataById($table,$colId,$id,$orderId,$order,$limit) 
	{
			if($id!=""){
				$this->db->where($colId, $id);
			}
	   		$this->db->order_by($orderId, $order);
			if($limit!=""){
				$this->db->limit($limit);
			}
	   		$result=$this->db->get($table);
		    return $result;
	}
	
	
	function getDataByIdArray($table,$colId,$id,$orderId,$order,$limit) 
	{
			if($id!=""){
				$this->db->where_in($colId, $id);
			}
	   		$this->db->order_by($orderId, $order);
			if($limit!=""){
				$this->db->limit($limit);
			}
	   		$result=$this->db->get($table);
		    return $result;
	}
	
	function getTable($table,$column,$order){
		$query =   $this->db
						->order_by($column, $order)
						->get($table);
		return $query;	
	}

function getOneItemTable($table,$tableColum,$userColum,$orderId,$order){
		$query =   $this->db
						->order_by($orderId, $order)
						->where($tableColum,$userColum)
						->get($table);
		return $query->row_array();	
	}
// Display All data with id
function getAllItemTable($table,$colum,$id,$statusColum,$status,$orderId,$order){
			  
			  if($colum!=""){
				  $this->db->where($colum,$id);
			  }
			  if($status!=""){
				  $this->db->where($statusColum,$status);
			  }
			 /* if($keyword!=""){
				  $this->db->like('fullname', $keyword);
				  $this->db->or_like('email', $keyword);
				  $this->db->or_like('mobileno', $keyword);
				  $this->db->or_like('gender', $keyword);
				  $this->db->or_like('country', $keyword);
				  $this->db->or_like('city', $keyword);
			  }*/
			  $this->db->order_by($orderId,$order);
			 $query = $this->db->get($table);
		return $query;
}


/////////////////////////////////////////All Insert, Update, Select, Delete and login Area/////////////////////////////////////////////////////////
	
/*----- Insert Table and Get ID -------- */
	
	function inertTable($table, $insertData){
		if($this->db->insert($table, $insertData)):
			return $this->db->insert_id();
		else:
			return false;
		endif;
	}

	 
	function update_table($table, $colid,$idval, $uvalue){
		$this->db->where($colid,$idval);
		$dbquery = $this->db->update($table, $uvalue); 
		if($dbquery)
			return true;
		else
			return false;
	}
	
	/*public function GetRow($keyword) {        
        $this->db->order_by('id', 'DESC');
        $this->db->like("patient_name", $keyword);
        return $this->db->get('registration')->result_array();
    }
	*/
	
	 function checkOldPass($table,$old_password,$cid)
		{
			$this->db->where('mobileno', $this->session->userdata('mobileno'));
			$this->db->where('id', $cid);
			$this->db->where('password', $old_password);
			$query = $this->db->get($table);
			return $query;
			/*if($query->num_rows() > 0)
				return 1;
			else
				return 0;*/
		}


	function getSearchList($reg,$symptom,$patient_name,$patient_id,$diagonasis,$reganddate,$formDate,$toDate,$start,$limit) 
	{
		
		
		if($diagonasis!=""){
		$queryData = $this->db->query("
		  (select patient_id from abdominalpain where diagonosis='".$diagonasis."')
		  UNION
		  (select patient_id from acutedairrhea where diagonosis='".$diagonasis."')
		  UNION
		  (select patient_id from acutejandus where diagonosis='".$diagonasis."')
		  UNION
		  (select patient_id from chronicdiarrhea where diagonosis='".$diagonasis."')
		  UNION
		  (select patient_id from chronicjaundice where diagonosis='".$diagonasis."')
		  UNION
		  (select patient_id from liverbiopsy where diagonosis='".$diagonasis."')
		  UNION
		  (select patient_id from lowerbleeding where diagonosis='".$diagonasis."')
		  UNION
		  (select patient_id from neonatalcholestasis where diagonosis='".$diagonasis."')
		  UNION
		  (select patient_id from pem where diagonosis='".$diagonasis."')
		  UNION
		  (select patient_id from spaceoccupyinglesion where diagonosis='".$diagonasis."')
		  UNION
		  (select patient_id from storagedisease where diagonosis='".$diagonasis."')");
		  foreach($queryData->result() as $row);
		  $patId=$row->patient_id;
		  $this->db->where('patient_id',$patId);
		}
		
		
		
		if($reg!=""){
	  		$this->db->where('hos_reg_number',$reg);
		}
		if($symptom!=""){
	  		$this->db->where('symptom',$symptom);
		}
		if($patient_name!=""){
	  		$this->db->where('id',$patient_name);
		}
		if($patient_id!=""){
	  		$this->db->where('patient_id',$patient_id);
		}
		   if($reganddate!=""){
				if($formDate=="" && $toDate!=""){
					 $this->db->where('date_reg',$toDate); 
				}
				elseif($formDate!="" && $toDate!=""){
					 $this->db->where('date_reg >=', $formDate);
					 $this->db->where('date_reg <=', $toDate); 
				}
		}
		
		$this->db->limit($start,$limit);
		$result=$this->db->get('registration');
		return $result;
	}
	
	
	
	
	function getSearchListCount($reg,$symptom,$patient_name,$patient_id,$reganddate,$formDate,$toDate) 
	{
		if($reg!=""){
	  		$this->db->where('hos_reg_number',$reg);
		}
		if($symptom!=""){
	  		$this->db->where('symptom',$symptom);
		}
		if($patient_name!=""){
	  		$this->db->where('id',$patient_name);
		}
		if($patient_id!=""){
	  		$this->db->where('patient_id',$patient_id);
		}
		if($reganddate!=""){
			if($formDate=="" && $toDate!=""){
				 $this->db->where('date_reg',$toDate); 
			}
			elseif($formDate!="" && $toDate!=""){
				 $this->db->where('date_reg >=', $formDate);
				 $this->db->where('date_reg <=', $toDate); 
			}
		}
		$result=$this->db->get('registration');
		return $result;
	}




/*----- Delete Table Row -------- */
	function deletetable_row($tablename, $tableidname, $tableidvalue){
		if($this->db->where($tableidname, $tableidvalue)->delete($tablename)) return true;
		return false;
	}
}

?>