

                                       <!-- --- discription ---- -->
                                       <div id="company_structure_table_top" class="reviewBlock">
                            <div class="ant-card ant-card-bordered ant-card-small" style="width: 100%;">
            
                                <div class="ant-card-head">
                            
                                    <div class="name">
                                         New Travel Request
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
                            <table id="new_travel_request_data_table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Transportation means</th>
                                    <th>To</th>
                                    <th>Travel Date</th>
                                    <th>Return Date</th>

                                    
                                    <th style="width:200px;text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                   
                                    
                                    
                                </tr>
                                
                            
                            </tbody>
                            </table>
                            <!-- ./ for loading CompanyStructure DataTable -->
                
      
        
    
   <!-- modal employement -->
   <div class="modal fade data-table-modal" id="new_travel_request_data_table_modal" data-bs-backdrop="static">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">New Traval Request</h4>
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

                        <select name="employee_newtravel_request_employee_id"  id="employee_newtravel_request_employee_id"class="form-control select2" >
                                  

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
                      <input type="date" class="form-control" id="employee_newtravel_request_date_of_request" name="employee_newtravel_request_date_of_request">
                      </input>
                      </div>
                    </div>
                     
                      <!--one field  text field---- -->
                    <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Transportation Means</label>
                      </div>
                      <div class="col-8">
                        <select name="employee_newtravel_request_means_of_transportation_id"  id="employee_newtravel_request_means_of_transportation_id"class="form-control select2" >
                        <option value="" >Select transportation Mean</option>
                                    <?php
                                                        if (isset($transportation_means)):
                                                                foreach ($transportation_means as $row):
                                                                    $transportaion_means = $row->transportaion_means;
                                                                    $id = $row->id;
                                                                            
                                                    ?>
                                                                <option value="<?php echo $id; ?>" >
                                                                    <?php echo $transportaion_means; ?>
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
                        <label for="recipient-name" class="col-form-label required">Travel Purpose</label>
                      </div>
                      <div class="col-8">
                        <textarea name="employee_newtravel_request_purpose_of_travel"  id="employee_newtravel_request_purpose_of_travel"class="form-control ">
                        </textarea>
                      </div>
                    </div>
                  <!-- ./ one field ---- -->                              
                      <!--one field  text field---- -->
                    <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Travel From</label>
                      </div>
                      <div class="col-8">
                             <input type="text" class="form-control" id="employee_newtravel_request_travel_from_place" name="employee_newtravel_request_travel_from_place">
                      </div>
                    </div>
                  <!-- ./ one field ---- -->                              
                      <!--one field  text field---- -->
                    <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Travel To</label>
                      </div>
                      <div class="col-8">
                             <input type="text" class="form-control" id="employee_newtravel_request_travel_to_place" name="employee_newtravel_request_travel_to_place">
                      </div>
                    </div>
                  <!-- ./ one field ---- -->                              
                 <!--one field  text field---- -->
                     <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Travel Date</label>
                      </div>
                      <div class="col-8">
                      <input type="date" class="form-control" id="employee_newtravel_request_travel_date" name="employee_newtravel_request_travel_date">
                      </input>
                      </div>
                    </div>
                     
                      <!--one field  text field---- -->
                 <!--one field  text field---- -->
                     <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Return Date</label>
                      </div>
                      <div class="col-8">
                      <input type="date" class="form-control" id="employee_newtravel_request_return_date" name="employee_newtravel_request_return_date">
                      </input>
                      </div>
                    </div>
                     
                <!--one field  text field---- -->
                  <!--one field  text field---- -->
                  <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Notes</label>
                      </div>
                      <div class="col-8">
                        <textarea name="employee_newtravel_request_travel_notes"  id="employee_newtravel_request_travel_notes"class="form-control ">
                        </textarea>
                      </div>
                    </div>
                  <!-- ./ one field ---- -->                              
                  <!--one field  text field---- -->
                  <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Estimate Cost</label>
                      </div>
                      <div class="col-8">
                        <input type="text" name="employee_newtravel_request_estimated_cost"  id="employee_newtravel_request_estimated_cost"class="form-control ">
                        </input>
                      </div>
                    </div>
                  <!-- ./ one field ---- -->    
                  <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Request Status</label>
                      </div>
                      <div class="col-8">
                        <select name="employee_newtravel_request_travel_request_status_id" id="employee_newtravel_request_travel_request_status_id" class="form-control select2" >
                                            <?php
                                                                if (isset($travel_request)):
                                                                        foreach ($travel_request as $row):
                                                                            $travel_request = $row->travel_request_status;
                                                                            $id = $row->id;
                                                                                    
                                                            ?>
                                                                        <option value="<?php echo $id; ?>" >
                                                                            <?php echo $travel_request; ?>
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
                        <input type="text" name="employee_newtravel_request_rejection_reason"  id="employee_newtravel_request_rejection_reason"class="form-control ">
                        </input>
                      </div>
                    </div>
                  <!-- ./ one field ---- -->                                                  
                  <input type="hidden" name="hidden_employee_travel_request_employee_name" id="hidden_employee_travel_request_employee_name" value="0">                                                

                </form>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default cancelbtn" id="btn_employment_status_cancel" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn savebtn" id="btn_travel_new_request_save"><i class="fas fa-calendar-check"></i>Save</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
     <!-- /.modal for company department-->


     
     <!-- Modal for selecting job title -->
