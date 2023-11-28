<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BRQ Hr Payroll</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
     <?php include("top-css.php"); ?> 
    <style>

.copy_address{
    color: rgba(0,0,0,.85) !important; 
}
.process-model li a {
  color: #333 !important; 
}

.process-model li.active a {
  color: #57b87b !important; 
}
                        
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed brq-payroll company-structure">
   <div class="wrapper">
      <!-- Navbar -->
      <?php include("top-nav.php"); ?> 
      <!-- /.navbar -->
      
      <?php include("left-sidebar.php"); ?> 
      <!-- Content Wrapper. Contains page content -->

    <!-- MAIN  CODE  -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <div class="content-header py-2 px-4">
            <div class="combination_datatable" id="company_structure_tabs">
              <!-- tab start here -->
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" id="li_employee_tab" data-toggle="tab" href="#employee_tab" role="tab" aria-selected="false">Employees</a>
                </li>
						
                <li class="nav-item">
                  <a class="nav-link" id="li_work_history_tab" data-toggle="tab" href="#work_history_tab" role="tab" aria-selected="false">Work History</a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link" id="li_education_tab" data-toggle="tab" href="#education_tab" role="tab"  aria-selected="false">Education</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="li_certifications_tab" data-toggle="tab" href="#certifications_tab" role="tab"  aria-selected="false">Certifications</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="li_languages_tab" data-toggle="tab" href="#languages_tab" role="tab"  aria-selected="false">Languages</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="li_dependents_tab" data-toggle="tab" href="#dependents_tab" role="tab"  aria-selected="false">Dependents</a>
                </li>
              
                <li class="nav-item">
                  <a class="nav-link" id="li_contacts_tab" data-toggle="tab" href="#contacts_tab" role="tab"  aria-selected="false">Contacts</a>
                </li> 
               
               

                 
 	

 	
     

              </ul>
              <!-- tab end  here -->
              <div class="tab-content">
                   <!--tab 1  ------ -->
                    <div class="tab-pane fade show active" id="employee_tab" role="tabpanel" aria-labelledby="home-tab">
                        <!-- --- discription ---- -->
                            <!-- --- ./discription ---- -->
                           
                        <!--for loading CompanyStructure DataTable -->
                            <table id="employee_data_table" class="table table-striped">
                            <thead>
                                <tr>
                                <th>Employee Name</th>
                                <th>Employee Number</th>
                                <th>Branch Name</th>
                                <th>Department Name</th>
                                    <th style="width:200px;text-align: center;">Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                <tr>
                                   
                                    
                                    
                                </tr>
                                
                            
                            </tbody>
                            </table>
                            <!-- ./ for loading CompanyStructure DataTable -->
                    </div>
                  <!-- ./tab1  --- -->


                   
                    
                    <div class="tab-pane fade" id="work_history_tab" role="tabpanel" aria-labelledby="work_history_tab">
                       
                        <?php include("work_history_content.php");?> 
                   </div>
                   <div class="tab-pane fade" id="education_tab" role="tabpanel" aria-labelledby="education_tab">
                       
                        <?php include("education.php");?>
                   </div>
                   <div class="tab-pane fade" id="certifications_tab" role="tabpanel" aria-labelledby="certifications_tab">
                        
                        <?php include("certification.php");?>
                   </div>

                   <div class="tab-pane fade" id="languages_tab" role="tabpanel" aria-labelledby="languages_tab">
                        
                        <?php include("languages.php");?>
                   </div>
                   <div class="tab-pane fade" id="dependents_tab" role="tabpanel" aria-labelledby="dependents_tab">
                      
                        <?php include("dependents.php");?>
                   </div>
                   <div class="tab-pane fade" id="contacts_tab" role="tabpanel" aria-labelledby="contacts_tab">
                   
                   <?php include("contacts.php");?>
              </div>
                
                  
                 
                
                  
                </div>
            <!-- end combination data table section -->
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark"></h1>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
        <!-- /.content-header -->
      </div>
     <!-- /. MAIN CODE content-wrapper -->

   
    
     <?php include("right-sidebar.php"); ?> 
     <!-- footer -->
     <div class="common_hidden_fields" style="text-align: end;">
        <input type="" id="flag_id" value="0" >
        <input type="" id="row_id" value="0" >
    </div>


     <?php include("footer.php"); ?> 
     <!-- ./ footer -->
     </div>
