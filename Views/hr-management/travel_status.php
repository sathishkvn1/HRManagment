

                                       <!-- --- discription ---- -->
                          <div id="company_structure_table_top" class="reviewBlock">
                          

                          <div class="combined_buttons">
                              <div class="add_new_btn_div">
                                  <button id="travel_status_data_table_add_new" class="add_new_button" data-bs-toggle="modal" data-value="employee_data_table"><i class="fas fa-plus"></i> Add New</button>
                              </div>
                              <div class="filter_btn_div">
                              <button id="travel_status_data_table_filter_btn" class="customise_filter_button" data-value="employee_data_table"><i class="fas fa-filter"></i>Filter</button>
                              </div>
                              <div class="reset_filter_btn_div">
                                  <button id="travel_status_data_table_reset_filter"  style="display:none" class="cancel_filter_button"><i class="fas fa-times"></i> Cancel</button>
                              </div>
                            
                          </div>

                          
                            </div>
                            <!-- --- ./discription ---- -->
            
                        <!--for loading CompanyStructure DataTable -->
                            <table id="travel_status_data_table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Transportation means</th>
                                    <th>To</th>
                                    <th>Travel Date</th>
                                    <th>Return Date</th>
                                    <th>Status</th>
                                    
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
   <div class="modal fade data-table-modal" id="travel_status_data_table_modal" data-bs-backdrop="static">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Travel</h4>
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

                        <select name="employee_id_employee_travel"  id="employee_id_employee_travel"class="form-control select2" >
                         
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
                      <input type="date" class="form-control" id="date_of_request" name="date_of_request">
                      </input>
                      </div>
                    </div>
                     
                      <!--one field  text field---- -->
                    <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Transportation Means</label>
                      </div>
                      <div class="col-8">
                        <select name="means_of_transportation_id"  id="means_of_transportation_id"class="form-control select2" >
                       
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
                        <textarea name="purpose_of_travel"  id="purpose_of_travel" class="form-control ">
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
                             <input type="text" class="form-control" id="travel_from_place" name="travel_from_place">
                      </div>
                    </div>
                  <!-- ./ one field ---- -->                              
                      <!--one field  text field---- -->
                    <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Travel To</label>
                      </div>
                      <div class="col-8">
                             <input type="text" class="form-control" id="travel_to_place" name="travel_to_place">
                      </div>
                    </div>
                  <!-- ./ one field ---- -->                              
                 <!--one field  text field---- -->
                     <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label required">Travel Date</label>
                      </div>
                      <div class="col-8">
                      <input type="date" class="form-control" id="travel_date" name="travel_date">
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
                      <input type="date" class="form-control" id="return_date" name="return_date">
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
                        <textarea name="travel_notes"  id="travel_notes"class="form-control ">
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
                        <input type="text" name="estimated_cost"  id="estimated_cost"class="form-control ">
                        </input>
                      </div>
                    </div>
                    <input type="hidden" name="hidden_employee_status_employee_name" id="hidden_employee_status_employee_name" value="0">
                </form>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default cancelbtn" id="btn_employment_status_cancel" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn savebtn" id="btn_travel_status_save"><i class="fas fa-calendar-check"></i>Save</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
     <!-- /.modal for company department-->


     <!-- Modal for selecting job title -->
<div class="modal filtering_modal data-table-modal" id="travel_status_data_table_filter_modal">
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
                      <select id="traveling_status_employee_name_for_filtering" class="form-control select2">
                          <option value="0">Not Applicable</option>
                      </select>
                        </div>
                  </div>
                <div class="form-group row">
                      <div class="col-3">
                        <label for="recipient-name" class="col-form-label"> Status</label>
                      </div>
                      <div class="col-8">
                      <select id="traveling_status_for_filtering" class="form-control select2">
                          <option value="0">Not Applicable</option>
                          <?php
                          if (isset($travel_status_filter)):
                              foreach ($travel_status_filter as $row):
                                  $travel_request_status = $row->travel_request_status;
                                  $id = $row->id;
                          ?>
                                  <option value="<?php echo $id; ?>"><?php echo $travel_request_status; ?></option>
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
                <button id="appy_filter_travel_status" class="btn filter_save_btn">Apply Filter</button>
            </div>
        </div>
    </div>
</div>

<!-- modal end  -->
<?php include("bottom-js.php"); ?>       
<script>
  
      //view button
