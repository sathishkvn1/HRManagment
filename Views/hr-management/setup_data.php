<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SetUpData</title>
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
                                             <?php 
                          
                                $is_first='yes';
                              foreach($tab as $tab_item):
                                if($is_first=='yes')
                                    $class='active';
                                else
                                    $class='';
                                if($tab_item->sub_menu_tab=='Transportation Means')
                                {
                                    $transportation_add= $tab_item->is_add_new;
                                     $transportation_edit= $tab_item->is_edit;
                                     $transportation_view= $tab_item->is_view;
                                     $transportation_delete= $tab_item->is_delete;
                                    $tab_id='li_transportation_means_tab';
                                }
                                else if($tab_item->sub_menu_tab=='Leave Category/Type')
                                {
                                    $type_add=$tab_item->is_add_new;
                                     $type_edit= $tab_item->is_edit;
                                     $type_view= $tab_item->is_view;
                                     $type_delete= $tab_item->is_delete;
                                    $tab_id='li_leave_category_tab';
                                }
                                else
                                {
                                    $loan_add=$tab_item->is_add_new;
                                     $loan_edit= $tab_item->is_edit;
                                     $loan_view= $tab_item->is_view;
                                     $loan_delete= $tab_item->is_delete;
                                    $tab_id='li_loan_type_tab';
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
                <!--  <a class="nav-link active" id="li_transportation_means_tab"data-toggle="tab" href="#transportation_means_tab" role="tab"  aria-selected="true">Transportation Means</a>-->
                <!--</li>-->
                <!--<li class="nav-item">-->
                <!--  <a class="nav-link" id="li_leave_category_tab" data-toggle="tab" href="#leave_category_tab" role="tab"  aria-selected="false">Leave Category/Type</a>-->
                <!--</li>-->
                <!--<li class="nav-item">-->
                <!--  <a class="nav-link" id="li_loan_type_tab" data-toggle="tab" href="#loan_type_tab_tab" role="tab"  aria-selected="false">Loan Type</a>-->
                <!--</li>-->
              
              
              </ul>
              <!-- tab end  here -->
              <div class="tab-content">
                   <!--tab 1  ------ -->
                    <div class="tab-pane fade show active" id="transportation_means_tab" role="tabpanel" aria-labelledby="home-tab">
                        <!-- --- discription ---- -->
                          <div id="company_structure_table_top" class="reviewBlock">
                            <div class="combined_buttons">
                               <div class="add_new_btn_div">
                                   <?php 
                                        if($transportation_add=='yes'):
                                    ?>
                                   
                                  <button id="transportation_data_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
                                <?php endif;?>
                               </div>           
                            </div>
                          </div>
                            <!-- --- ./discription ---- -->
            
                        <!--for loading CompanyStructure DataTable -->
                            <table id="transportation_data_table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Transportaion Means</th>
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
                 <!-- one tab -->
                      <div class="tab-pane fade" id="overtime_type_tab" role="tabpanel" aria-labelledby="overtime_type_tab">     
                      <?php include("setupdata_overtime.php");?>
                   </div>
                  <!-- ./one tab -->


                    <!--tab 2   ------ -->
                    <div class="tab-pane fade" id="leave_category_tab" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- --- discription ---- -->
                        <div id="company_structure_table_top" class="reviewBlock">
                          <div class="combined_buttons">
                            <div class="add_new_btn_div">
                                <?php 
                                        if($type_add=='yes'):
                                    ?>
                                   
                              <button id="leave_category_data_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
                            <?php endif;?>
                            </div>           
                          </div>
                        </div>
                        <!-- --- ./discription ---- -->
                        <!-- table  -->
                        <table id="leave_category_data_table" class="table table-striped">
                        <thead>
                            <tr>      
                                    <th>Id</th>
                                    <th>Leave Category</th>
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
                    <div class="tab-pane fade" id="loan_type_tab_tab" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- --- discription ---- -->
                        <div id="company_structure_table_top" class="reviewBlock">
                        <div class="combined_buttons">
                            <div class="add_new_btn_div">
                                <?php 
                                        if($loan_add=='yes'):
                                    ?>
                                   
                              <button id="loan_type_data_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
                            <?php endif;?>
                            </div>           
                          </div>
                        </div>
                        <!-- --- ./discription ---- -->
                        <!-- table  -->
                        <table id="loan_type_data_table" class="table table-striped">
                        <thead>
                            <tr>      
                                    <th>Id</th>
                                    <th>Loan Types</th>
                                    <th>Loan Description</th>
                                    
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
      <div class="modal fade data-table-modal" id="transportation_data_table_modal"   data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Transportation Means</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="transportation_modal_form" class="modal_form">
                    <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Transportation Means</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="transportaion_means" name="transportaion_means">
                      <span class="error-message"></span>
                    </div>
                  </div>
                 <!-- ./ one field ---- -->                              
                                   

                
                                     

               
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="btn_job_title_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="btn_transportaion_save"><i class="fas fa-calendar-check"></i>Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
     <!-- /.  modal for job title-->


 <!-- modal for pay  scale -->
    <div class="modal fade data-table-modal" id="leave_category_data_table_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Leave Category</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="leave_category_modal_form" class="modal_form">
                    <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Leave Category</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="leave_category" name="leave_category">
                    </div>
                  </div>
                     <!-- ./ one field ---- -->                              
                             

              

               
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="btn_pay_scales_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="btn_leave_category_save"><i class="fas fa-calendar-check"></i>Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /.modal for company department-->











   <!-- modal employement -->
   <div class="modal fade data-table-modal" id="loan_type_data_table_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Loan Type</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="loan_type_form" class="modal_form">
                    <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Loan Type</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="loan_types" name="loan_types">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->  
                   <!--one field  text field---- -->
                   <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Description</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="loan_description" name="loan_description">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->                              
              

           
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="btn_employment_status_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="btn_loan_type_save"><i class="fas fa-calendar-check"></i>Save</button>
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

$(document).ready(function () {
    loadDataTableForTransportation()
  
   
});


$("#li_leave_category_tab").on("click",()=>{
    if (!$.fn.DataTable.isDataTable('#leave_category_data_table')) {
      loadDataTableForLeaveCategory();
   }
       
  });
  
  $("#li_loan_type_tab").on("click",()=>{
    if (!$.fn.DataTable.isDataTable('#loan_type_data_table')) {

      loadDataTableForLoanType();
   }
       
  });

function loadDataTableForTransportation() {
    $('#transportation_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" + hrController + "/get_transportation_means",
            "dataSrc": "data"
        },
        "columns": [
            { data: "id" },
            { data: "transportaion_means" },
            {
                data: "id",
                render: function (data, type, row) {
                    return `
                        <div class="operations"> 
                        <?php if($transportation_edit=='yes'): ?>
                            <a href="#" class="edit" onclick="editTransportation('${data}');"><i class="fas fa-edit"></i>Edit</a>
                            <?php endif;
                            if($transportation_view=='yes'): ?>
                            <a href="#" class="view" onclick="viewTransportation('${data}');"><i class="fas fa-eye"></i>View</a>
                            <?php endif;
                            if($transportation_delete=='yes'): ?>
                            <a href="#" class="delete"  onclick="deleteTransportation('${data}');"><i class="fas fa-trash"></i>Delete</a>
                            <?php endif; ?>
                        </div>`;
                }
            }
        ],
        "initComplete": function (settings, json) {
            // console.log("Data received:", json);
            customizeDataTable('transportation_data_table');
        }
    });
}

