<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class HrModel extends CI_Model {
   
    public function get_states(){
        $query = $this->db->get('acc_states_master');
      
        if($query->num_rows()>0)
        {
            return($query->result());

        }
           
        return array();
    }

    public function get_country(){
        $query = $this->db->get('acc_country_master');
      
        if($query->num_rows()>0)
        {
            return($query->result());

        }
           
        return array();
    }

//created by aparna
    
    public function get_compamny_structure_details()
    {
        $query = $this->db->select('*')
            ->from('hr_company_details_view') 
            ->where('is_deleted', 'no') 
            ->where('is_branch', 'no') 
            ->get();
        if ($query->num_rows() > 0) {
            return $query->result(); 
        }
        return []; 
    }

    public function get_branch_details($company_id_in_hr) {
       
        $this->db->where('company_id', $company_id_in_hr); 
        $this->db->where('is_deleted', 'no'); 
        $query = $this->db->get('hr_branches'); 
       
        // echo "Last Query: " . $this->db->last_query($query);

        if ($query->num_rows() > 0) {
            return $query->result(); 
        } else {
            return array();
        }
    }

    
    public function get_department_details($company_id_in_hr)
    {
        $query = $this->db->select('*')
            ->from('hr_departments') 
            ->where('is_deleted', 'no') 
            ->where('company_id',$company_id_in_hr) 
            ->get();

        if ($query->num_rows() > 0) {
            return $query->result(); 
        }

        return []; 
    }

    public function get_department_by_id($id)
{
    $query = $this->db->select('department_name')
        ->from('hr_departments')
        ->where('id', $id)
        ->where('is_deleted', 'no')
        ->get();

    if ($query->num_rows() > 0) {
        return $query->row(); 
    }

    return null; 
}  

public function delete_department_by_id($id)
    {
        $data = array(
            'is_deleted' => 'yes',  
            'deleted_by' => $_SESSION['user_id'],
            'deleted_on' => date('Y-m-d H:i:s')
        );
        $this->db->where('id', $id);
        return $this->db->update('hr_departments', $data);
    }

    public function  get_department_details_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('hr_departments');
    
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

 
public function update_department_creation($hidden_id, $departmentData)
{
    $this->db->where('id', $hidden_id);
    $this->db->update('hr_departments', $departmentData);
   
    if ($this->db->affected_rows() > 0) {
        return true; // Update successful
    } else {
        return false; // Update failed
    }
}


// public function get_company_details_by_id($row_id,$branch_id)
// {
//     $query = $this->db->select('*')
//     ->from('hr_company_details_view')
//     ->where('company_id', $row_id)
//     ->where('is_deleted', 'no')
//     ->get();
//     // echo "Last Query: " . $this->db->last_query();

//         if ($query->num_rows() > 0) {
//             return $query->row(); 
//         }
//         return null;
// }

public function get_company_details_by_id($row_id, $branch_id) {
    $this->db->select('*');
    $this->db->from('hr_company_details_view');
    $this->db->where('company_id', $row_id);
    $this->db->where('branch_id', $branch_id);

    $query = $this->db->get();
    // echo "Last Query: " . $this->db->last_query($query);

    if ($query->num_rows() > 0) {
        return $query->row_array();
    } else {
        return false; 
    }
}

public function get_company_details_by_id_for_view($branch_id) {
    $this->db->select('*');
    $this->db->from('hr_company_details_view');
    $this->db->where('company_id', $row_id);
    $this->db->where('branch_id', $branch_id);

    $query = $this->db->get();
    echo "Last Query: " . $this->db->last_query($query);

    if ($query->num_rows() > 0) {
        return $query->row_array();
    } else {
        return false; 
    }
}


 
    public function edit_company_by_id($row_id){
        $this->db->where('company_id', $row_id);
        $query = $this->db->get('company_structure_view');
    
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

// public function delete_company_by_id($row_id)
//     {
//         $data = array(
//             'is_deleted' => 'yes',  
//             'deleted_by' => $_SESSION['user_id'],
//             'deleted_on' => date('Y-m-d H:i:s')
//         );
      
//         $this->db->where('company_id', $row_id);
//         return $this->db->update('hr_company_details_view', $data);
//     }

public function delete_company_by_id($row_id, $branch_id)
    {
        $companyData = array(
            'is_deleted' => 'yes',  
            'deleted_by' => $_SESSION['user_id'],
            'deleted_on' => date('Y-m-d H:i:s')
        );
    
        $this->db->where('company_id', $row_id);
        $this->db->update('hr_company_master', $companyData);

        $branchData = array(
            'is_deleted' => 'yes',  
            'deleted_by' => $_SESSION['user_id'],
            'deleted_on' => date('Y-m-d H:i:s')
        );

        $this->db->where('id', $branch_id);
        return $this->db->update('hr_branches', $branchData);
    }






    public function  get_address_details($company_id_in_hr)
    {
        $query = $this->db->select('*')
        ->from('hr_branches') 
        ->where('is_deleted', 'no')
        ->where('company_id',$company_id_in_hr) 
        ->where('is_branch', 'yes') 
        ->get();
        // echo "Last Query".$this->db->last_query();

    if ($query->num_rows() > 0) {
        return $query->result(); 
    }

    return []; 
    }

 
    public function get_address_details_by_id($row_id)
{
    $this->db->where('id', $row_id);
    $query = $this->db->get('hr_branches');

    if ($query->num_rows() == 1) {
        $result = $query->row();
        
        // Fetch the state name from another table using the state_province_id
        $stateQuery = $this->db->get_where('acc_states_master', ['id' => $result->state_province_id]);
        
        if ($stateQuery->num_rows() == 1) {
            $stateResult = $stateQuery->row();
            $result->state_name = $stateResult->state_name;
        }
        
        // Fetch the country name from another table using the country_id
        $countryQuery = $this->db->get_where('acc_country_master', ['id' => $result->country_id]);
        
        if ($countryQuery->num_rows() == 1) {
            $countryResult = $countryQuery->row();
            $result->country_name = $countryResult->country_name;
        }
        
        return $result;
    } else {
        return false;
    }
}



    public function delete_address_by_id($row_id)
    {
        $data = array(
            'is_deleted' => 'yes',  
            'deleted_by' => $_SESSION['user_id'],
            'deleted_on' => date('Y-m-d H:i:s')
        );
        $this->db->where('id', $row_id);
        return $this->db->update('hr_branches', $data);

    }


public function get_skills_details()
{
 
    $query = $this->db->select('*')
        ->from('hr_skills') 
        ->where('is_deleted', 'no') 
        ->get();
    if ($query->num_rows() > 0) {
        return $query->result(); 
    }
    return []; 
}

public function get_skills_by_id($row_id)
{
    $query = $this->db->select('*')
        ->from('hr_skills')
        ->where('id', $row_id)
        ->where('is_deleted', 'no')
        ->get();
        //  echo "Last Query: " . $this->db->last_query();

    if ($query->num_rows() > 0) {
        return $query->row(); 
    }

    return null; 
}

public function delete_skill_by_id($row_id)
{
        $data = array('is_deleted' => 'yes');
        $this->db->where('id', $row_id);
        return $this->db->update('hr_skills', $data);
}

public function update_skills($row_id, $data)
{
    $this->db->where('id', $row_id);
    $this->db->update('hr_skills', $data);
   
    if ($this->db->affected_rows() > 0) 
    {
        return true; // Update successful
    } else 
    {
        return false; // Update failed
    }
}

public function get_education_details()
{
   
    $query = $this->db->select('*')
        ->from('hr_education') 
        ->where('is_deleted', 'no') 
        ->get();

    if ($query->num_rows() > 0) {
        return $query->result(); 
    }

    return []; 
}


public function get_education_by_id($row_id)
{
    
    $query = $this->db->select('*')
        ->from('hr_education')
        ->where('id', $row_id)
        ->where('is_deleted', 'no')
        ->get();
        //  echo "Last Query: " . $this->db->last_query();

    if ($query->num_rows() > 0) {
        return $query->row(); 
    }

    return null; 
}


public function delete_education_by_id($row_id)
    {
        $data = array('is_deleted' => 'yes');
        $this->db->where('id', $row_id);
        return $this->db->update('hr_education', $data);
    }


    public function  update_education($row_id, $data){
        $this->db->where('id', $row_id);
        $this->db->update('hr_education', $data);
       
        if ($this->db->affected_rows() > 0) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
    }


public function get_certification_details()
{
   
    $query = $this->db->select('*')
        ->from('hr_certifications') 
        ->where('is_deleted', 'no') 
 
        ->get();

    if ($query->num_rows() > 0) {
        return $query->result(); 
    }

    return []; 
}


public function get_cerfification_by_id($row_id)
{
    $query = $this->db->select('*')
        ->from('hr_certifications')
        ->where('id', $row_id)
        ->where('is_deleted', 'no')
        ->get();
        //  echo "Last Query: " . $this->db->last_query();

    if ($query->num_rows() > 0) {
        return $query->row(); 
    }

    return null; 
}
    

public function get_certification_by_id($row_id)
{
    $query = $this->db->select('*')
        ->from('hr_certifications')
        ->where('id', $row_id)
        ->where('is_deleted', 'no')
        ->get();
        //  echo "Last Query: " . $this->db->last_query();

    if ($query->num_rows() > 0) {
        return $query->row(); 
    }

    return null; 
}



public function delete_certification_by_id($row_id)
{
    $data = array(
        'is_deleted' => 'yes',  
        'deleted_by' => $_SESSION['user_id'],
        'deleted_on' => date('Y-m-d H:i:s')
    );

    $this->db->where('id', $row_id);
    return $this->db->update('hr_employee_certification_details', $data);
}


    public function  update_certification($row_id, $data){
        $this->db->where('id', $row_id);
        $this->db->update('hr_employee_certification_details', $data);
       
        if ($this->db->affected_rows() > 0) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
    }    
   
    public function   update_certification_in_company($row_id, $data){
        $this->db->where('id', $row_id);
        $this->db->update('hr_certifications', $data);
       
        if ($this->db->affected_rows() > 0) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
    } 

    public function get_language_details()
    {
       
        $query = $this->db->select('*')
            ->from('hr_languages') 
            ->where('is_deleted', 'no') 
     
            ->get();
    
        if ($query->num_rows() > 0) {
            return $query->result(); 
        }
    
        return []; 
    }
    
    
    public function get_languages_by_id($row_id)
    {
        $query = $this->db->select('*')
            ->from('hr_languages')
            ->where('id', $row_id)
            ->where('is_deleted', 'no')
            ->get();
            //  echo "Last Query: " . $this->db->last_query();
    
        if ($query->num_rows() > 0) {
            return $query->row(); 
        }
    
        return null; 
    }
 
    

public function delete_language_by_id($row_id)
    {
        $data = array('is_deleted' => 'yes');
        $this->db->where('id', $row_id);
        return $this->db->update('hr_languages', $data);
    }

     
    public function  update_hr_languages($row_id, $data){
        $this->db->where('id', $row_id);
        $this->db->update('hr_languages', $data);
       
        if ($this->db->affected_rows() > 0) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
    }    

    
    public function get_language_proficiency_details()
    {
       
        $query = $this->db->select('*')
            ->from('hr_language_proficiency') 
            ->where('is_deleted', 'no') 
     
            ->get();
    
        if ($query->num_rows() > 0) {
            return $query->result(); 
        }
    
        return []; 
    }
    
    public function get_languages_proficiency_by_id($row_id)
    {
        $query = $this->db->select('*')
            ->from('hr_language_proficiency')
            ->where('id', $row_id)
            ->where('is_deleted', 'no')
            ->get();
            //  echo "Last Query: " . $this->db->last_query();
    
        if ($query->num_rows() > 0) {
            return $query->row(); 
        }
    
        return null; 
    }

    public function  update_hr_languages_proficiency($row_id, $data)
    {
        $this->db->where('id', $row_id);
        $this->db->update('hr_language_proficiency', $data);
       
        if ($this->db->affected_rows() > 0) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
    }    

    
public function delete_language_proficiency_by_id($row_id)
{
    $data = array('is_deleted' => 'yes');
    $this->db->where('id', $row_id);
    return $this->db->update('hr_language_proficiency', $data);
}
// ./created by aparna











//created by mashu
// ----------job title  field queries 

    // insert hr_job_title data 
        public function insert_job_title($data) {


            return $this->db->insert('hr_job_title', $data);
        }
     // ./insert hr_job_title data 

    // update  hr_job_title data 
        public function update_job_title($data,$row_id) {

            $this->db->where('id', $row_id);
            $this->db->update('hr_job_title', $data);
             return $this->db->affected_rows() > 0; 
        }
     // ./update hr_job_title data 

     // get all data from hr_job_title table 
        // public function get_job_title_details() {

        //     $this->db->where('is_deleted', 'no');
        
        //     $query = $this->db->get('hr_job_title');
        
        //     if ($query->num_rows() > 0) {
        //         return $query->result_array();
        //     } else {
        //         return array();
        //     }
        // }

        public function get_job_title_details()
        {
            $query = $this->db->select('*')
                ->from('hr_job_title') 
                ->where('is_deleted', 'no') 
                ->get();
    
            if ($query->num_rows() > 0) {
                return $query->result(); 
            }
    
            return []; 
        }
     // ./ get all data from hr_job_title table 

    // get a row data using id    
    public function get_job_title_by_id($row_id)
    {
        $this->db->where('id', $row_id);
        $query = $this->db->get('hr_job_title');

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
    // ./ get a row data using id    




    // delete by id in job title    
    public function delete_job_title_by_id($row_id)
    {
    
        $this->db->where('id', $row_id);
        $this->db->set('is_deleted','yes');

        $this->db->update('hr_job_title');
        return $this->db->affected_rows() > 0;
    }
    // ./ delete by id in job title    


 // ---------- ./job title  field queries 


 // ---------- job   pay scales 
    // insert into pay scales
        public function insert_pay_scales($data)
        {
            return $this->db->insert('hr_pay_scales', $data);

        }
    // ./ insert into pay scales



        public function get_pay_scales_details($company_id_in_hr)
        {
            $query = $this->db->select('*')
                ->from('hr_pay_scales') 
                ->where('is_deleted', 'no') 
                ->where('company_id',$company_id_in_hr) 
                ->get();
                    //  echo "Last Query: " . $this->db->last_query();
    
            if ($query->num_rows() > 0) {
                return $query->result(); 
            }
    
            return []; 
        }
  // ./ get all data from hr_payscales table 

    // get a row data using id from pay scales
    public function get_pay_scales_by_id($row_id)
    {
        $this->db->where('id', $row_id);
        $query = $this->db->get('hr_pay_scales');

        if($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
     // ./ get a row data using id from pay scales 

    // update  hr_pay_scales by id data 
    public function update_pay_scales($data,$row_id)
    {

        $this->db->where('id', $row_id);
        $this->db->update('hr_pay_scales', $data);
        return $this->db->affected_rows() > 0; 
    }
 // ./update  hr_pay_scales by id data 

 

    
    // delete by id in job title    
    public function delete_pay_scales_by_id($row_id)
    {
        $this->db->where('id', $row_id);
        $this->db->set('is_deleted','yes');
        $this->db->update('hr_pay_scales');
        return $this->db->affected_rows() > 0;
    }
    // ./ delete by id in job title    

    

    

 // ---------- ./job  pay scales 

 // ---------- job   employment status
    // insert into pay scales
        // public function insert_pay_scales($data)
        // {
        //     return $this->db->insert('hr_pay_scales', $data);

        // }
    // ./ insert into pay scales


    // get all data from hr_employee_status table 
        // public function get_employment_status_details() {

        //     $this->db->where('is_deleted', 'no');
        
        //     $query = $this->db->get('hr_employment_status');
        
        //     if ($query->num_rows() > 0) {
        //         return $query->result_array();
        //     } else {
        //         return array();
        //     }
        // }

        public function get_employment_status_details()
        {
            $query = $this->db->select('*')
                ->from('hr_employment_status') 
                ->where('is_deleted', 'no') 
                ->get();
    
            if ($query->num_rows() > 0) {
                return $query->result(); 
            }
    
            return []; 
        }
  // ./ get all data from hr_employee_status table 

    
    // insert into hr_employee_status
    public function  insert_employment_status($data)
    {
        return $this->db->insert('hr_employment_status', $data);

    }
    // ./ insert into hr_employee_status

       // get a row data using id from hr_employee_status   
       public function get_employment_status_by_id($row_id)
       {
           $this->db->where('id', $row_id);
           $query = $this->db->get('hr_employment_status');
   
           if ($query->num_rows() == 1) {
               return $query->row();
           } else {
               return false;
           }
       }
       // ./ get a row data using id  from hr_employee_status
     
    // update hr_employee_status by id data 
        public function   update_employment_status($data,$row_id) {
            $this->db->where('id', $row_id);
            $this->db->update('hr_employment_status', $data);
            return $this->db->affected_rows() > 0; 
        }
    // ./update  hr_employee_status by id data 

     // delete by id in hr_employee_status
     public function delete_employment_status_by_id($row_id)
     {
     
         $this->db->where('id', $row_id);
         $this->db->set('is_deleted','yes');
 
         $this->db->update('hr_employment_status');
         return $this->db->affected_rows() > 0;
     }
     // ./ delete by id in hr_employee_status   

 // ---------- ./employemt status

public function get_project_status()
{
    $query = $this->db->get('hr_project_status');
    return $query->result();
}


 // get all data from hr_job_title table 
 public function get_projects_details() 
 {
    $this->db->where('is_deleted', 'no');
    $query = $this->db->get('hr_project_master');
    if ($query->num_rows() > 0) {
        return $query->result_array();
    } else {
        return array();
    }
}

public function  insert_projects($data)
{
    return $this->db->insert('hr_project_master', $data);

}

  // get a row data using id from hr_employee_status   
  public function get_project_by_id($row_id)
  {
    
      $this->db->where('id', $row_id);
      $query = $this->db->get('hr_project_master');
      if ($query->num_rows() == 1) {
          return $query->row();
      } else {
          return false;
      }
  }
  // ./ get a row data using id  from hr_employee_status

    // update hr_employee_status by id data 
    public function   update_projects($data,$row_id) {
        $this->db->where('id', $row_id);
        $this->db->update('hr_project_master', $data);
        return $this->db->affected_rows() > 0; 
    }
// ./update  hr_employee_status by id data 


  // delete by id in hr_employee_status
  public function delete_projects_by_id($row_id)
  {
  
      $this->db->where('id', $row_id);
      $this->db->set('is_deleted','yes');

      $this->db->update('hr_project_master');
      return $this->db->affected_rows() > 0;
  }
  // ./ delete by id in hr_employee_status   
// ./ get all data from hr_job_title table 


public function get_travel_request_status()
{
   
    $query = $this->db->select('*')
        ->from('hr_travel_request_status') 
        ->where('is_deleted', 'no') 
        ->get();

    if ($query->num_rows() > 0) {
        return $query->result(); 
    }

    return []; 
}

public function get_loan_request_status()
{
   
    $query = $this->db->select('*')
        ->from('hr_employee_loan_request_status') 
        ->where('is_deleted', 'no') 
        ->get();

    if ($query->num_rows() > 0) {
        return $query->result(); 
    }

    return []; 
}
public function get_loan_request_fr_new_request()
{
   
    $query = $this->db->select('*')
        ->from('hr_employee_loan_request_status') 
        ->where('is_deleted', 'no') 
        ->where('loan_request_status !=', 'Pending') 
        ->get();

    if ($query->num_rows() > 0) {
        return $query->result(); 
    }

    return []; 
}
public function get_loan_request_fr_verification()
{
   
    $query = $this->db->select('*')
        ->from('hr_employee_loan_request_status') 
        ->where('is_deleted', 'no') 
        ->where('loan_request_status !=', 'Pending') 
        // ->where('loan_request_status !=', 'Approved') 
        ->get();

    if ($query->num_rows() > 0) {
        return $query->result(); 
    }

    return []; 
}





public function get_loan_status()
{
   
    $query = $this->db->select('*')
        ->from('hr_employee_loan_status') 
        ->where('is_deleted', 'no') 
        ->get();

    if ($query->num_rows() > 0) {
        return $query->result(); 
    }

    return []; 
}



public function get_leave_request_status()
{
   
    $query = $this->db->select('*')
        ->from('hr_employee_leave_request_status') 
        ->where('is_deleted', 'no') 
        ->get();

    if ($query->num_rows() > 0) {
        return $query->result(); 
    }

    return []; 
}


public function get_marital_status_status()
{
   
    $query = $this->db->select('*')
        ->from('hr_marital_status') 
        ->where('is_deleted', 'no') 
        ->get();

    if ($query->num_rows() > 0) {
        return $query->result(); 
    }

    return []; 
}

public function get_relation(){
    $query = $this->db->select('*')
        ->from('hr_relations') 
        ->where('is_deleted', 'no') 
        ->get();

    if ($query->num_rows() > 0) {
        return $query->result(); 
    }

    return [];

}


public function get_gender(){
    $query = $this->db->select('*')
        ->from('hr_gender') 
        ->where('is_deleted', 'no') 
        ->get();

    if ($query->num_rows() > 0) {
        return $query->result(); 
    }

    return [];

}

public function get_transportation_means()
{
   
    $query = $this->db->select('*')
        ->from('hr_travel_transportaion_means') 
        ->where('is_deleted', 'no') 
 
        ->get();

    if ($query->num_rows() > 0) {
        return $query->result(); 
    }

    return []; 
}


public function get_transportation_by_id($row_id)
{
    $query = $this->db->select('*')
        ->from('hr_travel_transportaion_means')
        ->where('id', $row_id)
        ->where('is_deleted', 'no')
        ->get();
        // echo "Last Query: " . $this->db->last_query();

    if ($query->num_rows() > 0) {
        return $query->row(); 
    }

    return null; 
}

public function delete_transportation_by_id($row_id)
    {
        $data = array('is_deleted' => 'yes');
        $this->db->where('id', $row_id);
        return $this->db->update('hr_travel_transportaion_means', $data);
    }


    public function  update_transportaion($row_id, $data){
        $this->db->where('id', $row_id);
        $this->db->update('hr_travel_transportaion_means', $data);
       
        if ($this->db->affected_rows() > 0) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
    }

  
    public function get_leave_category_details()
    {
    
        $query = $this->db->select('*')
            ->from('hr_leave_category') 
            ->where('is_deleted', 'no') 
    
            ->get();

        if ($query->num_rows() > 0) {
            return $query->result(); 
        }

        return []; 
    }

  
public function get_leave_category_by_id($row_id)
{
    $query = $this->db->select('*')
        ->from('hr_leave_category')
        ->where('id', $row_id)
        ->where('is_deleted', 'no')
        ->get();
        //  echo "Last Query: " . $this->db->last_query();

    if ($query->num_rows() > 0) {
        return $query->row(); 
    }

    return null; 
}


public function delete_leave_category_by_id($row_id)
    {
        $data = array('is_deleted' => 'yes');
        $this->db->where('id', $row_id);
        return $this->db->update('hr_leave_category', $data);
    }
    
    
  
    public function  update_leave_category($row_id, $data){
        $this->db->where('id', $row_id);
        $this->db->update('hr_leave_category', $data);
       
        if ($this->db->affected_rows() > 0) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
    }
 
    public function get_loan_details_internal()
    {
        $query = $this->db->select('id, loan_types, loan_description')
            ->from('hr_loan_types') 
            ->where('is_deleted', 'no') 
            ->get();
    
        if ($query->num_rows() > 0) {
            return $query->result(); 
        }
    
        return [];
    }
    
    
    public function get_loan_type_by_id($row_id)
    {
        $query = $this->db->select('*')
            ->from('hr_loan_types')
            ->where('id', $row_id)
            ->where('is_deleted', 'no')
            ->get();
            //  echo "Last Query: " . $this->db->last_query();
    
        if ($query->num_rows() > 0) {
            return $query->row(); 
        }
    
        return null; 
    }
    
    
public function delete_loan_type_by_id($row_id)
    {
        $data = array('is_deleted' => 'yes');
        $this->db->where('id', $row_id);
        return $this->db->update('hr_loan_types', $data);
    }
    
    
    public function  update_loan_type($row_id, $data){
        $this->db->where('id', $row_id);
        $this->db->update('hr_loan_types', $data);
       
        if ($this->db->affected_rows() > 0) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
    }

   
public function  get_status()
{
   
    $query = $this->db->select('*')
        ->from('hr_asset_status') 
        ->where('is_deleted', 'no') 
        ->get();

    if ($query->num_rows() > 0) {
        return $query->result(); 
    }

    return []; 
}


public function  update_asset($row_id, $data){
    $this->db->where('id', $row_id);
    $this->db->update('hr_asset_group', $data);
   
    if ($this->db->affected_rows() > 0) {
        return true; // Update successful
    } else {
        return false; // Update failed
    }
}


public function get_group_details()
{
   
    $query = $this->db->select('*')
        ->from('hr_asset_group') 
        ->where('is_deleted', 'no') 
 
        ->get();

    if ($query->num_rows() > 0) {
        return $query->result(); 
    }

    return []; 
}


public function get_group_by_id($row_id)
{
    $query = $this->db->select('*')
        ->from('hr_asset_group')
        ->where('id', $row_id)
        ->where('is_deleted', 'no')
        ->get();
        //  echo "Last Query: " . $this->db->last_query();

    if ($query->num_rows() > 0) {
        return $query->row(); 
    }

    return null; 
}


public function delete_group_by_id($row_id)
    {
        $data = array('is_deleted' => 'yes');
        $this->db->where('id', $row_id);
        return $this->db->update('hr_asset_group', $data);
    }

   
    public function  get_category_details()
    {
    
        $query = $this->db->select('*')
            ->from('hr_asset_category') 
            ->where('is_deleted', 'no') 
    
            ->get();

        if ($query->num_rows() > 0) {
            return $query->result(); 
        }

        return []; 
    }


    public function  update_category($row_id, $data){
        $this->db->where('id', $row_id);
        $this->db->update('hr_asset_category', $data);
       
        if ($this->db->affected_rows() > 0) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
    }


    public function get_category_by_id($row_id)
    {
        $query = $this->db->select('*')
            ->from('hr_asset_category')
            ->where('id', $row_id)
            ->where('is_deleted', 'no')
            ->get();
            //  echo "Last Query: " . $this->db->last_query();
    
        if ($query->num_rows() > 0) {
            return $query->row(); 
        }
    
        return null; 
    }

    public function delete_category_by_id($row_id)
    {
        $data = array('is_deleted' => 'yes');
        $this->db->where('id', $row_id);
        return $this->db->update('hr_asset_category', $data);
    }

    
    public function get_return_details()
    {
        $query = $this->db->select('*')
            ->from('hr_asset_return_reasons') 
            ->where('is_deleted', 'no') 
            ->get();
    
        if ($query->num_rows() > 0) {
            return $query->result(); 
        }
    
        return [];
    }

    
    public function get_return_reason_by_id($row_id)
    {
        $query = $this->db->select('*')
            ->from('hr_asset_return_reasons')
            ->where('id', $row_id)
            ->where('is_deleted', 'no')
            ->get();
            //  echo "Last Query: " . $this->db->last_query();
    
        if ($query->num_rows() > 0) {
            return $query->row(); 
        }
    
        return null; 
    }
   
    public function  delete_return_reason_by_id($row_id)
    {
        $data = array('is_deleted' => 'yes');
        $this->db->where('id', $row_id);
        return $this->db->update('hr_asset_return_reasons', $data);
    }
 
    
    public function  update_return_reason($row_id, $data){
        $this->db->where('id', $row_id);
        $this->db->update('hr_asset_return_reasons', $data);
       
        if ($this->db->affected_rows() > 0) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
    }

    
// public function get_employee_details($company_id_in_hr)
// {
   
//     $query = $this->db->select('*')
//         ->from('hr_employee_master_view') 
//         ->where('is_deleted', 'no') 
//         ->where('is_active', 'yes')
//         ->where('company_id', $company_id_in_hr)
//         ->get();
//         // echo "Last Query: " . $this->db->last_query();
//     if ($query->num_rows() > 0) {
//         return $query->result(); 
//     }

//     return []; 
// }

public function get_employee_details($company_id_in_hr)
{
    $query = $this->db->select('*, CONCAT(first_name, " ", last_name) AS full_name')
        ->from('hr_employee_master_view') 
        ->where('is_deleted', 'no') 
        ->where('is_active', 'yes')
        ->where('company_id', $company_id_in_hr)
        ->get();

    if ($query->num_rows() > 0) {
        return $query->result(); 
    }

    return []; 
}



public function update_employee_details($row_id,$employee_master_data){
    $this->db->where('employee_id', $row_id);
    $this->db->update('hr_employee_master', $employee_master_data);
    // echo "Last Query: " . $this->db->last_query();

   
    if ($this->db->affected_rows() > 0) {
        return true; // Update successful
    } else {
        return false; // Update failed
    }
}



//     public function delete_employee_by_id($row_id)
// {
//     $this->db->where('employee_id', $row_id);
//     $this->db->set('is_deleted','yes');
//     $this->db->set('deleted_by', $_SESSION['user_id']);
//     $this->db->set('deleted_on', date('Y-m-d H:i:s'));
//     $this->db->update('hr_employee_master');
//     return $this->db->affected_rows() > 0;
// }

// public function delete_employee_by_id($row_id,$employment_details_id)
// {

//     $employeeMasterData = array(
//         'is_deleted' => 'yes',  
//         'deleted_by' => $_SESSION['user_id'],
//         'deleted_on' => date('Y-m-d H:i:s')
//     );
//     $this->db->where('employee_id', $row_id);
//     $this->db->update('hr_employee_master', $employeeData);

//     $employeeEmploymentData = array(
//         'is_deleted' => 'yes',  
//         'deleted_by' => $_SESSION['user_id'],
//         'deleted_on' => date('Y-m-d H:i:s')
//     );
//     $this->db->where('id', $employment_details_id);
//     return $this->db->update('hr_employee_employment_details', $branchData);

// }


public function delete_employee_by_id($row_id, $employment_details_id) {
    $employeeMasterData = array(
        'is_deleted' => 'yes',  
        'deleted_by' => $_SESSION['user_id'],
        'deleted_on' => date('Y-m-d H:i:s')
    );
    $this->db->where('employee_id', $row_id);
    $this->db->update('hr_employee_master', $employeeMasterData);

    $employeeEmploymentData = array(
        'is_deleted' => 'yes',  
        'deleted_by' => $_SESSION['user_id'],
        'deleted_on' => date('Y-m-d H:i:s')
    );
    $this->db->where('id', $employment_details_id);
    return $this->db->update('hr_employee_employment_details', $employeeEmploymentData);
}



public function get_employee_details_by_id($row_id)
{
    $query = $this->db->select('*')
        ->from('hr_employee_master_view')
        ->where('employee_id', $row_id)
        ->where('is_deleted', 'no')
        ->get();

    if ($query->num_rows() > 0) {
        return $query->row(); 
    }

    return null; 
}  

public function get_hr_branches()
    {
        $query = $this->db->select('id, branch_name')
            ->from('hr_branches')
            ->where('is_deleted', 'no')
            ->where('company_id',$this->session->userdata('company_id_in_hr'))
            ->get();

        return ($query->num_rows() > 0) ? $query->result_array() : array();
    }

    public function get_hr_departments($branch_id)
    {
        $query = $this->db->select('id, department_name')
            ->from('hr_departments')
            ->where('branch_id', $branch_id)
            ->where('is_deleted', 'no')
            ->where('company_id', $this->session->userdata('company_id_in_hr'))
            ->get();
            // echo "Last Query: " . $this->db->last_query();
    
        return ($query->num_rows() > 0) ? $query->result_array() : array();
    }
    public function get_employee_head_by_department($department_id)
    {
        $query = $this->db->select('employee_id,CONCAT(employee_number," - ",first_name, " ",last_name) as employee_name')
            ->from('hr_employee_master_view')
            ->where($department_id, $department_id) 
            ->where('company_id', $this->session->userdata('company_id_in_hr'))
            ->get();
            // echo "Last Query: " . $this->db->last_query();
            return ($query->num_rows() > 0) ? $query->result_array() : array();
    
        // if ($query->num_rows() > 0) {
        //     return $query->result_array();
        // }
    
        return null;
    }
    

public function get_employee_names($company_id_in_hr) {
    $this->db->select('employee_id, CONCAT(employee_number, "-", first_name) AS employee_name', false);
    $this->db->where('company_id', $company_id_in_hr);
    $query = $this->db->get('hr_employee_master');
    // echo "Last Query: " . $this->db->last_query($query);
    
    if ($query->num_rows() > 0) {
        return $query->result_array();
    }
    
    return array(); 
}


public function get_employee_filter_name($company_id_in_hr)
{
    $this->db->select('employee_id, CONCAT(employee_number, "-", first_name) AS employee_name', false);
    $this->db->where('company_id', $company_id_in_hr);
    $query = $this->db->get('hr_employee_master');
    // echo "Last Query: " . $this->db->last_query($query);
    // exit;
    if ($query->num_rows() > 0) {
        return $query->result_array();
    }
    
    return array(); 
    // $query = $this->db->select('*')
    //     ->from('hr_employee_master') 
    //     ->where('is_deleted', 'no') 
    //     ->get();

    // if ($query->num_rows() > 0) {
    //     return $query->result(); 
    // }

    // return []; 
}


public function  update_employee_education_details($row_id, $data){
    $this->db->where('id', $row_id);
    $this->db->update('hr_employee_education_details', $data);
   
    if ($this->db->affected_rows() > 0) {
        return true; // Update successful
    } else {
        return false; // Update failed
    }
}


public function get_emp_education_details()
{
    $this->db->select('eed.id, CONCAT(em.employee_number," ",em.first_name," ",em.last_name) AS employee_name,em.employee_number, edu.education_name as education_name, eed.institute_name, eed.start_date, eed.completed_date, eed.score_grade, eed.details');
    $this->db->from('hr_employee_education_details eed');
    $this->db->join('hr_employee_master em', 'eed.employee_id = em.employee_id', 'inner');
    $this->db->join('hr_education edu', 'eed.education_id = edu.id', 'inner');
    $this->db->where('eed.is_deleted', 'no');

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result();
    }

    return [];
}



public function get_emp_education_by_id($row_id)
{
    $query = $this->db->select('*')
        ->from('hr_employee_education_details')
        ->where('id', $row_id)
        ->where('is_deleted', 'no')
        ->get();
        //  echo "Last Query: " . $this->db->last_query();

    if ($query->num_rows() > 0) {
        return $query->row(); 
    }

    return null; 
}


public function delete_emp_education_by_id($row_id)
    {
        $data = array('is_deleted' => 'yes');
        $this->db->set('deleted_by', $_SESSION['user_id']);
        $this->db->set('deleted_on', date('Y-m-d H:i:s'));
        $this->db->where('id', $row_id);
        return $this->db->update('hr_employee_education_details', $data);
    }

    
public function  update_employee_certification_details($row_id, $data){
    $this->db->where('id', $row_id);
    $this->db->update('hr_employee_certification_details', $data);
   
    if ($this->db->affected_rows() > 0) {
        return true; // Update successful
    } else {
        return false; // Update failed
    }
}


public function get_certificate_details()
{
   
    $query = $this->db->select('*')
        ->from('hr_certifications') 
        ->where('is_deleted', 'no') 
        ->get();

    if ($query->num_rows() > 0) {
        return $query->result(); 
    }

    return []; 
}



public function get_emp_certification_details()
{
    $this->db->select('ecd.id, CONCAT(em.employee_number," ",em.first_name," ",em.last_name) AS employee_name, em.employee_number, ctr.certification_name AS certification_name, ecd.institute_name, ecd.date_issued, ecd.date_valid_upto, ecd.score_grade');
    $this->db->from('hr_employee_certification_details ecd');
    $this->db->join('hr_employee_master em', 'ecd.employee_id = em.employee_id', 'inner');
    $this->db->join('hr_certifications ctr', 'ecd.certification_id = ctr.id', 'inner');
    $this->db->where('ecd.is_deleted', 'no');
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result();
    }
    return [];
}




public function get_emp_certification_by_id($row_id)
{
    $query = $this->db->select('*')
        ->from('hr_employee_certification_details')
        ->where('id', $row_id)
        ->where('is_deleted', 'no')
        ->get();
        //  echo "Last Query: " . $this->db->last_query();

    if ($query->num_rows() > 0) {
        return $query->row(); 
    }

    return null; 
}

public function  update_employee_langauge_proficiency($row_id, $data){
    $this->db->where('id', $row_id);
    $this->db->update('hr_employee_langauge_proficiency', $data);
   
    if ($this->db->affected_rows() > 0) {
        return true; // Update successful
    } else {
        return false; // Update failed
    }
}


public function get_languages()
{
   
    $query = $this->db->select('*')
        ->from('hr_languages') 
        ->where('is_deleted', 'no') 
        ->get();

    if ($query->num_rows() > 0) {
        return $query->result(); 
    }

    return []; 
}


public function get_language_proficienc()
{
   
    $query = $this->db->select('*')
        ->from('hr_language_proficiency') 
        ->where('is_deleted', 'no') 
        ->get();

    if ($query->num_rows() > 0) {
        return $query->result(); 
    }

    return []; 
}


public function get_emp_languages_details()
{
    $this->db->select('elp.id, CONCAT(em.employee_number," ",em.first_name," ",em.last_name) AS employee_name, hl.language_name AS language_name, 
                     hlp_reading.language_proficiency AS reading_proficiency, 
                     hlp_speaking.language_proficiency AS speaking_proficiency, 
                     hlp_writing.language_proficiency AS writing_proficiency, 
                     hlp_listening.language_proficiency AS listening_proficiency');
    $this->db->from('hr_employee_langauge_proficiency elp');
    $this->db->join('hr_employee_master em', 'elp.employee_id = em.employee_id', 'inner');
    $this->db->join('hr_languages hl', 'elp.language_id = hl.id', 'inner');
    $this->db->join('hr_language_proficiency hlp_reading', 'elp.reading_proficiency_id = hlp_reading.id', 'inner');
    $this->db->join('hr_language_proficiency hlp_speaking', 'elp.speaking_proficiency_id = hlp_speaking.id', 'inner');
    $this->db->join('hr_language_proficiency hlp_writing', 'elp.writing_proficiency_id = hlp_writing.id', 'inner');
    $this->db->join('hr_language_proficiency hlp_listening', 'elp.listening_proficiency_id = hlp_listening.id', 'inner');
    $this->db->where('elp.is_deleted', 'no');

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result();
    }

    return [];
}



public function get_emp_languages_by_id($row_id)
{
    $query = $this->db->select('*')
        ->from('hr_employee_langauge_proficiency')
        ->where('id', $row_id)
        ->where('is_deleted', 'no')
        ->get();
        //  echo "Last Query: " . $this->db->last_query();

    if ($query->num_rows() > 0) {
        return $query->row(); 
    }

    return null; 
}




public function delete_emp_languages_by_id($row_id)
    {
        $data = array(
            'is_deleted' => 'yes',  
            'deleted_by' => $_SESSION['user_id'],
            'deleted_on' => date('Y-m-d H:i:s')
        );
        $this->db->where('id', $row_id);
        return $this->db->update('hr_employee_langauge_proficiency', $data);
    }
 
public function  update_employee_dependents_details($row_id, $data){
    $this->db->where('id', $row_id);
    $this->db->update('hr_employee_dependents', $data);
   
    if ($this->db->affected_rows() > 0) {
        return true; // Update successful
    } else {
        return false; // Update failed
    }
}


public function get_dependent_details()
{
   
    $query = $this->db->select('*')
        ->from('hr_relations') 
        ->where('is_deleted', 'no') 
        ->get();

    if ($query->num_rows() > 0) {
        return $query->result(); 
    }

    return []; 
}


public function get_emp_dependent_details()
{
    $this->db->select('ed.id, em.first_name AS employee_name, ed.dependent_name, hr.relation AS relation_with_employee, ed.date_of_birth, ed.aadhar_number, ed.passport_number');
    $this->db->from('hr_employee_dependents ed');
    $this->db->join('hr_employee_master em', 'ed.employee_id = em.employee_id', 'inner');
    $this->db->join('hr_relations hr', 'ed.relation_with_employee_id = hr.id', 'inner');
    $this->db->where('ed.is_deleted', 'no');

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result();
    }

    return [];
}


public function get_emp_dependents_by_id($row_id)
{
    $query = $this->db->select('*')
        ->from('hr_employee_dependents')
        ->where('id', $row_id)
        ->where('is_deleted', 'no')
        ->get();
        //  echo "Last Query: " . $this->db->last_query();

    if ($query->num_rows() > 0) {
        return $query->row(); 
    }

    return null; 
}


// public function delete_emp_dependents_by_id($row_id)
//     {
//         $data = array('is_deleted' => 'yes');
//         $this->db->where('id', $row_id);
//         return $this->db->update('hr_employee_dependents', $data);
//     }
public function delete_emp_dependents_by_id($row_id)
    {
        $data = array(
            'is_deleted' => 'yes',  
            'deleted_by' => $_SESSION['user_id'],
            'deleted_on' => date('Y-m-d H:i:s')
        );
        $this->db->where('id', $row_id);
        return $this->db->update('hr_employee_dependents', $data);
    }


    
    public function  update_employee_contact_details ($row_id, $data){
        $this->db->where('id', $row_id);
        $this->db->update('hr_employee_emergency_contact_details', $data);
       
        if ($this->db->affected_rows() > 0) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
    }

    
// public function get_emp_contact_details()
// {
   
//     $query = $this->db->select('*')
//         ->from('hr_employee_emergency_contact_details') 
//         ->where('is_deleted', 'no') 
//         ->get();

//     if ($query->num_rows() > 0) {
//         return $query->result(); 
//     }

//     return []; 
// }

public function get_emp_contact_details() {
    $query = $this->db
        ->select('ecd.id, em.first_name AS employee_name, hr.relation AS relation_with_employee, ecd.mobile_phone, ecd.contact_person_name')
        ->from('hr_employee_emergency_contact_details ecd')
        ->join('hr_employee_master em', 'ecd.employee_id = em.employee_id', 'inner')
        ->join('hr_relations hr', 'ecd.relation_with_employee_id = hr.id', 'inner')
        ->where('ecd.is_deleted', 'no')
        ->get();

    if ($query->num_rows() > 0) {
        return $query->result(); 
    }

    return [];
}


public function get_emp_contacts_by_id($row_id)
{
    $query = $this->db->select('*')
        ->from('hr_employee_emergency_contact_details')
        ->where('id', $row_id)
        ->where('is_deleted', 'no')
        ->get();
        //  echo "Last Query: " . $this->db->last_query();

    if ($query->num_rows() > 0) {
        return $query->row(); 
    }

    return null; 
}




public function delete_emp_contacts_by_id($row_id)
    {
        $data = array(
            'is_deleted' => 'yes',  
            'deleted_by' => $_SESSION['user_id'],
            'deleted_on' => date('Y-m-d H:i:s')
        );
        $this->db->where('id', $row_id);
        return $this->db->update('hr_employee_emergency_contact_details', $data);
    }

    

public function get_branches($company_id_in_hr)
{
   
    $query = $this->db->select('*')
        ->from('hr_branches') 
        ->where('is_deleted', 'no') 
        ->where('company_id',$company_id_in_hr) 
        
        
        ->get();

    if ($query->num_rows() > 0) {
        return $query->result(); 
    }

    return []; 
}


public function update_employee_employment_details($employment_details_id, $employee_employment_data){
    $this->db->where('id', $employment_details_id);
    $this->db->update('hr_employee_employment_details', $employee_employment_data);
   
    // echo "Last Query: " . $this->db->last_query();

    if ($this->db->affected_rows() > 0) {
        return true; 
    } else {
        return false; 
    }
}

// public function get_emp_loan_details()
// {
   
//     $query = $this->db->select('*')
//         ->from('hr_employee_loan_requests') 
//         ->where('is_deleted', 'no') 
//         ->get();

//     if ($query->num_rows() > 0) {
//         return $query->result(); 
//     }

//     return []; 
// }


public function get_emp_loan_details()
{
    $query = $this->db->select('
        CONCAT(e.employee_number," ",e.first_name," ",e.last_name) AS employee_name,
        lt.loan_types AS loan_type,
        elr.requested_amount AS requested_amount,
        elr.id AS id,
        elrs.loan_request_status AS loan_request_status'
    )
    ->from('hr_employee_loan_requests AS elr')
    ->join('hr_employee_master AS e', 'elr.employee_id = e.employee_id', 'left')
    ->join('hr_loan_types AS lt', 'elr.loan_type_id = lt.id', 'left')
    ->join('hr_employee_loan_request_status AS elrs', 'elr.loan_request_status_id = elrs.id', 'left')
    ->where('elr.is_deleted', 'no')
    ->get();
    // echo "Last Query: " . $this->db->last_query();
    if ($query->num_rows() > 0) {
        return $query->result();
    }

    return [];
}

// public function get_emp_loan_details()
// {
//     $query = $this->db->select('
//         CONCAT(e.first_name, " ", e.last_name) AS employee_name,
//         lt.loan_types AS loan_type,
//         elr.requested_amount AS requested_amount,
//         elr.approved_amount AS approved_amount,
//         elrs.id AS loan_request_status_id,
//         elrs.loan_request_status AS loan_request_status'
//     )
//     ->from('hr_employee_loan_requests AS elr')
//     ->join('hr_employee_master AS e', 'elr.employee_id = e.id', 'left')
//     ->join('hr_loan_types AS lt', 'elr.loan_type_id = lt.id', 'left')
//     ->join('hr_employee_loan_request_status AS elrs', 'elr.loan_request_status_id = elrs.id', 'left')
//     ->where('elr.is_deleted', 'no')
//     ->get();

//     if ($query->num_rows() > 0) {
//         return $query->result();
//     }

//     return [];
// }




public function  update_employee_loan_requests_details ($row_id, $data){
    $this->db->where('id', $row_id);
    $this->db->update('hr_employee_loan_requests', $data);
   
    if ($this->db->affected_rows() > 0) {
        return true; // Update successful
    } else {
        return false; // Update failed
    }
}

public function get_filtered_data($selectedValue)
{
    $query = $this->db->select('
        CONCAT(e.first_name, " ", e.last_name) AS employee_name,
        lt.loan_types AS loan_type,
        elr.requested_amount AS requested_amount,
        elrs.loan_request_status AS loan_request_status'
    )
    ->from('hr_employee_loan_requests AS elr')
    ->join('hr_employee_master AS e', 'elr.employee_id = e.employee_id', 'left')
    ->join('hr_loan_types AS lt', 'elr.loan_type_id = lt.id', 'left')
    ->join('hr_employee_loan_request_status AS elrs', 'elr.loan_request_status_id = elrs.id', 'left')
    ->where('elr.is_deleted', 'no')
    ->where('elr.loan_request_status_id', $selectedValue) // Filter by selected value
    ->get();
    //  echo "Last Query: " . $this->db->last_query();

    if ($query->num_rows() > 0) {
        return $query->result();
    }

    return [];
}


public function get_emp_loan_request_by_id($row_id)
{
    $query = $this->db->select('*')
        ->from('hr_employee_loan_requests')
        ->where('id', $row_id)
        ->where('is_deleted', 'no')
        ->get();
        // echo "Last Query: " . $this->db->last_query();

    if ($query->num_rows() > 0) {
        return $query->row(); 
    }

    return null; 
}


public function delete_emp_loan_request_by_id($row_id)
    {
        $data = array(
            'is_deleted' => 'yes',  
            'deleted_by' => $_SESSION['user_id'],
            'deleted_on' => date('Y-m-d H:i:s')
        );

        $this->db->where('id', $row_id);
        return $this->db->update('hr_employee_loan_requests', $data);
    }

  
    public function get_emp_new_request_by_id($row_id)
    {

        $this->db->where('id', $row_id);
        $query = $this->db->get('hr_employee_loan_requests');
        // echo "Last Query: " . $this->db->last_query();

    if ($query->num_rows() == 1) {
        return $query->row();
    } else {
        return false;
    }
        echo json_encode($response);
    
    }

    
    public function get_emp_new_loan_request_details()
    {
        $query = $this->db->select('
            CONCAT(e.first_name, " ", e.last_name) AS employee_name,
            lt.loan_types AS loan_type,
            elr.requested_amount AS requested_amount,
            elr.id AS id,
            elrs.loan_request_status AS loan_request_status'
        )
        ->from('hr_employee_loan_requests AS elr')
        ->join('hr_employee_master AS e', 'elr.employee_id = e.employee_id', 'left')
        ->join('hr_loan_types AS lt', 'elr.loan_type_id = lt.id', 'left')
        ->join('hr_employee_loan_request_status AS elrs', 'elr.loan_request_status_id = elrs.id', 'left')
        ->where('elr.is_deleted', 'no')
        ->where('elr.loan_request_status_id', '1')
        ->get();
        //  echo "Last Query: " . $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    
        return [];
    }

  
    public function  get_emp_approval_loan_details()
    {
        $query = $this->db->select('
            CONCAT(e.first_name, " ", e.last_name) AS employee_name,
            lt.loan_types AS loan_type,
            elr.requested_amount AS requested_amount,
            elr.id AS id,
            elrs.loan_request_status AS loan_request_status'
        )
        ->from('hr_employee_loan_requests AS elr')
        ->join('hr_employee_master AS e', 'elr.employee_id = e.employee_id', 'left')
        ->join('hr_loan_types AS lt', 'elr.loan_type_id = lt.id', 'left')
        ->join('hr_employee_loan_request_status AS elrs', 'elr.loan_request_status_id = elrs.id', 'left')
        ->where('elr.is_deleted', 'no')
        ->where('elr.loan_request_status_id', '3')
        ->get();
        //  echo "Last Query: " . $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    
        return [];
    }

    
    public function  get_emp_verified_loan_details()
    {
        $query = $this->db->select('
            CONCAT(e.first_name, " ", e.last_name) AS employee_name,
            lt.loan_types AS loan_type,
            elr.requested_amount AS requested_amount,
            elr.id AS id,
            elrs.loan_request_status AS loan_request_status'
        )
        ->from('hr_employee_loan_requests AS elr')
        ->join('hr_employee_master AS e', 'elr.employee_id = e.employee_id', 'left')
        ->join('hr_loan_types AS lt', 'elr.loan_type_id = lt.id', 'left')
        ->join('hr_employee_loan_request_status AS elrs', 'elr.loan_request_status_id = elrs.id', 'left')
        ->where('elr.is_deleted', 'no')
        ->where('elr.loan_request_status_id', '2')
        ->get();
        //  echo "Last Query: " . $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    
        return [];
    }

    
    public function get_emp_verified_by_id($row_id)
    {

        $this->db->where('id', $row_id);
        $query = $this->db->get('hr_employee_loan_requests');
        // echo "Last Query: " . $this->db->last_query();

    if ($query->num_rows() == 1) {
        return $query->row();
    } else {
        return false;
    }
        echo json_encode($response);
    
    }

    public function save_new_loan_request($data,$row_id)
    {
        $this->db->where('id', $row_id);
         $this->db->update('hr_employee_loan_requests', $data);
        //  echo "Last Query: " . $this->db->last_query();
        return $this->db->affected_rows() > 0; 
        echo json_encode($response);
    
    }

    public function  get_emp_approval_by_id($row_id)
    {

        $this->db->where('id', $row_id);
        $query = $this->db->get('hr_employee_loan_requests');
        // echo "Last Query: " . $this->db->last_query();

    if ($query->num_rows() == 1) {
        return $query->row();
    } else {
        return false;
    }
        echo json_encode($response);
    
    }

    public function save_loan_verified($data,$row_id)
    {
        $this->db->where('id', $row_id);
        $this->db->update('hr_employee_loan_requests', $data);
        return $this->db->affected_rows() > 0; 
        echo json_encode($response);
    }

public function get_employee_names_for_employee_head($company_id_in_hr) {
    $this->db->select('employee_id AS id, CONCAT(employee_number, "-", first_name) AS employee_name', false);
    $this->db->where('company_id', $company_id_in_hr); 

    $query = $this->db->get('hr_employee_master');

    if ($query->num_rows() > 0) {
        return $query->result_array();
    }

    return [];
}

public function get_departments_in_filter($company_id_in_hr)
{
    $query = $this->db->select('*')
        ->from('hr_departments')
        ->where('company_id', $company_id_in_hr)
        ->where('is_deleted', 'no')
        ->get();

    if ($query->num_rows() > 0) {
        return $query->result(); 
    }

    return []; 
}

public function get_certifications()
    {
     
        $this->db->select('id, certification_name');
        $this->db->where('is_deleted', 'no');
        $query = $this->db->get('hr_certifications');
        if ($query->num_rows() > 0) {
            return $query->result(); 
        }

        return []; 
    }

    // public function get_employee_firstname_lastname($company_id_in_hr) {
     
    //     $this->db->select('employee_id, CONCAT(first_name, " ", last_name) as full_name');
    //     $this->db->where('company_id', $company_id_in_hr);
    //     $this->db->where('is_deleted', 'no');
    //     $query = $this->db->get('hr_employee_master');
    //     //  echo "Last Query: " . $this->db->last_query($query);

    //     if ($query->num_rows() > 0) {
    //         return $query->result_array(); 
    //     } else {
    //         return array(); 
    //     }
    // }
    public function get_employee_firstname_lastname($company_id_in_hr) {
        $this->db->select('employee_id, CONCAT(employee_number," ",first_name," ",last_name) as full_name');
        $this->db->where('company_id', $company_id_in_hr);
        $this->db->where('is_deleted', 'no');
        $query = $this->db->get('hr_employee_master');
        // echo "Last Query: " . $this->db->last_query($query);
    
        if ($query->num_rows() > 0) {
            return $query->result_array(); 
        } else {
            return array(); 
        }
    }
    


    public function fetch_loan_request_statuses() {
        $this->db->select('id, loan_request_status');
        $this->db->where('is_deleted', 'no');
        $query = $this->db->get('hr_employee_loan_request_status');

        if ($query->num_rows() > 0) {
            return $query->result_array(); 
        } else {
            return array(); 
        }
    }

    //  code by mashu 

    // public function get_departments_by_branch($branchId, $company_id_in_hr) {
    //     $this->db->where('branch_id', $branchId);
    //     $this->db->where('company_id', $company_id_in_hr);
    //     $this->db->where('is_deleted','no');
    //     $query = $this->db->get('hr_departments');
       
    //     return $query->result();
    // }

    public function get_departments_by_branch($branchId, $company_id_in_hr) {
        
        $query = $this->db
            ->where('branch_id', $branchId)
            ->where('company_id', $company_id_in_hr)
            ->where('is_deleted', 'no')
            ->get('hr_departments');
           
    
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return []; 
        }
    }



    public function get_employee_by_departments($department_id) {
        $this->db->select('hr_employee_master.employee_id, CONCAT(hr_employee_master.employee_number, " ", hr_employee_master.first_name, " ", hr_employee_master.last_name) as employee_name');
        $this->db->from('hr_employee_employment_details');
        $this->db->join('hr_employee_master', 'hr_employee_employment_details.employee_id = hr_employee_master.employee_id', 'left');
        $this->db->where('hr_employee_employment_details.department_id', $department_id);
        $this->db->where('hr_employee_employment_details.is_deleted', 'no');
        // $this->db->where('hr_employee_employment_details.company_id', $this->session->userdata('company_id_in_hr'));
    
        $query = $this->db->get();
        // echo "Last Query: " . $this->db->last_query();
        return $query->result();
    }
    
    


    public function get_branch_in_employee_details(){
        $this->db->select('id, branch_name');
        $this->db->from('hr_branches');
        $this->db->where('company_id',$this->session->userdata('company_id_in_hr'));
        $query = $this->db->get();
        return $query->result();
        }

        public function  get_department_in_employee_details() {
            // department name    
               $this->db->select('id, department_name');
               $this->db->from('hr_departments');
               $this->db->where('company_id',$this->session->userdata('company_id_in_hr'));
               $query = $this->db->get();
               return $query->result();
               }

            //    public function  get_job_in_employee_details() {
            //     // $company_id_in_hr = $this->session->userdata('company_id_in_hr');
            //     $this->db->select('id, job_title');
            //     $this->db->from('hr_job_title');
            //     $query = $this->db->get();
            //     return $query->result();
            //     }

                // public function  get_job_in_pay_scales() {
                //     // $company_id_in_hr = $this->session->userdata('company_id_in_hr');
                //     $this->db->select('id, pay_scale_name');
                //     $this->db->from('hr_pay_scales');
                //     $this->db->where('company_id',$this->session->userdata('company_id_in_hr'));
                //     $query = $this->db->get();
                //     return $query->result();
                //     }

                public function  get_job_in_employee_status() {
                        //  $company_id_in_hr = $this->session->userdata('company_id_in_hr');
                        $this->db->select('id, employment_status');
                        $this->db->from('hr_employment_status');
                        $this->db->where('is_deleted', 'no'); 
                        $query = $this->db->get();
                        return $query->result();
                        }
                public function  get_job_in_employee_name() {
                            $this->db->select('employee_id, first_name,middle_name,last_name');
                            $this->db->from('hr_employee_master');
                            $this->db->where('company_id',$this->session->userdata('company_id_in_hr'));
                            $query = $this->db->get();
                            return $query->result();
                            }

                            public function get_all_employee_in_company(){
                                $this->db->from('hr_employee_master');
                                
                                // Select the columns you need
                                $this->db->select('employee_id, CONCAT(employee_number," ",first_name, " ",last_name) as employee_name');
                              $this->db->where('is_deleted', 'no'); 
                                // Execute the query
                                $query = $this->db->get();
                              
                                // Get the result
                                return $query->result();
                            }
                            
                            public function get_employee_skill_options()
                                {
                                //  $company_id_in_hr = $this->session->userdata('company_id_in_hr');
                                $this->db->select('id, skill_name');
                                $this->db->from('hr_skills');
                                $this->db->where('is_deleted', 'no'); 
                                $query = $this->db->get();
                                return $query->result();
                                }


    public function get_employee_team_details()
           {
               $this->db->select('hr_employee_team_details.id, team_name, CONCAT(hr_employee_master.employee_number, " ", hr_employee_master.first_name, " ", hr_employee_master.last_name) as employee_name');
               $this->db->from('hr_employee_team_details');
               $this->db->join('hr_employee_team_master', 'hr_employee_team_details.team_id = hr_employee_team_master.id', 'left');
               $this->db->join('hr_employee_master', 'hr_employee_team_details.team_member_id = hr_employee_master.employee_id', 'left');
               $this->db->where('hr_employee_team_details.is_deleted',"no");
               $query = $this->db->get();
               return $query->result();
           } 

           //   insert
           public function  insert_employee_team_member($data)
           {
               return $this->db->insert('hr_employee_team_details', $data);
   
           }

              // update 
        public function update_employee_team_member($data,$row_id)
        {
            $this->db->where('id', $row_id);
            $this->db->update('hr_employee_team_details', $data);
            return $this->db->affected_rows() > 0; 
            echo json_encode($response);
        }
    // ./update 

    public function get_employee_employment_details()
    {
        
        $this->db->from('hr_employee_employment_details AS ed');
        $this->db->join('hr_employee_master AS em', 'ed.employee_id = em.employee_id', 'inner');
        $this->db->join('hr_branches AS b', 'ed.branch_id = b.id', 'inner');
        $this->db->join('hr_departments AS d', 'ed.department_id = d.id', 'inner');
        $this->db->join('hr_job_title AS j', 'ed.job_title_id = j.id', 'inner');
        $this->db->join('hr_pay_scales AS p', 'ed.pay_scale_id = p.id', 'inner');
        $this->db->join('hr_employment_status AS es', 'ed.employment_status_id = es.id', 'inner');
        
      
        $this->db->select('ed.id, CONCAT(em.employee_number," ",em.first_name, " ", em.last_name) as employee_name, b.branch_name, d.department_name, j.job_title, p.pay_scale_name, es.employment_status');
      $this->db->where('ed.is_deleted', 'no'); 
      
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    
        return [];

        // echo "Last Query: " . $this->db->last_query($query);
      
        
        
    }
     
    public function get_employee_employment_details_by_id($row_id){

        $this->db->select('hr_employee_employment_details.*, hr_departments.department_name, CONCAT(hr_employee_master.first_name, " ",hr_employee_master.last_name) as employee_name');
        $this->db->from('hr_employee_employment_details');
        $this->db->where('hr_employee_employment_details.id', $row_id);
        $this->db->join('hr_departments', 'hr_employee_employment_details.department_id = hr_departments.id', 'left');
        $this->db->join('hr_employee_master', 'hr_employee_employment_details.employee_id = hr_employee_master.employee_id', 'left');
        $query = $this->db->get();

        // echo "Last Query: " . $this->db->last_query($query);
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
        }


        public function  insert_employee_employment_details($data)
        {
            return $this->db->insert('hr_employee_employment_details', $data);
        
        }

        public function update_employee_employment_details_for_work_history($data,$row_id)
        {
            $this->db->where('id', $row_id);
            $this->db->update('hr_employee_employment_details', $data);
            return $this->db->affected_rows() > 0; 
        }

        public function delete_employee_employment_details_by_id($row_id)
{

    $this->db->where('id', $row_id);
    $this->db->set('is_deleted','yes');
    $this->db->set('deleted_by', $_SESSION['user_id']);
        $this->db->set('deleted_on', date('Y-m-d H:i:s'));
    $this->db->update('hr_employee_employment_details');
    return $this->db->affected_rows() > 0;
}
 // load table 
 public function get_employee_team_master_details()
 {
     
     $this->db->select('hr_employee_team_master.id, team_name, team_description, branch_name,department_name, team_leader_id, CONCAT(hr_employee_master.employee_number, " ", hr_employee_master.first_name, " ", hr_employee_master.last_name) as employee_name');
     $this->db->from('hr_employee_team_master');
     $this->db->join('hr_branches', 'hr_employee_team_master.branch_id = hr_branches.id', 'left');
     $this->db->join('hr_departments', 'hr_employee_team_master.department_id = hr_departments.id', 'left');
     $this->db->join('hr_employee_master', 'hr_employee_team_master.team_leader_id = hr_employee_master.employee_id', 'left');
     $this->db->where('hr_employee_team_master.is_deleted',"no");
     $query = $this->db->get();
     return $query->result();
 }

 //    load employee name option  in travel

   // insert                      
   public function  insert_employee_team($data)
   {
       return $this->db->insert('hr_employee_team_master', $data);

   }
// ./insert   
// update
public function update_employee_team($data,$row_id)
{
   $this->db->where('id', $row_id);
   $this->db->update('hr_employee_team_master', $data);
   return $this->db->affected_rows() > 0; 
   echo json_encode($response);
}

// .update
        
 // get team leader throgh ajaxx
 public function get_job_team_leader_option(){
    $this->db->select('hr_employee_team_master.id, CONCAT(hr_employee_master.employee_number, " ", hr_employee_master.first_name, " ", hr_employee_master.last_name) as leader_name');
    $this->db->from('hr_employee_team_master');
    $this->db->join('hr_employee_master', 'hr_employee_team_master.team_leader_id = hr_employee_master.employee_id', 'left');
    $this->db->where('hr_employee_team_master.is_deleted',"no");
    $this->db->where('hr_employee_team_master.company_id',$this->session->userdata('company_id_in_hr'));
    $query = $this->db->get();
    return $query->result();
}
// ./get team leader

 //get team name option 
 public function get_team_name_option()
 {
     $this->db->select('id, team_name');
     $this->db->from('hr_employee_team_master');
     $this->db->where('is_deleted',"no");
     $this->db->where('company_id',$this->session->userdata('company_id_in_hr'));
     $query = $this->db->get();
     return $query->result();
 }
//./get team name option 

                   // get by id

            public function get_employee_team_master_by_id($row_id)
                {

                    $this->db->where('id', $row_id);
                    $query = $this->db->get('hr_employee_team_master');
                    if ($query->num_rows() == 1) {
                        return $query->row();
                    } else {
                        return false;
                    }
                    echo json_encode($response);
                
                }
            
            // ./get by id

             //delete
                        
                    
             public function delete_employee_team_master_by_id($row_id)
             {
                $this->db->set('is_deleted', 'yes');
                $this->db->set('deleted_by', $_SESSION['user_id']);
                $this->db->set('deleted_on', date('Y-m-d H:i:s'));
                $this->db->where('id', $row_id);
                $this->db->update('hr_employee_team_master');
                
                return $this->db->affected_rows() > 0;
            }

            //./delete

               //branch id option ajaxx in team 
        public function get_branch_id_option_in_team(){
            $this->db->select('id, branch_name');
            $this->db->from('hr_branches');
            $this->db->where('company_id',$this->session->userdata('company_id_in_hr'));
            $this->db->where('is_deleted',"no");
            $query = $this->db->get();
            return $query->result();
            }
        //./branch id option ajaxx in team 

        public function get_employee_team_member_by_id($row_id)
        {

            $this->db->where('id', $row_id);
            $query = $this->db->get('hr_employee_team_details');
            if ($query->num_rows() == 1) {
                return $query->row();
            } else
            {
                return false;
            }
                echo json_encode($response);
            
        }
        public function delete_employee_team_member_by_id($row_id){
            $this->db->set('is_deleted', 'yes');
            $this->db->set('deleted_by', $_SESSION['user_id']);
            $this->db->set('deleted_on', date('Y-m-d H:i:s'));
            $this->db->where('id', $row_id);
            $this->db->update('hr_employee_team_details');
            
            return $this->db->affected_rows() > 0;
        }

        public function get_team_employee_name_option(){
            $this->db->from('hr_employee_master');
            // Select the columns you need
            // $this->db->select('employee_id, CONCAT(employee_number," ",first_name, " ",last_name) as employee_name');
            $this->db->select('employee_id, CONCAT(employee_number," ",first_name, " ",last_name) as employee_name');
        $this->db->where('is_deleted', 'no'); 
        $this->db->where('hr_employee_master.company_id',$this->session->userdata('company_id_in_hr'));
            // Execute the query
            $query = $this->db->get();
        
            // Get the result
            return $query->result();
        }

        // public function  get_transportation_means() {
        //     //  $company_id_in_hr = $this->session->userdata('company_id_in_hr');
        //     $this->db->select('id, transportaion_means');
        //     $this->db->from('hr_travel_transportaion_means');
        //     $this->db->where('is_deleted',"no");
        //     $query = $this->db->get();
        //     return $query->result();
        //     }

            public function  get_travel_request() {
                //  $company_id_in_hr = $this->session->userdata('company_id_in_hr');
                $this->db->select('id, travel_request_status');
                $this->db->from('hr_travel_request_status');
                $this->db->where('travel_request_status !=', 'Pending');
                $this->db->where('is_deleted',"no");
                $query = $this->db->get();
                return $query->result();
                }

                public function get_travel_status_by_id($row_id){
            
                    $this->db->where('id', $row_id);
                    $query = $this->db->get('hr_employee_travel_requests');
            
                if ($query->num_rows() == 1) {
                    return $query->row();
                } else {
                    return false;
                }
                    echo json_encode($response);
                
                }

                public function get_new_travel_request()
                {
                    $this->db->select('hr_employee_travel_requests.id,transportaion_means,travel_to_place,travel_date,return_date,travel_request_status,CONCAT(hr_employee_master.employee_number, " ", hr_employee_master.first_name, " ", hr_employee_master.last_name) as employee_name');
                    $this->db->from('hr_employee_travel_requests');
                    $this->db->join('hr_employee_master', 'hr_employee_travel_requests.employee_id = hr_employee_master.employee_id', 'left');
                    $this->db->join('hr_travel_transportaion_means', 'hr_employee_travel_requests.means_of_transportation_id = hr_travel_transportaion_means.id', 'left');
                    $this->db->join('hr_travel_request_status', 'hr_employee_travel_requests.travel_request_status_id = hr_travel_request_status.id', 'left');
                    $this->db->where('hr_employee_travel_requests.is_deleted',"no");
                    $this->db->where('hr_employee_travel_requests.travel_request_status_id',"1");
                    $query = $this->db->get();
                    return $query->result();
                } 

                public function get_travel_verified_details()
                    {
                        $this->db->select('hr_employee_travel_requests.id,transportaion_means,travel_to_place,travel_date,return_date,travel_request_status,CONCAT(hr_employee_master.employee_number, " ", hr_employee_master.first_name, " ", hr_employee_master.last_name) as employee_name');
                            $this->db->from('hr_employee_travel_requests');
                            $this->db->join('hr_employee_master', 'hr_employee_travel_requests.employee_id = hr_employee_master.employee_id', 'left');
                            $this->db->join('hr_travel_transportaion_means', 'hr_employee_travel_requests.means_of_transportation_id = hr_travel_transportaion_means.id', 'left');
                            $this->db->join('hr_travel_request_status', 'hr_employee_travel_requests.travel_request_status_id = hr_travel_request_status.id', 'left');
                            $this->db->where('hr_employee_travel_requests.is_deleted',"no");
                            $this->db->where('hr_employee_travel_requests.travel_request_status_id',"2");
                            $query = $this->db->get();
                            return $query->result();
                    }
                    public function get_travel_approved_details()
                    {
                            $this->db->select('hr_employee_travel_requests.id,transportaion_means,travel_to_place,travel_date,return_date,travel_request_status,CONCAT(hr_employee_master.employee_number, " ", hr_employee_master.first_name, " ", hr_employee_master.last_name) as employee_name');
                            $this->db->from('hr_employee_travel_requests');
                            $this->db->join('hr_employee_master', 'hr_employee_travel_requests.employee_id = hr_employee_master.employee_id', 'left');
                            $this->db->join('hr_travel_transportaion_means', 'hr_employee_travel_requests.means_of_transportation_id = hr_travel_transportaion_means.id', 'left');
                            $this->db->join('hr_travel_request_status', 'hr_employee_travel_requests.travel_request_status_id = hr_travel_request_status.id', 'left');
                            $this->db->where('hr_employee_travel_requests.is_deleted',"no");
                            $this->db->where('hr_employee_travel_requests.travel_request_status_id',"3");


                            $query = $this->db->get();
                            return $query->result();
                    }

                     // load data table
                     public function get_travel_details()
                     {
                         $this->db->select('hr_employee_travel_requests.id, transportaion_means, travel_to_place, travel_date, return_date, travel_request_status, CONCAT(hr_employee_master.employee_number, " ", hr_employee_master.first_name, " ", hr_employee_master.last_name) as employee_name');
                         $this->db->from('hr_employee_travel_requests');
                         $this->db->join('hr_employee_master', 'hr_employee_travel_requests.employee_id = hr_employee_master.employee_id', 'left');
                         $this->db->join('hr_travel_transportaion_means', 'hr_employee_travel_requests.means_of_transportation_id = hr_travel_transportaion_means.id', 'left');
                         $this->db->join('hr_travel_request_status', 'hr_employee_travel_requests.travel_request_status_id = hr_travel_request_status.id', 'left');
                         $this->db->where('hr_employee_travel_requests.is_deleted',"no");
                         $query = $this->db->get();
                         return $query->result();
                     }   
             // load data table  
             
               // insert
            public function insert_travel_status($data) {
                
                return $this->db->insert('hr_employee_travel_requests', $data);
            }

        // ./insert        
        // update by id 
                
                public function update_travel_status($data,$row_id){
            
                    $this->db->where('id', $row_id);
                    $this->db->update('hr_employee_travel_requests', $data);
                        return $this->db->affected_rows() > 0; 
                    echo json_encode($response);
            
                }
            //./ update by id 

         // delete 
         public function delete_travel_status_by_id($row_id)
         {

             $this->db->where('id', $row_id);
             $this->db->set('is_deleted','yes');
             $this->db->set('deleted_by', $_SESSION['user_id']);
             $this->db->set('deleted_on', date('Y-m-d H:i:s'));
             $this->db->update('hr_employee_travel_requests');
             return $this->db->affected_rows() > 0;
         }
     // ./delete
  //    load employee name option  in travel
  public function get_travel_employee_name_option(){
    $this->db->from('hr_employee_master');
    
    $this->db->select('employee_id, CONCAT(employee_number," ",first_name, " ",last_name) as employee_name');
    $this->db->where('is_deleted', 'no'); 
    $this->db->where('hr_employee_master.company_id',$this->session->userdata('company_id_in_hr'));
    $query = $this->db->get();
    return $query->result();
}

//    load employee name option  in travel

public function get_travel_new_request_by_id($row_id){
        
    $this->db->where('id', $row_id);
    $query = $this->db->get('hr_employee_travel_requests');

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    echo json_encode($response);

}
public function save_new_travel_request($data,$row_id){

    $this->db->where('id', $row_id);
    $this->db->update('hr_employee_travel_requests', $data);
    return $this->db->affected_rows() > 0; 
    echo json_encode($response);

    }

   

    //    get transportation means for select option
    
    public function  get_all_travel_status() {
        //  $company_id_in_hr = $this->session->userdata('company_id_in_hr');
        $this->db->select('id, travel_request_status');
        $this->db->from('hr_travel_request_status');
        $this->db->where('is_deleted',"no");
        $query = $this->db->get();
        return $query->result();
        }
    //    get transportation means for select option




 
    public function  get_travel_verified() {
        //  $company_id_in_hr = $this->session->userdata('company_id_in_hr');
        $this->db->select('id, travel_request_status');
        $this->db->from('hr_travel_request_status');
        $this->db->where('travel_request_status !=', 'Pending');
        $this->db->where('travel_request_status !=', 'Verified');
        $this->db->where('is_deleted',"no");
        $query = $this->db->get();
        return $query->result();
        }

        public function get_travel_verified_by_id($row_id){

            $this->db->where('id', $row_id);
            $query = $this->db->get('hr_employee_travel_requests');

            if ($query->num_rows() == 1) {
            return $query->row();
            } else {
            return false;
            }
            echo json_encode($response);

            }
            // public function get_travel_employee_name_option(){
            //     $this->db->from('hr_employee_master');
            //     // Select the columns you need
            //     // $this->db->select('employee_id, CONCAT(employee_number," ",first_name, " ",last_name) as employee_name');
            //     $this->db->select('id, CONCAT(employee_number," ",first_name, " ",last_name) as employee_name');
            // $this->db->where('is_deleted', 'no'); 
            // $this->db->where('hr_employee_master.company_id',$this->session->userdata('company_id_in_hr'));
            //     // Execute the query
            //     $query = $this->db->get();
            
            //     // Get the result
            //     return $query->result();
            // }

            public function get_travel_approved_by_id($row_id){

                $this->db->where('id', $row_id);
                $query = $this->db->get('hr_employee_travel_requests');

            if ($query->num_rows() == 1) {
                return $query->row();
            } else {
                return false;
            }
                echo json_encode($response);

            }
             // save 
             public function save_travel_verified($data,$row_id){

                $this->db->where('id', $row_id);
                $this->db->update('hr_employee_travel_requests', $data);
                return $this->db->affected_rows() > 0; 
                echo json_encode($response);
            }
        //./save

        public function update_company_details($row_id,$companyData){
            $this->db->where('company_id', $row_id);
            $this->db->update('hr_company_master',$companyData);
            // echo "Last Query: " . $this->db->last_query();
        
           
            if ($this->db->affected_rows() > 0) {
                return true; // Update successful
            } else {
                return false; // Update failed
            }
        }

        public function update_branch_details($branch_id,$branchData){
            $this->db->where('id', $branch_id);
            $this->db->update('hr_branches',$branchData);
           
            // echo "Last Query: " . $this->db->last_query();
        
            if ($this->db->affected_rows() > 0) {
                return true; 
            } else {
                return false; 
            }
        }

    public function get_employee_skills()
         {
            $this->db->select('hr_employee_skills.id,details,skill_name,CONCAT(hr_employee_master.employee_number, " ", hr_employee_master.first_name, " ", hr_employee_master.last_name) as employee_name');
            $this->db->from('hr_employee_skills');
            $this->db->join('hr_employee_master', 'hr_employee_skills.employee_id = hr_employee_master.employee_id', 'left');
            $this->db->join('hr_skills', 'hr_employee_skills.skill_id = hr_skills.id', 'left');
            $this->db->where('hr_employee_skills.is_deleted', 'no');
            $query = $this->db->get();

            return $query->result();
        }

public function insert_employee_skills($data)
{
    return $this->db->insert('hr_employee_skills', $data);

} 
public function update_employee_skills($data,$row_id)
{
    $this->db->where('id', $row_id);
    $this->db->update('hr_employee_skills', $data);
    return $this->db->affected_rows() > 0; 
}

public function get_employee_skill_by_id($id)
{
    $this->db->where('id', $id);
    $query = $this->db->get('hr_employee_skills');

    if ($query->num_rows() == 1) {
        return $query->row();
    } else {
        return false;
    }
}  

public function delete_employee_skill_by_id($row_id)
{
    $this->db->where('id', $row_id);
    $this->db->set('deleted_by', $_SESSION['user_id']);
    $this->db->set('deleted_on', date('Y-m-d H:i:s'));
    $this->db->set('is_deleted','yes');

    $this->db->update('hr_employee_skills');
    return $this->db->affected_rows() > 0;
}

public function get_employee_head_name($departmentId) {
    $this->db->select("CONCAT(first_name, ' ', last_name) AS employee_head_name");
    $this->db->from('hr_employee_master_view');
    $this->db->where('department_id', $departmentId);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        $result = $query->row();
        return $result->employee_head_name;
    } else {
        return null; 
    }
}