function travelStatusViewRow(row_id) {
  $("#flag_id").val("1");
    $.ajax({
       url: BASE_URL + "index.php/" + hrController + "/get_travel_status_by_id",
       type: "POST",
       data: { row_id: row_id, li_token: token},
       dataType: "json",
       success: function (response) {
           console.log("response is" ,response);
           if (response.success) {
               $("#employee_id_employee_travel").val(response.data.employee_id).trigger('change');
               $("#date_of_request").val(response.data.date_of_request);
               $("#means_of_transportation_id").val(response.data.means_of_transportation_id).trigger('change');
               $("#purpose_of_travel").val(response.data.purpose_of_travel);
               $("#travel_from_place").val(response.data.travel_from_place);
               $("#travel_to_place").val(response.data.travel_to_place);
               $("#travel_date").val(response.data.travel_date);
               $("#return_date").val(response.data.return_date);
               $("#travel_notes").val(response.data.notes);
               $("#estimated_cost").val(response.data.estimated_cost);
               $("#travel_status_data_table_modal").modal("show");
               $("#hidden_employee_status_employee_name").val(response.data.employee_id);

               var disable_travel_status1 = $("#employee_id_employee_travel, #date_of_request, #means_of_transportation_id, #purpose_of_travel, #travel_from_place,#travel_to_place,#travel_date,#travel_notes,#estimated_cost,#return_date");
               disable_travel_status1.prop("disabled", true).prop("readonly", true).css("cursor", "not-allowed");
               $(".modal-footer .savebtn").hide();
         
                $("#travel_status_data_table_modal").on("hidden.bs.modal", function () {
                $(".modal-footer .savebtn").show();
                disable_travel_status1.prop("disabled", false).prop("readonly", false).css("cursor", "auto");
            });

           } 
           else {
               alert("Failed to fetch job title details.");
           }
       },
       error: function (xhr, status, error) {
           alert("Error fetching job title details.");
       }
   });
}
//view butto
     
       

  var BASE_URL = "<?php echo base_url(); ?>";
 var hrController = "<?php echo CONTROLLER_HR; ?>";
 var token = "<?php echo $_SESSION['li_token']; ?>";
 // load job item data table
function loadDataTableForTravelStatus(){
    $('#travel_status_data_table').DataTable({
        "ajax": {
            "url": BASE_URL + "index.php/" +  hrController + "/get_travel_details",
            "dataSrc": "data"
        },
            "columns": [
            { data: "employee_name" },
            { data: "transportaion_means" },
            { data: "travel_to_place" },
            { data: "travel_date" },
            { data: "return_date" },
            { data: "travel_request_status" },
            {
                data: "id",
                render: function (data, type, full, row) {
                    var id = full.id;
                    return `
                        <div class="operations">
                            <a href="#" class="edit" onclick="travelStatusEditRow(${id});"><i class="fas fa-edit"></i>Edit</a>
                            <a href="#" class="view" onclick="travelStatusViewRow(${id});"><i class="fas fa-eye"></i>View</a>
                            <a href="#" class="delete" onclick="travelStatusDeleteRow(${id});"><i class="fas fa-trash"></i>Delete</a>
                        </div>`;
                }
            }
        ],


        "initComplete": function(settings, json) {
            customizeDataTable('travel_status_data_table');
        }
    });
}
// ./load job item data table

//save
$("#btn_travel_status_save").on("click",function() {  
 
  if ($('#employment_status_modal_form').valid()) {
          var formData  = new FormData();
          formData.append('employee_id_employee_travel', $("#employee_id_employee_travel").val());
          formData.append('date_of_request', $("#date_of_request").val()); 
          formData.append('means_of_transportation_id', $("#means_of_transportation_id").val());
          formData.append('purpose_of_travel', $("#purpose_of_travel").val()); 
          formData.append('travel_from_place', $("#travel_from_place").val()); 
          formData.append('travel_to_place', $("#travel_to_place").val()); 
          formData.append('travel_date', $("#travel_date").val()); 
          formData.append('return_date', $("#return_date").val()); 
          formData.append('travel_notes', $("#travel_notes").val()); 
          formData.append('estimated_cost', $("#estimated_cost").val()); 
          formData.append('row_id', $("#row_id").val()); 
          formData.append('flag_id', $("#flag_id").val()); 
          formData.append('li_token', token); 
            $.ajax({
                     url: BASE_URL + "index.php/" + hrController + "/save_travel_status",
                     type: 'POST',
                     data:  formData,
                     dataType: "JSON",
                     processData: false,
                     contentType: false,
                        success: function(response) {
                              console.log("response",response);
                               console.log(response.message);
                               $('#travel_status_data_table_modal').modal('hide');
                                $('#travel_status_data_table').DataTable().ajax.reload();
                                $('#travel_verified_data_table').DataTable().ajax.reload();
                                $('#new_travel_request_data_table').DataTable().ajax.reload();
                                $('#travel_approved_data_table').DataTable().ajax.reload();
                                $('#new_travel_request_data_table_modal').modal('hide');
                               showToast('success', response.message);       
                            },
                            error: function(xhr, status, error) {
                                showToast("error", "Error save item.");
                                console.log(xhr.responseText);A
                                console.log(status);
                                console.log(error);
                            }
                        }); 
          }                 
     });
