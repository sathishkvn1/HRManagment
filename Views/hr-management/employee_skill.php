   <div id="skills_tab" class="reviewBlock">
                                      <div class="combined_buttons">
                                                <div class="add_new_btn_div">
                                                    <?php 
                                                      if($skills_add=='yes'):
                                                      ?>
                                                    <button id="employee_skill_data_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
                                                 <?php endif;?>
                                                 </div>
                                                <div class="filter_btn_div">
                                                <button id="employee_skill_data_table_filter_btn" class="customise_filter_button" data-value="employee_data_table"><i class="fas fa-filter"></i>Filter</button>
                                                </div>
                                                <div class="reset_filter_btn_div">
                                                    <button id="employee_skill_data_table_reset_filter"  style="display:none" class="cancel_filter_button"><i class="fas fa-times"></i> Cancel</button>
                                                </div>
                                               
                                            </div>
               </div>
             
                        <!-- table  -->
                        <table id="employee_skill_data_table" class="table table-striped">
                            <thead>
                                <tr>     
                                    <th> Employee</th>
                                    <th> Skill</th>
                                    <th> Details</th>
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
   <div class="modal fade data-table-modal" id="employee_skill_data_table_modal" data-bs-backdrop="static">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Employee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="employee_skill_data_table_modal_form" class="modal_form">
                      <!--one field  text field---- -->
                    <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Employee </label>
                      </div>
                      <div class="col-8">

                        <select name="employee_id_employee_skills"  id="employee_id_employee_skills" class="form-control select2">
                                  

                         </select>

                      </div>
                    </div>
                  <!-- ./ one field ---- -->                              
                      <!--one field  text field---- -->
                    <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required" >Skill</label>
                      </div>
                      <div class="col-8">
                      
                      <select name="skill_id_employee_skill"  id="skill_id_employee_skill"class="form-control select2" >
                        <option value="">Select Skill</option>
                                  <?php
                                                    if (isset($employee_skills)):
                                                            foreach ($employee_skills as $row):
                                                                $skill_name = $row->skill_name;
                                                                $id = $row->id;
                                                                        
                                                ?>
                                                            <option value="<?php echo $id; ?>" >
                                                                <?php echo $skill_name; ?>
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
                        <label for="recipient-name" class="col-form-label required">Details</label>
                      </div>
                      <div class="col-8">
                      <textarea class="form-control" id="details_employee_skill" name="details_employee_skill">
                      </textarea>
                      </div>
                    </div>
                  <!-- ./ one field ---- -->                              
                

                </form>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default cancelbtn" id="btn_employment_status_cancel" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn savebtn" id="btn_employment_skill_save"><i class="fas fa-calendar-check"></i>Save</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
     <!-- /.modal for company department-->





      <!-- ./filter modal-->
   <div class="modal fade data-table-modal" id="employee_skill_data_table_filter_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Employee Details</h4>
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
                          <select name="filter_employee_id_employee_skill"  id="filter_employee_id_employee_skill"class="form-control select2">
                            <option value="0">Not Applicable</option>
                                  <?php
                                  if(isset($all_employee_in_company)):
                                      foreach($all_employee_in_company as $row):
                                  ?>
                                      <option value="<?php echo $row->id;?>"><?php echo $row->employee_name;?></option>
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
                          <label for="recipient-name" class="col-form-label required">select Skill</label>
                          </div>
                          <div class="col-8">
                              <select name="filter_employee_skill"  id="filter_employee_skill"class="form-control select2">
                                <option value="0">Not Applicable</option>
                                  <?php
                                  if(isset($employee_skills)):
                                      foreach($employee_skills as $row):
                                  ?>
                                      <option value="<?php echo $row->id;?>"><?php echo $row->skill_name;?></option>
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
            
             <button type="button" class="btn savebtn" id="btn_employee_skill_data_table_filter"><i class="fas fa-calendar-check"></i>Apply Filter</button>
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

// load job item data table

$(document).ready( function () {

  var table = $('#employee_skill_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" +  hrController + "/get_employee_skills",
            "dataSrc": "data"
        },
            "columns": [
        
            { data: "employee_name"},
            { data: "skill_name"},
            { data: "details"},
            {
                data: "id",
                render: function (data, type, full, row) {
                    var id = full.id;
                    return `
                        <div class="operations">
                        <?php if($skills_edit=='yes'): ?>
                            <a href="#" class="edit" onclick="employeeSkillEditRow(${id});"><i class="fas fa-edit"></i>Edit</a>
                            <?php endif;
                            if($skills_view=='yes'): ?>
                            <a href="#" class="view" onclick="employeeSkillViewRow(${id});"><i class="fas fa-eye"></i>View</a>
                            <?php endif;
                            if($skills_delete=='yes'): ?>
                            <a href="#" class="delete" onclick="employeeSkillDeleteRow(${id});"><i class="fas fa-trash"></i>Delete</a>
                            <?php endif; ?>
                        </div>`;
                }
            }
        ],
       

        "initComplete": function(settings, json) {
         
            customizeDataTable('employee_skill_data_table');
            fetchEmployeeNames();
        }
    });
    
   
});



