
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Request</title>
</head>

<body>
              <!-- --- discription ---- -->
                <div id="leave_register_table_top" class="reviewBlock">
                    <div class="combined_buttons">
                        <div class="add_new_btn_div">
                            <button id="leave_register_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
                        </div>
                        <div class="filter_btn_div">
                            <button id="leave_register_table_filter" class="customise_filter_button" data-value="employee_data_table"><i class="fas fa-filter"></i>Filter</button>
                        </div>
                        <div class="reset_filter_btn_div">
                            <button id="leave_register_table_reset_filter" class="cancel_filter_button"><i class="fas fa-times"></i> Cancel</button>
                        </div>
                    </div>                    
                </div>
                <!-- --- ./discription ---- -->
                <!--for loading CompanyStructure DataTable -->
                            <table id="leave_register_data_table" class="table table-striped">
                            <thead>
                                <tr>
                                <th>Employee Name</th>
                                <th>Request Date</th>
                                <th>Category</th>
                                 <th>From Date</th>
                                 <th>From time</th>
                                 <th>to Date</th>
                                 <th>to time</th>
                                 <th>Leave Reason</th>
                                 <th>Status</th>
                                 <th style="width:180px;text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                   
                                    
                                    
                                </tr>
                            </tbody>
                            </table>
                            <!-- ./ for loading CompanyStructure DataTable -->
                

    <?php include("bottom-js.php"); ?>           
    
    
 <!-- modal for loan request -->
 <div class="modal fade data-table-modal" id="new_leave_register_table_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Leave Register</h4>
             
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="leave_register_modal_form" class="modal_form">
                    <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="employee_id" class="col-form-label required">Employee Name</label>
                    </div>
                    <div class="col-8">
                     <select class="form-control select2" id="leave_register_employee_id" name="leave_register_employee_id">
                         <option value="" >Select Employee Name</option>
                            <?php
                            if(isset($leave_employee)):
                                foreach ($leave_employee as $row):
                                    $name = $row->employee_name;
                                    $employee_id = $row->employee_id;
                            ?>
                            <option value="<?php echo $employee_id; ?>" ><?php echo $name; ?>
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
                      <label for="recipient-name" class="col-form-label required">Leave rquested Date </label>
                    </div>
                    <div class="col-8">
                      <input type="date" class="form-control" id="leave_requested_date" name="leave_requested_date">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->  
                  
                     
                        <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="education_name" class="col-form-label required">Leave Category</label>
                    </div>
                    <div class="col-8">
                      <select class="form-control select2" id="leave_category_id" name="leave_category_id">
                        <option value="" >Select Leave Category</option>
                                    <?php
                                    if (isset($leave_category)):  
                                        foreach ($leave_category as $row):
                                        $category = $row->leave_category;
                                        $id = $row->id;
                                ?>
                                <option value="<?php echo $id; ?>" 
                                ><?php echo $category; ?>
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
                     
                      <label for="recipient-name" class="col-form-label required">Leave From Date </label>
                    </div>
                    <div class="col-8">
                      <input type="date" class="form-control" id="leave_from_date" name="leave_from_date">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->   

                         <?php 
                                          // Function to convert 12-hour time to 24-hour time
                                  function convertTo24HourFormat($time12Hour) {
                                    return date("H:i", strtotime($time12Hour));
                                }

                                // Generate time options with one-hour intervals in 12-hour format
                                $start_time = strtotime("00:00");
                                $end_time = strtotime("23:00");

                                $options12Hour = '';
                                $options24Hour = '';

                                while ($start_time <= $end_time) {
                                    $formatted_time_12_hour = date("h:i A", $start_time);
                                    $formatted_time_24_hour = convertTo24HourFormat($formatted_time_12_hour);

                                    $options12Hour .= '<option value="' . $formatted_time_12_hour . '">' . $formatted_time_12_hour . '</option>';
                                    $options24Hour .= '<option value="' . $formatted_time_24_hour . '">' . $formatted_time_12_hour . '</option>';

                                    $start_time += 3600; // Increment by one hour (3600 seconds)
                                }
                         
                         ?>
                        <!--one field  text field---- -->
                        <div class="form-group row">
                            <div class="col-3">
                            <label for="leave_from_time" class="col-form-label required">Leave from Time</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control select2" id="leave_from_time" name="leave_from_time">
                                 
                                </select>
                            </div>
                      </div>
                     <!-- ./ one field ---- -->   



                      <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Leave to Date </label>
                    </div>
                    <div class="col-8">
                      <input type="date" class="form-control" id="leave_to_date" name="leave_to_date">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->   


                       <!--one field  text field---- -->
                       <div class="form-group row">
                    <div class="col-3">
                      <label for="education_name" class="col-form-label required">Leave to Time</label>
                    </div>
                    <div class="col-8">
                    
                      <select class="form-control select2" id="leave_to_time" name="leave_to_time">
                      <!-- <option value="" >Select Leave to Time</option> -->
                        <!-- <-?php echo $options24Hour; ?> -->
                     </select>
                    </div>
                  </div>
                     <!-- ./ one field ---- -->        
                  <!--one field  text field---- -->
                  <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Leave Reason</label>
                      </div>
                      <div class="col-8">
                        <input type="text"  name="reason_for_leave"  id="reason_for_leave"  class="form-control">
                        </input>
                      </div>
                    </div>
                  <!-- ./ one field ---- -->    
                 

                 
               
              </form>
            
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="leave_register_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="btn_new_leave_register_save"><i class="fas fa-calendar-check"></i>Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div> 
</body>
</html>

     
     <!-- Modal for selecting job title -->
     <div class="modal filtering_modal data-table-modal" id="leave_register_data_table_filter_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Filter Categoey</h5>
              
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form action="#" id="">
           

                  <div class="form-group row">
                        <div class="col-3">
                          <label for="recipient-name" class="col-form-label">Name</label>
                        </div>
                        <div class="col-8">
                            <select class="form-control select2" id="filter_leave_register_employee_id" name="filter_leave_register_employee_id">
                                <option value="0">Not Applicable</option>
                                <?php
                                  if(isset($leave_employee)):
                                      foreach ($leave_employee as $row):
                                          $name = $row->employee_name;
                                          $employee_id = $row->employee_id;
                                  ?>
                                <option value="<?php echo $employee_id; ?>" ><?php echo $name; ?>
                                </option>
                                <?php
                                endforeach;
                                endif;
                                ?>
                              </select>
                        </div>
                  </div>

                   <!--one field  text field---- -->
                   <div class="form-group row">
                    <div class="col-3">
                      <label for="education_name" class="col-form-label">Category</label>
                    </div>
                    <div class="col-8">
                      <select class="form-control select2" id="filter_leave_category_id" name="filter_leave_category_id">
                         <option value="0">Not Applicable</option>
                                    <?php
                                    if (isset($leave_category)):  
                                        foreach ($leave_category as $row):
                                        $category = $row->leave_category;
                                        $id = $row->id;
                                ?>
                                <option value="<?php echo $id; ?>" 
                                ><?php echo $category; ?>
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
            <div class="modal-footer">
                <button id="leave_register_filter_save_btn" class="btn filter_save_btn btn">Apply Filter</button>
            </div>
        </div>
    </div>
