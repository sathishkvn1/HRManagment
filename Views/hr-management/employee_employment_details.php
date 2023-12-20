
<div id="work_history_tab" class="reviewBlock">
        <div id="" class="reviewBlock">
             <div class="combined_buttons">
                 <div class="add_new_btn_div">
                      <?php 
                      if($branch_add=='yes'):
                      ?>
                   <button id="employee_employment_details_data_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
                  <?php endif;?>
                  </div>
                
              
             </div>
          </div>
</div>
                       
<!-- table  -->
    <table id="employee_employment_details_data_table" class="table table-striped">
        <thead>
            <tr>     
                <th>Employe</th>
                <th>Branch </th>
                <th>Department </th>
                <th>Job Title </th>
                <th>Pay Scale </th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            </tr>
        </tbody>
    </table>
 <!-- ./ table start -->     
 
    <!-- modal employement -->
    <div class="modal fade data-table-modal" id="employee_employment_details_data_table_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Employee Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="employment_status_modal_form" class="modal_form">
                     <!--one field  text field---- -->
                        <div class="form-group row">
                            <div class="col-3">
                            <label for="recipient-name" class="col-form-label required">Employee Branch</label>
                            </div>
                            <div class="col-8">
                                <select name="branch_id"  id="branch_id" class="form-control select2">
                                     <option value="">Select branch</option>
                                                <?php
                                                    if (isset($branches)):
                                                            foreach ($branches as $row):
                                                                $employee_branch = $row->branch_name;
                                                                $id = $row->id;                       
                                                ?>
                                                            <option value="<?php echo $id; ?>"><?php echo $employee_branch; ?> </option>
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
                                <label for="department_id" class="col-form-label required">Employee Department </label>
                            </div>
                            <div class="col-8">
                                 <select name="department_id" id="department_id" class="form-control select2">
                                 <option value="">Select Department</option>
                                       
                                  </select>

                            </div>
                        </div>
                    <!-- ./ one field ---- -->                              
                     <!--one field  text field---- -->
                        <div class="form-group row">
                            <div class="col-3">
                            <label for="recipient-name" class="col-form-label required">Employee</label>
                            </div>
                            <div class="col-8">
                                <!-- <input type="text" class="form-control" id="employment_status" name="employment_status"> -->
                                <select name="work_history_employee_id"  id="work_history_employee_id"class="form-control  select2" >
                                        <option value="">Select Employee</option>                 
                                    
                                </select>
                            </div>
                        </div>
                    <!-- ./ one field ---- -->                           
                    <!--one field  text field---- -->
                        <div class="form-group row">
                            <div class="col-3">
                            <label for="job_title_id" class="col-form-label required">Employee Job</label>
                            </div>
                            <div class="col-8">
                            <select name="job_title_id"  id="job_title_id"class="form-control select2">
                                 <option value="">Select Job</option>  
                            <?php
                                                    if (isset($jobtitles)):
                                                            foreach ($jobtitles as $row):
                                                                $job_title = $row->job_title;
                                                                $id = $row->id;
                                                                        
                                                ?>
                                                     <option value="<?php echo $id; ?>" ><?php echo $job_title;?>  </option>
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
                            <label for="pay_scale_id" class="col-form-label required">Pay Scale</label>
                            </div>
                            <div class="col-8">
                            <select name="pay_scale_id"  id="pay_scale_id" class="form-control select2">
                                <option value="">Select PayScale</option>    
                            <?php
                            
                                                    if (isset($payscale)):
                                                            foreach ($payscale as $row):
                                                                $pay_scale_name = $row->pay_scale_name;
                                                                $id = $row->id;
                                                                        
                                                ?>
                                                        

                                                            <option value="<?php echo $id; ?>" >
                                                                <?php echo $pay_scale_name   ; ?>
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
                            <label for="employment_status_id" class="col-form-label required">Employee Status</label>
                            </div>
                            <div class="col-8">
                            <select name="employment_status_id"  id="employment_status_id"class="form-control select2" required>
                                <option value="">Select Status</option>  
                           <?php
                                                    if (isset($employee_status)):
                                                            foreach ($employee_status as $row):
                                                                $employment_status = $row->employment_status;
                                                                $id = $row->id;
                                                                        
                                                ?>
                                                            
                                                            <option value="<?php echo $id; ?>" >
                                                                <?php echo $employment_status   ; ?>
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
              <button type="button" class="btn btn-default cancelbtn" id="btn_employment_status_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="btn_employee_employment_details_save"><i class="fas fa-calendar-check"></i>Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
     <!-- /.modal for company department-->



     

   <!-- ./modal employement -->

  
    
     
  
<?php include("bottom-js.php"); ?>     

<script>
     var BASE_URL = "<?php echo base_url(); ?>";
 var hrController = "<?php echo CONTROLLER_HR; ?>";
 var token = "<?php echo $_SESSION['li_token']; ?>";