//test
public function get_state_list(){
    $query = $this->db->get('sys_state_list');
  
    if($query->num_rows()>0)
    {
        return($query->result());

    }
       
    return array();
}





// public function get_employee_team_master_details_for_modal($id)
// {
//     $this->db->select('etm.id AS team_id, etm.team_name, etm.team_description,
//      b.branch_name, d.department_name, 
//     etm.team_leader_id, CONCAT(em.employee_number, " ", em.first_name, " ", 
//     em.last_name) 
//     AS team_leader_name, GROUP_CONCAT(CONCAT(mem.employee_number, " ",
//      mem.first_name, " ", mem.last_name) SEPARATOR ", ") AS team_members, em.present_address_line_1, em.present_address_line_2, em.present_address_line_3, em.present_address_line_4,em.mobile_phone');
//     $this->db->from('hr_employee_team_master AS etm');
//     $this->db->join('hr_branches AS b', 'etm.branch_id = b.id', 'left');
//     $this->db->join('hr_departments AS d', 'etm.department_id = d.id', 'left');
//     $this->db->join('hr_employee_master AS em', 'etm.team_leader_id = em.employee_id', 'left');
//     $this->db->join('hr_employee_team_details AS etd', 'etm.id = etd.team_id', 'left');
//     $this->db->join('hr_employee_master AS mem', 'etd.team_member_id = mem.employee_id', 'left');
//     $this->db->where('etm.id', $id);
//     $this->db->where('etm.is_deleted', 'no');
//     $this->db->group_by('etm.id');
//     $query = $this->db->get();
//     return $query->result();
// }

