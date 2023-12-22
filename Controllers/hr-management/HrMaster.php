<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('display_errors', 1);
error_reporting(E_ALL); 
//include_once(APPPATH."third_party/PhpWord/Autoloader.php");
ob_start();// this is required to session start error in the server version only;
defined('BASEPATH') OR exit('No direct script access allowed');


use PhpOffice\PhpWord\Autoloader;
use PhpOffice\PhpWord\Settings;

class HRMaster extends CI_Controller {


	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model("hr-management/HrModel");
		$this->load->model("hr-management/HrMenuModel");
    }
	
// 	public function index()
// 	{
//         $company_id = 1;
// 		$_SESSION['user_id'] = 1;
//         $_SESSION['company_id_in_hr'] = $company_id;
       
        
// 		$this->load->view('hr-management/index');
		
// 	}
		public function index()
	{
        $company_id                      = 91;
		   $_SESSION['user_id']             = 1;
        $_SESSION['company_id_in_hr']    = $company_id;
        $user_role_id                    = $_SESSION['USER_ROLE_ID'];
        $data                            = $this->get_menu_list($user_role_id);

		$this->load->view('hr-management/index',$data);
		
	}

    
	public function company($sub_menu_id="")
	{
		$data = array();
        $company_id_in_hr = $this->session->userdata('company_id_in_hr');
        $user_role_id                    = $_SESSION['USER_ROLE_ID'];

        $data                          =$this->get_menu_list($user_role_id);
        $data2["tab"]                  =$this->HrMenuModel->get_sub_menu_tab_permission($sub_menu_id,$user_role_id);
       
		$data["states"]    = $this->HrModel->get_states();
		$data["country"]   = $this->HrModel->get_country();
        $data["branches"]  = $this->HrModel->get_branches($company_id_in_hr);
        $data 			   = (object) array_merge((array) $data,(array) $data2);

		$this->load->view('hr-management/company',$data);
	}




// public function save_company_details()
// {

//     $companyData = array(
//         'company_name' => $this->input->post('company_name'),
//         'company_profile' => $this->input->post('company_profile'),
//         'created_by' => $_SESSION['user_id'],
//         'created_on' => date('Y-m-d H:i:s'),
//     );

//     $flag_id=$_POST['flag_id'];
   

//     if ($flag_id === "0") {

//         $this->db->insert('hr_company_master', $companyData);
//         $company_id_in_hr = $this->db->insert_id();
//         $_SESSION['company_id_in_hr'] = $company_id_in_hr;
//     } 
//     elseif ($flag_id === "1") {
       
//         $row_id = $this->input->post('row_id');
//         $companyData['modified_by'] = $_SESSION['user_id'];
//         $companyData['modified_on'] = date('Y-m-d H:i:s');
//         $this->db->where('company_id', $row_id);
//         $this->db->update('hr_company_master', $companyData);
//     }

//     $branchData = array(
//         'company_id' => $_SESSION['company_id_in_hr'], 
//         // 'branch_name' => $this->input->post('branch_name'),
//         'branch_name' => 'MainBranch',
//         'address_line1' => $this->input->post('address_line1'),
//         'address_line2' => $this->input->post('address_line2'),
//         'address_line3' => $this->input->post('address_line3'),
//         'address_line4' => $this->input->post('address_line4'),
//         'country_id' => $this->input->post('country_id'),
//         'state_province_id' => $this->input->post('state_province_id'),
//         'branch_head_id' => $this->input->post('branch_head_id'),
//         'created_by' => $_SESSION['user_id'],
//         'created_on' => date('Y-m-d H:i:s'),
//     );
//     if ($flag_id === "0") {
//         $this->db->insert('hr_branches', $branchData);
//     } elseif ($flag_id === "1") {
//         $row_id = $this->input->post('row_id');
//         $branchData['modified_by'] = $_SESSION['user_id'];
//         $branchData['modified_on'] = date('Y-m-d H:i:s');
//         $branchRow = $this->db->get_where('hr_branches', ['company_id' => $row_id])->row();
        
//         if ($branchRow) {
    
//             $this->db->where('company_id', $row_id);
//             $this->db->update('hr_branches', $branchData);
           

//         } else {
   
//             echo 'Row does not exist in hr_branches.';
//         }
        
//     }
    
//     $response = array(
//         'success' => true,
//         'message' => 'Saved successfully.'
//     );
//     echo json_encode($response);
// }

public function save_company_details()
{
    $flag_id=$_POST['flag_id'];

    $companyData = array(
        'company_name' => $this->input->post('company_name'),
        'company_profile' => $this->input->post('company_profile'),
        'created_by' => $_SESSION['user_id'],
        'created_on' => date('Y-m-d H:i:s'),
    );

    $branchData = array(
        'company_id' => $_SESSION['company_id_in_hr'], 
        'branch_name' => 'MainBranch',
        'address_line1' => $this->input->post('address_line1'),
        'address_line2' => $this->input->post('address_line2'),
        'address_line3' => $this->input->post('address_line3'),
        'address_line4' => $this->input->post('address_line4'),
        'country_id' => $this->input->post('country_id'),
        'state_province_id' => $this->input->post('state_province_id'),
        'branch_head_id' => $this->input->post('branch_head_id'),
        'created_by' => $_SESSION['user_id'],
        'created_on' => date('Y-m-d H:i:s'),
    );

    if ($flag_id === "0") {
        $companyData['created_by'] = $_SESSION['user_id'];
        $companyData['created_on'] = date('Y-m-d H:i:s');
        $this->db->insert('hr_company_master', $companyData);
        $company_id_in_hr = $this->db->insert_id();
        $_SESSION['company_id_in_hr'] = $company_id_in_hr;
        $branchData['company_id'] = $company_id_in_hr;
        $this->db->insert('hr_branches', $branchData);
    } 

    elseif ($flag_id === "1") {
        $row_id = $this->input->post('row_id');
        $companyData['modified_by'] = $_SESSION['user_id'];
        $companyData['modified_on'] = date('Y-m-d H:i:s');
        $this->HrModel->update_company_details($row_id,$companyData);
        $branch_id = $this->input->post('branch_id_hidden_field');
        $this->HrModel->update_branch_details($branch_id,$branchData);
        
    }
   
    $response = array(
        'success' => true,
        'message' => 'Saved successfully.'
    );
    echo json_encode($response);
}



    //job detailes created by mashu
	public function job_details($sub_menu_id="")
	{
		$data = array();
		$user_role_id                    = $_SESSION['USER_ROLE_ID'];

        $data                          =$this->get_menu_list($user_role_id);
        $data["tab"]                  =$this->HrMenuModel->get_sub_menu_tab_permission($sub_menu_id,$user_role_id);
       
		$this->load->view('hr-management/job_details_setup',$data);
	}
    
    
    public function projects()
    {
        
        $data = array();
        $data["project_status"]  = $this->HrModel->get_project_status();
		$this->load->view('hr-management/projects',$data);
    }
 //./job detailes created by mashu









//  ==created by aparna
public function get_compamny_structure_details()
{
    $data = $this->HrModel->get_compamny_structure_details();
    echo json_encode(['data' => $data]);
}



public function save_department_details()
{
    $company_id_in_hr = $this->session->userdata('company_id_in_hr');
    $departmentData = array(
        'company_id' => $company_id_in_hr,
        'branch_id'  => $this->input->post('branch_id'),
        'department_name' => $this->input->post('department_name'),
        'created_by' => $_SESSION['user_id'],
        'created_on' => date('Y-m-d H:i:s'),
    );

    $flag_id=$_POST['flag_id'];
    if ($flag_id === "0") {
        $this->db->insert('hr_departments', $departmentData);
        $department_id = $this->db->insert_id();
        $_SESSION['department_id'] = $department_id;
     } 
     elseif ($flag_id === "1") {
            
        $row_id = $this->input->post('row_id'); 
        $departmentData['modified_by'] = $_SESSION['user_id'];
        $departmentData['modified_on'] = date('Y-m-d H:i:s');
        $res = $this->HrModel->update_department_creation($row_id,$departmentData);
       
    }  

     
    $response = array(
        'success' => true,
        'message' => 'Saved successfully.'
    );

    // Send the JSON response
    echo json_encode($response);
}

public function get_department_details() {
    $company_id_in_hr = $this->session->userdata('company_id_in_hr');
    
    $departments = $this->HrModel->get_department_details($company_id_in_hr); 

    $response = array(
        "data" => $departments
    );

    echo json_encode($response);
}

public function get_department_by_id()
{
    $id = $this->input->get('id'); 

    $department = $this->HrModel->get_department_by_id($id);

    $response = array(
        'department_name' => $department->department_name
    );

    echo json_encode($response);
}

public function delete_department_by_id()
{
    $id  = $this->input->post('id');
    $result = $this->HrModel->delete_department_by_id($id);

    if ($result) {
        $response = ['success' => true, 'message' => 'Deleted successfully'];
    } else {
        $response = ['success' => false, 'message' => 'Failed to mark item as deleted'];
    }

    echo json_encode($response);
}


public function get_department_details_by_id()
{
    $id = $this->input->post('id');
    $result = $this->HrModel->get_department_details_by_id($id);

    if ($result) {
        $response = [
            'success' => true,
            'data' => $result
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Not found'
        ];
    }

    echo json_encode($response);
}


public function get_company_details_by_id()
{
    $row_id = $this->input->get('row_id');
    
    $branch_id = $this->input->get('branch_id');
   
    $result = $this->HrModel->get_company_details_by_id($row_id,$branch_id);

    if ($result) {
        $response = [
            'success' => true,
            'data' => $result
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Not found'
        ];
    }

    echo json_encode($response);
}



public function delete_company_by_id()
{
    $row_id = $this->input->post('row_id');
    $branch_id = $this->input->post('branch_id');
    $result = $this->HrModel->delete_company_by_id($row_id, $branch_id);
    
    if ($result) {
        $response = ['success' => true, 'message' => 'Company deleted successfully'];
    } else {
        $response = ['success' => false, 'message' => 'Failed to delete company'];
    }
    echo json_encode($response);
}


public function edit_company_by_id(){
    $row_id = $this->input->post('row_id');
    $result = $this->HrModel->edit_company_by_id($row_id);

    if ($result) {
        $response = [
            'success' => true,
            'data' => $result
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Not found'
        ];
    }

    echo json_encode($response);
}


public function save_address_details()
{
   
    $company_id_in_hr = $this->session->userdata('company_id_in_hr');
   
    $flag_id=$_POST['flag_id'];


    $data = array(
        'company_id' => $company_id_in_hr,
        'branch_name' => $this->input->post('branch_name'),
        'address_line1' => $this->input->post('address_line1'),
        'address_line2' => $this->input->post('address_line2'),
        'address_line3' => $this->input->post('address_line3'),
        'address_line4' => $this->input->post('address_line4'),
        'is_branch'     => 'yes',
        'country_id' => $this->input->post('country_id'),
        'state_province_id' => $this->input->post('state_province_id'),
        'branch_head_id' => $this->input->post('branch_head_id'),
        'created_by' => $_SESSION['user_id'],
        'created_on' => date('Y-m-d H:i:s'),

    );
    if ($flag_id === "0") {
        $this->db->insert('hr_branches', $data);
    } 

    if ($flag_id === "1") {
        $row_id = $this->input->post('row_id');
        $data['modified_by'] = $_SESSION['user_id'];
        $data['modified_on'] = date('Y-m-d H:i:s');
        $this->db->where('id', $row_id);
        $this->db->update('hr_branches', $data);
    }
  
    $response = array(
        'success' => true,
        'message' => 'Saved successfully.'
    );

    // Send the JSON response
    echo json_encode($response);
}


public function get_address_details() {
    $company_id_in_hr = $this->session->userdata('company_id_in_hr');
    $address = $this->HrModel->get_address_details( $company_id_in_hr); 

    $response = array(
        "data" => $address
    );

    echo json_encode($response);
}

public function get_address_details_by_id()
{
    $row_id = $this->input->post('row_id');
    $result = $this->HrModel->get_address_details_by_id($row_id);

    if ($result) {
        $response = [
            'success' => true,
            'data' => $result
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Not found'
        ];
    }

    echo json_encode($response);
}

public function delete_address_by_id()
{
     $id  = $this->input->post('row_id');
     $res = $this->HrModel->delete_address_by_id($id);

    $response = ['success' => true, 'message' => 'Deleted successfully'];
    echo json_encode($response);
}


public function qualification(){
    $data                   =array();
    $user_role_id           = $_SESSION['USER_ROLE_ID'];

    $data                   =$this->get_menu_list($user_role_id);
    $data["tab"]            =$this->HrMenuModel->get_sub_menu_tab_permission($sub_menu_id,$user_role_id);
    
    $this->load->view('hr-management/qualification',$data);
}

public function save_skills_details()
{

    $data = array(
      
        'skill_name' => $this->input->post('skill_name'),
        'skill_description' => $this->input->post('skill_description'),
        
    );

    $flag_id=$_POST['flag_id'];
    if ($flag_id === "0") {
        $this->db->insert('hr_skills', $data);

     } 
     elseif ($flag_id === "1") {
            
        $row_id = $this->input->post('row_id'); 
        $res = $this->HrModel->update_skills($row_id,  $data);
       
    }  

     
    $response = array(
        'success' => true,
        'message' => 'Saved successfully.'
    );

    // Send the JSON response
    echo json_encode($response);
}



public function get_skills_details()
{
    $data = $this->HrModel->get_skills_details();
    echo json_encode(['data' => $data]);
}


public function get_skills_by_id()
{
  
    $row_id = $this->input->get('row_id'); 
   
//    echo "row id is".$row_id 
    $result = $this->HrModel->get_skills_by_id($row_id);

    if ($result) {
        $response = [

            'success' => true,
            'data' => $result
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Not found'
        ];
    }

    echo json_encode($response);
}

public function delete_skill_by_id()
{
    $row_id = $this->input->post('row_id');
    $result = $this->HrModel->delete_skill_by_id($row_id);

    if ($result) {
        $response = ['success' => true, 'message' => 'Deleted successfully'];
    } else {
        $response = ['success' => false, 'message' => 'Failed to mark item as deleted'];
    }

    echo json_encode($response);
}


public function save_education_details()
{
    $data = array(
        'education_name' => $this->input->post('education_name'),
        'education_description' => $this->input->post('education_description'),
    );

    $flag_id=$_POST['flag_id'];
    if ($flag_id === "0") {
        $this->db->insert('hr_education', $data);

     } 
     elseif ($flag_id === "1") {

        $row_id = $this->input->post('row_id'); 
        $res = $this->HrModel->update_education($row_id,  $data);
       
    }  

     
    $response = array(
        'success' => true,
        'message' => 'Saved successfully.'
    );

    // Send the JSON response
    echo json_encode($response);
}


public function get_education_details()
{
    $data = $this->HrModel->get_education_details();
    echo json_encode(['data' => $data]);
}


public function get_education_by_id()
{
  
    $row_id = $this->input->get('row_id'); 
   
//    echo "row id is".$row_id 
    $result = $this->HrModel->get_education_by_id($row_id);

    if ($result) {
        $response = [

            'success' => true,
            'data' => $result
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Not found'
        ];
    }

    echo json_encode($response);
}


public function delete_education_by_id()
{
    $row_id = $this->input->post('row_id');
    $result = $this->HrModel->delete_education_by_id($row_id);

    if ($result) {
        $response = ['success' => true, 'message' => 'Deleted successfully'];
    } else {
        $response = ['success' => false, 'message' => 'Failed to mark item as deleted'];
    }

    echo json_encode($response);
}


public function save_certification_details()
{
    $data = array(
        'certification_name' => $this->input->post('certification_name'),
        'certification_description' => $this->input->post('certification_description'),
    );

    $flag_id=$_POST['flag_id'];
    if ($flag_id === "0") {
        $this->db->insert('hr_certifications', $data);

     } 
     elseif ($flag_id === "1") {

        $row_id = $this->input->post('row_id'); 
        
        $res = $this->HrModel->update_certification_in_company($row_id,  $data);
       
       
    }  

     
    $response = array(
        'success' => true,
        'message' => 'Saved successfully.'
    );

    // Send the JSON response
    echo json_encode($response);
}


public function get_certification_details()
{
    $data = $this->HrModel->get_certification_details();
    echo json_encode(['data' => $data]);
}


public function get_cerfification_by_id()
{
 
    $row_id = $this->input->get('row_id'); 

    $result = $this->HrModel->get_cerfification_by_id($row_id);

    if ($result) {
        $response = [

            'success' => true,
            'data' => $result
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Not found'
        ];
    }

    echo json_encode($response);
}



public function get_certification_by_id()
{
  
    $row_id = $this->input->get('row_id'); 
   
//    echo "row id is".$row_id 
    $result = $this->HrModel->get_certification_by_id($row_id);

    if ($result) {
        $response = [

            'success' => true,
            'data' => $result
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Not found'
        ];
    }

    echo json_encode($response);
}


public function delete_certification_by_id()
{
    $row_id = $this->input->post('row_id');
    $result = $this->HrModel->delete_certification_by_id($row_id);

    if ($result) {
        $response = ['success' => true, 'message' => 'Deleted successfully'];
    } else {
        $response = ['success' => false, 'message' => 'Failed to mark item as deleted'];
    }

    echo json_encode($response);
}


public function save_language_details()
{
    $data = array(
        'language_code' => $this->input->post('language_code'),
        'language_name' => $this->input->post('language_name'),
    );
    $flag_id=$_POST['flag_id'];
    if ($flag_id === "0") {
        $this->db->insert('hr_languages', $data);

     } 
     elseif ($flag_id === "1") {

        $row_id = $this->input->post('row_id'); 
        $res = $this->HrModel->update_hr_languages($row_id,  $data);
   
    }  
    $response = array(
        'success' => true,
        'message' => 'Saved successfully.'
    );
    // Send the JSON response
    echo json_encode($response);
}