function get_depatment_option_by_branch_id_in_work_history(branch_id,department_id){
 
     if (branch_id !== '') {
        $('#department_id').html('<option value="">Select Department</option>');
        $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/get_departments_by_branch",
            method: "POST",
            data: { branch_id: branch_id, li_token: token }, 
            dataType: "json",
            success: function (data) {
                $.each(data, function (index, department) {
                    $('#department_id').append('<option value="' + department.id + '">' + department.department_name + '</option>');
                });
                if($("#flag_id").val()=='1'){
                 $('#department_id').val(department_id);
                  }
               
            }
        });
    } 
}

function get_employee_option_by_department_id_in_work_history(department_id,work_history_employee_id){
//   var department_id = $('#department_id').val();

  if(department_id != '')
  {
   $.ajax({
     url: BASE_URL + "index.php/" + hrController + "/get_employee_by_departments",
    method:"POST",
    data: { department_id: department_id, li_token: token }, 
    dataType: "json",
    success: function (data) {
        $('#work_history_employee_id').empty();
        $('#work_history_employee_id').html('<option value="">Select a leader</option>');
                $.each(data, function (index, employee) {
                    $('#work_history_employee_id').append('<option value="' + employee.employee_id + '">' + employee.employee_name + '</option>');
                });
                if($("#flag_id").val()=='1'){
                 $('#work_history_employee_id').val(work_history_employee_id);
            }
            }
   })
  }
  else
  {
   $('#work_history_employee_id').html('<option value="">Select a leader</option>');
  }
}



$(document).ready(function () {
    $('#branch_id').on("change", function () {
        var branch_id = $('#branch_id').val();
        var department_id = $('#department_id').val();
        get_depatment_option_by_branch_id_in_work_history(branch_id,department_id);
    });
    $('#department_id').on("change", function () {
        var department_id = $('#department_id').val();
   
        var work_history_employee_id = $('#work_history_employee_id').val();
         get_employee_option_by_department_id_in_work_history(department_id,work_history_employee_id);
    });
});



