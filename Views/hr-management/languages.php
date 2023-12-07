
                <div id="languages_tab" class="reviewBlock">
                <div class="combined_buttons">
                   <div class="add_new_btn_div">
                        <button id="languages_data_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
                   </div>
                    <div class="filter_btn_div">
                        <button id="languages_data_table_filter_btn" class="customise_filter_button" data-value="employee_data_table"><i class="fas fa-filter"></i>Filter</button>
                    </div>
                    <div class="reset_filter_btn_div">
                        <button id="languages_data_table_reset_filter"  style="display:none" class="cancel_filter_button"><i class="fas fa-times"></i> Cancel</button>
                    </div>
                                               
            </div>
            </div>
                        <!-- --- ./discription ---- -->
                        <!-- table  -->
                        <table id="languages_data_table" class="table table-striped">
                        <thead>
                            <tr>      
                                <th> Name</th>
                                <th>Languages</th>
                                <th>Reading</th>
                                <th>Writing</th>
                                <th>Speaking</th>
                                <th>Listning</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        </table>
                        <!--  table endt -->
                
<div class="modal fade data-table-modal" id="languages_data_table_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Languages</h4>
             
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="languages_modal_form" class="modal_form">
                    <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="employee_id" class="col-form-label required">Employee Name</label>
                    </div>
                    <div class="col-8">
                     <select class="form-control select2" id="language_employee_id" name="language_employee_id">
                        
                      </select>

                    </div>
                  </div>
                     <!-- ./ one field ---- -->  

                           <!--one field ---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="language_id" class="col-form-label required">language Known</label>
                    </div>
                    <div class="col-8">
                    
                      <select class="form-control select2" id="language_id" name="language_id">
                      <option value="" >Select Language Known</option>
                      <?php
                          if (isset($languages)):  
                            foreach ($languages as $row):
                              $name = $row->language_name;
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
                      <label for="reading_proficiency_id" class="col-form-label required">Reading Proficiency</label>
                    </div>
                    <div class="col-8">
                    
                      <select class="form-control select2" id="reading_proficiency_id" name="reading_proficiency_id">
                      <option value="" >Select Language Poficiency</option>
                      <?php
                          if (isset($proficiency)):  
                            foreach ($proficiency as $row):
                              $name = $row->language_proficiency;
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
                      <label for="speaking_proficiency_id" class="col-form-label required">Speaking Proficiency</label>
                    </div>
                    <div class="col-8">
                    <select class="form-control select2" id="speaking_proficiency_id" name="speaking_proficiency_id">
                    <option value="" >Select Language Poficiency</option>
                    <?php
                          if (isset($proficiency)):  
                            foreach ($proficiency as $row):
                              $name = $row->language_proficiency;
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
                      <label for="writing_proficiency_id" class="col-form-label required">Writing Proficiency</label>
                    </div>
                    <div class="col-8">
                    <select class="form-control select2" id="writing_proficiency_id" name="writing_proficiency_id">
                    <option value="" >Select Language Poficiency</option>
                    <?php
                          if (isset($proficiency)):  
                            foreach ($proficiency as $row):
                              $name = $row->language_proficiency;
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
                      <label for="listening_proficiency_id" class="col-form-label required">ListiningProficiency</label>
                    </div>
                    <div class="col-8">
                    <select class="form-control select2" id="listening_proficiency_id" name="listening_proficiency_id">
                    <option value="" >Select Language Poficiency</option>
                    <?php
                          if (isset($proficiency)):  
                            foreach ($proficiency as $row):
                              $name = $row->language_proficiency;
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
              <button type="button" class="btn savebtn" id="btn_emp_languages_save"><i class="fas fa-calendar-check"></i>Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div> 


    <!-- Filter modal -->
     <!-- ./filter modal-->
     <div class="modal fade data-table-modal" id="languages_data_table_filter_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Employee Languages</h4>
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
                        
                          <select name="filter_employee_id_languages" id="filter_employee_id_languages" class="form-control select2">
                          <option value="0">Select Employee</option>
                         
                      </select>

                          </div>
                      </div>
                    <!-- ./ one field ---- -->          
                        
                  <!--one field  text field---- -->
                      <div class="form-group row">
                          <div class="col-3">
                          <label for="recipient-name" class="col-form-label required">Language</label>
                          </div>
                          <div class="col-8">
                              <select name="filter_employee_language"  id="filter_employee_language" class="form-control select2">
                                <option value="0">Not Applicable</option>
                               
                                <?php

                          if (isset($languages)):  
                            foreach ($languages as $row):
                              $name = $row->language_name;

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
             <button id="btn_employee_language_data_table_filter" class="btn savebtn">Apply Filter</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<!-- ./filter modal -->