<!-- ./wrapper --> 

 <!-- modal for employee datatable -->
 <div class="modal fade data-table-modal" id="employee_data_table_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Employee</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            

            <!-- ===== -->


            <section class="design-process-section" id="process-tab">
                    <div class="container">
                        <div class="row">
                        <div class="col-12"> 
                            <!-- design process steps--> 
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs process-model more-icon-preocess" role="tablist">
                                <li role="presentation"><a href="#personal_tab" id="personal_tab_link"  aria-controls="personal_tab" role="tab" data-toggle="tab"><i class="fas fa-user-alt" aria-hidden="true"></i>
                                    <p>Personal</p>
                                    </a></li>
                                    <li role="jobdetails" ><a href="#jobdetails_tab" id="jobdetails_tab_link" aria-controls="jobdetails_tab" role="tab" data-toggle="tab"><i class="fas fa-user-alt" aria-hidden="true"></i>
                                    <p>Job Details</p>
                                    </a></li>
                                <li role="presentation"><a href="#identification_tab" id="identification_tab_link" aria-controls="identification_tab" role="tab" data-toggle="tab"><i class="fa fa-search" aria-hidden="true"></i>
                                    <p>Identification</p>
                                    </a></li>
                                <li role="presentation"><a href="#present_address_tab" id="present_address_tab_link"  aria-controls="present_address_tab" role="tab" data-toggle="tab"><i class="fa fa-address-card" aria-hidden="true"></i>
                                    <p>Present Address</p>
                                    </a>
                                </li>
                                <li role="presentation"><a href="#perment_address_tab" id="perment_address_tab_link"  aria-controls="perment_address_tab" role="tab" data-toggle="tab"><i class="fa fa-address-card" aria-hidden="true"></i>
                                    <p>Permenent Address</p>
                                    </a>
                                </li>
                                <li role="presentation"><a href="#contact_tab" id="contact_tab_link" aria-controls="contact_tab" role="tab" data-toggle="tab"><i class="far fa-address-card" aria-hidden="true"></i>
                                    <p>Contact</p>
                                    </a>
                                </li>
                                <li role="presentation"><a href="#bank_account" id="bank_account_tab_link" aria-controls="bank_account" role="tab" data-toggle="tab"><i class="far fa-address-card" aria-hidden="true"></i>
                                    <p>Account Details</p>
                                    </a>
                                </li>
                            </ul>
                            <!-- end design process steps--> 
                           
                        </div>
                        </div>
                    </div>
                </section>
            <!-- ===== -->







            <div class="modal-body">
              <form id="employee_modal_form" class="modal_form">
                <div class="tab-content">
                  <!-- -- one tab panel---- -->
                            <div role="tabpanel" class="tab-pane active" id="personal_tab">
                                    <!--one field  text field---- -->
                                <div class="form-group row">
                                    <div class="col-3">
                                        <label for="recipient-name" class="col-form-label required">Employee Number</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" class="form-control" id="employee_number" name="employee_number">
                                      
                                     </div>
                                </div>
                                <!-- ./ one field ---- -->                              
                                <!--one field  text field---- -->
                                    <div class="form-group row">
                                        <div class="col-3">
                                            <label for="first_name" class="col-form-label required">First Name</label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" id="first_name" name="first_name">
                                           
                                        </div>
                                    </div>
                                <!-- ./ one field ---- -->                              
                                <!--one field  text field---- -->
                                    <div class="form-group row">
                                        <div class="col-3">
                                            <label for="middle_name" class="col-form-label required">Middle Name</label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" id="middle_name" name="middle_name">
                                        </div>
                                    </div>
                                <!-- ./ one field ---- -->                              
                                <!--one field  text field---- -->
                                    <div class="form-group row">
                                        <div class="col-3">
                                            <label for="last_name" class="col-form-label required">Last Name</label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" id="last_name" name="last_name">
                                          
                                        </div>
                                    </div>
                                <!-- ./ one field ---- -->                              
                                <!--one field  text field---- -->
                                    <div class="form-group row">
                                        <div class="col-3">
                                            <label for="gender_id" class="col-form-label required">Gender</label>
                                        </div>
                                        <div class="col-8">
                                            <select class="form-control"  name="gender_id" id="gender_id" style="width:100%">
                                                    <!-- <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                    <option value="3">Others</option> -->
                                                    <?php
                                                if (isset($gender)):
                                                   
                                                    foreach ($gender as $row):
                                                        $name = $row->gender;
                                                        $id = $row->id;
                                                                          
                                                        ?>
                                                        <option value="<?php echo $id; ?>" 
                                                            ><?php echo $name; ?>
                                                        </option>
                                                        <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                <!-- ./ one field ---- -->   
                                 <!--one field  text field---- -->
                                 <div class="form-group row">
                                        <div class="col-3">
                                            <label for="last_name" class="col-form-label required">Date of Birth</label>
                                        </div>
                                        <div class="col-8">
                                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
                                          
                                        </div>
                                    </div>
                                <!-- ./ one field ---- -->    

                                <!--one field  text field---- -->
                                    <div class="form-group row">
                                        <div class="col-3">
                                            <label for="nationality_id" class="col-form-label required">Nationality</label>
                                        </div>
                                        <div class="col-8">
                                            <select class="form-control elect2"  name="nationality_id" id="nationality_id" style="width:100%">
                                                    <!-- <option value="1">Indian</option>
                                                    <option value="2">American</option>
                                                    <option value="3">China</option> -->
                                                    <?php
                                                if (isset($country)):
                                                   
                                                    foreach ($country as $row):
                                                        $name = $row->nationality;
                                                        $id = $row->id;
                                                                          
                                                        ?>
                                                        <option value="<?php echo $id; ?>" 
                                                            ><?php echo $name; ?>
                                                        </option>
                                                        <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                             </select>
                                        </div>
                                    </div>
                                <!-- ./ one field ---- -->  
                                
                                
                                <!--one field  text field---- -->
                                    <div class="form-group row">
                                        <div class="col-3">
                                            <label for="marital_status_id" class="col-form-label required">Marital Status</label>
                                        </div>
                                        <div class="col-8">
                                            <select class="form-control select2"  name="marital_status_id" id="marital_status_id" style="width:100%">
                                           
                                                    <?php
                                                if (isset($marital_status)):
                                                   
                                                    foreach ($marital_status as $row):
                                                        $name = $row->marital_status;
                                                        $id = $row->id;
                                                                          
                                                        ?>
                                                        <option value="<?php echo $id; ?>" 
                                                            ><?php echo $name; ?>
                                                        </option>
                                                        <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                <!-- ./ one field ---- -->                              
                            </div>      
                    <!-- one tab tab  -->
                      <!-- -- job details tab---- -->
                      <div role="tabpanel" class="tab-pane" id="jobdetails_tab">
                           <!--one field  text field---- -->
                   <div class="form-group row">
                    
                    <div class="col-8">
                    <input type="" class="form-control" name="employment_details_id" id="employment_details_id"></input>

                     </div>
                  </div>
                <!-- ./ one field ---- -->
                                    <!--one field  text field---- -->
                                <div class="form-group row">
                                    <div class="col-3">
                                        <label for="recipient-name" class="col-form-label required"> Branch Name</label>
                                    </div>
                                    <div class="col-8">
                                        
                                        <select class="form-control" id="branch_id_employee" name="branch_id_employee">
                                        <?php
                                            if (isset($branches)):  
                                                foreach ($branches as $row):
                                                $name = $row->branch_name;
                                                $id = $row->id;

                                                                            ?>
                                                                            <option value="<?php echo $id; ?>" 
                                                                                ><?php echo $name; ?>
                                                                            </option>
                                                                            <?php
                                                                        endforeach;
                                                                    endif;
                                        ?>
                                        </select>
                   
                                      
                                     </div>
                                </div>
                                <!-- ./ one field ---- -->                              
                                <!--one field  text field---- -->
                                    <div class="form-group row">
                                        <div class="col-3">
                                            <label for="first_name" class="col-form-label required">Department Name</label>
                                        </div>
                                        <div class="col-8">
                                            
                                            <select class="form-control" id="employee_department_id" name="employee_department_id">
                                        <?php
                                            if (isset($departments)):  
                                                foreach ($departments as $row):
                                                $name = $row->department_name;
                                                $id = $row->id;

                                                                            ?>
                                                                            <option value="<?php echo $id; ?>" 
                                                                                ><?php echo $name; ?>
                                                                            </option>
                                                                            <?php
                                                                        endforeach;
                                                                    endif;
                                        ?>
                                        </select>
                                           
                                        </div>
                                    </div>
                                <!-- ./ one field ---- -->                              
                                <!--one field  text field---- -->
                                    <div class="form-group row">
                                        <div class="col-3">
                                            <label for="middle_name" class="col-form-label required">Job Title</label>
                                        </div>
                                        <div class="col-8">
                                            
                                            <select class="form-control" id="employee_job_title_id" name="employee_job_title_id">
                                            <?php
                                            if (isset($jobtitles)):  
                                                foreach ($jobtitles as $row):
                                                $name = $row->job_title;
                                                $id = $row->id;

                                                                            ?>
                                                                            <option value="<?php echo $id; ?>" 
                                                                                ><?php echo $name; ?>
                                                                            </option>
                                                                            <?php
                                                                        endforeach;
                                                                    endif;
                                        ?>
                                        </select>
                                        </div>
                                    </div>
                                <!-- ./ one field ---- -->                              
                                <!--one field  text field---- -->
                                    <div class="form-group row">
                                        <div class="col-3">
                                            <label for="last_name" class="col-form-label required">Pay Scale</label>
                                        </div>
                                        <div class="col-8">
                                        <select class="form-control" id="employee_pay_scale_id" name="employee_pay_scale_id">
                                        <?php
                                            if (isset($payscale)):  
                                                foreach ($payscale as $row):
                                                $name = $row->pay_scale_name;
                                                $id = $row->id;

                                                                            ?>
                                                                            <option value="<?php echo $id; ?>" 
                                                                                ><?php echo $name; ?>
                                                                            </option>
                                                                            <?php
                                                                        endforeach;
                                                                    endif;
                                        ?>
                                        </select>
                                          
                                        </div>
                                    </div>
                                <!-- ./ one field ---- -->                              
                                <!--one field  text field---- -->
                                    <div class="form-group row">
                                        <div class="col-3">
                                            <label for="gender_id" class="col-form-label required">Employment Status</label>
                                        </div>
                                        <div class="col-8">
                                            <select class="form-control"  name="employment_status_id" id="employment_status_id" style="width:100%">
                                                    <!-- <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                    <option value="3">Others</option> -->
                                                  
                                                    <?php
                                                if (isset($employmentstatus)):
                                                   
                                                    foreach ($employmentstatus as $row):
                                                        $name = $row->employment_status;
                                                        $id = $row->id;
                                                                          
                                                        ?>
                                                        <option value="<?php echo $id; ?>" 
                                                            ><?php echo $name; ?>
                                                        </option>
                                                        <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                <!-- ./ one field ---- -->   
                                 <!--one field  text field---- -->
                                 <div class="form-group row">
                                        <div class="col-3">
                                            <label for="last_name" class="col-form-label required">Date Joined</label>
                                        </div>
                                        <div class="col-8">
                                            <input type="date" class="form-control" id="date_joined" name="date_joined">
                                          
                                        </div>
                                    </div>
                                <!-- ./ one field ---- -->    

                                <!--one field  text field---- -->
                                <div class="form-group row">
                                        <div class="col-3">
                                            <label for="last_name" class="col-form-label required">Employee Head</label>
                                        </div>
                                        <div class="col-8">
                                       
                               <select class="form-control" id="employee_head_id_in_employee" name="employee_head_id_in_employee">
                                   
                                </select>

                                            
                                          
                                        </div>
                                    </div>
                                <!-- ./ one field ---- -->  

                                
                                
                                                         
                            </div>      
                    <!-- end of jab details tad  -->


                <!-- -- one tab panel---- -->
                 <div role="tabpanel" class="tab-pane" id="identification_tab">
                    <!--one field  text field---- -->
                        <div class="form-group row">
                             <div class="col-3">
                                <label for="aadhar_number" class="col-form-label required">Adhar Number</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" id="aadhar_number" name="aadhar_number">

                             </div>
                         </div>
                     <!-- ./ one field ---- -->                                                 
                    <!--one field  text field---- -->
                        <div class="form-group row">
                             <div class="col-3">
                                <label for="passport_number" class="col-form-label required">Personal Number</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" id="passport_number" name="passport_number">

                             </div>
                         </div>
                     <!-- ./ one field ---- -->                                                 
                    <!--one field  text field---- -->
                        <div class="form-group row">
                             <div class="col-3">
                                <label for="pan_number" class="col-form-label required">Pan Number</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" id="pan_number" name="pan_number">

                             </div>
                         </div>
                     <!-- ./ one field ---- -->                                                 
                    <!--one field  text field---- -->
                        <div class="form-group row">
                             <div class="col-3">
                                <label for="driving_licence_number" class="col-form-label required">Driving Licence Number</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" id="driving_licence_number" name="driving_licence_number">

                             </div>
                         </div>
                     <!-- ./ one field ---- -->     
                     <!--one field  text field---- -->
                     <div class="form-group row">
                             <div class="col-3">
                                <label for="other_id_doc" class="col-form-label required">Other Document Id</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" id="other_id_doc" name="other_id_doc">

                             </div>
                         </div>
                     <!-- ./ one field ---- -->                                               
                                                                 
                </div>      
                <!-- ./ one  tab panel -->
                <!-- -- one tab panel---- -->
                 <div role="tabpanel" class="tab-pane" id="present_address_tab">   
                    <!--one field  text field---- -->
                        <div class="form-group row">
                          <div class="col-3">
                            <label for="permenent_address_line_1" class="col-form-label required">Address Line1</label>
                          </div>
                            <div class="col-8">
                                <input type="text" class="form-control" id="present_address_line_1" name="present_address_line_1">
                             </div>
                        </div>
                     <!-- ./ one field ---- --> 

                    <!--one field  text field---- -->
                    <div class="form-group row">
                             <div class="col-3">
                                <label for="permenent_address_line_2" class="col-form-label required">Address Line2</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" id="present_address_line_2" name="present_address_line_2">

                             </div>
                         </div>
                     <!-- ./ one field ---- --> 
                    <!--one field  text field---- -->
                    <div class="form-group row">
                             <div class="col-3">
                                <label for="permenent_address_line_3" class="col-form-label required">Address Line3</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" id="present_address_line_3" name="present_address_line_3">

                             </div>
                         </div>
                     <!-- ./ one field ---- --> 
                    <!--one field  text field---- -->
                    <div class="form-group row">
                             <div class="col-3">
                                <label for="permenent_address_line_4" class="col-form-label required">Address Line4</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" id="present_address_line_4" name="present_address_line_4">

                             </div>
                         </div>
                     <!-- ./ one field ---- --> 
                    <!--one field  text field---- -->
                    <div class="form-group row">
                             <div class="col-3">
                                <label for="permenent_state_id" class="col-form-label required">Permenent State</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control select2" name="present_state_id" id="present_state_id">
                                <?php
                                                if (isset($states)):
                                                   
                                                    foreach ($states as $row):
                                                        $name = $row->state_name;
                                                        $id = $row->id;
                                                     
                                                       
                                                        ?>
                                                      
                                                         
                                                        <option value="<?php echo $id; ?>" 
                                                            ><?php echo $name; ?>
                                                        </option>
                                                        <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                </select>
                                

                             </div>
                         </div>
                     <!-- ./ one field ---- --> 
                    <!--one field  text field---- -->
                    <div class="form-group row">
                             <div class="col-3">
                                <label for="permenent_country_id" class="col-form-label required">Permenent Country</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control select2" name="present_country_id" id="present_country_id">
                                <?php
                                    if (isset($country)):
                                                            
                                    foreach ($country as $row):
                                    $name = $row->country_name;
                                        $id = $row->id; 
                                ?>  
                                <option value="<?php echo $id; ?>" 
                                ><?php echo $name; ?>
                                </option>
                                <?php
                                endforeach;
                                endif;
                            ?>
                    
                                </select>
                                

                             </div>
                         </div>
                     <!-- ./ one field ---- --> 
                    <!--one field  text field---- -->
                    <div class="form-group row">
                            <div class="col-3">
                                <label for="permenent_pin_code" class="col-form-label required">Permenent Pincode</label>
                            </div>
                            <div class="col-8">
                           
                                <input type="text" class="form-control" name="present_pin_code" id="present_pin_code"></input>
                            </div>
                    </div>
                     <!-- ./ one field ---- --> 

                 </div>      
                <!-- one tab tab  -->

                <!-- -- one tab panel---- -->
                 <div role="tabpanel" class="tab-pane" id="perment_address_tab">   

                 <!-- Checkbox in present_address_tab -->
                 <div class="form-group row">
                          <div class="col-3">
                          <input type="checkbox" id="copy_address" name="copy_address">
                          
                          </div>
                            <div class="col-8">
                            <label for="copy_address" class="col-form-label copy_address">Same as Present Address</label>
                             </div>
                    </div>
                     
    
                    <!--one field  text field---- -->
                        <div class="form-group row">
                          <div class="col-3">
                            <label for="present_address_line_1" class="col-form-label required">Address Line1</label>
                          </div>
                            <div class="col-8">
                                <input type="text" class="form-control" id="permenent_address_line_1" name="permenent_address_line_1">
                             </div>
                        </div>
                     <!-- ./ one field ---- --> 

                    <!--one field  text field---- -->
                    <div class="form-group row">
                             <div class="col-3">
                                <label for="present_address_line_2" class="col-form-label required">Address Line2</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" id="permenent_address_line_2" name="permenent_address_line_2">

                             </div>
                         </div>
                     <!-- ./ one field ---- --> 
                    <!--one field  text field---- -->
                    <div class="form-group row">
                             <div class="col-3">
                                <label for="present_address_line_3" class="col-form-label required">Address Line3</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" id="permenent_address_line_3" name="permenent_address_line_3">

                             </div>
                         </div>
                     <!-- ./ one field ---- --> 
                    <!--one field  text field---- -->
                    <div class="form-group row">
                             <div class="col-3">
                                <label for="present_address_line_4" class="col-form-label required">Address Line4</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" id="permenent_address_line_4" name="permenent_address_line_4">

                             </div>
                         </div>
                     <!-- ./ one field ---- --> 
                    <!--one field  text field---- -->
                    <div class="form-group row">
                             <div class="col-3">
                                <label for="present_state_id" class="col-form-label required">Present State</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control select2" name="permenent_state_id" id="permenent_state_id">
                                <?php
                                                if (isset($states)):
                                                   
                                                    foreach ($states as $row):
                                                        $name = $row->state_name;
                                                        $id = $row->id;
                                                     
                                                       
                                                        ?>
                                                      
                                                         
                                                        <option value="<?php echo $id; ?>" 
                                                            ><?php echo $name; ?>
                                                        </option>
                                                        <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                </select>
                                

                             </div>
                         </div>
                     <!-- ./ one field ---- --> 
                    <!--one field  text field---- -->
                    <div class="form-group row">
                             <div class="col-3">
                                <label for="present_country_id" class="col-form-label required">Present Country</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control select2" name="permenent_country_id" id="permenent_country_id">
                                <?php
                                    if (isset($country)):
                                                            
                                    foreach ($country as $row):
                                    $name = $row->country_name;
                                        $id = $row->id; 
                                ?>  
                                <option value="<?php echo $id; ?>" 
                                ><?php echo $name; ?>
                                </option>
                                <?php
                                endforeach;
                                endif;
                            ?>
                    
                                </select>
                                

                             </div>
                         </div>
                     <!-- ./ one field ---- --> 
                    <!--one field  text field---- -->
                    <div class="form-group row">
                            <div class="col-3">
                                <label for="present_pin_code" class="col-form-label required">Present Pincode</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control " name="permenent_pin_code" id="permenent_pin_code"></input>
                            </div>
                    </div>
                     <!-- ./ one field ---- --> 

                 </div>      
                <!-- one tab tab  -->
            <!-- -- one tab panel---- -->
            <div role="tabpanel" class="tab-pane" id="contact_tab"> 
                <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                        <label for="home_phone" class="col-form-label required">Home Phone no</label>
                    </div>
                    <div class="col-8">
                         <input type="text" class="form-control" name="home_phone_employee" id="home_phone_employee"></input>
                     </div>
                  </div>
                <!-- ./ one field ---- --> 
                <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                        <label for="mobile_phone" class="col-form-label required">Mobile Number</label>
                    </div>
                    <div class="col-8">
                         <input type="text" class="form-control" name="mobile_phone_employee" id="mobile_phone_employee"></input>
                     </div>
                  </div>
                <!-- ./ one field ---- --> 
                <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                        <label for="work_phone" class="col-form-label required">Work Number</label>
                    </div>
                    <div class="col-8">
                         <input type="text" class="form-control" name="work_phone_employee" id="work_phone_employee"></input>
                     </div>
                  </div>
                <!-- ./ one field ---- --> 
                <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                        <label for="work_email" class="col-form-label required">Work Email</label>
                    </div>
                    <div class="col-8">
                         <input type="text" class="form-control" name="work_email" id="work_email"></input>
                     </div>
                  </div>
                <!-- ./ one field ---- --> 
                <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                        <label for="private_email" class="col-form-label required">Private Email</label>
                    </div>
                    <div class="col-8">
                         <input type="text" class="form-control" name="private_email" id="private_email"></input>
                     </div>
                  </div>
                <!-- ./ one field ---- --> 

            </div> 

            <!-- -- ./ tab panel---- -->

            
            <!-- -- one tab panel---- -->
            <div role="tabpanel" class="tab-pane" id="bank_account"> 
                <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                        <label for="account_number" class="col-form-label required">Account Number</label>
                    </div>
                    <div class="col-8">
                         <input type="text" class="form-control" name="account_number" id="account_number"></input>
                     </div>
            </div>
                <!-- ./ one field ---- --> 
                <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                        <label for="mobile_phone" class="col-form-label required">Bank Name</label>
                    </div>
                    <div class="col-8">
                         <input type="text" class="form-control" name="bank_name" id="bank_name"></input>
                     </div>
                  </div>
                <!-- ./ one field ---- --> 

                
                <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                        <label for="bank_branch_name" class="col-form-label required">Branch Name</label>
                    </div>
                    <div class="col-8">
                         <input type="text" class="form-control" name="bank_branch_name" id="bank_branch_name"></input>

                     </div>
                  </div>
                <!-- ./ one field ---- --> 
                   
               
                
                <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                        <label for="ifsc_code" class="col-form-label required">IFSC Code</label>
                    </div>
                    <div class="col-8">
                         <input type="text" class="form-control " name="ifsc_code" id="ifsc_code"></input>
                     </div>
                  </div>
                <!-- ./ one field ---- --> 

            </div> 

            <!-- -- ./ tab panel---- -->
        </div>
               </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="btn_emp_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="btn_emp_save"><i class="fas fa-calendar-check"></i>Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
     <!-- /.  modal for job title-->




 <!-- ./filter modal-->
 <div class="modal fade data-table-modal" id="employee_data_table_filter_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Employee</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="employee_filter_modal_form" class="modal_form">
                  <!--one field  text field---- -->
                      <div class="form-group row">
                          <div class="col-3">
                          <label for="recipient-name" class="col-form-label required">Employee</label>
                          </div>
                          <div class="col-8">
                        
                          <select name="filter_employee_id_employee" id="filter_employee_id_employee" class="form-control select2">
                                <option value="0">Select Employee</option>
                               
                          </select>

                          </div>
                      </div>
                    <!-- ./ one field ---- -->          
                        
                  <!--one field  text field---- -->
                      <div class="form-group row">
                          <div class="col-3">
                          <label for="recipient-name" class="col-form-label required">Department</label>
                          </div>
                          <div class="col-8">
                              <select name="filter_employee_department"  id="filter_employee_department"class="form-control select2">
                                <!-- <option value="0">Select Department</option> -->
                                
                              </select>
                          </div>
                      </div>
                    <!-- ./ one field ---- -->              
                               

              </form>
            </div>
            <div class="modal-footer justify-content-between">
             <button id="btn_employee_filter" class="btn savebtn">Apply Filter</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<!-- ./filter modal -->