</div>

<!-- modal end  -->


<script>
    var BASE_URL = "<?php echo base_url(); ?>";
    var hrController = "<?php echo CONTROLLER_HR; ?>";
    var token = "<?php echo $_SESSION['li_token']; ?>";

    $("#leave_from_date").on("change", function (event) {
          var selectedDate =event.target.value;
          var leaveFromDate = formatDate(selectedDate);
          alert("next"+leaveFromDate);
        // Now you can use the formatted date in your AJAX request
        $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/forget_leave_from_time_option",
            type: "POST",
            data: { leave_from_date: leaveFromDate, li_token: token },
            dataType: "json",
            success: function (response) {
       
        var startTime = response.data[0].start_time;
        var endTime = response.data[0].end_time;
        var selectId = 'leave_from_time';
        populateTimeOptions(startTime, endTime, selectId);
    },
            error: function (xhr, status, error) {
                showToast('error', 'Error getting leave from time options');
            }
        });
    });

    $("#leave_to_date").on("change", function () {
       var selectedDate =$(this).val();
       if($("#leave_from_date").val() =="" && $("#leave_from_time").find('option').length == 0){
        // alert("please select from date and from time");
        showToast('error',"please select from date and from time");
        $("#leave_to_date").val("");
       }
       else if($("#leave_from_date").val() !="" && $("#leave_from_time").find('option').length == 0 || $("#leave_from_time").val() == "" ){
        // alert("please select from time");
        showToast('error',"please select from time");
           $("#leave_to_date").val("");
       }
       else if($("#leave_from_date").val() > $("#leave_to_date").val()  ){
        // alert("Please select a valid date range. 'From' date should be earlier than 'To' date.");
        showToast('error',"Please select a valid date range. 'From' date should be earlier than 'To' date.");
        $("#leave_to_date").val("");
       }
      else{
        alert("prev"+selectedDate);
          // Format the date as "yyyy-mm-dd"
          var leaveToDate = formatDate(selectedDate);
        $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/forget_leave_to_time_option",
            type: "POST",
            data: { leave_to_date: leaveToDate, li_token: token },
            dataType: "json",
            success: function (response) {
            var startTime = response.data[0].start_time;
            var endTime = response.data[0].end_time;
            var selectId = 'leave_to_time';
            populateTimeOptions(startTime, endTime, selectId);
    },
            error: function (xhr, status, error) {
                showToast('error', 'Error getting leave from time options');
            }
        });
      }
     });
    $("#leave_to_time").on("change", function(){
      if($("#leave_to_time").val()==""){
        showToast('error',"please select a option");
      }
      else if($("#leave_to_time").find('option').length == 0){
      }
  else if($("#leave_to_date").val() === $("#leave_from_date").val() && $("#leave_to_time").find('option').length != 0 && $("#leave_from_time").find('option').length != 0){
    if ($("#leave_to_time").val() <= $("#leave_from_time").val()) {
    showToast('error',"The to time must be greater than the from time for the same date. Please select a valid time");
    $("#leave_to_time").val('');
  }
  }
      
    });

    // Function to format date as "yyyy-mm-dd"

    $("#leave_register_table_add_new").on("click",()=>{
        $("#flag_id").val("0");
        $("#new_leave_register_table_modal").modal("show");
        $("#leave_from_time").empty();
        $("#leave_to_time").empty();
        // alert($("#leave_from_time").val());

        $('#new_leave_register_table_modal input[type="text"]').val('');
        $('#new_leave_register_table_modal select').each(function() {
        if ($(this).hasClass('select2')) {
            $(this).val('').trigger('change');
        }
        });
    });


    $("#btn_new_leave_register_save").click (function(){
         if ($('#leave_register_modal_form').valid()) {
          var formData  = new FormData();
                      alert($("#leave_from_time").val());
                      formData.append('leave_register_employee_id', $("#leave_register_employee_id").val());
                      formData.append('leave_requested_date', $("#leave_requested_date").val());  
                      formData.append('leave_category_id', $("#leave_category_id").val());
                      formData.append('leave_from_date', $("#leave_from_date").val());
                      formData.append('leave_from_time', $("#leave_from_time").val());
                      formData.append('leave_to_date', $("#leave_to_date").val());
                      formData.append('leave_to_time', $("#leave_to_time").val());
                      formData.append('reason_for_leave', $("#reason_for_leave").val());
                      formData.append('flag_id', $("#flag_id").val()); 
                      formData.append('row_id', $("#row_id").val()); 
                      formData.append('li_token', token);
                $.ajax({
                    url: BASE_URL + "index.php/" + hrController + "/save_emp_new_leave_register_details",
                    type: 'POST',
                    data:  formData,
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    success: function(response) {
                      console.log("response",response);
                      showToast('success',response.message);
                      $('#new_leave_register_table_modal').modal('hide');
                       $('#leave_register_data_table').DataTable().ajax.reload();
                      
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                        console.log(status);
                        console.log(error);
                    }
                });
           }  
        }); 