// ./ for save the 

//edit
function travelStatusEditRow(row_id) {
    $("#row_id").val(row_id);
     flag_id=$("#flag_id").val("1");
 

   $.ajax({
       url: BASE_URL + "index.php/" + hrController + "/get_travel_status_by_id",
       type: "POST",
       data: { row_id: row_id, li_token: token,flag_id: $("#flag_id").val()},
       dataType: "json",
       success: function (response) {
           // console.log(response is ,response);
           if (response.success) {
               $("#employee_id_employee_travel").val(response.data.employee_id).trigger('change');
               $("#date_of_request").val(response.data.date_of_request);
               $("#means_of_transportation_id").val(response.data.means_of_transportation_id).trigger('change');
               $("#purpose_of_travel").val(response.data.purpose_of_travel);
               $("#travel_from_place").val(response.data.travel_from_place);
               $("#travel_to_place").val(response.data.travel_to_place);
               $("#travel_date").val(response.data.travel_date);
               $("#return_date").val(response.data.return_date);
               $("#travel_notes").val(response.data.notes);
               $("#estimated_cost").val(response.data.estimated_cost);
             
               $("#travel_status_data_table_modal").modal("show");
               $("#hidden_employee_status_employee_name").val(response.data.employee_id);
            
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



//  delete skill 
function travelStatusDeleteRow(row_id) {
    if (confirm("Are you sure you want to delete this item?")) {
        $.ajax({
            url: BASE_URL + "index.php/" + hrController + "/delete_travel_status_by_id",
            type: "POST",
            data: { row_id: row_id, li_token: token },
            dataType: "json",
            success: function (response) {
                $('#travel_status_data_table_modal').modal('hide');
                 $('#travel_status_data_table').DataTable().ajax.reload();
                  showToast('success', response.message); 
            },
            error: function (xhr, status, error) {
                
                showToast('error', 'Error delete item'); 
            }
        });
    }
  
}
// delete skill 
</script>

<script>
  
  

  
  $(document).ready(function () {
   
    if($("#flag_id").val()=='1')
    {
        const today = new Date();
      const year = today.getFullYear();
      const month = String(today.getMonth() + 1).padStart(2, '0'); // Months are 0-indexed
      const day = String(today.getDate()).padStart(2, '0');
      const currentDate = `${year}-${month}-${day}`;
      
      // Set the value of the date input element to the current date
      $('#travel_date,#return_date').val(currentDate);
      
      // Set the minimum allowed date to the current date
      $('#travel_date,#return_date').attr('min', currentDate);
    }


    $('#employment_status_modal_form').validate({
        rules: {
            employee_id_employee_travel: {
                required: true,
            },
            date_of_request: {
                required: true,
            },
            means_of_transportation_id: {
                required: true,
            },
            purpose_of_travel: {
                required: true,
                minlength: 1, // Require at least one character
            },
            travel_from_place: {
                required: true,
            },
            travel_to_place: {
                required: true,
            },
            travel_date: {
                required: true,
            },
            return_date: {
                required: true,
            },
            estimated_cost: {
                required: true,
                number: true, // Ensures that the value is a number
            },
        },
        messages: {
            employee_id_employee_skill: "Please select an employee.",
            date_of_request: "Please select the request date.",
            means_of_transportation_id: "Please select the means of transportation.",
            purpose_of_travel: {
                required: "Please enter the purpose of travel.",
                minlength: "Please enter the purpose of travel.",
            },
            travel_from_place: "Please enter the travel from location.",
            travel_to_place: "Please enter the travel to location.",
            travel_date: "Please select the travel date.",
            return_date: "Please select the return date.",
            estimated_cost: {
                required: "Please enter the estimated travel cost.",
                number: "only number is applicable.",
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            if (element.is("textarea")) {
                error.addClass('invalid-feedback d-block');
                element.closest('.form-group').append(error);
            } else {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});


</script>

<script>
$("#appy_filter_travel_status").on("click", function () {
    var travel_status_employee_name_filter_val = $("#traveling_status_employee_name_for_filtering").val();
    var travel_status_status_val= $("#traveling_status_for_filtering").val();
    var travel_status_employee_name_filter_text = $("#traveling_status_employee_name_for_filtering option:selected").text();
    var travel_status_status_text = $("#traveling_status_for_filtering option:selected").text();

    var table_travel_status = $('#travel_status_data_table').DataTable();

    // Clear all filters
    table_travel_status.columns().search('');

    if (travel_status_employee_name_filter_val != "0") {
      
      table_travel_status.column(0).search(travel_status_employee_name_filter_text);
    }
     if (travel_status_status_val != "0") {
      
      table_travel_status.column(5).search(travel_status_status_text);
    }

    table_travel_status.draw();

    var filterTravelStatusText = ''; // Default text
    if (travel_status_employee_name_filter_val != "0" && travel_status_status_val != "0") {
      filterTravelStatusText = 'Employee Name: ' + travel_status_employee_name_filter_text + ' & ' + 'Status: '+travel_status_status_text;
    }
     else if (travel_status_employee_name_filter_val != "0") {
      filterTravelStatusText = 'Employee Name: ' + travel_status_employee_name_filter_text;
    } 
    else if (travel_status_status_val != "0") {
      filterTravelStatusText = 'Status: ' + travel_status_status_text;
    }
    var reset_filterTravelStatusText = filterTravelStatusText+'<span class="icon"><i class="fa fa-times"></i></span>';
    $('#travel_status_data_table_reset_filter').html(reset_filterTravelStatusText);
    
    // Use a single conditional statement to show or hide the button
    if (travel_status_employee_name_filter_val == "0" && travel_status_employee_name_filter_val == "0") {
        $("#travel_status_data_table_reset_filter").hide();
    } else {
        $("#travel_status_data_table_reset_filter").show();
    }

    $("#travel_status_data_table_filter_modal").modal("hide");
});



$('#travel_status_data_table_modal,#travel_status_data_table_filter_modal').on('shown.bs.modal', function () {

   var emp_hid_val=$("#hidden_employee_status_employee_name").val();
// get option  in travel master
$.ajax({
        url: BASE_URL + "index.php/" + hrController + "/get_travel_employee_name_option",
        type: 'GET',
        dataType: "json",
        success: function(data) {
            // Update the modal content with the fetched data
            $('#employee_id_employee_travel, #traveling_status_employee_name_for_filtering').empty();
            if ($("#flag_id").val() == '0') {
              $('#traveling_status_employee_name_for_filtering').html('<option value="0">Not Applicable</option>');
              $('#employee_id_employee_travel').html('<option value="">Select Employee</option>');
            }
            
            $.each(data, function (index, travel_master_employee_name) {
                $('#employee_id_employee_travel,#traveling_status_employee_name_for_filtering').append('<option value="' + travel_master_employee_name.employee_id + '">' + travel_master_employee_name.employee_name + '</option>');
            });
            if($("#flag_id").val()=='1'){
                    $('#employee_id_employee_travel').val(emp_hid_val);
                }
        },
        error: function(error) {
            console.log('Error fetching content:', error);
            // If there's an error, still display the default "Select Leader" option
            $('#traveling_status_employee_name_for_filtering').html('<option value="0">Not Applicable</option>');

        }
    });
// get option  in travel master
});



$("#travel_status_data_table_add_new").on("click", function() {
    $("#flag_id").val("0");

    var modalId = "#travel_status_data_table_modal";
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

$("#travel_status_data_table_filter_btn").on("click", function() {

  $("#flag_id").val('0');
   $("#travel_status_data_table_filter_modal").modal("show");
});


$("#travel_status_data_table_reset_filter").on("click", function() {

  
     var table = $('#travel_status_data_table').DataTable();
    var modal = $('#travel_status_data_table_filter_modal');
    modal.find("select").val("0");
    table.columns().search('');
    table.search('').draw();
  
   
    $(this).hide();

})
</script>

