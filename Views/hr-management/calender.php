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
        .edit_dynamic_content strong{
          display:flex!important;
          margin-bottom:0px!important;
        }
     

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
                <!-- <li class="nav-item">
                  <a class="nav-link active" id="li_calender_master_tab" data-toggle="tab" href="#calender_master_tab" role="tab" aria-selected="false">Master</a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link" id="li_calender_holidays_tab" data-toggle="tab" href="#calender_holidays_tab" role="tab"  aria-selected="false">Holidays</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="li_calender_events_tab" data-toggle="tab" href="#calender_events_tab" role="tab"  aria-selected="false">Events</a>
                </li> -->
                <?php 
                          
                          $is_first='yes';
                          
                          foreach($tab as $tab_item):

                            if($is_first=='yes')
                                $class='active';
                            else
                                $class='';
                            if($tab_item->sub_menu_tab=='Master')
                            {
                                $employee_add= $tab_item->is_add_new;
                                 $employee_edit= $tab_item->is_edit;
                                 $employee_view= $tab_item->is_view;
                                 $employee_delete= $tab_item->is_delete;
                                $tab_id='li_calender_master_tab';
                            }
                            else if($tab_item->sub_menu_tab=='Holidays')
                            {
                                $branch_add=$tab_item->is_add_new;
                                 $branch_edit= $tab_item->is_edit;
                                 $branch_view= $tab_item->is_view;
                                 $branch_delete= $tab_item->is_delete;
                                $tab_id='li_calender_holidays_tab';
                            }
                            else if($tab_item->sub_menu_tab=='Events')
                            {
                                $skills_add=$tab_item->is_add_new;
                                 $skills_edit= $tab_item->is_edit;
                                 $skills_view= $tab_item->is_view;
                                 $skills_delete= $tab_item->is_delete;
                                $tab_id='li_calender_events_tab';
                            }
                              
                           
                          ?>
                        <li class="nav-item">
                        <a class="nav-link <?php echo $class;?>" id="<?php echo $tab_id;?>" data-toggle="tab" href="<?php echo $tab_item->page_link ;?>" role="tab" aria-selected="false"><?php echo $tab_item->sub_menu_tab ;?></a>
                        </li>
                        
                         <?php 
                            $is_first='no';
                            endforeach;
                            ?> 

                
               
              </ul>
                     <!-- ./ tab ul -->


                    <!-- tab end  here -->
                        <div class="tab-content">
                        <div class="tab-pane fade show active" id="calender_master_tab" role="tabpanel" aria-labelledby="calender_master_tab">
                          <div id="" class="reviewBlock">
                              <div class="combined_buttons">
                                        <div class="add_new_btn_div">
                                            <button id="calendar_master_data_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
                                        </div>
                              </div>
                          </div>
                            <!--tab 1  ------ -->
                       
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
                          <?php include("calender_holidays.php");?>

                        </div>
                  
                        <div class="tab-pane fade" id="calender_events_tab" role="tabpanel" aria-labelledby="calender_events_tab">
                              <?php include("calender_events.php");?>
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
         <input type="" id="flag_id" value="0" >
        <input type="" id="row_id" value="0" >
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
                      <input type="date" class="form-control" id="calendar_end_date" name="calendar_end_date" >
                    </div>
                  </div>
                 <!-- ./ one field ---- -->  
                     
                        <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="year_name"  class="col-form-label required">Year Name</label>
                    </div>
                    <div class="col-8">
                    <input type="text" class="form-control" id="year_name" name="year_name" >
                      
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
                          <!-- <input type="" name="all_days[]" value="<-?php echo $day->id; ?>"> -->
                            <li>
                                <label style="color:black;align-items:center;display:flex;">
               
                                <input type="checkbox" class="mr-3" name="working_day_id[]" id="working_day_id[]" value="<?php echo $day->id; ?>"> <?php echo $day->day_long_name; ?>
                                </label>
                            </li>
                        <?php } ?>
                    </ul>
                </div>

    <!-- Open Time Column -->
            <div class="col-md-4 text-center">
                <strong class="mb-2" style="display: block;">Open Time</strong>
                <!-- iterates through each day in the $week_days -->
                <?php foreach ($week_days as $day) { ?> 
                  
                  <select class="form-control mb-1 start-time" style="height: 35px" id="start_time[]" name="start_time[]">
            <?php
            // Set the start and end times
            $start_time = strtotime('00:00');
            $end_time = strtotime('23:45');

            // Loop through 15-minute intervals
            for ($current_time = $start_time; $current_time <= $end_time; $current_time += 900) {
                // Format the time as 24-hour format
                $formatted_time_24 = date('H:i', $current_time);

                // Format the time as 12-hour format with AM/PM for display
                $formatted_time_12 = date('h:i A', $current_time);

                // Output the option tag with 24-hour value and 12-hour displayed text
                echo "<option value=\"" . $formatted_time_24 . "\">" . $formatted_time_12 . "</option>";
            }
            ?>
        </select>
    
            <?php } ?>

            </div>

    <!-- Close Time Column -->
            <div class="col-md-4 text-center">
                <strong class="mb-2" style="display: block;">Close Time</strong>
                <?php foreach ($week_days as $day) { ?>
                  <select class="form-control mb-1 end-time" style="height: 35px" id="end_time[]" name="end_time[]">
            <?php
            // Set the start and end times (same loop as Open Time)
            $start_time = strtotime('00:00');
            $end_time = strtotime('23:45');

            // Loop through 15-minute intervals
            for ($current_time = $start_time; $current_time <= $end_time; $current_time += 900) {
                // Format the time as 24-hour format
                $formatted_time_24 = date('H:i', $current_time);

                // Format the time as 12-hour format with AM/PM for display
                $formatted_time_12 = date('h:i A', $current_time);

                // Output the option tag with 24-hour value and 12-hour displayed text
                echo "<option value=\"" . $formatted_time_24 . "\">" . $formatted_time_12 . "</option>";
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
  <!-- ...................Edit modal for calender -->
  <div class="modal fade data-table-modal" id="calendar_master_data_table_modal_edit" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Setup Calendar for Edit</h4>
             
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- <form id="calender_master_modal_form" class="modal_form"> -->
            
              <form method="POST" class="modal_form" name="calender_master_modal_form_edit" action="#" id="calender_master_modal_form_edit" onsubmit="return false;">
                    <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="calendar_start_date_edit" class="col-form-label required">Year Start Date</label>
                    </div>
                    <div class="col-8">
                   
                     <input type="date" class="form-control" id="calendar_start_date_edit" name="calendar_start_date_edit">
                       
                      

                    </div>
                  </div>
                     <!-- ./ one field ---- --> 
                       
                  <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="calendar_end_date_edit" class="col-form-label required">Year End Date</label>
                    </div>
                    <div class="col-8">
                      <input type="date" class="form-control" id="calendar_end_date_edit" name="calendar_end_date_edit">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->  
                     
                        <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="year_name_edit" class="col-form-label required">Year Name</label>
                    </div>
                    <div class="col-8">
                    <input type="text" class="form-control" id="year_name_edit" name="year_name_edit">
                      
                    </div>
                  </div>
                     <!-- ./ one field ---- -->         
                    <!--one field  text field---- -->
                  <div class="form-group row ">
                    <div class="col-3">
                      <label for="effective_from_edit" class="col-form-label required">Effective From</label>
                    </div>
                    <div class="col-8">
                      <input type="date" class="form-control" id="effective_from_edit" name="effective_from_edit">
                    </div>
                  </div>
                  <!-- ./ one field ---- -->   
                    <!--one field  text field---- -->
                    <div class="form-group row">
                    <div class="col-3">
                      <label for="effective_to_edit" class="col-form-label required">Effective To</label>
                    </div>
                    <div class="col-8">
                      <input type="date" class="form-control" id="effective_to_edit" name="effective_to_edit">
                    </div>
                  </div>
                  <!-- ./ one field ---- -->   
                  <div class="row ml-5">
                <div class="col-md-12 edit_dynamic_content">
                  <div class="d-flex justify-content-between" >
                    <strong class="mb-2 " ><b>Choose Working Days</b></strong>
                   
                      <strong class="mb-2 " ><b>Open Time</b></strong>
                      <strong class="mb-2 " ><b>Close Time</b></strong>
                  </div>
                   
 
                    <ul class="custom-list mt-3 p-0 ">
                      <li>
                          <label style="color:black;align-items:center;display:flex;">
                          <input type="checkbox" class="mr-3" name="working_day_id_edit[]" id="working_day_id_edit[]" value=""> 
                          </label>
                      </li>
                    </ul>
                    <div class="col-md-4 text-center open_time_content">
                        <!-- open time dynamic content -->
                    </div>
                    <div class="col-md-4 text-center close_time_content">
                            <!-- close time dynamic content -->
                    </div>
                </div>

    <!-- Open Time Column -->
     

    <!-- Close Time Column -->
           
        </div>


            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="btn_calender_master_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" onclick="btneditCalanderDetails()" class="btn editbtn" id="btn_calender_master_edit"><i class="fas fa-calendar-check"></i>Save</button>
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


function editCalenderDetails(row_id) {
  alert(row_id);
    $("#calendar_master_data_table_modal_edit").modal("show");
    $("#row_id").val(row_id);
    $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/get_calender_details_by_id",
        type: "POST",
        data: { row_id: row_id, li_token: token },
        dataType: "json",
        success: function (response) {
            console.log("Response for weekdays:", response.weekDaysData);
            console.log("Response for calendar master:", response.calendarMasterData);
            // var calenderDetailsId = response.weekDaysData[0].calender_details_id;
            // alert(calenderDetailsId);
            // $('#hidden_calender_details_id').val(calenderDetailsId);
            if (response && response.calendarMasterData.length > 0) {

            var calendarData = response.calendarMasterData[0]; 
            $('#calendar_start_date_edit').val(calendarData.calendar_start_date);
            $('#calendar_end_date_edit').val(calendarData.calendar_end_date);
            $('#year_name_edit').val(calendarData.year_name);
            $('#effective_from_edit').val(calendarData.effective_from);
            $('#effective_to_edit').val(calendarData.effective_to);
         }
         //calender details fetching
        
  if (response && response.weekDaysData.length > 0) {
    $('.custom-list').empty();
    response.weekDaysData.forEach(function (day, index) {
      console.log("Iteration count:", index); 
      console.log("Fetched Start Time:", day.start_time);
      console.log("Fetched End Time:", day.end_time);
      console.log("Calender Details ID:", day.calender_details_id); 

      var listItem = $('<div class="row ml-5">');
      var checkboxCol = $('<div class="col-md-4">');
      var startTimeCol = $('<div class="col-md-4 text-center open_time_content">');
      var endTimeCol = $('<div class="col-md-4 text-center close_time_content">');

    var checkbox = $('<input>')
        .attr('type', 'checkbox')
        .addClass('mr-3')
        .attr('name', 'working_day_id_edit[]')
        .attr('id', 'working_day_id_edit[]')
        .val(day.id)
        .prop('checked', day.is_working_day === 'yes');


        // Check if the ID is already added to avoid duplicates


        var hiddenfield = $('<input>')
        .attr('type', 'hidden')
        .addClass('mr-3')
        .attr('name', 'calendar_detail_ids_edit[]')
        .attr('id', 'calendar_detail_ids_edit[]')
        .val(day.calender_details_id);
        console.log("hf",day.calender_details_id);

      
     var label = $('<label>')
        .css('color', 'black')
        .css('align-items', 'center')
        .css('display', 'flex')
        .text(day.day_long_name);

    var startTimeSelect = $('<select>')
        .addClass('form-control mb-1 start-time')
        .css('height', '35px')
        .attr('id', 'start_time_edit[]')
        .attr('name', 'start_time_edit[]');

    var endTimeSelect = $('<select>')
        .addClass('form-control mb-1 end-time')
        .css('height', '35px')
        .attr('id', 'end_time_edit[]')
        .attr('name', 'end_time_edit[]');

    var start_time = moment('00:00', 'HH:mm');
    var end_time = moment('23:45', 'HH:mm');

    while (start_time <= end_time) {
        startTimeSelect.append($('<option>').val(start_time.format('HH:mm')).text(start_time.format('hh:mm A')));
        endTimeSelect.append($('<option>').val(start_time.format('HH:mm')).text(start_time.format('hh:mm A')));
        start_time.add(15, 'minutes');
    }

    var formattedStartTime = moment(day.start_time, 'HH:mm:ss').format('HH:mm');
    var formattedEndTime = moment(day.end_time, 'HH:mm:ss').format('HH:mm');

    startTimeSelect.val(formattedStartTime);
    endTimeSelect.val(formattedEndTime);

    checkboxCol.append($('<strong class="mb-2" style="display: block;"><b>').append(checkbox).append(label));
    startTimeCol.append(startTimeSelect);
    endTimeCol.append(endTimeSelect);

    listItem.append(checkboxCol).append(startTimeCol).append(endTimeCol).append(hiddenfield);
    $('.custom-list').append(listItem);
});

// } else {
//     alert("No weekdays found for this calendar master ID.");
// }


}
 else {
    alert("No weekdays found for this calendar master ID.");
}

        },
        error: function (xhr, status, error) {
            console.error("Error fetching weekdays:", error);
            alert("Error in fetching weekdays.");
        }
    });
}