public function get_language_details()
{
    $data = $this->HrModel->get_language_details();
    echo json_encode(['data' => $data]);
}


public function get_languages_by_id()
{
  
    $row_id = $this->input->get('row_id'); 
   
//    echo "row id is".$row_id 
    $result = $this->HrModel->get_languages_by_id($row_id);

    if ($result) {
        $response = [

            'success' => true,
            'data' => $result
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Not found'
        ];
    }

    echo json_encode($response);
}


public function delete_language_by_id()
{
    $row_id = $this->input->post('row_id');
    $result = $this->HrModel->delete_language_by_id($row_id);

    if ($result) {
        $response = ['success' => true, 'message' => 'Deleted successfully'];
    } else {
        $response = ['success' => false, 'message' => 'Failed to mark item as deleted'];
    }

    echo json_encode($response);
}


public function save_language_proficiency_details()
{
    $data = array(
        'language_proficiency' => $this->input->post('language_proficiency'),
      
    );

    $flag_id=$_POST['flag_id'];
    if ($flag_id === "0") {
        $this->db->insert('hr_language_proficiency', $data);

     } 
     elseif ($flag_id === "1") {

        $row_id = $this->input->post('row_id'); 
        $res = $this->HrModel->update_hr_languages_proficiency($row_id,  $data);
       
    }  

     
    $response = array(
        'success' => true,
        'message' => 'Saved successfully.'
    );

    // Send the JSON response
    echo json_encode($response);
}



public function get_language_proficiency_details()
{
    $data = $this->HrModel->get_language_proficiency_details();
    echo json_encode(['data' => $data]);
}


public function get_languages_proficiency_by_id()
{
  
    $row_id = $this->input->get('row_id'); 
   
//    echo "row id is".$row_id 
    $result = $this->HrModel->get_languages_proficiency_by_id($row_id);

    if ($result) {
        $response = [

            'success' => true,
            'data' => $result
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Not found'
        ];
    }

    echo json_encode($response);
}

//  ==created by aparna


public function delete_language_proficiency_by_id()
{
    $row_id = $this->input->post('row_id');
    $result = $this->HrModel->delete_language_proficiency_by_id($row_id);

    if ($result) {
        $response = ['success' => true, 'message' => 'Deleted successfully'];
    } else {
        $response = ['success' => false, 'message' => 'Failed to mark item as deleted'];
    }

    echo json_encode($response);
}





//created by mshu
// ----job title section 
        // --- for save the job title-----
        public function save_job_title()
        {
        
            $flag_id=(int)$this->input->post('flag_id');
        
            $data = array(
                    'job_code'        => $this->input->post('job_code'),
                    'job_title'       =>$this->input->post('job_title'),
                    'job_description' => $this->input->post('job_description'),
                  
                        
                );
            if ($flag_id == "0") {
            
            $res = $this->HrModel->insert_job_title($data);
            
            }

            elseif ($flag_id == "1") {// in edit 
               
            $row_id = $this->input->post('row_id'); 
            $res = $this->HrModel->update_job_title($data,$row_id);
            }
            if($res)
                {
                    $response = array(
                        'success' => true,
                        'message' => ' saved successfully.'
                    );
                }
                else
                {
                    $response = array(
                    'success' => false,
                    'message' => 'Error saving item. Please try again.'
                    );
                }
            
                echo json_encode($response);
            
        }
        // --- ./ for save the job title-----


        // ---- for getting all  data for data table ---
        public function get_job_title_details(){
            $data = $this->HrModel->get_job_title_details();
            echo json_encode(['data' => $data]);
        }
        // ---- ./ for getting all  data for data table ---


        // ---- for getting row data using id  ---
        public function get_job_title_by_id()
        {
            $row_id = $this->input->post('row_id');
            $result = $this->HrModel->get_job_title_by_id($row_id);

            if ($result) {
                $response = [
                    'success' => true,
                    'data' => $result
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Job title is  not found'
                ];
            }

            echo json_encode($response);
        }
         // ./ for getting row data using id  ---

     // ---- for deleting row data using id  ---
        public function delete_job_title_by_id()
        {
            $row_id  = $this->input->post('row_id');
            $res = $this->HrModel->delete_job_title_by_id($row_id);

            $response = ['success' => true, 'message' => 'deleted successfully'];
            echo json_encode($response);
        }
    // ---- for deleting row data using id  ---
// ----job title section 





// ---pay scale section
    // --- for save the job title-----
    public function save_pay_scales()
    {
        $company_id_in_hr = $this->session->userdata('company_id_in_hr');
        $flag_id=(int)$this->input->post('flag_id');
    
        $data = array(
            'company_id' => $company_id_in_hr,
            'created_by' =>$_SESSION['user_id'], 
            'pay_scale_name'  => $this->input->post('pay_scale_name'),
            'min_salary'       =>$this->input->post('min_salary'),
            'max_salary' => $this->input->post('max_salary'),    
             
        );
        if ($flag_id == "0") {
        
             $res = $this->HrModel->insert_pay_scales($data);
        
        }

        elseif ($flag_id == "1") {// in edit 
         $row_id = $this->input->post('row_id'); 
         $res = $this->HrModel->update_pay_scales($data,$row_id);
        }
        if($res)
            {
                $response = array(
                    'success' => true,
                    'message' => 'saved successfully.'
                );
            }
            else
            {
                $response = array(
                'success' => false,
                'message' => 'Error saving  item. Please try again.'
                );
            }
        
            echo json_encode($response);
        
    }
    // --- ./ for save the job title-----


      // ---- for getting all data from table    for data table loading ---
      public function get_pay_scales_details(){

        $company_id_in_hr = $this->session->userdata('company_id_in_hr');
        $data = $this->HrModel->get_pay_scales_details($company_id_in_hr);
        echo json_encode(['data' => $data]);
    }
    // ---- ./ for getting all  data for data table ---


    // ---- for getting pay scale row data using id  ---
    public function get_pay_scales_by_id()
    {
        $row_id = $this->input->post('row_id');
       
        $result = $this->HrModel->get_pay_scales_by_id($row_id);

        if ($result) {
            $response = [
                'success' => true,
                'data' => $result
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Job title is  not found'
            ];
        }

        echo json_encode($response);
    }
     // ./ for pay scale getting row data using id  ---


    // ---- for deleting row data using id from pay scales  ---
       public function delete_pay_scales_by_id()
       {
           $row_id  = $this->input->post('row_id');
           $res = $this->HrModel->delete_pay_scales_by_id($row_id);

           $response = ['success' => true, 'message' => ' deleted successfully'];
           echo json_encode($response);
       }
   // ---- for deleting row data using id  from pay scales---


// --- ./pay scale section





// ---pay employment status
    // --- for save the job title-----
    public function save_employment_status()
    {
       
        $flag_id=(int)$this->input->post('flag_id');
    
        $data = array(
         
            'employment_status' => $this->input->post('employment_status'),    
        );
        if ($flag_id == "0") {
        
             $res = $this->HrModel->insert_employment_status($data);
        
        }

        elseif ($flag_id == "1") {// in edit 
        $row_id = $this->input->post('row_id'); 
        $res = $this->HrModel->update_employment_status($data,$row_id);
        }
        if($res)
            {
                $response = array(
                    'success' => true,
                    'message' => 'saved successfully .'
                );
            }
            else
            {
                $response = array(
                'success' => false,
                'message' => 'Error saving item. Please try again.'
                );
            }
        
            echo json_encode($response);
        
    }
    // --- ./ for save the job title-----


     // ---- for getting employment status row data using id  ---
     public function get_employment_status_by_id()
     {
         $row_id = $this->input->post('row_id');
         $result = $this->HrModel->get_employment_status_by_id($row_id);
 
         if ($result) {
             $response = [
                 'success' => true,
                 'data' => $result
             ];
         } else {
             $response = [
                 'success' => false,
                 'message' => 'Employement is  not found'
             ];
         }
 
         echo json_encode($response);
     }
      // ./ for employment getting row data using id  ---

    
      // ---- for getting all data from table    for data table loading ---
      public function get_employment_status_details(){
        $data = $this->HrModel->get_employment_status_details();
        echo json_encode(['data' => $data]);
    }
    // ---- ./ for getting all  data for data table ---


    
    // ---- for deleting row data using id from employment status  ---
    public function delete_employment_status_by_id()
    {
        $row_id  = $this->input->post('row_id');
        $res = $this->HrModel->delete_employment_status_by_id($row_id);

        $response = ['success' => true, 'message' => ' deleted successfully'];
        echo json_encode($response);
    }
// ---- for deleting row data using id  from employment status---
// --- ./pay employement




 // ---- for getting all  data for data table ---
 public function get_projects_details(){
    $data = $this->HrModel->get_projects_details();
    echo json_encode(['data' => $data]);
}
// ---- ./ for getting all  data for data table ---