</body>
</html>

<!-- <script>
    var companyId = '<?php echo $_SESSION['company_id_in_hr']; ?>';
   
    alert(companyId); 
</script> -->
<script>

var BASE_URL = "<?php echo base_url(); ?>";
var hrController = "<?php echo CONTROLLER_HR; ?>";

var token = "<?php echo $_SESSION['li_token']; ?>";

$(document).ready(function () {
  loadDataTableForEmployee();
  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var targetTab = $(e.target).attr("href"); 
            if (targetTab === "#perment_address_tab") {
              
                if ($('#copy_address').is(':checked')) {
                  
                    copyAddress();
                }
                else {
                  
                    clearAddress();
                }

            }
        });

        

        activateTab('personal_tab');

        $('.nav-tabs a').on('click', function(e) {
        e.preventDefault();
       
        $('.nav-tabs li').removeClass('active');

       
        $(this).closest('li').addClass('active');
      });
});

    function copyAddress() {
          
            $('#permenent_address_line_1').val($('#present_address_line_1').val());
            $('#permenent_address_line_2').val($('#present_address_line_2').val());
            $('#permenent_address_line_3').val($('#present_address_line_3').val());
            $('#permenent_address_line_4').val($('#present_address_line_4').val());
            $('#permenent_state_id').val($('#present_state_id').val()).trigger('change');
            $('#permenent_country_id').val($('#present_country_id').val()).trigger('change');
            $('#permenent_pin_code').val($('#present_pin_code').val());
        }

        function clearAddress() {
           
            $('#permenent_address_line_1').val('');
            $('#permenent_address_line_2').val('');
            $('#permenent_address_line_3').val('');
            $('#permenent_address_line_4').val('');
            $('#permenent_state_id').val(null).trigger('change'); 
            $('#permenent_country_id').val(null).trigger('change'); 
            $('#permenent_pin_code').val('');
        }


       
        $('#copy_address').change(function () {
            if ($(this).is(':checked')) {
              
                copyAddress();
            }else {
                   
                    clearAddress();
                }
        });

        function activateTab(tabId) {
        $('.nav-tabs li').removeClass('active');
        $(`#${tabId}_link`).parent().addClass('active');
    }