//// view


function viewCalenderDetails(row_id) {
  alert(row_id);
    $("#calendar_master_data_table_modal_edit").modal("show");
    $("#row_id").val(row_id);
    $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/get_calender_details_by_id",
        type: "POST",
        data: { row_id: row_id, li_token: token },
        dataType: "json",
        success: function (response) {
            console.log("Response for weekdays:", response.weekDaysData);
            console.log("Response for calendar master:", response.calendarMasterData);
            // var calenderDetailsId = response.weekDaysData[0].calender_details_id;
            // alert(calenderDetailsId);
            // $('#hidden_calender_details_id').val(calenderDetailsId);
            if (response && response.calendarMasterData.length > 0) {

              var calendarData = response.calendarMasterData[0]; 
                
                // Set values and disable fields
                $('#calendar_start_date_edit')
                    .val(calendarData.calendar_start_date)
                    .prop('disabled', true);

                $('#calendar_end_date_edit')
                    .val(calendarData.calendar_end_date)
                    .prop('disabled', true);

                $('#year_name_edit')
                    .val(calendarData.year_name)
                    .prop('disabled', true);

                $('#effective_from_edit')
                    .val(calendarData.effective_from)
                    .prop('disabled', true);

                $('#effective_to_edit')
                    .val(calendarData.effective_to)
                    .prop('disabled', true);

            var calendarData = response.calendarMasterData[0]; 
            $('#calendar_start_date_edit').val(calendarData.calendar_start_date);
            $('#calendar_end_date_edit').val(calendarData.calendar_end_date);
            $('#year_name_edit').val(calendarData.year_name);
            $('#effective_from_edit').val(calendarData.effective_from);
            $('#effective_to_edit').val(calendarData.effective_to);
         }
         //calender details fetching
        
  if (response && response.weekDaysData.length > 0) {
    $('.custom-list').empty();
    response.weekDaysData.forEach(function (day, index) {
      console.log("Iteration count:", index); 
      console.log("Fetched Start Time:", day.start_time);
      console.log("Fetched End Time:", day.end_time);
      console.log("Calender Details ID:", day.calender_details_id); 

      var listItem = $('<div class="row ml-5">');
      var checkboxCol = $('<div class="col-md-4">');
      var startTimeCol = $('<div class="col-md-4 text-center open_time_content">');
      var endTimeCol = $('<div class="col-md-4 text-center close_time_content">');

    var checkbox = $('<input>')
        .attr('type', 'checkbox')
        .addClass('mr-3')
        .attr('name', 'working_day_id_edit[]')
        .attr('id', 'working_day_id_edit[]')
        .val(day.id)
        .prop('checked', day.is_working_day === 'yes');


        // Check if the ID is already added to avoid duplicates


        var hiddenfield = $('<input>')
        .attr('type', 'hidden')
        .addClass('mr-3')
        .attr('name', 'calendar_detail_ids_edit[]')
        .attr('id', 'calendar_detail_ids_edit[]')
        .val(day.calender_details_id);
        console.log("hf",day.calender_details_id);

      
     var label = $('<label>')
        .css('color', 'black')
        .css('align-items', 'center')
        .css('display', 'flex')
        .text(day.day_long_name);

    var startTimeSelect = $('<select>')
        .addClass('form-control mb-1 start-time')
        .css('height', '35px')
        .attr('id', 'start_time_edit[]')
        .attr('name', 'start_time_edit[]');

    var endTimeSelect = $('<select>')
        .addClass('form-control mb-1 end-time')
        .css('height', '35px')
        .attr('id', 'end_time_edit[]')
        .attr('name', 'end_time_edit[]');

    var start_time = moment('00:00', 'HH:mm');
    var end_time = moment('23:45', 'HH:mm');

    while (start_time <= end_time) {
        startTimeSelect.append($('<option>').val(start_time.format('HH:mm')).text(start_time.format('hh:mm A')));
        endTimeSelect.append($('<option>').val(start_time.format('HH:mm')).text(start_time.format('hh:mm A')));
        start_time.add(15, 'minutes');
    }

    var formattedStartTime = moment(day.start_time, 'HH:mm:ss').format('HH:mm');
    var formattedEndTime = moment(day.end_time, 'HH:mm:ss').format('HH:mm');

    startTimeSelect.val(formattedStartTime);
    endTimeSelect.val(formattedEndTime);

    checkboxCol.append($('<strong class="mb-2" style="display: block;"><b>').append(checkbox).append(label));
    startTimeCol.append(startTimeSelect);
    endTimeCol.append(endTimeSelect);

    listItem.append(checkboxCol).append(startTimeCol).append(endTimeCol).append(hiddenfield);
    $('.custom-list').append(listItem);

    $('.custom-list').find('input, select').prop('disabled', true);
});

// } else {
//     alert("No weekdays found for this calendar master ID.");
// }


}
 else {
    alert("No weekdays found for this calendar master ID.");
}

        },
        error: function (xhr, status, error) {
            console.error("Error fetching weekdays:", error);
            alert("Error in fetching weekdays.");
        }
    });
}