<div class="modal filtering_modal data-table-modal" id="new_travel_request_data_table_filter_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Filter</h5>
              
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form action="#">
                <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label"> Name</label>
                      </div>
                      <div class="col-8">
                      <select id="traveling_request_status_employee_name_for_filtering" class="form-control select2">
                          <option value="0">Not Applicable</option>
                      </select>
                        </div>
                  </div>
             
              
                <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label">Means</label>
                      </div>
                      <div class="col-8">
                        <select name="traveling_request_status_traveling_means_for_filtering"  id="traveling_request_status_traveling_means_for_filtering" class="form-control select2" >
                            <option value="0">Not Applicable</option>
                            <?php
                               if (isset($transportation_means)):
                                  foreach ($transportation_means as $row):
                                     $transportaion_means = $row->transportaion_means;
                                      $id = $row->id;
                                      ?>
                                      <option value="<?php echo $id; ?>" ><?php echo $transportaion_means; ?> </option>
                                                    <?php
                                                                endforeach;
                                                        endif;
                                        ?> 
                        </select>
                     </div>
               </div>

              </form>
            </div>
            <div class="modal-footer">
                <button id="traveling_request_filter_save_btn" class="btn filter_save_btn btn">Apply Filter</button>
            </div>
        </div>
    </div>
</div>

<!-- modal end  -->


<script>
  var BASE_URL = "<?php echo base_url(); ?>";
 var hrController = "<?php echo CONTROLLER_HR; ?>";
 var token = "<?php echo $_SESSION['li_token']; ?>";
 // load job item data table
function loadDataTableForNewTravelRequest(){
    $('#new_travel_request_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" +  hrController + "/get_new_travel_request",
            "dataSrc": "data"
        },
            "columns": [
            { data: "employee_name"},
            { data: "transportaion_means" },
            { data: "travel_to_place" },
            { data: "travel_date" },
            { data: "return_date" },
            {
                data: "id",
                render: function (data, type, full, row) {
                    var id = full.id;
                    return `
                        <div class="operations">
                           
                            <a href="#" class="view" onclick="travelNewRequestViewRow(${id});"><i class="fas fa-eye"></i>View</a>
                        </div>`;
                }
            }
        ],


        "initComplete": function(settings, json) {
            customizeDataTable('new_travel_request_data_table');
            $("#new_travel_request_data_table_add_new").hide();
        }
    });
   
}
// ./load job item data table

// view and edit 


