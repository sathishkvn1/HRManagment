
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approved</title>
</head>

<body>

            
                        <!--for loading CompanyStructure DataTable -->
                            <table id="loan_approval_data_table" class="table table-striped">
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
 <div class="modal fade data-table-modal" id="loan_approval_data_table_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Loan Request</h4>
             
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="loan_request_modal_form" class="modal_form">
                    <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="employee_id" class="col-form-label required">Employee Name</label>
                    </div>
                    <div class="col-8">
                     <select class="form-control select2" id="employee_id_fr_approval" name="employee_id_fr_approval">
                        <?php foreach ($employee_names as $employee_name): ?>
                            <option value="<?= $employee_name['id'] ?>"><?= $employee_name['employee_name'] ?></option>
                        <?php endforeach; ?>
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
                      <input type="date" class="form-control" id="date_of_request_fr_approval" name="date_of_request_fr_approval">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->  
                     
                        <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="education_name" class="col-form-label required">Loan Type</label>
                    </div>
                    <div class="col-8">
                    
                      <select class="form-control select2" id="loan_type_id_for_approval" name="loan_type_id_for_approval">
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
                      <input type="text" class="form-control" id="requested_amount_for_approval" name="requested_amount_for_approval">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->   


              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="btn_pay_scales_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="btn_approval_save"><i class="fas fa-calendar-check"></i>Save</button>
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

    $('#loan_approval_data_table').DataTable({
    
   
   "ajax": {
       "url": BASE_URL + "index.php/" +  hrController + "/get_emp_approval_loan_details",
       "dataSrc": "data"
   },
   "columns": [
     
       { data: "employee_name" },
       { data: "loan_type" },
       { data: "requested_amount"},
       { data: "loan_request_status"},
       {
           data: "id",
           render: function (data, type, row) 
           {
              //  return `
              //     <div class="operations"><a href="#" class="view" onclick="viewNewRequest('${data}');"><i class="fas fa-eye"></i>View</a>  </div>`;
              return `
                  <div class="operations"> 
                  <a href="#" class="view" onclick="viewloanApproveRequest('${data}');"><i class="fas fa-eye" ></i>View</a>
                  </div>`;
           }
       }
   ],
  
     "initComplete": function(settings, json) {
       customizeDataTable('loan_approval_data_table');
   }

});
});
function viewloanApproveRequest(row_id) 
{
 alert(row_id);
 $("#row_id").val(row_id);
 flag_id=$("#flag_id").val("1");
  $('#loan_approval_data_table_modal').modal('show');
    $.ajax({
        type: 'GET',
        url: BASE_URL + "index.php/" + hrController + "/get_emp_approval_by_id",
        data: {row_id: row_id, li_token: token,flag_id: $("#flag_id").val() },
        dataType: 'json',
        success: function(response) {
          console.log("Loan Request",response);
          console.log(response.data.date_of_request);
            if (response) 
            {
              $('#loan_approval_data_table_modal').modal('show');
              $("#employee_id_fr_approval").val(response.data.employee_id);
              $("#date_of_request_fr_approval").val(response.data.date_of_request);
              $("#loan_type_id_for_approval").val(response.data.loan_type_id);
              $("#requested_amount_for_approval").val(response.data.requested_amount);
              $("#status_id_fr_approval").val(response.data.loan_request_status_id);
              var disableElements = $("input, select").prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                disableElements.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
              //  var disable_new_request = $("#new_request_employee_id, #new_request_date_of_request, #requested_amount_for_new_request,#loan_type_id_for_new_request");
              //  disable_new_request.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                // Show the .modal-footer when the modal is hidden
                $("#loan_approval_data_table_modal").on("hidden.bs.modal", function () 
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

 

</script>

