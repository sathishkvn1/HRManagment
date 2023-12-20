<?php
class AdminModel extends CI_Model{
    
    function __construct() {
        parent::__construct();
        
	$this->load->helper('common_functions_helper'); // for password encription/ verification
	$this->load->helper('send_email_helper');
        
        ini_set('max_execution_time',300);
        ini_set('memory_limit', '64M'); //Raise to 512 MB
        ini_set('post_max_size', '64M');
        ini_set('upload_max_filesize', '64M');
        ini_set("date.timezone", "Asia/Kolkata");
	
        //session_start();
    }
  
    
/* 
  * 
  * where isMenuStatus=True meanse 'Showing' status
		  by default, 
		  pass FALSE for not 'Showing'
 **/

public function getAdminMenuCategory($isMenuStatus=TRUE)
{

    $SQL = "SELECT  Id, Category, FaIcon, Status, MenuOrder"; 
   $SQL .= " FROM sys_admin_menu_category ";
   
   if($isMenuStatus)
       $SQL .= " WHERE Status ='Showing' ";

   $SQL .="  ORDER BY `MenuOrder`";

   $data = array();
   $result = $this->db->query($SQL);
   
   if ($result->num_rows() > 0)
           $data = $result->result_array();  // returning the records as an array.
        
      // $dataReturn = array();
       //$dataReturn["admin_navigation"] = $data; 
   
       return $data;

} 	


/* 
 * 
 * where categoryStatus=True meanse 'Showing' status
         menuStatus= TRUE means 'Showing' status , by default, 
         pass FALSE for not 'Showing'
**/
public function getAdminMenu($menuCategoryId, $categoryStatus=TRUE, $menuStatus=TRUE)
{
/*
    $SQL = "SELECT  M.Id, S.MenuItemId, M.MenuItem AS MainMenu,M.ShowCount,M.linkPage,M.countTitle, M.countTable, M.countWhereClause, ";
   $SQL .= " IFNULL (S.SubMenuItem,'NULL') AS SubMenuItem, ";
   $SQL .= " S.pageLink AS SubPageLink, M.FaIcon AS MainIcon, S.FaIcon AS SubIcon, M.Status AS MainStatus,S.Status AS SubStatus";
   $SQL .= " FROM sys_admin_menu AS M ";
   $SQL .="  LEFT JOIN sys_admin_sub_menu AS S on M.Id = S.MenuItemId";
   $SQL .="  ORDER BY S.MenuItemId,M.`MenuOrder`, S.SubMenuOrder";
   */
   
   $WHERE ="";
   
   $SQL = "SELECT  M.Id, M.CategoryId,M.BrqProjectId, C.Category,";
   $SQL .= " M.MenuItem  AS MainMenu,M.ShowCount,M.linkPage,";
   $SQL .= " M.countTitle, M.countTable, M.countWhereClause,";
   $SQL .= " M.FaIcon AS MainIcon, M.Status AS MainStatus,";
   $SQL .= " C.Status AS CategoryStatus ";
   $SQL .= " FROM sys_admin_menu AS M ";
   $SQL .= " LEFT JOIN sys_admin_menu_category AS C on M.CategoryId = C.Id";
   $SQL .= " WHERE M.CategoryId='{$menuCategoryId}'";
   
   $categoryStatus ? $WHERE.=" AND C.`Status`= 'Showing'" : $WHERE = "";
   $menuStatus		? $WHERE.=" AND M.`Status`= 'Showing'" : $WHERE = "";	
   
   $SQL .= $WHERE;
   
   $SQL .= " ORDER BY C.Id, C.`MenuOrder`, M.`MenuOrder`";
   
   $data = array();
   $result = $this->db->query($SQL);
   
   if ($result->num_rows() > 0)
           $data = $result->result_array();  // returning the records as an array.
        
      // $dataReturn = array();
       //$dataReturn["admin_navigation"] = $data; 
   
       return $data;

} 

/* 
 * 
 * where isStatus=True meanse 'Showing' status
         by default, 
         pass FALSE for not 'Showing'
**/ 

public function getSubMenuItem($menuId, $isStatus=TRUE)
{
    $SQL = "  SELECT Id, MenuItemId,  ";
   $SQL .= " IFNULL (SubMenuItem,'NULL') AS SubMenuItem,countWhereClause, Description,TopNavClass,";
   $SQL .= " pageLink AS SubPageLink, FaIcon AS SubIcon, CountTitle AS SubCountTitle,IconImagePath, Status AS SubStatus,ShowInSeparatePage,CountTable";
   $SQL .="  FROM sys_admin_sub_menu WHERE MenuItemId='{$menuId}'";
   
   if($isStatus)
       $SQL .="  AND VisibleStatus='1'";
   
   $SQL .="  ORDER BY SubMenuOrder";
   
   $result = $this->db->query($SQL);
   if ($result->num_rows() > 0)
     $data = $result->result_array();  // returning the records as an array.

    return $data;

}

public function getUnderSubMenuItem($menuId, $isStatus=TRUE)
{
    $SQL = "  SELECT Id, MenuItemId,  ";
   $SQL .= " IFNULL (UnderSubMenuItem,'NULL') AS UnderSubMenuItem,countWhereClause, Description,";
   $SQL .= " pageLink AS UnderSubPageLink, FaIcon AS UnderSubIcon, CountTitle AS UnderSubCountTitle,IconImagePath, Status AS UnderSubStatus,ShowInSeparatePage,CountTable";
   $SQL .="  FROM sys_admin_under_sub_menu WHERE SubMenuItemId='{$menuId}'";
   
   if($isStatus)
       $SQL .="  AND VisibleStatus='1'";
   
   $SQL .="  ORDER BY UnderSubMenuOrder";
   
   $result = $this->db->query($SQL);
   if ($result->num_rows() > 0)
     $data = $result->result_array();  // returning the records as an array.

    return $data;

}
    /*public function adminLoginCheck($userId, $userPass,$userGroupId="", $remember=FALSE)
    {
    	
        $SQL  = " 	SELECT Id, UserId, `Password`,UserType, EmployeeId ";
        $SQL .= "  FROM login WHERE UserId='{$userId}' AND UserGropId='{$userGroupId}'";
		$SQL .= "  AND Status='Active'  LIMIT 1";
	
	
        $data = array();
      
        $records = $this->db->query($SQL); // --- using db->query Method
        
        if($records->num_rows()<=0)
			return FALSE;
			
	    		
        
        else  // getting the password from table
        {
            foreach ($records->result() as $row)
                {
                    $logPass=$row->Password;
				    $data['USER_TYPE'] = $row->UserType;
                    
                    if(!verifyPassword($userPass, $logPass))
                        {
                            
                            return FALSE;
                        }
                   else
                       
                   {  
				   
						// --- FOR AUTHENTICATING THE COOKIE data, if login by cookie : START ------	
						
						 // get data from cookie.. check
						 
						$cookieUserId		='11'; // get from the cookie.
						
						$auth 		= new CookieTokenAuthenticate();
						$result 	= $auth->getUserById($cookieUserId, 'login'); // here login is the admin login table name.
		
						//   
						   if($remember) // if remember  yes. --> setting cookie for remember me option checked.
						   {
							   // ----- setting the cookies. for  future login ---->
								
								$token				= new Token();  // remember me option  token creating for cookie.
																	//	Defined in site_helper ->  inside helper folder.
								
								$tokenKey			= $token-> getToken(100); // token length of 100.
								$crypto				= $token-> cryptoRandSecure(1,9999); // a random key
								$selectorHash		= $tokenKey.$crypto;
								
								$id 				= $row->Id;
								$password 			= encriptPassword($userPass);
								$adminId 			= $userId;
								$site				= base_url();
								 
								 // o->  This will remember each 30 days of new login.
								 // o->  If,  the user not login for 1 month from the same computer the id will be deleted that will be  the concept of this code.
								 // o->  all the variable in the cookies will expire in 30 days if not login
								 // o->  The cookie will set each login expire date for another 30 days.
								 // o->  Code by sandeep.
								
								setcookie("id", $id, strtotime('+30 days'), "/", "", "", TRUE);
								setcookie("user_name", $adminId, strtotime('+30 days'), "/", "", "", TRUE);
								setcookie("pass", $password, strtotime('+30 days'), "/", "", "",  TRUE);
								setcookie("web_site",  $site, strtotime('+30 days'), "/", "", "",  TRUE);
								setcookie("token",  $selectorHash, strtotime('+30 days'), "/", "", "",  TRUE);
								setcookie("module",  "admin", strtotime('+30 days'), "/", "", "",  TRUE);
							   
						   }
							
							$_SESSION['LAST_ACTION'] 	= time(); // for session expiry manage.
						    
							$_SESSION['ADMIN_ID'] 		=$userId;
                            $_SESSION['ADMIN_PASS'] 	=$userPass;
                            $_SESSION['ADMIN_USER_TYPE']=$row->UserType;
                            $_SESSION['ADMIN_LOGIN_ID'] =$row->Id;
							$_SESSION['EMPLOYEE_ID'] 	=$row->EmployeeId;
							
							$db  		  = new Database();
						    $ProfilePhoto = $db->getFieldValueById("employee_master", "ProfilePhoto", "Id='{$row->EmployeeId}'");
                            
							$_SESSION['PROFILE_PHOTO'] 	=$ProfilePhoto;
							// ----- user rounded image for admin panel profile---
							$uphoto = $ProfilePhoto;
							
							//NOTE:  converting to .png extension for user photo(rounded image) for admin panel, user photo always should have .png, and should save with prefix user- (resolution 66x66)
							
							
							//if (strpos($uphoto, '.jpg') !== false) {
								$uphoto = str_replace(".jpg",".png",$uphoto);
								
								$uphoto = "user-".$uphoto;
							//}
							
							$_SESSION['USER_PHOTO'] = $uphoto;
							
							//------------------------------------------------
                            $loginIP    = getRequestIPAddress();
                            $Id         = $row->Id;
                            
			    
                            //------------------ updating the Last Login IP address & User_Log table
                            $today = date('Y-m-d');
						$logData= array (
										'LastLoginIP' => $loginIP,
										'LoginStatus' => '1',
										'LastLoginDate'=>date("Y-m-d H:i:s")	
                            
										);
							
			    $this->db->where('Id',$Id);
                            $this->db->update('login',$logData);
                           			   
                            //----- inseting into user_log table
                     
                            $insertData= array (
									'UserId' => $Id,
									'UserName' => $userId,
									'UserType' => $row->UserType,
									'LastLoginIP' => $loginIP,
									'SessionId' => session_id(), // this would be the last session id for login.
									'LastLoginDate'=>date("Y-m-d H:i:s")
			    
                            );
                            
                            $this->db->insert('sys_user_log',$insertData);
                            $_SESSION['ADMIN_USER_LOG_ID'] =  $this->db->insert_id(); // this is for inserting user actions into user_log_detail table
                           
                           
                            
                        return TRUE;
                   }     
                }
            
            
        }
    }*/

