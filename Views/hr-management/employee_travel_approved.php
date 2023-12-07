                    
            
                        <!--for loading CompanyStructure DataTable -->
                            <table id="travel_approved_data_table" class="table table-striped">
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
   <div class="modal fade data-table-modal" id="travel_approved_data_table_modal" data-bs-backdrop="static">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title"> Travel Approved</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="employment_status_modal_form" class="modal_form">
                      <!--one field  text field---- -->
                    <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Employee Name</label>
                      </div>
                      <div class="col-8">

                        <select name="employee_travel_approved_employee_id"  id="employee_travel_approved_employee_id" class="form-control select2">            
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
                      <input type="date" class="form-control" id="employee_travel_approved_date_of_request" name="employee_travel_approved_date_of_request">
                      </input>
                      </div>
                    </div>
                     
                      <!--one field  text field---- -->
                    <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Transportation Means</label>
                      </div>
                      <div class="col-8">
                        <select name="employee_travel_approved_means_of_transportation_id"  id="employee_travel_approved_means_of_transportation_id"class="form-control select2" >
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
                        <textarea name="employee_travel_approved_purpose_of_travel"  id="employee_travel_approved_purpose_of_travel"class="form-control ">
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
                             <input type="text" class="form-control" id="employee_travel_approved_travel_from_place" name="employee_travel_approved_travel_from_place">
                      </div>
                    </div>
                  <!-- ./ one field ---- -->                              
                      <!--one field  text field---- -->
                    <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Travel To</label>
                      </div>
                      <div class="col-8">
                             <input type="text" class="form-control" id="employee_travel_approved_travel_to_place" name="employee_travel_approved_travel_to_place">
                      </div>
                    </div>
                  <!-- ./ one field ---- -->                              
                 <!--one field  text field---- -->
                     <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Travel Date</label>
                      </div>
                      <div class="col-8">
                      <input type="date" class="form-control" id="employee_travel_approved_travel_date" name="employee_travel_approved_travel_date">
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
                      <input type="date" class="form-control" id="employee_travel_approved_return_date" name="employee_travel_approved_return_date">
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
                        <textarea name="employee_travel_approved_travel_notes"  id="employee_travel_approved_travel_notes"class="form-control ">
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
                        <input type="text" name="employee_travel_approved_estimated_cost"  id="employee_travel_approved_estimated_cost"class="form-control ">
                        </input>
                      </div>
                    </div>
                       <input type="hidden" name="hid_emp_travel_approved" id="hid_emp_travel_approved" val="0">                                 
                </form>
              </div>
             
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
     <!-- /.modal for company department-->




     
         <!-- Modal for selecting job title -->