// --- for save the job title-----
public function save_projects()
{
   
    $flag_id=(int)$this->input->post('flag_id');
  
    $data = array(
     
        'project_name' => $this->input->post('project_name'),    
        'client_id' => $this->input->post('client_id'),    
        'start_date' => $this->input->post('start_date'),    
        'end_date' => $this->input->post('end_date'),    
        'project_status_id' => $this->input->post('project_status_id'),    
        'estimated_cost' => $this->input->post('estimated_cost'),    
        'branch_id' => "1", 
        'company_id'  =>"1",
        'created_by' =>$_SESSION['user_id'],    
    );
    if ($flag_id == "0") {
    
         $res = $this->HrModel->insert_projects($data);
    
    }

    elseif ($flag_id == "1") {// in edit 
    $row_id = $this->input->post('row_id'); 
    $res = $this->HrModel->update_projects($data,$row_id);
    }
    if($res)
        {
            $response = array(
                'success' => true,
                'message' => 'saved successfully .'
            );
        }
        else
        {
            $response = array(
            'success' => false,
            'message' => 'Error saving item. Please try again.'
            );
        }
    
        echo json_encode($response);
    
}
// --- ./ for save the job title-----

    // ---- for getting employment status row data using id  ---
    public function get_project_by_id()
    {
        $row_id = $this->input->post('row_id');
        $result = $this->HrModel->get_project_by_id($row_id);

        if ($result) {
            $response = [
                'success' => true,
                'data' => $result
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'item  is  not found'
            ];
        }

        echo json_encode($response);
    }
    


      public function delete_projects_by_id()
      {
          $row_id  = $this->input->post('row_id');
          $res = $this->HrModel->delete_projects_by_id($row_id);
  
          $response = ['success' => true, 'message' => ' deleted successfully'];
          echo json_encode($response);
      }

      public function record_status($sub_menu_id="")
      {
            $data                   =array();
            $user_role_id           = $_SESSION['USER_ROLE_ID'];

            $data                   =$this->get_menu_list($user_role_id);
            $data["tab"]           =$this->HrMenuModel->get_sub_menu_tab_permission($sub_menu_id,$user_role_id);
       
          $this->load->view('hr-management/record_status',$data);
      }

  
      public function get_travel_request_status()
        {
            $data = $this->HrModel->get_travel_request_status();
            echo json_encode(['data' => $data]);
        }
        
      
        public function get_loan_request_status()
            {
                $data = $this->HrModel->get_loan_request_status();
                echo json_encode(['data' => $data]);
            }

            
            
            public function get_loan_status()
                {
                    $data = $this->HrModel->get_loan_status();
                    echo json_encode(['data' => $data]);
                }
      
  
                
                public function get_leave_request_status()
                {
                    $data = $this->HrModel->get_leave_request_status();
                    echo json_encode(['data' => $data]);
                }
                
                public function get_marital_status_status()
                {
                    $data = $this->HrModel->get_marital_status_status();
                    echo json_encode(['data' => $data]);
                }
      
                
                public function get_relation()
                {
                    $data = $this->HrModel->get_relation();
                    echo json_encode(['data' => $data]);
                }
                
                public function get_gender()
                {
                    $data = $this->HrModel->get_gender();
                    echo json_encode(['data' => $data]);
                }

                public function setup_data($sub_menu_id=""){
                    $data = array();
                    $user_role_id                    = $_SESSION['USER_ROLE_ID'];

                    $data                          =$this->get_menu_list($user_role_id);
                    $data["tab"]                  =$this->HrMenuModel->get_sub_menu_tab_permission($sub_menu_id,$user_role_id);
                    
                    $this->load->view('hr-management/setup_data',$data);
                }
                
                public function get_transportation_means()
                {
                    $data = $this->HrModel->get_transportation_means();
                   
                    echo json_encode(['data' => $data]);
                }
                
               
                public function save_transportation_details()
                {
                    $data = array(
                    
                        'transportaion_means' => $this->input->post('transportaion_means'),
                       
                    );

                    $flag_id=$_POST['flag_id'];
                    if ($flag_id === "0") {
                        $this->db->insert('hr_travel_transportaion_means', $data);

                    } 
                    elseif ($flag_id === "1") {
                            
                        $row_id = $this->input->post('row_id'); 
                        $res = $this->HrModel->update_transportaion($row_id,  $data);
                    
                    }  

                    
                    $response = array(
                        'success' => true,
                        'message' => 'Saved successfully.'
                    );

                    // Send the JSON response
                    echo json_encode($response);
                }
             
           
                public function get_transportation_by_id()
                {
                
                    $row_id = $this->input->get('row_id'); 
                
               
                    $result = $this->HrModel->get_transportation_by_id($row_id);

                    if ($result) {
                        $response = [

                            'success' => true,
                            'data' => $result
                        ];
                    } else {
                        $response = [
                            'success' => false,
                            'message' => 'Not found'
                        ];
                    }

                    echo json_encode($response);
                }

              
        public function delete_transportation_by_id()
        {
            $row_id = $this->input->post('row_id');
            $result = $this->HrModel->delete_transportation_by_id($row_id);

            if ($result) {
                $response = ['success' => true, 'message' => 'Deleted successfully'];
            } else {
                $response = ['success' => false, 'message' => 'Failed to mark item as deleted'];
            }

            echo json_encode($response);
        }
      
        public function get_leave_category_details()
        {
            $data = $this->HrModel->get_leave_category_details();
           
            echo json_encode(['data' => $data]);
        }


                public function save_leave_category_details()
                {
                    $data = array(
                    
                        'leave_category' => $this->input->post('leave_category'),
                       
                    );

                    $flag_id=$_POST['flag_id'];
                    if ($flag_id === "0") {
                        $this->db->insert('hr_leave_category', $data);

                    } 
                    elseif ($flag_id === "1") {
                            
                        $row_id = $this->input->post('row_id'); 
                        $res = $this->HrModel->update_leave_category($row_id,  $data);
                    
                    }  

                    
                    $response = array(
                        'success' => true,
                        'message' => 'Saved successfully.'
                    );

                    // Send the JSON response
                    echo json_encode($response);
                }

                public function get_branch_details() {
                    $company_id_in_hr = $this->session->userdata('company_id_in_hr');
                    $branchDetails = $this->HrModel->get_branch_details($company_id_in_hr); 
                    header('Content-Type: application/json');
                    echo json_encode($branchDetails);
                }
                
               
                public function get_leave_category_by_id()
                {
                
                    $row_id = $this->input->get('row_id'); 
                
               
                    $result = $this->HrModel->get_leave_category_by_id($row_id);

                    if ($result) {
                        $response = [

                            'success' => true,
                            'data' => $result
                        ];
                    } else {
                        $response = [
                            'success' => false,
                            'message' => 'Not found'
                        ];
                    }

                    echo json_encode($response);
                }

                

                public function delete_leave_category_by_id()
                {
                    $row_id = $this->input->post('row_id');
                    $result = $this->HrModel->delete_leave_category_by_id($row_id);
        
                    if ($result) {
                        $response = ['success' => true, 'message' => 'Deleted successfully'];
                    } else {
                        $response = ['success' => false, 'message' => 'Failed to mark item as deleted'];
                    }
        
                    echo json_encode($response);
                }

               
                public function get_loan_details()
                {
                    $data = $this->HrModel->get_loan_details_internal();
                    echo json_encode(['data' => $data]);
                }
                
               
                public function save_loan_type_details()
                {
                    $data = array(
                    
                        'loan_types' => $this->input->post('loan_types'),
                        'loan_description' => $this->input->post('loan_description'),
                       
                    );

                    $flag_id=$_POST['flag_id'];
                    if ($flag_id === "0") {
                        $this->db->insert('hr_loan_types', $data);

                    } 
                    elseif ($flag_id === "1") {
                            
                        $row_id = $this->input->post('row_id'); 
                        $res = $this->HrModel->update_loan_type($row_id,  $data);
                    
                    }  

                    
                    $response = array(
                        'success' => true,
                        'message' => 'Saved successfully.'
                    );

                    // Send the JSON response
                    echo json_encode($response);
                }
            


                
                public function get_loan_type_by_id()
                {
                
                    $row_id = $this->input->get('row_id'); 
                
               
                    $result = $this->HrModel->get_loan_type_by_id($row_id);

                    if ($result) {
                        $response = [

                            'success' => true,
                            'data' => $result
                        ];
                    } else {
                        $response = [
                            'success' => false,
                            'message' => 'Not found'
                        ];
                    }

                    echo json_encode($response);
                }

               
                
                public function  delete_loan_type_by_id()
                {
                    $row_id = $this->input->post('row_id');
                    $result = $this->HrModel-> delete_loan_type_by_id($row_id);
        
                    if ($result) {
                        $response = ['success' => true, 'message' => 'Deleted successfully'];
                    } else {
                        $response = ['success' => false, 'message' => 'Failed to mark item as deleted'];
                    }
        
                    echo json_encode($response);
                }

                public function assets($sub_menu_id=""){
                    $data = array();
                    $user_role_id                    = $_SESSION['USER_ROLE_ID'];

                    $data                          =$this->get_menu_list($user_role_id);
                    $data["tab"]                  =$this->HrMenuModel->get_sub_menu_tab_permission($sub_menu_id,$user_role_id);
                    $this->load->view('hr-management/assets',$data);
                }

                public function get_status()
                    {
                        $data = $this->HrModel->get_status
                        ();
                        echo json_encode(['data' => $data]);
                    }
                    
                    public function get_group_details()
                    {
                        $data = $this->HrModel->get_group_details();
                       
                        echo json_encode(['data' => $data]);
                    }

                 
                    public function save_group_details()
                    {
                        $company_id_in_hr = $this->session->userdata('company_id_in_hr');
                        $data = array(
                            'company_id' => $company_id_in_hr,
                            'asset_group_name' => $this->input->post('asset_group_name'),
                           
                        );
    
                        $flag_id=$_POST['flag_id'];
                        if ($flag_id === "0") {
                            $this->db->insert('hr_asset_group', $data);
    
                        } 
                        elseif ($flag_id === "1") {
                                
                            $row_id = $this->input->post('row_id'); 
                            $res = $this->HrModel->update_asset($row_id,  $data);
                        
                        }  
    
                        
                        $response = array(
                            'success' => true,
                            'message' => 'Saved successfully.'
                        );
    
                        // Send the JSON response
                        echo json_encode($response);
                    }

                    
                    public function get_group_by_id()
                    {
                    
                        $row_id = $this->input->get('row_id'); 
                    
                   
                        $result = $this->HrModel->get_group_by_id($row_id);
    
                        if ($result) {
                            $response = [
    
                                'success' => true,
                                'data' => $result
                            ];
                        } else {
                            $response = [
                                'success' => false,
                                'message' => 'Not found'
                            ];
                        }
    
                        echo json_encode($response);
                    }
                   
                    public function  delete_group_by_id()
                    {
                        $row_id = $this->input->post('row_id');
                        $result = $this->HrModel-> delete_group_by_id($row_id);
            
                        if ($result) {
                            $response = ['success' => true, 'message' => 'Deleted successfully'];
                        } else {
                            $response = ['success' => false, 'message' => 'Failed to mark item as deleted'];
                        }
            
                        echo json_encode($response);
                    }
                    
                    public function get_category_details()
                    {
                        $data = $this->HrModel->get_category_details();
                       
                        echo json_encode(['data' => $data]);
                    }

             
                    public function save_category_details()
                    {
                        $company_id_in_hr = $this->session->userdata('company_id_in_hr');
                        $data = array(
                            'company_id' => $company_id_in_hr,
                            'asset_category_name' => $this->input->post('asset_category_name'),
                           
                        );
    
                        $flag_id=$_POST['flag_id'];
                        if ($flag_id === "0") {
                            $this->db->insert('hr_asset_category', $data);
    
                        } 
                        elseif ($flag_id === "1") {
                                
                            $row_id = $this->input->post('row_id'); 
                            $res = $this->HrModel->update_category($row_id,  $data);
                        
                        }  
    
                        
                        $response = array(
                            'success' => true,
                            'message' => 'Saved successfully.'
                        );
    
                        // Send the JSON response
                        echo json_encode($response);
                    }

               
                    public function get_category_by_id()
                    {
                    
                        $row_id = $this->input->get('row_id'); 
                    
                   
                        $result = $this->HrModel->get_category_by_id($row_id);
    
                        if ($result) {
                            $response = [
    
                                'success' => true,
                                'data' => $result
                            ];
                        } else {
                            $response = [
                                'success' => false,
                                'message' => 'Not found'
                            ];
                        }
    
                        echo json_encode($response);
                    }
                  
                    public function delete_category_by_id()
                    {
                        $row_id = $this->input->post('row_id');
                        $result = $this->HrModel->delete_category_by_id($row_id);
            
                        if ($result) {
                            $response = ['success' => true, 'message' => 'Deleted successfully'];
                        } else {
                            $response = ['success' => false, 'message' => 'Failed to mark item as deleted'];
                        }
            
                        echo json_encode($response);
                    }

                    
                    public function get_return_details()
                    {
                        $data = $this->HrModel->get_return_details();
                        echo json_encode(['data' => $data]);
                    }

                    
                    public function get_return_reason_by_id()
                    {
                    
                        $row_id = $this->input->get('row_id'); 
                    
                   
                        $result = $this->HrModel->get_return_reason_by_id($row_id);
    
                        if ($result) {
                            $response = [
    
                                'success' => true,
                                'data' => $result
                            ];
                        } else {
                            $response = [
                                'success' => false,
                                'message' => 'Not found'
                            ];
                        }
    
                        echo json_encode($response);
                    }
                    
                    
                    public function delete_return_reason_by_id()
                    {
                        $row_id = $this->input->post('row_id');
                        $result = $this->HrModel->delete_return_reason_by_id($row_id);
            
                        if ($result) {
                            $response = ['success' => true, 'message' => 'Deleted successfully'];
                        } else {
                            $response = ['success' => false, 'message' => 'Failed to mark item as deleted'];
                        }
            
                        echo json_encode($response);
                    }

                    
                    public function save_return_details()
                    {
                        
                        $data = array(
                           
                            'asset_return_reason' => $this->input->post('asset_return_reason'),
                           
                        );
    
                        $flag_id=$_POST['flag_id'];
                        if ($flag_id === "0") {
                            $this->db->insert('hr_asset_return_reasons', $data);
    
                        } 
                        elseif ($flag_id === "1") {
                                
                            $row_id = $this->input->post('row_id'); 
                            $res = $this->HrModel->update_return_reason($row_id,  $data);
                        
                        }  
    
                        
                        $response = array(
                            'success' => true,
                            'message' => 'Saved successfully.'
                        );
    
                        // Send the JSON response
                        echo json_encode($response);
                    }

                    public function employee($sub_menu_id=""){
                        // echo APPPATH;
                        // die;
                        $company_id_in_hr = $this->session->userdata('company_id_in_hr');
                        $data = array();
                        $user_role_id                    = $_SESSION['USER_ROLE_ID'];

                        $data                          =$this->get_menu_list($user_role_id);
                        $data1["tab"]                  =$this->HrMenuModel->get_sub_menu_tab_permission($sub_menu_id,$user_role_id);
       
                        $data["gender"]  = $this->HrModel->get_gender();
                        $data["marital_status"]  = $this->HrModel->get_marital_status_status();
                        $data["states"]  = $this->HrModel->get_states();
                        $data["country"]  = $this->HrModel->get_country();
                        $data["employee_names"]  = $this->HrModel->get_employee_names($company_id_in_hr);
                        $data["education_details"]  = $this->HrModel->get_education_details();
                        $data["cerfication_names"]  = $this->HrModel->get_certificate_details();
                        $data["languages"]  = $this->HrModel->get_languages();
                        $data["proficiency"]  = $this->HrModel->get_language_proficiency_details();
                        $data["dependents"]  = $this->HrModel->get_dependent_details();
                        $data["branches"]  = $this->HrModel->get_branches($company_id_in_hr);
                        $data["departments"]  = $this->HrModel->get_department_details($company_id_in_hr);
                        $data["jobtitles"]  = $this->HrModel->get_job_title_details();
                        $data["payscale"]  = $this->HrModel->get_pay_scales_details($company_id_in_hr);
                        $data["employmentstatus"]  = $this->HrModel->get_employment_status_details();
                        $data["languages"]  = $this->HrModel->get_language_details();
                        $data["employee_status"]  = $this->HrModel->get_job_in_employee_status();

                        
                        // $data["filter_name"]  = $this->HrModel->get_employee_filter_name($company_id_in_hr);
                        // echo "<pre>";
                        //     var_dump($data["payscale"]); // or print_r($data["employee_name"]);
                        //     echo "</pre>";
                        //     die;

                        // code by mashu
                        
                        $data["employee_department"]  = $this->HrModel->get_department_in_employee_details();
                      
                        $data["employee_name"]  = $this->HrModel->get_job_in_employee_name();
                        $data["all_employee_in_company"]  = $this->HrModel->get_all_employee_in_company();
                        $data["employee_name_skills"]  = $this->HrModel->get_job_in_employee_name();
                        $data["employee_skills"]  = $this->HrModel->get_employee_skill_options();
                        $data 			   = (object) array_merge((array) $data,(array) $data1);

                        $this->load->view('hr-management/employee',$data);
                    }

                    public function get_employee_details()

                    {
                        $company_id_in_hr = $this->session->userdata('company_id_in_hr');
                        $data = $this->HrModel->get_employee_details($company_id_in_hr);
                       
                        echo json_encode(['data' => $data]);
                    }

            

  

                public function save_employee_details()
                {
                    $company_id_in_hr = $this->session->userdata('company_id_in_hr');
                    $flag_id = $_POST['flag_id'];
                    // $employee_id = null;

                    $employee_master_data = array(
                        //personal
                        'company_id' => $company_id_in_hr,
                        'employee_number' => $this->input->post('employee_number'),
                        'first_name' => $this->input->post('first_name'),
                        'middle_name' => $this->input->post('middle_name'),
                        'last_name' => $this->input->post('last_name'),
                        'gender_id' => $this->input->post('gender_id'),
                        'date_of_birth' => $this->input->post('date_of_birth'),
                        'nationality_id' => $this->input->post('nationality_id'),
                        'marital_status_id' => $this->input->post('marital_status_id'),
                        // identification
                        'aadhar_number' => $this->input->post('aadhar_number'),
                        'passport_number' => $this->input->post('passport_number'),
                        'pan_number' => $this->input->post('pan_number'),
                        'driving_licence_number' => $this->input->post('driving_licence_number'),
                        'other_id_doc' => $this->input->post('other_id_doc'),
                         
                        //present address
                        'present_address_line_1' => $this->input->post('present_address_line_1'),
                        'present_address_line_2' => $this->input->post('present_address_line_2'),
                        'present_address_line_3' => $this->input->post('present_address_line_3'),
                        'present_address_line_4' => $this->input->post('present_address_line_4'),
                        'present_state_id' => $this->input->post('present_state_id'),
                        'present_country_id' => $this->input->post('present_country_id'),
                        'present_pin_code' => $this->input->post('present_pin_code'),
                        
                        //permanent address
                        'permenent_address_line_1' => $this->input->post('permenent_address_line_1'),
                        'permenent_address_line_2' => $this->input->post('permenent_address_line_2'),
                        'permenent_address_line_3' => $this->input->post('permenent_address_line_3'),
                        'permenent_address_line_4' => $this->input->post('permenent_address_line_4'),
                        'permenent_state_id' => $this->input->post('permenent_state_id'),
                        'permenent_country_id' => $this->input->post('permenent_country_id'),
                        'permenent_pin_code' => $this->input->post('permenent_pin_code'),

                        //contact
                        'home_phone' => $this->input->post('home_phone'),
                        'mobile_phone' => $this->input->post('mobile_phone'),
                        'work_phone' => $this->input->post('work_phone'),
                        'work_email' => $this->input->post('work_email'),
                        'private_email' => $this->input->post('private_email'),

                        //account details
                        'account_number' => $this->input->post('account_number'),
                        'bank_name' => $this->input->post('bank_name'),
                        'bank_branch_name' => $this->input->post('bank_branch_name'),
                        'ifsc_code' => $this->input->post('ifsc_code'),
                        
                    );

                    $employee_employment_data = array(
                        // 'employee_id' => $employee_id,
                        'branch_id' => $this->input->post('branch_id'),
                        'department_id' => $this->input->post('department_id'),
                        'job_title_id' => $this->input->post('job_title_id'),
                        'pay_scale_id' => $this->input->post('pay_scale_id'),
                        'employment_status_id' => $this->input->post('employment_status_id'),
                        'date_joined' => $this->input->post('date_joined'),
                        'employee_head_id' => $this->input->post('employee_head_id'),
                        'is_active'  =>'yes'
                        
                    );

                    if ($flag_id === "0") {
                        
                        $employee_master_data['created_by'] = $_SESSION['user_id'];
                        $employee_master_data['created_on'] = date('Y-m-d H:i:s');
                        $this->db->insert('hr_employee_master', $employee_master_data);
                        $employee_id = $this->db->insert_id();
                
                       
                        $employee_employment_data['employee_id'] = $employee_id;
                        $this->db->insert('hr_employee_employment_details', $employee_employment_data);
                    } elseif ($flag_id === "1") {
                        
                        $employee_master_data['modified_by'] = $_SESSION['user_id'];
                        $employee_master_data['modified_on'] = date('Y-m-d H:i:s');
                        $row_id = $this->input->post('row_id');
                        $this->HrModel->update_employee_details($row_id, $employee_master_data);
                        // $employee_id = $this->input->post('employee_id'); 
                        $employment_details_id = $this->input->post('employment_details_id');
                        // unset($employee_employment_data['employee_id']);
                        $this->HrModel->update_employee_employment_details($employment_details_id, $employee_employment_data);
                    }
                
                    $response = array(
                        'success' => true,
                        'message' => 'Saved successfully.'
                    );

                    // Send the JSON response
                    echo json_encode($response);

                }

                       
                // public function get_employee_details_by_id()
                // {
                  
                //     $row_id = $this->input->get('row_id');
                    
                //     $result = $this->HrModel->get_employee_details_by_id($row_id);
                    

                //     if ($result) {
                //         $response = [
                //             'success' => true,
                //             'data' => $result
                //         ];
                //     } else {
                //         $response = [
                //             'success' => false,
                //             'message' => 'Not found'
                //         ];
                //     }

                //     echo json_encode($response);
                // }

                public function get_employee_details_by_id()
                {
                    $row_id = $this->input->get('row_id');
                    
                    
                    $result = $this->HrModel->get_employee_details_by_id($row_id);
                    
                    
                    if ($result) {
                        $branch_id = $result->branch_id; 
                        // echo "Branch id is". $branch_id;
                        $department_id= $result->department_id;
                
                        // echo "Departmentid is". $department_id;
                        $branches = $this->HrModel->get_hr_branches();
                        $departments = $this->HrModel->get_hr_departments($branch_id);
                        $employee_heads = $this->HrModel->get_employee_head_by_department($department_id);
                
                       
                        $response = [
                            'success' => true,
                            'data' => $result,
                            'branches' => $branches,
                            'departments' => $departments,
                            'employeeHeads'=> $employee_heads
                        ];
                    } else {
                        $response = [
                            'success' => false,
                            'message' => 'Employee details not found'
                        ];
                    }
                
                    echo json_encode($response);
                }
                

    
               
                
                public function delete_employee_by_id() {
                    $row_id = $this->input->post('row_id');
                    $employment_details_id = $this->input->post('employment_details_id');
                    $res = $this->HrModel->delete_employee_by_id($row_id, $employment_details_id);
                    
                    $response = ['success' => true, 'message' => 'Deleted successfully'];
                    echo json_encode($response);
                }

       
     
            public function save_emp_education_details()
            {
                $data = array(
                    'employee_id' => $this->input->post('employee_id'),
                    'education_id' => $this->input->post('education_id'),
                    'institute_name' => $this->input->post('institute_name'),
                    'start_date' => $this->input->post('start_date'),
                    'completed_date' => $this->input->post('completed_date'),
                    'score_grade' => $this->input->post('score_grade'),
                    'details' => $this->input->post('details'),
                   
                   
                );
                
                $flag_id=$_POST['flag_id'];
                if ($flag_id === "0") {
                    $data['created_by'] = $_SESSION['user_id'];
                    $data['created_on'] = date('Y-m-d H:i:s');
                    $this->db->insert('hr_employee_education_details', $data);

                } 
                elseif ($flag_id === "1") {
                    $data['modified_by'] = $_SESSION['user_id'];
                    $data['modified_on'] = date('Y-m-d H:i:s');
                    $row_id = $this->input->post('row_id'); 
                    $res = $this->HrModel->update_employee_education_details($row_id,  $data);
                
                }  

                
                $response = array(
                    'success' => true,
                    'message' => 'Saved successfully.'
                );

                // Send the JSON response
                echo json_encode($response);
            }

          
        public function get_emp_education_details()
        {
            $data = $this->HrModel->get_emp_education_details();
            echo json_encode(['data' => $data]);
        }


      
        public function get_emp_education_by_id()
        {
          
            $row_id = $this->input->get('row_id'); 
           
        //    echo "row id is".$row_id 
            $result = $this->HrModel->get_emp_education_by_id($row_id);
        
            if ($result) {
                $response = [
        
                    'success' => true,
                    'data' => $result
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Not found'
                ];
            }
        
            echo json_encode($response);
        }
        
     
        public function delete_emp_education_by_id()
        {
            $row_id = $this->input->post('row_id');
            $result = $this->HrModel->delete_emp_education_by_id($row_id);
        
            if ($result) {
                $response = ['success' => true, 'message' => 'Deleted successfully'];
            } else {
                $response = ['success' => false, 'message' => 'Failed to mark item as deleted'];
            }
        
            echo json_encode($response);
        }

         
        public function save_emp_certification_details ()
        {
            $data = array(
                'employee_id' => $this->input->post('employee_id'),
                'certification_id' => $this->input->post('certification_id'),
                'institute_name' => $this->input->post('institute_name'),
                'date_issued' => $this->input->post('date_issued'),
                'date_valid_upto' => $this->input->post('date_valid_upto'),
                'score_grade' => $this->input->post('score_grade'),
               
               
            );

            $flag_id=$_POST['flag_id'];
            if ($flag_id === "0") {
                $data['created_by'] = $_SESSION['user_id'];
                $data['created_on'] = date('Y-m-d H:i:s');
                $this->db->insert('hr_employee_certification_details', $data);

            } 
            elseif ($flag_id === "1") {
                $data['modified_by'] = $_SESSION['user_id'];
                $data['modified_on'] = date('Y-m-d H:i:s');
                $row_id = $this->input->post('row_id'); 
                $res = $this->HrModel->update_employee_certification_details($row_id,  $data);
            
            }  

            
            $response = array(
                'success' => true,
                'message' => 'Saved successfully.'
            );

            // Send the JSON response
            echo json_encode($response);
        }

        
        
        public function get_emp_certification_details ()
        {
            $data = $this->HrModel->get_emp_certification_details();
            echo json_encode(['data' => $data]);
        }

        
        public function get_emp_certification_by_id()
        {
          
            $row_id = $this->input->get('row_id'); 
           
        //    echo "row id is".$row_id 
            $result = $this->HrModel->get_emp_certification_by_id($row_id);
        
            if ($result) {
                $response = [
        
                    'success' => true,
                    'data' => $result
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Not found'
                ];
            }
        
            echo json_encode($response);
        }
       
        public function  save_emp_language_details()
        {
            $data = array(
                'employee_id' => $this->input->post('employee_id'),
                'language_id' => $this->input->post('language_id'),
                'reading_proficiency_id' => $this->input->post('reading_proficiency_id'),
                'speaking_proficiency_id' => $this->input->post('speaking_proficiency_id'),
                'writing_proficiency_id' => $this->input->post('writing_proficiency_id'),
                'listening_proficiency_id' => $this->input->post('listening_proficiency_id'),
            );

            $flag_id=$_POST['flag_id'];
            if ($flag_id === "0") {
                $data['created_by'] = $_SESSION['user_id'];
                $data['created_on'] = date('Y-m-d H:i:s');
                $this->db->insert('hr_employee_langauge_proficiency', $data);

            } 
            elseif ($flag_id === "1") {
                $data['modified_by'] = $_SESSION['user_id'];
                $data['modified_on'] = date('Y-m-d H:i:s');
                $row_id = $this->input->post('row_id'); 
                $res = $this->HrModel->update_employee_langauge_proficiency($row_id,  $data);
            
            }  

            
            $response = array(
                'success' => true,
                'message' => 'Saved successfully.'
            );

            // Send the JSON response
            echo json_encode($response);
        }
       
        public function get_emp_languages_details()
        {
            $data = $this->HrModel->get_emp_languages_details();
            echo json_encode(['data' => $data]);
        }

        
        public function get_emp_languages_by_id()
        {
          
            $row_id = $this->input->get('row_id'); 
           
        //    echo "row id is".$row_id 
            $result = $this->HrModel->get_emp_languages_by_id($row_id);
        
            if ($result) {
                $response = [
        
                    'success' => true,
                    'data' => $result
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Not found'
                ];
            }
        
            echo json_encode($response);
        }

        public function  delete_emp_languages_by_id()
        {
            $row_id = $this->input->post('row_id');
            $result = $this->HrModel->delete_emp_languages_by_id($row_id);
        
            if ($result) {
                $response = ['success' => true, 'message' => 'Deleted successfully'];
            } else {
                $response = ['success' => false, 'message' => 'Failed to mark item as deleted'];
            }
        
            echo json_encode($response);
        }
        

     
        public function save_emp_dependent_details()
        {
            $data = array(
                'employee_id' => $this->input->post('employee_id'),
                'dependent_name' => $this->input->post('dependent_name'),
                'relation_with_employee_id' => $this->input->post('relation_with_employee_id'),
                'date_of_birth' => $this->input->post('date_of_birth'),
                'aadhar_number' => $this->input->post('aadhar_number'),
                'passport_number' => $this->input->post('passport_number'),
               
               
            );

            $flag_id=$_POST['flag_id'];
            if ($flag_id === "0") {
                $data['created_by'] = $_SESSION['user_id'];
                $data['created_on'] = date('Y-m-d H:i:s');
                $this->db->insert('hr_employee_dependents', $data);

            } 
            elseif ($flag_id === "1") {
                $data['modified_by'] = $_SESSION['user_id'];
                $data['modified_on'] = date('Y-m-d H:i:s');
                $row_id = $this->input->post('row_id'); 
                $res = $this->HrModel->update_employee_dependents_details($row_id,  $data);
            
            }  

            
            $response = array(
                'success' => true,
                'message' => 'Saved successfully.'
            );

            // Send the JSON response
            echo json_encode($response);
        }
        
        public function get_emp_dependent_details()
        {
            $data = $this->HrModel->get_emp_dependent_details();
            echo json_encode(['data' => $data]);
        }

        
        public function get_emp_dependents_by_id()
        {
          
            $row_id = $this->input->get('row_id'); 
           
        //    echo "row id is".$row_id 
            $result = $this->HrModel->get_emp_dependents_by_id($row_id);
        
            if ($result) {
                $response = [
        
                    'success' => true,
                    'data' => $result
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Not found'
                ];
            }
        
            echo json_encode($response);
        }

        public function delete_emp_dependents_by_id()
        {
            $row_id = $this->input->post('row_id');
            $result = $this->HrModel->delete_emp_dependents_by_id($row_id);
        
            if ($result) {
                $response = ['success' => true, 'message' => 'Deleted successfully'];
            } else {
                $response = ['success' => false, 'message' => 'Failed to mark item as deleted'];
            }
        
            echo json_encode($response);
        }

      
        public function save_emp_contact_details()
        {
            $data = array(
                'employee_id' => $this->input->post('employee_id'),
                'contact_person_name' => $this->input->post('contact_person_name'),
                'relation_with_employee_id' => $this->input->post('relation_with_employee_id'),
                'home_phone' => $this->input->post('home_phone'),
                'work_phone' => $this->input->post('work_phone'),
                'mobile_phone' => $this->input->post('mobile_phone'),
                'created_by' => $_SESSION['user_id'],
                'created_on' => date('Y-m-d H:i:s'),
               
            );

            $flag_id=$_POST['flag_id'];
            if ($flag_id === "0") {
                $data['created_by'] = $_SESSION['user_id'];
                $data['created_on'] = date('Y-m-d H:i:s');
                $this->db->insert('hr_employee_emergency_contact_details', $data);

            } 
            elseif ($flag_id === "1") {
                $data['modified_by'] = $_SESSION['user_id'];
                $data['modified_on'] = date('Y-m-d H:i:s');
                $row_id = $this->input->post('row_id'); 
                $res = $this->HrModel->update_employee_contact_details($row_id,  $data);
            
            }  

            
            $response = array(
                'success' => true,
                'message' => 'Saved successfully.'
            );

            // Send the JSON response
            echo json_encode($response);
        }

       
        public function get_emp_contact_details()
        {
            $data = $this->HrModel->get_emp_contact_details();
            echo json_encode(['data' => $data]);
        }

        
        public function get_emp_contacts_by_id()
        {
          
            $row_id = $this->input->get('row_id'); 
           
        //    echo "row id is".$row_id 
            $result = $this->HrModel->get_emp_contacts_by_id($row_id);
        
            if ($result) {
                $response = [
        
                    'success' => true,
                    'data' => $result
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Not found'
                ];
            }
        
            echo json_encode($response);
        }
        
       
        public function delete_emp_contacts_by_id()
        {
            $row_id = $this->input->post('row_id');
            $result = $this->HrModel->delete_emp_contacts_by_id($row_id);
        
            if ($result) {
                $response = ['success' => true, 'message' => 'Deleted successfully'];
            } else {
                $response = ['success' => false, 'message' => 'Failed to mark item as deleted'];
            }
        
            echo json_encode($response);
        }

        public function loan_request($sub_menu_id=""){
            $data = array();
            $company_id_in_hr       = $this->session->userdata('company_id_in_hr');
            $user_role_id           = $_SESSION['USER_ROLE_ID'];

            $data                   =$this->get_menu_list($user_role_id);
            $data["tab"]            =$this->HrMenuModel->get_sub_menu_tab_permission($sub_menu_id,$user_role_id);
       
            $data["employee_names"]      = $this->HrModel->get_employee_names($company_id_in_hr);
            $data["loan_type"]           = $this->HrModel->get_loan_details_internal();
            $data["loan_status"]         = $this->HrModel->get_loan_request_status();
            $data["new_request_status"]  = $this->HrModel->get_loan_request_fr_new_request();
            $data["verify_status"]       = $this->HrModel->get_loan_request_fr_verification();
            
            // status_id_fr_approval
            
		    $this->load->view('hr-management/loanRequest',$data);
        }
       
       
        public function get_emp_loan_details()
        {
            $data = $this->HrModel->get_emp_loan_details();
            echo json_encode(['data' => $data]);
        }



        
        public function save_emp_loan_request_details()
        {
            $company_id_in_hr = $this->session->userdata('company_id_in_hr');
            $data = array(
                
                'company_id' => $company_id_in_hr,
                'employee_id' => $this->input->post('employee_id'),
                'date_of_request' => $this->input->post('date_of_request'),
                'loan_type_id' => $this->input->post('loan_type_id'),
                'requested_amount' => $this->input->post('requested_amount'),
                'approved_amount' => $this->input->post('approved_amount'),
                'loan_request_status_id' => '1',
                'created_by' => $_SESSION['user_id'],
                'created_on' => date('Y-m-d H:i:s'),
            );
            $flag_id=$_POST['flag_id'];
            if ($flag_id === "0") {
                $this->db->insert('hr_employee_loan_requests', $data);
            } 
            elseif ($flag_id === "1") {
                $data['modified_by'] = $_SESSION['user_id'];
                $data['modified_on'] = date('Y-m-d H:i:s');       
                $row_id = $this->input->post('row_id'); 
                $res = $this->HrModel->update_employee_loan_requests_details($row_id,  $data);
            }  
            $response = array(
                'success' => true,
                'message' => 'Saved successfully.'
            );
            // Send the JSON response
            echo json_encode($response);
        }

        
        public function get_emp_loan_request_by_id()
        {
          
            $row_id = $this->input->get('row_id'); 
           
        //    echo "row id is".$row_id 
            $result = $this->HrModel->get_emp_loan_request_by_id($row_id);
        
            if ($result) {
                $response = [
        
                    'success' => true,
                    'data' => $result
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Not found'
                ];
            }
        
            echo json_encode($response);
        }

        
        public function delete_emp_loan_request_by_id()
        {
            $row_id = $this->input->post('row_id');
            $result = $this->HrModel->delete_emp_loan_request_by_id($row_id);
        
            if ($result) {
                $response = ['success' => true, 'message' => 'Deleted successfully'];
            } else {
                $response = ['success' => false, 'message' => 'Failed to mark item as deleted'];
            }
        
            echo json_encode($response);
        }

    
    public function get_emp_new_request_by_id(){

        $row_id = $this->input->get('row_id');
        // $flag_id = $this->input->get('row_id');
        $result = $this->HrModel->get_emp_new_request_by_id($row_id);
        if ($result) {
            $response = [
                'success' => true,
                'data' => $result
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'item  is  not found'
            ];
        }
        echo json_encode($response);
    
    }

    
    public function get_emp_new_loan_request_details()
    {
        $data = $this->HrModel->get_emp_new_loan_request_details();
        echo json_encode(['data' => $data]);
    }

           

    public function get_emp_approval_loan_details()
    {
        $data = $this->HrModel->get_emp_approval_loan_details();
        echo json_encode(['data' => $data]);
    }

    
    // public function save_emp_new_loan_request_details()
    // {
    //     $company_id_in_hr = $this->session->userdata('company_id_in_hr');
    //     $data = array(
            
    //         'company_id' => $company_id_in_hr,
    //         'employee_id' => $this->input->post('employee_id'),
    //         'date_of_request' => $this->input->post('date_of_request'),
    //         'loan_type_id' => $this->input->post('loan_type_id'),
    //         'requested_amount' => $this->input->post('requested_amount'),
    //         'approved_amount' => $this->input->post('approved_amount'),
    //         'loan_request_status_id' => $this->input->post('loan_request_status_id'),
    //         'created_by' => $_SESSION['user_id'],
    //         'created_on' => date('Y-m-d H:i:s'),
    //         'rejection_reason' => $this->input->post('rejection_reason'),
    //         'rejected_by' => $_SESSION['user_id'],
    //         'rejected_on' => date('Y-m-d H:i:s'),
    //     );
    //     $flag_id=$_POST['flag_id'];
    //     if ($flag_id === "0") {
    //         $this->db->insert('hr_employee_loan_requests', $data);
    //     } 
    //     elseif ($flag_id === "1") {
    //         $row_id = $this->input->post('row_id'); 
    //         $res = $this->HrModel->update_employee_loan_requests_details($row_id,  $data);
    //     }  
    //     $response = array(
    //         'success' => true,
    //         'message' => 'Saved successfully.'
    //     );
    //     // Send the JSON response
    //     echo json_encode($response);
    // }

    public function save_emp_new_loan_request_details(){
        $flag_id=(int)$this->input->post('flag_id');
        
        // echo "flag id ".$flag_id;
        $new_loan_request_status_id=$this->input->post('new_request_status_id');
        // echo "status id ".$new_loan_request_status_id;
         if($new_loan_request_status_id =='2') 
            {
                $data = array(
        
                    'loan_request_status_id' => $this->input->post('new_request_status_id'),  
                    'is_verified' =>'yes',  
                    'verified_by' =>$_SESSION['user_id'], 
                    'verified_on' => date('Y-m-d H:i:s'), 
                   
                );  
                // var_dump(  $data);
            }
         else if( $new_loan_request_status_id =='3')
            {
                $data = array(
        
                    'loan_request_status_id' => $this->input->post('new_request_status_id'),  
                    'is_approved' =>'yes',  
                    'approved_by' =>$_SESSION['user_id'], 
                    'approved_on' => date('Y-m-d H:i:s'),
                   
                );  
            }
         else if( $new_loan_request_status_id =='4')
            {
                $data = array(
        
                    'loan_request_status_id' => $this->input->post('new_request_status_id'),  
                    'rejected_on' => date('Y-m-d H:i:s'),
                    'rejected_by' =>$_SESSION['user_id'], 
                    'rejection_reason' =>$this->input->post('rejection_reason'), 
                   
                );  
            }
      

        if ($flag_id == "1") {// in edit 

        $row_id = $this->input->post('row_id'); 
        $res = $this->HrModel->save_new_loan_request($data,$row_id);
        }
        if($res)
            {
                $response = array(
                    'success' => true,
                    'message' => 'saved successfully .'
                );
            }
            else
            {
                $response = array(
                'success' => false,
                'message' => 'Error saving item. Please try again.'
                );
            }
        
            echo json_encode($response);

    }

             
    
    public function get_emp_verified_loan_details()
    {
        $data = $this->HrModel->get_emp_verified_loan_details();
        echo json_encode(['data' => $data]);
    }

     
    public function get_emp_verified_by_id(){

        $row_id = $this->input->get('row_id');
        
        $result = $this->HrModel->get_emp_verified_by_id($row_id);
        if ($result) {
            $response = [
                'success' => true,
                'data' => $result
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'item  is  not found'
            ];
        }
        echo json_encode($response);
 }
 
 public function get_emp_approval_by_id(){

     $row_id = $this->input->get('row_id');
     // $flag_id = $this->input->get('row_id');
     $result = $this->HrModel->get_emp_approval_by_id($row_id);
     if ($result) {
         $response = [
             'success' => true,
             'data' => $result
         ];
     } else {
         $response = [
             'success' => false,
             'message' => 'item  is  not found'
         ];
     }
     echo json_encode($response);
 
 }


 public function save_approval_loan_request_details(){
    $flag_id=(int)$this->input->post('flag_id');
    
    // echo "flag id ".$flag_id;
    $new_loan_request_status_id=$this->input->post('new_request_status_id');
    // echo "status id ".$new_loan_request_status_id;
     if($new_loan_request_status_id =='2')
        {
            $data = array(
    
                'loan_request_status_id' => $this->input->post('new_request_status_id'),  
                'is_verified' =>'yes',  
                'verified_by' =>$_SESSION['user_id'], 
                'verified_on' => date('Y-m-d H:i:s'), 
               
            );  
            // var_dump(  $data);
        }
     else if( $new_loan_request_status_id =='3')
        {
            $data = array(
    
                'loan_request_status_id' => $this->input->post('new_request_status_id'),  
                'is_approved' =>'yes',  
                'approved_by' =>$_SESSION['user_id'], 
                'approved_on' => date('Y-m-d H:i:s'),
               
            );  
        }
     else if( $new_loan_request_status_id =='4')
        {
            $data = array(
    
                'loan_request_status_id' => $this->input->post('new_request_status_id'),  
                'rejected_on' => date('Y-m-d H:i:s'),
                'rejected_by' =>$_SESSION['user_id'], 
                'rejection_reason' =>$this->input->post('rejection_reason'), 
               
            );  
        }
  

    if ($flag_id == "1") {// in edit 

    $row_id = $this->input->post('row_id'); 
    $res = $this->HrModel->save_new_loan_request($data,$row_id);
    }
    if($res)
        {
            $response = array(
                'success' => true,
                'message' => 'saved successfully .'
            );
        }
        else
        {
            $response = array(
            'success' => false,
            'message' => 'Error saving item. Please try again.'
            );
        }
    
        echo json_encode($response);

}