function deleteCalenderDetails(row_id) {
    if (confirm('Are you sure you want to delete this calendar details?')) {
        $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/delete_calender_master",
            type: "POST",
            data: { row_id: row_id, li_token: token },
            dataType: "json",
            success: function (response) {
              
                if (response.success) {
                  // showToast('success', response.message);
               
                showToast('success', response.message); 
                $('#calendar_master_data_table').DataTable().ajax.reload();
                    
                } else {
                  showToast('success', response.message);
                   
                }
            },
            error: function (xhr, status, error) {
                console.error("Error deleting calendar details:", error);
                alert("Error deleting calendar details.");
            }
        });
    }
}







function btneditCalanderDetails() {
    var row_id = $("#row_id").val();
    console.log('Before retrieving calendarDetailIds:', $('input[name="calendar_detail_ids_edit[]"]').length);

    $('input[name="calendar_detail_ids_edit[]"]').each(function() {
        console.log($(this).val());
    });

    var calendarDetailIds = $('input[name="calendar_detail_ids_edit[]"]').map(function() {
        return this.value;
    }).get();

    console.log("Calendar Detail IDs before removing duplicates:", calendarDetailIds);

   
  
    // Convert the array to a Set to remove duplicates, then convert it back to an array
    calendarDetailIds = [...new Set(calendarDetailIds)];
  
    console.log("Calendar Detail IDs after removing duplicates:", calendarDetailIds);

    var formData = $('#calender_master_modal_form_edit').serialize() +
        '&li_token=' + token +
        '&row_id=' + row_id +
        '&calendar_detail_ids_edit=' + calendarDetailIds.join(','); 
        console.log(formData);
    $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/edit_calender_details/",
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function (response) {
            flag_id = ($("#flag_id").val());
         
                showToast('success', response.message);
                $('#calendar_master_data_table_modal_edit').modal('hide');
                $('#calendar_master_data_table').DataTable().ajax.reload();
           
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#divError").html("Oops! Ajax error! unable to connect to the server:" + jqXHR.responseText);
            alert(jqXHR.responseText);
        }
    });
}

   


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