	public function adminLoginCheck($userId, $userPass,$userGroupId="", $remember=FALSE)
    {
		session_start();
		$accessLocation  = $_SESSION["ACCESS_LOCATION"]; // session set in hooks/brq_system
        $SQL  = " 	SELECT Id, UserId, `Password`,UserType, EmployeeId, AccessLocation,BranchId,DepId,  ";

        $SQL .= " user_role_id, is_blocked FROM login WHERE UserId='{$userId}' AND UserGropId='{$userGroupId}'";

		$SQL .= "  AND Status='Active' LIMIT 1";
		
	
        $data = array();
      
        $records = $this->db->query($SQL); // --- using db->query Method
        $row  = $records->num_rows();
	
		
        if($row<=0)
			return FALSE;
	    
        else  // getting the password from table
        {
			$attempts=0;		
            foreach ($records->result() as $row)
                {
                    
					$logPass			= $row->Password;
				    $data['USER_TYPE']  = $row->UserType;
					$branchId           = $row->BranchId;
					$deptId             = $row->DepId;
			
					if($row->is_blocked==='yes')
					{
						
						return ($row->Id);
					}
					$attempts = countLoginAttempts("admin_login_attempts", $row->Id, $this->db); 
					

					$db  	= new Database();
			
                    $branch = $db->getFieldValueById("hr_branches", "branch_name", "id='{$branchId}'");
					
                    $dept 	= $db->getFieldValueById("hr_departments", "department_name", "id='{$deptId}'");

					$today = date('d/m/YYY H:i:s a');
					
                   
                    if(!verifyPassword($userPass, $logPass))
                        {
                            // ---------- Here blocking  the user for 15 min. if the attempts failed for 3 times. USER BLOCK
									
							
							if($attempts >=3)
							{
									$db  		  = new Database();
									
									// 900= 60*15, blocking for next 15 minutes. 86400 for one day blocking
									
									$seconds 	  = $db->getFieldValueById("sys_settings", "BlockUserTimeframe","Id=1");
								
									$blockFor = strtotime(date('Y-m-d H:i:s').' + '.$seconds.' seconds');
									
									$blockFor = date('Y-m-d H:i:s', $blockFor);
									
									$loginData= array (
										'BlockedFor'	 => $blockFor,
										'AccessLocation' => $accessLocation,
								        'is_bLocked'      =>'yes'        
                            			);
							
									$this->db->where('Id', $row->Id);
									$this->db->update('login',$loginData);
									
									//------------ sending email message ----------
									$accesLocation  = $row->AccessLocation;
									$userType 		= $row->UserType;
									$employeeId		= $row->EmployeeId;
									
									
									
									$this->load->model('Email_model');
									$result = $this->Email_model->sendAdminUserBlockedMessageToUser( $employeeId, $userType, $accesLocation, $seconds, $attempts);
									
									
									
                           	
							$logRemark="Login Attempt Failed! . User Id: {$userId} : User Group : {$row->UserType} Branch : {$branch} : Deparment : {$dept}. On his/her {$attempts} attempts, and thus this user account has been blocked on {$today} for 15 minutes. Access Location : $accessLocation";	
							
							$insertData= array (
									'UserId' => $row->Id,
									'UserName' => $userId,
									'UserGroupId' => $userGroupId,
									'UserType' => $row->UserType,
									'LastLoginIP' => getRequestIPAddress(),
									'SessionId' => session_id(), // this would be the last session id for login.
									'Remarks'=>$logRemark
			    
                            );
                            
                            $this->db->insert('sys_user_log',$insertData);
							

							
							} // if attempts
						
						//------------END USER BLOCK --------------------
							
                            return FALSE;
                        }
                   else
                       
                   {

						$logRemark="Login Successfull!. For the user : {$userId} : user group : {$row->UserType} Branch : {$branch} : Deparment : {$dept}. On his/her {$attempts} attempt(s). Access Location : $accessLocation"; 
				   
				   		 // --- FOR AUTHENTICATING THE COOKIE data, if login by cookie : START ------	
						
						 // get data from cookie.. check
						 
						$cookieUserId		='11'; // get from the cookie.
						
						$auth 		= new CookieTokenAuthenticate();
						$result 	= $auth->getUserById($cookieUserId, 'login'); // here login is the admin login table name.
		
						//  
							$token				= new Token();  // remember me option  token creating for cookie.
																	//	Defined in site_helper ->  inside helper folder.
									
						   if($remember) // if remember  yes. --> setting cookie for remember me option checked.
						   {
							   // ----- setting the cookies. for  future login ---->
								
								
								$tokenKey			= $token-> getToken(100); // token length of 100.
								$crypto				= $token-> cryptoRandSecure(1,9999); // a random key
								$selectorHash		= $tokenKey.$crypto;
								
								$id 				= $row->Id;
								$password 			= encriptPassword($userPass);
								$adminId 			= $userId;
								$site				= base_url();
							
								 // NOTE :-
								 
								 // o->  This will remember each 30 days of new login.
								 // o->  If,  the user not login for 1 month from the same computer the id will be deleted that will be  the concept of this code.
								 // o->  all the variable in the cookies will expire in 30 days if not login
								 // o->  The cookie will set on each login, and set expire date for another 30 days.
								 // o->  On each login the cookie will be deleted and recreate new one.
								 
								 // o->  Code by sandeep.
								
								setcookie("id", $id, strtotime('+30 days'), "/", "", "", TRUE);
								setcookie("user_name", $adminId, strtotime('+30 days'), "/", "", "", TRUE);
								setcookie("pass", $password, strtotime('+30 days'), "/", "", "",  TRUE);
								setcookie("web_site",  $site, strtotime('+30 days'), "/", "", "",  TRUE);
								setcookie("token",  $selectorHash, strtotime('+30 days'), "/", "", "",  TRUE);
								setcookie("module",  "admin", strtotime('+30 days'), "/", "", "",  TRUE); 
							   
						   }
						   else
						   {
							   $token->clearAuthCookie(); // if not checked clear all cookie.
						   }
							
							$_SESSION['LAST_ACTION'] 	= time(); // for session expiry manage.
						    
							$_SESSION['ADMIN_ID'] 		=$userId;
                            $_SESSION['ADMIN_PASS'] 	=$userPass;
                            $_SESSION['ADMIN_USER_TYPE']=$row->UserType;
                            $_SESSION['ADMIN_LOGIN_ID'] =$row->Id;
							$_SESSION['EMPLOYEE_ID'] 	=$row->EmployeeId;
							$_SESSION['ADMIN_GROUP_ID'] = $userGroupId;
							$_SESSION['USER_ROLE_ID']   =$row->user_role_id;
							
							$db  		  = new Database();
				// 			$company_id 	= $db->getFieldValueById("company_master", "company_id", "company_id=1");
				// 			$_SESSION['company_id'] 	= $company_id;
					$_SESSION['company_id'] 	= 1;
			
							$profilePath  ="https://taxtower.in/uploads/employee_profile_image/thumb/";
						    $ProfilePhoto ='{$row->EmployeeId}'.png;
							if(!(file_exists($profilePath.$ProfilePhoto)) || $ProfilePhoto == '') {
								if($db->getFieldValueById("hr_employee_master", "gender_id", "employee_id='{$row->EmployeeId}'") == "1")

									$_SESSION['PROFILE_PHOTO'] 	= "male.png";
								else
									$_SESSION['PROFILE_PHOTO'] 	= "female.png";
							} else 
								$_SESSION['PROFILE_PHOTO'] 	= $ProfilePhoto;
							// ----- user rounded image for admin panel profile---
							$uphoto = $ProfilePhoto;
							
							//NOTE:  converting to .png extension for user photo(rounded image) for admin panel, user photo always should have .png, and should save with prefix user- (resolution 66x66)
							
							
								$uphoto = str_replace(".jpg",".png",$uphoto);
								
								$uphoto = "user-".$uphoto;
							//}
							
							$_SESSION['USER_PHOTO'] = $uphoto;
							
							//------------------------------------------------
                            $loginIP    = getRequestIPAddress();
                            $Id         = $row->Id;
                            
			    
                            //------------------ updating the Last Login IP address & User_Log table
                            $today = date('Y-m-d');
							$logData= array (
										'LastLoginIP' 	=> $loginIP,
										'LoginStatus' 	=> '1',
										'AccessLocation'=> $accessLocation,
										'LastLoginDate' =>date("Y-m-d H:i:s")	
                            
										);
							
							$this->db->where('Id',$Id);
                            $this->db->update('login',$logData);
                           			   
                            //----- inseting into user_log table
                     
                            $insertData= array (
									'UserId' => $Id,
									'UserName' => $userId,
									'UserGroupId' => $userGroupId,
									'UserType' => $row->UserType,
									'LastLoginIP' => $loginIP,
									'SessionId' => session_id(), // this would be the last session id for login.
									'LastLoginDate'=>date("Y-m-d H:i:s"),
									'Remarks'=> $logRemark
			    
                            );
                            
                            $this->db->insert('sys_user_log',$insertData);
                            $_SESSION['ADMIN_USER_LOG_ID'] =  $this->db->insert_id(); // this is for inserting user actions into user_log_detail table
                           
                           
                            
                        return TRUE;
                   }     
                }
            
            
        }
    }