public function get_employee_team_master_details_for_modal($id)
{
    $this->db->select('etm.id AS team_id, etm.team_name, etm.team_description,
        b.branch_name, d.department_name, 
        etm.team_leader_id, CONCAT(em.employee_number, " ", em.first_name, " ", em.last_name) AS team_leader_name, 
        mem.employee_number AS team_member_number,
        CONCAT(mem.first_name, " ", mem.last_name) AS team_member_name,
        mem.present_address_line_1 AS team_member_address_1,
        mem.present_address_line_2 AS team_member_address_2,
        mem.present_address_line_3 AS team_member_address_3,
        mem.present_address_line_4 AS team_member_address_4,
        mem.mobile_phone AS team_member_phone');
    
    $this->db->from('hr_employee_team_master AS etm');
    $this->db->join('hr_branches AS b', 'etm.branch_id = b.id', 'left');
    $this->db->join('hr_departments AS d', 'etm.department_id = d.id', 'left');
    $this->db->join('hr_employee_master AS em', 'etm.team_leader_id = em.employee_id', 'left');
    $this->db->join('hr_employee_team_details AS etd', 'etm.id = etd.team_id', 'left');
    $this->db->join('hr_employee_master AS mem', 'etd.team_member_id = mem.employee_id', 'left');
    $this->db->where('etm.id', $id);
    $this->db->where('etm.is_deleted', 'no');
    $this->db->order_by('mem.employee_number'); 
    $query = $this->db->get();
    
    return $query->result();
}






public function get_week_days(){
    $query = $this->db->select('*')
        ->from('hr_week_days') 
        ->get();

    if ($query->num_rows() > 0) {
        return $query->result(); 
    }

    return [];

}







  
    public function get_calendar_details_by_id($row_id) {
        $this->db->select('*');
        $this->db->from('hr_calendar_details');
        $this->db->where('calendar_master_id', $row_id);
    
        $query = $this->db->get();
        // echo "Last Query: " . $this->db->last_query($query);
    
        if ($query->num_rows() > 0) {
            return $query->result_array(); // Return an array of rows
        } else {
            return false;
        }
    }
    
    
    // functions after updation


    public function insert_calendar_master($data) {
        $this->db->insert('hr_calendar_master', $data);
        return $this->db->insert_id(); 
    }

    public function insert_calendar_details($data) {

        $this->db->insert('hr_calendar_details', $data);
        return $this->db->insert_id(); 
    }

    public function update_calendar_master($calender_master_data, $row_id) {
       
        $this->db->where('id', $row_id);
        $this->db->update('hr_calendar_master', $calender_master_data);
        
        //  echo "Last Query: " . $this->db->last_query();

    }



    public function get_calender_details_by_id($calender_master_id) {
        $this->db->select('wd.id, wd.day_short_name, wd.day_long_name,cd.id AS calender_details_id, cd.calendar_master_id, cd.start_time, cd.end_time, cd.is_working_day');
        $this->db->from('hr_week_days wd');
        $this->db->join('hr_calendar_details cd', 'wd.id = cd.week_day_id', 'LEFT');
        $this->db->where('cd.calendar_master_id', $calender_master_id);
     
        $query = $this->db->get();
        // echo "Last Query: " . $this->db->last_query($query);

         
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array(); 
        }
    }

    public function fetch_calendar_master_data() {
        
        $this->db->select('*');
        $this->db->from('hr_calendar_master');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array(); 
        }
    }

    public function delete_calendar_master($row_id)
    {
        $this->db->set('deleted_by', $_SESSION['user_id']);
        $this->db->set('deleted_on', date('Y-m-d H:i:s'));
        $this->db->set('is_deleted', 'yes');
        $this->db->where('id', $row_id);
        $this->db->update('hr_calendar_master');
    
        return $this->db->affected_rows() > 0;
    }
    


    public function update_calendar_details($calender_details_data, $dynamic_calendar_detail_id) {
        $this->db->where('id', $dynamic_calendar_detail_id);
        $this->db->update('hr_calendar_details', $calender_details_data);
        // echo "Last Query: " . $this->db->last_query();

    }

    public function update_calendar_year($calendar_year_data)
    {
      
        $calendar_master_id = $calendar_year_data['calendar_master_id'];
        $date_of_the_day = $calendar_year_data['date_of_the_day'];

       
        $data = array(
            'start_time' => $calendar_year_data['start_time'],
            'end_time' => $calendar_year_data['end_time'],
            'is_working_day' => $calendar_year_data['is_working_day']
        );

     
        $this->db->where('calendar_master_id', $calendar_master_id);
        $this->db->where('date_of_the_day', $date_of_the_day);
        $this->db->update('hr_calendar_year', $data);
        // echo "Last Query: " . $this->db->last_query();

    }

    public function insert_calendar_year($data) {
        $this->db->insert('hr_calendar_year', $data);
        return $this->db->insert_id(); 
    }

    public function get_calandar_details()
    {
    
        $query = $this->db->select('*')
            ->from('hr_calendar_master') 
            ->where('is_deleted', 'no') 
            ->get();

        if ($query->num_rows() > 0) {
            return $query->result(); 
        }

        return []; 
    }

    public function get_calendar_holidays_details()
    {
        $query = $this->db->select('*')
            ->from('hr_calendar_holidays') 
            ->where('is_deleted', 'no') 
            ->get();
        if ($query->num_rows() > 0) {
            return $query->result(); 
        }
        return []; 
    }

    public function getCalendarMasterDetails() {
   
        $this->db->select('*');
        $query = $this->db->get('hr_calendar_master');
    
     
        if ($query->num_rows() > 0) {
            return $query->result_array(); 
        } else {
            return array();
        }
    }


    public function get_calender_master_dates($selectedCalendarMasterId){
        $this->db->select('effective_from, effective_to');
        $this->db->from('hr_calendar_master');
        $this->db->where('id', $selectedCalendarMasterId);
        $query = $this->db->get();
        // echo "Last Query: " . $this->db->last_query($query);
    
        if ($query->num_rows() > 0) {
            return $query->row_array(); 
        } else {
            return array(); 
        }
    }

    public function save_calendar_holidays_details($data) {
        $this->db->insert('hr_calendar_holidays', $data);
    
        return $this->db->affected_rows() > 0;
    }

    public function update_calendar_holidays_details($data,$row_id) {

        $this->db->where('id', $row_id);
        $this->db->update('hr_calendar_holidays', $data);
    
        return ($this->db->affected_rows() > 0);
    }

    public function get_calendar_holidays_details_by_id($row_id)
    {
        $query = $this->db->select('*')
            ->from('hr_calendar_holidays')
            ->where('id', $row_id)
            ->where('is_deleted', 'no')
            ->get();

        if ($query->num_rows() > 0) {
            return $query->row(); 
        }

        return null; 
    }  


    public function delete_calendar_holidays_by_id($row_id)
        {
            $this->db->set('deleted_by', $_SESSION['user_id']);
            $this->db->set('deleted_on', date('Y-m-d H:i:s'));
            $this->db->set('is_deleted', 'yes');
            $this->db->where('id', $row_id);
            $this->db->update('hr_calendar_holidays');

            return $this->db->affected_rows() > 0;
        }

        
