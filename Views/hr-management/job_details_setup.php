<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Job Details</title>
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
                  <a class="nav-link active" id="li_job_title_tab"data-toggle="tab" href="#job_title_tab" role="tab"  aria-selected="true">Job Titles/Designation</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="li_pay_scales_tab" data-toggle="tab" href="#pay_scales_tab" role="tab"  aria-selected="false">Pay Scales</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="li_employment_status_tab" data-toggle="tab" href="#employment_status_tab" role="tab"  aria-selected="false">Employment Status</a>
                </li>
              
              
              </ul>
              <!-- tab end  here -->
              <div class="tab-content">
                   <!--tab 1  ------ -->
                    <div class="tab-pane fade show active" id="job_title_tab" role="tabpanel" aria-labelledby="home-tab">
                        <!-- --- discription ---- -->
                          <div id="company_structure_table_top" class="reviewBlock">
                            <div class="combined_buttons">
                              <div class="add_new_btn_div">
                                <button id="job_title_data_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
                              </div>           
                            </div>
                          </div>
                            <!-- --- ./discription ---- -->
            
                        <!--for loading CompanyStructure DataTable -->
                            <table id="job_title_data_table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Job Title Code</th>
                                    <th>Job Title</th>
                                    <th>Job Description</th>
                                    
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
                            <div class="combined_buttons">
                              <div class="add_new_btn_div">
                                <button id="pay_scales_data_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
                              </div>           
                            </div>
                        </div>
                        <!-- --- ./discription ---- -->
                        <!-- table  -->
                        <table id="pay_scales_data_table" class="table table-striped">
                        <thead>
                            <tr>      
                                    <th>Name</th>
                                    <th>Min Salary</th>
                                    <th>Max Salary</th>
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
                    <div class="tab-pane fade" id="employment_status_tab" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- --- discription ---- -->
                        <div id="company_structure_table_top" class="reviewBlock">
                            <div class="combined_buttons">
                              <div class="add_new_btn_div">
                                <button id="employment_status_data_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
                              </div>           
                            </div>
                        </div>
                        <!-- --- ./discription ---- -->
                        <!-- table  -->
                        <table id="employment_status_data_table" class="table table-striped">
                        <thead>
                            <tr>      
                                    <th>Employment Status</th>
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
                    <!--  ./ tab 3-->
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
      <div class="modal fade data-table-modal" id="job_title_data_table_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Job Title</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="job_title_modal_form" class="modal_form">
                    <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Job Title Code</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="job_code" name="job_code">
                      <span class="error-message"></span>
                    </div>
                  </div>
                 <!-- ./ one field ---- -->                              
                    <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Job Title </label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="job_title" name="job_title">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->                     

                   <!--one field ---- -->
                   <div class="form-group row">
                      <div class="col-3">
                          <label for="job_description" class="col-form-label required">Job Description:</label>
                      </div>
                      <div class="col-8">
                          <textarea class="form-control" id="job_description" name="job_description"></textarea>
                      </div>
                  </div>
               <!-- ./ one field ---- -->
                                     

               
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="btn_job_title_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="btn_job_title_save"><i class="fas fa-calendar-check"></i>Save</button>
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
              <h4 class="modal-title">Pay Scales</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="pay_scales_modal_form" class="modal_form">
                    <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Pay Scale Name</label>
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











   <!-- modal employement -->
   <div class="modal fade data-table-modal" id="employment_status_data_table_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Employment Status</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="employment_status_modal_form" class="modal_form">
                    <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Employment Status</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="employment_status" name="employment_status">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->                              
              

           
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="btn_employment_status_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="btn_employment_status_save"><i class="fas fa-calendar-check"></i>Save</button>
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
      
        loadDataTableForJobTitle();
       
  });
</script>







<!-- operations of a data table functions  -->

<script>
 var BASE_URL = "<?php echo base_url(); ?>";
 var hrController = "<?php echo CONTROLLER_HR; ?>";
 var token = "<?php echo $_SESSION['li_token']; ?>";
