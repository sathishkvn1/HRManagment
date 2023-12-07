<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Assets</title>
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
                  <a class="nav-link active" id="li_group_tab"data-toggle="tab" href="#group_tab_tab" role="tab"  aria-selected="true">Group</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="li_category_tab" data-toggle="tab" href="#category_tab" role="tab"  aria-selected="false">Category</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="li_status_tab" data-toggle="tab" href="#status_tab" role="tab"  aria-selected="false">Status</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="li_return_reason_tab" data-toggle="tab" href="#return_reason_tab" role="tab"  aria-selected="false">Return Reason</a>
                </li>
              
              
              </ul>
              <!-- tab end  here -->
              <div class="tab-content">
                   <!--tab 1  ------ -->
                    <div class="tab-pane fade show active" id="group_tab_tab" role="tabpanel" aria-labelledby="home-tab">
                        <!-- --- discription ---- -->
                            <div id="company_structure_table_top" class="reviewBlock">
                            <div class="ant-card ant-card-bordered ant-card-small" style="width: 100%;">
            
                                <div class="ant-card-head">
                            
                                    <div class="name">
                                    Group
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
                            <table id="asset_group_data_table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Group Name</th>
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


                    <!--tab 2   ------ -->
                    <div class="tab-pane fade" id="category_tab" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- --- discription ---- -->
                        <div id="company_structure_table_top" class="reviewBlock">
                            <div class="ant-card ant-card-bordered ant-card-small" style="width: 100%;">

                                <div class="ant-card-head">
                    
                                    <div class="name">
                                     Category
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
                        <table id="category_data_table" class="table table-striped">
                        <thead>
                            <tr>      
                                    <th>Id</th>
                                    <th>Category Name</th>
                                    <th>Operations</th>
                                    
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
                    <div class="tab-pane fade" id="status_tab" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- --- discription ---- -->
                        <div id="company_structure_table_top" class="reviewBlock">
                            <div class="ant-card ant-card-bordered ant-card-small" style="width: 100%;">

                                <div class="ant-card-head">
                    
                                    <div class="name">
                                        Status
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
                        <table id="status_data_table" class="table table-striped">
                        <thead>
                            <tr>      
                                    <th>Id</th>
                                    <th>Asset Status</th>
                   
                                   
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
                       <div class="tab-pane fade" id="return_reason_tab" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- --- discription ---- -->
                        <div id="company_structure_table_top" class="reviewBlock">
                            <div class="ant-card ant-card-bordered ant-card-small" style="width: 100%;">

                                <div class="ant-card-head">
                    
                                    <div class="name">
                                        Return Reason
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
                        <table id="return_reason_data_table" class="table table-striped">
                        <thead>
                            <tr>      
                                    <th>Id</th>
                                    <th>Return Reason</th>
                                    <th>Operation</th>
                   
                                   
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





    

     <!-- modal for job title -->
      <div class="modal fade data-table-modal" id="asset_group_data_table_modal"   data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Asset Group</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="asset_modal_form" class="modal_form">
                    <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Group Name</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="asset_group_name" name="asset_group_name">
                      <span class="error-message"></span>
                    </div>
                  </div>
                 <!-- ./ one field ---- -->                              
                                   

                
                                     

               
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="btn_job_title_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="btn_group_save"><i class="fas fa-calendar-check"></i>Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
     <!-- /.  modal for job title-->


 <!-- modal for pay  scale -->
    <div class="modal fade data-table-modal" id="category_data_table_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Leave Category</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="category_modal_form" class="modal_form">
                    <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required"> Category Name</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="asset_category_name" name="asset_category_name">
                    </div>
                  </div>
                     <!-- ./ one field ---- -->                              
                             

              

               
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="btn_pay_scales_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="btn_category_save"><i class="fas fa-calendar-check"></i>Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /.modal for company department-->











   <!-- modal employement -->
   <div class="modal fade data-table-modal" id="return_reason_data_table_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Return Reason</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="return_reason_form" class="modal_form">
                    <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Return Reason</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="asset_return_reason" name="asset_return_reason">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->  
                                             
              

           
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="btn_employment_status_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="btn_return_reason_save"><i class="fas fa-calendar-check"></i>Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
     <!-- /.modal for company department-->
