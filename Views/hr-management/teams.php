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
                            <li class="nav-item">
                                 <a class="nav-link active" id="li_teams_master_tab"data-toggle="tab" href="#teams_master_tab" role="tab" aria-selected="false">Team Master</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="li_employee_team_tab" data-toggle="tab" href="#employee_team_tab" role="tab" aria-selected="false">Employee Team</a>
                            </li>
                        </ul>
                     <!-- ./ tab ul -->
                    <!-- tab end  here -->
                        <div class="tab-content">
                            <!--tab 1  ------ -->
                                <div class="tab-pane fade show active" id="teams_master_tab" role="tabpanel" aria-labelledby="teams_master_tab">
                                    <!-- --- discription ---- -->
                                    <?php include("team_master.php");?>
                                    
                                </div>
                            <!-- ./tab1  --- -->
                            <!--one tab  ------ -->
                                <div class="tab-pane fade" id="employee_team_tab" role="tabpanel" aria-labelledby="employee_team_tab">
                                    <?php include("employee_team_details.php");?>
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



</body>
</html>

<script>
    $(document).ready( function () {
      loadDataTableForTeamMaster();
      loadDataTableForEmployeeTeamDetails();
  });
</script>