// load job item data table
function loadDataTableForJobTitle(){
    $('#job_title_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" +  hrController + "/get_job_title_details",
            "dataSrc": "data"
        },
            "columns": [
            { data: "job_code" },
            { data: "job_title" },
            { data: "job_description" },
            {
                data: "id",
                render: function (data, type, full, row) {
                    var id = full.id;
                    return `
                        <div class="operations">
                            <a href="#" class="edit" onclick="editJobTitle(${id});"><i class="fas fa-edit"></i>Edit</a>
                            <a href="#" class="view" onclick="viewJobTitle(${id});"><i class="fas fa-eye"></i>View</a>
                            <a href="#" class="delete" onclick="deleteJobTitle(${id});"><i class="fas fa-trash"></i>Delete</a>
                        </div>`;
                }
            }
        ],


        "initComplete": function(settings, json) {
            customizeDataTable('job_title_data_table');
        }
    });
}
// ./load job item data table

$("#job_title_data_table_add_new").on("click", function() {
    $("#flag_id").val("0");

    var modalId = "#job_title_data_table_modal";
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

// load job item data table
function loadDataTableForPayScales(){
    $('#pay_scales_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" +  hrController + "/get_pay_scales_details",
            "dataSrc": "data"
        },
            "columns": [
            { data: "pay_scale_name" },
            { data: "min_salary" },
            { data: "max_salary" },
            {
                data: "id",
                render: function (data, type, full, row) {
                    var pay_scale_id = full.id;
                    return `
                        <div class="operations">
                            <a href="#" class="edit" onclick="editPayScale(${pay_scale_id});"><i class="fas fa-edit"></i>Edit</a>
                            <a href="#" class="view" onclick="viewPayScale(${pay_scale_id});"><i class="fas fa-eye"></i>View</a>
                            <a href="#" class="delete" onclick="deletePayScale(${pay_scale_id});"><i class="fas fa-trash"></i>Delete</a>
                        </div>`;
                }
            }
        ],


        "initComplete": function(settings, json) {
            customizeDataTable('pay_scales_data_table');
        }
    });
}
// ./load job item data table

$("#pay_scales_data_table_add_new").on("click", function() {
    $("#flag_id").val("0");

    var modalId = "#pay_scales_data_table_modal";
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

// load job item employement statys
function loadDataTableForEmploymentStatus(){
    $('#employment_status_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" +  hrController + "/get_employment_status_details",
            "dataSrc": "data"
        },
            "columns": [
            { data: "employment_status" },
          
            {
                data: "id",
                render: function (data, type, full, row) {
                    var employment_status_id = full.id;
                    return `
                        <div class="operations">
                            <a href="#" class="edit" onclick="editEmploymentStatus(${employment_status_id});"><i class="fas fa-edit"></i>Edit</a>
                            <a href="#" class="view" onclick="viewEmploymentStatus(${employment_status_id});"><i class="fas fa-eye"></i>View</a>
                            <a href="#" class="delete" onclick="deleteEmploymentStatus(${employment_status_id});"><i class="fas fa-trash"></i>Delete</a>
                        </div>`;
                }
            }
        ],


        "initComplete": function(settings, json) {
            customizeDataTable('employment_status_data_table');
        }
    });
}
// ./load job item data table

