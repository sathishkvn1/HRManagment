<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Project Details</title>
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
            <div class="combination_datatable" id="projects_master">
              <!-- tab start here -->
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" id="li_projects_tab"data-toggle="tab" href="#projrcts_tab" role="tab"  aria-selected="true">Projects</a>
                </li>
              
              
              </ul>
              <!-- tab end  here -->
              <div class="tab-content">
                   <!--tab 1  ------ -->
                      <div class="tab-pane fade show active" id="projrcts_tab" role="tabpanel" aria-labelledby="home-tab">
                          <!-- --- discription ---- -->
                              <div id="company_structure_table_top" class="reviewBlock">
                              <div class="ant-card ant-card-bordered ant-card-small" style="width: 100%;">
              
                                  <div class="ant-card-head">
                              
                                      <div class="name">
                                          Projects
                                      </div>
                                      <div class="moreinfo">
                                          <a href="#">More Info</a>
                                      </div>
                                  </div>
                                  <div class="ant-card-body">
                                  <div class="ant-card-meta">
                                      <div class="ant-card-meta-detail">
                                      <div class="ant-card-meta-description">
                                      Here you can add details about current projects. Projects are used to capture time spent by employees in timesheets.
                                      </div>
                                      </div>
                                  </div>
                                  </div>
                              </div>
                        </div>
                            <!-- --- ./discription ---- -->
            
                        <!--for loading CompanyStructure DataTable -->
                            <table id="projects_data_table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Client</th>
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
                    <div class="tab-pane fade" id="pay_scales_tab" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- --- discription ---- -->
                        <div id="company_structure_table_top" class="reviewBlock">
                            <div class="ant-card ant-card-bordered ant-card-small" style="width: 100%;">

                                <div class="ant-card-head">
                    
                                    <div class="name">
                                    Projects Assigned to Employees
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
                        <table id="employee_projects_data_table" class="table table-striped">
                        <thead>
                            <tr>      
                                    <th>Employees</th>
                                    <th>project</th>
                                    <th>Actions</th>
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
      <input type="" id="flag_id" value="0" >
      <input type="" id="hidden_id" value="0" >
    </div>

     <?php include("footer.php"); ?> 
     <!-- ./ footer -->





    

     <!-- modal for job title -->
      <div class="modal fade data-table-modal" id="projects_data_table_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="projects_modal_form" class="modal_form">
                    <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Name</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="project_name" name="project_name">
                      <span class="error-message"></span>
                    </div>
                  </div>
                 <!-- ./ one field ---- -->                              
                 <!--one field ---- -->
                 <div class="form-group row">
                      <div class="col-3">
                          <label for="client_id" class="col-form-label required">Client:</label>
                      </div>
                      <div class="col-8">
                        <select class="form-control" id="client_id" name="client_id">
                          <option value="1">Volvo</option>
                          <option value="2">Saab</option>
                          <option value="3">Mercedes</option>
                          <option value="4">Audi</option>
                        </select>
                      </div>
                  </div>
               <!-- ./ one field ---- -->                  

                   <!--one field ---- -->
                   <div class="form-group row">
                      <div class="col-3">
                          <label for="start_date" class="col-form-label required"> Start Date:</label>
                      </div>
                      <div class="col-8">
                         <input type="date" class="form-control" id="start_date" name="start_date">
                      </div>
                  </div>
               <!-- ./ one field ---- -->

                   <!--one field ---- -->
                   <div class="form-group row">
                      <div class="col-3">
                          <label for="start_date" class="col-form-label required"> End Date:</label>
                      </div>
                      <div class="col-8">
                         <input type="date" class="form-control" id="end_date" name="end_date">
                      </div>
                  </div>
               <!-- ./ one field ---- -->
                <!--one field  text field---- -->
                <div class="form-group row">
                    <div class="col-3">
                      <label for="estimated_cost" class="col-form-label required">Estimated Cost</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="estimated_cost" name="estimated_cost">
                      <span class="error-message"></span>
                    </div>
                  </div>
                 <!-- ./ one field ---- -->   
                  <!--one field ---- -->
                  <div class="form-group row">
                      <div class="col-3">
                          <label for="project_status_id" class="col-form-label required">Status</label>
                      </div>
                      <div class="col-8">
                        <select class="form-control"  name="project_status_id" id="project_status_id" style="width:100%">
                              <?php
                                  if (isset($project_status)):
                                        foreach ($project_status as $row):
                                              $project_status = $row->project_status;
                                              $id = $row->id;
                                                     
                              ?>
                                        <option value="<?php echo $id; ?>" >
                                            <?php echo $project_status; ?>
                                        </option>
                              <?php
                                         endforeach;
                                  endif;
                              ?> 
                         </select>
                      </div>
                  </div>
               <!-- ./ one field ---- -->                          
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="btn_projects_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="btn_projects_save"><i class="fas fa-calendar-check"></i>Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
     <!-- /.  modal for job title-->


 <!-- modal for pay  scale -->
    <div class="modal fade data-table-modal" id="pay_scales_data_table_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Employee Project</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="pay_scales_modal_form" class="modal_form">
                    <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Employee</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="pay_scale_name" name="pay_scale_name">
                    </div>
                  </div>
                     <!-- ./ one field ---- -->                              
                    <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Min Salary </label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="min_salary" name="min_salary">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->                     

                   <!--one field ---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="message-text" class="col-form-label required">Max Salary:</label>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control" id="max_salary" name="max_salary">
                    </div>
                  </div>
               <!-- ./ one field ---- -->
                                     

               
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="btn_pay_scales_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="btn_pay_scales_save"><i class="fas fa-calendar-check"></i>Save</button>
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
    $(document).ready( function () {
      
        loadDataTableForProjects();
       
  });