// load job item data table
$(document).ready( function () {
    $('#employee_employment_details_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" +  hrController + "/get_employee_employment_details",
            "dataSrc": "data"
        },
            "columns": [
        
            { data: "employee_name"},
            { data: "branch_name"},
            { data: "department_name"},
            { data: "job_title"},
            { data: "pay_scale_name"},
            { data: "employment_status"},
            {
                data: "id",
                render: function (data, type, full, row) {
                   
                    return `
                        <div class="operations">
                        <?php if($branch_edit=='yes'): ?>
                            <a href="#" class="edit" onclick="employeeEmploymentDetailsEditRow('${data}');"><i class="fas fa-edit"></i>Edit</a>
                            <?php endif;
                            if($branch_view=='yes'): ?>
                            <a href="#" class="view" onclick="employeeEmploymentDetailsViewRow('${data}');"><i class="fas fa-eye"></i>View</a>
                            <?php endif;
                            if($branch_delete=='yes'): ?>
                            <a href="#" class="delete" onclick="employeeEmploymentDetailsDeleteRow('${data}');"><i class="fas fa-trash"></i>Delete</a>
                            <?php endif; ?>
                        </div>`;
                }
            }
        ],


        "initComplete": function(settings, json) {
            customizeDataTable('employee_employment_details_data_table');
        }
    });
});




 $("#btn_employee_employment_details_save").on("click",function() { 
        if ($('#employment_status_modal_form').valid()) {
            var formData  = new FormData();
         
            formData.append('employee_id', $("#work_history_employee_id").val());
            formData.append('branch_id', $("#branch_id").val()); 
            formData.append('department_id', $("#department_id").val());
            formData.append('job_title_id', $("#job_title_id").val());
            formData.append('pay_scale_id', $("#pay_scale_id").val());
            formData.append('employment_status_id', $("#employment_status_id").val());
            formData.append('flag_id', $("#flag_id").val()); 
            formData.append('row_id', $("#row_id").val()); 
            formData.append('li_token', token); 
                $.ajax({
                        url: BASE_URL + "index.php/" + hrController + "/save_employee_employment_details",
                        type: 'POST',
                        data:  formData,
                        dataType: "JSON",
                        processData: false,
                        contentType: false,
                            success: function(response) {
                                console.log("response",response);
                                console.log(response.message);
                                $('#employee_employment_details_data_table_modal').modal('hide');
                                    $('#employee_employment_details_data_table').DataTable().ajax.reload();
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


     //view button
function employeeEmploymentDetailsViewRow(row_id) {
   
    $.ajax({
       url: BASE_URL + "index.php/" + hrController + "/get_employee_employment_details_by_id",
       type: "POST",
       data: { row_id: row_id, li_token: token},
       dataType: "json",
       success: function (response) {
           console.log("response is" ,response);
           if (response.success) {
               $("#work_history_employee_id").val(response.data.employee_id).trigger('change');
               $("#job_title_id").val(response.data.job_title_id).trigger('change');
               $("#pay_scale_id").val(response.data.pay_scale_id).trigger('change'); 
               $("#employment_status_id").val(response.data.employment_status_id).trigger('change');
               $("#branch_id").val(response.data.branch_id).trigger('change');
               $("#department_id").val(response.data.department_id).trigger('change'); 
               $("#employee_employment_details_data_table_modal").modal("show");

               var disable_employee_employment_data = $("#work_history_employee_id, #branch_id, #department_id, #job_title_id,#pay_scale_id,#employment_status_id");
               disable_employee_employment_data.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
               $(".modal-footer .savebtn").hide();
                // Show the .modal-footer when the modal is hidden
                $("#employee_employment_details_data_table_modal").on("hidden.bs.modal", function () 
                {
                    $(".modal-footer .savebtn").show();
                    disable_employee_employment_data.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
                });
                if($("#flag_id").val()=='1')
               {
                get_depatment_option_by_branch_id_in_work_history(response.data.branch_id,response.data.department_id);
            get_employee_option_by_department_id_in_work_history(response.data.department_id,response.data.employee_id);
               }
               
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


function employeeEmploymentDetailsEditRow(row_id) {
   $("#row_id").val(row_id);
   $("#flag_id").val(1);
//    $('#work_history_employee_id').empty();
  $.ajax({
      url: BASE_URL + "index.php/" + hrController + "/get_employee_employment_details_by_id",
      type: "POST",
      data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val()},
      dataType: "json",
      success: function (response) {
          // console.log(response is ,response);
          if (response.success) {
              $("#work_history_employee_id").val(response.data.employee_id).trigger('change');
              
            //   $("#department_id").val(response.data.department_id).trigger('change');
              $("#job_title_id").val(response.data.job_title_id).trigger('change');
              $("#pay_scale_id").val(response.data.pay_scale_id).trigger('change'); 
              $("#employment_status_id").val(response.data.employment_status_id).trigger('change'); 
              $("#branch_id").val(response.data.branch_id).trigger('change');
               $("#department_id").val(response.data.department_id).trigger('change');
              if($("#flag_id").val()=='1')
               {
                 get_depatment_option_by_branch_id_in_work_history(response.data.branch_id,response.data.department_id);
                 get_employee_option_by_department_id_in_work_history(response.data.department_id,response.data.employee_id);
               }
              
             
              
              $("#employee_employment_details_data_table_modal").modal("show");
          } else {
              alert("Failed to fetch item.");
          }
      },
      error: function (xhr, status, error) {
          alert("Error fetching item.");
      }
  });
}


// delete button
function employeeEmploymentDetailsDeleteRow(row_id) {
    alert('Delete clicked with id: ' + row_id);
    if (confirm("Are you sure you want to delete this item?")) {
        $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/delete_employee_employment_details_by_id",
            type: "POST",
            data: { row_id: row_id, li_token: token },
            dataType: "json",
            success: function (response) {
                $('#employee_employment_details_data_table_modal').modal('hide');
                 $('#employee_employment_details_data_table').DataTable().ajax.reload();
                  showToast('success', response.message); 
                
            },
           
            error: function (xhr, status, error) {
                
                alert_message("failure", "Error", "Error delete job title item.");
            }
        });
    }
  
}
// delete button


</script>

<script>
$(document).ready(function () {

    $("#btn_employee_employment_details_filter").on("click", function () {
      var selectedemployee_name = $("#work_history_filter_employee_id option:selected").text(); // Get the selected text 

        // Use filter
        var table = $('#employee_employment_details_data_table').DataTable();
        table.column(0).search(selectedemployee_name);
        table.draw();
        // $("#employee_employment_details_data_table_filter_modal").modal("hide");

    });


    //validation
$('#employment_status_modal_form').validate({
    rules: {
        branch_id: {
         required: true,
         },
         department_id: {
         required: true,
        },
        work_history_employee_id: {
         required: true,
        },
        job_title_id: {
         required: true,
        },
        pay_scale_id: {
            required: true,
        },
        employment_status_id: {
            required: true,
        }
    },
    messages: {
                     branch_id: "Please select a branch",
                     department_id: "Please select a depatment",
                     job_title_id: "Please select a job",
                     work_history_employee_id: "Please select a employee",
                     pay_scale_id: "Please select a payscale",
                     employment_status_id: "Please select a status"
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


// ./validation 
});



 

//  filter box




$("#employee_employment_details_data_table_add_new").on("click", function() {
    $("#flag_id").val("0");

    var modalId = "#employee_employment_details_data_table_modal";
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


