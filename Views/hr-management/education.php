
                <div id="education_tab" class="reviewBlock">
                    <div class="ant-card ant-card-bordered ant-card-small" style="width: 100%;">
                        <div class="ant-card-head">
                               <div class="name" id="click">
                                    Education
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
                      <table id="education_data_table" class="table table-striped">
                        <thead>
                            <tr> 
                                  
                                <th> Employee Name</th>
                                <th> Education Name</th>
                                <th> Institute Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                        <!-- ./ table start -->
                
 <div class="modal fade data-table-modal" id="education_data_table_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Education</h4>
             
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="education_modal_forms" class="modal_form">
                    <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="employee_id_for_education" class="col-form-label required">Employee Name</label>
                    </div>
                    <div class="col-8">
                     <select class="form-control select2" id="employee_id_for_education" name="employee_id_for_education">
                      <option value="">select employee</option>
                     
                      </select>

                    </div>
                  </div>
                     <!-- ./ one field ---- -->  
                        <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="education_name" class="col-form-label required">Education Name</label>
                    </div>
                    <div class="col-8">
                    
                      <select class="form-control select2" id="education_id" name="education_id">
                      <option value="" >Select Education</option>
                      <?php
                          if (isset($education_details)):  
                            foreach ($education_details as $row):
                              $name = $row->education_name;
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
                      <label for="recipient-name" class="col-form-label required">Institute Name</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="institute_name" name="institute_name">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->   
                  <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Start Date</label>
                    </div>
                    <div class="col-8">
                      <input type="date" class="form-control" id="start_date" name="start_date">
                    </div>
                  </div>
                 <!-- ./ one field ---- --> 
                   <!--one field  text field---- -->
                   <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Completed Date</label>
                    </div>
                    <div class="col-8">
                      <input type="date" class="form-control" id="completed_date" name="completed_date">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->  
                   <!--one field  text field---- -->
                   <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Score Grade</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="score_grade" name="score_grade">
                    </div>
                  </div>
                 <!-- ./ one field ---- --> 
                   <!--one field  text field---- -->
                   <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Details</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="details" name="details">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->                     
               
              </form>
            
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="btn_pay_scales_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="btn_emp_education_save"><i class="fas fa-calendar-check"></i>Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div> 

    <!-- ./filter modal-->
    <div class="modal fade data-table-modal" id="education_data_table_filter_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Employee Education</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="employment_status_filter_modal_form" class="modal_form">
                  <!--one field  text field---- -->
                      <div class="form-group row">
                          <div class="col-3">
                          <label for="recipient-name" class="col-form-label required">Employee</label>
                          </div>
                          <div class="col-8">
                        
                          <select name="filter_employee_id_education select2" id="filter_employee_id_education" class="form-control select2">
                          <option value="0">Select Employee</option>
                         
                      </select>

                          </div>
                      </div>
                    <!-- ./ one field ---- -->          
                        
                  <!--one field  text field---- -->
                      <div class="form-group row">
                          <div class="col-3">
                          <label for="recipient-name" class="col-form-label required">Qualification</label>
                          </div>
                          <div class="col-8">
                              <select name="filter_employee_qualification"  id="filter_employee_qualification"class="form-control select2">
                                <option value="0">Not Applicable</option>
                               
                                <?php

                          if (isset($education_details)):  
                            foreach ($education_details as $row):
                              $name = $row->education_name;

                     ?>
                                                        <option value="<?php echo $row->id; ?>"><?php echo $name; ?></option>
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
             <button id="btn_employee_education_data_table_filter" class="btn savebtn">Apply Filter</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<!-- ./filter modal -->
  
  
 