</script>







<!-- operations of a data table functions  -->

<script>
 var BASE_URL = "<?php echo base_url(); ?>";
 var hrController = "<?php echo CONTROLLER_HR; ?>";
 var token = "<?php echo $_SESSION['li_token']; ?>";
// load job item data table
function loadDataTableForProjects(){
    $('#projects_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" +  hrController + "/get_projects_details",
            "dataSrc": "data"
        },
            "columns": [
            { data: "project_name" },
            { data: "client_id" },
            {
                data: "id",
                render: function (data, type, full, row) {
                    var id = full.id;
                    return `
                        <div class="operations">
                            <a href="#" class="edit" onclick="editRow(${id});"><i class="fas fa-edit"></i>Edit</a>
                            <a href="#" class="view" onclick="viewRow(${id});"><i class="fas fa-eye"></i>View</a>
                            <a href="#" class="delete" onclick="deleteRow(${id});"><i class="fas fa-trash"></i>Delete</a>
                        </div>`;
                }
            }
        ],


        "initComplete": function(settings, json) {
            customizeDataTable('projects_data_table');
        }
    });
}
// ./load job item data table

</script>



<script>
  // for save the 
    var BASE_URL = "<?php echo base_url(); ?>";
    var hrController = "<?php echo CONTROLLER_HR; ?>";
    var token = "<?php echo $_SESSION['li_token']; ?>";
              $('#projects_modal_form').validate({
                rules: {
                  project_name: {
                        required: true,
                    },
                    start_date: {
                        required: true,
                    },
                    end_date: {
                        required: true,
                    },
                    estimated_cost: {
                        required: true,
                        number: true,
                    }
                },
                messages: {
                    job_code: "Please enter a project",
                    start_date: "please select a start date",
                    end_date: "please select a end date",
                    estimated_cost: {
                      required: "Please enter estimate cost",
                      number: "Please enter a valid number for estimate cost",
                  }
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

              $("#btn_projects_save").on("click",function() { 
                if ($('#projects_modal_form').valid()) {
                        var formData  = new FormData();
                        formData.append('project_name', $("#project_name").val());
                        formData.append('client_id', $("#client_id").val()); 
                        formData.append('start_date', $("#start_date").val());
                        formData.append('end_date', $("#end_date").val());
                        formData.append('project_status_id', $("#project_status_id").val());
                        formData.append('estimated_cost', $("#estimated_cost").val());
                        formData.append('flag_id', $("#flag_id").val()); //
                        formData.append('row_id', $("#row_id").val()); //
                        formData.append('li_token', token); 
                
                        $.ajax({
                            url: BASE_URL + "index.php/" + hrController + "/save_projects",
                            type: 'POST',
                            data:  formData,
                          
                            dataType: "JSON",
                            processData: false,
                            contentType: false,
                            success: function(response) {
                              
                                console.log("response",response);
                                console.log(response.message);
                                $('#projects_data_table_modal').modal('hide');
                                  $('#projects_data_table').DataTable().ajax.reload();
                              
                                  showToast('success', response.message);       
                            },
                            error: function(xhr, status, error) {
                                showToast("error", "Error save item.");
                                console.log(xhr.responseText);
                                console.log(status);
                                console.log(error);
                            }
                        });
                      }

          });
// ./ for save the 

function editRow(row_id) {
    alert(row_id);
    $("#row_id").val(row_id);
     flag_id=$("#flag_id").val("1");
 

   $.ajax({
       url: BASE_URL + "index.php/" + hrController + "/get_project_by_id",
       type: "POST",
       data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val()},
       dataType: "json",
       success: function (response) {
           // console.log(response is ,response);
           if (response.success) {
               $("#project_name").val(response.data.project_name);
               $("#client_id").val(response.data.client_id);
               $("#start_date").val(response.data.start_date);
               $("#end_date").val(response.data.end_date);
               $("#estimated_cost").val(response.data.estimated_cost);
               $("#project_status_id").val(response.data.project_status_id);

               $("#projects_data_table_modal").modal("show");
            
           } else {
               alert("Failed to fetch stock category details.");
           }
       },
       error: function (xhr, status, error) {
           alert("Error fetching stock category details.");
       }
   });
}
// ./ edit button

// delete button
function deleteRow(row_id) {
    alert('Delete clicked with id: ' + row_id);
    if (confirm("Are you sure you want to delete this item?")) {
        $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/delete_projects_by_id",
            type: "POST",
            data: { row_id: row_id, li_token: token },
            dataType: "json",
            success: function (response) {
                $('#projects_data_table_modal').modal('hide');
                 $('#projects_data_table').DataTable().ajax.reload();
                  showToast('success', response.message); 
            },
            error: function (xhr, status, error) {
                
                alert_message("failure", "Error", "Error delete job title item.");
            }
        });
    }
  
}
// delete button

