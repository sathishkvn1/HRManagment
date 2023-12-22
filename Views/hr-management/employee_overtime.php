<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HR & Payroll</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <?php include("top-css.php"); ?> 

    

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
                      <?php 
                          
                          $is_first='yes';
                          
                          foreach($tab as $tab_item):

                            if($is_first=='yes')
                                $class='active';
                            else
                                $class='';
                            if($tab_item->sub_menu_tab=='Request')
                            {
                                $employee_add= $tab_item->is_add_new;
                                 $employee_edit= $tab_item->is_edit;
                                 $employee_view= $tab_item->is_view;
                                 $employee_delete= $tab_item->is_delete;
                                $tab_id='li_overtime_request_tab';
                            }
                            else if($tab_item->sub_menu_tab=='New Request')
                            {
                                $branch_add=$tab_item->is_add_new;
                                 $branch_edit= $tab_item->is_edit;
                                 $branch_view= $tab_item->is_view;
                                 $branch_delete= $tab_item->is_delete;
                                $tab_id='li_overtime_new_request_tab';
                            }
                            else if($tab_item->sub_menu_tab=='Verified')
                            {
                                $skills_add=$tab_item->is_add_new;
                                 $skills_edit= $tab_item->is_edit;
                                 $skills_view= $tab_item->is_view;
                                 $skills_delete= $tab_item->is_delete;
                                $tab_id='li_overtime_verified_tab';
                            }
                              else if($tab_item->sub_menu_tab=='Approved')
                            {
                                $language_add=$tab_item->is_add_new;
                                $language_edit= $tab_item->is_edit;
                                 $language_view= $tab_item->is_view;
                                 $language_delete= $tab_item->is_delete;
                                $tab_id='li_overtime_approved_tab';
                            }
                            else if($tab_item->sub_menu_tab=='Paid')
                            {
                                $language_add=$tab_item->is_add_new;
                                $language_edit= $tab_item->is_edit;
                                 $language_view= $tab_item->is_view;
                                 $language_delete= $tab_item->is_delete;
                                $tab_id='li_overtime_paid_tab';
                            }
                           
                           
                          ?>
                        <li class="nav-item">
                        <a class="nav-link <?php echo $class;?>" id="<?php echo $tab_id;?>" data-toggle="tab" href="<?php echo $tab_item->page_link ;?>" role="tab" aria-selected="false"><?php echo $tab_item->sub_menu_tab ;?></a>
                        </li>
                        
                         <?php 
                            $is_first='no';
                            endforeach;
                            ?> 

                <!-- <li class="nav-item">
                  <a class="nav-link active" id="li_overtime_request_tab" data-toggle="tab" href="#emp_overtime_request_tab" role="tab" aria-selected="false">Request</a>
                </li>
						
                <li class="nav-item">
                  <a class="nav-link" id="li_overtime_new_request_tab" data-toggle="tab" href="#emp_overtime_new_request_tab" role="tab"  aria-selected="false">New Request</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="li_overtime_verified_tab" data-toggle="tab" href="#emp_overtime_verified_tab" role="tab"  aria-selected="false">Verified</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="li_overtime_approved_tab" data-toggle="tab" href="#emp_overtime_approved_tab" role="tab"  aria-selected="false">Approved</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="li_overtime_approved_tab" data-toggle="tab" href="#emp_overtime_paid_tab" role="tab"  aria-selected="false">Paid</a>
                </li> -->
               
              </ul>
                     <!-- ./ tab ul -->


                    <!-- tab end  here -->
                        <div class="tab-content">
                            <!--tab 1  ------ -->
                        <div class="tab-pane fade show active" id="emp_overtime_request_tab" role="tabpanel" aria-labelledby="emp_overtime_request_tab">

                        <div id="" class="reviewBlock">

                                            <div class="combined_buttons">
                                                <div class="add_new_btn_div">
                                                    <button id="emp_overtime_data_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
                                                 </div>
                                                <!-- <div class="filter_btn_div">
                                                <button id="loan_request_data_table_filter_btn" class="customise_filter_button" data-value="employee_data_table"><i class="fas fa-filter"></i>Filter</button>
                                                </div>
                                                <div class="reset_filter_btn_div">
                                                    <button id="loan_request_data_table_reset_filter"  style="display:none" class="cancel_filter_button"><i class="fas fa-times"></i> Cancel</button>
                                                </div> -->
                                               
                                            </div>
                
                          </div>
                                <table id="emp_overtime_request_data_table" class="table table-striped">
                            <thead>
                                <tr>
                              
                                    <th>Employee Name</th>
                                    <th>Date of Request</th>
                                    <th>Overtime Date</th>
                                    <th>Overtime Date</th>
                                    <th>Overtime Status</th>

                                <th style="width:200px;text-align: center;">Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                <tr>
                                   
                                    
                                    
                                </tr>
                                
                            
                            </tbody>
                          
                          </table>
                                    
                        </div>
                        <div class="tab-pane fade" id="emp_overtime_new_request_tab" role="tabpanel" aria-labelledby="emp_overtime_new_request_tab">
                      
                           <?php include("employee_overtime_new_request.php");?>
                      
                      </div>
                      <div class="tab-pane fade" id="emp_overtime_verified_tab" role="tabpanel" aria-labelledby="languages_tab">
               
                        <?php include("overtime_verified.php");?> 
                       </div>
                  
                   <div class="tab-pane fade" id="emp_overtime_approved_tab" role="tabpanel" aria-labelledby="dependents_tab">
                      
                         <?php include("overtime_approved.php");?> 
                   </div>
                   

                   <div class="tab-pane fade" id="emp_overtime_paid_tab" role="tabpanel" aria-labelledby="languages_tab">
               
                        <!-- <-?php include("verified.php");?> -->
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


            <!-- modal for overtime -->
 <div class="modal fade data-table-modal" id="emp_overtime_request_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Overtime Request</h4>
           
             
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="loan_request_modal_forms" class="modal_form">
                       <!--one field  text field---- -->
                       <div class="form-group row">
                    <div class="col-3">
                      <label for="employee_id" class="col-form-label required">Employee Name</label>
                    </div>
                    <div class="col-8">
                     <select class="form-control select2" id="overtime_employee_id" name="overtime_employee_id">
                         <option value="" >Select Employee Name</option>
                            <?php
                            if(isset($employee_names)):
                                foreach ($employee_names as $row):
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
                      <label for="recipient-name" class="col-form-label required">Date Of Request </label>
                    </div>
                    <div class="col-8">
                      <input type="date" class="form-control" id="overtime_date_of_request" name="overtime_date_of_request">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->  
                  
                     
                    
                     
                      <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Overtime Date </label>
                    </div>
                    <div class="col-8">
                      <input type="date" class="form-control" id="overtime_date" name="overtime_date">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->   

                 

                        
                        <!--one field  text field---- -->
                        <div class="form-group row">
                            <div class="col-3">
                            <label for="leave_from_time" class="col-form-label required">Overtime From</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control select2" id="overtime_time_from" name="overtime_time_from" onchange="calculateTimeDifference()" >
                                   <option value="" >Select Overtime Time</option>
                                     <?php echo $options24Hour; ?>
                                </select>
                            </div>
                      </div>
                     <!-- ./ one field ---- -->   


                       <!--one field  text field---- -->
                       <div class="form-group row">
                    <div class="col-3">
                      <label for="education_name" class="col-form-label required">Overtime To</label>
                    </div>
                    <div class="col-8">
                    
                      <select class="form-control select2" id="overtime_time_to" name="overtime_time_to" onchange="calculateTimeDifference()" >
                      <option value="" >Select Leave to Time</option>
                        <?php echo $options24Hour; ?>
                     </select>
                    </div>
                  </div>
                     <!-- ./ one field ---- -->        


                  <!--one field  text field---- -->
                  <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Hours Worked</label>
                      </div>
                      <div class="col-8">
                        <input type="text"  name="hours_worked"  id="hours_worked"  class="form-control" oninput="calculateOvertimeAmount()">
                        </input>
                      </div>
                    </div>
                  <!-- ./ one field ---- --> 
                  <!--one field  text field---- -->

                      <!--one field  text field---- -->
                      <div class="form-group row">
                    <div class="col-3">
                      <label for="education_name" class="col-form-label required">Overtime Category</label>
                    </div>
                    <div class="col-8">
                      <select class="form-control" id="overtime_category_id" name="overtime_category_id"  onchange="calculateOvertimeAmount()">
                        <option value="" >Select Overtime Category</option>
                                    <?php
                                    if (isset($overtime_category)):  
                                        foreach ($overtime_category as $row):
                                        $category = $row->overtime_category;
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


                  <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Overtime Rate</label>
                      </div>
                      <div class="col-8">
                        <input type="text"  name="overtime_rate"  id="overtime_rate"  class="form-control"  onchange="calculateOvertimeAmount()">
                        </input>
                      </div>
                    </div>
                  <!-- ./ one field ---- -->  
                  
                  <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Actual Rate per hour</label>
                      </div>
                      <div class="col-8">
                      <input type="text" name="overtime_rate_per_hour"  id="overtime_rate_per_hour" class="form-control" oninput="calculateOvertimeAmount()">

                      </div>
                    </div>
                  <!-- ./ one field ---- -->  
                  <!--one field  text field---- -->
                  <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Overtime Amount</label>
                      </div>
                      <div class="col-8">
                        <input type="text"  name="overtime_amount"  id="overtime_amount"  class="form-control">
                        </input>
                      </div>
                    </div>
                  <!-- ./ one field ---- -->   
                 
             
                  <!-------------one field  text field--------->
                 <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Remarks</label>
                      </div>
                      <div class="col-8">
                        <input type="text"  name="overtime_remarks"  id="overtime_remarks"  class="form-control">
                        </input>
                      </div>
                    </div>
                  <!--.............. ./ one field ---- -->  
                 
               
              </form>
            
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="btn_pay_scales_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="btn_overtime_save"><i class="fas fa-calendar-check"></i>Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div> 


    <!-- <-?php include("bottom-js.php"); ?>    -->
