<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dependents</title>
</head>

<body> -->
                <div id="education_tab" class="reviewBlock">
                    <div class="ant-card ant-card-bordered ant-card-small" style="width: 100%;">
                        <div class="ant-card-head">
                               <div class="name" id="click">
                               Dependents
                                </div>
                              
                                <div class="moreinfo" >
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
                       
                        <!-- table  -->
                        <table id="dependent_data_table" class="table table-striped">
                        <thead>
                            <tr>     
                                <th> Employee Name</th>
                                <th> Dependent Name</th>
                                <th> Relation with Employee</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        </table>
                        <!-- ./ table start -->
                
 <div class="modal fade data-table-modal" id="dependent_data_table_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Dependent</h4>
             
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="dependent_modal_form" class="modal_form">
                    <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="employee_id" class="col-form-label required">Employee Name</label>
                    </div>
                    <div class="col-8">
                     <select class="form-control select2" id="dependent_employee_id" name="dependent_employee_id">
                        
                      </select>

                    </div>
                  </div>
                     <!-- ./ one field ---- -->  
                         <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Dependent Name</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="dependent_name" name="dependent_name">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->  
                        <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="education_name" class="col-form-label required">Relation with Employee</label>
                    </div>
                    <div class="col-8">
                    
                      <select class="form-control select2" id="relation_with_employee_id" name="relation_with_employee_id">
                      <option value="" >Select Relation</option>
                      <?php
                          if (isset($dependents)):  
                            foreach ($dependents as $row):
                              $name = $row->relation;
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
                      <label for="recipient-name" class="col-form-label required">Date Of Birth </label>
                    </div>
                    <div class="col-8">
                      <input type="date" class="form-control" id="dependent_date_of_birth" name="dependent_date_of_birth">
                    </div>
                  </div>
                 <!-- ./ one field ---- --> 
                   <!--one field  text field---- -->
                   <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Aadhar Number</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="dependent_aadhar_number" name="dependent_aadhar_number">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->  
                   <!--one field  text field---- -->
                   <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Passport Number</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="dependent_passport_number" name="dependent_passport_number">
                    </div>
                  </div>
                 <!-- ./ one field ---- --> 
                 
               
              </form>
            
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="btn_pay_scales_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="btn_emp_dependent_save"><i class="fas fa-calendar-check"></i>Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div> 
 
<!-- </body>
</html> -->

<script>
    var BASE_URL = "<?php echo base_url(); ?>";
    var hrController = "<?php echo CONTROLLER_HR; ?>";
    var token = "<?php echo $_SESSION['li_token']; ?>";

    $(document).ready( function () {
    // $('#dependent_data_table').DataTable();
    // customizeDataTable('dependent_data_table');
    $('#dependent_data_table').DataTable({
   
   "ajax": {
       "url": BASE_URL + "index.php/" +  hrController + "/get_emp_dependent_details",
       "dataSrc": "data"
   },
   "columns": [
     
       { data: "employee_name" },
       { data: "dependent_name" },
       { data: "relation_with_employee"},
       
       {
           data: "id",
           render: function (data, type, row) {
               return `
                  <div class="operations"> 
                  <a href="#" class="edit"  onclick="editDependents('${data}');"><i class="fas fa-edit"></i>Edit</a>
                  <a href="#" class="view" onclick="viewDependents('${data}');"><i class="fas fa-eye" ></i>View</a>
                  <a href="#" class="delete" onclick="deleteDependents('${data}');"><i class="fas fa-trash" ></i>Delete</a>
                  </div>`;
            
           }
           
       }
   ],
  
     "initComplete": function(settings, json) {
       customizeDataTable('dependent_data_table');
   }

});


$('#dependent_modal_form').validate({
  rules: {
          dependent_name: {
                              required: true,
                          }
                },
                messages: {
                  dependent_name: "Please enter the name"

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


  


$("#btn_emp_dependent_save").click (function(){
   if ($('#dependent_modal_form').valid()) {
      var formData  = new FormData();
                  formData.append('employee_id', $("#dependent_employee_id").val());
                  formData.append('dependent_name', $("#dependent_name").val());  
                  formData.append('relation_with_employee_id', $("#relation_with_employee_id").val());
                  formData.append('date_of_birth', $("#dependent_date_of_birth").val());
                  formData.append('aadhar_number', $("#dependent_aadhar_number").val());
                  formData.append('passport_number', $("#dependent_passport_number").val());

                  formData.append('flag_id', $("#flag_id").val()); 
                  formData.append('row_id', $("#row_id").val()); 
                  formData.append('li_token', token); 
          
            $.ajax({
                url: BASE_URL + "index.php/" + hrController + "/save_emp_dependent_details",
                type: 'POST',
                data:  formData,
                dataType: "JSON",
                processData: false,
                contentType: false,
                success: function(response) {
                  console.log("response",response);
                  showToast('success',response.message);
                  $('#dependent_data_table_modal').modal('hide');
                  $('#dependent_data_table').DataTable().ajax.reload();

                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    console.log(status);
                    console.log(error);
                }
            });
    }
      
}); 

function viewDependents(row_id) 
 {
  
    $.ajax({
        type: 'GET',
        url: BASE_URL + "index.php/" + hrController + "/get_emp_dependents_by_id",
        data: { row_id: row_id },
        dataType: 'json',
        success: function(response) {
            if (response) {
                console.log(response);
                $('#dependent_data_table_modal').modal('show');
              $("#dependent_employee_id").val(response.data.employee_id).trigger('change');
              $("#dependent_name").val(response.data.dependent_name);
              $("#relation_with_employee_id").val(response.data.relation_with_employee_id).trigger('change');
              $("#dependent_date_of_birth").val(response.data.date_of_birth);
              $("#dependent_aadhar_number").val(response.data.aadhar_number);
              $("#dependent_passport_number").val(response.data.passport_number);
              
            
              var disableElements = $("input, select").prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                disableElements.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
               $(".modal-footer .savebtn").hide();
                // Show the .modal-footer when the modal is hidden
                $("#dependent_data_table_modal").on("hidden.bs.modal", function () 
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

function editDependents(row_id) {
  alert(row_id);
    $("#row_id").val(row_id);
    flag_id=$("#flag_id").val("1");
    $('#dependent_data_table_modal').modal('show');

    $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/get_emp_dependents_by_id",
        type: "GET",
        data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val() },
        dataType: "json",
        success: function (response) {
              console.log("response is" ,response);
            if (response.success) {
                $('#dependent_data_table_modal').modal('show');
              $("#dependent_employee_id").val(response.data.employee_id).trigger('change');
              $("#dependent_name").val(response.data.dependent_name);
              $("#relation_with_employee_id").val(response.data.relation_with_employee_id).trigger('change');
              $("#dependent_date_of_birth").val(response.data.date_of_birth);
              $("#dependent_aadhar_number").val(response.data.aadhar_number);
              $("#dependent_passport_number").val(response.data.passport_number);
             
              $("#dependent_employee_id").prop("disabled", true).css("cursor", "not-allowed");
              $("#dependent_employee_id").prop("readonly", true).css("cursor", "not-allowed");

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

function deleteDependents(row_id) {
  
  if (confirm("Are you sure you want to delete this department?")) {
      $.ajax({
          type: 'POST',
          url: BASE_URL + "index.php/" + hrController + "/delete_emp_dependents_by_id",
          data: { row_id: row_id, li_token: token },
          dataType: 'json',
          success: function (response) {
              if (response && response.success) {
                showToast('success', response.message); 
                  
                  $('#dependent_data_table').DataTable().ajax.reload();
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




</script>