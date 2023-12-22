<div id="events_tab" class="reviewBlock">
                                      <div class="combined_buttons">
                                                <div class="add_new_btn_div">
                                                    <button id="calendar_events_data_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
                                                 </div>
                                               
                                               
                                            </div>
               </div>
             
                        <!-- table  -->
                        <table id="calendar_events_data_table" class="table table-striped">
                            <thead>
                                <tr>     
                                    <th> Event Name</th>
                                    <th> Date</th>
                                    <th> Start Time</th>
                                    <th> End Time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>

                            </tr>
                            </tbody>
                         </table>
                            <!-- ./ table start -->
                

          
    
    
    
   <!-- modal  -->
   <div class="modal fade data-table-modal" id="calendar_events_data_table_modal" data-bs-backdrop="static">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Events</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form method="POST" class="modal_form" name="calender_events_modal_form" action="#" id="calender_events_modal_form" onsubmit="return false;">
                
                      <!--one field  text field---- -->
                    <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Calender Master Id </label>
                      </div>
                      <div class="col-8">

                        <select name="events_calendar_master_id"  id="events_calendar_master_id" class="form-control">
                                  

                         </select>

                      </div>
                    </div>
                  <!-- ./ one field ---- -->  
                
    
                   
                  
                     <!-- one field text field -->
                    <div class="form-group row">
                        <div class="col-3">
                            <label for="recipient-name" class="col-form-label required">Start Date</label>
                        </div>
                        <div class="col-8">
                            <input class="form-control" type="date" id="event_start_date" name="event_start_date">
                        </div>
                    </div>
                    <!-- ./ one field -->

                     <!-- one field text field -->
                     <div class="form-group row">
                        <div class="col-3">
                            <label for="recipient-name" class="col-form-label required">End Date</label>
                        </div>
                        <div class="col-8">
                            <input class="form-control" type="date" id="event_end_date" name="event_end_date">
                        </div>
                    </div>
                    <!-- ./ one field -->
                  <?php

                // Function to convert 12-hour time to 24-hour time
                function convertTo24HourFormat($time12Hour) {
                    return date("H:i", strtotime($time12Hour));
                }

                // Generate time options with 15-minute intervals in 12-hour format
                $start_time = strtotime("00:00");
                $end_time = strtotime("23:45"); // Adjust the end time if needed

                $options12Hour = '';
                $options24Hour = '';

                while ($start_time <= $end_time) {
                    $formatted_time_12_hour = date("h:i A", $start_time);
                    $formatted_time_24_hour = convertTo24HourFormat($formatted_time_12_hour);

                    $options12Hour .= '<option value="' . $formatted_time_12_hour . '">' . $formatted_time_12_hour . '</option>';
                    $options24Hour .= '<option value="' . $formatted_time_24_hour . '">' . $formatted_time_12_hour . '</option>';

                    $start_time += 900; // Increment by 15 minutes (900 seconds)
                }
                ?>

                <!-- one field for Start Time -->
                <div class="form-group row">
                    <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Start Time</label>
                    </div>
                    <div class="col-8">
                        <select class="form-control mb-1 start-time" style="height: 35px" id="event_start_time" name="event_start_time">
                            <option value="">Select Event Start Time</option>
                            <?php echo $options24Hour; ?>
                        </select>
                    </div>
                </div>
                <!-- ./ one field -->

                <!-- one field for End Time -->
                <div class="form-group row">
                    <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">End Time</label>
                    </div>
                    <div class="col-8">
                        <select class="form-control mb-1 end-time" style="height: 35px" id="event_end_time" name="event_end_time">
                            <option value="">Select Event End Time</option>
                            <?php echo $options24Hour; ?>
                        </select>
                    </div>
                </div>
                <!-- ./ one field -->


           
                                                
                      <!--one field  text field---- -->
                    <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Event Name</label>
                      </div>
                      <div class="col-8">
                      <input class="form-control" type="text" id="event_name" name="event_name">
                      </textarea>
                      </div>
                    </div>
                  <!-- ./ one field ---- -->     
                       <!--one field  text field---- -->
                       <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Event Description</label>
                      </div>
                      <div class="col-8">
                      <textarea class="form-control" type="text" id="event_description" name="event_description">
                      </textarea>
                      </div>
                    </div>
                  <!-- ./ one field ---- -->                          
                

               
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default cancelbtn" id="btn_employment_status_cancel" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn savebtn" onclick="saveCalanderEvents()" id="btn_calendar_event_save"><i class="fas fa-calendar-check"></i>Save</button>
              </div>
            </div>
            </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
     <!-- /.modal -->





   


<script>
     var BASE_URL = "<?php echo base_url(); ?>";
    
    
 var hrController = "<?php echo CONTROLLER_HR; ?>";
 var token = "<?php echo $_SESSION['li_token']; ?>";

// load job item data table