// function loadDataTableForEmployee() {
//   $('#employee_data_table').DataTable({
//     "ajax": {
//       "url": BASE_URL + "index.php/" + hrController + "/get_employee_details",
//       "dataSrc": "data"
//     },
//     "columns": [
//       {
//         data: null,
//         render: function (data, type, row) {
//           // Concatenate first name and last name
//           return data.first_name + " " + data.last_name;
//         }
//       },
//       { data: "employee_number" }, 
//       { data: "branch_name" }, 
//       { data: "department_name" }, 

//       {
//         data: "employee_id",
       
//         render: function (data, type, row) {
//           return `
//             <div class="operations">
//               <a href="#" class="edit" onclick="editEmployee('${data}');"><i class="fas fa-edit"></i>Edit</a>
//               <a href="#" class="view" onclick="viewEmployee('${data}');"><i class="fas fa-eye"></i>View</a>
//               <a href="#" class="delete" onclick="deleteEmployee('${data}');"><i class="fas fa-trash"></i>Delete</a>
//             </div>`;
//         }
//       }
//     ],
//     "initComplete": function (settings, json) {
     
//       customizeDataTable('employee_data_table');
//     }
//   });
// }



function loadDataTableForEmployee() {
  $('#employee_data_table').DataTable({
    "ajax": {
      "url": BASE_URL + "index.php/" + hrController + "/get_employee_details",
      "dataSrc": "data"
    },
    "columns": [
      {
        data: null,
        render: function (data, type, row) {
          
          return data.first_name + " " + data.last_name;
        }
      },
      { data: "employee_number" }, 
      { data: "branch_name" }, 
      { data: "department_name" }, 
      {
        data: null,
        render: function (data, type, row) {
          return `
            <div class="operations">
              <a href="#" class="edit" onclick="editEmployee('${row.employee_id}','${row.employment_details_id}');"><i class="fas fa-edit"></i>Edit</a>
              <a href="#" class="view" onclick="viewEmployee('${row.employee_id}');"><i class="fas fa-eye"></i>View</a>
              <a href="#" class="delete" onclick="deleteEmployee('${row.employee_id}');"><i class="fas fa-trash"></i>Delete</a>
            </div>`;
        }
      }
    ],
    "initComplete": function (settings, json) {
      customizeDataTable('employee_data_table');
      updateEmployeeHeadDropdown();
      
    }
  });
}


