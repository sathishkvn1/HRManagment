
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Request</title>
</head>

<body>
       <!-- --- discription ---- -->
          
                      
            
                        <!--for loading CompanyStructure DataTable -->
                            <table id="new_request_data_table" class="table table-striped">
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
                            <!-- ./ for loading CompanyStructure DataTable -->
                

    <?php include("bottom-js.php"); ?>           
    
    
 <!-- modal for loan request -->
 <div class="modal fade data-table-modal" id="new_request_data_table_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Loan Request</h4>
             
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="new_loan_request_modal_form" class="modal_form">
                    <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="employee_id" class="col-form-label required">Employee Name</label>
                    </div>
                    <div class="col-8">
                     <select class="form-control select2" id="new_request_employee_id" name="new_request_employee_id">
                        
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
                      <input type="date" class="form-control" id="new_request_date_of_request" name="new_request_date_of_request">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->  
                     
                        <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="education_name" class="col-form-label required">Loan Type</label>
                    </div>
                    <div class="col-8">
                    
                      <select class="form-control select2" id="loan_type_id_for_new_request" name="loan_type_id_for_new_request">
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
                      <input type="text" class="form-control" id="requested_amount_for_new_request" name="requested_amount_for_new_request">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->   

                 <!--one field  text field---- -->
                   <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Loan Request Status</label>
                    </div>
                    <div class="col-8">
                    
                    <select class="form-control" id="new_request_status_id" name="new_request_status_id">
                    <option value="" >Select Status</option>
                    <?php if (isset($new_request_status)): ?>
                        <?php foreach ($new_request_status as $row): ?>
                            <?php
                                $name = $row->loan_request_status;
                                $id = $row->id;
                            ?>
                            <option value="<?php echo $id; ?>" >
                                <?php echo $name; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>

                 
                    </div>
                  </div>
                 <!-- ./ one field ---- --> 

                  <!--one field  text field---- -->
                  <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Rejection Reason</label>
                      </div>
                      <div class="col-8">
                        <input type="text" name="employee_loan_request_rejection_reason"  id="employee_loan_request_rejection_reason"class="form-control ">
                        </input>
                      </div>
                    </div>
                  <!-- ./ one field ---- -->    
                 

                 
               
              </form>
            
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="btn_pay_scales_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="btn_new_request_save"><i class="fas fa-calendar-check"></i>Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div> 
</body>
</html>


<script>
    var BASE_URL = "<?php echo base_url(); ?>";
    var hrController = "<?php echo CONTROLLER_HR; ?>";

    var token = "<?php echo $_SESSION['li_token']; ?>";

    $(document).ready( function () {
      $("#employee_loan_request_rejection_reason").closest(".form-group.row").hide();

      $('#new_loan_request_modal_form').validate({
            rules: {
              requested_amount_for_new_request: {
                              required: true,
                          }
                },
                messages: {
                  requested_amount_for_new_request: "Please enter the amount"
                
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
        
  
    $('#new_request_data_table').DataTable({
   
   "ajax": {
       "url": BASE_URL + "index.php/" +  hrController + "/get_emp_new_loan_request_details",
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
              //  return `
              //     <div class="operations"><a href="#" class="view" onclick="viewNewRequest('${data}');"><i class="fas fa-eye"></i>View</a>  </div>`;
              return `
                  <div class="operations"> 
               
                  <a href="#" class="view" onclick="viewNewLoanRequest('${data}');"><i class="fas fa-eye" ></i>View</a>
                
                  </div>`;
           }
       }
   ],
  
     "initComplete": function(settings, json) {
       customizeDataTable('new_request_data_table');
   }

});



});

function hideRejectionSatus(){
    if ($("#new_request_status_id").val() == '4') {
       
        $("#employee_loan_request_rejection_reason").closest(".form-group.row").show();
    } else {
       
        $("#employee_loan_request_rejection_reason").closest(".form-group.row").hide();
    }
}

$("#new_request_status_id").change(function() {
  hideRejectionSatus();
});

function viewNewLoanRequest(row_id) 
{
  alert("view id is" +row_id);
  $("#row_id").val(row_id);
  flag_id=$("#flag_id").val("1");
  $('#new_request_data_table_modal').modal('show')
    $.ajax({
        type: 'GET',
        url: BASE_URL + "index.php/" + hrController + "/get_emp_new_request_by_id",
        data: {row_id:row_id,li_token: token,flag_id: $("#flag_id").val()},
        dataType: 'json',
        success: function(response) {
          console.log("Loan Request",response);
         
            if (response) 
            {
              $('#new_request_data_table_modal').modal('show');
              $("#new_request_employee_id").val(response.data.employee_id).trigger('change');
              $("#new_request_date_of_request").val(response.data.date_of_request);
              $("#loan_type_id_for_new_request").val(response.data.loan_type_id).trigger('change');
              $("#requested_amount_for_new_request").val(response.data.requested_amount);
              $("#new_request_status_id").val(response.data.loan_request_status_id).trigger('change');
              $("#employee_loan_request_rejection_reason").val(response.data.rejection_reason);
              var disable_new_request = $("#new_request_employee_id, #new_request_date_of_request, #requested_amount_for_new_request,#loan_type_id_for_new_request");
              disable_new_request.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                // Show the .modal-footer when the modal is hidden
              $("#new_request_data_table_modal").on("hidden.bs.modal", function () 
                {
                  disable_new_request.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
                });
            }
             else 
             {
                console.error('Response does not contain department_name.');
             }
        },
        error: function(xhr, status, error) {
            console.error(xhr, status, error);
        }
    });
}
// loan_verified_modal_form
$("#btn_new_request_save").click (function(){
 if ($('#new_loan_request_modal_form').valid()) {
    var formData  = new FormData();
                formData.append('employee_id', $("#new_request_employee_id").val());
                formData.append('date_of_request', $("#new_request_date_of_request").val());  
                formData.append('loan_type_id', $("#loan_type_id_for_new_request").val());
                formData.append('requested_amount', $("#requested_amount_for_new_request").val());
                formData.append('new_request_status_id', $("#new_request_status_id").val());
                formData.append('rejection_reason', $("#employee_loan_request_rejection_reason").val());
                formData.append('flag_id', $("#flag_id").val()); 
                formData.append('row_id', $("#row_id").val()); 
                formData.append('li_token', token); 
        
          $.ajax({
              url: BASE_URL + "index.php/" + hrController + "/save_emp_new_loan_request_details",
              type: 'POST',
              data:  formData,
              dataType: "JSON",
              processData: false,
              contentType: false,
              success: function(response) {
                console.log("response",response);
                showToast('success',response.message);
                $('#new_request_data_table_modal').modal('hide');
                $('#loan_approval_data_table').DataTable().ajax.reload();
                $('#new_request_data_table').DataTable().ajax.reload();
                $('#loan_verified_data_table').DataTable().ajax.reload();
                $('#loan_request_data_table').DataTable().ajax.reload();
                // 
              },
              error: function(xhr, status, error) {
                  console.log(xhr.responseText);
                  console.log(status);
                  console.log(error);
              }
          });
    }
    
}); 





</script>

