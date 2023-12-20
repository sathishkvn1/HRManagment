<div id="employment_tab" class="reviewBlock">
           
                            <div class="combined_buttons">
                                                <div class="add_new_btn_div">
                                                     <?php 
                                                            if($employee_add=='yes'):
                                                        ?>
                                                    <button id="employee_team_details_data_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
                                                 <?php endif; ?>
                                                 </div>
                                                <div class="filter_btn_div">
                                                <button id="employee_team_details_data_table_filter_btn" class="customise_filter_button" data-value="employee_data_table"><i class="fas fa-filter"></i>Filter</button>
                                                </div>
                                                <div class="reset_filter_btn_div">
                                                    <button id="employee_team_details_data_table_reset_filter"  style="display:none" class="cancel_filter_button"><i class="fas fa-times"></i> Cancel</button>
                                                </div>
                                                
                                            </div>  
                             </div>
                       
                        <!-- table  -->
                        <table id="employee_team_details_data_table" class="table table-striped">
                        <thead>
                            <tr>        <th>Team</th>
                                        <th>Member </th>
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
   <div class="modal fade data-table-modal" id="employee_team_details_data_table_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Team Members</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="employee_team_details_modal_form" class="modal_form">

                <!--one field  text field---- -->
                        <div class="form-group row">
                            <div class="col-3">
                                <label for="recipient-name" class="col-form-label required"> Team Name</label>
                            </div>
                            <div class="col-8">
                                <select name="team_member_team_id"  id="team_member_team_id"class="form-control select2" >
                                   

                                 </select>
                            </div>
                        </div>
                    <!-- ./ one field ---- -->    
                    <!--one field  text field---- -->
                    <div class="form-group row">
                            <div class="col-3">
                            <label for="team_member_id" class="col-form-label required">Member</label>
                            </div>
                            <div class="col-8">
                            <select name="team_member_id" id="team_member_id" class="form-control select2">
                                
                            </select> 

                            </div>
                        </div>
                    <!-- ./ one field ---- -->           
                    <input type="hidden" name="team_name_selected_value" id="team_name_selected_value" value="0">
                    <input type="hidden" name="team_member_selected_value" id="team_member_selected_value" value="0">
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="btn_employee_team_master_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="employee_team_member_save"><i class="fas fa-calendar-check"></i>Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
     <!-- /.modal for company department-->

     <!-- Modal for selecting job title -->
     <div class="modal filtering_modal data-table-modal" id="employee_team_details_data_table_filter_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Filter</h5>
              
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form action="#">
                <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label"> Team</label>
                      </div>
                      <div class="col-8">
                      <select id="team_name_team_detailes_for_filtering" class="form-control select2">
                          <option value="0">Not Applicable</option>
                        
                      </select>
                        </div>
                  </div>

        
                <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label">member</label>
                      </div>
                      <div class="col-8">
                      <select id="team_member_team_detailes_for_filtering" class="form-control select2">
                       
                      </select>
                        </div>
                  </div>
        
              </form>
            </div>
            <div class="modal-footer">
                <button id="appy_filter_team_details" class="btn filter_save_btn">Apply Filter</button>
            </div>
        </div>
    </div>
</div>

<!-- modal end  -->


    

    
<script>
  var BASE_URL = "<?php echo base_url(); ?>";
 var hrController = "<?php echo CONTROLLER_HR; ?>";
 var token = "<?php echo $_SESSION['li_token']; ?>";

// load job item data table
function loadDataTableForEmployeeTeamDetails(){
    $('#employee_team_details_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" +  hrController + "/get_employee_team_details",
            "dataSrc": "data"
        },
            "columns": [
            { data: "team_name"},
            { data: "employee_name"},
            {
                data: "id",
                render: function (data, type, full, row) {
                    var id = full.id;
                    return `
                        <div class="operations">
                        <?php if($employee_edit=='yes'): ?>
                            <a href="#" class="edit" onclick="employeeTeamDetailsEditRow(${id});"><i class="fas fa-edit"></i>Edit</a>
                            <?php endif;
                            if($employee_view=='yes'): ?>
                            <a href="#" class="view" onclick="employeeTeamDetailsViewRow(${id});"><i class="fas fa-eye"></i>View</a>
                            <?php endif;
                            if($employee_delete=='yes'): ?>
                            <a href="#" class="delete" onclick="employeeTeamDetailsDeleteRow(${id});"><i class="fas fa-trash"></i>Delete</a>
                            <?php endif; ?>
                        </div>`;
                }
            }
        ],


        "initComplete": function(settings, json) {
            customizeDataTable('employee_team_details_data_table');
        }
    });
}

//