public function get_calendar_event_details()
{
    $query = $this->db->select('*')
        ->from('hr_calendar_events') 
        ->where('is_deleted', 'no') 
        ->get();
    if ($query->num_rows() > 0) {
        return $query->result(); 
    }
    return []; 
}

public function save_calendar_events_details($data) {
    $this->db->insert('hr_calendar_events', $data);

    return $this->db->affected_rows() > 0;
}


public function update_calendar_events_details($data,$row_id) {

    $this->db->where('id', $row_id);
    $this->db->update('hr_calendar_events', $data);

    return ($this->db->affected_rows() > 0);
}

public function get_calendar_events_details_by_id($row_id)
{
    $query = $this->db->select('*')
        ->from('hr_calendar_events')
        ->where('id', $row_id)
        ->where('is_deleted', 'no')
        ->get();

    if ($query->num_rows() > 0) {
        return $query->row(); 
    }

    return null; 
}  

public function delete_calendar_events_by_id($row_id)
{
    $this->db->set('deleted_by', $_SESSION['user_id']);
    $this->db->set('deleted_on', date('Y-m-d H:i:s'));
    $this->db->set('is_deleted', 'yes');
    $this->db->where('id', $row_id);
    $this->db->update('hr_calendar_events');

    return $this->db->affected_rows() > 0;
}