$('#employee_modal_form').validate({
  rules: {
                    first_name:{
                        required: true,
                    },
                    last_name:{
                        required: true,
                    },
                    date_of_birth:{
                        required: true,
                    },
                    work_email:{
                        email: true,
                    },
                    private_email:{
                        email: true,
                    },
                    present_address_line_1:{
                        required: true,
                    },
                    present_state_id: {
                        required: true,
                    },
                    present_country_id: {
                        required: true,
                    },
                    permenent_state_id: {
                        required: true,
                    },
                    permenent_country_id: {
                        required: true,
                    },
                    permenent_address_line_1: {
                    required: true,
                },
                                       
                },
                messages: {
                    first_name: "Please enter the name",
                    last_name: "Please enter the last name",
                    date_of_birth:"Please select the data of birth",
                    work_email:"Please enter a valid email address (e.g., example@email.com)",
                    private_email:"Please enter a valid email address (e.g., example@email.com)",
                    present_address_line_1: "Please enter present address",
                    present_state_id: "Please select present state",
                    present_country_id: "Please select present country",
                    permenent_state_id: "Please select permanent state",
                    permenent_country_id: "Please select permanent country",
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });

 
$("#btn_emp_save").click (function(){
    if ($('#employee_modal_form').valid()) {
          var formData  = new FormData();
             //Personal
               formData.append('employee_number', $("#employee_number").val()); 
               formData.append('first_name', $("#first_name").val());
               formData.append('middle_name', $("#middle_name").val()); 
               formData.append('last_name', $("#last_name").val()); 
               formData.append('gender_id', $("#gender_id").val()); 
               formData.append('date_of_birth', $("#date_of_birth").val()); 
               formData.append('nationality_id', $("#nationality_id").val());
               formData.append('marital_status_id', $("#marital_status_id").val());

                //Identification
               formData.append('aadhar_number', $("#aadhar_number").val()); 
               formData.append('passport_number', $("#passport_number").val()); 
               formData.append('pan_number', $("#pan_number").val());
               formData.append('driving_licence_number', $("#driving_licence_number").val()); 
               formData.append('other_id_doc', $("#other_id_doc").val());

               // present address
               formData.append('present_address_line_1', $("#present_address_line_1").val());
               formData.append('present_address_line_2', $("#present_address_line_2").val());
               formData.append('present_address_line_3', $("#present_address_line_3").val()); 
               formData.append('present_address_line_4', $("#present_address_line_4").val()); 
               formData.append('present_state_id', $("#present_state_id").val()); 
               formData.append('present_country_id', $("#present_country_id").val());
               formData.append('present_pin_code', $("#present_pin_code").val());
               
               // permanent address
               formData.append('permenent_address_line_1', $("#permenent_address_line_1").val()); 
               formData.append('permenent_address_line_2', $("#permenent_address_line_2").val());
               formData.append('permenent_address_line_3', $("#permenent_address_line_3").val());
               formData.append('permenent_address_line_4', $("#permenent_address_line_4").val()); 
               formData.append('permenent_state_id', $("#permenent_state_id").val()); 
               formData.append('permenent_country_id', $("#permenent_country_id").val()); 
               formData.append('permenent_pin_code', $("#permenent_pin_code").val());

               //contact
               formData.append('home_phone', $("#home_phone_employee").val()); 
               formData.append('mobile_phone', $("#mobile_phone_employee").val()); 
               formData.append('work_phone', $("#work_phone_employee").val()); 
               formData.append('work_email', $("#work_email").val());
               formData.append('private_email', $("#private_email").val()); 

               formData.append('account_number', $("#account_number").val()); 
               formData.append('bank_name', $("#bank_name").val());
               formData.append('bank_branch_name', $("#bank_branch_name").val());
               formData.append('ifsc_code', $("#ifsc_code").val()); 
               formData.append('flag_id', $("#flag_id").val()); 
               formData.append('row_id', $("#row_id").val()); 
               formData.append('employment_details_id', $("#employment_details_id").val()); 

              

               // job detailss
               formData.append('branch_id', $("#branch_id_employee").val());
               formData.append('department_id', $("#employee_department_id").val()); 
               formData.append('job_title_id', $("#employee_job_title_id").val()); 
               formData.append('pay_scale_id', $("#employee_pay_scale_id").val());
               formData.append('employment_status_id', $("#employment_status_id").val());
               formData.append('date_joined', $("#date_joined").val()); 
               formData.append('employee_head_id', $("#employee_head_id_in_employee").val()); 
               formData.append('li_token', token); 
          $.ajax({
              url: BASE_URL + "index.php/" + hrController + "/save_employee_details",
              type: 'POST',
              data:  formData,
              dataType: "JSON",
              processData: false,
              contentType: false,
              success: function(response) {
                console.log("response",response);
             
                $('#employee_data_table_modal').modal('hide');
                $('#employee_data_table').DataTable().ajax.reload();
                updateEmployeeHeadDropdown();
               

                showToast('success', response.message);
              },
              error: function(xhr, status, error) {
                  console.log(xhr.responseText);
                  console.log(status);
                  console.log(error);
              }
          });
     }
}); 



function updateEmployeeHeadDropdown() {
    
    $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/get_employee_names_for_employee_head",
        type: 'GET', 
        dataType: 'json',
        success: function(data) {
            var dropdown1 = $('#employee_head_id_in_employee');
            // var dropdown2 = $('#filter_employee_id_employee');
            // var dropdown3 = $('#employee_id_for_education');
            // var dropdown4 = $('#filter_employee_id_education');
            // var dropdown5 = $('#certification_employee_id');
            // var dropdown6 = $('#filter_employee_id_certification');
            // var dropdown7 = $('#language_employee_id');
            // var dropdown8 = $('#dependent_employee_id');
            // var dropdown9 = $('#contact_employee_id');
            
            dropdown1.empty();
            // dropdown2.empty();
            // dropdown3.empty();
            // dropdown4.empty();
            // dropdown5.empty();
            // dropdown6.empty();
            // dropdown7.empty();
            // dropdown8.empty();
            // dropdown9.empty();
            
            $.each(data.employee_names, function(index, employee) {
                dropdown1.append($('<option></option>').attr('value', employee.id).text(employee.employee_name));
                // dropdown2.append($('<option></option>').attr('value', employee.id).text(employee.employee_name));
                // dropdown3.append($('<option></option>').attr('value', employee.id).text(employee.employee_name));
                // dropdown4.append($('<option></option>').attr('value', employee.id).text(employee.employee_name));
                // dropdown5.append($('<option></option>').attr('value', employee.id).text(employee.employee_name));
                // dropdown6.append($('<option></option>').attr('value', employee.id).text(employee.employee_name));
                // dropdown7.append($('<option></option>').attr('value', employee.id).text(employee.employee_name));
                // dropdown8.append($('<option></option>').attr('value', employee.id).text(employee.employee_name));
                // dropdown9.append($('<option></option>').attr('value', employee.id).text(employee.employee_name));
            });
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            console.error(status);
            console.error(error);
        }
    });
}