// get option throgh ajaxx 
$('#employee_team_details_data_table_filter_modal,#employee_team_details_data_table_modal').on('shown.bs.modal', function () {
    $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/get_team_name_option",
            type: 'GET',
            dataType: "json",
            success: function(data) {
                
             
                $('#team_name_team_detailes_for_filtering,#team_member_team_id').empty();
                var selected_team_name_id = $("#team_name_selected_value").val();
                // Update the modal content with the fetched data
                if($("#flag_id").val()=='0')
                {
                //   $('#team_member_team_id').html('<option value="0">Select employee name</option>');
                  $('#team_name_team_detailes_for_filtering').html('<option value="0">Not Applicable</option>');
                  $('#team_member_team_id').html('<option value="">Select Team</option>');
                }
               
                $.each(data, function (index, team_name_details) {
                
                       
                    var option= $('#team_name_team_detailes_for_filtering,#team_member_team_id').append('<option value="' + team_name_details.id + '">' + team_name_details.team_name + '</option>');
                    $('#team_name_team_detailes_for_filtering, #team_member_team_id').append(option);
                });
                if($("#flag_id").val()=='1'){
                    $('#team_member_team_id').val(selected_team_name_id);
                }
              
              
                
            },
            error: function(error) {
                console.log('Error fetching content:', error);
                // If there's an error, still display the default "Select Leader" option
                // $('#team_member_team_id').html('<option value="0">Select employee name</option>');
                $('#team_name_team_detailes_for_filtering').html('<option value="0">Not Applicable</option>');
            }
        });
    // get option  in travel master
    });
 
    
$('#employee_team_details_data_table_modal,#employee_team_details_data_table_filter_modal').on('shown.bs.modal', function () {

   
// get option  in travel master
$.ajax({
        url: BASE_URL + "index.php/" + hrController + "/get_team_employee_name_option",
        type: 'GET',
        dataType: "json",
        success: function(data) {
            // Update the modal content with the fetched data  
            $('#team_member_id, #team_member_team_detailes_for_filtering').empty(); 
            var selected_team_member_id = $("#team_member_selected_value").val();
            if ($("#flag_id").val() == '0') {
            
            //   $('#team_member_id').html('<option value="0">Select Employee Name</option>');
            $('#team_member_team_detailes_for_filtering').html('<option value="0">Not Applicable</option>');
            $('#team_member_id').html('<option value="">Select Team Member</option>');
            }
            
            $.each(data, function (index, team_member_name) {
                $('#team_member_id,#team_member_team_detailes_for_filtering').append('<option value="' + team_member_name.employee_id + '">' + team_member_name.employee_name + '</option>');
            });
            if($("#flag_id").val()=='1'){
                    $('#team_member_id').val(selected_team_member_id);
                }
           
        },
        error: function(error) {
            console.log('Error fetching content:', error);
            // $('#team_member_id').html('<option value="0">Select Employee Name</option>');
            $('#team_member_team_detailes_for_filtering').html('<option value="0">Not Applicable</option>');

        }
    });
// get option  in travel master
});