public function save_loan_verification(){
    $flag_id=(int)$this->input->post('flag_id');
    // echo $flag_id;
    $loan_verified=$this->input->post('loan_request_status_id');
    // echo $loan_verified;

  if( $loan_verified =='3') //approved
    {  
        $data = array(
            'loan_request_status_id' => $loan_verified,  
             'is_approved' =>'yes',  
             'approved_by' =>$_SESSION['user_id'],
             'approved_on' => date('Y-m-d H:i:s'),
           
        );  
    }
    else if( $loan_verified =='4') //rejected
    {
        $data = array(

            'loan_request_status_id' => $this->input->post('loan_request_status_id'),  
            'rejected_on' => date('Y-m-d H:i:s'),
            'rejected_by' =>$_SESSION['user_id'], 
            'rejection_reason' =>$this->input->post('rejection_reason'), 
        );  
    }

   

    if ($flag_id == "1") 
    {// in edit 
        $row_id = $this->input->post('row_id'); 
        $res = $this->HrModel->save_loan_verified($data,$row_id);
    }
    if($res)
        {
            $response = array(
                'success' => true,
                'message' => 'Saved successfully .'
            );
        }
        else
        {
            $response = array(
            'success' => false,
            'message' => 'Error saving item. Please try again.'
            );
        }
    
        echo json_encode($response);

}