$(document).ready( function () {

     populateCalendarMasterDropdown(); // this function is defined in calendar_hplidays page
     var table = $('#calendar_events_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" +  hrController + "/get_calendar_event_details",
            "dataSrc": "data"
        },
            "columns": [

            { data: "event_name"},
            { data: "event_start_date"},    
            { data: "event_start_time"},
            { data: "event_end_time"},
           
            {
                data: "id",
                render: function (data, type, full, row) {
                    var id = full.id;
                    return `
                        <div class="operations">
                            <a href="#" class="edit" onclick="editCalendarEvents(${id});"><i class="fas fa-edit"></i>Edit</a>
                            <a href="#" class="view" onclick="viewCalendarEvents(${id});"><i class="fas fa-eye"></i>View</a>
                            <a href="#" class="delete" onclick="deleteCalendarEvents(${id});"><i class="fas fa-trash"></i>Delete</a>
                        </div>`;
                }
            }
        ],
       

        "initComplete": function(settings, json) {
         
            customizeDataTable('calendar_events_data_table');
          
        }
    });
    
    
   
});


function saveCalanderEvents() {
    var token = $("#csrf-token").attr('content');
    var BASE_URL = "<?php echo base_url(); ?>";
    
    // Get the values of row_id and flag_id
    var row_id = $('#row_id').val();
    var flag_id = $('#flag_id').val();
    
    // Serialize the form data
    var formData = $('#calender_events_modal_form').serialize()+
        '&li_token=' + token +
        '&row_id=' + row_id +   
        '&flag_id=' + flag_id; 
    
    console.log(formData);

    $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/save_calendar_events_details/",
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function (response) {
            if (response && response.success) {
                showToast('success', response.message);
                $('#calendar_events_data_table_modal').modal('hide');
                $('#calendar_events_data_table').DataTable().ajax.reload();
            } 
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#divError").html("Oops! Ajax error! unable to connect to the server:" + jqXHR.responseText);
            // alert(jqXHR.responseText);
        }
    });
}





// editCalendarHolidays
function editCalendarEvents(row_id) {
    alert(row_id); 

    $("#calendar_events_data_table_modal").modal("show");
    $("#row_id").val(row_id);
    flag_id=$("#flag_id").val("1");
 
   $.ajax({
       url: BASE_URL + "index.php/" + hrController + "/get_calendar_events_details_by_id",
       type: "GET",
       data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val()},
       dataType: "json",
       success: function (response) {
           console.log("response edit is" ,response);
           console.log(response.data.event_name);
           console.log(response.data.event_description);

      
           if (response.success) 
           {
            var eventstarttime = moment(response.data.event_start_time, 'HH:mm:ss').format('HH:mm');
            var eventendtime = moment(response.data.event_end_time, 'HH:mm:ss').format('HH:mm');

                $("#events_calendar_master_id").val(response.data.calendar_master_id);
                $("#event_start_date").val(response.data.event_start_date);
                $("#event_end_date").val(response.data.event_end_date);
                $('#event_start_time').val(eventstarttime);
                $('#event_end_time').val(eventendtime);
                $("#event_name").val(response.data.event_name);
                $("#event_description").val(response.data.event_description);
                $("#calendar_events_data_table_modal").modal("show");
           } else {
               alert("Failed.");
           }
       },
       error: function (xhr, status, error) {
           alert("Error in fetching.");
       }
   });
}


function viewCalendarEvents(row_id) {
    alert(row_id); 

    $("#calendar_events_data_table_modal").modal("show");
    $("#row_id").val(row_id);
    flag_id=$("#flag_id").val("1");
 
   $.ajax({
       url: BASE_URL + "index.php/" + hrController + "/get_calendar_events_details_by_id",
       type: "GET",
       data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val()},
       dataType: "json",
       success: function (response) {
           console.log("response edit is" ,response);
           console.log(response.data.event_name);
           console.log(response.data.event_description);

      
           if (response.success) 
           {
            var eventstarttime = moment(response.data.event_start_time, 'HH:mm:ss').format('HH:mm');
            var eventendtime = moment(response.data.event_end_time, 'HH:mm:ss').format('HH:mm');

                $("#events_calendar_master_id").val(response.data.calendar_master_id);
                $("#event_start_date").val(response.data.event_start_date);
                $("#event_end_date").val(response.data.event_end_date);
                $('#event_start_time').val(eventstarttime);
                $('#event_end_time').val(eventendtime);
                $("#event_name").val(response.data.event_name);
                $("#event_description").val(response.data.event_description);
                $("#calendar_events_data_table_modal").modal("show");

                var disableElements = $("input, select ,textarea").prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                disableElements.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                
                $(".modal-footer .savebtn").hide();
                
                $("#calendar_events_data_table_modal").on("hidden.bs.modal", function () 
                {
                    $(".modal-footer .savebtn").show();
                    disableElements.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
                });
                
           } else {
               alert("Failed.");
           }
       },
       error: function (xhr, status, error) {
           alert("Error in fetching.");
       }
   });
}



function deleteCalendarEvents(row_id){
    alert(row_id);
   
    if (confirm("Are you sure you want to delete this item?")) {
        $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/delete_calendar_events_by_id",
            type: "POST",
            data: { row_id: row_id,li_token: token },
            dataType: "json",
            success: function (response) {
                $('#calendar_events_data_table_modal').modal('hide');
                showToast('success', response.message); 
                $('#calendar_events_data_table').DataTable().ajax.reload();
                fetchEmployeeNames(); 
            },
            error: function (xhr, status, error) {
                // Handle error
            }
        });
    }
}






$("#calendar_events_data_table_add_new").on("click", function() {


var modalId = "#calendar_events_data_table_modal";
$(modalId).modal("show");

$(modalId + ' input[type="text"]').val('');

});
</script>















