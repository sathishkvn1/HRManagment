<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Record Status</title>
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
            <div class="combination_datatable" id="company_strucure">
              <!-- tab start here -->
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" id="li_travel_request_status_tab"data-toggle="tab" href="#travel_request_status_tab" role="tab"  aria-selected="true">Travel Request Status</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="li_loan_request_status_tab" data-toggle="tab" href="#loan_request_status_tab" role="tab"  aria-selected="false">Loan Request Status</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="li_loan_status_tab" data-toggle="tab" href="#loan_status_tab" role="tab"  aria-selected="false">Loan Status</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="li_leave_request_tab" data-toggle="tab" href="#leave_request_tab" role="tab"  aria-selected="false">Leave Request Status</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="li_marital_staus_tab" data-toggle="tab" href="#marital_staus_tab" role="tab"  aria-selected="false">Marital Status</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="li_relation_tab" data-toggle="tab" href="#relation_tab" role="tab"  aria-selected="false">Relation</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="li_gender_tab" data-toggle="tab" href="#gender_tab" role="tab"  aria-selected="false">Gender</a>
                </li>
              
            </ul>
              <!-- tab end  here -->
              <div class="tab-content">
                   <!--tab 1  ------ -->
                    <div class="tab-pane fade show active" id="travel_request_status_tab" role="tabpanel" aria-labelledby="home-tab">
                        <!-- --- discription ---- -->
                            <div id="company_structure_table_top" class="reviewBlock">
                            <div class="ant-card ant-card-bordered ant-card-small" style="width: 100%;">
            
                                <div class="ant-card-head">
                            
                                    <div class="name">
                                    Travel Request 
                                    </div>
                                    <div class="moreinfo">
                                        <a href="#">More Info</a>
                                    </div>
                                </div>
                                <div class="ant-card-body">
                                <div class="ant-card-meta">
                                    <div class="ant-card-meta-detail">
                                    <div class="ant-card-meta-description">
                                        Here you can manage the job titles in your organisation . Each employee needs to assigned a job title.
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                            <!-- --- ./discription ---- -->
            
                        <!--for loading CompanyStructure DataTable -->
                            <table id="travel_request_status_data_table" class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Travel Request Status</th>
                               
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


                    <!--tab 2   ------ -->
                    <div class="tab-pane fade" id="loan_request_status_tab" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- --- discription ---- -->
                        <div id="company_structure_table_top" class="reviewBlock">
                            <div class="ant-card ant-card-bordered ant-card-small" style="width: 100%;">

                                <div class="ant-card-head">
                    
                                    <div class="name">
                                    Loan Request Status
                                    </div>
                                    <div class="moreinfo">
                                        <a href="#">More Info</a>
                                    </div>
                                </div>
                                <div class="ant-card-body">
                                <div class="ant-card-meta">
                                    <div class="ant-card-meta-detail">
                                    <div class="ant-card-meta-description">
                                        Here you can define the different pay Scales in your organization.
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- --- ./discription ---- -->
                        <!-- table  -->
                        <table id="loan_request_status_data_table" class="table table-striped">
                        <thead>
                            <tr>      
                                    <th>Id</th>
                                    <th>LoanRequestStatus</th>
                                    
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                               
                                
                            </tr>
                        </tbody>
                        </table>
                        <!-- ./ table start -->
                    </div>
                    <!--  ./ tab 2-->

                    <!--tab 3  ------ -->
                    <div class="tab-pane fade" id="loan_status_tab" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- --- discription ---- -->
                        <div id="company_structure_table_top" class="reviewBlock">
                            <div class="ant-card ant-card-bordered ant-card-small" style="width: 100%;">

                                <div class="ant-card-head">
                    
                                    <div class="name">
                                    Loan Status
                                    </div>
                                    <div class="moreinfo">
                                        <a href="#">More Info</a>
                                    </div>
                                </div>
                                <div class="ant-card-body">
                                <div class="ant-card-meta">
                                    <div class="ant-card-meta-detail">
                                    <div class="ant-card-meta-description">
                                        Here you can define the different pay Scales in your organization.
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- --- ./discription ---- -->
                        <!-- table  -->
                        <table id="loan_status_data_table" class="table table-striped">
                        <thead>
                            <tr>      
                                    <th>Id</th>
                                    <th>Loan Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                               
                                
                            </tr>
                        </tbody>
                        </table>
                        <!-- ./ table start -->
                    </div>
                    <!--  ./ tab 3-->

                      <!--tab 4  ------ -->
                      <div class="tab-pane fade" id="leave_request_tab" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- --- discription ---- -->
                        <div id="company_structure_table_top" class="reviewBlock">
                            <div class="ant-card ant-card-bordered ant-card-small" style="width: 100%;">

                                <div class="ant-card-head">
                    
                                    <div class="name">
                                    Leave Request Status
                                    </div>
                                    <div class="moreinfo">
                                        <a href="#">More Info</a>
                                    </div>
                                </div>
                                <div class="ant-card-body">
                                <div class="ant-card-meta">
                                    <div class="ant-card-meta-detail">
                                    <div class="ant-card-meta-description">
                                        Here you can define the different pay Scales in your organization.
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- --- ./discription ---- -->
                        <!-- table  -->
                        <table id="leave_request_status_data_table" class="table table-striped">
                        <thead>
                            <tr>      
                                    <th>Id</th>
                                    <th>Leave Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                               
                                
                            </tr>
                        </tbody>
                        </table>
                        <!-- ./ table start -->
                    </div>
                    <!--  ./ tab 4-->

                    <!--tab 5 ------ -->
                    <div class="tab-pane fade" id="marital_staus_tab" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- --- discription ---- -->
                        <div id="company_structure_table_top" class="reviewBlock">
                            <div class="ant-card ant-card-bordered ant-card-small" style="width: 100%;">

                                <div class="ant-card-head">
                    
                                    <div class="name">
                                    Marital Status
                                    </div>
                                    <div class="moreinfo">
                                        <a href="#">More Info</a>
                                    </div>
                                </div>
                                <div class="ant-card-body">
                                <div class="ant-card-meta">
                                    <div class="ant-card-meta-detail">
                                    <div class="ant-card-meta-description">
                                        Here you can define the different pay Scales in your organization.
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- --- ./discription ---- -->
                        <!-- table  -->
                        <table id="marital_status_data_table" class="table table-striped">
                        <thead>
                            <tr>      
                                    <th>Id</th>
                                    <th>Marital Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                               
                                
                            </tr>
                        </tbody>
                        </table>
                        <!-- ./ table start -->
                    </div>
                    <!--  ./ tab 5-->
                       <!--tab 6  ------ -->
                       <div class="tab-pane fade" id="relation_tab" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- --- discription ---- -->
                        <div id="company_structure_table_top" class="reviewBlock">
                            <div class="ant-card ant-card-bordered ant-card-small" style="width: 100%;">

                                <div class="ant-card-head">
                    
                                    <div class="name">
                                   Relation
                                    </div>
                                    <div class="moreinfo">
                                        <a href="#">More Info</a>
                                    </div>
                                </div>
                                <div class="ant-card-body">
                                <div class="ant-card-meta">
                                    <div class="ant-card-meta-detail">
                                    <div class="ant-card-meta-description">
                                        Here you can define the different pay Scales in your organization.
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- --- ./discription ---- -->
                        <!-- table  -->
                        <table id="relation_data_table" class="table table-striped">
                        <thead>
                            <tr>      
                                    <th>Id</th>
                                    <th>Relation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                               
                                
                            </tr>
                        </tbody>
                        </table>
                        <!-- ./ table start -->
                    </div>
                    <!--  ./ tab 6-->
                       <!--tab 7  ------ -->
                       <div class="tab-pane fade" id="gender_tab" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- --- discription ---- -->
                        <div id="company_structure_table_top" class="reviewBlock">
                            <div class="ant-card ant-card-bordered ant-card-small" style="width: 100%;">

                                <div class="ant-card-head">
                    
                                    <div class="name">
                                  Gender
                                    </div>
                                    <div class="moreinfo">
                                        <a href="#">More Info</a>
                                    </div>
                                </div>
                                <div class="ant-card-body">
                                <div class="ant-card-meta">
                                    <div class="ant-card-meta-detail">
                                    <div class="ant-card-meta-description">
                                        Here you can define the different pay Scales in your organization.
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- --- ./discription ---- -->
                        <!-- table  -->
                        <table id="gender_data_table" class="table table-striped">
                        <thead>
                            <tr>      
                                    <th>Id</th>
                                    <th>Gender</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                               
                                
                            </tr>
                        </tbody>
                        </table>
                        <!-- ./ table start -->
                    </div>
                    <!--  ./ tab 7-->
                  
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
     <!-- ./ footer -->


