<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HR & Payroll</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <?php include("top-css.php"); ?> 

    <style>
        /* ul{
            display:flex;
            list-style:none;
        } */
        /* .week_days{
            display:flex;
            list-style:none;
        } */

.custom-list {
    list-style: none;
   
   
}
/* .custom-list input[type="checkbox"] {
    
    margin-bottom: 5px; 
    background-color:pink;
} */



        
    </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed brq-payroll company-structure">
   <div class="wrapper">
      <!-- Navbar -->
      <?php include("top-nav.php"); ?> 
      <!-- /.navbar -->
      
      <?php include("left-sidebar.php"); ?> 
      <!-- Content Wrapper. Contains page content -->

     <!-- MAIN  CODE  -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <div class="content-header py-2 px-4">
        
            <!-- content write here  -->

                <div class="combination_datatable" id="company_strucure">
                      <!-- tab ul -->
                      <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" id="li_calender_master_tab" data-toggle="tab" href="#calender_master_tab" role="tab" aria-selected="false">Master</a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link" id="li_calender_holidays_tab" data-toggle="tab" href="#calender_holidays_tab" role="tab"  aria-selected="false">Holidays</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="li_calender_events_tab" data-toggle="tab" href="#calender_events_tab" role="tab"  aria-selected="false">Events</a>
                </li>
                
               
              </ul>
                     <!-- ./ tab ul -->


                    <!-- tab end  here -->
                        <div class="tab-content">
                        <div id="" class="reviewBlock">
                        <div class="combined_buttons">
                                                <div class="add_new_btn_div">
                                                    <button id="calendar_master_data_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
                                                 </div>
                          </div>
                          </div>
                            <!--tab 1  ------ -->
                        <div class="tab-pane fade show active" id="calender_master_tab" role="tabpanel" aria-labelledby="calender_master_tab">
                            <table id="calendar_master_data_table" class="table table-striped">
                            <thead>
                                <tr>
                              
                                <th>Year Start Date</th>
                                <th>Year End Date</th>
                                <th>Active</th>
                                

                                <th style="width:200px;text-align: center;">Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                <tr>
                                </tr>
                            </tbody>
                            </table>
                                    
                        </div>
                        <div class="tab-pane fade" id="calender_holidays_tab" role="tabpanel" aria-labelledby="calender_holidays_tab">
                      
                        <?php include("new_request.php");?>
                   </div>
                  
                   <div class="tab-pane fade" id="calender_events_tab" role="tabpanel" aria-labelledby="calender_events_tab">
                      
                        <?php include("approved.php");?>
                   </div>

                           

                </div>
                    <!-- main tab end  -->

                
                </div><!-- end combination data table section -->

            <!-- ./content write here  -->


            <!-- end combination data table section -->
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark"></h1>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
        <!-- /.content-header -->
      </div>
     <!-- /. MAIN CODE content-wrapper -->

   
    
     <?php include("right-sidebar.php"); ?> 
     <div class="common_hidden_fields" style="text-align: end;">
        <input type="hidden" id="flag_id" value="0" >
        <input type="hidden" id="row_id" value="0" >
    </div>


     <?php include("footer.php"); ?> 
     <!-- ./ footer -->
</div>
<!-- ./wrapper -->


            <!-- modal for calender -->
 <div class="modal fade data-table-modal" id="calendar_master_data_table_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Setup Calendar</h4>
             
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- <form id="calender_master_modal_form" class="modal_form"> -->
              <form method="POST" class="modal_form" name="calender_master_modal_form" action="#" id="calender_master_modal_form" onsubmit="return false;">
                    <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="calendar_start_date" class="col-form-label required">Year Start Date</label>
                    </div>
                    <div class="col-8">
                   
                     <input type="date" class="form-control" id="calendar_start_date" name="calendar_start_date">
                       
                      

                    </div>
                  </div>
                     <!-- ./ one field ---- --> 
                       
                  <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="calendar_end_date" class="col-form-label required">Year End Date</label>
                    </div>
                    <div class="col-8">
                      <input type="date" class="form-control" id="calendar_end_date" name="calendar_end_date">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->  
                     
                        <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="year_name" class="col-form-label required">Year Name</label>
                    </div>
                    <div class="col-8">
                    <input type="text" class="form-control" id="year_name" name="year_name">
                      
                    </div>
                  </div>
                     <!-- ./ one field ---- -->         
                    <!--one field  text field---- -->
                  <div class="form-group row ">
                    <div class="col-3">
                      <label for="effective_from" class="col-form-label required">Effective From</label>
                    </div>
                    <div class="col-8">
                      <input type="date" class="form-control" id="effective_from" name="effective_from">
                    </div>
                  </div>
                  <!-- ./ one field ---- -->   
                    <!--one field  text field---- -->
                    <div class="form-group row">
                    <div class="col-3">
                      <label for="effective_to" class="col-form-label required">Effective To</label>
                    </div>
                    <div class="col-8">
                      <input type="date" class="form-control" id="effective_to" name="effective_to">
                    </div>
                  </div>
                  <!-- ./ one field ---- -->   
                  <div class="row ml-5">
                <div class="col-md-4  text-center">
                    <strong class="mb-2" style="display: block;"><b>Choose Working Days</b></strong>
                    <ul class="custom-list">
                        <?php foreach ($week_days as $day) { ?>
                            <li>
                                <label style="color:black;align-items:center;display:flex;">
               
                                <input type="checkbox" class="mr-3" name="working_day_id[]" id="working_day_id[]" value="<?php echo $day->id; ?>"> <?php echo $day->day_long_name; ?>
                                  <input type="hidden" value="0" id="dynamic_row_id[]"> 
                                </label>
                            </li>
                        <?php } ?>
                    </ul>
                </div>

    <!-- Open Time Column -->
            <div class="col-md-4 text-center">
                <strong class="mb-2" style="display: block;">Open Time</strong>
                <?php foreach ($week_days as $day) { ?>
                  <select class="form-control mb-1 start-time" style="height:35px" id="start_time[]" name="start_time[]">
            <?php
            // Set the start and end times
            $start_time = strtotime('00:00');
            $end_time = strtotime('23:45');

            // Loop through 15-minute intervals
            for ($current_time = $start_time; $current_time <= $end_time; $current_time += 900) {
                // Format the time as HH:MM AM/PM
                $formatted_time = date('h:i A', $current_time);

                // Output the option tag
                echo "<option value=\"" . date('h:i', $current_time) . "\">" . $formatted_time . "</option>";
            }
            ?>
        </select>
            <?php } ?>
            </div>

    <!-- Close Time Column -->
            <div class="col-md-4 text-center">
                <strong class="mb-2" style="display: block;">Close Time</strong>
                <?php foreach ($week_days as $day) { ?>
                 
                  <select class="form-control mb-1 end-time" style="height:35px" id="end_time[]" name="end_time[]">
            <?php
            // Set the start and end times (same loop as Open Time)
            $start_time = strtotime('00:00');
            $end_time = strtotime('23:45');

            // Loop through 15-minute intervals
            for ($current_time = $start_time; $current_time <= $end_time; $current_time += 900) {
                // Format the time as HH:MM AM/PM
                $formatted_time = date('h:i A', $current_time);

                // Output the option tag
                echo "<option value=\"" . date('h:i', $current_time) . "\">" . $formatted_time . "</option>";
            }
            ?>
        </select>
                <?php } ?>
            </div>
        </div>

            
               
              
            
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="btn_calender_master_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" onclick="saveCalanderDetails()" class="btn savebtn" id="btn_calender_master_save"><i class="fas fa-calendar-check"></i>Save</button>
            </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div> 

  