	//--- This function for open account module
	function accountLoginVerify($userId, $unlockpass, $userGroupId)
	{
		$unlockpass = encriptPassword($unlockpass);
			 
        $SQL  = " 	SELECT Id, UserId ";
        $SQL .= "  FROM login WHERE UserId='{$userId}' AND UserGropId='{$userGroupId}' AND `Password`='{$unlockpass}'";
		$SQL .= "  AND Status='Active'  LIMIT 1";
		
	    $records = $this->db->query($SQL); // --- using db->query Method
        
        if($records->num_rows()<=0)
		{
			$_SESSION["Account_Login_Verified"]=0;
			 return FALSE;
		}	
	    else  
        {
            
				$_SESSION["Account_Login_Verified"]=1;
				return TRUE;
			
				
		}		
		
	}

    public function recordAdminActions($action) 
    {
        
         //----- inseting into user_log table
                     
                            $insertData= array (
                            'UserLogId' => $_SESSION['ADMIN_USER_LOG_ID'],
                            'UserName' => $_SESSION['ADMIN_ID'],
                            'Actions' => $action,
                            'ActionIP' => getRequestIPAddress(),
							'CreatedOn'=>date("Y-m-d H:i:s")	
                            );
                            
                            $this->db->insert('sys_user_log_detail',$insertData);
        
        
    }
    