public function get_employee_names_for_employee_head() {
    $company_id_in_hr = $this->session->userdata('company_id_in_hr');
    $employee_names_for_emphead = $this->HrModel->get_employee_names_for_employee_head($company_id_in_hr);
    echo json_encode(['employee_names' => $employee_names_for_emphead]);
}

public function get_departments_in_filter()
{
    $company_id_in_hr = $this->session->userdata('company_id_in_hr');
    $departments_in_filter = $this->HrModel->get_departments_in_filter($company_id_in_hr);
   
    header('Content-Type: application/json');
    echo json_encode($departments_in_filter);
}



public function get_certifications()
{
  
    $certifications = $this->HrModel->get_certifications();
    header('Content-Type: application/json');
    echo json_encode($certifications);
}

public function get_employee_firstname_lastname() {
    $company_id_in_hr = $this->session->userdata('company_id_in_hr');
    $employee_names_combined = $this->HrModel->get_employee_firstname_lastname($company_id_in_hr);
    // var_dump( $employee_names_combined);
    echo json_encode(['employee_names' => $employee_names_combined]);
}
public function get_loan_request_statuses() {
    
    $loan_statuses = $this->HrModel->fetch_loan_request_statuses(); 

    echo json_encode(['loan_statuses' => $loan_statuses]);
}




// public function get_departments_by_branch() {
//     $company_id_in_hr = $this->session->userdata('company_id_in_hr');
//     $branchId = $this->input->post('branch_id');
//     $departments = $this->HrModel->get_departments_by_branch($branchId,$company_id_in_hr);
//     $data = json_encode($departments);
//     $this->output
//          ->set_content_type('application/json')
//          ->set_output($data);
// }

public function get_departments_by_branch() {
    $company_id_in_hr = $this->session->userdata('company_id_in_hr');
    $branchId = $this->input->post('branch_id');
   

    

    $departments = $this->HrModel->get_departments_by_branch($branchId, $company_id_in_hr);
    $data = json_encode($departments);

    $this->output
         ->set_content_type('application/json')
         ->set_output($data);
}

public function get_employee_by_departments() {
        
    $department_id = $this->input->post('department_id');
    $employee = $this->HrModel->get_employee_by_departments($department_id);
    // var_dump($employee);
    $data = json_encode($employee);
    $this->output
         ->set_content_type('application/json')
         ->set_output($data);
}



public function get_employee_team_details()
{
    $data = $this->HrModel->get_employee_team_details();
    echo json_encode(['data' => $data]);
}

public function save_employee_team_member(){
    $flag_id=(int)$this->input->post('flag_id');
    $data = array(
        'team_id' => $this->input->post('team_id'),
        'team_member_id' => $this->input->post('team_member_id'), 
    );

    if ($flag_id == "0") {
        $data['created_by'] = $_SESSION['user_id'];
        $data['created_on'] = date('Y-m-d H:i:s');
        $res = $this->HrModel->insert_employee_team_member($data);
    } else if ($flag_id == "1") {
        // in edit 
        $data['modified_by'] = $_SESSION['user_id'];
        $data['modified_on'] = date('Y-m-d H:i:s');
        $row_id = $this->input->post('row_id'); 
        $res = $this->HrModel->update_employee_team_member($data, $row_id);
    }
    
    if($res)
        {
            $response = array(
                'success' => true,
                'message' => 'saved successfully .'
            );
        }
        else
        {
            $response = array(
            'success' => false,
            'message' => 'Error saving item. Please try again.'
            );
        }
    
        echo json_encode($response);

}

public function get_employee_employment_details(){
    $data = $this->HrModel->get_employee_employment_details();
    echo json_encode(['data' => $data]);
}

public function get_employee_employment_details_by_id(){

    $row_id = $this->input->post('row_id');
    $result = $this->HrModel->get_employee_employment_details_by_id($row_id);

    if ($result) {
        $response = [
            'success' => true,
            'data' => $result
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'item  is  not found'
        ];
    }
    echo json_encode($response);

}

public function save_employee_employment_details(){
    $flag_id=(int)$this->input->post('flag_id');

    $data = array(
     
        'employee_id' => $this->input->post('employee_id'),    
        'branch_id' => $this->input->post('branch_id'),    
        'department_id' => $this->input->post('department_id'),    
        'job_title_id' => $this->input->post('job_title_id'),    
        'pay_scale_id' => $this->input->post('pay_scale_id'),    
        'employment_status_id' => $this->input->post('employment_status_id'),    
    
    );
    if ($flag_id == "0") {
              $data['created_by'] = $_SESSION['user_id'];
            $data['created_on'] = date('Y-m-d H:i:s');
           $res = $this->HrModel->insert_employee_employment_details($data);
    
    }

    elseif ($flag_id == "1") {// in edit 
     $data['modified_by'] = $_SESSION['user_id'];
    $data['modified_on'] = date('Y-m-d H:i:s');
    $row_id = $this->input->post('row_id'); 
    $res = $this->HrModel->update_employee_employment_details_for_work_history($data,$row_id);
    }
    if($res)
        {
            $response = array(
                'success' => true,
                'message' => 'saved successfully .'
            );
        }
        else
        {
            $response = array(
            'success' => false,
            'message' => 'Error saving item. Please try again.'
            );
        }
    
        echo json_encode($response);

}

public function delete_employee_employment_details_by_id(){
    $row_id  = $this->input->post('row_id');
    $res = $this->HrModel->delete_employee_employment_details_by_id($row_id);

    $response = ['success' => true, 'message' => ' deleted successfully'];
    echo json_encode($response);
}
// created by mashu 


// ./team load page 
public function teams($sub_menu_id="")
    {
        
        $data = array();
        $user_role_id                    = $_SESSION['USER_ROLE_ID'];

        $data                          =$this->get_menu_list($user_role_id);
        $data["tab"]                  =$this->HrMenuModel->get_sub_menu_tab_permission($sub_menu_id,$user_role_id);
        
		$this->load->view('hr-management/teams',$data);
    }

// ./team load page 


// team functions
    //team master
    public function get_employee_team_master_details()
    {
 
    $data = $this->HrModel->get_employee_team_master_details();
    echo json_encode(['data' => $data]);
    }
          
            // save
            public function save_employee_team_details(){
                $flag_id=(int)$this->input->post('flag_id');
                // echo $flag_id;
                $data = array(
                    'team_name' => $this->input->post('team_name'),
                    'team_description' => $this->input->post('team_description'),
                    'branch_id' => $this->input->post('branch_id'),
                    'department_id' => $this->input->post('department_id'),
                    'team_leader_id' => $this->input->post('team_leader_id'),   
                    'company_id' => $this->session->userdata('company_id_in_hr'),
                    
                );
        
                if ($flag_id == "0") {
                    $data['created_by'] = $_SESSION['user_id'];
                    $data['created_on'] = date('Y-m-d H:i:s');
                    $res = $this->HrModel->insert_employee_team($data);
                } else if ($flag_id == "1") {
                    // in edit 
                    $data['modified_by'] = $_SESSION['user_id'];
                    $data['modified_on'] = date('Y-m-d H:i:s');
                    $row_id = $this->input->post('row_id'); 
                    $res = $this->HrModel->update_employee_team($data, $row_id);
                }
                
                if($res)
                    {
                        $response = array(
                            'success' => true,
                            'message' => 'saved successfully .'
                        );
                    }
                    else
                    {
                        $response = array(
                        'success' => false,
                        'message' => 'Error saving item. Please try again.'
                        );
                    }
                
                    echo json_encode($response);
    
            }
            // ./save


            public function get_team_leader_option()
            {
            $team_option= $this->HrModel->get_job_team_leader_option();
            $data = json_encode($team_option);
            
                $this->output
                    ->set_content_type('application/json')
                    ->set_output($data);
            }

            public function get_team_name_option()
            {
            $team_option= $this->HrModel->get_team_name_option();
            $data = json_encode($team_option);
            
                $this->output
                    ->set_content_type('application/json')
                    ->set_output($data);
            }

            public function get_employee_team_master_by_id(){

                $row_id = $this->input->post('row_id');
                $result = $this->HrModel->get_employee_team_master_by_id($row_id);
                if ($result) {
                    $response = [
                        'success' => true,
                        'data' => $result
                    ];
                } else {
                    $response = [
                        'success' => false,
                        'message' => 'item  is  not found'
                    ];
                }
                echo json_encode($response);
            
            }

            public function delete_employee_team_master_by_id(){

                $row_id = $this->input->post('row_id');
                $result = $this->HrModel->delete_employee_team_master_by_id($row_id);
                $response = ['success' => true, 'message' => ' deleted successfully'];
                echo json_encode($response);
            
            }

               // get branch id option throgh ajaxx

        public function get_branch_id_option_in_team(){
            $branch_option= $this->HrModel->get_branch_id_option_in_team();
            $data = json_encode($branch_option);
            
            $this->output
                ->set_content_type('application/json')
                ->set_output($data);
        }
        // get branch id option throgh ajaxx

            
            
    //team master
            //edit
             

            public function get_employee_team_member_by_id(){
     
                $row_id = $this->input->post('row_id');
                $result = $this->HrModel->get_employee_team_member_by_id($row_id);
                if ($result) {
                    $response = [
                        'success' => true,
                        'data' => $result
                    ];
                } else {
                    $response = [
                        'success' => false,
                        'message' => 'item  is  not found'
                    ];
                }
                echo json_encode($response);
            
            }
        //.edit



        public function delete_employee_team_member_by_id()
        {
            $row_id = $this->input->post('row_id');
            $result = $this->HrModel->delete_employee_team_member_by_id($row_id);
            $response = ['success' => true, 'message' => ' deleted successfully'];
            echo json_encode($response);
        }

        public function get_team_employee_name_option()
        {
             $employee_name= $this->HrModel->get_team_employee_name_option();
             $data = json_encode($employee_name);
              $this->output
                   ->set_content_type('application/json')
                   ->set_output($data);
        }

         public function travel($sub_menu_id="")
	{
		$data = array();
		$user_role_id                  = $_SESSION['USER_ROLE_ID'];

        $data                          = $this->get_menu_list($user_role_id);
        $data["tab"]                  = $this->HrMenuModel->get_sub_menu_tab_permission($sub_menu_id,$user_role_id);
       
        $data["transportation_means"]  = $this->HrModel->get_transportation_means();
         $data["travel_request"]  = $this->HrModel->get_travel_request();
        $data["travel_verified_request"]  = $this->HrModel->get_travel_verified();
        $data["travel_status_filter"]  = $this->HrModel->get_all_travel_status();
		$this->load->view('hr-management/travel',$data);
	}

    public function get_travel_status_by_id(){

        $row_id = $this->input->post('row_id');
        $result = $this->HrModel->get_travel_status_by_id($row_id);
        if ($result) {
            $response = [
                'success' => true,
                'data' => $result
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'item  is  not found'
            ];
        }
        echo json_encode($response);
    
    }
    public function get_new_travel_request()
    {
    $data = $this->HrModel->get_new_travel_request();
    echo json_encode(['data' => $data]);
}

public function get_travel_verified_details()
        {
        $data = $this->HrModel->get_travel_verified_details();
        echo json_encode(['data' => $data]);
        }

    
        public function get_travel_approved_details()
        {
            $data = $this->HrModel->get_travel_approved_details();
            echo json_encode(['data' => $data]);
        }

         // load data table
             
         public function get_travel_details(){
            $data = $this->HrModel->get_travel_details();
            echo json_encode(['data' => $data]);
        }
    // load data table

      // save
      public function save_travel_status(){
        $flag_id=(int)$this->input->post('flag_id');

        $data = array(
            'employee_id' => $this->input->post('employee_id_employee_travel'),
            'date_of_request' => $this->input->post('date_of_request'),
            'means_of_transportation_id' => $this->input->post('means_of_transportation_id'),   
            'purpose_of_travel' => $this->input->post('purpose_of_travel'),   
            'travel_from_place' => $this->input->post('travel_from_place'),   
            'travel_to_place' => $this->input->post('travel_to_place'),   
            'travel_date' => $this->input->post('travel_date'),   
            'return_date' => $this->input->post('return_date'),   
            'notes' => $this->input->post('travel_notes'),   
            'estimated_cost' => $this->input->post('estimated_cost'),   
            'travel_request_status_id' => '1',   
            
        );  
        if ($flag_id == "0") {
            $data['created_by'] = $_SESSION['user_id'];
             $data['created_on'] = date('Y-m-d H:i:s');
         
            $res = $this->HrModel->insert_travel_status($data);
        }

        else if ($flag_id == "1") {// in edit 
        $row_id = $this->input->post('row_id'); 
        $data['modified_by'] = $_SESSION['user_id'];
        $data['modified_on'] = date('Y-m-d H:i:s');
        $res = $this->HrModel->update_travel_status($data,$row_id);
        }
        if($res)
            {
                $response = array(
                    'success' => true,
                    'message' => 'saved successfully .'
                );
            }
            else
            {
                $response = array(
                'success' => false,
                'message' => 'Error saving item. Please try again.'
                );
            }
        
            echo json_encode($response);

    }
    // ./save

 // delete by id 
             
 public function delete_travel_status_by_id(){

    $row_id = $this->input->post('row_id');
    $result = $this->HrModel->delete_travel_status_by_id($row_id);
    if ($result) {
        $response = [
            'success' => true,
            'data' => $result
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'item  is  not found'
        ];
    }
    echo json_encode($response);

}
//./ delete by id 
 // travel status employee name get option through ajax
 public function get_travel_employee_name_option()
 {
     $employee_name= $this->HrModel->get_travel_employee_name_option();
     $data = json_encode($employee_name);
     
     $this->output
         ->set_content_type('application/json')
         ->set_output($data);
 }
 // travel status employee name get option through ajax

   // ./get travel request by id
   public function get_travel_new_request_by_id(){

    $row_id = $this->input->post('row_id');
    $result = $this->HrModel->get_travel_new_request_by_id($row_id);
    if ($result) {
        $response = [
            'success' => true,
            'data' => $result
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'item  is  not found'
        ];
    }
    echo json_encode($response);

}
// ./travel new request by id

public function save_new_travel_request(){
    $flag_id=(int)$this->input->post('flag_id');
    $new_travel_status=$this->input->post('employee_newtravel_request_travel_request_status_id');
    if( $new_travel_status =='2')
        {
            $data = array(
    
                'travel_request_status_id' => $this->input->post('employee_newtravel_request_travel_request_status_id'),  
                'is_verified' =>'yes',  
                'verified_by' =>$_SESSION['user_id'], 
                'verified_on' => date('Y-m-d H:i:s'), 
            
            );  
        }
    else if( $new_travel_status =='3')
        {
            $data = array(
    
                'travel_request_status_id' => $this->input->post('employee_newtravel_request_travel_request_status_id'),  
                'is_approved' =>'yes',  
                'approved_by' =>$_SESSION['user_id'], 
                'approved_on' => date('Y-m-d H:i:s'),
            
            );  
        }
    else if( $new_travel_status =='4')
        {
            $data = array(
    
                'travel_request_status_id' => $this->input->post('employee_newtravel_request_travel_request_status_id'),  
                'rejected_on' => date('Y-m-d H:i:s'),
                'rejected_by' =>$_SESSION['user_id'], 
                'rejection_reason' =>$this->input->post('employee_newtravel_request_rejection_reason'), 
            
            );  
        }


    if ($flag_id == "1") {// in edit 
    $row_id = $this->input->post('row_id'); 
    $res = $this->HrModel->save_new_travel_request($data,$row_id);
    }
    if($res)
        {
            $response = array(
                'success' => true,
                'message' => 'saved successfully .'
            );
        }
        else
        {
            $response = array(
            'success' => false,
            'message' => 'Error saving item. Please try again.'
            );
        }
    
        echo json_encode($response);

}
public function get_travel_verified_by_id(){

    $row_id = $this->input->post('row_id');
    $result = $this->HrModel->get_travel_verified_by_id($row_id);
    if ($result) {
        $response = [
            'success' => true,
            'data' => $result
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'item  is  not found'
        ];
    }
    echo json_encode($response);

}

public function save_travel_verified(){
    $flag_id=(int)$this->input->post('flag_id');
    $travel_verified=$this->input->post('employee_travel_verified_travel_request_status_id');

  if( $travel_verified =='3')
    {  
        $data = array(
            'travel_request_status_id' => $travel_verified,  
             'is_approved' =>'yes',  
             'approved_by' =>$_SESSION['user_id'],
             'approved_on' => date('Y-m-d H:i:s'),
           
        );  
    }
    else if( $travel_verified =='4')
    {
        $data = array(

            'travel_request_status_id' => $this->input->post('employee_newtravel_request_travel_request_status_id'),  
            'rejected_on' => date('Y-m-d H:i:s'),
            'rejected_by' =>$_SESSION['user_id'], 
            'rejection_reason' =>$this->input->post('employee_travel_verified_rejection_reason'), 
        );  
    }

   

    if ($flag_id == "1") 
    {// in edit 
        $row_id = $this->input->post('row_id'); 
        $res = $this->HrModel->save_travel_verified($data,$row_id);
    }
    if($res)
        {
            $response = array(
                'success' => true,
                'message' => 'saved successfully .'
            );
        }
        else
        {
            $response = array(
            'success' => false,
            'message' => 'Error saving item. Please try again.'
            );
        }
    
        echo json_encode($response);

}
// public function get_travel_employee_name_option()
// {
//     $employee_name= $this->HrModel->get_travel_employee_name_option();
//     $data = json_encode($employee_name);
    
//     $this->output
//         ->set_content_type('application/json')
//         ->set_output($data);
// }

