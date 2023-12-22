<div id="holidays_tab" class="reviewBlock">
                                      <div class="combined_buttons">
                                                <div class="add_new_btn_div">
                                                    <button id="calendar_holidays_data_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
                                                 </div>
                                               
                                               
                                            </div>
               </div>
             
                        <!-- table  -->
                        <table id="calendar_holidays_data_table" class="table table-striped">
                            <thead>
                                <tr>     
                                    <th> Holiday Date</th>
                                    <th> Description</th>
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
   <div class="modal fade data-table-modal" id="calendar_holidays_data_table_modal" data-bs-backdrop="static">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Holidays</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form method="POST" class="modal_form" name="calender_holidays_modal_form" action="#" id="calender_holidays_modal_form" onsubmit="return false;">
                
                      <!--one field  text field---- -->
                    <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Calender Master Id </label>
                      </div>
                      <div class="col-8">

                        <select name="holidays_calendar_master_id"  id="holidays_calendar_master_id" class="form-control">
                                  

                         </select>

                      </div>
                    </div>
                  <!-- ./ one field ---- -->  
                
    
                   
                  
                     <!-- one field text field -->
                    <div class="form-group row">
                        <div class="col-3">
                            <label for="recipient-name" class="col-form-label required">Holiday Date</label>
                        </div>
                        <div class="col-8">
                            <input class="form-control" type="date" id="holiday_date" name="holiday_date">
                        </div>
                    </div>
                    <!-- ./ one field -->

           
                                                
                      <!--one field  text field---- -->
                    <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Details</label>
                      </div>
                      <div class="col-8">
                      <textarea class="form-control" id="holiday_description" name="holiday_description">
                      </textarea>
                      </div>
                    </div>
                  <!-- ./ one field ---- -->                              
                

               
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default cancelbtn" id="btn_employment_status_cancel" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn savebtn" onclick="saveCalanderHolidays()" id="btn_calendar_holiday_save"><i class="fas fa-calendar-check"></i>Save</button>
              </div>
            </div>
            </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
     <!-- /.modal -->





   

<?php include("bottom-js.php"); ?>   

<script>
     var BASE_URL = "<?php echo base_url(); ?>";
    
    
 var hrController = "<?php echo CONTROLLER_HR; ?>";
 var token = "<?php echo $_SESSION['li_token']; ?>";

// load job item data table

$(document).ready( function () {

    populateCalendarMasterDropdown();

  var table = $('#calendar_holidays_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" +  hrController + "/get_calendar_holidays_details",
            "dataSrc": "data"
        },
            "columns": [
        
            { data: "holiday_date"},
            { data: "holiday_description"},
           
            {
                data: "id",
                render: function (data, type, full, row) {
                    var id = full.id;
                    return `
                        <div class="operations">
                            <a href="#" class="edit" onclick="editCalendarHolidays(${id});"><i class="fas fa-edit"></i>Edit</a>
                            <a href="#" class="view" onclick="viewCalendarHolidays(${id});"><i class="fas fa-eye"></i>View</a>
                            <a href="#" class="delete" onclick="deleteCalendarHolidays(${id});"><i class="fas fa-trash"></i>Delete</a>
                        </div>`;
                }
            }
        ],
       

        "initComplete": function(settings, json) {
         
            customizeDataTable('calendar_holidays_data_table');
          
        }
    });
    
   
});