$(document).on("click", "#employee_skill_data_table_export_to_pdf", function() {
    $.ajax({
        url: BASE_URL + 'index.php/' + hrController + '/generate_pdf_for_employee_skills',
        type: "GET",
        xhrFields: {
            responseType: 'blob' 
        },
        success: function(response) {
          
            var blob = new Blob([response], { type: 'application/pdf' });

          
            var url = URL.createObjectURL(blob);

           
            var a = document.createElement('a');
            a.href = url;
            a.download = 'employee_skills.pdf'; 
            document.body.appendChild(a);
            a.click();

           
            URL.revokeObjectURL(url);
            document.body.removeChild(a);
        },
        error: function(xhr, status, error) {
          
        }
    });
});





  





//save
$("#btn_employment_skill_save").on("click",function() {  
   if ($('#employee_skill_data_table_modal_form').valid()) {
          var formData  = new FormData();
          formData.append('employee_id_employee_skill', $("#employee_id_employee_skill").val());
          formData.append('skill_id_employee_skill', $("#skill_id_employee_skill").val()); 
          formData.append('details_employee_skill', $("#details_employee_skill").val());
          formData.append('flag_id', $("#flag_id").val()); //
          formData.append('row_id', $("#row_id").val()); //
          formData.append('li_token', token); 
            $.ajax({
                     url: BASE_URL + "index.php/" + hrController + "/save_employee_skill",
                     type: 'POST',
                     data:  formData,
                     dataType: "JSON",
                     processData: false,
                     contentType: false,
                        success: function(response) {
                              console.log("response",response);
                               console.log(response.message);
                               $('#employee_skill_data_table_modal').modal('hide');
                                $('#employee_skill_data_table').DataTable().ajax.reload();
                                
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
// ./ for save the 

//edit
function employeeSkillEditRow(row_id) {
    $("#row_id").val(row_id);
     flag_id=$("#flag_id").val("1");
 

   $.ajax({
       url: BASE_URL + "index.php/" + hrController + "/get_employee_skill_by_id",
       type: "POST",
       data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val()},
       dataType: "json",
       success: function (response) {
           // console.log(response is ,response);
           if (response.success) {
               $("#employee_id_employee_skill").val(response.data.employee_id).trigger('change');
               $("#skill_id_employee_skill").val(response.data.skill_id).trigger('change');
               $("#details_employee_skill").val(response.data.details);
               $("#employee_skill_data_table_modal").modal("show");
            
           } else {
               alert("Failed to fetch item.");
           }
       },
       error: function (xhr, status, error) {
           alert("Error fetching item.");
       }
   });
}
// ./ edit button





//view button
function employeeSkillViewRow(row_id) {
    alert("edited id"+row_id);
    $.ajax({
       url: BASE_URL + "index.php/" + hrController + "/get_employee_skill_by_id",
       type: "POST",
       data: { row_id: row_id, li_token: token},
       dataType: "json",
       success: function (response) {
           console.log("response is" ,response);
           if (response.success) {
            $("#employee_id_employee_skill").val(response.data.employee_id).trigger('change');;
               $("#skill_id_employee_skill").val(response.data.skill_id).trigger('change');;
               $("#details_employee_skill").val(response.data.details);
               $("#employee_skill_data_table_modal").modal("show");

               var disable_employee_skills = $("#employee_id_employee_skill, #skill_id_employee_skill, #details_employee_skill");
               disable_employee_skills.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
               $(".modal-footer .savebtn").hide();
                // Show the .modal-footer when the modal is hidden
                $("#employee_skill_data_table_modal").on("hidden.bs.modal", function () 
                {
                    $(".modal-footer .savebtn").show();
                    disable_employee_skills.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
                });
           } else {
               alert("Failed to fetch job title details.");
           }
       },
       error: function (xhr, status, error) {
           alert("Error fetching job title details.");
       }
   });
}


//  delete skill 
function employeeSkillDeleteRow(row_id) {
    alert('Delete clicked with id: ' + row_id);
    if (confirm("Are you sure you want to delete this item?")) {
        $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/delete_employee_skill_by_id",
            type: "POST",
            data: { row_id: row_id, li_token: token },
            dataType: "json",
            success: function (response) {
                $('#employee_skill_data_table_modal').modal('hide');
                 $('#employee_skill_data_table').DataTable().ajax.reload();
                 fetchEmployeeNames(); 
                
                  showToast('success', response.message); 
            },
            error: function (xhr, status, error) {
                
                showToast('error', 'Error delete item'); 
            }
        });
    }
  
}
// delete skill 
</script>


<!-- filter -->
<script>
$(document).ready(function () {

    $("#btn_employee_employment_details_filter").on("click", function () {
      var selectedemployee_name = $("#filter_employee_id option:selected").text(); // Get the selected text 

        // Use filter
        var table = $('#employee_employment_details_data_table').DataTable();
        table.column(0).search(selectedemployee_name);
        table.draw();
        $("#employee_employment_details_data_table_filter_modal").modal("hide");

    });

    $('#employee_skill_data_table_modal_form').validate({
    rules: {
      employee_id_employee_skill: {
         required: true,
         },
         skill_id_employee_skill: {
            required: true,
        }
    },
    messages: {
      employee_id_employee_skill: "Please select a employee",
      skill_id_employee_skill: "Please select skill"
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




//  filter box

$("#btn_employee_employment_details_filter").on("click", function () {
    var employee_name_val = $("#filter_employee_id").val();
    var employee_name_val_text = $("#filter_employee_id option:selected").text();

    var table_employee_employment_details = $('#employee_employment_details_data_table').DataTable();

    // Clear all filters
    table_employee_employment_details.columns().search('');

    if (employee_name_val != "0") {
      
        table_employee_employment_details.column(0).search(employee_name_val_text);
    }

    table_employee_employment_details.draw();

    var filter_employee_name_val_text = ''; // Default text

    if (employee_name_val_text != "0") {
        filter_employee_name_val_text = 'Employee Name: ' + employee_name_val_text;
    }
    var resetFilterEmployeeNameText = filter_employee_name_val_text+'<span class="icon"><i class="fa fa-times"></i></span>';
    $('#employee_employment_details_data_table_reset_filter').html(resetFilterEmployeeNameText);
    
    // Use a single conditional statement to show or hide the button
    if (employee_name_val == "0" ) {
        $("#employee_employment_details_data_table_reset_filter").hide();
    } else {
        $("#employee_employment_details_data_table_reset_filter").show();
    }

    $("#employee_employment_details_data_table_reset_filter_modal").modal("hide");
});
//  ./ filter box



$("#btn_employee_skill_data_table_filter").on("click", function () {
    var employee_name_filter_val = $("#filter_employee_id_employee_skill").val();
    var employee_skill_filter_val = $("#filter_employee_skill").val();
    var employee_name_filter_val_text = $("#filter_employee_id_employee_skill option:selected").text();
    var employee_skill_filter_val_text = $("#filter_employee_skill option:selected").text();

    var table_employee_skill = $('#employee_skill_data_table').DataTable();

    // Clear all filters
    table_employee_skill.columns().search('');

    if (employee_name_filter_val != "0") {
      
      table_employee_skill.column(0).search(employee_name_filter_val_text);
    }
     if (employee_skill_filter_val != "0") {
      
      table_employee_skill.column(1).search(employee_skill_filter_val_text);
    }

    table_employee_skill.draw();

    var filterSkillText = ''; // Default text
    if (employee_name_filter_val != "0" && employee_skill_filter_val != "0") {
      filterSkillText = 'Employee Name: ' + employee_name_filter_val_text + ' & ' + 'Skill: '+employee_skill_filter_val_text;
    }
     else if (employee_name_filter_val != "0") {
      filterSkillText = 'Employee Name: ' + employee_name_filter_val_text;
    } 
    else if (employee_skill_filter_val != "0") {
      filterSkillText = 'Skill: ' + employee_skill_filter_val_text;
    }
    var resetFilterSkillText = filterSkillText+'<span class="icon"><i class="fa fa-times"></i></span>';
    $('#employee_skill_data_table_reset_filter').html(resetFilterSkillText);
    
    // Use a single conditional statement to show or hide the button
    if (employee_name_filter_val == "0" && employee_skill_filter_val == "0") {
        $("#employee_skill_data_table_reset_filter").hide();
    } else {
        $("#employee_skill_data_table_reset_filter").show();
    }

    $("#employee_skill_data_table_filter_modal").modal("hide");
});


$("#employee_skill_data_table_add_new").on("click", function() {
    $("#flag_id").val("0");

    var modalId = "#employee_skill_data_table_modal";
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

$("#employee_skill_data_table_filter_btn").on("click", function() {
  // Show the associated modal
  $("#flag_id").val('0');
   $("#employee_skill_data_table_filter_modal").modal("show");
});

$("#employee_skill_data_table_reset_filter").on("click", function() {
  // Show the associated modal
  
     var table = $('#employee_skill_data_table').DataTable();
    var modal = $('#employee_skill_data_table_filter_modal');
    modal.find("select").val("0");
    table.columns().search('');
    table.search('').draw();
  
    // Hide the "Cancel" button again
    $(this).hide();
    // Update the filter status text
});

</script>