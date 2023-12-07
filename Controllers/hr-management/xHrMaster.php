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
    }
	
	public function index()
	{
        $company_id = 91;
		$_SESSION['user_id'] = 1;
        $_SESSION['company_id_in_hr'] = $company_id;
       
        
		$this->load->view('hr-management/index');
		
	}

    
	public function company()
	{
		$data = array();
        $company_id_in_hr = $this->session->userdata('company_id_in_hr');
		$data["states"]  = $this->HrModel->get_states();
		$data["country"]  = $this->HrModel->get_country();
        $data["branches"]  = $this->HrModel->get_branches($company_id_in_hr);
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
	public function job_details()
	{
		$data = array();
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
        $res = $this->HrModel->update_certification($row_id,  $data);
       
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

      public function record_status()
      {
         
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

                public function setup_data(){
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

                public function assets(){
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

                    public function employee(){
                        $company_id_in_hr = $this->session->userdata('company_id_in_hr');
                        $data = array();
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

                       
                public function get_employee_details_by_id()
                {
                  
                    $row_id = $this->input->get('row_id');
                    
                    $result = $this->HrModel->get_employee_details_by_id($row_id);
                    

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


    
               
                // public function delete_employee_by_id()
                // {
                //      $row_id  = $this->input->post('row_id');
                //      $employment_details_id  = $this->input->post('employment_details_id');
                //      $res = $this->HrModel->delete_employee_by_id($row_id,$employment_details_id);
                
                //     $response = ['success' => true, 'message' => 'Deleted successfully'];
                //     echo json_encode($response);
                // }
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

        public function loan_request(){
            $data = array();
            $company_id_in_hr = $this->session->userdata('company_id_in_hr');
            $data["employee_names"]  = $this->HrModel->get_employee_names($company_id_in_hr);
            $data["loan_type"]  = $this->HrModel->get_loan_details_internal();
            $data["loan_status"]  = $this->HrModel->get_loan_request_status();
            $data["new_request_status"]  = $this->HrModel->get_loan_request_fr_new_request();
            $data["verify_status"]  = $this->HrModel->get_loan_request_fr_verification();
            
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


//code by mashu 

public function get_departments_by_branch() {
    $company_id_in_hr = $this->session->userdata('company_id_in_hr');
    $branchId = $this->input->post('branch_id');
    $departments = $this->HrModel->get_departments_by_branch($branchId,$company_id_in_hr);
    $data = json_encode($departments);
    $this->output
         ->set_content_type('application/json')
         ->set_output($data);
}

public function get_employee_by_departments() {
        
    $department_id = $this->input->post('department_id');
    $employee = $this->HrModel->get_employee_by_departments($department_id);
    var_dump($employee);
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
public function teams()
    {
        
        $data = array();
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

         public function travel()
	{
		$data = array();
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



}