<!-- </body>
</html> -->
<?php include("bottom-js.php"); ?>  
<script>
    var BASE_URL = "<?php echo base_url(); ?>";
    var hrController = "<?php echo CONTROLLER_HR; ?>";

    var token = "<?php echo $_SESSION['li_token']; ?>";

    $(document).ready( function () {


    

        $('#languages_data_table').DataTable({
   
   "ajax": {
       "url": BASE_URL + "index.php/" +  hrController + "/get_emp_languages_details",
       "dataSrc": "data"
   },
   "columns": [
     
       { data: "employee_name" },
       { data: "language_name" },
       { data: "reading_proficiency" },
       { data: "speaking_proficiency"},
       { data: "writing_proficiency"},
       { data: "listening_proficiency"},
       
       {
           data: "id",
           render: function (data, type, row) {
               return `
                  <div class="operations"> 
                  <a href="#" class="edit"  onclick="editLanguages('${data}');"><i class="fas fa-edit"></i>Edit</a>
                  <a href="#" class="view" onclick="viewLanguages('${data}');"><i class="fas fa-eye" ></i>View</a>
                  <a href="#" class="delete" onclick="deleteLanguages('${data}');"><i class="fas fa-trash" ></i>Delete</a>
                  </div>`;
            
           }
           
       }
   ],
  
     "initComplete": function(settings, json) {
       customizeDataTable('languages_data_table');
       fetchEmployeeNames();
   }

});


    });


    $('#languages_modal_form').validate({
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

$("#btn_emp_languages_save").click (function(){
  // if ($('#languages_modal_form').valid()) {
      var formData  = new FormData();
                  formData.append('employee_id', $("#language_employee_id").val());
                  formData.append('language_id', $("#language_id").val());  
                  formData.append('reading_proficiency_id', $("#reading_proficiency_id").val());
                  formData.append('speaking_proficiency_id', $("#speaking_proficiency_id").val());
                  formData.append('writing_proficiency_id', $("#writing_proficiency_id").val());
                  formData.append('listening_proficiency_id', $("#listening_proficiency_id").val());
                 
                  formData.append('flag_id', $("#flag_id").val()); 
                  formData.append('row_id', $("#row_id").val()); 
                  formData.append('li_token', token); 
          
            $.ajax({
                url: BASE_URL + "index.php/" + hrController + "/save_emp_language_details",
                type: 'POST',
                data:  formData,
                dataType: "JSON",
                processData: false,
                contentType: false,
                success: function(response) {
                  console.log("response",response);
                  showToast('success',response.message);
                  $('#languages_data_table_modal').modal('hide');
                  $('#languages_data_table').DataTable().ajax.reload();
                

                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    console.log(status);
                    console.log(error);
                }
            });
    //  }
      
}); 

function viewLanguages(row_id) 
 {
  alert(row_id);
    $.ajax({
        type: 'GET',
        url: BASE_URL + "index.php/" + hrController + "/get_emp_languages_by_id",
        data: { row_id: row_id },
        dataType: 'json',
        success: function(response) {
            if (response) {
                console.log(response);
            $('#languages_data_table_modal').modal('show');
              $("#language_employee_id").val(response.data.employee_id).trigger('change');
              $("#language_id").val(response.data.language_id).trigger('change');
              $("#reading_proficiency_id").val(response.data.reading_proficiency_id).trigger('change');
              $("#speaking_proficiency_id").val(response.data.speaking_proficiency_id).trigger('change');
              $("#listening_proficiency_id").val(response.data.listening_proficiency_id).trigger('change');
              $("#writing_proficiency_id").val(response.data.writing_proficiency_id).trigger('change');
              var disableElements = $("input, select").prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                disableElements.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
               $(".modal-footer .savebtn").hide();
                // Show the .modal-footer when the modal is hidden
                $("#languages_data_table_modal").on("hidden.bs.modal", function () 
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


function editLanguages(row_id) {
  alert(row_id);
    $("#row_id").val(row_id);
    flag_id=$("#flag_id").val("1");
    $('#languages_data_table_modal').modal('show');
   

    $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/get_emp_languages_by_id",
        type: "GET",
        data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val() },
        dataType: "json",
        success: function (response) {
          // console.log("Select2 Options:", $('#language_employee_id').select2('data'));
          console.log($('#language_employee_id'));
              console.log("response is language is " ,response);
              // console.log("Response Employee ID :", response.data.employee_id);
              // console.log("Select2 Element:", $('#language_employee_id'));
            if (response.success) {
               
              
              $("#language_employee_id").val(response.data.employee_id).trigger('change');
              // $('#language_employee_id').val(response.data.employee_id);
              // alert(response.data.employee_id);
             
              $("#language_id").val(response.data.language_id).trigger('change');
              $("#reading_proficiency_id").val(response.data.reading_proficiency_id).trigger('change');
              $("#speaking_proficiency_id").val(response.data.speaking_proficiency_id).trigger('change');
              $("#listening_proficiency_id").val(response.data.listening_proficiency_id).trigger('change');
              $("#writing_proficiency_id").val(response.data.writing_proficiency_id).trigger('change');


              
              // $("#language_employee_id").prop("disabled", true).css("cursor", "not-allowed");
              // $("#language_employee_id").prop("readonly", true).css("cursor", "not-allowed");
              $("#language_employee_id").prop("disabled", true).css("cursor", "not-allowed");
              $("#language_employee_id").prop("readonly", true).css("cursor", "not-allowed");

            } else {
                alert("Failed.");
            }
        },
        error: function (xhr, status, error) {
            alert("Error in fetching .");
        }
    });
}


function deleteLanguages(row_id) {
  
  if (confirm("Are you sure you want to delete this department?")) {
      $.ajax({
          type: 'POST',
          url: BASE_URL + "index.php/" + hrController + "/delete_emp_languages_by_id",
          data: { row_id: row_id, li_token: token },
          dataType: 'json',
          success: function (response) {
              if (response && response.success) {
                showToast('success', response.message); 
                  
                  $('#languages_data_table').DataTable().ajax.reload();
                  
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

// fetchEmployeeNames

$('#languages_data_table_modal').on('shown.bs.modal', function () {

fetchEmployeeNames();

});

$("#btn_employee_language_data_table_filter").on("click", function () {
    var filter_employee_id_languages_val = $("#filter_employee_id_languages").val();
    var filter_employee_language_val = $("#filter_employee_language").val();
    var filter_employee_id_languages = $("#filter_employee_id_languages option:selected").text();
   
    var filter_employee_language = $("#filter_employee_language option:selected").text();
   
    var table_language = $('#languages_data_table').DataTable();

    // Clear all filters
    table_language.columns().search('');

    if (filter_employee_id_languages_val !== "0") {
        table_language.column(0).search(filter_employee_id_languages);
    }
    if (filter_employee_language_val !== "0") {
        table_language.column(1).search(filter_employee_language);
    }

    table_language.draw();

    var filterLanguageText = ''; 
    if (filter_employee_id_languages_val !== "0" && filter_employee_language_val !== "0") {
        filterLanguageText = 'Employee: ' + filter_employee_id_languages + ' & Language: ' + filter_employee_language;
    } else if (filter_employee_id_languages_val !== "0") {
        filterLanguageText = 'Employee: ' + filter_employee_id_languages;
    } else if (filter_employee_language_val !== "0") {
        filterLanguageText = 'Language: ' + filter_employee_language;
    }
    var resetFilterLanguageText = filterLanguageText + ' <span class="icon"><i class="fa fa-times"></i></span>'; // Improved concatenation
    $('#languages_data_table_reset_filter').html(resetFilterLanguageText);
    
    
    if (filter_employee_id_languages === "0" && filter_employee_language === "0") {
        $("#languages_data_table_reset_filter").hide();
    } else {
        $("#languages_data_table_reset_filter").show();
    }
    $("#languages_data_table_filter_modal").modal("hide");
});

// pdf generation

$(document).on("click", "#languages_data_table_export_to_pdf", function() {
  alert("haui");
    $.ajax({
        url: BASE_URL + 'index.php/' + hrController + '/generate_pdf_for_state_list',
        type: "GET",
        xhrFields: {
            responseType: 'blob' 
        },
        success: function(response) {
          
            var blob = new Blob([response], { type: 'application/pdf' });

          
            var url = URL.createObjectURL(blob);

           
            var a = document.createElement('a');
            a.href = url;
            a.download = 'state_list.pdf'; 
            document.body.appendChild(a);
            a.click();

           
            URL.revokeObjectURL(url);
            document.body.removeChild(a);
        },
        error: function(xhr, status, error) {
          
        }
    });
});

$("#languages_data_table_add_new").on("click", function() {
    $("#flag_id").val("0");

    var modalId = "#languages_data_table_modal";
    $(modalId).modal("show");

    // Clear text fields
    $(modalId + ' input[type="text"]').val('');
    // Reset select2 dropdowns
    $(modalId + ' select').each(function() {
        if ($(this).hasClass('select2')) {
            $(this).val('').trigger('change');
        }
    });

    $("#language_employee_id").prop("disabled", false);
    $("#language_employee_id").prop("readonly", false);
    $("#language_employee_id").css("cursor", "auto");
});

$("#languages_data_table_filter_btn").on("click", function() {

  $("#flag_id").val('0');
   $("#languages_data_table_filter_modal").modal("show");
});


$("#languages_data_table_reset_filter").on("click", function() {


     var table = $('#languages_data_table').DataTable();
    var modal = $('#languages_data_table_filter_modal');
    modal.find("select").val("0");
    table.columns().search('');
    table.search('').draw();
    $(this).hide();

});





    </script>