function populateCalendarMasterDropdown() {
    $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/get_calender_master_details",
        method: 'GET',
        success: function(response) {
            $('#holidays_calendar_master_id').empty();
            $('#events_calendar_master_id').empty();

            $('#holidays_calendar_master_id').append($('<option></option>').attr('value', '0').text('Select any year'));
            $('#events_calendar_master_id').append($('<option></option>').attr('value', '0').text('Select any year'));

            $.each(response, function(index, item) {
                $('#holidays_calendar_master_id').append($('<option>', {
                    value: item.id, 
                    text: item.year_name 
                }));
                $('#events_calendar_master_id').append($('<option>', {
                    value: item.id, 
                    text: item.year_name 
                }));
            });
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}


$('#holidays_calendar_master_id').on('change', function() {
    var selectedId = $(this).val(); 
    alert(selectedId);
    fetchCalendarDates(selectedId);
});





// function fetchCalendarDates(selectedCalendarMasterId) {
//     $.ajax({
//         url: BASE_URL + "index.php/" + hrController + "/get_calender_master_dates",
//         method: 'POST', 
//         data: { calendar_master_id: selectedCalendarMasterId, li_token: token },
//         success: function(response) {
//             console.log(response);

//             var calendarStartDate = new Date(response.effective_from);
//             var calendarEndDate = new Date(response.effective_to);

//             $('#holiday_date').on('input', function() {
//                 var selectedDate = new Date($(this).val());

//                 if (selectedDate < calendarStartDate || selectedDate > calendarEndDate) {
//                     alert('Please select a date within the specified range.');
//                     $(this).val(''); 
//                 }
//             });
//         },
//         error: function(xhr, status, error) {
//             console.error(error);
//         }
//     });
// }

function fetchCalendarDates(selectedCalendarMasterId) {
    $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/get_calender_master_dates",
        method: 'POST', 
        data: { calendar_master_id: selectedCalendarMasterId, li_token: token },
        success: function(response) {
            console.log(response);

            var calendarStartDate = response.effective_from;
            var calendarEndDate = response.effective_to;

            $('#holiday_date').attr('min', calendarStartDate);
            $('#holiday_date').attr('max', calendarEndDate);

            $('#holiday_date').on('input', function() {
                var selectedDate = new Date($(this).val());

                if (selectedDate < new Date(calendarStartDate) || selectedDate > new Date(calendarEndDate)) {
                    alert('Please select a date within the specified range.');
                    $(this).val(''); 
                }
            });
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

function saveCalanderHolidays() {
    var token = $("#csrf-token").attr('content');
    var BASE_URL = "<?php echo base_url(); ?>";
    
    // Get the values of row_id and flag_id
    var row_id = $('#row_id').val();
    var flag_id = $('#flag_id').val();
    
    // Serialize the form data
    var formData = $('#calender_holidays_modal_form').serialize()+
        '&li_token=' + token +
        '&row_id=' + row_id +   
        '&flag_id=' + flag_id; 
    
    console.log(formData);

    $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/save_calendar_holidays_details/",
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function (response) {
            if (response && response.success) {
                showToast('success', response.message);
                $('#calendar_holidays_data_table_modal').modal('hide');
                $('#calendar_holidays_data_table').DataTable().ajax.reload();
            } 
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#divError").html("Oops! Ajax error! unable to connect to the server:" + jqXHR.responseText);
            // alert(jqXHR.responseText);
        }
    });
}





// editCalendarHolidays
function editCalendarHolidays(row_id) {
    alert(row_id); 

    $("#calendar_holidays_data_table_modal").modal("show");
    $("#row_id").val(row_id);
    flag_id=$("#flag_id").val("1");
 
   $.ajax({
       url: BASE_URL + "index.php/" + hrController + "/get_calendar_holidays_details_by_id",
       type: "GET",
       data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val()},
       dataType: "json",
       success: function (response) {
           console.log("response edit is" ,response);
         
      
           if (response.success) 
           {

                $("#holidays_calendar_master_id").val(response.data.calendar_master_id);
                $("#holiday_date").val(response.data.holiday_date);
                $("#holiday_description").val(response.data.holiday_description);
                $("#last_name").val(response.data.last_name);
              
  
                $("#calendar_holidays_data_table_modal").modal("show");
           } else {
               alert("Failed.");
           }
       },
       error: function (xhr, status, error) {
           alert("Error in fetching.");
       }
   });
}


function viewCalendarHolidays(row_id) {
    alert(row_id); 
    $("#calendar_holidays_data_table_modal").modal("show");
    $("#row_id").val(row_id);
    flag_id=$("#flag_id").val("1");
 
   $.ajax({
       url: BASE_URL + "index.php/" + hrController + "/get_calendar_holidays_details_by_id",
       type: "GET",
       data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val()},
       dataType: "json",
       success: function (response) {
           console.log("response edit is" ,response);
         
      
           if (response.success) 
           {

                $("#holidays_calendar_master_id").val(response.data.calendar_master_id);
                $("#holiday_date").val(response.data.holiday_date);
                $("#holiday_description").val(response.data.holiday_description);
                $("#last_name").val(response.data.last_name);
                // $("#gender_id").val(response.data.gender_id);
                $("#gender_id").val(response.data.gender_id).trigger('change');
                $("#date_of_birth").val(response.data.date_of_birth);
  
                $("#calendar_holidays_data_table_modal").modal("show");

                var disableElements = $("input, select ,textarea").prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                disableElements.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                
                $(".modal-footer .savebtn").hide();
                
                $("#calendar_holidays_data_table_modal").on("hidden.bs.modal", function () 
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

function deleteCalendarHolidays(row_id){
    alert(row_id);
   
    if (confirm("Are you sure you want to delete this item?")) {
        $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/delete_calendar_holidays_by_id",
            type: "POST",
            data: { row_id: row_id,li_token: token },
            dataType: "json",
            success: function (response) {
                $('#calendar_holidays_data_table_modal').modal('hide');
                showToast('success', response.message); 
                $('#calendar_holidays_data_table').DataTable().ajax.reload();
                fetchEmployeeNames(); 
            },
            error: function (xhr, status, error) {
                // Handle error
            }
        });
    }
}






$("#calendar_holidays_data_table_add_new").on("click", function() {


var modalId = "#calendar_holidays_data_table_modal";
$(modalId).modal("show");

$(modalId + ' input[type="text"]').val('');

});
</script>