function fetchEmployeeNames() {
  
    
    $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/get_employee_firstname_lastname",
        type: 'GET', 
        dataType: 'json',
        success: function(data) {
           
            var dropdown1 = $('#filter_employee_id_employee');
            var dropdown2 = $('#filter_employee_id_education');
            var dropdown3 = $('#employee_id_for_education');
            var dropdown4 = $('#filter_employee_id_languages');
            var dropdown5 = $('#certification_employee_id');
            var dropdown6 = $('#filter_employee_id_certification');
            var dropdown7 = $('#language_employee_id');
            var dropdown8 = $('#dependent_employee_id');
            var dropdown9 = $('#contact_employee_id');
            var dropdown10 = $('#loan_request_employee_id');
            
            
             dropdown1.empty();
             dropdown2.empty();
             dropdown3.empty();
            dropdown4.empty();
            dropdown5.empty();
             dropdown6.empty();
            dropdown7.empty();
            dropdown8.empty();
            dropdown9.empty();
            dropdown10.empty();
            
            $.each(data.employee_names, function(index, employee) {
                dropdown1.append($('<option></option>').attr('value', employee.employee_id).text(employee.full_name));
                dropdown2.append($('<option></option>').attr('value', employee.employee_id).text(employee.full_name));
                dropdown3.append($('<option></option>').attr('value', employee.employee_id).text(employee.full_name));
                dropdown4.append($('<option></option>').attr('value', employee.employee_id).text(employee.full_name));
                dropdown5.append($('<option></option>').attr('value', employee.employee_id).text(employee.full_name));
                dropdown6.append($('<option></option>').attr('value', employee.employee_id).text(employee.full_name));
                dropdown7.append($('<option></option>').attr('value', employee.employee_id).text(employee.full_name));
                dropdown8.append($('<option></option>').attr('value', employee.employee_id).text(employee.full_name));
                dropdown9.append($('<option></option>').attr('value', employee.employee_id).text(employee.full_name));
                dropdown10.append($('<option></option>').attr('value', employee.employee_id).text(employee.full_name));
            });
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            console.error(status);
            console.error(error);
        }
    });
}