</div>
<!-- ./wrapper -->


<?php include("bottom-js.php"); ?> 
</body>
</html>

<!-- <script>
  $(document).ready( function () {
    $('#travel_request_status_data_table').DataTable();
    customizeDataTable('travel_request_status_data_table');
  });
 
 
</script> -->
<script>
       var BASE_URL = "<?php echo base_url(); ?>";
    var hrController = "<?php echo CONTROLLER_HR; ?>";

    var token = "<?php echo $_SESSION['li_token']; ?>";

   
    $(document).ready(function() {
    $('#travel_request_status_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" + hrController + "/get_travel_request_status",
            "type": "POST",
            "dataType": "json",
            "dataSrc": "data",
            "data": {
                "li_token": token
            },
            "error": function(xhr, textStatus, error) {
                console.error("Error loading data:", error);
            }
        },
        "columns": [
            { "data": "id" },
            { "data": "travel_request_status" },
        ],
        "createdRow": function(row, data, dataIndex) {
            $(row).addClass("clickable-row");
        },
        "initComplete": function(settings, json) {
            customizeDataTable('travel_request_status_data_table');
        }
    });

    // Hide the element with class "travel_request_status_data_table_add_new"
    $('.travel_request_status_data_table_add_new').hide();
});

// secod datatable

    $(document).ready(function() {
    $('#loan_request_status_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" + hrController + "/get_loan_request_status",
            "type": "POST",
            "dataType": "json",
            "dataSrc": "data",
            "data": {
                "li_token": token
            },
            "error": function(xhr, textStatus, error) {
                console.error("Error loading data:", error);
            }
        },
        "columns": [
            { "data": "id" },
            { "data": "loan_request_status" },
        ],
        "createdRow": function(row, data, dataIndex) {
            $(row).addClass("clickable-row");
        },
        "initComplete": function(settings, json) {
            customizeDataTable('loan_request_status_data_table');
        }
    });

    // Hide the element with class "travel_request_status_data_table_add_new"
    // $('.travel_request_status_data_table_add_new').hide();
});
// Third datatable

    $(document).ready(function() {
    $('#loan_status_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" + hrController + "/get_loan_status",
            "type": "POST",
            "dataType": "json",
            "dataSrc": "data",
            "data": {
                "li_token": token
            },
            "error": function(xhr, textStatus, error) {
                console.error("Error loading data:", error);
            }
        },
        "columns": [
            { "data": "id" },
            { "data": "loan_status" },
        ],
        "createdRow": function(row, data, dataIndex) {
            $(row).addClass("clickable-row");
        },
        "initComplete": function(settings, json) {
            customizeDataTable('loan_status_data_table');
        }
    });


});