<div class="modal filtering_modal data-table-modal" id="travel_approved_data_table_filter_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Travel Approved Filter</h5>
              
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form action="#">
                <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label"> Name</label>
                      </div>
                      <div class="col-8">
                      <select id="traveling_approved_employee_name_for_filtering" class="form-control select2">
                         
                          
                      </select>
                        </div>
                  </div>
             
              
                <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label">Means</label>
                      </div>
                      <div class="col-8">
                        <select name="traveling_approvedtraveling_means_for_filtering"  id="traveling_approved_traveling_means_for_filtering" class="form-control select2" >
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
                <button id="traveling_approved_filter_save_btn" class="btn filter_save_btn btn">Apply Filter</button>
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
function loadDataTableForTravelRequestApproved(){
    $('#travel_approved_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" +  hrController + "/get_travel_approved_details",
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
                           
                            <a href="#" class="view" onclick="travelApprovedViewRow(${id});"><i class="fas fa-eye"></i>View</a>
                        </div>`;
                }
            }
        ],


        "initComplete": function(settings, json) {
            customizeDataTable('travel_approved_data_table');
            $("#travel_approved_data_table_add_new").hide();
        }
    });
   
}
// ./load job item data table

// view and edit 


function travelApprovedViewRow(row_id) {
    $("#row_id").val(row_id);
     flag_id=$("#flag_id").val("1");
 

   $.ajax({
       url: BASE_URL + "index.php/" + hrController + "/get_travel_approved_by_id",
       type: "POST",
       data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val()},
       dataType: "json",
       success: function (response) {
           // console.log(response is ,response);
           if (response.success) {
               $("#employee_travel_approved_employee_id").val(response.data.employee_id);
               $("#employee_travel_approved_date_of_request").val(response.data.date_of_request);
               $("#employee_travel_approved_means_of_transportation_id").val(response.data.means_of_transportation_id).trigger('change');
               $("#employee_travel_approved_purpose_of_travel").val(response.data.purpose_of_travel);
               $("#employee_travel_approved_travel_from_place").val(response.data.travel_from_place);
               $("#employee_travel_approved_travel_to_place").val(response.data.travel_to_place);
               $("#employee_travel_approved_travel_date").val(response.data.travel_date);
               $("#employee_travel_approved_return_date").val(response.data.return_date);
               $("#employee_travel_approved_travel_notes").val(response.data.notes);
               $("#employee_travel_approved_estimated_cost").val(response.data.estimated_cost);
               $("#hid_emp_travel_approved").val(response.data.employee_id);
             
               $("#travel_approved_data_table_modal").modal("show");
               var disable_employee_travel_approved = $("#employee_travel_approved_employee_id, #employee_travel_approved_date_of_request, #employee_travel_approved_means_of_transportation_id, #employee_travel_approved_purpose_of_travel, #employee_travel_approved_travel_from_place, #employee_travel_approved_travel_to_place, #employee_travel_approved_travel_date, #employee_travel_approved_return_date, #employee_travel_approved_travel_notes, #employee_travel_approved_estimated_cost");
               disable_employee_travel_approved.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
                // Show the .modal-footer when the modal is hidden
                $("#travel_approved_data_table_modal").on("hidden.bs.modal", function () 
                {
                    disable_employee_travel_approved.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
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
    
    


$("#traveling_approved_filter_save_btn").on("click", function () {
    var travel_approved_employee_name_filter_val = $("#traveling_approved_employee_name_for_filtering").val();
    var travel_approved_means_filter_val = $("#traveling_approved_traveling_means_for_filtering").val();
    var travel_approved_employee_name_filter_text = $("#traveling_approved_employee_name_for_filtering option:selected").text();
    var travel_approved_means_filter_text = $("#traveling_approved_traveling_means_for_filtering option:selected").text();

    var table_approved = $('#travel_approved_data_table').DataTable();

    // Clear all filters
    table_approved.columns().search('');

    if (travel_approved_employee_name_filter_val != "0") {
      
      table_approved.column(0).search(travel_approved_employee_name_filter_text);
    }
     if (travel_approved_means_filter_val != "0") {
      
      table_approved.column(1).search(travel_approved_means_filter_text);
    }

    table_approved.draw();

    var filterApprovedText = ''; // Default text
    if (travel_approved_employee_name_filter_val != "0" && travel_approved_means_filter_val != "0") {
      filterApprovedText = 'Employee Name: ' + travel_approved_employee_name_filter_text + ' & ' + 'Means of transportation: '+travel_approved_means_filter_text;
    }
     else if (travel_approved_employee_name_filter_val != "0") {
      filterApprovedText = 'Employee Name: ' + travel_approved_employee_name_filter_text;
    } 
    else if (travel_approved_means_filter_val != "0") {
      filterApprovedText = 'Means of transportation: ' + travel_approved_means_filter_text;
    }
    var resetFilterApprovedText = filterApprovedText+'<span class="icon"><i class="fa fa-times"></i></span>';
    $('#travel_approved_data_table_reset_filter').html(resetFilterApprovedText);
    
    // Use a single conditional statement to show or hide the button
    if (travel_approved_employee_name_filter_val == "0" && travel_approved_means_filter_val == "0") {
        $("#travel_approved_data_table_reset_filter").hide();
    } else {
        $("#travel_approved_data_table_reset_filter").show();
    }

    $("#travel_approved_data_table_filter_modal").modal("hide");
}); 




$('#travel_approved_data_table_filter_modal,#travel_approved_data_table_modal').on('shown.bs.modal', function () {
  var hid_emp_travel_approved=$("#hid_emp_travel_approved").val();
    $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/get_travel_employee_name_option",
            type: 'GET',
            dataType: "json",
            success: function(data) {
              $('#traveling_approved_employee_name_for_filtering,#employee_travel_approved_employee_id').empty();

                // Update the modal content with the fetched data
                if($("#flag_id").val()=='0')
                {
                  $('#employee_travel_approved_employee_id').html('<option value="0">Select employee name</option>');
                $('#traveling_approved_employee_name_for_filtering').html('<option value="0">Not Applicable</option>');
                }
                $.each(data, function (index, travel_employee_name) {
                    $('#traveling_approved_employee_name_for_filtering,#employee_travel_approved_employee_id').append('<option value="' + travel_employee_name.employee_id + '">' + travel_employee_name.employee_name + '</option>');
                });
                if($("#flag_id").val()=='1'){
                    $('#employee_travel_approved_employee_id').val(hid_emp_travel_approved);
                }
            },
            error: function(error) {
                console.log('Error fetching content:', error);
                // If there's an error, still display the default "Select Leader" option
                $('#employee_travel_approved_employee_id').html('<option value="0">Select employee name</option>');
                $('#traveling_approved_employee_name_for_filtering').html('<option value="0">Not Applicable</option>');
            }
        });
    // get option  in travel master
    });


</script>