</body>
</html>

<script>
    var BASE_URL = "<?php echo base_url(); ?>";
    var hrController = "<?php echo CONTROLLER_HR; ?>";

    var token = "<?php echo $_SESSION['li_token']; ?>";

    $(document).ready(function() {
    $('#emp_overtime_request_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" + hrController + "/get_overtime_details",
            "dataSrc": "data"
        },
        "columns": [
            { "data": "employee_name" },
            { "data": "overtime_date" },
            { "data": "overtime_time_from" },
            { "data": "overtime_time_to" },
            { "data": "overtime_request_status" },
            {
                "data": "id",
                "render": function(data, type, row) {
                    return `
                        <div class="operations"> 
                            <a href="#" class="edit" onclick="editOvertimeDetails('${data}');"><i class="fas fa-edit"></i>Edit</a>
                            <a href="#" class="view" onclick="viewOvertimeDetails('${data}');"><i class="fas fa-eye"></i>View</a>
                            <a href="#" class="delete" onclick="deleteOvertimeDetails('${data}');"><i class="fas fa-trash"></i>Delete</a>
                        </div>`;
                }
            }
        ],
        "initComplete": function(settings, json) {
            customizeDataTable('emp_overtime_request_data_table');
        }
    });
});



  
    $("#emp_overtime_data_table_add_new").on("click", function() {
      
        $("#flag_id").val("0");
        var modalId = "#emp_overtime_request_modal";
        $(modalId).modal("show");
        // Clear text fields
        $(modalId + ' input[type="text"]').val('');
        // Reset select2 dropdowns
        $(modalId + ' select').each(function() {
            if ($(this).hasClass('select2')) {
                $(this).val('').trigger('change');
            }
        });
    // loan_request_employee_id
    // $("#loan_request_employee_id").prop("disabled", false);
    // $("#loan_request_employee_id").prop("readonly", false);
    // $("#loan_request_employee_id").css("cursor", "auto");
});

   // AJAX call to fetch the overtime rate based on the selected category