//view button
function viewRow(row_id) {
    alert("edited id"+row_id);
    $.ajax({
       url: BASE_URL + "index.php/" + hrController + "/get_project_by_id",
       type: "POST",
       data: { row_id: row_id, li_token: token},
       dataType: "json",
       success: function (response) {
           // console.log(response is ,response);
           if (response.success) {
          
             $("#project_name").val(response.data.project_name);
               $("#client_id").val(response.data.client_id);
               $("#start_date").val(response.data.start_date);
               $("#end_date").val(response.data.end_date);
               $("#estimated_cost").val(response.data.estimated_cost);
               $("#project_status_id").val(response.data.project_status_id);

               $("#projects_data_table_modal").modal("show"); 
               var disable_data = $("#project_name, #client_id, #start_date, #end_date,#estimated_cost,#project_status_id");
               disable_data.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
               $(".modal-footer").hide();
                // Show the .modal-footer when the modal is hidden
                $("#projects_data_table_modal").on("hidden.bs.modal", function () 
                {
                    $(".modal-footer").show();
                    disable_data.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
                });
           } else {
               alert("Failed to fetch job title details.");
           }
       },
       error: function (xhr, status, error) {
           alert("Error fetching job title details.");
       }
   });
  
}
//view button
 </script>

 <!-- ./ operations of a data table functions  -->





 <script>
  // for save the 
    var BASE_URL = "<?php echo base_url(); ?>";
    var hrController = "<?php echo CONTROLLER_HR; ?>";
    var token = "<?php echo $_SESSION['li_token']; ?>";
    $('#pay_scales_modal_form').validate({
                rules: {
                  pay_scale_name: {
                        required: true,
                    },
                    min_salary: {
                        required: true,
                        number: true,
                    },
                    max_salary: {
                        required: true,
                        number: true,
                    }
                },
                messages: {
                  pay_scale_name: "Please enter a pay scale name",
                  min_salary: {
                      required: "Please enter a minimum salary",
                      number: "Please enter a valid number for the minimum salary",
                  },
                  max_salary: {
                      required: "Please enter a maximum salary",
                      number: "Please enter a valid number for the maximum salary",
                  }
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

    $("#btn_pay_scales_save").on("click",function() {  
      if ($('#pay_scales_modal_form').valid()) {

          var formData  = new FormData();
          formData.append('pay_scale_name', $("#pay_scale_name").val());
          formData.append('min_salary', $("#min_salary").val()); 
          formData.append('max_salary', $("#max_salary").val());
          formData.append('flag_id', $("#flag_id").val()); //
          formData.append('row_id', $("#row_id").val()); //
          formData.append('li_token', token); 
          
        $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/save_pay_scales",
            type: 'POST',
            data:  formData,
          
            dataType: "JSON",
            processData: false,
            contentType: false,
            success: function(response) {
              
                console.log("response",response);
                console.log(response.message);
                $('#pay_scales_data_table_modal').modal('hide');
                  $('#pay_scales_data_table').DataTable().ajax.reload();
              
                  showToast('success', response.message);       
            },
            error: function(xhr, status, error) {
                showToast("error", "Error save item.");
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);
            }
        });
      }
 });