<script>
    var BASE_URL = "<?php echo base_url(); ?>";
    var hrController = "<?php echo CONTROLLER_HR; ?>";

    var token = "<?php echo $_SESSION['li_token']; ?>";
  


    $(document).ready( function () {
      $('#education_modal_forms').validate({
  rules: {
    institute_name: {
      required: true,
    },
    start_date: {
      required: true,
    },
    completed_date: {
      required: true,
    },
    score_grade: {
      required: true
    },
    employee_id_for_education: {
               required: true
            }
  },
  messages: {
    institute_name: "Please enter an institute name",
    start_date: "Please enter the start date",
    completed_date: "Please enter the completed date",
    score_grade: "Please enter the grade",
    emplemployee_id_for_educationoyee_id: "Please select a option",
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

$('#education_data_table_filter_modal').on('shown.bs.modal', function () {

    fetchEmployeeNames();
  
  });


   $('#education_data_table').DataTable({
   
   "ajax": {
       "url": BASE_URL + "index.php/" +  hrController + "/get_emp_education_details",
       "dataSrc": "data"
   },
   "columns": [
     
    
       { data: "employee_name" },
       { data: "education_name" },
       { data: "institute_name"},
       
       {
           data: "id",
           render: function (data, type, row) {
            
               return `
                  <div class="operations"> 
                  <a href="#" class="edit"  onclick="editEducation('${data}');"><i class="fas fa-edit"></i>Edit</a>
                  <a href="#" class="view" onclick="viewEducation('${data}');"><i class="fas fa-eye" ></i>View</a>
                  <a href="#" class="delete" onclick="deleteEducation('${data}');"><i class="fas fa-trash" ></i>Delete</a>
                  </div>`;
            
           }
           
       }
   ],
  
     "initComplete": function(settings, json) {
       customizeDataTable('education_data_table');
       fetchEmployeeNames();
    
      
   }

});
  });
  

 


$("#btn_emp_education_save").click (function(){
   if ($('#education_modal_forms').valid()) {

      var formData  = new FormData();
                  formData.append('employee_id', $("#employee_id_for_education").val());
                  formData.append('education_id', $("#education_id").val());  
                  formData.append('institute_name', $("#institute_name").val());
                  formData.append('start_date', $("#start_date").val());
                  formData.append('completed_date', $("#completed_date").val());
                  formData.append('score_grade', $("#score_grade").val());
                  formData.append('details', $("#details").val());
                  formData.append('flag_id', $("#flag_id").val()); 
                  formData.append('row_id', $("#row_id").val()); 
                  formData.append('li_token', token); 
            $.ajax({
                url: BASE_URL + "index.php/" + hrController + "/save_emp_education_details",
                type: 'POST',
                data:  formData,
                dataType: "JSON",
                processData: false,
                contentType: false,
                success: function(response) {
                  console.log("response",response);
                  showToast('success',response.message);
                  $('#education_data_table_modal').modal('hide');
                  $('#education_data_table').DataTable().ajax.reload();

                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    console.log(status);
                    console.log(error);
                }
            });
    }
}); 

function editEducation(row_id) {
  alert(row_id);
    $("#row_id").val(row_id);
    flag_id=$("#flag_id").val("1");
    $('#education_data_table_modal').modal('show');

    $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/get_emp_education_by_id",
        type: "GET",
        data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val() },
        dataType: "json",
        success: function (response) {
              console.log("response is" ,response);
            if (response.success) {
              $('#education_data_table_modal').modal('show');
              $("#employee_id_for_education").val(response.data.employee_id).trigger('change');
              $("#education_id").val(response.data.education_id).trigger('change');
              $("#institute_name").val(response.data.institute_name);
              $("#start_date").val(response.data.start_date);
              $("#completed_date").val(response.data.completed_date);
              $("#score_grade").val(response.data.score_grade);
              $("#details").val(response.data.details);
             
              

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

function viewEducation(row_id) 
 {
  
    $.ajax({
        type: 'GET',
        url: BASE_URL + "index.php/" + hrController + "/get_emp_education_by_id",
        data: { row_id: row_id },
        dataType: 'json',
        success: function(response) {
            if (response) {
                console.log(response);
                $('#education_data_table_modal').modal('show');
              $("#employee_id_for_education").val(response.data.employee_id).trigger('change');
              $("#education_id").val(response.data.education_id).trigger('change');
              $("#institute_name").val(response.data.institute_name);
              $("#start_date").val(response.data.start_date);
              $("#completed_date").val(response.data.completed_date);
              $("#score_grade").val(response.data.score_grade);
              $("#details").val(response.data.details);
              var disableElements = $("input, select").prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                disableElements.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
               $(".modal-footer .savebtn").hide();
                // Show the .modal-footer when the modal is hidden
                $("#education_data_table_modal").on("hidden.bs.modal", function () 
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

function deleteEducation(row_id) {
  
  if (confirm("Are you sure you want to delete this department?")) {
      $.ajax({
          type: 'POST',
          url: BASE_URL + "index.php/" + hrController + "/delete_emp_education_by_id",
          data: { row_id: row_id, li_token: token },
          dataType: 'json',
          success: function (response) {
              if (response && response.success) {
                showToast('success', response.message); 
                  
                  $('#education_data_table').DataTable().ajax.reload();
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

$("#btn_employee_education_data_table_filter").on("click", function () {
    var filter_employee_id_education_val = $("#filter_employee_id_education").val();
 
    var filter_employee_qualification_val = $("#filter_employee_qualification").val();
   
    var filter_employee_id_education = $("#filter_employee_id_education option:selected").text();
    
    var filter_employee_qualification = $("#filter_employee_qualification option:selected").text();
   
    var table_education = $('#education_data_table').DataTable();
    // Clear all filters
    table_education.columns().search('');

    if (filter_employee_id_education_val !== "0") {
      table_education.column(0).search(filter_employee_id_education);
    }
    if (filter_employee_qualification_val !== "0") {
      table_education.column(1).search(filter_employee_qualification);
    }

    table_education.draw();

    var filterEducationText = ''; // Default text
    if (filter_employee_id_education_val !== "0" && filter_employee_qualification_val !== "0") {
      filterEducationText = 'Employee Name: ' + filter_employee_id_education + ' & Qualification: ' + filter_employee_qualification;
    } else if (filter_employee_id_education_val !== "0") {
      filterEducationText = 'Employee Name: ' + filter_employee_id_education;
    } else if (filter_employee_qualification_val !== "0") {
      filterEducationText = 'Qualification: ' + filter_employee_qualification;
    }
    var resetFilterEducationText = filterEducationText + ' <span class="icon"><i class="fa fa-times"></i></span>'; // Improved concatenation
    $('#education_data_table_reset_filter').html(resetFilterEducationText);
    
    // Use a single conditional statement to show or hide the button
    if (filter_employee_id_education === "0" && filter_employee_qualification === "0") {
        $("#education_data_table_reset_filter").hide();
    } else {
        $("#education_data_table_reset_filter").show();
    }
    $("#education_data_table_filter_modal").modal("hide");
});


</script>