function saveCalanderDetails() {

    var token = $("#csrf-token").attr('content');
    var BASE_URL = "<?php echo base_url(); ?>";
   

    // Collect all checkbox values, including unchecked ones
    var working_day_ids = [];
    $('input[name="working_day_id[]"]').each(function () {
        if ($(this).is(':checked') || !$(this).is(':disabled')) {
            working_day_ids.push($(this).val());
        }
    });
    // alert(working_day_ids);
    
    var formData = $('#calender_master_modal_form').serialize() +
        '&li_token=' + token +
        '&working_day_id[]=' + working_day_ids;
 

    $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/save_calender_details/",
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function (response) {
          if (response && response.success) {
              showToast('success', response.message);
              $('#calendar_master_data_table_modal').modal('hide');
              $('#calendar_master_data_table').DataTable().ajax.reload();
          } 
      },

        error: function (jqXHR, textStatus, errorThrown) {
            $("#divError").html("Oops! Ajax error! unable to connect to the server:" + jqXHR.responseText);
            alert(jqXHR.responseText);
        }
    });
}






function convertIntegerToTime(selectedHour) {
    let timeString = selectedHour.toString().padStart(2, '0') + ':00:00';
    return timeString;
}




$("#calendar_master_data_table_add_new").on("click", function() {
    $("#flag_id").val("0");

    var modalId = "#calendar_master_data_table_modal";
    $(modalId + ' input[type="text"]').val('');
    $(modalId + ' input[type="checkbox"]').prop('checked', false);

    $(modalId).modal("show");

    // Clear text fields
    // $(modalId + ' input[type="text"]').val('');
    // // Reset select2 dropdowns
    // $(modalId + ' select').each(function() {
    //     if ($(this).hasClass('select2')) {
    //         $(this).val('').trigger('change');
    //     }
    // });
});

    </script>

