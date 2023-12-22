<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HR & Payroll</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <?php include("top-css.php"); ?> 

    <style>
        .copy_address{
            color:black !important
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
        
            <!-- content write here  -->

                <div class="combination_datatable" id="company_strucure">
                      <!-- tab ul -->
                      <ul class="nav nav-tabs">
                           <?php 
                          
                                $is_first='yes';
                              foreach($tab as $tab_item):
                                if($is_first=='yes')
                                    $class='active';
                                else
                                    $class='';
                                if($tab_item->sub_menu_tab=='Employee')
                                {
                                    $employee_add= $tab_item->is_add_new;
                                     $employee_edit= $tab_item->is_edit;
                                     $employee_view= $tab_item->is_view;
                                     $employee_delete= $tab_item->is_delete;
                                    $tab_id='li_employee_tab';
                                }
                                else if($tab_item->sub_menu_tab=='Work History')
                                {
                                    $branch_add=$tab_item->is_add_new;
                                     $branch_edit= $tab_item->is_edit;
                                     $branch_view= $tab_item->is_view;
                                     $branch_delete= $tab_item->is_delete;
                                    $tab_id='li_work_history_tab';
                                }
                                else if($tab_item->sub_menu_tab=='Skills')
                                {
                                    $skills_add=$tab_item->is_add_new;
                                     $skills_edit= $tab_item->is_edit;
                                     $skills_view= $tab_item->is_view;
                                     $skills_delete= $tab_item->is_delete;
                                    $tab_id='li_skills_tab';
                                }
                                  else if($tab_item->sub_menu_tab=='Languages')
                                {
                                    $language_add=$tab_item->is_add_new;
                                    $language_edit= $tab_item->is_edit;
                                     $language_view= $tab_item->is_view;
                                     $language_delete= $tab_item->is_delete;
                                    $tab_id='li_languages_tab';
                                }
                                  else if($tab_item->sub_menu_tab=='Certifications')
                                {
                                    $certification_add=$tab_item->is_add_new;
                                    $certification_edit= $tab_item->is_edit;
                                     $certification_view= $tab_item->is_view;
                                     $certification_delete= $tab_item->is_delete;
                                    $tab_id='li_certifications_tab';
                                }
                                  else if($tab_item->sub_menu_tab=='Education')
                                {
                                    $education_add=$tab_item->is_add_new;
                                    $education_edit= $tab_item->is_edit;
                                     $education_view= $tab_item->is_view;
                                     $education_delete= $tab_item->is_delete;
                                    $tab_id='li_education_tab';
                                }
                                 else if($tab_item->sub_menu_tab=='Contacts')
                                {
                                    $contact_add=$tab_item->is_add_new;
                                    $contact_edit= $tab_item->is_edit;
                                     $contact_view= $tab_item->is_view;
                                     $contact_delete= $tab_item->is_delete;
                                    $tab_id='li_contacts_tab';
                                }
                                else
                                {
                                    $department_add=$tab_item->is_add_new;
                                    $dependent_edit= $tab_item->is_edit;
                                     $dependent_view= $tab_item->is_view;
                                     $dependent_delete= $tab_item->is_delete;
                                    $tab_id='li_dependents_tab';
                                }
                              ?>
                            <li class="nav-item">
                            <a class="nav-link <?php echo $class;?>" id="<?php echo $tab_id;?>" data-toggle="tab" href="<?php echo $tab_item->page_link ;?>" role="tab" aria-selected="false"><?php echo $tab_item->sub_menu_tab ;?></a>
                            </li>
                            
                             <?php 
                                $is_first='no';
                                endforeach;
                                ?> 

                            <!--<li class="nav-item">-->
                            <!--<a class="nav-link " id="li_work_history_tab" data-toggle="tab" href="#work_history_tab" role="tab" aria-selected="false">Work History</a>-->
                            <!--</li>-->
                            <!--<li class="nav-item">-->
                            <!--<a class="nav-link " id="li_skills_tab" data-toggle="tab" href="#skills_tab" role="tab" aria-selected="false">Skills</a>-->
                            <!--</li>-->
                                    
                           
                            <!--<li class="nav-item">-->
                            <!--<a class="nav-link" id="li_education_tab" data-toggle="tab" href="#education_tab" role="tab"  aria-selected="false">Education</a>-->
                            <!--</li>-->

                            <!--<li class="nav-item">-->
                            <!--<a class="nav-link" id="li_certifications_tab" data-toggle="tab" href="#certifications_tab" role="tab"  aria-selected="false">Certifications</a>-->
                            <!--</li>-->
                            <!--<li class="nav-item">-->
                            <!--<a class="nav-link" id="li_languages_tab" data-toggle="tab" href="#languages_tab" role="tab"  aria-selected="false">Languages</a>-->
                            <!--</li>-->
                            <!--<li class="nav-item">-->
                            <!--<a class="nav-link" id="li_dependents_tab" data-toggle="tab" href="#dependents_tab" role="tab"  aria-selected="false">Dependents</a>-->
                            <!--</li>-->
                        
                            <!--<li class="nav-item">-->
                            <!--<a class="nav-link" id="li_contacts_tab" data-toggle="tab" href="#contacts_tab" role="tab"  aria-selected="false">Contacts</a>-->
                            <!--</li> -->
                        </ul>
                     <!-- ./ tab ul -->


                    <!-- tab end  here -->
                        <div class="tab-content">
                            <!--tab 1  ------ -->
                                <div class="tab-pane fade show active" id="employee_tab" role="tabpanel" aria-labelledby="employee_tab">

                                <div id="" class="reviewBlock">

                                            <div class="combined_buttons">
                                                <div class="add_new_btn_div">
                                                    <?php 
                                                      if($branch_add=='yes'):
                                                      ?>
                                                    <button id="employee_data_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
                                                    <?php endif; ?>
                                                 </div>
                                                <div class="filter_btn_div">
                                                <button id="employee_data_table_filter_btn" class="customise_filter_button" data-value="employee_data_table"><i class="fas fa-filter"></i>Filter</button>
                                                </div>
                                                <div class="reset_filter_btn_div">
                                                    <button id="employee_data_table_reset_filter"  style="display:none" class="cancel_filter_button"><i class="fas fa-times"></i> Cancel</button>
                                                </div>
                                                <div class="export_pdf">
                                                <button id="employee_data_table_export_to_pdf" class="export_pdf_button"><i class="far fa-file-pdf export-pdf-icon"></i>Export to PDF</button>
                                                </div>
                                            </div>
                
                                                </div>
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
                            <!--one tab  ------ -->
                                
                          
                            <div class="tab-pane fade" id="work_history_tab" role="tabpanel" aria-labelledby="work_history_tab">
                            
                                        <?php include("employee_employment_details.php");?>
                            </div>
                            <div class="tab-pane fade" id="skills_tab" role="tabpanel" aria-labelledby="skills_tab">
                            
                            <?php include("employee_skill.php");?>
                            </div>

                            

                        <div class="tab-pane fade" id="education_tab" role="tabpanel" aria-labelledby="education_tab">
                            
                                <?php include("employee_education.php");?>
                        </div>
                        <div class="tab-pane fade" id="certifications_tab" role="tabpanel" aria-labelledby="certifications_tab">
                                
                                <?php include("employee_certification.php");?>
                        </div>

                        <div class="tab-pane fade" id="languages_tab" role="tabpanel" aria-labelledby="languages_tab">
                                
                                <?php include("employee_languages.php");?>
                        </div>
                        <div class="tab-pane fade" id="dependents_tab" role="tabpanel" aria-labelledby="dependents_tab">
                            
                                <?php include("employee_dependents.php");?>
                        </div>
                        <div class="tab-pane fade" id="contacts_tab" role="tabpanel" aria-labelledby="contacts_tab">
                        
                        <?php include("employee_contacts.php");?>
                    </div>
                            <!--./one tab  ------ -->

                </div>
                    <!-- main tab end  -->

                
                </div><!-- end combination data table section -->

            <!-- ./content write here  -->


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
     <div class="common_hidden_fields" style="text-align: end;">
        <input type="hidden" id="flag_id" value="0" >
        <input type="hidden" id="row_id" value="0" >
    </div>


     <?php include("footer.php"); ?> 
     <!-- ./ footer -->
</div>
<!-- ./wrapper -->

<div class="modal fade data-table-modal" id="employee_data_table_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Employee</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            

            <!-- ===== ------------------------------------------->


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
                                            <select class="form-control select2"  name="gender_id" id="gender_id" style="width:100%">
                                                    <!-- <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                    <option value="3">Others</option> -->
                                                    <option value="">Select Gender</option>
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
                                        
                                            <select class="form-control select2"  name="nationality_id" id="nationality_id" style="width:100%">
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
                                            <option value="">Select Marital Status</option>
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
                                        
                                        <select class="form-control select2" id="branch_id_employee" name="branch_id_employee">
                                        
                                        </select>
                                        <input type="hidden" id="branch_id_employee_hidden" value="0" >
                   
                                      
                                     </div>
                                </div>
                                <!-- ./ one field ---- -->                              
                                <!--one field  text field---- -->
                                    <div class="form-group row">
                                        <div class="col-3">
                                            <label for="first_name" class="col-form-label required">Department Name</label>
                                        </div>
                                        <div class="col-8">
                                            
                                            <select class="form-control select2" id="employee_department_id" name="employee_department_id">
                                        
                                        </select>
                                        <input type="hidden" id="employee_department_id_hidden" value="0" >
                                           
                                        </div>
                                    </div>
                                <!-- ./ one field ---- -->                              
                                <!--one field  text field---- -->
                                    <div class="form-group row">
                                        <div class="col-3">
                                            <label for="middle_name" class="col-form-label required">Job Title</label>
                                        </div>
                                        <div class="col-8">
                                            
                                            <select class="form-control select2" id="employee_job_title_id" name="employee_job_title_id">
                                            <option value="" selected>Select Job Title</option>
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
                                        <select class="form-control select2" id="employee_pay_scale_id" name="employee_pay_scale_id">
                                        <option value="" >Select Pay Scale</option>
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
                                            <select class="form-control select2"  name="employee_employment_status_id" id="employee_employment_status_id" style="width:100%">
                                                    <!-- <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                    <option value="3">Others</option> -->
                                                    <option value="" >Select Employment Status</option>
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
                                       
                               <select class="form-control select2" id="employee_head_id_in_employee" name="employee_head_id_in_employee">
                                   
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
                            <label for="copy_address" class="col-form-label">Same as Present Address</label>
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


      <!-- filter modal -->
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















   <!-- ./filter modal-->
   <div class="modal fade data-table-modal" id="employee_profile_pdf_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
             
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="wrapper">
                <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div> -->


            <!-- Main content -->
            <div class="invoice employee_profile_content  mb-3" id="print_content">
              <!-- title row -->
              <div class="row company_header" >
                 <div class="col-12">
                       <div class="company_details">
                            <div class="company_logo_and_address">
                                <div class="company_logo">
                                    <img src="<?php echo base_url();?>hrmanagement/dist/img/logo.png" alt="" >
                                </div>
                                <div class="company_address">
                                    <strong class="company_name">BrqGlobTechPvtLtd</strong>
                                    <address>
                                        795 Folsom Ave, Suite 600<br>
                                        San Francisco, CA 94107<br>
                                        Phone: (804) 123-5432<br>
                                        Email: info@almasaeedstudio.com
                                    </address>
                                </div>
                            </div>
                            
                            <div class="reporting_date">
                                 <small class="float-right"><span style="padding-right: 5px;">Reporting Date:</span> <?php echo(date('d/m/Y'));?></small>
                            </div>

                       </div>      
                 </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
             <!-- Employee profile Headding  -->
                  <div class="row">
                    <div class="col-12">
                        <div class="name-container">
                            <p class="name-text">Employee Profile</p>
                            <div class="line"></div>
                        </div>
                    </div>
                  </div>              

             <!-- ./Employee profile Headding  -->





              <div class="row profile-main-content invoice-info" >
                <div class="col-sm-3 invoice-col">
                  <div class="profile_photo">
                     <img src="<?php echo base_url();?>uploads/hr-management/employee/photos/prof-1.jpg" alt="">
                  </div>

                </div>
                <!-- /.col -->
                <div class="col-sm-9 invoice-col profile_header_right">
                    
                    <div class="employee_name_and_employement">
                      <h3></h3>
                       <P></P>          
                    </div>
                    <div class="row profile_adress">
                        <div class="col-sm-12 invoice-col">
                           <div class="row">
                                <div class="col-4">
                                    Employee No <span>:</span>
                                </div>
                                <div class="col-8" id="employee_number">
                                     <!-- AC000121 -->
                                </div>

                           </div>     
                           <div class="row">
                                <div class="col-4">
                                     Gender <span>:</span>
                                </div>
                                <div class="col-8" id="employee_gender">

                                </div>

                           </div>     
                           <div class="row">
                                <div class="col-4">
                                Marital Status<span>:</span>
                                </div>
                                <div class="col-8" id="employee_marital_status">
                                   Single
                                </div>

                           </div>     
                           <div class="row">
                                <div class="col-4">
                                    Date of Birth <span>:</span>
                                </div>
                                <div class="col-8" id="employee_date_of_birth">
                                    
                                </div>
                           </div>     
                           <div class="row">
                                <div class="col-4">
                                    Branch <span>:</span>
                                </div>
                                <div class="col-8" id="employee_branch">
                                   
                                </div>

                           </div>     
                           <div class="row">
                                <div class="col-4">
                                    Department <span>:</span>
                                </div>
                                <div class="col-8" id="employee_department">
                                   
                                </div>

                           </div>     
                           <div class="row">
                                <div class="col-4" >
                                    Join Start Date <span>:</span>
                                </div>
                                <div class="col-8" id="employee_join_date">
                                  
                                </div>

                           </div>     
                           <div class="row">
                                <div class="col-4" >
                                    Work E-mail <span>:</span>
                                </div>
                                <div class="col-8" id="employee_work_email">
                                 
                                </div>

                           </div>     
                           <div class="row">
                                <div class="col-4">
                                    Work Phone <span>:</span>
                                </div>
                                <div class="col-8" id="employee_work_phone">
                                    
                                </div>
                           </div>        
                        </div>
                                <!-- <div class="col-sm-6 invoice-col present_address" >
                                    <div>
                                    <i class="fas fa-street-view"></i>
                                        <strong>Present Address</strong>    
                                    </div>
                                   
                                    <address class="employee_present_address" id="employee_present_address">
                                     </adress>      
                               </div> -->
                            <!-- /.col -->
                                <!-- <div class="col-sm-6 invoice-col permenant_address">
                                    <i class="fas fa-street-view"></i>
                                    <strong>Present Address</strong>    
                                        <address class="employee_permenent_address" id="employee_permenent_address">
                                        </adress>
                                </div> -->
                          <!-- /.col -->             
                    </div>
                </div>   
                
              </div>
              <!-- /.row -->

              <div class="addresss p-3">   
                    <div class="row first-line">
                        <div class="email col-sm-6">
                                <i class="fas fa-envelope"></i>
                                <span  id="employee_email"></span>
                        </div>
                        <div class="phone_no col-sm-6">
                                <i class="fas fa-phone"></i>
                                <span id="employee_phone_number"></span> 
                        </div>
                    </div>
                    <div class="row present_permenent_address">
                        <div class="col-6">                
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i>Present Address</p>
                                   <div  class="employee_present_address" id="employee_present_address">
                                    </div>
                        </div>
                        <div class="col-6">      
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i>Permenant Address</p>
                            <div  class="employee_permenent_address" id="employee_permenent_address">           
                            </div>
                        </div>            
                    </div>   
              </div>
              <div class="citizen_ship_and_other_info row box-shadow p-3">
                <div class="col-6 citizen_ship">
                    <p>Citizenship & Other Info</p>
                    <div class="row">
                        <div class="col-5" >
                            <label>Nationality <span>:</span></label>
                        </div>
                        <div class="col-7" id="emp_nationality">
                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <label>Adhar No <span>:</span></label>
                        </div>
                        <div class="col-7"  id="emp_adhar_no">
                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <label>Passport No <span>:</span></label>
                        </div>
                        <div class="col-7" id="emp_passport_no">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <label>Pan No <span>:</span></label>
                        </div>
                        <div class="col-7" id="emp_pan_no">
                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <label>Driving Licence No <span>:</span></label>
                        </div>
                        <div class="col-7" id="emp_licence_no">
                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <label>Other Id <span>:</span></label>
                        </div>
                        <div class="col-7" id="emp_other_id">
                           
                        </div>
                    </div>
                </div>
              </div>                      
                                

              <!-- Table row -->
              <div class="row box-shadow p-3">
                <div class="col-12 table-responsive">
                    <p class="shadow-headding">Work History</p>
                  <table class="table table-striped" id="employee_profile_work_history_table">
                    <thead>
                    <tr>
                      <th>Branch</th>
                      <th>Department</th>
                      <th>Job Title</th>
                      <th>Pay Scale</th>
                      <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- <tr>
                      <td>Udma</td>
                      <td>Hr</td>
                      <td>Software Developer</td>
                      <td>Senior Developer</td>
                      <td>Partime</td>
                    </tr>
                    <tr>
                      <td>Udma</td>
                      <td>Hr</td>
                      <td>Software Developer</td>
                      <td>Senior Developer</td>
                      <td>Partime</td>
                    </tr>
                    <tr>
                      <td>Udma</td>
                      <td>Hr</td>
                      <td>Software Developer</td>
                      <td>Senior Developer</td>
                      <td>Partime</td>
                    </tr> -->
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row box-shadow p-3">
                <div class="col-12 table-responsive">
                    <p class="shadow-headding">Education</p>
                  <table class="table table-striped" id="employee_education_table">
                  <thead>
                    <tr>
                    <th>Education Name</th>
                      <th>Institute Name</th>
                      <th>Start Date</th>
                      <th>Completed Date</th>
                      <th>Score Grade</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- <tr>
                      <td>MCA</td>
                      <td>Srinivas University</td>
                      <td>12/10/20</td>
                      <td>10/11/21</td>
                      <td>A+</td>
                    </tr>
                    <tr>
                      <td>BCA</td>
                      <td>Srinivas University</td>
                      <td>12/10/20</td>
                      <td>10/11/21</td>
                      <td>A+</td>
                    </tr>
                    <tr>
                      <td>Plus Two </td>
                      <td>Srinivas University</td>
                      <td>12/10/20</td>
                      <td>10/11/21</td>
                      <td>A+</td>
                    </tr>
                    <tr>
                      <td>SSLC </td>
                      <td>Srinivas University</td>
                      <td>12/10/20</td>
                      <td>10/11/21</td>
                      <td>A+</td>
                    </tr> -->
                    
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row box-shadow p-3">
                <div class="col-12 table-responsive">
                    <p class="shadow-headding">Certificate</p>
                  <table class="table table-striped" id="employee_certificate_table">
                  <thead>
                    <tr>
                        <th>Certificate Name</th>
                        <th>Institute Name</th>
                        <th>Date Issued</th>
                        <th>Date Valid Till</th>
                        <th>Score Grade</th>
                    </tr>
                    </thead>
                    <tbody>
                   
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- Table row -->
              <div class="row box-shadow p-3">
                <div class="col-12 table-responsive">
                    <p class="shadow-headding">Language </p>
                  <table class="table table-striped"  id="employee_language_table"> 
                  <thead>
                    <tr>
                       <th>Language Known</th>
                      <th>Reading Proficiency</th>
                      <th>Speaking Proficiency</th>
                      <th>Writing Proficiency</th>
                      <th>ListiningProficiency</th>
                    </tr>
                    </thead>
                    <tbody>
 
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- Table row -->
              <div class="row box-shadow p-3">
                <div class="col-12 table-responsive">
                    <p class="shadow-headding">Dependents </p>
                  <table class="table table-striped" id="employee_dependents_table">
                  <thead>
                    <tr>
                    <th>Dependent Name</th>
                      <th>Relation</th>
                      <th>DoB</th>
                      <th>Adhar No</th>
                      <th>Passport No</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- <tr>
                      <td>Vaishakh</td>
                      <td>Friend</td>
                      <td>04/06/199</td>
                      <td>39309287389389</td>
                      <td>U2712345</td>
                      
                    </tr>
                    <tr>
                      <td>Vaishakh</td>
                      <td>Friend</td>
                      <td>04/06/199</td>
                      <td>39309287389389</td>
                      <td>U2712345</td>
                      
                    </tr>
                    <tr>
                      <td>Vaishakh</td>
                      <td>Friend</td>
                      <td>04/06/199</td>
                      <td>39309287389389</td>
                      <td>U2712345</td>
                      
                    </tr> -->
                   
                    
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="row box-shadow p-3">
                <div class="col-12  skill_section">
                    <p class="shadow-headding">Skills</p>
                    <ul class="skills-list" id="employee_profile_skill_ul">
                        <!-- <li>Communication skill</li>
                         <li>Team Management</li>
                         <li>Punctuate</li> -->
                    </ul>            
                </div>
              </div>
                

            
              <!-- /.row -->
              <div class="row box-shadow p-3">
                <div class="col-6  skill_section">
                    <p class="shadow-headding">Emergency Contact</p>
                    <div class="row">
                        <div class="col-5">
                            <label>Persone Name <span>:</span></label>
                        </div>
                        <div class="col-7" id="emergency_contact_person_name">
                           
                        </div>
                    </div>       
                    <div class="row">
                        <div class="col-5" >
                            <label>Relation<span>:</span></label>
                        </div>
                        <div class="col-7" id="emergency_contact_relation">
                            Friend
                        </div>
                    </div>       
                    <div class="row">
                        <div class="col-5" >
                            <label>Home No<span>:</span></label>
                        </div>
                        <div class="col-7" id="emergency_person_home_no">
                           
                        </div>
                    </div>       
                    <div class="row">
                        <div class="col-5">
                            <label>Work No<span>:</span></label>
                        </div>
                        <div class="col-7" id="emergency_person_work_no">
                          
                        </div>
                    </div>       
                    <div class="row">
                        <div class="col-5">
                            <label>Mobile No<span>:</span></label>
                        </div>
                        <div class="col-7"  id="emergency_person_mobile_no">
                             
                        </div>
                    </div>       
                </div>
              </div>
                

            
              <!-- /.row -->

              <!-- /.row -->
              <div class="row box-shadow p-3">
                <div class="col-6  bank_section">
                    <p class="shadow-headding">Bank Detais</p>
                    <div class="row">
                        <div class="col-5">
                            <label>Acc No <span>:</span></label>
                        </div>
                        <div class="col-7" id="bank_acc_no">
                           
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-5">
                            <label>Bank Name <span>:</span></label>
                        </div>
                        <div class="col-7" id="bank_name">
                           
                        </div>
                    </div>  
                    
                    
                    <div class="row">
                        <div class="col-5">
                            <label>Branch Name <span>:</span></label>
                        </div>
                        <div class="col-7" id="bank_branch_name">
                           
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-5">
                            <label>IFSC Code <span>:</span></label>
                        </div>
                        <div class="col-7" id="bank_ifsc_code">
                           
                        </div>
                    </div>       
                </div>
              </div>
                

            <input type="hidden" name="emp_hid_id" id="emp_hid_id" value="0">

              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                    <a href="#" id="printButton" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <!-- <button class="btn savebtn" id="generatePDFButton">Generate PDF</button> -->
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
</div>
<!-- ./wrapper -->
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<!-- ./filter modal -->


</body>
</html>


<script>
    var companyId = '<?php echo $_SESSION['company_id_in_hr']; ?>';
    alert(companyId); 
</script>

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
          
        //   return data.first_name + " " + data.last_name;
        return data.employee_number + " "+ data.first_name +" " + data.last_name;
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
            <?php  if($employee_edit=='yes'): ?>
              <a href="#" class="edit" onclick="editEmployee('${row.employee_id}','${row.employment_details_id}');"><i class="fas fa-edit"></i>Edit</a>
              <?php endif;
                            if($employee_view=='yes'): ?>
              <a href="#" class="view" onclick="viewEmployee('${row.employee_id}');"><i class="fas fa-eye"></i>View</a>
              <?php endif;
                            if($employee_delete=='yes'): ?>
              <a href="#" class="delete" onclick="deleteEmployee('${row.employee_id}','${row.employment_details_id}');"><i class="fas fa-trash"></i>Delete</a>
              <?php endif; ?>
              <a href="#" class="print" onclick="printEmployee('${row.employee_id}');"><i class="fas fa-print"></i></a>
            </div>`;
        }
      }
    ],
    "initComplete": function (settings, json) {
      customizeDataTable('employee_data_table');
      

     
      
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
               formData.append('employment_status_id', $("#employee_employment_status_id").val());
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





function fetchEmployeeNames() {
  
    
    $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/get_employee_firstname_lastname",
        type: 'GET', 
        dataType: 'json',
        success: function(data) {
           console.log("fetchEmployeeNames",data)
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
            var dropdown11 = $('#employee_id_employee_skills');
            
            
            
             dropdown1.empty();
             dropdown1.append($('<option></option>').attr('value', '0').text('Not Applicable')); 
             dropdown2.empty();
             dropdown2.append($('<option></option>').attr('value', '0').text('Not Applicable')); 
             
             dropdown3.empty();
             dropdown3.append($('<option></option>').attr('value', '').text('Select Employee')); 
            dropdown4.empty();
            dropdown4.append($('<option></option>').attr('value', '0').text('Not Applicable')); 
            dropdown5.empty();
            dropdown5.append($('<option></option>').attr('value', '').text('Select Employee')); 
             dropdown6.empty();
             dropdown6.append($('<option></option>').attr('value', '0').text('Not Applicable')); 
            dropdown7.empty();
            dropdown7.append($('<option></option>').attr('value', '').text('Select Employee')); 
            dropdown8.empty();
            dropdown8.append($('<option></option>').attr('value', '').text('Select Employee')); 
            dropdown8.append($('<option></option>').attr('value', '0').text('Not Applicable')); 
            dropdown9.empty();
            dropdown9.append($('<option></option>').attr('value', '').text('Select Employee')); 
            dropdown10.empty();
          
            dropdown11.append($('<option></option>').attr('value', '').text('Select Employee')); 
            dropdown11.empty();
            
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
                dropdown11.append($('<option></option>').attr('value', employee.employee_id).text(employee.full_name));
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
            dropdown.append($('<option></option>').attr('value', '0').text('Not Applicable')); 

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
                $("#gender_id").val(response.data.gender_id).trigger('change');
                $("#date_of_birth").val(response.data.date_of_birth);
                $("#nationality_id").val(response.data.nationality_id);
                $("#marital_status_id").val(response.data.marital_status_id).trigger('change');
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
                $("#employee_job_title_id").val(response.data.job_title_id).trigger('change');
                $("#employee_pay_scale_id").val(response.data.pay_scale_id).trigger('change');
                $("#employee_employment_status_id").val(response.data.employment_status_id);
                $("#date_joined").val(response.data.date_joined);
                $("#employee_head_id_in_employee").val(response.data.employee_head_id).trigger('change')

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
    //employee_id
    // alert("Employee Details_id"+employmentDetailsId);
    $("#employment_details_id").val(employmentDetailsId);
    $("#employee_data_table_modal").modal("show");
    $("#row_id").val(row_id);
    flag_id=$("#flag_id").val("1");
   

// $("#nationality_id").val(response.data.nationality_id);
 

   $.ajax({
       url: BASE_URL + "index.php/" + hrController + "/get_employee_details_by_id",
       type: "GET",
       data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val()},
       dataType: "json",
       success: function (response) {
           console.log("response edit is" ,response);
           console.log(response.data.job_title_id);
      
           if (response.success) 
           {
                var departments = response.departments;
                var branches = response.branches;
                var employeeHeads = response.employeeHeads;

                console.log("Departments received:", departments);
                console.log("Branches received:", branches);
                console.log("Employee Head received:",employeeHeads);
                // $('#employee_department_id').empty().append($('<option></option>').val('').text('Select Department'));
                $('#employee_department_id').empty();
                $.each(departments, function(index, department) {
                    $('#employee_department_id').append($('<option></option>').val(department.id).text(department.department_name));
                });

                $('#branch_id_employee').empty();
                $.each(branches, function(index, branch) {
                    $('#branch_id_employee').append($('<option></option>').val(branch.id).text(branch.branch_name));
                });

                // $('#employee_head_id').empty().append($('<option></option>').val('').text('Select Employee Head'));
                $('#employee_head_id').empty();
                $.each(employeeHeads, function(index, employeeHead) {
                $('#employee_head_id_in_employee').append($('<option></option>').val(employeeHead.employee_id).text(employeeHead.employee_name));
            });



                $("#employee_number").val(response.data.employee_number);
                $("#first_name").val(response.data.first_name);
                $("#middle_name").val(response.data.middle_name);
                $("#last_name").val(response.data.last_name);
                // $("#gender_id").val(response.data.gender_id);
                $("#gender_id").val(response.data.gender_id).trigger('change');
                $("#date_of_birth").val(response.data.date_of_birth);
                $("#nationality_id").val(response.data.nationality_id).trigger('change');
                $("#marital_status_id").val(response.data.marital_status_id).trigger('change');
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
                $("#branch_id_employee").val(response.data.branch_id);

                 $("#employee_department_id").val(response.data.department_id);

                 $("#employee_head_id_in_employee").val(response.data.employee_head_id)

              
               
                $("#employee_job_title_id").val(response.data.job_title_id).trigger('change');
                $("#employee_pay_scale_id").val(response.data.pay_scale_id).trigger('change');
                $("#employee_employment_status_id").val(response.data.employment_status_id).trigger('change');
                $("#date_joined").val(response.data.date_joined);
               

                $("#present_state_id").val(response.data.permenent_state_id).trigger('change');
                $("#present_country_id").val(response.data.present_country_id).trigger('change');
                $("#permenent_state_id").val(response.data.permenent_state_id).trigger('change');
                $("#permenent_country_id").val(response.data.permenent_country_id).trigger('change');
               
            
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


$('#employee_data_table_modal').on('shown.bs.modal', function () {

// for remove all option in department if click add button
if($("#flag_id").val()=='0')
    {
          $('#employee_department_id option:not([value=""])').remove();
          $('#employee_head_id_in_employee option:not([value=""])').remove();
          
    }
});


function deleteEmployee(row_id, employmentDetailsId){
   
    if (confirm("Are you sure you want to delete this item?")) {
        $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/delete_employee_by_id",
            type: "POST",
            data: { row_id: row_id, employment_details_id: employmentDetailsId, li_token: token },
            dataType: "json",
            success: function (response) {
                $('#employee_data_table_modal').modal('hide');
                showToast('success', response.message); 
                $('#employee_data_table').DataTable().ajax.reload();
                fetchEmployeeNames(); 
            },
            error: function (xhr, status, error) {
                // Handle error
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
        var filter_employee_id = $("#filter_employee_id_employee option:selected").text(); 
        // alert(filter_employee_id);
        var filter_employee_department = $("#filter_employee_department option:selected").text();
        // alert(filter_employee_department);
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

    // ajax call for branches
    $.ajax({
      url: BASE_URL + "index.php/" + hrController + "/get_branch_details",
        type: 'GET', 
        dataType: 'json',
        success: function (response) {
           
            $('#branch_id_employee').empty();
            

             $('#branch_id_employee').append($('<option></option>').val('').text('Select Branch'));
            $.each(response, function (index, branch) {
              $('#branch_id_employee').append(
                    $('<option></option>').val(branch.id).text(branch.branch_name)
                );
            });
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            console.error(status);
            console.error(error);
            
        }
    });



      // AJAX call to fetch departments based on the selected branch
      $('#branch_id_employee').change(function() {
        var selectedBranchId = $(this).val();

        // alert(selectedBranchId);
            
            $.ajax({
                url: BASE_URL + "index.php/" + hrController + "/get_departments_by_branch",
                type: 'POST',
                dataType: 'json',
                data: { branch_id: selectedBranchId, li_token: token},
                success: function(response) {
                    $('#employee_department_id').empty().append($('<option></option>').val('').text('Select Department'));

                    // Append departments obtained from the AJAX call
                    $.each(response, function(index, department) {
                        $('#employee_department_id').append(
                            $('<option></option>').val(department.id).text(department.department_name)
                        );
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    console.error(status);
                    console.error(error);
                }
            });
       
    });

    // AJAX call to fetch employee_head_id_in_employee based on department_id
$('#employee_department_id').change(function() {
    var selectedDepartmentId = $(this).val();
   
    $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/get_employee_head_name",
        type: 'POST',
        dataType: 'json',
        data: { department_id: selectedDepartmentId,li_token: token },
        success: function(response) {
            var selectEmployeeHead = $('#employee_head_id_in_employee');
           
            selectEmployeeHead.empty().append($('<option></option>').val('').text('Select Employee Head'));

           
            var employeeHeadName = response.employee_head_id_in_employee;

         
            selectEmployeeHead.append($('<option></option>').val(employeeHeadName).text(employeeHeadName));
},
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            console.error(status);
            console.error(error);
        }
    });
});


  // pdf generation

$(document).on("click", "#employee_data_table_export_to_pdf", function() {
 
 $.ajax({
     url: BASE_URL + 'index.php/' + hrController + '/generate_pdf_for_employee_list',
     type: "GET",
     xhrFields: {
         responseType: 'blob' 
     },
     success: function(response) {
       
         var blob = new Blob([response], { type: 'application/pdf' });

       
         var url = URL.createObjectURL(blob);

        
         var a = document.createElement('a');
         a.href = url;
         a.download = 'employee_list.pdf'; 
         document.body.appendChild(a);
         a.click();

        
         URL.revokeObjectURL(url);
         document.body.removeChild(a);
     },
     error: function(xhr, status, error) {
       
     }
 });
});


$("#employee_data_table_add_new").on("click", function() {
    $("#flag_id").val("0");

    var modalId = "#employee_data_table_modal";
    $(modalId).modal("show");

    // Clear text fields
    $(modalId + ' input[type="text"]').val('');
    // Reset select2 dropdowns
    $(modalId + ' select').each(function() {
        if ($(this).hasClass('select2')) {
            $(this).val('').trigger('change');
        }
    });
});

$("#employee_data_table_filter_btn").on("click", function() {

  $("#flag_id").val('0');
   $("#employee_data_table_filter_modal").modal("show");
});


$("#employee_data_table_reset_filter").on("click", function() {

  
     var table = $('#employee_data_table').DataTable();
    var modal = $('#employee_data_table_filter_modal');
    modal.find("select").val("0");
    table.columns().search('');
    table.search('').draw();
  
   
    $(this).hide();

});

function printEmployee(individual_employee_id) {
    $("#emp_hid_id").val(individual_employee_id)
    $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/employee_profile",
        type: 'POST',
        data: { individual_employee_id: individual_employee_id, li_token: token },
        success: function(response) 
        {
      
            console.log(response);
            var empdetails = JSON.parse(response).empdetails;
            var work_history_table_data = JSON.parse(response).work_history_table_data;
           
            

            // Adress
            var PresentAddressContent = `   
                    ${empdetails.present_address_line_1}, ${empdetails.present_address_line_2}, ${empdetails.present_address_line_3}<br>
                    ${empdetails.present_address_line_4}, ${empdetails.present_pin_code}
                    <br>${empdetails.present_state_name}, ${empdetails.present_country_name}
            `;
            var PermenentAddressContent = `   
                    ${empdetails.permenent_address_line_1}, ${empdetails.permenent_address_line_2}, ${empdetails.permenent_address_line_3}<br>
                    ${empdetails.permenent_address_line_4}, ${empdetails.permenent_pin_code}
                    <br>${empdetails.permenent_state_name}, ${empdetails.permenent_country_name}
            `;
               // Concatenate the names with spaces
                var fullName = `${empdetails.first_name} ${empdetails.middle_name} ${empdetails.last_name}`;
                fullName = fullName.toUpperCase();

                var job_title =empdetails.job_title;
                var employee_number =empdetails.employee_number;
                var employee_gender =empdetails.gender;
                var employee_branch =empdetails.branch_name;
                var date_of_birth =empdetails.date_of_birth;
                var department_name =empdetails.department_name;
                var join_date =empdetails.date_joined;
                var work_email =empdetails.work_email;
                var work_phone =empdetails.work_phone;
                var email =empdetails.private_email;
                var phone_number =empdetails.mobile_phone;

                var nationality =empdetails.nationality;
                var adhar_no =empdetails.aadhar_number;
                var passport_no =empdetails.passport_number;
                var pan_no =empdetails.pan_number;
                var d_licence =empdetails.driving_licence_number;
                var other_id =empdetails.other_id_doc;
               
                // Update employee name
                 $('#employee_profile_pdf_modal .employee_name_and_employement h3').text(fullName);
                 $('#employee_profile_pdf_modal .employee_name_and_employement p').text(job_title);
                 $('#employee_profile_pdf_modal .profile-main-content #employee_number').text(employee_number);
                 $('#employee_profile_pdf_modal .profile-main-content #employee_gender').text(employee_gender);
                 $('#employee_profile_pdf_modal .profile-main-content #employee_branch').text(employee_branch);
                 $('#employee_profile_pdf_modal .profile-main-content #employee_date_of_birth').text(date_of_birth);
                 $('#employee_profile_pdf_modal .profile-main-content #employee_department').text(department_name);
                 $('#employee_profile_pdf_modal .profile-main-content #employee_join_date').text(join_date);
                 $('#employee_profile_pdf_modal .profile-main-content #employee_work_email').text(work_email);
                 $('#employee_profile_pdf_modal .profile-main-content #employee_work_phone').text(work_phone);


                 $('#employee_profile_pdf_modal #employee_email').text(email);
                 $('#employee_profile_pdf_modal  #employee_phone_number').text(phone_number);
                 $('#employee_profile_pdf_modal  #emp_nationality').text(nationality);
                 $('#employee_profile_pdf_modal  #emp_adhar_no').text(adhar_no);
                 $('#employee_profile_pdf_modal  #emp_passport_no').text(passport_no);
                 $('#employee_profile_pdf_modal  #emp_pan_no').text(pan_no);
                 $('#employee_profile_pdf_modal  #emp_licence_no').text(d_licence);
                 $('#employee_profile_pdf_modal  #emp_other_id').text(other_id);
              //bank
               // bank 
               var acc_no =empdetails.account_number;
                var bank_name =empdetails.bank_name;
                var bank_branch_name =empdetails.bank_branch_name;
                var ifsc_code =empdetails.ifsc_code;

                 $('#employee_profile_pdf_modal  #bank_acc_no').text(acc_no);
                 $('#employee_profile_pdf_modal  #bank_name').text(bank_name);
                 $('#employee_profile_pdf_modal  #bank_branch_name').text(bank_branch_name);
                 $('#employee_profile_pdf_modal  #bank_ifsc_code').text(ifsc_code);

                
                //emergency contacts

                var empEmergencyContacts = JSON.parse(response).empEmergencyContacts[0];
                    var employeeEmergencyContact = {
                        contact_person_name: empEmergencyContacts.contact_person_name,
                        relation_with_employee: empEmergencyContacts.relation_with_employee,
                        home_phone: empEmergencyContacts.home_phone,
                        work_phone: empEmergencyContacts.work_phone,
                        mobile_phone: empEmergencyContacts.mobile_phone
                    };

                    

                    $('#employee_profile_pdf_modal #emergency_contact_person_name').text(employeeEmergencyContact.contact_person_name);
                    $('#employee_profile_pdf_modal #emergency_contact_relation').text(employeeEmergencyContact.relation_with_employee);
                    $('#employee_profile_pdf_modal #emergency_person_home_no').text(employeeEmergencyContact.home_phone);
                    $('#employee_profile_pdf_modal #emergency_person_work_no').text(employeeEmergencyContact.work_phone);
                    $('#employee_profile_pdf_modal #emergency_person_mobile_no').text(employeeEmergencyContact.mobile_phone);

                
            
            

            // Update the content inside the div
            $('#employee_profile_pdf_modal #employee_present_address').html(PresentAddressContent);
            $('#employee_profile_pdf_modal #employee_permenent_address').html(PermenentAddressContent);
                // work history data table
                var work_history_table_data = JSON.parse(response).work_history_table_data;
                function populateTableWorkHistory(data) 
                {
                   
                    let tableBody = $('#employee_profile_work_history_table tbody');

                    // Clear existing rows
                    tableBody.empty();

                    // Iterate over the data and create rows dynamically
                    data.forEach(item => {
                        let row = $('<tr>');
                        row.append($('<td>').text(item.branch_name));
                        row.append($('<td>').text(item.department_name));
                        row.append($('<td>').text(item.job_title));
                        row.append($('<td>').text(item.pay_scale_name));
                        row.append($('<td>').text(item.employment_status));
                        tableBody.append(row);
                    });
                }


                    // Call the populateTable function with your data
                    populateTableWorkHistory(work_history_table_data);



                var education_table_data = JSON.parse(response).education_table_data;
                function populateTableEducation(data) {
                        console.log("education", work_history_table_data);

                        let tableBody = $('#employee_education_table tbody');

                        // Clear existing rows
                        tableBody.empty();

                        // Iterate over the data and create rows dynamically
                        data.forEach(item => {
                            let row = $('<tr>');
                            row.append($('<td>').text(item.education_name));
                            row.append($('<td>').text(item.institute_name));
                            row.append($('<td>').text(item.start_date));
                            row.append($('<td>').text(item.completed_date));
                            row.append($('<td>').text(item.score_grade));

                            tableBody.append(row);
                        });
                    }



                    // Call the populateTable function with your data
                    populateTableEducation(education_table_data);

                var certification_table_data = JSON.parse(response).certification_table_data;
                function populateTableCertification(data) {
                       

                        let tableBody = $('#employee_certificate_table tbody');

                        // Clear existing rows
                        tableBody.empty();

                        // Iterate over the data and create rows dynamically
                        data.forEach(item => {
                            let row = $('<tr>');
                            row.append($('<td>').text(item.certification_name));
                            row.append($('<td>').text(item.institute_name));
                            row.append($('<td>').text(item.date_issued));
                            row.append($('<td>').text(item.date_valid_upto));
                            row.append($('<td>').text(item.score_grade));

                            tableBody.append(row);
                        });
                    }
                    // Call the populateTable function with your data
                    populateTableCertification(certification_table_data);


                var language_table_data = JSON.parse(response).language_table_data;
                function populateTableLanguage(data) {
                       

                        let tableBody = $('#employee_language_table tbody');

                        // Clear existing rows
                        tableBody.empty();

                        // Iterate over the data and create rows dynamically
                        data.forEach(item => {
                            let row = $('<tr>');
                            row.append($('<td>').text(item.language_name));
                            row.append($('<td>').text(item.reading_proficiency));
                            row.append($('<td>').text(item.speaking_proficiency));
                            row.append($('<td>').text(item.writing_proficiency));
                            row.append($('<td>').text(item.listening_proficiency));

                            tableBody.append(row);
                        });
                    }
                    // Call the populateTable function with your data
                    populateTableLanguage(language_table_data);

                var dependents_table_data = JSON.parse(response).dependents_table_data;
                function populateDependentsLanguage(data) {
                       

                        let tableBody = $('#employee_dependents_table tbody');

                        // Clear existing rows
                        tableBody.empty();

                        // Iterate over the data and create rows dynamically
                        data.forEach(item => {
                            let row = $('<tr>');
                            row.append($('<td>').text(item.dependent_name));
                            row.append($('<td>').text(item.relation_with_employee));
                            row.append($('<td>').text(item.date_of_birth));
                            row.append($('<td>').text(item.aadhar_number));
                            row.append($('<td>').text(item.passport_number));

                            tableBody.append(row);
                        });
                    }
                    // Call the populateTable function with your data
                    populateDependentsLanguage(dependents_table_data);

                     
                 // get_individual_employee_skills_data
                 var individual_employee_skill = JSON.parse(response).individual_employee_skill;
                 console.log("skill_dats"+individual_employee_skill);
                 var skillsList = document.getElementById('employee_profile_skill_ul');

                    // Clear existing list items
                    skillsList.innerHTML = '';

                    // Iterate through each skill and create LI elements
                    individual_employee_skill.forEach(function(skill) {
                        var listItem = document.createElement('li');
                        listItem.textContent = skill.skill_name;
                        skillsList.appendChild(listItem);
                    });


                
        },
        error: function(error) {
            console.error("AJAX Error:", error);
        }
    });

    // Show the modal
    $('#employee_profile_pdf_modal').modal('show');


    
}


document.getElementById('printButton').addEventListener('click', function() {

// Get the value from the hidden input
var empHidId = document.getElementById('emp_hid_id').value;

// Construct the print URL with the empHidId parameter
var printUrl = '<?php echo base_url()?>hr-management/HrMaster/employee_profile_print/' + empHidId;

// Open a new window with the constructed URL
var printWindow = window.open(printUrl, '_blank');

// Optional: Add additional styling or content to the print window if needed

// Trigger printing
printWindow.print();
});







</script>