public function get_travel_approved_by_id(){

    $row_id = $this->input->post('row_id');
    $result = $this->HrModel->get_travel_approved_by_id($row_id);
    if ($result) {
        $response = [
            'success' => true,
            'data' => $result
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'item  is  not found'
        ];
    }
    echo json_encode($response);

}

public function get_employee_skills(){
    $data = $this->HrModel->get_employee_skills();
    echo json_encode(['data' => $data]);
}


public function save_employee_skill(){
    $flag_id=(int)$this->input->post('flag_id');
    $data = array(
     
        'employee_id' => $this->input->post('employee_id_employee_skill'),
        'skill_id' => $this->input->post('skill_id_employee_skill'),
        'details' => $this->input->post('details_employee_skill'),   
    );
    if ($flag_id == "0") {
        $data['created_by'] = $_SESSION['user_id'];
        $data['created_on'] = date('Y-m-d H:i:s');
         $res = $this->HrModel->insert_employee_skills($data);
    
    }

    elseif ($flag_id == "1") {// in edit 
     $row_id = $this->input->post('row_id'); 
    $data['modified_by'] = $_SESSION['user_id'];
    $data['modified_on'] = date('Y-m-d H:i:s');
   
    $res = $this->HrModel->update_employee_skills($data,$row_id);
    }
    if($res)
        {
            $response = array(
                'success' => true,
                'message' => 'saved successfully .'
            );
        }
        else
        {
            $response = array(
            'success' => false,
            'message' => 'Error saving item. Please try again.'
            );
        }
    
        echo json_encode($response);

}


public function get_employee_skill_by_id(){

    $row_id = $this->input->post('row_id');
    $result = $this->HrModel->get_employee_skill_by_id($row_id);

    if ($result) {
        $response = [
            'success' => true,
            'data' => $result
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'item  is  not found'
        ];
    }
    echo json_encode($response);

}
public function delete_employee_skill_by_id()
{
    $row_id  = $this->input->post('row_id');
    $res = $this->HrModel->delete_employee_skill_by_id($row_id);

    $response = ['success' => true, 'message' => ' deleted successfully'];
    echo json_encode($response);
}

public function get_employee_head_name() {
    // echo "inside get_employee_head_name";
    $departmentId = $this->input->post('department_id');
    // echo "dept id is".$departmentId;
    $employeeHeadId = $this->HrModel->get_employee_head_name($departmentId);
    $this->output
         ->set_content_type('application/json')
         ->set_output(json_encode(['employee_head_id_in_employee' => $employeeHeadId]));
}




public function generate_pdf_for_employee_skills() {
   
    ob_start();

    require_once(APPPATH . 'third_party/tcpdf/tcpdf.php');

    
    $employee_skills = $this->HrModel->get_employee_skills();

 
    $pdf = new TCPDF();
    $pdf->SetCreator('Your Creator');
    $pdf->SetAuthor('Your Author');
    $pdf->SetTitle('Employee Skills PDF');
    $pdf->SetSubject('Employee Skills Data');
    $pdf->SetKeywords('Employee, Skills, PDF');
    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 12);

    
    $pdf_content = $this->load->view('hr-management/pdf_template', ['employee_skills' => $employee_skills], true);

   
    $pdf->writeHTML($pdf_content, true, false, true, false, '');

    
    $pdf->Output('employee_skills.pdf', 'D');

   
    exit();
}









public function generate_pdf_for_state_list() {
    ob_start();

    require_once(APPPATH . 'third_party/CustomTCPDF.php'); // Include your custom TCPDF class
    $state_list = $this->HrModel->get_state_list();

    $reportTitle ='State list from header';
    $pdf = new CustomTCPDF($reportTitle);
   
    $pdf->SetMargins(PDF_MARGIN_LEFT, 20, PDF_MARGIN_RIGHT);
    

    $pdf->SetCreator('Your Creator');
    $pdf->SetAuthor('Your Author');
    $pdf->SetTitle('State List PDF');
    $pdf->SetSubject('State List Data');
    $pdf->SetKeywords('State, List, PDF');
    $pdf->SetFont('helvetica', '', 12);

    $itemsPerPage = 40;

    $startIndex = 0;
    $totalItems = count($state_list);
    $pageCount = 1;

    while ($startIndex < $totalItems) {
        $pdf->AddPage();

        $currentItems = array_slice($state_list, $startIndex, $itemsPerPage);

        // Check if it's the first page and add the main heading
        // if ($pageCount === 1) {
        //     $content = '<h1 style="text-align: center;">State List Report</h1>';
        //     $content .= $this->load->view('hr-management/pdf_state_list', ['state_list' => $currentItems, 'pageCount' => $pageCount], true);
        // } 
        // else {
            $content = $this->load->view('hr-management/pdf_state_list', ['state_list' => $currentItems, 'pageCount' => $pageCount], true);
        // }

        $pdf->writeHTML($content, true, false, true, false, '');

        $startIndex += $itemsPerPage;
        $pageCount++;
    }

    $pdf->Output('state_list.pdf', 'D');
    exit();
}



public function generate_pdf_for_employee_list() {
    $company_id_in_hr = $this->session->userdata('company_id_in_hr');
    ob_start();

    require_once(APPPATH . 'third_party/CustomTCPDF.php'); 
    $employee_list = $this->HrModel->get_employee_details($company_id_in_hr);

    $company_info = $this->HrModel->get_compamny_structure_details();

    if (!empty($company_info)) {
        // $company_name = $company_info[0]->company_name; 
        // $address_line_1 = $company_info[0]->address_line1; 
        // $address_line_2 = $company_info[0]->address_line2; 
        $company_name = '<span style="font-size: 23px;"><b>' . $company_info[0]->company_name . '</b></span>'; 
        $address_line_1 = '<span style="font-size: 10px;"><i>' . $company_info[0]->address_line1 . '</i></span>'; 
        $address_line_2 = '<span style="font-size: 10px;"><i>' . $company_info[0]->address_line2 . '</i></span>'; 

       
        $reportTitle = $company_name . '<br>' . $address_line_1 . '<br>' . $address_line_2;

        $pdf = new CustomTCPDF($reportTitle);
      
    } else {
        // Handle the case when company information is not available
        echo "Company information not found.";
    }
    // $reportTitle = "BRQ Associates<br>Subtitle Line 1<br>Subtitle Line 2";
   
    

    $pdf = new CustomTCPDF($reportTitle);
    $pdf->SetMargins(PDF_MARGIN_LEFT, 25, PDF_MARGIN_RIGHT);


    $pdf->SetCreator('Your Creator');
    $pdf->SetAuthor('Your Author');
    $pdf->SetTitle('Employee List');
    $pdf->SetSubject('State List Data');
    $pdf->SetKeywords('State, List, PDF');
    $pdf->SetFont('helvetica', '', 12);

    $itemsPerPage = 40;

    $startIndex = 0;
    $totalItems = count($employee_list);
    $pageCount = 1;

    while ($startIndex < $totalItems) {
        $pdf->AddPage();

        $currentItems = array_slice($employee_list, $startIndex, $itemsPerPage);

            $content = $this->load->view('hr-management/PdfTemplates/pdf_employee_list', ['employee_list' => $currentItems, 'pageCount' => $pageCount], true);
        
        $pdf->writeHTML($content, true, false, true, false, '');
        

        $startIndex += $itemsPerPage;
        $pageCount++;
    }

    $pdf->Output('employee_list.pdf', 'D');
    exit();
}

public function get_employee_team_master_details_for_modal()
{
    $id = $this->input->post('id');
$data = $this->HrModel->get_employee_team_master_details_for_modal($id);
echo json_encode(['data' => $data]);
}


public function generate_pdf_for_teams() {
    ob_start();
    require_once(APPPATH . 'third_party/CustomTCPDF.php'); 

    // Retrieve necessary data
    $id = $this->input->post('id');
    $company_info = $this->HrModel->get_compamny_structure_details();
    $employee_team_details = $this->HrModel->get_employee_team_master_details_for_modal($id);

    if (!empty($company_info)) {
        // Retrieve company information for the header
        $company_name = '<span style="font-size: 23px;"><b>' . $company_info[0]->company_name . '</b></span>'; 
        $address_line_1 = '<span style="font-size: 10px;"><i>' . $company_info[0]->address_line1 . '</i></span>'; 
        $address_line_2 = '<span style="font-size: 10px;"><i>' . $company_info[0]->address_line2 . '</i></span>'; 
        $reportTitle = $company_name . '<br>' . $address_line_1 . '<br>' . $address_line_2;
        
        // Initialize TCPDF
        $pdf = new CustomTCPDF($reportTitle);
        $pdf->SetMargins(PDF_MARGIN_LEFT, 25, PDF_MARGIN_RIGHT);
        $pdf->AddPage();

        // Generate PDF content from view and pass necessary data
        $content = $this->load->view('hr-management/PdfTemplates/pdf_employee_team_details', ['employee_team_details' => $employee_team_details, 'pageCount' => $pageCount], true);
        
        // Write HTML content to PDF
        $pdf->writeHTML($content, true, false, true, false, '');

        // Output the PDF
        $pdf->Output('generated_pdf_from_modal.pdf', 'D');
        exit();
    } else {
        echo "Company information not found.";
    }
}



public function get_menu_list($role="")
{
 
     $result             = $this->HrMenuModel->get_main_menu_permission($role);
     $data['mainMenu']   = $result;
     
     $data['sub_menus'] = array();
    
     foreach ($data['mainMenu'] as $main_item) {
         $main_item->sub_menu = $this->HrMenuModel->get_sub_menu_permission($main_item->id,$role);
         $data['sub_menus'][$main_item->id] = $main_item->sub_menu;
     }
    
     return $data;
        //  echo json_encode($data);
}

//   public function get_menu_list1($role="")
//   {
//         $this->load->model('hr-management/User_rights_model');
    
//         $result             = $this->User_rights_model->get_main_menu($role);
//         $data['mainMenu']   = $result;
        
//         $data['sub_menus'] = array();
    
//         foreach ($data['mainMenu'] as $main_item) {
//             $main_item->sub_menu = $this->User_rights_model->get_sub_menu($main_item->id,$role);
//             $data['sub_menus'][$main_item->id] = $main_item->sub_menu;
//         }
        
//             echo json_encode($data);
//   }
   
   
   
public function user_rights()
   {
       
        // $this->load->model('hr-management/User_rights_model');
        $res                = $this->HrMenuModel->get_user_role();
        $user_role_id                    = $_SESSION['USER_ROLE_ID'];

        $data                          =$this->get_menu_list($user_role_id);
        $data2["tab"]                  =$this->HrMenuModel->get_sub_menu_tab_permission($sub_menu_id,$user_role_id);
      
        $data['userRole']   = $res;
        $data['li_token']	=$_SESSION['li_token'];
        $data 			    = (object) array_merge((array) $data,(array) $data2);
		$this->load->view('hr-management/user_rights',$data);
   }


   public function  get_all_menu_list($role="")
   {
       // $this->load->model('hr-management/User_rights_model');
       
           $result             = $this->HrMenuModel->get_all_main_menu_permission($role);
           $data['mainMenu']   = $result;
           
           $data['sub_menus'] = array();
       
           foreach ($data['mainMenu'] as $main_item) {
               $main_item->sub_menu = $this->HrMenuModel->get_all_sub_menu_permission($main_item->id,$role);
               $data['sub_menus'][$main_item->id] = $main_item->sub_menu;
                foreach($data['sub_menus'][$main_item->id] as $sub_menu)
                   {
                       
                       $sub_menu->sub_menu_tab =   $this->HrMenuModel -> get_all_sub_menu_tab_permission($sub_menu->id,$role);
                       
                       $data['sub_menu_tab'][$sub_menu->id]   =   $sub_menu->sub_menu_tab;
                      
                   }
                   
           }
           
        
               echo json_encode($data);
   }


   public function save_menu_permission()
   {
      
       // $userId                 = $this->input->post('user_id');
      $role                    = $this->input->post('user_role');
      $selectedMainMenuItems   = $this->input->post('main_Menu');
      $selectedSubMenus        = $this->input->post('submenu');
      $selectedSubMenuTab      = $this->input->post('submenutab');
      $selectedSubMenuTabadd      = $this->input->post('submenutabadd');
      $selectedSubMenuTabedit      = $this->input->post('submenutabedit');
      $selectedSubMenuTabview      = $this->input->post('submenutabview');
      $selectedSubMenuTabdelete      = $this->input->post('submenutabdelete');
      $token                   = $this->input->post('li_token');
       $allSubMenuIds          = array();
        $allMenuIds            	  =$this->HrMenuModel->get_all_main_menu_permission($role);
        
  foreach ($allMenuIds as $menu) {
       $menuId=$menu->id;
       $data = array(
           
           'is_granted'   => in_array($menuId, $selectedMainMenuItems) ? 'yes' : 'no',
       );
       $where  = "main_menu_id='{$menuId}' AND role_id='{$role}'";
       $result= $this->HrMenuModel->update_main_menu_permission($data,$where);
       $allSubMenuIds=$this->HrMenuModel->get_all_sub_menu_permission($menu->id,$role);
       
       foreach ($allSubMenuIds as $subMenu) {
           $subMenuId=$subMenu->id;
           $data = array(
               
               'is_granted'   => in_array($subMenuId, $selectedSubMenus) ? 'yes' : 'no',
           );
           $where  = "sub_menu_id='{$subMenuId}' AND role_id='{$role}'";
           $sub_menu_result= $this->HrMenuModel->update_sub_menu_permission($data,$where);
           $allSubMenuTabIds=$this->HrMenuModel->get_all_sub_menu_tab_permission($subMenuId,$role);

               foreach ($allSubMenuTabIds as $subMenuTab) {
                   $subMenuTabId=$subMenuTab->id;
                   $data = array(
                       
                       'is_granted'   => in_array($subMenuTabId, $selectedSubMenuTab) ? 'yes' : 'no',
                       'is_add'       => in_array($subMenuTabId, $selectedSubMenuTabadd) ? 'yes' : 'no',
                       'is_edit'      => in_array($subMenuTabId, $selectedSubMenuTabedit) ? 'yes' : 'no',
                       'is_view'      => in_array($subMenuTabId, $selectedSubMenuTabview) ? 'yes' : 'no',
                       'is_delete'      => in_array($subMenuTabId, $selectedSubMenuTabdelete) ? 'yes' : 'no',
                       
                   );
                   $where  = "sub_menu_tab_id='{$subMenuTabId}' AND role_id='{$role}'";
                   $sub_menu_tab_result= $this->HrMenuModel->update_sub_menu_tab_permission($data,$where);
               }
       
       }
   }
      $_SESSION['ROLE_ID']=$role;
       if($result||$sub_menu_result||$sub_menu_tab_result)
       {
           $data= array();
           
            $res                = $this->HrMenuModel->get_user_role();
            $user_role_id                    = $_SESSION['USER_ROLE_ID'];
   
           $data                          =$this->get_menu_list($user_role_id);
           $data2["tab"]                  =$this->HrMenuModel->get_sub_menu_tab_permission($sub_menu_id,$user_role_id);
           // $data['role']       =$role;
           $data['Success']    ="Permission is updated Successfully..";
           $data['userRole']   = $res;
           $data['li_token']	=$_SESSION['li_token'];
           
           $data 			    = (object) array_merge((array) $data,(array) $data2);
           
           // $this->user_rights($data);
           return $this->load->view('hr-management/user_rights', $data);
       }
           // $this->user_rights();
       else
       {
           $data= array();
           $res                = $this->HrMenuModel->get_user_role();
            $user_role_id                    = $_SESSION['USER_ROLE_ID'];
   
           $data                          =$this->get_menu_list($user_role_id);
           $data2["tab"]                  =$this->HrMenuModel->get_sub_menu_tab_permission($sub_menu_id,$user_role_id);
           $data['role']       =$role;
           $data['Success']    ="Some issues in updation ... ";
            $data['userRole']   = $res;
           $data['li_token']	=$_SESSION['li_token'];
           
           $data 			    = (object) array_merge((array) $data,(array) $data2);
           return $this->load->view('hr-management/user_rights', $data);
       }
   }


    //LIST OF FUNCTIONS AFTER UPDATION///////////


    public function calender($sub_menu_id=""){

        $data = array();
        $user_role_id                    = $_SESSION['USER_ROLE_ID'];
        $data                          =$this->get_menu_list($user_role_id);
        $data2["tab"]                  =$this->HrMenuModel->get_sub_menu_tab_permission($sub_menu_id,$user_role_id);

        $data["week_days"]  = $this->HrModel->get_week_days();

        $data 			   = (object) array_merge((array) $data,(array) $data2);
      
        $this->load->view('hr-management/calender',$data);
    
    }


    function save_calender_details()
{
    $company_id_in_hr = $this->session->userdata('company_id_in_hr');
    $calender_master_data = array(
        'company_id' => $company_id_in_hr,
        'calendar_start_date' => $_POST['calendar_start_date'],
        'calendar_end_date' => $_POST['calendar_end_date'],
        'year_name' => $_POST['year_name'],
        'effective_from' => $_POST['effective_from'],
        'effective_to' => $_POST['effective_to'],
        'created_by' => $_SESSION['user_id'],
        'created_on' => date("Y-m-d H:i:s"),
    );

    $calendar_master_id = $this->HrModel->insert_calendar_master($calender_master_data);

    if ($calendar_master_id) {
        $start_times = $_POST['start_time']; 
       
        $end_times = $_POST['end_time'];
      
        $start_time_formatted = [];
        $end_time_formatted = [];
        $all_days = [1, 2, 3, 4, 5, 6, 7]; // Array of all possible days
        
        foreach ($start_times as $start_hour) {
            $start_time_formatted[] = date('H:i:s', strtotime("$start_hour:00"));
        }

        foreach ($end_times as $end_hour) {
            $end_time_formatted[] = date('H:i:s', strtotime("$end_hour:00"));
        }

        foreach ($all_days as $value) {
            $is_working_day = (in_array($value, $_POST['working_day_id'])) ? 'yes' : 'no'; 
            
            $calender_details_data = array(
                'calendar_master_id' => $calendar_master_id,
                'week_day_id' => $value,
                'start_time' => $start_time_formatted[$value - 1], // Adjust index for start time
                'end_time' => $end_time_formatted[$value - 1], // Adjust index for end time
                'is_working_day' => $is_working_day, 
            );

         

            $insertedRowId = $this->HrModel->insert_calendar_details($calender_details_data);
        }

        $this->populate_hr_calendar_year(
            $calendar_master_id,
            $_POST['calendar_start_date'],
            $_POST['calendar_end_date'],
            $start_time_formatted, 
            $end_time_formatted,
            $_POST['working_day_id'],
          
        );
    

        $response = array(
            'success' => true,
            'message' => 'Saved successfully.',
            'calendar_master_id' => $calendar_master_id // Send inserted ID in the response
        );
    } 
    else {
        $response = array(
            'success' => false,
            'message' => 'Error in saving master calendar data.',
        );
    }

    echo json_encode($response);
}