//load table 
$(document).ready(function() {
    //  function loadDataTableForLeaveRegister(){
    $('#leave_register_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" +  hrController + "/get_leave_register_details",
            "dataSrc": "data"
        },
            "columns": [
            { data: "employee_name" },
            { data: "requested_date" },
            { data: "leave_category" },
            { data: "leave_from_date" },
            { data: "leave_from_time" },
            { data: "leave_to_date" },
            { data: "leave_to_time" },
            { data: "reason_for_leave" },
            { data: "leave_request_status" },
            {
                data: "id",
                render: function (data, type, full, row) {
                    var id = full.id;
                    return `
                        <div class="operations">
                            <a href="#" class="edit" onclick="employeeLeaveRegisterEditRow(${id});"><i class="fas fa-edit"></i>Edit</a>
                            <a href="#" class="view" onclick="employeeLeaveRegisterViewRow(${id});"><i class="fas fa-eye"></i>View</a>
                            <a href="#" class="delete" onclick="employeeLeaveRegisterDeleteRow(${id});"><i class="fas fa-trash"></i>Delete</a>
                        </div>`;
                }
            }
        ],


        "initComplete": function(settings, json) {
            customizeDataTable('leave_register_data_table');
            $("#travel_approved_data_table_add_new").hide();
        }
    });
   
