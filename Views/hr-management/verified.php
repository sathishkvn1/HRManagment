
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verified</title>
</head>

<body>
       <!-- --- discription ---- -->
             <div id="company_structure_table_top" class="reviewBlock">
                <div class="ant-card ant-card-bordered ant-card-small" style="width: 100%;">
            
                   <div class="ant-card-head">
                            
                       <div class="name">
                               Verified
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
                            <table id="loan_verified_data_table" class="table table-striped">
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
                

       
    
    
 <!-- modal for loan request -->
 <div class="modal fade data-table-modal" id="loan_verified_data_table_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Loan Request</h4>
             
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="loan_verified_modal_form" class="modal_form">
                    <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="employee_id" class="col-form-label required">Employee Name</label>
                    </div>
                    <div class="col-8">
                     <select class="form-control select2" id="employee_id_fr_verify" name="employee_id_fr_verify">
                        
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
                      <input type="date" class="form-control" id="date_of_request_for_verify" name="date_of_request_for_verify">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->  
                     
                        <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="education_name" class="col-form-label required">Loan Type</label>
                    </div>
                    <div class="col-8">
                    
                      <select class="form-control select2" id="loan_type_id_for_verify" name="loan_type_id_for_verify">
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
                      <input type="text" class="form-control" id="requested_amount_for_verify" name="requested_amount_for_verify">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->   

                 <!--one field  text field---- -->
                   <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Loan Request Status</label>
                    </div>
                    <div class="col-8">
                    
                    <select class="form-control select2" id="status_id_for_verify" name="status_id_for_verify">
                    <option value="" >Select Status</option>
                    <?php if (isset($verify_status)): ?>
                        <?php foreach ($verify_status as $row): ?>
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
                        <input type="text" name="request_rejection_reason"  id="request_rejection_reason"class="form-control ">
                        </input>
                      </div>
                    </div>
                  <!-- ./ one field ---- -->    
                 
                 

                 
               
              </form>
            
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="btn_pay_scales_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="btn_verified_save"><i class="fas fa-calendar-check"></i>Save</button>
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
      $("#request_rejection_reason").closest(".form-group.row").hide();

    $('#loan_verified_data_table').DataTable({
    
   
   "ajax": {
       "url": BASE_URL + "index.php/" +  hrController + "/get_emp_verified_loan_details",
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
               
                  <a href="#" class="view" onclick="viewloanVerified('${data}');"><i class="fas fa-eye" ></i>View</a>
                
                  </div>`;
           }
       }
   ],
  
     "initComplete": function(settings, json) {
       customizeDataTable('loan_verified_data_table');
   }

});

$('#loan_verified_modal_form').validate({
            rules: {
              requested_amount_for_verify: {
                              required: true,
                          }
                },
                messages: {
                  requested_amount_for_verify: "Please enter the amount"
                
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
        



});
function viewloanVerified(row_id) 
{
 alert(row_id);
 $("#row_id").val(row_id);
 flag_id=$("#flag_id").val("1");
  $('#loan_verified_data_table_modal').modal('show')
    $.ajax({
        type: 'GET',
        url: BASE_URL + "index.php/" + hrController + "/get_emp_verified_by_id",
        data: {  row_id: row_id, li_token: token,flag_id: $("#flag_id").val() },
        dataType: 'json',
        success: function(response) {
          console.log("Loan Request",response);
          console.log(response.data.date_of_request);
            if (response) 
            {
              $('#loan_verified_data_table_modal').modal('show');
              $("#employee_id_fr_verify").val(response.data.employee_id).trigger('change');
              $("#date_of_request_for_verify").val(response.data.date_of_request);
              $("#loan_type_id_for_verify").val(response.data.loan_type_id).trigger('change');
              $("#requested_amount_for_verify").val(response.data.requested_amount);
              $("#status_id_for_verify").val(response.data.loan_request_status_id).trigger('change');
               var disable_new_request = $("#employee_id_fr_verify, #date_of_request_fr_verify, #loan_type_id_for_verify,#requested_amount_for_verify");
               disable_new_request.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                // Show the .modal-footer when the modal is hidden
                $("#loan_verified_data_table_modal").on("hidden.bs.modal", function () 
                {
                  disable_new_request.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
                });
         
            }
             else {
                console.error('Response does not contain department_name.');
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr, status, error);
        }
    });
}

$("#btn_verified_save").on("click",function() { 
  if ($('#loan_verified_modal_form').valid()) { 
          var formData  = new FormData();
          formData.append('loan_request_status_id', $("#status_id_for_verify").val());
          formData.append('rejection_reason', $("#request_rejection_reason").val());
          formData.append('row_id', $("#row_id").val()); 
          formData.append('flag_id', $("#flag_id").val()); 
          formData.append('li_token', token); 
            $.ajax({
                     url: BASE_URL + "index.php/" + hrController + "/save_loan_verification",
                     type: 'POST',
                     data:  formData,
                     dataType: "JSON",
                     processData: false,
                     contentType: false,
                        success: function(response) {
                              console.log("response",response);
                               console.log(response.message);
                               $('#loan_verified_data_table_modal').modal('hide');
                               $('#loan_request_data_table').DataTable().ajax.reload();
                                $('#loan_verified_data_table').DataTable().ajax.reload();
                                $('#new_request_data_table').DataTable().ajax.reload();
                                $('#loan_approval_data_table').DataTable().ajax.reload();
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

function hideRejectionSatusVerification(){
    if ($("#status_id_for_verify").val() == '4') {
       
        $("#request_rejection_reason").closest(".form-group.row").show();
    } else {
       
        $("#request_rejection_reason").closest(".form-group.row").hide();
    }
}

$("#status_id_for_verify").change(function() {
  hideRejectionSatusVerification();
});

</script>

