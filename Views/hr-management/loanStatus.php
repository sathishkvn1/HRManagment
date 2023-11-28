
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Status</title>
</head>

<body>
                <div id="education_tab" class="reviewBlock">
                    <div class="ant-card ant-card-bordered ant-card-small" style="width: 100%;">
                        <div class="ant-card-head">
                               <div class="name" id="click">
                               Loan Status
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
                        <table id="loan_status_data_table" class="table table-striped">
                        <thead>
                            <tr>     
                                <th> Loan Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        </table>
                        <!-- ./ table start -->
                
 <div class="modal fade data-table-modal" id="contact_data_table_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Loan Status</h4>
             
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="contact_modal_form" class="modal_form">
                   
                 
                        <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="education_name" class="col-form-label required">Loan Status</label>
                    </div>
                    <div class="col-8">
                    
                      <select class="form-control" id="emp_loan_status" name="emp_loan_status">
                      <?php
                          if (isset($status)):  
                            foreach ($status as $row):
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
                 
                 
                 
               
              </form>
            
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="btn_pay_scales_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="btn_emp_loan_status_save"><i class="fas fa-calendar-check"></i>Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div> 
    <?php include("bottom-js.php"); ?>            
</body>
</html>

<script>
    var BASE_URL = "<?php echo base_url(); ?>";
    var hrController = "<?php echo CONTROLLER_HR; ?>";

    var token = "<?php echo $_SESSION['li_token']; ?>";

    $(document).ready( function () {
    // $('#contact_data_table').DataTable();
    // customizeDataTable('contact_data_table');
    $('#loan_status_data_table').DataTable({
   
   "ajax": {
       "url": BASE_URL + "index.php/" +  hrController + "/get_emp_contact_details",
       "dataSrc": "data"
   },
   "columns": [
     
       { data: "employee_name" },
       { data: "contact_person_name" },
       { data: "relation_with_employee"},
       { data: "mobile_phone"},
       
       {
           data: "id",
           render: function (data, type, row) {
               return `
                  <div class="operations"> 
                  <a href="#" class="edit"  onclick="editContacts('${data}');"><i class="fas fa-edit"></i>Edit</a>
                  <a href="#" class="view" onclick="viewContacts('${data}');"><i class="fas fa-eye" ></i>View</a>
                  <a href="#" class="delete" onclick="deleteContacts('${data}');"><i class="fas fa-trash" ></i>Delete</a>
                  </div>`;
            
           }
           
       }
   ],
  
     "initComplete": function(settings, json) {
       customizeDataTable('loan_status_data_table');
   }

});

  
  });


  
  $('#contact_modal_form').validate({
  rules: {
          education_name: {
                              required: true,
                          },
      education_description: {
                              required: true,
                          }
                },
                messages: {
                  education_name: "Please enter a education name",
                  education_description: "Please enter a education description"
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

$("#btn_emp_contact_save").click (function(){
  // if ($('#contact_modal_form').valid()) {
      var formData  = new FormData();
                  formData.append('employee_id', $("#contact_employee_id").val());
                  formData.append('contact_person_name', $("#contact_person_name").val());  
                  formData.append('relation_with_employee_id', $("#contact_relation_with_employee_id").val());
                  formData.append('home_phone', $("#home_phone").val());
                  formData.append('work_phone', $("#work_phone").val());
                  formData.append('mobile_phone', $("#mobile_phone").val());

                  formData.append('flag_id', $("#flag_id").val()); 
                  formData.append('row_id', $("#row_id").val()); 
                  formData.append('li_token', token); 
          
            $.ajax({
                url: BASE_URL + "index.php/" + hrController + "/save_emp_contact_details",
                type: 'POST',
                data:  formData,
                dataType: "JSON",
                processData: false,
                contentType: false,
                success: function(response) {
                  console.log("response",response);
                  showToast('success',response.message);
                  $('#contact_data_table_modal').modal('hide');
                  $('#contact_data_table').DataTable().ajax.reload();

                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    console.log(status);
                    console.log(error);
                }
            });
    //  }
      
}); 

function viewContacts(row_id) 
 {
  
    $.ajax({
        type: 'GET',
        url: BASE_URL + "index.php/" + hrController + "/get_emp_contacts_by_id",
        data: { row_id: row_id },
        dataType: 'json',
        success: function(response) {
            if (response) {
                console.log(response);
                $('#contact_data_table_modal').modal('show');
              $("#contact_employee_id").val(response.data.employee_id);
              $("#contact_person_name").val(response.data.contact_person_name);
              $("#contact_relation_with_employee_id").val(response.data.relation_with_employee_id);
              $("#home_phone").val(response.data.home_phone);
              $("#work_phone").val(response.data.work_phone);
              $("#mobile_phone").val(response.data.mobile_phone);
              
            
              var disableElements = $("input, select").prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                disableElements.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
               $(".modal-footer .savebtn").hide();
                // Show the .modal-footer when the modal is hidden
                $("#contact_data_table_modal").on("hidden.bs.modal", function () 
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

function editContacts(row_id) {
  alert(row_id);
    $("#row_id").val(row_id);
    flag_id=$("#flag_id").val("1");
    $('#contact_data_table_modal').modal('show');

    $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/get_emp_contacts_by_id",
        type: "GET",
        data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val() },
        dataType: "json",
        success: function (response) {
              console.log("response is" ,response);
            if (response.success) {
              $('#contact_data_table_modal').modal('show');
              $("#contact_employee_id").val(response.data.employee_id);
              $("#contact_person_name").val(response.data.contact_person_name);
              $("#contact_relation_with_employee_id").val(response.data.relation_with_employee_id);
              $("#home_phone").val(response.data.home_phone);
              $("#work_phone").val(response.data.work_phone);
              $("#mobile_phone").val(response.data.mobile_phone);
              
             
              $("#contact_employee_id").prop("disabled", true).css("cursor", "not-allowed");
              $("#contact_employee_id").prop("readonly", true).css("cursor", "not-allowed");

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

function deleteContacts(row_id) {
  
  if (confirm("Are you sure you want to delete this department?")) {
      $.ajax({
          type: 'POST',
          url: BASE_URL + "index.php/" + hrController + "/delete_emp_contacts_by_id",
          data: { row_id: row_id, li_token: token },
          dataType: 'json',
          success: function (response) {
              if (response && response.success) {
                showToast('success', response.message); 
                  
                  $('#contact_data_table').DataTable().ajax.reload();
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