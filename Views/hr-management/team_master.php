
<div id="employment_tab" class="reviewBlock">
<div class="combined_buttons">
    <div class="add_new_btn_div">
         <?php 
            if($team_add=='yes'):
        ?>
        <button id="employee_team_master_data_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
     <?php endif; ?>
     </div>
    <div class="filter_btn_div">
    <button id="employee_team_master_data_table_filter_btn" class="customise_filter_button" data-value="employee_data_table"><i class="fas fa-filter"></i>Filter</button>
    </div>
    <div class="reset_filter_btn_div">
        <button id="employee_team_master_data_table_reset_filter"  style="display:none" class="cancel_filter_button"><i class="fas fa-times"></i> Cancel</button>
    </div>
    
</div>                  
</div>
                       
                        <!-- table  -->
                        <table id="employee_team_master_data_table" class="table table-striped">
                        <thead>
                            <tr>       <th>Branch</th>
                                        <th>Department </th>
                                        <th>Team Name</th>
                                        <th>Team Description </th>
                                        <th>Team Leader </th>
                                        <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                          <tr>

                          </tr>
                        </tbody>
                        </table>
                        <!-- ./ table start -->
                

                        <?php include("bottom-js.php"); ?> 
    
    
                      

   <!-- modal employement -->
   <div class="modal fade data-table-modal" id="employee_team_master_data_table_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Team Master</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="employee_team_master_modal_form" class="modal_form">

                <!--one field  text field---- -->
                        <div class="form-group row">
                            <div class="col-3">
                                <label for="recipient-name" class="col-form-label required">Employee Branch</label>
                            </div>
                            <div class="col-8">
                                <select name="team_branch_id"  id="team_branch_id" class="form-control select2" >
                                <option value="">Select branch</option>

                                 </select>
                            </div>
                        </div>
                    <!-- ./ one field ---- -->    
                    <!--one field  text field---- -->
                    <div class="form-group row">
                            <div class="col-3">
                            <label for="team_department_id" class="col-form-label required">Employee Department</label>
                            </div>
                            <div class="col-8">
                            <select name="team_department_id" id="team_department_id" class="form-control select2">
                                <option value="">Select Department</option>
                                
                            </select> 

                            </div>
                        </div>
                    <!-- ./ one field ---- -->           


                <!--one field  text field---- -->
                     <div class="form-group row">
                        <div class="col-3">
                             <label for="recipient-name" class="col-form-label required">Team Name</label>
                        </div>
                        <div class="col-8">
                    
                            <input type="text" name="team_name"  id="team_name" class="form-control"></input>
                        </div>
                    </div>
                <!-- ./ one field ---- -->  
                
                
                <!--one field  text field---- -->
                     <div class="form-group row">
                        <div class="col-3">
                             <label for="recipient-name" class="col-form-label required">Team Description</label>
                        </div>
                        <div class="col-8">
                            <input type="text" name="team_description"  id="team_description" class="form-control"></input>
                        </div>
                    </div>
                <!-- ./ one field ---- -->  
                         
                      <!--one field  text field---- -->
                      <div class="form-group row">
                        <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Team Leader</label>
                        </div>
                        <div class="col-8">
                        <!-- <input type="text" class="form-control" id="employment_status" name="employment_status"> -->
                        <select name="team_leader_id"  id="team_leader_id"class="form-control select2" >
                            <option value="">Select Leader</option>
                           


                            </select>
                        </div>
                    </div>
                    <!-- ./ one field ---- -->            
                    <input type="hidden" id="hidden_team_master_employee_branch" name=""val="0">
                    <input type="hidden" id="hidden_team_master_employee_department" name="" val="0">
                    <input type="hidden" id="hidden_team_master_employee_name" name="" val="0">
      
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="btn_employee_team_master_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="employee_team_master_save"><i class="fas fa-calendar-check"></i>Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
     <!-- /.modal for company department-->



   <!-- ./modal employement -->
   <div class="modal fade data-table-modal" id="employee_team_master_data_table_filter_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Employee Team Details Filter</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="employment_status_modal_form" class="modal_form">
                 <!--one field  text field---- -->
                    <div class="form-group row">
                        <div class="col-3">
                             <label for="recipient-name" class="col-form-label required">Team Name</label>
                        </div>
                        <div class="col-8">
                            <select name="team_master_filter_team_id"  id="team_master_filter_team_id"class="form-control select2">

                                </select>
                        </div>
                    </div>
                <!-- ./ one field ---- -->              
                <!--one field  text field---- -->
                    <div class="form-group row">
                        <div class="col-3">
                             <label for="recipient-name" class="col-form-label required">Team Leader</label>
                        </div>
                        <div class="col-8">
                            <select name="filter_team_employee_id"  id="filter_team_employee_id"class="form-control select2"> 

                                </select>
                        </div>
                    </div>
                <!-- ./ one field ---- -->              
                               

              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="#" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="btn_team_master_filter"><i class="fas fa-calendar-check"></i>Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>




      <!-- ======filtering ==== -->
      <!-- Modal Structure -->



       <div class="modal fade data-table-modal" id="detailsModal" data-bs-backdrop="static">
         <div class="modal-dialog modal-lg"> 
          <div class="modal-content">
          <div class="modal-header">
                <h3 class="modal-title">Employee Team Details</h3>
                
             
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
                <h1>Title</h1>
                <p>Description or details here...</p>
            </div>
            <div class="modal-footer justify-content-between">
            <input type="hidden" id="hiddenIdField" value="">
            
            <button class="btn savebtn" id="generatePDFButton">Generate PDF</button>
            </div>
          </div> 
       
     </div>