// ./load job item data table
$("#employee_team_member_save").on("click",function() {  
    if ($('#employee_team_details_modal_form').valid()) {
          var formData  = new FormData();
          formData.append('team_id', $("#team_member_team_id").val());
          formData.append('team_member_id', $("#team_member_id").val());
          formData.append('flag_id', $("#flag_id").val()); 
          formData.append('row_id', $("#row_id").val()); 
          formData.append('li_token', token); 
            $.ajax({
                     url: BASE_URL + "index.php/" + hrController + "/save_employee_team_member",
                     type: 'POST',
                     data:  formData,
                     dataType: "JSON",
                     processData: false,
                     contentType: false,
                        success: function(response) {
                              console.log("response",response);
                               console.log(response.message);
                               $('#employee_team_details_data_table_modal').modal('hide');
                                $('#employee_team_details_data_table').DataTable().ajax.reload();
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

// edit
function employeeTeamDetailsEditRow(row_id) {
    $("#row_id").val(row_id);

     flag_id=$("#flag_id").val("1");
 
     $("#row_id").val(row_id);
   $.ajax({
       url: BASE_URL + "index.php/" + hrController + "/get_employee_team_member_by_id",
       type: "POST",
       data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val()},
       dataType: "json",
       success: function (response) {
           // console.log(response is ,response);
           if (response.success) {
               $("#team_member_team_id").val(response.data.team_id).trigger('change');
               $("#team_member_id").val(response.data.team_member_id).trigger('change');
               $("#employee_team_details_data_table_modal").modal("show");
               $("#team_name_selected_value").val(response.data.team_id);
              $("#team_member_selected_value").val(response.data.team_member_id);
            
           } else {
               alert("Failed to fetch item.");
           }
       },
       error: function (xhr, status, error) {
           alert("Error fetching item.");
       }
   });
}
// .edit



// view
function employeeTeamDetailsViewRow(row_id) {
    $("#flag_id").val("1");
    $("#row_id").val(row_id);
    $.ajax({
       url: BASE_URL + "index.php/" + hrController + "/get_employee_team_member_by_id",
       type: "POST",
       data: { row_id: row_id, li_token: token},
       dataType: "json",
       success: function (response) {
           console.log("response is" ,response);
           if (response.success) {
            
              $("#team_member_team_id").val(response.data.team_id).trigger('change');
               $("#team_member_id").val(response.data.team_member_id).trigger('change');
               
               $("#employee_team_details_data_table_modal").modal("show");

               var disable_employee_team_details = $("#team_member_team_id, #team_member_id");
               disable_employee_team_details.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
               $(".modal-footer .savebtn").hide();
                // Show the .modal-footer when the modal is hidden
                $("#employee_team_details_data_table_modal").on("hidden.bs.modal", function () 
                {
                    $(".modal-footer .savebtn").show();
                    disable_employee_team_details.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
                });
                $("#team_name_selected_value").val(response.data.team_id);
             $("#team_member_selected_value").val(response.data.team_member_id);
           } else {
               alert("Failed to fetch job title details.");
           }
       },
       error: function (xhr, status, error) {
           alert("Error fetching job title details.");
       }
   });
}
/// ./view




// delete
function employeeTeamDetailsDeleteRow(row_id) {
    if (confirm("Are you sure you want to delete this item?")) {
        $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/delete_employee_team_member_by_id",
            type: "POST",
            data: { row_id: row_id, li_token: token },
            dataType: "json",
            success: function (response) {
                $('#employee_team_details_data_table_modal').modal('hide');
                 $('#employee_team_details_data_table').DataTable().ajax.reload();
                  showToast('success', response.message); 
            },
            error: function (xhr, status, error) {
                
                alert_message("failure", "Error", "Error delete job title item.");
            }
        });
    }
  
}
// ./delete

$(document).ready(function () {

$('#employee_team_details_modal_form').validate({
rules: {
    team_member_team_id: {
     required: true,
     },
     team_member_id: {
        required: true,
    }
},
messages: {
    team_member_team_id: "Please select a team",
    team_member_id: "Please select a member"
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





$("#appy_filter_team_details").on("click", function () {
    var employee_team_name_team_details_filter_val = $("#team_name_team_detailes_for_filtering").val();
    var employee_team_member_team_details_filter_val = $("#team_member_team_detailes_for_filtering").val();
    var employee_team_name_team_details_filter_val_text = $("#team_name_team_detailes_for_filtering option:selected").text();
    var employee_team_member_team_details_filter_val_text = $("#team_member_team_detailes_for_filtering option:selected").text();

    var table_team_details = $('#employee_team_details_data_table').DataTable();

    // Clear all filters
    table_team_details.columns().search('');

    if (employee_team_name_team_details_filter_val != "0") {
      
        table_team_details.column(0).search(employee_team_name_team_details_filter_val_text);
    }
     if (employee_team_member_team_details_filter_val != "0") {
      
        table_team_details.column(1).search(employee_team_member_team_details_filter_val_text);
    }

    table_team_details.draw();

    var filterTeamDetailsText = ''; // Default text
    if (employee_team_name_team_details_filter_val != "0" && employee_team_member_team_details_filter_val != "0") {
        filterTeamDetailsText = 'TeamName: ' + employee_team_name_team_details_filter_val_text + ' & ' + 'Member: '+employee_team_member_team_details_filter_val_text;
    }
     else if (employee_team_name_team_details_filter_val != "0") {
        filterTeamDetailsText = 'Team Name: ' + employee_team_name_team_details_filter_val_text;
    } 
    else if (employee_team_member_team_details_filter_val != "0") {
        filterTeamDetailsText = 'Member: ' + employee_team_member_team_details_filter_val_text;
    }
    var resetFilterTeamDetailsText = filterTeamDetailsText+'<span class="icon"><i class="fa fa-times"></i></span>';
    $('#employee_team_details_data_table_reset_filter').html(resetFilterTeamDetailsText);
    
    // Use a single conditional statement to show or hide the button
    if (employee_team_name_team_details_filter_val == "0" && employee_team_member_team_details_filter_val == "0") {
        $("#employee_team_details_data_table_reset_filter").hide();
    } else {
        $("#employee_team_details_data_table_reset_filter").show();
    }

    $("#employee_team_details_data_table_filter_modal").modal("hide");
});


$("#employee_team_details_data_table_add_new").on("click", function() {
    $("#flag_id").val("0");

    var modalId = "#employee_team_details_data_table_modal";
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

$("#employee_team_details_data_table_filter_btn").on("click", function() {

  $("#flag_id").val('0');
   $("#employee_team_details_data_table_filter_modal").modal("show");
});


$("#employee_team_details_data_table_reset_filter").on("click", function() {

  
     var table = $('#employee_team_details_data_table').DataTable();
    var modal = $('#employee_team_details_data_table_filter_modal');
    modal.find("select").val("0");
    table.columns().search('');
    table.search('').draw();
  
   
    $(this).hide();

});


</script>