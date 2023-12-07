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
                  <a class="nav-link active" id="li_loan_request_tab" data-toggle="tab" href="#loan_request_tab" role="tab" aria-selected="false">Request</a>
                </li>
						
            
                
                <li class="nav-item">
                  <a class="nav-link" id="li_new_request_tab" data-toggle="tab" href="#loan_new_request_tab" role="tab"  aria-selected="false">New Request</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="li_verified_tab" data-toggle="tab" href="#loan_verified_tab" role="tab"  aria-selected="false">Verified</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="li_approved_tab" data-toggle="tab" href="#loan_approved_tab" role="tab"  aria-selected="false">Approved</a>
                </li>
               
              </ul>
                     <!-- ./ tab ul -->


                    <!-- tab end  here -->
                        <div class="tab-content">
                            <!--tab 1  ------ -->
                        <div class="tab-pane fade show active" id="loan_request_tab" role="tabpanel" aria-labelledby="loan_request_tab">

                        <div id="" class="reviewBlock">

                                            <div class="combined_buttons">
                                                <div class="add_new_btn_div">
                                                    <button id="loan_request_data_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
                                                 </div>
                                                <div class="filter_btn_div">
                                                <button id="loan_request_data_table_filter_btn" class="customise_filter_button" data-value="employee_data_table"><i class="fas fa-filter"></i>Filter</button>
                                                </div>
                                                <div class="reset_filter_btn_div">
                                                    <button id="loan_request_data_table_reset_filter"  style="display:none" class="cancel_filter_button"><i class="fas fa-times"></i> Cancel</button>
                                                </div>
                                               
                                            </div>
                
                          </div>
                                <table id="loan_request_data_table" class="table table-striped">
                            <thead>
                                <tr>
                              
                                <th>Employee Name</th>
                                <th>Loan Type</th>
                                <th>Requested Amount</th>
                                 <th>Loan Status</th>

                                <th style="width:200px;text-align: center;">Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                <tr>
                                   
                                    
                                    
                                </tr>
                                
                            
                            </tbody>
                            </table>
                                    
                        </div>
                        <div class="tab-pane fade" id="loan_new_request_tab" role="tabpanel" aria-labelledby="certifications_tab">
                      
                        <?php include("new_request.php");?>
                   </div>
                  
                   <div class="tab-pane fade" id="loan_approved_tab" role="tabpanel" aria-labelledby="dependents_tab">
                      
                        <?php include("approved.php");?>
                   </div>
                   <div class="tab-pane fade" id="loan_verified_tab" role="tabpanel" aria-labelledby="languages_tab">
               
                        <?php include("verified.php");?>
                   </div>
                           

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


            <!-- modal for loan request -->
 <div class="modal fade data-table-modal" id="loan_request_data_table_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Loan Request</h4>
             
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="loan_request_modal_forms" class="modal_form">
                    <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="employee_id" class="col-form-label required">Employee Name</label>
                    </div>
                    <div class="col-8">
                     <select class="form-control select2" id="loan_request_employee_id" name="loan_request_employee_id">
                       
                      </select>

                    </div>
                  </div>
                     <!-- ./ one field ---- --> 
                       
                  <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Date Of Request </label>
                    </div>
                    <div class="col-8">
                      <input type="date" class="form-control" id="loan_date_of_request" name="loan_date_of_request">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->  
                     
                        <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="education_name" class="col-form-label required">Loan Type</label>
                    </div>
                    <div class="col-8">
                    
                      <select class="form-control select2" id="loan_type_id" name="loan_type_id">
                      <option value="" >Select Loan Type</option>

                      <?php
                          if (isset($loan_type)):  
                            foreach ($loan_type as $row):
                              $name = $row->loan_types;
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
                      <label for="recipient-name" class="col-form-label required">Requested Amount</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="requested_amount" name="requested_amount">
                    </div>
                  </div>
                
                 
               
              </form>
            
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="btn_pay_scales_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="btn_loan_request_save"><i class="fas fa-calendar-check"></i>Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div> 

    <!-- ./filter modal-->
 <div class="modal fade data-table-modal" id="loan_request_data_table_filter_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Loan</h4>
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
                        
                          <select name="filter_employee_id_for_loan" id="filter_employee_id_for_loan" class="form-control select2">
                                <option value="0">All Employees</option>
                               
                          </select>

                          </div>
                      </div>
                    <!-- ./ one field ---- -->          
                        
                  <!--one field  text field---- -->
                      <div class="form-group row">
                          <div class="col-3">
                          <label for="recipient-name" class="col-form-label required">Loan Type</label>
                          </div>
                          <div class="col-8">
                              <select name="filter_employee_laon_status"  id="filter_employee_laon_status"class="form-control select2">
                                <option value="0">Not Applicable</option> 
                                
                              </select>
                          </div>
                      </div>
                    <!-- ./ one field ---- -->              
                               

              </form>
            </div>
            <div class="modal-footer justify-content-between">
             <button id="btn_loan_request_filter" class="btn savebtn">Apply Filter</button>
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
    var BASE_URL = "<?php echo base_url(); ?>";
    var hrController = "<?php echo CONTROLLER_HR; ?>";

    var token = "<?php echo $_SESSION['li_token']; ?>";

    $(document).ready( function () {

      $('#loan_request_modal_forms').validate({
            rules: {
            requested_amount: {
                              required: true,
                          }
                },
                messages: {
                  requested_amount: "Please enter the amount"
                
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
        
  
    $('#loan_request_data_table').DataTable({
   
   "ajax": {
       "url": BASE_URL + "index.php/" +  hrController + "/get_emp_loan_details",
       "dataSrc": "data"
   },
   "columns": [
     
       { data: "employee_name" },
       { data: "loan_type" },
       { data: "requested_amount"},
       { data: "loan_request_status"},
       
       {
           data: "id",
           render: function (data, type, row) {
               return `
                  <div class="operations"> 
                  <a href="#" class="edit"  onclick="editLoanRequest('${data}');"><i class="fas fa-edit"></i>Edit</a>
                  <a href="#" class="view" onclick="viewLoanRequest('${data}');"><i class="fas fa-eye" ></i>View</a>
                  <a href="#" class="delete" onclick="deleteLoanRequest('${data}');"><i class="fas fa-trash" ></i>Delete</a>
                  </div>`;
            
           }
           
       }
   ],
  
     "initComplete": function(settings, json) {
       customizeDataTable('loan_request_data_table');
       fetchEmployeeNamesForLoanRequest();
   }

});

});



function fetchEmployeeNamesForLoanRequest() {
// alert("hai")

 $.ajax({
      url: BASE_URL + "index.php/" + hrController + "/get_employee_firstname_lastname",
      type: 'GET', 
      dataType: 'json',
      success: function(data) {
        console.log("AJAX success - Retrieved data:", data);

    var dropdown = $('#filter_employee_id_for_loan');
    console.log("Dropdown object:", dropdown);

    // Check if the loop runs and employee names are available
    console.log("Employee names count:", data.employee_names.length);
        // console.log("AJAX success - Retrieved data:", data);
        // console.log("Dropdown count before population:", $('#filter_employee_id_for_loan option').length);
        // console.log("Dropdown count after population:", $('#filter_employee_id_for_loan option').length);
         var dropdown10 = $('#loan_request_employee_id');
         var dropdown11 = $('#new_request_employee_id');
         var dropdown12 = $('#employee_id_fr_verify');
         var dropdown = $('#filter_employee_id_for_loan');
        
         
        
          dropdown10.empty();
          dropdown10.append($('<option></option>').attr('value', '').text('Select Employee')); 
          dropdown11.empty();
          dropdown11.append($('<option></option>').attr('value', '').text('Select Employee')); 
          dropdown12.empty();
          dropdown12.append($('<option></option>').attr('value', '').text('Select Employee')); 
          dropdown.empty();
          dropdown.append($('<option></option>').attr('value', '0').text('Not Applicable')); 

          
          $.each(data.employee_names, function(index, employee) {
             
              dropdown10.append($('<option></option>').attr('value', employee.employee_id).text(employee.full_name));
              dropdown11.append($('<option></option>').attr('value', employee.employee_id).text(employee.full_name));
              dropdown12.append($('<option></option>').attr('value', employee.employee_id).text(employee.full_name));
              dropdown.append($('<option></option>').attr('value', employee.employee_id).text(employee.full_name));
          });
      },
      error: function(xhr, status, error) {
          console.error(xhr.responseText);
          console.error(status);
          console.error(error);
      }
  });
}




$('#loan_request_data_table_filter_modal').on('shown.bs.modal', function () {
  // alert("hai")
  console.log("Modal shown - Fetching employee names...");
  fetchEmployeeNamesForLoanRequest();
  fetchLoanRequestStatuses()
  
  });

  $("#btn_loan_request_filter").on("click", function () {
    var filter_employee_id_for_loan_val = $("#filter_employee_id_for_loan").val();
    var filter_employee_loan_status_val = $("#filter_employee_laon_status").val();
    var filter_employee_id_for_loan = $("#filter_employee_id_for_loan option:selected").text();
    var filter_employee_loan_status = $("#filter_employee_laon_status option:selected").text();
    var table_loan_request = $('#loan_request_data_table').DataTable();

    // Clear all filters
    table_loan_request.columns().search('');

    if (filter_employee_id_for_loan_val !== "0") {
        table_loan_request.column(0).search(filter_employee_id_for_loan);
    }
    if (filter_employee_loan_status_val !== "0") {
        table_loan_request.column(3).search(filter_employee_loan_status);
    }

    table_loan_request.draw();

    var filterLoanRequestText = ''; // Default text
    if (filter_employee_id_for_loan_val !== "0" && filter_employee_loan_status_val !== "0") {
        filterLoanRequestText = 'Employee: ' + filter_employee_id_for_loan + ' & Loan Type: ' + filter_employee_loan_status;
    } else if (filter_employee_id_for_loan_val !== "0") {
        filterLoanRequestText = 'Employee: ' + filter_employee_id_for_loan;
    } else if (filter_employee_loan_status_val !== "0") {
        filterLoanRequestText = 'Loan Type: ' + filter_employee_loan_status;
    }
    var resetFilterLoanRequestText = filterLoanRequestText + ' <span class="icon"><i class="fa fa-times"></i></span>'; // Improved concatenation
  
    $('#loan_request_data_table_reset_filter').html(resetFilterLoanRequestText);
    
   
    if (filter_employee_id_for_loan === "0" && filter_employee_loan_status === "0") {
        $("#loan_request_data_table_reset_filter").hide();
    } else {
        $("#loan_request_data_table_reset_filter").show();
    }
    $("#loan_request_data_table_filter_modal").modal("hide");
});


  function fetchLoanRequestStatuses() {
    $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/get_loan_request_statuses",
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            console.log("AJAX success - Retrieved loan request statuses:", data);

            var dropdown = $('#filter_employee_laon_status');

           
            dropdown.children('option:not(:first)').remove();

          
            $.each(data.loan_statuses, function(index, status) {
                dropdown.append($('<option></option>').attr('value', status.id).text(status.loan_request_status));
            });

            
            dropdown.trigger('change.select2');
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            console.error(status);
            console.error(error);
        }
    });
}