$("#transportation_data_table_add_new").on("click", function() {
    $("#flag_id").val("0");

    var modalId = "#transportation_data_table_modal";
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

// save transportation
$('#transportation_modal_form').validate({
  rules: {
                  transportaion_means: {
                        required: true,
                    },
                    
                },
                messages: {
                  transportaion_means: "Please enter this field"
                  
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


$("#btn_transportaion_save").click (function(){
  if ($('#transportation_modal_form').valid()) {
          var formData  = new FormData();
          formData.append('transportaion_means', $("#transportaion_means").val());
          formData.append('flag_id', $("#flag_id").val()); 
          formData.append('row_id', $("#row_id").val()); 
          formData.append('li_token', token); 
         $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/save_transportation_details",
            type: 'POST',
            data:  formData,
            dataType: "JSON",
            processData: false,
            contentType: false,
            success: function(response) {
              console.log("response",response);

              $('#transportation_data_table_modal').modal('hide');
              $('#transportation_data_table').DataTable().ajax.reload();
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

function viewTransportation(row_id) 
 {
 
    $.ajax({
        type: 'GET',
        url: BASE_URL + "index.php/" + hrController + "/get_transportation_by_id",
        data: { row_id: row_id },
        dataType: 'json',
        success: function(response) {
            if (response) {
                console.log("ressssssssss",response);
                $('#transportation_data_table_modal').modal('show');
                $("#transportaion_means").val(response.data.transportaion_means);
              
                var disable_data_skills = $("#transportation_data_table_modal, #transportaion_means");
                disable_data_skills.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
               $(".modal-footer .savebtn").hide();
               
                $("#transportation_data_table_modal").on("hidden.bs.modal", function () 
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

function deleteTransportation(row_id) {

  if (confirm("Are you sure you want to delete ?")) {
      $.ajax({
          type: 'POST',
          url: BASE_URL + "index.php/" + hrController + "/delete_transportation_by_id",
          data: { row_id: row_id, li_token: token },
          dataType: 'json',
          success: function (response) {
              if (response && response.success) {
                showToast('success', response.message); 
                  
                  $('#transportation_data_table').DataTable().ajax.reload();
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

function editTransportation(row_id) {
 
 $("#row_id").val(row_id);

  flag_id=$("#flag_id").val("1");
  $('#transportation_data_table_modal').modal('show');

 $.ajax({
  
     url: BASE_URL + "index.php/" + hrController + "/get_transportation_by_id",
     type: "GET",
     data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val() },
     dataType: "json",
     success: function (response) {
          console.log("response is" ,response);
         if (response.success) {
          $('#transportation_data_table_modal').modal('show');
          $("#transportaion_means").val(response.data.transportaion_means);

         } else {
             alert("Failed.");
         }
     },
     error: function (xhr, status, error) {
         alert("Error in fetching .");
     }
 });
}



function loadDataTableForLeaveCategory() {
    $('#leave_category_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" + hrController + "/get_leave_category_details",
            "dataSrc": "data"
        },
        "columns": [
            { data: "id" },
            { data: "leave_category" },
            {
                data: "id",
                render: function (data, type, row) {
                    return `
                        <div class="operations">
                         <?php if($type_edit=='yes'): ?>
                            <a href="#" class="edit" onclick="editLeaveCategory('${data}');"><i class="fas fa-edit"></i>Edit</a>
                             <?php endif;
                            if($type_view=='yes'): ?>
                            <a href="#" class="view" onclick="viewLeaveCategory('${data}');"><i class="fas fa-eye"></i>View</a>
                             <?php endif;
                            if($type_delete=='yes'): ?>
                            <a href="#" class="delete"  onclick="deleteLeaveCategory('${data}');"><i class="fas fa-trash"></i>Delete</a>
                             <?php endif; ?>
                        </div>`;
                }
            }
        ],
        "initComplete": function (settings, json) {
            console.log("Data received:", json);
            customizeDataTable('leave_category_data_table');
        }
    });
}

$("#leave_category_data_table_add_new").on("click", function() {
    $("#flag_id").val("0");

    var modalId = "#leave_category_data_table_modal";
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

// save leave category
$('#leave_category_modal_form').validate({
  rules: {
                  leave_category: {
                        required: true,
                    },
                    
                },
                messages: {
                  leave_category: "Please enter this field"
                  
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


$("#btn_leave_category_save").click (function(){
  if ($('#leave_category_modal_form').valid()) {
          var formData  = new FormData();
          formData.append('leave_category', $("#leave_category").val());
          formData.append('flag_id', $("#flag_id").val()); 
          formData.append('row_id', $("#row_id").val()); 
          formData.append('li_token', token); 
         $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/save_leave_category_details",
            type: 'POST',
            data:  formData,
            dataType: "JSON",
            processData: false,
            contentType: false,
            success: function(response) {
              console.log("response",response);

              $('#leave_category_data_table_modal').modal('hide');
              $('#leave_category_data_table').DataTable().ajax.reload();
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

function viewLeaveCategory(row_id) 
 {
 
    $.ajax({
        type: 'GET',
        url: BASE_URL + "index.php/" + hrController + "/get_leave_category_by_id",
        data: { row_id: row_id },
        dataType: 'json',
        success: function(response) {
            if (response) {
                console.log(response);
                $('#leave_category_data_table_modal').modal('show');
                $("#leave_category").val(response.data.leave_category);
              
                var disable_data_skills = $("#leave_category_data_table_modal, #leave_category");
                disable_data_skills.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
               $(".modal-footer .savebtn").hide();
               
                $("#leave_category_data_table_modal").on("hidden.bs.modal", function () 
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

function editLeaveCategory(row_id) {
 
 $("#row_id").val(row_id);

  flag_id=$("#flag_id").val("1");
  $('#leave_category_data_table_modal').modal('show');

 $.ajax({
     url: BASE_URL + "index.php/" + hrController + "/get_leave_category_by_id",
     type: "GET",
     data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val() },
     dataType: "json",
     success: function (response) {
          console.log("response is" ,response);
         if (response.success) {
          $('#leave_category_data_table_modal').modal('show');
          $("#leave_category").val(response.data.leave_category);

         } else {
             alert("Failed.");
         }
     },
     error: function (xhr, status, error) {
         alert("Error in fetching .");
     }
 });
}


function deleteLeaveCategory(row_id) {

if (confirm("Are you sure you want to delete ?")) {
    $.ajax({
        type: 'POST',
        url: BASE_URL + "index.php/" + hrController + "/delete_leave_category_by_id",
        data: { row_id: row_id, li_token: token },
        dataType: 'json',
        success: function (response) {
            if (response && response.success) {
              showToast('success', response.message); 
                
                $('#leave_category_data_table').DataTable().ajax.reload();
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

function loadDataTableForLoanType() {


    $('#loan_type_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" + hrController + "/get_loan_details",
            "dataSrc": "data"
        },
        "columns": [
            { data: "id" },
            { data: "loan_types"},
            { data: "loan_description"},
            {
                data: "id",
                render: function (data, type, row) {
                    return `
                        <div class="operations">
                         <?php if($loan_edit=='yes'): ?>
                            <a href="#" class="edit" onclick="editLoanType('${data}');"><i class="fas fa-edit"></i>Edit</a>
                             <?php endif;
                            if($loan_view=='yes'): ?>
                            <a href="#" class="view" onclick="viewLoanType('${data}');"><i class="fas fa-eye"></i>View</a>
                             <?php endif;
                            if($loan_delete=='yes'): ?>
                            <a href="#" class="delete"  onclick="deleteLoanType('${data}');"><i class="fas fa-trash"></i>Delete</a>
                             <?php endif; ?>
                        </div>`;
                }
            }
        ],
        "initComplete": function (settings, json) {
            // console.log("Data received:", json);
             customizeDataTable('loan_type_data_table');
        }
    });
}

$("#loan_type_data_table_add_new").on("click", function() {
    $("#flag_id").val("0");

    var modalId = "#loan_type_data_table_modal";
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



            $('#loan_type_form').validate({
             rules: {
              loan_types: {
                          required: true,
                      },
                      loan_description: {
                          required: true,
                      }
                  },
                messages: {
                  loan_types: "Please enter Loan Type",
                  loan_description: "Please enter Loan description"
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



$("#btn_loan_type_save").click (function(){
  if ($('#loan_type_form').valid()) {
          var formData  = new FormData();
          formData.append('loan_types', $("#loan_types").val());
          formData.append('loan_description', $("#loan_description").val());
          formData.append('flag_id', $("#flag_id").val()); 
          formData.append('row_id', $("#row_id").val()); 
          formData.append('li_token', token); 
         $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/save_loan_type_details",
            type: 'POST',
            data:  formData,
            dataType: "JSON",
            processData: false,
            contentType: false,
            success: function(response) {
              console.log("response",response);

              $('#loan_type_data_table_modal').modal('hide');
              $('#loan_type_data_table').DataTable().ajax.reload();
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

function viewLoanType(row_id) 
 {
 
    $.ajax({
        type: 'GET',
        url: BASE_URL + "index.php/" + hrController + "/get_loan_type_by_id",
        data: { row_id: row_id },
        dataType: 'json',
        success: function(response) {
            if (response) {
                console.log(response);
                $('#loan_type_data_table_modal').modal('show');
                $("#loan_types").val(response.data.loan_types);
                $("#loan_description").val(response.data.loan_description);
              
                var disable_data_skills = $("#loan_type_data_table_modal, #loan_types,#loan_description");
                disable_data_skills.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
               $(".modal-footer .savebtn").hide();
               
                $("#loan_type_data_table_modal").on("hidden.bs.modal", function () 
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


function deleteLoanType(row_id) {

if (confirm("Are you sure you want to delete ?")) {
    $.ajax({
        type: 'POST',
        url: BASE_URL + "index.php/" + hrController + "/delete_loan_type_by_id",
        data: { row_id: row_id, li_token: token },
        dataType: 'json',
        success: function (response) {
            if (response && response.success) {
              showToast('success', response.message); 
                
                $('#loan_type_data_table').DataTable().ajax.reload();
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

function editLoanType(row_id) {
 alert(row_id);
 $("#row_id").val(row_id);

  flag_id=$("#flag_id").val("1");
  $('#loan_type_data_table_modal').modal('show');

 $.ajax({
     url: BASE_URL + "index.php/" + hrController + "/get_loan_type_by_id",
     type: "GET",
     data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val() },
     dataType: "json",
     success: function (response) {
          console.log("response is in" ,response);
         if (response.success) {
          $('#loan_type_data_table_modal').modal('show');
          $("#loan_types").val(response.data.loan_types);
          $("#loan_description").val(response.data.loan_description);
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