// }
});
// ./ load table



//edit
function employeeLeaveRegisterEditRow(row_id) {
    $("#row_id").val(row_id);
     flag_id=$("#flag_id").val("1");
  

   $.ajax({
       url: BASE_URL + "index.php/" + hrController + "/get_employee_leave_register_by_id",
       type: "POST",
       data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val()},
       dataType: "json",
       success: function (response) {
            
           if (response.success) {
            var leavefromtime = moment(response.data.leave_from_time, 'HH:mm:ss').format('HH:mm');
            var leavetotime = moment(response.data.leave_to_time, 'HH:mm:ss').format('HH:mm');
            $("#leave_register_employee_id").val(response.data.employee_id).trigger('change');
            $("#leave_requested_date").val(response.data.requested_date);
            $("#leave_category_id").val(response.data.leave_category_id).trigger('change');
            $("#leave_from_date").val(response.data.leave_from_date);
            $("#leave_from_time").val(leavefromtime).trigger('change'); // Use leave_from_time directly
            $("#leave_to_date").val(response.data.leave_to_date);
            $("#leave_to_time").val(leavetotime).trigger('change');
            $("#reason_for_leave").val(response.data.reason_for_leave);
            $("#new_leave_register_table_modal").modal("show");

            
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
function employeeLeaveRegisterViewRow(row_id) {
    alert("edited id"+row_id);
    $.ajax({
       url: BASE_URL + "index.php/" + hrController + "/get_employee_leave_register_by_id",
       type: "POST",
       data: { row_id: row_id, li_token: token},
       dataType: "json",
       success: function (response) {
           console.log("response is" ,response);
           if (response.success) {
            var leavefromtime = moment(response.data.leave_from_time, 'HH:mm:ss').format('HH:mm');
            var leavetotime = moment(response.data.leave_to_time, 'HH:mm:ss').format('HH:mm');
                $("#leave_register_employee_id").val(response.data.employee_id).trigger('change');
                $("#leave_requested_date").val(response.data.requested_date);
                $("#leave_category_id").val(response.data.leave_category_id).trigger('change');
                $("#leave_from_date").val(response.data.leave_from_date);
                $("#leave_from_time").val(leavefromtime).trigger('change'); // Use leave_from_time directly
                $("#leave_to_date").val(response.data.leave_to_date);
                $("#leave_to_time").val(leavetotime).trigger('change');
                $("#reason_for_leave").val(response.data.reason_for_leave);
                $("#new_leave_register_table_modal").modal("show");

               var disable_leave_register = $("#leave_register_employee_id, #leave_requested_date, #leave_category_id,#leave_from_date,#leave_from_time,#leave_to_date,#leave_to_time,#reason_for_leave");
               disable_leave_register.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
               $(".modal-footer .savebtn").hide();
                // Show the .modal-footer when the modal is hidden
                $("#new_leave_register_table_modal").on("hidden.bs.modal", function () 
                {
                    $(".modal-footer .savebtn").show();
                    disable_leave_register.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
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


//  delete 
function employeeLeaveRegisterDeleteRow(row_id) {
    alert('Delete clicked with id: ' + row_id);
    if (confirm("Are you sure you want to delete this item?")) {
        $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/delete_employee_leave_register_by_id",
            type: "POST",
            data: { row_id: row_id, li_token: token },
            dataType: "json",
            success: function (response) {
                $('#new_leave_register_table_modal').modal('hide');
                 $('#leave_register_data_table').DataTable().ajax.reload();
                  showToast('success', response.message); 
            },
            error: function (xhr, status, error) {
                
                showToast('error', 'Error delete item'); 
            }
        });
    }
  
}
// delete  
// if table filter button click show the currespomding modal
$("#leave_register_table_filter").on("click",()=>{
  alert("hai");
  $("#flag_id").val('0');
  $("#leave_register_data_table_filter_modal").modal("show");
});
// ./

//filtering 

$("#leave_register_filter_save_btn").on("click", function () {
    var leave_register_employee_name_filter_val = $("#filter_leave_register_employee_id").val();
    var leave_register_category_filter_val = $("#filter_leave_category_id").val();
    var leave_register_employee_name_filter_text = $("#filter_leave_register_employee_id option:selected").text();
    var leave_register_category_filter_text = $("#filter_leave_category_id option:selected").text();

    var table_leave_register = $('#leave_register_data_table').DataTable();

    // Clear all filters
    table_leave_register.columns().search('');

    if (leave_register_employee_name_filter_val != "0") {
      
      table_leave_register.column(0).search(leave_register_employee_name_filter_text);
    }
     if (leave_register_category_filter_val != "0") {
      
      table_leave_register.column(2).search(leave_register_category_filter_text);
    }

    table_leave_register.draw();



    var filterLeaveRegisterText = ''; // Default text
    if (leave_register_employee_name_filter_val != "0" && leave_register_category_filter_val != "0") {
      filterLeaveRegisterText = 'Employee Name: ' + leave_register_employee_name_filter_text + ' & ' + 'Category: '+leave_register_category_filter_text;
    }
     else if (leave_register_employee_name_filter_val != "0") {
      filterLeaveRegisterText = 'Employee Name: ' + leave_register_employee_name_filter_text;
    } 
    else if (leave_register_category_filter_val != "0") {
      filterLeaveRegisterText = 'Means of transportation: ' + leave_register_category_filter_text;
    }
    var resetFilterLeaveRegister = filterLeaveRegisterText+'<span class="icon"><i class="fa fa-times"></i></span>';
    $('#leave_register_table_reset_filter').html(resetFilterLeaveRegister);
    
    // Use a single conditional statement to show or hide the button
    if (leave_register_employee_name_filter_val == "0" && leave_register_category_filter_val == "0") {
    
        $("#leave_register_table_reset_filter").hide();
    } else {
        $("#leave_register_table_reset_filter").show();
    }

    $("#leave_register_data_table_filter_modal").modal("hide");
});

//./

// remove filtering when press filter cancel button

 $("#leave_register_table_reset_filter").on("click", function () {
    var table_leave_register = $('#leave_register_data_table').DataTable();
    table_leave_register.columns().search('');
    table_leave_register.draw();

    // Hide the reset filter button
    $("#leave_register_table_reset_filter").hide();
});






$('#leave_register_modal_form').validate({
        rules: {
          leave_register_employee_id: {
                required: true,
            },
            leave_requested_date: {
                required: true,
            },
            leave_category_id: {
                required: true,
            },
            leave_from_date: {
                required: true,
            },
            leave_from_time: {
                required: true,
            },
            leave_to_date: {
                required: true,
            },
            leave_to_time: {
                required: true,
            },
            reason_for_leave: {
                required: true,
            },
           
            
        },
        messages: {
          leave_register_employee_id: "Please select an employee.",
          leave_requested_date: "Please select the request date.",
          leave_category_id: "Please select leave Category.",
           
          leave_from_date: "Please select leave from date .",
          leave_from_time: "Please select leave from time.",
          leave_to_date: "Please select leave to date .",
          leave_to_time: "Please select leave to time.",
          reason_for_leave: "Please Enter Leave Reason.",
            
            
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            if (element.is("textarea")) {
                error.addClass('invalid-feedback d-block');
                element.closest('.form-group').append(error);
            } else {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });


    function convertTo24HourFormat(time12Hour) {
            var time = new Date("1970-01-01 " + time12Hour);
            var hours = time.getHours();
            var minutes = time.getMinutes();

            // Ensure leading zero for minutes
            minutes = minutes < 10 ? '0' + minutes : minutes;

            return hours + ':' + minutes;
        }
</script>