// ./ for save the 

//  for edit the 
  function payScaleEditRow(row_id) {
      alert(row_id);
      $("#row_id").val(row_id);
      flag_id=$("#flag_id").val("1");
  

    $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/get_pay_scales_by_id",
        type: "POST",
        data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val()},
        dataType: "json",
        success: function (response) {
            // console.log(response is ,response);
            if (response.success) {
                $("#pay_scale_name").val(response.data.pay_scale_name);
                $("#min_salary").val(response.data.min_salary);
                $("#max_salary").val(response.data.max_salary);
                $("#pay_scales_data_table_modal").modal("show");
              
            } else {
                alert("Failed to fetch pay scales details.");
            }
        },
        error: function (xhr, status, error) {
            alert("Error fetching spay scales details.");
        }
    });
  }
// ./ edit button

// delete button
function payScaleDeleteRow(row_id) {
    alert('Delete clicked with id: ' + row_id);
    if (confirm("Are you sure you want to delete this item?")) {
        $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/delete_pay_scales_by_id",
            type: "POST",
            data: { row_id: row_id, li_token: token },
            dataType: "json",
            success: function (response) {
                $('#pay_scales_data_table_modal').modal('hide');
                 $('#pay_scales_data_table').DataTable().ajax.reload();
                  showToast('success', response.message); 
            },
            error: function (xhr, status, error) {
                
                alert_message("failure", "Error", "Error delete Pay Scales item.");
            }
        });
    }
  
}
// delete button

//view button
  //view button
  function payScaleViewRow(row_id) {
        alert("edited id"+row_id);
        $.ajax({
           url: BASE_URL + "index.php/" + hrController + "/get_pay_scales_by_id",
           type: "POST",
           data: { row_id: row_id, li_token: token},
           dataType: "json",
           success: function (response) {
               // console.log(response is ,response);
               if (response.success) {
                  $("#pay_scales_data_table_modal").modal("show");
                   $("#pay_scale_name").val(response.data.pay_scale_name);
                   $("#min_salary").val(response.data.min_salary);
                   $("#max_salary").val(response.data.max_salary);
                   var pay_scale_disable_data = $("#pay_scale_name, #min_salary, #max_salary");
                   pay_scale_disable_data.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                   $(".modal-footer").hide();
                    // Show the .modal-footer when the modal is hidden
                    $("#pay_scales_data_table_modal").on("hidden.bs.modal", function () 
                    {
                      pay_scale_disable_data.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
                         $(".modal-footer").show();
                    });
               } else {
                   alert("Failed to fetch job title details.");
               }
           },
           error: function (xhr, status, error) {
               alert("Error fetching job title details.");
           }
       });
      
    }
    //view button