public function get_employee_name_options(){
    $this->db->from('hr_employee_master');
    $this->db->select('employee_id, CONCAT(employee_number," ",first_name, " ",last_name) as employee_name');
    $this->db->where('is_deleted', 'no'); 
    $this->db->where('hr_employee_master.company_id',$this->session->userdata('company_id_in_hr'));
    $query = $this->db->get();
    return $query->result();
}

public function get_overtime_category_option(){
    $this->db->where('is_deleted', 'no');
    $query = $this->db->get('hr_overtime_categories');
  
  
    if($query->num_rows()>0)
    {
        return($query->result());

    }
       
    return array();
}

public function get_overtime_new_request_status()
{
   
    $query = $this->db->select('*')
        ->from('hr_overtime_request_status') 
        ->where('is_deleted', 'no') 
        ->where('overtime_request_status !=', 'Pending') 
        ->get();

    if ($query->num_rows() > 0) {
        return $query->result(); 
    }

    return []; 
}
public function get_overtime_details()
    {
        $this->db->select('hr_overtime_register.*, CONCAT(e.employee_number, " ", e.first_name, " ", e.last_name) AS employee_name, s.overtime_request_status');
        $this->db->from('hr_overtime_register');
        $this->db->join('hr_employee_master e', 'hr_overtime_register.employee_id = e.employee_id');
        $this->db->join('hr_overtime_request_status s', 'hr_overtime_register.overtime_request_status_id = s.id');
        $this->db->where('hr_overtime_register.is_deleted',"no");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    public function get_overtime_rate($category_id) {
         
        $this->db->select('overtime_rate');
        $this->db->where('id', $category_id);
        $query = $this->db->get('hr_overtime_categories');
        // echo "Last Query: " . $this->db->last_query($query);

      
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->overtime_rate;
        } else {
            return null; 
        }
    }

    public function  update_overtime_requests_details($row_id, $data){
        $this->db->where('id', $row_id);
        $this->db->update('hr_overtime_register', $data);
       
        if ($this->db->affected_rows() > 0) {
            return true; 
        } else {
            return false; 
        }
    }

    public function get_overtime_request_by_id($row_id)
    {
        $query = $this->db->select('*')
            ->from('hr_overtime_register')
            ->where('id', $row_id)
            ->where('is_deleted', 'no')
            ->get();
            // echo "Last Query: " . $this->db->last_query();

        if ($query->num_rows() > 0) {
            return $query->row(); 
        }

        return null; 
    }

    public function get_new_overtime_details()
    {
        $this->db->select('hr_overtime_register.*, CONCAT(e.employee_number, " ", e.first_name, " ", e.last_name) AS employee_name, s.overtime_request_status');
        $this->db->from('hr_overtime_register');
        $this->db->join('hr_employee_master e', 'hr_overtime_register.employee_id = e.employee_id');
        $this->db->join('hr_overtime_request_status s', 'hr_overtime_register.overtime_request_status_id = s.id');
        $this->db->where('hr_overtime_register.is_deleted',"no");
        $this->db->where('hr_overtime_register.overtime_request_status_id',"1");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    
public function save_new_overtime_request($data, $row_id) {
    $this->db->where('id', $row_id);
    $this->db->update('hr_overtime_register', $data);

    return $this->db->affected_rows() > 0;
}

public function get_overtime_verified_details()
{
    $this->db->select('hr_overtime_register.*, CONCAT(e.employee_number, " ", e.first_name, " ", e.last_name) AS employee_name, s.overtime_request_status');
    $this->db->from('hr_overtime_register');
    $this->db->join('hr_employee_master e', 'hr_overtime_register.employee_id = e.employee_id');
    $this->db->join('hr_overtime_request_status s', 'hr_overtime_register.overtime_request_status_id = s.id');
    $this->db->where('hr_overtime_register.is_deleted',"no");
    $this->db->where('hr_overtime_register.overtime_request_status_id',"2");
    $query = $this->db->get();
    // echo "Last Query: " . $this->db->last_query($query);

    if ($query->num_rows() > 0) {
        return $query->result_array();
    } else {
        return array();
    }
}

public function fetch_overtime_by_id($row_id) {
    $this->db->where('id', $row_id);
    $query = $this->db->get('hr_overtime_register');

    if ($query->num_rows() == 1) {
        return $query->row();
    } else {
        return false;
    }
}

public function save_overtime_verified($data,$row_id){

    $this->db->where('id', $row_id);
    $this->db->update('hr_overtime_register', $data);
    return $this->db->affected_rows() > 0; 
    echo json_encode($response);

    }

    public function get_overtime_approved_details()
    {
        $this->db->select('hr_overtime_register.*, CONCAT(e.employee_number, " ", e.first_name, " ", e.last_name) AS employee_name, s.overtime_request_status');
        $this->db->from('hr_overtime_register');
        $this->db->join('hr_employee_master e', 'hr_overtime_register.employee_id = e.employee_id');
        $this->db->join('hr_overtime_request_status s', 'hr_overtime_register.overtime_request_status_id = s.id');
        $this->db->where('hr_overtime_register.is_deleted',"no");
        $this->db->where('hr_overtime_register.overtime_request_status_id',"3");
        $query = $this->db->get();
        // echo "Last Query: " . $this->db->last_query($query);
    
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function get_overtime_approved_by_id($row_id) {
        $this->db->where('id', $row_id);
        $query = $this->db->get('hr_overtime_register');
    
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function save_overtime_approved($data,$row_id){

        $this->db->where('id', $row_id);
        $this->db->update('hr_overtime_register', $data);
        return $this->db->affected_rows() > 0; 
        echo json_encode($response);
    
        }
        public function get_new_overtime_request_by_id($row_id)
        {
        
            $this->db->where('id', $row_id);
            $query = $this->db->get('hr_overtime_register');
            // echo "Last Query: " . $this->db->last_query();
        
                if ($query->num_rows() == 1) {
                    return $query->row();
                } else {
                    return false;
                }
                    echo json_encode($response);
        
        }    
        
        // code by mufi
        public function get_leave_days()
            {
                $query = $this->db->select('*')
                    ->from('hr_leave_category') 
                    ->get();
                if ($query->num_rows() > 0) {
                    return $query->result(); 
                }
                
                return [];  
            }


            public function get_calendar_master_id(){
                $query = $this->db->get('hr_calendar_master');
              
                if($query->num_rows()>0)
                {
                    return($query->result());
            
                }
                   
                return array();
            }
            
            public function get_leave_category_id()
            {
                $query = $this->db->get('hr_leave_category');
              
                if($query->num_rows()>0)
                {
                    return($query->result());
            
                }
                   
                return array();
            }
            
            public function get_leave_master()
            {
                $this->db->select('hr_leave_master.id,year_name,leave_category,number_of_leaves_per_year,maximum_can_be_taken_in_a_month');
                $this->db->from('hr_leave_master');
                $this->db->join('hr_calendar_master', 'hr_leave_master.calendar_master_id = hr_calendar_master.id', 'left');
                $this->db->join('hr_leave_category', 'hr_leave_master.leave_category_id = hr_leave_category.id', 'left');
                $this->db->where('hr_leave_master.is_deleted', 'no');

                $query = $this->db->get(); 

                return $query->result();
            }


            public function  update_leave_master($row_id, $data)
            {
               
                $this->db->where('id', $row_id);
                $this->db->update('hr_leave_master', $data);
               
                if ($this->db->affected_rows() > 0) {
                    return true; 
                } else {
                    return false; 
                }
            }
            
            public function get_leave_master_by_id($row_id)
            {
                $query = $this->db->select('*')
                    ->from('hr_leave_master')
                    ->where('id', $row_id)
                    ->where('is_deleted', 'no')
                    ->get();

                if ($query->num_rows() > 0) {
                    return $query->row(); 
                }

                return null; 
            }

            
public function delete_leave_master_by_id($row_id)
{
    $data = array(
        'is_deleted' => 'yes',  
        'deleted_by' => $_SESSION['user_id'],
        'deleted_on' => date('Y-m-d H:i:s')
    );
   
    $this->db->where('id', $row_id);
    return $this->db->update('hr_leave_master', $data);
}

public function get_leave_category_option($calendar_master_val)
{
    $this->db->select('*');
    $this->db->from('hr_leave_category');
    $this->db->where('is_deleted', 'no');
    $this->db->where_not_in('id', "SELECT leave_category_id FROM hr_leave_master WHERE calendar_master_id = '$calendar_master_val'", false);
    $query = $this->db->get();
    // echo "Last Query: " . $this->db->last_query(); 
    return $query->result();
}

public function get_setupdata_overtime_details()
    {
        $query = $this->db->select('*')
        ->from('hr_overtime_categories') 
        ->where('is_deleted', 'no') 
        ->get();
    if ($query->num_rows() > 0) {
        return $query->result(); 
    }

    return [];

    }

    public function  update_setupdata_overtime_details($row_id, $data)
    {
        $this->db->where('id', $row_id);
        $this->db->update('hr_overtime_categories', $data);
    
        if ($this->db->affected_rows() > 0) {
            return true; 
        } else {
            return false; 
        }
    }

    public function get_setupdata_overtime_by_id($row_id)
{
    $query = $this->db->select('*')
        ->from('hr_overtime_categories')
        ->where('id', $row_id)
        ->where('is_deleted', 'no')
        ->get();
        //  echo "Last Query: " . $this->db->last_query();

    if ($query->num_rows() > 0) {
        return $query->row(); 
    }

    return null; 
}

public function delete_setupdata_overtime_by_id($row_id)
{
    $data = array(
        'is_deleted' => 'yes',  
        'deleted_by' => $_SESSION['user_id'],
        'deleted_on' => date('Y-m-d H:i:s')
    );

    $this->db->where('id', $row_id);
    return $this->db->update('hr_overtime_categories', $data);
}
public function get_recordstatus_overtime_details()
{
    $query = $this->db->select('*')
    ->from('hr_overtime_request_status') 
    ->where('is_deleted', 'no') 
    ->get();
   if ($query->num_rows() > 0) {
     return $query->result(); 
   }

return [];

}

//code by mashu
public function get_individual_employee_personal_data($individual_employee_id) {
    $this->db->select('*');
    $this->db->from('hr_employee_master_view');
    $this->db->where('employee_id', $individual_employee_id);
    $this->db->where('is_active', 'yes');
    $query = $this->db->get();

    if ($query->num_rows() ==1) {
        return $result = $query->row();
    } else 
    {
        return null; 
    }
}

public function get_individual_employee_emergency_contacts($individual_employee_id) {
    $this->db->select('eecd.*, hr.id, hr.relation as relation_with_employee'); 
    $this->db->from('hr_employee_emergency_contact_details eecd');
    $this->db->join('hr_relations hr', 'eecd.relation_with_employee_id = hr.id', 'inner');
    $this->db->where('eecd.is_deleted', 'no');
    $this->db->where('eecd.employee_id', $individual_employee_id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->result(); 
    }

    return [];
    
}

public function get_individual_employee_work_history_table_data($individual_employee_id) {
    $this->db->from('hr_employee_employment_details AS ed');
    $this->db->join('hr_employee_master AS em', 'ed.employee_id = em.employee_id', 'inner');
    $this->db->join('hr_branches AS b', 'ed.branch_id = b.id', 'inner');
    $this->db->join('hr_departments AS d', 'ed.department_id = d.id', 'inner');
    $this->db->join('hr_job_title AS j', 'ed.job_title_id = j.id', 'inner');
    $this->db->join('hr_pay_scales AS p', 'ed.pay_scale_id = p.id', 'inner');
    $this->db->join('hr_employment_status AS es', 'ed.employment_status_id = es.id', 'inner');
    
    
    $this->db->select('ed.id, CONCAT(em.employee_number," ",em.first_name, " ", em.last_name) as employee_name, b.branch_name, d.department_name, j.job_title, p.pay_scale_name, es.employment_status');
    $this->db->where('ed.is_deleted', 'no'); 
    $this->db->where('ed.employee_id', $individual_employee_id); 
    
     $query = $this->db->get();
    // echo "Last Query: " . $this->db->last_query($query);
    if ($query->num_rows() > 0) {
        return $query->result();
    }
    
    return [];
}

public function get_individual_employee_education_table_data($individual_employee_id) {
    $this->db->select('eed.id, CONCAT(em.employee_number," ",em.first_name," ",em.last_name) AS employee_name,em.employee_number, edu.education_name as education_name, eed.institute_name, eed.start_date, eed.completed_date, eed.score_grade, eed.details');
    $this->db->from('hr_employee_education_details eed');
    $this->db->join('hr_employee_master em', 'eed.employee_id = em.employee_id', 'inner');
    $this->db->join('hr_education edu', 'eed.education_id = edu.id', 'inner');
    $this->db->where('eed.is_deleted', 'no');
    $this->db->where('eed.employee_id', $individual_employee_id);

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result();
    }

    return [];
}

public function get_individual_employee_certification_table_data($individual_employee_id) {
    $this->db->select('ecd.id, CONCAT(em.employee_number," ",em.first_name," ",em.last_name) AS employee_name, em.employee_number, ctr.certification_name AS certification_name, ecd.institute_name, ecd.date_issued, ecd.date_valid_upto, ecd.score_grade');
    $this->db->from('hr_employee_certification_details ecd');
    $this->db->join('hr_employee_master em', 'ecd.employee_id = em.employee_id', 'inner');
    $this->db->join('hr_certifications ctr', 'ecd.certification_id = ctr.id', 'inner');
    $this->db->where('ecd.is_deleted', 'no');
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result();
    }
    return [];
}

public function get_individual_employee_language_table_data($individual_employee_id) {
    $this->db->select('elp.id, CONCAT(em.employee_number," ",em.first_name," ",em.last_name) AS employee_name, hl.language_name AS language_name, 
    hlp_reading.language_proficiency AS reading_proficiency, 
    hlp_speaking.language_proficiency AS speaking_proficiency, 
    hlp_writing.language_proficiency AS writing_proficiency, 
    hlp_listening.language_proficiency AS listening_proficiency');
    $this->db->from('hr_employee_langauge_proficiency elp');
    $this->db->join('hr_employee_master em', 'elp.employee_id = em.employee_id', 'inner');
    $this->db->join('hr_languages hl', 'elp.language_id = hl.id', 'inner');
    $this->db->join('hr_language_proficiency hlp_reading', 'elp.reading_proficiency_id = hlp_reading.id', 'inner');
    $this->db->join('hr_language_proficiency hlp_speaking', 'elp.speaking_proficiency_id = hlp_speaking.id', 'inner');
    $this->db->join('hr_language_proficiency hlp_writing', 'elp.writing_proficiency_id = hlp_writing.id', 'inner');
    $this->db->join('hr_language_proficiency hlp_listening', 'elp.listening_proficiency_id = hlp_listening.id', 'inner');
    $this->db->where('elp.is_deleted', 'no');
    $this->db->where('elp.employee_id', $individual_employee_id);

    $query = $this->db->get();
    // echo "Last Query: " . $this->db->last_query($query);

    if ($query->num_rows() > 0) {
    return $query->result();
    }

    return [];
}

public function get_individual_employee_dependents_table_data($individual_employee_id) {
    $this->db->select('ed.id, em.first_name AS employee_name, ed.dependent_name, hr.relation AS relation_with_employee, ed.date_of_birth, ed.aadhar_number, ed.passport_number');
    $this->db->from('hr_employee_dependents ed');
    $this->db->join('hr_employee_master em', 'ed.employee_id = em.employee_id', 'inner');
    $this->db->join('hr_relations hr', 'ed.relation_with_employee_id = hr.id', 'inner');
    $this->db->where('ed.is_deleted', 'no');

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result();
    }

    return [];
}

public function get_individual_employee_skills_data($individual_employee_id) {
    $this->db->select('hr_employee_skills.id,details,skill_name,CONCAT(hr_employee_master.employee_number, " ", hr_employee_master.first_name, " ", hr_employee_master.last_name) as employee_name');
     $this->db->from('hr_employee_skills');
     $this->db->join('hr_employee_master', 'hr_employee_skills.employee_id = hr_employee_master.employee_id', 'left');
     $this->db->join('hr_skills', 'hr_employee_skills.skill_id = hr_skills.id', 'left');
     $this->db->where('hr_employee_skills.is_deleted', 'no');
     $this->db->where('hr_employee_skills.employee_id', $individual_employee_id);
     $query = $this->db->get();
     if ($query->num_rows() > 0) {
         return $query->result();
     }
 
     return [];
 }

 public function get_team_employee_name_options(){
    $this->db->from('hr_employee_master');
    // Select the columns you need
    // $this->db->select('employee_id, CONCAT(employee_number," ",first_name, " ",last_name) as employee_name');
    $this->db->select('employee_id, CONCAT(employee_number," ",first_name, " ",last_name) as employee_name');
    $this->db->where('is_deleted', 'no'); 
    $this->db->where('hr_employee_master.company_id',$this->session->userdata('company_id_in_hr'));
    // Execute the query
    $query = $this->db->get();

    // Get the result
    return $query->result();
}
 
public function get_leave_category_options(){
    $this->db->where('is_deleted', 'no');
    $query = $this->db->get('hr_leave_category');
  
    if($query->num_rows()>0)
    {
        return($query->result());

    }
       
    return array();
}

public function new_leave_request_option(){
        
    $this->db->select('id,leave_request_status');
    $this->db->from('hr_employee_leave_request_status');
    $this->db->where('leave_request_status !=', 'Pending');
    $this->db->where('is_deleted',"no");
    $query = $this->db->get();
    return $query->result();

}

public function  verified_leave_request_option() {
    //  $company_id_in_hr = $this->session->userdata('company_id_in_hr');
    $this->db->select('id, leave_request_status');
    $this->db->from('hr_employee_leave_request_status');
    $this->db->where('leave_request_status !=', 'Pending');
    $this->db->where('leave_request_status !=', 'Verified');
    $this->db->where('is_deleted',"no");
    $query = $this->db->get();
    return $query->result();
    }

    public function  approved_leave_request_option() {
        //  $company_id_in_hr = $this->session->userdata('company_id_in_hr');
        $this->db->select('id, leave_request_status');
        $this->db->from('hr_employee_leave_request_status');
        $this->db->where('leave_request_status !=', 'Pending');
        $this->db->where('leave_request_status !=', 'Verified');
        $this->db->where('leave_request_status !=', 'Approved');
        $this->db->where('is_deleted',"no");
        $query = $this->db->get();
        return $query->result();
        }

        public function forget_leave_from_time_option($leave_from_date,$company_id_in_hr){
            $this->db->select('id,start_time,end_time');
            $this->db->from('hr_calendar_year');
            $this->db->where('is_working_day',"yes");
            $this->db->where('company_id',$company_id_in_hr);
           $this->db->where('date_of_the_day',$leave_from_date);
           $query=$this->db->get();
        //    echo "Last Query: " . $this->db->last_query($query);
            return $query->result();
            
        }
        public function forget_leave_to_time_option($leave_to_date,$company_id_in_hr){
            $this->db->select('id,start_time,end_time');
            $this->db->from('hr_calendar_year');
            $this->db->where('is_working_day',"yes");
            $this->db->where('company_id',$company_id_in_hr);
           $this->db->where('date_of_the_day',$leave_to_date);
           $query=$this->db->get();
        //    echo "Last Query: " . $this->db->last_query($query);
            return $query->result();
            
        }
        public function insert_employee_leave_register($data)
        {
            return $this->db->insert('hr_employee_leave_register', $data);

        } 
        public function update_employee_leave_register($data,$row_id)
        {
            $this->db->where('id', $row_id);
            $this->db->update('hr_employee_leave_register', $data);
            return $this->db->affected_rows() > 0; 
        }

        public function get_leave_register_details()
        {
            
            $this->db->select('hr_employee_leave_register.id,requested_date,leave_request_status,leave_category,leave_from_date,leave_from_time,leave_to_date,leave_to_time,reason_for_leave, CONCAT(hr_employee_master.employee_number, " ", hr_employee_master.first_name, " ", hr_employee_master.last_name) as employee_name');
            $this->db->from('hr_employee_leave_register');
            $this->db->join('hr_employee_master', 'hr_employee_leave_register.employee_id = hr_employee_master.employee_id', 'left');
            $this->db->join('hr_leave_category', 'hr_employee_leave_register.leave_category_id = hr_leave_category.id', 'left');
            $this->db->join('hr_employee_leave_request_status', 'hr_employee_leave_register.leave_request_status_id = hr_employee_leave_request_status.id', 'left');
            $this->db->where('hr_employee_leave_register.is_deleted',"no");
            $query = $this->db->get();
            return $query->result();
        }

        
    public function get_employee_leave_register_by_id($row_id){

        $this->db->where('id', $row_id);
        $query = $this->db->get('hr_employee_leave_register');

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }

    }

    public function delete_employee_leave_register_by_id($row_id)
    {
        $this->db->where('id', $row_id);
        $this->db->set('deleted_by', $_SESSION['user_id']);
        $this->db->set('deleted_on', date('Y-m-d H:i:s'));
        $this->db->set('is_deleted','yes');

        $this->db->update('hr_employee_leave_register');
        return $this->db->affected_rows() > 0;
    }

    public function get_new_leave_register_request()
    {
        $this->db->select('hr_employee_leave_register.id,requested_date,leave_category,leave_from_date,leave_from_time,leave_to_date,leave_to_time,reason_for_leave, CONCAT(hr_employee_master.employee_number, " ", hr_employee_master.first_name, " ", hr_employee_master.last_name) as employee_name');
        $this->db->from('hr_employee_leave_register');
        $this->db->join('hr_employee_master', 'hr_employee_leave_register.employee_id = hr_employee_master.employee_id', 'left');
        $this->db->join('hr_leave_category', 'hr_employee_leave_register.leave_category_id = hr_leave_category.id', 'left');
        $this->db->where('hr_employee_leave_register.is_deleted',"no");
        $this->db->where('hr_employee_leave_register.leave_request_status_id',"1");
        $query = $this->db->get();
        //  echo "Last Query: " . $this->db->last_query($query);

        return $query->result();
    } 

    public function get_leave_new_request_by_id($row_id){
        
        $this->db->where('id', $row_id);
        $query = $this->db->get('hr_employee_leave_register');
    
            if ($query->num_rows() == 1) {
                return $query->row();
            } else {
                return false;
            }
        echo json_encode($response);
    
    }

    public function save_new_leave_request($data,$row_id){

        $this->db->where('id', $row_id);
        $this->db->update('hr_employee_leave_register', $data);
        return $this->db->affected_rows() > 0; 
        echo json_encode($response);
    
        }

        public function get_approved_leave_details()
        {
            $this->db->select('hr_employee_leave_register.id,requested_date,leave_category,leave_from_date,leave_from_time,leave_to_date,leave_to_time,reason_for_leave, CONCAT(hr_employee_master.employee_number, " ", hr_employee_master.first_name, " ", hr_employee_master.last_name) as employee_name');
            $this->db->from('hr_employee_leave_register');
            $this->db->join('hr_employee_master', 'hr_employee_leave_register.employee_id = hr_employee_master.employee_id', 'left');
            $this->db->join('hr_leave_category', 'hr_employee_leave_register.leave_category_id = hr_leave_category.id', 'left');
            $this->db->where('hr_employee_leave_register.is_deleted',"no");
            $this->db->where('hr_employee_leave_register.leave_request_status_id',"3");
            $query = $this->db->get();
            //  echo "Last Query: " . $this->db->last_query($query);
        
            return $query->result();
        }

        // public function get_leave_verified_by_id($row_id){
        
        //     $this->db->where('id', $row_id);
        //     $query = $this->db->get('hr_employee_leave_register');
        
        //         if ($query->num_rows() == 1) {
        //             return $query->row();
        //         } else {
        //             return false;
        //         }
        //     echo json_encode($response);
        
        // }

        public function save_leave_approved($data,$row_id){

            $this->db->where('id', $row_id);
            $this->db->update('hr_employee_leave_register', $data);
            return $this->db->affected_rows() > 0; 
            echo json_encode($response);
        
            }

            public function get_verified_leave_details()
            {
                $this->db->select('hr_employee_leave_register.id,requested_date,leave_category,leave_from_date,leave_from_time,leave_to_date,leave_to_time,reason_for_leave, CONCAT(hr_employee_master.employee_number, " ", hr_employee_master.first_name, " ", hr_employee_master.last_name) as employee_name');
                $this->db->from('hr_employee_leave_register');
                $this->db->join('hr_employee_master', 'hr_employee_leave_register.employee_id = hr_employee_master.employee_id', 'left');
                $this->db->join('hr_leave_category', 'hr_employee_leave_register.leave_category_id = hr_leave_category.id', 'left');
                $this->db->where('hr_employee_leave_register.is_deleted',"no");
                $this->db->where('hr_employee_leave_register.leave_request_status_id',"2");
                $query = $this->db->get();
                //  echo "Last Query: " . $this->db->last_query($query);
            
                return $query->result();
            } 
    
            public function get_leave_verified_by_id($row_id){
        
                $this->db->where('id', $row_id);
                $query = $this->db->get('hr_employee_leave_register');
            
                    if ($query->num_rows() == 1) {
                        return $query->row();
                    } else {
                        return false;
                    }
                echo json_encode($response);
            
            }

            public function save_leave_verified($data,$row_id){

                $this->db->where('id', $row_id);
                $this->db->update('hr_employee_leave_register', $data);
                return $this->db->affected_rows() > 0; 
                echo json_encode($response);
            
                }



  

            


}