$("#btn_loan_request_save").click (function(){

   if ($('#loan_request_modal_forms').valid()) {
   
      var formData  = new FormData();
                  formData.append('employee_id', $("#loan_request_employee_id").val());
                  formData.append('date_of_request', $("#loan_date_of_request").val());  
                  formData.append('loan_type_id', $("#loan_type_id").val());
                  formData.append('requested_amount', $("#requested_amount").val());
                //   formData.append('approved_amount', $("#approved_amount").val());
                  formData.append('loan_request_status_id', $("#loan_request_status_id").val());

                  formData.append('flag_id', $("#flag_id").val()); 
                  formData.append('row_id', $("#row_id").val()); 
                  formData.append('li_token', token); 
          
            $.ajax({
                url: BASE_URL + "index.php/" + hrController + "/save_emp_loan_request_details",
                type: 'POST',
                data:  formData,
                dataType: "JSON",
                processData: false,
                contentType: false,
                success: function(response) {
                  console.log("response",response);
                  showToast('success',response.message);
                  $('#loan_request_data_table_modal').modal('hide');
                  $('#loan_request_data_table').DataTable().ajax.reload();
                  $('#new_request_data_table').DataTable().ajax.reload();
                  $('#loan_approval_data_table').DataTable().ajax.reload();
                  $('#loan_verified_data_table').DataTable().ajax.reload();

                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    console.log(status);
                    console.log(error);
                }
            });
     }
      
}); 