$('#overtime_category_id').change(function() {
        var category_id = $(this).val();
       
     
        $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/get_overtime_rate",
            type: 'POST',
            dataType: 'json',
            data: { category_id: category_id,li_token: token, },
            success: function(response) {
              console.log(response);
                if (response && response.overtime_rate) {
                  $('#overtime_rate').val(response.overtime_rate);
                } else {
                    $('#overtime_rate').val('');
                }
            },
            error: function(xhr, status, error) {
                console.error(error); 
            }
        });
    });



$("#btn_overtime_save").click (function(){

   var formData  = new FormData();
               formData.append('employee_id', $("#overtime_employee_id").val());
               formData.append('date_of_request', $("#overtime_date_of_request").val());  
               formData.append('overtime_date', $("#overtime_date").val());
               formData.append('overtime_time_from', $("#overtime_time_from").val());
               formData.append('overtime_time_to', $("#overtime_time_to").val());
               formData.append('hours_worked', $("#hours_worked").val());
               formData.append('overtime_category_id', $("#overtime_category_id").val());
               formData.append('overtime_rate', $("#overtime_rate").val());
              formData.append('overtime_rate_per_hour', $("#overtime_rate_per_hour").val());
               formData.append('overtime_amount', $("#overtime_amount").val());
               formData.append('remarks', $("#overtime_remarks").val());
               formData.append('flag_id', $("#flag_id").val()); 
               formData.append('row_id', $("#row_id").val()); 
               formData.append('li_token', token); 
       
         $.ajax({
             url: BASE_URL + "index.php/" + hrController + "/save_overtime_details",
             type: 'POST',
             data:  formData,
             dataType: "JSON",
             processData: false,
             contentType: false,
             success: function(response) {
               console.log("response",response);
               showToast('success',response.message);
               $('#emp_overtime_request_modal').modal('hide');
               $('#emp_overtime_request_data_table').DataTable().ajax.reload();
              $('#new_overtime_request_data_table').DataTable().ajax.reload();
              // $('#overtime_verified_data_table').DataTable().ajax.reload();
              //  $('#loan_verified_data_table').DataTable().ajax.reload();

             },
             error: function(xhr, status, error) {
                 console.log(xhr.responseText);
                 console.log(status);
                 console.log(error);
             }
         });
}); 

