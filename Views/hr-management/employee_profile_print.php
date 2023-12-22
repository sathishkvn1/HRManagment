<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BrqSales</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->
  <?php include("top-css.php"); ?> 

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    .brq-payroll .print-page-profile .name-container
    {
      position: relative;
    display: inline-block;
    width: 100%;
    text-align: center;
    }
    .brq-payroll .print-page-profile .name-text
    {
      font-size: 24px;
      color: #333;
      margin: 0;
      display: inline-block;
      position: relative;
      z-index: 1;
      background-color: #ffffff;
      padding: 10px;
      font-weight: 600;
    }
    .brq-payroll .print-page-profile .line
    {
      position: absolute;
      top: 50%;
      left: 0;
     right: 0;
     border-top: 2px solid #ddd;
     z-index: 0;
    }
    .brq-payroll .print-page-profile .box-shadow
    {
      box-shadow: 0px -5px 5px rgba(0, 0, 0, 0.2) !important;
      border-radius: 26px !important;
      margin-top: 50px !important;
      margin-top: 100px !important;
      padding-top: 50px !important;
    }

  </style>
</head>
<body class="brq-payroll">
<div class="wrapper">
  <!-- Main content -->
  
  <!-- /.content -->


  <section class="invoice" style="margin:0px  0px -100px 0px">
        <!-- Main content -->
        <div class="invoice employee_profile_content print-page-profile mb-3" id="print-page-profile" >
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
             <?php
                        if (isset($profile_person_data )): 
                          $emp_number=$profile_person_data->employee_number;              
                          $emp_name=$profile_person_data->first_name." ".$profile_person_data->middle_name." ".$profile_person_data->last_name;              
                          $emp_gender=$profile_person_data->gender;              
                          $emp_dob=$profile_person_data->date_of_birth;              
                          $emp_nationality=$profile_person_data->nationality;              
                          $emp_marital_status=$profile_person_data->marital_status;              
                          $emp_aadhar_number=$profile_person_data->aadhar_number;              
                          $emp_passport_number=$profile_person_data->passport_number;              
                          $emp_pan_number=$profile_person_data->pan_number;              
                          $emp_driving_licence_number=$profile_person_data->driving_licence_number;              
                          $emp_other_id_doc=$profile_person_data->other_id_doc;              
                          $emp_present_address_line_1=$profile_person_data->present_address_line_1;              
                          $emp_present_address_line_2=$profile_person_data->present_address_line_2;              
                          $emp_present_address_line_3=$profile_person_data->present_address_line_3;              
                          $emp_present_address_line_4=$profile_person_data->present_address_line_4;              
                          $emp_present_state_name=$profile_person_data->present_state_name;              
                          $emp_present_country_name=$profile_person_data->present_country_name;              
                          $emp_present_pin_code=$profile_person_data->present_pin_code;              
                          $emp_permenent_address_line_1=$profile_person_data->permenent_address_line_1;              
                          $emp_permenent_address_line_2=$profile_person_data->permenent_address_line_2;              
                          $emp_permenent_address_line_3=$profile_person_data->permenent_address_line_3;              
                          $emp_permenent_address_line_4=$profile_person_data->permenent_address_line_4;              
                          $emp_permenent_state_name=$profile_person_data->permenent_state_name;              
                          $emp_permenent_country_name=$profile_person_data->permenent_country_name;              
                          $permenent_pin_code=$profile_person_data->permenent_pin_code;              
                          $home_phone=$profile_person_data->home_phone;              
                          $mobile_phone=$profile_person_data->mobile_phone;              
                          $work_phone=$profile_person_data->work_phone;              
                          $work_email=$profile_person_data->work_email;              
                          $private_email=$profile_person_data->private_email;              
                          $account_number=$profile_person_data->account_number;              
                          $bank_name=$profile_person_data->bank_name;              
                          $bank_branch_name=$profile_person_data->bank_branch_name;              
                          $ifsc_code=$profile_person_data->ifsc_code;              
                          $branch_name=$profile_person_data->branch_name;              
                          $department_name=$profile_person_data->department_name;              
                          $job_title=$profile_person_data->job_title;              
                          $pay_scale_name=$profile_person_data->pay_scale_name;              
                          $employment_status=$profile_person_data->employment_status;              
                          $date_joined=$profile_person_data->date_joined;              
                          $date_relieved=$profile_person_data->date_relieved;              
                          $employee_head_id=$profile_person_data->employee_head_id;              
                          $employee_head_number=$profile_person_data->employee_head_number;                     
                    ?>
                  <div class="row profile-main-content invoice-info">
                    <div class="col-sm-3 invoice-col">
                      <div class="profile_photo">
                        <img src="<?php echo base_url();?>uploads/hr-management/employee/photos/prof-1.jpg" alt="">
                      </div>

                    </div>
                    <!-- /.col -->
                    <div class="col-sm-9 invoice-col profile_header_right">
                      
                        
                        <div class="employee_name_and_employement">
                          <h3><?php echo $emp_name;?></h3>
                          <P><?php echo $job_title;?> </P>          
                        </div>
                        <div class="row profile_adress">
                            <div class="col-sm-12 invoice-col">
                              
                              <!-- fetching from here -->
                              <div class="row">
                                <div class="col-4">
                                    Employee No <span>:</span>
                                </div>
                                    
                                    <div class="col-8" id="employee_number">
                                        <?php echo $emp_number; ?>
                                    </div>
                              </div>

                              <div class="row">
                                    <div class="col-4">
                                        Gender <span>:</span>
                                    </div>
                                    <div class="col-8" id="employee_gender">
                                       <?php echo $emp_gender; ?>
                                    </div>

                              </div>     
                              <div class="row">
                                    <div class="col-4">
                                    Marital Status<span>:</span>
                                    </div>
                                    <div class="col-8" id="employee_marital_status">
                                       <?php echo $emp_marital_status; ?>
                                    </div>

                              </div>     
                              <div class="row">
                                    <div class="col-4">
                                        Date of Birth <span>:</span>
                                    </div>
                                    <div class="col-8" id="employee_date_of_birth">
                                    
                                        <?php echo $emp_dob; ?>
                                    </div>
                              </div>     
                              <div class="row">
                                    <div class="col-4">
                                        Branch <span>:</span>
                                    </div>
                                    <div class="col-8" id="employee_branch">
                                       <?php echo $branch_name; ?>   
                                    </div>

                              </div>     
                              <div class="row">
                                    <div class="col-4">
                                        Department <span>:</span>
                                    </div>
                                    <div class="col-8" id="employee_department">
                                    <?php echo $department_name; ?>
                                    </div>

                              </div>     
                              <div class="row">
                                    <div class="col-4" >
                                        Join Start Date <span>:</span>
                                    </div>
                                    <div class="col-8" id="employee_join_date">
                                         <?php echo $date_joined; ?>
                                    
                                    </div>

                              </div>     
                              <div class="row">
                                    <div class="col-4" >
                                        Work E-mail <span>:</span>
                                    </div>
                                    <div class="col-8" id="employee_work_email">
                                        <?php echo $work_email; ?>
                                    </div>

                              </div>     
                              <div class="row">
                                    <div class="col-4">
                                        Work Phone <span>:</span>
                                    </div>
                                    <div class="col-8" id="employee_work_phone">
                                         <?php echo $work_phone; ?>
                                    </div>
                              </div> 
                            <!-- ./fetching from here -->  
                                
                            </div>  
                        </div>
                    </div>   
                    
                  </div>
                <?php 
                  endif;
                  ?>
              <!-- /.row -->

              <div class="addresss p-3">   
                    <div class="row first-line">
                        <div class="email col-sm-6">
                                <i class="fas fa-envelope"></i>
                                <span  id="employee_email"> <?php echo $private_email; ?> </span>
                        </div>
                        <div class="phone_no col-sm-6">
                                <i class="fas fa-phone"></i>
                                <span id="employee_phone_number"><?php echo $mobile_phone; ?></span> 
                        </div>
                    </div>
                    <div class="row present_permenent_address">
                        <div class="col-6">                
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i>Present Address</p>
                            <div  class="employee_present_address" id="employee_present_address">
                              <?php 
                                 echo($emp_present_address_line_1 . ', ' .
                                 $emp_present_address_line_2 . ', ' .
                                 $emp_present_address_line_3 . '<br>' .
                                 $emp_present_address_line_4 . ', ' .
                                 $emp_present_pin_code . '<br>' .
                                 $emp_present_state_name . ', ' .
                                 $emp_present_country_name);
                              ?>

                            </div>
                        </div>
                        <div class="col-6">      
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i>Permenant Address</p>
                            <div  class="employee_permenent_address" id="employee_permenent_address"> 
                            <?php 
                                 echo($emp_permenent_address_line_1 . ', ' .
                                  $emp_permenent_address_line_2 . ', ' .
                                  $emp_permenent_address_line_3 . '<br>' .
                                  $emp_permenent_address_line_4 . ', ' .
                                  $permenent_pin_code . '<br>' .
                                 $emp_permenent_state_name . ', ' .
                                 $emp_permenent_country_name);
                              ?>          
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
                             <?php echo $emp_nationality; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <label>Adhar No <span>:</span></label>
                        </div>
                        <div class="col-7"  id="emp_adhar_no">
                           <?php echo $emp_aadhar_number; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <label>Passport No <span>:</span></label>
                        </div>
                        <div class="col-7" id="emp_passport_no">
                           <?php echo $emp_passport_number; ?>  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <label>Pan No <span>:</span></label>
                        </div>
                        <div class="col-7" id="emp_pan_no">
                      
                            <?php echo $emp_pan_number; ?> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <label>Driving Licence No <span>:</span></label>
                        </div>
                        <div class="col-7" id="emp_licence_no">
                            <?php echo $emp_driving_licence_number; ?>
                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <label>Other Id <span>:</span></label>
                        </div>
                        <div class="col-7" id="emp_other_id">
                            <?php echo  $emp_other_id_doc; ?>
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
                    <?php 
                        if(isset($work_history)):
                          foreach($work_history as $row):
                      ?>
                            <tr>
                              <td><?php echo $row->branch_name?></td>
                              <td><?php echo $row->department_name?></td>
                              <td><?php echo $row->job_title?></td>
                              <td><?php echo $row->pay_scale_name?></td>
                              <td><?php echo $row->employment_status?></td>
                            </tr>
                      <?php
                        endforeach;
                         endif;
                      ?>
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
                    <?php 
                        if(isset($education)):
                          foreach($education as $row):
                      ?>
                            <tr>
                              <td><?php echo $row->education_name?></td>
                              <td><?php echo $row->institute_name?></td>
                              <td><?php echo $row->start_date?></td>
                              <td><?php echo $row->completed_date?></td>
                              <td><?php echo $row->score_grade?></td>
                            </tr>
                      <?php
                        endforeach;
                         endif;
                      ?>
                    
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
                          <?php 
                              if(isset($certification)):
                                foreach($certification as $row):
                            ?>
                                  <tr>
                                    <td><?php echo $row->certification_name?></td>
                                    <td><?php echo $row->institute_name?></td>
                                    <td><?php echo $row->date_issued?></td>
                                    <td><?php echo $row->date_valid_upto?></td>
                                    <td><?php echo $row->score_grade?></td>
                                  </tr>
                            <?php
                              endforeach;
                              endif;
                            ?>
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
                    <?php 
                        if(isset($language)):
                          foreach($language as $row):
                      ?>
                            <tr>
                              <td><?php echo $row->language_name?></td>
                              <td><?php echo $row->reading_proficiency?></td>
                              <td><?php echo $row->speaking_proficiency?></td>
                              <td><?php echo $row->writing_proficiency?></td>
                              <td><?php echo $row->listening_proficiency?></td>
                            </tr>
                      <?php
                        endforeach;
                         endif;
                      ?>  
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- Table row -->
              <div class="row box-shadow p-3">
                <div class="col-12 table-responsive">
                    <p class="shadow-headding">Dependents</p>
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
                    <?php 
                        if(isset($dependents)):
                          foreach($dependents as $row):
                      ?>
                            <tr>
                              <td><?php echo $row->dependent_name?></td>
                              <td><?php echo $row->relation_with_employee?></td>
                              <td><?php echo $row->date_of_birth?></td>
                              <td><?php echo $row->aadhar_number?></td>
                              <td><?php echo $row->passport_number?></td>
                            </tr>
                      <?php
                        endforeach;
                         endif;
                      ?>  
                    
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
                         <?php 
                        if(isset($skills)):
                          foreach($skills as $row):
                      ?>
                            <tr>
                               <li><?php echo $row->skill_name?></li>
                            </tr>
                      <?php
                        endforeach;
                         endif;
                      ?>  
                    </ul>            
                </div>
              </div>
                

            
              <!-- /.row -->
             
                      <div class="row box-shadow p-3">
                        <div class="col-6  skill_section">
                            <p class="shadow-headding">Emergency Contact</p>
                            <?php 
                              if(isset($emergency_contact)):
                                foreach($emergency_contact as $row):
                                $person_name=$row->contact_person_name;
                                $relation =$row->relation_with_employee;
                                $home_phone =$row->home_phone;
                                $work_phone =$row->work_phone;
                                $mobile_phone =$row->mobile_phone;
                           ?>
                            <div class="row">
                                <div class="col-5">
                                    <label>Persone Name <span>:</span></label>
                                </div>
                                <div class="col-7" id="emergency_contact_person_name">
                                  <?php echo  $person_name;?>
                                </div>
                            </div>       
                            <div class="row">
                                <div class="col-5" >
                                    <label>Relation<span>:</span></label>
                                </div>
                                <div class="col-7" id="emergency_contact_relation">
                                  <?php echo  $relation;?>
                                </div>
                            </div>       
                            <div class="row">
                                <div class="col-5" >
                                    <label>Home No<span>:</span></label>
                                </div>
                                <div class="col-7" id="emergency_person_home_no">
                                    <?php echo  $home_phone;?>
                                </div>
                            </div>       
                            <div class="row">
                                <div class="col-5">
                                    <label>Work No<span>:</span></label>
                                </div>
                                <div class="col-7" id="emergency_person_work_no">
                                      <?php echo  $work_phone;?>
                                </div>
                            </div>       
                            <div class="row">
                                <div class="col-5">
                                    <label>Mobile No<span>:</span></label>
                                </div>
                                <div class="col-7"  id="emergency_person_mobile_no">
                                    <?php echo  $mobile_phone;?>
                                </div>
                            </div>   
                            <?php 
                                endforeach;
                               endif;
                            ?>    
                        </div>
                      </div>
              
                

            
              <!-- /.row -->

              <!-- /.row -->
              <div class="row box-shadow p-3">
                <div class="col-6  bank_section">
                    <p class="shadow-headding">Bank Detais</p>

                    <?php 
                              if(isset($profile_person_data)):
                               
                                $account_number=$profile_person_data->account_number;              
                               $bank_name=$profile_person_data->bank_name;              
                                $bank_branch_name=$profile_person_data->bank_branch_name;              
                                $ifsc_code=$profile_person_data->ifsc_code;       
                           ?>             

                    <div class="row">
                        <div class="col-5">
                            <label>Acc No <span>:</span></label>
                        </div>
                        <div class="col-7" id="bank_acc_no">
                           <?php echo  $account_number;?>
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-5">
                            <label>Bank Name <span>:</span></label>
                        </div>
                        <div class="col-7" id="bank_name">
                        <?php echo  $bank_name;?>
                        </div>
                    </div>  
                    
                    
                    <div class="row">
                        <div class="col-5">
                            <label>Branch Name <span>:</span></label>
                        </div>
                        <div class="col-7" id="bank_branch_name">
                        <?php echo  $bank_branch_name;?>
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-5">
                            <label>IFSC Code <span>:</span></label>
                        </div>
                        <div class="col-7" id="bank_ifsc_code">
                             <?php echo  $ifsc_code;?>
                        </div>
                    </div> 
                    
                    <?php 
                               endif;
                            ?> 
                </div>
              </div>
                

            
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <!-- <div class="row no-print">
                <div class="col-12">
                  <a href="<?php echo base_url()?>hr-management/HrMaster/invoice-print" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div> -->
            </div>
            <!-- /.invoice -->
  </section>
</div>
<!-- ./wrapper -->


<?php include("bottom-js.php"); ?> 

</body>
</html>

<script type="text/javascript"> 


    window.addEventListener("load", window.print());
</script>