<script>
  
  var BASE_URL = "<?php echo base_url(); ?>";
    var hrController = "<?php echo CONTROLLER_HR; ?>";

    var token = "<?php echo $_SESSION['li_token']; ?>";

    $('#calendar_start_date').change(function() {
     
        var startDateValue = $(this).val();

       
        if (startDateValue) {
           
            var startDate = new Date(startDateValue);
            
           
            var endDate = new Date(startDate);
            endDate.setFullYear(endDate.getFullYear() + 1);
            endDate.setDate(endDate.getDate() - 1);

          
            var formattedEndDate = endDate.toISOString().split('T')[0];
            // alert("formattedEndDate is"+formattedEndDate);

           
            $('#calendar_end_date').val(formattedEndDate);
            $('#calendar_end_date').attr('min', startDateValue);

           
            $('#effective_from').val(startDateValue);
            $('#effective_from').attr('min',startDateValue);
            $('#effective_from').attr('max',formattedEndDate);

            $('#effective_to').val(formattedEndDate);
            $('#effective_to').attr('min', startDateValue);
             $('#effective_to').attr('max', formattedEndDate)

            
            var formattedEffectiveTo = endDate.toISOString().split('T')[0];
            $('#effective_to').val(formattedEffectiveTo);
        }
    });

    $('#calendar_end_date').on('focus', function() {
    // Store the initial value when the field is focused
    $(this).data('startEndDateValue', $(this).val());
});




