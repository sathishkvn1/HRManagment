
                <div id="certification_tab" class="reviewBlock">
                <div class="combined_buttons">
                   <div class="add_new_btn_div">
                        <button id="certification_data_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
                   </div>
                    <div class="filter_btn_div">
                        <button id="certification_data_table_filter_btn" class="customise_filter_button" data-value="employee_data_table"><i class="fas fa-filter"></i>Filter</button>
                    </div>
                    <div class="reset_filter_btn_div">
                        <button id="certification_data_table_reset_filter"  style="display:none" class="cancel_filter_button"><i class="fas fa-times"></i> Cancel</button>
                    </div>
                                               
            </div>
               </div>
                        <!-- --- ./discription ---- -->
                        <!-- table  -->
                  <table id="certification_data_table" class="table table-striped">
                        <thead>
                            <tr>    
                               
                                <th> Employee Name</th>
                                <th> Certificate Name</th>
                                <th> Institute Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                  </table>
                        <!-- ./ table start -->

  <!-- Modal Start -->
  <div class="modal fade data-table-modal" id="certification_data_table_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Certificate </h4>
             
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="certification_modal_form" class="modal_form">
                    <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="employee_id" class="col-form-label required">Employee Name</label>
                    </div>
                    <div class="col-8">
                     <select class="form-control select2" id="certification_employee_id" name="employee_id">
                       
                      </select>

                    </div>
                  </div>
                     <!-- ./ one field ---- -->  
                        <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="education_name" class="col-form-label required">Certificate Name</label>
                    </div>
                    <div class="col-8">
                    
                      <select class="form-control select2" id="certification_id" name="certification_id">
                      <option value="" >Select Certificate Name</option>
                      <?php
                          if (isset($cerfication_names)):  
                            foreach ($cerfication_names as $row):
                              $name = $row->certification_name;
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
                      <label for="institute_names" class="col-form-label required">Institute Name</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="institute_names" name="institute_names">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->   
                  <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Date Issued</label>
                    </div>
                    <div class="col-8">
                      <input type="date" class="form-control" id="date_issued" name="date_issued">
                    </div>
                  </div>
                 <!-- ./ one field ---- --> 
                   <!--one field  text field---- -->
                   <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Date Valid Till</label>
                    </div>
                    <div class="col-8">
                      <input type="date" class="form-control" id="date_valid_upto" name="date_valid_upto">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->  
                   <!--one field  text field---- -->
                   <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Score Grade</label>
                    </div>
                    <div class="col-8">
                      <input type="text" class="form-control" id="certification_score_grade" name="score_grades">
                    </div>
                  </div>
                 <!-- ./ one field ---- --> 
                  
               
              </form>
            
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="btn_pay_scales_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="btn_emp_certification_save"><i class="fas fa-calendar-check"></i>Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div> 

     <!-- ./filter modal-->
     <div class="modal fade data-table-modal" id="certification_data_table_filter_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Employee Certification</h4>
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
                        
                          <select name="filter_employee_id_certification" id="filter_employee_id_certification" class="form-control select2">
                          <option value="0">Select Employee</option>
                         
                      </select>

                          </div>
                      </div>
                    <!-- ./ one field ---- -->          
                        
                  <!--one field  text field---- -->
                      <div class="form-group row">
                          <div class="col-3">
                          <label for="recipient-name" class="col-form-label required"> Certification </label>
                          </div>
                          <div class="col-8">
                              <select name="filter_employee_certification"  id="filter_employee_certification" class="form-control select2">
                                <!-- <option value="0">Select Certification</option> -->
                               
                             
                                
                              </select>
                          </div>
                      </div>
                    <!-- ./ one field ---- -->              
                               

              </form>
            </div>
            <div class="modal-footer justify-content-between">
             <button id="btn_employee_certification_data_table_filter" class="btn savebtn">Apply Filter</button>
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
   
    






    $('#certification_data_table').DataTable({
       "ajax": {
        "url": BASE_URL + "index.php/" +  hrController + "/get_emp_certification_details",
        "dataSrc": "data"
    },
    "columns": [
       
        { data: "employee_name"},
        { data: "certification_name"},
        { data: "institute_name"},
        {
            data: "id",
            render: function (data, type, row) {
                return `
                    <div class="operations"> 
                    <a href="#" class="edit"  onclick="editCertification('${data}');"><i class="fas fa-edit"></i>Edit</a>
                    <a href="#" class="view"   onclick="viewCertification('${data}');"><i class="fas fa-eye" ></i>View</a>
                    <a href="#" class="delete" onclick="deleteCertification('${data}');"><i class="fas fa-trash" ></i>Delete</a>
                    </div>`;
            }
        }
    ],
    
        "initComplete": function(settings, json) {
        customizeDataTable('certification_data_table');
        fetchEmployeeNames();
    }

});
$('#certification_data_table_filter_modal').on('shown.bs.modal', function () {
  fetchEmployeeNames();
      updateCertificationDropdown();
});