//view button
 </script>

 <!-- ./ operations of a data table functions  -->




 <!-- - employee status--- -->
 
    <script>
      // for save the 
        var BASE_URL = "<?php echo base_url(); ?>";
        var hrController = "<?php echo CONTROLLER_HR; ?>";
        var token = "<?php echo $_SESSION['li_token']; ?>";
        $('#employment_status_modal_form').validate({
                rules: {
                  employment_status: {
                        required: true,
                    }
                },
                messages: {
                  employment_status: "Please enter Employment Status"
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

        $("#btn_employment_status_save").on("click",function() {  
          if ($('#employment_status_modal_form').valid()) {
          var formData  = new FormData();
          formData.append('employment_status', $("#employment_status").val());
          formData.append('min_salary', $("#min_salary").val()); 
          formData.append('max_salary', $("#max_salary").val());
          formData.append('flag_id', $("#flag_id").val()); //
          formData.append('row_id', $("#row_id").val()); //
          formData.append('li_token', token); 
          
        $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/save_employment_status",
            type: 'POST',
            data:  formData,
          
            dataType: "JSON",
            processData: false,
            contentType: false,
            success: function(response) {
              
                console.log("response",response);
                console.log(response.message);
                $('#employment_status_data_table_modal').modal('hide');
                  $('#employment_status_data_table').DataTable().ajax.reload();
              
                  showToast('success', response.message);       
            },
            error: function(xhr, status, error) {
                showToast("error", "Error save item.");
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);
            }
        });
      }
    });
    // ./ for save the 
    // edit button
      function employmentStatusEditRow(row_id) {
            alert(row_id);
            $("#row_id").val(row_id);
            flag_id=$("#flag_id").val("1");
        

          $.ajax({
              url: BASE_URL + "index.php/" + hrController + "/get_employment_status_by_id",
              type: "POST",
              data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val()},
              dataType: "json",
              success: function (response) {
                  // console.log(response is ,response);
                  if (response.success) {
                      $("#employment_status").val(response.data.employment_status);
                      $("#employment_status_data_table_modal").modal("show");
                    
                  } else {
                      alert("Failed to fetch stock category details.");
                  }
              },
              error: function (xhr, status, error) {
                  alert("Error fetching stock category details.");
              }
          });
      }
    // ./ edit button

    // delete button
      function employmentStatusDeleteRow(row_id) {
          alert('Delete clicked with id: ' + row_id);
          if (confirm("Are you sure you want to delete this item?")) {
              $.ajax({
                  url: BASE_URL + "index.php/" + hrController + "/delete_employment_status_by_id",
                  type: "POST",
                  data: { row_id: row_id, li_token: token },
                  dataType: "json",
                  success: function (response) {
                      $('#employment_status_data_table_modal').modal('hide');
                      $('#employment_status_data_table').DataTable().ajax.reload();
                        showToast('success', response.message); 
                  },
                  error: function (xhr, status, error) {
                      
                      alert_message("failure", "Error", "Error delete Employment status item.");
                  }
              });
          }
        
      }
    // delete button

    //view button
    function employmentStatusViewRow(row_id) {
        alert("edited id"+row_id);
        $.ajax({
           url: BASE_URL + "index.php/" + hrController + "/get_employment_status_by_id",
           type: "POST",
           data: { row_id: row_id, li_token: token},
           dataType: "json",
           success: function (response) {
               // console.log(response is ,response);
               if (response.success) {
                 $("#employment_status_data_table_modal").modal("show");
                   $("#employment_status").val(response.data.employment_status);
                   var disable_data = $("#employment_status");
                   disable_data.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                   $(".modal-footer").hide();
                    // Show the .modal-footer when the modal is hidden
                    $("#employment_status_data_table_modal").on("hidden.bs.modal", function () 
                    {
                        $(".modal-footer").show();
                        disable_data.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
                    });
               } else {
                   alert("Failed to fetch employment status details.");
               }
           },
           error: function (xhr, status, error) {
               alert("Error fetching  employment status details.");
           }
       });
      
    }
    //view button
    </script>

  <!-- - employee status--- -->





 

<script>
  $("#li_pay_scales_tab").on("click",()=>{
    if (!$.fn.DataTable.isDataTable('#pay_scales_data_table')) {
      loadDataTableForPayScales();
   }
       
  });
  $("#li_employment_status_tab").on("click",()=>{
   
    if (!$.fn.DataTable.isDataTable('#employment_status_data_table')) {
      loadDataTableForEmploymentStatus();
   }

  });
</script>