    public function updateLoginStatus($loginId) {
        
            $logData= array (
            'LoginStatus' => '0'        
            );
            $this->db->where('Id',$loginId);
            $this->db->update('login',$logData);
            
            
            $data= array (
            'LogOutTime'=>date("Y-m-d H:i:s")       
            );
            
            $this->db->where('Id',$_SESSION['ADMIN_USER_LOG_ID']);
            $this->db->update('sys_user_log',$data);
            
            
        
    }    
    
  public function saveChangePassword()
  {
       $userId       = $_SESSION['ADMIN_ID'];
       $userpassword = $_SESSION['ADMIN_PASS'];
      
       $pass         = $_POST['Current_Password'];
       $NewPassword  = $_POST['New_Password'];
              
       $newuserPassword=encriptPassword($NewPassword);
       if($userpassword!=$pass)   
                 return "Invalid current password";
       else
             {  
                
                $insertData = array 
                        (
                            "Password"=>$newuserPassword
                         );
                
                
                    $this->db->where('UserId', $userId);
                    $res = $this->db->update('login',$insertData);
        
                    
                    $action = "Password changed for user {$userId}";
                    $this->recordAdminActions($action);
        
                    
                    return "Password has been successfully changed!";
                    
             }
        
    }
 
   public function getUserList($userName,$location,$status)
      {
       
       
        $where ="";
        
        if($location!="All")
            $where .= " WHERE Location LIKE '" . $location ."%'";
        
         if($userName!="All")    
        {
             if($where =="")
                $where .= " WHERE UserName LIKE '" . $userName ."%'";
             else
                $where .= " AND UserName LIKE '" . $userName ."%'";  
      
        }
       
        
        if($status!="All")    
        {
            
            if($status=="Active")
                $status=1;
            else
               $status=0; 
            
             if($where =="")
                $where .= " WHERE Status=" . $status;
             else
                $where .= " AND Status =" . $status;  
      
        }
        
       
        $SQL ="SELECT * FROM user";
        $SQL .=$where;
        
        $resultCount =$this->db->query($SQL); 
        $totalData = $resultCount->num_rows();
        
	$start =0;
	$limit =3;
	
        
        
        if(isset($_GET['start']))
                $start = $_GET['start'];
        if(isset($_GET['limit']))
                $limit =$_GET['limit'];
        
	$SQL = "SELECT * FROM user " ;
        $SQL .=$where;
        $SQL .= " ORDER BY Id DESC LIMIT " . $start . ", " . $limit;
	
	$result=$this->db->query($SQL);
        $data = array();
        
        if ($result->num_rows() > 0)
            $data = $result->result_array();  // returning the records as an array.
         
        $dataReturn = array();
        $dataReturn['total']= $totalData;
        $dataReturn['results']= $data;
        
        return $dataReturn;
          
      }
      
   
    public function deleteUser($id)
    {
        // getting the user name for action recording
        $SQL ="SELECT UserName FROM user ";
        $SQL .=" WHERE Id =" . $id;
        
        $result =$this->db->query($SQL);
        $deleteUserName ="";
        if($result->num_rows()>0)
        {
            foreach ($result->result() as $row) 
                 $deleteUserName = $row->UserName;
        }
        
        $action = "User Name: " . $deleteUserName. " deleted.";
        $this->recordAdminActions($action);
        
        // deleting user name
        $this->db->where('Id', $id);
        $res = $this->db->delete('user');
        
        
        return $res;
        
    }  
    
