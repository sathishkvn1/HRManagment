<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class HrMenuModel extends CI_Model {
   
   
    public function get_user_role()
    {
        $query = $this->db->get('user_role');
        $res =$query->result();
        // echo $this->db->last_query();
        
        if ($query->num_rows() > 0) {
            return $query->result(); 
        } else {
            return array();
        }
    }
    public function get_main_menu(){
        $query = $this->db->get('hr_main_menu');
      
        if($query->num_rows()>0)
        {
            return($query->result());

        }
           
        return array();
    }

   
    public function get_sub_menu($id=""){
        if($id!="")
        {
            $query =$this->db->where('main_menu_id', $id) 
                ->get('hr_sub_menu');
        }
        else
            $query = $this->db->get('hr_sub_menu');  
      
        if($query->num_rows()>0)
        {
            return($query->result());

        }
           
        return array();
    }

    public function get_main_menu_permission($role="")
    {
       
        $this->db->where('role_id', $role);
        $this->db->where('is_granted', 'Yes');

        return $this->db->get('view_hr_main_menu_permission')->result();

    }
    public function get_sub_menu_permission($main_menu_id="",$role="") {
        
         $this->db->where('main_menu_id', $main_menu_id);
         $this->db->where('role_id', $role);
         $this->db->where('is_granted', 'yes');
       $res= $this->db->get('view_hr_sub_menu_permission');
    
        return $res->result();
       
    }
    public function get_sub_menu_tab_permission($sub_menu_id ="",$role="")
    {
        
        $this->db->where('sub_menu_id', $sub_menu_id);
            $this->db->where('role_id', $role);
            $this->db->where('is_granted', 'yes');
        $res= $this->db->get('view_hr_sub_menu_tab_permission');
        
        return $res->result();
    }

    public function get_all_main_menu_permission($role="")
    {
       
        $this->db->where('role_id', $role);

        return $this->db->get('view_hr_main_menu_permission')->result();
        // echo $this->db->get('view_hr_main_menu_permission')->result();

    } 
   
public function get_all_sub_menu_permission($main_menu_id="",$role="") {
        
         $this->db->where('main_menu_id', $main_menu_id);
         $this->db->where('role_id', $role);
       $res= $this->db->get('view_hr_sub_menu_permission');
    
        return $res->result();
       
    }
    
    //  public function save_permission()
    // {
    //     // $userId                 = $this->input->post('user_id');
    //   $role                    = $this->input->post('user_role');
    //   $selectedMainMenuItems   = $this->input->post('main_Menu');
    //   $selectedSubMenus        = $this->input->post('submenu');
    // //    print_r($selectedMainMenuItems);
    // //    exit;
    //   foreach ($selectedMainMenuItems as $mainMenu) {
    //         $data = array(
               
    //             'is_granted'   => 'Yes'
    //         );
    //         $where  = "main_menu_id='{$mainMenu}' AND role_id='{$role}'";
    //         $result= $this->User_rights_model->update_main_menu_permission($data,$where);
    //     //    $lastInsertedId= $this->User_rights_model->insert_main_menu_permission($data);
    //     }
    //     foreach($selectedSubMenus as $submenu)
    //     {
    //         $data=  array(
                
    //             'is_granted'           => 'Yes'
                
    //         );
    //         $where  = "sub_menu_id='{$submenu}' AND role_id='{$role}'";
    //         $result= $this->User_rights_model->update_sub_menu_permission($data,$where);
    //         // $lastInsertedId= $this->User_rights_model->insert_sub_menu_permission($data);

    //     }
    //     if($result)
    //         echo "Success";
    // }

 public function update_main_menu_permission($data,$where)
    {
       
        // $this->db->update('hr_permission_main_menu', $data,$where);
        $this->db->update('hr_main_menu_permission', $data,$where);
// 	echo 	$this->db->last_query();
			return $this->db->affected_rows();
    }
    public function update_sub_menu_permission($data,$where)
    {
       
        // $this->db->update('hr_permission_sub_menu', $data,$where);
                $this->db->update('hr_sub_menu_permission', $data,$where);

			return $this->db->affected_rows();
    }
}