// forth datatable

$(document).ready(function() {
    $('#leave_request_status_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" + hrController + "/get_leave_request_status",
            "type": "POST",
            "dataType": "json",
            "dataSrc": "data",
            "data": {
                "li_token": token
            },
            "error": function(xhr, textStatus, error) {
                console.error("Error loading data:", error);
            }
        },
        "columns": [
            { "data": "id" },
            { "data": "leave_request_status" },
        ],
        "createdRow": function(row, data, dataIndex) {
            $(row).addClass("clickable-row");
        },
        "initComplete": function(settings, json) {
            customizeDataTable('leave_request_status_data_table');
        }
    });
    
});


// fifth datatable

$(document).ready(function() {
    $('#marital_status_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" + hrController + "/get_marital_status_status",
            "type": "POST",
            "dataType": "json",
            "dataSrc": "data",
            "data": {
                "li_token": token
            },
            "error": function(xhr, textStatus, error) {
                console.error("Error loading data:", error);
            }
        },
        "columns": [
            { "data": "id" },
            { "data": "marital_status" },
        ],
        "createdRow": function(row, data, dataIndex) {
            $(row).addClass("clickable-row");
        },
        "initComplete": function(settings, json) {
            customizeDataTable('marital_status_data_table');
        }
    });

});

// sixth datatable

$(document).ready(function() {
    $('#relation_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" + hrController + "/get_relation",
            "type": "POST",
            "dataType": "json",
            "dataSrc": "data",
            "data": {
                "li_token": token
            },
            "error": function(xhr, textStatus, error) {
                console.error("Error loading data:", error);
            }
        },
        "columns": [
            { "data": "id" },
            { "data": "relation" },
        ],
        "createdRow": function(row, data, dataIndex) {
            $(row).addClass("clickable-row");
        },
        "initComplete": function(settings, json) {
            customizeDataTable('relation_data_table');
        }
    });

});

// seventh datatable

$(document).ready(function() {
    $('#gender_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" + hrController + "/get_gender",
            "type": "POST",
            "dataType": "json",
            "dataSrc": "data",
            "data": {
                "li_token": token
            },
            "error": function(xhr, textStatus, error) {
                console.error("Error loading data:", error);
            }
        },
        "columns": [
            { "data": "id" },
            { "data": "gender" },
        ],
        "createdRow": function(row, data, dataIndex) {
            $(row).addClass("clickable-row");
        },
        "initComplete": function(settings, json) {
            customizeDataTable('gender_data_table');
        }
    });

});





</script>