function travelNewRequestViewRow(row_id) {
    $("#row_id").val(row_id);
     flag_id=$("#flag_id").val("1");
   
 

   $.ajax({
       url: BASE_URL + "index.php/" + hrController + "/get_travel_new_request_by_id",
       type: "POST",
       data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val()},
       dataType: "json",
       success: function (response) {
           // console.log(response is ,response);
           if (response.success) {
               $("#employee_newtravel_request_employee_id").val(response.data.employee_id);
               $("#employee_newtravel_request_date_of_request").val(response.data.date_of_request);
               $("#employee_newtravel_request_means_of_transportation_id").val(response.data.means_of_transportation_id);
               $("#employee_newtravel_request_purpose_of_travel").val(response.data.purpose_of_travel);
               $("#employee_newtravel_request_travel_from_place").val(response.data.travel_from_place);
               $("#employee_newtravel_request_travel_to_place").val(response.data.travel_to_place);
               $("#employee_newtravel_request_travel_date").val(response.data.travel_date);
               $("#employee_newtravel_request_return_date").val(response.data.return_date);
               $("#employee_newtravel_request_travel_notes").val(response.data.notes);
               $("#employee_newtravel_request_estimated_cost").val(response.data.estimated_cost);
               $("#employee_newtravel_request_travel_request_status_id").val(response.data.travel_request_status_id).trigger('change');
               var travel_verified_hid_emp_id=$("#hidden_employee_travel_request_employee_name").val(response.data.employee_id);
               $("#new_travel_request_data_table_modal").modal("show");
               var disable_employee_travel_new_request = $("#employee_newtravel_request_employee_id, #employee_newtravel_request_date_of_request, #employee_newtravel_request_means_of_transportation_id,#employee_newtravel_request_purpose_of_travel,#employee_newtravel_request_travel_from_place,#employee_newtravel_request_travel_to_place,#employee_newtravel_request_travel_date,#employee_newtravel_request_return_date,#employee_newtravel_request_travel_notes,#employee_newtravel_request_estimated_cost");
               disable_employee_travel_new_request.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                // Show the .modal-footer when the modal is hidden
                $("#new_travel_request_data_table_modal").on("hidden.bs.modal", function () 
                {
                    disable_employee_travel_new_request.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
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
$("#btn_travel_new_request_save").on("click",function() {  
  if ($('#new_request_status_modal_form').valid()) {
          var formData  = new FormData();
          formData.append('employee_newtravel_request_travel_request_status_id', $("#employee_newtravel_request_travel_request_status_id").val());
          formData.append('employee_newtravel_request_rejection_reason', $("#employee_newtravel_request_rejection_reason").val());
          formData.append('row_id', $("#row_id").val()); 
          formData.append('flag_id', $("#flag_id").val()); 
          formData.append('li_token', token); 
            $.ajax({
                     url: BASE_URL + "index.php/" + hrController + "/save_new_travel_request",
                     type: 'POST',
                     data:  formData,
                     dataType: "JSON",
                     processData: false,
                     contentType: false,
                        success: function(response) {
                              console.log("response",response);
                               console.log(response.message);
                               $('#new_travel_request_data_table_modal').modal('hide');
                               $('#travel_status_data_table').DataTable().ajax.reload();
                                $('#travel_verified_data_table').DataTable().ajax.reload();
                                $('#new_travel_request_data_table').DataTable().ajax.reload();
                                $('#travel_approved_data_table').DataTable().ajax.reload();
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
$("#employee_newtravel_request_travel_request_status_id").change(function() {
    hideRejectReasonInNewRequest();
});

function hideRejectReasonInNewRequest(){
    if ($("#employee_newtravel_request_travel_request_status_id").val() == '4') {
        // If the selected value is '4', show the parent div
        $("#employee_newtravel_request_rejection_reason").closest(".form-group.row").show();
    } else {
        // If the selected value is not '4', hide the parent div
        $("#employee_newtravel_request_rejection_reason").closest(".form-group.row").hide();
    }
}


$(document).ready(function () {
  $('#new_request_status_modal_form').validate({
    rules: {
      employee_newtravel_request_travel_request_status_id: {
         required: true,
         }
    },
    messages: {
      employee_newtravel_request_travel_request_status_id: "Please select a status",
    
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




$("#traveling_request_filter_save_btn").on("click", function () {
    var new_travel_request_employee_name_filter_val = $("#traveling_request_status_employee_name_for_filtering").val();
    var new_travel_request_means_filter_val = $("#traveling_request_status_traveling_means_for_filtering").val();
    var new_travel_request_employee_name_filter_text = $("#traveling_request_status_employee_name_for_filtering option:selected").text();
    var new_travel_request_means_filter_text = $("#traveling_request_status_traveling_means_for_filtering option:selected").text();

    var table_new_travel_request = $('#new_travel_request_data_table').DataTable();

    // Clear all filters
    table_new_travel_request.columns().search('');

    if (new_travel_request_employee_name_filter_val != "0") {
      
      table_new_travel_request.column(0).search(new_travel_request_employee_name_filter_text);
    }
     if (new_travel_request_means_filter_val != "0") {
      
      table_new_travel_request.column(1).search(new_travel_request_means_filter_text);
    }

    table_new_travel_request.draw();

    var filterNewTravelText = ''; // Default text
    if (new_travel_request_employee_name_filter_val != "0" && new_travel_request_means_filter_val != "0") {
      filterNewTravelText = 'Employee Name: ' + new_travel_request_employee_name_filter_text + ' & ' + 'Means of transportation: '+new_travel_request_means_filter_text;
    }
     else if (new_travel_request_employee_name_filter_val != "0") {
      filterNewTravelText = 'Employee Name: ' + new_travel_request_employee_name_filter_text;
    } 
    else if (new_travel_request_means_filter_val != "0") {
      filterNewTravelText = 'Means of transportation: ' + new_travel_request_means_filter_text;
    }
    var resetFilterNewTravelText = filterNewTravelText+'<span class="icon"><i class="fa fa-times"></i></span>';
    $('#new_travel_request_data_table_reset_filter').html(resetFilterNewTravelText);
    
    // Use a single conditional statement to show or hide the button
    if (new_travel_request_employee_name_filter_val == "0" && new_travel_request_means_filter_val == "0") {
        $("#new_travel_request_data_table_reset_filter").hide();
    } else {
        $("#new_travel_request_data_table_reset_filter").show();
    }

    $("#new_travel_request_data_table_filter_modal").modal("hide");
});


$('#new_travel_request_data_table_filter_modal,#new_travel_request_data_table_modal').on('shown.bs.modal', function () {
    // get option  in travel master
    $travel_verified_hid_emp_id=$("#hidden_employee_travel_request_employee_name").val();

    $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/get_travel_employee_name_option",
            type: 'GET',
            dataType: "json",
            success: function(data) {
              $('#traveling_request_status_employee_name_for_filtering,#employee_newtravel_request_employee_id').empty();

                // Update the modal content with the fetched data
                if($("#flag_id").val()=='0')
                {
                 
                $('#traveling_request_status_employee_name_for_filtering').html('<option value="0">Not Applicable</option>');
                }
                $.each(data, function (index, travel_employee_name) {
                    $('#traveling_request_status_employee_name_for_filtering,#employee_newtravel_request_employee_id').append('<option value="' + travel_employee_name.id + '">' + travel_employee_name.employee_name + '</option>');
                });
                if($("#flag_id").val()=='1'){
                  $("#employee_newtravel_request_employee_id").val(travel_verified_hid_emp_id);
                }
                
            },
            error: function(error) {
                console.log('Error fetching content:', error);
                // If there's an error, still display the default "Select Leader" option
                // $('#employee_newtravel_request_employee_id').html('<option value="0">Select employee name</option>');
                $('#traveling_request_status_employee_name_for_filtering').html('<option value="0">Not Applicable</option>');
            }
        });
    // get option  in travel master
    });
</script>