function editOvertimeDetails(row_id) {
  alert(row_id);

    $("#row_id").val(row_id);
    flag_id=$("#flag_id").val("1");
    $('#emp_overtime_request_modal').modal('show');

    $.ajax({
        url: BASE_URL + "index.php/" + hrController + "/get_overtime_request_by_id",
        type: "GET",
        data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val() },
        dataType: "json",
        success: function (response) {
              console.log("response is" ,response);
            if (response.success) {
              $('#loan_request_data_table_modal').modal('show');
              var overtimeTimeFrom = moment(response.data.overtime_time_from, 'HH:mm:ss').format('HH:mm');
            var overtimeTimeTo = moment(response.data.overtime_time_to, 'HH:mm:ss').format('HH:mm');

              $("#overtime_employee_id").val(response.data.employee_id).trigger('change');
              $("#overtime_date_of_request").val(response.data.date_of_request);
              $("#overtime_category_id").val(response.data.overtime_category_id).trigger('change');
              $("#overtime_date").val(response.data.overtime_date);
              $("#overtime_time_from").val(overtimeTimeFrom).trigger('change');
              $("#overtime_time_to").val(overtimeTimeTo).trigger('change');
              $("#hours_worked").val(response.data.hours_worked);
              
              $("#overtime_rate_per_hour").val(response.data.overtime_rate_per_hour);
              $("#overtime_rate").val(response.data.overtime_rate);
              $("#overtime_amount").val(response.data.overtime_amount);
              $("#overtime_remarks").val(response.data.remarks);
              calculateOvertimeAmount();
             
              $("#overtime_employee_id").prop("disabled", true).css("cursor", "not-allowed");
              $("#overtime_employee_id").prop("readonly", true).css("cursor", "not-allowed");

                //  $("#department_name").focus();

            } 
            else {
                alert("Failed.");
            }
        },
        error: function (xhr, status, error) {
            alert("Error in fetching .");
        }
    });
}


  function compareDates() {
        var overtimeDateOfRequest = $('#overtime_date_of_request').val();
        var overtimeDate = $('#overtime_date').val();

        if (overtimeDateOfRequest !== '' && overtimeDate !== '') {
            var dateOfRequest = new Date(overtimeDateOfRequest);
            var overtime = new Date(overtimeDate);

            if (overtime >= dateOfRequest) {
              showToast("error","Overtime Date should be less than Date Of Request.");
                
                $('#overtime_date').val(overtimeDateOfRequest); 
            }
        }
    }

   
    $('#overtime_date').on('blur', function() {
        compareDates();
    });


    function calculateTimeDifference() {
        var timeFrom = $('#overtime_time_from').val();
        var timeTo = $('#overtime_time_to').val();

        if (timeFrom !== '' && timeTo !== '') {
            var timeFromParts = timeFrom.split(':');
            var timeToParts = timeTo.split(':');

            var hoursFrom = parseInt(timeFromParts[0], 10);
            var minutesFrom = parseInt(timeFromParts[1], 10);
            var hoursTo = parseInt(timeToParts[0], 10);
            var minutesTo = parseInt(timeToParts[1], 10);

            var totalHoursFrom = hoursFrom + minutesFrom / 60;
            var totalHoursTo = hoursTo + minutesTo / 60;

            var hoursWorked = totalHoursTo - totalHoursFrom;

            // Update the Hours Worked field with the calculated value
            $('#hours_worked').val(hoursWorked.toFixed(2)); // Set to 2 decimal places
        }
    }

    // Trigger calculation when either time field changes
    $('#overtime_time_from, #overtime_time_to').on('change', function() {
        calculateTimeDifference();
    });

    function calculateOvertimeAmount() {
    var hoursWorked = parseFloat($('#hours_worked').val()) || 0;
    var overtimeRate = parseFloat($('#overtime_rate').val()) || 0;
    var overtimeRatePerHour = parseFloat($('#overtime_rate_per_hour').val()) || 0;

    console.log('Overtime Rate:', overtimeRate);
    console.log('Overtime Rate Per Hour:', overtimeRatePerHour);

    console.log('Hours Worked:', hoursWorked);
    console.log('Overtime Rate:', overtimeRate);
    console.log('Overtime Rate Per Hour:', overtimeRatePerHour);

    var overtimeAmount = hoursWorked * overtimeRate * overtimeRatePerHour;
    console.log('Calculated Overtime Amount:', overtimeAmount);

    $('#overtime_amount').val(overtimeAmount.toFixed(2)); // Set to 2 decimal places
}


// $('#overtime_rate_per_hour').on('input', function() {
//     calculateOvertimeAmount();
// });

// Trigger calculation when any relevant field changes


    </script>


