                 
            
                        <!--for loading CompanyStructure DataTable -->
                            <table id="travel_verified_data_table" class="table table-striped">
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
   <div class="modal fade data-table-modal" id="travel_verified_data_table_modal" data-bs-backdrop="static">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title"> Traval Verified</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="travel_verified_data_modal_form" class="modal_form">
                      <!--one field  text field---- -->
                    <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Employee Name</label>
                      </div>
                      <div class="col-8">

                        <select name="employee_travel_verified_employee_id"  id="employee_travel_verified_employee_id"class="form-control select2" >
                                   

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
                      <input type="date" class="form-control" id="employee_travel_verified_date_of_request" name="employee_travel_verified_date_of_request">
                      </input>
                      </div>
                    </div>
                     
                      <!--one field  text field---- -->
                    <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Transportation Means</label>
                      </div>
                      <div class="col-8">
                        <select name="employee_travel_verified_means_of_transportation_id"  id="employee_travel_verified_means_of_transportation_id"class="form-control select2" >
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
                        <textarea name="employee_travel_verified_purpose_of_travel"  id="employee_travel_verified_purpose_of_travel"class="form-control ">
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
                             <input type="text" class="form-control" id="employee_travel_verified_travel_from_place" name="employee_travel_verified_travel_from_place">
                      </div>
                    </div>
                  <!-- ./ one field ---- -->                              
                      <!--one field  text field---- -->
                    <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Travel To</label>
                      </div>
                      <div class="col-8">
                             <input type="text" class="form-control" id="employee_travel_verified_travel_to_place" name="employee_travel_verified_travel_to_place">
                      </div>
                    </div>
                  <!-- ./ one field ---- -->                              
                 <!--one field  text field---- -->
                     <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Travel Date</label>
                      </div>
                      <div class="col-8">
                      <input type="date" class="form-control" id="employee_travel_verified_travel_date" name="employee_travel_verified_travel_date">
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
                      <input type="date" class="form-control" id="employee_travel_verified_return_date" name="employee_travel_verified_return_date">
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
                        <textarea name="employee_travel_verified_travel_notes"  id="employee_travel_verified_travel_notes"class="form-control ">
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
                        <input type="text" name="employee_travel_verified_estimated_cost"  id="employee_travel_verified_estimated_cost"class="form-control ">
                        </input>
                      </div>
                    </div>
                  <!-- ./ one field ---- -->    
                  <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Request Status</label>
                      </div>
                      <div class="col-8">
                        <select name="employee_travel_verified_travel_request_status_id" id="employee_travel_verified_travel_request_status_id" class="form-control select2" >
                                            <?php
                                                                if (isset($travel_verified_request)):
                                                                        foreach ($travel_verified_request as $row):
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
                        <input type="text" name="employee_travel_verified_rejection_reason"  id="employee_travel_verified_rejection_reason"class="form-control ">
                        </input>
                      </div>
                    </div>
                  <!-- ./ one field ---- -->      
                  <input type="hidden" name="hidden_employee_travel_verified_employee_names" id="hidden_employee_travel_verified_employee_names" value="0">                                                
                </form>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default cancelbtn" id="btn_employment_status_cancel" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn savebtn" id="btn_travel_verified_save"><i class="fas fa-calendar-check"></i>Save</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
     <!-- /.modal for company department-->



         <!-- Modal for selecting job title -->