   public function saveUser()
   {
        $userName              = strip_slashes(htmlspecialchars($_POST['txtUserName']));
        $location              = strip_slashes(htmlspecialchars($_POST['cmbLocation']));
        $userType              = strip_slashes(htmlspecialchars($_POST['cmbUserType']));
        $password              = strip_slashes(htmlspecialchars(encriptPassword($_POST['txtPassword'])));
        
		$status                = strip_slashes(htmlspecialchars($_POST['rdoStatus']));
        $ID                    = (int)$_POST['hidIDField'];
        
        //------------------------- saving location in the user_location table if does not exist ----
        
        
        $SQL = "SELECT * FROM user_location ";
        $SQL .= " WHERE UCASE(Location)='" . strtoupper($location) . "'"; 
        
        $resultCount =$this->db->query($SQL); 
        if($resultCount->num_rows()==0)
        {
             $locationData= array (
                 'Location' => $location
             );
            $this->db->insert('user_location',$locationData);
        }
        
      
        if($ID==0)
            { 
                $insertData= array (
                'UserName' => $userName,
                'Location' => $location,  
                'Password' => $password,
                'UserType' => $userType,
                'Status' => $status,
                'CreatedBy' => $_SESSION['ADMIN_ID']    
                );
                
              $this->db->insert('user',$insertData);
              
              $action = "New User : " . $userName . " Created.";
              $this->recordAdminActions($action);
              
              
            }
       else if($ID>0)
            {
                $insertData= array (
                'UserName' => $userName,
                'Location' => $location,    
                'Status' => $status,
                'UserType' => $userType,
                'ModifiedBy' => $_SESSION['ADMIN_ID'],
                'ModifiedOn' =>date("Y-m-d H:i:s")    
                );
               $this->db->where('Id', $ID);
               $this->db->update('`user`', $insertData);
              
            }
  
             $action = "Chaged User : " . $userName . " details.";
             $this->recordAdminActions($action);
             
             return "true";
        
        
   }  
 
