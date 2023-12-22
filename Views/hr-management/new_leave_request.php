

                                       <!-- --- discription ---- -->
                                       <div id="company_structure_table_top" class="reviewBlock">
                                             <div class="ant-card ant-card-bordered ant-card-small" style="width: 100%;">
                                                  <div class="ant-card-head">
                                                    <div class="name">
                                                              New Leave Request
                                                     </div>
                                                    <div class="moreinfo">
                                                       <a href="#">More Info</a>
                                                    </div>
                                                  </div>
                                                <div class="ant-card-body">
                                                    <div class="ant-card-meta">
                                                          <div class="ant-card-meta-detail">
                                                             <div class="ant-card-meta-description">
                                                                  Here you can manage the job titles in your organisation . Each employee needs to assigned a job title.
                                                            </div>
                                                          </div>
                                                     </div>
                                                </div>
                                             </div>
                                        </div>
                            <!-- --- ./discription ---- -->
            
                        <!--for loading CompanyStructure DataTable -->
                            <table id="new_leave_request_data_table" class="table table-striped">
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
                                    <th style="width:180px;text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                   
                                    
                                    
                                </tr>
                                
                            
                            </tbody>
                            </table>
                            <!-- ./ for loading CompanyStructure DataTable -->
                
      
        
    
   <!-- modal employement -->
   <div class="modal fade data-table-modal" id="new_leave_request_data_table_modal" data-bs-backdrop="static">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">New Leave Request</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="new_request_status_modal_form" class="modal_form">
                      <!--one field  text field---- -->
                    <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Employee Name</label>
                      </div>
                      <div class="col-8">

                        <select name="employee_new_leave_request_employee_id"  id="employee_new_leave_request_employee_id"class="form-control select2" >
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
                        <label for="recipient-name" class="col-form-label required">Request Date</label>
                      </div>
                      <div class="col-8">
                      <input type="date" class="form-control" id="employee_new_leave_request_date_of_request" name="employee_new_leave_request_date_of_request">
                      </input>
                      </div>
                    </div>
                     
                      <!--one field  text field---- -->
                    <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required"> Leave Category</label>
                      </div>
                      <div class="col-8">
                        <select name="employee_new_leave_request_category"  id="employee_new_leave_request_category"class="form-control select2" >
                        <option value="" >Select category</option>
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
                      <input type="date" class="form-control" id="employee_new_leave_request_leave_from_date" name="employee_new_leave_request">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->   

                      <!--one field  text field---- -->
                      <div class="form-group row">
                            <div class="col-3">
                            <label for="leave_from_time" class="col-form-label required">Leave from Time</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control select2" id="employee_new_leave_request_leave_from_time" name="employee_new_leave_request_leave_from_time">
                                   <option value="" >Select Leave from Time</option>
                                     <?php echo $options24Hour; ?>
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
                      <input type="date" class="form-control" id="employee_new_leave_request_leave_to_date" name="employee_new_leave_request_leave_to_date">
                    </div>
                  </div>
                 <!-- ./ one field ---- -->   


                       <!--one field  text field---- -->
                       <div class="form-group row">
                    <div class="col-3">
                      <label for="education_name" class="col-form-label required">Leave to Time</label>
                    </div>
                    <div class="col-8">
                    
                      <select class="form-control select2" id="employee_new_leave_request_leave_to_time" name="employee_new_leave_request_leave_to_time">
                      <option value="" >Select Leave to Time</option>
                        <?php echo $options24Hour; ?>
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
                        <textarea  name="employee_new_leave_request_reason_for_leave"  id="employee_new_leave_request_reason_for_leave"  class="form-control">
                        </textarea>
                      </div>
                    </div>
                  <!-- ./ one field ---- -->  
                  <!-- ./ one field ---- -->    
                    <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Request Status</label>
                      </div>
                      <div class="col-8">
                        <select name="new_leave_request_status_id" id="new_leave_request_status_id" class="form-control select2" >
                                            <?php
                                                                if (isset($new_leave_request)):
                                                                        foreach ($new_leave_request as $row):
                                                                            $leave_request_status = $row->leave_request_status;
                                                                            $id = $row->id;
                                                                                    
                                                            ?>
                                                                        <option value="<?php echo $id; ?>" >
                                                                            <?php echo $leave_request_status; ?>
                                                                        </option>
                                                            <?php
                                                                        endforeach;
                                                                endif;
                                                ?> 

                        </select>
                      </div>
                    </div>
                          
                <!--one field  text field---- --> 

                <!--one field  text field---- -->
                <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Rejection Reason</label>
                      </div>
                      <div class="col-8">
                        <textarea name="new_leave_request_rejection_reason"  id="new_leave_request_rejection_reason"class="form-control ">
                        </textarea>
                      </div>
                    </div>
                  <!-- ./ one field ---- -->  

                </form>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default cancelbtn" id="btn_new_requesat_leave_cancel" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn savebtn" id="btn_new_request_leave_save"><i class="fas fa-calendar-check"></i>Save</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
     <!-- /.modal for company department-->


 