$('#calendar_end_date').on('blur', function(event) {
  console.log("Blur event fired!");
    var endDateValue = $(this).val();
    var startDateValue = $('#calendar_start_date').val();
    var startEndDateValue = $(this).data('startEndDateValue');

    if (endDateValue && startDateValue) {
        var endDate = new Date(endDateValue);
     
        var startDate = new Date(startDateValue);
        console.log("End Date:", endDate);
        console.log("Start Date:", startDate);

        if (endDate <= startDate) {
      
            // alert('End date must be greater than the start date.');
            console.log("Validation failed: End date must be greater than the start date.");
            showToast("error","Validation failed: End date must be greater than the start date.");
            // Prevent moving focus away from the current input field
            event.preventDefault();

            // Reassign the previous valid value
            $(this).val($(this).data('startEndDateValue'));
        } else {
            // If the new value is valid, update the stored initial value
            $(this).data('startEndDateValue', endDateValue);
            $('#effective_to').val(endDateValue);
            $('#effective_to').attr('min', startDateValue);
            $('#effective_to').attr('max', endDateValue);

            $('#effective_from').attr('min', startDateValue);
            $('#effective_from').attr('max', endDateValue);
        }
    }
});




$('#effective_from').on('blur', function(event) {
    var effectiveFromDate = $(this).val();

    // Validate if effectiveFromDate is not empty
    if (effectiveFromDate) {
        // Update min attribute of effective_to to effectiveFromDate
        $('#effective_to').attr('min', effectiveFromDate);
    }
});