</div>







<script>
//  $(document).ready(function () {

  var BASE_URL = "<?php echo base_url(); ?>";
 var hrController = "<?php echo CONTROLLER_HR; ?>";
 var token = "<?php echo $_SESSION['li_token']; ?>";

// load job item data table
function loadDataTableForTeamMaster(){
    $('#employee_team_master_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" +  hrController + "/get_employee_team_master_details",
            "dataSrc": "data"
        },
            "columns": [
            { data: "branch_name"},
            { data: "department_name"},
            { data: "team_name"},
            { data: "team_description"},
            { data: "employee_name"},
            {
                data: "id",
                render: function (data, type, full, row) 
                {
                    var id = full.id;
                    return `
                        <div class="operations">
                        <?php if($team_edit=='yes'): ?>
                            <a href="#" class="edit" onclick="employeeTeamMasterEditRow(${id});"><i class="fas fa-edit"></i>Edit</a>
                            <?php endif;
                            if($team_view=='yes'): ?>
                            <a href="#" class="view" onclick="employeeTeamMasterViewRow(${id});"><i class="fas fa-eye"></i>View</a>
                            <?php endif;
                            if($team_delete=='yes'): ?>
                            <a href="#" class="delete" onclick="employeeTeamMasterDeleteRow(${id});"><i class="fas fa-trash"></i>Delete</a>
                            <?php endif; ?>
                            <a href="#" class="details" onclick="openDetailsModal(${id});"><i class="fas fa-info"></i>Details</a>
                        </div>`;
                }
            }
        ],


        "initComplete": function(settings, json) {
            customizeDataTable('employee_team_master_data_table');
        }
    });
}



