<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Index_model');
		date_default_timezone_set('Asia/Dhaka');
     	$this->load->library('email');
		$this->load->library('cart');
		$this->load->library('upload');
		$this->load->helper('form');
		$this->load->library('pagination');
		//$this->load->helper('url');
	}
	function index()
	{
		if($this->session->userdata('userAccessMail')) redirect("index/dashboard");
		$data['title']="ENT Hospital | ENT Hospital";
        $this->load->view('frontend/index',$data);
	}
	function autocomplete()
	{
        $this->load->view('frontend/prescription/search');
	}
	
	function followup()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("index");
		$data['title']="Follow Up | ENT Hospital";
		$data['patient_info'] = $this->Index_model->getTable('registration','id','desc');
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			$patientId=$this->input->post('patient_id');
			$patinfo = $this->Index_model->getOneItemTable('registration','patient_id',$patientId,'id','desc');
			$department=$patinfo['symptom'];
			
			$save['patient_id']	    = $patientId;
			$save['new_complaints']	    = $this->input->post('new_complaints');
			$save['diagnosis']	    = $this->input->post('diagnosis');
			$save['investigatoin']	    = $this->input->post('investigatoin');
			$save['treatement']	    = $this->input->post('treatement');
			$save['advice_admission']	    = $this->input->post('advice_admission');
			
				$day=$this->input->post('next_followup_day');
				$weeks=$this->input->post('next_followup_weeks');
				$noneed=$this->input->post('next_followup_noneeded');
				if($noneed!=""){
					$nextfollowup=$noneed;
				}
				elseif($weeks!="" && $day==''){
					$nextfollowup=$weeks.' Weeks';
				}
				elseif($day!='' && $weeks==""){
					$nextfollowup=$day.' Days';
				}
				elseif($weeks!="" && $day!=''){
					$nextfollowup=$weeks.' Weeks, '.$day.' Days';
				}
				$save['next_followup_date']	 = $nextfollowup;
				
				$date=date('Y-m-d');
				//$createDate=date('Y-m-d',strtotime($date));
				$save['date']	    = $date;
				
				if($this->input->post('user_id')!=""){
					$user_id=$this->input->post('user_id');
					$query = $this->Index_model->update_table('followup','id',$user_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('followup', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				//redirect('index/followup', 'refresh');
				$patidDep = $department.'~'.$patientId;
				//redirect('index/prescription/'.$patidDep, 'refresh');
				
			   redirect('index/prescription/'.$patidDep.'/'.$query, 'refresh');
		}
		else{
		 	$data['main_content']="frontend/followup/followup";
         	$this->load->view('template',$data);
		}
	}


	public function followup_ajax(){
		$pid=$this->input->post('pid');
		$totalfollow = $this->Index_model->getAllItemTable('followup','patient_id',$pid,'','','id','desc');
		$patientinfo = $this->Index_model->getAllItemTable('registration','patient_id',$pid,'','','id','desc');
		foreach($patientinfo->result() as $pinfo);
		$patient_name=$pinfo->patient_name;
		
		$followuplist='';
		$followuplist .='
			 <table class="table table-striped">
				<thead>
				  <tr>
					<th>SI</th>
					<th>Patient ID</th>
					<th>Patient Name</th>
					<th>Advice Admission</th>
					<th>Follow Up Date</th>
					<th>Next follow up</th>
					<th>Action</th>
				  </tr>
				</thead>
				<tbody>
			';
		$i=0;
		foreach($totalfollow->result() as $followdata):
		$id=$followdata->id;
		$patient_id=$followdata->patient_id;
		$advice_admission=$followdata->advice_admission;
		$next_followup_date=$followdata->next_followup_date;
		$date=$followdata->date;
		$i++;
		$followuplist .='	
			<tr>
			<td>'.$i.'</td>
			<td>'.$patient_id.'</td>
			<td>'.$patient_name.'</td>
			<td>'.$advice_admission.'</td>
			<td>'.date('F j,d Y',strtotime($date)).'</td>
			<td> After '.$next_followup_date.'</td>
			
			 <td> 
				<a href="'.base_url('index/followup_details/'.$id).'" class="btn btn-primary">
					<span class="glyphicon glyphicon-edit"></span> View Details
				</a> 
				</td>
		  </tr>
        ';
	   endforeach;	
		$followuplist .='
			</tbody>
          </table>
		';	
		
		if($totalfollow->num_rows() > 0){
			$trow=$totalfollow->num_rows() +1;
			$nofollow=$patient_name.' had '.$totalfollow->num_rows().' Follow up';
		}
		else{
			$trow=0;
			$nofollow=$patient_name.' had 0 Follow up';
		}
		echo json_encode(array("result1" => $trow, "nofollow" => $nofollow, "result2"=>$followuplist));
	}
	
	
	
	
	function followup_details()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("index");
		$data['title']="Follow Up | ENT Hospital";
		$followid=$this->uri->segment(3);
		$data['followdetails'] = $this->Index_model->getOneItemTable('followup','id',$followid,'id','desc');
		
		//$patientinfo = $this->Index_model->getAllItemTable('registration','patient_id',$pid,'','','id','desc');
		
		$data['main_content']="frontend/followup/followup_details";
        $this->load->view('template',$data);
	}
	
	public function view_prescription(){

	    $followid=$this->input->get('id');
		$data['prescription_entry'] = $this->Index_model->getOneItemTable('prescription_entry','follow_up',$followid,'pr_id','desc');
		$patient_id = $data['prescription_entry']['patient_id'];
		$data['pinfo'] = $this->Index_model->getOneItemTable('registration','patient_id',$patient_id,'id','desc');
		
        $this->load->view('frontend/prescription/view_prescription',$data);
	}
	
	
	function patient_search()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("index");
		$data['title']="ENT Hospital | ENT Hospital";
		$data['patient_info'] = $this->Index_model->getTable('registration','id','desc');
		$reg = $this->input->post('reg_no');
		$symptom = $this->input->post('symptom');
		$patient_name = $this->input->post('patient_name');
		$patient_id = $this->input->post('patient_id');
		$diagonasis = $this->input->post('diagonasis');
		$reganddate = $this->input->post('reganddate');
		$form_date = $this->input->post('from_date');
		$to_date = $this->input->post('to_date');
		if($form_date!=''){
			$formDate=date('Y-m-d', strtotime($form_date));
		}
		else{
			$formDate="";
		}
		
		if($to_date!=''){
			$toDate=date('Y-m-d', strtotime($to_date));
		}
		else{
			$toDate="";
		}
		
		
		$config = array();
        $config['base_url'] = base_url('index/patient_search/');
        $config["per_page"] = 20;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$total_row = $this->Index_model->getSearchListCount($reg,$symptom,$patient_name,$patient_id,$diagonasis,$reganddate,$formDate,$toDate);
        $config["total_rows"] = $total_row->num_rows();
        $config['num_links'] = $total_row->num_rows();
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
		$config["uri_segment"] = 3;
        $this->pagination->initialize($config);
		$data['pagination']= $this->pagination->create_links();
		$data['pageSl'] = $page;
		
		$data['patientList'] = $this->Index_model->getSearchList($reg,$symptom,$patient_name,$patient_id,$diagonasis,$reganddate,$formDate,$toDate,$config['per_page'], $page);
		$data['main_content']="frontend/patient/patientSearch";
       	$this->load->view('template',$data);
	}
	
	
	
	function summery()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("index");
		$data['title']="ENT Hospital | ENT Hospital";
		$data['keyword'] = $this->input->post('keyword');
		
		$data['main_content']="frontend/patient/summery";
       	$this->load->view('template',$data);
	}



	public function GetCountryName(){
        $keyword=$this->input->get('keyword');
        $data=$this->cmodel->GetRow($keyword);        
        echo json_encode($data);
    }
	
	function investigation()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("index");
		$data['title']="Investigation | ENT Hospital";
		$data['patient_info'] = $this->Index_model->getTable('registration','id','desc');
		if($this->input->post('registration') && $this->input->post('registration')!=""){
				$save['patient_id']	    = $this->input->post('patient_id');
				$save['cbcpbf']	    = $this->input->post('pbf');
					$save['hb']	    = $this->input->post('hb');
					$save['trOrwbc']	    = $this->input->post('wbc');
					$save['dc_N']	    = $this->input->post('dc_N');
					$save['dc_L']	    = $this->input->post('dc_L');
					$save['dc_E']	    = $this->input->post('dc_E');
					$save['dc_M']	    = $this->input->post('dc_M');
					$save['plt']	    = $this->input->post('plt');
					$save['esr']	    = $this->input->post('esr');
					$save['pbf']	    = $this->input->post('pbf');
				$save['haematocrit']	    = $this->input->post('haematocrit');
				$save['creactive']	    = $this->input->post('creactive');
				$save['bloodforcs']	    = $this->input->post('bloodforcs');
					$save['bloodfortext']	    = $this->input->post('bloodfortext');
				$save['urineforrme']	    = $this->input->post('urineforrme');
					$save['urine_allounuin']	    = $this->input->post('urine_allounuin');
					$save['urine_puscell']	    = $this->input->post('urine_puscell');
					$save['urine_rbc']	    = $this->input->post('urine_rbc');
					$save['urine_cast']	    = $this->input->post('urine_cast');
				$save['urineforcs']	    = $this->input->post('urineforcs');
					$save['uninefortext']	    = $this->input->post('uninefortext');
				$save['stoolrmeph']	    = $this->input->post('stoolrmeph');
				$save['stoolobt']	    = $this->input->post('stoolobt');
				$save['stoolforcs']	    = $this->input->post('stoolforcs');
				$save['creatinine']	    = $this->input->post('creatinine');
				$save['bun']	    = $this->input->post('bun');
				$save['electrolyte']	    = $this->input->post('electrolyte');
				$save['stoolelectrolyte']	    = $this->input->post('stoolelectrolyte');
					$save['nat']	    = $this->input->post('nat');
					$save['kt']	    = $this->input->post('kt');
					$save['cl']	    = $this->input->post('cl');
					$save['hoc3']	    = $this->input->post('hoc3');
				$save['stoolforfoecal']	    = $this->input->post('stoolforfoecal');
				$save['ldh']	    = $this->input->post('ldh');
				$save['rbs']	    = $this->input->post('rbs');
				$save['scalcium']	    = $this->input->post('scalcium');
				$save['fastinglipid']	    = $this->input->post('fastinglipid');
				$save['sbilirubintotal']	    = $this->input->post('sbilirubintotal');
				$save['salt']	    = $this->input->post('salt');
				$save['prothrombintime']	    = $this->input->post('prothrombintime');
				$save['activatedpartial']	    = $this->input->post('activatedpartial');
				$save['salbumin']	    = $this->input->post('salbumin');
				$save['serumalkaline']	    = $this->input->post('serumalkaline');
				$save['gammaglutamyltramy']	    = $this->input->post('gammaglutamyltramy');
				$save['urineproteincreatinine']	    = $this->input->post('urineproteincreatinine');
				$save['urineuricacid']	    = $this->input->post('urineuricacid');
				$save['c3']	    = $this->input->post('c3');
				$save['c4']	    = $this->input->post('c4');
				$save['cxrpaview']	    = $this->input->post('cxrpaview');
				$save['plainxrayabdomen']	    = $this->input->post('plainxrayabdomen');
				$save['usgofhbs']	    = $this->input->post('usgofhbs');
				$save['bariumstudy']	    = $this->input->post('bariumstudy');
				$save['ctscanofabdomen']	    = $this->input->post('ctscanofabdomen');
				$save['mrcp']	    = $this->input->post('mrcp');
				$save['ercp']	    = $this->input->post('ercp');
				$save['droplerstudy']	    = $this->input->post('droplerstudy');
				$save['antihavlgm']	    = $this->input->post('antihavlgm');
				$save['antihevlgm']	    = $this->input->post('antihevlgm');
				$save['hbsag']	    = $this->input->post('hbsag');
				$save['antihbclgm']	    = $this->input->post('antihbclgm');
				$save['hbeag2']	    = $this->input->post('hbeag2');
				$save['hbvdna']	    = $this->input->post('hbvdna');
				$save['abtihbs']	    = $this->input->post('abtihbs');
				$save['antihbe2']	    = $this->input->post('antihbe2');
				$save['antihcv2']	    = $this->input->post('antihcv2');
				$save['ceruloplasmin']	    = $this->input->post('ceruloplasmin');
				$save['urinarycopper']	    = $this->input->post('urinarycopper');
				$save['copper']	    = $this->input->post('copper');
				$save['penicillamine']	    = $this->input->post('penicillamine');
				$save['ana']	    = $this->input->post('ana');
				$save['totallgg']	    = $this->input->post('totallgg');
				$save['lkm1']	    = $this->input->post('lkm1');
				$save['antisma']	    = $this->input->post('antisma');
				$save['coombstest']	    = $this->input->post('coombstest');
				$save['ft4']	    = $this->input->post('ft4');
				$save['tsh']	    = $this->input->post('tsh');
				$save['growthhoromne']	    = $this->input->post('growthhoromne');
				$save['cortisal']	    = $this->input->post('cortisal');
				$save['lipase']	    = $this->input->post('lipase');
				$save['amylase']	    = $this->input->post('amylase');
				$save['lgg4']	    = $this->input->post('lgg4');
				$save['asciticfluid']	    = $this->input->post('asciticfluid');
				$save['biochemistry']	    = $this->input->post('biochemistry');
				$save['siga2']	    = $this->input->post('siga2');
				$save['reticulocytecount']	    = $this->input->post('reticulocytecount');
				$save['osmoticfragility']	    = $this->input->post('osmoticfragility');
				$save['hepatobiliary']	    = $this->input->post('hepatobiliary');
				$save['cortisal']	    = $this->input->post('cortisal');
				$save['torchscreen']	    = $this->input->post('torchscreen');
				$save['vdrl']	    = $this->input->post('vdrl');
				$save['serumlactate']	    = $this->input->post('serumlactate');
				$save['bloodph2']	    = $this->input->post('bloodph2');
				$save['serumuricacidlevel2']	    = $this->input->post('serumuricacidlevel2');
				$save['liverbiopsy']	    = $this->input->post('liverbiopsy');
				$save['endoscopyandbiopsy']	    = $this->input->post('endoscopyandbiopsy');
				$save['colonoscopybiopsy']	    = $this->input->post('colonoscopybiopsy');
				$save['alphaantitrypsin']	    = $this->input->post('alphaantitrypsin');
				$save['rbcscan']	    = $this->input->post('rbcscan');
				$save['meckelscan']	    = $this->input->post('meckelscan');
				$save['ttgiga']	    = $this->input->post('ttgiga');
				$save['sweatchloride']	    = $this->input->post('sweatchloride');
				$save['antiendomysial']	    = $this->input->post('antiendomysial');
				$save['g6pd']	    = $this->input->post('g6pd');
				$save['factorassay']	    = $this->input->post('factorassay');
				$save['foecalelastage']	    = $this->input->post('foecalelastage');
				$save['foecalcalprotectin']	    = $this->input->post('foecalcalprotectin');
				$save['panca']	    = $this->input->post('panca');
				$save['casca']	    = $this->input->post('casca');
				$save['antimitochondrial']	    = $this->input->post('antimitochondrial');
				$save['immunoreactive']	    = $this->input->post('immunoreactive');
				$save['proteinc']	    = $this->input->post('proteinc');
				$save['proteins']	    = $this->input->post('proteins');
				$save['antithrombin111']	    = $this->input->post('antithrombin111');
				$save['clostridium']	    = $this->input->post('clostridium');
				$save['urinarysuccino']	    = $this->input->post('urinarysuccino');
				
				$date=$this->input->post('regis_date');
				$createDate=date('Y-m-d',strtotime($date));
				$save['create_date']	    = $createDate;
				$save['date']	    = date('Y-m-d');
				
				
				
				if($this->input->post('user_id')!=""){
					$user_id=$this->input->post('user_id');
					$this->Index_model->update_table('investigation','id',$user_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('investigation', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('index/investigation', 'refresh');
		}
		else{
		 	$data['main_content']="frontend/patient/investigation";
         	$this->load->view('template',$data);
		}
	}
	
/////////////////////// Admin Part ////////////////////////////////	 
	
	function dashboard()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("index");
		$data['title']="Dashboard ENT Hospital | ENT Hospital";
		$data['main_content']="frontend/dashboard";
        $this->load->view('template',$data);
	}
	function admin_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("index");
		$data['title']="Symptom List ENT Hospital | ENT Hospital";
		$data['admin_list'] = $this->Index_model->getTable('users','id','desc');
		$data['main_content']="frontend/admin/admin_list";
        $this->load->view('template',$data);
	} 
	
	function admin_registration()
	{
		$data['title']="Patient Registration | ENT Hospital";
		$userId=$this->uri->segment(3);
		$data['adminUpdate'] = $this->Index_model->getAllItemTable('users','id',$userId,'','','id','desc');
		
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			$this->form_validation->set_rules('username', 'User Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Login Email', 'trim|required|is_unique[users.email]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirmpassword]');
			$this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'required');
			
			if($this->form_validation->run() != false){
				$save['username']	    = $this->input->post('username');
				$save['email']	    	= $this->input->post('email');
				$save['password']	    = sha1($this->input->post('password'));
				$save['pass_hints']	    = $this->input->post('password');
				$save['created_on']	    = date('Y-m-d');
				$save['active']	    	= 1;
				
				if($this->input->post('user_id')!=""){
					$user_id=$this->input->post('user_id');
					$this->Index_model->update_table('users','id',$user_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('users', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('index/admin_list', 'refresh');
				
				
			}
			else{
				$data['main_content']="frontend/admin/admin_registration";
        		$this->load->view('template', $data);
				}
		}
		$data['main_content']="frontend/admin/admin_registration";
        $this->load->view('template', $data);
	}



public function userLogin()
     {
          $username = $this->input->post("username");
  		  $password = $this->input->post("password");
          $this->form_validation->set_rules("username", "Email", "trim|required|min_length[6]|valid_email");
          $this->form_validation->set_rules("password", "Password", "trim|required");

          if ($this->form_validation->run() == FALSE)
          {
              redirect('index');
          }
          else
          {
                    $usr_result = $this->Index_model->get_userLogin($username, $password);
                    if ($usr_result > 0) //active user record is present
                    {
					 /* $sessiondata = array(
						'userAccessMail'=>$username,
						'userAccessName'=> $usr_result['username'],
						'userAccessId' => $usr_result['id'],
						'password' => TRUE
					   );
						$this->session->set_userdata($sessiondata);
						redirect("index/dashboard/");*/
						
						$userType = $usr_result['userType'];
						if(isset($usr_result['adminResult'])){
							$asminQuery = $usr_result['adminResult'];
							if ($asminQuery > 0)
							  {
								  $sessiondata = array(
									'userAccessMail'=>$username,
									'userType'=>$userType,
									'userAccessName'=> $asminQuery['username'],
									'userAccessId' => $asminQuery['id'],
									'password' => TRUE
								   );
							  }
						}
						elseif(isset($usr_result['doctorResult'])){
							$doctorQuery = $usr_result['doctorResult'];
							if ($doctorQuery > 0)
							  {
								  $sessiondata = array(
									'userAccessMail'=>$username,
									'userType'=>$userType,
									'userAccessName'=> $doctorQuery['doc_name'],
									'userAccessId' => $doctorQuery['doc_id'],
									'password' => TRUE
								   );
							  }
						}
						$this->session->set_userdata($sessiondata);
						redirect("index/dashboard/");
                    }
                    else
                    {
                     $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" style="padding:7px; margin-bottom:5px">Invalid Email and password!</div>');
                     redirect('index');
                    }
          }
     }
	 
	 
	/*public function userLogin()
     {
          $username = $this->input->post("username");
  		  $password = $this->input->post("password");
          $this->form_validation->set_rules("username", "Email", "trim|required|min_length[6]|valid_email");
          $this->form_validation->set_rules("password", "Password", "trim|required");

          if ($this->form_validation->run() == FALSE)
          {
              redirect('index');
          }
          else
          {
                    $usr_result = $this->Index_model->get_userLogin($username, $password);
                    if ($usr_result > 0) //active user record is present
                    {
					  $sessiondata = array(
						'userAccessMail'=>$username,
						'userAccessName'=> $usr_result['username'],
						'userAccessId' => $usr_result['id'],
						'password' => TRUE
					   );
						$this->session->set_userdata($sessiondata);
						redirect("index/dashboard/");
                    }
                    else
                    {
                     $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" style="padding:7px; margin-bottom:5px">Invalid Email and password!</div>');
                     redirect('index');
                    }
          }
     }*/
	 
    function logout()
  	{
	  $sessiondata = array(
				'userAccessMail'=>'',
				'userAccessName'=> '',
				'userAccessId' => '',
				'password' => FALSE
		 );
	$this->session->unset_userdata($sessiondata);
	$this->session->sess_destroy();
    redirect('index', 'refresh');
  }
  	
	
/////////////////// Doctors Part/////////////////////////////////
	
	function doctors_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("index");
		$data['title']="Doctors List ENT Hospital | ENT Hospital";
		$data['doctors_list'] = $this->Index_model->getTable('doctors_list','doc_id','desc');
		$data['main_content']="frontend/doctors/doctors_list";
        $this->load->view('template',$data);
	} 
	
	function doctors_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("index");
		$data['title']="Doctors Registration | ENT Hospital";
		$userId=$this->uri->segment(3);
		$data['doctorsUpdate'] = $this->Index_model->getAllItemTable('doctors_list','doc_id',$userId,'','','doc_id','desc');
		
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			$this->form_validation->set_rules('doc_name', 'Doctors Name', 'trim|required');
			$this->form_validation->set_rules('department', 'Department', 'trim|required');
			$this->form_validation->set_rules('specialty', 'Specialty', 'trim|required');
			$this->form_validation->set_rules('degree', 'Degree', 'trim|required');
			$this->form_validation->set_rules('mobile', 'Mobile No', 'trim|required|is_unique[doctors_list.mobile]');
			$this->form_validation->set_rules('email','Login Email','required|trim|is_unique[doctors_list.email]|is_unique[users.email]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			
			if($this->form_validation->run() != false){
				
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/doctor/';
				$config['charset'] = "UTF-8";
				$new_name = "Doctor_".time();
				$config['file_name'] = $new_name;
				
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['docphoto']['name']))
					{
						if($this->upload->do_upload('docphoto')){
							$upload_data	= $this->upload->data();
							$save['picture']	= $upload_data['file_name'];
							$this->_CreatePageThumbnail($upload_data['file_name'], $config['upload_path'],150,100);			
							$save['thumb'] = $upload_data['raw_name']. '_thumb' .$upload_data['file_ext'];
						}
						else{
							$upload_data	= '';
							$save['picture']	= $upload_data;	
							$save['thumb']='';
						}
					}	
					
					
					
					
					
				$save['doc_name']	    = $this->input->post('doc_name');
				$save['mobile']	    	= $this->input->post('mobile');
				$save['department']	    	= $this->input->post('department');
				$save['degree']	    	= $this->input->post('degree');
				$save['specialty']	    	= $this->input->post('specialty');
				$save['designation']	    	= $this->input->post('designation');
				$save['hospital']	    	= $this->input->post('hospital');
				$save['working_history']	    	= $this->input->post('working_history');
				$save['educational_history']	    	= $this->input->post('educational_history');
				$save['bmdc']	    	= $this->input->post('bmdc');
				$save['email']	    	= $this->input->post('email');
				$save['password']	    = sha1($this->input->post('password'));
				$save['pass_hints']	    = $this->input->post('password');
				$save['date']	    = date('Y-m-d');
				$save['active']	    	= 1;
				
				if($this->input->post('doc_id')!=""){
					$doc_id=$this->input->post('doc_id');
					$this->Index_model->update_table('doctors_list','doc_id',$doc_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('doctors_list', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('index/doctors_list', 'refresh');
				
				
			}
			else{
				$data['main_content']="frontend/doctors/new_doctor";
        		$this->load->view('template', $data);
				}
		}
		else{
			$data['main_content']="frontend/doctors/new_doctor";
			$this->load->view('template', $data);
		}
	}



	function _CreatePageThumbnail($filename, $dir,$w,$h) {
        $config['image_library']    = "gd2";      
        $config['source_image']     = $dir.$filename; 
		$config['new_image']		= $dir.'thumnail';
        $config['create_thumb']     = TRUE;      
        $config['maintain_ratio']   = TRUE;      
        $config['width'] = $w;      
        $config['height'] = $h;
        $this->load->library('image_lib',$config);
        if(!$this->image_lib->resize()):
            echo $this->image_lib->display_errors();
       	endif;   
    }
	
	
	////////////// Patient Part
	
	function pat_reg()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("index");
		$data['title']="Patient Registration | ENT Hospital";
		$data['symptom'] = $this->Index_model->getTable('symptom','symptom','asc');
		
		$data['main_content']="frontend/patient/registration";
		$this->load->view('template', $data);
	}
	
	
	function registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("index");
		$data['title']="Patient Registration | ENT Hospital";
		$data['symptom'] = $this->Index_model->getTable('symptom','symptom','asc');
			$this->form_validation->set_rules('hospital_number', 'Hospital Registration Number', 'trim|required|is_unique[registration.hos_reg_number]');
			$this->form_validation->set_rules('patient_id', 'Patient Id', 'trim|required|is_unique[registration.patient_id]');
			$this->form_validation->set_rules('regis_date', 'regis_date', 'trim|required');
			$this->form_validation->set_rules('patient_name', 'patient name', 'trim|required');
			
			if($this->form_validation->run() != false){
				
				$birthDate = date('Y-m-d',strtotime($this->input->post('dob')));
	$age = (date("dm", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("dm") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));
				  
				$createDate=date('Y-m-d',strtotime($this->input->post('regis_date')));
				
				if($this->session->userdata('userType')=='Doctor'){
					$save['doctorId']	    = $this->session->userdata('userAccessId');
				}
				$save['hos_reg_number']	    = $this->input->post('hospital_number');
				$save['patient_id']	    = $this->input->post('patient_id');
				$save['date_reg']	    = $createDate;
				$save['patient_name']	    = $this->input->post('patient_name');
				$save['phone']	    = $this->input->post('mobile');
				$save['gender']	    = $this->input->post('gender');
				$save['dob']		 = $this->input->post('dob');
				$save['age']		 = $age;
				$save['address']	    = $this->input->post('address');
				$save['symptom']	    = $this->input->post('selected_symptom');
				$sympId=$this->input->post('selected_symptom');
				
				$patientId=$this->input->post('patient_id');
				$this->Index_model->inertTable('registration', $save);
				$this->$sympId($patientId);
				/*elseif($sympId==2){	$this->chronicdiarrhea($patientId);}
				elseif($sympId==3){	$this->acutejaundice($patientId);}
				elseif($sympId==4){	$this->chronicjaundice($patientId);}
				elseif($sympId==5){	$this->neonatal_cholestasis($patientId);}
				elseif($sympId==6){	$this->abdominal_pain($patientId);}
				elseif($sympId==15){$this->uppergibleeding($patientId);}
				elseif($sympId==8){	$this->lowerbleeding($patientId);}
				elseif($sympId==9){	$this->storagedisease($patientId);}
				elseif($sympId==13){$this->pem($patientId);}
				elseif($sympId==12){$this->liverbiopsy($patientId);}
				elseif($sympId==10){$this->spaceoccupyinglesion($patientId);}
				elseif($sympId==11){$this->endoscopy_of_upper_git($patientId);}*/
				
				//$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully Registration</h2>');
				$patidDep = $sympId.'~'.$patientId;
				redirect('index/prescription/'.$patidDep, 'refresh');
			}
			else{
				$data['main_content']="frontend/patient/registration";
        		$this->load->view('template', $data);
			}
		
	}
	
	function prescription()
	{
		
		$patDep=$this->uri->segment(3);
		list($dept,$patientId)=explode('~',$patDep);
		$data['followId']=$this->uri->segment(4);
		$data['depart']=$dept;
		
		$data['title']="Prescription | ENT Hospital";
		$data['departinfo'] = $this->Index_model->getOneItemTable($dept,'patient_id',$patientId,'id','desc');
		$data['pinfo'] = $this->Index_model->getOneItemTable('registration','patient_id',$patientId,'id','desc');
		$data['drug_cate'] = $this->Index_model->getAllItemTable('drug_cata','','','','','cata_name','desc');
		$data['drug_list'] = $this->Index_model->getAllItemTable('drug','','','','','drug_name','desc');
		$data['duration_list'] = $this->Index_model->getAllItemTable('duration','','','','','duration','desc');
		$data['gap_list'] = $this->Index_model->getAllItemTable('day_gap','','','','','day_gap','desc');
		
		$data['main_content']="frontend/prescription/prescription";
		$this->load->view('template', $data);
	}
	
	
	public function searchajax(){

        //$this->load->view('frontend/search');
		$searchTerm = $this->input->get('term'); //$_GET['term'];
		$query = $this->db->query("SELECT * FROM drug WHERE drug_name LIKE '%".$searchTerm."%' ORDER BY drug_name ASC");
		foreach($query->result() as $row){
			$data[] = $row->drug_name;
		}
		echo json_encode($data);
	}
	
	
	public function prescription_ajax(){

        $this->load->view('frontend/prescription/prescription_sql');
	}
	public function prescripPrint(){

	    $patientId=$this->input->get('id');
		$data['presid']=$this->input->get('presid');
		$data['pinfo'] = $this->Index_model->getOneItemTable('registration','patient_id',$patientId,'id','desc');
        $this->load->view('frontend/prescription/prescriptionPrint',$data);
	}
	function ent($patientId)
	{
				$save['patient_id']	    = $patientId;
				//$save['presenting_complaints']	    = $this->input->post('presenting_complaints');
				
				//$checkBox = implode(',', $this->input->post('history_previous_illness'));
				//$save['history_previous_illness']	 = $checkBox;
				
				$save['cheif_complaints']	    = $this->input->post('cheif_complaints');
				$save['present_claim']	    = $this->input->post('present_claim');
				$save['past_claim']	    = $this->input->post('past_claim');
				$save['family_member']	    = $this->input->post('family_member');
				$save['family_ageofchildren']	    = $this->input->post('family_ageofchildren');
				$save['family_husjobandhealth']	    = $this->input->post('family_husjobandhealth');
				$save['family_otherrelenant_diseases']	    = $this->input->post('family_otherrelenant_diseases');
				$save['family_specify']	    = $this->input->post('family_specify');
				$save['drughistory_ocp']	    = $this->input->post('drughistory_ocp');
				$save['drughistory_drugs']	    = $this->input->post('drughistory_drugs');
				$save['ge_appearence']	    = $this->input->post('ge_appearence');
				$save['ge_pulse']	    = $this->input->post('ge_pulse');
				$save['ge_pallor']	    = $this->input->post('ge_pallor');
				//$array=join(',',$this->input->post('diagonosis'));
				//$save['diagonosis']	    = $array;
				$save['ge_characteristic']	    = $this->input->post('ge_characteristic');
				$save['ge_bp']	    = $this->input->post('ge_bp');
				$save['ge_jaundice']	    = $this->input->post('ge_jaundice');
				$save['ge_physical']	    = $this->input->post('ge_physical');
				$save['ge_resp']	    = $this->input->post('ge_resp');
				$save['ge_cyanosis']	    = $this->input->post('ge_cyanosis');
				$save['ge_nutritional']	    = $this->input->post('ge_nutritional');
				$save['ge_temp']	    = $this->input->post('ge_temp');
				$save['ge_nailchanges']	    = $this->input->post('ge_nailchanges');
				$save['ge_dehydration']	    = $this->input->post('ge_dehydration');
				$save['ge_thyroid']	    = $this->input->post('ge_thyroid');
				$save['ge_ht']	    = $this->input->post('ge_ht');
				$save['ge_wt']	    = $this->input->post('ge_wt');
				$save['ge_bmi']	    = $this->input->post('ge_bmi');
				$save['ge_jvp']	    = $this->input->post('ge_jvp');
				$save['ge_skin']	    = $this->input->post('ge_skin');
				$save['ge_varicose']	    = $this->input->post('ge_varicose');
				$save['ge_lnodes']	    = $this->input->post('ge_lnodes');
				$save['ge_oedema']	    = $this->input->post('ge_oedema');
				$save['local_exem']	    = $this->input->post('local_exem');
				$save['neurological_surgery']	    = $this->input->post('neurological_surgery');
				$save['cardiological_surgery']	    = $this->input->post('cardiological_surgery');
				$save['respritory_system']	    = $this->input->post('respritory_system');
				$save['others']	    = $this->input->post('others');
				$save['diagnosis']	    = $this->input->post('diagnosis');
				$save['invest_req']	    = $this->input->post('invest_req');
				$save['prelim_treat']	    = $this->input->post('prelim_treat');
				$save['advice_admission']	    = $this->input->post('advice_admission');
				$day=$this->input->post('next_followup_day');
				$weeks=$this->input->post('next_followup_weeks');
				$noneed=$this->input->post('next_followup_noneeded');
				if($noneed!=""){
					$nextfollowup=$noneed;
				}
				elseif($weeks!="" && $day==''){
					$nextfollowup=$weeks.' Weeks';
				}
				elseif($day!='' && $weeks==""){
					$nextfollowup=$day.' Days';
				}
				elseif($weeks!="" && $day!=''){
					$nextfollowup=$weeks.' Weeks, '.$day.' Days';
				}
				$save['next_followup_date']	    = $nextfollowup;
				
				
				$save['table_name']	    = 'ent';
				$save['date']	    = date('Y-m-d');
				$this->Index_model->inertTable('ent', $save);
				//redirect('index/prescription/'.$patientId, 'refresh');
				$patidDep = 'ent~'.$patientId;
				redirect('index/prescription/'.$patidDep, 'refresh');
	}
	
	
	
	public function symptom_details(){
		$sympId=$this->input->get('selectedSymptom');
		$data['symptomPage'] = $this->Index_model->getAllItemTable('symptom','pagename',$sympId,'','','sym_id','desc');
		
		foreach($data['symptomPage']->result() as $sympPage);
		$pagename = $sympPage->pagename;
		$data['page_title'] = $sympPage->symptom;
		echo '<h3 style="padding:0 0 10px 10px; margin:0">'.$sympPage->symptom.'</h3>';
		$data['sympid']=$sympId;
        $this->load->view('frontend/department_page/'.$pagename, $data);
	}
	
	