<script>
  var BASE_URL = "<?php echo base_url(); ?>";
 var hrController = "<?php echo CONTROLLER_HR; ?>";
 var token = "<?php echo $_SESSION['li_token']; ?>";
 // load job item data table
 $(document).ready(function() {
// function loadDataTableForNewLeaveRequest(){
    $('#new_leave_request_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" +  hrController + "/get_new_leave_register_request",
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
            {
                data: "id",
                render: function (data, type, full, row) {
                    var id = full.id;
                    return `
                        <div class="operations">
                           
                            <a href="#" class="view" onclick="NewLeaveViewRow(${id});"><i class="fas fa-eye"></i>View</a>
                        </div>`;
                }
            }
        ],


        "initComplete": function(settings, json) {
            customizeDataTable('new_leave_request_data_table');
            $("#new_leave_request_data_table_add_new").hide();
        }
    });
   
// }
 });
// ./load job item data table

// view and edit 


function NewLeaveViewRow(row_id) {
    $("#row_id").val(row_id);
     flag_id=$("#flag_id").val("1");
   $.ajax({
       url: BASE_URL + "index.php/" + hrController + "/get_leave_new_request_by_id",
       type: "POST",
       data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val()},
       dataType: "json",
       success: function (response) {
           // console.log(response is ,response);
           if (response.success) {
            var leavefromtime = moment(response.data.leave_from_time, 'HH:mm:ss').format('HH:mm');
            var leavetotime = moment(response.data.leave_to_time, 'HH:mm:ss').format('HH:mm');
            
            $("#employee_new_leave_request_employee_id").val(response.data.employee_id).trigger('change');
            $("#employee_new_leave_request_date_of_request").val(response.data.requested_date);
            $("#employee_new_leave_request_category").val(response.data.leave_category_id).trigger('change');
            $("#employee_new_leave_request_leave_from_date").val(response.data.leave_from_date);
            $("#employee_new_leave_request_leave_from_time").val(leavefromtime).trigger('change'); // Use leave_from_time directly
            $("#employee_new_leave_request_leave_to_date").val(response.data.leave_to_date);
            $("#employee_new_leave_request_leave_to_time").val(leavetotime).trigger('change');
            $("#employee_new_leave_request_reason_for_leave").val(response.data.reason_for_leave);
              //  var travel_verified_hid_emp_id=$("#hidden_employee_travel_request_employee_name").val(response.data.employee_id);
               $("#new_leave_request_data_table_modal").modal("show");
               var disable_employee_leave_new_request = $("#employee_new_leave_request_employee_id, #employee_new_leave_request_date_of_request, #employee_new_leave_request_category,#employee_new_leave_request_leave_from_date,#employee_new_leave_request_leave_from_time,#employee_new_leave_request_leave_to_date,#employee_new_leave_request_leave_to_time,#employee_new_leave_request_reason_for_leave");
               disable_employee_leave_new_request.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                // Show the .modal-footer when the modal is hidden
                $("#new_leave_request_data_table_modal").on("hidden.bs.modal", function () 
                {
                  disable_employee_leave_new_request.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
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
// ./ edit button

// click
    
    //save
$("#btn_new_request_leave_save").on("click",function() {  
  // if ($('#new_request_status_modal_form').valid()) {
          var formData  = new FormData();
          formData.append('new_leave_request_status_id', $("#new_leave_request_status_id").val());
          formData.append('new_leave_request_rejection_reason', $("#new_leave_request_rejection_reason").val());
          formData.append('row_id', $("#row_id").val()); 
          formData.append('flag_id', $("#flag_id").val()); 
          formData.append('li_token', token); 
            $.ajax({
                     url: BASE_URL + "index.php/" + hrController + "/save_new_leave_request",
                     type: 'POST',
                     data:  formData,
                     dataType: "JSON",
                     processData: false,
                     contentType: false,
                        success: function(response) {
                              console.log("response",response);
                               console.log(response.message);
                               $('#new_leave_request_data_table_modal').modal('hide');
                               $('#new_request_data_table').DataTable().ajax.reload();
                               $('#new_leave_request_data_table').DataTable().ajax.reload();
                               $('#verified_leave_data_table').DataTable().ajax.reload();
                               $('#approved_leave_data_table').DataTable().ajax.reload();
                                
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
$("#new_leave_request_status_id").change(function() {
   hideRejectReasonInLeaveNewRequest();
  // alert("hai");
});

function hideRejectReasonInLeaveNewRequest(){
     if ($("#new_leave_request_status_id").val() == '4') {
         // If the selected value is '4', show the parent div
        $("#new_leave_request_rejection_reason").closest(".form-group.row").show();
     } else {
        // If the selected value is not '4', hide the parent div
      $("#new_leave_request_rejection_reason").closest(".form-group.row").hide();
     }
}


// $(document).ready(function () {
//   $('#new_request_leave_status_modal_form').validate({
//     rules: {
//       new_leave_request_status_id: {
//          required: true,
//          }
//     },
//     messages: {
//       new_leave_request_status_id: "Please select a status",
    
//               },
//     errorElement: 'span',
//     errorPlacement: function (error, element) {
//     error.addClass('invalid-feedback');
//      element.closest('.form-group').append(error);
//     },
//     highlight: function (element, errorClass, validClass) {
//      $(element).addClass('is-invalid');
//     },
//      unhighlight: function (element, errorClass, validClass) {
//         $(element).removeClass('is-invalid');
//      }
// })
// });




$("#traveling_request_filter_save_btn").on("click", function () {
    var new_leave_request_employee_name_filter_val = $("#traveling_request_status_employee_name_for_filtering").val();
    var new_leave_request_means_filter_val = $("#traveling_request_status_traveling_means_for_filtering").val();
    var new_leave_request_employee_name_filter_text = $("#traveling_request_status_employee_name_for_filtering option:selected").text();
    var new_leave_request_means_filter_text = $("#traveling_request_status_traveling_means_for_filtering option:selected").text();

    var table_new_leave_request = $('#new_leave_request_data_table').DataTable();

    // Clear all filters
    table_new_leave_request.columns().search('');

    if (new_leave_request_employee_name_filter_val != "0") {
      
      table_new_leave_request.column(0).search(new_leave_request_employee_name_filter_text);
    }
     if (new_leave_request_means_filter_val != "0") {
      
      table_new_leave_request.column(1).search(new_leave_request_means_filter_text);
    }

    table_new_leave_request.draw();

    var filterNewTravelText = ''; // Default text
    if (new_leave_request_employee_name_filter_val != "0" && new_leave_request_means_filter_val != "0") {
      filterNewTravelText = 'Employee Name: ' + new_leave_request_employee_name_filter_text + ' & ' + 'Means of transportation: '+new_leave_request_means_filter_text;
    }
     else if (new_leave_request_employee_name_filter_val != "0") {
      filterNewTravelText = 'Employee Name: ' + new_leave_request_employee_name_filter_text;
    } 
    else if (new_leave_request_means_filter_val != "0") {
      filterNewTravelText = 'Means of transportation: ' + new_leave_request_means_filter_text;
    }
    var resetFilterNewTravelText = filterNewTravelText+'<span class="icon"><i class="fa fa-times"></i></span>';
    $('#new_leave_request_data_table_reset_filter').html(resetFilterNewTravelText);
    
    // Use a single conditional statement to show or hide the button
    if (new_leave_request_employee_name_filter_val == "0" && new_leave_request_means_filter_val == "0") {
        $("#new_leave_request_data_table_reset_filter").hide();
    } else {
        $("#new_leave_request_data_table_reset_filter").show();
    }

    $("#new_leave_request_data_table_filter_modal").modal("hide");
});








</script>

