<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Job Details</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <?php include("top-css.php"); ?> 
<style>
    .select-dropdown {
  display: block !important;
  z-index: 999 !important; /* Ensure it's above other elements */
  /* Additional styling as needed */
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
            <div class="combination_datatable" id="company_strucure">
              <!-- tab start here -->
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" id="li_travel_status_tab"data-toggle="tab" href="#travel_status_tab" role="tab"  aria-selected="true">Travel Status</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="li_new_request_travel_tab" data-toggle="tab" href="#new_request_travel_tab" role="tab"  aria-selected="false">New Request</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="li_travel_verified_tab" data-toggle="tab" href="#travel_verified_tab" role="tab"  aria-selected="false">Verified</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="li_travel_approved_tab" data-toggle="tab" href="#travel_approved_tab" role="tab"  aria-selected="false">Approved</a>
                </li>
               
              
              
              </ul>
              <!-- tab end  here -->
              <div class="tab-content">
                   <!--tab 1  ------ -->
                    <div class="tab-pane fade show active" id="travel_status_tab" role="tabpanel" aria-labelledby="home-tab">
                        <?php include("travel_status.php");?>
                    </div>
                  <!-- ./tab1  --- -->
                    <div class="tab-pane fade" id="new_request_travel_tab" role="tabpanel" aria-labelledby="home-tab">
                        <?php include("new_travel_request.php");?>
                    </div>
                  <!-- ./tab1  --- -->
                  <!-- ./tab1  --- -->
                    <div class="tab-pane fade" id="travel_verified_tab" role="tabpanel" aria-labelledby="home-tab">
                        <?php include("travel_request_verified.php");?>
                    </div>
                  <!-- ./tab1  --- -->
                  <!-- ./tab1  --- -->
                    <div class="tab-pane fade" id="travel_approved_tab" role="tabpanel" aria-labelledby="home-tab">
                        <?php include("employee_travel_approved.php");?>
                    </div>
                  <!-- ./tab1  --- -->


                

                 
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
        <input type="hidden" id="flag_id" value="0" >
        <input type="hidden" id="row_id" value="0" >
    </div>
    <?php include("footer.php"); ?> 
</div>
<!-- ./wrapper -->



</body>
</html>
<script>
$(document).ready(function(){
    loadDataTableForTravelStatus();
    loadDataTableForNewTravelRequest();
    loadDataTableForTravelRequestVerified();
     loadDataTableForTravelRequestApproved();

    hideRejectReasonInNewRequest();
    hideRejectReasonInVerifiedRequest();
});
</script>