<div class="modal filtering_modal data-table-modal" id="travel_verified_data_table_filter_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Travel Verified Filter</h5>
              
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form action="#">
                <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label"> Name</label>
                      </div>
                      <div class="col-8">
                      <select id="traveling_verified_employee_name_for_filtering" class="form-control select2">
                          
                      </select>
                        </div>
                  </div>
             
              
                <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label">Means</label>
                      </div>
                      <div class="col-8">
                        <select name="traveling_verified_traveling_means_for_filtering"  id="traveling_verified_traveling_means_for_filtering" class="form-control select2" >
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
                <button id="traveling_verified_filter_save_btn" class="btn filter_save_btn btn">Apply Filter</button>
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
function loadDataTableForTravelRequestVerified(){
    $('#travel_verified_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" +  hrController + "/get_travel_verified_details",
            "dataSrc": "data"
        },
            "columns": [
            { data: "employee_name" },
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
                            <?php if($verified_view=='yes'): ?>
                            <a href="#" class="view" onclick="travelVerifiedViewRow(${id});"><i class="fas fa-eye"></i>View</a>
                             <?php endif; ?>
                        </div>`;
                }
            }
        ],


        "initComplete": function(settings, json) {
            customizeDataTable('travel_verified_data_table');
            $("#travel_verified_data_table_add_new").hide();
        }
    });
   
}
// ./load job item data table

// view and edit 


function travelVerifiedViewRow(row_id) {
    $("#row_id").val(row_id);
     flag_id=$("#flag_id").val("1");
    
 

   $.ajax({
       url: BASE_URL + "index.php/" + hrController + "/get_travel_verified_by_id",
       type: "POST",
       data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val()},
       dataType: "json",
       success: function (response) {
           // console.log(response is ,response);
           if (response.success) {
              $("#employee_travel_verified_employee_id").val(response.data.employee_id);
               $("#employee_travel_verified_date_of_request").val(response.data.date_of_request);
               $("#employee_travel_verified_means_of_transportation_id").val(response.data.means_of_transportation_id);
               $("#employee_travel_verified_purpose_of_travel").val(response.data.purpose_of_travel);
               $("#employee_travel_verified_travel_from_place").val(response.data.travel_from_place);
               $("#employee_travel_verified_travel_to_place").val(response.data.travel_to_place);
               $("#employee_travel_verified_travel_date").val(response.data.travel_date);
               $("#employee_travel_verified_return_date").val(response.data.return_date);
               $("#employee_travel_verified_travel_notes").val(response.data.notes);
               $("#employee_travel_verified_estimated_cost").val(response.data.estimated_cost);
               $("#employee_travel_verified_travel_request_status_id").val(response.data.travel_request_status_id);
               $("#hidden_employee_travel_verified_employee_names").val(response.data.employee_id);
               
               $("#travel_verified_data_table_modal").modal("show");
               var disable_employee_travel_verified = $("#employee_travel_verified_employee_id, #employee_travel_verified_date_of_request, #employee_travel_verified_means_of_transportation_id,#employee_travel_verified_purpose_of_travel,#employee_travel_verified_travel_from_place,#employee_travel_verified_travel_to_place,#employee_travel_verified_travel_date,#employee_travel_verified_return_date,#employee_travel_verified_travel_notes,#employee_travel_verified_estimated_cost");
               disable_employee_travel_verified.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                // Show the .modal-footer when the modal is hidden
                $("#travel_verified_data_table_modal").on("hidden.bs.modal", function () 
                {
                    disable_employee_travel_verified.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
                });
            
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

// click
    
    //save
$("#btn_travel_verified_save").on("click",function() {  
  if ($('#travel_verified_data_modal_form').valid()) {
          var formData  = new FormData();
          formData.append('employee_travel_verified_travel_request_status_id', $("#employee_travel_verified_travel_request_status_id").val());
          formData.append('employee_travel_verified_rejection_reason', $("#employee_travel_verified_rejection_reason").val());
          formData.append('row_id', $("#row_id").val()); 
          formData.append('flag_id', $("#flag_id").val()); 
          formData.append('li_token', token); 
            $.ajax({
                     url: BASE_URL + "index.php/" + hrController + "/save_travel_verified",
                     type: 'POST',
                     data:  formData,
                     dataType: "JSON",
                     processData: false,
                     contentType: false,
                        success: function(response) {
                              console.log("response",response);
                               console.log(response.message);
                               $('#travel_verified_data_table_modal').modal('hide');
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
// ./ for save the 
// click

// view and edit 

// $("#li_travel_verified_tab").on("click",()=>{
//     loadDataTableForTravelRequestVerified();
// });


function hideRejectReasonInVerifiedRequest(){
    if ($("#employee_travel_verified_travel_request_status_id").val() == '4') {
        // If the selected value is '4', show the parent div
        $("#employee_travel_verified_rejection_reason").closest(".form-group.row").show();
    } else {
        // If the selected value is not '4', hide the parent div
        $("#employee_travel_verified_rejection_reason").closest(".form-group.row").hide();
    }
}

$("#employee_travel_verified_travel_request_status_id").change(function() {
    hideRejectReasonInVerifiedRequest();
});




$(document).ready(function () {
  $('#travel_verified_data_modal_form').validate({
    rules: {
      employee_travel_verified_travel_request_status_id: {
         required: true,
      }
    },
    messages: {
      employee_travel_verified_travel_request_status_id: "Please select a status",
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
  });
});





$("#traveling_verified_filter_save_btn").on("click", function () {
    var travel_verified_employee_name_filter_val = $("#traveling_verified_employee_name_for_filtering").val();
    var travel_verified_means_filter_val = $("#traveling_verified_traveling_means_for_filtering").val();
    var travel_verified_employee_name_filter_text = $("#traveling_verified_employee_name_for_filtering option:selected").text();
    var travel_verified_means_filter_text = $("#traveling_verified_traveling_means_for_filtering option:selected").text();

    var table_verified = $('#travel_verified_data_table').DataTable();

    // Clear all filters
    table_verified.columns().search('');

    if (travel_verified_employee_name_filter_val != "0") {
      
      table_verified.column(0).search(travel_verified_employee_name_filter_text);
    }
     if (travel_verified_means_filter_val != "0") {
      
      table_verified.column(1).search(travel_verified_means_filter_text);
    }

    table_verified.draw();

    var filterVerifiedText = ''; // Default text
    if (travel_verified_employee_name_filter_val != "0" && travel_verified_means_filter_val != "0") {
      filterVerifiedText = 'Employee Name: ' + travel_verified_employee_name_filter_text + ' & ' + 'Means of transportation: '+travel_verified_means_filter_text;
    }
     else if (travel_verified_employee_name_filter_val != "0") {
      filterVerifiedText = 'Employee Name: ' + travel_verified_employee_name_filter_text;
    } 
    else if (travel_verified_means_filter_val != "0") {
      filterVerifiedText = 'Means of transportation: ' + travel_verified_means_filter_text;
    }
    var resetFilterVerifiedText = filterVerifiedText+'<span class="icon"><i class="fa fa-times"></i></span>';
    $('#travel_verified_data_table_reset_filter').html(resetFilterVerifiedText);
    // Use a single conditional statement to show or hide the button
    if (travel_verified_employee_name_filter_val == "0" && travel_verified_means_filter_val == "0") {
        $("#travel_verified_data_table_reset_filter").hide();
    } else {
        $("#travel_verified_data_table_reset_filter").show();
    }

    $("#travel_verified_data_table_filter_modal").modal("hide");
}); 



$('#travel_verified_data_table_filter_modal,#travel_verified_data_table_modal').on('shown.bs.modal', function () {
    // get option  in travel master
    var travel_verified2_hid_emp_id=$("#hidden_employee_travel_verified_employee_names").val();
    $.ajax({
      
            url: BASE_URL + "index.php/" + hrController + "/get_travel_employee_name_option",
            type: 'GET',
            dataType: "json",
            success: function(data) {
              $('#traveling_verified_employee_name_for_filtering,#employee_travel_verified_employee_id').empty();
                // Update the modal content with the fetched data
             
              
                $.each(data, function (index,travel_verified_employee_name) {
                    $('#traveling_verified_employee_name_for_filtering,#employee_travel_verified_employee_id').append('<option value="' + travel_verified_employee_name.employee_id + '">' + travel_verified_employee_name.employee_name + '</option>');
                });
                if($("#flag_id").val()=='1'){
                  $("#employee_travel_verified_employee_id").val(travel_verified2_hid_emp_id);
                }
            },
            error: function(error) {
                console.log('Error fetching content:', error);
                // If there's an error, still display the default "Select Leader" option
            }
        });
    // get option  in travel master
    });



</script>