/////////////////////// Symptom ////////////////////////////////	 
	function department_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("index");
		$data['title']="Department List ENT Hospital | ENT Hospital";
		$data['symptom_list'] = $this->Index_model->getTable('symptom','symptom','asc');
		$data['main_content']="frontend/department/department_list";
        $this->load->view('template',$data);
	} 
	 
	 
	 
	function department_registration()
	{
		$data['title']="Department Registration | ENT Hospital";
		$symId=$this->uri->segment(3);
		$data['symptomUpdate'] = $this->Index_model->getAllItemTable('symptom','sym_id',$symId,'','','sym_id','desc');
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			$this->form_validation->set_rules('symptom', 'Symptome', 'trim|required');
			
			if($this->form_validation->run() != false){
				$symptomName=$this->input->post('symptom');
				$save['symptom']	= $symptomName;
				$save['details']	= $this->input->post('details');
				$save['date']	   = date('Y-m-d');
				$expval=explode(' ',$symptomName);
				$impval=implode('_',$expval);
				$save['pagename	']	   = strtolower($impval);
				
				
				if($this->input->post('sym_id')!=""){
					$sym_id=$this->input->post('sym_id');
					$this->Index_model->update_table('symptom','sym_id',$sym_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('symptom', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('index/department_list', 'refresh');
			}
			else{
				$data['main_content']="frontend/department/department_registration";
        		$this->load->view('template', $data);
				}
		}
		$data['main_content']="frontend/department/department_registration";
        $this->load->view('template', $data);
	}


/////////////////////// drug_category ////////////////////////////////	 
	function drug_category_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("index");
		$data['title']="Drug List ENT Hospital | ENT Hospital";
		$data['drug_category_list'] = $this->Index_model->getTable('drug_category','d_id','desc');
		$data['main_content']="frontend/drug/drug_category_list";
        $this->load->view('template',$data);
	} 
	 
	 
	 
	function drug_category_registration()
	{
		$data['title']="drug_category Registration | ENT Hospital";
		$symId=$this->uri->segment(3);
		$data['drug_categoryUpdate'] = $this->Index_model->getAllItemTable('drug_category','d_id',$symId,'','','d_id','desc');
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			$this->form_validation->set_rules('drug_category', 'drug_categorye', 'trim|required');
			
			if($this->form_validation->run() != false){
				$save['drug_category_name']	    = $this->input->post('drug_category');
				$save['date']	    = date('Y-m-d');
				
				if($this->input->post('d_id')!=""){
					$d_id=$this->input->post('d_id');
					$this->Index_model->update_table('drug_category','d_id',$d_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('drug_category', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('index/drug_category_list', 'refresh');
			}
			else{
				$data['main_content']="frontend/drug/drug_category_registration";
        		$this->load->view('template', $data);
				}
		}
		$data['main_content']="frontend/drug/drug_category_registration";
        $this->load->view('template', $data);
	}
	
	
	
/////////////////////// drug ////////////////////////////////	 
	function drug_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("index");
		$data['title']="Drug List ENT Hospital | ENT Hospital";
		$data['drug_list'] = $this->Index_model->getTable('drug','d_id','desc');
		$data['main_content']="frontend/drug/drug_list";
        $this->load->view('template',$data);
	} 
	 
	 
	 
	function drug_registration()
	{
		$data['category_list'] = $this->Index_model->getTable('drug_category','drug_category_name','asc');
		$data['title']="drug Registration | ENT Hospital";
		$symId=$this->uri->segment(3);
		$data['drugUpdate'] = $this->Index_model->getAllItemTable('drug','d_id',$symId,'','','d_id','desc');
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			$this->form_validation->set_rules('drug', 'druge', 'trim|required');
			$this->form_validation->set_rules('depert_id', 'Department', 'trim|required');
			
			if($this->form_validation->run() != false){
				$save['drug_name']	    = $this->input->post('drug');
				$save['genericname']	    = $this->input->post('genericname');
				$save['depert_id']	    = $this->input->post('depert_id');
				$save['details']	    	= $this->input->post('details');
				$save['date']	    = date('Y-m-d');
				
				if($this->input->post('d_id')!=""){
					$d_id=$this->input->post('d_id');
					$this->Index_model->update_table('drug','d_id',$d_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('drug', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('index/drug_list', 'refresh');
			}
			else{
				$data['main_content']="frontend/drug/drug_registration";
        		$this->load->view('template', $data);
				}
		}
		$data['main_content']="frontend/drug/drug_registration";
        $this->load->view('template', $data);
	}
	
	
	
	function patient_details()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("index");
		$pid=$this->uri->segment(3);
		$data['title']="ENT Hospital | ENT Hospital";
		$data['patient_info'] = $this->Index_model->getAllItemTable('registration','id',$pid,'','','id','desc');
		$data['main_content']="frontend/patient/patient_details";
       	$this->load->view('template',$data);
	}

	public function patientsymptom_details(){
		$symptable=$this->input->get('selectedSymptom');
		$patient_id=$this->input->get('patient_id');
		$data['departdata'] = $this->Index_model->getAllItemTable($symptable,'patient_id',$patient_id,'','','id','desc');
        $this->load->view('frontend/departmentDetails/'.$symptable, $data);
	}
	
	public function deprt_detailsPrint(){
		$symptable=$this->input->get('selectedSymptom');
		$patient_id=$this->input->get('patient_id');
		$data['departdata'] = $this->Index_model->getAllItemTable($symptable,'patient_id',$patient_id,'','','id','desc');
        $this->load->view('frontend/departmentDetails/print/'.$symptable, $data);
	}
	
	
	
	/////////////////////// Account part ////////////////////////////////	 
	function asset_investment_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("index");
		$data['title']="asset_investment List | Wellshopbd";
		$data['asset_investment_list'] = $this->Index_model->getTable('asset_investment','par_id','desc');
		$data['main_content']="frontend/asset_investment/asset_investment_list";
        $this->load->view('template',$data);
	} 
	 
 	
	function asset_investment_registration()
	{
		
		$artiId=$this->uri->segment(3);
		$data['asset_investmentUpdate'] = $this->Index_model->getAllItemTable('asset_investment','par_id',$artiId,'','','par_id','desc');
		$data['root_asset_investment'] = $this->Index_model->getAllItemTable('asset_investment','','','','','asset_investment_name','asc');
		$data['title']="asset_investment Registration | Wellshopbd";
		$this->form_validation->set_rules('asset_investment_name', 'asset_investment name', 'trim|required');
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			if($this->form_validation->run() != false){
			$expval=explode(' ',$this->input->post('asset_investment_name'));
			$impval=implode('-',$expval);
				$save['asset_investment_name']	    = addslashes($this->input->post('asset_investment_name'));
				$save['subimition_date']	    = date('Y-m-d');
				
				if($this->input->post('par_id')!=""){
					$par_id=$this->input->post('par_id');
					$this->Index_model->update_table('asset_investment','par_id',$par_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('asset_investment', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('index/asset_investment_list', 'refresh');
			}
			else{
				$data['main_content']="frontend/asset_investment/asset_investment_action";
        		$this->load->view('template', $data);
				}
		}
		$data['main_content']="frontend/asset_investment/asset_investment_action";
        $this->load->view('template', $data);
	}
	
	
	
	///////////////////////internal_cost ////////////////////////////////	 
	function internal_cost_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("index");
		$data['title']="internal_cost List | Wellshopbd";
		$data['payment_list'] = $this->Index_model->getTable('internal_cost','pay_id','desc');
		$data['main_content']="frontend/internal_cost/payment_list";
        $this->load->view('template',$data);
	} 
	 
	 
	 
	function internal_cost_registration()
	{
		
		$artiId=$this->uri->segment(3);
		if(!$artiId){
			$data['title']="payment Registration | Wellshopbd";
		}
		else{
			$data['title']="payment Update | Wellshopbd";
		}
		$data['paymentUpdate'] = $this->Index_model->getAllItemTable('internal_cost','pay_id',$artiId,'','','pay_id','desc');
		if($this->input->post('registration') && $this->input->post('registration')!=""){
				
				$digits = 4;
				 $serial = rand(pow(10, $digits-1), pow(10, $digits)-1);
				 
				if($this->input->post('registration')){
					$assetinvest = $this->input->post('assetinvest');
					$serial_no = $serial;
					$amount = $this->input->post('investamount');
					$pay_date = $this->input->post('pay_date');
					$amount_in_word = $this->input->post('amount_in_word');
					$cost_by = $this->input->post('cost_by');
					$dateconv=date('Y-m-d',strtotime($pay_date));
				}
				else{
					$assetinvest=$this->session->userdata('assetinvest');
					$serial_no=$this->session->userdata('serial_no');
					$amount=$this->session->userdata('investamount');
					$amount_in_word=$this->session->userdata('amount_in_word');
					$cost_by=$this->session->userdata('cost_by');
					$dateconv=$this->session->userdata('pay_date');
				}
					$sessionSearchdata = array(
								  'assetinvest' => $assetinvest,
								  'cost_by' => $cost_by,
								  'serial_no' => $serial_no,
								  'amount_in_word' => $amount_in_word,
								  'investamount' => $amount,
								  'pay_date' => $dateconv,
							 );
				$this->session->set_userdata($sessionSearchdata);

				$save['amount_in_word']	    = $amount_in_word;
				$save['cost_by']	    = $cost_by;
				$save['serial_no']	    = $serial_no;
				$save['paymentfor']	    = $assetinvest;
				$save['total_amount']	    = $amount;
				$save['payment_date']	    = $dateconv;
				
				if($this->input->post('pay_id')!=""){
					$pay_id=$this->input->post('pay_id');
					$this->Index_model->update_table('internal_cost','pay_id',$pay_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('internal_cost', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('index/internal_cost_print', 'refresh');
		}
		else{
		  $data['main_content']="frontend/internal_cost/payment_action";
		  $this->load->view('template', $data);
		  }
	}
	
	
	
	function internal_cost_print()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("index");
				
		$printsegment=$this->uri->segment(3);
		$data['cost_by']=$this->session->userdata('cost_by');
		$data['amount_in_word']=$this->session->userdata('amount_in_word');
		$data['serial_no']=$this->session->userdata('serial_no');
		$data['paymentfor']=$this->session->userdata('assetinvest');
		$data['amount'] = $this->session->userdata('investamount');
		$data['pay_date'] =  $this->session->userdata('pay_date');
		
		$data['title']="Payment Print | Wellshopbd";
		if(!$printsegment){
			$data['main_content']="frontend/internal_cost/payment_print";
			$this->load->view('template',$data);
		}
		elseif($printsegment=='print'){
			$this->load->view('frontend/internal_cost/payment_print_form',$data);
		}
	} 
	
	
	
	
	///////////  Reports Information ///////////////////////
	function today_reports()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("index");
		$printsegment=$this->uri->segment(3);
		$data['title']="Today Reports | Wellshopbd";
		if(!$printsegment){
			$data['main_content']='frontend/reports/todayReports';
			$this->load->view('template',$data);
		}
		elseif($printsegment=='print'){
			$this->load->view('frontend/reports/todayReportsPrint',$data);
		}
	} 
	
	function datewise_reports()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("index");
		$printsegment=$this->uri->segment(3);
		$data['title']="Date Wise Reports| Wellshopbd";
		if(!$printsegment){
			$data['main_content']='frontend/reports/dateWiseReports';
			$this->load->view('template',$data);
		}
		elseif($printsegment=='print'){
			$this->load->view('frontend/reports/dateWiseReportsPrint',$data);
		}
	} 
	
	function datewise_reports_ajax()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("index");
		$fromdate=date('Y-m-d',strtotime($this->input->get('fdate')));
	    $todate=date('Y-m-d',strtotime($this->input->get('tdate')));
		$sessiondata = array(
						'toDate'=>$fromdate,
						'fromDate'=> $todate
					   );
		$this->session->set_userdata($sessiondata);
		$data['fromdate']=$this->session->userdata('fromDate');
		$data['todate']=$this->session->userdata('toDate');
		$this->load->view('frontend/reports/dateWiseReportAjax',$data);
	} 
	
	
	function patient_history()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("index");
		$printsegment=$this->uri->segment(3);
		$detailsid=$this->uri->segment(4);
		$data['title']="Patient History Reports| ENT Hospital";
		if(!$printsegment){
			$data['main_content']='frontend/reports/patientHistory';
			$this->load->view('template',$data);
		}
		elseif($printsegment=='details'){
			$data['queryReports'] = $this->Index_model->getAllItemTable('registration','id',$detailsid,'','','id','desc');
			$data['main_content']='frontend/reports/patientDetails';
			$this->load->view('template',$data);
		}
		elseif($printsegment=='details_print'){
			$data['queryReports'] = $this->Index_model->getAllItemTable('registration','id',$detailsid,'','','id','desc');
			$this->load->view('frontend/reports/patientHistoryPrint',$data);
		}
		elseif($printsegment=='print'){
			$data['fromdate']=$this->session->userdata('fromDate');
			$data['todate']=$this->session->userdata('toDate');
			$data['keyword']=$this->session->userdata('keyword');
			$data['dataval']=$this->session->userdata('dataval');
			$this->load->view('frontend/reports/patient_list_Print',$data);
		}
	} 
	
	
	function patient_history_ajax()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("index");
		$fromdate=date('Y-m-d',strtotime($this->input->get('fdate')));
	    $todate=date('Y-m-d',strtotime($this->input->get('tdate')));

		$sessiondata = array(
						'fromDate'=>$fromdate,
						'toDate'=> $todate,
						'keyword'=> $this->input->get('key'),
						'dataval'=> $this->input->get('dval')
					   );
		$this->session->set_userdata($sessiondata);
		$data['fromdate']=$this->session->userdata('fromDate');
		$data['todate']=$this->session->userdata('toDate');
		$data['keyword']=$this->session->userdata('keyword');
		$data['dataval']=$this->session->userdata('dataval');
			
			
		$this->load->view('frontend/reports/patientHistoryAjax',$data);
	} 
	
	
	
	
	
	function prescription_history()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("index");
		$printsegment=$this->uri->segment(3);
		$detailsid=$this->uri->segment(4);
		$data['title']="Patient History Reports| ENT Hospital";
		if(!$printsegment){
			$data['main_content']='frontend/reports/prescriptionReports';
			$this->load->view('template',$data);
		}
		elseif($printsegment=='details'){
			list($prid,$patid)=explode('_',$detailsid);
			$data['presid']=$prid;
			$data['queryReports'] = $this->Index_model->getAllItemTable('prescription','pr_id',$prid,'patient_id',$patid,'id','desc');
			$data['main_content']='frontend/reports/prescriptionDetails';
			$this->load->view('template',$data);
		}
		elseif($printsegment=='print'){
			list($prid,$patid)=explode('_',$detailsid);
			$data['queryReports'] = $this->Index_model->getAllItemTable('prescription','pr_id',$prid,'patient_id',$patid,'id','desc');
			$this->load->view('frontend/reports/prescriptionReportsPrint',$data);
		}
	} 
	
	
	function prescription_history_ajax()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("index");
		$fromdate=date('Y-m-d',strtotime($this->input->get('fdate')));
	    $todate=date('Y-m-d',strtotime($this->input->get('tdate')));

		$sessiondata = array(
						'fromDate'=>$fromdate,
						'toDate'=> $todate,
						'keyword'=> $this->input->get('key'),
						'dataval'=> $this->input->get('dval')
					   );
		$this->session->set_userdata($sessiondata);
		$data['fromdate']=$this->session->userdata('fromDate');
		$data['todate']=$this->session->userdata('toDate');
		$data['keyword']=$this->session->userdata('keyword');
		$data['dataval']=$this->session->userdata('dataval');
			
			
		$this->load->view('frontend/reports/prescriptionReportsAjax',$data);
	} 
	
	
	
	function cleareCachDate()
	{
		$sessiondata = array(
						'toDate'=>'',
						'fromDate'=> ''
					   );
		$this->session->set_userdata($sessiondata);
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	} 
	
	
	
		
///////////  All  Delete///////////////////////
public function deleteData($tableName,$colId){
		$cID = $this->input->get('deleteId');
		$this->Index_model->deletetable_row($tableName, $colId, $cID);
	}

}

?>