</body>
</html>

<script>

    var BASE_URL = "<?php echo base_url(); ?>";
    var hrController = "<?php echo CONTROLLER_HR; ?>";

    var token = "<?php echo $_SESSION['li_token']; ?>";

    $(document).ready( function () {


  

$('#calendar_master_data_table').DataTable({

    "ajax": {
    "url": BASE_URL + "index.php/" +  hrController + "/get_calandar_details",
    "dataSrc": "data"
    },
    "columns": [

    { data: "calendar_start_date" },
    { data: "calendar_end_date" },
    { data: "is_active"},
   
    
    {
        data: "id",
        render: function (data, type, row) {
            return `
                <div class="operations"> 
                <a href="#" class="edit"  onclick="editCalenderDetails('${data}');"><i class="fas fa-edit"></i>Edit</a>
                <a href="#" class="view" onclick="viewCalenderDetails('${data}');"><i class="fas fa-eye" ></i>View</a>
                <a href="#" class="delete" onclick="deleteCalenderDetails('${data}');"><i class="fas fa-trash" ></i>Delete</a>
                </div>`;
        
        }
        
    }
    ],

    "initComplete": function(settings, json) {
    customizeDataTable('calendar_master_data_table');
    
    }

});

});


function saveCalanderDetails()
{

    var token = $("#csrf-token").attr('content'); 
    var BASE_URL = "<?php echo base_url(); ?>";
    var row_id=$("#row_id").val();
    var flag_id=$("#flag_id").val();

	 $.ajax({
    
           url: BASE_URL + "index.php/" + hrController + "/save_calender_details/",
				   type: 'POST',
				   data: $('#calender_master_modal_form').serialize() + "&li_token="+ token + "&row_id="+ row_id + "&flag_id="+ flag_id,
				   dataType:'json', 
				   success: function(response)  
				   {
                       flag_id=($("#flag_id").val());
                        if(flag_id === "0")
                        {
                          showToast('success', response.message);
                          $('#calendar_master_data_table_modal').modal('hide');
                          $('#calendar_master_data_table').DataTable().ajax.reload();

                        }
                        else if(flag_id === "1")
                        {
                          showToast('success', response.message);
                        }
				   },
				 error: function (jqXHR, textStatus, errorThrown)
				 {
					$("#divError").html("Oops! Ajax error! unable to connect to the server:" + jqXHR.responseText); 
					alert(jqXHR.responseText);
                    
				 }
	 });
	 
	
		
}


function convertIntegerToTime(selectedHour) {
    let timeString = selectedHour.toString().padStart(2, '0') + ':00:00';
    return timeString;
}




function editCalenderDetails(row_id) {
    alert(row_id); // employee_id
   
    $("#calendar_master_data_table_modal").modal("show");
    $("#row_id").val(row_id);
    $("#flag_id").val("1");
   
    $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/get_calendar_details_by_id",
        type: "GET",
        data: { row_id: row_id, li_token: token, flag_id: $("#flag_id").val() },
        dataType: "json",
        success: function (response) {
            console.log("response edit is", response.data);

            if (response.success) {
                $("#calendar_master_data_table_modal").modal("show");
                $("#row_id").val(response.data[0].calendar_master_id);
                var hrCalendarDetailsId = response.data[0].id;
                alert(hrCalendarDetailsId);
                $("#dynamic_row_id[]").val(hrCalendarDetailsId);
                $("#flag_id").val("1");

                $.each(response.data, function(index, calendarDetails) {
                    $("input[name='working_day_id[]']").each(function() {
                        var dayId = $(this).val();
                        if (calendarDetails.week_day_id.includes(dayId)) {
                            $(this).prop("checked", true);
                        }
                    });
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

$("#calendar_master_data_table_add_new").on("click", function() {
    $("#flag_id").val("0");

    var modalId = "#calendar_master_data_table_modal";
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