$('#effective_to').on('focus', function() {
    $(this).data('previousEffectiveToDate', $(this).val());
});

$('#effective_to').on('blur', function() {
    var effectiveToDate = $(this).val();
    var effectiveFromDate = $('#effective_from').val();

    // Validate if both dates are available
    if (effectiveFromDate && effectiveToDate) {
        var effectiveFrom = new Date(effectiveFromDate);
        var effectiveTo = new Date(effectiveToDate);

        effectiveFrom.setHours(0, 0, 0, 0);
        effectiveTo.setHours(0, 0, 0, 0);

        // Check if effectiveTo is less than or equal to effectiveFrom
        if (effectiveTo <= effectiveFrom) {
     
            showToast("error","Validation failed: Effective to date must be greater than effective from date.");
            
            // Retrieve the previous value set in the focus event
            var prevValidDate = $(this).data('previousEffectiveToDate');
            if (prevValidDate) {
                $(this).val(prevValidDate); 
            }
        } else {
            // Store the current value for future reference
            $(this).data('previousEffectiveToDate', effectiveToDate);
        }
    }
});



// Function to calculate year range based on start and end dates
function calculateYearRange(startDate, endDate) {
    const startYear = new Date(startDate).getFullYear();
    const endYear = new Date(endDate).getFullYear();
    const yearName = `${startYear}-${endYear}`;
    return yearName;
}


$('#calendar_start_date, #calendar_end_date').on('change', function() {
   
    const startDate = $('#calendar_start_date').val();
    const endDate = $('#calendar_end_date').val();
    const yearName = calculateYearRange(startDate, endDate);
    $('#year_name').val(yearName);
});