$("#employment_status_data_table_add_new").on("click", function() {
    $("#flag_id").val("0");

    var modalId = "#employment_status_data_table_modal";
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

</script>



<script>
  // for save the 

    var BASE_URL = "<?php echo base_url(); ?>";
    var hrController = "<?php echo CONTROLLER_HR; ?>";
    var token = "<?php echo $_SESSION['li_token']; ?>";
              $('#job_title_modal_form').validate({
                rules: {
                    job_code: {
                        required: true,
                    },
                    job_title: {
                        required: true,
                    },
                    job_description: {
                        required: true,
                    }
                },
                messages: {
                    job_code: "Please enter a job code",
                    job_title: "Please enter a job title",
                    job_description: "Please enter a job description"
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

              $("#btn_job_title_save").on("click",function() {  
                if ($('#job_title_modal_form').valid()) {
                        var formData  = new FormData();
                        formData.append('job_code', $("#job_code").val());
                        formData.append('job_title', $("#job_title").val()); 
                        formData.append('job_description', $("#job_description").val());
                        formData.append('flag_id', $("#flag_id").val()); //
                        formData.append('row_id', $("#row_id").val()); //
                        formData.append('li_token', token); 
                
                        $.ajax({
                            url: BASE_URL + "index.php/" + hrController + "/save_job_title",
                            type: 'POST',
                            data:  formData,
                          
                            dataType: "JSON",
                            processData: false,
                            contentType: false,
                            success: function(response) {
                              
                                console.log("response",response);
                                console.log(response.message);
                                $('#job_title_data_table_modal').modal('hide');
                                  $('#job_title_data_table').DataTable().ajax.reload();
                              
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

function editJobTitle(row_id) {
    $("#job_title_data_table_modal").modal("show");
    $("#row_id").val(row_id);
     flag_id=$("#flag_id").val("1");
     
 

   $.ajax({
       url: BASE_URL + "index.php/" + hrController + "/get_job_title_by_id",
       type: "POST",
       data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val()},
       dataType: "json",
       success: function (response) {
           // console.log(response is ,response);
           if (response.success) {
               $("#job_title").val(response.data.job_title);
               $("#job_description").val(response.data.job_description);
               $("#stock_unit_gst_code_id").val(response.data.acc_stock_unit_quantity_code_id);
               $("#job_code").val(response.data.job_code); 
              
            
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
function deleteJobTitle(row_id) {
    if (confirm("Are you sure you want to delete this item?")) {
        $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/delete_job_title_by_id",
            type: "POST",
            data: { row_id: row_id, li_token: token },
            dataType: "json",
            success: function (response) {
                $('#job_title_data_table_modal').modal('hide');
                 $('#job_title_data_table').DataTable().ajax.reload();
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
function viewJobTitle(row_id) {
    $.ajax({
       url: BASE_URL + "index.php/" + hrController + "/get_job_title_by_id",
       type: "POST",
       data: { row_id: row_id, li_token: token},
       dataType: "json",
       success: function (response) {
           // console.log(response is ,response);
           if (response.success) {
             $("#job_title_data_table_modal").modal("show");
               $("#job_title").val(response.data.job_title);
               $("#job_description").val(response.data.job_description);
               $("#stock_unit_gst_code_id").val(response.data.acc_stock_unit_quantity_code_id);
               $("#job_code").val(response.data.job_code); 
               var disable_data = $("#job_title, #job_description, #stock_unit_gst_code_id, #job_code");
               disable_data.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
               $(".modal-footer .savebtn").hide();
                // Show the .modal-footer when the modal is hidden
                $("#job_title_data_table_modal").on("hidden.bs.modal", function () 
                {
                    $(".modal-footer .savebtn").show();
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
  function editPayScale(row_id) {
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
function deletePayScale(row_id) {
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
  function viewPayScale(row_id) {
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
                   $(".modal-footer .savebtn").hide();
                    // Show the .modal-footer when the modal is hidden
                    $("#pay_scales_data_table_modal").on("hidden.bs.modal", function () 
                    {
                      pay_scale_disable_data.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
                         $(".modal-footer .savebtn").show();
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
      function editEmploymentStatus(row_id) {
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
      function deleteEmploymentStatus(row_id) {
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
    function viewEmploymentStatus(row_id) {
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
                   $(".modal-footer .savebtn").hide();
                    // Show the .modal-footer when the modal is hidden
                    $("#employment_status_data_table_modal").on("hidden.bs.modal", function () 
                    {
                        $(".modal-footer .savebtn").show();
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