//  $(document).ready(function () {
// ./load job item data table
     $("#employee_team_master_save").on("click",function() {  
        if ($('#employee_team_master_modal_form').valid()) {
          var formData  = new FormData();
          formData.append('branch_id', $("#team_branch_id").val());
          formData.append('department_id', $("#team_department_id").val());
          formData.append('team_name', $("#team_name").val());
          formData.append('team_description', $("#team_description").val()); 
          formData.append('team_leader_id', $("#team_leader_id").val());
          formData.append('flag_id', $("#flag_id").val()); //
          formData.append('row_id', $("#row_id").val()); //
          formData.append('li_token', token); 
            $.ajax({
                     url: BASE_URL + "index.php/" + hrController + "/save_employee_team_details",
                     type: 'POST',
                     data:  formData,
                     dataType: "JSON",
                     processData: false,
                     contentType: false,
                        success: function(response) {
                              console.log("response",response);
                               console.log(response.message);
                               $('#employee_team_master_data_table_modal').modal('hide');
                                $('#employee_team_master_data_table').DataTable().ajax.reload();
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


$('#team_branch_id').change(function () {

        var branch_id = $('#team_branch_id').val();
        var department_id = $('#team_department_id').val();
         get_department_option_by_branch_id(branch_id,department_id);

});

$('#team_department_id').change(function(){
    var department_id = $('#team_department_id').val();
    var team_leader_id = $('#team_leader_id').val();
         get_leader_option_by_branch_id(department_id,team_leader_id);
 });
// checking

function get_department_option_by_branch_id(branch_id,department_id){ 
    if (branch_id != '') {
      
    $('#team_department_id').html('<option value="">Select Department</option>');
    $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/get_departments_by_branch",
        method: "POST",
        data: { branch_id: branch_id, li_token: token }, // Make sure 'token' is defined
        dataType: "json",
        success: function (data) {

                $.each(data, function (index, department) {
                    $('#team_department_id').append('<option value="' + department.id + '">' + department.department_name + '</option>');
                });
            
            // $('#team_branch_id').val(branch_id);
            if($("#flag_id").val()=='1'){
                 $('#team_department_id').val(department_id);
            }
           
            //  $('#team_department_id').val(department_id);
            // $('#team_leader_id').html('<option value="">Select Employee</option>');
            
        }
    });
} else {
    $('#team_department_id').html('<option value="">Select Department</option>');
    $('#team_leader_id').html('<option value="">Select Leader</option>');
} 
}
// ./checking








function get_leader_option_by_branch_id(department_id,team_leader_id){
    if(department_id != '')
  {
   $.ajax({
     url: BASE_URL + "index.php/" + hrController + "/get_employee_by_departments",
    method:"POST",
    data: { department_id: department_id, li_token: token }, // Make sure 'token' is defined
    dataType: "json",
    success: function (data) {
                console.log(data);
                $('#team_leader_id').html('<option value="">Select a leader</option>');
                
                $.each(data, function (index, team_leader) {
                    $('#team_leader_id').append('<option value="' + team_leader.employee_id + '">' + team_leader.employee_name + '</option>');
                });
                if($("#flag_id").val()=='1'){
                 $('#team_leader_id').val(team_leader_id);
            }
            }
   });
  }
  else
  {
   $('#team_leader_id').html('<option value="">Select a leader</option>');
  }
 
}
 

 //get option
 $('#employee_team_master_data_table_filter_modal').on('shown.bs.modal', function () {
    // Make an AJAX request to fetch the content
 filter_team_master_options()

   
});



// master filter ajax option function 
function filter_team_master_options(){
    $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/get_team_leader_option",
        type: 'GET',
        dataType: "json",
        success: function(data) {
            // Update the modal content with the fetched data
            $('#filter_team_employee_id').html('<option value="0">Not Applicable</option>');
            $.each(data, function (index, team_leader) {
                $('#filter_team_employee_id').append('<option value="' + team_leader.id + '">' + team_leader.leader_name + '</option>');
            });
        },
        error: function(error) {
            console.log('Error fetching content:', error);
            // If there's an error, still display the default "Select Leader" option
            $('#filter_team_employee_id').html('<option value="0">Not Applicable</option>');
        }
    });

    $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/get_team_name_option",
        type: 'GET',
        dataType: "json",
        success: function(data) {
            // Update the modal content with the fetched data
            $('#team_master_filter_team_id').html('<option value="0">Not Applicable</option>');
            $.each(data, function (index, team) {
                $('#team_master_filter_team_id').append('<option value="' + team.id + '">' + team.team_name + '</option>');
            });
        },
        error: function(error) {
            console.log('Error fetching content:', error);
            // If there's an error, still display the default "Select Leader" option
            $('#team_master_filter_team_id').html('<option value="0">Not Applicable</option>');
        }
    });
}