// Edit validation

$('#calendar_start_date_edit').change(function() {
     
     var startDateValue = $(this).val();
     if (startDateValue) {
        
         var startDate = new Date(startDateValue);
         
        
         var endDate = new Date(startDate);
         endDate.setFullYear(endDate.getFullYear() + 1);
         endDate.setDate(endDate.getDate() - 1);

       
         var formattedEndDate = endDate.toISOString().split('T')[0];
         // alert("formattedEndDate is"+formattedEndDate);

        
         $('#calendar_end_date_edit').val(formattedEndDate);
         $('#calendar_end_date_edit').attr('min', startDateValue);

        
         $('#effective_from_edit').val(startDateValue);
         $('#effective_from_edit').attr('min',startDateValue);
         $('#effective_from_edit').attr('max',formattedEndDate);

         $('#effective_to_edit').val(formattedEndDate);
         $('#effective_to_edit').attr('min', startDateValue);
          $('#effective_to_edit').attr('max', formattedEndDate)

         
         var formattedEffectiveTo = endDate.toISOString().split('T')[0];
         $('#effective_to_edit').val(formattedEffectiveTo);
     }
 });





// Store initial value when the field is focused
$('#calendar_end_date_edit').on('focus', function() {
    $(this).data('prevEndDate', $(this).val());
});

$('#calendar_end_date_edit').on('blur', function(event) {
 
    var endDateValue = $(this).val();
    var startDateValue = $('#calendar_start_date_edit').val();
    var startEndDateValue = $(this).data('startEndDateValue');

    if (endDateValue && startDateValue) {
        var endDate = new Date(endDateValue);
        var startDate = new Date(startDateValue);

        console.log("End Date:", endDate);
        console.log("Start Date:", startDate);

        if (endDate <= startDate) {
      
          showToast("error","End date must be greater than the start date..");
            
            console.log("Validation failed: End date must be greater than the start date.");

            // Prevent moving focus away from the current input field
            event.preventDefault();

            // Reassign the previous valid value
            $(this).val($(this).data('prevEndDate'));
        } else {
            // If the new value is valid, update the stored initial value
            $(this).data('prevEndDate', endDateValue);
            $('#effective_to_edit').val(endDateValue);
            $('#effective_to_edit').attr('min', startDateValue);
            $('#effective_to_edit').attr('max', endDateValue);

            $('#effective_from_edit').attr('min', startDateValue);
            $('#effective_from_edit').attr('max', endDateValue);
        }
    }
});

$('#effective_from_edit').on('blur', function(event) {
    var effectiveFromDate = $(this).val();
    if (effectiveFromDate) {
        $('#effective_to_edit').attr('min', effectiveFromDate);
    }
});

$('#effective_to_edit').on('focus', function() {
    $(this).data('previousEffectiveToDate', $(this).val());
});

$('#effective_to_edit').on('blur', function() {
    var effectiveToDate = $(this).val();
    var effectiveFromDate = $('#effective_from_edit').val();

    // Validate if both dates are available
    if (effectiveFromDate && effectiveToDate) {
        var effectiveFrom = new Date(effectiveFromDate);
        var effectiveTo = new Date(effectiveToDate);

        effectiveFrom.setHours(0, 0, 0, 0);
        effectiveTo.setHours(0, 0, 0, 0);

        // Check if effectiveTo is less than or equal to effectiveFrom
        if (effectiveTo <= effectiveFrom) {
            
            showToast("error","Effective to date must be greater than effective from date.");
            // Retrieve the previous value set in the focus event
            var prevValidDate = $(this).data('previousEffectiveToDate');
            if (prevValidDate) {
                $(this).val(prevValidDate); 
            }
        } else {
            // Store the current value for future reference
            $(this).data('previousEffectiveToDate', effectiveToDate);
        }
    }
});





















    </script>
  