public function get_calender_details_by_id() {
    $calender_master_id = $this->input->post('row_id');
    $weekDaysData = $this->HrModel->get_calender_details_by_id($calender_master_id);
    $calendarMasterData = $this->HrModel->fetch_calendar_master_data();
    
    $data = array(
        'weekDaysData' => $weekDaysData,
        'calendarMasterData' => $calendarMasterData
    );

    header('Content-Type: application/json'); 
    echo json_encode($data); // Encode the combined data
}

public function delete_calender_master() {
    $row_id = $this->input->post('row_id');
    $result_master = $this->HrModel->delete_calendar_master($row_id);

    if ($result_master) {
        
        $response = array('success' => true, 'message' => 'Calendar details deleted successfully.');
    } else {
        $response = array('success' => false, 'message' => 'Failed to delete calendar details.');
    }
    echo json_encode($response);
}

function edit_calender_details()
{
    $row_id = $_POST['row_id'];
  
    $dynamic_calendar_detail_id = $_POST['calendar_detail_ids_edit'];
    $id_array = explode(',', $dynamic_calendar_detail_id);

    $calender_master_data = array(
        'calendar_start_date' => $_POST['calendar_start_date_edit'],
        'calendar_end_date' => $_POST['calendar_end_date_edit'],
        'year_name' => $_POST['year_name_edit'],
        'effective_from' => $_POST['effective_from_edit'],
        'effective_to' => $_POST['effective_to_edit'],
        'modified_by' => $_SESSION['user_id'],
        'modified_on' => date("Y-m-d H:i:s"),
    );

    $this->HrModel->update_calendar_master($calender_master_data, $row_id);

    // Generating arrays for start and end times
    $start_times = $_POST['start_time_edit']; 
    $end_times = $_POST['end_time_edit']; 
    $start_time_formatted = [];
    $end_time_formatted = [];
    $all_days = [1, 2, 3, 4, 5, 6, 7]; // Array of all possible days
            
     // Formatting start and end times
    foreach ($start_times as $start_hour) {
        $start_time_formatted[] = date('H:i:s', strtotime("$start_hour:00"));
    }

    foreach ($end_times as $end_hour) {
        $end_time_formatted[] = date('H:i:s', strtotime("$end_hour:00"));
    }

     // Iterating through each day and updating calendar details
    foreach ($id_array as $index => $dynamic_calendar_detail_id) {
          // Checking if the index exists in the array of all possible days
        if (isset($all_days[$index])) {
               // Retrieving the day number from the array
            $value = $all_days[$index];

            // Determining if it's a working day based on the POST data
            if (in_array($value, $_POST['working_day_id_edit'])) {
                $is_working_day = 'yes';
            } else {
                $is_working_day = 'no';
            }
                
             // Building array for calendar details data
            $calender_details_data = array(
                'start_time' => $start_time_formatted[$index], 
                'end_time' => $end_time_formatted[$index],
                'is_working_day' => $is_working_day, 
            );
                
             
            $this->HrModel->update_calendar_details($calender_details_data, $dynamic_calendar_detail_id);
        }
    }

    $this->update_hr_calendar_year(
        $row_id,
        $_POST['calendar_start_date_edit'],
        $_POST['calendar_end_date_edit'],
        $start_time_formatted,
        $end_time_formatted,
        $_POST['working_day_id_edit']
    );


    $response = array(
        'success' => true,
        'message' => 'Updated Successfully.',
    );

    echo json_encode($response);
}

function update_hr_calendar_year($calendar_master_id, $calendar_start_date, $calendar_end_date, $start_times, $end_times, $working_days)
{
    $current_date = new DateTime($calendar_start_date);
    $end_date = new DateTime($calendar_end_date);

    while ($current_date <= $end_date) {
        $day_of_week = $current_date->format('N'); // Get day of the week (1 = Monday, 2 = Tuesday, ..., 7 = Sunday)
        $is_working_day = (in_array($day_of_week, $working_days)) ? 'yes' : 'no';

     
        $calendar_year_data = array(
            'calendar_master_id' => $calendar_master_id,
            'date_of_the_day' => $current_date->format('Y-m-d'),
            'start_time' => $start_times[$day_of_week - 1], // Adjust index for start time
            'end_time' => $end_times[$day_of_week - 1], // Adjust index for end time
            'is_working_day' => $is_working_day,
        );

        
        $this->HrModel->update_calendar_year($calendar_year_data);

        
        $current_date->modify('+1 day');
    }
}


public function populate_hr_calendar_year($calendar_master_id, $calendar_start_date, $calendar_end_date, $start_times, $end_times, $working_days) {
    $current_date = new DateTime($calendar_start_date);
    $end_date = new DateTime($calendar_end_date);

    while ($current_date <= $end_date) {
        $day_of_week = $current_date->format('N'); // Get day of the week (1 = Monday, 2 = Tuesday, ..., 7 = Sunday)
        $is_working_day = (in_array($day_of_week, $working_days)) ? 'yes' : 'no';

        // Create a record for each day in the date range
        $calendar_year_data = array(
            'calendar_master_id' => $calendar_master_id,
            'date_of_the_day' => $current_date->format('Y-m-d'),
            'start_time' => $start_times[$day_of_week - 1], // Adjust index for start time
            'end_time' => $end_times[$day_of_week - 1], // Adjust index for end time
            'is_working_day' => $is_working_day,
        );

         $this->HrModel->insert_calendar_year($calendar_year_data);

        // Move to the next day
        $current_date->modify('+1 day');
    }

  
}

public function get_calandar_details()
{
    $data = $this->HrModel->get_calandar_details();
    echo json_encode(['data' => $data]);
}

public function get_calendar_holidays_details(){
    $data = $this->HrModel->get_calendar_holidays_details();
    echo json_encode(['data' => $data]);
}


public function get_calender_master_details() {

    $calendar_master_details = $this->HrModel->getCalendarMasterDetails();

    header('Content-Type: application/json');
    echo json_encode($calendar_master_details);
}

public function get_calender_master_dates(){

    $selectedCalendarMasterId = $this->input->post('calendar_master_id');
    // echo $selectedCalendarMasterId;
    $calendarDates = $this->HrModel->get_calender_master_dates($selectedCalendarMasterId);
    header('Content-Type: application/json');
    echo json_encode($calendarDates);

}

public function save_calendar_holidays_details() {
    $data = array(
        'calendar_master_id' => $this->input->post('holidays_calendar_master_id'),
        'holiday_date' => $this->input->post('holiday_date'),
        'holiday_description' => $this->input->post('holiday_description'),
        'created_by' => $this->session->userdata('user_id'),
        'created_on' => date("Y-m-d H:i:s"),
    );

    $flag_id = $_POST['flag_id'];
    $row_id = $_POST['row_id'];

    $result = false;

    if ($flag_id === "0") {
        $result = $this->HrModel->save_calendar_holidays_details($data);
    }
    elseif ($flag_id === "1") {
        $data['modified_by'] = $_SESSION['user_id'];
        $data['modified_on'] = date('Y-m-d H:i:s');
          $result = $this->HrModel->update_calendar_holidays_details($data,$row_id);
    }

    if ($result) {
        $response = array('success' => true, 'message' => 'Holiday details saved successfully.');
    } else {
        $response = array('success' => false, 'message' => 'Failed to save holiday details.');
    }

    $this->output->set_content_type('application/json')->set_output(json_encode($response));
}

public function get_calendar_holidays_details_by_id()
{
    $row_id = $this->input->get('row_id');

    $result = $this->HrModel->get_calendar_holidays_details_by_id($row_id);

    if ($result) {
        $response = [
            'success' => true,
            'data' => $result
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Not found'
        ];
    }

    echo json_encode($response);
}

public function delete_calendar_holidays_by_id() {
    $row_id = $this->input->post('row_id');
    $result_master = $this->HrModel->delete_calendar_holidays_by_id($row_id);

    if ($result_master) {
        
        $response = array('success' => true, 'message' => 'Deleted successfully.');
    } else {
        $response = array('success' => false, 'message' => 'Failed to delete calendar details.');
    }
    echo json_encode($response);
}

public function get_calendar_event_details(){
    $data = $this->HrModel->get_calendar_event_details();
    echo json_encode(['data' => $data]);
}


public function save_calendar_events_details() {
    $data = array(
        'calendar_master_id' => $this->input->post('events_calendar_master_id'),
        'event_start_date' => $this->input->post('event_start_date'),
        'event_end_date' => $this->input->post('event_end_date'),
        'event_start_time' => $this->input->post('event_start_time'), 
        'event_end_time' => $this->input->post('event_end_time'), 
        'event_name' => $this->input->post('event_name'),
        'event_description' => $this->input->post('event_description'),
        'created_by' => $this->session->userdata('user_id'),
        'created_on' => date("Y-m-d H:i:s"),
    );
  
    

    $flag_id = $_POST['flag_id'];
    $row_id = $_POST['row_id'];

    $result = false;

    if ($flag_id === "0") {
        $result = $this->HrModel->save_calendar_events_details($data);
    }
    elseif ($flag_id === "1") {
        $data['modified_by'] = $_SESSION['user_id'];
        $data['modified_on'] = date('Y-m-d H:i:s');
          $result = $this->HrModel->update_calendar_events_details($data,$row_id);
    }

    if ($result) {
        $response = array('success' => true, 'message' => 'Saved successfully.');
    } else {
        $response = array('success' => false, 'message' => 'Failed to Save .');
    }

    $this->output->set_content_type('application/json')->set_output(json_encode($response));
}


public function get_calendar_events_details_by_id()
{
    $row_id = $this->input->get('row_id');
    $result = $this->HrModel->get_calendar_events_details_by_id($row_id);

    if ($result) {
        $response = [
            'success' => true,
            'data' => $result
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Not found'
        ];
    }

    echo json_encode($response);
}


public function  employee_overtime($sub_menu_id=""){

    $company_id_in_hr = $this->session->userdata('company_id_in_hr');
    $data = array();
    $user_role_id                  = $_SESSION['USER_ROLE_ID'];
    $data                          =$this->get_menu_list($user_role_id);
    $data2["tab"]                  =$this->HrMenuModel->get_sub_menu_tab_permission($sub_menu_id,$user_role_id);
                    
  
    $data["employee_names"]  = $this->HrModel->get_employee_name_options();
    // var_dump($employee_names);
    // die;
    $data["overtime_category"]  = $this->HrModel->get_overtime_category_option();
    $data["ovetime_status"]  = $this->HrModel->get_overtime_new_request_status();
    $data 			         = (object) array_merge((array) $data,(array) $data2);
    $this->load->view('hr-management/employee_overtime',$data);

}

public function get_overtime_details()
{
    $data = $this->HrModel->get_overtime_details();
    
    echo json_encode(['data' => $data]);
}

public function get_overtime_rate() {
   
    $category_id = $this->input->post('category_id');
    $overtime_rate = $this->HrModel->get_overtime_rate($category_id);

    $response = array('overtime_rate' => $overtime_rate);
    header('Content-Type: application/json');
    echo json_encode($response);
}


public function save_overtime_details()
{
    $company_id_in_hr = $this->session->userdata('company_id_in_hr');
    $data = array(
        
        'company_id' => $company_id_in_hr,
        'employee_id' => $this->input->post('employee_id'),
        'date_of_request' => $this->input->post('date_of_request'),
        'overtime_category_id' => $this->input->post('overtime_category_id'),
        'overtime_date' => $this->input->post('overtime_date'),
        'overtime_time_from' => $this->input->post('overtime_time_from'),
        'overtime_rate_per_hour' => $this->input->post('overtime_rate_per_hour'),
       
        'overtime_time_to' => $this->input->post('overtime_time_to'),
        'hours_worked' => $this->input->post('hours_worked'),
        'overtime_rate' => $this->input->post('overtime_rate'),
        'overtime_amount' => $this->input->post('overtime_amount'),
        'remarks' => $this->input->post('remarks'),
        'overtime_request_status_id' => '1',
        'created_by' => $_SESSION['user_id'],
        'created_on' => date('Y-m-d H:i:s'),
    );

    $flag_id=$_POST['flag_id'];
    if ($flag_id === "0") {
        $this->db->insert('hr_overtime_register', $data);
    } 
    elseif ($flag_id === "1") {
        $data['modified_by'] = $_SESSION['user_id'];
        $data['modified_on'] = date('Y-m-d H:i:s');       
        $row_id = $this->input->post('row_id'); 
        $res = $this->HrModel->update_overtime_requests_details($row_id,  $data);
    }  
    $response = array(
        'success' => true,
        'message' => 'Saved successfully.'
    );
    // Send the JSON response
    echo json_encode($response);
}

public function get_overtime_request_by_id()
{
  
    $row_id = $this->input->get('row_id'); 
   
//    echo "row id is".$row_id 
    $result = $this->HrModel->get_overtime_request_by_id($row_id);

    if ($result) {
        $response = [

            'success' => true,
            'data' => $result
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Not found'
        ];
    }

    echo json_encode($response);
}

public function get_new_overtime_details()
{
    $data = $this->HrModel->get_new_overtime_details();
    
    echo json_encode(['data' => $data]);
}

public function get_new_overtime_request_by_id(){

    $row_id = $this->input->get('row_id');
    // $flag_id = $this->input->get('row_id');
    $result = $this->HrModel->get_new_overtime_request_by_id($row_id);
    if ($result) {
        $response = [
            'success' => true,
            'data' => $result
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'item  is  not found'
        ];
    }
    echo json_encode($response);

}


public function save_new_overtime_request() {
    $flag_id = (int)$this->input->post('flag_id');
    $new_overtime_request_status_id = $this->input->post('new_overtime_request_status_id');

    if ($new_overtime_request_status_id == '2') {
        $data = array(
            'overtime_request_status_id' => $this->input->post('new_overtime_request_status_id'),  
            'is_verified' => 'yes',  
            'verified_by' => $_SESSION['user_id'], 
            'verified_on' => date('Y-m-d H:i:s'), 
        );  
    } else if ($new_overtime_request_status_id == '3') {
        $data = array(
            'overtime_request_status_id' => $this->input->post('new_overtime_request_status_id'),  
            'is_approved' => 'yes',  
            'approved_by' => $_SESSION['user_id'], 
            'approved_on' => date('Y-m-d H:i:s'), 
        );  
    } else if ($new_overtime_request_status_id == '4') {
        $data = array(
            'overtime_request_status_id' => $this->input->post('new_overtime_request_status_id'),  
            'rejected_on' => date('Y-m-d H:i:s'),
            'rejected_by' => $_SESSION['user_id'], 
            'rejection_reason' => $this->input->post('rejection_reason'), 
        );  
    }

    if ($flag_id == "1") { // in edit 
        $row_id = $this->input->post('row_id'); 
        $res = $this->HrModel->save_new_overtime_request($data, $row_id);
    }

    if ($res) {
        $response = array(
            'success' => true,
            'message' => 'Saved successfully.',
        );
    } else {
        $response = array(
            'success' => false,
            'message' => 'Error saving item. Please try again.',
        );
    }

    echo json_encode($response);
}

public function get_overtime_verified_details()
{
    $data = $this->HrModel->get_overtime_verified_details();
    echo json_encode(['data' => $data]);
}
public function get_overtime_verified_by_id() {
    $row_id = $this->input->post('row_id');
    $result = $this->HrModel->fetch_overtime_by_id($row_id);

    if ($result) {
        $response = [
            'success' => true,
            'data' => $result
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Item not found'
        ];
    }

    echo json_encode($response);
}

public function save_overtime_verified(){
    $flag_id=(int)$this->input->post('flag_id');
    $overtime_verified=$this->input->post('verified_overtime_request_status_id');

  if( $overtime_verified =='3')
    {  
        $data = array(
             'overtime_request_status_id' => $overtime_verified,  
             'is_approved' =>'yes',  
             'approved_by' =>$_SESSION['user_id'],
             'approved_on' => date('Y-m-d H:i:s'),
           
        );  
    }
    else if( $overtime_verified =='4')
    {
        $data = array(

            'overtime_request_status_id' => $overtime_verified,  
            'rejected_on' => date('Y-m-d H:i:s'),
            'rejected_by' =>$_SESSION['user_id'], 
            'rejection_reason' =>$this->input->post('verified_overtime_rejection_reason'), 
        );  
    }

   

    if ($flag_id == "1") 
    {// in edit 
        $row_id = $this->input->post('row_id'); 
        $res = $this->HrModel->save_overtime_verified($data,$row_id);
    }
    if($res)
        {
            $response = array(
                'success' => true,
                'message' => 'saved successfully .'
            );
        }
        else
        {
            $response = array(
            'success' => false,
            'message' => 'Error saving item. Please try again.'
            );
        }
    
        echo json_encode($response);

}

public function get_overtime_approved_details()
{
    $data = $this->HrModel->get_overtime_approved_details();
    echo json_encode(['data' => $data]);
}