// ./master filter ajax option function 

 //edit
function employeeTeamMasterEditRow(row_id) {
     
     flag_id=$("#flag_id").val("1");
     $("#row_id").val(row_id);
   $.ajax({
       url: BASE_URL + "index.php/" + hrController + "/get_employee_team_master_by_id",
       type: "POST",
       data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val()},
       dataType: "json",
       success: function (response) {
           // console.log(response is ,response);
           if (response.success) {
               $("#team_branch_id").val(response.data.branch_id);
                $("#team_department_id").val(response.data.department_id);
               $("#team_name").val(response.data.team_name);
               $("#team_description").val(response.data.team_description);
               $("#team_leader_id").val(response.data.team_leader_id);
               $("#hidden_team_master_employee_branch").val(response.data.branch_id);
               $("#hidden_team_master_employee_department").val(response.data.department_id);
               $("#employee_team_master_data_table_modal").modal("show");
               if($("#flag_id").val()=='1')
               {
                  get_department_option_by_branch_id(response.data.branch_id,response.data.department_id);
                  get_leader_option_by_branch_id(response.data.department_id,response.data.team_leader_id);
               }
           } else {
               alert("Failed to fetch item.");
           }
       },
       error: function (xhr, status, error) {
           alert("Error fetching item.");
       }
   });
}
//.edit
// view
function employeeTeamMasterViewRow(row_id) {
   
    flag_id=$("#flag_id").val("1");
     $("#row_id").val(row_id);
    $.ajax({
       url: BASE_URL + "index.php/" + hrController + "/get_employee_team_master_by_id",
       type: "POST",
       data: { row_id: row_id, li_token: token},
       dataType: "json",
       success: function (response) {
           console.log("response is" ,response);
           if (response.success) {
            $("#team_branch_id").val(response.data.branch_id);
               $("#team_department_id").val(response.data.department_id);
               alert(response.data.department_id);
               console.log(response.data.department_id);
               $("#team_name").val(response.data.team_name);
               $("#team_description").val(response.data.team_description);
               $("#team_leader_id").val(response.data.team_leader_id);
               $("#employee_team_master_data_table_modal").modal("show");
               $("#hidden_team_master_employee_branch").val(response.data.branch_id);
               $("#hidden_team_master_employee_department").val(response.data.department_id);
               if($("#flag_id").val()=='1')
               {
                  get_department_option_by_branch_id(response.data.branch_id,response.data.department_id);
                  get_leader_option_by_branch_id(response.data.department_id,response.data.team_leader_id);
               }
               var disable_employee_team_master = $("#team_branch_id, #team_department_id, #team_name,#team_description,#team_leader_id");
               disable_employee_team_master.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
               
               $(".modal-footer .savebtn").hide();
                // Show the .modal-footer when the modal is hidden
                $("#employee_team_master_data_table_modal").on("hidden.bs.modal", function () 
                {
                    $(".modal-footer .savebtn").show();
                    disable_employee_team_master.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
                });


           } 
           
           else {
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
function employeeTeamMasterDeleteRow(row_id) {
    alert('Delete clicked with id: ' + row_id);
    if (confirm("Are you sure you want to delete this item?")) {
        $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/delete_employee_team_master_by_id",
            type: "POST",
            data: { row_id: row_id, li_token: token },
            dataType: "json",
            success: function (response) {
                $('#employee_team_master_data_table_modal').modal('hide');
                 $('#employee_team_master_data_table').DataTable().ajax.reload();
                  showToast('success', response.message); 
                  
            },
            error: function (xhr, status, error) {
                
                alert_message("failure", "Error", "Error delete job title item.");
            }
        });
    }
  
}
// ./delete

$( document ).ready(function() {
    $('#employee_team_master_modal_form').validate({
    rules: {
         team_branch_id: {
            required: true,
        },
         team_department_id: {
            required: true,
        },
        team_name: {
            required: true,
        },
        team_leader_id: {
            required: true,
        }
    },
    messages: {
        team_branch_id: "Please select branch",
        team_department_id: "Please select department",
        team_name: "Please enter team name",
        team_leader_id: "Please select team leader"
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
})
});



// filter and display box 


$("#btn_team_master_filter").on("click", function () {
    var team_master_team_name_val = $("#team_master_filter_team_id").val();
    var tam_master_team_leader_val = $("#filter_team_employee_id").val();
    var team_master_team_name_val_text = $("#team_master_filter_team_id option:selected").text();
    var tam_master_team_leader_val_text = $("#filter_team_employee_id option:selected").text();
    var table_team_master = $('#employee_team_master_data_table').DataTable();
    // Clear all filters
    table_team_master.columns().search('');

    if (team_master_team_name_val != "0") {
      
        table_team_master.column(2).search(team_master_team_name_val_text);
    }
     if (tam_master_team_leader_val != "0") {
      
        table_team_master.column(4).search(tam_master_team_leader_val_text);
    }

    table_team_master.draw();

    var filterTeamMasterText = ''; // Default text
    if (team_master_team_name_val != "0" && tam_master_team_leader_val != "0") {
        filterTeamMasterText = 'Team Name: ' + team_master_team_name_val_text + ' & ' + 'Team Leader: '+tam_master_team_leader_val_text;
    }
     else if (team_master_team_name_val != "0") {
        filterTeamMasterText = 'Team Name: ' + team_master_team_name_val_text;
    } 
    else if (tam_master_team_leader_val != "0") {
        filterTeamMasterText = 'Team Leader: ' + tam_master_team_leader_val_text;
    }
    var resetFilterTeamMasterText = filterTeamMasterText+'<span class="icon"><i class="fa fa-times"></i></span>';
    $('#employee_team_master_data_table_reset_filter').html(resetFilterTeamMasterText);
    
    // Use a single conditional statement to show or hide the button
    if (team_master_team_name_val == "0" && tam_master_team_leader_val == "0") {
        $("#employee_team_master_data_table_reset_filter").hide();
    } else {
        $("#employee_team_master_data_table_reset_filter").show();
    }

    $("#employee_team_master_data_table_filter_modal").modal("hide");
});
// filter and display box 

    // });
//get branch id in team 



$('#employee_team_master_data_table_modal').on('shown.bs.modal', function () {

    // for remove all option in department if click add button
    if($("#flag_id").val()=='0')
        {
              $('#team_department_id option:not([value=""])').remove();
              $('#team_leader_id option:not([value=""])').remove();
              
        }
    // get option  in travel master
    var branch_hid_val=$("#hidden_team_master_employee_branch").val();

    $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/get_branch_id_option_in_team",
            type: 'GET',
            dataType: "json",
            success: function(data) {
              $('#team_branch_id').empty();

                // Update the modal content with the fetched data
                if($("#flag_id").val()=='0')
                {
                  $('#team_branch_id').html('<option value="">Select branch</option>');
                }
                $.each(data, function (index,branch_name) {
                    $('#team_branch_id').append('<option value="' + branch_name.id + '">' + branch_name.branch_name + '</option>');
                });
                  if($("#flag_id").val()=='1'){
                    $('#team_branch_id').val(branch_hid_val);
                }
            },
            error: function(error) {
                console.log('Error fetching content:', error);
                // If there's an error, still display the default "Select Leader" option
                $('#team_branch_id').html('<option value="">Select branch name</option>');
            }
        });
    // get option  in travel master
    });
//get branch id in team 





// function openDetailsModal(id) {
//     alert(id);
//     $("#hiddenIdField").val(id);
//     $("#detailsModal").modal("show");

//     $.ajax({
//         "url": BASE_URL + "index.php/" + hrController + "/get_employee_team_master_details_for_modal",
//         method: 'POST',
//         data: { id: id, li_token: token },
//         success: function(response) {
//             console.log(response);
//             var data = JSON.parse(response);

//             if (data.data && data.data.length > 0) {
//                 var teamData = data.data[0];
//                 var teamName = teamData.team_name;
//                 var teamLeaderName = teamData.team_leader_name;
//                 var branchName = teamData.branch_name;
//                 var departmentName = teamData.department_name;
//                 var teamMembers = data.data;

//                 var modalContent = '<h5>Team: ' + teamName + '</h5>';
//                 modalContent += '<p>Team Leader: ' + teamLeaderName + '</p>';
//                 modalContent += '<p>Branch: ' + branchName + '</p>';
//                 modalContent += '<p>Department: ' + departmentName + '</p>';

//                 if (Array.isArray(teamMembers) && teamMembers.length > 0) {
//                     modalContent += '<table class="table">';
//                     modalContent += '<thead><tr><th>Team Member Name</th><th>Address</th><th>Mobile Phone</th></tr></thead>';
//                     modalContent += '<tbody>';

//                     teamMembers.forEach(function(member) {
//                         var members = member.team_members.split(', ');
//                         members.forEach(function(memberName) {
//                             modalContent += '<tr>';
//                             modalContent += '<td>' + memberName + '</td>';
//                             modalContent += '<td>' + buildAddressHTML(member) + '</td>';
//                             modalContent += '<td>' + member.mobile_phone + '</td>';
//                             modalContent += '</tr>';
//                         });
//                     });

//                     modalContent += '</tbody></table>';
//                 } else {
//                     modalContent += '<p>No team members found.</p>';
//                 }

//                 $('#detailsModal .modal-body').html(modalContent);
//                 $("#detailsModal").modal("show");
//             } else {
//                 console.error('No data found.');
//             }
//         },
//         error: function(xhr, status, error) {
//             // Handle errors
//             console.error(xhr.responseText);
//         }
//     });
// }

function buildAddressHTML(member) {
    console.log("mmmmmm",member);
    var addressHTML = '';

    addressHTML += member.team_member_address_1 + '<br>';
    if (member.team_member_address_2) addressHTML += member.team_member_address_2 + '<br>';
    if (member.team_member_address_3) addressHTML += member.team_member_address_3 + '<br>';
    if (member.team_member_address_4) addressHTML += member.team_member_address_4 + '<br>';

    return addressHTML;
}


// function openDetailsModal(id) {
//     alert(id);
//     $("#hiddenIdField").val(id);
//     $("#detailsModal").modal("show");

//     $.ajax({
//         "url": BASE_URL + "index.php/" + hrController + "/get_employee_team_master_details_for_modal",
//         method: 'POST',
//         data: { id: id, li_token: token },
//         success: function(response) {
//             console.log(response);
//             var data = JSON.parse(response);

//             var modalContent = '';

          

//             if (data.data && data.data.length > 0) {

//                 var teamData = data.data[0];
//                 var teamName = teamData.team_name;
//                 alert(teamName);
//                 var teamLeaderName = teamData.team_leader_name;
//                 var branchName = teamData.branch_name;
//                 var departmentName = teamData.department_name;

//                 modalContent += '<h5>Team: ' + teamName + '</h5>';
//                 modalContent += '<p>Team Leader: ' + teamLeaderName + '</p>';
//                 modalContent += '<p>Branch: ' + branchName + '</p>';
//                 modalContent += '<p>Department: ' + departmentName + '</p>';
//                 var teamMembers = data.data;
             
//                 var modalContent = '<table class="table">';
//                 modalContent += '<thead><tr><th>Team Member Name</th><th>Address</th><th>Mobile Phone</th></tr></thead>';
//                 modalContent += '<tbody>';

//                 data.data.forEach(function(member) {
//                     modalContent += '<tr>';
//                     modalContent += '<td>' + member.team_member_name + '</td>';
//                     modalContent += '<td>' + buildAddressHTML(member) + '</td>';
//                     modalContent += '<td>' + member.team_member_phone + '</td>';
//                     modalContent += '</tr>';
//                 });

//                 modalContent += '</tbody></table>';

//                 $('#detailsModal .modal-body').html(modalContent);
//             } else {
//                 console.error('No data found.');
//             }
//         },
//         error: function(xhr, status, error) {
//             // Handle errors
//             console.error(xhr.responseText);
//         }
//     });
// }

function openDetailsModal(id) {
    alert(id);
    $("#hiddenIdField").val(id);
    $("#detailsModal").modal("show");

    $.ajax({
        "url": BASE_URL + "index.php/" + hrController + "/get_employee_team_master_details_for_modal",
        method: 'POST',
        data: { id: id, li_token: token },
        success: function(response) {
            console.log(response);
            var data = JSON.parse(response);

            var modalContent = '<h5><b>TEAM DETAILS</b></h5>'; // Start modal content with a header

            if (data.data && data.data.length > 0) {
                var teamData = data.data[0];
                var teamName = teamData.team_name;
                var teamLeaderName = teamData.team_leader_name;
                var branchName = teamData.branch_name;
                var departmentName = teamData.department_name;

                modalContent += '<p>Team: ' + teamName + '</p>';
                modalContent += '<p>Team Leader: ' + teamLeaderName + '</p>';
                modalContent += '<p>Branch: ' + branchName + '</p>';
                modalContent += '<p>Department: ' + departmentName + '</p>';

                modalContent += '<table class="table">';
                modalContent += '<thead><tr><th>Team Member Name</th><th>Address</th><th>Mobile Phone</th></tr></thead>';
                modalContent += '<tbody>';

                data.data.forEach(function(member) {
                    modalContent += '<tr>';
                    modalContent += '<td>' + member.team_member_name + '</td>';
                    modalContent += '<td>' + buildAddressHTML(member) + '</td>';
                    modalContent += '<td>' + member.team_member_phone + '</td>';
                    modalContent += '</tr>';
                });

                modalContent += '</tbody></table>';

                $('#detailsModal .modal-body').html(modalContent);
            } else {
                $('#detailsModal .modal-body').html('<p>No data found.</p>'); // Show a message if no data is found
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}







$('#generatePDFButton').on('click', function() {
   
    var id = $("#hiddenIdField").val();
   
   
    $.ajax({
        url: BASE_URL + 'index.php/' + hrController + '/generate_pdf_for_teams', 
        method: 'POST',
        data: {
           id:id,
            li_token: token
        },
        xhrFields: {
            responseType: 'blob' 
        },
        success: function(response, status, xhr) {
            // Convert the blob to a downloadable file
            var blob = new Blob([response], { type: 'application/pdf' });
            var link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.download = 'generated_pdf_from_modal.pdf';
            link.click();
        },
        error: function(xhr, status, error) {
            console.error('Error generating PDF:', xhr.responseText);
        }
    });
});

$("#employee_team_master_data_table_add_new").on("click", function() {
    $("#flag_id").val("0");

    var modalId = "#employee_team_master_data_table_modal";
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

$("#employee_team_master_data_table_filter_btn").on("click", function() {

  $("#flag_id").val('0');
   $("#employee_team_master_data_table_filter_modal").modal("show");
});


$("#employee_team_master_data_table_reset_filter").on("click", function() {

  
     var table = $('#employee_team_master_data_table').DataTable();
    var modal = $('#employee_team_master_data_table_filter_modal');
    modal.find("select").val("0");
    table.columns().search('');
    table.search('').draw();
  
   
    $(this).hide();

});






</script>