function updateCertificationDropdown() {

    $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/get_certifications",
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            var dropdown = $('#filter_employee_certification');
            dropdown.empty();
            dropdown.append($('<option></option>').attr('value', '0').text('Not Applicable'));

          
            $.each(data, function(index, certification) {
                dropdown.append($('<option></option>').attr('value', certification.id).text(certification.certification_name));
            });
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            console.error(status);
            console.error(error);
        }
    });
}

// fr validation
$('#certification_modal_form').validate({
  rules: {
               institute_names: {
                              required: true,
                          },
                date_issued :{
                  required: true,
                },
                date_valid_upto :{
                  required: true,
                }
                },
                messages: {
                  institute_names: "Please enter a education name",
                  date_issued: "Please enter the date",
                  date_valid_upto:"Please enter the date"
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

  
  
$("#btn_emp_certification_save").click (function(){
  if ($('#certification_modal_form').valid()) {
      var formData  = new FormData();
                  formData.append('employee_id', $("#certification_employee_id").val());
                  formData.append('certification_id', $("#certification_id").val());  
                  formData.append('institute_name', $("#institute_names").val());
                  formData.append('date_issued', $("#date_issued").val());
                  formData.append('date_valid_upto', $("#date_valid_upto").val());
                  formData.append('score_grade', $("#certification_score_grade").val());
                  formData.append('flag_id', $("#flag_id").val()); 
                  formData.append('row_id', $("#row_id").val()); 
                  formData.append('li_token', token); 
          
            $.ajax({
                url: BASE_URL + "index.php/" + hrController + "/save_emp_certification_details",
                type: 'POST',
                data:  formData,
                dataType: "JSON",
                processData: false,
                contentType: false,
                success: function(response) {
                  console.log("response",response);
                  showToast('success',response.message);
                  $('#certification_data_table_modal').modal('hide');
                  $('#certification_data_table').DataTable().ajax.reload();
                  fetchEmployeeNames();

                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    console.log(status);
                    console.log(error);
                }
            });
     }
      
}); 


function viewCertification(row_id) 
 {
  
    $.ajax({
        type: 'GET',
        url: BASE_URL + "index.php/" + hrController + "/get_emp_certification_by_id",
        data: { row_id: row_id },
        dataType: 'json',
        success: function(response) {
          
            if (response) {
               
            $('#certification_data_table_modal').modal('show');
              $("#certification_employee_id").val(response.data.employee_id).trigger('change');
              $("#certification_id").val(response.data.certification_id).trigger('change');
              $("#institute_names").val(response.data.institute_name);
              $("#date_issued").val(response.data.date_issued);
              $("#date_valid_upto").val(response.data.date_valid_upto);
              $("#certification_score_grade").val(response.data.score_grade);
              $("#details").val(response.data.details);
              var disableElements = $("input, select").prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                disableElements.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
               $(".modal-footer .savebtn").hide();
                // Show the .modal-footer when the modal is hidden
                $("#certification_data_table_modal").on("hidden.bs.modal", function () 
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


function editCertification(row_id) {
  alert(row_id);
    $("#row_id").val(row_id);
    flag_id=$("#flag_id").val("1");
    $('#certification_data_table_modal').modal('show');

    $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/get_emp_certification_by_id",
        type: "GET",
        data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val() },
        dataType: "json",
        success: function (response) {
              console.log("response certi is" ,response);
            if (response.success) {
              $("#certification_employee_id").val(response.data.employee_id).trigger('change');
              $("#certification_id").val(response.data.certification_id).trigger('change');
              $("#institute_names").val(response.data.institute_name);
              $("#date_issued").val(response.data.date_issued);
              $("#date_valid_upto").val(response.data.date_valid_upto);
              $("#certification_score_grade").val(response.data.score_grade);
              $("#details").val(response.data.details);
              $("#certification_employee_id").prop("disabled", true).css("cursor", "not-allowed");
              $("#certification_employee_id").prop("readonly", true).css("cursor", "not-allowed");
              


            } else {
                alert("Failed.");
            }
        },
        error: function (xhr, status, error) {
            alert("Error in fetching .");
        }
    });
}

function deleteCertification(row_id){
    alert(row_id);
    if (confirm("Are you sure you want to delete this item?")) {
        $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/delete_certification_by_id",
            type: "POST",
            data: { row_id: row_id, li_token: token },
            dataType: "json",
            success: function (response) {

                $('#certification_data_table_modal').modal('hide');
                showToast('success', response.message); 
                 $('#certification_data_table').DataTable().ajax.reload();
                 fetchEmployeeNames();
                  
                  // alert(response.message);
            },
            error: function (xhr, status, error) {
                
                // alert_message("failure", "Error", "Error delete job title item.");
            }
        });
    }

    //for filter

}



$("#btn_employee_certification_data_table_filter").on("click", function () {
    var filter_employee_id_certification_val = $("#filter_employee_id_certification").val();
    var filter_employee_certification_val = $("#filter_employee_certification").val();
    var filter_employee_id_certification = $("#filter_employee_id_certification option:selected").text();
    var filter_employee_certification = $("#filter_employee_certification option:selected").text();

   var table_certification = $('#certification_data_table').DataTable();

    //  alert('filter_employee_id_certification: ' + filter_employee_id_certification);
    // alert('filter_employee_certification: ' + filter_employee_certification);

   table_certification.columns().search('');


    if (filter_employee_id_certification_val != "0") {
        table_certification.column(0).search(filter_employee_id_certification);
    }
    if (filter_employee_certification_val != "0") {
        table_certification.column(1).search(filter_employee_certification);
    }

    table_certification.draw();

    var filterCertificationText = '';
    if (filter_employee_id_certification_val != "0" && filter_employee_certification_val != "0") {
        filterCertificationText = 'Employee Name: ' + filter_employee_id_certification + ' & Certification: ' + filter_employee_certification;
    } else if (filter_employee_id_certification_val != "0") {
        filterCertificationText = 'Employee Name: ' + filter_employee_id_certification;
    } else if (filter_employee_certification_val != "0") {
        filterCertificationText = 'Certification: ' + filter_employee_certification;
    }

    var resetFilterCertificationText = filterCertificationText + '<span class="icon"><i class="fa fa-times"></i></span>';
    $('#certification_data_table_reset_filter').html(resetFilterCertificationText);

    // Use a single conditional statement to show or hide the button
    if (filter_employee_id_certification == "0" && filter_employee_certification == "0") {
        $("#certification_data_table_reset_filter").hide();
    } else {
        $("#certification_data_table_reset_filter").show();
    }
    $("#certification_data_table_filter_modal").modal("hide");
});


$("#certification_data_table_add_new").on("click", function() {
    $("#flag_id").val("0");

    var modalId = "#certification_data_table_modal";
    $(modalId).modal("show");

    // Clear text fields
    $(modalId + ' input[type="text"]').val('');
    // Reset select2 dropdowns
    $(modalId + ' select').each(function() {
        if ($(this).hasClass('select2')) {
            $(this).val('').trigger('change');
        }
    });
    $("#certification_employee_id").prop("disabled", false);
    $("#certification_employee_id").prop("readonly", false);
    $("#certification_employee_id").css("cursor", "auto");
});

$("#certification_data_table_filter_btn").on("click", function() {

  $("#flag_id").val('0');
   $("#certification_data_table_filter_modal").modal("show");
});


$("#certification_data_table_reset_filter").on("click", function() {

  
     var table = $('#certification_data_table').DataTable();
    var modal = $('#certification_data_table_filter_modal');
    modal.find("select").val("0");
    table.columns().search('');
    table.search('').draw();
  
   
    $(this).hide();

});



</script>
