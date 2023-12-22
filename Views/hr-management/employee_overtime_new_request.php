
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Request</title>
</head>

<body>

               <table id="new_overtime_request_data_table" class="table table-striped">
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
                 
                            

<!-- modal -->

<div class="modal fade data-table-modal" id="new_request_overtime_modal" data-bs-backdrop="static">
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
                     <select class="form-control select2" id="overtime_new_reuest_employee_id" name="overtime_new_reuest_employee_id">
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
                      <input type="date" class="form-control" id="overtime_new_date_of_request" name="overtime_new_date_of_request">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->  
                  
                      <!--one field  text field---- -->
                      <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Overtime Date </label>
                    </div>
                    <div class="col-8">
                      <input type="date" class="form-control" id="overtime_new_date" name="overtime_new_date">
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
                            <label for="new_overtime_time_from" class="col-form-label required">Overtime From</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control select2" id="new_overtime_time_from" name="new_overtime_time_from">
                                   <option value="" >Select Overtime Time</option>
                                     <?php echo $options24Hour; ?>
                                </select>
                            </div>
                      </div>
                     <!-- ./ one field ---- -->   

                        
                       <!--one field  text field---- -->
                <div class="form-group row">
                    <div class="col-3">
                      <label for="new_overtime_time_to" class="col-form-label required">Overtime To</label>
                    </div>
                    <div class="col-8">
                    
                      <select class="form-control select2" id="new_overtime_time_to" name="new_overtime_time_to">
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
                        <input type="text"  name="new_hours_worked"  id="new_hours_worked"  class="form-control">
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
                      <select class="form-control select2" id="new_overtime_category_id" name="new_overtime_category_id">
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
                        <input type="text"  name="new_overtime_rate"  id="new_overtime_rate"  class="form-control">
                        </input>
                      </div>
                    </div>
                  <!-- ./ one field ---- -->  
                  
                  <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Actual Rate per hour</label>
                      </div>
                      <div class="col-8">
                        <input type="text"  name="new_rate_per_hour"  id="new_rate_per_hour"  class="form-control">
                        </input>
                      </div>
                    </div>
                  <!-- ./ one field ---- -->  
                  <!--one field  text field---- -->
                  <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Overtime Amount</label>
                      </div>
                      <div class="col-8">
                        <input type="text"  name="new_overtime_amount"  id="new_overtime_amount"  class="form-control">
                        </input>
                      </div>
                    </div>
                  <!-- ./ one field ---- -->   
                 
             
                  <!--one field  text field---- -->
                 <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Remarks</label>
                      </div>
                      <div class="col-8">
                        <input type="text"  name="new_overtime_remarks"  id="new_overtime_remarks"  class="form-control">
                        </input>
                      </div>
                    </div>
                  <!-- ./ one field ---- -->  
                 
                    <!--one field  text field---- -->
                    <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Overtime Status</label>
                    </div>
                    <div class="col-8">
                    
                    <select class="form-control" id="overtime_request_status_id" name="overtime_request_status_id">
                    <option value="" >Select Status</option>
                    <?php if (isset($ovetime_status)): ?>
                        <?php foreach ($ovetime_status as $row): ?>
                            <?php
                                $name = $row->overtime_request_status;
                                $id = $row->id;
                            ?>
                            <option value="<?php echo $id; ?>" >
                                <?php echo $name; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>

                 
                    </div>
                  </div>
                 <!-- ./ one field ---- --> 

                    <!--one field  text field---- -->
                <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Rejection Reason</label>
                      </div>
                      <div class="col-8">
                        <textarea name="new_overtime_request_rejection_reason"  id="new_overtime_request_rejection_reason"class="form-control ">
                        </textarea>
                      </div>
                </div>
                  <!-- ./ one field ---- -->  




            </form>
            <!-- modal body close -->
            </div> 
                    
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="btn_pay_scales_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="btn_new_overtime_save"><i class="fas fa-calendar-check"></i>Save</button>
            </div>

        
          
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div> 
    </div>

                
    <?php include("bottom-js.php"); ?>  


</body>
</html>