 public function getUserLocation()
       {
        $SQL = "SELECT Id, Location FROM user_location " ;
        $SQL .= " WHERE status=1";
    
		$result=$this->db->query($SQL);
        $data = array();
        
        if ($result->num_rows() > 0)
            $data = $result->result_array();  // returning the records as an array.
         
        $dataReturn = array();
        $dataReturn['success']= "true";
        $dataReturn['location']= $data;
        
        return $dataReturn;
           
       }
   
    public function updateUserStatus($id,$status)
    {
        $insertData= array (
                'Status' => $status,
                'ModifiedBy' => $_SESSION['ADMIN_ID'],
                'ModifiedOn' =>date("Y-m-d H:i:s")    
                );
        
               $this->db->where('Id', $id);
               $res= $this->db->update('user', $insertData);
       
    }
    
    
    public function  getEditUserData($editId)
    {
         
        $SQL = "SELECT Id,UserName,Location, UserType, Status FROM `user`";
        $SQL .= " WHERE Id = " . $editId;
        
        $records = $this->db->query($SQL);  
                   
        if($records->num_rows()>0)
            {
            foreach ($records->result() as $row)
                    {
                        $data[] =$row;
                    }
                    return $data;
            }
        
    }
    
    public function getAdminModule($role_id="")
{

        // $this->db->where('role_id', $role);
        // $this->db->where('is_granted', 'Yes');

        // return $this->db->get('view_hr_main_menu_permission')->result();
    $SQL = "SELECT  * "; 
   $SQL .= " FROM view_module_permission ";
   
   
       $SQL .= " WHERE is_granted ='yes' ";
       if($role_id!='')
         $SQL .= "AND role_id= $role_id ";
//   $SQL .="  ORDER BY `ModuleOrder`";

   $result = $this->db->query($SQL)->result();

   
       return $result;

} 

public function get_user_role()
    {
        $query = $this->db->get('user_role');
        // print_r($query->result());
        // exit;
        if ($query->num_rows() > 0) {
            return $query->result(); 
        } else {
            return array();
        }
    }
    
public function get_module_master($role="")
    {
        // echo $role;
        if($role!='')
        $this->db->where('role_id', $role);
        // print_r($this->db->get('view_module_permission')->result());
        // exit;
        return $this->db->get('view_module_permission')->result();

    }
  public function update_module_permission($data,$where)
    {
       
        // $this->db->update('permission_module_master', $data,$where);
	        $this->db->update('module_master_permission', $data,$where);

			return $this->db->affected_rows();
    }
    
 }// class ending