function viewLoanRequest(row_id) 
 {
alert(row_id);
$('#loan_request_data_table_modal').modal('show')
    $.ajax({
        type: 'GET',
        url: BASE_URL + "index.php/" + hrController + "/get_emp_loan_request_by_id",
        data: { row_id: row_id },
        dataType: 'json',
        success: function(response) {
          console.log("Loan Request",response);
          console.log(response.data.date_of_request);
            if (response) {
               
            $('#loan_request_data_table_modal').modal('show');
              $("#loan_request_employee_id").val(response.data.employee_id).trigger('change');
              $("#loan_date_of_request").val(response.data.date_of_request);
              $("#loan_type_id").val(response.data.loan_type_id).trigger('change');
              $("#requested_amount").val(response.data.requested_amount);
              $("#loan_request_status_id").val(response.data.loan_request_status_id);
            
          
              var disableElements = $("input, select").prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                disableElements.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
               $(".modal-footer .savebtn").hide();
                // Show the .modal-footer when the modal is hidden
                $("#loan_request_data_table_modal").on("hidden.bs.modal", function () 
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

function editLoanRequest(row_id) {
  alert(row_id);
    $("#row_id").val(row_id);
   
    flag_id=$("#flag_id").val("1");
    $('#loan_request_data_table_modal').modal('show');

    $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/get_emp_loan_request_by_id",
        type: "GET",
        data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val() },
        dataType: "json",
        success: function (response) {
              console.log("response is" ,response);
            if (response.success) {
              $('#loan_request_data_table_modal').modal('show');
              $("#loan_request_employee_id").val(response.data.employee_id).trigger('change');
              $("#loan_date_of_request").val(response.data.date_of_request);
              $("#loan_type_id").val(response.data.loan_type_id).trigger('change');
              $("#requested_amount").val(response.data.requested_amount);
              $("#loan_request_status_id").val(response.data.loan_request_status_id);
              
             
              $("#loan_request_employee_id").prop("disabled", true).css("cursor", "not-allowed");
              $("#loan_request_employee_id").prop("readonly", true).css("cursor", "not-allowed");

                //  $("#department_name").focus();

            } else {
                alert("Failed.");
            }
        },
        error: function (xhr, status, error) {
            alert("Error in fetching .");
        }
    });
}

function deleteLoanRequest(row_id) {
  
  if (confirm("Are you sure you want to delete this department?")) {
      $.ajax({
          type: 'POST',
          url: BASE_URL + "index.php/" + hrController + "/delete_emp_loan_request_by_id",
          data: { row_id: row_id, li_token: token },
          dataType: 'json',
          success: function (response) {
              if (response && response.success) {
                showToast('success', response.message); 
                  
                  $('#loan_request_data_table').DataTable().ajax.reload();
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


$("#loan_request_data_table_add_new").on("click", function() {
    $("#flag_id").val("0");

    var modalId = "#loan_request_data_table_modal";
    $(modalId).modal("show");

    // Clear text fields
    $(modalId + ' input[type="text"]').val('');
    // Reset select2 dropdowns
    $(modalId + ' select').each(function() {
        if ($(this).hasClass('select2')) {
            $(this).val('').trigger('change');
        }
    });
    // loan_request_employee_id
    $("#loan_request_employee_id").prop("disabled", false);
    $("#loan_request_employee_id").prop("readonly", false);
    $("#loan_request_employee_id").css("cursor", "auto");
});

$("#loan_request_data_table_filter_btn").on("click", function() {

  $("#flag_id").val('0');
   $("#loan_request_data_table_filter_modal").modal("show");
});


$("#loan_request_data_table_reset_filter").on("click", function() {

  
     var table = $('#loan_request_data_table').DataTable();
    var modal = $('#loan_request_data_table_filter_modal');
    modal.find("select").val("0");
    table.columns().search('');
    table.search('').draw();
  
   
    $(this).hide();

});





    </script>


