
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overtime Verified</title>
</head>

<body>
   
            
                        <!--for loading CompanyStructure DataTable -->
                            <table id="overtime_verified_data_table" class="table table-striped">
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
                            <!-- ./ for loading CompanyStructure DataTable -->
                

       
    
    
 <!-- modal  -->
 <div class="modal fade data-table-modal" id="overtime_verified_modal" data-bs-backdrop="static">
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
                     <select class="form-control select2" id="overtime_verified_employee_id" name="overtime_verified_employee_id">
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
                      <input type="date" class="form-control" id="overtime_verified_date_of_request" name="overtime_verified_date_of_request">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->  
                  
                     
                    
                     
                      <!--one field  text field---- -->
                  <div class="form-group row">
                    <div class="col-3">
                      <label for="recipient-name" class="col-form-label required">Overtime Date </label>
                    </div>
                    <div class="col-8">
                      <input type="date" class="form-control" id="overtime_verified_date" name="overtime_verified_date">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->   

                 

                        
                        <!--one field  text field---- -->
                        <div class="form-group row">
                            <div class="col-3">
                            <label for="leave_from_time" class="col-form-label required">Overtime From</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control select2" id="overtime_verified_time_from" name="overtime_verified_time_from">
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
                    
                      <select class="form-control select2" id="overtime_verified_time_to" name="overtime_time_to">
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
                        <input type="text"  name="verified_hours_worked"  id="verified_hours_worked"  class="form-control">
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
                      <select class="form-control select2" id="verified_overtime_category_id" name="verified_overtime_category_id">
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
                        <input type="text"  name="verified_overtime_rate"  id="verified_overtime_rate"  class="form-control">
                        </input>
                      </div>
                    </div>
                  <!-- ./ one field ---- -->  
                  
                  <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Actual Rate per hour</label>
                      </div>
                      <div class="col-8">
                        <input type="text"  name="verified_overtime_rate_per_hour"  id="verified_overtime_rate_per_hour"  class="form-control">
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
                        <input type="text"  name="verified_overtime_amount"  id="verified_overtime_amount"  class="form-control">
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
                        <input type="text"  name="verified_overtime_remarks"  id="verified_overtime_remarks"  class="form-control">
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
                    
                    <select class="form-control" id="verified_overtime_request_status_id" name="verified_overtime_request_status_id">
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
                        <textarea name="verified_overtime_rejection_reason"  id="verified_overtime_rejection_reason"class="form-control ">
                        </textarea>
                      </div>
                    </div>
                  <!-- ./ one field ---- -->  
                 
               
              </form>
            
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default cancelbtn" id="btn_pay_scales_cancel" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn savebtn" id="btn_verified_overtime_save"><i class="fas fa-calendar-check"></i>Save</button>
            </div>
          </div>
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
    $("#verified_overtime_rejection_reason").closest(".form-group.row").hide();

    $('#overtime_verified_data_table').DataTable({
    
   
   "ajax": {
     "url": BASE_URL + "index.php/" +  hrController + "/get_overtime_verified_details",
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
               
                  <a href="#" class="view" onclick="viewOvertimeVerified('${data}');"><i class="fas fa-eye" ></i>View</a>
                
                  </div>`;
           }
       }
   ],
  
     "initComplete": function(settings, json) {
       customizeDataTable('overtime_verified_data_table');
   }

});

    });

 
function viewOvertimeVerified(row_id) {
    $("#row_id").val(row_id);
    flag_id=$("#flag_id").val("1");
    $('#overtime_verified_modal').modal('show')
   $.ajax({
       url: BASE_URL + "index.php/" + hrController + "/get_overtime_verified_by_id",
       type: "POST",
       data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val()},
       dataType: "json",
       success: function (response) {
           console.log("response is verified is " ,response);
           if (response.success) {
           var newOvertimeTimeFrom = moment(response.data.overtime_time_from, 'HH:mm:ss').format('HH:mm');
                 // alert(overtimeTimeFrom);
                 var newOvertimeTimeTo = moment(response.data.overtime_time_to, 'HH:mm:ss').format('HH:mm');
                //  alert(overtimeTimeTo);
                
                 $("#overtime_verified_time_from").val(newOvertimeTimeFrom).trigger('change');

               
                 $("#overtime_verified_time_to").val(newOvertimeTimeTo).trigger('change');

              $("#overtime_verified_employee_id").val(response.data.employee_id).trigger('change');
              $("#overtime_verified_date_of_request").val(response.data.date_of_request);
              $("#verified_overtime_category_id").val(response.data.overtime_category_id).trigger('change');
              $("#overtime_verified_date").val(response.data.overtime_date);
         
              $("#verified_hours_worked").val(response.data.hours_worked);
              $("#verified_overtime_rate").val(response.data.overtime_rate);
              $("#verified_overtime_amount").val(response.data.overtime_amount);
              $("#verified_overtime_remarks").val(response.data.remarks);
              $("#verified_overtime_request_status_id").val(response.data.overtime_request_status_id).trigger('change');;

              var disable_new_request = $("#overtime_new_reuest_employee_id, #overtime_new_date_of_request,new_overtime_time_from,new_overtime_time_to, #overtime_new_date,#new_hours_worked,#new_overtime_category_id,#new_overtime_rate,#new_rate_per_hour,#new_overtime_amount,#new_overtime_remarks");
              disable_new_request.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                // Show the .modal-footer when the modal is hidden
              $("#new_request_overtime_modal").on("hidden.bs.modal", function () 
                {
                  disable_new_request.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
                });
            
           } 
           else {
               alert("Failed to fetch item.");
           }
       },
       error: function (xhr, status, error) {
           alert("Error fetching item.");
       }
   });
}

$("#btn_verified_overtime_save").on("click",function() {  
  // if ($('#new_request_status_modal_form').valid()) {
          var formData  = new FormData();
          formData.append('verified_overtime_request_status_id', $("#verified_overtime_request_status_id").val());
          formData.append('verified_overtime_rejection_reason', $("#verified_overtime_rejection_reason").val());
          formData.append('row_id', $("#row_id").val()); 
          formData.append('flag_id', $("#flag_id").val()); 
          formData.append('li_token', token); 
            $.ajax({
                     url: BASE_URL + "index.php/" + hrController + "/save_overtime_verified",
                     type: 'POST',
                     data:  formData,
                     dataType: "JSON",
                     processData: false,
                     contentType: false,
                        success: function(response) {
                              console.log("response",response);
                               console.log(response.message);
                               $('#overtime_verified_modal').modal('hide');
                               $('#new_overtime_request_data_table').DataTable().ajax.reload();
                               $('#emp_overtime_request_data_table').DataTable().ajax.reload();
                               $('#overtime_verified_data_table').DataTable().ajax.reload();
                                $('#overtime_approved_data_table').DataTable().ajax.reload();
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


                 $("#verified_overtime_request_status_id").change(function() {
   hideRejectReasonInLeaveVerified();
  // alert("hai");
});


function hideRejectReasonInLeaveVerified(){
     if ($("#verified_overtime_request_status_id").val() == '4') {
         // If the selected value is '4', show the parent div
        $("#verified_overtime_rejection_reason").closest(".form-group.row").show();
     } else {
        // If the selected value is not '4', hide the parent div
      $("#verified_overtime_rejection_reason").closest(".form-group.row").hide();
     }
}


</script>