function updateDepartmentDropdown() {
    $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/get_departments_in_filter",
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            var dropdown = $('#filter_employee_department');
            dropdown.empty();
            dropdown.append($('<option></option>').attr('value', '0').text('Select Department')); 

            $.each(data, function(index, department) {
                dropdown.append($('<option></option>').attr('value', department.id).text(department.department_name));
            });
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            console.error(status);
            console.error(error);
        }
    });
}





function viewEmployee(row_id) {
    alert(row_id)
    $("#row_id").val(row_id);
 flag_id=$("#flag_id").val("1");
    $('#employee_data_table_modal').modal('show');
    $.ajax({
        type: 'GET',
        url: BASE_URL + "index.php/" + hrController + "/get_employee_details_by_id",
        data: { row_id: row_id, li_token: token},
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                console.log(response);
                console.log(response.data.bank_branch_name);
                // $("#branch_id_employee").val(response.data.bank_branch_name);
              
                $("#employee_number").val(response.data.employee_number);
                $("#first_name").val(response.data.first_name);
                $("#middle_name").val(response.data.middle_name);
                $("#last_name").val(response.data.last_name);
                $("#gender_id").val(response.data.gender_id);
                $("#date_of_birth").val(response.data.date_of_birth);
                $("#nationality_id").val(response.data.nationality_id);
                $("#marital_status_id").val(response.data.marital_status_id);
                $("#aadhar_number").val(response.data.aadhar_number);
                $("#passport_number").val(response.data.passport_number);
                $("#pan_number").val(response.data.pan_number);
                $("#driving_licence_number").val(response.data.driving_licence_number);
                $("#other_id_doc").val(response.data.other_id_doc);
                $("#present_address_line_1").val(response.data.present_address_line_1);
                $("#present_address_line_2").val(response.data.present_address_line_2);
                $("#present_address_line_3").val(response.data.present_address_line_3);
                $("#present_address_line_4").val(response.data.present_address_line_4);
                $("#driving_licence_number").val(response.data.driving_licence_number);
                $("#present_pin_code").val(response.data.present_pin_code);
                $("#permenent_address_line_1").val(response.data.permenent_address_line_1);
                $("#permenent_address_line_2").val(response.data.permenent_address_line_2);
                $("#permenent_address_line_3").val(response.data.permenent_address_line_3);
                $("#permenent_address_line_4").val(response.data.permenent_address_line_4);
                $("#permenent_pin_code").val(response.data.permenent_pin_code);

                $("#home_phone_employee").val(response.data.home_phone);
                $("#mobile_phone_employee").val(response.data.mobile_phone);
                $("#work_phone_employee").val(response.data.work_phone);
                $("#work_email").val(response.data.work_email);
                $("#private_email").val(response.data.private_email);
                $("#account_number").val(response.data.account_number);
                $("#bank_name").val(response.data.bank_name);
                $("#bank_branch_name").val(response.data.bank_branch_name);
                $("#ifsc_code").val(response.data.ifsc_code);

                $("#present_state_id").val(response.data.permenent_state_id);
                $("#present_country_id").val(response.data.present_country_id);
                $("#permenent_state_id").val(response.data.permenent_state_id);
                $("#permenent_country_id").val(response.data.permenent_country_id);
               
                
                 //jobdetails
                 $("#branch_id_employee").val(response.data.branch_id);
                $("#employee_department_id").val(response.data.department_id);
                $("#employee_job_title_id").val(response.data.job_title_id);
                $("#employee_pay_scale_id").val(response.data.pay_scale_id);
                $("#employment_status_id").val(response.data.employment_status_id);
                $("#date_joined").val(response.data.date_joined);
                $("#employee_head_id_in_employee").val(response.data.employee_head_id)

                // var disable_data_company = $("#employee_data_table_modal, #company_name, #company_profile,#company_branch_name,#company_address_line1,#company_address_line2,#company_address_line3,#company_address_line4,.select2");
           
                var disableElements = $("input, select").prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                disableElements.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                // disable_data_company.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                $(".modal-footer .savebtn").hide();
                
                $("#employee_data_table_modal").on("hidden.bs.modal", function () 
                {
                    $(".modal-footer .savebtn").show();
                    disableElements.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
                });
                
              

              
            } else {
                console.error('Response does not contain department_name.');
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr, status, error);
        }
    });
}