</div>
<!-- ./wrapper -->


<?php include("bottom-js.php"); ?> 
</body>
</html>
<script>
    var BASE_URL = "<?php echo base_url(); ?>";
    var hrController = "<?php echo CONTROLLER_HR; ?>";

    var token = "<?php echo $_SESSION['li_token']; ?>";

    $("#li_category_tab").on("click",()=>{
    if (!$.fn.DataTable.isDataTable('#category_data_table')) {
      loadDataTableForCategory();
   }
   
  });

  $("#li_return_reason_tab").on("click",()=>{
    if (!$.fn.DataTable.isDataTable('#return_reason_data_table')) {
      loadDataTableForReturnReason();
   }
       
  });
  


    $(document).ready(function() {
    $('#status_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" + hrController + "/get_status",
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
            { "data": "asset_status" },
        ],
        "createdRow": function(row, data, dataIndex) {
            $(row).addClass("clickable-row");
        },
        "initComplete": function(settings, json) {
            customizeDataTable('status_data_table');
        }
    });

    loadDataTableForGroup();
});

function loadDataTableForGroup() {
    $('#asset_group_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" + hrController + "/get_group_details",
            "dataSrc": "data"
        },
        "columns": [
            { data: "id" },
            { data: "asset_group_name" },
            {
                data: "id",
                render: function (data, type, row) {
                    return `
                        <div class="operations"> 
                            <a href="#" class="edit" onclick="editGroup('${data}');"><i class="fas fa-edit"></i>Edit</a>
                            <a href="#" class="view" onclick="viewGroup('${data}');"><i class="fas fa-eye"></i>View</a>
                            <a href="#" class="delete"  onclick="deleteGroup('${data}');"><i class="fas fa-trash"></i>Delete</a>
                        </div>`;
                }
            }
        ],
        "initComplete": function (settings, json) {
            // console.log("Data received:", json);
            customizeDataTable('asset_group_data_table');
        }
    });
}