<script>
    var BASE_URL = "<?php echo base_url(); ?>";
    var hrController = "<?php echo CONTROLLER_HR; ?>";

    var token = "<?php echo $_SESSION['li_token']; ?>";

    $(document).ready( function () {
      $("#new_overtime_request_rejection_reason").closest(".form-group.row").hide();


    $('#new_overtime_request_data_table').DataTable({
   
   "ajax": {
        "url": BASE_URL + "index.php/" + hrController + "/get_new_overtime_details",
       "dataSrc": "data"
   },
   "columns": [
     
            { "data": "employee_name" },
            { "data": "overtime_date" },
            { "data": "overtime_time_from" },
            { "data": "overtime_time_to" },
            { "data": "overtime_request_status" },
       {
           data: "id",
           render: function (data, type, row) {
              //  return `
              //     <div class="operations"><a href="#" class="view" onclick="viewNewRequest('${data}');"><i class="fas fa-eye"></i>View</a>  </div>`;
              return `
                  <div class="operations"> 
               
                  <a href="#" class="view" onclick="viewNewOvertimeRequest('${data}');"><i class="fas fa-eye" ></i>View</a>
                
                  </div>`;
           }
       }
   ],
  
     "initComplete": function(settings, json) {
       customizeDataTable('new_overtime_request_data_table');
   }

});



});

function hideRejectionSatus(){
    if ($("#overtime_request_status_id").val() == '4') {
       
        $("#new_overtime_request_rejection_reason").closest(".form-group.row").show();
    } else {
       
        $("#new_overtime_request_rejection_reason").closest(".form-group.row").hide();
    }
}


$("#overtime_request_status_id").change(function() {
  hideRejectionSatus();
});


function viewNewOvertimeRequest(row_id) 
{
  alert("view id is" +row_id);
  $("#row_id").val(row_id);
  flag_id=$("#flag_id").val("1");
  $('#new_request_overtime_modal').modal('show')
    $.ajax({
        type: 'GET',
        url: BASE_URL + "index.php/" + hrController + "/get_new_overtime_request_by_id",
        data: {row_id:row_id,li_token: token,flag_id: $("#flag_id").val()},
        dataType: 'json',
        success: function(response) {
          console.log("Overtime Request",response);
         
            if (response) 
            {
                var newOvertimeTimeFrom = moment(response.data.overtime_time_from, 'HH:mm:ss').format('HH:mm');
                // alert(overtimeTimeFrom);
                 var newOvertimeTimeTo = moment(response.data.overtime_time_to, 'HH:mm:ss').format('HH:mm');
                //  alert(overtimeTimeTo);
                
                 $("#new_overtime_time_from").val(newOvertimeTimeFrom).trigger('change');
               
                 $("#new_overtime_time_to").val(newOvertimeTimeTo).trigger('change');


              $("#overtime_new_reuest_employee_id").val(response.data.employee_id).trigger('change');
              $("#overtime_new_date_of_request").val(response.data.date_of_request);
              $("#new_overtime_category_id").val(response.data.overtime_category_id).trigger('change');
              $("#overtime_new_date").val(response.data.overtime_date);
         
              $("#new_hours_worked").val(response.data.hours_worked);
              $("#new_overtime_rate").val(response.data.overtime_rate);
              $("#new_overtime_amount").val(response.data.overtime_amount);
              $("#new_overtime_remarks").val(response.data.remarks);

              var disable_new_request = $("#overtime_new_reuest_employee_id, #overtime_new_date_of_request,new_overtime_time_from,new_overtime_time_to, #overtime_new_date,#new_hours_worked,#new_overtime_category_id,#new_overtime_rate,#new_rate_per_hour,#new_overtime_amount,#new_overtime_remarks");
              disable_new_request.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                // Show the .modal-footer when the modal is hidden
              $("#new_request_overtime_modal").on("hidden.bs.modal", function () 
                {
                  disable_new_request.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
                });
            }
             else 
             {
                console.error('Response does not contain department_name.');
             }
        },
        error: function(xhr, status, error) {
            console.error(xhr, status, error);
        }
    });
}

$("#btn_new_overtime_save").on("click",function() {  
 
          var formData  = new FormData();
          formData.append('new_overtime_request_status_id', $("#overtime_request_status_id").val());
          formData.append('rejection_reason', $("#new_overtime_request_rejection_reason").val());
          formData.append('row_id', $("#row_id").val()); 
          formData.append('flag_id', $("#flag_id").val()); 
          formData.append('li_token', token); 
            $.ajax({
                     url: BASE_URL + "index.php/" + hrController + "/save_new_overtime_request",
                     type: 'POST',
                     data:  formData,
                     dataType: "JSON",
                     processData: false,
                     contentType: false,
                        success: function(response) {
                              console.log("response",response);
                               console.log(response.message);
                               $('#new_request_overtime_modal').modal('hide');
                               $('#emp_overtime_request_data_table').DataTable().ajax.reload();
                                $('#new_overtime_request_data_table').DataTable().ajax.reload();
                                $('#overtime_verified_data_table').DataTable().ajax.reload();
                                
                               showToast('success', response.message);       
                            },
                            error: function(xhr, status, error) {
                                showToast("error", "Error save item.");
                                console.log(xhr.responseText);
                                console.log(status);
                                console.log(error);
                            }
                        });  
                      // }                
                 });





</script>