function editEmployee(row_id,employmentDetailsId) {
    alert(row_id);
    alert("Employee Details_id"+employmentDetailsId);
    $("#employment_details_id").val(employmentDetailsId);
    $("#employee_data_table_modal").modal("show");
    $("#row_id").val(row_id);
    flag_id=$("#flag_id").val("1");
 

   $.ajax({
       url: BASE_URL + "index.php/" + hrController + "/get_employee_details_by_id",
       type: "GET",
       data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val()},
       dataType: "json",
       success: function (response) {
           console.log("response edit is" ,response);
           if (response.success) 
           {
                 
                $("#employee_number").val(response.data.employee_number);
                $("#first_name").val(response.data.first_name);
                $("#middle_name").val(response.data.middle_name);
                $("#last_name").val(response.data.last_name);
                $("#gender_id").val(response.data.gender_id);
                $("#date_of_birth").val(response.data.date_of_birth);
                $("#nationality_id").val(response.data.nationality_id);
                $("#marital_status_id").val(response.data.marital_status_id);
                $("#aadhar_number").val(response.data.aadhar_number);
                $("#passport_number").val(response.data.passport_number);
                $("#pan_number").val(response.data.pan_number);
                $("#driving_licence_number").val(response.data.driving_licence_number);
                $("#other_id_doc").val(response.data.other_id_doc);
                $("#present_address_line_1").val(response.data.present_address_line_1);

                $("#present_address_line_2").val(response.data.present_address_line_2);
                $("#present_address_line_3").val(response.data.present_address_line_3);
                $("#present_address_line_4").val(response.data.present_address_line_4);
              
                $("#driving_licence_number").val(response.data.driving_licence_number);
             
                $("#present_pin_code").val(response.data.present_pin_code);
                $("#permenent_address_line_1").val(response.data.permenent_address_line_1);
                $("#permenent_address_line_2").val(response.data.permenent_address_line_2);
                $("#permenent_address_line_3").val(response.data.permenent_address_line_3);
                $("#permenent_address_line_4").val(response.data.permenent_address_line_4);
                $("#permenent_pin_code").val(response.data.permenent_pin_code);
                $("#home_phone_employee").val(response.data.home_phone);
                $("#mobile_phone_employee").val(response.data.mobile_phone);
                $("#work_phone_employee").val(response.data.work_phone);
                $("#work_email").val(response.data.work_email);
                $("#private_email").val(response.data.private_email);
                $("#account_number").val(response.data.account_number);
                $("#bank_name").val(response.data.bank_name);
                $("#bank_branch_name").val(response.data.bank_branch_name);
                $("#ifsc_code").val(response.data.ifsc_code);

                //jobdetails
                $("#branch_id").val(response.data.branch_id);
                $("#department_id").val(response.data.department_id);
                $("#job_title_id").val(response.data.job_title_id);
                $("#pay_scale_id").val(response.data.pay_scale_id);
                $("#employment_status_id").val(response.data.employment_status_id);
                $("#date_joined").val(response.data.date_joined);
                $("#employee_head_id_in_employee").val(response.data.employee_head_id)

                $("#present_state_id").val(response.data.permenent_state_id);
                $("#present_country_id").val(response.data.present_country_id);
                $("#permenent_state_id").val(response.data.permenent_state_id);
                $("#permenent_country_id").val(response.data.permenent_country_id);
               
            
                $("#employee_data_table_modal").modal("show");
           } else {
               alert("Failed.");
           }
       },
       error: function (xhr, status, error) {
           alert("Error in fetching.");
       }
   });
}

function deleteEmployee(row_id){
    alert(row_id);
    if (confirm("Are you sure you want to delete this item?")) {
        $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/delete_employee_by_id",
            type: "POST",
            data: { row_id: row_id, li_token: token },
            dataType: "json",
            success: function (response) {

                $('#employee_data_table_modal').modal('hide');
                showToast('success', response.message); 
                 $('#employee_data_table').DataTable().ajax.reload();
                  
                  // alert(response.message);
            },
            error: function (xhr, status, error) {
                
                // alert_message("failure", "Error", "Error delete job title item.");
            }
        });
    }
}


 $("#btn_company_cancel").on("click",function() {  
    $('.modal_form')[0].reset();

 })

 $("#btn_department_cancel").on("click",function() {  
    $('.modal_form')[0].reset();

 })

 $('#employee_data_table_filter_modal').on('shown.bs.modal', function () {
    fetchEmployeeNames();
    updateDepartmentDropdown();
  });



$("#btn_employee_filter").on("click", function () {
        var btn_employee_filter_val = $("#filter_employee_id_employee").val();
        var filter_employee_department_val = $("#filter_employee_department").val();
        var filter_employee_id = $("#filter_employee_id_employee option:selected").text(); // Corrected variable name
        var filter_employee_department = $("#filter_employee_department option:selected").text();
        var table_employee = $('#employee_data_table').DataTable();

        // Clear all filters
        table_employee.columns().search('');

        if (btn_employee_filter_val !== "0") {
            table_employee.column(0).search(filter_employee_id);
        }
        if (filter_employee_department_val !== "0") {
            table_employee.column(3).search(filter_employee_department);
        }

        table_employee.draw();

        var filterEmployeeText = ''; 
        if (btn_employee_filter_val !== "0" && filter_employee_department_val !== "0") {
            filterEmployeeText = 'Employee Name: ' + filter_employee_id + ' & ' + 'Department: ' + filter_employee_department; // Updated text
        } else if (btn_employee_filter_val !== "0") {
            filterEmployeeText = 'Employee Name: ' + filter_employee_id;
        } else if (filter_employee_department_val !== "0") {
            filterEmployeeText = 'Department: ' + filter_employee_department;
        }
        var resetFilterEmployeeText = filterEmployeeText + '<span class="icon"><i class="fa fa-times"></i></span>';
        $('#employee_data_table_reset_filter').html(resetFilterEmployeeText);
        
        // Showing or hiding the button based on filter values
        if (filter_employee_id === "0" && filter_employee_department === "0") {
            $("#employee_data_table_reset_filter").hide();
        } else {
            $("#employee_data_table_reset_filter").show();
        }
        $("#employee_data_table_filter_modal").modal("hide");
    });

</script>