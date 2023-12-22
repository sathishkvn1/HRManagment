<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HR & Payroll</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <?php include("top-css.php"); ?> 

    

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
                                if($tab_item->sub_menu_tab=='Leave Register')
                                {
                                    $employee_add= $tab_item->is_add_new;
                                     $employee_edit= $tab_item->is_edit;
                                     $employee_view= $tab_item->is_view;
                                     $employee_delete= $tab_item->is_delete;
                                    $tab_id='li_employee_leave_register_tab';
                                }
                                else if($tab_item->sub_menu_tab=='Leave New Request')
                                {
                                    $branch_add=$tab_item->is_add_new;
                                     $branch_edit= $tab_item->is_edit;
                                     $branch_view= $tab_item->is_view;
                                     $branch_delete= $tab_item->is_delete;
                                    $tab_id='li_employee_leave_pending_tab';
                                }
                                else if($tab_item->sub_menu_tab=='Leave Verified')
                                {
                                    $skills_add=$tab_item->is_add_new;
                                     $skills_edit= $tab_item->is_edit;
                                     $skills_view= $tab_item->is_view;
                                     $skills_delete= $tab_item->is_delete;
                                    $tab_id='li_employee_leave_verified_tab_tab';
                                }
                                  else if($tab_item->sub_menu_tab=='Leave Approved')
                                {
                                    $language_add=$tab_item->is_add_new;
                                    $language_edit= $tab_item->is_edit;
                                     $language_view= $tab_item->is_view;
                                     $language_delete= $tab_item->is_delete;
                                    $tab_id='li_employee_leave_approved_tab_tab';
                                }
                               
                               
                              ?>
                            <li class="nav-item">
                            <a class="nav-link <?php echo $class;?>" id="<?php echo $tab_id;?>" data-toggle="tab" href="<?php echo $tab_item->page_link ;?>" role="tab" aria-selected="false"><?php echo $tab_item->sub_menu_tab ;?></a>
                            </li>
                            
                             <?php 
                                $is_first='no';
                                endforeach;
                                ?> 

                            <!-- <li class="nav-item">
                                <a class="nav-link active" id="li_employee_leave_register_tab" data-toggle="tab" href="#employee_leave_register_tab" role="tab" aria-selected="false">Leave Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="li_employee_leave_pending_tab" data-toggle="tab" href="#employee_leave_pending_tab" role="tab" aria-selected="false">Leave New Request</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="li_employee_leave_verified_tab_tab" data-toggle="tab" href="#employee_leave_verified_tab" role="tab" aria-selected="false">Leave Verified</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="li_employee_leave_approved_tab_tab" data-toggle="tab" href="#employee_leave_approved_tab" role="tab" aria-selected="false">Leave Approved</a>
                            </li> -->
                        </ul>
                     <!-- ./ tab ul -->
                    <!-- tab end  here -->
                        <div class="tab-content">
                                
                                <!-- one tab  ---->
                                    <div class="tab-pane fade show active" id="employee_leave_register_tab" role="tabpanel" aria-labelledby="employee_team_tab">
                                        <?php include("leave_register.php");?>
                                    </div>
                                <!--./one tab  ------ -->
                                <!-- one tab  ---->
                                    <div class="tab-pane fade" id="employee_leave_pending_tab" role="tabpanel" aria-labelledby="employee_team_tab">
                                        <?php include("new_leave_request.php");?>
                                    </div>
                                <!--./one tab  ------ -->
                                <!-- one tab  ---->
                                    <div class="tab-pane fade" id="employee_leave_verified_tab" role="tabpanel" aria-labelledby="employee_team_tab">
                                        <?php include("leave_verified.php");?>
                                    </div>
                                <!--./one tab  ------ -->
                                <!-- one tab  ---->
                                    <div class="tab-pane fade" id="employee_leave_approved_tab" role="tabpanel" aria-labelledby="employee_team_tab">
                                        <?php include("leave_approved.php");?>
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
        <input type="text" id="flag_id" value="0" >
        <input type="text" id="row_id" value="0" >
    </div>


     <?php include("footer.php"); ?> 
     <!-- ./ footer -->
</div>
<!-- ./wrapper -->



</body>
</html>

<script>
  $(document).ready(function() {
    // loadDataTableForLeaveRegister();
    // loadDataTableForNewLeaveRequest();
    // loadDataTableForLeaveVerified();
    // loadDataTableForLeaveapproved();
    hideRejectReasonInNewRequest();
    $("#leave_register_table_reset_filter").hide();
});

</script>