$('#asset_modal_form').validate({
  rules: {
                    asset_group_name: {
                        required: true,
                    },
                    
                },
                messages: {
                    asset_group_name: "Please enter this field"
                  
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


$("#btn_group_save").click (function(){
  if ($('#asset_modal_form').valid()) {
          var formData  = new FormData();
          formData.append('asset_group_name', $("#asset_group_name").val());
          formData.append('flag_id', $("#flag_id").val()); 
          formData.append('row_id', $("#row_id").val()); 
          formData.append('li_token', token); 
         $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/save_group_details",
            type: 'POST',
            data:  formData,
            dataType: "JSON",
            processData: false,
            contentType: false,
            success: function(response) {
              console.log("response",response);

              $('#asset_group_data_table_modal').modal('hide');
              $('#asset_group_data_table').DataTable().ajax.reload();
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

function viewGroup(row_id) 
 {
 
    $.ajax({
        type: 'GET',
        url: BASE_URL + "index.php/" + hrController + "/get_group_by_id",
        data: { row_id: row_id },
        dataType: 'json',
        success: function(response) {
            if (response) {
                console.log(response);
                $('#asset_group_data_table_modal').modal('show');
                $("#asset_group_name").val(response.data.asset_group_name);
              
                var disable_data_skills = $("#asset_group_data_table_modal, #asset_group_name");
                disable_data_skills.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
               $(".modal-footer .savebtn").hide();
               
                $("#asset_group_data_table_modal").on("hidden.bs.modal", function () 
                {
                    $(".modal-footer .savebtn").show();
                    disable_data_skills.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
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

function deleteGroup(row_id) {

if (confirm("Are you sure you want to delete ?")) {
    $.ajax({
        type: 'POST',
        url: BASE_URL + "index.php/" + hrController + "/delete_group_by_id",
        data: { row_id: row_id, li_token: token },
        dataType: 'json',
        success: function (response) {
            if (response && response.success) {
              showToast('success', response.message); 
                
                $('#asset_group_data_table').DataTable().ajax.reload();
            } else {
                alert("Error deleting department.");
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr, status, error);
        }
    });
}
}

function editGroup(row_id) {
 
 $("#row_id").val(row_id);

  flag_id=$("#flag_id").val("1");
  $('#asset_group_data_table_modal').modal('show');

 $.ajax({
     url: BASE_URL + "index.php/" + hrController + "/get_group_by_id",
     type: "GET",
     data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val() },
     dataType: "json",
     success: function (response) {
          console.log("response is" ,response);
         if (response.success) {
          $('#asset_group_data_table_modal').modal('show');
          $("#asset_group_name").val(response.data.asset_group_name);

         } else {
             alert("Failed.");
         }
     },
     error: function (xhr, status, error) {
         alert("Error in fetching .");
     }
 });
}

function loadDataTableForCategory() {

    $('#category_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" + hrController + "/get_category_details",
            "dataSrc": "data"
        },
        "columns": [
            { data: "id" },
            { data: "asset_category_name" },
            {
                data: "id",
                render: function (data, type, row) {
                    return `
                        <div class="operations"> 
                            <a href="#" class="edit" onclick="editCategory('${data}');"><i class="fas fa-edit"></i>Edit</a>
                            <a href="#" class="view" onclick="viewCategory('${data}');"><i class="fas fa-eye"></i>View</a>
                            <a href="#" class="delete"  onclick="deleteCategory('${data}');"><i class="fas fa-trash"></i>Delete</a>
                        </div>`;
                }
            }
        ],
        "initComplete": function (settings, json) {
            console.log("Data received:", json);
            customizeDataTable('category_data_table');
        }
    });
}

$('#category_modal_form').validate({
  rules: {
                asset_category_name: {
                        required: true,
                    },
                    
                },
                messages: {
                    asset_category_name: "Please enter this field"
                  
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


$("#btn_category_save").click (function(){
  if ($('#category_modal_form').valid()) {
          var formData  = new FormData();
          formData.append('asset_category_name', $("#asset_category_name").val());
          formData.append('flag_id', $("#flag_id").val()); 
          formData.append('row_id', $("#row_id").val()); 
          formData.append('li_token', token); 
         $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/save_category_details",
            type: 'POST',
            data:  formData,
            dataType: "JSON",
            processData: false,
            contentType: false,
            success: function(response) {
              console.log("response",response);

              $('#category_data_table_modal').modal('hide');
              $('#category_data_table').DataTable().ajax.reload();
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

function viewCategory(row_id) 
 {
 
    $.ajax({
        type: 'GET',
        url: BASE_URL + "index.php/" + hrController + "/get_category_by_id",
        data: { row_id: row_id },
        dataType: 'json',
        success: function(response) {
            if (response) {
                console.log(response);
                $('#category_data_table_modal').modal('show');
                $("#asset_category_name").val(response.data.asset_category_name);
              
                var disable_data_skills = $("#category_data_table_modal, #asset_category_name");
                disable_data_skills.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
               $(".modal-footer .savebtn").hide();
               
                $("#category_data_table_modal").on("hidden.bs.modal", function () 
                {
                    $(".modal-footer .savebtn").show();
                    disable_data_skills.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
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

function deleteCategory(row_id) {

if (confirm("Are you sure you want to delete ?")) {
    $.ajax({
        type: 'POST',
        url: BASE_URL + "index.php/" + hrController + "/delete_category_by_id",
        data: { row_id: row_id, li_token: token },
        dataType: 'json',
        success: function (response) {
            if (response && response.success) {
              showToast('success', response.message); 
                
                $('#category_data_table').DataTable().ajax.reload();
            } else {
                alert("Error deleting department.");
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr, status, error);
        }
    });
}
} 

function editCategory(row_id) {
 
 $("#row_id").val(row_id);

  flag_id=$("#flag_id").val("1");
  $('#category_data_table_modal').modal('show');

 $.ajax({
     url: BASE_URL + "index.php/" + hrController + "/get_category_by_id",
     type: "GET",
     data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val() },
     dataType: "json",
     success: function (response) {
          console.log("response is" ,response);
         if (response.success) {
          $('#category_data_table_modal').modal('show');
          $("#asset_category_name").val(response.data.asset_category_name);

         } else {
             alert("Failed.");
         }
     },
     error: function (xhr, status, error) {
         alert("Error in fetching .");
     }
 });
}

function loadDataTableForReturnReason() {


$('#return_reason_data_table').DataTable({
    "ajax": {
        "url": BASE_URL + "index.php/" + hrController + "/get_return_details",
        "dataSrc": "data"
    },
    "columns": [
        { data: "id" },
        { data: "asset_return_reason"},
        
        {
            data: "id",
            render: function (data, type, row) {
                return `
                    <div class="operations"> 
                        <a href="#" class="edit" onclick="editReturnReason('${data}');"><i class="fas fa-edit"></i>Edit</a>
                        <a href="#" class="view" onclick="viewReturnReason('${data}');"><i class="fas fa-eye"></i>View</a>
                        <a href="#" class="delete"  onclick="deleteReturnReason('${data}');"><i class="fas fa-trash"></i>Delete</a>
                    </div>`;
            }
        }
    ],
    "initComplete": function (settings, json) {
        // console.log("Data received:", json);
         customizeDataTable('return_reason_data_table');
    }
});
}

$('#return_reason_form').validate({
  rules: {
                asset_return_reason: {
                        required: true,
                    },
                    
                },
                messages: {
                    asset_return_reason: "Please enter this field"
                  
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


$("#btn_return_reason_save").click (function(){
  if ($('#return_reason_form').valid()) {
          var formData  = new FormData();
          formData.append('asset_return_reason', $("#asset_return_reason").val());
          formData.append('flag_id', $("#flag_id").val()); 
          formData.append('row_id', $("#row_id").val()); 
          formData.append('li_token', token); 
         $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/save_return_details",
            type: 'POST',
            data:  formData,
            dataType: "JSON",
            processData: false,
            contentType: false,
            success: function(response) {
              console.log("response",response);

              $('#return_reason_data_table_modal').modal('hide');
              $('#return_reason_data_table').DataTable().ajax.reload();
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


function viewReturnReason(row_id) 
 {
 
    $.ajax({
        type: 'GET',
        url: BASE_URL + "index.php/" + hrController + "/get_return_reason_by_id",
        data: { row_id: row_id },
        dataType: 'json',
        success: function(response) {
            if (response) {
                console.log(response);
                $('#return_reason_data_table_modal').modal('show');
                $("#asset_return_reason").val(response.data.asset_return_reason);
              
                var disable_data_skills = $("#return_reason_data_table_modal, #asset_return_reason");
                disable_data_skills.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
               $(".modal-footer .savebtn").hide();
               
                $("#return_reason_data_table_modal").on("hidden.bs.modal", function () 
                {
                    $(".modal-footer .savebtn").show();
                    disable_data_skills.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
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
function deleteReturnReason(row_id) {

if (confirm("Are you sure you want to delete ?")) {
    $.ajax({
        type: 'POST',
        url: BASE_URL + "index.php/" + hrController + "/delete_return_reason_by_id",
        data: { row_id: row_id, li_token: token },
        dataType: 'json',
        success: function (response) {
            if (response && response.success) {
              showToast('success', response.message); 
                
                $('#return_reason_data_table').DataTable().ajax.reload();
            } else {
                alert("Error deleting department.");
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr, status, error);
        }
    });
}
} 

function editReturnReason(row_id) {
 
 $("#row_id").val(row_id);

  flag_id=$("#flag_id").val("1");
  $('#return_reason_data_table_modal').modal('show');

 $.ajax({
     url: BASE_URL + "index.php/" + hrController + "/get_return_reason_by_id",
     type: "GET",
     data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val() },
     dataType: "json",
     success: function (response) {
          console.log("response is" ,response);
         if (response.success) {
          $('#return_reason_data_table_modal').modal('show');
          $("#asset_return_reason").val(response.data.asset_return_reason);

         } else {
             alert("Failed.");
         }
     },
     error: function (xhr, status, error) {
         alert("Error in fetching .");
     }
 });
}

</script>