public function get_overtime_approved_by_id() {
    $row_id = $this->input->post('row_id');
    $result = $this->HrModel->get_overtime_approved_by_id($row_id);

    if ($result) {
        $response = [
            'success' => true,
            'data' => $result
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Item not found'
        ];
    }

    echo json_encode($response);
}

public function save_overtime_approved(){
    $flag_id=(int)$this->input->post('flag_id');
    $overtime_approved=$this->input->post('approved_overtime_request_status_id');

 if( $travel_approved =='4')
    {
        $data = array(

            'overtime_request_status_id' => $overtime_approved,  
            'rejected_on' => date('Y-m-d H:i:s'),
            'rejected_by' =>$_SESSION['user_id'], 
            'rejection_reason' =>$this->input->post('approved_overtime_rejection_reason'), 
        );  
    }

   

    if ($flag_id == "1") 
    {// in edit 
        $row_id = $this->input->post('row_id'); 
        $res = $this->HrModel->save_overtime_approved($data,$row_id);
    }
    if($res)
        {
            $response = array(
                'success' => true,
                'message' => 'saved successfully .'
            );
        }
        else
        {
            $response = array(
            'success' => false,
            'message' => 'Error saving item. Please try again.'
            );
        }
    
        echo json_encode($response);

}

// code by mufee
public function leave()
{
    $data = array();
    $user_role_id                  = $_SESSION['USER_ROLE_ID'];
    $data                          =$this->get_menu_list($user_role_id);
    $data2["tab"]                  =$this->HrMenuModel->get_sub_menu_tab_permission($sub_menu_id,$user_role_id);
    $data["leave"]  = $this->HrModel->get_leave_days();
    $data["calendar_master_details"]  = $this->HrModel->get_calendar_master_id();
    $data["leave_category_details"]  = $this->HrModel->get_leave_category_id();
    $data 			            = (object) array_merge((array) $data,(array) $data2);
    $this->load->view('hr-management/leave',$data);

}
public function get_leave_master()
{
    $data = $this->HrModel->get_leave_master();
    echo json_encode(['data' => $data]);
}

public function save_leave_master_details()
{
    $company_id_in_hr = $this->session->userdata('company_id_in_hr');
    $flag_id = $_POST['flag_id'];
   
    $data = array(

        'company_id' => $company_id_in_hr,
        'calendar_master_id' => $this->input->post('calendar_master_id'),
        'leave_category_id' => $this->input->post('leave_category_id'),
        'number_of_leaves_per_year' => $this->input->post('number_of_leaves_per_year'),
        'maximum_can_be_taken_in_a_month' => $this->input->post('maximum_can_be_taken_in_a_month'),
    
    );


    $flag_id=$_POST['flag_id'];
    if ($flag_id === "0") {
        $data['created_by'] = $_SESSION['user_id'];
        $data['created_on'] = date('Y-m-d H:i:s');
        $this->db->insert('hr_leave_master', $data);

    } 
    elseif ($flag_id === "1") {
          
        $row_id = $this->input->post('row_id'); 
        $data['modified_by'] = $_SESSION['user_id'];
        $data['modified_on'] = date('Y-m-d H:i:s');
        $res = $this->HrModel->update_leave_master($row_id,  $data);
    
    }  
    $response = array(
        'success' => true,
        'message' => 'Saved successfully.'
    );
    
    echo json_encode($response);
}

public function get_leave_master_by_id()
{            
    $row_id = $this->input->get('row_id'); 
                                   
    $result = $this->HrModel->get_leave_master_by_id($row_id);

    if ($result) {
        $response = [

            'success' => true,
            'data' => $result
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Not found'
        ];
    }

    echo json_encode($response);
}

public function delete_leave_master_by_id()
{
    $row_id = $this->input->post('row_id');
    $result = $this->HrModel->delete_leave_master_by_id($row_id);

    if ($result) {
        $response = ['success' => true, 'message' => 'Deleted successfully'];
    } else {
        $response = ['success' => false, 'message' => 'Failed to mark item as deleted'];
    }

    echo json_encode($response);
}


public function get_leave_category_option()
{
    $calendar_master_val = $this->input->post('calendar_master_val');
    $result = $this->HrModel->get_leave_category_option($calendar_master_val);
   
    echo json_encode($result);   
}

public function get_setupdata_overtime_details ()
{
    $data = $this->HrModel->get_setupdata_overtime_details();
    echo json_encode(['data' => $data]);
}


public function save_setupdata_overtime_details()
{
    $data = array(
        'overtime_category'=> $this->input->post('overtime_category'),
        'overtime_rate'=> $this->input->post('overtime_rate'),
        'overtime_description'=> $this->input->post('overtime_description'),
        
        
        
    );

    $flag_id=$_POST['flag_id'];
    if ($flag_id === "0") {
        $data['created_by'] = $_SESSION['user_id'];
        $data['created_on'] = date('Y-m-d H:i:s');
        $this->db->insert('hr_overtime_categories', $data);

    } 
    elseif ($flag_id === "1") {
        $data['modified_by'] = $_SESSION['user_id'];
        $data['modified_on'] = date('Y-m-d H:i:s');
        $row_id = $this->input->post('row_id'); 
        $res = $this->HrModel->update_setupdata_overtime_details($row_id,  $data);
    
    }  

    
    $response = array(
        'success' => true,
        'message' => 'Saved successfully.'
    );

    // Send the JSON response
    echo json_encode($response);
}

public function get_setupdata_overtime_by_id()
{
    
    $row_id = $this->input->get('row_id'); 
    
    $result = $this->HrModel->get_setupdata_overtime_by_id($row_id);

    if ($result) {
        $response = [

            'success' => true,
            'data' => $result
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Not found'
        ];
    }

    echo json_encode($response);
}

public function delete_setupdata_overtime_by_id()
{

    $row_id = $this->input->post('row_id');
   
    $result = $this->HrModel->delete_setupdata_overtime_by_id($row_id);

    if ($result) {
        $response = ['success' => true, 'message' => 'Deleted successfully'];
    } else {
        $response = ['success' => false, 'message' => 'Failed to mark item as deleted'];
    }

    echo json_encode($response);
}

public function get_recordstatus_overtime_details ()
{
    $data = $this->HrModel->get_recordstatus_overtime_details();
    echo json_encode(['data' => $data]);
}

// code by mashu

public function employee_profile(){
                        
    $individual_employee_id = $this->input->post('individual_employee_id');
    $empdetails = $this->HrModel->get_individual_employee_personal_data($individual_employee_id);
    $empEmergencyContacts = $this->HrModel->get_individual_employee_emergency_contacts($individual_employee_id);
    $work_history_table_data = $this->HrModel->get_individual_employee_work_history_table_data($individual_employee_id);
    $education_table_data = $this->HrModel->get_individual_employee_education_table_data($individual_employee_id);
    $certification_table_data = $this->HrModel->get_individual_employee_certification_table_data($individual_employee_id);
    $language_table_data = $this->HrModel->get_individual_employee_language_table_data($individual_employee_id);
    $dependents_table_data = $this->HrModel->get_individual_employee_dependents_table_data($individual_employee_id);
    $individual_employee_skill = $this->HrModel->get_individual_employee_skills_data($individual_employee_id);
    if ($empdetails) {
        $response = [
            'success' => true,
            'empdetails' => $empdetails,
            'work_history_table_data' => $work_history_table_data,
            'education_table_data' => $education_table_data,
            'certification_table_data' => $certification_table_data,
            'education_table_data' => $education_table_data,
            'language_table_data' => $language_table_data,
            'dependents_table_data' => $dependents_table_data,
            'individual_employee_skill' => $individual_employee_skill,
            'empEmergencyContacts' => $empEmergencyContacts
            
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'item  is  not found'
        ];
    }
    echo json_encode($response);
}


public function employee_profile_print($empHidId)
{
    $data = array();
    $data['profile_person_data'] = $this->HrModel->get_individual_employee_personal_data($empHidId);
    $data['work_history'] = $this->HrModel->get_individual_employee_work_history_table_data($empHidId);
    $data['education'] = $this->HrModel->get_individual_employee_education_table_data($empHidId);
    $data['certification'] = $this->HrModel->get_individual_employee_certification_table_data($empHidId);
    $data['language'] = $this->HrModel->get_individual_employee_language_table_data($empHidId);
    $data['dependents'] = $this->HrModel->get_individual_employee_dependents_table_data($empHidId);
    $data['skills'] = $this->HrModel->get_individual_employee_skills_data($empHidId);
    $data['emergency_contact'] = $this->HrModel->get_individual_employee_emergency_contacts($empHidId);
    $this->load->view('hr-management/employee_profile_print',$data);

}



public function employee_leave($sub_menu_id="")
{
    $data = array();
    $user_role_id                  = $_SESSION['USER_ROLE_ID'];
    $data                          =$this->get_menu_list($user_role_id);
    $data2["tab"]                  =$this->HrMenuModel->get_sub_menu_tab_permission($sub_menu_id,$user_role_id);
     $data["leave_employee"]  = $this->HrModel->get_team_employee_name_options();
     $data["leave_category"]  = $this->HrModel->get_leave_category_options();
     $data["new_leave_request"]  = $this->HrModel->new_leave_request_option();
     $data["verified_leave"]  = $this->HrModel->verified_leave_request_option();
     $data["approved_leave"]  = $this->HrModel->approved_leave_request_option();

     $data 			   = (object) array_merge((array) $data,(array) $data2);
    $this->load->view('hr-management/employee_leave',$data);
}

public function forget_leave_from_time_option(){
    $leaveFromDate = $this->input->post('leave_from_date');
    $company_id_in_hr = $this->session->userdata('company_id_in_hr');
    $res = $this->HrModel->forget_leave_from_time_option($leaveFromDate, $company_id_in_hr);
    echo json_encode(['data' => $res]);
  
}
public function forget_leave_to_time_option(){
    $leaveToDate = $this->input->post('leave_to_date');
    $company_id_in_hr = $this->session->userdata('company_id_in_hr');
    $res = $this->HrModel->forget_leave_to_time_option($leaveToDate, $company_id_in_hr);
    echo json_encode(['data' => $res]);
  
}

public function save_emp_new_leave_register_details(){

    $flag_id=(int)$this->input->post('flag_id');
    $data = array(
     
        // 'employee_id' => $this->input->post('leave_register_employee_id'),
        'employee_id' => $this->input->post('leave_register_employee_id'),
        'requested_date' => $this->input->post('leave_requested_date'),
        'leave_category_id' => $this->input->post('leave_category_id'),   
        'leave_from_date' => $this->input->post('leave_from_date'),   
        'leave_from_time' => $this->input->post('leave_from_time'),   
        'leave_to_date' => $this->input->post('leave_to_date'),   
        'leave_to_time' => $this->input->post('leave_to_time'),   
        'reason_for_leave' => $this->input->post('reason_for_leave'),   
        'reason_for_leave' => $this->input->post('reason_for_leave'), 
        'leave_request_status_id' => '1',  
         'company_id' => $this->session->userdata('company_id_in_hr'),   
    );
    if ($flag_id == "0") {
        $data['created_by'] = $_SESSION['user_id'];
        $data['created_on'] = date('Y-m-d H:i:s');
        $res = $this->HrModel->insert_employee_leave_register($data);
    }

    elseif ($flag_id == "1") {// in edit 
     $row_id = $this->input->post('row_id'); 
    $data['modified_by'] = $_SESSION['user_id'];
    $data['modified_on'] = date('Y-m-d H:i:s');
   
    $res = $this->HrModel->update_employee_leave_register($data,$row_id);
    }
    if($res)
        {
            $response = array(
                'success' => true,
                'message' => 'saved successfully .'
            );
        }
        else
        {
            $response = array(
            'success' => false,
            'message' => 'Error saving item. Please try again.'
            );
        }
    
        echo json_encode($response);
}


public function get_leave_register_details()
    {
    $data = $this->HrModel->get_leave_register_details();
    echo json_encode(['data' => $data]);
    }

    public function get_employee_leave_register_by_id(){

        $row_id = $this->input->post('row_id');
        $result = $this->HrModel->get_employee_leave_register_by_id($row_id);   
        if ($result) {
            $response = [
                'success' => true,
                'data' => $result
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'item  is  not found'
            ];
        }
        echo json_encode($response);
    
    }
    
    public function delete_employee_leave_register_by_id(){

        $row_id = $this->input->post('row_id');
        $result = $this->HrModel->delete_employee_leave_register_by_id($row_id);
        if ($result) {
            $response = [
                'success' => true,
                'data' => $result
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'item  is  not found'
            ];
        }
        echo json_encode($response);
    
    }
    
    public function get_new_leave_register_request()
    {
    $data = $this->HrModel->get_new_leave_register_request();
    echo json_encode(['data' => $data]);
    }

    public function get_leave_new_request_by_id(){

        $row_id = $this->input->post('row_id');
        $result = $this->HrModel->get_leave_new_request_by_id($row_id);
        if ($result) {
            $response = [
                'success' => true,
                'data' => $result
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'item  is  not found'
            ];
        }
        echo json_encode($response);
    
    }

    public function save_new_leave_request(){
        $flag_id=(int)$this->input->post('flag_id');
        $new_leave_status=$this->input->post('new_leave_request_status_id');
        if( $new_leave_status =='2')
            {
                $data = array(
        
                    'leave_request_status_id' => $this->input->post('new_leave_request_status_id'),  
                    'is_verified' =>'yes',  
                    'verified_by' =>$_SESSION['user_id'], 
                    'verified_on' => date('Y-m-d H:i:s'), 
                
                );  
            }
        else if( $new_leave_status =='3')
            {
                $data = array(
        
                    'leave_request_status_id' => $this->input->post('new_leave_request_status_id'),  
                    'is_approved' =>'yes',  
                    'approved_by' =>$_SESSION['user_id'], 
                    'approved_on' => date('Y-m-d H:i:s'),
                
                );  
            }
        else if( $new_leave_status =='4')
            {
                $data = array(
        
                    'leave_request_status_id' => $this->input->post('new_leave_request_status_id'),  
                    'rejected_on' => date('Y-m-d H:i:s'),
                    'rejected_by' =>$_SESSION['user_id'], 
                    'rejection_reason' =>$this->input->post('new_leave_request_rejection_reason'), 
                
                );  
            }
    
    
        if ($flag_id == "1") {// in edit 
        $row_id = $this->input->post('row_id'); 
        $res = $this->HrModel->save_new_leave_request($data,$row_id);
        }
        if($res)
            {
                $response = array(
                    'success' => true,
                    'message' => 'saved successfully .'
                );
            }
            else
            {
                $response = array(
                'success' => false,
                'message' => 'Error saving item. Please try again.'
                );
            }
        
            echo json_encode($response);
    
    }

    public function get_approved_leave_details()
        {
        $data = $this->HrModel->get_approved_leave_details();
        echo json_encode(['data' => $data]);
        }

        // public function get_leave_verified_by_id(){

        //     $row_id = $this->input->post('row_id');
        //     $result = $this->HrModel->get_leave_verified_by_id($row_id);
        //     if ($result) {
        //         $response = [
        //             'success' => true,
        //             'data' => $result
        //         ];
        //     } else {
        //         $response = [
        //             'success' => false,
        //             'message' => 'item  is  not found'
        //         ];
        //     }
        //     echo json_encode($response);
        
        // }

        
public function save_approved_leave(){
    $flag_id=(int)$this->input->post('flag_id');
    $travel_approved=$this->input->post('approved_leave_status_id');

 if( $travel_approved =='4')
    {
        $data = array(

            'leave_request_status_id' => $travel_approved,  
            'rejected_on' => date('Y-m-d H:i:s'),
            'rejected_by' =>$_SESSION['user_id'], 
            'rejection_reason' =>$this->input->post('approved_leave_rejection_reason'), 
        );  
    }

   

    if ($flag_id == "1") 
    {// in edit 
        $row_id = $this->input->post('row_id'); 
        $res = $this->HrModel->save_leave_approved($data,$row_id);
    }
    if($res)
        {
            $response = array(
                'success' => true,
                'message' => 'saved successfully .'
            );
        }
        else
        {
            $response = array(
            'success' => false,
            'message' => 'Error saving item. Please try again.'
            );
        }
    
        echo json_encode($response);

}

public function get_verified_leave_details()
{
$data = $this->HrModel->get_verified_leave_details();
echo json_encode(['data' => $data]);
}

public function get_leave_verified_by_id(){

    $row_id = $this->input->post('row_id');
    $result = $this->HrModel->get_leave_verified_by_id($row_id);
    if ($result) {
        $response = [
            'success' => true,
            'data' => $result
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'item  is  not found'
        ];
    }
    echo json_encode($response);

}

public function save_verified_leave(){
    $flag_id=(int)$this->input->post('flag_id');
    $travel_verified=$this->input->post('verified_leave_status_id');

  if( $travel_verified =='3')
    {  
        $data = array(
             'leave_request_status_id' => $travel_verified,  
             'is_approved' =>'yes',  
             'approved_by' =>$_SESSION['user_id'],
             'approved_on' => date('Y-m-d H:i:s'),
           
        );  
    }
    else if( $travel_verified =='4')
    {
        $data = array(

            'leave_request_status_id' => $travel_verified,  
            'rejected_on' => date('Y-m-d H:i:s'),
            'rejected_by' =>$_SESSION['user_id'], 
            'rejection_reason' =>$this->input->post('verified_leave_rejection_reason'), 
        );  
    }

   

    if ($flag_id == "1") 
    {// in edit 
        $row_id = $this->input->post('row_id'); 
        $res = $this->HrModel->save_leave_verified($data,$row_id);
    }
    if($res)
        {
            $response = array(
                'success' => true,
                'message' => 'saved successfully .'
            );
        }
        else
        {
            $response = array(
            'success' => false,
            'message' => 'Error saving item. Please try again.'
            );
        }
    
        echo json_encode($response);

}
    




}


